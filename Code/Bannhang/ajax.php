<?php 
 $start = microtime(true); 
include("ConnectDB.php");
include("Functions.php");
$pages =  "index";
if(isset($_GET["pages"])){
    $pages = $_GET["pages"];
} 
$_Content = "./theme/{$_theme}/Ajax/".$pages.".php";
// $_Content = "./Pages/{$pages}.php";
include_once($_Content);

?>