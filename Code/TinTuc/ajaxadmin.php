<?php 
 $start = microtime(true); 
include("ConnectDB.php");
include("Functions.php");
$pages =  "index";
if(isset($_GET["pages"])){
    $pages = $_GET["pages"];
} 
$_Content = "./Pages/{$pages}.php";
include_once($_Content);

?>