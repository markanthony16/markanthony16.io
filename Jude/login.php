<?php
require("php/db-connection.php");
$query = "SELECT * FROM slide_show"; //You don't need a ; like you do in SQL
$result = mysqli_query($db_content, $query);
$numofrow = mysqli_num_rows($result);

  session_start();
  if(!isset($_SESSION["error"])){
    $error="";
  }
  else{
    $error = $_SESSION["error"];
    unset ($_SESSION["error"]);
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

<body>

    <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline nav_outline">
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
                    <a class="nav-link active c-green" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="getintouch.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="payment-form.php">Payment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div>
            <div class="row justify-content-center pt-5">
                <div class="col-lg-5 col-md-6 mb-3 order-md-2">
                    <div class="col-md-12 div_background_light rounded-3 div_outline">
                        <h4 class="login-title rounded-top py-3 c-white mb-3">- Login -</h4>

                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active c-white" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">I'm a Learner</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link c-white" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">I'm Instructor</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <!--Login Form of Student-->
                                <!--Error message-->
                                <?php 
                                if($error){?>
                                <div class="mt-3 mx-4 alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> <?php echo $error;?>.
                                </div>
                                <?php }?>
                                <form action="php/login-process.php" method="post">
                                    <div style="width: 80%;" class="mx-auto pt-5">
                                        <div class="input-group flex-nowrap" style="margin-top: 10px;">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input type="text" name="email" class="form-control" placeholder="Email"
                                                required>
                                        </div>
                                        <div class="input-group flex-nowrap" style="margin-top: 10px;">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="bi bi-shield-lock-fill"></i></span>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 50px;">
                                            <button type="submit" name="student_login"
                                                class="btn btn-outline-success">Login</button>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 20px;">
                                            <a href="forget.php" class="text-decoration-none"
                                                style="color: white;">Forgot
                                                Password</a>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 10px; padding-bottom: 50px;">
                                            <a href="registration-student_1.php" class="text-decoration-none"
                                                style="color: white;">Create
                                                Account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div style="width: 80%;" class="mx-auto pt-5">
                                    <!--Login Form of Teacher-->
                                    <!--Error message-->
                                    <?php 
                                if($error){?>
                                    <div class="mt-3 mx-4 alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> <?php echo $error;?>.
                                    </div>
                                    <?php }?>
                                    <form action="php/teacher-login-process.php" method="post">
                                        <div class="input-group flex-nowrap" style="margin-top: 10px;">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input type="text" class="form-control" placeholder="Email"
                                                aria-label="Username" aria-describedby="addon-wrapping" name="email" required>
                                        </div>
                                        <div class="input-group flex-nowrap" style="margin-top: 10px;">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="bi bi-shield-lock-fill"></i></span>
                                            <input type="password" class="form-control" placeholder="Password"
                                                aria-label="Username" aria-describedby="addon-wrapping" name="password" required>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 50px;">
                                            <button type="submit" name="teacher_login"
                                                class="btn btn-outline-success">Login</button>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 20px;">
                                            <a href="teacher-forgot.php" class="text-decoration-none"
                                                style="color: white;">Forgot
                                                Password</a>
                                        </div>
                                        <div class="input-group flex-nowrap justify-content-center"
                                            style="margin-top: 10px; padding-bottom: 50px;">
                                            <a href="registration-teacher_1.php" class="text-decoration-none"
                                                style="color: white;">Create
                                                Account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="col-md-12 p-1 rounded-3">
                        <!--Slideshow-->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <?php for($x=1; $x<= $numofrow; $x++){?>
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="<?php echo $x; ?>"
                                    aria-label="Slide <?php echo $x+1; ?>"></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="asset/slideshow/slide1.jpg" class="d-block w-100 rounded"
                                        style="max-height:400px; min-height:300px;">
                                    <div class="carousel-caption d-none d-md-block"
                                        style="background-color:RGBA(0,0,0,0.66);">
                                        <h5>Saint Jude College of bulacan</h5>
                                        <p>Enroll now in Saint jude College Located @ Plaridel Bulacan</p>
                                    </div>
                                </div>
                                <?php while($row =  mysqli_fetch_array($result)){ ?>
                                <div class="carousel-item">
                                    <img src="asset/slideshow/<?php echo $row['Slide_show_filename']; ?>"
                                        class="d-block w-100" style="max-height:400px; min-height:300px;">
                                    <div class="carousel-caption d-none d-md-block"
                                        style="background-color:RGBA(0,0,0,0.66);">
                                        <h5><?php echo $row['Slide_show_title']; ?></h5>
                                        <p><?php echo $row['Slide_show_paragraph']; ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"
                                style="background-color:black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next"
                                style="background-color:black;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!--Gallery-->
                    <div class="row mb-5 div_background_light div_outline my-5 pb-4 pt-3 px-3 rounded-3">
                        <h3 class="text-center fw-bold c-white">PHOTO COLLECTION</h3>
                        <div class="column col-sm-4 my-3">
                            <img src="asset/image1.jpg" style="width: 100%; height: 150px;"
                                onclick="openModal();currentSlide(1)" class="hover-shadow cursor rounded-3">
                        </div>
                        <div class="column col-sm-4 my-3">
                            <img src="https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg"
                                style="width: 100%; height: 150px;" onclick="openModal();currentSlide(2)"
                                class="hover-shadow cursor rounded-3">
                        </div>
                        <div class="column col-sm-4 my-3">
                            <img src="asset/image1.jpg" style="width: 100%; height: 150px;"
                                onclick="openModal();currentSlide(3)" class="hover-shadow cursor rounded-3">
                        </div>
                        <div class="column col-sm-4 my-3">
                            <img src="asset/image1.jpg" style="width: 100%; height: 150px;"
                                onclick="openModal();currentSlide(4)" class="hover-shadow cursor rounded-3">
                        </div>
                        <div class="column col-sm-4 my-3">
                            <img src="asset/image1.jpg" style="width: 100%; height: 150px;"
                                onclick="openModal();currentSlide(5)" class="hover-shadow cursor rounded-3">
                        </div>
                        <div class="column col-sm-4 my-3">
                            <img src="asset/image1.jpg" style="width: 100%; height: 150px;"
                                onclick="openModal();currentSlide(6)" class="hover-shadow cursor rounded-3">
                        </div>
                    </div>

                    <div id="myModal" class="modal">
                        <span class="close cursor" onclick="closeModal()">&times;</span>
                        <div class="modal-content">

                            <div class="mySlides">
                                <div class="numbertext">1 / 6</div>
                                <img src="asset/image1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">2 / 6</div>
                                <img src="https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg"
                                    style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">3 / 6</div>
                                <img src="asset/image1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">4 / 6</div>
                                <img src="asset/image1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">5 / 6</div>
                                <img src="asset/image1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">6 / 4</div>
                                <img src="asset/image1.jpg" style="width:100%">
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>

                            <div class="row">
                                <div class="column col-2">
                                    <img class="demo cursor" src="asset/image1.jpg" style="width:100%"
                                        onclick="currentSlide(1)" alt="Nature and sunrise">
                                </div>
                                <div class="column col-2">
                                    <img class="demo cursor"
                                        src="https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg"
                                        style="width:100%" onclick="currentSlide(2)" alt="Snow">
                                </div>
                                <div class="column col-2">
                                    <img class="demo cursor" src="asset/image1.jpg" style="width:100%"
                                        onclick="currentSlide(3)" alt="Mountains and fjords">
                                </div>
                                <div class="column col-2">
                                    <img class="demo cursor" src="asset/image1.jpg" style="width:100%"
                                        onclick="currentSlide(4)" alt="Northern Lights">
                                </div>
                                <div class="column col-2">
                                    <img class="demo cursor" src="asset/image1.jpg" style="width:100%"
                                        onclick="currentSlide(4)" alt="Northern Lights">
                                </div>
                                <div class="column col-2">
                                    <img class="demo cursor" src="asset/image1.jpg" style="width:100%"
                                        onclick="currentSlide(4)" alt="Northern Lights">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
</body>

</html>