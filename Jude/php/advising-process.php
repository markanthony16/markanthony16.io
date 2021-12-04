<?php
require('db-connection.php');
session_start();

    if(isset($_POST['advised'])){
        $studentid = $_SESSION['student_id'];

        $Payment_Detail_Sql = "SELECT * FROM tuition_payment WHERE Student_ID='$studentid'";
        $Result_Payment_Detail = mysqli_query($db_payment, $Payment_Detail_Sql);
        $Payment_Detail = mysqli_fetch_assoc($Result_Payment_Detail);

        if($Payment_Detail['Down_payment']==0){
            $_SESSION['advising_msg'] = "Please deposit a downpayment for tuition fee, Read the note above.";
            header('location: ../student-subject-advising.php');
        }
        else{
            $user = "UPDATE registered_student SET is_advised='Registered' WHERE Student_Number = $studentid";
            if (mysqli_query($db_student, $user)) {
                $_SESSION['advising_msg'] = "You have Sucessfully registered, Please wait for admin to assign your section";
                header('location: ../student-subject-advising.php');
            } 
            else {
                header('location: ../student-subject-advising.php');
            }
        }

        
    }

?>
