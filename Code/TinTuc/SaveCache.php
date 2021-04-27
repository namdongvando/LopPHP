<?php 
 $fileName = md5($_SERVER["REQUEST_URI"]);

$filePath = "cache/{$fileName}.txt";
if(!file_exists($filePath))
{
    fopen($filePath,"w");
}
$myFile = fopen($filePath,"w");

$content = ob_get_clean();
$content = str_replace(
    "__fullname__","Teo nguyen",$content)
    ;
echo $content;

fwrite($myFile,$content);


?>