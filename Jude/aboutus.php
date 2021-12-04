<?php 
   require("php/db-connection.php");

     //call all news and announcement
     $queryexecutive = "SELECT * FROM executive"; //You don't need a ; like you do in SQL
     $resultexecutive = mysqli_query($db_content, $queryexecutive);

     //call all Vision, Mission, Philosophy
     $queryvmphilo = "SELECT * FROM vmphilo"; //You don't need a ; like you do in SQL
     $resultvmphilo = mysqli_query($db_content, $queryvmphilo);
     $rowvmphilo =  mysqli_fetch_array($resultvmphilo);


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
    <title>About Us - St. Jude</title>
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
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">About Us</a>
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

    <div class="container">
        <div class="row pt-2">
            <div class="col-lg-12 col-md-10 mb-3 order-md-2">
                <div class=" bg-rounded-3">
                    <h3>
                        <div class=" text-center">
                            <img src="asset/logo.png" alt="Saint Jude Logo" style="width: 100px;  padding-top: 5px;">
                            <h3 class="c-white mt-2">ST. JUDE COLLEGE OF BULACAN</h3>
                            <p class="lead text-center text-light">84 Ignacio St.,
                                Sta. Ines, Plaridel, Bulacan
                    </h3>
                </div>
                </h3>
            </div>
        </div>
    </div>

    <section id="schoolProfile" class="div_background_light">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-8 col-md-6 mb-3">
                    <div class="text-dark">
                        <h3 class="display-6 fw-bold text-success"> About SJCB</h3>
                    </div>
                    <div class="text-primary" style="text-indent:10%">

                        <p class="text-justify c-white">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to
                            make a type specimen book. It has survived not only five centuries, but
                            also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <!--Horizontal image only-->
                        <img src="asset/slideshow/slide1.jpg" class=" w-100 py-3" alt="History Image">
                    </div>
                    <div class="text-primary" style="text-indent:10%">
                        <p class="text-justify c-white">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to
                            make a type specimen book. It has survived not only five centuries, but
                            also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="text-dark div_background_dark rounded" style="margin-left:">
                        <h3 class="display-6  text-center c-white"> Content</h3>
                        <div class="border-top border-bottom border-3 border-success py-3 ">
                            <div class="text-center">
                                <a href="#schoolProfile" class="text-decoration-none">
                                    <h5 class="c-green">School Profile</h5>
                                    <hr class="paddingx-5">
                                </a>
                                <a href="#vmgo" class="text-decoration-none">
                                    <h5 class="c-green">Vision, Mission & Goal</h5>
                                    <hr class="paddingx-5">
                                </a>
                                <a href="#hymm" class="text-decoration-none">
                                    <h5 class="c-green">Hymm</h5>
                                    <hr class="paddingx-5">
                                </a>
                                <a href="#executives" class="text-decoration-none">
                                    <h5 class="c-green">Faculty Staff</h5>
                                    <hr class="paddingx-5">
                                </a>
                                <a href="#aboutus" class="text-decoration-none">
                                    <h5 class="c-green">Contact Information</h5>
                                    <hr class="paddingx-5">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--VMGO-->
            <section id="vmgo" class="mt-5 " style="background-color:#162739">
                <div class="container-lg " style="border-top: 3px solid #00a841; border-bottom: 3px solid #00a841">
                    <div class="text-center mt-5">
                        <h2 class=" text-white ">VISION - MISSION - GOALS</h2>
                        <p class="lead text-muted">Feel free to update St. Jude College Bulacan
                        </p>
                    </div>
                    <div class="row my-5 align-items-center justify-content-center">
                        <!--VISION -->
                        <div class="div_outline col-md-10 rounded-3 shadow bg-dark mb-5">
                            <div class="row py-3">
                                <div class="col-6 px-4">
                                    <h3 class="display-4 text-white ms-5 "><span
                                            class="fw-bold text-success">V</span>ision</span>
                                    </h3>
                                </div>
                                <div>
                                    <p class="ms-2 text-white justify-content-center alight-items-start px-3">
                                        <?php echo $rowvmphilo['Vision']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!--MISSION -->

                        <div class="div_outline col-md-10 rounded-3 shadow bg-dark mb-5">

                            <div class="row py-3">
                                <div class="col-6 px-4">
                                    <h3 class="display-4 text-white ms-5 "><span
                                            class="fw-bold text-success">M</span>ission</span>
                                    </h3>
                                </div>
                                <div>
                                    <p class="ms-2 text-white justify-content-center alight-items-start px-3">
                                        <?php echo $rowvmphilo['Mission']; ?>
                                    </p>
                                </div>
                            </div>

                        </div>


                        <!--GOALS -->

                        <div class="div_outline col-md-10 rounded-3 shadow bg-dark mb-3">
                            <div class="row py-3">
                                <div class="col-6 px-4">
                                    <h3 class="display-4 text-white  "><span
                                            class="fw-bold text-success">PH</span>ilosophy</span>
                                    </h3>
                                </div>
                                <div>
                                    <p class="ms-2 text-white justify-content-center alight-items-start px-3">
                                        <?php echo $rowvmphilo['Philosophy']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!---------->
            <section id="hymm" class="mt-5 ">
                <div class="container-lg mb-5 " style="border-top: 3px solid #00a841; border-bottom: 3px solid #00a841">
                    <div class="text-center mt-5">
                        <h2 class=" text-success display-6 fw-bold ">SJCB HYMM</h2>
                        <p class="lead text-muted">Music by: Horace M. Estrella | Arr. Orch by: Rouby G. Centeno </p>
                        <p class="lead text-muted">Vocal Artist by: Carlota Mae R.  | Lyrics by: Pearl Sunshine M.Valderama </p>
                  
                    </div>
                    <div class="text-primary" >

                        <p class="text-justify text-center c-white ">
                           <span class="fw-bold text-success "> Lyrics: </span><br>
                            Dearest St.Jude College of Bulacan<br>
                            Serving the people, servong everyone<br>
                            With your benevolent advocacy<br>
                            while still giving the highest quality.<br>
                            Your mission and vision will always strive<br>
                            As it loudly speaks that God is Alive.<br>
                            Your teaching will be torch in our way.<br>
                            In our mind and heart, your value will stay.<br>
                            <br><br>
                            Beloved SJCB, we are proud!<br>
                            We will rise, shine, and stand among the crowd.<br>
                            SJCB we will always possess.<br>
                            Your values, wisdom and well-known prowess<br>
                            Restoring the faith in humanity<br>
                            and building a better community<br>
                            <br><br>
                            We are the SJCB family!<br>
                            Beloved SJCB, we are proud!<br>
                            We will rise, shine, and stand among the crowd.<br>
                            SJCB we will always possess.<br>
                            Your values, wisdom and well-known prowess<br>
                            Restoring the faith in humanity<br>
                            and building a better community<br>
                            <br><br>
                            We are the SJCB family! (2x)<br>
                            Alma mater you are one of a kind!<br>
                            You are rare gem that is hard to find.<br>
                            SJCB Icons are truly blessed.<br>
                            We are ready to soar and be the best!
                        </p>

                    </div>

                </div>
            </section>
            <!---------->
            <section id="executives" class="div_background_light py-4">
                <div class="container ">
                    <div class=" col-lg-12 col-md-12">
                        <div class="justify-content-center row col-md-12 rounded-3">
                            <h3 class="col-12 display-6 fw-bold text-success text-center rounded-3 c-white text-uppercase">Executive
                                Officials</h3>
                            <!--news-->
                            <?php while( $rowexecutive =  mysqli_fetch_array($resultexecutive)){ ?>
                            <div class="col-md-6 col-lg-4 div_background_dark rounded div_outline mt-3">

                                <img src="asset/executives/<?php echo $rowexecutive['Executive_filename']; ?>"
                                    class="card-img-top mt-3 " style="height:250px; width:100%;">
                                <div class="d-flex flex-column">
                                    <h5 class="display-6 text-center text-white pt-3">
                                        <?php echo $rowexecutive['First_Name']." ". $rowexecutive['Middle_Name']." ". $rowexecutive['Last_Name']; ?>
                                    </h5>
                                    <p class="text-white"><?php echo $rowexecutive['Executive_Paragraph'];?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

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
        <!--Blue - #162739 Green- #00a841-->
</body>

</html>