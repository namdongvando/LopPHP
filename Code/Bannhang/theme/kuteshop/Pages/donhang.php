<?php
$khachHang = $_SESSION["KhachHang"];
// ds don hang
$DSDonHang = GetDonHangByUser($khachHang["idUser"]);
?>
<div class="container">
    <div class="col-md-3">
        <div class="list-group">
            <a href="/index.php?pages=profile" class="list-group-item ">
                <p class="list-group-item-text">Thông tin tài khoản</p>
            </a>
            <a href="/index.php?pages=yeuthich" class="list-group-item  ">
                <p class="list-group-item-text">Yêu Thích</p>
            </a>
            <a href="/index.php?pages=donhang" class="list-group-item  ">
                <p class="list-group-item-text">Đơn Hàng</p>
            </a>
            <a href="/index.php?pages=baomat" class="list-group-item active ">
                <p class="list-group-item-text">Bảo Mật</p>
            </a>
            <a href="/index.php?pages=dangxuat" class="list-group-item  ">
                <p class="list-group-item-text">Đăng Xuất</p>
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <h2>Đơn Hàng</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Ngày Đặt</th>
                    <th>Người Nhận</th>
                    <th>SĐT</th>
                    <th>Tổng Tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dem = 1;
                if ($DSDonHang) {
                    while ($row = $DSDonHang->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $dem++; ?></td>
                            <td><?php echo $row["idDH"] ?></td>
                            <td><?php echo $row["ThoiDiemDatHang"] ?></td>
                            <td><?php echo $row["TenNguoiNhan"] ?></td>
                            <td><?php echo $row["DTNguoiNhan"] ?></td>
                            <td><?php echo GiaVND($row["TongTien"]);  ?></td>
                            <td><button  data-url="/ajax.php?pages=dhct&madh=<?php echo sha1($row["idDH"]);  ?>" class="btn btnAjax btn-success" data-id="#ChiTietDonHang<?php echo $dem; ?>" >Xem</button></td>
                        </tr>
                        <tr>
                            <td colspan="7" id="ChiTietDonHang<?php echo $dem; ?>" >
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>



    </div>
</div>