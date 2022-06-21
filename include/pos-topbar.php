

<div class="topbar" style="height: 100px;">
    <nav class="navbar navbar-expand-sm text-dark text-center ">
        <div class="container-fluid m-2">
            <label>KAFFE MARIA POS AND INVENTORY SYSTEM</label>
        </div>
        <div class="container-fluid col-2 ml-2">
            <div class="row">
                <div class="col-9 mt-4">
                    <h5 style="margin-left:-15px;"><?php session_start();
                    echo "".$_SESSION['user'];?></h5>
              </div>
                <div class="col-3 mt-1">
                    <a class="navbar-brand" href="#">
                        <img src="img\favicon.ico" class="img-profile rounded-circle" style="margin-left: -25px;"> 
                      </a>
                </div>
                <!--display the name of the logged in admin-->
              
            </div>
        </div>
      </nav>
</div>