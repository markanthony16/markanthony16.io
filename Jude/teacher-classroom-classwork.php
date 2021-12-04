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
                        <a class="nav-link c-white bg_nav_menu" href="#">Classwork</a>
                        <a class="nav-link c-white"
                            href="teacher-classroom-student.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Student</a>
                        <a class="nav-link c-white"
                            href="teacher-classroom-mark.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Mark</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-md-12">
                    <div class="bg-white rounded div_outline pb-5 mb-5">
                        <h4 class="div_background_light fw-bold px-3 py-2 rounded-top c-white" style="text-align:center;">Classwork</h4>
                        <!--Make Quiz and Make Questions-->
                        <div class="row">
                            <div class="col-6 text-center pt-2">
                                <a href="teacher-classroom-classwork-googleform.php?id=<?php echo $subjectsectionid; ?>" class="btn btn-success"
                                    style="width:150px;">Google Form</a>
                            </div>
                            <div class="col-6 text-center pt-2">
                                <a href="teacher-classroom-classwork-activity.php?id=<?php echo $subjectsectionid; ?>" class="btn btn-success" style="width:150px;">Activity</a>
                            </div>
                        </div> <!-- End tag of Make Quiz and Make Questions-->


                        <!--ACtivity ,Tittle, Due-->
                        <?php while($rowclasswork = mysqli_fetch_array($resultclasswork)){ ?>
                        <form action="php/googleform-process.php?id=<?php echo $rowclasswork['Classwork_id']; ?>"
                            method="post">
                            <a href="#" class="bg_nav_menu rounded row text-decoration-none mx-3 mt-4 py-2 px-1">
                                <h6 class="col-5 text-center c-white my-auto overflow-hidden" style="text-overflow: ellipsis;"><?php echo $rowclasswork['Title']; ?></h6>
                                <h6 class="col-5 text-center c-white my-auto">Due:
                                    <?php echo date('M j', strtotime($rowclasswork['Dates_close']))."|".date('h:i a', strtotime($rowclasswork['Time_close'])); ?>
                                </h6>
                                <h6 class="col-2 text-center c-white my-auto"><button type="submit"
                                        class="btn-close"></button></h6>
                            </a>
                        </form>
                        <?php } ?>
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