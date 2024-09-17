<?php
require 'db.php';  // Ensure the database connection is properly included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST variables are set
    if (isset($_POST['Username']) && isset($_POST['password'])) {
        // Get the form data
        $username = $_POST['Username'];
        $password = $_POST['password'];

        // Prepare the SQL query to select the user based on the username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $con->prepare($sql);

        // Check if the query was successfully prepared
        if (!$stmt) {
            die("Failed to prepare SQL statement: " . $con->error);  // Log the MySQL error
        }

        // Bind the username parameter to the prepared statement
        $stmt->bind_param("s", $username);

        // Execute the statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if a user with the provided username exists
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    echo "Login successful!";
                    header('Location: home.php');
                    // Start session or redirect user as needed
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "No user found with that username.";
            }
        } else {
            echo "Error executing query: " . $stmt->error;  // Output execution error if any
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Username and/or password fields are missing.";
    }
}

// Close the database connection
$con->close();
?>

    <head>
        <title>login</title>
        <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="login">
        <div class="card">
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="Username" placeholder="insert username">
                <label for="password">Password:</label>
                <input type="text" name="password" placeholder="insert password">
                <br>
                <button type="submit" value="submit">submit</button>
            </form>
            
        <p>Don't have an account?<a href="signup.php">Register here!</a></p>
        </div>

    </div>

        
