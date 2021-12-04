
<?php
session_start();
   require('db-connection.php');
   
   if(isset($_POST['student_login'])) {
 
      // username and password sent from form 
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM registered_student WHERE Email_address = '$email' and Passwords = '$password'";
      $result = mysqli_query($db_student,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $studentid = $row['Student_Number'];

      $sqlsection = "SELECT * FROM enrolled_student WHERE Student_id = '$studentid'";
      $resultsection = mysqli_query($db_enrolled_student, $sqlsection);
      $rowsection = mysqli_fetch_array($resultsection,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      $countsection = mysqli_num_rows($resultsection);
      if($countsection == 1){
         $_SESSION['sections'] = $rowsection['Sections'];
      }
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
            $_SESSION['name'] = $row['First_name']." ".$row['Last_name'];
            $_SESSION['student_id'] = $row['Student_Number'];
            $_SESSION['email'] = $row['Email_address'];
            $_SESSION['password'] = $row['Passwords'];
            header("location: ../student-subject.php");  
      }else {
        $_SESSION['error'] = "Invalid Email and Password!";
        header("location: ../login.php");
      }
   }
?>