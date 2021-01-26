<?php 

    $sql = "SELECT * FROM `nn_admin`";
    $res = $db->query($sql); 
    // từ khoán tìm kiếm
    $keyword = "";
    // trang hien tai
    $pagesNumber = 1;
    // só dòng / trang
    $rowNumber = 10;
    // tổng số dòng
    $total = 0;
    GetAdminsPT($keyword,$pagesNumber,$rowNumber,$total);

    //var_dump($res);

?>



<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Danh Sách Loại</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Mã Loại</th>
                <th>Tên Loại</th>
                <th>Hình Ảnh</th>
                <th>Ghi Chú</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $res->fetch_array()) {
                ?>
            <tr>
                <th>
                <a class="btn btn-primary"
                 href="?pages=sualoai&id=<?php echo $row["MaLoai"] ?>">Sửa</a>
                 <a 
                 onclick="return confirm('Bạn có muốn xóa loại này không?')" 
                 class="btn btn-danger"
                 href="?pages=xoaloai&id=<?php echo $row["MaLoai"] ?>">Xóa</a>
                </th>
                <th><?php echo $row["MaLoai"]; ?></th>
                <th><?php echo $row["TenLoai"]; ?></th>
                <th><?php echo $row["HinhAnh"]; ?></th>
                <th><?php echo $row["GhiChu"]; ?></th>
            </tr>                                   
                <?php              
            }
            ?>        

                    
        </tbody>
    </table>
             
      </div>
</div>

