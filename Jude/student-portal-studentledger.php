<?php

    session_start();

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
                    <a class="nav-link active c-green" aria-current="page" href="student-material.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Material</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-classwork.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Classwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Portal</a>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="col-md-12 div_background_light div_outline rounded">
                    <!--Title-->
                    <div class="">
                        <h3 class="c-white py-3" style="text-align: center;">Portal</h3>
                    </div>
                    <!--Link-->
                    <nav class="nav flex-column">
                        <a class="nav-link c-white" href="student-portal-grade.php">Grade</a>
                        <a class="nav-link c-white" href="student-portal-evaluation.php">Evaluation</a>
                        <a class="nav-link c-white" href="student-portal-advising.php">Advising</a>
                        <a class="nav-link c-white bg_nav_menu" href="#">Student Ledger</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-md-12 bg-green">
                    <div class="bg-white" style="height:400px">
                        <h3 class="bg-green c-yellow fw-bold py-3" style="text-align:center;">Student Ledger</h3>
                        <h4 style="text-align:center;">Some Database Content Here</h4>
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