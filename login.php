<?php
session_start();
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
        $_SESSION['user'] = $user_name;
        header("Location:pos-user.php");
    }

    if($row["user_type"]=="admin"){
        $_SESSION['user'] = $user_name;
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
        width: 75%;
        color:  black;
        text-align: left;
        font-size: 18px;
        font-family: 'Georama';
    }

    #text1{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: none;
        width: 75%;
        color:  black;
        text-align: left;
        margin-left: 5px;
        font-size: 18px;
        font-family: 'Georama';
    }

    #bodytext{
       font-family: "Georama";
       font-weight: 700px;
       font-size: 26px;
       margin-top:10px;

    }

    #button{
        padding: 10px;
        width: 100px;
        color: #F3E3D3;
        background-color: #EFCEAD;
        border: none;
    }


    #box{
        background: #8E5431;
        border: 1px solid rgba(0, 0, 0, 0.6);
        margin: auto;
        margin-top: 130px;
        margin-left: 295px;
        width:580px;
        height: 180px;
        padding:85px;
        color:  #F3E3D3;
        border-radius: 20px;
        position:absolute;
    }

    #headbox{
    box-sizing: border-box;
    position: absolute;
    width: 400px;
    height: 90px;
    margin-left: 87px;
    margin-top: -300px;
    background: #C98860;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    border-radius: 8px;
    font-family: 'Georama', sans-serif;
    }
    
    #box2{
        border: 1px solid #C98860;
        background: 	#C98860;
		font-size: 18px;
		font-family: "Georama";
        font-weight: 700px;
		cursor: pointer;
		margin: 10px;
		color: white;
		transition: 0.8;
		border-radius: 8px;
		height: 45px;
		width: 120px;
		transition-duration: 0.4s;
		position:absolute;
        margin: 100px;
		top: 137px;
		left: 215px;
    }

    #box2:hover{
        background:  #FFF4ED;
        color:  #8E5431;
    }

    ::-webkit-input-placeholder {
        color: #C98860;

    }
   
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    </style>
    
<div id="box">
    <form action="#" method="POST">

        
	<div>
		<label><p id= "bodytext">Username</label>
		<input id="text" type="username" name="user_name" required placeholder="Username">
	</div>

	<div>
		<label><p id= "bodytext">Password</label>
		<input id="text1" type="password" name="password" required placeholder="Password">
	</div>

	<div>
    <button type="submit" value="Login" id="box2">Login</button></a> <br>
	</div>
    </form>  
    <div id= "headbox"><div style="font-size: 50px;margin: 10px;color:  #F3E3D3;text-align: center; line-height:70px;margin-top: 7px;">LOGIN</div> 
</div>
</body>
</html>
