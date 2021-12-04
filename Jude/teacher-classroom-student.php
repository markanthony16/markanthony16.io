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
                    <a class="nav-link active c-white bg_nav_menu rounded" aria-current="page" href="#">Classroom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="teacher-portal.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Portal</a>
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
                        <a class="nav-link c-white" href="teacher-classroom-stream.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Steam</a>
                        <a class="nav-link c-white" href="teacher-classroom-classwork.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Classwork</a>
                        <a class="nav-link c-white bg_nav_menu" href="#">Student</a>
                        <a class="nav-link c-white" href="teacher-classroom-mark.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Mark</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-md-12 bg-green">
                    <div class="div_background_light rounded div_outline" style="height:400px">
                        <h4 class="fw-bold px-3 py-2 rounded-3 c-white" style="text-align:center;">Student List</h4>
                        <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                            <table class="table">
                                <thead class="table-dark">
                                    <th>#</th>
                                    <th>Student_ID</th>
                                    <th>Name</th>
                                    <th>Year_&_Sec.</th>
                                    <th>Email</th>
                                    <th>Phone_Number</th>
                                    <th>Address</th>
                                    
                                </thead>
                                <tbody>
                                    <td class="c-white">1</td>
                                    <td class="c-white">2018100556</td>
                                    <td class="c-white" style="white-space: nowrap;">Maynard A. Halili</td>
                                    <td class="c-white">BSIT 4L - G2</td>
                                    <td class="c-white">maynardhalili443@gmail.com</td>
                                    <td class="c-white">09123123123</td>
                                    <td class="c-white" style="white-space: nowrap;">931.blabla, blablabla, Bulacan</td>
                                </tbody>
                            </table>
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