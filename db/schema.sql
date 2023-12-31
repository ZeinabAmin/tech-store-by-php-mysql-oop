CREATE TABLE `cats` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id)
);

CREATE TABLE `products` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    `price` decimal(8, 2) NOT NULL,
    `pieces_no` SMALLINT NOT NULL,
    `img` VARCHAR(255) NOT NULL,
    cat_id INT UNSIGNED,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id),
    FOREIGN KEY (cat_id) REFERENCES cats(id) ON DELETE SET NULL
);

CREATE TABLE `orders` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `phone` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255),
    `status` ENUM('pending', 'approved', 'canceled') NOT NULL DEFAULT 'pending',
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id)
);

CREATE TABLE `order_details` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,

order_id INTEGER UNSIGNED ,
product_id INTEGER UNSIGNED ,
qty INT NOT NULL,
PRIMARY KEY (id),
 FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE SET NULL,
 FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
);

CREATE TABLE `admins` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) unique NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `is_super` ENUM('yes','no') NOT NULL DEFAULT 'no',
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id)
);

