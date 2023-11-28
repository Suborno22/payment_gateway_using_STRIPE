-- Drop database if it exists
DROP DATABASE IF EXISTS Dresser;

-- Create database if it does not exist
CREATE DATABASE IF NOT EXISTS Dresser;

-- Switch to the Dresser database
USE Dresser;

-- Create table Contents if it does not exist
CREATE TABLE IF NOT EXISTS Contents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(200) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);


INSERT INTO `Contents` (productName, price, stock) VALUES
    ('Salwar_kameez', 259, 1),
    ('T-shirt', 19, 5),
    ('Jeans', 49, 10),
    ('Trousers', 49.25, 10),
    ('Dress', 79, 8);

SELECT * FROM `Contents`;