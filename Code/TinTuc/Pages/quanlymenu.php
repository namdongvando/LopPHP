<?php
if(isset($_GET["copyid"])){
    $menuCopy = GetMenuById($_GET["copyid"]);
    PostMenu($menuCopy);
    header("Location: /admin.php?pages=quanlymenu");
}
if (isset($_POST["OK"])) {
    // var_dump($_POST['menu']);
    foreach ($_POST['menu'] as $maMenu => $v) {
        // print_r($v["Ten"]);
        $menuSua = GetMenuById($maMenu);
        $menuSua["Ten"] = $v["Ten"];
        $menuSua["STT"] = $v["STT"];
        $menuSua["Nhom"] = $v["Nhom"];
        $menuSua["CapCha"] = $v["CapCha"];
        PutMenu($menuSua);
    }
}
$DSMenu = GetMenu();

?>

<ol class="breadcrumb">
    <li>
        <a href="#">Trang Chủ</a>
    </li>
    <li class="active">Menu</li>
</ol>


<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Danh sách Menu</h3>
            <div class="box-tools">
                <a class="btn btn-primary" href="/admin.php?pages=quanlymenupost">Thêm Menu</a>
            </div>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg-blue">
                            <th>#</th>
                            <th></th>
                            <th>Tiêu Đề</th>
                            <th>STT</th>
                            <th>Nhóm</th>
                            <th>Cấp Cha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dem = 1;
                        while ($row = $DSMenu->fetch_assoc()) {
                            $DSMenuSelect = GetMenu();
                       ?>
                            <tr>
                                <th><?php echo $dem++; ?></th>
                                <th>
                                    <a class="btn btn-primary" href="/admin.php?pages=quanlymenuput&id=<?php echo $row["Ma"] ?>">Sửa</a>
                                    <a class="btn btn-danger" href="/admin.php?pages=quanlymenudelete&id=<?php echo $row["Ma"] ?>">Xóa</a>
                                    <a class="btn btn-success" href="/admin.php?pages=quanlymenu&copyid=<?php echo $row["Ma"] ?>">Copy</a>
                                </th>
                                <th>
                                    <input name="menu[<?php echo $row["Ma"] ?>][Ten]" value="<?php echo $row["Ten"] ?>">
                                </th>
                                <th><?php echo $row["STT"] ?>
                                    <input name="menu[<?php echo $row["Ma"] ?>][STT]" value="<?php echo $row["STT"] ?>">
                                </th>
                                <th><input name="menu[<?php echo $row["Ma"] ?>][Nhom]" value="<?php echo $row["Nhom"] ?>"></th>
                                <th><?php
                                    echo $row["CapCha"] != 0 ?
                                        GetMenuById($row["CapCha"])["Ten"] :
                                        "Là Cấp Cha";  ?>

                                    <select type="" name="menu[<?php echo $row["Ma"] ?>][CapCha]" class="form-control">
                                        <option value="0">Là Cấp Cha</option>
                                        <?php
                                        while ($row1 = $DSMenuSelect->fetch_assoc()) {
                                        ?>
                                            <option <?php echo $row["CapCha"] == $row1["Ma"] ? 'selected' : '' ?> value="<?php echo $row1["Ma"] ?>"><?php echo $row1["Ten"] ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                </th>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <button name="OK">Sửa Tất Cả</button>
            </form>

        </div>
    </div>

</div>