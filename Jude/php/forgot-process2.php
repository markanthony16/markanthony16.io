<?php
session_start();
session_destroy();
session_start();

    if(isset($_GET['passwordchange'])){
        
        $_SESSION['emailchangepass'] = $_GET['email'];
        header("location: ../newpassword.php");
    }

?>