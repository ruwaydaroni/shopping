<?php
$servername = "x3ztd854gaa7on6s.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "gishf2eqt1z2bey0";
$password = "bihkhoffleu5f2tk";
$dbname = "akbve430gouzs6mm";

try {
    // Create a new PDO instance
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>