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

   require('db-connection.php');
   require('smtp_account.php');
   
   if(isset($_POST['submit_email'])) {
 
      // username and password sent from form 
    
      $email = $_POST['emailaddress'];
      
      $sql = "SELECT * FROM registered_teacher WHERE Email = '$email'";
      $result = mysqli_query($db_teacher,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
   	
      if($count == 1) {
        try {
          $actual_link = $serverhosted."/php/teacher-forgot-process2.php?email=$email&passwordchange=";
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
          $mail->addAddress($email);     //Add a recipient
      
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = $subject;
          $body = 'Hello Sir/Maam <br> Thankyou For Choosing Saint Jude College of Bulacan <br> <br> To reset your password please click the link below and enter your new password. <br>'.$actual_link.' <br> <br> Best regards Saint Jude College of Bulacan. <br> Thank you.';
          $mail->Body = $body;
      
          $mail->send();

          $_SESSION['msg_success'] = "Please check your email to continuesly reset your password.";
          header("location: ../teacher-forgot.php"); 
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }  
    }else {
        $_SESSION['msg_error'] = "Please enter your valid email address.";
        header("location: ../teacher-forgot.php");
      }
    }
   
?>