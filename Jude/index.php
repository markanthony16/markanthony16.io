<?php
    require("php/db-connection.php");
    //call all slideshow
    $query = "SELECT * FROM slide_show"; //You don't need a ; like you do in SQL
    $result = mysqli_query($db_content, $query);
    $numofrow = mysqli_num_rows($result);

    //call all news and announcement
    $querynews = "SELECT * FROM news"; //You don't need a ; like you do in SQL
    $resultnews = mysqli_query($db_content, $querynews);

    //call all calendar
    $querycalendar = "SELECT * FROM calendar"; //You don't need a ; like you do in SQL
    $resultcalendar = mysqli_query($db_content, $querycalendar);
    $rowcalendar =  mysqli_fetch_array($resultcalendar);

    //call all video
    $queryvideo = "SELECT * FROM video"; //You don't need a ; like you do in SQL
    $resultvideo = mysqli_query($db_content, $queryvideo);
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

    <style>
    .box {
        margin: auto;
        width: 350px;
        height: 500px;
        border: 1px solid black;
        align-items: center;
        text-align: center;
        border-radius: 15px;
        background: linear-gradient(to top, rgb(151, 20, 0), 50%, white 50%);
        background-size: 100% 200%;
        transition: all .8s;

    }

    .box:hover {
        background-position: bottom;
        color: white;
        border: none;
        box-shadow: 0 0 20px rgb(151, 20, 0);
    }

    .box img {
        width: 60%;
        height: 200px;
        padding: 3px;
        background-color: white;
    }
    </style>
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
                    <a class="nav-link c-white bg_nav_menu rounded" aria-current="page" href="#">Home</a>
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
                    <a class="nav-link c-green" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    

    <section id="#home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 px-0">
                    <div class="col-md-12 bg-green rounded-3">
                        <!--Slideshow-->

                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <?php for($x=1; $x<= $numofrow; $x++){?>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $x; ?>"
                                    aria-label="Slide <?php echo $x+1; ?>"></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="asset/slideshow/slide1.jpg" class="d-block w-100"
                                        style="max-height:400px; min-height:300px;">
                                    <div class="carousel-caption d-none d-md-block"
                                        style="background-color:RGBA(0,0,0,0.66);">
                                        <h5>Saint Jude College of bulacan</h5>
                                        <p>Enroll now in Saint jude College Located @ Plaridel Bulacan</p>
                                    </div>
                                </div>
                                <?php while($row =  mysqli_fetch_array($result)){ ?>
                                <div class="carousel-item">
                                    <img src="asset/slideshow/<?php echo $row['Slide_show_filename']; ?>" class="d-block w-100"
                                        style="max-height:400px; min-height:300px;">
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
                </div>
            </div>
        </div>
    </section>

    <section id="announcements" class="div_background_light py-4">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="justify-content-center row col-md-12 rounded-3">
                    <h3 class="col-12 display-6 text-center rounded-3 c-white">NEWS &
                        ANNOUNCEMENTS</h3>
                    <!--news-->
                    <?php while($rownews =  mysqli_fetch_array($resultnews)){ ?>
                    <div class="col-lg-3 col-sm-5 card mx-3 my-2">
                        <img src="asset/news/<?php echo $rownews['News_filename']; ?>" class="card-img-top pt-3 " style="height:150px; width:100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $rownews['News_title']; ?></h5>
                            <p class="card-text"><?php echo $rownews['News_subtitle']; ?></p>
                            <a href="news.php?id=<?php echo $rownews['News_ID']; ?>" class="mt-auto btn btn-success">Read Article</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="video" class="div_background_dark py-4">
        <div class="container">
            <div class="text-center">
                <h2 class=" text-white ">Video Collection</h2>
                <p class="lead text-muted">St. Jude College Bulacan event video collection</p>
            </div>
            <div class="row my-5 align-items-center justify-content-center">
                <!--Video Gallery -->
                <?php while($rowvideo =  mysqli_fetch_array($resultvideo)){ ?>
                <img style="width:300px; height:200px;" class="column col-lg-4 col-sm-6 mt-3" type="button" src="asset/video_thumbnail/<?php echo $rowvideo['Video_thumbfilename']; ?>"
                    data-bs-toggle="modal" data-bs-target="#<?php echo $rowvideo['Video_title']; ?>">
                <!-- Modal -->
                <div class="modal fade" id="<?php echo $rowvideo['Video_title']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $rowvideo['Video_title']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="<?php echo $rowvideo['Video_link']; ?>"
                                    width="100%" height="314" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    allowFullScreen="true"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


    <section id="avail" class="bg-light py-4 container-fluid">

        <div class="text-center">
            <h2>SCHOOL INFORMATIONS & EVENTS</h2>
            <p class="lead text-muted">Feel free to be update in St. Jude College Bulacan</p>
        </div>

        <div class="row my-5 align-items-center justify-content-center">
            <div class="col-lg-4 mb-3">
                <div class="card border-1">
                    <div class="card-body text-center py-4">
                        <h4 class="card-tittle">Latest Events</h4>
                        <p class="lead card-subtitle"></p>
                        <p class="display-5 my-4 text-primary fw-bold"></p>
                        <p class="card-text mx-5 d- d-lg-block">Upcoming events for
                            St. Jude College Bulacan.
                            Be in the know on the latest happenings in and around the school.</p>
                        <a href="#calendar" class="btn btn-outline-primary btn-lg mt-3">School Calendar</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-3">
                <div class="card border-primary border-2">
                    <div class="card-header text-center text-primary">Most Visited</div>
                    <div class="card-body text-center py-5">
                        <h4 class="card-tittle">Courses Offered</h4>
                        <p class="lead card-subtitle">Enrollment for SY 2022-2023</p>
                        <h3 class=" my-4 text-primary fw-bold">Preschool Level</h3>
                        <p class="card-text mx-5  d-lg-block ">Junior Casa (3 years old)</p>
                        <p class="card-text mx-5  d-lg-block ">Advance Casa (4 years old)</p>
                        <p class="card-text mx-5  d-lg-block ">Kindergarten (5 years old)</p>

                        <h3 class=" my-4 text-primary fw-bold">Elementary Level</p>
                            <h3 class=" my-4 text-primary fw-bold">Junior Level</p>
                                <a href="#" class="btn btn-outline-primary btn-lg mt-3">Contact Us</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-3">
                <div class="card border-1">
                    <div class="card-body text-center py-4">
                        <h4 class="card-tittle">Discount Offered</h4>
                        <p class="lead card-subtitle">Limited Only</p>
                        <p class="display-5 my-4 text-primary fw-bold"></p>
                        <p class="card-text mx-2 text-primary  d-lg-block">SIBLINGS DISCOUNT</p>
                        <p class="card-text mx-2 text-primary d-lg-block">9,000 DISCOUNT <br> (Grade 7 - 10)</p>
                        <p class="card-text mx-5 text-primary d-lg-block">FREE BOOKS <br> -Mga Anak ng GURO
                            (Preschool to
                            Grade 6 ) <br> </p>
                        <p class="card-text mx-5 text-primary d-lg-block">Incoming Grade 10<br> </p>
                        <a href="#" class="btn btn-outline-primary btn-lg mt-3">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Calendar-->
    <section id="calendar" class="div_background_light py-4">
        <div class="container">
            <div class="text-center">
                <h2 class="text-center text-white">Calendar of Activities</h2>
            </div>

            <div class="row mt-3 mb-3 align-items-center justify-content-center">
                <img src="asset/calendar/<?php echo $rowcalendar['Calendar_filename']; ?>" class="rounded-3">
            </div>
    </section>


    <section id="executive">
        <section id="executive" class="div_background_dark py-4">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="text-center text-white">St. Jude College of Bulacan</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 box mb-3">
                        <img class="rounded-circle m-4" src="asset/ernie.jpg"><br><br>
                        <h1 class="display-6 fw-bold">Dr. Ernie V. Estrella</h1><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Assumenda sed blanditiis perspiciatis excepturi nisi recusandae explicabo nemo.
                            Quae, aliquid optio?</p>
                    </div>
                </div>
            </div>
        </section>

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



        <!--Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
</body>

</html>