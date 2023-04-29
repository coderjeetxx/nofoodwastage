<?php

session_start();
include_once('db_conn.php');
$orderID=mysqli_real_escape_string($con,$_POST['order_id']);
$changeStatus=mysqli_real_escape_string($con,$_POST['changeStatusTo']);
$changeStatusByEmail=$_SESSION['email'];

if($result=mysqli_query($con,"UPDATE accept_order SET status='{$changeStatus}' WHERE order_id='{$orderID}'")){

        $validation_msg = array("icon"=>"success", "text"=>"Order Status Change To ".$changeStatus, "title"=>"Success");
        echo json_encode($validation_msg); 
   

    
    

}else{
    $validation_msg = array("icon"=>"error", "text"=>"Some Thing Goes Wrong ", "title"=>"Please Try After Sometime");
    echo json_encode($validation_msg); 
}



?>