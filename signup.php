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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $confirm = $_POST['Confirm'];
    
   if ($password === $confirm){
    $password1 = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    
   } else {
    echo "password does not match";
   }

    $sql = "INSERT INTO shop_users (first_name, last_name, username,password) VALUES (:fname, :lname, :username, :password1)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['first_name' => $fname, 'last_name' => $lname, 'username' => $username, 'password' => $password1 ])) {
        echo "Registration successful! <a href='login.php'>Login</a>";
    } else {
        echo "Error: Could not register.";
        
    }
}
?>
