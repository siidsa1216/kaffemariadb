<div class="topbar">
    <nav class="navbar navbar-expand-sm text-dark text-center ">
        <div class="container-fluid m-2">
            <a class="logotxt" href="home.php">KAFFE MARIA POS AND INVENTORY SYSTEM</a>
        </div>
        <div class="container-fluid col-2 ml-2">
            <div class="row">
                <div class="col-9 mt-2">
                    <text><?php session_start();
                    echo "".$_SESSION['user'];?></text>
                </div>
                <div class="col-3">
                    <a class="navbar-brand" href="#">
                        <img src="img\favicon.ico" alt="Avatar Logo" style="width:35px;" class="rounded-pill"> 
                      </a>
                </div>
                <!--display the name of the logged in admin-->
              
            </div>
        </div>
      </nav>
</div>