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

    <div class="sidebar">
        <div class="buttonsss">
            <ul>
                <li><a href="/kaffemariadb/home1.html">HOME</a></li>
                <li><a href="">BEVERAGE</a></li>
                <li><a href="">INVENTORY</a></li>
                <li><a href="">EMPLOYEE</a></li>
                <li><a href="">POS</a></li>
                <li><a href="/kaffemariadb/supplier.php">SUPPLIER</a></li>
                <li><a href="">LOGOUT</a></li>

            </ul>
        </div>
    </div>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:66px;">
            <h1>Beverage Table</h1>
            <a class="btn btn-primary" href="/KaffeMariaTrial/create.php" role="button">Add Supplier</a>
    
        </div>
        <table class="table" style="margin:66px;">
            <thead>
                <th>Beverage No.</th>
                <th>Flavor</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Payment Method</th>
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
    
                $sql = "SELECT * FROM beverage";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["beverage_No"]. "</td>
                    <td>".$row["beverage_flavor"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_price"]. "</td>
                    <td>".$row["payment_method"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/KaffeMariaTrial/edit.php?beverage_No=$row[beverage_No]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/KaffeMariaTrial/delete.php?beverage_No=$row[beverage_No]'>Delete</a>
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