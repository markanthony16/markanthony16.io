<?php

session_start();
require('php/db-connection.php');

$subjectsectionid = $_SESSION['subjectsectionid'];
$queryclasswork = "SELECT * FROM classwork WHERE Subject_section_id='$subjectsectionid' ORDER BY Dates_close DESC";
$resultclasswork = mysqli_query($db_classroom, $queryclasswork);

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
                    <a class="nav-link active c-white bg_nav_menu rounded" aria-current="page" href="#">Classroom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green"
                        href="teacher-portal.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="col-md-12 div_background_light rounded div_outline">
                    <!--Title-->
                    <div class="py-2">
                        <h4 class="c-white" style="text-align: center;">Classroom</h4>
                    </div>
                    <!--Link-->
                    <nav class="nav flex-column">
                        <a class="nav-link c-white"
                            href="teacher-classroom-stream.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Steam</a>
                        <a class="nav-link c-white"
                            href="teacher-classroom-classwork.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Classwork</a>
                        <a class="nav-link c-white"
                            href="teacher-classroom-student.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Student</a>
                        <a class="nav-link c-white bg_nav_menu" href="#">Mark</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-md-12">
                    <div class="bg-white rounded div_outline" style="height:400px">
                        <h4 class="div_background_light fw-bold px-3 py-2 rounded-top c-white"
                            style="text-align:center;">Marks</h4>
                        <div class="accordion mt-2" id="accordionPanelsStayOpenExample">
                            <?php while($rowclasswork = mysqli_fetch_array($resultclasswork)){ ?>
                            <div class="accordion-item mx-3 ">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#id<?php echo $rowclasswork['Classwork_id']; ?>"
                                        aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne"><?php echo ucwords($rowclasswork['Title'])." - Closed on: ".date('M j', strtotime($rowclasswork['Dates_close']))." : ".date('h:i a', strtotime($rowclasswork['Time_close'])); ?>
                                    </button>
                                </h2>
                                <div id="id<?php echo $rowclasswork['Classwork_id']; ?>"
                                    class="accordion-collapse collapse "
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body table-responsive">
                                        <table class="table table-striped table-hover" style="width:90%;">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap">Student ID</th>
                                                    <th class="text-nowrap">Name</th>
                                                    <th class="text-nowrap">Section</th>
                                                    <th class="text-nowrap">Messages</th>
                                                    <th class="text-nowrap">Attachment</th>
                                                    <th class="text-nowrap">Scores</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                            $activity_id = $rowclasswork['Classwork_id'];
                                            $queryclassworksubmission = "SELECT * FROM classwork_submission WHERE Classwork_id='$activity_id' ORDER BY Student_name ASC";
                                            $resultclassworksubmission = mysqli_query($db_classroom, $queryclassworksubmission);
                                            
                                            ?>
                                                <?php while($classworksubmission = mysqli_fetch_array($resultclassworksubmission)){ ?>
                                                <tr>
                                                    <form action="php/teacher-marks-process.php" method="post"
                                                        enctype="multipart/form-data">

                                                        <input type="text" hidden name="Classworksubmissionid"
                                                            value="<?php echo $classworksubmission['Classwork_submission_id']; ?>">
                                                        <td class="text-nowrap">
                                                            <?php echo $classworksubmission['Student_id']; ?>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <?php echo ucwords($classworksubmission['Student_name']); ?>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <?php echo $classworksubmission['Section_name']; ?>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <?php echo $classworksubmission['Messages']; ?>
                                                        </td>
                                                        <td class="text-nowrap"><a target="_blank"
                                                                href="<?php echo $classworksubmission['Filedir']; ?>">Download</a>
                                                        </td>
                                                        <td class="text-nowrap"><input type="text"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                                maxlength="3"
                                                                value="<?php echo $classworksubmission['Scores']; ?>"
                                                                name="scores" placeholder="Scores" style="width: 80px"></td>
                                                        <td class="text-nowrap"><button class="btn btn-success py-0"
                                                                name="submitscores">Submit</button></td>
                                                    </form>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>