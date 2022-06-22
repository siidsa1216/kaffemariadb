<?php
require 'condb.php';
include 'include/head.html';

$staffID="";
$staff_fname="";
$staff_mname="";
$staff_lname="";
$staff_address="";
$staff_contactno="";
$staff_position="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['staffID'])){
        header("location:/kaffemariadb/staff.php");
        exit;
    }

    $staffID = $_GET['staffID'];

    $sql = "SELECT * FROM staff WHERE staffID=$staffID";
    $result= $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/kaffemariadb/staff.php");
        exit;
    }

    $staff_fname=$row["staff_fname"];
    $staff_mname=$row["staff_mname"];
    $staff_lname=$row["staff_lname"];
    $staff_address=$row["staff_address"];
    $staff_contactno=$row["staff_contactno"];
    $staff_position=$row["staff_address"];

}
else{
    $staff_fname=$_POST["staff_fname"];
    $staff_mname=$_POST["staff_mname"];
    $staff_lname=$_POST["staff_lname"];
    $staff_address=$_POST["staff_address"];
    $staff_contactno=$_POST["staff_contactno"];
    $staff_position=$_POST["staff_position"];

    do {
        if(empty($staff_fname) || empty($staff_lname) || empty($staff_contactno) || empty($staff_address) || empty($staff_position)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        
        $staffID = $_GET['staffID'];

        $sql = "UPDATE staff ".
        "SET staff_fname = '$staff_fname', staff_mname = '$staff_mname',  staff_lname= '$staff_lname', staff_contactno='$staff_contactno', staff_address='$staff_address', staff_position='$staff_position' ".
        "WHERE staffID=$staffID ";
        
        $result= $connection->query($sql);

        if(!$result) 
        {
            $errorMessage ="Invalid query: ". $connection->error;
            break;      
        } 
        $successMessage = "Staff updated successfully!";

        header("location:/kaffemariadb/staff.php");
        exit;
    }while(false);

}
?>

<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    <div class="container my-5">
        <h2 style="margin:6px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bold;">STAFF LIST</h2>

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
            <input type="hidden" name="staffID" value="<?php echo $staffID; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_fname" value="<?php echo $staff_fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_mname" value="<?php echo $staff_mname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_lname" value="<?php echo $staff_lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_address" value="<?php echo $staff_address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_contactno" value="<?php echo $staff_contactno; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"style="color:#8E5431;font-size:18px;font-family: 'Georama'; letter-spacing:1px;">Position</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_position" value="<?php echo $staff_position; ?>">
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
                    <a class="btn btn-outline-primary" href="/kaffemariadb/staff.php" role="button" id="Cbutton">Cancel</a>
                </div>
            </div>  
        </form>  
    </div>
    <style type="text/css">

body {
margin-left: 300px;
margin-top: 110px;
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