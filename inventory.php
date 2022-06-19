<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.html';
include 'include/head.html';
include 'inventoryIngredient-create.php';
include 'inventoryItem-create.php';

?>
<body>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h1>Inventory Table</h1><br>
            <h2>Ingredient Table</h2>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()">Add Ingredient</a>
        <table class="table">
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

        <br>
            <div>
            <div class="container my-5" style="margin:22px;">
            <h2>Item Table</h2>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm_item()">Add Item</a>
            <table class="table">
                <thead>
                    <th>Item No.</th>
                    <th>Item Name</th>
                    <th>Item Quantity</th>
                    <th>Item Size</th>
                    <th>Item Descritpion</th>
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
        
                    $sql = "SELECT * FROM item";
                    $result= $connection->query($sql);
        
                    if (!$result){
                        die("Invalid query: ".$connection->error);
                    }
                    while($row =$result->fetch_assoc()){
                        echo "<tr>
                        <td>".$row["item_No"]. "</td>
                        <td>".$row["item_name"]. "</td>
                        <td>".$row["item_qty"]. "</td>
                        <td>".$row["item_size"]. "</td>
                        <td>".$row["item_description"]. "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/kaffemariadb/inventoryItem-edit.php?item_No=$row[item_No]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/kaffemariadb/inventoryItem-delete.php?item_No=$row[item_No]'>Delete</a>
                        </td>
                    </tr>";
                    }
                
                    ?>
                </tbody>
            </table>
    <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev">
    <center>
        <h1>New Ingredient</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="ingredient_ID" value="<?php echo $ingredient_ID; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Flavor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_name" value="<?php echo $ingredient_name; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_description" value="<?php echo $ingredient_description; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_price" value="<?php echo $ingredient_price; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_expiry" value="<?php echo $ingredient_expiry; ?>" required>
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
           

    <script>
        function openForm_item() {
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