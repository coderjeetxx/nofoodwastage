<?php
include_once('db_conn.php');
session_start();
// $username = mysqli_real_escape_string($con, $_POST['userName']);
// $useremail = mysqli_real_escape_string($con, $_POST['userEmail']);
$userContact = mysqli_real_escape_string($con, $_POST['userContact']);
$userAddress1 = mysqli_real_escape_string($con, $_POST['userAddress1']);
$userAddress2 = mysqli_real_escape_string($con, $_POST['userAddress2']);
$noOfPeople = mysqli_real_escape_string($con, $_POST['noOfPeople']);
$userState = mysqli_real_escape_string($con, $_POST['userState']);
$userCity = mysqli_real_escape_string($con, $_POST['userCity']);
$userPin = mysqli_real_escape_string($con, $_POST['userZip']);

// $username="sjsjsj";
// $useremail="chiku@gmail.com";
// $userContact=9583904645;
// $userAddress1="chiku";
// $userAddress2="";
// $noOfPeople="shhshs";
// $userState="sjjsj";
// $userCity="mddjjd";
// $userPin="752060";

if(isset($_SESSION['login_status']) && $_SESSION['login_status']){
    function validateEmptyArray($var) {
        if (empty($var)) {
            return 1;
        }
    }

        $validationField = array_filter($_POST, "validateEmptyArray");
      
        $validationField = array_keys($validationField);

        if (count($validationField) > 0) {
            $validation_msg = array("icon"=> "warning", "text"=> "", "title"=> "Please Fill Following Field", "data"=> implode(" ", $validationField));
            echo json_encode($validation_msg);
        } else {

            // if (filter_var($useremail, FILTER_VALIDATE_EMAIL)) {

                $username = $_SESSION['login_user_name'];
                $useremail = $_SESSION['login_user_email'];
                $time = time();
                $orderdatetime = date("Y-m-d h:i:sa");
                $orderID = "ODFOOD".rand(11, 99).$time;
                $sql = mysqli_query($con, "SELECT * FROM user_order WHERE orderID='{$orderID}' ");
                if (mysqli_num_rows($sql) <= 0) {

                    $insert_sql_query = "INSERT INTO user_order (orderID,useremail,username,userContact,userAddress1,userAddress2,userState,userCity,userPin,noOfPeople,orderdatetime) VALUES ('{$orderID}','{$useremail}','{$username}','{$userContact}','{$userAddress1}','{$userAddress2}','{$userState}','{$userCity}','{$userPin}','{$noOfPeople}','{$orderdatetime}' )";

                    if (mysqli_query($con, $insert_sql_query)) {
                        $_SESSION['recentOrderID'] = $orderID;
                        $validation_msg = array("icon"=> "success", "text"=> "", "title"=> "Done!", "data"=> $orderID);
                        echo json_encode($validation_msg);

                    } else {
                        $validation_msg = array("icon"=> "error", "text"=> "Sorry", "title"=> "Please Try After SomeTime", "data"=> "");
                        echo json_encode($validation_msg);


                    }
                } else {
                    $validation_msg = array("icon"=> "error", "text"=> "Sorry", "title"=> "You Already Place Order", "data"=> "");
                    echo json_encode($validation_msg);
                }
            // } else {
            //     $validation_msg = array("icon"=> "error", "text"=> "Sorry", "title"=> "Please Enter Valid Email ID", "data"=> implode(" ", $validationField));
            //     echo json_encode($validation_msg);

            // }







        }

}else{

    $validation_msg = array("icon"=> "error", "text"=> "Sorry", "title"=> "Please Login First", "data"=> "");
    echo json_encode($validation_msg);


}





?>