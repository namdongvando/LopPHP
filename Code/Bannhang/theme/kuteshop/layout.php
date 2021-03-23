<!DOCTYPE html>
<?php
include_once("Router.php");
include_once("FunctionLayout.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="./public/kuteshop/assets/lib/fancyBox/jquery.fancybox.css" />
    <link rel="stylesheet" href="./public/kuteshop/style.css">
    <title>www Kute shop</title>
</head>
<body class="<?php echo $_pages == "index" ? 'home' : '' ?>">
    <?php
    include_once("Header.php");
    ?>
    <!-- end header -->

    <?php
    include_once($_Content);
    include_once("footer.php");
    ?>

    <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    <!-- Script-->
    <script type="text/javascript" src="/public/kuteshop/assets/lib/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/select2/js/select2.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/fancyBox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/lib/jquery.countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/js/jquery.actual.min.js"></script>
    <script type="text/javascript" src="/public/kuteshop/assets/js/theme-script.js"></script>
    <script type="text/javascript" src="/public/lazyloadimg/lazyloading.js"></script>
    <script type="text/javascript">
        $(function() {
            // lấy tất cả html nào có class là ajaxHtml
            $(".ajaxHtml").each(function() {
                var data = $(this).data();
                console.log(data);
                $.ajax({
                        method: "GET",
                        url: data.url,
                    })
                    .done(function(msg) {
                        //console.log(msg);
                        $(data.id).html(msg);
                    });

            });


        });
    </script>
</body>
<!-- Mirrored from kutethemes.com/demo/kuteshop/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:15:06 GMT -->

</html>
<?php
$str = ob_get_clean();
$str = str_replace("[ThemePageTop]", ThemePageTop(), $str);

echo $str;
?>