<?php

require("php/db-connection.php");
//call all slideshow
$queryslide = "SELECT * FROM slide_show"; //You don't need a ; like you do in SQL
$resultslide = mysqli_query($db_content, $queryslide);

//call all news and announcement
$querynews = "SELECT * FROM news"; //You don't need a ; like you do in SQL
$resultnews = mysqli_query($db_content, $querynews);

//call all video
$queryvideo = "SELECT * FROM video"; //You don't need a ; like you do in SQL
$resultvideo = mysqli_query($db_content, $queryvideo);

 //call all executive official
 $queryexecutive = "SELECT * FROM executive"; //You don't need a ; like you do in SQL
 $resultexecutive = mysqli_query($db_content, $queryexecutive);

 //call Vision, Mission, Philosophy
 $queryvmphilo = "SELECT * FROM vmphilo"; //You don't need a ; like you do in SQL
 $resultvmphilo = mysqli_query($db_content, $queryvmphilo);


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
    .custom-file-upload {
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        text-align: center;
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
                    <a class="nav-link c-green" href="admin-transaction.php">Transaction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="sj-admin.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-xl-fluid">
        <div class="div_background_light px-3">
            <h4 class="text-center c-white py-3">SlideShow</h4>
            <form action="php/slideshow.php" method="post" class="row gap-2 justify-content-center"
                enctype="multipart/form-data">
                <input class="col-md-4" name="title" type="text" placeholder="Slideshow Title" required>
                <textarea class="col-md-4" name="paragraph" placeholder="Slides Paragraph" required></textarea>
                <label for="upload-slides" class="col-md-3 custom-file-upload bg-white fw-bold c-dark">Upload
                    Photo</label>
                <input class="col-md-3 c-white" name="photo" id="upload-slides" type="file" hidden required>
                <button type="submit" name="slideshow" class="btn btn-outline-success"
                    style="max-width:450px;">Add</button>
            </form>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark c-white">
                        <th>Slideshow ID</th>
                        <th>Title</th>
                        <th>Paragraph.</th>
                        <th>Delete</th>
                    </thead>
                    <?php while($rowslide =  mysqli_fetch_array($resultslide)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo $rowslide['Slide_show_ID']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowslide['Slide_show_title']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowslide['Slide_show_paragraph']; ?></td>
                        <td class="c-red"><a
                                href="php/slideshow.php?id=<?php echo $rowslide['Slide_show_ID']; ?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete"></a></td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="div_background_dark px-3">
            <h4 class="text-center c-white py-3">News and Announcement</h4>
            <form action="php/news-process.php" method="post" enctype="multipart/form-data"
                class="row gap-2 justify-content-center">
                <input name="title" class="col-md-4" type="text" placeholder="News Title" required>
                <input name="subtitle" class="col-md-4" type="text" placeholder="News Subtitle" required>
                <input name="author" class="col-md-3" type="text" placeholder="Author" required>
                <input name="date" class="col-md-5" type="date" placeholder="Date Publish" required>
                <label for="upload-news" class="col-md-5 custom-file-upload bg-white fw-bold c-dark">Upload
                    NewsPhoto</label>
                <input name="photo" class="col-md-6 c-white" id="upload-news" type="file" hidden required>
                <textarea name="paragraph" style="height:250px;" required class="col-md-10"
                    placeholder="News Paragraph"></textarea>

                <button type="submit" name="news" class="btn btn-outline-success" style="max-width:450px;">Add</button>
            </form>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark c-white">
                        <th>News ID</th>
                        <th>Title</th>
                        <th>Subtitle.</th>
                        <th>Paragraph</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Delete</th>
                    </thead>
                    <?php while($rownews =  mysqli_fetch_array($resultnews)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_ID']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_title']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_subtitle']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_Paragraph']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_date']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rownews['News_author']; ?></td>
                        <td class="c-red"><a href="php/news-process.php?id=<?php echo $rownews['News_ID'];?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete"></a></td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="div_background_light px-3">
            <h4 class="text-center c-white py-3">Video Collection</h4>
            <form action="php/video-process.php" method="post" class="row gap-2 justify-content-center"
                enctype="multipart/form-data">
                <input name="videotitle" class="col-md-4" type="text" placeholder="Video Title" required>
                <input name="videolink" class="col-md-4" type="text" placeholder="Video Link" required>
                <label for="upload-thumb" class="col-md-3 custom-file-upload bg-white fw-bold c-dark">Upload
                    Thumbnail</label>
                <input name="photo" class="col-md-3 c-white" id="upload-thumb" type="file" hidden required>
                <button type="submit" name="video" class="btn btn-outline-success" style="max-width:450px;">Add</button>
            </form>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <form action="">
                    <table class="table">
                        <thead class="table-dark c-white">
                            <th>Video ID</th>
                            <th>Video Title</th>
                            <th>Video Link</th>
                            <th>Delete</th>
                        </thead>
                        <?php while($rowvideo =  mysqli_fetch_array($resultvideo)){ ?>
                        <tbody>
                            <td class="text-nowrap c-white"><?php echo $rowvideo['Video_ID']; ?></td>
                            <td class="text-nowrap c-white"><?php echo $rowvideo['Video_title']; ?></td>
                            <td class="text-nowrap c-white"><?php echo $rowvideo['Video_link']; ?></td>
                            <td class="c-red"><a class="btn btn-outline-danger"
                                    href="php/video-process.php?id=<?php echo $rowvideo['Video_ID']; ?>">Delete</a></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>

        <div class="div_background_dark px-3 pb-4">
            <h4 class="text-center c-white py-3">Calendar of Activity</h4>
            <form action="php/calendar.php" method="post" class="row gap-2 justify-content-center"
                enctype="multipart/form-data">
                <label for="upload-calendar" class="col-md-6 custom-file-upload bg-white fw-bold c-dark">Upload Calendar
                    of Activity</label>
                <input class=" c-white" name="photo" id="upload-calendar" type="file" hidden required>
                <button type="submit" name="calendar" class="col-md-6 btn btn-outline-success"
                    style="max-width:450px;">Add</button>
            </form>
        </div>

        <!-------VMGO-------->

        <div class="div_background_light px-3 pb-4">
            <h4 class="text-center c-white py-3">Edit the V-M-GO</h4>

            <form action="php/vmphilo-process.php" method="post" enctype="multipart/form-data"
                class="row gap-2 justify-content-center">

                <textarea name="vision" style="height:250px;" class="col-md-3"
                    placeholder="Vision of the SJCB"></textarea>

                <textarea name="mission" style="height:250px;" class="col-md-3"
                    placeholder="Mission of the SJCB"></textarea>

                <textarea name="philosophy" style="height:250px;" class="col-md-3"
                    placeholder="Philosophy of the SJCB"></textarea>

                <button type="submit" name="vmphilo" class="btn btn-outline-success"
                    style="max-width:450px;">Add</button>
            </form>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark c-white">
                        <th>ID</th>
                        <th>VISION</th>
                        <th>MISION</th>
                        <th>PHILOSOPHY</th>
                    </thead>
                    <?php while( $rowvmphilo =  mysqli_fetch_array($resultvmphilo)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo  $rowvmphilo['Vmphilo_ID']; ?></td>
                        <td class="text-wrap c-white"><?php echo  $rowvmphilo['Vision']; ?></td>
                        <td class="text-wrap c-white"><?php echo  $rowvmphilo['Mission']; ?></td>
                        <td class="text-nowrap c-white"><?php echo  $rowvmphilo['Philosophy']; ?></td>
                        <td class="c-red">
                            <a
                                href="php/vmphilo-process.php?id=<?php echo  $rowvmphilo['Vmphilo_ID'];?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete" name="delete">
                            </a>
                        </td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>

        </div>





        <!------Executive--------->

        <div class="div_background_dark px-3 pb-4">
            <h4 class="text-center c-white py-3">Add New Executive Officials</h4>

            <form action="php/executive-official-process.php" method="post" enctype="multipart/form-data"
                class="row gap-2 justify-content-center">
                <input name="fname" class="col-md-4" type="text" placeholder="First Name" required>
                <input name="mname" class="col-md-4" type="text" placeholder="Middle Name" required>
                <input name="lname" class="col-md-3" type="text" placeholder="Last Name" required>
                <label for="upload-executive" class="col-md-5 custom-file-upload bg-white fw-bold c-dark">Upload
                    New Photo</label>
                <input name="photo" class="col-md-6 c-white" id="upload-executive" required type="file" hidden>
                <textarea name="paragraph" style="height:250px;" class="col-md-10"
                    placeholder="Person's Information"></textarea>

                <button type="submit" name="executives" class="btn btn-outline-success"
                    style="max-width:450px;">Add</button>
            </form>
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table">
                    <thead class="table-dark c-white">
                        <th>Officials ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Paragraph</th>
                        <th></th>

                    </thead>
                    <?php while( $rowexecutive =  mysqli_fetch_array($resultexecutive)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo  $rowexecutive['Executive_ID']; ?></td>
                        <td class="text-nowrap c-white"><?php echo  $rowexecutive['First_Name']; ?></td>
                        <td class="text-nowrap c-white"><?php echo  $rowexecutive['Middle_Name']; ?></td>
                        <td class="text-nowrap c-white"><?php echo  $rowexecutive['Last_Name']; ?></td>
                        <td class="text-nowrap c-white"><?php echo  $rowexecutive['Executive_Paragraph']; ?>
                        </td>
                        <td class="c-red">
                            <a
                                href="php/executive-official-process.php?id=<?php echo  $rowexecutive['Executive_ID'];?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete" name="delete">
                            </a>
                        </td>
                    </tbody>
                    <?php } ?>
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