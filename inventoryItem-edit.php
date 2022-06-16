<?php
 require 'condb.php';
 
$item_name="";
$item_qty="";
$item_size="";
$item_description="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
        // add new ingredient into the db
        $sql = "INSERT INTO item (item_name,item_qty,item_size,item_description)".
                "VALUES('$item_name','$item_qty', '$item_size','$item_description')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $item_name="";
        $item_qty="";
        $item_size="";
        $item_description="";

        $successMessage = "Item added successfully!";
        
        header("location:/kaffemariadb/home.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Item</h2>

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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_name" value="<?php echo $item_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_qty" value="<?php echo $item_qty; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_size" value="<?php echo $item_size; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Description</label>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/kaffemariadb/home.php" role="button">Cancel</button></a>
                </div>
            </div>  
        </form>  
    </div>
</body>
</html>