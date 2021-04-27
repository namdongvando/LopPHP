<?php

// $xinChao = XinChao("teo nguyen");
// echo $xinChao;

if(isset($_POST["save"])){
    // lấy thông tin cua loại cần sửa trong Database
    $id = $_POST["MaLoai"];
    // $sql = "SELECT * FROM `nn_loai` WHERE `MaLoai` = {$id}";
    // $res = $db->query($sql);
    // $loai = $res->fetch_array();
    $loai = GetLoaiById($id);
    $fileName = $loai["HinhAnh"];

//var_dump($_FILES["HinhAnh"]);
// lấy thông tin file được tải lên
$fileHinh = $_FILES["HinhAnh"];
//var_dump($fileHinh);
// kiểm xem có up hinh không
if($fileHinh["error"]==0){
    // chọn cho luu file hinh
    // thu muc muốn upload hình vào
    $dirUpload = __DIR__."/../public/loai/";
    $filePathDelete = $dirUpload.$fileName;
    // kiểm tra xem file có không
    if(file_exists($filePathDelete)){
        // xóa file
        unlink($filePathDelete);
    }
    
    // 
    if(is_dir($dirUpload) == false){
        // tao thư muc và quyền mới thư muc
        mkdir($dirUpload,0777);
    }
     $filePath = 
    $dirUpload.$id."-".$fileHinh["name"];
    // ten va duong dan luu trong database
    $fileName = 
    "./public/loai/".$id."-".$fileHinh["name"];
    // copy file tam thành file trong thư muc web
    copy($fileHinh["tmp_name"],$filePath);
    //echo "================";
    
}

    //var_dump($_POST);
    
    $loai["TenLoai"] = $_POST["TenLoai"];
    $loai["GhiChu"] = $_POST["GhiChu"];
    // gán giá trị cho trường hình ảnh
    $loai["HinhAnh"] = $fileName;
// $sql = "UPDATE `nn_loai` SET 
// `TenLoai`='{$TenLoai}',
// `GhiChu`='{$GhiChu}',
// `HinhAnh`='{$HinhAnh}' WHERE `MaLoai` = {$id}";
// $db->query($sql);
//var_dump($loai);
    UpdateLoai($loai);




}

$id = $_GET["id"];
// $sql = "SELECT * FROM `nn_loai` WHERE `MaLoai` = {$id}";
// $res = $db->query($sql);
// $loai = $res->fetch_array();
$loai = GetLoaiById($id);
?>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Sửa Loại</h3>
      </div>
      <div class="panel-body">
            <form action="" method="POST" 
            enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="">Tên Loại</label>
                    <input type="hidden" name="MaLoai" value="<?php echo $loai["MaLoai"] ?>" >
                    <input value="<?php echo $loai["TenLoai"] ?>" name="TenLoai" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group">
                    <label for="">Ghi Chu</label>
                    <input value="<?php echo $loai["GhiChu"] ?>" name="GhiChu" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group">
                    <label for="">Hình Ảnh</label>
                    <!-- nếu không có hình 
                    thì hiện hình no-image.jpg
                     -->
                    <img style="height:100px;"
                     onerror="this.src='./public/no-image.jpg'" 
                     src="<?php echo $loai["HinhAnh"] ?>" 
                    class="img-responsive" alt="Image">
                    <!-- cho chọn hình từ máy -->
                    <input name="HinhAnh" type="file" 
                      placeholder="Hình Ảnh">
                </div>
                <button type="submit" name="save" class="btn btn-primary">Sửa Loại</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
            </form>
            
      </div>
</div>