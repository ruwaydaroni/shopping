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

<?php
// Parse the JAWSDB_URL to extract database connection information
$cleardb_url = parse_url(getenv("JAWSDB_URL"));

$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"], 1);  // Remove leading slash from database name

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>