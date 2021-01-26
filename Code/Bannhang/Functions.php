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
 function GetAdminsPT ($keyword,$pagesNumber,$rowNumber,$total){
    $sql = "SELECT * FROM `nn_admin` 
    WHERE `Name` LIKE '%a%' 
    OR `Username` LIKE '%a%' 
    OR `Email` LIKE '%a%' 
    OR `Phone` LIKE '%a%'";
 }