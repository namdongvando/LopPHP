<?php
//var_dump($_POST);
// khi submit

use model\ChungLoai;
use model\Loai;

if (isset($_POST["save"])) {
    // them vao database
    $loai = $_POST["Loai"];
    $loai["hinh"] = "";
    // có hinh 
    $loai["idCL"] = $_POST["idCL"];
    $fileHinh = $_FILES["HinhAnh"];
    // kiểm tra xem có file hinh
    if ($fileHinh["error"] == 0) {
        $fileName = time() . $fileHinh["name"];
        // thư muc update file
        $dirUpload = __DIR__ . "/../public/loai/";
        $fullPath = $dirUpload . $fileName;
        // duong dan luu vao database
        $fileNameSave2Data = "./public/loai/" . $fileName;
        UploadFile($fileHinh, $fullPath);
        $loai["hinh"] = $fileNameSave2Data;
    }
    $modelLoai = new Loai();
    $modelLoai->Post($loai);
    header("Location: ?pages=loai");
}
$chungLoai = new model\ChungLoai();
$DSChungLoai = $chungLoai->GetAll();
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Loại</h3>
    </div>
    <div class="panel-body">
        <form enctype="multipart/form-data" action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Tên Loại</label>
                <input name="Loai[TenLoai]" type="text" class="form-control" placeholder="Tên Loại">
            </div>
            <div class="form-group">
                <label for="">Chủng Loại</label>
                <select name="idCL" class="form-control">
                    <?php
                    foreach ($DSChungLoai as $k => $cl) {
                        
                        $_cl = new ChungLoai($cl);
                    ?>
                        <option  value="<?php echo $_cl->idCL ?>" ><?php echo $_cl->TenCL ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="">Hình Ảnh</label>
                <input name="HinhAnh" type="file" placeholder="Hình Ảnh">
            </div>
            <button type="submit" name="save" class="btn btn-primary">Thêm Loại</button>
            <button type="reset" class="btn btn-primary">Làm Lại</button>
        </form>

    </div>
</div>