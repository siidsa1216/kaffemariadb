<?php
 require 'condb.php';
 
 $beverage_No="";
 $beverage_flavor="";
 $beverage_qty="";
 $beverage_size="";
 $beverage_price="";
 $payment_method="";
 

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $beverage_flavor=$_POST["beverage_flavor"];
    $beverage_qty=$_POST["beverage_qty"];
    $beverage_size=$_POST["beverage_size"];
    $beverage_price=$_POST["beverage_price"];
    $payment_method=$_POST["payment_method"];

    
    do {
        if(empty($beverage_flavor) || empty($beverage_qty) || empty($beverage_size) || empty($beverage_price) || empty($payment_method)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new client into the db
        $sql = "INSERT INTO beverage (beverage_flavor,beverage_qty,beverage_size,beverage_price,payment_method)".
                "VALUES('$beverage_flavor', '$beverage_qty','$beverage_size','$beverage_price', '$payment_method')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

      
        $beverage_No="";
        $beverage_flavor="";
        $beverage_qty="";
        $beverage_size="";
        $beverage_price="";
        $payment_method="";
        
        $successMessage = "Supplier added successfully!";
        
        header("location:/kaffemariadb/bev.php");
        exit;

    }while(false);
}
?>


