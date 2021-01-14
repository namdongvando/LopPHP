<?php 
    var_dump($_POST);
    // khi submit
    if(isset($_POST["save"])){
// them vao database
        
$MaNCC = !empty($_POST["MaNCC"])?$_POST["MaNCC"]:"";
$TenCTY = !empty($_POST["TenCTY"])?$_POST["TenCTY"]:"";
$DienThoai = !empty($_POST["DienThoai"])?$_POST["DienThoai"]:"";
$Email = !empty($_POST["Email"])?$_POST["Email"]:"";
$NguoiLienHe = !empty($_POST["NguoiLienHe"])?$_POST["NguoiLienHe"]:"";
$DiaChi = !empty($_POST["DiaChi"])?$_POST["DiaChi"]:"";
$Website = !empty($_POST["Website"])?$_POST["Website"]:"";
$Fax = !empty($_POST["Fax"])?$_POST["Fax"]:"";
$GhiChu = !empty($_POST["GhiChu"])?$_POST["GhiChu"]:"";


    echo $sql = "UPDATE `nn_nhacungcap` SET 
    
    `TenCTY`='{$TenCTY}',
    `DienThoai`='{$DienThoai}',
    `Email`='{$Email}',
    `NguoiLienHe`='{$NguoiLienHe}',
    `DiaChi`='{$DiaChi}',
    `Website`='{$Website}',
    `Fax`='{$Fax}',
    `GhiChu`='{$GhiChu}' WHERE `MaNCC`='{$MaNCC}'";    
    $db->query($sql);
    header("Location: ?pages=ncc");

    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM `nn_nhacungcap`
     WHERE `MaNCC` = {$id}";
     $res = $db->query($sql);
     $ncc = $res->fetch_array();


?>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Thêm Loại</h3>
      </div>
      <div class="panel-body">
            <form action="" method="POST" role="form">
                <div class="form-group col-md-6">
                    <label for="">Tên CTy</label>
                    <input value="<?php echo $ncc["MaNCC"] ?>" name="MaNCC" type="hidden" >
                    <input value="<?php echo $ncc["TenCTY"] ?>" name="TenCTY" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Điện Thoại</label>
                    <input value="<?php echo $ncc["DienThoai"] ?>" name="DienThoai" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input value="<?php echo $ncc["Email"] ?>" type='email' name="Email" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Người Liên Hệ</label>
                    <input value="<?php echo $ncc["NguoiLienHe"] ?>" name="NguoiLienHe" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Địa Chỉ</label>
                    <input value="<?php echo $ncc["DiaChi"] ?>" name="DiaChi" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Website</label>
                    <input value="<?php echo $ncc["Website"] ?>" name="Website" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <div class="form-group col-md-6">
                    <label for="">fax</label>
                    <input value="<?php echo $ncc["Fax"] ?>" name="Fax" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ghi Chu</label>
                    <input value="<?php echo $ncc["GhiChu"] ?>" name="GhiChu" type="text" class="form-control"  placeholder="Ghi Chú">
                </div> 
                <button type="submit" name="save" class="btn btn-primary">Sửa NCC</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
            </form>
            
      </div>
</div>
