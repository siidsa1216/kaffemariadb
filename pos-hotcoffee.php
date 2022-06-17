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
            body {font-family: Arial, Helvetica, sans-serif;
                background-color:#F3E3D3;}
            * {box-sizing: border-box;
            }

            h1{
                color:white;
            }
            .dropbtn {
                background-color: none;
                color: black;
                padding: 10px;
                font-size: 16px;
                border: none;
                border-radius:10px; 
            }
            .dropbtn_paymentmethod{
                border: none;
                border-radius:10px;
                padding:10px;
                align: 
            }
            .dropbtn_qty{
                border: none;
                border-radius:10px;
                padding:10px;
                align: 
            }
            
            .dropdown {
                position: relative;
                margin:15px;
                border:round;
            }
        
        /* Dropdown Content (Hidden by Default) */
        .dropdown-content { 
                display: none;
                position: absolute;
                background-color: black;
                min-width: 160px;
                box-shadow: none;
                z-index: 1;
            }
        
        /* Links inside the dropdown */
        .dropdown-content a {
                color: white;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
        }

        .dropdown-content a:hover {background-color: none;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #8E5431;}

        /* The popup form - hidden by default */
        .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: none;
        z-index: 1;
        }

        .form-container {
        margin:100px;   
        max-width: 400px;
        padding: 10px;
        background-color: white;
        }

        .form-container{
        width: 800px;
        height:550px;
        margin:0px 810px 50px 50px;
        border-radius:15px;
        background: #8E5431;
        }

        .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
        margin-top:150px;
        background-color: #e7dcdc;
        color:black;
        font-family:monospace;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
        
        .hotcoffee-container{
            margin:200px;
            margin-top:150px;
            margin-left:320px;
            border-radius:500px;
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
            margin-left:780px;
            margin-top:-550px;
            border-style:none;
            background-color:white;
            width:700px;
            height:550px;
            font-size: 11px;
            color:white;
            background-color:#8E5431;
            border-radius:25px;
        }
        .container2{
            background-color:black;
            margin-left:780px;
            margin-top:-680px;
            width:720px;
            height:550px;
            border-radius:25px;
        }
        </style>

<div class="hotcoffee-container">
    <div class="coffee1">
        <img src="/kaffemariadb/img/iced-americano.jpg" onclick="Americano()" style="width:180px; height:180px;" ></img>
        <div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Hot Coffee Americano</h1>
    <div class="dropdown">
        <button class="dropbtn">SIZE</button>
        <div class="dropdown-content">
            <a href="/kaffemariadb/pos-hotcoffee.php">Small - 8oz</a>
            <a href="/kaffemariadb/pos-icedcoffee.php">Medium - 12oz</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn_paymentmethod">PAYMENT METHOD</button>
        <div class="dropdown-content">
            <a href="/kaffemariadb/pos-hotcoffee.php">CASH</a>
            <a href="/kaffemariadb/pos-icedcoffee.php">G-CASH</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn_paymentmethod">QUANTITY</button>
        <div class="dropdown-content_qty">

        </div>
    </div>
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
</div>

<script>
function Americano() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    </div>
    <div class="coffee2">
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/iced-americano.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
    <div class="coffee3">
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/iced-americano.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
    <div class="coffee4">   
        <a href="/kaffemariadb/home.php">
        <img src="/kaffemariadb/img/iced-americano.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
</div>


<div class = "container2">
</div><div class = "container1">
    <br><br>
    <label style="margin-left:50px;">Beverage Name</label>
    <label style="margin-left:50px;">Beverage Flavor</label>
    <label style="margin-left:50px;">Beverage Quantity</label>
    <label style="margin-left:50px;">Beverage Price</label>
    <label style="margin-left:50px;">Payment Method</label>
</div>

</body>
</head>
</html>
