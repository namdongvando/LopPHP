Chọn Đia Chỉ

<div class="cotent">
    <div  class="">
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">Chọn Địa Chỉ</h3>
          </div>
          <div class="panel-body">
            <div class="form-group col-md-4">
                <label for="">Tỉnh Thành Phố</label>
                <select onchange="loadQuanHuyen(this.value)" name="" id="selectTinhThanh" class="form-control" >
                    <option value="">001</option>
                </select>
                
            </div>                
            <div class="form-group col-md-4">
                <label for="">Quận Huyện</label>
                <select onchange="loadPhuongXa(this.value)" name="" id="selectQuanHuyen" class="form-control" >
                    <option value="">001</option>
                </select>
                
            </div>                
            <div class="form-group col-md-4">
                <label for="">Phường Xã</label>
                <select name="" id="selectPhuongXa" class="form-control" >
                    <option value="">001</option>
                </select>
                
            </div>                

                
          </div>
    </div>    
    </div>
</div>
<script>
function loadTinhThanh() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("selectTinhThanh").innerHTML 
        = this.responseText;
        }
    };
    xhttp.open("GET", "/sudungajax/tinhthanh.php", true);
    xhttp.send();
}
function loadQuanHuyen(code) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("selectQuanHuyen").innerHTML 
        = this.responseText;
        }
    };
    xhttp.open("GET", "/sudungajax/quanhuyen.php?code="+code, true);
    xhttp.send();
}
function loadPhuongXa(code) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("selectPhuongXa").innerHTML 
        = this.responseText;
        }
    };
    xhttp.open("GET", "/sudungajax/phuongxa.php?code="+code, true);
    xhttp.send();
}
loadTinhThanh();

</script>