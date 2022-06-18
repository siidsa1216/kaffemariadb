<?php
require 'condb.php';
include 'include/pos-topbar.html';
include 'include/pos-head.html';
include 'include/pos-sidebar.html';

$staffID="";
$staff_fname="";
$staff_mname="";
$staff_lname="";
$staff_address="";
$staff_contactno="";
$staff_position="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $staff_fname=$_POST["staff_fname"];
   $staff_mname=$_POST["staff_mname"];
   $staff_lname=$_POST["staff_lname"];
   $staff_address=$_POST["staff_address"];
   $staff_contactno=$_POST["staff_contactno"];
   $staff_address=$_POST["staff_address"];
   $staff_position=$_POST["staff_position"];
   
   do {
       if(empty($staff_fname) || empty($staff_lname) || empty($staff_contactno) || empty($staff_address) || empty($staff_position))
       {
           $errorMessage = "Please fill up the required fields";
       break;        
       } 
       // add new client into the db
       $sql = "INSERT INTO staff (staff_fname,staff_mname,staff_lname,staff_address,staff_contactno,staff_position)".
               "VALUES('$staff_fname', '$staff_mname','$staff_lname','$staff_address', '$staff_contactno', '$staff_position')";
      
       $result= $connection->query($sql);

       if (!$result){
           $errorMessage= "Invalid query: ".$connection->error;
           break;
       }

       $staffID="";
       $staff_fname="";
       $staff_mname="";
       $staff_lname="";
       $staff_address="";
       $staff_contactno="";
       $staff_position="";
       
       $successMessage = "Supplier added successfully!";
       
       header("location:/kaffemariadb/staff.php");
       exit;

   }while(false);
}
?>

<body>
    <style>
        body{
            background-color:#F3E3D3;
        }
    </style>
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
    <div class="container my-5">
        <h2>Milk Tea</h2>

        <?php
        if (!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role= 'alert'>
            <strong> $errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

        ?>
        <div class="milktea-container">
                <div class="coffee1">
                    <img src="/kaffemariadb/img/milktea.jpg" onclick="Americano()" style="width:180px; height:180px;" ></img>
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
        <br><br>
            
            <?php
            if (!empty($successMessage)){
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role= 'alert'>
                <strong> $successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
             <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/kaffemariadb/staff.php" role="button">Cancel</button></a>
                </div>
            </div>  
        </form>  
    </div>
</body>
</html>