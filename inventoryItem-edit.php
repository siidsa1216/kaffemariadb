<?php
require 'condb.php';
include 'include/head.html';

$item_name="";
$item_qty="";
$item_size="";
$item_description="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['item_No'])){
        header("location:/kaffemariadb/inventory.php");
        exit;
    }

    $item_No = $_GET['item_No'];

    $sql = "SELECT * FROM item WHERE item_No=$item_No";
    $result= $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/kaffemariadb/inventory.php");
        exit;
    }

    $item_name=$row["item_name"];
    $item_qty=$row["item_qty"];
    $item_size=$row["item_size"];
    $item_description=$row["item_description"];

}
else{
    $item_name=$_POST["item_name"];
    $item_qty=$_POST["item_qty"];
    $item_size=$_POST["item_size"];
    $item_description=$_POST["item_description"];

    do {
        if(empty($item_name) || empty($item_qty) || empty($item_size) || empty($item_description)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        
        $item_No = $_GET['item_No'];

        $sql = "UPDATE item ".
        "SET item_name = '$item_name', item_qty = '$item_qty',  item_size= '$item_size', item_description='$item_description' ".
        "WHERE item_No=$item_No ";
        
        $result= $connection->query($sql);

        if(!$result) 
        {
            $errorMessage ="Invalid query: ". $connection->error;
            break;      
        } 
        $successMessage = "Item updated successfully!";

        header("location:/kaffemariadb/inventory-item.php");
        exit;
    }while(false);

}
?>

<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div class="container my-5">
        <h2 style="margin:6px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bold;">EDIT ITEM</h2>

        <?php
        if (!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role= 'alert'>
            <strong> $errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

        ?>
        <form method = 'POST'>
            <input type="hidden" name="item_No" value="<?php echo $item_No; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Item Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_name" value="<?php echo $item_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Item Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_qty" value="<?php echo $item_qty; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Item Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_size" value="<?php echo $item_size; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Item Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_description" value="<?php echo $item_description; ?>">
                </div>
            </div>
            
            <?php
            if (!empty($successMessage)){
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role= 'alert'>
                <strong> $successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
             <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" id="Sbutton">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/kaffemariadb/home.php" role="button" id="Cbutton">Cancel</a>
                </div>
            </div>  
        </form>  
    </div>
    <style type="text/css">

body {
margin-left: 300px;
margin-top: 150px;
font-family: Georama;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #212529;
text-align: left;
background-color: #F3E3D3;
position: relative;
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
</body>
</html>