<?php
include 'db.php';
?>

<DOCTYPE>


    <html>
        

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">

        <title>s
            shopping
        </title>
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <header>
            <div class="logo">
                <h1>shopping</h1>
            </div>

            <div>
                <nav>
                    <ul>

                        <li>
                            <a href="signup.php">
                                <i class='bx bxs-user'></i>
                                <p>sign up</p>
                            </a>
                        </li>



                        <li>
                            <a href="login.php">
                                <i class='bx bx-log-in'></i>
                                <p>log-in</p>
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>

        </header>



        <main>
            <div id="slider">
                <figure>
                    <img src="images/bentley.jfif">
                    <img src="images/bugatti.jfif">
                    <img src="images/nissan.jfif">
                    <img src="images/porsche.jfif">
                    <img src="images/mclaren.jfif">
                </figure>
            </div>


            <section class="products">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="thumbnail">
                                <a href="products.php">
                                    <div class="car1">
                                        <img src="images/car3x.jfif" alt="Camera">
                                </a>
                                <center>
                                    <div class="caption">
                                        <p id="autoResize">Aston Martins</p>
                                        <p>Aston Martins available now.</p>
                                    </div>
                            </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <a href="products.php">
                                <div class="car2">
                                    <img src="images/car1x.jfif" alt="Watch">
                            </a>
                            <center>
                                <div class="caption">
                                    <p id="autoResize">Lambos</p>
                                    <p>Lambos available now.</p>
                                </div>
                        </div>
                        </center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <div lcass="car3">
                                <img src="images/car2x.jfif" alt="Shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">BMWs</p>
                                <p>BMWs available now.</p>
                            </div>
                    </div>
                    </center>

                </div>
                </div>
                </div>
            </section>

            </div>
        </main>

        <footer>

        </footer>





    </body>
    </html>

    <?php
    include 'db.php'
    ?>
    <html>
        