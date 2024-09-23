<?php
session_start();
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

    <?php
    require 'header.php';

    // Check if cart exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo '<div style="margin-top: 70px; margin-left: 40%">';
        echo '<h2>Your Cart</h2>';
        echo '<table>';
        echo '<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>';
        echo '</div>';
        $total_cost = 0;

        foreach ($_SESSION['cart'] as $item) {
            $total = $item['price'] * $item['quantity'];
            echo '<tr>';
            echo '<td>' . htmlspecialchars($item['name']) . '</td>';
            echo '<td>$' . htmlspecialchars($item['price']) . '</td>';
            echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
            echo '<td>$' . htmlspecialchars($total) . '</td>';
            echo '<td>';
            echo '<form action="cart.php" method="post">';
            echo '<input type="hidden" name="remove_product_id" value="' . htmlspecialchars($item['id']) . '">';
            echo '<button type="submit" class="btn btn-danger">Remove</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';

            $total_cost += $total;
        }

        echo '</table>';
        echo '<p><strong>Total Cost: $' . htmlspecialchars($total_cost) . '</strong></p>';
        echo '<a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>';
        echo '</div>';



    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>