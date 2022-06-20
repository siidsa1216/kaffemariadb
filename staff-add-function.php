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

</body>
</html>