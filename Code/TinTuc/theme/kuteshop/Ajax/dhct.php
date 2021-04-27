<?php
// co ma hóa 
$MaDH = $_REQUEST["madh"];
$DSSanPham = GetDonHangChiTiet($MaDH, true);

?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dem = 1;
        while ($row = $DSSanPham->fetch_assoc()) {
        ?>
            <tr>
                <th><?php echo $dem++; ?></th>
                <th><?php echo $row["TenDT"]; ?></th>
                <th><?php echo GiaVND($row["Gia"]); ?></th>
                <th><?php echo $row["SoLuong"] ; ?></th>
                <th><?php echo GiaVND($row["SoLuong"] * $row["Gia"]); ?></th>
            </tr>
        <?php
        }

        ?>

    </tbody>
</table>