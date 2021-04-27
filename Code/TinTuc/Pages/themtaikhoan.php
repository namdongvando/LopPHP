<?php 
// var_dump($_POST);
// var_dump($_POST["tk"]);
if(isset($_POST["Save"]))
{
    try { 
        $tk = $_POST["tk"];
        $tk["Randomkey"] = RandomString(20);
        $tk["Password"] = $tk["Randomkey"]."123456";
        // mã hoá mật khẩu
        $tk["Password"] = sha1($tk["Password"]);
        // var_dump($tk);
    // kiểm tra tài khoản có trùng nhau không
        $res1 = GetTaiKhoanByUsername($tk["Username"]);
        if($res1 != null)
            throw new Exception("Tài khoản đã được sử dụng");

    // kiểm tra email có trùng không
        $res2 = GetTaiKhoanByEmail($tk["Email"]);
        if($res2 != null)
            throw new Exception("Email đã được sử dụng");
        // them thanh công
        InsertTaiKhoan($tk);
        header("Location: ?pages=danhsachtaikhoan");

    } catch (Exception $ex) {
        $loi = <<<LOI
    <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {$ex->getMessage()}
    </div>
LOI;
    }
   
    
}
echo isset($loi)?$loi:"";
?>



<div class="breadcrumb" >
    <a href="?pages=danhsachtaikhoan"
     class="btn btn-primary">
     Danh Sách Tài Khoản
    </a>
</div>
<div class="col-md-12">
    <form action="" method="POST">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h3 class="panel-title">Thêm Tài Khoản</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Họ Tên</label>
                    <input 
                    value="<?php 
                    echo isset($_POST["tk"]["Name"])?$_POST["tk"]["Name"]:"" 
                    ?>" 
                    required="true" name="tk[Name]" type="text" class="form-control">
                </div>                   
                <div class="form-group">
                    <label for="">Tài Khoản</label>
                    <input value="<?php 
                    // hiện lai giá trị đã điền
                    echo isset($_POST["tk"]["Username"])?$_POST["tk"]["Username"]:"" 
                    ?>"  required="true" name="tk[Username]" type="text" class="form-control">
                </div>                   
                <div class="form-group">
                    <label for="">Sô Điện Thoại</label>
                    <input required="true" name="tk[Phone]" type="text" class="form-control">
                </div>                   
                <div class="form-group">
                    <label for="">Email</label>
                    <input required="true" name="tk[Email]" type="email" class="form-control">
                </div>                   
                <div class="form-group">
                    <label for="">Ngày Sinh</label>
                    <input name="tk[BOD]" type="date" class="form-control">
                </div>                    
                <div class="form-group">
                    <label for="">Giới Tính</label>
                    <select name="tk[Sex]"
                       class="form-control">
    <option value="1" > Nam</option>
    <option value="0" > Nữ</option>
</select>
                </div>                    
                <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input name="tk[Address]" type="text" class="form-control">
                </div>                    
                <div class="form-group">
                    <label for="">Trạng Thái</label>
                    <select name="tk[Active]" 
                     class="form-control">
                     <option value="1" >Hoạt Động</option>
                     <option value="0" >Khóa</option>
</select>
                </div>                    
                
                <button type="reset" class="btn btn-default">Làm Lại</button>
                
                <button type="submit" name="Save" class="btn btn-success" >Thêm </button>
            </div>
        </div>
    </form>
</div>
