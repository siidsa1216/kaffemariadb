<?php
require 'condb.php';
include 'include/pos-topbar.php';
include 'include/pos-head.html';
include 'include/pos-sidebar.html';
?>
        <style div class="icedcoffee-container">
            body {font-family: 'Georama';
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
        border-radius: #8E5431;
        }

        .form-container{
        width: 800px;
        height:550px;
        margin:0px 810px 50px 50px;
        border-radius:15px;
        background: #8E5431;
        }

        .form-container .btn {
        border-radius:  #8E5431;
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
        color: #8E5431; 
        font-family:monospace;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
         background color:#8E5431;
         color: white;
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

        #box2{
        border: 2px solid #C98860;
        background: 	#C98860;
		font-size: 18px;
		font-family: "Georama";
        font-weight: bold;
		cursor: pointer;
		margin: 10px;
		color: white;
		transition: 0.8;
		border-radius: 8px;
		height: 45px;
		width: 120px;
		transition-duration: 0.4s;
		position:absolute;
        margin: 100px;
		top: 320px;
		left: -70px;
    }

    #box2:hover{
        background:  #FFF4ED;
        color:  #8E5431;
    }

    

        </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    </style>
    </style>

<body>
<div class="bigside p-4">
        <div class="container-fluid mt-5">
                <div class="row">
                <div class="col-lg-6">
                    <div class="container-fluid p-3">
                            

                    <div id="content">
                        <!--breadcrumb-->
                        <div id="content-header" style= "margin-top: -30px;font-size: 16px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: bold;">
                            <div id="breadcrumb" style="font-size: 25px; font-weight: bold; margin-top: -60px;">
                            <th>ICED COFFEE</th>    
                            </div>
                        </div>
                        <!--end of breadcrumb-->

                    <!--Action Boxes-->
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">

                                <div class="widget-content nopadding">
                                        <form name="form1" action="" method='POST' class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label"style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Customer Name</label>
                                                <div class="controls">
                                                <input type="text" class="form-control" placeholder="Customer Name" name="customer_name" style= "margin-left: -18px; margin-top: -9px; width: 350px;">
                                                </div>
                                            </div>

                                    <div class="widget-content nopadding">
                                        <form name="form1" action="" method='POST' class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label" style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Beverage Name</label>
                                                <div class="controls">  
                                                    <select class="form-control" name="beverage_name" style= "margin-left: -18px; margin-top: -9px; width:350px;">
                                                        <?php
                                                            $res=mysqli_query($connection, "SELECT beverage_name,beverage_name_id FROM beverage_name WHERE beverage_name_id = 1 OR beverage_name_id = 2 OR beverage_name_id = 3 OR beverage_name_id = 4");
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
                                                <p class="control-label" style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Beverage Size</p>
                                                <div class="controls">
                                                    <select name="beverage_size"class="form-control" style= "margin-left: -18px; margin-top: -17px; margin-top: -13px; width: 350px;">
                                                        <option  value="8oz">8oz</option>
                                                        <option  value="12oz">12oz</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Beverage Quantity</label>
                                                <div class="controls">
                                                <input type="text" class="form-control" placeholder="Beverage Quantity" name="beverage_qty" style= "margin-left: -18px; margin-top:-10px; width: 350px;">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Beverage Price</label>
                                                <div class="controls">
                                                    <select class="form-control" name="beverage_price"  style= "margin-left: -18px; margin-top:-10px; width: 350px;">
                                                        <?php
                                                            $res=mysqli_query($connection, "SELECT beverage_price FROM beverage_size WHERE beverage_size_id = 1 OR beverage_size_id = 2");
                                                            while($row =$res->fetch_assoc())
                                                            {
                                                                echo "<option>";
                                                                echo $row["beverage_price"];
                                                                echo "</option>";
                                                            }
                                                        ?>
                                                    </select>                                                
                                                </div>
                                            </div>

                               
                                            <div class="control-group">
                                                <label class="control-label"style="font-size: 15px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: 700px; margin-top: 8px; margin-left: -18px">Payment Method</label>
                                                <div class="controls">
                                                    <select name="payment_method" class="form-control" style= "margin-left: -18px; margin-top: -8px; width: 350px;">
                                                        <option  value="Cash">Cash</option>
                                                        <option  value="Gcash">Gcash</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <!--Button-->
                                            <br>
                                            <div class="form-actions">
                                                <button type="submit" name="submit" class="btn btn-success" id="box2">Submit</button>
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
                <div class="col-lg-15">
                    <div class="row">
                        <div class="container bg-white p-3" style= "width:700px; margin-top: -480px; margin-left: 420px; font-size: 10px; font-family: 'Georama'; sans-serif; color:#8E5431; font-weight: ;">
                        <table class="table text-center" style= "font-size: 15px;">
                            <thead>
                                <th>Customer Name</th>
                                <th>Beverage Name</th>
                                <th>Beverage Size</th>
                                <th>Beverage Quantity</th>
                                <th>Beverage Price</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            
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

                if(isset($_POST['submit'])){

                    $count = 0;
                    $result = mysqli_query($connection, "SELECT * FROM sales  WHERE beverage_flavor='$_POST[beverage_name]' && beverage_size='$_POST[beverage_size]' && beverage_price='$_POST[beverage_price]' && beverage_qty='$_POST[beverage_qty]' && payment_method='$_POST[payment_method]'") or die(mysqli_error($connection));
                    $count=mysqli_num_rows($result);
                    
                    if($count>0){
                        $errorMessage = "Please fill up the required fields";
                    }   else    {
                        mysqli_query($connection, "INSERT INTO sales VALUES(NULL, '$_POST[beverage_name]', '$_POST[beverage_size]', '$_POST[beverage_qty]', '$_POST[beverage_price]', '$_POST[payment_method]', NULL)") or die(mysqli_error($connection));
                        mysqli_query($connection, "INSERT INTO customer VALUES(NULL, '$_POST[customer_name]', NULL)") or die(mysqli_error($connection));
                        mysqli_query($connection, "UPDATE stock_master SET product_qty=product_qty-'$_POST[beverage_qty]' WHERE product_name='$_POST[beverage_name]' && product_size='$_POST[beverage_size]' ") or die(mysqli_error($connection));
                    }
                }


                #read all data
                $sql = "SELECT s.*, c.customer_name FROM sales s, customer c WHERE s.date_released = c.date_released";            
                $result= $connection->query($sql);

                if (!$result){
                    die("Invalid query: ".$connection->error);
                }

                $total =['beverage_price' => 0];
                while($row =$result->fetch_assoc())
                {
                    $total = ['beverage_price' =>  $total['beverage_price']+ $row['beverage_price'] * $row['beverage_qty']];
                    echo "<tr>
                        <td>".$row["customer_name"]. "</td>
                        <td>".$row["beverage_flavor"]. "</td>
                        <td>".$row["beverage_size"]. "</td>
                        <td>".$row["beverage_qty"]. "</td>
                        <td>".$row["beverage_price"]. "</td>
                        <td>".$row["payment_method"]. "</td>
                        <td>".$row["date_released"]. "</td>
                        <td>
                            <a class='btn btn-danger btn-sm' href='/kaffemariadb/pos-milktea-delete.php?sales_ID=$row[sales_ID]'>Delete</a>
                        </td>
                    </tr>";

                }
                echo '<tr align= center>';
                    echo '<th colspan="5" style="text-align: right;">Total Sales:</th>';
                    echo '<td ><b>' . $total['beverage_price'] . '</b></td>';
                  
                   echo '</tr>'; 
                ?>

                        </table>
                        </div>
                    </div>
                    <br><br>

                    
<!--Fetch 2 data from different tables-->      

                </div>
            </div>
        </div>

</body>
</html>
