<?php
if(isset($_GET['sales_ID'])){
    $sales_ID = $_GET['sales_ID'];

    require 'condb.php';
    
    $sql = "DELETE FROM sales WHERE sales_ID = $sales_ID";
    $connection->query($sql);

    header("location:/kaffemariadb/pos-milktea.php");
    exit;

}
?>