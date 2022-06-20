<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="kaffemariadb"; //name y=of your db 

$connection = new mysqli($servername,  $username, $password, $database); 

if(!$connection = mysqli_connect($servername,  $username, $password, $database))
{
    die("Connection Failes". mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_name=$_POST["user_name"];
    $password=$_POST["password"];

    $sql="SELECT * FROM user WHERE user_name= '".$user_name."' AND  password= '".$password."' ";

    $result=mysqli_query($connection,$sql);

    $row=mysqli_fetch_array($result);

    if($row["user_type"]=="user"){
        header("Location:pos.php");
    }

    if($row["user_type"]=="admin"){
        header("Location:home.php");
    }

    else{
        echo"username or password is incorrect!";
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <style type="text/css">
    body{
        background-color: #F3E3D3;
    }

    
    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: none;
        width: 60%;
        color: black;
        text-align: left;
    }

    #button{
        padding: 10px;
        width: 100px;
        color:black;
        background-color: white;
        border: none;
    }

    #box{
        background: #8E5431;
        border: 1px solid rgba(0, 0, 0, 0.6);
        margin: auto;
        margin-top: 150px;
        width:300px;
        padding:20px;
        color: white;
        border-radius: 20px;
    }
    #signup{

    }
    </style>
    
<div id="box">
    <form action="#" method="POST">

        
	<div>
		<label>username</label>
		<input type="text" name="user_name" required>
	</div>

	<div>
		<label>password</label>
		<input type="password" name="password" required>
	</div>

	<div>
		<input type="submit" value="Login">
	</div>
    </form>   
</div>
</body>
</html>