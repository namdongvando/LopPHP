<?php
define("HinhThucThanhToan", "HTTT");
define("HinhThucGiaoHang", "HTGH");
if (file_exists("vendor/autoload.php")) {
    include_once("vendor/autoload.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function Db()
{
    return $GLOBALS['db'];
}

function XinChao($hoTen)
{

    return "Xin chao" . $hoTen;
}

function  GetLoaiById($id)
{
    $sql = "SELECT * FROM `nn_loai`
     WHERE `idLoai` = {$id}";
    $res = Db()->query($sql);
    $loai = $res->fetch_array();
    return $loai;
}

function UpdateLoai($loai)
{
    $sql = "UPDATE `nn_loai` SET 
    `TenLoai`='{$loai['TenLoai']}',
    `GhiChu`='{$loai['GhiChu']}',
    `HinhAnh`='{$loai['HinhAnh']}' WHERE `MaLoai` = {$loai['MaLoai']}";
    Db()->query($sql);
}
function InsertLoai($loai)
{
    $sql = "INSERT INTO `nn_loai` SET 
    `TenLoai`='{$loai['TenLoai']}',
    `GhiChu`='{$loai['GhiChu']}',
    `HinhAnh`='{$loai['HinhAnh']}'";
    Db()->query($sql);
}
function UploadFile($fileUpload, $filePath)
{
    copy($fileUpload["tmp_name"], $filePath);
}
// lấy danh sách tài khoản và phân trang
function GetAdminsPT($keyword, $pagesNumber, $rowNumber, &$total)
{
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `nn_admin` 
    WHERE `Name` LIKE '%{$keyword}%' 
    OR `Username` LIKE '%{$keyword}%' 
    OR `Email` LIKE '%{$keyword}%' 
    OR `Phone` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}
// lấy danh sách tài khoản và phân trang
function GetLoaiPT($keyword, $pagesNumber, $rowNumber, &$total)
{
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `nn_loai` 
   WHERE `TenLoai` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}
//  $sql = "SELECT * FROM `nn_loai`";
//  $db->query($sql); 

function InsertTaiKhoan($tk)
{
    $sql = "INSERT INTO 
    `nn_admin` 
    (`Id`,  `Name`,  `Username`,  `Password`, 
    `Randomkey`,  `Email`,  `Phone`,  `BOD`, 
    `Sex`,  `Address`, `Active`, `GGCode`) 
    VALUES (NULL, '{$tk["Name"]}', '{$tk["Username"]}',
     '{$tk["Password"]}', 
     '{$tk["Randomkey"]}',
      '{$tk["Email"]}', 
      '{$tk["Phone"]}', 
      '{$tk["BOD"]}', 
      '{$tk["Sex"]}', 
      '{$tk["Address"]}', 
      '{$tk["Active"]}', NULL)";
    Db()->query($sql);
}
function RandomString($lenght = 10)
{
    $strrand = time() . rand(0, time());
    $strrand = sha1($strrand);
    return substr($strrand, 0, ($lenght - 1));
}

function GetTaiKhoanByUsername($un)
{
    // tìm tài khoản theo username
    $sql = "SELECT * FROM `nn_admin` where Username = '{$un}'";
    $res =  Db()->query($sql);
    if ($res->num_rows > 0)
        return $res->fetch_array();
    return null;
}
function GetTaiKhoanByEmail($email)
{
    // tìm tài khoản theo username
    $sql = "SELECT * FROM `nn_admin` where Email = '{$email}'";
    $res =  Db()->query($sql);
    if ($res->num_rows > 0)
        return $res->fetch_array();
    return null;
}
function PhanTrang($totalPages, $curentPage, $link)
{
    $next = $curentPage + 1;
    $next = min($totalPages, $next);

    $prev = $curentPage - 1;
    $prev = max(1, $prev);

    $start = $curentPage - 3;
    $start = max(1, $start);
    $end = $curentPage + 3;
    $end = min($totalPages, $end);
    // linh next
    $linkNext = str_replace("[i]", $next, $link);
    // linh prev
    $linkPrev = str_replace("[i]", $prev, $link);
    // linh Last
    $linkLast = str_replace("[i]", $totalPages, $link);
    // linh First
    $linkFirst = str_replace("[i]", 1, $link);
    //?pages=danhsachtaikhoan&pagesNumber=[i]

    $isFirst = $curentPage == 1 ? "hidden" : "";
    $isLast = $curentPage == $totalPages ? "hidden" : "";

    $String = <<<PHANTRANG

<ul class="pagination">
    <li class="{$isFirst}" >
        <a href="$linkFirst">
        First
        </a>
    </li>
    <li class="{$isFirst}" >
        <a href="$linkPrev">
            Prev
        </a>
    </li>
     __for__   
    <li class="{$isLast}" >   
        <a href="$linkNext">
            next
        </a>
    </li>
    <li class="{$isLast}" >
        <a href="$linkLast">
            Last
        </a>
    </li>

</ul>

PHANTRANG;

    $forString = "";

    for ($i = $start; $i <= $end; $i++) {
        // tao linnk cho trang
        $linkPages = str_replace("[i]", $i, $link);
        // xac dinh có active
        $active = $curentPage == $i ? "active" : "";
        // thêm trang đó vào forString
        $strPages = "<li class='{$active}' ><a href='{$linkPages}'>{$i}</a></li>";
        $forString .= $strPages;
    }
    // đổi __for__ thành danh sach lap
    $String = str_replace("__for__", $forString, $String);
    return $String;
}
// lấy hàng hóa phan trang
function GetHHPT($keyword, $pagesIndex, $pagesNumber, &$total)
{
    // tính vị trí cần lấy theo trang
    $pagesIndex = $pagesIndex - 1;
    $pagesIndex = max($pagesIndex, 0);
    // câu lenh truy vấn lấy tất cả các dòng
    $sql =  "SELECT * FROM `nn_hanghoa` WHERE 
    `Code` LIKE '%{$keyword}%' 
    or `TenHH` LIKE '%{$keyword}%'";
    // thực hiện câu lệnh truy vấn
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // lấy các dòng o trang hiện tại
    $sql .= " limit {$pagesIndex},{$pagesNumber}";
    // thưc hiện truy vấn
    return Db()->query($sql);
}
function GetNccPT($keyword, $pagesNumber, $rowNumber, &$total)
{
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `nn_nhacungcap` 
   WHERE `TenCTY` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}
function Login($username, $password)
{
    $sql = "SELECT * FROM `nn_admin` 
 WHERE (
     `Username` = '{$username}' 
     or `Email` = '{$username}'
     ) and 
     `Password` = sha1(CONCAT(`Randomkey`,'{$password}'))";
    //thực hien truy vấn     
    $res = Db()->query($sql);
    if ($res == null)
        return null;
    // lấy tổng số dòng
    $total = $res->num_rows;
    if ($total > 0)
        return $res->fetch_array();

    return null;
}

function UserUpdate($username, $info)
{
    $sql = "UPDATE `nn_admin` SET 
     `Email` = '{$info["Email"]}', 
     `Phone` = '{$info["Phone"]}', 
     `BOD` = '{$info["BOD"]}', 
     `Sex` = '{$info["Sex"]}', 
     `Address` = '{$info["Address"]}' 
     WHERE `Username` = '{$username}'";
    return Db()->query($sql);
}
function UserUpdatePassword($username, $password)
{
    $sql = "UPDATE `nn_admin` 
     SET  `Password`= SHA1(concat(`Randomkey`,'{$password}')) 
     WHERE `Username` = '{$username}'";
    return Db()->query($sql);
}
function GetQuangCaoByGroups($groups)
{
    $sql = "SELECT * FROM `nn_quangcao` 
    WHERE `Groups` = '{$groups}' 
    ORDER BY `STT`";
    return Db()->query($sql);
}
function TopSanPhamBanChay($number = 10)
{
    // 10 sản phẩm bán chạy nhất
    $sql = "SELECT * FROM `dienthoai` 
    ORDER BY `SoLanMua`  DESC limit 0,{$number}";
    return Db()->query($sql);
}
function TopSanPhamGiamGia($number = 10)
{
    // 10 sản phẩm giảm Giá
    $sql = "SELECT * FROM `dienthoai` 
    Where `GiaKM` < `Gia` 
    ORDER BY `Gia` DESC 
    limit 0,{$number}";
    return Db()->query($sql);
}
function TopSanPhamMoi($number = 10)
{
    // 10 sản phẩm giảm Giá
    $sql = "SELECT * FROM `dienthoai` 
    ORDER BY `NgayCapNhat` DESC 
    limit 0,{$number}";
    return Db()->query($sql);
}
function GetDienThoaiByIdLoai($idLoai, $number = 10)
{
    $sql = "SELECT * FROM `dienthoai` 
    where `idLoai` = '{$idLoai}' 
    ORDER BY `NgayCapNhat` DESC limit 0,{$number}";
    return Db()->query($sql);
}
function GetDienThoaiByIdLoaiPT($idLoai, $pagesIndex, $rowNumber, $order, &$total)
{
    // tinh vi trí 
    $pagesIndex = ($pagesIndex - 1) * $rowNumber;
    $pagesIndex = max(0, $pagesIndex);
    $order = $order == "name" ? "TenDT" : "GiaKM";
    $order = " ORDER BY `{$order}` ASC ";
    $sql  = "SELECT * FROM `dienthoai` WHERE `idLoai` = '{$idLoai}'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    $sql  .= $order . " limit {$pagesIndex},{$rowNumber} ";
    // echo $sql;
    return Db()->query($sql);
    //     // cau lenh truy vấn
    //     $sql = "SELECT * FROM `nn_nhacungcap` 
    //    WHERE `TenCTY` LIKE '%{$keyword}%'";
    //     $res = Db()->query($sql);
    //     // lấy tổng số dòng
    //     $total = $res->num_rows;
    //     // giới hạn số lượng dòng trả về
    //     $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    //     // trả về các dòng hiển thị
    //     return Db()->query($sql);

}
function GetDienThoaiBanChayNhatTheoLoai($idLoai)
{
    $sql = "SELECT * FROM `dienthoai` 
    where `idLoai` = '{$idLoai}' 
    ORDER BY `SoLanMua` DESC limit 0,10";
    return Db()->query($sql);
}
function GetLoaiTinByAlias($alias)
{
    $sql = "SELECT * FROM `loaitin` 
    where `Alias` = '{$alias}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}
function GetLoaiByAlias($alias)
{
    $sql = "SELECT * FROM `nn_loai` 
    where `TenKhongDau` = '{$alias}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}
function LinkSanPham($idSanPham)
{
    return "/index.php?pages=chitietsanpham&idsp={$idSanPham}";
}
function GetDienThoaiByIdDT($idDT)
{
    $sql = "SELECT * FROM `dienthoai` 
    WHERE `idDT` ='{$idDT}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}
// 
function GetThuocTinhByIdDT($idDT)
{
    $sql = "SELECT * FROM `thuoctinh` WHERE `idDT` = '{$idDT}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_assoc();
    return null;
}
function GetHinhByIdDT($idDT)
{
    $sql = "SELECT * FROM `hinh` 
    WHERE `idDT` ='{$idDT}'";
    $res =  Db()->query($sql);
    return $res;
}
function UrlHinh($fileName)
{
    return "/public/images/upload/hinhchinh/{$fileName}";
}
function UrlHinhPhu($fileName)
{
    return "/public/images/upload/hinhphu/{$fileName}";
}
function GetNameThuocTinh($k)
{
    $a = [
        "tinh_nang_noi_bat" => "Tính Năng Nổi Bật",
        "may_anh" => "Máy ảnh",
        "dac_tinh_may_anh" => "Tính Năng Nổi Bật",
        "may_phu_anh" => "Má Ảnh Phụ",
        "video_call" => "Video Call",
        "quay_phim" => "Quay Phim",
        "xem_phim" => "Xem Phim",
        "nghe_nhac" => "Nghe Nhạc",
        "fm_radio" => "FM Radio",
        "xem_tivi" => "Tính Năng Nổi Bật",
        "ghi_am" => "Tính Năng Nổi Bật",
    ];
    if (isset($a[$k]))
        return $a[$k];
    return "";
}
function GiaVND($number)
{
    return number_format($number, 0, ",", ".") . "<sup>đ</sup>";
}
function GetOptionByGroups($Groups)
{
    $sql = "SELECT * FROM `options` 
    WHERE `groups` ='{$Groups}'";
    $res =  Db()->query($sql);
    return $res;
}
function TaoDonHang($donHang)
{
    $iduser = 0;

    $sql = "INSERT INTO `donhang`(`idDH`, `idUser`, `ThoiDiemDatHang`, `TenNguoiNhan`, `DTNguoiNhan`, `DiaChi`, `TongTien`, `idPTTT`, `idPTGH`, `Tax`, `Shipping`, `DaXuLy`, `GhiChu`, `DaTraTien`) VALUES (null,
     '{$donHang["idUser"]}',
      '{$donHang["ThoiDiemDatHang"]}',
      '{$donHang["TenNguoiNhan"]}', 
      '{$donHang["DTNguoiNhan"]}', 
      '{$donHang["DiaChi"]}', 
      '{$donHang["TongTien"]}', 
      '{$donHang["idPTTT"]}', 
      '{$donHang["idPTGH"]}', 
      '{$donHang["Tax"]}', 
      '{$donHang["Shipping"]}', 
      '{$donHang["DaXuLy"]}', 
      '{$donHang["GhiChu"]}', 
      '{$donHang["DaTraTien"]}' 
       )";
    $res =  Db()->query($sql);
    return DB()->insert_id;;
}
function DonHangChiTiet($sanPham)
{
    $sql = "INSERT INTO `donhangchitiet`(`idChiTiet`, `idDH`, `idDT`, `TenDT`, `SoLuong`, `Gia`) VALUES (
       null, 
       '{$sanPham["idDH"]}', 
       '{$sanPham["idDT"]}', 
       '{$sanPham["TenDT"]}', 
       '{$sanPham["SoLuong"]}', 
       '{$sanPham["Gia"]}')";
    $res =  Db()->query($sql);

    return $res;
}
function TimSanPhamTheoTen($TuKhoa, $loai = 0)
{
    if ($loai > 0)
        $sql = "SELECT * FROM `dienthoai` WHERE 
    (`TenDT` LIKE '%{$TuKhoa}%' 
    or `MoTa` LIKE '%{$TuKhoa}%') and `idCL` = '{$loai}' ORDER by `HOT` DESC";
    else
        $sql = "SELECT * FROM `dienthoai` WHERE 
    `TenDT` LIKE '%{$TuKhoa}%' 
    or `MoTa` LIKE '%{$TuKhoa}%' ORDER by `HOT` DESC";

    $res =  Db()->query($sql);
    return $res;
}

function LinkThemGioHang($idDT)
{
    return "/index.php?pages=giohang&ThemGioHang={$idDT}";
}
function GetChungLoaiPT()
{
    $sql = "SELECT * FROM `chungloai`";
    $res =  Db()->query($sql);

    return $res;
}
function TimUserTheoEmail($email)
{
    $sql = "SELECT * FROM `users` WHERE `Email`='{$email}'";
    $res =  Db()->query($sql);
    return $res;
}
function ThemUser($user)
{
    echo $sql = "INSERT INTO `users`(`idUser`, `HoTen`, `Password`, `DiaChi`, `DienThoai`, `Email`, `NgayDangKy`, `idGroup`, `GioiTinh`, `active`, `randomkey`, `TinhThanh`, `QuanHuyen`, `PhuongXa`) 
    VALUES (
        null, 
        '{$user["HoTen"]}', 
        '{$user["Password"]}', 
        '{$user["DiaChi"]}', 
        '{$user["DienThoai"]}', 
        '{$user["Email"]}', 
        '{$user["NgayDangKy"]}', 
        '{$user["idGroup"]}', 
        '{$user["GioiTinh"]}', 
        '{$user["active"]}', 
        '{$user["randomkey"]}', 
        '{$user["TinhThanh"]}', 
        '{$user["QuanHuyen"]}', 
        '{$user["PhuongXa"]}')";
    $res =  Db()->query($sql);
    return $res;
}
function GetUserByEmailPassword($username, $password)
{
    $sql  = "SELECT * FROM `users` WHERE `Email`='{$username}' 
    and `Password` = sha1(concat(`randomkey`,'{$password}'))";
    //thực hien truy vấn     
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    if ($total > 0)
        return $res->fetch_array();
    return null;
}
function SuaThongTinUser($user)
{
    $sql = "UPDATE `users` SET 
    `HoTen`= '{$user["HoTen"]}',
    `Password`= '{$user["Password"]}',
    `DiaChi`= '{$user["DiaChi"]}',
    `DienThoai`= '{$user["DienThoai"]}',
    `Email`= '{$user["Email"]}',
    `NgayDangKy`= '{$user["NgayDangKy"]}',
    `idGroup`= '{$user["idGroup"]}',
    `GioiTinh`= '{$user["GioiTinh"]}',
    `active`= '{$user["active"]}',
    `randomkey`= '{$user["randomkey"]}',
    `TinhThanh`= '{$user["TinhThanh"]}',
    `QuanHuyen`= '{$user["QuanHuyen"]}',
    `PhuongXa`= '{$user["PhuongXa"]}' 
    where `idUser`= '{$user["idUser"]}'";
    return Db()->query($sql);
}

function GuiMailCapNhatMatKhau($email)
{
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'soaivong01@gmail.com';                     //SMTP username
        $mail->Password   = 'smklwiqeppexqpkc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('soaivong01@gmail.com', 'Mailer');
        //$mail->addAddress('namdong92@gmail.com', 'Joe User');     //Add a recipient
        $mail->addAddress($email);               //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '[namdong]Tieu Đề Mail' . date("Y-m-d H:i:s", time());
        $mail->Body    = 'Có ai do dang nhap vao tai khoản cua bạn <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function GetDonHangByUser($userId)
{
    $sql = "SELECT * FROM `donhang` 
    WHERE `idUser` = '{$userId}'";
    return Db()->query($sql);
}
function GetDonHangChiTiet($MaDonHang, $MaHoa = false)
{
    if ($MaHoa == true) {
        $sql = "SELECT * FROM `donhangchitiet` 
        WHERE sha1(`idDH`) = '{$MaDonHang}'";
    } else {
        $sql = "SELECT * FROM `donhangchitiet` 
        WHERE `idDH` = '{$MaDonHang}'";
    }
    return Db()->query($sql);
}
function PostYeuThich($iduser, $idDT)
{
    $sql = "INSERT INTO `yeuthich`(`idDT`, `idUser`) 
    VALUES ('{$idDT}','{$iduser}')";
    return Db()->query($sql);
}
function GetDienThoaiByIduser($idUser)
{
    $sql  = "SELECT * FROM `yeuthich` WHERE `idUser` = '{$idUser}'";
    return Db()->query($sql);
}
function GetLoaiTin()
{
    $sql  = "SELECT * FROM `loaitin`";
    return Db()->query($sql);
}
function PostLoaiTin($LoaiTin)
{
    $LoaiTin["Alias"] = BoDauTiengViet($LoaiTin["TenLoai"]);

    $sql = "INSERT INTO `loaitin`(`idLT`, `TenLoai`, `Alias`, `Hinh`, `NoiDung`) 
    VALUES (
        null, 
        '{$LoaiTin["TenLoai"]}', 
        '{$LoaiTin["Alias"]}', 
        '{$LoaiTin["Hinh"]}', 
        '{$LoaiTin["NoiDung"]}')";
    return Db()->query($sql);
}
function BoDauTiengViet($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    $str = str_replace(" ", "-", str_replace("&*#39;", "", $str));
    $str = strtolower($str);
    return $str;
}

function DeleteLoaiTin($idLoai)
{
    $sql = "DELETE FROM `loaitin` WHERE  `idLT` = '{$idLoai}'";
    return Db()->query($sql);
}
function GetLoaiTinById($idLT)
{
    $sql = "SELECT * FROM `loaitin` WHERE `idLT` = '{$idLT}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}
function PutLoaiTin($LoaiTin)
{
    $sql = "UPDATE `loaitin` SET 
    `TenLoai`='{$LoaiTin["TenLoai"]}',
    `Alias`='{$LoaiTin["Alias"]}',
    `Hinh`='{$LoaiTin["Hinh"]}',
    `NoiDung`='{$LoaiTin["NoiDung"]}' WHERE `idLT`='{$LoaiTin["idLT"]}'";
    return Db()->query($sql);
}
function GetTinPT($name, $indexPages, $numberPages, &$tong)
{
    $indexPages = $indexPages - 1;
    $indexPages = max($indexPages, 0);
    $numberPages = intval($numberPages);
    $numberPages = max(1, $numberPages);
    $sql = "SELECT * FROM `tin` WHERE 
    `TieuDe` like '%{$name}%'";

    $res = Db()->query($sql);
    $tong = $res->num_rows;
    $sql = "SELECT * FROM `tin` WHERE 
    `TieuDe` like '%{$name}%' 
    ORDER BY `Ngay` LIMIT {$indexPages},{$numberPages}";
    return Db()->query($sql);
}
function PostTinTuc($tintuc)
{
    $sql =  "INSERT INTO `tin`(`idTin`, `TieuDe`, `TieuDe_KhongDau`, `TomTat`, `urlHinh`, `Ngay`, `Content`, `idLT`, `AnHien`) 
    VALUES (null, 
    '{$tintuc["TieuDe"]}', 
    '{$tintuc["TieuDe_KhongDau"]}', 
    '{$tintuc["TomTat"]}', 
    '{$tintuc["urlHinh"]}', 
    '{$tintuc["Ngay"]}', 
    '{$tintuc["Content"]}', 
    '{$tintuc["idLT"]}', 
    '{$tintuc["AnHien"]}')";
    Db()->query($sql);
    return Db();
}
function GetTinById($idTin)
{
    $sql = "SELECT * FROM `tin` 
    WHERE `idTin` = {$idTin}";
    $res =  Db()->query($sql);
    return $res->fetch_assoc();
}
function PutTinTuc($tintuc)
{
    $sql = "UPDATE `tin` SET 
    `TieuDe`='{$tintuc["TieuDe"]}',
    `TieuDe_KhongDau`='{$tintuc["TieuDe_KhongDau"]}',
    `TomTat`='{$tintuc["TomTat"]}',
    `urlHinh`='{$tintuc["urlHinh"]}',
    `Ngay`='{$tintuc["Ngay"]}',
    `Content`='{$tintuc["Content"]}',
    `idLT`='{$tintuc["idLT"]}',
    `TinHot`='{$tintuc["TinHot"]}',
    `AnHien`='{$tintuc["AnHien"]}' WHERE `idTin`='{$tintuc["idTin"]}'";
    return Db()->query($sql);
}
function PostMenu($menu)
{
    $Db = new model\DB();
    return $Db->InsetModel("nn_menu", $menu);
}

function GetMenu()
{
    $sql  = "SELECT * FROM `nn_menu` WHERE 1";
    return Db()->query($sql);
}
function GetMenuById($id)
{
    $sql  = "SELECT * FROM `nn_menu` WHERE `Ma`='{$id}'";
    $res =  Db()->query($sql);
    return $res->fetch_assoc();
}
function GetMenuByNhom($nhom, $capcha = 0)
{
    $sql  = "SELECT * FROM `nn_menu` WHERE `Nhom`='{$nhom}' and `CapCha` = '{$capcha}'";
    $res =  Db()->query($sql);
    return $res;
}

function PutMenu($menu)
{
    $sql  = "UPDATE `nn_menu` SET 
    `Ten`='{$menu["Ten"]}',
    `Link`='{$menu["Link"]}',
    `HinhAnh`='{$menu["HinhAnh"]}',
    `STT`='{$menu["STT"]}',
    `HienThi`='{$menu["HienThi"]}',
    `ViTri`='{$menu["ViTri"]}',
    `Nhom`='{$menu["Nhom"]}',
    `CapCha`='{$menu["CapCha"]}',
    `GhiChu`='{$menu["GhiChu"]}' WHERE `Ma`='{$menu["Ma"]}'";
    return Db()->query($sql);
}
function DateVN($Ngay)
{
    return date("d-m-Y H:i:s", strtotime($Ngay));
}
function GetRow($sql)
{
    $res = Db()->query($sql);
    if ($res == null) {
        return null;
    }
    return $res->fetch_assoc();
}
function GetRows($sql)
{
    $res = Db()->query($sql);
    if ($res == null) {
        return null;
    }
    $a = [];
    while ($row = $res->fetch_assoc()) {
        $a[] = $row;
    }
    return $a;
}
function GetNewTrending($number)
{
    $sql = "SELECT * FROM `tin` WHERE 
    `TinHot` = 1 and `AnHien` >0 limit 0,{$number}";
    return GetRows($sql);
}
function linkChiTietTin($tin)
{
    return "/index.php?pages=chitiettin&id={$tin["idTin"]}";
}
function GetNewSlide($number)
{
    $sql = "SELECT * FROM `tin` WHERE 
    `idLT` = 12 and `AnHien` >0 limit 0,{$number}";
    return GetRows($sql);
}
