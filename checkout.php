<?php
session_start();
require 'db.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user_id'];
    $cart = $_SESSION['cart'];

    try {
        // Start transaction
        $con->beginTransaction();

        // Insert each item in the cart into the 'ordered' table
        foreach ($cart as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            $price = $item['price'];  // Retrieve the price from the cart

            // Insert the order details into the 'ordered' table
            $stmt = $con->prepare("INSERT INTO ordered (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $product_id, $quantity, $price]);
        }


        $con->commit();


        unset($_SESSION['cart']);

        echo "<p>Order placed successfully!</p>";
        echo '<a href="home.php" class="btn btn-primary">Back to Home</a>';
    } catch (Exception $e) {

        $con->rollBack();
        echo "Failed to place order: " . $e->getMessage();
    }
} else {
    echo '<p>Your cart is empty. <a href="home.php">Go back to shop.</a></p>';
}
?>