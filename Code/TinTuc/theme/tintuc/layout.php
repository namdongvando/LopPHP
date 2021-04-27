<!DOCTYPE html>
<?php
include_once("Router.php");
include_once("FunctionLayout.php");
$_SESSION["KhachHang"] =
    isset($_SESSION["KhachHang"]) ?
    $_SESSION["KhachHang"] : null;
?>
<html lang="en">

<head>
    <title>Aha Magazine | Home</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/public/cdc/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/public/cdc/css/font-icons.css" />
    <link rel="stylesheet" href="/public/cdc/css/style.css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="/public/cdc/img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Lazyload -->
    <script src="/public/cdc/js/lazysizes.min.js"></script>

</head>

<body class="bg-light">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
        </div>
    </div>

    <!-- Bg Overlay -->
    <div class="content-overlay"></div>

    <!-- Sidenav -->
    <header class="sidenav" id="sidenav">

        <!-- close -->
        <div class="sidenav__close">
            <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
                <i class="ui-close sidenav__close-icon"></i>
            </button>
        </div>

        <!-- Nav -->
        <nav class="sidenav__menu-container">
            <ul class="sidenav__menu" role="menubar">
                <?php
                $DSMenu = GetMenuByNhom("LeftMenu", 0);
                while ($menu = $DSMenu->fetch_assoc()) {
                    $DSMenuCap2 = GetMenuByNhom("LeftMenu", $menu["Ma"]);
                ?>
                    <li>
                        <a href="<?php echo $menu["Link"] ?>" class="sidenav__menu-link"><?php echo $menu["Ten"] ?></a>

                        <?php
                        if ($DSMenuCap2->num_rows > 0) {
                        ?>
                            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
                            <ul class="sidenav__menu-dropdown">
                                <?php
                                while ($menuc2 = $DSMenuCap2->fetch_assoc()) {
                                ?>
                                    <li><a class="sidenav__menu-link" href="<?php echo $menuc2["Link"] ?>"><?php echo $menuc2["Ten"] ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        <?php
                        }
                        ?>
                    </li>

                <?php
                }
                ?>
            </ul>
        </nav>

        <div class="socials sidenav__socials">
            <?php
            $DSMenu = GetMenuByNhom("MenuIcon", 0);
            while ($menu = $DSMenu->fetch_assoc()) {
            ?>
                <a class="social social-<?php echo $menu['Ten'] ?> social-<?php echo $menu['GhiChu'] ?>" href="<?php echo $menu['Link'] ?>" target="_blank" aria-label="<?php echo $menu['Ten'] ?>">
                    <i class="ui-<?php echo $menu['Ten'] ?>"></i>
                </a>
            <?php
            }
            ?>
        </div>
    </header> <!-- end sidenav -->

    <main class="main oh" id="main">

        <!-- Navigation -->
        <header class="nav">
            <div class="nav__holder nav--sticky">
                <div class="container relative">
                    <div class="flex-parent">

                        <!-- Side Menu Button -->
                        <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                            <span class="nav-icon-toggle__box">
                                <span class="nav-icon-toggle__inner"></span>
                            </span>
                        </button> <!-- end Side menu button -->

                        <!-- Mobile logo -->
                        <a href="index.html" class="logo logo--mobile d-lg-none">
                            <img class="logo__img" src="/public/cdc/img/logo_mobile.png" alt="logo">
                        </a>

                        <!-- Nav-wrap -->
                        <nav class="flex-child nav__wrap d-none d-lg-block">
                            <ul class="nav__menu">
                                <?php
                                $DSMenu = GetMenuByNhom("MainMenu", 0);
                                while ($menu = $DSMenu->fetch_assoc()) {
                                    $DSMenuCap2 = GetMenuByNhom("MainMenu", $menu["Ma"]);
                                ?>
                                    <li class="nav__dropdown">
                                        <a href="<?php echo $menu["Link"] ?>">
                                        <i class="<?php echo $menu["GhiChu"] ?> nav__search-trigger-icon"></i>
                                        <?php echo $menu["Ten"] ?></a>
                                        <?php
                                        if ($DSMenuCap2->num_rows > 0) {
                                        ?>
                                            <ul class="nav__dropdown-menu">
                                                <?php
                                                while ($menuc2 = $DSMenuCap2->fetch_assoc()) {
                                                ?>
                                                    <li><a href="<?php echo $menuc2["Link"] ?>"><?php echo $menuc2["Ten"] ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        }
                                        ?>

                                    </li>
                                <?php
                                }
                                ?>
                            </ul> <!-- end menu -->
                        </nav> <!-- end nav-wrap -->

                        <!-- Nav Right -->
                        <div class="nav__right nav--align-right d-lg-flex">

                            <!-- Socials -->
                            <div class="nav__right-item socials nav__socials d-none d-lg-flex">
                                <?php
                                $DSMenu = GetMenuByNhom("MenuIcon", 0);
                                while ($menu = $DSMenu->fetch_assoc()) {
                                ?>
                                    <a target="_blank" class="social social--nobase social-<?php echo $menu['Ten'] ?> social-<?php echo $menu['GhiChu'] ?>" href="<?php echo $menu['Link'] ?>" target="_blank" aria-label="<?php echo $menu['Ten'] ?>">
                                        <i class="ui-<?php echo $menu['Ten'] ?>"></i>
                                    </a>
                                <?php
                                }
                                ?> 
                            </div>

                            <!-- Search -->
                            <div class="nav__right-item nav__search">
                                <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                                    <i class="ui-search nav__search-trigger-icon"></i>
                                </a>
                                <div class="nav__search-box" id="nav__search-box">
                                    <form class="nav__search-form">
                                        <input type="text" placeholder="Search an article" class="nav__search-input">
                                        <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                                            <i class="ui-search nav__search-icon"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end nav right -->

                    </div> <!-- end flex-parent -->
                </div> <!-- end container -->

            </div>
        </header> <!-- end navigation -->

        <!-- Header -->
        <div class="header">
            <div class="container">
                <div class="flex-parent align-items-center">

                    <!-- Logo -->
                    <a href="index.html" class="logo d-none d-lg-block">
                        <img class="logo__img" src="/public/cdc/img/logo.png" alt="logo">
                    </a>

                    <!-- Ad Banner 728 -->
                    <div class="text-center">
                        <a href="#">
                            <img src="/public/cdc/img/blog/placeholder_leaderboard.jpg" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div> <!-- end header -->

        <?php
        include_once($_Content);
        ?>

        <!-- Footer -->
        <footer class="footer footer--dark">
            <div class="container">
                <div class="footer__widgets">
                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <a href="index.html">
                                    <img src="/public/cdc/img/logo_mobile.png" class="logo__img" alt="">
                                </a>
                                <p class="mt-20">We bring you the best Premium WordPress Themes. Deliver smart websites faster with this amazing theme. We care about our buyers.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <h4 class="widget-title">Latest Posts</h4>
                            <ul class="post-list-small">
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry clearfix">
                                        <div class="post-list-small__img-holder">
                                            <div class="thumb-container thumb-75">
                                                <a href="single-post.html">
                                                    <img data-src="/public/cdc/img/blog/popular_post_1.jpg" src="/public/cdc/img/empty.png" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Google is fixing its troubling burger emoji in Android 8.1</a>
                                            </h3>
                                            <ul class="entry__meta">
                                                <li class="entry__meta-date">
                                                    <i class="ui-date"></i>
                                                    21 October, 2017
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry clearfix">
                                        <div class="post-list-small__img-holder">
                                            <div class="thumb-container thumb-75">
                                                <a href="single-post.html">
                                                    <img data-src="/public/cdc/img/blog/popular_post_2.jpg" src="/public/cdc/img/empty.png" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">How Meditation Can Transform Your Business</a>
                                            </h3>
                                            <ul class="entry__meta">
                                                <li class="entry__meta-date">
                                                    <i class="ui-date"></i>
                                                    21 October, 2017
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget__newsletter">
                                <h4 class="widget-title">Follow us</h4>

                                <div class="socials mb-20">
                                    <?php
                                    $DSMenu = GetMenuByNhom("MenuIcon", 0);
                                    while ($menu = $DSMenu->fetch_assoc()) {
                                    ?>
                                        <a class="social social-<?php echo $menu['Ten'] ?> social-<?php echo $menu['GhiChu'] ?>" href="<?php echo $menu['Link'] ?>" target="_blank" aria-label="<?php echo $menu['Ten'] ?>">
                                            <i class="ui-<?php echo $menu['Ten'] ?>"></i>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <form class="mc4wp-form" method="post">
                                    <div class="mc4wp-form-fields">
                                        <p>
                                            <input type="email" name="EMAIL" placeholder="Your email" required="">
                                        </p>
                                        <p>
                                            <input type="submit" class="btn btn-lg btn-color" value="Subscribe">
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget_nav_menu">
                                <h4 class="widget-title">Useful Links</h4>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="categories.html">Categories</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end container -->

            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 order-lg-2 text-right text-md-center">
                            <div class="widget widget_nav_menu">
                                <ul>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-1 text-md-center">
                            <span class="copyright">
                                &copy; 2017 AhaMag | Made by <a href="http://deothemes.com">DeoThemes</a>
                            </span>
                        </div>
                    </div>

                </div>
            </div> <!-- end bottom footer -->
        </footer> <!-- end footer -->

        <div id="back-to-top">
            <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
        </div>

    </main> <!-- end main-wrapper -->


    <!-- jQuery Scripts -->
    <script src="/public/cdc/js/jquery.min.js"></script>
    <script src="/public/cdc/js/bootstrap.min.js"></script>
    <script src="/public/cdc/js/easing.min.js"></script>
    <script src="/public/cdc/js/owl-carousel.min.js"></script>
    <script src="/public/cdc/js/twitterFetcher_min.js"></script>
    <script src="/public/cdc/js/jquery.newsTicker.min.js"></script>
    <script src="/public/cdc/js/modernizr.min.js"></script>
    <script src="/public/cdc/js/scripts.js"></script>

</body>

</html>
<?php
$str = ob_get_clean();
$str = str_replace("[ThemePageTop]", ThemePageTop(), $str);

echo $str;
?>