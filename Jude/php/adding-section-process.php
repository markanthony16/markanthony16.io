<?php
session_start();
require('db-connection.php');
    if(isset($_POST['add'])){
        $sectionname = $_POST['section'];
        $gradelevel = $_POST['gradelevel'];

        $sqladdsection = "INSERT INTO all_section (Section_name, Grade_level)
        VALUES('$sectionname', '$gradelevel')";
        mysqli_query($db_section,$sqladdsection);
        $_SESSION['msg_success'] = "You have successfully added the section: ".$sectionname;
        header("location: ../admin-section.php");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sqldelete = "DELETE FROM all_section WHERE Section_id=$id";
        $resultdelete = mysqli_query($db_section, $sqldelete);
        header("location: ../admin-section.php");
    }

?>