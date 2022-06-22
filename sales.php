<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'staff-add-function.php'

?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div>
    <div class="bigside">
        <div class="container" style="margin:22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">
            <h1>Sales</h1>
        </div>
        <div class="formcontainer pb-2" style = "width:50%;" >
                <form class="form-inline" name = "form1" method="GET">
                    <div class="col">    
                        <div class="row">
                                <label for="" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">From Date</label>
                                <input type="date" name ="from_date" class="form-control" value ="<?php if (isset($_GET['from_date'])){echo $_GET['from_date'];}?>" required style="border-radius:20px; border:2px solid #8E5431; color: #8E5431;letter-spacing: 1px;">
                            </div>
                    </div>
                    <div class="col">
                            <div class="row" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
                                <label for="">To Date</label>
                                <input type="date" name ="to_date" class="form-control" value ="<?php if (isset($_GET['to_date'])){echo $_GET['to_date'];}?>" required style="border-radius:20px; border:2px solid #8E5431; color:#8E5431; letter-spacing: 1px;">
                            </div>
                            </div>
                        <div class="col">
                            <div class="row">
                                <label for="" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">Click to Filter</label>
                            <button type="submit" class="btn btn-primary" id="filterbutton" style="border-radius:20px; font-family: 'Georama', sans-serif; letter-spacing:1px;">FILTER</button>
                            </div>
                        </div>
                </form>
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
            <thead>
                <th>ID</th>
                <th>Beverage Flavor</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Payment Method</th>
                <th>Date and Time of Purchase</th>
            </thead>
    
            <tbody>
            
            <?php
            if(isset($_GET['from_date']) && ($_GET['to_date']))
            {
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];

                $query = "SELECT * FROM sales WHERE date_released BETWEEN ' $from_date' AND ' $to_date' ";
                $result = mysqli_query($connection,  $query);

               

                if(mysqli_num_rows($result) > 0)
                {
                    $total =['beverage_price' => 0,
                             'beverage_qty' => 0, ];

                    foreach( $result as $row){  
                    $total = ['beverage_price' =>  $total['beverage_price']+ $row['beverage_price'],
                                 'beverage_qty' =>  $total['beverage_qty']+ $row['beverage_qty']];
                    echo "<tr>
                    <td>".$row["sales_ID"]. "</td>
                    <td>".$row["beverage_flavor"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_price"]. "</td>
                    <td>".$row["payment_method"]. "</td>
                    <td>".$row["date_released"]. "</td>    
                    </tr>";
                    }
                    echo '<tr align= center>';
                    echo '<th colspan="4" style="text-align: right;">Quantity:</th>';
                    echo '<td ><b>' . $total['beverage_qty'] . '</b></td>';
                    echo '<th colspan="1" style="text-align: right;">Total Sales:</th>';
                    echo '<td ><b>' . $total['beverage_price'] . '</b></td>';
                  
                   echo '</tr>';
                   
                
                }
                else
                {
                    echo "<tr>No record found.</tr>";
                }
            }
        ?>
            </tbody>
        </table>
    </div>
    </div>
<style type="text/css">
      #filterbutton{
        background-color: #C98860;
        border:2px solid #C98860;
        border-radius; 2px;
      }
      #filterbutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
</style>
</body>


  
  
</html>