<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.html';
include 'include/head.html';
include 'staff-add-function.php'

?>
<body>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h1>Staff</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()">Add Staff</a>
        </div>
        <table class="table">
            <thead>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Position</th>
                <th>Action</th>
            </thead>
    
            <tbody>
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
    
                $sql = "SELECT * FROM staff";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["staffID"]. "</td>
                    <td>".$row["staff_fname"]. "</td>
                    <td>".$row["staff_mname"]. "</td>
                    <td>".$row["staff_lname"]. "</td>
                    <td>".$row["staff_address"]. "</td>
                    <td>".$row["staff_contactno"]. "</td>
                    <td>".$row["staff_position"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/staff-edit-function.php?staffID=$row[staffID]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/staff-delete-function.php?staffID=$row[staffID]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
        <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev">
    <center>
        <h1>Add Staff</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="staffID" value="<?php echo $staff_fname; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_fname" value="<?php echo $staff_fname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_mname" value="<?php echo $staff_mname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_lname" value="<?php echo $staff_lname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_address" value="<?php echo $staff_address; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_contactno" value="<?php echo $staff_contactno; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Position</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_position" value="<?php echo $staff_position; ?>" required>
                </div>
            </div>

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
    </div>

    </div>
    
</body>
</html>