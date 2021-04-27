<?php
$IdTin = $_GET["id"];
if (isset($_POST["SuaTinTuc"])) {

    $tintuc = GetTinById($IdTin);
    $tintuc["TieuDe"] = $_POST["TieuDe"];
    $tintuc["TieuDe_KhongDau"] = BoDauTiengViet($_POST["TieuDe"]);
    $tintuc["TomTat"] = $_POST["TomTat"];
    if ($_FILES["hinhanh"]["error"] == 0) {
        // có file
        // upload file hinh
        $fileName =  basename($_FILES["hinhanh"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "public/imgTin/" . date("Y-m-d") . $tintuc["TieuDe_KhongDau"] . ".{$extention}";
        UploadFile($_FILES["hinhanh"], $hinh);
        $tintuc["urlHinh"] = "imgTin/" . date("Y-m-d") . $tintuc["TieuDe_KhongDau"] . ".{$extention}";
    }
    $tintuc["Ngay"] = date("Y-m-d H:i:s");
    $tintuc["Content"] = $_POST["Content"];
    $tintuc["idLT"] = intval($_POST["idLT"]);
    $tintuc["AnHien"] = isset($_POST["AnHien"]) ? "1" : "0";
    $tintuc["TinHot"] = isset($_POST["TinHot"]) ? "1" : "0";
    $res =  PutTinTuc($tintuc);
    //    var_dump($res->insert_id);
    // chuyen qua trang sửa tin túc
    header("Location: /admin.php?pages=quanlytinput&id=".$IdTin);
    exit();
}


$Tintuc = GetTinById($IdTin);
$DSLoaiTin = GetLoaiTin();

?>


<ol class="breadcrumb">
    <li>
        <a href="#">Dashboar</a>
    </li>
    <li class="active">
        <a href="/admin.php?pages=quanlytin">Tin Tức</a>
    </li>
    <li>
        <a href="#">Thêm</a>
    </li>
</ol>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Tin Tức</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="input" class="control-label">Tiêu Đề:</label>
                    <input value="<?php echo $Tintuc["TieuDe"] ?>" type="text" name="TieuDe" class="form-control">
                    <input value="<?php echo $Tintuc["idTin"] ?>" type="hidden" name="idTin">
                </div>
                <div class="form-group col-md-4">
                    <label for="input" class="control-label">Loai Tin:</label>
                    <select type="text" name="idLT" class="form-control">
                        <?php
                        while ($row = $DSLoaiTin->fetch_assoc()) {
                        ?>
                            <option <?php echo $row["idLT"] == $Tintuc["idLT"] ? 'selected' : '' ?> value="<?php echo $row["idLT"] ?>">
                                <?php echo $row["TenLoai"] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="input" class="control-label">Tóm Tắt:</label>
                <textarea type="text" name="TomTat" class="form-control"><?php echo $Tintuc["TomTat"] ?></textarea>
            </div>
            <div class="form-group">
                <label for="input" class="control-label">Content:</label>
                <textarea type="text" id="Content" name="Content" class="form-control"><?php echo $Tintuc["Content"] ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="AnHien">Hiển Thị:</label>
                <input <?php echo $Tintuc["AnHien"] == 1 ? 'checked' : '' ?> type="checkbox" name="AnHien" id="AnHien">
            </div>
            <div class="form-group">
                <label class="control-label" for="TinHot">Tin Hot:</label>
                <input <?php echo $Tintuc["TinHot"] == 1 ? 'checked' : '' ?> type="checkbox" name="TinHot" id="TinHot">
            </div>
            <div class="form-group">
                <img src="/public/<?php echo $Tintuc["urlHinh"]; ?>" alt="">
                <label for="input" class="control-label">Hinh:</label>
                <input type="file" name="hinhanh" class="form-control">
            </div>

            <button name="SuaTinTuc">Sửa Tin tức</button>
        </form>
    </div>
</div>
<script src="/public/admin/plugins/ckeditor/ckeditor.js"></script>
<script>
    $(function() {
        $(".xoa").click(function() {
            var datahtml = $(this).data();
            if (window.confirm(datahtml.confirm) == false) {
                return false;
            }
        });
        CKEDITOR.replace('Content');
    });
</script>