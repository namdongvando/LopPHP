<?php
var_dump($_POST);
$isNhanhHang = isset($_POST["isNhanHang"]) ? true : false;

$donHang["idUser"] = 0;
$donHang["ThoiDiemDatHang"] = date("Y-m-d H:i:s", time());
if ($isNhanhHang) {
    $donHang["TenNguoiNhan"] = $_POST["HoTen"];
}else{
    $donHang["TenNguoiNhan"] = $_POST["HoTen1"];
}
$donHang["TenNguoiNhan"] = $isNhanhHang==true?$_POST["HoTen"]:$_POST["HoTen1"];
$donHang["DTNguoiNhan"] = $isNhanhHang==true?$_POST["DienThoai"]:$_POST["DienThoai1"];
if($isNhanhHang){
    $diaChi["TinhThanh"] = $_POST["TinhThanh"];
    $diaChi["QuanHuyen"] = $_POST["QuanHuyen"];
    $diaChi["PhuongXa"] = $_POST["PhuongXa"];
    $diaChi["SoNha"] = $_POST["SoNha"];
}else{
    $diaChi["TinhThanh"] = $_POST["TinhThanh1"];
    $diaChi["QuanHuyen"] = $_POST["QuanHuyen1"];
    $diaChi["PhuongXa"] = $_POST["PhuongXa1"];
    $diaChi["SoNha"] = $_POST["SoNha1"];
}
$donHang["DiaChi"] = json_encode($diaChi,JSON_UNESCAPED_UNICODE);
$donHang["TongTien"] = $_SESSION["TongTien"];
$donHang["idPTTT"] = $_POST["HTTT"];
$donHang["idPTGH"] = $_POST["HTGH"];
$donHang["Tax"] = 0;
$donHang["Shipping"] = 0;
$donHang["DaXuLy"] = 0;
$donHang["GhiChu"] = "";
$donHang["DaTraTien"] = 0;
// tao don hang
$maDonHang = TaoDonHang($donHang);
foreach($_SESSION["GioHang"] as $maDT=>$sanPham){
    $DonHangChiTiet["idDH"] = $maDonHang;
    $DonHangChiTiet["idDT"] = $sanPham["idDT"];
    $DonHangChiTiet["TenDT"] = $sanPham["TenDT"];
    $DonHangChiTiet["SoLuong"] = $sanPham["SoLuong"];
    $DonHangChiTiet["Gia"] = $sanPham["GiaKM"];
    DonHangChiTiet($DonHangChiTiet);
}
// cam on ban da dat hang
// header("/");



