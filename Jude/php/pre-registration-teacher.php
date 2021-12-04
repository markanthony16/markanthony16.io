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
  if(isset($_POST['accept'])){
    $teacherid = $_POST['teacherid'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];

    $sqlupdate = "UPDATE registered_teacher SET current_status='Verified' WHERE Teacher_id=$teacherid";
    mysqli_query($db_teacher, $sqlupdate);
        
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
            $mail->addAddress($email);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Saint Jude Registration Approval';
            $body = 'Hello '.$firstname.' <br> Thankyou For Choosing Saint Jude College of Bulacan <br> <br> Your Registration are approved by our admin, You can now login to saint jude website. <br><br>Your Infirmation <br> Email:'.$email.'<br> Teacher ID:'.$teacherid.' <br> <br> Best regards Saint Jude College of Bulacan. <br> Thank you.';
            $mail->Body    = $body;
        
            $mail->send();

            $_SESSION['msg'] = "Successfully Approve the registration of ".$firstname." ".$lastname;
            header("location: ../admin-pre-registration-teacher.php");
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
  }

  if(isset($_POST['reject'])){
    $teacherid = $_POST['teacherid'];

    $sqldelete = "DELETE FROM registered_teacher WHERE Teacher_id=$teacherid";
    mysqli_query($db_teacher, $sqldelete);
    header("location: ../admin-pre-registration-teacher.php");
  }

?>