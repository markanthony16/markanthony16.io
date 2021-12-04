<?php   
    session_start();
    require('db-connection.php'); 

    if(isset($_POST['submitscores'])){
        $classwork_submission_id = $_POST['Classworksubmissionid'];
        $student_id = $_SESSION['student_id'];
        $scores = $_POST['scores'];

        $sqlscoreupdate = "UPDATE classwork_submission SET Scores = '$scores' WHERE Classwork_submission_id = ' $classwork_submission_id'";
        if(mysqli_query($db_classroom, $sqlscoreupdate)){
            header("location: ../teacher-classroom-mark.php?id=".$_SESSION['subjectsectionid']);
        }else{
            header("location: ../teacher-classroom-mark.php?id=".$_SESSION['subjectsectionid']);
        }
    }

?>