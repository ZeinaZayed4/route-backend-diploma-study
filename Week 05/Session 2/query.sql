-- Create database "route"
CREATE DATABASE route COLLATE utf8mb4_unicode_ci;

-- Drop database
DROP DATABASE route;

-- Select database
USE `route`;

-- Create table 1 (users)
CREATE TABLE `users` (
    `id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `phone` VARCHAR(15) NOT NULL,
    `age` INT(3),
    `gender` ENUM('male', 'female') DEFAULT 'male',
    `bio` TEXT,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert data into `users` table
INSERT INTO `users` (`name`, `email`, `phone`, `age`, `gender`, `bio`)
VALUES ('Zeina', 'zeina@gmail.com', '123456789', 23, 'female', 'Nothing');

-- Create table 2 (posts)
CREATE TABLE `posts` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `body` TEXT,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT(11) UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- Insert data into `posts` table
INSERT INTO `posts` (`title`, `body`, `user_id`)
VALUES ('The little prince', 'Only with heart', 1);

-- Update and delete data
UPDATE `users` SET `name` = 'Zeina Zayed' WHERE `id` = 1;
DELETE FROM `posts` WHERE `id` = 1;
