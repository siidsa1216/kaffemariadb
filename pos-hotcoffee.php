<?php
require 'condb.php';
include 'include/pos-topbar.php';
include 'include/pos-head.html';
include 'include/pos-sidebar.html';
?>

<?php session_start(); ?>

<?php   
    if(isset($_SESSION['status'])){
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
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
        margin-top:20px;
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





<!--PICTURE 1 POP UP-->
<div class="hotcoffee-container">
    <div class="coffee1">
        <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:180px; height:180px;" ></img>
        <div class="form-popup" id="myForm">
  <form action="try.php" class="form-container" method="POST">
    <h1>Hot Coffee Americano</h1>

            <div class="from-group">
                <label for="">Beverage Size</label>
            <select name="beverage_size" class="form-control">
                <option  value="8oz">8oz</option>
                <option  value="12oz">12oz</option>
            </select>
        </div>
        <div class="from-group">
                <label class="control-label">Enter Quantity</label>
            <div class="controls">
                <input type="text" name="beverage_qty" value="0">
            </div>
        </div>
        <div class="from-group">
                <label for="">Payment Method</label>
            <select name="payment_method" class="form-control">
                <option  value="Cash">Cash</option>
                <option  value="Gcash">Gcash</option>
            </select>
        </div>
        <div class="from-group">
            <BR></BR>
            <button type="submit" name="submit" class="btn btn-primar">submit</button>
        </div>

    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>

  </form>
</div>
</div>


    <div class="coffee2">
        <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:180px; height:180px;" ></img>
    </div>


    <div class="coffee3">
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>


    <div class="coffee4">   
        <img src="/kaffemariadb/img/hot-coffee.jpg" style="width:180px; height:180px; margin-left:50px;"></a>
    </div>
</div>
</form>



 





<!--POPUP FUNCTION (NOT NEEDED ATA)-->
<script>
function Americano() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>




<!--YUNG NASA RIGHT-->
<div class = "container2">
</div>
<div class = "container1">
    <br><br>
    
    <!--<label style="margin-left:50px;">Beverage Name</label>
    <label style="margin-left:50px;">Beverage Flavor</label>
    <label style="margin-left:50px;">Beverage Quantity</label>
    <label style="margin-left:50px;">Beverage Price</label>
    <label style="margin-left:50px;">Payment Method</label>-->

    <table class="table">
            <thead>
                <th>Beverage Name</th>
                <th>Beverage Size</th>
                <th>Beverage Quantity</th>
                <th>Beverage Price</th>
                <th>Payment Method</th>
            </thead>
    
</div>
</div> 






<!--TO DISPLAY THE SUBMITTED INFO-->
<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="kaffemariadb"; //name y=of your db
    
                //create connection
                $connection = new mysqli($servername, $username, $password, $database);
                
                if ($connection->connect_error){
                    die("connection failed: ". $$connection->connect_error);
                }
    
                //read all data inn the table
    
                $sql = "SELECT s.*, b.beverage_name AS bname FROM sales s, beverage_name b WHERE b.beverage_name_id = 2";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["bname"]. "</td>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["beverage_price"]. "</td>
                    <td>".$row["payment_method"]. "</td>
                    <td>
                    <a class='btn btn-danger btn-sm' href='/kaffemariadb/pos-hotcoffee-delete.php?sales_ID=$row[sales_ID]'>Delete</a>
                    </td>
                </tr>";
                }
                ?>



</body>
</head>
</html>
<!--<button type="button" class="btn submit" onclick="closeForm()">Submit</button> -->