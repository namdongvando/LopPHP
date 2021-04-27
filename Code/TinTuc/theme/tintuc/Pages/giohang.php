<?php
$_SESSION["GioHang"] =
    isset($_SESSION["GioHang"]) ? $_SESSION["GioHang"] : null;
// them giỏ hàng
// BƯơc1
if (isset($_REQUEST["ThemGH"])) {
    // idSanPham 
    //Bươc 1.0 lấy thông tin sản phẩm và số lượng
    echo $idSanPham = $_REQUEST["ThemGH"];
    echo $soLuong = isset($_REQUEST["SL"])
        ? intval($_REQUEST["SL"]) : 1;
    //    BƯớc 1.1  // kiểm tra có Sản Phẩm trong gio chưa
    if (isset($_SESSION["GioHang"][$idSanPham])) {
        // có sản phẩm trong giỏ hàng
        // buoc 1.1.1 cập nhật SỐ Lượng
        $_SESSION["GioHang"][$idSanPham]["SoLuong"]
            += $soLuong;
    } else {
        // không có sản phẩm trong giỏ hàng
        // BƯớc 1.1.2.0 Tìm Sản Phmẩ Trong Database
        $sanPham = GetDienThoaiByIdDT($idSanPham);
        $sanPham["SoLuong"] = $soLuong;
        // BƯớc 1.1.2.1 Thêm Sản Phẩm Vào Giỏ hàng
        $_SESSION["GioHang"][$idSanPham] = $sanPham;
    }
}
// xóa giỏ hàng
// BƯớc 2 Xóa Cái Gì? Xóa Ở Đâu?
if (isset($_REQUEST["XoaGH"])) {
    // xóa sản phẩm trong giỏ hàng theo id
    // Bước 2.1 Lấy id Sản Phẩm
    $idSanPham = $_REQUEST["XoaGH"];
    // xóa sản phẩm khỏi giỏ hàng
    unset($_SESSION["GioHang"][$idSanPham]);
}
// Bước 3 xóa hết
if (isset($_REQUEST["XoaHet"])) {
    $_SESSION["GioHang"] = null;
}
// bước 4 Tăng So Lượng
if (isset($_REQUEST["TangGH"])) {
    $idSanPham = $_REQUEST["TangGH"];
    // so luong mac định là 1
    $soLuong = isset($_REQUEST["SL"]) ? intval($_REQUEST["SL"]) : 1;
    $_SESSION["GioHang"][$idSanPham]["SoLuong"] += $soLuong;
}
// bước 5 Giam So Lượng
if (isset($_REQUEST["GiamGH"])) {
    $idSanPham = $_REQUEST["GiamGH"];
    // so luong mac định là 1
    $soLuong = isset($_REQUEST["SL"]) ? intval($_REQUEST["SL"]) : 1;
    $_SESSION["GioHang"][$idSanPham]["SoLuong"] -= $soLuong;
    $_SESSION["GioHang"][$idSanPham]["SoLuong"] =
        max(1, $_SESSION["GioHang"][$idSanPham]["SoLuong"]);
}
// bước 5 Cập Nhật 1 Sản Phẩm
if (isset($_REQUEST["CapNhatSanPhamGH"])) {
    $idSanPham = $_REQUEST["CapNhatSanPhamGH"];
    // so luong mac định là 1
    $soLuong = isset($_REQUEST["SL"]) ? intval($_REQUEST["SL"]) : 1;
    $_SESSION["GioHang"][$idSanPham]["SoLuong"] = $soLuong;
    $_SESSION["GioHang"][$idSanPham]["SoLuong"] =
        max(1, $_SESSION["GioHang"][$idSanPham]["SoLuong"]);
}
$_SESSION["TongTien"] = 0;

if ($_SESSION["GioHang"]) {
    $tongTien = 0;
    foreach ($_SESSION["GioHang"] as $sanPham) {
        $thanhTien = $sanPham["SoLuong"] * $sanPham["GiaKM"];
        $tongTien += $thanhTien;
    }
    $_SESSION["TongTien"] = $tongTien;
}

var_dump($_SESSION["GioHang"]);
header("Location: /index.php?pages=order");
