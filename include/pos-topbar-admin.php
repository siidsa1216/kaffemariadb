

<div class="topbar" style="height: 80px; width:auto;">
    <nav class="navbar navbar-expand-sm text-dark text-center ">
        <div class="container-fluid m-2">
        <a class="logotxt" href="home.php" style="font-family: 'Georama';font-size: 25px;sans-serif;font-weight:bold;color: #834a11;margin-left: 5px;margin-top: 5px; line-height:50px;">KAFFE MARIA POS AND INVENTORY SYSTEM</a>
        </div>
        <div class="container-fluid col-2 ml-2">
            <div class="row">
                <div class="col-9 mt-4">
                    <h5 style="margin-left:50px; font-family: 'Georama';font-size: 16px;sans-serif;font-weight:bold;color: #834a11; position:fixed;"><?php session_start();
                    echo "".$_SESSION['user'];?></h5>
              </div>
                <div class="col-3 mt-1">
                    <a class="navbar-brand" href="#">
                        <img src="img\icon.jpg" class="img-profile rounded-circle" style="margin-left: 50px; width:40px; margin-top:2px;"> 
                      </a>
                </div>
                <!--display the name of the logged in admin-->
              
            </div>
        </div>
      </nav>
</div>