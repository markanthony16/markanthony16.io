
<?php
session_start();
   require('db-connection.php');
   
   if(isset($_POST['teacher_login'])) {
 
      // username and password sent from form 
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM registered_teacher WHERE Email = '$email' and Passwords = '$password' and current_status = 'Verified'";
      $result = mysqli_query($db_teacher,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
            $_SESSION['Teacher_name'] = $row['Teacher_firstname']." ".$row['Teacher_lastname'];
            $_SESSION['Teacher_id'] = $row['Teacher_id'];
            header("location: ../teacher-subject.php");  
      }else {
        $_SESSION['error'] = "Invalid Email and Password!";
        header("location: ../login.php");
      }
   }
?>