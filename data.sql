CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);


SELECT
product_name,
price,
image

FROM
products;

