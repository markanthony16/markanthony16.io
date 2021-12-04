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
            
        </div>
    </nav>

    <div class="container mb-5">
        <div class="div_background_light div_outline mx-auto mt-5 rounded-3" style="max-width:600px;">
            <h4 class="pt-2 fw-bold mb-5 mt-4" style="color: white; text-align: center;">Student Registration</h4>
            <form action="php/user-registration-process.php" method="post">
                <div class="mx-auto" style="width: 90%;">
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Warning!</strong> We are strictly implementing one account per one user.
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <strong>Note!</strong> Make sure to double check all data you enter.
                    </div>
                    <<!--inputfield-->
                        <div class="input-group flex-nowrap mt-3">
                            <span class="input-group-text" id="addon-wrapping">Student Number</span>
                            <input type="text" name="studentnumber"
                                value="<?php echo $_SESSION['For_Register_Student_ID']; ?>" class="form-control"
                                readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">First Name</span>
                            <input type="text" name="firstname"
                                value="<?php echo $_SESSION['For_Register_Firstname']; ?>" class="form-control"
                                readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Middle Name</span>
                            <input type="text" name="middlename"
                                value="<?php echo $_SESSION['For_Register_Middlename']; ?>" class="form-control"
                                readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Last Name</span>
                            <input type="text" name="lastname" value="<?php echo $_SESSION['For_Register_Lastname']; ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Suffix</span>
                            <input type="text" name="suffix" value="<?php echo $_SESSION['For_Register_Suffix']; ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Address</span>
                            <input type="text" name="address" class="form-control" placeholder="Address" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Phone Number</span>
                            <input type="text" name="phonenumber" class="form-control" placeholder="Contact" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION['For_Register_Email']; ?>" readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Password</span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Re-Password</span>
                            <input type="password" name="repassword" class="form-control"
                                placeholder="Re enter Password" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <select class="form-select form-select-md" name="sex" required>
                                <option value="">Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <!-- <span class="input-group-text" id="addon-wrapping">Grade Level</span>
                               <input type="text" name="gradelevel" class="form-control" placeholder="Grade Level" required> -->
                            <select class="form-select form-select-md" name="gradelevel" required>
                                <option value="">Choose Grade Level</option>
                                <option value="Grade_7">Grade 7</option>
                                <option value="Grade_8">Grade 8</option>
                                <option value="Grade_9">Grade 9</option>
                                <option value="Grade_10">Grade 10</option>
                                <option value="Grade_11">Grade 11</option>
                                <option value="Grade_12 ">Grade 12</option>
                            </select>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">General Weight Average</span>
                            <input type="text" name="gwa" class="form-control" placeholder="Eg. 94.6" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Date of Birth</span>
                            <input type="date" name="birthday" class="form-control" placeholder="Birthday" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Place of Birth</span>
                            <input type="text" name="placeofbirth" class="form-control" placeholder="Place of Birth"
                                required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Age</span>
                            <input type="text" name="age" class="form-control" placeholder="Age" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Religion</span>
                            <input type="text" name="religion" class="form-control" placeholder="Religion" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Nationality</span>
                            <input type="text" name="nationality" class="form-control" placeholder="Nationality"
                                required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Firstname</span>
                            <input type="text" name="guardianfirstname" class="form-control"
                                placeholder="Guardian Firstname" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Middlename</span>
                            <input type="text" name="guardianmiddlename" class="form-control"
                                placeholder="Guardian Middlename" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Lastname</span>
                            <input type="text" name="guardianlastname" class="form-control"
                                placeholder="Guardian Lastname" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Relationship to Guardian</span>
                            <input type="text" name="relationshiptoguardian" class="form-control"
                                placeholder="Relationship to Guardian" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Occupation</span>
                            <input type="text" name="guardianoccupation" class="form-control"
                                placeholder="Guardian Occupation" required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Email</span>
                            <input type="text" name="guardianemail" class="form-control" placeholder="Guardian Email"
                                required>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <span class="input-group-text" id="addon-wrapping">Guardian Number</span>
                            <input type="text" name="guardiannumber" class="form-control" placeholder="Guardian Number"
                                required>
                        </div>
                        <div class="d-grid d-md-flex justify-content-center mt-5 pb-5 mb-5">
                            <button class="btn btn-success" type="submit" name="reg_user">Register</button>
                        </div>
                </div>
            </form>
        </div>
    </div>

    <!--footer-->
    <div class="footer_background footer_outline container-fluid">
        <div class="row">
            <div class="col-md-4 mt-3">
                <h4 class="" style="text-align: center; color: yellow;">Contact Us</h4>
                <div class="row">
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 1</p>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 2</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <h4 style="text-align: center; color: yellow;">Courses</h4>
                <div class="row">
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 1</p>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 2</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <h4 style="text-align: center; color: yellow;">Quick Link</h4>
                <div class="row">
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 1</p>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="text-decoration-none">
                            <p style="text-align: center; color: white;">Sample Link 2</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>