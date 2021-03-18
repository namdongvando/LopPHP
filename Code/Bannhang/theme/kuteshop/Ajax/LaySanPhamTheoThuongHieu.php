<?php
$idLoai = $_GET["idLoai"];
$loai = GetLoaiById($idLoai);
$DSSanPham = GetDienThoaiByIdLoai($idLoai, 4);
?>

<div class="col-xs-12 col-sm-4 trademark-info">
    <div class="trademark-logo">
        <a href="#"><img src="/public/images/<?php echo $loai["hinh"] ?>" alt="trademark"></a>
    </div>
    <div class="trademark-desc">
        Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
    </div>
    <a href="#" class="trademark-link">shop this brand</a>
</div>
<div class="col-xs-12 col-sm-8 trademark-product">
    <div class="row">
        <?php
        if ($DSSanPham) {
            while ($row = $DSSanPham->fetch_array()) {
        ?>
                <div class="col-xs-12 col-sm-6 product-item">
                    <div class="image-product hover-zoom" style="text-align: center;">
                        <a href="#">
                            <img style="height: 150px;" class="img-repon" src="/public/images/upload/hinhchinh/<?php echo $row["urlHinh"] ?>" alt="">
                        </a>
                    </div>
                    <div class="info-product">
                        <a href="#">
                            <h5>Maecenas consequat mauris</h5>
                        </a>
                        <span class="product-price">$38.87</span>
                        <div class="product-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a class="btn-view-more" title="View More" href="#">View More</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>


    </div>
</div>