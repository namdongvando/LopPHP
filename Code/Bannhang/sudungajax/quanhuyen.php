<option value="" >
        Chọn Quận/Huyện
    </option>
<?php 
$code  = isset($_GET["code"])?$_GET["code"]:"" ;
// lấy  file chứa danh sách quận huyện theo tinh
$fileNameData  = 
"../public/tinhthanhpho/quan-huyen/{$code}.json";
if(!file_exists($fileNameData))
{
    die();
}
$DataJson  = file_get_contents($fileNameData);
//echo $DataJson;
$dataJson2Array = json_decode($DataJson);
// var_dump($dataJson2Array);
// print_r($dataJson2Array);
foreach($dataJson2Array as $item)
{
    ?>
    <option value="<?php  echo $item->code ?>" >
        <?php echo $item->name_with_type ?>
    </option>
    <?php 
}
?>