<?php
require 'db.php'; // Ensure that 'db.php' connects to the database using PDO
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="signup">
        <div class="card">
            <form action="signup.php" method="post">
                <label for="fName">First Name:</label>
                <input type="text" name="fName" placeholder="Insert first name" required>

                <label for="lName">Last Name:</label>
                <input type="text" name="lName" placeholder="Insert last name" required>

                <label for="username">Username:</label>
                <input type="text" name="Username" placeholder="Insert username" required>

                <label for="password">Password:</label>
                <input type="password" name="Password" placeholder="Insert password" required>

                <label for="confirm">Confirm Password:</label>
                <input type="password" name="Confirm" placeholder="Confirm password" required>

                <br>
                <button type="submit" value="submit">Submit</button>
            </form>

            <p>Already have an account? <a href="login.php">Login here!</a></p>
        </div>
    </div>
</body>

</html>



<?php
require 'db.php';  // Ensure the database connection is properly included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input values
    $fname = htmlspecialchars($_POST['fName']);
    $lname = htmlspecialchars($_POST['lName']);
    $username = htmlspecialchars($_POST['Username']);
    $password = $_POST['Password'];
    $confirm = $_POST['Confirm'];

    // Check if passwords match
    if ($password === $confirm) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            // Prepare the SQL query using named placeholders
            $sql = "INSERT INTO users (fname, lname, username, password) VALUES (:fname, :lname, :username, :password)";
            $stmt = $con->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Registration successful! <a href='login.php'>Login</a>";
            } else {
                echo "Error: Could not register. " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            // Display error message in case of a failure
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Password does not match.";
    }
}

// Close the database connection
$con = null;
?>