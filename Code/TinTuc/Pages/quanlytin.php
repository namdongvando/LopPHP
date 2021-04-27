<?php
// $_REQUEST["abc"] <> $_GET["abc"] 
// $_REQUEST["abc"] <> $_POST["abc"] 
if (isset($_POST["ThemLoaiTin"])) {

    $LoaiTin["TenLoai"] = $_POST["TenLoaiTin"];
    $LoaiTin["Alias"] = $_POST["TenLoaiTin"];
    $LoaiTin["Hinh"] = "";
    $LoaiTin["NoiDung"] = $_POST["NoiDung"];

    PostLoaiTin($LoaiTin);
}
if (isset($_GET["XoaLoai"])) {
    $idLoai = intval($_GET["XoaLoai"]);
    DeleteLoaiTin($idLoai);
}
// lấy tin tuc phân trang
$name = !empty($_REQUEST["name"]) ? $_REQUEST["name"] : "";
$numberPages = !empty($_REQUEST["num"]) ? $_REQUEST["num"] : 10;
$indexPages = !empty($_REQUEST["index"]) ? $_REQUEST["index"] : 1;
$tong = 0;
$DSTin = GetTinPT($name, $indexPages, $numberPages, $tong);
var_dump($DSTin);

?>

<ol class="breadcrumb">
    <li>
        <a href="#">Dashboar</a>
    </li>
    <li class="active">Tin Tức</li>
</ol>

<div class="">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Quản Lý Tin Tức</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover" id="DSLoaiTin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>
                        <a href="/admin.php?pages=quanlytinpost" class=" btn btn-primary">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dem = 1;
                    while ($row = $DSTin->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo (($indexPages-1) * $numberPages) + $dem++; ?></td>
                            <td><?php echo $row["idTin"]; ?></td>
                            <td><?php echo $row["TieuDe"]; ?></td>
                            <td style="width: 200px;">
                                <a href="/admin.php?pages=quanlytindelete&XoaLoai=<?php echo $row["idTin"]; ?>" data-confirm="Bạn có muốn xóa không?" class="btn btn-danger xoa">Xóa</a>
                                <a href="/admin.php?pages=quanlytinput&id=<?php echo $row["idTin"]; ?>" class=" btn btn-primary">Sửa</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <?php
            $link = "/admin.php?pages=quanlytin&num={$numberPages}&index=[i]";
            echo PhanTrang(ceil($tong / $numberPages), $indexPages, $link);
            ?>

        </div>
    </div>
</div>