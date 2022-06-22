<?php
require 'condb.php';
include 'include/head.html';

$supplier_ID="";
$supplier_fname="";
$supplier_mname="";
$supplier_lname="";
$supplier_ContactNo="";
$supplier_address="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['supplier_ID'])){
        header("location:/kaffemariadb/home.php");
        exit;
    }

    $supplier_ID = $_GET['supplier_ID'];

    $sql = "SELECT * FROM supplier WHERE supplier_ID=$supplier_ID";
    $result= $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/kaffemariadb/home.php");
        exit;
    }

    $supplier_fname=$row["supplier_fname"];
    $supplier_mname=$row["supplier_mname"];
    $supplier_lname=$row["supplier_lname"];
    $supplier_ContactNo=$row["supplier_ContactNo"];
    $supplier_address=$row["supplier_address"];

}
else{
    $supplier_fname=$_POST["supplier_fname"];
    $supplier_mname=$_POST["supplier_mname"];
    $supplier_lname=$_POST["supplier_lname"];
    $supplier_ContactNo=$_POST["supplier_ContactNo"];
    $supplier_address=$_POST["supplier_address"];

    do {
        if(empty($supplier_fname) || empty($supplier_lname) || empty($supplier_ContactNo) || empty($supplier_address)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        
        $supplier_ID = $_GET['supplier_ID'];

        $sql = "UPDATE supplier ".
        "SET supplier_fname = '$supplier_fname', supplier_mname = '$supplier_mname',  supplier_lname= '$supplier_lname', supplier_ContactNo='$supplier_ContactNo', supplier_address='$supplier_address' ".
        "WHERE supplier_ID=$supplier_ID ";
        
        $result= $connection->query($sql);

        if(!$result) 
        {
            $errorMessage ="Invalid query: ". $connection->error;
            break;      
        } 
        $successMessage = "Supplier updated successfully!";
        header("location:/kaffemariadb/supplier.php");
        exit;
    }while(false);

}
?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div class="container my-5">
        <h2 style="margin:6px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bold;">NEW SUPPLIER</h2>

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
            <input type="hidden" name="supplier_ID" value="<?php echo $supplier_ID; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_fname" value="<?php echo $supplier_fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_mname" value="<?php echo $supplier_mname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_lname" value="<?php echo $supplier_lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_ContactNo" value="<?php echo $supplier_ContactNo; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="supplier_address" value="<?php echo $supplier_address; ?>">
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
                    <a class="btn btn-outline-primary" href="/kaffemariadb/supplier.php" role="button" id="Cbutton">Cancel</a>
                </div>
            </div>  
        </form>  
    </div>
    <style type="text/css">

body {
margin-left: 300px;
margin-top: 120px;
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