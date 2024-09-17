<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping2";


$con = new mysqli($servername, $username, $password, $dbname);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
};
?>
