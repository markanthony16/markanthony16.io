<?php 
  include('php/verify_user_registration.php');
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if(isset($_SESSION['msg_success'])){
      $msg_success = $_SESSION['msg_success'];
      unset($_SESSION['msg_success']);
  }
  if(isset($_SESSION['msg_error'])){
        $msg_error = $_SESSION['msg_error'];
        unset($_SESSION['msg_error']);
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
                    <a class="nav-link c-green" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="getintouch.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="div_background_light div_outline mx-auto mt-5 rounded-3" style="max-width: 450px;">
            <h4 class="pt-2 fw-bold mb-5 mt-4" style="color: white; text-align: center;">Student Registration</h4>
            <form action="php/verify_user_registration.php" method="post" enctype="multipart/form-data">
                <div class="mx-auto" style="width: 90%;">
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <strong>Warning!</strong> Double check your credential before clicking the submit button.
                    </div>
                    <!--Error and success msg-->
                    <?php if(isset($msg_success)){ ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                        <strong>Thankyou!</strong> <?php echo $msg_success; ?>
                    </div>
                    <?php } if(isset($msg_error)){ ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Thankyou!</strong> <?php echo $msg_error; ?>
                    </div>
                    <?php } ?>

                    <!--inputfield-->
                    <div class="input-group flex-nowrap mt-3">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Firstname</span>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Middlename</span>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle Name"
                            aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Lastname</span>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Suffix</span>
                        <input type="text" class="form-control" name="suffix" placeholder="E.g: Jr or Sr"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Birthday</span>
                        <input type="date" class="form-control" name="birthday" placeholder="Birthday"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Phonenumber</span>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number"
                            aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                    <div class="input-group flex-nowrap mt-2">
                        <span class="input-group-text d-block" style="width:120px;" id="addon-wrapping">Email</span>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Username"
                            aria-describedby="addon-wrapping" required>
                    </div>
                    <div class="form-check mt-5">
                        <input class="form-check-input" required type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label c-white" for="flexCheckDefault">
                            <b class="c-green">Upload the following scan copy of the requirement below:</b> Make sure
                            that you only submit valid information or else your regisration will be decline by our
                            person incharge.
                        </label>
                    </div>
                    <div class="input-group mt-2">
                        <label class="input-group-text c-green fw-bold d-block" style="width:200px;" for="inputGroupFile01">Report Card</label>
                        <input type="file" required class="form-control" id="inputGroupFile01" name="reportcard">
                    </div>
                    <div class="input-group mt-2">
                        <label class="input-group-text c-green fw-bold d-block" style="width:200px;" for="inputGroupFile01">PSA</label>
                        <input type="file" required class="form-control" id="inputGroupFile01" name="psa">
                    </div>
                    <div class="input-group mt-2">
                        <label class="input-group-text c-green fw-bold d-block" style="width:200px;" for="inputGroupFile01">2x2 ID Picture</label>
                        <input type="file" required class="form-control" id="inputGroupFile01" name="idpicture">
                    </div>
                    <div class="input-group mt-2">
                        <label class="input-group-text c-green fw-bold d-block" style="width:200px;" for="inputGroupFile01"> Good Moral
                            Certificate</label>
                        <input type="file" required class="form-control" id="inputGroupFile01" name="goodmoral">
                    </div>
                    <div class="d-grid d-md-flex justify-content-center mt-5 pb-5 mb-5">
                        <button class="btn btn-success" type="submit" name="verify_user_registration">Submit
                            Registration</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--footer-->
    <div class="container-xl-fluid">
        <footer style=" " class="footer_outline footer_background">
            <div class="container" id="aboutus">
                <div class="row">
                    <div class="col-sm-5 text-center bg- ">
                        <h5 class=" display-6 c-white mt-5">Jeremiah 29:11</h5>
                        <p class="c-white">"For I know the plans I have for you. Declares the Lord, plans to prosper
                            you and not to harm you, plans to give you a hope and a future." </p>

                    </div>
                    <div class="col-sm-7 text-center ">
                        <h6 class="display-6 c-white mt-2">Keep in touch</h6>
                        <div class="btn-group-default py-3">
                            <a href="https://www.facebook.com/St-Jude-College-of-Bulacan-114070530769911"
                                class="text-decoration-none btn btn-primary">
                                <i class="fa-2x c-white bi bi-facebook">
                                </i>
                            </a>
                            <a href="#" class="text-decoration-none btn btn-danger">
                                <i class="fa-2x c-white bi bi-youtube">
                                </i>
                            </a>
                        </div>

                        <h4 class=" fw-light c-white mt-3 text-uppercase">Contact us</h4>
                        <p class="text-center c-white">
                            Phone: <br>For Smart user +(639)123456789<br>
                            For Globe user: +(639)123456789
                        </p>
                        <p class="text-center c-white mb-5">
                            Email: <br>sjbc2021@gmail.com
                        </p>


                    </div>
                    <p class="text-center c-white"> � 1998-2021 ST. JUDE COLLEGE OF BULACAN, PHILIPPINES</p>
                </div>

        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>