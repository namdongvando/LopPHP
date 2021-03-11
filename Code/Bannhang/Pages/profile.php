<?php
    if(isset($_POST["LuuThongTinChung"])){
        // var_dump($_POST["user"]);
        $userSubmit = $_POST["user"];
        //  var_dump($userSubmit["BOD"]);
        // kiểm tra dữ liệu giới tính
        $userSubmit["Sex"] = isset($userSubmit["Sex"])
        ?$userSubmit["Sex"]:"0";
       //  var_dump($userSubmit["BOD"]);
        $userSubmit["BOD"] =
         date("Y-m-d",strtotime($userSubmit["BOD"]));
        // var_dump($userSubmit["BOD"]);
        $res = UserUpdate($userInfo["Username"],$userSubmit);
        if($res){
            $userInfo["Name"] = $userSubmit["Name"];
            $userInfo["Sex"] = $userSubmit["Sex"];
            $userInfo["Phone"] = $userSubmit["Phone"];
            $userInfo["Address"] = $userSubmit["Address"];
            $userInfo["BOD"] = $userSubmit["BOD"];
            // cập nhật vào session
            $_SESSION["UserInfo"] = $userInfo;
        }
    }
    $loiPassword = "";
    if(isset($_POST["Capnhatmatkhau"])){
        try {
            $password= $_POST["userpassword"]["oldPassword"];
            $newPassword= $_POST["userpassword"]["newPassword"];
            $rePassword= $_POST["userpassword"]["rePassword"];
            $uf = Login($userInfo["Username"],$password);

            if($uf == null){
// mật cũ không đúng
                throw new Exception("Mật khẩu cũ không đúng");
            }
            // mat khau cũ dúng
            if($newPassword != $rePassword){
                throw new Exception("Mật khẩu nhập lại không khớp");
            }

            // ok 
            $res = UserUpdatePassword($userInfo["Username"],$newPassword);
            if($res){
                throw new Exception("Cập nhật thành công");
            }

        } catch (Exception $ex) {
            $loiPassword = $ex->getMessage();
        }


    }

?>

<div class="content">
    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">Thông tin chung</h3>
          </div>
          <div class="panel-body">
                <form action="" method="POST" role="form">
                    <div class="form-group col-md-3">
                        <label for="">Họ và Tên</label>
                        <input value="<?php echo $userInfo["Name"]; ?>" name="user[Name]" type="text" class="form-control" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Email</label>
                        <input value="<?php echo $userInfo["Email"]; ?>" name="user[Email]" type="email" class="form-control" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">SĐT</label>
                        <input value="<?php echo $userInfo["Phone"]; ?>" name="user[Phone]" type="text" class="form-control" >
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="">Ngày Sinh</label>
                        <input value="<?php echo $userInfo["BOD"]; ?>" name="user[BOD]" type="date" class="form-control" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Địa Chỉ</label>
                        <input value="<?php echo $userInfo["Address"]; ?>" name="user[Address]" type="text" class="form-control" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="GioiTinh">Giới Tính Nam</label>
                        <input value="1" <?php echo $userInfo["Sex"]==1?'checked':''; ?>  name="user[Sex]" id="GioiTinh" type="checkbox" class="" >
                    </div>
                    <div class="clearfix"></div>
                    <button name="LuuThongTinChung" type="submit" class="btn btn-primary">Lưu</button>
                </form>
                
          </div>
    </div>
    <div class="panel panel-success">
          <div class="panel-heading">
                <h3 class="panel-title">Bảo Mật</h3>
          </div>
          <div class="panel-body">
          <form action="" method="POST" >
          <p><?php echo $loiPassword; ?></p>
          <div class="form-group col-md-4">
                        <label for="GioiTinh">Mật Khẩu Cũ</label>
                        <input required  name="userpassword[oldPassword]"  type="password" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                        <label for="GioiTinh">Mật Khẩu Mới</label>
                        <input  required name="userpassword[newPassword]"  type="password" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                        <label for="GioiTinh">Nhập Lại Mật Khẩu</label>
                        <input required  name="userpassword[rePassword]"  type="password" class="form-control" >
                </div>
                <button name="Capnhatmatkhau" type="submit" class="btn btn-primary">Cập Nhât Mật Khẩu</button>
          </form>
          
          </div>
    </div>
    

</div>