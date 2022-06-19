<?php
 require 'condb.php';
 include 'include/head.html';
 
$item_name="";
$item_qty="";
$item_size="";
$item_description="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $item_name=$_POST["item_name"];
    $item_qty=$_POST["item_qty"];
    $item_size=$_POST["item_size"];
    $item_description=$_POST["item_description"];
    
    do {
        if(empty($item_name) || empty($item_qty) || empty($item_size) || empty($item_description)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new ingredient into the db
        $sql = "INSERT INTO item (item_name,item_qty,item_size,item_description)".
                "VALUES('$item_name','$item_qty', '$item_size','$item_description')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $item_name="";
        $item_qty="";
        $item_size="";
        $item_description="";

        $successMessage = "Item added successfully!";
        
        header("location:/kaffemariadb/inventory.php");
        exit;

    }while(false);
}
?>

</body>
</html>