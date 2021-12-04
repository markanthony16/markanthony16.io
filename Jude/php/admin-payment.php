<?php
session_start();
require('db-connection.php');
    if(isset($_POST['update'])){
    $student_id = $_POST['student_id'];
    
    $user_payment = "SELECT * FROM tuition_payment WHERE Student_ID='$student_id'";
    $result_user_payment = mysqli_query($db_payment, $user_payment);
    $row_user_payment = mysqli_fetch_assoc($result_user_payment);

    $promo = $_POST['promo'];
    $states = $_POST['states'];

    $downpayment = (int)$row_user_payment['Down_payment'];
    $total_payment = (int)$_POST['total'];
    $balance = (int)$row_user_payment['Balance'];
    $installment = (int)$_POST['addpayment'];

    //computation of payment
    $downpayment = $downpayment + $installment;
    $balance = $total_payment - $downpayment;

    $sql_payment = "UPDATE tuition_payment SET Balance='$balance',Down_payment='$downpayment',Total_tuition='$total_payment',Promo='$promo',States='$states' WHERE Student_ID='$student_id'";

    if (mysqli_query($db_payment, $sql_payment)) {
        $_SESSION['payment_success'] = "You have Sucessfully updated the Payment table";
        header('location: ../admin-transaction.php');
    } 
    else {
        header('location: ../admin-transaction.php');
    }
}
?>