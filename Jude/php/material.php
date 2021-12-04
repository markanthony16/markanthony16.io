<?php
require("db-connection.php");
session_start();
date_default_timezone_set('Asia/Manila');
    if(isset($_POST['submit'])){
        $messages = nl2br($_POST['messages']);
        $subject = mysqli_real_escape_string($db_classroom, $_POST['subject']);
        $messages = mysqli_real_escape_string($db_classroom, $messages);
        $authorid = $_SESSION['student_id'];
        $authorname = $_SESSION['name'];
        $subjectsectionid = $_SESSION['subjectsectionid'];
        $Dates = date("M j Y @ h:i a");
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES['file']['size'];
        $file_tmp = $_FILES["file"]["tmp_name"];
        for($i=0; $i<count($filename); $i++){
            if ($filesize[$i] == 0)
            {

            }
            else if (file_exists("../asset/announcement_file/".$filename[$i])) {
                echo "<script> alert('The file $filename[$i] is exist, please rename the file and try uploading again!'); window.location.href='../student-material.php?id=$subjectsectionid'; </script>";
                exit();
            }
        }

        $sql = "INSERT INTO material (Author_id, Author, Title, Messages, Subject_section_id, Dates) 
            VALUES('$authorid', '$authorname', '$subject', '$messages', '$subjectsectionid', '$Dates')";
            mysqli_query($db_classroom,$sql);
            $last_id = mysqli_insert_id($db_classroom);
            for($i=0; $i<count($filename); $i++){
                $filedir =  "asset/announcement_file/".$filename[$i];
                if(move_uploaded_file($file_tmp[$i], "../".$filedir)){
                    $sqls = "INSERT INTO annoucement_file (Filenames, Filedir, Announcement_id) 
                    VALUES('$filename[$i]', '$filedir', '$last_id')";
                    mysqli_query($db_classroom,$sqls);
                    
                }else
                {    
                    header("location: ../student-material.php?id=".$_SESSION['subjectsectionid']);
                }
            }
            header("location: ../student-material.php?id=".$_SESSION['subjectsectionid']);
    }

    if(isset($_POST['submitfromteacher'])){
        $messages = nl2br($_POST['messages']);
        $subject = mysqli_real_escape_string($db_classroom, $_POST['subject']);
        $messages = mysqli_real_escape_string($db_classroom, $messages);
        $authorid = $_SESSION['Teacher_id'];
        $authorname = $_SESSION['Teacher_name'];
        $subjectsectionid = $_SESSION['subjectsectionid'];
        $Dates = date("M j Y @ h:i a");
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES['file']['size'];
        $file_tmp = $_FILES["file"]["tmp_name"];
        for($i=0; $i<count($filename); $i++){
            if ($filesize[$i] == 0)
            {

            }
            else if (file_exists("../asset/announcement_file/".$filename[$i])) {
                echo "<script> alert('The file $filename[$i] is exist, please rename the file and try uploading again!'); window.location.href='../teacher-classroom-stream.php?id=$subjectsectionid'; </script>";
                exit();
            }
        }

        $sql = "INSERT INTO material (Author_id, Author, Title, Messages, Subject_section_id, Dates) 
            VALUES('$authorid', '$authorname', '$subject', '$messages', '$subjectsectionid', '$Dates')";
            mysqli_query($db_classroom,$sql);
            $last_id = mysqli_insert_id($db_classroom);
            for($i=0; $i<count($filename); $i++){
                $filedir =  "asset/announcement_file/".$filename[$i];
                if(move_uploaded_file($file_tmp[$i], "../".$filedir)){
                    $sqls = "INSERT INTO annoucement_file (Filenames, Filedir, Announcement_id) 
                    VALUES('$filename[$i]', '$filedir', '$last_id')";
                    mysqli_query($db_classroom,$sqls);
                    
                }else
                {    
                    header("location: ../teacher-classroom-stream.php?id=".$_SESSION['subjectsectionid']);
                }
            }
            header("location: ../teacher-classroom-stream.php?id=".$_SESSION['subjectsectionid']);
    }

    if(isset($_GET['id'])){
        $announcement_id = $_GET['id'];

        $sqldelete = "DELETE FROM comments_annoucement WHERE Material_id=$announcement_id";
        mysqli_query($db_classroom, $sqldelete);

        $sqlpost = "DELETE FROM material WHERE Annoucement_id=$announcement_id";
        mysqli_query($db_classroom, $sqlpost);
        

        $querydelete = "SELECT * FROM annoucement_file WHERE Announcement_id='$announcement_id'";
        $resultdelete = mysqli_query($db_classroom, $querydelete);

        while($rowdelete = mysqli_fetch_array($resultdelete)){
            $announcement_file_id = $rowdelete['Announcement_file_id'];
            unlink("../".$rowdelete['Filedir']);
            $sqldeletes = "DELETE FROM annoucement_file WHERE Announcement_file_id=$announcement_file_id";
            mysqli_query($db_classroom, $sqldeletes);
        }
        header("location: ../student-material.php?id=".$_SESSION['subjectsectionid']);
    }
    if(isset($_GET['idfromteacher'])){
        $announcement_id = $_GET['idfromteacher'];

        $sqldelete = "DELETE FROM comments_annoucement WHERE Material_id=$announcement_id";
        mysqli_query($db_classroom, $sqldelete);

        $sqlpost = "DELETE FROM material WHERE Annoucement_id=$announcement_id";
        mysqli_query($db_classroom, $sqlpost);
        
        $querydelete = "SELECT * FROM annoucement_file WHERE Announcement_id='$announcement_id'";
        $resultdelete = mysqli_query($db_classroom, $querydelete);

        while($rowdelete = mysqli_fetch_array($resultdelete)){
            $announcement_file_id = $rowdelete['Announcement_file_id'];
            unlink("../".$rowdelete['Filedir']);
            $sqldeletes = "DELETE FROM annoucement_file WHERE Announcement_file_id=$announcement_file_id";
            mysqli_query($db_classroom, $sqldeletes);
        }

        header("location: ../teacher-classroom-stream.php?id=".$_SESSION['subjectsectionid']);
    }

?>