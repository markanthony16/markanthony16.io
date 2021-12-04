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

    $querysection = "SELECT * FROM all_section"; //You don't need a ; like you do in SQL
    $resultsection = mysqli_query($db_section, $querysection);

    
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
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Adding Section</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-subject-to-section.php">Subject to Section</a>
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
            <form action="php/adding-section-process.php" class="row" method="post">
                <h5 class="c-white text-center">Adding of Section</h5>
                <div class="col-md-6 my-1">
                    <div class="col-md-6 input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Section name</span>
                        <input type="text" name="section" class="form-control" placeholder="Section name"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="input-group flex-nowrap">
                        <select class="form-select form-select-md" name="gradelevel" required>
                            <option value="">Grade Level</option>
                            <option value="Grade_7">Grade 7</option>
                            <option value="Grade_8">Grade 8</option>
                            <option value="Grade_9">Grade 9</option>
                            <option value="Grade_10">Grade 10</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid mt-2 col-6 mx-auto">
                    <button class="btn btn-success" name="add" type="submit">Add Section</button>
                </div>
            </form>
        </div>

        <!--All Content of Student Here-->
        <div class="mt-4 div_background_light div_outline rounded my-5">
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Section Information -</h4>

            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark">
                        <th>Section_ID</th>
                        <th>Section_Name</th>
                        <th>Grade_Level</th>
                        <th>Action</th>
                    </thead>
                    <?php while($rowsection = mysqli_fetch_array($resultsection)){ ?>
                    <tbody>
                        <td class="c-white"><?php echo $rowsection['Section_id']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowsection['Section_name']; ?></td>
                        <td class="c-white"><?php echo $rowsection['Grade_level']; ?></td>
                        <td><a class="btn btn-outline-danger" href="php/adding-section-process.php?id=<?php echo $rowsection['Section_id']; ?>">Remove</a></td>
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