<?php
 require 'condb.php';
 include 'include/head.html';
 
$supplier_fname="";
$supplier_mname="";
$supplier_lname="";
$supplier_ContactNo="";
$supplier_address="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $supplier_fname=$_POST["supplier_fname"];
    $supplier_mname=$_POST["supplier_mname"];
    $supplier_lname=$_POST["supplier_lname"];
    $supplier_ContactNo=$_POST["supplier_ContactNo"];
    $supplier_address=$_POST["supplier_address"];
    
    do {
        if(empty($supplier_fname) || empty($supplier_lname) || empty($supplier_ContactNo) || empty($supplier_address)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new client into the db
        $sql = "INSERT INTO supplier (supplier_fname,supplier_mname,supplier_lname,supplier_ContactNo,supplier_address)".
                "VALUES('$supplier_fname', '$supplier_mname','$supplier_lname','$supplier_ContactNo', '$supplier_address')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $supplier_fname="";
        $supplier_mname="";
        $supplier_lname="";
        $supplier_ContactNo="";
        $supplier_address="";
        
        $successMessage = "Supplier added successfully!";
       

    }while(false);
}
?>
