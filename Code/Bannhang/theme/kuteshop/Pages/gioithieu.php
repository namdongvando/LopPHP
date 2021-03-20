<div class="container" style="margin-top: 15px;" >
    <div class="breadcrumb clearfix">
        <a class="home" href="#" title="Return to Home">Trang Chủ</a>
        <span class="navigation-pipe">&nbsp;</span>
        <span class="navigation_page">Giới Thiệu</span>
    </div>

<!-- 1 -->
<?php 
    $alias =  $_GET["alias"];
    $loaiTin = GetLoaiTinByAlias($alias);
    echo $loaiTin["NoiDung"];    
?>

</div>