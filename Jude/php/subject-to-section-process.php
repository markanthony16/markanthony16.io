<?php
session_start();
require('db-connection.php');
    if(isset($_POST['assigned'])){
        $subjectid = $_POST['subject'];
        $sectionid = $_POST['section'];

        $subjectdata = "SELECT * FROM subjects WHERE Subject_id='$subjectid'";
        $querysubjectdata = mysqli_query($db_subject, $subjectdata);
        $rowsubjectdata = mysqli_fetch_array($querysubjectdata);

        $sectiondata = "SELECT * FROM all_section WHERE Section_id='$sectionid'";
        $querysectiondata = mysqli_query($db_section, $sectiondata);
        $rowsectiondata = mysqli_fetch_array($querysectiondata);

        $gradelevel = $rowsectiondata['Grade_level'];
        $sectionname = $rowsectiondata['Section_name'];
        $subjectname = $rowsubjectdata['Subject_title'];
        $teacherid = $rowsubjectdata['Subject_teacher_id'];
        $teachername = $rowsubjectdata['Subject_teacher'];

        $sqlsubjecttosection = "INSERT INTO subject_section (Grade_level, Section_id, Section, Subject_id, Subjects, Teacher_id, Teacher)
        VALUES('$gradelevel', '$sectionid', '$sectionname', '$subjectid', '$subjectname', '$teacherid', '$teachername')";
        mysqli_query($db_section,$sqlsubjecttosection);
        $_SESSION['msg_success'] = "You have successfully assign: ".$subjectname." to ".$sectionname;
        header("location: ../admin-subject-to-section.php");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sqldelete = "DELETE FROM subject_section WHERE Subject_section_id=$id";
        $resultdelete = mysqli_query($db_section, $sqldelete);
        header("location: ../admin-subject-to-section.php");
    }

?>