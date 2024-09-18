<?php
session_start();
require 'db.php'; // Use require instead of include for mandatory files

// Check if the user is logged in
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
                <li><a href="cart_page.php"><i class='bx bx-cart'></i>
                        <p>Cart</p>
                    </a></li>
                <li><a href="#"><i class='bx bx-cog'></i>
                        <p>Settings</p>
                    </a></li>
                <li><a href="logout.php"><i class='bx bx-log-out'></i>
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
                try {
                    // Prepare the SQL query
                    $sql = "SELECT id, product_name, price, image FROM products";
                    $stmt = $con->prepare($sql);

                    // Execute the statement
                    $stmt->execute();

                    // Fetch results
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display results
                    foreach ($products as $row) { 
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 mb-4">';
                        echo '<div class="thumbnail">';
                        echo '<a href="products.php">';
                        echo '<img src="uploads/' . htmlspecialchars($row['image']) . '" class="img-fluid" alt="' . htmlspecialchars($row['product_name']) . '">';
                        echo '</a>';
                        echo '<div class="caption text-center">';
                        echo '<p id="autoResize">' . htmlspecialchars($row['product_name']) . '</p>';
                        echo '<p>Price: $' . htmlspecialchars($row['price']) . '</p>';
                        echo '<form action="cart.php" method="post">';
                        echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['id']) . '">';
                        echo '<input type="hidden" name="product_name" value="' . htmlspecialchars($row['product_name']) . '">';
                        echo '<input type="hidden" name="product_price" value="' . htmlspecialchars($row['price']) . '">';
                        echo '<button type="submit" class="btn btn-primary">Add to Cart</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    
                    }
                 catch (PDOException $e) {
                    echo '<p>Error fetching data: ' . $e->getMessage() . '</p>';
                }

                // No need to close PDO connection explicitly
                ?>
            </div>
        </div>
    </main>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
