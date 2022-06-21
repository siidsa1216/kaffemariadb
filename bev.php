<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'bev-create.php';

?>
<body>
    <div class="bigside">
        <div class="container" style="margin:20px;">
            <h1>Beverage Table</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()">Add Beverage</a>
        </div>
        <table class="table">
            <thead>
                <th>Beverage No.</th>
                <th>Flavor</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Payment Method</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                //read all data inn the table
    
                $sql = "SELECT * FROM beverage";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["beverage_No"]. "</td>
                    <td>".$row["beverage_flavor"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_price"]. "</td>
                    <td>".$row["payment_method"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/bev-edit.php?beverage_No=$row[beverage_No]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/bev-delete.php?beverage_No=$row[beverage_No]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div> 

    
    <!--POPUP FORM FOR ADD BEVERAGE-->
    <div class="container" id="newbev">
    <center>
        <h1>New Beverage</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="beverage_No" value="<?php echo $beverage_No; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Flavor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_flavor" value="<?php echo $beverage_flavor; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_qty" value="<?php echo $beverage_qty; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_size" value="<?php echo $beverage_size; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_price" value="<?php echo $beverage_price; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Payment</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="payment_method" value="<?php echo $payment_method; ?>"required>
                </div>
            </div>

            <?php
            ?>
             <div class="row mb-3">
                <div class="col-sm-6 d-grid">
                    <button type="submit" onclick="JSalert()" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button">Cancel</a>
                </div>
            </div>  
        </form> 
        </center> 
            </div>
           

    <script>
        function openForm() {
        document.getElementById("newbev").style.display = "block";
        }

        function closeForm() {
        document.getElementById("newbev").style.display = "none";
        }
        </script>

        <script type="text/javascript">
             function JSalert() {
	    alert("Successfully added.");
    }

        </script>
</body>
</html>