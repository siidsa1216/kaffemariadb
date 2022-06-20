<?php
 require 'condb.php';

$ingredient_name="";
$ingredient_description="";
$ingredient_price="";
$ingredient_expiry="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ingredient_name=$_POST["ingredient_name"];
    $ingredient_description=$_POST["ingredient_description"];
    $ingredient_price=$_POST["ingredient_price"];
    $ingredient_expiry=$_POST["ingredient_expiry"];
    
    do {
        if(empty($ingredient_name) || empty($ingredient_description) || empty($ingredient_price) || empty($ingredient_expiry)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new ingredient into the db
        $sql = "INSERT INTO ingredient (ingredient_name,ingredient_description,ingredient_price,ingredient_expiry)".
                "VALUES('$ingredient_name','$ingredient_description','$ingredient_price', '$ingredient_expiry')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $ingredient_name="";
        $ingredient_description="";
        $ingredient_price="";
        $ingredient_expiry="";

        $successMessage = "Ingredient added successfully!";
        
        header("location:/kaffemariadb/inventory.php");
        exit;

    }while(false);
}
?>