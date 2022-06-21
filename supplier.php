<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'supplier-create.php';
?>

<body>
    <div class="bigside">
         <div class="container my-5" style="margin:20px;">
            <h1>Supplier Table</h1>
            <a class="btn btn-primary" onclick="openForm()" role="button">Add Supplier</a>
    
        </div>
        <table class="table">
            <thead>
                <th>Supplier ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact No.</th>
                <th>Address</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                $sql = "SELECT * FROM supplier";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["supplier_ID"]. "</td>
                    <td>".$row["supplier_fname"]. "</td>
                    <td>".$row["supplier_mname"]. "</td>
                    <td>".$row["supplier_lname"]. "</td>
                    <td>".$row["supplier_ContactNo"]. "</td>
                    <td>".$row["supplier_address"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/supplier-edit.php?supplier_ID=$row[supplier_ID]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/supplier-delete.php?supplier_ID=$row[supplier_ID]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div>

 <!--POPUP FORM FOR ADD SUPPLIER-->
 <div class="container" id="newbev">
    <center>
    <h1>New Supplier</h1>
        <form method = 'POST' id='pop-upform'>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_fname" value="<?php echo $supplier_fname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_mname" value="<?php echo $supplier_mname; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_lname" value="<?php echo $supplier_lname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_ContactNo" value="<?php echo $supplier_ContactNo; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_address" value="<?php echo $supplier_address; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class=" col-sm-6 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button">Cancel</button></a>
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
<!--
        <script type="text/javascript">
             function JSalert() {
	    alert("Successfully added.");
    }

        </script> 
        -->
</body>
</html>