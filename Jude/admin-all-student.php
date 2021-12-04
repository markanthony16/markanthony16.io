<?php

    require('php/db-connection.php');

    $query = "SELECT * FROM registered_student"; //You don't need a ; like you do in SQL
    $result = mysqli_query($db_student, $query);

    
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
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Student List</a>
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
        <div class="div_background_dark rounded-3 mt-4">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-7</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-8</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-9</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-10</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-11</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle c-green" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Grade-12</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Secion 1</a></li>
                        <li><a class="dropdown-item" href="#">Section 2</a></li>
                        <li><a class="dropdown-item" href="#">Section 3</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!--All Content of Student Here-->
        <div class="mt-4 div_background_light div_outline rounded" style="height:400px;">
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Student Information -</h4>

            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark">
                        <th>Student_ID</th>
                        <th>Name</th>
                        <th>Grade_Level.</th>
                        <th>Age</th>
                        <th>Birthday</th>
                        <th>Email</th>
                        <th>Phone_Number</th>
                        <th>Address</th>
                        <th>Edit_Info</th>
                    </thead>
                    <?php 
                    while($row = mysqli_fetch_array($result)){ ?>   
                        <tbody>
                            <td class="c-white"><?php echo $row['Student_Number']; ?></td>
                            <td class="text-nowrap c-white"><?php echo $row['First_name']." ".$row["Middle_name"]." ".$row["Last_name"]; ?></td>
                            <td class="c-white"><?php echo $row['Grade_level']; ?></td>
                            <td class="c-white"><?php echo $row['Age']; ?></td>
                            <td class="text-nowrap c-white"><?php echo $row['Birthday']; ?></td>
                            <td class="c-white"><?php echo $row['Email_address']; ?></td>
                            <td class="c-white"><?php echo $row['Contact_number']; ?></td>
                            <td class="text-nowrap c-white"><?php echo $row['Permanent_address']; ?></td>
                            <td><a href="admin-all-student-edit.php?id=<?php echo $row['Student_Number']; ?>" class="text-decoration-none c-green">Edit</a></td>
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