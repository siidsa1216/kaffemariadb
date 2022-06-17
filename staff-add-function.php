<?php
 require 'condb.php';
 
 $staffID="";
 $staff_fname="";
 $staff_mname="";
 $staff_lname="";
 $staff_address="";
 $staff_contactno="";
 $staff_position="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $staff_fname=$_POST["staff_fname"];
    $staff_mname=$_POST["staff_mname"];
    $staff_lname=$_POST["staff_lname"];
    $staff_address=$_POST["staff_address"];
    $staff_contactno=$_POST["staff_contactno"];
    $staff_address=$_POST["staff_address"];
    $staff_position=$_POST["staff_position"];
    
    do {
        if(empty($staff_fname) || empty($staff_lname) || empty($staff_contactno) || empty($staff_address) || empty($staff_position))
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new client into the db
        $sql = "INSERT INTO staff (staff_fname,staff_mname,staff_lname,staff_address,staff_contactno,staff_position)".
                "VALUES('$staff_fname', '$staff_mname','$staff_lname','$staff_address', '$staff_contactno', '$staff_position')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $staffID="";
        $staff_fname="";
        $staff_mname="";
        $staff_lname="";
        $staff_address="";
        $staff_contactno="";
        $staff_position="";
        
        $successMessage = "Supplier added successfully!";
        
        header("location:/kaffemariadb/staff.php");
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
    <title>Staff List</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Staff</h2>

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
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_fname" value="<?php echo $staff_fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Middle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_mname" value="<?php echo $staff_mname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_lname" value="<?php echo $staff_lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_address" value="<?php echo $staff_address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact No.</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staff_contactno" value="<?php echo $staff_contactno; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Position</label>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/kaffemariadb/staff.php" role="button">Cancel</button></a>
                </div>
            </div>  
        </form>  
    </div>
</body>
</html>