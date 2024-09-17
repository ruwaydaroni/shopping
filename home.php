<!--

?php
include 'db.php';
?
-->
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
                            <a href="cart.php">
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
            <div id="slider">
                <figure>
                    <img src="images/bentley.jfif">
                    <img src="images/bugatti.jfif">
                    <img src="images/nissan.jfif">
                    <img src="images/porsche.jfif">
                    <img src="images/mclaren.jfif">
                </figure>
            </div>


                                    <?php
include 'db.php';  



$Query = "SELECT product_name, price, image FROM products";

if ($result = $con->query($Query)) {
    
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-xs-4">';
        echo '<div class="thumbnail">';
        echo '<a href="products.php">';
        echo '<div class="car1">';
        echo '<img src="images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['product_name']) . '">';
        echo '</a>';
        echo '<center>';
        echo '<div class="caption">';
        echo '<p id="autoResize>' . htmlspecialchars($row['product_name']) . '</p>';
        echo '<p>Description not available in query, add if needed</p>';
        echo '<br>';
        echo '<p>Price: $' . htmlspecialchars($row['price']) . '</p>';
        echo '</div>';
        echo '</centre>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        

    
    }

    
    $result->free();
} else {
}

$con->close();
?>
    

</section>

            </div>
        </main>

        <footer>

        </footer>



         </body>
        </html>



    