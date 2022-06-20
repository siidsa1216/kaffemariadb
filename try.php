<?php
session_start();

$con = mysqli_connect("localhost","root","","kaffemariadb");

if(isset($_POST['submit'])){
    $beverage_size = $_POST['beverage_size'];
    $beverage_qty = $_POST['beverage_qty'];
    $payment_method = $_POST['payment_method'];

    $query = "INSERT INTO sales (beverage_size,beverage_qty,payment_method) VALUES ('$beverage_size','$beverage_qty','$payment_method')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: pos-hotcoffee.php");
    }
    else{
        $_SESSION['status'] = "Not Inserted Successfully";
        header("Location: pos-hotcoffee.php");
    }
}