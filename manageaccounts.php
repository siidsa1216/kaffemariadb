<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'manageaccounts-add.php';

?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h1 style="margin-left:-22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Users</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()" id="Abutton">Add New User</a>
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
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
		width: 120px;
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
</style> 
        
        <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev">
    <center>
        <h1 style="color:#8E5431;font-size:20px;font-family: 'Georama'; Font-weight:bold; margin-top:20px; margin-bottom:20px;letter-spacing:1px;">Add New User</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="middleName" value="<?php echo $middleName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">User Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_type" value="<?php echo $user_type; ?>" required>
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