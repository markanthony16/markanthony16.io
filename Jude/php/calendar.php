<?php
    require("db-connection.php");
    if(isset($_POST['calendar'])){
        $querycalendar = "SELECT * FROM calendar"; 
        $resultcalendar = mysqli_query($db_content, $querycalendar);
        $rowcalendar =  mysqli_fetch_array($resultcalendar);

        $filedir = $rowcalendar['Calendar_dir'];

        $sqldelete = "DELETE FROM calendar";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        unlink($filedir);

        $filenamedir = "../asset/calendar/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO calendar (Calendar_dir, Calendar_filename)
            VALUES('$filenamedir', '$filename')";
            mysqli_query($db_content,$sql);

            header("location: ../admin-content.php");
        }
        else
        {
            header("location: ../admin-content.php");
        }

    }

?>