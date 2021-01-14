<?php
$id = $_GET["id"];
$sql1 = "SELECT * FROM `nn_hanghoa`
 WHERE `MaLoai` = {$id}";
$res1 = $db->query($sql1); 
if($res1->num_rows == 0){
    $sql = "DELETE FROM `nn_loai` 
    WHERE `MaLoai` = {$id}";
    $res = $db->query($sql);     
}
header("Location: ?pages=loai");

?>

