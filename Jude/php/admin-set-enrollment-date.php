<?php
session_start();
require("db-connection.php");
    if(isset($_POST['setenrollmentdate'])){
        $opendate = $_POST['opendate'];
        $closedate = $_POST['closedate'];

        $sql_enrollment_date = "UPDATE enrollment_date SET Open_date='$opendate',Close_date='$closedate'";
        if (mysqli_query($db_enrollment, $sql_enrollment_date)) {
            $_SESSION['enrollment_success'] = "You have Sucessfully set the enrollment period starting ".$opendate." until ".$closedate;
            header('location: ../admin-enroll-date.php');
        } 
        else {
            header('location: ../admin-enroll-date.php');
        }
    }

?>