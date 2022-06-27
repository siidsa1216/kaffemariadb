<?php
require 'condb.php';
include 'include/sidebar.html';
include 'include/topbar.php';
include 'include/head.html';
include 'bev-create.php';

?>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama&family=Ubuntu&display=swap" rel="stylesheet">
    
    <div class="bigside">
        <div class="container" style="margin:20px;">
            <h1 style="margin-left:-22px; font-size:40px;font-family: 'Georama', sans-serif; letter-spacing:2px;; color:#8E5431; font-weight: bolder;">Beverage Table</h1>
            <a class="btn btn-primary" role="button" class="open-button" onclick="openForm()" id="Abutton">Add Beverage</a>
        </div>
        <table class="table" style="color:#8E5431;font-family: 'Georama', sans-serif;font-weight: bolder; margin-left:10px; margin-top:30px;">
            <thead>
                <th>Beverage No.</th>
                <th>Flavor</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
    
            <tbody>
                <?php
                //read all data inn the table
    
                $sql = "SELECT * FROM beverage";
                $result= $connection->query($sql);
    
                if (!$result){
                    die("Invalid query: ".$connection->error);
                }
    
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["beverage_No"]. "</td>
                    <td>".$row["beverage_flavor"]. "</td>
                    <td>".$row["beverage_qty"]. "</td>
                    <td>".$row["beverage_size"]. "</td>
                    <td>".$row["beverage_price"]. "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/kaffemariadb/bev-edit.php?beverage_No=$row[beverage_No]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/kaffemariadb/bev-delete.php?beverage_No=$row[beverage_No]'>Delete</a>
                    </td>
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
      .btn-primary {

color: #8E5431;

background-color: #FFF4ED;

border-color: #8E5431;

border-radius:10px;

}

.btn-primary:hover {

color: #FFF4ED;

background:#8E5431;

border-color: #8E5431;

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
    <!--POPUP FORM FOR ADD BEVERAGE-->
    <div class="container" id="newbev">
    <center>
        <h1>New Beverage</h1>
         <form method = 'POST' id='pop-upform'>
            <input type="hidden" name="beverage_No" value="<?php echo $beverage_No; ?>">
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Flavor</label>
                <div class="col-sm-6">
                    <select class="form-control" name="beverage_name">
                        <?php
                            $res=mysqli_query($connection, "SELECT * FROM beverage_name");
                            while($row =$res->fetch_assoc())
                            {
                                echo "<option>";
                                echo $row["beverage_name"];
                                echo "</option>";
                            }
                        ?>
                    </select>
                    </div>
                </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_qty"> <!--value="<?php echo $beverage_qty; ?>" required-->
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Size</label>
                <div class="col-sm-6">
                    <select class="form-control" name="beverage_size">
                        <?php
                            $res=mysqli_query($connection, "SELECT * FROM beverage_size");
                            while($row =$res->fetch_assoc())
                            {
                                echo "<option>";
                                echo $row["beverage_size"];
                                echo "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="beverage_price"> <!--value="<?php echo $beverage_price; ?>" required-->
                </div>
            </div>

            <?php
            ?>
             <div class="row mb-3">
                <div class="col-sm-6 d-grid">
                    <button type="submit" onclick="JSalert()" class="btn btn-primary" name="submit" id="Sbutton">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" onclick="closeForm()" role="button"id="Cbutton">Cancel</a>
                </div>
            </div>  
        </form> 
        </center> 
            </div>
           

    <script>
        function openForm() {
        document.getElementById("newbev").style.display = "block";
        }

        function closeForm() {
        document.getElementById("newbev").style.display = "none";
        }
        </script>

        <script type="text/javascript">
             function JSalert() {
	    alert("Successfully added.");
        }
        </script>
       
      
</style> 


</body>
</html>