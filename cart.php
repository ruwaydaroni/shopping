<?php
session_start();

// Handle adding items to the cart
if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    
    $product = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    );
    
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $product_exists = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity']++;
                $product_exists = true;
                break;
            }
        }
        if (!$product_exists) {
            $cart[] = $product;
        }
        $_SESSION['cart'] = $cart;
    } else {
        $_SESSION['cart'] = array($product);
    }

    // Redirect to cart page after adding item
    header('Location: cart_page.php');
    exit();
}

// Handle removing items from the cart
if (isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id'];
    
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $remove_product_id) {
                // Remove the item from the cart
                unset($_SESSION['cart'][$key]);
                
                // Reindex the array to avoid gaps
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
    
    // Redirect to cart page after removing item
    header('Location: cart_page.php');
    exit();
}

// If no valid actions, redirect back to home page
header('Location: home.php');
exit();
?>
