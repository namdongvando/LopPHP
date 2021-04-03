<?php
try {
    if ($_POST["Password"] != $_POST["RePassword"]) {
        throw new Exception("Mật Khẩu Không Khớp");
    }

    $user["randomkey"] = sha1(time() . rand(1, time()) . rand(1, time()));
    $user["HoTen"] = $_POST["HoTen"];
    $user["Password"] = sha1($user["randomkey"].$_POST["Password"]);
    $user["DiaChi"] = "";
    $user["DienThoai"] = "";
    $user["Email"] = $_POST["Email"];
    $user["NgayDangKy"] = date("Y-m-d H:i:s", time());
    $user["idGroup"] = "";
    $user["GioiTinh"] = 1;
    $user["active"] = 1;
    
    $user["TinhThanh"] = "0";
    $user["QuanHuyen"] = "0";
    $user["PhuongXa"] = "0";
    $kt = TimUserTheoEmail($user["Email"]);
    if ($kt->num_rows > 0) {
        throw new Exception("Email Đã Được Sử Dụng");
    }
    $isInsert = ThemUser($user);
    if($isInsert == false){
        throw new Exception("Đăng Ký Không Thành Công");
    }
    
    $kt = TimUserTheoEmail($user["Email"]);
    $_SESSION["User"] = $kt->fetch_assoc();
    header("Location: index.php?pages=dangnhap");
} catch (Exception $ex) {
    // có lỗi khi đăng ký
    echo $ex->getMessage();
    $_SESSION["Error"] = $ex->getMessage();
    header("Location: index.php?pages=dangky");
}
