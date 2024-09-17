<?php
session_start();  // Start session to handle user session after login
require 'db.php';  // Ensure the database connection is properly included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST variables are set
    if (isset($_POST['Username']) && isset($_POST['password'])) {
        // Get the form data and sanitize it
        $username = htmlspecialchars($_POST['Username']);
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
                    // Start session, set session variables, and redirect
                    $_SESSION['username'] = $username;  // Store user info in session
                    $_SESSION['user_id'] = $user['id']; // You can store other user details if needed

                    // Redirect to home.php
                    header('Location: home.php');
                    exit();  // Ensure no further code is executed after redirection
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

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="login">
        <div class="card">
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="Username" placeholder="Insert username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Insert password" required>
                <br>
                <button type="submit" value="submit">Submit</button>
            </form>

            <p>Don't have an account? <a href="signup.php">Register here!</a></p>
        </div>
    </div>
</body>

</html>