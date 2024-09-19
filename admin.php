<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style2.css">
    <title>Admin Page</title>
</head>

<body>
    <?php
    require 'header.php';
    ?>

    <div class="sidebar">
        <ul>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Add Product</a>
            </li>
            <li>
                <a href="#">Delete Products</a>
            </li>
            <li>
                <a href="#">Ordered Items</a>
            </li>
        </ul>
    </div>
</body>

</html>