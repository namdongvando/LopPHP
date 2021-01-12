<?php 

    $sql = "SELECT * FROM `nn_loai`";
    $res = $db->query($sql); 
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
                <th></th>
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

