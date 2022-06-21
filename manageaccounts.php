<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'manageaccounts-add.php';

?>
<body>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h1>Users</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()">Add New User</a>
        </div>
        <table class="table">
            <thead>
                <th>user id</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>User Type</th>
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
    
                $sql = "SELECT * FROM user";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["id"]. "</td>
                    <td>".$row["firstName"]. "</td>
                    <td>".$row["middleName"]. "</td>
                    <td>".$row["lastName"]. "</td>
                    <td>".$row["user_name"]. "</td>
                    <td>".$row["password"]. "</td>
                    <td>".$row["user_type"]. "</td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/manageaccounts-delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
        
        <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev">
    <center>
        <h1>Add New User</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="middleName" value="<?php echo $middleName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">User Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_type" value="<?php echo $user_type; ?>" required>
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