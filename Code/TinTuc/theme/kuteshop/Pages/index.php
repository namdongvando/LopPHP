<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <?php 
                echo ThemeHomeSlide();
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->
<div class="container">
    <?php echo ThemeService(); ?>
</div>
<!-- end services -->
[ThemePageTop]
<!---->
<div class="content-page">
    <div class="container">
        <div 
        data-id="#contentpageAjax" 
        data-url="/ajax.php?pages=contentpage" 
        class="ajaxHtml" 
        id="contentpageAjax" >
       
        </div> 
      

        <!-- Baner bottom -->
        <div class="row banner-bottom">
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="./public/kuteshop/assets/data/ads17.jpg" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="./public/kuteshop/assets/data/ads18.jpg" /></a>
                </div>
            </div>
        </div>
        <!-- end banner bottom -->
    </div>
</div>
 
<div class="container">
    <div class="brand-showcase">
        <h2 class="brand-showcase-title">
            brand showcase
        </h2>
        <div class="brand-showcase-box">
            <ul class="brand-showcase-logo owl-carousel" data-loop="true" data-nav="true" data-dots="false" data-margin="1" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-responsive='{"0":{"items":2},"600":{"items":5},"1000":{"items":8}}'>
                <li data-tab="showcase-1" class="item active"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-2" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-3" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-4" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-5" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-6" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-7" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-8" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-9" class="item"><img src="./public/kuteshop/assets/data/gucci.png" alt="logo" class="item-img" /></li>
            </ul>
            <div class="brand-showcase-content">
                <div data-url="/ajax.php?pages=LaySanPhamTheoThuongHieu&idLoai=39" data-id="#showcase-1" class="ajaxHtml brand-showcase-content-tab active" id="showcase-1">
                     
                </div>
                <div data-url="/ajax.php?pages=LaySanPhamTheoThuongHieu&idLoai=40" data-id="#showcase-2" class="ajaxHtml brand-showcase-content-tab" id="showcase-2">
                     

                </div>
                <div class="brand-showcase-content-tab" id="showcase-3">
                     
                </div>
                <div class="brand-showcase-content-tab" id="showcase-4">
                    
                </div>
                <div class="brand-showcase-content-tab" id="showcase-5">
                   
                </div>
                <div class="brand-showcase-content-tab" id="showcase-6">
                     
                </div>
                <div class="brand-showcase-content-tab" id="showcase-7">
                    
                </div>
                <div class="brand-showcase-content-tab" id="showcase-8">
                     
                </div>
                <div class="brand-showcase-content-tab" id="showcase-9">
                     
                </div>
            </div>
        </div>

    </div>
</div>

<div id="content-wrap" data-url="/ajax.php?pages=hotcategorys" data-id="#content-wrap" class="ajaxHtml" >
   
</div>