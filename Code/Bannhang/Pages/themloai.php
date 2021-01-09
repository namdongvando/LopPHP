<section class="content">
    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">Thêm Loại</h3>
          </div>
          <div class="panel-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Tên Loại</label>
                        <input name="loai[TenLoai]" type="text" class="form-control"  placeholder="Tên Loại">
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <input type="file" name="fileLoai" 
                        class="form-control"  placeholder="Tên Loại">
                    </div>
                    <div class="form-group">
                        <label for="">Ghi Chú</label>
                        <textarea name="loai[TenLoai]"  class="form-control" 
                         placeholder="Ghi Chú"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Cha</label>
                        <select name="loai[TenLoai]"  class="form-control">
                <option>Là Cấp Cha</option>                            
</select>
                    </div>
                    
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
          </div>
    </div>
    

</section>