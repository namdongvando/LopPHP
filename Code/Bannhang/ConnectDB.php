<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Ho_Chi_Minh");
define("vndate" , "d-m-Y H:i:s");
define("dbdate" , "Y-m-d H:i:s");


ob_start();
session_start();
$GLOBALS["db"]  = new mysqli('localhost', 'root', '', 'quanlytintuc'); 
if($db->connect_errno>0) die( "Lỗi: " . $db->connect_error ); 
$db->set_charset("utf8");

?>
