<?php
session_start();
include_once('db_conn.php');
$target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$orderID=mysqli_real_escape_string($con,$_POST['orderID']);
$status=mysqli_real_escape_string($con,$_POST['status']);
$img_name=$_FILES['fileToUpload']['name'];
$img_type=$_FILES['fileToUpload']['type'];
$img_size=$_FILES['fileToUpload']['size'];
$img_temp_name=$_FILES['fileToUpload']['tmp_name'];
$img_expload=explode('.',$img_name);//SEPARATE THE FILE NAME AFTER " . "
$img_extension=end($img_expload);//ONLY STORE THE FILE EXTENSION
$extension=["png","jpg","jpeg"];// OUR REQUERMENT EXTENSTION
//CHECK USER INPUT FILE EXTENSION IS MATCH OUR EXETENTION
if(in_array($img_extension,$extension)==true){

    $time=time();
    $image_name=rand(111,999).$time.'.'.$img_extension;
    move_uploaded_file($img_temp_name,"upload/".$image_name);
    // SELECT `id`, `orderID`, `time`, `satus` FROM `order_img` WHERE 1
    $sql=mysqli_query($con,"INSERT INTO order_img (orderID,image) VALUES('{$orderID}','{$image_name}')");
    if($result=mysqli_query($con,"UPDATE accept_order SET status='{$status}' WHERE order_id='{$orderID}'")){

        $validation_msg = array("icon"=>"success", "text"=>"Thak You For Giving Food To Hungry People", "title"=>"Ditribution Successfull");
        echo json_encode($validation_msg); 
   

    
    

}else{
    $validation_msg = array("icon"=>"error", "text"=>"Some Thing Goes Wrong ", "title"=>"Please Try After Sometime");
    echo json_encode($validation_msg); 
}


}else{
    $validation_msg = array("icon"=>"error", "text"=>"Please upload Only JPG,PNG,JPEG", "title"=>"Sorry!");
    echo json_encode($validation_msg);
}
