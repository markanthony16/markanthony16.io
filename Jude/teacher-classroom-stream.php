<?php
session_start();
require('php/db-connection.php');

    if(isset($_GET['id'])){
        $subjectsectionid = $_GET['id'];
        $_SESSION['subjectsectionid'] = $_GET['id'];
        $querysubjectsection = "SELECT * FROM subject_section WHERE Subject_section_id=$subjectsectionid"; 
        $resultsubjectsection = mysqli_query($db_section, $querysubjectsection);
        $rowsubjectsection =  mysqli_fetch_array($resultsubjectsection);
    }

    $teacherid = $_SESSION['Teacher_id'];

    $queryannouncement = "SELECT * FROM material WHERE Subject_section_id='$subjectsectionid' ORDER BY Dates DESC";
    $resultannouncement = mysqli_query($db_classroom, $queryannouncement);

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
                    <a class="nav-link active c-white bg_nav_menu rounded" aria-current="page" href="#">Classroom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="teacher-portal.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="col-md-12 div_background_light rounded div_outline">
                    <!--Title-->
                    <div class="py-2">
                        <h4 class="c-white" style="text-align: center;">Classroom</h4>
                    </div>
                    <!--Link-->
                    <nav class="nav flex-column">
                        <a class="nav-link c-white bg_nav_menu" href="#">Stream</a>
                        <a class="nav-link c-white" href="teacher-classroom-classwork.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Classwork</a>
                        <a class="nav-link c-white" href="teacher-classroom-student.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Student</a>
                        <a class="nav-link c-white" href="teacher-classroom-mark.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Mark</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="bg-white rounded div_outline mb-5">
                            <h4 class="div_background_light rounded-top px-3 py-2  c-white"
                                style="text-align:center;"><?php echo $rowsubjectsection['Subjects']." : ".$rowsubjectsection['Grade_level']." - ".$rowsubjectsection['Section']; ?></h4>
                        <div class="mt-3 mx-3 mb-3">
                            <form class="row" action="php/material.php" method="post" enctype="multipart/form-data">
                                <div class="col-9 col-md-10">
                                    <div class="input-group flex-nowrap mb-2">
                                        <span class="input-group-text" id="addon-wrapping">Subject</span>
                                        <input type="text" name="subject" required class="form-control"
                                            placeholder="Annoucement Title" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                    <script>
                                    function textAreaAdjust(element) {
                                        element.style.height = "1px";
                                        element.style.height = (25 + element.scrollHeight) + "px";
                                    }
                                    </script>
                                    <textarea onkeyup="textAreaAdjust(this)"
                                        class="overflow-hidden form-control form-control-sm" name="messages" required
                                        placeholder="Write something to post"></textarea>
                                    <hr style="color:green; height:3px">
                                    <div id="fileuploadmaterial">
                                        <input class=" form-control form-control-sm mb-2" type="file" name="file[]">
                                    </div>
                                    <button class="btn btn-sm btn-primary mb-5" onclick="add_more_field_material()"
                                        type="button">Add more file</button>
                                </div>
                                <div class="col-3 col-md-2">
                                    <button class="btn btn-sm btn-success" type="submit"
                                        name="submitfromteacher">POST</button>
                                </div>
                            </form>

                            <div class="row overflow-auto" style="max-height:500px;">
                                <div class="">
                                    <h3 class="text-white text-center bg-dark rounded">
                                        Announcement
                                    </h3>
                                    <?php while($rowannouncement = mysqli_fetch_array($resultannouncement)){ ?>
                                    <div class="mb-4 rounded" style="background-color:#f2f2f2;">
                                        <div class="border border-dark p-2 rounded-top">
                                            <div class="row">
                                                <h6 class="col-6"><?php echo ucwords($rowannouncement['Author']); ?>
                                                </h6>
                                                <h6 class="mb-4 col-6 text-end"><?php echo $rowannouncement['Dates']; ?>
                                                    <a class="btn btn-danger px-1 py-0"
                                                        href="php/material.php?idfromteacher=<?php echo $rowannouncement['Annoucement_id']; ?>">X</a>
                                                </h6>
                                            </div>
                                            <h5 class="text-center"><?php echo ucwords($rowannouncement['Title']); ?>
                                            </h5>
                                            <p><?php echo $rowannouncement['Messages']; ?></p>
                                            <div class="row">
                                                <?php 
                                                $annoucement_id = $rowannouncement['Annoucement_id'];
                                                $queryannoucementfile = "SELECT * FROM annoucement_file WHERE Announcement_id='$annoucement_id'"; 
                                                $resultannoucementfile = mysqli_query($db_classroom, $queryannoucementfile);
                                                
                                                ?>
                                                <?php while($rowannoucementfile = mysqli_fetch_array($resultannoucementfile)){ ?>
                                                <div class="col-6">
                                                    <div
                                                        class="row border border-dark py-0 mb-3 mx-1 shadow-sm rounded">
                                                        <img class="col-4 mt-2" src="asset/attachment.png"
                                                            style="max-height:60px; max-width:60px;">
                                                        <p class="col-8 mt-2 overflow-hidden"
                                                            style="line-height:17px;text-overflow: ellipsis;">
                                                            <?php echo $rowannoucementfile['Filenames']; ?><br>size: <?php echo filesize($rowannoucementfile['Filedir'])." bytes"; ?><br><a href="<?php echo $rowannoucementfile['Filedir']; ?>"
                                                                target="_blank">Download</a></p>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                        //Showing the Comment Here
                                        $materialid = $rowannouncement['Annoucement_id'];
                                        $comments = "SELECT * FROM comments_annoucement WHERE Material_id='$materialid' ORDER BY Dates ASC";
                                        $resultcomments = mysqli_query($db_classroom, $comments);
                                        ?>
                                        <div class="border-start border-end border-bottom border-dark p-2">
                                            <input class="btn btn-dark p-1" value="Show Comment" type="button"
                                                id="<?php echo $rowannouncement['Annoucement_id']; ?>"
                                                onclick="showDiv(this.id)" />

                                            <div class="" id="<?php echo $rowannouncement['Annoucement_id']; ?>con"
                                                style="display:none;">
                                                <?php while($rowcomments = mysqli_fetch_array($resultcomments)){ ?>
                                                <p><b><?php echo ucwords($rowcomments['Names']); ?></b>
                                                    (<?php echo $rowcomments['Dates']; ?>)
                                                    <a class="btn btn-danger py-0 px-1" type="button"
                                                        href="php/material-comments.php?delidfromteacher=<?php echo $rowcomments['Comment_id']; ?>">Delete</a>
                                                    <br><?php echo ucwords($rowcomments['Comments']); ?>
                                                </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div
                                            class="border-start border-end border-bottom border-dark rounded-bottom p-2">
                                            <form action="php/material-comments.php" method="Post">
                                                <div class="input-group flex-nowrap">
                                                    <input type="text" name="announcementid" hidden
                                                        value="<?php echo $rowannouncement['Annoucement_id']; ?>">
                                                    <textarea class="form-control" required
                                                        placeholder="Write a comment" name="comments"
                                                        rows="1"></textarea>
                                                    <button type="submit" name="sendfromteacher"
                                                        class="btn btn-success">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <script>
                                    function showDiv(clicked_id) {
                                        var x = document.getElementById(clicked_id + "con");
                                        if (x.style.display === "none") {
                                            x.style.display = "block";
                                            document.getElementById(clicked_id).value = "Hide Comment";
                                        } else {
                                            x.style.display = "none";
                                            document.getElementById(clicked_id).value = "Show Comment";
                                        }
                                    }
                                    </script>
                                </div>
                            </div>
                        </div>
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
    <script src="js/addmorefile.js"></script>
</body>

</html>