<?php
    require("db-connection.php");

    if(isset($_POST['executives'])){
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $paragraph = $_POST['paragraph'];
        $safe_input = mysqli_real_escape_string($db_content,$paragraph);

        $filenamedir = "../asset/executives/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO executive (First_Name, Middle_Name, Last_Name, Executive_Paragraph, Executive_dir, Executive_filename) 
            VALUES('$fname', '$mname', '$lname', '$safe_input', '$filenamedir', '$filename')";
            mysqli_query($db_content,$sql);
            header("location: ../admin-content.php");
        }
        else
        {
            header("location: ../admin-content.php");
        }
        
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryexecutive = "SELECT * FROM executive WHERE Executive_ID=$id"; 
        $resultexecutive = mysqli_query($db_content, $queryexecutive);
        $rowexecutive =  mysqli_fetch_array($resultexecutive);

        $filedir = $rowexecutive['Executive_dir'];

        $sqldelete = "DELETE FROM executive WHERE Executive_ID=$id";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }

   
?>