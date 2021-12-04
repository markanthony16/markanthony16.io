<?php

session_start();
    if(!isset($_SESSION["enrollment_success"])){
        $success_msg="";
    }
    else{
        $success_msg = $_SESSION["enrollment_success"];
        unset ($_SESSION["enrollment_success"]);
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
                    <a class="nav-link c-green" href="admin-enroll.php">Sectioning Student</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Enrollment Date</a>
                </li>
            </ul>
        </div>

        <!--Enrollment date set Here-->
        <div class="mt-4 div_background_light div_outline rounded">
            <!--Error message-->
            <?php if($success_msg){?>
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <strong>Successful!</strong> <?php echo $success_msg; ?>
                    </div>
            <?php }?>
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Set Enrollment Date -</h4>

            <div class="mx-auto py-3" style="width:95%;">
                <form action="php/admin-set-enrollment-date.php" method="post">
                    <div class="input-group mb-3 mx-auto" style="max-width:550px;">
                        <span class="input-group-text" id="inputGroup-sizing-default">Open Date</span>
                        <input name="opendate" type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 mx-auto" style="max-width:550px;">
                        <span class="input-group-text" id="inputGroup-sizing-default">Close Date</span>
                        <input name="closedate" type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="d-grid gap-2 mx-auto" style="max-width:450px;">
                        <button class="btn btn-success" type="submit"  name="setenrollmentdate">Set Enrollment Date</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>