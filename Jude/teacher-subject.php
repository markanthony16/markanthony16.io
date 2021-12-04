<?php
require('php/db-connection.php');
    session_start();
    if(!isset($_SESSION['Teacher_id'])){
        header("location: login.php");  
    }
    else{
        $teacherid = $_SESSION['Teacher_id'];
    }

    $sqlsection = "SELECT * FROM subject_section WHERE Teacher_id = '$teacherid'";
    $resultsection = mysqli_query($db_section, $sqlsection);
    
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

        <div class="collapse navbar-collapse justify-content-end" style="padding-right: 20px;" id="navbarNav">
            <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-profile-edit.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-subject-advising.php">Advising</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-lg mt-5 pt-3">
        <div class="row px-4 div_background_light div_outline rounded-3 mb-5 ">
            <h2 class="text-center mt-3 rounded-3 c-white py-2">List of Your Subject</h2>
            <!--Subject 1 -->
            <?php while($rowsection = mysqli_fetch_array($resultsection,MYSQLI_ASSOC)){ ?>
            <div class="col-xl-4  col-md-6 my-5 d-flex justify-content-center">
                <div class="col-md-10 rounded-3 bg-yellow shadow">
                    <!--Title-->
                    <div class="py-3" style="">
                        <div class="">
                            <a href="teacher-classroom-stream.php?id=<?php echo $rowsection['Subject_section_id']; ?>" class="text-decoration-none">
                                <h4 class="text-center px-2 c-white"><?php echo $rowsection['Subjects']; ?></h4>
                            </a>
                            <h6 class="text-center px-2 c-dark" style=""><?php echo $rowsection['Grade_level']." - ".$rowsection['Section']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>