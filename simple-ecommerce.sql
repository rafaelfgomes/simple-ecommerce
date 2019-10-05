CREATE SCHEMA IF NOT EXISTS `simple-ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `simple-ecommerce`;

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products` VARCHAR(70) NOT NULL,
  `image` VARCHAR(180) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`category_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_category_table1`
    FOREIGN KEY (`category_id`)
    REFERENCES `simple-ecommerce`.`categories` (`id`),
  CONSTRAINT `fk_product_table1`
    FOREIGN KEY (`product_id`)
    REFERENCES `simple-ecommerce`.`products` (`id`));

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`users` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `password` VARCHAR(170) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`product_user` (
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_table1`
    FOREIGN KEY (`user_id`)
    REFERENCES `simple-ecommerce`.`users` (`id`),
  CONSTRAINT `fk_product_table2`
    FOREIGN KEY (`product_id`)
    REFERENCES `simple-ecommerce`.`products` (`id`));

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`cart` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` DECIMAL(10,2) NOT NULL,
  `product_user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_product_user_table1`
    FOREIGN KEY (`product_user_id`)
    REFERENCES `simple-ecommerce`.`product_user` (`id`));
    
INSERT INTO `simple-ecommerce`.`categories`
	(`name`)
VALUES
	('Informática'), 
    ('Eletrodomésticos'),
    ('Telefonia');