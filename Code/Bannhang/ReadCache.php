<?php 
 $fileName = md5($_SERVER["REQUEST_URI"]);

$filePath = "cache/{$fileName}.txt";
if(file_exists($filePath))
{
    $mFile = filemtime($filePath);
    if(time() - $mFile > 0){
        // xóa file
        unlink($filePath);
    }
}

if(file_exists($filePath))
{
    $myFile = fopen($filePath,"r");
    echo fread($myFile,filesize($filePath));
    exit();
}



?>

