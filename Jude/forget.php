<?php   
    require("php/db-connection.php");

session_start();
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Forget Password - St. Jude</title>
</head>

<body>
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

    <div class="container">
        <div class="row mx-auto py-5 justify-content-center w-100">
            <div class="col-lg-5 col-md-8 nav_color div_outline rounded">
                <form action="php/forgot-process.php" method="post">
                    <h4 class="c-green text-center mt-3">
                        Forgot Password
                    </h4>
                    <!--Error and success msg-->
                    <?php if(isset($msg_success)){ ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                        <strong>Successful!</strong> <?php echo $msg_success; ?>
                    </div>
                    <?php } if(isset($msg_error)){ ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Invalid!</strong> <?php echo $msg_error; ?>
                    </div>
                    <?php } ?>
                    <!--Email Address-->
                    <div class=" gap-2 mb-3 mt-2">
                        <h6>
                            <div class="text-center lead text-muted mt-3">Enter your email eddress:</div>
                        </h6>
                        <div class="mb-3 mt-2">
                            <input type="email" name="emailaddress" class="form-control " placeholder="Email address"
                                required>
                        </div>
                        <div class="mt-3 mb-2">
                            <button type="submit" class="btn btn-outline-success mx-auto d-block" data-bs-toggle="collapse"
                                data-bs-target="#myCollapse" name="submit_email">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-xl-fluid">
        <footer style=" " class="footer_outline footer_background">
            <div class="container" id="aboutus">
                <div class="row">
                    <div class="col-sm-5 text-center bg- ">
                        <h5 class=" display-6 c-white mt-5">Jeremiah 29:11</h5>
                        <p class="c-white">"For I know the plans I have for you. Declares the Lord, plans to
                            prosper
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
    <!--Blue - #162739 Green- #00a841-->
</body>

</html>