<?php 
$tong = 0;
$DSLoai =  GetLoaiPT("",1,1000,$tong);
$DSNCC =  GetNccPT("",1,1000,$tong);
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
    <form action="" id="formThemHH" method="POST" role="form">
        <legend>Thêm Hàng Hóa</legend>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Mã Hàng Hóa</label>
                    <input id="hhCode" type="text" name="hh[Code]" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Hàng Hóa</label>
                    <input type="text" id="hhTenHH" name="hh[TenHH]" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Hàng Hóa</label>
                    <input type="text" id="hhGia" name="hh[Gia]" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Số Lượng</label>
                    <input type="text" id="hhSoLuong" name="hh[SoLuong]" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Loại Hàng Hóa</label>
                    <select  name="hh[MaLoai]" class="select2 form-control" >
                        <?php 
                        if($DSLoai){
                             while ($row = $DSLoai->fetch_array()) {
                               ?>
                                <option value="<?php echo $row["MaLoai"] ?>" ><?php echo $row["TenLoai"] ?></option>
                                <?php
                             }   
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nhà Cung Cấp</label>
                    <select  name="hh[MaNCC]" class="select2 form-control" >
                    <?php 
                        if($DSNCC){
                             while ($row = $DSNCC->fetch_array()) {
                               ?>
                                <option value="<?php echo $row["MaNCC"] ?>" ><?php echo $row["TenCTY"] ?></option>
                                <?php
                             }   
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Quy Cách đóng gói</label>
                    <input type="text" name="hh[QuyCachDongGoi]" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Ghi Chú</label>
                    <input type="text" name="hh[GhiChu]" class="form-control" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Tóm Tắt</label>
                    <textarea id="TomTat" name="hh[TomTat]"  class="form-control" rows="3" ></textarea>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Mô Tả</label>
                    <textarea id="MoTa" name="hh[NoiDung]"  class="form-control" rows="3" ></textarea>
                    
                </div>
            </div>
            <div class="col-md-12">
            <label>Hình Ảnh</label>
            <input type="file" name="fileHinhAnh" class="form-control" title="">
            
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
<link rel="stylesheet" href="/public/admin/plugins/select2/select2.min.css">
<script src="/public/admin/plugins/select2/select2.full.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script >
    $(function(){
        $(".select2").select2();
        CKEDITOR.replace('TomTat');
        CKEDITOR.replace('MoTa');
        $("#formThemHH").submit(function(){
            //alert("aasda");
            try {
                if($("#hhCode").val()==""){
                    $("#hhCode").focus();
                    throw "Bạn Chưa nhập mã hàng hóa";
                }  
                if($("#hhTenHH").val()==""){
                    $("#hhTenHH").focus();
                    throw "Bạn Chưa nhập Tên hàng hóa";
                }  
                if($("#hhGia").val()==""){
                    $("#hhGia").focus();
                    throw "Bạn Chưa nhập Giá hàng hóa";
                }  
                // giá ĐÃ NHẬP
                var gia = $("#hhGia").val();
                if(isNaN(gia)){
                    $("#hhGia").focus();
                    throw "Giá hàng hóa không hợp lệ";
                }

                if($("#hhSoLuong").val()==""){
                    $("#hhSoLuong").focus();
                    throw "Bạn Chưa nhập SL hàng hóa";
                }
                // Số Lượng ĐÃ NHẬP
                var sl = $("#hhSoLuong").val();
                
                if(isNaN(sl)){
                    $("#hhSoLuong").focus();
                    $("#hhSoLuong").select();
                    throw "Số Lượng hàng hóa không hợp lệ 1";
                }
                // 
                sl = parseFloat(sl);
                 
                if(sl%1 != 0 ||sl < 0  ){
                    $("#hhSoLuong").focus();
                    $("#hhSoLuong").select();
                    throw "Số Lượng hàng hóa không hợp lệ";
                }   
                return true;
            } catch (error) {
                alert(error);
                return false;
            }
        });

    });
</script>

