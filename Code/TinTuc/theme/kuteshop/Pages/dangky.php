<div class="container">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <form id="formDangKy" action="/index.php?pages=xulydangky" method="POST" role="form">
            <legend class="text-center">Đăng Ký</legend>
            <div class="form-group">
                <label for="">Họ & Tên</label>
                <input type="text" name="HoTen" class="form-control" id="HoTen" placeholder="Họ & Tên">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="Email" class="form-control" id="Email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Mật Khẩu">
            </div>
            <div class="form-group">
                <label for="">Nhập Lại Mật Khẩu</label>
                <input type="password" name="RePassword" class="form-control" id="RePassword" placeholder="Nhập Lại Mật Khẩu">
            </div>
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </p>


        </form>
        <p></p>
        <p>
            <a href="/index.php?pages=dangnhap">Bạn đã có tài khoản?</a>
        </p>
    </div>

</div>
<script type="text/javascript">
    $(function() {

        $("#formDangKy").submit(function() {
            try {
                if ($("#HoTen").val() == "") {
                    /* chưa nhập tên */
                    $("#HoTen").focus();
                    throw "Bạn Chưa Nhập Họ & Tên";
                }
                if ($("#Email").val() == "") {
                    /* chưa nhập EMAIL */
                    $("#Email").focus();
                    throw "Bạn Chưa Nhập Email";
                }
                /* kiểm tra có phải email không? */
                var userinput = $("#Email").val();
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                 
                if (pattern.test(userinput) == false) {
                    // alert("Email Không Đúng Định Dạng");
                    $("#Email").focus().select();
                    throw "Email Không Đúng Định Dạng";
                }
                // kiểm tra email đã dùng chưa
                var formDataSend = {"Email":$("#Email").val()};
                $.ajax({
                    method: "POST",
                    url: "/ajax.php?pages=checkEmail",
                    data: formDataSend,
                    async: false,
                }).done(function(res) {
                    console.log(res);
                    if(res.haveEmail == 1){
                        // đã có email
                        $("#Email").focus().select();
                        throw "Email Đã Được Sử Dụng";
                    }
                }); 
                var Password = $("#Password").val();
                var RePassword = $("#RePassword").val();
                if(Password==""){
                    $("#Password").focus();
                    throw "Bạn Chưa Nhập Mật Khẩu";
                }
                if(Password != RePassword){
                    $("#RePassword").focus();
                    throw "Mật Khẩu Không Khớp";
                }
                return true;
            } catch (error) {
                console.log(error);
                alert(error);
                return false
            }
        });
    });
</script>