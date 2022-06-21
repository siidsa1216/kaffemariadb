<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    require 'condb.php';
    
    $sql = "DELETE FROM user WHERE id = $id";
    $connection->query($sql);

    header("location:/kaffemariadb/manageaccounts.php");
    exit;

}
?>