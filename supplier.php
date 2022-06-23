<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'supplier-create.php';
?>

<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div class="bigside">
         <div class="container my-5" style="margin:20px;">
            <h1 style="margin-left:-22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Supplier Table</h1>
            <a class="btn btn-primary" onclick="openForm()" role="button" id="Abutton">Add Supplier</a>
    
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
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


 <!--POPUP FORM FOR ADD SUPPLIER-->
 <div class="container" id="newbev">
    <center>
    <h1 style="color:#8E5431;font-size:20px;font-family: 'Georama'; Font-weight:bold; margin-top:20px; margin-bottom:20px;letter-spacing:1px;">New Supplier</h1>
        <form method = 'POST' id='pop-upform'>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_fname" value="<?php echo $supplier_fname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_mname" value="<?php echo $supplier_mname; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_lname" value="<?php echo $supplier_lname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_ContactNo" value="<?php echo $supplier_ContactNo; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_address" value="<?php echo $supplier_address; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class=" col-sm-6 d-grid">
                    <button type="submit" class="btn btn-primary" id="SButton">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button" id="CButton">Cancel</button></a>
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