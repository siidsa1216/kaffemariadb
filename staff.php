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
        <div class="container my-5" style="margin:22px;">
            <h1 style="margin-left:-18px; margin-top:20px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Staff</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()" id="Abutton">Add Staff</a>
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
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
    <div class="container" id="newbev" >
    <center>
        <h1 style="color:#8E5431;font-size:20px;font-family: 'Georama'; Font-weight:bold; margin-top:20px; margin-bottom:20px;letter-spacing:1px;">Add Staff</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="staffID" value="<?php echo $staff_fname; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_fname" value="<?php echo $staff_fname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_mname" value="<?php echo $staff_mname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_lname" value="<?php echo $staff_lname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_address" value="<?php echo $staff_address; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_contactno" value="<?php echo $staff_contactno; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Position</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_position" value="<?php echo $staff_position; ?>" required>
                </div>
            </div>

             <div class="row mb-3">
                <div class="col-sm-6 d-grid">
                    <button type="submit" onclick="JSalert()" class="btn btn-primary" id="Sbutton">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button" id="Cbutton">Cancel</a>
                </div>
            </div>  
        </form> 
        </center> 
            </div>
            <style type="text/css">
      #Abutton{
        border: 2px solid #C98860;
        background: 	#C98860;
		font-size: 13px;
		font-family: "Georama";
        font-weight: bold;
		cursor: pointer;
		color: white;
		transition: 0.8;
		border-radius: 8px;
		height: 30px;
		width: 100px;
		transition-duration: 0.4s;
		position:absolute;
        line-height: 15px;
        top:195px;
        left:260px;
      }
      #Abutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }

      #newbev{
        background-color: #F5F5F5;
        border:3px solid #8E5431;
        border-radius: 20px;
      }
      #Sbutton{
        background-color: #C98860;
        border:2px solid #C98860;
        border-radius; 5px;
      }
      #Sbutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
      #Cbutton{
        background-color: #8E5431;
        border:2px solid #8E5431;
        border-radius; 5px;
        color:white;
      }
      #Cbutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
      .btn-group-sm>.btn, .btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
.btn-danger {
    color: #FFF4ED;
    background-color:  #C98860;
    border-color: #8E5431 ;
    border-radius:10px;
    border:2px solid;
}
.btn-danger:hover{
    color: #FFF4ED;
    background:#8E5431;
} 

.btn-primary {
    color: #8E5431;
    background-color: #FFF4ED;
    border-color: #8E5431;
    border-radius:10px;
}
.btn-primary:hover {
    color: #FFF4ED;
    background:#8E5431;
    border-color: #8E5431;
}
</style>         

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