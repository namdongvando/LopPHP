<?php
$khachHang = $_SESSION["KhachHang"];
// ds don hang
$DSSanPhamYeuThich = GetDienThoaiByIduser($khachHang["idUser"]);
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
        <h2>Sản Phẩm Yêu Thích</h2>

        <ul class="row product-list grid">
            <?php
            while ($row = $DSSanPhamYeuThich->fetch_assoc()) {
                $dienThoai = GetDienThoaiByIdDT($row["idDT"]);
                $hinh = "./public/images/upload/hinhchinh/" . $dienThoai["urlHinh"];
            ?>
                <li class="col-sx-12 col-sm-4">
                    <div class="product-container">
                        <div class="left-block">
                            <a href="<?php echo LinkSanPham($dienThoai["idDT"]) ?>">
                                <img style="height: 250px;" class="img-responsive" alt="product" src="<?php echo $hinh ?>" />
                            </a>
                            <div class="quick-view">
                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                <a title="Add to compare" class="compare" href="#"></a>
                                <a title="Quick view" class="search" href="#"></a>
                            </div>
                            <div class="add-to-cart">
                                <a title="Add to Cart" href="#add">Thêm Giỏ Hàng</a>
                            </div>
                        </div>
                        <div class="right-block">
                            <h5 class="product-name">
                                <a href="<?php echo LinkSanPham($dienThoai["idDT"]) ?>">
                                    <?php echo $dienThoai["TenDT"]; ?>
                                </a>
                            </h5>
                            <div class="product-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="content_price">
                                <span class="price product-price">
                                    <?php echo
                                    number_format($dienThoai["GiaKM"], 0, ",", ".");

                                    ?>
                                    <sup style="top: 0;">đ</sup>
                                </span>
                                <?php
                                if ($dienThoai["Gia"] != $dienThoai["GiaKM"]) {
                                ?>
                                    <span class="price old-price">
                                        <?php
                                        number_format($dienThoai["Gia"], 0, ",", ".");
                                        ?>
                                        <sup>đ</sup>
                                    </span>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="info-orther">
                                <p>Mã Sản Phẩm: #<?php echo $dienThoai["idDT"] ?></p>
                                <p class="availability">Tình Trạng: <span>Còn Hàng</span></p>
                                <div class="product-desc">
                                    <?php echo $dienThoai["MoTa"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>





        </ul>


    </div>
</div>