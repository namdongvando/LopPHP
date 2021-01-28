<?php 

    $sql = "SELECT * FROM `nn_admin`";
    $res = $db->query($sql); 
    // từ khoán tìm kiếm
    $keyword = "";
    // trang hien tai
    $pagesNumber = 
    isset($_REQUEST["pagesNumber"])?$_REQUEST["pagesNumber"]:1;
    // só dòng / trang
    $rowNumber = 
    isset($_REQUEST["rowNumber"])?$_REQUEST["rowNumber"]:10;
    // tổng số dòng
    $total = 0;
    $taiKhoans = GetAdminsPT($keyword,$pagesNumber,$rowNumber,$total);
    //var_dump($res);
    echo $total;
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
                <th>#</th>
                <th>Ho & Tên</th>
                <th>Tài Khoản</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Tình Trạng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            while ($row = $taiKhoans->fetch_array()) {
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
                <th><?php echo $index++; ?></th>
                <th><?php echo $row["Name"]; ?></th>
                <th><?php echo $row["Username"]; ?></th>
                <th><?php echo $row["Phone"]; ?></th>
                <th><?php echo $row["Email"]; ?></th>
                <th><?php echo $row["Active"]; ?></th>
            </tr>                                   
                <?php              
            }
            ?>        

                    
        </tbody>
    </table>
        <ul class="pagination">
            <li class="active" ><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>             
      </div>
</div>

