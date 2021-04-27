<option value="" >
        Chọn Tỉnh Thành
    </option>
<?php 
$DataJson  = file_get_contents("public/tinhthanhpho/tinh_tp.json");
//echo $DataJson;
$dataJson2Array = json_decode($DataJson);
// var_dump($dataJson2Array);
// print_r($dataJson2Array);
foreach($dataJson2Array as $item)
{
    ?>
    <option value="<?php  echo $item->code ?>" >
        <?php echo $item->name ?>
    </option>
    <?php 
}
?>