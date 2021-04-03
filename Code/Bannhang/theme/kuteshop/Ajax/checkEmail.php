<?php 
    header("Content-Type: application/json");
    $data = [];
    $data["Email"]="";
    $email = $_POST["Email"];
    $kt =  TimUserTheoEmail($email);
    if($kt->num_rows==0){
        // không có email
        $data["haveEmail"]=0;
    }else{
        $data["haveEmail"]=1;
        $data["Email"]=$email;
    }
    echo json_encode($data);
?>