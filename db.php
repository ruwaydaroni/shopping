
<?php
// Parse the JAWSDB_URL to extract database connection information
$cleardb_url = parse_url(getenv("mysql://gishf2eqt1z2bey0:bihkhoffleu5f2tk@x3ztd854gaa7on6s.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/akbve430gouzs6mm"));

$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"], 1);  // Remove leading slash from database name

try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>