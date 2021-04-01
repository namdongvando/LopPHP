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
    <link rel="stylesheet" href="/public/kuteshop/style.css?v=<?php 
    echo filectime("public/kuteshop/style.css")
     ?>">
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
            $("#GoiY").click(function(){
                $("#GoiY").html("").hide(); 
            });
            $(".input-search input").keyup(function(){
                var keyword = $(this).val();
                console.log(keyword.length);
                console.log(keyword);
                if(keyword.length >=3){
                    $.ajax(
                        {"url":"/ajax.php?pages=goiy&tukhoa="+keyword }
                        ).done(function(res){
                
                            console.log(res);
                          $("#GoiY").html(res).show();

                    });
                }
                
            });   


            // lấy tất cả html nào có class là ajaxHtml
            $("#isNhanHang").each(function() {
                var isCheck = $(this).prop("checked");
                // kiểm tra isNhanHang có được check không
                // khi mới vào trang
                console.log(isCheck);
                if (isCheck == true) {
                    $("#ThongTinGiaoHang").hide();
                } else {
                    $("#ThongTinGiaoHang").show();
                }
                // khi nó thay đổi
                $(this).change(function() {
                    var isCheck = $(this).prop("checked");
                    if (isCheck == true) {
                        $("#ThongTinGiaoHang").hide();
                    } else {
                        $("#ThongTinGiaoHang").show();
                    }
                });

            });

            $("select").select2();
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
            $(".ajaxSelect").each(function() {
                $(this).change(() => {
                    var data = $(this).data();
                    var clearObj = data.clear;
                    console.log(clearObj);
                    $(clearObj).html("").select2();
                    var url = data.urlselect + $(this).val();
                    $.ajax({
                            method: "GET",
                            url: url,
                        })
                        .done(function(msg) {
                            $(data.target).html(msg);
                            $(data.target).select2();
                        });

                });


            });

            $("#FormDatHang").submit(function(){
                try {
                    if($("#TenKhachHang").val()==""){
                        $("#TenKhachHang").focus();
                        throw "Bạn Chưa Nhập Tên";
                    }
                    if($("#DienThoai").val()==""){
                        $("#DienThoai").focus();
                        throw "Bạn Chưa Nhập Số Điện Thoại";
                    }
                    if($("#TinhThanh").val()==""){
                        $("#TinhThanh").focus();
                        throw "Bạn Chưa Chọn Tỉnh Thành";
                    }
                    if($("#QuanHuyen").val()==""){
                        $("#QuanHuyen").focus();
                        throw "Bạn Chưa Chọn Quận Huyện";
                    }
                    if($("#PhuongXa").val()==""){
                        $("#PhuongXa").focus();
                        throw "Bạn Chưa Chọn Phường Xã";
                    }
                    if($("#SoNha").val()==""){
                        $("#SoNha").focus();
                        throw "Bạn Chưa Nhập Số Nhà";
                    }
                    var isCheck = $("#isNhanHang").prop("checked");
                    if(isCheck == false){
                        if($("#HoTen1").val()==""){
                        $("#HoTen1").focus();
                        throw "Bạn Chưa Nhập Tên Người Nhận";
                    }
                    if($("#DienThoai1").val()==""){
                        $("#DienThoai1").focus();
                        throw "Bạn Chưa Nhập Số Điện Thoại Nhận Hàng";
                    }
                    if($("#TinhThanh1").val()==""){
                        $("#TinhThanh1").focus();
                        throw "Bạn Chưa Chọn Tỉnh Thành";
                    }
                    if($("#QuanHuyen1").val()==""){
                        $("#QuanHuyen1").focus();
                        throw "Bạn Chưa Chọn Quận Huyện";
                    }
                    if($("#PhuongXa1").val()==""){
                        $("#PhuongXa1").focus();
                        throw "Bạn Chưa Chọn Phường Xã";
                    }
                    if($("#SoNha1").val()==""){
                        $("#SoNha1").focus();
                        throw "Bạn Chưa Nhập Số Nhà";
                    }
                    }

                    return true;
                } catch (error) {
                    alert(error);
                }
                return false;
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