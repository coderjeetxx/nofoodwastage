<?php
include_once('db_conn.php');

$username=mysqli_real_escape_string($con,$_POST['username']);
$useremail=mysqli_real_escape_string($con,$_POST['email']);
// $userrole=mysqli_real_escape_string($con,$_POST['userrole']);
$meaasge=mysqli_real_escape_string($con,$_POST['message']);


if(!empty($username) && !empty($useremail) && !empty($meaasge)){

    $sql=mysqli_query($con,"INSERT INTO contact(name,email,msg) VALUES ('{$username}','{$useremail}','{$meaasge}')");
    if($sql){
        $validation_msg = array("icon"=>"success", "text"=>"Your Query Send Successfully", "title"=>"Done!");
        echo json_encode($validation_msg);
    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Something Went Wrong Please Try After Some Time", "title"=>"Sorry!");
        echo json_encode($validation_msg);

    }

}else{
    $validation_msg = array("icon"=>"error", "text"=>"Please Fill All Required Field", "title"=>"Sorry!");
    echo json_encode($validation_msg); //convert array to json format
}



?>