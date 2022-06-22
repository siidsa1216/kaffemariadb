<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/pos-topbar-admin.php';
include 'include/head.html';
?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div>
    <div class="linetb"></div>
    <div class="linesb"></div>
    <div class="bigside">
        <div class="container my-5" style="margin:50px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bold;">
            <?php 
            /*session_start();*/
            echo "WELCOME  "." ".$_SESSION['user']."!";?>
        </div>
            <div class="container-fluid mt-3 text-center">
                <div class="row">
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif; font-weight:bolder; color:#FFF4ED; border-radius: 20px;background-color: #8E5431;
                    border: 1px solid #8E5431;letter-spacing: 3px;">BEVERAGE <br><br><?php 
                        $query = "SELECT COUNT(*) FROM beverage WHERE beverage_No=beverage_No";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif;font-weight:bolder; color:#8E5431; border-radius: 20px;background-color: #FFF4ED;
                    border: 1px solid #8E5431;letter-spacing: 3px;">INGREDIENT <br><br><?php 
                        $query = "SELECT COUNT(*) FROM ingredient WHERE ingredient_ID=ingredient_ID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif; font-weight:bolder; color:#FFF4ED; border-radius: 20px;background-color: #8E5431;
                    border: 1px solid #8E5431;letter-spacing: 3px;" >ITEMS <br><br><?php 
                        $query = "SELECT COUNT(*) FROM item WHERE item_No=item_No";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                </div>
                <div class="row">
                <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif; font-weight:bolder; color:#FFF4ED; border-radius: 20px;background-color: #8E5431;
                    border: 1px solid #8E5431;letter-spacing: 3px;">STAFF <br><br><?php 
                        $query = "SELECT COUNT(*) FROM staff WHERE staffID=staffID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif;font-weight:bolder; color:#8E5431; border-radius: 20px;background-color: #FFF4ED;
                    border: 1px solid #8E5431;letter-spacing: 3px;">SUPPLIERS <br><br><?php 
                        $query = "SELECT COUNT(*) FROM supplier WHERE supplier_ID=supplier_ID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif;font-weight:bolder; color:#8E5431; border-radius: 20px;background-color: #FFF4ED;
                    border: 1px solid #8E5431;letter-spacing: 3px;">SALES <br><br><?php 
                        $query = "SELECT COUNT(*) FROM sales WHERE sales_ID=sales_ID";
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)</div>
                    <div class="col p-3 m-3 bg-#FFF4ED text-#8E5431 color-#8E5431" style="font-family: 'Georama', sans-serif; font-weight:bolder; color:#FFF4ED; border-radius: 20px;background-color: #8E5431;
                    border: 1px solid #8E5431;letter-spacing: 3px;">NUMBER OF USERS <br><br><?php 
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
