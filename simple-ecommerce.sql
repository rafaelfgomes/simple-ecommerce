DROP SCHEMA `simple-ecommerce`;

CREATE SCHEMA IF NOT EXISTS `simple-ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `simple-ecommerce`;

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
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
    REFERENCES `simple-ecommerce`.`products` (`id`)
);

CREATE TABLE IF NOT EXISTS `simple-ecommerce`.`cart` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cart_product_1`
    FOREIGN KEY (`product_id`)
    REFERENCES `simple-ecommerce`.`products` (`id`)
);
    
INSERT INTO `simple-ecommerce`.`categories`
	(`name`)
VALUES
	('Eletrônicos'), 
    ('Móveis'),
    ('Smartphones'),
    ('Notebooks'),
    ('TVs LED'),
    ('Guarda-roupas'),
    ('Camas'),
    ('Sofás');
    
INSERT INTO `simple-ecommerce`.`products`
(`name`,
`description`,
`image`,
`price`)
VALUES
('Samsung Galaxy A30', 'Smartphone Samsung Galaxy A30, Tela Infinita de 6.4", Câmera Traseira Dupla, Leitor de Digital, Android 9.0 e Processador Octa-Core', 'images/electronics/galaxya30.jpg', 1099),
('Motorola One Vision', 'Smartphone Motorola One Vision XT1970, 4GB RAM, Tela de 6.3", Câmera Traseira Dupla, Octa-Core, Leitor Digital, Android 9.0', 'images/electronics/motoonevision.jpg', 1599),
('Notebook Samsung', 'Samsung Core i7-7500U 8GB 1TB Placa de Vídeo 2GB Tela 15.6” Windows 10 Expert NP350XAA-VF3BR', 'images/electronics/notesamci7.jpg', 2699),
('Notebook Dell', 'Notebook Dell Core i5-7200U 8GB 1TB Tela 15.6” Linux Inspiron I15-3567-D40P', 'images/electronics/notedellci5.jpg', 2499),
('TV LED 43" LG', 'Smart TV LED 43" Full HD LG 43LM6300PSB ThinQ AI Inteligência Artificial com IoT, Virtual Surround Sound, WebOS 4.5, HDR, Quad Core, Bluetooth e HDMI', 'images/electronics/tvlg43.jpg', 1379),
('TV LED 65" Sony', 'Smart TV LED 65" UHD 4K Sony BRAVIA KD-65X755F com Android, HDR, X-Reality Pro, Motionflow XR 240, X-Protection PRO, Wi-Fi, HDMI e USB', 'images/electronics/tvsony65.jpg', 4659.90),
('Guarda-Roupa Fama', 'Guarda-Roupa Fama Flórida Plus com 3 Portas de Correr, 4 Gavetas e Espelho', 'images/furnitures/guardaroupafama.jpg', 629.90),
('Guarda-Roupa Bartira', 'Guarda-Roupa Bartira Curitiba II com 8 Portas e 4 Gavetas', 'images/furnitures/guardaroupabartira.jpg', 799),
('Cama de Casal Monalisa', 'Cama de Casal Flex Collor Monalisa Móveis Europa - Nogueira/Branco', 'images/furnitures/camacasalmonalisa.jpg', 299),
('Cama Bartira ', 'Cama de Solteiro Bartira Alegra', 'images/furnitures/camasolteirobartira.jpg', 279),
('Sofá Linoforte', 'Sofá 3 e 2 Lugares Linoforte Stillus em Korino', 'images/furnitures/sofalinoforte.jpg', 1299),
('Sofá Luizzi', 'Sofá 3 Lugares Luizzi Duque em Veludo', 'images/furnitures/sofaluizzi.jpg', 559);

INSERT INTO `simple-ecommerce`.`category_product`
(`product_id`,
`category_id`)
VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(7, 2),
(7, 6),
(8, 2),
(8, 6),
(9, 2),
(9, 7),
(10, 2),
(10, 7),
(11, 2),
(11, 8),
(12, 2),
(12, 8);