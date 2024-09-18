<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
    exit;
}

$cart = $_SESSION['cart'];
$total_quantity = 0; // To store the total quantity of items in the cart
$total_price = 0;    // To store the total price of items in the cart
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h1>Your Shopping Cart</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo htmlspecialchars(number_format($item['price'], 2)); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>$<?php echo htmlspecialchars(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                    <td>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="remove_product_id" value="<?php echo $item['id']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php
                // Update the total quantity and total price
                $total_quantity += $item['quantity'];
                $total_price += $item['price'] * $item['quantity'];
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-summary">
        <h3>Cart Summary</h3>
        <p>Total Quantity of Items: <?php echo $total_quantity; ?></p> <!-- Displaying total quantity -->
        <p>Total Price: $<?php echo number_format($total_price, 2); ?></p> <!-- Displaying total price -->
    </div>

    <div class="checkout">
        <form action="checkout.php" method="post">
            <button type="submit">Proceed to Checkout</button>
        </form>
    </div>

</body>

</html>