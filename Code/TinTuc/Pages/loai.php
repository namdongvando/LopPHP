<?php 

$name = isset($_REQUEST["keyword"])?$_REQUEST["keyword"]:''; 
$pagesNumber = isset($_REQUEST["pagesNumber"])?$_REQUEST["pagesNumber"]:1; 
$rowNumber = isset($_REQUEST["rowNumber"])?$_REQUEST["rowNumber"]:10; 
$total = 0;
$pagesNumber = max(1,$pagesNumber);
$res = 
    GetLoaiPT($name,$pagesNumber,$rowNumber,$total); 
    //var_dump($res);
$totalPages = ceil($total/$rowNumber);
$pagesNumber = min($pagesNumber,$totalPages);
$res = 
    GetLoaiPT($name,$pagesNumber,$rowNumber,$total); 
?>
<div class="panel panel-primary">
      <div class="panel-heading">
            <h3 class="panel-title">Danh Sách Loại</h3>
      </div>
      <div class="panel-body">
      <form action="" method="get" >  
            <div class="form-inline" >
                <input type="text" name="keyword" >
                <input value="loai" type="hidden" name="pages" >
                <input type="submit" value="Tìm Kiếm" >
            </div>
      </form>
      
        <select 
        onchange="window.location.href=
        '?pages=loai&rowNumber='+this.value" >
           
            <option <?php echo $rowNumber==10?'selected':'' ?> >10</option>
            <option <?php echo $rowNumber==20?'selected':'' ?> >20</option>
            <option <?php echo $rowNumber==50?'selected':'' ?> >50</option>
            <option <?php echo $rowNumber==100?'selected':'' ?> >100</option>
        </select>
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

            <?php 
            echo PhanTrang($totalPages
            ,$pagesNumber
            ,"?pages=loai&pagesNumber=[i]&rowNumber={$rowNumber}");
            ?>

      </div>
</div>

