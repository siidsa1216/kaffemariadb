<?php
require 'condb.php';
include 'include/pos-topbar.php';
include 'include/pos-head.html';

?>

<body>

<style type="text/css">

#box1{
        border: 2px solid #C98860;
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
		top: 230px;
		left: -5px;
        text-decoration: none;
        box-shadow: black;
    }

    #box1:hover{
        background:  #FFF4ED;
        color:  #8E5431;
    }

    #box2{
        border: 2px solid #C98860;
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
		top: 230px;
		left: 20px;
        text-decoration: none;
        box-shadow: black;
    }

    #box2:hover{
        background:  #FFF4ED;
        color:  #8E5431;
    }

    #box3{
        border: 2px solid #C98860;
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
		top: 230px;
		left: 20px;
        text-decoration: none;
        box-shadow: black;
    }

    #box3:hover{
        background:  #FFF4ED;
        color:  #8E5431;
    }
    
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    </style>
    
    </STYLE>
    <div class="bigside1">
    <div class="container my-0" style="margin:60px; font-size: 25px; font-family: 'Georama', sans-serif; color:#8E5431; font-weight: bold;">
        <?php 
        /*session_start();*/
        echo "Welcome"." ".$_SESSION['user']."!";?>
        <BR>
        <BR>
    <div class="container-fluid bg-#F3E3D3">
            <div class="row m-1">
                <div class="col  p-1 m-2 text-black text-center">
                    <picture>
                        <img src="img/HOT-COFFEE.png" alt="hot-coffee" width= 90% height=300px style= "border-shadow: 10px; border: 10px solid  #C98860;" >
                    </picture>
                    <a href="/kaffemariadb/pos-hotcoffee.php" class="text-black p-2" id="box1">Hot Coffee <br><br></a>
                </div>
                <div class="col   p-1 m-2 text-white text-center">
                    <picture>
                        <img src="img/ICED-COFFEE.png" alt="hot-coffee" width= 90% height=300px style= "border-radius: 10px; border: 10px solid #C98860;">
                    </picture>
                    <a href="/kaffemariadb/pos-icedcoffee.php" class="text-black  p-2" id="box2"> Iced Coffee <br><br></a>
                </div>
                <div class="col p-1 m-2 text-white text-center">
                    <picture>
                        <img src="img/MILKTEA.png" alt="hot-coffee" width= 90% height=300px style= "border-radius: 10px; border: 10px solid #C98860;">
                    </picture>
                    <a href="/kaffemariadb/pos-milktea.php" class="text-black p-2" id="box3">Milktea <br><br></a>
                </div>
            </div>
        </div>
     
    </div>
</body>
</html>
