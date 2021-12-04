<?php
session_start();
require('php/db-connection.php');
if(isset($_GET['actid'])){
    $activity_id = $_GET['actid'];
    $_SESSION['activity_id'] = $activity_id;
    $queryactivity = "SELECT * FROM classwork WHERE Classwork_id='$activity_id'"; 
    $resultactivity = mysqli_query($db_classroom, $queryactivity);
    $rowactivity =  mysqli_fetch_array($resultactivity);
    $activitytype = $rowactivity['Classwork_type'];
}
$student_id = $_SESSION['student_id'];
$queryclasswork = "SELECT * FROM classwork_file WHERE Classwork_id='$activity_id'"; 
$resultclasswork = mysqli_query($db_classroom, $queryclasswork);

$querysubmissiondetail = "SELECT * FROM classwork_submission WHERE Classwork_id='$activity_id' AND Student_id='$student_id'"; 
$resultsubmissiondetail = mysqli_query($db_classroom, $querysubmissiondetail);
$rowsubmissiondetail =  mysqli_fetch_array($resultsubmissiondetail);

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
                        href="student-material.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Material</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-white bg_nav_menu rounded"
                        href="student-classwork.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Classwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green"
                        href="student-portal-grade.php?id=<?php echo $_SESSION['subjectsectionid']; ?>">Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: yellow;" href="student-subject.php">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-red" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mt-3">
                <?php if($activitytype == "Ducuments"){ ?>
                <div class="mx-auto row bg-white rounded-3 div_outline">
                    <h4 class="div_background_light rounded-top c-white py-2 text-center">Your Task</h4>
                    <p class="text-end"><b>Due date:</b>
                        <?php echo date('M j', strtotime($rowactivity['Dates_close']))." - ".date('h:i a', strtotime($rowactivity['Time_close'])); ?>
                    </p>
                    <h5 class="text-center mt-2"><?php echo $rowactivity['Title']; ?></h5>
                    <p class="text-indent-2" style="text-indent: 50px;"><?php echo $rowactivity['Instructions']; ?></p>
                    <?php while($rowclasswork =  mysqli_fetch_array($resultclasswork)){ ?>
                    <div class="col-6">
                        <div class="row border border-dark py-0 mb-3 mx-1 shadow-sm rounded">
                            <img class="col-4 mt-2" src="asset/attachment.png" style="max-height:60px; max-width:60px;">
                            <p class="col-8 mt-2 overflow-hidden" style="line-height:17px;text-overflow: ellipsis;">
                                <?php echo $rowclasswork['Filenames']; ?><br>size:
                                <?php echo filesize($rowclasswork['Filedir'])." bytes"; ?><br><a
                                    href="<?php echo $rowclasswork['Filedir']; ?>" target="_blank">Download</a></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php }else{ ?>
                <div class=" bg-white rounded-3 row div_outline overflow-auto" style="height:700px;">
                    <h4 class="div_background_light rounded-top c-white py-2 text-center">Your Task</h4>
                    <p class="text-end"><b>Due date:</b>
                        <?php echo date('M j', strtotime($rowactivity['Dates_close']))." - ".date('h:i a', strtotime($rowactivity['Time_close'])); ?>
                    </p>
                    <h5 class="text-center mt-2"><?php echo $rowactivity['Title']; ?></h5>
                    <p class="text-indent-2" style="text-indent: 50px;"><?php echo $rowactivity['Instructions']; ?></p>
                    <div>
                        <iframe src="<?php echo $rowactivity['URLS']; ?>" class="mb-5" width="100%"
                            height="600px"></iframe>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!--end tag of container-->
            <!-- Task-->
            <div class="col-lg-4 mb-5 mt-3">
                <div class="bg-white rounded-3 div_outline">
                    <h4 class="text-center py-2 div_background_light c-white rounded-top"> SUBMISSION</h4>
                    <div class="mb-3 mx-4">
                        <h4 class="c-light fw-bold mb-5" style="text-align:center;">Attachment</h4>
                        <?php if(mysqli_num_rows($resultsubmissiondetail)!=0){ ?>
                        <p>Score: <?php echo $rowsubmissiondetail['Scores']; ?></p>
                        <?php if($rowsubmissiondetail['Filedir'] != "asset/upload_class_assignment_file/"){ ?>
                        <p>Attachment: <a href="<?php echo $rowsubmissiondetail['Filedir']; ?>" target="_blank">Download
                                your file</a></p>
                        <?php } ?>
                        <?php } ?>
                        <form action="php/upload_class_assignment.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mt-3">
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="input-group mt-3">
                                <textarea style="width:100%;" name="messages"
                                    placeholder="Write private comments..."></textarea>
                            </div>
                            <div class="d-grid">
                                <?php if(mysqli_num_rows($resultsubmissiondetail)==0){ ?>
                                <button class="btn btn-success mt-3 mx-auto" name="submit" type="submit"
                                    style="width:90%;">Submit</button>
                                <?php }else{ ?>
                                    <a href="php/upload_class_assignment.php?removeid=<?php echo $rowsubmissiondetail['Classwork_submission_id']; ?>" style="width:90%;" class="btn btn-danger mt-3 mx-auto">Unsubmit</a>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Container of Materials-->

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>