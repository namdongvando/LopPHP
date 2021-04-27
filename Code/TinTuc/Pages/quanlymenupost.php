<?php
if (isset($_POST["OK"])) {
    try {
        var_dump($_POST["menu"]);
        $menu = $_POST["menu"];
        if ($menu["Ten"] == "")
            throw new Exception("Chưa Nhập Tiêu Đề");
        if ($menu["Link"] == "")
            throw new Exception("Chưa Nhập Link");

        $menu["HinhAnh"] = "";
        if ($_FILES["hinhanh"]["error"] == 0) {
            // có file
            // upload file hinh
            $fileName =  basename($_FILES["hinhanh"]["name"]);
            $fileName = explode(".", $fileName);
            $extention =  end($fileName);
            $hinh = "public/imgMenu/" . date("Y-m-d") . sha1($menu["Ten"]) . ".{$extention}";
            UploadFile($_FILES["hinhanh"], $hinh);
            $menu["HinhAnh "] = "/$hinh";
        }  
        $res = PostMenu($menu);
        $idMenu = $res->insert_id;
        header("Location: /admin.php?pages=quanlymenuput&id={$idMenu}");
    } catch (Exception $th) {
        echo $th->getMessage();
    }
}

$DSMenu = GetMenu();

?>

<ol class="breadcrumb">
    <li>
        <a href="/admin.php?pages=quanlymenu">Menu</a>
    </li>
    <li class="active">Thêm</li>
</ol>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Thêm Menu</h3>
                <div class="box-tools">
                </div>
            </div>
            <div class="box-body ">
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input type="text" required name="menu[Ten]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" required name="menu[Link]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" name="hinhanh" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>STT</label>
                    <input type="number" name="menu[STT]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Hiển Thị</label>
                    <select type="checkbox" class="form-control" name="menu[HienThi]" placeholder="">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Vị Trí</label>
                    <input type="text" name="menu[ViTri]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Nhóm</label>
                    <input type="text" name="menu[Nhom]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Cấp Cha</label>
                    <select type="" name="menu[CapCha]" class="form-control">
                        <option value="0">Là Cấp Cha</option>
                        <?php
                        while($row = $DSMenu->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row["Ma"] ?>"><?php echo $row["Ten"] ?></option>
                            <?php
                        }
                        
                        ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Ghi Chú</label>
                    <input type="text" name="menu[GhiChu]" class="form-control" ___placeholder="">
                </div>

            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit" name="OK">OK</button>
                <button class="btn btn-primary" type="reset"> Làm Lại</button>
            </div>
        </div>

    </div>
</form>