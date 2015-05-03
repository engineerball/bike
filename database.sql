-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: myshop
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `default_billing_address` int(9) NOT NULL,
  `default_shipping_address` int(9) NOT NULL,
  `ship_to_bill_address` enum('false','true') NOT NULL DEFAULT 'true',
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers_address_bank`
--

DROP TABLE IF EXISTS `customers_address_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_address_bank` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(9) unsigned NOT NULL,
  `ship_firstname` varchar(255) DEFAULT NULL,
  `ship_lastname` varchar(255) DEFAULT NULL,
  `ship_email` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(40) DEFAULT NULL,
  `ship_address1` varchar(255) DEFAULT NULL,
  `ship_address2` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_zip` varchar(11) DEFAULT NULL,
  `bill_firstname` varchar(255) DEFAULT NULL,
  `bill_lastname` varchar(255) DEFAULT NULL,
  `bill_email` varchar(255) DEFAULT NULL,
  `bill_phone` varchar(40) DEFAULT NULL,
  `bill_address1` varchar(255) DEFAULT NULL,
  `bill_address2` varchar(255) DEFAULT NULL,
  `bill_city` varchar(255) DEFAULT NULL,
  `bill_zip` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_address_bank_customers1_idx` (`customer_id`),
  CONSTRAINT `fk_customer_address_bank_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(9) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_items_products1_idx` (`product_id`),
  KEY `fk_order_items_orders1_idx` (`order_id`),
  CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_items_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(60) NOT NULL,
  `customer_id` int(9) unsigned DEFAULT NULL,
  `ordered_on` datetime NOT NULL,
  `shipped_on` datetime NOT NULL,
  `total` float(10,2) NOT NULL,
  `notes` text,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ship_firstname` varchar(255) DEFAULT NULL,
  `ship_lastname` varchar(255) DEFAULT NULL,
  `ship_email` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(40) DEFAULT NULL,
  `ship_address1` varchar(255) DEFAULT NULL,
  `ship_address2` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_zip` varchar(11) DEFAULT NULL,
  `bill_firstname` varchar(255) DEFAULT NULL,
  `bill_lastname` varchar(255) DEFAULT NULL,
  `bill_email` varchar(255) DEFAULT NULL,
  `bill_phone` varchar(40) DEFAULT NULL,
  `bill_address1` varchar(255) DEFAULT NULL,
  `bill_address2` varchar(255) DEFAULT NULL,
  `bill_city` varchar(255) DEFAULT NULL,
  `bill_zip` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customers1_idx` (`customer_id`),
  CONSTRAINT `fk_orders_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(9) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL,
  `images` text CHARACTER SET latin1,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`category_id`),
  KEY `fk_products_categories1_idx` (`category_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-07 16:58:32
