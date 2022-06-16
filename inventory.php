<?php
require 'condb.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Login</title>
</head>

<body>
    <div class="topbar">
        <h1>logo</h1>
        <h1 style="margin-left:1250px;">profile</h1>

    </div>
    <div class="sidebar">
        <div class="buttonsss">
            <ul>
            <li><a href="/kaffemariadb/home1.html">HOME</a></li>
                <li><a href="/kaffemariadb/bev.php">BEVERAGE</a></li>
                <li><a href="/kaffemariadb/inventory.php">INVENTORY</a></li>
                <li><a href="/kaffemariadb/staff.php">STAFF</a></li>
                <li><a href="">POS</a></li>
                <li><a href="">SALES</a></li>
                <li><a href="/kaffemariadb/supplier.php">SUPPLIER</a></li>
                <li><a href="/kaffemariadb/logout.php">LOGOUT</a></li>

            </ul>
        </div>
    </div>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:66px;">
            <h1>Inventory Table</h1>
            <a class="btn btn-primary" href="/kaffemariadb/inventoryIngredient-create.php" role="button">Add Ingredient</a><br><br>
            <a class="btn btn-primary" href="/kaffemariadb/inventoryItem-create.php" role="button">Add Items</a>
    
        </div>
        <table class="table-ingredient" style="margin:66px;">
            <thead>
                <th>Ingredient ID</th>
                <th>Ingredient Name</th>
                <th>Ingredient Description</th>
                <th>Ingredient Price</th>
                <th>Ingredient Expiration Date</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="kaffemariadb"; //name y=of your db
    
                //create connection
                $connection = new mysqli($servername,  $username, $password, $database);
                
                if ($connection->connect_error){
                    die("connection failed: ". $$connection->connect_error);
                }
    
                //read all data inn the table
    
                $sql = "SELECT * FROM ingredient";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["ingredient_ID"]. "</td>
                    <td>".$row["ingredient_name"]. "</td>
                    <td>".$row["ingredient_description"]. "</td>
                    <td>".$row["ingredient_price"]. "</td>
                    <td>".$row["ingredient_expiry"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/inventoryIngredient-edit.php?ingredient_ID=$row[ingredient_ID]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/inventoryIngredient-delete.php?ingredient_ID=$row[ingredient_ID]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>

        <br><div>
        <table class="table-item" style="margin:66px;">
            <thead>
                <th>Item No.</th>
                <th>Item Name</th>
                <th>Item Quantity</th>
                <th>Item Size</th>
                <th>Item Descritpion</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="kaffemariadb"; //name y=of your db
    
                //create connection
                $connection = new mysqli($servername,  $username, $password, $database);
                
                if ($connection->connect_error){
                    die("connection failed: ". $$connection->connect_error);
                }
    
                //read all data inn the table
    
                $sql = "SELECT * FROM item";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["item_No"]. "</td>
                    <td>".$row["item_name"]. "</td>
                    <td>".$row["item_qty"]. "</td>
                    <td>".$row["item_size"]. "</td>
                    <td>".$row["item_description"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/inventoryItem-edit.php?item_No=$row[item_No]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/inventoryItem-delete.php?item_No=$row[item_No]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
        </div>



    </div>

    </div>
    
</body>
</html>