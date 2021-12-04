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
        $studentname = $_POST['studentname'];
        $studentid = $_POST['studentid'];
        $gcashnumber = $_POST['gcashnumber'];
        $gcashname = $_POST['gcashname'];
        $rerferencenumber = $_POST['referencenumber'];
        $date = $_POST['datepayment'];
        $message = $_POST['message'];
        $file_tmp  = $_FILES['screenshot']['tmp_name'];
        $file_name = $_FILES['screenshot']['name'];

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
                $mail->AddAttachment($file_tmp, $file_name);
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Gcash Payment';
                $body = "Fullname: ".$studentname."<br> Student ID: ".$studentid."<br> Gcash Number: ".$gcashnumber."<br> Gcash Name: ".$gcashname."<br> Reference Number: ".$rerferencenumber."<br> Date of Payment: ".$date."<br> Messages: <br>".$message;
                $mail->Body = $body;
            
                $mail->send();
                $_SESSION['msg'] = "Thank you for reaching us, Please always check your email to see our response to your concern.";
                header("location: ../payment-form.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
    }
?>