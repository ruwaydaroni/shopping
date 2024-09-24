<?php
session_start(); // Start the session

require 'db.php'; // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Handle product deletion
if (isset($_POST['delete_product_id'])) {
    $delete_product_id = $_POST['delete_product_id'];

    try {
        // Prepare SQL to delete the product
        $sql = "DELETE FROM products WHERE id = ? AND user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$delete_product_id, $user_id]); // Pass the product ID and user ID to the query

        // Optionally, you can provide feedback
        echo '<div class="alert alert-success">Product deleted successfully!</div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Error deleting product: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
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
    <title>Your Products</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1>Your Products</h1>
        </div>
        <nav>
            <ul>
                <li><a href="cart_page.php"><i class='icon1 bx bx-cart'></i>
                        <p>Cart</p>
                    </a></li>
                <li><a href="#"><i class='icon2 bx bx-cog'></i>
                        <p>Settings</p>
                    </a></li>
                <li><a href="logout.php"><i class='icon3 bx bx-log-out'></i>
                        <p>Logout</p>
                    </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            <h3>All Your Uploaded Products</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        // Prepare SQL to fetch all products uploaded by the logged-in user
                        $sql = "SELECT product_name, price, quantity, image, id FROM products WHERE user_id = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->execute([$user_id]); // Pass the user_id to the query

                        $user_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($user_products) > 0) {
                            foreach ($user_products as $row) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['product_name']) . '</td>';
                                echo '<td>$' . htmlspecialchars($row['price']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
                                echo '<td><img src="uploads/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" style="width: 50px; height: 50px;"></td>';
                                echo '<td>';
                                echo '<form action="" method="post" style="display:inline;">';
                                echo '<input type="hidden" name="delete_product_id" value="' . htmlspecialchars($row['id']) . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                                echo '</form>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">You have not uploaded any products yet.</td></tr>';
                        }
                    } catch (PDOException $e) {
                        echo '<tr><td colspan="5">Error fetching your products: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
