<?php
session_start();
    if(isset($_SESSION['applychanges'])){
        $applychanges = $_SESSION['applychanges'];
        unset($_SESSION['applychanges']);
    }
    else{
        $applychanges="";
    }

    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    else{
        $error="";
    }

    require('php/db-connection.php');

  if(isset($_SESSION['student_id'])){
      $student_id = $_SESSION['student_id'];

      $query = "SELECT * FROM registered_student WHERE Student_Number = $student_id";
      $result = mysqli_query($db_student, $query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(empty($row['Profile_picture_dir'])){
        $profiledir = "asset/profile_picture/default.jpg";
      }
      else{
        $profiledir = "asset/profile_picture/". $row['Profile_picture_dir'];
      }
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

    <style>
    .custom-file-upload {
        display: inline-block;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 1rem;
        text-align: center;
        width: 80%;
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
                    <a class="nav-link c-white bg_nav_menu rounded" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-subject-advising.php">Advising</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="student-subject.php">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green" href="php/logout-process.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="col-md-12 div_background_light div_outline rounded mb-5">
                    <h4 class="c-white py-3" style="text-align:center;">- Profile -</h4>
                    <img src="<?php echo $profiledir; ?>"
                        class="rounded-circle mx-auto d-block my-5" style="height:200px; width:200px" alt="...">
                    <form action="php/upload-profile-picture-process.php" method="post" enctype="multipart/form-data">
                        <div class="d-grid gap-2">
                            <input name="profilepicture" type="file" id="upload" hidden />
                            <label for="upload" class="custom-file-upload mx-auto div_background_dark c-white fw-bold">Upload
                                Photo</label>
                        </div>

                        <h3 class="c-green text-capitalize" style="text-align:center;">
                            <?php echo $row['First_name']." ".$row['Last_name']; ?></h3>
                        <h4 class="c-white" style="text-align:center;"><?php echo $row['Email_address']; ?></h4>
                        <h4 class="c-white mb-3" style="text-align:center;"><?php echo $row['Contact_number']; ?></h4>
                        
                        <div class="text-center mb-5 py-3">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12 bg-white div_outline rounded">
                    <h4 class="bg-green c-yellow py-2" style="text-align:center;">Student Information</h4>
                    <!--Success Message-->
                    <?php if($applychanges!=""){?>
                    <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert"
                        style="width: 90%;">
                        <strong>Apply Changes Successfully!</strong> <?php echo $applychanges; ?>.
                    </div>
                    <?php } ?>
                    <!--error Message-->
                    <?php if($error!=""){?>
                    <div class="alert alert-warning alert-dismissible fade show mt-3 mx-auto" role="alert"
                        style="width: 90%;">
                        <strong>Error!</strong> <?php echo $error; ?>.
                    </div>
                    <?php } ?>
                    <form action="php/student-profile-edit-process.php" method="post">
                        <div class="row mx-auto py-3" style="width:95%;">
                            <input class="col-4 mb-3" name="firstname" type="text" placeholder="First Name"
                                value="<?php echo $row['First_name']; ?>" required>
                            <input class="col-4 mb-3" name="middlename" type="text" placeholder="Middle Name"
                                value="<?php echo $row['Middle_name']; ?>" required>
                            <input class="col-4 mb-3" name="lastname" type="text" placeholder="Last Name"
                                value="<?php echo $row['Last_name']; ?>" required>
                            <input class="col-4 mb-3" name="address" type="text" placeholder="Permanent Address"
                                value="<?php echo $row['Permanent_address']; ?>" required>
                            <input class="col-4 mb-3" name="birthday" type="text" placeholder="Birthday"
                                value="<?php echo $row['Birthday']; ?>" required>
                            <input class="col-4 mb-3" name="placeofbirth" type="text" placeholder="Place of Birth"
                                value="<?php echo $row['Place_of_birth']; ?>" required>
                            <select class="col-4 mb-3" name="sex" required>
                                <option value="">Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <input class="col-4 mb-3" name="religion" type="text" placeholder="Religion"
                                value="<?php echo $row['Religion']; ?>" required>
                            <input class="col-4 mb-3" name="nationality" type="text" placeholder="Nationality"
                                value="<?php echo $row['Nationality']; ?>" required>
                            <input class="col-4 mb-5" name="studentnumber" type="text"
                                value="<?php echo $row['Student_Number']; ?>" readonly>
                            <input class="col-4 mb-5" name="age" type="text" placeholder="Age"
                                value="<?php echo $row['Age']; ?>" required>
                            <input class="col-4 mb-5" name="phonenumber" type="text" placeholder="Phone"
                                value="<?php echo $row['Contact_number']; ?>" required>


                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" onclick="myFunction()"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Disable Credential
                                    Editing</label>
                            </div>
                            <!--Script of Disable button-->
                            <script>
                            function myFunction() {
                                var input = document.getElementById('myinput');
                                if (input.disabled == true) {
                                    document.querySelectorAll('#myinput').forEach(el => el.removeAttribute("disabled"));
                                } else {
                                    document.querySelectorAll('#myinput').forEach(el => el.setAttribute('disabled',
                                        true));
                                }


                            }
                            </script>

                            <input class="col-6 mb-3" id="myinput" name="email" type="text" placeholder="Email"
                                value="<?php echo $row['Email_address']; ?>" required>
                            <input class="col-6 mb-3" id="myinput" name="reemail" type="text"
                                placeholder="Re-type Email" value="" required>

                            <input class="col-4 mb-5" id="myinput" name="currentpassword" type="text"
                                placeholder="Current Password" value="" required>
                            <input class="col-4 mb-5" id="myinput" name="newpassword" type="text"
                                placeholder="New Password" value="" required>
                            <input class="col-4 mb-5" id="myinput" name="renewpassword" type="text"
                                placeholder="New Password" value="" required>

                            <input class="col-4 mb-3" name="guardianfirstname" type="text"
                                placeholder="Guardian Firstname" value="<?php echo $row['Guardian_first_name']; ?>"
                                required>
                            <input class="col-4 mb-3" name="guardianmiddlename" type="text"
                                placeholder="Guardian Middlename" value="<?php echo $row['Guardian_middle_name']; ?>"
                                required>
                            <input class="col-4 mb-3" name="guardianlastname" type="text"
                                placeholder="Guardian Lastname" value="<?php echo $row['Guardian_last_name']; ?>"
                                required>
                            <input class="col-4 mb-3" name="guardianemail" type="text" placeholder="Guardian Email"
                                value="<?php echo $row['Guardian_email_address']; ?>" required>
                            <input class="col-4 mb-3" name="guardiannumber" type="text" placeholder="Guardian Phone"
                                value="<?php echo $row['Guardian_contact_number']; ?>" required>
                            <input class="col-4 mb-3" name="relationshiptoguardian" type="text"
                                placeholder="Relationship to Guardian"
                                value="<?php echo $row['Relationship_to_guardian']; ?>" required>
                            <button class="btn btn-success" type="submit" name="applychanges">Apply Changes</button>
                        </div>
                    </form>
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