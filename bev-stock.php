<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';


?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    
    <div class="bigside">
        <div class="container" style="margin:20px;">
            <h1 style="margin-left:-22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Beverage Table</h1>
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder; margin-left:10px; margin-top:30px;">
            <thead>
                <th>Beverage Name</th>
                <th>Beverage Size</th>
                <th>Beverage Quantity</th>
            </thead>
    
            <tbody>
                <?php
                //read all data inn the table
    
                $sql = "SELECT * FROM stock_master";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["product_name"]. "</td>
                    <td>".$row["product_size"]. "</td>
                    <td>".$row["product_qty"]. "</td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div> 

    <style type="text/css">
      #Abutton{
        border: 2px solid #C98860;
        background: 	#C98860;
		font-size: 13px;
		font-family: "Georama";
        font-weight: bold;
		cursor: pointer;
		color: white;
		transition: 0.8;
		border-radius: 8px;
		height: 30px;
		width: 120px;
		transition-duration: 0.4s;
		position:absolute;
        line-height: 13px;
        top:155px;
        left: 260px;
      }
      #Abutton:hover{
        background:  #FFF4ED;
        color:  #8E5431;
      }
      #newbev{
        background-color: #F5F5F5;
        border:3px solid #8E5431;
        border-radius: 20px;
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
.btn-group-sm>.btn, .btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
.btn-danger {
    color: #FFF4ED;
    background-color:  #C98860;
    border-color: #8E5431 ;
    border-radius:10px;
    border:2px solid;
}
.btn-danger:hover{
    color: #FFF4ED;
    background:#8E5431;
} 
</style>   
</body>
</html>