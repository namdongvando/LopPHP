<?php
ob_start();
session_start();
$db = new mysqli('localhost', 'root', '', 'quanlytintuc'); 
if($db->connect_errno>0) die( "Lỗi: " . $db->connect_error ); 
$db->set_charset("utf8");

?>
