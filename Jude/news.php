<?php 
    require("php/db-connection.php");
        $id = $_GET['id'];

        //call all news and announcement
        $querynews = "SELECT * FROM news WHERE News_ID = $id"; //You don't need a ; like you do in SQL
        $resultnews = mysqli_query($db_content, $querynews);

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
                    <a class="nav-link c-green" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <section id="#home">
        <div class="container-fluid">
            <div class="row">
                <?php while($rownews =  mysqli_fetch_array($resultnews)){ ?>
                <div class="col-lg-12 col-md-12 px-0 div_background_light">
                    <section id="news-image">
                        <img src="asset/news/<?php echo $rownews['News_filename']; ?>" class="d-block w-100" style="width:100%;">
                    </section>

                    <div class="container">
                        <div class="news-headings">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-primary mt-5 text-uppercase"><?php echo $rownews['News_date']; ?></p>
                                    <h1 class="text-center c-green display-6 fw-bold"
                                        style="color: ; text-shadow: 2px 1px 0px pink"><?php echo $rownews['News_title']; ?></h1>
                                    <h3 class="text-center text- pb-4" style="color: white"><?php echo $rownews['News_subtitle']; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="news-info">
                            <p class="text-muted">
                                <span class="text-light fw-bold" style="font-size: 20px">By:</span> <span class=" text-light"
                                    style="font-size: 20px"><?php echo $rownews['News_author']; ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="news-body">
                                    <p class="c-white mb-3 " style="font-size: 20px"><?php echo $rownews['News_Paragraph']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
                <div>
                    <button class="fixed-bottom rounded bg-yellow ms-4 mb-4" style="width:50px;height:50px;"
                        onclick="topFunction()" id="myBtn" data-title="Top">
                        <i class="fas fa-angle-double-up c-dark"></i>
                    </button>
                </div>

        </footer>
    </div>




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

    </script>
    <script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 80) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
    </script>
</body>

</html>