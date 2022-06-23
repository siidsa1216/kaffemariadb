<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'inventoryItem-create.php';

?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div>
    <div class="bigside">
        <div class="container my-5" style="margin:22px;">
            <div>
            <div class="container my-5" style="margin:22px;">
            <h2 style="margin-left:-20px;top:20px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Item Table</h2>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm_item()" id="AButton">Add Item</a>
            <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder; margin-left:-20px; margin-top:30px;">
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
        left: 300px;
      }
      #Abutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
      #Sbutton_Item{
        background-color: #C98860;
        border:2px solid #C98860;
        border-radius; 5px;
      }
      #Sbutton_Item:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
      #Cbutton_Item{
        background-color: #8E5431;
        border:2px solid #8E5431;
        border-radius; 5px;
        color:white;
      }
      #Cbutton_Item:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
</style> 
            <!--POPUP FORM FOR ADD INGREDIENT-->
    <div class="container" id="newbev" style="background-color: #F5F5F5;
        border:3px solid #8E5431;
        border-radius: 20px;">
    <center>
        <h1 style="color:#8E5431;font-size:20px;font-family: 'Georama'; Font-weight:bold; margin-top:20px; margin-bottom:20px;letter-spacing:1px;">New Item</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="item_No" value="<?php echo $item_No; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Item Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_name" value="<?php echo $item_name; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Item Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_qty" value="<?php echo $item_qty; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Item Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_size" value="<?php echo $item_size; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label" style="color:#8E5431;font-size:15px;font-family: 'Georama'; letter-spacing:1px;">Item Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_description" value="<?php echo $item_description; ?>" required>
                </div>
            </div>

             <div class="row mb-3">
                <div class="col-sm-6 d-grid">
                    <button type="submit" onclick="JSalert()" class="btn btn-primary" id="Sbutton_Item">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button" id="Cbutton_Item">Cancel</a>
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

    