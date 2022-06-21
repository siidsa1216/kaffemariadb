<?php
 require 'condb.php';

$firstName="";
$middleName="";
$lastName="";
$user_name="";
$password="";
$user_type="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstName=$_POST["firstName"];
    $middleName=$_POST["middleName"];
    $lastName=$_POST["lastName"];
    $user_name=$_POST["user_name"];
    $password=$_POST["password"];
    $user_type=$_POST["user_type"];
    
    do {
        if(empty($firstName) || empty($middleName) ||empty($lastName) ||empty($user_name) || empty($password) || empty($user_type)) 
        {
            $errorMessage = "Please fill up the required fields";
        break;        
        } 
        // add new ingredient into the db
        $sql = "INSERT INTO user (firstName,middleName,lastName,user_name,password,user_type)".
                "VALUES('$firstName','$middleName','$lastName','$user_name','$password', '$user_type')";
       
        $result= $connection->query($sql);

        if (!$result){
            $errorMessage= "Invalid query: ".$connection->error;
            break;
        }

        $firstName="";
        $middleName="";
        $lastName="";
        $user_name="";
        $password="";
        $user_type="";

        $successMessage = "User added successfully!";
        
        header("location:/kaffemariadb/manageaccounts.php");
        exit;

    }while(false);
}
?>

