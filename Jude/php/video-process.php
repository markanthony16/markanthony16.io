<?php
    require("db-connection.php");

    if(isset($_POST['video'])){
        $videotitle = $_POST['videotitle'];
        $videolink = $_POST['videolink'];
        $filenamedir = "../asset/video_thumbnail/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO video (Video_title, Video_link, Video_thumbdir, Video_thumbfilename) 
            VALUES('$videotitle', '$videolink', '$filenamedir', '$filename')";
            mysqli_query($db_content,$sql);
            header("location: ../admin-content.php");
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryvideo = "SELECT * FROM video WHERE Video_ID=$id"; 
        $resultvideo = mysqli_query($db_content, $queryvideo);
        $rowvideo =  mysqli_fetch_array($resultvideo);

        $filedir = $rowvideo['Video_thumbdir'];

        $sqldelete = "DELETE FROM video WHERE Video_ID=$id";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }

?>