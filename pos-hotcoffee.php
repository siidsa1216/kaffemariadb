<?php
require 'condb.php';
include 'include/pos-topbar.html';
include 'include/pos-head.html';
include 'include/pos-sidebar.html';
?>

<!DOCTYPE html>
<html>
<head>
    <body>
        <style div class="hotcoffee-container">
        
        body{
            background-color:white;
        }
        .hotcoffee-container{
            margin:200px;
            margin-top:150px;
            margin-left:320px;
        }
        .coffee1{
            margin-top:30px;
            margin-left:-0px;
        }
        .coffee2{
            margin-top:-185px;
            margin-left:150px;
        }
        .coffee3{
            margin-top:30px;
            margin-left:-50px;
        }
        .coffee4{
            margin-top:-185px;
            margin-left:150px;
        }
        .container1{
            margin-left:800px;
            margin-top:-680px;
            border-style:none;
            background-color:white;
            width:700px;
            height:550px;
            font-size: 15px;
            color:white;
            background-color:#8E5431;
        }
        </style>

<div class="hotcoffee-container">
    <div class="coffee1">
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px;"></a>
    </div>
    <div class="coffee2">
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
    <div class="coffee3">
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
    <div class="coffee4">   
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
</div>


<div class = "container1">
    <label style="margin-left:50px;">Beverage Name</label>
    <label style="margin-left:50px;">Beverage Flavor</label>
    <label style="margin-left:50px;">Beverage Quantity</label>
    <label style="margin-left:50px;">Beverage Price</label>
</div>



</body>
</head>
</html>

