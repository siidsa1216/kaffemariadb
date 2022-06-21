<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'staff-add-function.php'

?>
<body>
    <div>
    <div class="bigside">
        <div class="container" style="margin:22px;">
            <h1>Sales</h1>
        </div>
        <div class="formcontainer pb-2" style = "width:50%;" >
                <form class="form-inline" name = "form1" method="GET">
                    <div class="col">    
                        <div class="row">
                                <label for="">From Date</label>
                                <input type="date" name ="from_date" class="form-control" value ="<?php if (isset($_GET['from_date'])){echo $_GET['from_date'];}?>" required>
                            </div>
                    </div>
                    <div class="col">
                            <div class="row">
                                <label for="">To Date</label>
                                <input type="date" name ="to_date" class="form-control" value ="<?php if (isset($_GET['to_date'])){echo $_GET['to_date'];}?>" required>
                            </div>
                            </div>
                        <div class="col">
                            <div class="row">
                                <label for="">Click to Filter</label>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                </form>
        </div>
        <table class="table">
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
</body>
</html>