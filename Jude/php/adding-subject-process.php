<?php
session_start();
require('db-connection.php');

    if(isset($_POST['append'])){
        $title = $_POST['title'];
        $teacherid = $_POST['teacher'];
        $gradelevel = $_POST['gradelevel'];

        $teacherdata = "SELECT * FROM registered_teacher WHERE Teacher_id=$teacherid";
        $queryteacherdata = mysqli_query($db_teacher, $teacherdata);
        $rowteacherdata = mysqli_fetch_array($queryteacherdata);

        $teacherfullname = ucwords($rowteacherdata['Teacher_firstname'].' '.$rowteacherdata['Teacher_middlename'].' '.$rowteacherdata['Teacher_lastname']);

        $sqladdsubject = "INSERT INTO subjects (Subject_title, Subject_teacher, Subject_teacher_id, Subject_year_level)
        VALUES('$title', '$teacherfullname', '$teacherid', '$gradelevel')";
        mysqli_query($db_subject,$sqladdsubject);
        $_SESSION['msg_success'] = "You have successfully added the subject: ".$title;
        header("location: ../admin-subject.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sqldelete = "DELETE FROM subjects WHERE Subject_id=$id";
        $resultdelete = mysqli_query($db_subject, $sqldelete);
        header("location: ../admin-subject.php");
    }
?>