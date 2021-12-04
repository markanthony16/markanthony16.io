<?php
session_start();
require('db-connection.php');
    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($db_classroom,$_POST['title']);
        $instruction = nl2br($_POST['instruction']);
        $instruction = mysqli_real_escape_string($db_classroom,$instruction);
        $dates = $_POST['dates'];
        $url = mysqli_real_escape_string($db_classroom,$_POST['url']);
        $subjectsectionid = $_SESSION['subjectsectionid'];
        $teacherid = $_SESSION['Teacher_id'];
        $teachername = $_SESSION['Teacher_name'];
        $classworktype = "Google Form";
        $times = $_POST['times'];

        $sqlclasswork = "INSERT INTO classwork (Title, Instructions, Dates_close, URLS, Subject_section_id, Teacher_id, Teacher_name, Classwork_type, Time_close)
        VALUES('$title', '$instruction', '$dates', '$url', '$subjectsectionid', '$teacherid', '$teachername', '$classworktype', '$times')";
        mysqli_query($db_classroom,$sqlclasswork);
        header("location: ../teacher-classroom-classwork.php");
    }

    if(isset($_GET['id'])){
        $classwordid = $_GET['id'];
        $sqldelete = "DELETE FROM classwork WHERE Classwork_id=$classwordid";
        mysqli_query($db_classroom, $sqldelete);

        $querydelete = "SELECT * FROM classwork_file WHERE Classwork_id='$classwordid'";
        $resultdelete = mysqli_query($db_classroom, $querydelete);

        while($rowdelete = mysqli_fetch_array($resultdelete)){
            $classwork_file_id = $rowdelete['classwork_file_id'];
            unlink("../".$rowdelete['Filedir']);
            $sqldeletes = "DELETE FROM classwork_file WHERE classwork_file_id=$classwork_file_id";
            mysqli_query($db_classroom, $sqldeletes);
        }
        header("location: ../teacher-classroom-classwork.php");
    }
?>