
<?php 
$keyword = $_GET["keyword"];
$loai = $_GET["loai"];
// neu tất cả hoặc chuyên thành so nguyên không thành công

$DSSanPham =  TimSanPhamTheoTen($keyword,intval($loai));
?>
<div class="container" style="margin-top: 40px;" >
<h2>Kết Quả Tìm Kiếm Cho từ khóa "<?php echo $keyword; ?>"</h2>
    <ul class="row product-list list">
        <?php
        if ($DSSanPham)
            while ($dienThoai = $DSSanPham->fetch_array()) {
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
                            <a title="Add to Cart" href="<?php echo LinkThemGioHang($dienThoai["idDT"]); ?>">Thêm Giỏ Hàng</a>
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