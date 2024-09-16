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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pName = $_POST['pName'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $targetDir = "images/";
    $targetFile = $targetDir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a real image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
    } else {
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO products (product_name, price, image) VALUES (:pName, :price, :image)";
            $stmt = $con->prepare($sql);
            $stmt->execute(['pName' => $pName, 'price' => $price, 'image' => $image['name']]);
            echo "Product submission successfully!";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

       
