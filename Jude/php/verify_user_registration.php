<?php
   require("db-connection.php");
   session_start();

    if(isset($_POST['verify_user_registration'])){
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $suffix = $_POST['suffix'];
      $birthday = $_POST['birthday'];
      $phonenumber = $_POST['phonenumber'];
      $email = $_POST['email'];

      //requirement
      $repord_card_filename = $_FILES["reportcard"]["name"];
      $psa_filename = $_FILES["psa"]["name"];
      $id_picture_filename = $_FILES["idpicture"]["name"];
      $good_moral_filename = $_FILES["goodmoral"]["name"];

      $repord_card_dir = "../asset/registration_requirement/".$_FILES["reportcard"]["name"];
      $psa_dir = "../asset/registration_requirement/".$_FILES["psa"]["name"];
      $id_picture_dir = "../asset/registration_requirement/".$_FILES["idpicture"]["name"];
      $good_moral_dir = "../asset/registration_requirement/".$_FILES["goodmoral"]["name"];

      if(move_uploaded_file($_FILES["reportcard"]["tmp_name"], $repord_card_dir)){
         if(move_uploaded_file($_FILES["psa"]["tmp_name"], $psa_dir)){
            if(move_uploaded_file($_FILES["idpicture"]["tmp_name"], $id_picture_dir)){
               if(move_uploaded_file($_FILES["goodmoral"]["tmp_name"], $good_moral_dir)){
                  $query = "INSERT INTO for_registration (First_name, Middle_name, Last_name, Suffix, Birthday, Phone_number, email, Report_card_dir, Psa_dir, Id_picture_dir, Good_moral_dir, Report_card_filename, Psa_filename, Id_picture_filename, Good_moral_filename) 
                  VALUES('$firstname', '$middlename', '$lastname', '$suffix', '$birthday', '$phonenumber', '$email', '$repord_card_dir', '$psa_dir', '$id_picture_dir', '$good_moral_dir', '$repord_card_filename', '$psa_filename', '$id_picture_filename', '$good_moral_filename')";
                  mysqli_query($db_student, $query);
                  $_SESSION['msg_success'] = "You've Sucessfully Submitted your registration, Wait for our staff to verify your registration, We will send an email to you if your registration are approve";
                  header("location: ../registration-student_1.php");
               }
               else{
                  $_SESSION['msg_error'] = "Failure to upload your Good Moral Certificate, Try opening it in image editor then save it as jpg and upload it again.";
                  header("location: ../registration-student_1.php");
               }
            }
            else{
               $_SESSION['msg_error'] = "Failure to upload your 2x2 ID Picture, Try opening it in image editor then save it as jpg and upload it again.";
               header("location: ../registration-student_1.php");
            }
         }
         else{
            $_SESSION['msg_error'] = "Failure to upload your PSA Birth Certificate, Try opening it in image editor then save it as jpg and upload it again.";
            header("location: ../registration-student_1.php");
         }
      }
      else{
         $_SESSION['msg_error'] = "Failure to upload your Repord Card, Try opening it in image editor then save it as jpg and upload it again.";
         header("location: ../registraion-student_1.php");
      }

      
    }
    
?>