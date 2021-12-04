<?php
    require("db-connection.php");

    if(isset($_POST['news'])){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $author = $_POST['author'];
        $date = $_POST['date'];
        $paragraph = $_POST['paragraph'];
        $paragraph = nl2br($paragraph);
        $safe_input = mysqli_real_escape_string($db_content,$paragraph);

        $filenamedir = "../asset/news/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO news (News_title, News_subtitle, News_Paragraph, News_date, News_author, News_dir, News_filename) 
            VALUES('$title', '$subtitle', '$safe_input', '$date', '$author', '$filenamedir', '$filename')";
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
        $querynews = "SELECT * FROM news WHERE News_ID=$id"; 
        $resultnews = mysqli_query($db_content, $querynews);
        $rownews =  mysqli_fetch_array($resultnews);

        $filedir = $rownews['News_dir'];

        $sqldelete = "DELETE FROM news WHERE News_ID=$id";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }
?>