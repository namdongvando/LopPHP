<?php 
    var_dump($_POST);
    // khi submit
    if(isset($_POST["save"])){
// them vao database
        $TenLoai = !empty($_POST["TenLoai"])?$_POST["TenLoai"]:"Nan";
        $GhiChu = !empty($_POST["GhiChu"])?$_POST["GhiChu"]:"";
        $HinhAnh = !empty($_POST["HinhAnh"])?$_POST["HinhAnh"]:"";

    echo $sql = "INSERT INTO `nn_loai` (`MaLoai`, `TenLoai`, `GhiChu`, `HinhAnh`) 
    VALUES (NULL, '{$TenLoai}', '{$GhiChu}', '{$HinhAnh}')";    
    $db->query($sql);
    header("Location: ?pages=loai");

    }

?>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Thêm Loại</h3>
      </div>
      <div class="panel-body">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="">Tên Loại</label>
                    <input name="TenLoai" type="text" class="form-control"  placeholder="Tên Loại">
                </div>
                <div class="form-group">
                    <label for="">Ghi Chu</label>
                    <input name="GhiChu" type="text" class="form-control"  placeholder="Ghi Chú">
                </div>
                <div class="form-group">
                    <label for="">Hình Ảnh</label>
                    <input name="HinhAnh" type="text" class="form-control"  placeholder="Hình Ảnh">
                </div>
                <button type="submit" name="save" class="btn btn-primary">Thêm Loại</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
            </form>
            
      </div>
</div>
