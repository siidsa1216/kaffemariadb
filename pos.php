<?php
require 'condb.php';
include 'include/pos-topbar.html';
include 'include/pos-head.html';
?>

<body>
    <div class="bigside1">
        <div class="container my-1">
            <h1>Welcome!</h1>
        </div>
        <div class="container-fluid bg-light">
            <div class="row m-2">
                <div class="col  p-1 m-2 text-black text-center">
                    <picture>
                        <img src="img/hot-coffee.jpg" alt="hot-coffee" width= 100% height=300px>
                    </picture>
                    <a href="/kaffemariadb/pos-hotcoffee.php" class="text-black p-2"><br> Hot Coffee <br><br></a>
                </div>
                <div class="col   p-1 m-2 text-white text-center">
                    <picture>
                        <img src="img/hot-coffee.jpg" alt="hot-coffee" width= 100% height=300px>
                    </picture>
                    <a href="/kaffemariadb/pos-icedcoffee.php" class="text-black  p-2"><br> Iced Coffee <br><br></a>
                </div>
                <div class="col p-1 m-2 text-white text-center">
                    <picture>
                        <img src="img/hot-coffee.jpg" alt="hot-coffee" width= 100% height=300px>
                    </picture>
                    <a href="/kaffemariadb/pos-milktea.php" class="text-black p-2"><br>Milktea <br><br></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>