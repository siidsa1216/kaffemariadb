<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'inventoryIngredient-create.php';

?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h1 style="margin:22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Inventory Table</h1><br>
            <h2 style="margin:22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;"Ingredient Table</h2>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()" id="Abutton">Add Ingredient</a>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder;">
            <thead>
                <th>Ingredient ID</th>
                <th>Ingredient Name</th>
                <th>Ingredient Description</th>
                <th>Ingredient Price</th>
                <th>Ingredient Expiration Date</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="kaffemariadb"; //name y=of your db
    
                //create connection
                $connection = new mysqli($servername,  $username, $password, $database);
                
                if ($connection->connect_error){
                    die("connection failed: ". $$connection->connect_error);
                }
    
                //read all data inn the table
    
                $sql = "SELECT * FROM ingredient";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row =$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["ingredient_ID"]. "</td>
                    <td>".$row["ingredient_name"]. "</td>
                    <td>".$row["ingredient_description"]. "</td>
                    <td>".$row["ingredient_price"]. "</td>
                    <td>".$row["ingredient_expiry"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/inventoryIngredient-edit.php?ingredient_ID=$row[ingredient_ID]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/inventoryIngredient-delete.php?ingredient_ID=$row[ingredient_ID]'>Delete</a>
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
		width: 140px;
		transition-duration: 0.4s;
		position:absolute;
        line-height: 15px;
        top:185px;
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
</style>  
    <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev">
    <center>
        <h1>New Ingredient</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="ingredient_ID" value="<?php echo $ingredient_ID; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Ingredient Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_name" value="<?php echo $ingredient_name; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_description" value="<?php echo $ingredient_description; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Ingredient Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_price" value="<?php echo $ingredient_price; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Expiration Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="ingredient_expiry" value="<?php echo $ingredient_expiry; ?>" required>
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