<?php
$_pages =  
isset($_GET["pages"])?$_GET["pages"]:'index';
$_Content = __DIR__."/Pages/{$_pages}.php";
if(file_exists($_Content)== false){
    header("HTTP/1.0 404 Not Found");
    die("Không có file");
}
?>