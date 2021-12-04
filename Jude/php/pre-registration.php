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
  require('db-connection.php');
  if(isset($_POST['accept'])){
    $studentid = $_POST['studentid'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];

    $sqlupdate = "UPDATE for_registration SET is_verify='Verified' WHERE Student_Number=$studentid";
    mysqli_query($db_student, $sqlupdate);

    $actual_link = $serverhosted."/php/verify_user_registration2.php?student_number=$studentid&firstname=$firstname&middlename=$middlename&lastname=$lastname&suffix=$suffix&email=$email&verify_user_registration=";
        
        $fullname = $lastname.", ".$firstname." ".$middlename;
            $fullname = ucwords($fullname);
            $querytopayment = "INSERT INTO tuition_payment (Student_ID, Student_name, Balance, Down_payment, Total_tuition, Promo, States) 
  			  VALUES('$studentid', '$fullname', '0', '0', '9000', 'Unset', 'Unpaid')";
  	        mysqli_query($db_payment, $querytopayment);
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
            $body = 'Hello '.$firstname.' <br> Thankyou For Choosing Saint Jude College of Bulacan <br> <br> Your Enrollment are approved by our admin, to continue on step 2 registration Please click the link below. <br>'.$actual_link.' <br> <br> Best regards Saint Jude College of Bulacan. <br> Thank you.';
            $mail->Body    = $body;
        
            $mail->send();

            
  	        
            $_SESSION['msg'] = "Successfully Approve the registration of ".$firstname." ".$lastname;
            header("location: ../admin-pre-registration.php");
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
  }

  if(isset($_POST['reject'])){
    $studentid = $_POST['studentid'];
    $queryselect = "SELECT * FROM for_registration WHERE Student_Number = $studentid";
      $result = mysqli_query($db_student, $queryselect);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $reportcard_dir = $row['Report_card_dir'];
    $psa_dir = $row['Psa_dir'];
    $idpic_dir = $row['Id_picture_dir'];
    $goodmoral_dir = $row['Good_moral_dir'];
    unlink($reportcard_dir);
    unlink($psa_dir);
    unlink($idpic_dir);
    unlink($goodmoral_dir);

    $sqldelete = "DELETE FROM for_registration WHERE Student_Number=$studentid";
    mysqli_query($db_student, $sqldelete);
    header("location: ../admin-pre-registration.php");
  }

?>