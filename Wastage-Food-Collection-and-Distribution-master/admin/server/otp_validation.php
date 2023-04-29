<?php
session_start();
include_once('db_conn.php');

$otp=mysqli_real_escape_string($con,$_POST['otp']);
$email=$_SESSION['doner_email'];

$validation_msg= "";
// echo json_encode($email)
$sql = mysqli_query($con, "SELECT * FROM doner WHERE doner_email='{$email}' ");

$result=mysqli_fetch_assoc($sql);
// echo json_encode($result);
if ($otp == $result['otp']) {
    // UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;
    $updatesqlquery=mysqli_query($con,"UPDATE doner SET otp = '0' WHERE doner_email='{$email}'");
    if ($updatesqlquery) {
        $_SESSION['otpsatus']=false;
        $validation_msg = array("icon"=>"success", "text"=>"OTP Validated", "title"=>"Done!", "buttons"=>true,
        "dangerMode"=> true);
        echo json_encode($validation_msg); //convert array to json format
      
    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Please Try After SomeTime", "title"=>"Sorry!");
        echo json_encode($validation_msg); //convert array to json format
    }
  
}else{
    $validation_msg = array("icon"=>"error", "text"=>"Invalid OTP", "title"=>"Sorry!");
    echo json_encode($validation_msg); //convert array to json format

}

?>