<?php

    session_start();
    if(!isset($_SESSION["errormsg"])){
        $_SESSION["errormsg"] = "";
    }

   require('db-connection.php');
   
   if(isset($_GET['verify_user_registration'])) {
 
      // username and password sent from form 
      $student_number = $_GET['student_number'];
      $firstname = $_GET['firstname'];
      $middlename = $_GET['middlename'];
      $lastname = $_GET['lastname'];
      $suffix = $_GET['suffix'];
      $email = $_GET['email'];
      
      $sql = "SELECT * FROM for_registration WHERE Student_number = '$student_number' and First_name = '$firstname' and Middle_name = '$middlename' and Last_name = '$lastname' and Suffix = '$suffix'";
      $result = mysqli_query($db_student,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        $_SESSION['For_Register_Student_ID'] = $student_number;
        $_SESSION['For_Register_Firstname'] = $firstname;
        $_SESSION['For_Register_Middlename'] = $middlename;
        $_SESSION['For_Register_Lastname'] = $lastname;
        $_SESSION['For_Register_Suffix'] = $suffix;
        $_SESSION['For_Register_Email'] = $email;
        header("location: ../registration-student_2.php");

      }
   }
?>