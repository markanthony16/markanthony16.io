<?php

require("db-connection.php");
session_start();
date_default_timezone_set('Asia/Manila');

    if(isset($_POST['send'])){
        $userid = $_SESSION['student_id'];
        $comments = nl2br($_POST['comments']);
        $comments = mysqli_real_escape_string($db_classroom, $comments);
        $names = $_SESSION['name'];
        $material_id = $_POST['announcementid'];
        $Dates = date("M j | h:i a");

        $sqlcomments = "INSERT INTO comments_annoucement (Names, Comments, Users_id, Material_id, Dates) 
            VALUES('$names', '$comments', '$userid', '$material_id', '$Dates')";
            mysqli_query($db_classroom,$sqlcomments);
            header("location: ../student-material.php?id=".$_SESSION['subjectsectionid']);
    }

    if(isset($_POST['sendfromteacher'])){
        $userid = $_SESSION['Teacher_id'];
        $comments = nl2br($_POST['comments']);
        $comments = mysqli_real_escape_string($db_classroom, $comments);
        $names = $_SESSION['Teacher_name'];
        $material_id = $_POST['announcementid'];
        $Dates = date("M j | h:i a");

        $sqlcomments = "INSERT INTO comments_annoucement (Names, Comments, Users_id, Material_id, Dates) 
            VALUES('$names', '$comments', '$userid', '$material_id', '$Dates')";
            mysqli_query($db_classroom,$sqlcomments);
            header("location: ../teacher-classroom-stream.php?id=".$_SESSION['subjectsectionid']);
    }

    if(isset($_GET['delid'])){
        $comment_id = $_GET['delid'];

        $sqldelete = "DELETE FROM comments_annoucement WHERE Comment_id=$comment_id";
        mysqli_query($db_classroom, $sqldelete);
        header("location: ../student-material.php?id=".$_SESSION['subjectsectionid']);
    }
    if(isset($_GET['delidfromteacher'])){
        $comment_id = $_GET['delidfromteacher'];

        $sqldelete = "DELETE FROM comments_annoucement WHERE Comment_id=$comment_id";
        mysqli_query($db_classroom, $sqldelete);
        header("location: ../teacher-classroom-stream.php?id=".$_SESSION['subjectsectionid']);
    }

?>