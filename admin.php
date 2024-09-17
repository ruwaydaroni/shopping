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
include 'db.php'; 
if ($con) {
} else {
    die("Failed to establish MySQLi connection: " . $con->connect_error);
}

$pName = $_POST['pName']; 
$price = $_POST['price']; 
$image = $_FILES['image'];

$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$targetFile = $targetDir . basename($image["name"]);


if (move_uploaded_file($image["tmp_name"], $targetFile)) {
   
    $sql = "INSERT INTO products (product_name, price, image) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Failed to prepare SQL statement: " . $con->error);
    }


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


$con->close();
?>
