<?php
session_start();
include_once('db_conn.php');

$useremail=mysqli_real_escape_string($con,$_POST['useremail']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$validation_msg= "";
if(!empty($useremail) && !empty($password) ){

    if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($con, "SELECT * FROM user WHERE user_email='{$useremail}'");
    
        if(mysqli_num_rows($sql) > 0){
            $result=mysqli_fetch_assoc($sql);
            if(!$result['otp']){

                if (password_verify($password, $result['user_psw'])) {
                    $_SESSION['login_status']=true;
                    $_SESSION['login_role']=$result['user_roll'];
                    $_SESSION['login_user_email']=$result['user_email'];
                    $_SESSION['login_user_name']=$result['user_name'];
                    $validation_msg = array("icon"=>"success", "text"=>"login Succesfull", "title"=>"Done!", "buttons"=>true,
                    "dangerMode"=> true);
                    echo json_encode($validation_msg); //convert array to json format
                }else{
                    $validation_msg = array("icon"=>"error", "text"=>"Incorrect Password", "title"=>"Sorry!");
                    echo json_encode($validation_msg); //convert array to json format
            
                }

            }else{
                $_SESSION['user_email']=$useremail;
                $_SESSION['otpsatus']=true;
                $validation_msg = array("icon"=>"warning", "text"=>"This Email '{$useremail}' Is Not activeted", "title"=>"Done!","buttons"=>["cancel", "Let's Activated"], "dangerMode"=> true);
                echo json_encode($validation_msg);


            }
          



        }else{
    

            $validation_msg = array("icon"=>"error", "text"=>"Your EMAIL-ID Not Found", "title"=>"Sorry!");
            echo json_encode($validation_msg); //convert array to json format
    

        }




    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Please Select Correct EMAIL-ID", "title"=>"Sorry!");
        echo json_encode($validation_msg); //convert array to json format

    }    
    

}else{

    $validation_msg = array("icon"=>"error", "text"=>"Please Fill All Required Field", "title"=>"Sorry!");
    echo json_encode($validation_msg); //convert array to json format
}




?>