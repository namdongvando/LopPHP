<?php
if (isset($_POST["Username"])) {
    try {
        //code...

        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $user = GetUserByEmailPassword($username, $password);

        if ($user == null) {
            throw new Exception("Mật khẩu/tài khoản không đúng");
        }
        $_SESSION["KhachHang"] = $user;
        header("Location: index.php");
    } catch (Exception $ex) {
        $loi = $ex->getMessage();
    }
}

?>
<div class="page-content container">
    <div class="row">
        <div class="col-sm-6">
            <div class="box-authentication">
                <form action="" method="POST">
                    <p style="color:red;" ><?php echo isset($loi) ? $loi : ""; ?></p>
                    <h3>Đăng Nhập</h3>
                    <label for="emmail_login">Tài Khoản/Email</label>
                    <input required name="Username" id="emmail_login" type="text" class="form-control">
                    <label for="password_login">Mật Khẩu</label>
                    <input required name="Password" id="password_login" type="password" class="form-control">
                    <p class="forgot-pass"><a href="#">Quên Mật Khẩu?</a></p>
                    <button type="submit" class=" button"><i class="fa fa-lock"></i> Login</button>
                </form>

            </div>
        </div>
    </div>
</div>