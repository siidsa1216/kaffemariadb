<?php
require 'condb.php';
include 'include/pos-topbar.php';
include 'include/pos-head.html';
include 'include/pos-sidebar.html';
?>
        <style div class="icedcoffee-container">
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
        margin-top:50px;
        background-color: #e7dcdc;
        color:black;
        font-family:monospace;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
        .col-lg-5{
            margin-top:-580px;
        }
        .coffee3{
            margin-top:-332px;
            margin-left:180px;
        }
        .coffee4{
            margin-top:-182px;
            margin-left:180px;
        }
        
    </style>

<body>
<div class="bigside p-4">
        <div class="container-fluid mt-5">
                <div class="row">
                <div class="col-lg-6">
                    <div class="container-fluid p-3">
                            <div class="row m-3">
                                <div class="col-lg-4">
                                    <div class="coffee1">
                                        <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:150px; height:150px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4">
                                    <div class="coffee2">
                                        <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:150px; height:150px;">
                                    </div>
                                </div>
                            </div>
                                <div class="row m-3">
                                    <div class="col-lg-4">
                                        <div class="coffee3">
                                            <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:150px; height:150px;">
                                        </div>
                                    </div>  
                                </div>
                                <div class="row m-3">
                                    <div class="col-lg-4">
                                        <div class="coffee4">
                                            <img src="/kaffemariadb/img/hot-coffee.jpg" onclick="Americano()" style="width:150px; height:150px;"></a>
                                        </div>
                                    </div>
                                </div>
                                
                    </div>
                </div>

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
                        <label for="">Beverage Quantity</label>
                            <select name="beverage_qty" class="form-control">
                                <option  value="1">1</option>
                                <option  value="2">2</option>
                                <option  value="3">3</option>
                                <option  value="4">4</option>
                                <option  value="5">5</option>
                            </select>
                    </div>

                    <div class="from-group">
                        <label for="">Payment Method</label>
                            <select name="payment_method" class="form-control">
                                <option  value="Cash">Cash</option>
                                <option  value="Gcash">Gcash</option>
                            </select>
                    </div>

                    <br><br>
                    <div class="from-group">
                        <button type="submit" name="submit" class="btn btn-primar">submit</button>
                    </div>
    
                    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
                </form>
    </div>
    
            
                <div class="col-lg-6">
                    <div class="row">
                        <div class="container bg-white p-3">
                        <table class="table text-center">
                            <thead>
                                <th>Beverage Flavor</th>
                                <th>Beverage Size</th>
                                <th>Beverage Quantity</th>
                                <th>Beverage Price</th>
                                <th>Payment Method</th>
                             
                            </thead>
                            <script>
function Americano() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

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
    
                $sql = "SELECT * FROM sales";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["payment_method"]. "</td>
                </tr>";
                }
                
                ?>
                        </table>
                        </div>
                    </div>
                    <br><br>
                                
                    <div class="row">
                        <div class="container bg-white p-3">
                            <h4>Total:</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>