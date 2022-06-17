<?php
if(isset($_GET['staffID'])){
    $staff_ID = $_GET['staffID'];

    require 'condb.php';
    
    $sql = "DELETE FROM staff WHERE staffID = $staffID";
    $connection->query($sql);

    header("location:/kaffemariadb/staff.php");
    exit;

}
?>