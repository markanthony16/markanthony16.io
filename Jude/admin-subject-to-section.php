<?php
session_start();
    require('php/db-connection.php');
    $error="";
    if(!isset($_SESSION['msg_success'])){
        unset($_SESSION['msg_success']);
    }
    else{
        $error = $_SESSION['msg_success'];
        unset($_SESSION['msg_success']);
    }
    $querysubject = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
    $resultsubject = mysqli_query($db_subject, $querysubject);
    $gradelevel="All Grade Level";
    if(isset($_GET['id'])){
        $gradelevel = $_GET['id'];
        $queryssection = "SELECT * FROM all_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultsection = mysqli_query($db_section, $queryssection);

        $querysubject = "SELECT * FROM subjects WHERE Subject_year_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultsubject = mysqli_query($db_subject, $querysubject);

        $querysubjecttosection = "SELECT * FROM subject_section WHERE Grade_level='$gradelevel'"; //You don't need a ; like you do in SQL
        $resultsubjecttosection = mysqli_query($db_section, $querysubjecttosection);
    }
    else{
        $queryssection = "SELECT * FROM all_section"; //You don't need a ; like you do in SQL
        $resultsection = mysqli_query($db_section, $queryssection);

        $querysubject = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
        $resultsubject = mysqli_query($db_subject, $querysubject);

        $querysubjecttosection = "SELECT * FROM subject_section"; //You don't need a ; like you do in SQL
        $resultsubjecttosection = mysqli_query($db_section, $querysubjecttosection);
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
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-all-student.php">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-enroll.php">Enroll</a>
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
        <div class="div_background_dark div_outline mx-auto mt-3 rounded-3">
            <ul class="nav nav-pills justify-content-center py-2 gap-2">
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-section.php">Adding Section</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Subject to Section</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="div_background_dark div_outline mx-auto mt-3 rounded-3">
            <ul class="nav nav-pills justify-content-center py-2 gap-2">
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-subject-to-section.php?id=Grade_7">Grade 7</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-subject-to-section.php?id=Grade_8">Grade 8</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-subject-to-section.php?id=Grade_9">Grade 9</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-subject-to-section.php?id=Grade_10">Grade 10</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="div_background_light rounded-3 mt-4 py-3 px-3 div_outline">
            <?php if($error != ""){ ?>
            <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert" style="width: 90%;">
                <strong>Added Successfull</strong> <?php echo $error; ?>
            </div>
            <?php } ?>
            <form action="php/subject-to-section-process.php" class="row" method="post">
                <h4 class="c-white text-center">Assign Subject to All Section of Specific Section</h4>
                <h5 class="c-white text-center c-green"><?php echo $gradelevel; ?></h5>
                <div class="col-md-6 my-1">
                    <div class="input-group flex-nowrap">
                        <select class="form-select form-select-md" name="section" required>
                            <option value="">Section</option>
                            <?php while($rowsection = mysqli_fetch_array($resultsection)){ ?>
                            <option value="<?php echo $rowsection['Section_id']; ?>">
                                <?php echo $rowsection['Grade_level']." ".$rowsection['Section_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 my-1 row">
                    <div class="input-group flex-nowrap">
                        <select class="form-select form-select-md" name="subject" required>
                            <option value="">Subject | Teacher</option>
                            <?php while($rowsubject = mysqli_fetch_array($resultsubject)){ ?>
                            <option value="<?php echo $rowsubject['Subject_id']; ?>">
                                <?php echo $rowsubject['Subject_year_level']." ".$rowsubject['Subject_title']." | ".$rowsubject['Subject_teacher']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="d-grid mt-2 col-6 mx-auto">
                    <button class="btn btn-success" name="assigned" type="submit">Assigned</button>
                </div>
            </form>
        </div>

        <!--All Content of Student Here-->
        <div class="mt-4 div_background_light div_outline rounded my-5">
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Subject Information -</h4>

            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark">
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Grade Level</th>
                        <th>Teacher</th>
                        <th>Action</th>
                    </thead>
                    <?php while($rowsubjecttosection = mysqli_fetch_array($resultsubjecttosection)){ ?>
                    <tbody>
                        <td class="c-white"><?php echo $rowsubjecttosection['Subjects']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowsubjecttosection['Section']; ?></td>
                        <td class="c-white"><?php echo $rowsubjecttosection['Grade_level']; ?></td>
                        <td class="c-white"><?php echo $rowsubjecttosection['Teacher']; ?></td>
                        <td><a class="btn btn-outline-danger"
                                href="php/subject-to-section-process.php?id=<?php echo $rowsubjecttosection['Subject_section_id']; ?>">Remove</a>
                        </td>
                    </tbody>
                    <?php } ?>
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