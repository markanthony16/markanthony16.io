<?php
    require("db-connection.php");

    if(isset($_POST['vmphilo'])){
        $vision = $_POST['vision'];
        $mission = $_POST['mission'];
        $philosophy = $_POST['philosophy'];
        $philosophy = nl2br($philosophy);
        $safe_input_vision = mysqli_real_escape_string($db_content,$vision);
        $safe_input_mission = mysqli_real_escape_string($db_content,$mission);
        $safe_input_philosophy = mysqli_real_escape_string($db_content,$philosophy);

       
         $sql = "INSERT INTO vmphilo (Vision, Mission, Philosophy) 
        VALUES('$safe_input_vision', '$safe_input_mission', '$safe_input_philosophy')";
        mysqli_query($db_content,$sql);
        header("location: ../admin-content.php");
        
        
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryvmphilo = "SELECT * FROM vmphilo WHERE Vmphilo_ID=$id"; 
        $resultvmphilo = mysqli_query($db_content, $queryvmphilo);
        $rowexecu =  mysqli_fetch_array($resultvmphilo);

      

        $sqldelete = "DELETE FROM vmphilo WHERE Vmphilo_ID=$id";
        $resultdelete = mysqli_query($db_content, $sqldelete);
        
        header("location: ../admin-content.php");
    }

   
?>