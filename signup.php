<?php
require 'db.php';
?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="signup">
        <div class="card">
            <form action="signup.php" method="post">
                <label for="fName">First Name:</label>
                <input type="text" name="fName" placeholder="insert first name">
                <label for="lName">Last Name:</label>
                <input type="text" name="lName" placeholder="insert last name">
                <label for="username">Username:</label>
                <input type="text" name="Username" placeholder="insert username">
                <label for="password">Password:</label>
                <input type="text" name="Password" placeholder="insert password">
                <label for="password">Confirm password:</label>
                <input type="text" name="Confirm" placeholder="confirm password">
                
                <br>
                <button type="submit" value="submit">submit</button>
            </form>
            
            <p>Already have an account? <a href="login.php">Login here!</a></p>
        </div>

    </div>

</body>
</html>



<?php
require 'db.php';  // Ensure the database connection is properly included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $confirm = $_POST['Confirm'];

    // Check if passwords match
    if ($password === $confirm) {
        // Hash the password
        $password1 = password_hash($password, PASSWORD_BCRYPT);

        // Prepare the SQL query using positional placeholders
        $sql = "INSERT INTO users (fname, lname, username, password) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        // Check if the query was successfully prepared
        if (!$stmt) {
            die("Failed to prepare SQL statement: " . $con->error);
        }

        // Bind parameters and execute the query
        $stmt->bind_param("ssss", $fname, $lname, $username, $password1);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful! <a href='login.php'>Login</a>";
        } else {
            echo "Error: Could not register.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Password does not match.";
    }
}

// Close the database connection
$con->close();
?>
