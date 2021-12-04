<?php
require('db-connection.php');
session_start();
    if(isset($_POST['apply'])){
        $studentid = $_POST['studentid'];
        $sectionid = $_POST['section'];

        $querystudent = "SELECT * FROM registered_student WHERE Student_Number='$studentid'";
        $resultstudent = mysqli_query($db_student, $querystudent);
        $rowstudent = mysqli_fetch_assoc($resultstudent);

        $querysection = "SELECT * FROM all_section WHERE Section_id='$sectionid'";
        $resultsection = mysqli_query($db_section, $querysection);
        $rowsection = mysqli_fetch_assoc($resultsection);

        $firstname = $rowstudent['First_name'];
        $middlename = $rowstudent['Middle_name'];
        $lastname = $rowstudent['Last_name'];
        $suffix = $rowstudent['Suffix'];
        $gradelevel = $rowsection['Grade_level'];
        $sections = $rowsection['Section_name'];
        $_SESSION['gradelevel'] = $gradelevel;
        
        $sqlenrolled = "INSERT INTO enrolled_student (Student_id, Firstname, Middlename, Lastname, Suffix, Grade_level, Section_id, Sections) 
            VALUES('$studentid', '$firstname', '$middlename', '$lastname', '$suffix', '$gradelevel', '$sectionid', '$sections')";
            mysqli_query($db_enrolled_student, $sqlenrolled);

            $user = "UPDATE registered_student SET is_advised='Enrolled' WHERE Student_Number = $studentid";
            if (mysqli_query($db_student, $user)) {
                header('location: ../admin-enroll.php');
            } 
    }

?>