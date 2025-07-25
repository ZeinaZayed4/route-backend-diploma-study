-- MySQL Script generated by MySQL Workbench
-- Tue Jul  1 03:21:58 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema route_blog
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema route_blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `route_blog` DEFAULT CHARACTER SET utf8 ;
USE `route_blog` ;

-- -----------------------------------------------------
-- Table `route_blog`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `route_blog`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `route_blog`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `route_blog`.`posts` (
  `id` INT(11) UNSIGNED NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `body` TEXT NOT NULL,
  `image` VARCHAR(50) NOT NULL,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_posts_fk_idx` (`user_id` ASC),
  CONSTRAINT `user_posts_fk`
    FOREIGN KEY (`user_id`)
    REFERENCES `route_blog`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
