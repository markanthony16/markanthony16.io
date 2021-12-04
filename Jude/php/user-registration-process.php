<?php
session_start();

// connect to the database
require('db-connection.php');

// PRE REGISTER USER
if (isset($_POST['reg_user'])) {

  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $studentnumber = $_POST['studentnumber'];
  $suffix = $_POST['suffix'];
  $address = $_POST['address'];
  $phonenumber = $_POST['phonenumber'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $sex = $_POST['sex'];
  $gradelevel = $_POST['gradelevel'];
  $birthday = $_POST['birthday'];
  $placeofbirth = $_POST['placeofbirth'];
  $age = $_POST['age'];
  $religion = $_POST['religion'];
  $nationality = $_POST['nationality'];
  $gwa = $_POST['gwa'];

  $guardianfirstname = $_POST['guardianfirstname'];
  $guardianmiddlename = $_POST['guardianmiddlename'];
  $guardianlastname = $_POST['guardianlastname'];
  $relationshiptoguardian = $_POST['relationshiptoguardian'];
  $guardianoccupation = $_POST['guardianoccupation'];
  $guardianemail = $_POST['guardianemail'];
  $guardiannumber = $_POST['guardiannumber'];


  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registered_student WHERE Email_address='$email'";
  $result = mysqli_query($db_student, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($email==$user['Email_address']) {
    $_SESSION["error"]="User Already Exist!";
    header('location: ../registration-student_2.php');
  }
  else{

    if($password == $repassword){

    //insert user data to registered_student
  	$query = "INSERT INTO registered_student (Student_Number, First_name, Middle_name, Last_name, Suffix, Permanent_address, Grade_level, Birthday, Place_of_birth, Email_address, Passwords, Contact_number, Sex, Age, Religion, Nationality, Guardian_first_name, Guardian_middle_name, Guardian_last_name, Relationship_to_guardian, Guardian_occupation, Guardian_email_address, Guardian_contact_number, Gwa) 
    VALUES('$studentnumber', '$firstname', '$middlename', '$lastname', '$suffix', '$address', '$gradelevel', '$birthday', '$placeofbirth', '$email', '$password', '$phonenumber', '$sex', '$age', '$religion', '$nationality', '$guardianfirstname', '$guardianmiddlename', '$guardianlastname', '$relationshiptoguardian', '$guardianoccupation', '$guardianemail', '$guardiannumber', '$gwa')";
    mysqli_query($db_student, $query);
    session_destroy();
    header('location: ../login.php');
    }
    else{
        $_SESSION["error"]="Password does not match!";
        echo"error upload";
        header('location: ../registration-student_2.php');
    }
  }
}