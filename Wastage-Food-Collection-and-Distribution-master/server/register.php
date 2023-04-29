<?php
include_once('db_conn.php');
session_start();
$username=mysqli_real_escape_string($con,$_POST['username']);
$useremail=mysqli_real_escape_string($con,$_POST['useremail']);
// $userrole=mysqli_real_escape_string($con,$_POST['userrole']);
$state=mysqli_real_escape_string($con,$_POST['state']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$repassword=mysqli_real_escape_string($con,$_POST['repassword']);
// $username="chiku";
// $useremail="cchiku1999@gmail.com";
// $userrole="user";
// $state="odisha";
// $city="bbsr";
// $password="chiku";
// $repassword="chiku";
// $validation_msg= "";
if(!empty($username) && !empty($useremail) && !empty($state) && !empty($city) && !empty($password) && !empty($repassword)){

    if(!preg_match('/[^A-Za-z\s]/',$username)){

        if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){

         
           if($password == $repassword){
   
            $sql = mysqli_query($con, "SELECT * FROM user WHERE user_email='{$useremail}' ");
            if (!mysqli_num_rows($sql) > 0) {
                $otp = rand(111111, 999999);             //generate OTP with 6 digit
                $hash_psw = password_hash($password, PASSWORD_BCRYPT);   //password hashing
                $userrole="user";
                $insert_sql_query = "INSERT INTO user (user_email,user_name,user_psw,user_roll,user_state,user_city,otp) VALUES('{$useremail}','{$username}','{$hash_psw}','{$userrole}','{$state}','{$city}','{$otp}')";

                if(mysqli_query($con, $insert_sql_query)){
                    $_SESSION['user_email']=$useremail;
                    $_SESSION['user_name']=$username;
                    $_SESSION['otpsatus']=false;
                    include_once '../PHP_MAILER/email_Services.php';
                    // send_Email_OTP($useremail,"OTP Verification",'Hi Your OTP is'.$otp);
                    if(send_Email_OTP($useremail,"OTP Verification",'Hi Your OTP is '.$otp)){

                        $_SESSION['otpsatus']=true;   
                        $validation_msg = array("icon"=>"success", "text"=>"Successfully OTP Send '{$useremail}'", "title"=>"Done!","buttons"=>["cancel", "OTP Verified"], "dangerMode"=> true);
                        echo json_encode($validation_msg); //convert array to json format


                    }else{
                        $validation_msg = array("icon"=>"error", "text"=>"We Unble To Send OTP ", "title"=>"Done!");
                        echo json_encode($validation_msg); //convert array to json format

                    }


                       

                }else{
                    $validation_msg = array("icon"=>"error", "text"=>"Registration Failed Our end", "title"=>"Done!");
                    echo json_encode($validation_msg); //convert array to json format
                }



           
                    
            }else{
                $validation_msg = array("icon"=>"error", "text"=>"USER-EMAIL already Exist", "title"=>"Sorry!");
                echo json_encode($validation_msg); //convert array to json format

            }   








           }else{
            $validation_msg = array("icon"=>"error", "text"=>"Password Mismatch", "title"=>"Sorry!");
            echo json_encode($validation_msg); //convert array to json format

           }


        }else{
            $validation_msg = array("icon"=>"error", "text"=>"Please Select Correct EMAIL-ID", "title"=>"Sorry!");
            echo json_encode($validation_msg); //convert array to json format
        }

        
    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Please Select A-Z/a-z Charactor In USERNAME", "title"=>"Sorry!");
        echo json_encode($validation_msg); //convert array to json format
        
    }
}else{

    $validation_msg = array("icon"=>"error", "text"=>"Please Fill All Required Field", "title"=>"Sorry!");
    echo json_encode($validation_msg); //convert array to json format
}




?>