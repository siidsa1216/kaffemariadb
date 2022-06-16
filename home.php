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
            <h1>Supplier Table</h1>
            <a class="btn btn-primary" href="/kaffemariadb/create.php" role="button">Add Supplier</a>
    
        </div>
        <table class="table" style="margin:66px;">
            <thead>
                <th>Supplier ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact No.</th>
                <th>Address</th>
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
    
                $sql = "SELECT * FROM supplier";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["supplier_ID"]. "</td>
                    <td>".$row["supplier_fname"]. "</td>
                    <td>".$row["supplier_mname"]. "</td>
                    <td>".$row["supplier_lname"]. "</td>
                    <td>".$row["supplier_ContactNo"]. "</td>
                    <td>".$row["supplier_address"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/edit.php?supplier_ID=$row[supplier_ID]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/delete.php?supplier_ID=$row[supplier_ID]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div>

    </div>
    
</body>
</html>