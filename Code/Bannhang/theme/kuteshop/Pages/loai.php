<?php
//?pages=loai&alias=nokia&pageindex=1&numberrow=18
$alias = $_GET["alias"];
$loaiHH = GetLoaiByAlias($alias);
$numberrow = isset($_GET["numberrow"]) ? intval($_GET["numberrow"]) : 12;
$pagesindex = isset($_GET["pagesindex"]) ? intval($_GET["pagesindex"]) : 1;
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "price";
$total = 0;
// lấy sản phẩm theo loại phân trang
$sanPhamTheoLoai = GetDienThoaiByIdLoaiPT(
    $loaiHH["idLoai"],
    $pagesindex,
    $numberrow,
    $orderby,
    $total
);
// lấy sản phẩm theo loại phân trang
// /loai/LG-pages-1-18-name.html
$Link = "/loai/{$alias}-pages-{$pagesindex}-{$numberrow}-{$orderby}.html";
$linkNumberRow =
"/loai/{$alias}-pages-{$pagesindex}-";
$linkPrice = "/loai/{$alias}-pages-{$pagesindex}-{$numberrow}-";
$linkPagination = 
"/loai/{$alias}-pages-[i]-{$numberrow}-{$orderby}.html";
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Trang Chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page"><?php echo $loaiHH["TenLoai"] ?></span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Product types</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li class="active">
                                        <span></span><a href="#">Tops</a>
                                        <ul>
                                            <li><span></span><a href="#">T-shirts</a></li>
                                            <li><span></span><a href="#">Dresses</a></li>
                                            <li><span></span><a href="#">Casual</a></li>
                                            <li><span></span><a href="#">Evening</a></li>
                                            <li><span></span><a href="#">Summer</a></li>
                                            <li><span></span><a href="#">Bags & Shoes</a></li>
                                            <li><span></span><a href="#"><span></span>Blouses</a></li>
                                        </ul>
                                    </li>
                                    <li><span></span><a href="#">T-shirts</a></li>
                                    <li><span></span><a href="#">Dresses</a></li>
                                    <li><span></span><a href="#">Jackets and coats </a></li>
                                    <li><span></span><a href="#">Knitted</a></li>
                                    <li><span></span><a href="#">Pants</a></li>
                                    <li><span></span><a href="#">Bags & Shoes</a></li>
                                    <li><span></span><a href="#">Best selling</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block filter -->
                <div class="block left-module">
                    <p class="title_block">Filter selection</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <div class="layered_subtitle">CATEGORIES</div>
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="c1" name="cc" />
                                        <label for="c1">
                                            <span class="button"></span>
                                            Tops<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c2" name="cc" />
                                        <label for="c2">
                                            <span class="button"></span>
                                            T-shirts<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c3" name="cc" />
                                        <label for="c3">
                                            <span class="button"></span>
                                            Dresses<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c4" name="cc" />
                                        <label for="c4">
                                            <span class="button"></span>
                                            Jackets and coats<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c5" name="cc" />
                                        <label for="c5">
                                            <span class="button"></span>
                                            Knitted<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c6" name="cc" />
                                        <label for="c6">
                                            <span class="button"></span>
                                            Pants<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c7" name="cc" />
                                        <label for="c7">
                                            <span class="button"></span>
                                            Bags & Shoes<span class="count">(10)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c8" name="cc" />
                                        <label for="c8">
                                            <span class="button"></span>
                                            Best selling<span class="count">(10)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter categgory -->
                            <!-- filter price -->
                            <div class="layered_subtitle">price</div>
                            <div class="layered-content slider-range">


                            </div>
                            <!-- ./filter price -->
                            <!-- filter color -->
                            <div class="layered_subtitle">Color</div>
                            <div class="layered-content filter-color">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="color1" name="cc" />
                                        <label style=" background:#aab2bd;" for="color1"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color2" name="cc" />
                                        <label style=" background:#cfc4a6;" for="color2"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color3" name="cc" />
                                        <label style=" background:#aab2bd;" for="color3"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color4" name="cc" />
                                        <label style=" background:#fccacd;" for="color4"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color5" name="cc" />
                                        <label style="background:#964b00;" for="color5"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color6" name="cc" />
                                        <label style=" background:#faebd7;" for="color6"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color7" name="cc" />
                                        <label style=" background:#e84c3d;" for="color7"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color8" name="cc" />
                                        <label style=" background:#c19a6b;" for="color8"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color9" name="cc" />
                                        <label style=" background:#f39c11;" for="color9"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color10" name="cc" />
                                        <label style=" background:#5d9cec;" for="color10"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color11" name="cc" />
                                        <label style=" background:#a0d468;" for="color11"><span class="button"></span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color12" name="cc" />
                                        <label style=" background:#f1c40f;" for="color12"><span class="button"></span></label>
                                    </li>

                                </ul>
                            </div>
                            <!-- ./filter color -->
                            <!-- ./filter brand -->
                            <div class="layered_subtitle">brand</div>
                            <div class="layered-content filter-brand">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="brand1" name="cc" />
                                        <label for="brand1">
                                            <span class="button"></span>
                                            Channelo<span class="count">(0)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand2" name="cc" />
                                        <label for="brand2">
                                            <span class="button"></span>
                                            Mamypokon<span class="count">(0)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand3" name="cc" />
                                        <label for="brand3">
                                            <span class="button"></span>
                                            Pamperson<span class="count">(0)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand4" name="cc" />
                                        <label for="brand4">
                                            <span class="button"></span>
                                            Pumano<span class="count">(0)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand5" name="cc" />
                                        <label for="brand5">
                                            <span class="button"></span>
                                            AME<span class="count">(0)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter brand -->
                            <!-- ./filter size -->
                            <div class="layered_subtitle">Size</div>
                            <div class="layered-content filter-size">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="size1" name="cc" />
                                        <label for="size1">
                                            <span class="button"></span>X
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size2" name="cc" />
                                        <label for="size2">
                                            <span class="button"></span>XXL
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size3" name="cc" />
                                        <label for="size3">
                                            <span class="button"></span>XL
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size4" name="cc" />
                                        <label for="size4">
                                            <span class="button"></span>XXL
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size5" name="cc" />
                                        <label for="size5">
                                            <span class="button"></span>M
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size6" name="cc" />
                                        <label for="size6">
                                            <span class="button"></span>XXS
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size7" name="cc" />
                                        <label for="size7">
                                            <span class="button"></span>S
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size8" name="cc" />
                                        <label for="size8">
                                            <span class="button"></span>XS
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size9" name="cc" />
                                        <label for="size9">
                                            <span class="button"></span>34
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size10" name="cc" />
                                        <label for="size10">
                                            <span class="button"></span>36
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size11" name="cc" />
                                        <label for="size11">
                                            <span class="button"></span>35
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size12" name="cc" />
                                        <label for="size12">
                                            <span class="button"></span>37
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter size -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                <!-- ./block filter  -->

                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav="false" data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="assets/data/slide-left.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets/data/slide-left3.png" alt="slide-left"></a></li>
                    </ul>

                </div>
                <!--./left silde-->
                <!-- SPECIAL -->
                <div class="block left-module">
                    <p class="title_block">SPECIAL PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block">
                            <li>
                                <div class="products-block-left">
                                    <a href="#">
                                        <img src="assets/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="#">Woman Within Plus Size Flared</a>
                                    </p>
                                    <p class="product-price">$38,95</p>
                                    <p class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="products-block">
                            <div class="products-block-bottom">
                                <a class="link-all" href="#">All Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./SPECIAL -->
                <!-- TAGS -->
                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div>
                <!-- ./TAGS -->
                <!-- Testimonials -->
                <div class="block left-module">
                    <p class="title_block">Testimonials</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav="false" data-margin="30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause="true" data-items="1">
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">


                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><?php echo $loaiHH["TenLoai"] ?></span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        <?php
                        while ($dienThoai = $sanPhamTheoLoai->fetch_array()) {
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
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                        <?php
                        $totalPages = ceil($total/$numberrow);
                        echo PhanTrang($totalPages,$pagesindex,$linkPagination);
                        ?>
                        </nav>
                    </div>
                    <div class="show-product-item">
                        <select onchange="window.location.href='<?php echo $linkNumberRow ?>'+this.value+'-<?php echo $orderby ?>.html'">
                            <option <?php echo $numberrow == 18 ? 'selected' : '' ?> value="18">Hiện 18</option>
                            <option <?php echo $numberrow == 24 ? 'selected' : '' ?> value="24">Hiện 24</option>
                            <option <?php echo $numberrow == 36 ? 'selected' : '' ?> value="36">Hiện 36</option>
                            <option <?php echo $numberrow == 48 ? 'selected' : '' ?> value="48">Hiện 48</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select onchange="window.location.href='<?php echo $linkPrice ?>'+this.value+'.html'">
                            <option <?php echo $orderby == 'name' ? 'selected' : '' ?> value="name">
                                Tên Sản Phẩm
                            </option>
                            <option <?php echo $orderby == 'price' ? 'selected' : '' ?> value="price">
                                Giá
                            </option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>