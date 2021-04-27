<?php
$keyword = $_GET["tukhoa"];
$DSSanPham =  TimSanPhamTheoTen($keyword, 0);
?>
<ul class="list-group">
    <?php while ($row = $DSSanPham->fetch_assoc()) {
    ?>
        <li class="list-group-item">
        <img style="height: 70px;" src="<?php echo UrlHinh($row["urlHinh"]); ?>" alt="">
            <a  href="<?php echo LinkSanPham($row["idDT"]); ?>" role="button">
                <?php echo $row['TenDT']; ?>
            </a>
            <span><?php echo GiaVND($row["GiaKM"]);  ?></span>
        </li>

    <?php  } ?>
</ul>