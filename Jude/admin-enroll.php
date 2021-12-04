<?php

    require('php/db-connection.php');
    session_start();
    if(!isset($_SESSION['gradelevel'])){
        $gradelevel="Grade_7";
        unset($_SESSION['gradelevel']);
    }
    else{
        $gradelevel = $_SESSION['gradelevel'];
        unset($_SESSION['gradelevel']);
    }
    
    if(isset($_GET['id'])){
        $gradelevel = $_GET['id'];
        $query = "SELECT * FROM registered_student WHERE Grade_level='$gradelevel' and is_advised='Registered'"; //You don't need a ; like you do in SQL
        $result = mysqli_query($db_student, $query);
        
        $queryssection = "SELECT * FROM subject_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultsection = mysqli_query($db_section, $queryssection);

        $queryallsection = "SELECT * FROM all_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultallsection = mysqli_query($db_section, $queryallsection);
    }
    else{
        $query = "SELECT * FROM registered_student WHERE Grade_level='$gradelevel' and is_advised='Registered'"; //You don't need a ; like you do in SQL
        $result = mysqli_query($db_student, $query);

        $queryssection = "SELECT * FROM subject_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultsection = mysqli_query($db_section, $queryssection);

        $queryallsection = "SELECT * FROM all_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultallsection = mysqli_query($db_section, $queryallsection);
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/colour.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="">

    <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
        <h3 class=""><img src="asset/logo.png" alt="Saint Jude Logo"
                style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white"
                href="#" style="padding-left: 15px;">St. Jude College</a></h3>
        <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
            <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">
                <li class="nav-item">
                    <a class="nav-link active c-green" aria-current="page"
                        href="admin-pre-registration.php">Pre-Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-subject.php">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-section.php">Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-all-student.php">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Enroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-transaction.php">Transaction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-content.php">Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="sj-admin.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="div_background_dark rounded-3 mt-4">
            <ul class="nav nav-pills justify-content-center py-2 gap-2">
                <li class="nav-item dropdown">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Sectioning Student</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-enroll-date.php">Enrollment Date</a>
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="div_background_dark div_outline mx-auto mt-3 rounded-3">
                <ul class="nav nav-pills justify-content-center py-2 gap-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link c-green" href="admin-enroll.php?id=Grade_7">Grade 7</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link c-green" href="admin-enroll.php?id=Grade_8">Grade 8</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link c-green" href="admin-enroll.php?id=Grade_9">Grade 9</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link c-green" href="admin-enroll.php?id=Grade_10">Grade 10</a>
                    </li>
                </ul>
            </div>
        </div>

        <!--All Content of Student Here-->
        <div class="mt-4 div_background_light div_outline rounded" style="height:400px;">
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Student Information -</h4>
            <h5 class="c-white rounded-top" style="text-align:center;">
                <?php echo $gradelevel." list of Section and Student"; ?></h5>
            <div class="row mx-auto">
                <?php while($rowallsection = mysqli_fetch_array($resultallsection)){ ?>
                <?php
                    $sections = $rowallsection['Section_name'];
                    $sqlcounter = "SELECT * FROM enrolled_student WHERE Sections='$sections'";
                    $resultcounter = mysqli_query($db_enrolled_student, $sqlcounter);
                    $currentperson = mysqli_num_rows($resultcounter);
                ?>
                <p class="col-md-4 col-sm-6 text-center c-white bg_nav_menu rounded">
                    <?php echo $rowallsection['Section_name'].": ".$currentperson."/25"; ?></p>
                <?php } ?>
                <?php
                if(isset($_GET['id'])){
                    $gradelevel = $_GET['id'];
                    $queryallsection2 = "SELECT * FROM all_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
                    $resultallsection2 = mysqli_query($db_section, $queryallsection2);
                }
                else{
                    $queryallsection2 = "SELECT * FROM all_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
                    $resultallsection2 = mysqli_query($db_section, $queryallsection2);
                }
                
                ?>
            </div>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">

                <table class="table">
                    <thead class="table-dark">
                        <th>Student_ID</th>
                        <th>Name</th>
                        <th>Grade Level</th>
                        <th>Section</th>
                        <th>GWA</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                        <form action="php/admin-student-sectioning-process.php" method="post">
                            <tr>
                                <td class="c-white"><input name="studentid"
                                        style="background-color:transparent;border:0; color:white;" type="text" readonly
                                        value="<?php echo $row['Student_Number']; ?>"></td>
                                <td class="text-nowrap c-white">
                                    <?php echo $row['First_name']." ".$row["Middle_name"]." ".$row["Last_name"]; ?></td>
                                <td class="c-white"><?php echo $row['Grade_level']; ?>

                                </td>
                                <td class="c-white">
                                    <select name="section" required>
                                        <option value="">Choose Section</option>
                                        <?php while($rowallsection2 = mysqli_fetch_array($resultallsection2)){ ?>
                                        <option value="<?php echo $rowallsection2['Section_id']; ?>">
                                            <?php echo $rowallsection2['Section_name']; ?></option>
                                        <?php } ?>

                                    </select>
                                </td>
                                <td class="c-white"><?php echo $row['Gwa']; ?></td>
                                <td class="c-white text-nowrap text-center"><button name="apply" type="submit"
                                        class="btn btn-outline-success">Apply</button></td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>