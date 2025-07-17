CREATE DATABASE `route_blog` COLLATE utf8mb4_unicode_ci;

USE `route_blog`;

CREATE TABLE `users` (
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50),
    `email` VARCHAR(100) UNIQUE,
    `phone` VARCHAR(20),
    `password` VARCHAR(255)
);

CREATE TABLE `posts` (
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(100),
    `body` TEXT,
    `image` VARCHAR(255),
    `user_id` INT UNSIGNED,
    `created_at` DATETIME DEFAULT NOW(),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);
