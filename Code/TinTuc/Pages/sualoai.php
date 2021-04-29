<?php
$id = $_GET["id"];
// $xinChao = XinChao("teo nguyen");
// echo $xinChao;

use model\ChungLoai;
use model\Loai;

if (isset($_POST["save"])) {
    // lấy thông tin cua loại cần sửa trong Database
    $idloai = $_POST["MaLoai"];
    // $sql = "SELECT * FROM `nn_loai` WHERE `MaLoai` = {$id}";
    // $res = $db->query($sql);
    // $loai = $res->fetch_array();

    $modelLoai = new Loai();

    $loai = $modelLoai->GetById($idloai);
    // var_dump($loai);

    $fileName = $loai["hinh"];
    //var_dump($_FILES["HinhAnh"]);
    // lấy thông tin file được tải lên
    $fileHinh = $_FILES["HinhAnh"];
    //var_dump($fileHinh);
    // kiểm xem có up hinh không
    if ($fileHinh["error"] == 0) {
        // chọn cho luu file hinh
        // thu muc muốn upload hình vào
        $dirUpload = __DIR__ . "/../public/loai/";
        $filePathDelete = $dirUpload . $fileName;
        // kiểm tra xem file có không
        if (file_exists($filePathDelete)) {
            // xóa file
            unlink($filePathDelete);
        }

        // 
        if (is_dir($dirUpload) == false) {
            // tao thư muc và quyền mới thư muc
            mkdir($dirUpload, 0777);
        }
        $filePath =
            $dirUpload . $id . "-" . $fileHinh["name"];
        // ten va duong dan luu trong database
        $fileName =
            "/public/loai/" . $id . "-" . $fileHinh["name"];
        // copy file tam thành file trong thư muc web
        copy($fileHinh["tmp_name"], $filePath);
        //echo "================";
        $loai["hinh"] = $fileName;
    }

    //var_dump($_POST);
    $loai["TenLoai"] = $_POST["TenLoai"];
    $loai["idCL"] = $_POST["idCL"];

    // gán giá trị cho trường hình ảnh

    // $sql = "UPDATE `nn_loai` SET 
    // `TenLoai`='{$TenLoai}',
    // `GhiChu`='{$GhiChu}',
    // `HinhAnh`='{$HinhAnh}' WHERE `MaLoai` = {$id}";
    // $db->query($sql);
    // echo "=======";
    // var_dump($loai);
    // echo "=======";
    $modelLoai->Put($loai);
}


// $sql = "SELECT * FROM `nn_loai` WHERE `MaLoai` = {$id}";
// $res = $db->query($sql);
// $loai = $res->fetch_array();


$loai = new model\Loai($id);
$chungLoai = new model\ChungLoai($loai->idCL);
$DSChungLoai = $chungLoai->GetAll();
?>

<ol class="breadcrumb">
    <li>
        <a href="/admin.php?pages=loai">Danh Sách Loại</a>
    </li>
    <li class="active">Sửa</li>
</ol>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sửa Loại</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <label for="">Tên Loại</label>
                <input type="hidden" name="MaLoai" value="<?php echo $loai->idLoai; ?>">
                <input value="<?php echo $loai->TenLoai ?>" name="TenLoai" type="text" class="form-control" placeholder="Tên Loại">
            </div>
            <div class="form-group">
                <label for="">Chủng Loại</label>
                <select name="idCL" class="form-control">
                    <?php
                    foreach ($DSChungLoai as $k => $cl) {
                        
                        $_cl = new ChungLoai($cl);
                    ?>
                        <option <?php echo $_cl->idCL== $loai->idCL?'selected':''; ?>  value="<?php echo $_cl->idCL ?>" ><?php echo $_cl->TenCL ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="">Hình Ảnh</label>
                <!-- nếu không có hình 
                    thì hiện hình no-image.jpg
                     -->
                <img style="height:100px;" onerror="this.src='./public/no-image.jpg'" src="<?php echo $loai->hinh(); ?>" class="img-responsive" alt="Image">
                <!-- cho chọn hình từ máy -->
                <input name="HinhAnh" type="file" placeholder="Hình Ảnh">
            </div>
            <button type="submit" name="save" class="btn btn-primary">Sửa Loại</button>
            <button type="reset" class="btn btn-primary">Làm Lại</button>
        </form>

    </div>
</div>