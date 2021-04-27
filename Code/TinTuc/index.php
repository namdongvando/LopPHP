<?php 
spl_autoload_register(function ($clasName)
{
    $clasName = str_replace("\\","/",$clasName);
    
    include_once($clasName.".php");
    
});
    if(file_exists("vendor/autoload.php")){
        include_once("vendor/autoload.php");
    }

    include_once("./ConnectDB.php");
    include_once("./Functions.php");
    
    
    $_SESSION["GioHang"] = 
    isset($_SESSION["GioHang"])?$_SESSION["GioHang"]:[];
    $_SESSION["TongTien"] = 
    isset($_SESSION["TongTien"])?$_SESSION["TongTien"]:0;



    include_once("./theme/{$_theme}/layout.php");
    
?>