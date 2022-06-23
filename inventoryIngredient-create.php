<?php
require 'condb.php';


$ingredient_name="";
$ingredient_description="";
$ingredient_price="";
$ingredient_expiry="";

$errorMessage = ""; 
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $ingredient_name=$_POST["ingredient_name"];
    $ingredient_description=$_POST["ingredient_description"];
    $ingredient_price=$_POST["ingredient_price"];
    $ingredient_expiry=$_POST["ingredient_expiry"];
    
    do {
        if(empty($ingredient_name) || empty($ingredient_description) || empty($ingredient_price) || empty($ingredient_expiry)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new ingredient into the db
        $sql = "INSERT INTO ingredient (ingredient_name,ingredient_description,ingredient_price,ingredient_expiry)".
                "VALUES('$ingredient_name','$ingredient_description','$ingredient_price', '$ingredient_expiry')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $ingredient_name="";
        $ingredient_description="";
        $ingredient_price="";
        $ingredient_expiry="";

        $successMessage = "Ingredient added successfully!";
        
        header("location:/kaffemariadb/inventory.php");
        exit;

    }while(false);
}
?>
<body>
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <h2 style="margin-left:-22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Ingredient Table</h2>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder; margin-left:-20px; margin-top:30px;">
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
    <div class="container" id="newbev" >
    <center>
        <h1 style="color:#8E5431;font-size:20px;font-family: 'Georama'; Font-weight:bold; margin-top:20px; margin-bottom:20px;letter-spacing:1px;">NEW INGREDIENT</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="ingredient_ID" value="<?php echo $ingredient_ID; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Ingredient Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_name" value="<?php echo $ingredient_name; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_description" value="<?php echo $ingredient_description; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Ingredient Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient_price" value="<?php echo $ingredient_price; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label"style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Expiration Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="ingredient_expiry" value="<?php echo $ingredient_expiry; ?>" required style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">
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
        <br>

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