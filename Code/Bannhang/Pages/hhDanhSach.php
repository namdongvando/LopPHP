<?php 
//"INSERT INTO `nn_hanghoa` (`MaHH`, `Code`, `TenHH`, `Gia`, `SoLuong`, `QuyCachDongGoi`, `MaLoai`, `MaNCC`, `NgayTao`, `SoLanXem`, `TomTat`, `GhiChu`, `NoiDung`, `HinhAnh`) VALUES (NULL, 'Code', 'TenHH', '1', '1', 'QuyCachDongGoi', '1', '1', '2021-03-02 00:00:00', '0', 'TomTat', 'GhiChu', 'NoiDung', 'HinhAnh');"
    $tong = 0;
    $danhSachHH = GetHHPT("",1,10,$tong);

?>
<ol class="breadcrumb">
    <li>
        <a href="/">Dashboard</a>
    </li>
    <li class="active">Danh sách hàng hóa</li>
</ol>

<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Danh sách hàng hóa</h3>
      </div>
      <div class="panel-body">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Giá </th>
                        <th>Số Lượng</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                $index = 1;
                if($danhSachHH)
                    while($row = $danhSachHH->fetch_array())
                    {
                        ?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $row["Code"] ?></td>
                            <td><?php echo $row["TenHH"] ?></td>
                            <td><?php echo $row["Gia"] ?></td>
                            <td><?php echo $row["SoLuong"] ?></td>
                            <td>#</td>
                        </tr>
                        <?php
                    }
                
                ?>

                    
                </tbody>
            </table>
            
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
                        
      </div>
</div>
