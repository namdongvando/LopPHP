<?php 

 $filePath = "cache/config.txt";
 echo filemtime($filePath);
echo "<br>";
 echo date("Y-m-d H:i:s",filemtime($filePath));
 echo date(vndate,time());
// kiem tra thu muc có hay không 
if(is_dir("cache")==false){
    mkdir("cache",0777);
}
// kiem tra co file chưa
if(!file_exists($filePath)){
    $myfile = fopen($filePath,"w+");    
}
$myfile = fopen($filePath,"w");
fwrite($myfile,"asd asdas");
fclose($myfile);

$myfile = fopen($filePath,"r+");
$content = fread($myfile,filesize($filePath));
fclose($myfile);
// var_dump($content);
echo $content;
 
//die();

?>