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
            <div class="slider-container">
                <div class="image-container">
                    <img src="https://picsum.photos/id/237/500/300" alt="image" />
                    <img src="https://picsum.photos/id/1/500/300" alt="image" />
                    <img src="https://picsum.photos/id/10/500/300" alt="image" />
                    <img src="https://picsum.photos/id/20/500/300" alt="image" />
                    <img src="https://picsum.photos/id/200/500/300" alt="image" />
                </div>
                <i class="fas fa-angle-double-left btn prev"></i>
                <i class="fas fa-angle-double-right btn next"></i>
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