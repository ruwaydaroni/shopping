<?php
session_start();  // Start session to handle user session after login
require 'db.php';  // Ensure the database connection is properly included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST variables are set
    if (isset($_POST['Username']) && isset($_POST['password'])) {
        // Get the form data and sanitize it
        $username = htmlspecialchars($_POST['Username']);
        $password = $_POST['password'];

        try {
            // Prepare the SQL query to select the user based on the username
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $con->prepare($sql);

            // Check if the query was successfully prepared
            if (!$stmt) {
                throw new Exception("Failed to prepare SQL statement: " . $con->errorInfo()[2]);
            }

            // Bind the username parameter to the prepared statement
            $stmt->bindParam(':username', $username);

            // Execute the statement
            $stmt->execute();

            // Check if a user with the provided username exists
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

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
        } catch (PDOException $e) {
            // Display PDO exception error message
            echo "Error executing query: " . $e->getMessage();
        } catch (Exception $e) {
            // Display general exception error message
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Username and/or password fields are missing.";
    }
}

// No need to explicitly close the connection with PDO, but you can set it to null
$con = null;
?>

<!DOCTYPE html>
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