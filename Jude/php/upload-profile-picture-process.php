<?php
require('db-connection.php');
session_start();
if(isset($_POST['submit'])){
    $studentnumber = $_SESSION['student_id'];
    $filenamedir = "../asset/profile_picture/".$_FILES["profilepicture"]["name"];
    $filename = $_FILES["profilepicture"]["name"];
        // move file to a folder
        if(move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $filenamedir))
        {
            $sql = "UPDATE registered_student SET Profile_picture_dir = '$filename' WHERE Student_Number = '$studentnumber'";
            mysqli_query($db_student,$sql);
            header("location: ../student-profile-edit.php");
        }
        else
        {
            header("location: ../student-profile-edit.php");
        }

}
?>