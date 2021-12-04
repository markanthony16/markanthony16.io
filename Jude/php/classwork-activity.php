<?php
session_start();
require('db-connection.php');
    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($db_classroom,$_POST['title']);
        $instruction = nl2br($_POST['instruction']);
        $instruction = mysqli_real_escape_string($db_classroom,$instruction);
        $dates = $_POST['dates'];
        $times = $_POST['times'];
        $subjectsectionid = $_SESSION['subjectsectionid'];
        $teacherid = $_SESSION['Teacher_id'];
        $teachername = $_SESSION['Teacher_name'];
        $classworktype = "Ducuments";
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES['file']['size'];
        $file_tmp = $_FILES["file"]["tmp_name"];
        for($i=0; $i<count($filename); $i++){
            if ($filesize[$i] == 0)
            {

            }
            else if (file_exists("../asset/classwork_assign_files/".$filename[$i])) {
                echo "<script> alert('The file $filename[$i] is exist, please rename the file and try uploading again!'); window.location.href='../teacher-classroom-classwork.php?id=$subjectsectionid'; </script>";
                exit();
            }
        }

        $sqlclasswork = "INSERT INTO classwork (Title, Instructions, Dates_close, Subject_section_id, Teacher_id, Teacher_name, Classwork_type, Time_close)
        VALUES('$title', '$instruction', '$dates', '$subjectsectionid', '$teacherid', '$teachername', '$classworktype', '$times')";
        mysqli_query($db_classroom,$sqlclasswork);
        $last_id = mysqli_insert_id($db_classroom);
        

        for($i=0; $i<count($filename); $i++){
            $filedir =  "asset/classwork_assign_files/".$filename[$i];
            if(move_uploaded_file($file_tmp[$i], "../".$filedir)){
                $sql = "INSERT INTO classwork_file (Filenames, Filedir, Classwork_id) 
                VALUES('$filename[$i]', '$filedir', '$last_id')";
                mysqli_query($db_classroom,$sql);
                header("location: ../teacher-classroom-classwork.php?id=".$subjectsectionid);
            }else
            {
                header("location: ../teacher-classroom-classwork.php?id=".$subjectsectionid);
            }
            
        }
    }
?>