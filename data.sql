CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    product_name VARCHAR(255) NOT NULL,  
    price DECIMAL(10, 2) NOT NULL,       
    image VARCHAR(255),                  
    user_id INT NOT NULL,                
    quantity INT NOT NULL,                
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,   
    user_id INT NOT NULL,                 
    product_id INT NOT NULL,                
    quantity INT NOT NULL,               
    price DECIMAL(10, 2) NOT NULL,          
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, 
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE 
);

