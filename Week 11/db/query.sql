CREATE DATABASE `route_e-commerce` COLLATE utf8mb4_unicode_ci;

USE `route_e-commerce`;

CREATE TABLE `users` (
  `id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(100) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user', 'admin') DEFAULT 'user'
);

CREATE TABLE `products` (
  `id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `image` varchar(255) NOT NULL
);

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED,
  `product_id` int(11) UNSIGNED,
  `created_at` TIMESTAMP DEFAULT now(),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`product_id`) REFERENCES `products`(`id`)
);
