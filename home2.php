<?php
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style2.css">
    <title>Shopping</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1>Shopping</h1>
        </div>
        <nav>
            <ul>
                <li><a href="cart.php"><i class='bx bx-cart'></i>
                        <p>Cart</p>
                    </a></li>
                <li><a href="#"><i class='bx bx-cog'></i>
                        <p>Settings</p>
                    </a></li>
                <li><a href="#"><i class='bx bx-log-out'></i>
                        <p>Logout</p>
                    </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Slider Section -->
        <div id="slider">
            <figure>
                <img src="images/bentley.jfif" alt="Bentley">
                <img src="images/bugatti.jfif" alt="Bugatti">
                <img src="images/nissan.jfif" alt="Nissan">
                <img src="images/porsche.jfif" alt="Porsche">
                <img src="images/mclaren.jfif" alt="McLaren">
            </figure>
        </div>

        <!-- Product Section -->
        <div class="container mt-4">
            <div class="row">
                <?php
                include 'db.php';

                $Query = "SELECT product_name, price, image FROM products";
                if ($result = $con->query($Query)) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 mb-4">';
                        echo '<div class="thumbnail">';
                        echo '<a href="products.php">';
                        echo '<img src="uploads/' . htmlspecialchars($row['image']) . '" class="img-fluid" alt="' . htmlspecialchars($row['product_name']) . '">';
                        echo '</a>';
                        echo '<div class="caption text-center">';
                        echo '<p id="autoResize">' . htmlspecialchars($row['product_name']) . '</p>';
                        
                        echo '<p>Price: $' . htmlspecialchars($row['price']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    $result->free();
                } else {
                    echo '<p>Error fetching data</p>';
                }

                $con->close();
                ?>
            </div>
        </div>
    </main>



    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>