<?php

require('php/db-connection.php');
session_start();

  $query = "SELECT * FROM registered_teacher WHERE current_status=''"; //You don't need a ; like you do in SQL
  $result = mysqli_query($db_teacher, $query);

  $msg="";
  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
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
                    <a class="nav-link active c-white bg_nav_menu rounded" aria-current="page"
                        href="#">Pre-Registration</a>
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
        <div class="div_background_light div_outline mx-auto mt-3 rounded-3">
            <ul class="nav nav-pills justify-content-center py-2 gap-2">
                <li class="nav-item dropdown">
                    <a class="nav-link c-green" href="admin-pre-registration.php">Student Registration</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Teacher Registration</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="div_background_light div_outline mx-auto mt-3 rounded-3">
            <h4 class="py-2 fw-bold bg-green rounded-top" style="color: white; text-align: center;">Pre - Registration
            </h4>

            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <?php if($msg != ""){ ?>
                <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert"
                    style="width: 90%;">
                    <strong>Pre-Registration-Successful</strong> <?php echo $msg; ?>
                </div>
                <?php } ?>
                <table class="table">
                    <thead class="table-dark">
                        <th class="text-center">Teacher_ID</th>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Middlename</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Suffix</th>
                        <th class="text-center">Birthday</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone_Number</th>
                        <th class="text-center">Sex</th>
                        <th class="text-center" colspan="2">Verification</th>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_array($result)){ ?>

                        <form action="php/pre-registration-teacher.php" method="post">
                            <tr>
                                <td class="c-white text-nowrap"><input name="teacherid" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Teacher_id']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="firstname" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Teacher_firstname']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="middlename" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Teacher_middlename']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="lastname" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Teacher_lastname']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="suffix" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Teacher_suffix']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="birthday" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Birthday']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="email" readonly class="c-white text-center"
                                        type="text" style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Email']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="phonenumber" readonly
                                        class="c-white text-center" type="text"
                                        style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Phone_number']; ?>"></td>
                                <td class="c-white text-nowrap"><input name="sex" readonly class="c-white text-center"
                                        type="text" style="background-color:transparent;border:0;"
                                        value="<?php echo $row['Sex']; ?>"></td>
                                <td class="c-white text-nowrap text-center"><button name="accept" type="submit"
                                        class="btn btn-outline-success">Accept</button></td>
                                <td class="c-white text-nowrap text-center"><button name="reject" type="submit"
                                        class="btn btn-outline-danger">Reject</button></td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
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