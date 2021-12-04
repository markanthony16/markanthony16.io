<?php
    require("db-connection.php");

    if(isset($_POST['slideshow'])){
        $title = $_POST['title'];
        $paragraph = $_POST['paragraph'];

        $filenamedir = "../asset/slideshow/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO slide_show (Slide_show_title, Slide_show_paragraph, Slide_show_dir, Slide_show_filename) 
            VALUES('$title', '$paragraph', '$filenamedir', '$filename')";
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
        $queryslide = "SELECT * FROM slide_show WHERE Slide_show_ID=$id"; //You don't need a ; like you do in SQL
        $resultslide = mysqli_query($db_content, $queryslide);
        $rowslide =  mysqli_fetch_array($resultslide);

        $filedir = $rowslide['Slide_show_dir'];

        $sqldelete = "DELETE FROM slide_show WHERE Slide_show_ID=$id";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }

?>