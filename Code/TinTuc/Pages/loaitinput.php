<?php
// $_REQUEST["abc"] <> $_GET["abc"] 
// $_REQUEST["abc"] <> $_POST["abc"] 

// kiểm tra đã submit chưa
if (isset($_POST["SuaLoaiTin"])) {
    // lấy thông tin trong database
    $LoaiTin = GetLoaiTinById($_POST["idLT"]);
    $LoaiTin["TenLoai"] = $_POST["TenLoaiTin"];
    $LoaiTin["Alias"] = BoDauTiengViet($LoaiTin["TenLoai"]);
    if ($_FILES["HinhAnh"]["error"] == 0) {
        // xóa file hinh cu
        // $LoaiTin["Hinh"]
        $filePath = substr($LoaiTin["Hinh"], 1, strlen($LoaiTin["Hinh"]));
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        // có file
        // upload file hinh
        $fileName =  basename($_FILES["HinhAnh"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "public/loaitin/" . $LoaiTin["Alias"] . ".{$extention}";
        UploadFile($_FILES["HinhAnh"], $hinh);
        $LoaiTin["Hinh"] = "/{$hinh}";
    }


    // cập nhật thong7 tin nhan dc


    $LoaiTin["NoiDung"] = $_POST["NoiDung"];
    //var_dump($LoaiTin);
    // lưu xuống database
    PutLoaiTin($LoaiTin);
}
// kiêm tra có tham so idlt không

if (!isset($_GET["idLT"])) {
    header("Location: /admin.php?pages=loaitin");
}
$idLoai = intval($_GET["idLT"]);
$loaiTin = GetLoaiTinById($idLoai);

?>

<ol class="breadcrumb">
    <li>
        <a href="#">Dashboar</a>
    </li>
    <li >
    <a href="/admin.php?pages=loaitin">Loại Tin</a>
    
    </li>
    <li class="active">Sửa Loại Tin</li>
</ol>

<div class="">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Quản Lý Loại Tin</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="textareaTenLoaiTin" class=" control-label">Tên Loại Tin:</label>
                    <input name="idLT" type="hidden" value="<?php echo $loaiTin['idLT'] ?>">
                    <input name="TenLoaiTin" value="<?php echo $loaiTin['TenLoai'] ?>" id="textareaTenLoaiTin" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <img src="<?php echo $loaiTin['Hinh'] ?>" style="height: 100px;" alt="">
                    <label for="textareaTenLoaiTin" class=" control-label">Hình Ảnh:</label>
                    <input type="file" name="HinhAnh" id="textareaTenLoaiTin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="textareaNoiDung" class="control-label">Nội Dung:</label>
                    <textarea class="editor" name="NoiDung" id="textareaNoiDung" class="form-control"><?php echo $loaiTin['NoiDung'] ?></textarea>
                </div>

            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                <button type="submit" name="SuaLoaiTin" class="btn btn-primary">Lưu</button>
            </div>



        </div>
    </form>
</div>






<script src="/public/admin/plugins/ckeditor/ckeditor.js"></script>
<script src="/public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $(".xoa").click(function() {
            var datahtml = $(this).data();
            if (window.confirm(datahtml.confirm) == false) {
                return false;
            }
        });
        $("#DSLoaiTin").DataTable();
        CKEDITOR.replace('textareaNoiDung');
    });
</script>