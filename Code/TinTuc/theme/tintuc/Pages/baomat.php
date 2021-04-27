<?php
$khachHang = $_SESSION["KhachHang"];
if (isset($_POST["OldPassword"])) {
    try {
        //code...

        // b1 kiểm tra mat khẩu cũ có dung không
        $email = $_SESSION["KhachHang"]["Email"];
        $password = $_POST["OldPassword"];
        // kiểm tra trong database
        $user = GetUserByEmailPassword($email, $password);
        if($user ==null){
            throw new Exception("Mật Khẩu Cũ Không Đúng");
        }
// mật khẩu đã chính xác
        if($_POST["NewPassword"]!=$_POST["RePassword"]){
            throw new Exception("Mật Khẩu Mới Không Khớp");
        }
// mật  kẩu ok
        $user["Password"] = sha1($user["randomkey"].$_POST["NewPassword"]);
        SuaThongTinUser($user);
// gửi  mail thông báo có người dang nhap tai khoản
        GuiMailCapNhatMatKhau($email);
    } catch (Exception $th) {
       echo $loi = $th->getMessage();
    }
}
?>
<div class="container">
    <div class="col-md-3">
        <div class="list-group">
        <a href="/index.php?pages=profile" class="list-group-item ">
                <p class="list-group-item-text">Thông tin tài khoản</p>
            </a>
            <a href="/index.php?pages=yeuthich" class="list-group-item  ">
                <p class="list-group-item-text">Yêu Thích</p>
            </a>
            <a href="/index.php?pages=donhang" class="list-group-item  ">
                <p class="list-group-item-text">Đơn Hàng</p>
            </a>
            <a href="/index.php?pages=baomat" class="list-group-item active ">
                <p class="list-group-item-text">Bảo Mật</p>
            </a>
            <a href="/index.php?pages=dangxuat" class="list-group-item  ">
                <p class="list-group-item-text">Đăng Xuất</p>
            </a>
        </div>
    </div>
    <div class="col-md-9">

        <form action="" method="POST" role="form">
            <legend>Bảo Mật</legend>

            <div class="form-group">
                <label for="">Mật Khẩu Cũ</label>
                <input type="password" name="OldPassword" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Mật Khẩu Mới</label>
                <input type="password" name="NewPassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nhập Lại Mật Khẩu</label>
                <input type="password" name="RePassword" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>



    </div>
</div>