<?php
require 'db.php';
?>

<DOCTYPE>
    <html>
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style2.css">
    
</head>
<body>
<?php
require 'header.php';
?>
<div class="signup">
        <div class="card">
            <form action="admin.php" enctype="multipart/form-data" method="post">
                <label for="pName">Product Name</label>
                <input type="text" name="pName" placeholder="insert product name">
                <label for="price">Price</label>
                <input type="number" name="price" placeholder="insert price">
                <label for="image">Upload Image</label>
                <input type="file" name="image" placeholder="insert image">
                <br>
                <button type="submit" value="submit">submit</button>
            </form>
        </div>
</body>

<?php
include 'db.php';  // Ensure this points to the correct location of db.php

if ($con) {
    // Connection is successful
    // echo "MySQLi connection is established!";
} else {
    die("Failed to establish MySQLi connection: " . $con->connect_error);
}

// Assuming form data is sent via POST method and image file via $_FILES
$pName = $_POST['pName']; // Product name from form
$price = $_POST['price']; // Price from form
$image = $_FILES['image']; // Image file from form

// Define the target directory for the uploaded image
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create the directory with proper permissions
}

$targetFile = $targetDir . basename($image["name"]);

// Check if the image was uploaded successfully
if (move_uploaded_file($image["tmp_name"], $targetFile)) {
    // Prepare the SQL statement for MySQLi
    $sql = "INSERT INTO products (product_name, price, image) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Failed to prepare SQL statement: " . $con->error);
    }

    // Bind the parameters and execute the statement
    // 'sds' means: s = string, d = double (or float), s = string
    $stmt->bind_param("sds", $pName, $price, $image['name']);
    $result = $stmt->execute();

    if ($result) {
        echo "Product submission successful!";
    } else {
        echo "Error: Could not submit product.";
    }
} else {
    echo "Error: Image upload failed.";
}

// Close the MySQLi connection
$con->close();
?>
