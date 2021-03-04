<?php 

function Db(){
    return $GLOBALS['db'];
}

function XinChao($hoTen){

    return "Xin chao" . $hoTen; 
}

function  GetLoaiById($id){
    $sql = "SELECT * FROM `nn_loai`
     WHERE `MaLoai` = {$id}";
    $res = Db()->query($sql);
    $loai = $res->fetch_array();
    return $loai;
}  

function UpdateLoai($loai){
    $sql = "UPDATE `nn_loai` SET 
    `TenLoai`='{$loai['TenLoai']}',
    `GhiChu`='{$loai['GhiChu']}',
    `HinhAnh`='{$loai['HinhAnh']}' WHERE `MaLoai` = {$loai['MaLoai']}";
    Db()->query($sql);
}
 function InsertLoai($loai){
    $sql = "INSERT INTO `nn_loai` SET 
    `TenLoai`='{$loai['TenLoai']}',
    `GhiChu`='{$loai['GhiChu']}',
    `HinhAnh`='{$loai['HinhAnh']}'";
    Db()->query($sql);
 }
 function UploadFile($fileUpload,$filePath){
    copy($fileUpload["tmp_name"],$filePath);
 }
 // lấy danh sách tài khoản và phân trang
 function GetAdminsPT ($keyword,$pagesNumber,$rowNumber,&$total){
     // tính vị trí bắt đầu
     $pagesNumber = ($pagesNumber - 1)* $rowNumber;
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
    $sql = $sql ." limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
    
 } 
 // lấy danh sách tài khoản và phân trang
 function GetLoaiPT ($keyword,$pagesNumber,$rowNumber,&$total){
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1)* $rowNumber;
    // cau lenh truy vấn
   $sql = "SELECT * FROM `nn_loai` 
   WHERE `TenLoai` LIKE '%{$keyword}%'";
   $res = Db()->query($sql);
   // lấy tổng số dòng
   $total = $res->num_rows;
   // giới hạn số lượng dòng trả về
   $sql = $sql ." limit {$pagesNumber},{$rowNumber}";
   // trả về các dòng hiển thị
   return Db()->query($sql);
   
}
//  $sql = "SELECT * FROM `nn_loai`";
//  $db->query($sql); 

 function InsertTaiKhoan($tk){
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
function RandomString($lenght =10){
    $strrand = time().rand(0,time());
    $strrand = sha1($strrand);
    return substr($strrand,0,($lenght-1));
}

function GetTaiKhoanByUsername($un){
    // tìm tài khoản theo username
    $sql = "SELECT * FROM `nn_admin` where Username = '{$un}'";
    $res =  Db()->query($sql);
    if($res->num_rows > 0)
        return $res->fetch_array();
    return null;
}
function GetTaiKhoanByEmail($email){
    // tìm tài khoản theo username
    $sql = "SELECT * FROM `nn_admin` where Email = '{$email}'";
    $res =  Db()->query($sql);
    if($res->num_rows > 0)
        return $res->fetch_array();
    return null;
}
function PhanTrang($totalPages,$curentPage,$link){
    $next = $curentPage +1;
    $next = min($totalPages,$next);
    
    $prev = $curentPage - 1;
    $prev = max(1,$prev);
    
    $start = $curentPage - 3;
    $start = max(1,$start);
    $end = $curentPage + 3;
    $end = min($totalPages,$end);
    // linh next
    $linkNext = str_replace("[i]",$next,$link);
    // linh prev
    $linkPrev = str_replace("[i]",$prev,$link);
    // linh Last
    $linkLast = str_replace("[i]",$totalPages,$link);
    // linh First
    $linkFirst = str_replace("[i]",1,$link);
    //?pages=danhsachtaikhoan&pagesNumber=[i]

    $isFirst = $curentPage == 1?"hidden":"";
    $isLast = $curentPage == $totalPages?"hidden":"";

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

    for ($i=$start; $i <= $end ; $i++) { 
        // tao linnk cho trang
        $linkPages= str_replace("[i]",$i,$link);
        // xac dinh có active
        $active = $curentPage == $i?"active":"";
        // thêm trang đó vào forString
        $strPages = "<li class='{$active}' ><a href='{$linkPages}'>{$i}</a></li>";
        $forString.=$strPages;
    }
    // đổi __for__ thành danh sach lap
    $String = str_replace("__for__",$forString,$String);
    return $String;
}
// lấy hàng hóa phan trang
function GetHHPT($keyword,$pagesIndex,$pagesNumber,&$total){
    // tính vị trí cần lấy theo trang
    $pagesIndex = $pagesIndex-1;
    $pagesIndex= max($pagesIndex,0);
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
function GetNccPT ($keyword,$pagesNumber,$rowNumber,&$total){
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1)* $rowNumber;
    // cau lenh truy vấn
   $sql = "SELECT * FROM `nn_nhacungcap` 
   WHERE `TenCTY` LIKE '%{$keyword}%'";
   $res = Db()->query($sql);
   // lấy tổng số dòng
   $total = $res->num_rows;
   // giới hạn số lượng dòng trả về
   $sql = $sql ." limit {$pagesNumber},{$rowNumber}";
   // trả về các dòng hiển thị
   return Db()->query($sql);
   
}