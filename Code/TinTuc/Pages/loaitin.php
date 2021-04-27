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
if(isset($_GET["XoaLoai"])){
    $idLoai = intval($_GET["XoaLoai"]);
    DeleteLoaiTin($idLoai);
}
$DSLoaiTin = GetLoaiTin();


?>

<ol class="breadcrumb">
    <li>
        <a href="#">Dashboar</a>
    </li>
    <li class="active">Loại Tin</li>
</ol>

<div class="">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Quản Lý Loại Tin</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover" id="DSLoaiTin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dem = 1;
                    while ($row = $DSLoaiTin->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $dem++; ?></td>
                            <td><?php echo $row["idLT"]; ?></td>
                            <td><?php echo $row["TenLoai"]; ?></td>
                            <td style="width: 200px;">
                                <a href="/admin.php?pages=loaitin&XoaLoai=<?php echo $row["idLT"]; ?>"
                                 data-confirm="Bạn có muốn xóa không?" class="btn btn-danger xoa">Xóa</a>
                                <a href="/admin.php?pages=loaitinput&idLT=<?php echo $row["idLT"]; ?>"  class=" btn btn-primary">Sửa</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>

</div>


<form action="" method="POST">
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm Loại Tin</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="textareaTenLoaiTin" class=" control-label">Tên Loại Tin:</label>
                        <input name="TenLoaiTin" id="textareaTenLoaiTin" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="textareaTenLoaiTin" class=" control-label">Hình Ảnh:</label>
                        <input type="file" name="HinhAnh" id="textareaTenLoaiTin" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="textareaNoiDung" class="control-label">Nội Dung:</label>
                        <textarea class="editor" name="NoiDung" id="textareaNoiDung" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="submit" name="ThemLoaiTin" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>

</form>


<script src="/public/admin/plugins/ckeditor/ckeditor.js"></script>
<script src="/public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $(".xoa").click(function(){
            var datahtml = $(this).data();
            if(window.confirm(datahtml.confirm)==false){
                return false;
            }
        }); 
        $("#DSLoaiTin").DataTable();
        CKEDITOR.replace('textareaNoiDung');
    });
</script>