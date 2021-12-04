<?php
require('db-connection.php');
session_start();

    if(isset($_POST['applychanges'])){
        if(isset($_POST['email'])){
            $currentpassword = $_POST['currentpassword'];
            $newpassword = $_POST['newpassword'];
            $repassword = $_POST['renewpassword'];
            $email = $_POST['email'];
            $reemail = $_POST['reemail'];
            
        }
        else{
            $currentpassword = $_SESSION['password'];
            $newpassword = $_SESSION['password'];
            $repassword = $_SESSION['password'];
            $email = $_SESSION['email'];
            $reemail = $_SESSION['email'];
        }

        $studentnumber = $_POST['studentnumber'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
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

        if($email == $reemail){
            if($currentpassword==$_SESSION['password']){
                if($newpassword==$repassword){
                    $query = "UPDATE registered_student SET First_name = '$firstname', Middle_name = '$middlename', Last_name = '$lastname', Permanent_address = '$address', Contact_number = '$phonenumber', Email_address = '$email', Passwords = '$newpassword', Sex = '$sex', Birthday = '$birthday', Place_of_birth = '$placeofbirth', Age = '$age', Religion = '$religion', Nationality = '$nationality', Guardian_first_name = '$guardianfirstname', Guardian_middle_name = '$guardianmiddlename', Guardian_last_name = '$guardianlastname', Relationship_to_guardian = '$relationshiptoguardian', Guardian_email_address = '$guardianemail', Guardian_contact_number = '$guardiannumber' WHERE Student_Number = '$studentnumber'";
                    if(mysqli_query($db_student, $query)){
                        $_SESSION['applychanges'] = "Your data has been edited successfully";
                        header('location: ../student-profile-edit.php?id='.$studentnumber);

                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $newpassword;
                    }
                    else{
                        $_SESSION['error']="Error in Updating you detail, Please try again!";
                        header('location: ../student-profile-edit.php?id='.$studentnumber);
                    }

                }
                else{
                    $_SESSION['error']="Your password does not match";
                    header('location: ../student-profile-edit.php?id='.$studentnumber);
                }
            }
            else{
                $_SESSION['error']="Invalid input of Current Password";
                header('location: ../student-profile-edit.php?id='.$studentnumber);
            }
        }
        else{
            $_SESSION['error']="Your email does not match";
            header('location: ../student-profile-edit.php?id='.$studentnumber);
        }

        
        
        
        
    }

?>