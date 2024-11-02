CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE merchandise (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT,
    price DECIMAL(10, 2),
    added_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO categories (name) VALUES ('Toys'), ('Apparel'), ('Accessories');

INSERT INTO merchandise (name, category_id, price) VALUES 
('Pikachu Plush Toy', 1, 19.99),
('Pokémon T-Shirt', 2, 25.00),
('Pokémon Card Binder', 3, 12.50);
