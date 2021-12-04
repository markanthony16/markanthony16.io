<?php
require("db-connection.php");
session_start();
    if(isset($_POST['changepass'])){
        if($_POST['password'] == $_POST['repassword']){
            $newpassword = $_POST['password'];
            $email = $_SESSION['emailchangepass'];
            $sql = "UPDATE registered_student SET Passwords='$newpassword' WHERE Email_address='$email'";
            if(mysqli_query($db_student, $sql)){
                header("location: ../login.php");
                session_destroy();
            }
        }
        else{
            $_SESSION['msg_error'] = "The password you enter are not match. please enter your password again";
            header("location: ../newpassword.php");
        }
    }
?>