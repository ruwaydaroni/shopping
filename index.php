<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <title>
        shopping
    </title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header>
        <div>
            <h1>shopping</h1>
        </div>

        <div>
            <nav>
                <ul>

                    <li>
                        <a href="">
                            <i class='bx bx-cart'></i>
                            <p>cart</p>
                        </a>
                    </li>


                    <li>
                        <a href="">
                            <i class='bx bx-cog'></i>
                            <p>setting</p>
                        </a>
                    </li>


                    <li>
                        <a href="">
                            <i class='bx bx-log-out'></i>
                            <p>logout</p>
                        </a>
                    </li>

                </ul>

            </nav>
        </div>

    </header>

    <main>

        <section class="hero">
            <div class="hero">
                <div class="slides active" style="background-image: url(img1.png);"></div>
                <div class="slide" style="background-image: url(img1.png);"></div>
                <div class="slide" style="background-image: url(images/car3.jpeg);"></div>
            </div>
            <div class="controls">
                <button id="prev">Previous</button>
                <button id="next">Next</button>
            </div>

        </section>
        <section class="products">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <a href="products.php">
                                <img src="img/camera.jpg" alt="Camera">
                            </a>
                            <center>
                                <div class="caption">
                                    <p id="autoResize">Cameras</p>
                                    <p>Choose among the best available in the world.</p>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <a href="products.php">
                                <img src="img/watch.jpg" alt="Watch">
                            </a>
                            <center>
                                <div class="caption">
                                    <p id="autoResize">Watches</p>
                                    <p>Original watches from the best brands.</p>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <a href="products.php">
                                <img src="img/shirt.jpg" alt="Shirt">
                            </a>
                            <center>
                                <div class="caption">
                                    <p id="autoResize">Shirts</p>
                                    <p>Our exquisite collection of shirts.</p>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>

    </footer>





</body>