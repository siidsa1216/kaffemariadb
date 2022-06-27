<?php
require 'condb.php';
include 'include/head.html';

$beverage_No="";
$beverage_flavor="";
$beverage_qty="";
$beverage_size="";
$beverage_price="";
$payment_method="";
$category_ID="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['beverage_No'])){
        header("location:/kaffemariadb/bev.php");
        exit;
    }

    $beverage_No = $_GET['beverage_No'];
    $sql = "SELECT * FROM beverage WHERE beverage_No = $beverage_No";

    $result= $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/kaffemariadb/bev.php");
        exit;
    }

    $beverage_flavor= $row["beverage_flavor"];
    $beverage_qty= $row["beverage_qty"];
    $beverage_size= $row["beverage_size"];
    $beverage_price= $row["beverage_price"];

}

else{
    $beverage_flavor=$_POST["beverage_flavor"];
    $beverage_qty=$_POST["beverage_qty"];
    $beverage_size=$_POST["beverage_size"];
    $beverage_price=$_POST["beverage_price"];

    do {
        if(empty($beverage_flavor) || empty($beverage_qty) || empty($beverage_size) || empty($beverage_price)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 

        $beverage_No = $_GET['beverage_No'];

        $sql = "UPDATE beverage SET beverage_flavor = '$beverage_flavor', beverage_qty = '$beverage_qty',  beverage_size= '$beverage_size', beverage_price='$beverage_price';
        WHERE beverage_No=$beverage_No";

        $result= $connection->query($sql);

        if(!$result) 
        {
            $errorMessage ="Invalid query: ". $connection->error;
            break;      
        } 
        $successMessage = "Supplier updated successfully!";

        header("location:/kaffemariadb/bev.php");
        exit;
    }while(false);

}
?>

<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div class="container my-5">
        <h2 style="margin:6px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bold;">EDIT BEVERAGE</h2>

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
            <input type="hidden" name="beverage_No" value="<?php echo $beverage_No; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">beverage_flavor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_flavor" value="<?php echo $beverage_flavor; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">beverage_qty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_qty" value="<?php echo $beverage_qty; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">beverage_size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_size" value="<?php echo $beverage_size; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">beverage_price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_price" value="<?php echo $beverage_price; ?>">
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
                    <a class="btn btn-outline-primary" href="/kaffemariadb/bev.php" role="button" id="Cbutton">Cancel</a>
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