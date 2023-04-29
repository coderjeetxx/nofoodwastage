
<?php
session_start();
include_once('db_conn.php');

$donorname=mysqli_real_escape_string($con,$_POST['donerName']);
$donoremail=mysqli_real_escape_string($con,$_POST['donerEmail']);
$donorstate=mysqli_real_escape_string($con,$_POST['donerState']);
$donorcity=mysqli_real_escape_string($con,$_POST['donerCity']);
$roll="doner";
$password=mysqli_real_escape_string($con,$_POST['donerPassword']);
$repassword=mysqli_real_escape_string($con,$_POST['donerConformPassword']);
$validation_msg= "";
if(!empty($donorname) && !empty($donoremail) && !empty($donorstate) && !empty($donorcity) && !empty($password) && !empty($repassword)){

     
    if(!preg_match('/[^A-Za-z\s]/',$donorname)){

        if(filter_var($donoremail, FILTER_VALIDATE_EMAIL)){

         
           if($password == $repassword){
   
            $sql = mysqli_query($con, "SELECT * FROM doner WHERE doner_email='{$donoremail}' ");
            if (!mysqli_num_rows($sql) > 0) {
                $otp = rand(111111, 999999);             //generate OTP with 6 digit
                $hash_psw = password_hash($password, PASSWORD_BCRYPT);   //password hashing
                // $donorroll="donor";
                $insert_sql_query = "INSERT INTO doner (doner_email,doner_user_name,doner_psw,doner_roll,doner_state,doner_city,otp) VALUES('{$donoremail}','{$donorname}','{$hash_psw}','{$roll}','{$donorstate}','{$donorcity}','{$otp}')";

                if(mysqli_query($con, $insert_sql_query)){
                    $_SESSION['doner_email']=$donoremail;
                    $_SESSION['doner_name']=$donorname;
                    $_SESSION['otpsatus']=false;
                    include_once '../../PHP_MAILER/email_Services.php';
            
                    // send_Email_OTP($useremail,"Hii",$otp); 
                    if(send_Email_OTP($donoremail,"OTP Verification",'Hi Your OTP is '.$otp)){

                        $_SESSION['otpsatus']=true;   
                        $validation_msg = array("icon"=>"success", "text"=>"Successfully OTP Send '{$donoremail}'", "title"=>"Done!","buttons"=>["cancel", "OTP Verified"], "dangerMode"=> true);
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
                echo json_encode($validation_msg); 
            }   
           }else{
            $validation_msg = array("icon"=>"error", "text"=>"Password Mismatch", "title"=>"Sorry!");
            echo json_encode($validation_msg); 
           }


        }else{
            $validation_msg = array("icon"=>"error", "text"=>"Please Select Correct EMAIL-ID", "title"=>"Sorry!");
            echo json_encode($validation_msg); 
        }

        
    }else{
        $validation_msg = array("icon"=>"error", "text"=>"Please Select A-Z/a-z Charactor In USERNAME", "title"=>"Sorry!");
        echo json_encode($validation_msg); //convert array to json format
        
    }

}else{
    $validation_msg = array("icon"=>"error", "text"=>"Please Fill All Required Field", "title"=>"Sorry!");
    echo json_encode($validation_msg); 
}

?>


























