-- MySQL Script generated by MySQL Workbench
-- 11/07/14 14:47:49
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bike_rental
-- -----------------------------------------------------
-- ฐานข้อมูลของเวปเช่ายืมรถจักรยาน
DROP SCHEMA IF EXISTS `bike_rental` ;

-- -----------------------------------------------------
-- Schema bike_rental
--
-- ฐานข้อมูลของเวปเช่ายืมรถจักรยาน
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bike_rental` DEFAULT CHARACTER SET utf8 ;
USE `bike_rental` ;

-- -----------------------------------------------------
-- Table `bike_rental`.`Renters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Renters` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Renters` (
  `renter_id` INT NOT NULL AUTO_INCREMENT,
  `renter_name` VARCHAR(255) NOT NULL,
  `renter_id_card` INT(13) NOT NULL,
  `renter_phone` VARCHAR(10) NOT NULL,
  `renter_registration_date_time` TIMESTAMP NOT NULL,
  `renter_last_rental_date_time` TIMESTAMP NULL,
  PRIMARY KEY (`renter_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bike_rental`.`Bikes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Bikes` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Bikes` (
  `bike_id` INT NOT NULL AUTO_INCREMENT,
  `bike_name` VARCHAR(255) NOT NULL,
  `bike_status` VARCHAR(45) NOT NULL,
  `bike_hourly_rate` INT NOT NULL,
  `bike_daily_rate` INT NOT NULL,
  `bike_type` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`bike_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bike_rental`.`Shops`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Shops` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Shops` (
  `shop_id` INT NOT NULL AUTO_INCREMENT COMMENT 'รหัสร้านค้า',
  `shop_name` VARCHAR(45) NOT NULL,
  `shop_location` VARCHAR(45) NOT NULL,
  `shop_phone` VARCHAR(45) NOT NULL,
  `shop_contact_person` VARCHAR(45) NOT NULL,
  `Bikes_bike_id` INT NOT NULL,
  PRIMARY KEY (`shop_id`, `Bikes_bike_id`),
  INDEX `fk_Shops_Bikes1_idx` (`Bikes_bike_id` ASC),
  CONSTRAINT `fk_Shops_Bikes1`
    FOREIGN KEY (`Bikes_bike_id`)
    REFERENCES `bike_rental`.`Bikes` (`bike_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bike_rental`.`Payment_Method`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Payment_Method` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Payment_Method` (
  `method_code` INT NOT NULL,
  `method_desc` TEXT NULL COMMENT 'ชนิดของการจ่ายเงิน เช่น\nเครดิต\nเดบิต\ncounter service\nจ่ายหน้าร้าน',
  PRIMARY KEY (`method_code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bike_rental`.`Payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Payment` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `Payment_Method_method_code` INT NOT NULL,
  PRIMARY KEY (`payment_id`),
  INDEX `fk_Payment_Payment_Method1_idx` (`Payment_Method_method_code` ASC),
  CONSTRAINT `fk_Payment_Payment_Method1`
    FOREIGN KEY (`Payment_Method_method_code`)
    REFERENCES `bike_rental`.`Payment_Method` (`method_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bike_rental`.`Rental`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bike_rental`.`Rental` ;

CREATE TABLE IF NOT EXISTS `bike_rental`.`Rental` (
  `rent_id` INT NOT NULL AUTO_INCREMENT,
  `Rental_rate_rental_rate_id` INT NOT NULL,
  `renter_renter_id` INT NOT NULL,
  `Bike_bike_id` INT NOT NULL,
  `booked_start_datetime` TIMESTAMP NULL,
  `booked_end_datetime` TIMESTAMP NULL,
  `actual_start_datetime` TIMESTAMP NULL,
  `actual_end_datetime` TIMESTAMP NULL,
  `all_day_rental` VARCHAR(45) NOT NULL,
  `Payment_payment_id` INT NOT NULL,
  PRIMARY KEY (`rent_id`),
  INDEX `fk_rental_renter_name1_idx` (`renter_renter_id` ASC),
  INDEX `fk_rental_Bike1_idx` (`Bike_bike_id` ASC),
  INDEX `fk_rental_Payment1_idx` (`Payment_payment_id` ASC),
  CONSTRAINT `fk_rental_renter_name1`
    FOREIGN KEY (`renter_renter_id`)
    REFERENCES `bike_rental`.`Renters` (`renter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_Bike1`
    FOREIGN KEY (`Bike_bike_id`)
    REFERENCES `bike_rental`.`Bikes` (`bike_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_Payment1`
    FOREIGN KEY (`Payment_payment_id`)
    REFERENCES `bike_rental`.`Payment` (`payment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

