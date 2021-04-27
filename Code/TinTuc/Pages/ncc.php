<?php 

    $sql = "SELECT * FROM `nn_nhacungcap`";
    $res = $db->query($sql); 
    //var_dump($res);

?>



<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Danh Sách NCC</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Mã Ncc</th>
                <th>Tên Công Ty</th>
                <th>Điện Thoại</th>
                <th>Email</th>
                <th>Người Liên Hệ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $res->fetch_array()) {
                ?>
            <tr>
                <th>
                <a class="btn btn-primary"
                 href="?pages=suancc&id=<?php echo $row["MaNCC"] ?>">Sửa</a>
                 <a 
                 onclick="return confirm('Bạn có muốn xóa loại này không?')" 
                 class="btn btn-danger"
                 href="?pages=xoancc&id=<?php echo $row["MaNCC"] ?>">Xóa</a>
                </th>
                <th><?php echo $row["MaNCC"]; ?></th>
                <th><?php echo $row["TenCTY"]; ?></th>
                <th><?php echo $row["DienThoai"]; ?></th>
                <th><?php echo $row["Email"]; ?></th>
                <th><?php echo $row["NguoiLienHe"]; ?></th>
            </tr>                                   
                <?php              
            }
            ?>        

                    
        </tbody>
    </table>
             
      </div>
</div>

