<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
echo "Hi";
send_Email_OTP('cchiku1999@gmail.com','Hi','hi');

function send_Email_OTP($reciverEmail, $subject, $Context)
{
    
    require 'vendor/autoload.php';
    try {

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                       //Enable verbose debug output
    
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'solomondavid2usa@gmail.com';                     //SMTP username
        $mail->Password   = 'biswajit786786786';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       // $emai->SMTPSecure = 'tls';                                  //Send using SMTP
        $mail->Port       = 587;

        $mail->setFrom('solomondavid2usa@gmail.com', 'Test');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($reciverEmail);               //Name is optional
        // $mail->addReplyTo('info@waywala.com', 'Information');
        // $mail->addCC('info@waywala.com');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $Context;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            return true;
        }
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo} <br>";
      
    }
}

