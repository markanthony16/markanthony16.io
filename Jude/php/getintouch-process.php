<?php
//Import PHPMailer classes into the global namespace
require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';
session_start();
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
require('smtp_account.php');
require("db-connection.php");
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $message = nl2br($message);

        try {
            //Server settings
            //$mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $stmp_server;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $stmp_email;                     //SMTP username
            $mail->Password   = $stmp_password;                               //SMTP password
            $mail->SMTPSecure = $smtp_secure;           //Enable implicit TLS encryption
            $mail->Port       = $stmp_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($stmp_email);
            $mail->addAddress("saint.jude.colleges@gmail.com");     //Add a recipient
        
            //Content
            $mail->addAttachment('/var/tmp/file.tar.gz'); 
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $body = "Name: ".$firstname." ".$lastname."<br> Email: ".$email."<br> Subject: ".$subject."<br> Messages: <br>".$message;
            $mail->Body = $body;
        
            $mail->send();
            $_SESSION['msg'] = "Thank you for reaching us, Please always check your email to see our response to your concern.";
            header("location: ../getintouch.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>