<?php
require 'condb.php';
include 'include/pos-topbar.html';
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
                            

                    <div id="content">
                        <!--breadcrum-->
                        <div id="content-header">
                            <div id="breadcrumb">Milk Tea</div>
                        </div>
                        <br>
                        <!--end of breadcrumb-->

                    <!--Action Boxes-->
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <h5>Chuvaneknek</h5>
                                    </div>

                                    <div class="widget-content nopadding">
                                        <form name="form1" action="" method='POST' class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">Beverage Name</label>
                                                <div class="controls">  
                                                    <select class="form-control" name="beverage_name">
                                                        <?php
                                                            $res=mysqli_query($connection, "SELECT beverage_name,beverage_name_id FROM beverage_name WHERE beverage_name_id = 5 OR beverage_name_id = 6 OR beverage_name_id = 7");
                                                            while($row =$res->fetch_assoc())
                                                            {
                                                                echo "<option>";
                                                                echo $row["beverage_name"];
                                                                echo "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Beverage Size</label>
                                                <div class="controls">
                                                    <select name="beverage_size" class="form-control">
                                                        <option  value="8oz">8oz</option>
                                                        <option  value="12oz">12oz</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Beverage Quantity</label>
                                                <div class="controls">
                                                <input type="text" class="form-control" placeholder="Beverage Quantity" name="beverage_qty" />
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Payment Method</label>
                                                <div class="controls">
                                                    <select name="payment_method" class="form-control">
                                                        <option  value="Cash">Cash</option>
                                                        <option  value="Gcash">Gcash</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <!--Button-->
                                            <br>
                                            <div class="form-actions">
                                                <button type="submit" name="submit" class="btn btn-success">submit</button>
                                            </div>

                                        </form>
                                    </div>

                                    <!--Widget Box-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--content-->
                    </div>
                        
                    

                    <!--closing the container-fluid-->
                    </div>
                </div>



                
    
            <!--Yung sa gilid na display table-->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="container bg-white p-3">
                        <table class="table text-center">
                            <thead>
                                <th>Beverage Name</th>
                                <th>Beverage Size</th>
                                <th>Beverage Quantity</th>
                                <th>Beverage Price</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </thead>
                            


<!--Display na yung nasubmit-->                       
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
                
                while($row =$result->fetch_assoc())
                {

                    echo "<tr>
                        <td>".$row["beverage_flavor"]. "</td>
                        <td>".$row["beverage_size"]. "</td>
                        <td>".$row["beverage_qty"]. "</td>
                        <td>".$row["beverage_price"]. "</td>
                        <td>".$row["payment_method"]. "</td>
                        <td>
                            <a class='btn btn-danger btn-sm' href='/kaffemariadb/pos-milktea-delete.php?sales_ID=$row[sales_ID]'>Delete</a>
                        </td>
                    </tr>";

                }
                
                ?>

                        </table>
                        </div>
                    </div>
                    <br><br>

                    
<!--Fetch 2 data from different tables-->                    
<?php
if(isset($_POST['submit'])){

    $count = 0;
    $result = mysqli_query($connection, "SELECT * FROM sales  WHERE beverage_flavor='$_POST[beverage_name]' && beverage_size='$_POST[beverage_size]' && beverage_qty='$_POST[beverage_qty]' && payment_method='$_POST[payment_method]'") or die(mysqli_error($connection));
    $count=mysqli_num_rows($result);
    
    if($count>0){
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display = "none";
            document.getElementById("error").style.display = "block";
        </script>
        <?php
    }   else    {
        mysqli_query($connection, "INSERT INTO sales VALUES(NULL, '$_POST[beverage_name]', '$_POST[beverage_size]', '$_POST[beverage_qty]', '0', '$_POST[payment_method]')") or die(mysqli_error($connection));
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            setTimeout(funtion(){
                window.location.href=window.location.href;
            }, 3000);
        </script>
        <?php
    }
}

?>



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