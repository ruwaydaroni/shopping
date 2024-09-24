
<?php
// Include the database connection
require 'db.php';

session_start();

// Assuming you're storing the user's ID in a session after login
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if user is not logged in
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Initialize message variables
$successMessage = "";
$errorMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                $sql = "INSERT INTO products (product_name, price, image, user_id) VALUES (?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                // Bind parameters
                $stmt->bindParam(1, $pName, PDO::PARAM_STR);
                $stmt->bindParam(2, $price, PDO::PARAM_STR); // Handle the price as a string
                $stmt->bindParam(3, $image['name'], PDO::PARAM_STR);
                $stmt->bindParam(4, $user_id, PDO::PARAM_INT); // Store the user_id

                // Execute the statement
                if ($stmt->execute()) {
                    $successMessage = "Product submission successful!";
                } else {
                    $errorMessage = "Error: Could not submit product.";
                }

            } catch (PDOException $e) {
                $errorMessage = "Database error: " . $e->getMessage();
            }
        } else {
            $errorMessage = "Error: Image upload failed.";
        }
    } else {
        $errorMessage = "Error: All fields are required.";
    }
}
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
    // Include header file
    require 'header.php';
    ?>

    <div class="signup">
        <div class="card">
            <form action="" enctype="multipart/form-data" method="post"> <!-- Submit to the same page -->
                <label for="pName">Product Name</label>
                <input type="text" name="pName" placeholder="Insert product name" required>

                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" placeholder="Insert price" required>

                <label for="image">Upload Image</label>
                <input type="file" name="image" required>

                <br>
                <button type="submit" value="submit">Submit</button>
            </form>

            <!-- Display success or error messages -->
            <?php if ($successMessage): ?>
                <p style="color: green;"><?= $successMessage ?></p>
            <?php endif; ?>
            <?php if ($errorMessage): ?>
                <p style="color: red;"><?= $errorMessage ?></p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>
