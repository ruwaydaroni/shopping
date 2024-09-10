<?php
require 'db.php';
?>

<html>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $con->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: home.php');
    } else {
        echo "Invalid credentials.";
    }
}
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

        
