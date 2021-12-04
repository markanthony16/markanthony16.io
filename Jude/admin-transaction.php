<?php

    require('php/db-connection.php');
    session_start();
    if(!isset($_SESSION["payment_success"])){
        $success_msg="";
    }
    else{
        $success_msg = $_SESSION["payment_success"];
        unset ($_SESSION["payment_success"]);
    }

    $query = "SELECT * FROM tuition_payment"; //You don't need a ; like you do in SQL
    $result = mysqli_query($db_payment, $query);

    
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
                    <a class="nav-link c-green" href="admin-enroll.php">Enroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Transaction</a>
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
        <!--All Content of Student Here-->
        <div class="mt-4 div_background_light div_outline rounded">
            <h4 class="c-white rounded-top py-2" style="text-align:center;">- Payment -</h4>

            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <!--Error message-->
                <?php if($success_msg){?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> <?php echo $success_msg; ?>
                </div>
                <?php }?>
                <table class="table">
                    <thead class="table-dark">
                        <th>Student_ID</th>
                        <th>Name</th>
                        <th>Down Payment</th>
                        <th>Balance</th>
                        <th>Installment</th>
                        <th>Total Payment</th>
                        <th>Promo Discount</th>
                        <th>Choose State</th>
                        <th>Current State</th>
                        <th>Submit</th>
                    </thead>

                    <tbody>
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                        <form action="php/admin-payment.php" method="post">
                            <tr>

                                <td class="c-white"><input readonly name="student_id" type="text"
                                        value="<?php echo $row['Student_ID'];?>"></td>
                                <td class="text-nowrap c-white"><?php echo $row['Student_name']; ?></td>
                                <td class="c-white" style="background-color:green;"><?php echo $row['Down_payment']; ?></td>
                                <td class="c-dark" style="background-color:orange;"><?php echo $row['Balance']; ?></td>
                                <td class="c-white"><input name="addpayment" type="text" placeholder="Add Down Payment">
                                </td>
                                <td class="c-white"><input name="total" type="text"
                                        value="<?php echo $row['Total_tuition']; ?>"></td>
                                <td class="c-white">
                                    <select name="promo">
                                        <optgroup label="Promo">
                                            <option value="<?php echo $row['Promo']; ?>"><?php echo $row['Promo']; ?>
                                            </option>
                                            <option value="Sibling Discount">Sibling Discount</option>
                                            <option value="9000 Discount">9000 Discount</option>
                                            <option value="No Discount">No Discount</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td class="c-white">
                                    <select name="states">
                                        <optgroup label="State">
                                            <option value="Unpaid">Unpaid</option>
                                            <option value="Paid">Paid</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td class="c-white"><?php echo $row['States']; ?></td>
                                <td class="c-white"><button type="submit" name="update"
                                        class="btn btn-outline-success">Update</button></td>
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