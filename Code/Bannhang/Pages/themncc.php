<?php 
    var_dump($_POST);
    // khi submit
    if(isset($_POST["save"])){
// them vao database
        
$TenCTY = !empty($_POST["TenCTY"])?$_POST["TenCTY"]:"";
$DienThoai = !empty($_POST["DienThoai"])?$_POST["DienThoai"]:"";
$Email = !empty($_POST["Email"])?$_POST["Email"]:"";
$NguoiLienHe = !empty($_POST["NguoiLienHe"])?$_POST["NguoiLienHe"]:"";
$DiaChi = !empty($_POST["DiaChi"])?$_POST["DiaChi"]:"";
$Website = !empty($_POST["Website"])?$_POST["Website"]:"";
$Fax = !empty($_POST["Fax"])?$_POST["Fax"]:"";
$GhiChu = !empty($_POST["GhiChu"])?$_POST["GhiChu"]:"";


    echo $sql = "INSERT INTO `nn_nhacungcap`(`MaNCC`, `TenCTY`, `DienThoai`, `Email`, `NguoiLienHe`, `DiaChi`, `Website`, `Fax`, `GhiChu`) VALUES (
        null,
        '{$TenCTY}',
        '{$DienThoai}',
        '{$Email}',
        '{$NguoiLienHe}',
        '{$DiaChi}',
        '{$Website}',
        '{$Fax}',
        '{$GhiChu}'
    )";    
    $db->query($sql);
    header("Location: ?pages=ncc");

    }

?>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Thêm Loại</h3>
      </div>
      <div class="panel-body">
            <form action="" method="POST" role="form">
                <div class="form-group col-md-6">
                    <label for="">Tên CTy</label>
                    <input name="TenCTY" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Điện Thoại</label>
                    <input name="DienThoai" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type='email' name="Email" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Người Liên Hệ</label>
                    <input name="NguoiLienHe" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Địa Chỉ</label>
                    <input name="DiaChi" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Website</label>
                    <input name="WebSite" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <div class="form-group col-md-6">
                    <label for="">fax</label>
                    <input name="Fax" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ghi Chu</label>
                    <input name="GhiChu" type="text" class="form-control"  placeholder="Ghi Chú">
                </div> 
                <button type="submit" name="save" class="btn btn-primary">Thêm Loại</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
            </form>
            
      </div>
</div>
