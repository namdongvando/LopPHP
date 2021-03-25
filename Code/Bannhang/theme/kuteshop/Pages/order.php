<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Your shopping cart</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Shopping Cart Summary</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            <div class="heading-counter warning">Sản Phẩm:
                <span><?php echo count($_SESSION["GioHang"]); ?></span>
            </div>
            <div class="order-detail-content">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Sản Phẩm</th>
                            <th>Mô Tả</th>
                            <th>Tình Trạng</th>
                            <th>Đơn Giá</th>
                            <th width="150px">Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th class="action">
                                <a href="/index.php?pages=giohang&XoaHet=1"><i class="fa fa-trash-o"></i></a>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $gioHang = $_SESSION["GioHang"];
                        $tongTien = 0;
                        if ($gioHang)
                            foreach ($gioHang as $idSanPham => $SanPham) {
                                $thangTien = $SanPham["SoLuong"] * $SanPham["GiaKM"];
                                $tongTien += $thangTien;
                        ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="<?php echo LinkSanPham($SanPham["idDT"]) ?>">
                                        <img src="<?php echo UrlHinh($SanPham["urlHinh"]); ?>" alt="Product">
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name">
                                        <a href="<?php echo LinkSanPham($SanPham["idDT"]) ?>">
                                            <?php echo $SanPham["TenDT"] ?>
                                        </a>
                                    </p>
                                    <small class="cart_ref">SKU : #<?php echo $SanPham["idDT"] ?></small><br>
                                </td>
                                <td class="cart_avail"><span class="label label-success">Còn Hàng</span></td>
                                <td class="price"><span><?php echo GiaVND($SanPham["GiaKM"]);  ?></span></td>
                                <td class="qty">
 
                                    <input 
                                    onchange="window.location.href
                                    ='/index.php?pages=giohang&CapNhatSanPhamGH=<?php 
                                    echo $SanPham["idDT"];
                                     ?>&SL='+this.value" class='form-control input-sm' type="text" value="<?php echo $SanPham["SoLuong"] ?>">
                                    <a href="/index.php?pages=giohang&TangGH=<?php echo $SanPham["idDT"] ?>"><i class="fa fa-caret-up"></i></a>
                                    <a href="/index.php?pages=giohang&GiamGH=<?php echo $SanPham["idDT"] ?>"><i class="fa fa-caret-down"></i></a>
                                </td>
                                <td class="price">
                                    <span><?php echo GiaVND($SanPham["GiaKM"] * $SanPham["SoLuong"]); ?></span>
                                </td>
                                <td class="action">
                                    <a href="index.php?pages=giohang&XoaGH=<?php echo $SanPham["idDT"]; ?>">Delete item</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Tổng Tiền</td>
                            <td colspan="2"><?php echo GiaVND($tongTien); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Tiền Thanh Toán(đã có VAT)</strong></td>
                            <td colspan="2"><?php echo GiaVND($tongTien * 1.1); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->