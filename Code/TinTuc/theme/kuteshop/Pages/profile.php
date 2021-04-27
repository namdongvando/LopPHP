<?php
$khachHang = $_SESSION["KhachHang"];
if (isset($_POST["user"])) {
    $postUser =  $_POST["user"];
    $email = $khachHang["Email"];
    // từ db
    $user =  TimUserTheoEmail($email)->fetch_array();
    $user["HoTen"] = $postUser["HoTen"];
    $user["DienThoai"] = $postUser["DienThoai"];
    $user["DiaChi"] = $postUser["DiaChi"];
    SuaThongTinUser($user);
    $khachHang["HoTen"] = $postUser["HoTen"];
    $khachHang["DienThoai"] = $postUser["DienThoai"];
    $khachHang["DiaChi"] = $postUser["DiaChi"];
    $_SESSION["KhachHang"] = $khachHang;
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
            <legend>Thông tin chung</legend>

            <div class="form-group">
                <label for="">Họ Tên</label>
                <input value="<?php echo $khachHang["HoTen"] ?>" type="text" name="user[HoTen]" class="form-control">
            </div>

            <div class="form-group">
                <label for="">SĐT</label>
                <input value="<?php echo $khachHang["DienThoai"] ?>" type="text" name="user[DienThoai]" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input value="<?php echo $khachHang["Email"] ?>" type="text" name="user[Email]" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input value="<?php echo $khachHang["DiaChi"] ?>" type="text" name="user[DiaChi]" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>



    </div>
</div>