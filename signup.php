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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data and sanitize it
    $fname = htmlspecialchars($_POST['fName']);
    $lname = htmlspecialchars($_POST['lName']);
    $username = htmlspecialchars($_POST['Username']);
    $password = $_POST['Password'];
    $confirm = $_POST['Confirm'];

    // Check if passwords match
    if ($password === $confirm) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare the SQL query with named placeholders
        $sql = "INSERT INTO users (fname, lname, username, password) VALUES (:fname, :lname, :username, :password)";

        // Prepare the SQL statement using PDO
        $stmt = $con->prepare($sql);

        // Bind the values to the named placeholders and execute
        if ($stmt->execute(['fname' => $fname, 'lname' => $lname, 'username' => $username, 'password' => $hashedPassword])) {
            echo "Registration successful! <a href='login.php'>Login</a>";
        } else {
            echo "Error: Could not register.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>