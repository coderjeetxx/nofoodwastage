<?php

session_start();
include_once('db_conn.php');
$orderID=mysqli_real_escape_string($con,$_POST['orderID']);
$orderplaceByName=mysqli_real_escape_string($con,$_POST['username']);
$orderplaceByEmail=mysqli_real_escape_string($con,$_POST['useremail']);
// echo json_encode($_POST);

$orderAcceptedByName=$_SESSION['user_name'];
$orderAcceptedByEmail=$_SESSION['email'];

$sql= mysqli_query($con,"SELECT * FROM user_order WHERE orderID='{$orderID}' AND accept=0");
if (mysqli_num_rows($sql)>0) {
    if($result=mysqli_query($con,"UPDATE user_order SET accept=1 WHERE orderID='{$orderID}'")){

        if ($result2=mysqli_query($con,"INSERT INTO accept_order (order_id,order_place_By, order_accept_By,status) VALUES ('{$orderID}','{$orderplaceByEmail}','{$orderAcceptedByEmail}','conform')")) {
            $validation_msg = array("icon"=>"success", "text"=>"Order Accepted By You", "title"=>"Congratulation");
            echo json_encode($validation_msg); 
        }else{
            $validation_msg = array("icon"=>"error", "text"=>"Some Thing Goes Wrong ", "title"=>"Please Try After Sometime");
            echo json_encode($validation_msg); 

        }

        
        

    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Some Thing Goes Wrong ", "title"=>"Please Try After Sometime");
        echo json_encode($validation_msg); 
    }

    
}else{
    $validation_msg = array("icon"=>"error", "text"=>"Already Accepted By Someone", "title"=>"Please Try another");
    echo json_encode($validation_msg); 
}






?>