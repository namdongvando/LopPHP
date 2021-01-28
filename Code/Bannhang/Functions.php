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

