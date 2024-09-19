<?php
// Include the database connection
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style2.css">
    <title>Admin - Add Product</title>
</head>

<body>

    <?php
    require 'header.php';
    ?>

    <div class="signup">
        <div class="card">
            <form action="admin.php" enctype="multipart/form-data" method="post">
                <label for="pName">Product Name</label>
                <input type="text" name="pName" placeholder="Insert product name" required>

                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" placeholder="Insert price" required>

                <label for="image">Upload Image</label>
                <input type="file" name="image" required>

                <br>
                <button type="submit" value="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ensure form data is submitted
        if (isset($_POST['pName']) && isset($_POST['price']) && isset($_FILES['image'])) {

            $pName = $_POST['pName'];
            $price = $_POST['price'];
            $image = $_FILES['image'];

            // Ensure valid image file
            $targetDir = "uploads/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($image["name"]);

            // Check if image was uploaded successfully
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                try {
                    // Prepare the SQL statement using PDO
                    $sql = "INSERT INTO products (product_name, price, image) VALUES (?, ?, ?)";
                    $stmt = $con->prepare($sql);

                    // Bind parameters
                    $stmt->bindParam(1, $pName, PDO::PARAM_STR);
                    $stmt->bindParam(2, $price, PDO::PARAM_STR); // Handle the price as a string
                    $stmt->bindParam(3, $image['name'], PDO::PARAM_STR);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "Product submission successful!";
                    } else {
                        echo "Error: Could not submit product.";
                    }

                } catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
            } else {
                echo "Error: Image upload failed.";
            }
        } else {
            echo "Error: All fields are required.";
        }
    }
    ?>

</body>

</html>