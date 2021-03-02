<?php 
$tong = 0;
$DSLoai =  GetLoaiPT("",1,1000,$tong);


?>

<ol class="breadcrumb">
    <li>
        <a href="/">Dashboard</a>
    </li>
    <li>
        <a href="?pages=hhdanhsach">Danh Sách Hàng Hóa</a>
    </li>
    <li class="active">Thêm Hàng hóa</li>
</ol>
<div class="content">
    <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title">Thêm Hàng Hóa</h3>
        </div>
        <div class="panel-body">
                <form action="" method="POST" role="form">
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Mã Hàng Hóa</label>
                            <input type="text" class="form-control" id="" placeholder="Input field">
                        </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Tên Hàng Hóa</label>
                            <input type="text" class="form-control" id="" placeholder="Input field">
                        </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Giá</label>
                            <input type="number" class="form-control" id="" placeholder="Input field">
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Số Lượng</label>
                            <input type="number" class="form-control" id="" placeholder="Input field">
                        </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Loại</label>
                            <select class="form-control" >
                            <?php 
                            while($row = $DSLoai->fetch_array()){
                                ?>
                                <option><?php echo $row["TenLoai"] ?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Nhà Cung Cấp</label>
                            <input type="number" class="form-control" id="" placeholder="Input field">
                        </div>
                </div>
                
                    
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#TomTat" aria-controls="TomTat" role="tab" data-toggle="tab">Tóm Tắt</a>
                            </li>
                            <li role="presentation">
                                <a href="#MoTa" aria-controls="MoTa" role="tab" data-toggle="tab">Mô Tả Hàng Hóa</a>
                            </li>
                            <li role="presentation">
                                <a href="#HinhAnh" aria-controls="HinhAnh" role="tab" data-toggle="tab">Hình Ảnh</a>
                            </li>
                            <li role="presentation">
                                <a href="#GhiChu" aria-controls="GhiChu" role="tab" data-toggle="tab">Ghi Chú</a>
                            </li>
                        </ul>
                    
                        <!-- Tab panes -->
                        <div class="tab-content" style="min-height:200px" >
                            <div role="tabpanel" class="tab-pane active" id="TomTat">
                            Tom Tắt Thông Tin Hàng Hóa
                                <textarea name="TomTat" id="txtTomTat"  class="form-control" rows="3" required="required"></textarea>
                                
                            </div>
                            <div role="tabpanel" class="tab-pane" id="MoTa">
                            Mô Tả Thông Tin Hàng Hóa
                            <textarea name="MoTa" id="txtMoTa"  class="form-control" rows="3" required="required"></textarea>
                            
                            </div>
                            <div role="tabpanel" class="tab-pane" id="HinhAnh">
                                <input type="file" >
                            </div>
                            <div role="tabpanel" class="tab-pane" id="GhiChu">
                            <textarea name="editor1"   class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    

                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                


        </div>
    </div>

</div>
<script  src="\public\admin\plugins\ckeditor\ckeditor.js"></script>
<script>
        CKEDITOR.replace('txtMoTa');
        CKEDITOR.replace('txtTomTat');
        
</script>