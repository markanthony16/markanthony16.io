<?php
require 'db-connection.php';
session_start();

      if(isset($_POST['submit']))
      {    
            $messages = mysqli_real_escape_string($db_classroom, $_POST['messages']);
            $is_submit = "Submitted";
            $student_id = $_SESSION['student_id'];
            $student_name = $_SESSION['name'];
            $subject_section_id = $_SESSION['subjectsectionid'];
            $section_name = $_SESSION['sections'];
            $classwork_id = $_SESSION['activity_id'];
            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filedir = "asset/upload_class_assignment_file/".$filename;
            if (file_exists("../".$filedir) && $filesize != 0) {
                  echo "<script> alert('The file $filename is exist, please rename the file and try uploading again!'); window.location.href='../student-classwork-activity.php?actid=$classwork_id'; </script>";
            }
            else{
                  $sql="INSERT INTO classwork_submission(Filenames, Filedir, Messages, is_submit, Student_id, Student_name, Subject_section_id, Section_name, Classwork_id, Scores) 
                        VALUES('$filename', '$filedir', '$messages', '$is_submit', '$student_id', '$student_name', '$subject_section_id', '$section_name', '$classwork_id' , 'Uncheck')";
                        mysqli_query($db_classroom, $sql);
                        
                  if(move_uploaded_file($_FILES['file']['tmp_name'],"../".$filedir))
                  {
                        header('location: ../student-classwork-activity.php?actid='.$classwork_id);
                  }
                  else
                  {
                        header('location: ../student-classwork-activity.php?actid='.$classwork_id);
                  }
            }
      }

      if(isset($_GET['removeid'])){
            $Classwork_submission_id = $_GET['removeid'];
            $classwork_id = $_SESSION['activity_id'];
            unset($_SESSION['activity_id']);

            $queryremovesubmission = "SELECT * FROM classwork_submission WHERE Classwork_submission_id=$Classwork_submission_id"; 
            $resultremovesubmission = mysqli_query($db_classroom, $queryremovesubmission);
            $rowremovesubmission =  mysqli_fetch_array($resultremovesubmission);
            $fildir_submission = $rowremovesubmission['Filedir'];

            unlink("../".$fildir_submission);
            $sqldeletes = "DELETE FROM classwork_submission WHERE Classwork_submission_id=$Classwork_submission_id";
            mysqli_query($db_classroom, $sqldeletes);
            header('location: ../student-classwork-activity.php?actid='.$classwork_id);
      }
?>