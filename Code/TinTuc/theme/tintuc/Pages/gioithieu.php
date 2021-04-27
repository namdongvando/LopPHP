<div class="container" style="margin-top: 15px;" >
<!-- 1 -->
<?php 
    $alias =  $_GET["alias"];
    $loaiTin = GetLoaiTinByAlias($alias);
    echo $loaiTin["NoiDung"];    
?>

</div>