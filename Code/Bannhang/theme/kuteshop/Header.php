<?php
$tong = 0;
$DSLoai = GetChungLoaiPT();
$_REQUEST["loai"] = 
isset($_REQUEST["loai"])?$_REQUEST["loai"]:0;

$_REQUEST["keyword"] = 
isset($_REQUEST["keyword"])?$_REQUEST["keyword"]:"";
?>

<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="./public/kuteshop/assets/images/phone.png" />00-62-658-658</a>
                <a href="#"><img alt="email" src="./public/kuteshop/assets/images/email.png" />Contact us today!</a>
            </div>


            <div class="support-link">
                <a href="#">Services</a>
                <a href="#">Support</a>
            </div>

            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Tài Khoản</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                    <!-- // chua đăng nhap -->
                        <li><a href="/index.php?pages=dangnhap">Đăng Nhập</a></li>
                        <li><a href="/index.php?pages=dangky">Đăng Ký</a></li>
                        <!-- // chua đăng nhap -->
                        <!-- // da đăng nhap -->
                        <li><a href="login.html">Thông tin tài khoản</a></li>
                        <li><a href="#">Yêu Thích</a></li>
                        <li><a href="#">Theo Dõi</a></li>
                        <li><a href="#">Đăng Xuất</a></li>
                        

                        <!-- // da đăng nhap -->

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="/"><img alt="Kute Shop" src="./public/kuteshop/assets/images/logo.png" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form action="/index.php" class="form-inline">
                    <input type="hidden" value="timkiem" name="pages">
                    <div class="form-group form-category">
                        <select name="loai" class="select-category">
                            <option value="all">All Categories</option>
                            <?php
                            while ($loai = $DSLoai->fetch_assoc()) {
                            ?>
                                <option <?php echo $loai["idCL"] == $_REQUEST["loai"]?'selected':''  ?>  value="<?php echo $loai["idCL"] ?>"><?php echo $loai["TenCL"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group input-search">
                        <input autocomplete="off" value="<?php echo $_REQUEST["keyword"] ?>" type="text" name="keyword" placeholder="Keyword here...">
                        <div class="goiY" id="GoiY" >
                            <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="">Item 1</a> 
                                </li>
                                <li class="list-group-item">
                                   <a href="">Item 1</a> 
                                </li>
                                <li class="list-group-item">
                                   <a href="">Item 1</a> 
                                </li>
                                <li class="list-group-item">
                                   <a href="">Item 1</a> 
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                <a class="cart-link" href="/index.php?pages=order">
                    <span class="title">Giỏ Hàng</span>
                    <span class="total"><?php echo GiaVND($_SESSION["TongTien"]); ?></span>
                    <span class="notify notify-left"><?php echo count($_SESSION["GioHang"]); ?></span>
                </a>
                <div class="cart-block">
                    <div class="cart-block-content">
                        <h5 class="cart-title"><?php echo count($_SESSION["GioHang"]); ?> Sản Phẩm</h5>
                        <div class="cart-block-list">
                            <ul>
                                <?php
                                foreach ($_SESSION["GioHang"] as $SanPham) {
                                ?>
                                    <li class="product-info">
                                        <div class="p-left">
                                            <a href="index.php?pages=giohang&XoaGH=<?php echo $SanPham["idDT"] ?>" class="remove_link"></a>
                                            <a href="<?php echo LinkSanPham($SanPham["idDT"]); ?>">
                                                <img style="height: 80px;" class="img-responsive" src="<?php echo UrlHinh($SanPham["urlHinh"]); ?>" alt="p10">
                                            </a>
                                        </div>
                                        <div class="p-right">
                                            <p class="p-name"><?php echo $SanPham["TenDT"] ?></p>
                                            <p class="p-rice"><?php echo GiaVND($SanPham["GiaKM"]);  ?></p>
                                            <p>SL: <?php echo $SanPham["SoLuong"] ?></p>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>


                            </ul>
                        </div>
                        <div class="toal-cart">
                            <span>Tổng Tiền</span>
                            <span class="toal-price pull-right"><?php echo GiaVND($_SESSION["TongTien"]) ?></span>
                        </div>
                        <div class="cart-buttons">
                            <a href="/index.php?pages=order" class="btn-check-out">Đặt Hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Categories</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                <?php
                                $tong = 0;
                                $DanhSachLoai = GetLoaiPT("", 1, 100, $tong);
                                $index = 0;
                                while ($loai = $DanhSachLoai->fetch_array()) {
                                    $class = "";
                                    if ($index >= 11) {
                                        $class = "cat-link-orther";
                                    }
                                    $tenkhongdau = $loai["TenKhongDau"];
                                    $linkLoai =
                                        "/loai/{$tenkhongdau}.html";
                                    $index++;
                                ?>
                                    <li class="<?php echo $class; ?>">
                                        <a href="<?php echo $linkLoai; ?>">
                                            <img class="icon-menu" alt="Funky roots" src="/public/kuteshop/assets/data/1.png">
                                            <?php echo $loai["TenLoai"]; ?>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>



                                <li class="cat-link-orther">
                                    <a href="#">
                                        <img class="icon-menu" alt="Funky roots" src="./public/kuteshop/assets/data/5.png">
                                        Television
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="#">
                                        <img class="icon-menu" alt="Funky roots" src="./public/kuteshop/assets/data/7.png">Computers &amp; Networking
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="#">
                                        <img class="icon-menu" alt="Funky roots" src="./public/kuteshop/assets/data/6.png">
                                        Toys &amp; Hobbies
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="#"><img class="icon-menu" alt="Funky roots" src="./public/kuteshop/assets/data/9.png">Jewelry &amp; Watches</a>
                                </li>
                            </ul>
                            <div class="all-category"><span class="open-cate">All Categories</span></div>
                        </div>
                    </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Home</a></li>
                                    <li><a href="/gioi-thieu.html">Giới Thiệu</a></li>
                                    <li><a href="category.html">Sản Phẩm</a></li>
                                    <li><a href="category.html">Tin Tức</a></li>
                                </ul>
                            </div>
                            <!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>