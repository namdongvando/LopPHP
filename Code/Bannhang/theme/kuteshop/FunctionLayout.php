<?php
include_once(__DIR__ . "/../../Functions.php");
function ThemeHomeSlide()
{
    ob_start();
?>
    <div class="homeslider">
        <div class="content-slide">
            <ul id="contenhomeslider">
                <?php
                $DSQuangCao = GetQuangCaoByGroups("HomeSlide");
                while ($Qc = $DSQuangCao->fetch_array()) {
                ?>
                    <li>
                        <img alt="Funky roots" src="<?php echo $Qc["Images"]; ?>" title="Funky roots" />
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
    </div>
    <?php
    $DSQuangCaoRight = GetQuangCaoByGroups("HomeSlideRight");
    $Qcr = $DSQuangCaoRight->fetch_array();
    ?>
    <div class="header-banner banner-opacity">
        <a href="<?php echo $Qcr['Link']; ?>">
            <img alt="Funky roots" src="/public/loading.svg" class="lazy" onerror="this.src='/public/kuteshop/assets/data/f2.jpg'" data-src="<?php echo $Qcr['Images']; ?>" />
        </a>
    <?php
    $str = ob_get_clean();
    return $str;
}

function ThemeService()
{
    ob_start();
    ?>
        <div class="service ">
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="./public/kuteshop/assets/data/s1.png" />
                </div>
                <div class="info">
                    <a href="#">
                        <h3>Free Shipping</h3>
                    </a>
                    <span>On order over $200</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="./public/kuteshop/assets/data/s2.png" />
                </div>
                <div class="info">
                    <a href="#">
                        <h3>30-day return</h3>
                    </a>
                    <span>Moneyback guarantee</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="./public/kuteshop/assets/data/s3.png" />
                </div>

                <div class="info">
                    <a href="#">
                        <h3>24/7 support</h3>
                    </a>
                    <span>Online consultations</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="./public/kuteshop/assets/data/s4.png" />
                </div>
                <div class="info">
                    <a href="#">
                        <h3>SAFE SHOPPING</h3>
                    </a>
                    <span>Safe Shopping Guarantee</span>
                </div>
            </div>
        </div>
    <?php
    $str = ob_get_clean();
    return $str;
}

function ThemePageTop()
{
    ob_start();
    ?>

        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-9 page-top-left">
                        <div class="popular-tabs">
                            <ul class="nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Sản Phẩm Bán Chạy</a></li>
                                <li><a data-toggle="tab" href="#tab-2">Giảm Giá</a></li>
                                <li><a data-toggle="tab" href="#tab-3">Hàng Mới</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="tab-1" class="tab-panel active">
                                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                        <?php
                                        $TopDSSanPhamBanChay = TopSanPhamBanChay(10);
                                        while ($row = $TopDSSanPhamBanChay->fetch_array()) {
                                        ?>
                                            <li>
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img style="height:250px;" class="img-responsive" alt="product" src="./public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" />
                                                    </a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                    <div class="group-price">
                                                        <span class="product-new">HOT</span>
                                                        <span class="product-sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#"><?php echo $row["TenDT"] ?></a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">
                                                            <?php echo number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup>
                                                        </span>
                                                        <span class="price old-price">
                                                            <?php echo number_format($row["GiaKM"], 0, ",", "."); ?>
                                                        </span>
                                                    </div>
                                                    <div class="product-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }

                                        ?>
 
                                    </ul>
                                </div>
                                <div id="tab-2" class="tab-panel">
                                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                        <?php
                                        $TopDSSanPhamBanChay = TopSanPhamGiamGia(10);
                                        while ($row = $TopDSSanPhamBanChay->fetch_array()) {
                                        ?>
                                            <li>
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img style="height:250px;" class="img-responsive" alt="product" src="./public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" />
                                                    </a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                    <div class="group-price">
                                                        <span class="product-new">HOT</span>
                                                        <span class="product-sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#"><?php echo $row["TenDT"] ?></a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">
                                                            <?php echo number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup>
                                                        </span>
                                                        <span class="price old-price">
                                                            <?php echo number_format($row["GiaKM"], 0, ",", "."); ?>
                                                        </span>
                                                    </div>
                                                    <div class="product-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }

                                        ?>
                                    </ul>
                                </div>
                                <div id="tab-3" class="tab-panel">
                                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                        <?php
                                        $TopDSSanPhamBanChay = TopSanPhamMoi(10);
                                        while ($row = $TopDSSanPhamBanChay->fetch_array()) {
                                        ?>
                                            <li>
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img style="height:250px;" class="img-responsive" alt="product" src="./public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" />
                                                    </a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                    <div class="group-price">
                                                        <span class="product-new">HOT</span>
                                                        <span class="product-sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#"><?php echo $row["TenDT"] ?></a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">
                                                            <?php echo number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup>
                                                        </span>
                                                        <span class="price old-price">
                                                            <?php echo number_format($row["GiaKM"], 0, ",", "."); ?>
                                                        </span>
                                                    </div>
                                                    <div class="product-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 page-top-right">
                        <div class="latest-deals">
                            <h2 class="latest-deal-title">Flash Sale</h2>
                            <div class="latest-deal-content">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                                    <li>
                                        <div class="count-down-time" data-countdown="2021/06/27"></div>
                                        <div class="left-block">
                                            <a href="#"><img class="img-responsive" alt="product" src="./public/kuteshop/assets/data/ld1.jpg" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                                <span class="colreduce-percentage">(-10%)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                        <div class="left-block">
                                            <a href="#"><img class="img-responsive" alt="product" src="./public/kuteshop/assets/data/ld2.jpg" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                                <span class="colreduce-percentage">(-90%)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                        <div class="left-block">
                                            <a href="#"><img class="img-responsive" alt="product" src="./public/kuteshop/assets/data/ld3.jpg" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                                <span class="colreduce-percentage">(-20%)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    $str = ob_get_clean();
    return $str;
}
function ThemeCategory($idLoai)
{

    $loai = GetLoaiById($idLoai);
    $DanhSachDienThoai = GetDienThoaiByIdLoai($idLoai);
    $DanhSachDienThoaiBanChay = GetDienThoaiBanChayNhatTheoLoai($idLoai);
    $id = md5($loai["idLoai"]);

    ob_start();
    ?>
        <!-- featured category Digital -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-blue show-brand">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-brand">
                        <a href="#">
                            <img alt="fashion" src="./public/kuteshop/assets/data/digital.png" />
                            <?php echo $loai["TenLoai"]; ?>
                        </a>
                    </div>
                    <span class="toggle-menu"></span>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a data-toggle="tab" href="#tab-10<?php echo $id ?>">Bán Chạy</a></li>
                            <li><a data-toggle="tab" href="#tab-11<?php echo $id ?>">Xem nhiều</a></li>
                            <li><a href="#">Mobile</a></li>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Laptop</a></li>
                            <li><a href="#">Notebook</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                <div id="elevator-4" class="floor-elevator">
                    <a href="#elevator-3" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-5" class="btn-elevator down fa fa-angle-down"></a>
                </div>
            </nav>

            <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="banner-img">
                        <a href="#">
                            <img style="width:100%;height: 350px;" class="img img-responsive" alt="Featurered 1" src="/public/images/<?php echo $loai["hinh"] ?>" />
                        </a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container autoheight">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-10<?php echo $id ?>">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="0" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <?php
                                    $TopDSSanPhamBanChay = $DanhSachDienThoaiBanChay;
                                    while ($row = $TopDSSanPhamBanChay->fetch_array()) {
                                    ?>
                                        <li>
                                            <div class="left-block">
                                                <a href="#">
                                                    <img style="height:250px;" class="img-responsive" alt="product" src="./public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" />
                                                </a>
                                                <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a title="Add to Cart" href="#">Add to Cart</a>
                                                </div>
                                                <div class="group-price">
                                                    <span class="product-new">HOT</span>
                                                    <span class="product-sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="#"><?php echo $row["TenDT"] ?></a></h5>
                                                <div class="content_price">
                                                    <span class="price product-price">
                                                        <?php echo number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup>
                                                    </span>
                                                    <span class="price old-price">
                                                        <?php echo number_format($row["GiaKM"], 0, ",", "."); ?>
                                                    </span>
                                                </div>
                                                <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }

                                    ?>
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-11<?php echo $id ?>">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="0" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <?php
                                    $TopDSSanPhamBanChay = $DanhSachDienThoai;
                                    while ($row = $TopDSSanPhamBanChay->fetch_array()) {
                                    ?>
                                        <li>
                                            <div class="left-block">
                                                <a href="#">
                                                    <img style="height:250px;" class="img-responsive" alt="product" src="./public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" />
                                                </a>
                                                <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a title="Add to Cart" href="#">Add to Cart</a>
                                                </div>
                                                <div class="group-price">
                                                    <span class="product-new">HOT</span>
                                                    <span class="product-sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="#"><?php echo $row["TenDT"] ?></a></h5>
                                                <div class="content_price">
                                                    <span class="price product-price">
                                                        <?php echo number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup>
                                                    </span>
                                                    <span class="price old-price">
                                                        <?php echo number_format($row["GiaKM"], 0, ",", "."); ?>
                                                    </span>
                                                </div>
                                                <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }

                                    ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end featured category Digital-->

    <?php
    $str = ob_get_clean();
    return $str;
}

    ?>