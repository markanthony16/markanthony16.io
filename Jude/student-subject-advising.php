<?php
session_start();
require('php/db-connection.php');
    $Enrollment_Detail_Sql = "SELECT * FROM enrollment_date";
    $Result_Enrollment_Detail = mysqli_query($db_enrollment, $Enrollment_Detail_Sql);
    $Enrollment_Detail = mysqli_fetch_assoc($Result_Enrollment_Detail);
    $Open_date = $Enrollment_Detail['Open_date'];
    $Close_date = $Enrollment_Detail['Close_date'];

    $student_id = $_SESSION['student_id'];

    $Student_Detail_Sql = "SELECT * FROM registered_student WHERE Student_Number='$student_id'";
    $Result_Student_Detail = mysqli_query($db_student, $Student_Detail_Sql);
    $Student_Detail = mysqli_fetch_assoc($Result_Student_Detail);

    $Payment_Detail_Sql = "SELECT * FROM tuition_payment WHERE Student_ID='$student_id'";
    $Result_Payment_Detail = mysqli_query($db_payment, $Payment_Detail_Sql);
    $Payment_Detail = mysqli_fetch_assoc($Result_Payment_Detail);
    date_default_timezone_set('Asia/Manila');

    $msg = "";
    if(!isset($_SESSION['advising_msg'])){
        $msg = "";
        unset($_SESSION['advising_msg']);
    }
    else{
        $msg = $_SESSION['advising_msg'];
        unset($_SESSION['advising_msg']);
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
                    <a class="nav-link c-green" href="student-profile-edit.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Advising</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-subject.php">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="mx-auto" style="max-width:550px;">
            <div>
                <div class=" div_outline rounded my-5">
                    <div class="div_background_light">
                        <h3 class="c-white fw-bold py-3" style="text-align:center;">Registration</h3>
                        <div class="alert alert-warning alert-dismissible fade show mt-2 mx-4" role="alert">
                            <strong>Note!</strong> Make sure you your Down payment is not zero before you can register. To make a down payment please click this link. <a href="payment-form.php">Deposit a Payment</a>
                        </div>
                        <?php if($msg!=""){ ?>
                        <div class="alert alert-success alert-dismissible fade show mt-2 mx-4" role="alert">
                            <strong>Registration Message!</strong> <?php echo $msg; ?>
                        </div>
                        <?php } ?>
                        <form action="php/advising-process.php" method="post">
                            <table class="table c-white mx-auto" style="width:90%;">
                                <tbody>
                                    <tr>
                                        <th>School Name</th>
                                        <td><?php echo $Enrollment_Detail['School_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Enrollment Period</th>
                                        <?php if (time() > strtotime("$Open_date 12:00AM") && time() < strtotime("$Close_date 11:59PM")){ ?>
                                        <td class="text-success">
                                            <?php echo $Enrollment_Detail['Open_date']." - ".$Enrollment_Detail['Close_date']." (Opened)"; ?>
                                        </td>
                                        <?php } else { ?>
                                        <td class="text-danger">
                                            <?php echo $Enrollment_Detail['Open_date']." - ".$Enrollment_Detail['Close_date']." (Closed)"; ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th>StudentNo</th>
                                        <td><?php echo $Student_Detail['Student_Number']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Upcoming Grade Level</th>
                                        <td><?php echo $Student_Detail['Grade_level']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Outstanding Balance</th>
                                        <td><?php echo "₱".$Payment_Detail['Balance']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Down Payment</th>
                                        <td><?php echo "₱".$Payment_Detail['Down_payment']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Registration : </th>
                                        <td style="color:yellow;"><?php echo $Student_Detail['is_advised']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php if (time() > strtotime("$Open_date 12:00AM") && time() < strtotime("$Close_date 11:59PM")){ ?>
                            <div class="d-grid gap-2 justify-content-end me-5 pb-3">
                                <button class="btn btn-success" type="submit" name="advised">Register</button>
                            </div>
                            <?php } else { ?>
                            <div class="d-grid gap-2 justify-content-end me-5 pb-3">
                                <button disabled class="btn btn-danger" type="button">Register</button>
                            </div>
                            <?php } ?>
                        </form>
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