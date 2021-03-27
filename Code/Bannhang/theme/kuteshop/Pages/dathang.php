<?php
$hinhThucGiaoHang = GetOptionByGroups(HinhThucGiaoHang);
$hinhThanhToan = GetOptionByGroups(HinhThucThanhToan);

?>
<form action="" id="FormDatHang" method="POST">

    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">Checkout</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Checkout</span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content checkout-page">

                <h3 class="checkout-sep">2. Thông Tin Khách Hàng</h3>
                <div class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-sm-4">
                                <label class="required">Họ & Tên</label>
                                <input type="text" class="input form-control" name="HoTen" id="TenKhachHang">
                            </div>
                            <!--/ [col] -->
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Email</label>
                                <input type="text" class="input form-control" name="Email" id="Email">
                            </div>
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Điện Thoại</label>
                                <input type="text" class="input form-control" name="DienThoai" id="DienThoai">
                            </div>
                            <div class="col-sm-4">
                                <label for="first_name" class="required">Tỉnh Thành</label>
                                <select class="form-control ajaxSelect ajaxHtml" name="TinhThanh" data-urlselect="ajax.php?pages=quanhuyen&code=" data-target="#QuanHuyen" data-url="ajax.php?pages=tinhthanh" data-id="#TinhThanh" id="TinhThanh"></select>
                            </div>
                            <!--/ [col] -->
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Quận Huyện</label>
                                <select name="QuanHuyen" class="input form-control ajaxSelect" data-target="#PhuongXa" data-urlselect="ajax.php?pages=phuongxa&code=" name="" id="QuanHuyen"></select>
                            </div>
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Phường Xã</label>
                                <select name="PhuongXa" class="input form-control" name="" id="PhuongXa"></select>
                            </div>
                            <div class="col-sm-12">
                                <label for="email_address" class="required">Đường, Số Nhà</label>
                                <input name="SoNha" class="input form-control" name="" id="SoNha"></input>
                            </div>
                            <!--/ [col] -->
                        </li>
                        <!--/ .row -->
                        <li>
                            <label class="btn btn-primary">
                                <input type="checkbox" checked id="isNhanHang"> Tôi Là Người Nhận Hàng
                            </label>
                        </li>
                    </ul>
                </div>
                <h3 class="checkout-sep">3. Thông Tin Giao Hàng</h3>
                <div id="ThongTinGiaoHang" class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-sm-4">
                                <label for="first_name" class="required">Họ & Tên</label>
                                <input type="text" class="input form-control" name="HoTen1" id="HoTe1">
                            </div>
                            <!--/ [col] -->
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Email</label>
                                <input type="text" class="input form-control" name="Email1" id="Email1">
                            </div>
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Điện Thoại</label>
                                <input type="text" class="input form-control" name="DienThoai1" id="DienThoai1">
                            </div>
                            <div class="col-sm-4">
                                <label for="first_name" class="required">Tỉnh Thành</label>
                                <select name="TinhThanh1" class="form-control ajaxSelect ajaxHtml" data-urlselect="ajax.php?pages=quanhuyen&code=" data-target="#QuanHuyen1" data-url="ajax.php?pages=tinhthanh" data-id="#TinhThanh1" id="TinhThanh1"></select>
                            </div>
                            <!--/ [col] -->
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Quận Huyện</label>
                                <select name="QuanHuyen1" class="input form-control ajaxSelect" data-target="#PhuongXa1" data-urlselect="ajax.php?pages=phuongxa&code=" name="" id="QuanHuyen1"></select>
                            </div>
                            <div class="col-sm-4">
                                <label for="email_address" class="required">Phường Xã</label>
                                <select name="PhuongXa1" class="input form-control" name="" id="PhuongXa1"></select>
                            </div>
                            <div class="col-sm-12">
                                <label for="email_address" class="required">Đường, Số Nhà</label>
                                <input name="SoNha1" class="input form-control" name="" id="SoNha1"></input>
                            </div>
                            <!--/ [col] -->
                        </li>
                        <!--/ .row -->

                    </ul>

                </div>
                <h3 class="checkout-sep">4. Hình Thức Giao Hàng</h3>
                <div class="box-border">
                    <ul class="shipping_method">
                        <?php
                        while ($row = $hinhThucGiaoHang->fetch_assoc()) {
                        ?>
                            <li>
                                <label>
                                    <input type="radio" checked value="<?php echo $row["Code"] ?>" name="HTGH">
                                    <?php echo $row["Name"] ?>
                                </label>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">5. Hình Thưc Thanh Toán</h3>
                <div class="box-border">
                    <ul>
                        <?php
                        while ($row = $hinhThanhToan->fetch_assoc()) {
                        ?>
                            <li>
                                <label>
                                    <input type="radio" checked value="<?php echo $row["Code"] ?>" name="HTTT">
                                    <?php echo $row["Name"] ?>
                                </label>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">6. Danh sách Sản Phẩm</h3>
                <div class="box-border ajaxHtml" id="gioHang" data-id="#gioHang" data-url="ajax.php?pages=giohangfull">
                </div>
                <button class="button pull-right">Đặt Hàng</button>
            </div>
        </div>
    </div>
</form>