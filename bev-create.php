<?php
 require 'condb.php';
 
 $beverage_No="";
 $beverage_name="";
 $beverage_qty="";
 $beverage_size="";
 $beverage_price="";
 $payment_method="";
 

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $beverage_name=$_POST["beverage_name"];
    $beverage_qty=$_POST["beverage_qty"];
    $beverage_size=$_POST["beverage_size"];
    $beverage_price=$_POST["beverage_price"];
    $payment_method=$_POST["payment_method"];

    
    do {
        if(empty($beverage_name) || empty($beverage_qty) || empty($beverage_size) || empty($beverage_price) || empty($payment_method)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new client into the db
        mysqli_query($connection, "INSERT INTO beverage VALUES(NULL, '$beverage_name', '$beverage_qty','$beverage_size','$beverage_price', '$payment_method')");
        
        $count=0;
        $sql=mysqli_query($connection, "SELECT * FROM stock_master WHERE product_name='$beverage_name' && product_size='$beverage_size' ");
        $count=mysqli_num_rows($sql);

        if($count==0){
            mysqli_query($connection, "INSERT INTO stock_master VALUES(NULL, '$beverage_name', '$beverage_size', '$beverage_qty', '0')") or die(mysqli_error($connection));
        }
        else{
            mysqli_query($connection, "UPDATE stock_master SET product_qty=product_qty+$beverage_qty WHERE product_name='$beverage_name' && product_size='$beverage_size' ") or die(mysqli_error($connection));
        }

        $beverage_No="";
        $beverage_name="";
        $beverage_qty="";
        $beverage_size="";
        $beverage_price="";
        $payment_method="";
        
        
    }while(false);
}
?>



