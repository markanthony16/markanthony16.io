<?php
require("db-connection.php");
session_start();
    if(isset($_POST['changepass'])){
        if($_POST['password'] == $_POST['repassword']){
            $newpassword = $_POST['password'];
            $email = $_SESSION['emailchangepass'];
            $sql = "UPDATE registered_teacher SET Passwords='$newpassword' WHERE Email='$email'";
            if(mysqli_query($db_teacher, $sql)){
                header("location: ../login.php");
                session_destroy();
            }
        }
        else{
            $_SESSION['msg_error'] = "The password you enter are not match. please enter your password again";
            header("location: ../teacher-newpassword.php");
        }
    }
?>