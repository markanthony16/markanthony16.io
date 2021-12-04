<?php
session_start();

// connect to the database
require('db-connection.php');

// REGISTER TEACHER 
if (isset($_POST['reg_teacher'])) {

  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $suffix = $_POST['suffix'];
  $birthday = $_POST['birthday'];
  $sex = $_POST['sex'];
  $phonenumber = $_POST['phonenumber'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  
//   $gradelevel = $_POST['gradelevel'];
//   $birthday = $_POST['birthday'];
//   $placeofbirth = $_POST['placeofbirth'];
//   $age = $_POST['age'];
//   $religion = $_POST['religion'];
//   $nationality = $_POST['nationality'];
//   $gwa = $_POST['gwa'];

//   $guardianfirstname = $_POST['guardianfirstname'];
//   $guardianmiddlename = $_POST['guardianmiddlename'];
//   $guardianlastname = $_POST['guardianlastname'];
//   $relationshiptoguardian = $_POST['relationshiptoguardian'];
//   $guardianoccupation = $_POST['guardianoccupation'];
//   $guardianemail = $_POST['guardianemail'];
//   $guardiannumber = $_POST['guardiannumber'];


  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registered_teacher WHERE Email = '$email'";
  $result = mysqli_query($db_teacher, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($email == $user['Email']) {
    $_SESSION["msg_error"]="User Already Exist!";
    header('location: ../registration-teacher_1.php');
 
  }
  else{

    if($password == $repassword){

    //insert user data to registered_student
  	$query = "INSERT INTO registered_teacher (Teacher_firstname, Teacher_middlename, Teacher_lastname, Teacher_suffix, Birthday, Email, Passwords, Phone_number, Sex, current_status) 
    VALUES('$firstname', '$middlename', '$lastname', '$suffix', '$birthday', '$email', '$password','$phonenumber', '$sex', ' ')";
    mysqli_query($db_teacher, $query);
    session_destroy();
    header('location: ../login.php');
    }
    else{
        $_SESSION["msg_error"]="Password does not match!";
        header('location: ../registration-teacher_1.php');
    }
  }
}