CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);


SELECT
pName,
price,
image

FROM
products;
if ($pdo) {
    echo "PDO connection is successful";
} else {
    echo "PDO connection failed";
}
