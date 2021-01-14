<?php
if(isset($_POST["save"])){
    var_dump($_POST);
    $id = $_POST["MaLoai"];
    $TenLoai = $_POST["TenLoai"];
    $GhiChu = $_POST["GhiChu"];
    $HinhAnh = $_POST["HinhAnh"];
$sql = "UPDATE `nn_loai` SET 
`TenLoai`='{$TenLoai}',
`GhiChu`='{$GhiChu}',
`HinhAnh`='{$HinhAnh}' WHERE `MaLoai` = {$id}";
$db->query($sql);

}


$id = $_GET["id"];
$sql = "SELECT * FROM `nn_loai` WHERE `MaLoai` = {$id}";
$res = $db->query($sql);
$loai = $res->fetch_array();

?>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Sửa Loại</h3>
      </div>
      <div class="panel-body">
            <form action="" method="POST" role="form">
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
                    <input value="<?php echo $loai["HinhAnh"] ?>" name="HinhAnh" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <button type="submit" name="save" class="btn btn-primary">Sửa Loại</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
            </form>
            
      </div>
</div>