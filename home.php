<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
?>
<body>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:66px;">
            <?php 
            /*session_start();*/
            echo "WELCOME"." ".$_SESSION['user']."!";?>
        </div>
            <div class="container-fluid mt-3 text-center">
                <div class="row">
                    <div class="col p-3 m-3 bg-primary text-white">BEVERAGE <br><br><?php 
                        $query = "SELECT COUNT(*) FROM beverage WHERE beverage_No=beverage_No";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-dark text-white">INGREDIENT <br><br><?php 
                        $query = "SELECT COUNT(*) FROM ingredient WHERE ingredient_ID=ingredient_ID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-primary text-white">ITEMS <br><br><?php 
                        $query = "SELECT COUNT(*) FROM item WHERE item_No=item_No";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                </div>
                <div class="row">
                <div class="col p-3 m-3 bg-primary text-white">STAFF <br><br><?php 
                        $query = "SELECT COUNT(*) FROM staff WHERE staffID=staffID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-dark text-white">SUPPLIERS <br><br><?php 
                        $query = "SELECT COUNT(*) FROM supplier WHERE supplier_ID=supplier_ID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-primary text-white">SALES <br><br>(No. of Beverages Available)</div>
                    <div class="col p-3 m-3 bg-dark  text-white">NUMBER OF USERS <br><br><?php 
                        $query = "SELECT COUNT(*) FROM user WHERE id=id";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                </div>
            </div>
     
</body>
</html>
