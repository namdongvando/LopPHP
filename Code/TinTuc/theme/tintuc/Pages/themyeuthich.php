<!--  
co cho người  không đang nhap yeu thich không?

 -->
 <?php
//  kiểm tra đã đăng nhập chưa 

if($_SESSION["KhachHang"]==null){
    // chưa đăng nhập
    header("Location: /index.php?pages=dangnhap");
    exit();
}

$idUser = $_SESSION["KhachHang"]['idUser'];
$idDT = $_REQUEST["mahh"];
PostYeuThich($idUser,$idDT);
header("Location: ".$_SERVER["HTTP_REFERER"]);

 ?>