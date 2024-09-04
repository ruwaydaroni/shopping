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
                <input type="text" name="password" placeholder="insert password">
                <label for="password">Confirm password:</label>
                <input type="text" name="password" placeholder="confirm password">
                
                <br>
                <button type="submit" value="submit">submit</button>
            </form>
            
            <p>Already have an account? <a href="login.php">Login here!</a></p>
        </div>

    </div>

        
