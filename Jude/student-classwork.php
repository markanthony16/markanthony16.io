<?php
require("php/db-connection.php");
session_start();
$section = $_SESSION['sections'];
$queryclassmate = "SELECT * FROM enrolled_student WHERE Sections='$section' ORDER BY Lastname ASC";
$resultclassmate = mysqli_query($db_enrolled_student, $queryclassmate);

if(isset($_GET['id'])){
    $subjectsectionid = $_GET['id'];
    $_SESSION['subjectsectionid'] = $_GET['id'];
    $querysubjectsection = "SELECT * FROM subject_section WHERE Subject_section_id=$subjectsectionid"; 
    $resultsubjectsection = mysqli_query($db_section, $querysubjectsection);
    $rowsubjectsection =  mysqli_fetch_array($resultsubjectsection);
}

if(isset($_GET['id'])){
    $subjectsection_id = $_GET['id'];
    $queryclasswork = "SELECT * FROM classwork WHERE Subject_section_id='$subjectsection_id' ORDER BY Classwork_id DESC";
    $resultclasswork = mysqli_query($db_classroom, $queryclasswork);
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
    <title>Classwork St. Jude</title>
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
                    <a class="nav-link c-green aria-current="
                        href="student-material.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Material</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded " href="#">Classwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green"
                        href="student-portal-grade.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: yellow;" href="student-subject.php">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-red" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>



    <!--Start of Body-->
    <div class="container my-3">
        <div class="row ">
            <div class="col-xl-8 col-lg-8 mb-5 mt-3">
                <div class=" div_background_light div_outline rounded-3" style=" ">

                    <h4 class=" fw-bold text-center c-white px-3 py-2 rounded-3">
                    <?php echo $rowsubjectsection['Subjects'] ?></h4>
                    </h4>
                    <div class="row mx-3 ">
                        <?php while($rowclasswork = mysqli_fetch_array($resultclasswork)){ ?>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-12 my-1 ">
                            <!--Accordion 1-->
                            <div class="accordion accordion-primary mb-3" id="chapters">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-1">
                                        <button class="accordion-button text-dark" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#id<?php echo $rowclasswork['Classwork_id']; ?>"
                                            aria-expanded="true" aria-controls="chapter-1">
                                            <a href="student-classwork-activity.php?actid=<?php echo $rowclasswork['Classwork_id']; ?>"
                                                class="text-decoration-none"><span
                                                    class="c-primary fw-bold "><?php echo $rowclasswork['Title']." | Duedate: ".date('M j', strtotime($rowclasswork['Dates_close']))." - ".date('h:i a', strtotime($rowclasswork['Time_close'])); ?></span></a>
                                        </button>
                                    </h2>
                                    <div id="id<?php echo $rowclasswork['Classwork_id']; ?>"
                                        class="accordion-collapse collapse " aria-labelledby="heading-1"
                                        data-bs-paren="#chapters">
                                        <div class="accordion-body">
                                            <p><?php echo $rowclasswork['Instructions']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--end tag of container-->

            <!-- Classmate-->
            <div class="col-xl-4 col-lg-4  mb-5 mt-3">
                <h4 class=" fw-bold text-center div_outline c-white py-2 rounded-3 div_background_light">CLASSMATES
                </h4>
                <div class="mb-4 px-2 rounded py-2 div_background_light ">
                    <?php while($rowclassmate = mysqli_fetch_array($resultclassmate)){ ?>
                    <p class="text-left ps-3 fw-bold c-white">
                        <?php echo ucwords($rowclassmate['Lastname'].", ".$rowclassmate['Firstname'].", ".$rowclassmate['Middlename']); ?>
                    </p>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>