<?php

require('db-connection.php');
session_start();
    if(isset($_POST['applychanges'])){
        $studentnumber = $_POST['studentnumber'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sex = $_POST['sex'];
        $birthday = $_POST['birthday'];
        $placeofbirth = $_POST['placeofbirth'];
        $age = $_POST['age'];
        $religion = $_POST['religion'];
        $nationality = $_POST['nationality'];

        $guardianfirstname = $_POST['guardianfirstname'];
        $guardianmiddlename = $_POST['guardianmiddlename'];
        $guardianlastname = $_POST['guardianlastname'];
        $relationshiptoguardian = $_POST['relationshiptoguardian'];
        $guardianemail = $_POST['guardianemail'];
        $guardiannumber = $_POST['guardiannumber'];

        $query = "UPDATE registered_student SET First_name = '$firstname', Middle_name = '$middlename', Last_name = '$lastname', Permanent_address = '$address', Contact_number = '$phonenumber', Email_address = '$email', Passwords = '$password', Sex = '$sex', Birthday = '$birthday', Place_of_birth = '$placeofbirth', Age = '$age', Religion = '$religion', Nationality = '$nationality', Guardian_first_name = '$guardianfirstname', Guardian_middle_name = '$guardianmiddlename', Guardian_last_name = '$guardianlastname', Relationship_to_guardian = '$relationshiptoguardian', Guardian_email_address = '$guardianemail', Guardian_contact_number = '$guardiannumber' WHERE Student_Number = '$studentnumber'";
        
        if(mysqli_query($db_student, $query)){

        
        $_SESSION['applychanges'] = "Your data has been edited successfully";
        header('location: ../admin-all-student-edit.php?id='.$studentnumber);
    }
        
    }

?>