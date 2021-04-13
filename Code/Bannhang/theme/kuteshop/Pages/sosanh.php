<?php
$_SESSION["SoSanh"] = isset($_SESSION["SoSanh"]) ?
$_SESSION["SoSanh"] : null;
// them so sanh
if(isset($_REQUEST["idDT"])){
    $idDT = $_REQUEST["idDT"];    
    $_SESSION["SoSanh"][$idDT] = $idDT;
}
// xóa khỏi so sánh
if(isset($_REQUEST["xoaidDT"])){
    $idDT = $_REQUEST["xoaidDT"];    
    unset($_SESSION["SoSanh"][$idDT]); 
}


// 


var_dump($_SESSION["SoSanh"]);
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Compare</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Compare Products</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <table class="table table-bordered table-compare">
                <tr>
                    <td class="compare-label">Hình</td>
                    <?php
                    foreach ($_SESSION["SoSanh"] as $idDT) {
                        $dt= GetDienThoaiByIdDT($idDT);
                        $hinh = UrlHinh($dt["urlHinh"]);
                    ?>
                        <td>
                            <a href="#"><img src="<?php echo $hinh; ?>" alt="<?php echo $dt["urlHinh"] ?>"></a>
                        </td>
                    <?php
                    }
                    ?> 
                </tr>
                <tr>
                    <td class="compare-label">Tên Sản Phẩm</td>
                    <?php
                    foreach ($_SESSION["SoSanh"] as $idDT) {
                        $dt= GetDienThoaiByIdDT($idDT);
                       
                    ?>
                        <td>
                            <a href="#">
                            <?php echo $dt["TenDT"]; ?>
                                </a>
                        </td>
                    <?php
                    }
                    ?> 
                </tr>
                <tr>
                    <td class="compare-label">Action</td>
                    <?php
                    foreach ($_SESSION["SoSanh"] as $idDT) {
                    ?>
                        <td class="action">
                            <button class="add-cart button button-sm">Add to cart</button>
                            <button class="button button-sm"><i class="fa fa-heart-o"></i></button>
                            <a href="/index.php?pages=sosanh&xoaidDT=<?php echo $dt["idDT"] ?>" class="btn btn-md button button-sm"><i class="fa fa-close"></i></a>
                        </td>
                    <?php
                    }
                    ?>

                    
                </tr>
            </table>
        </div>
    </div>
</div>