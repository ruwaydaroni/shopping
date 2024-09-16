<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping2";

// Use MySQLi to connect to the MySQL database
$con = new mysqli($servername, $username, $password, $dbname);

// Check the connection and output success or failure message
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>
