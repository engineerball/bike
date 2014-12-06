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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Touring','<p>\n Touring Bicycle</p>\n'),(2,'Hybrid','<p>\n Hybrid Bicycle</p>\n');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c0ae4aae957e57a1e872c7c61f2a3bed','192.168.56.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36',1417845371,'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"address\";a:16:{s:14:\"bill_firstname\";s:8:\"Teerapat\";s:13:\"bill_lastname\";s:3:\"Khu\";s:10:\"bill_email\";s:22:\"engineerball@gmail.com\";s:10:\"bill_phone\";s:12:\"+66835129931\";s:13:\"bill_address1\";s:26:\"Udelight2@bangsue stattion\";s:13:\"bill_address2\";s:26:\"Udelight2@bangsue stattion\";s:9:\"bill_city\";s:6:\"Bankok\";s:8:\"bill_zip\";s:5:\"10800\";s:14:\"ship_firstname\";s:8:\"Teerapat\";s:13:\"ship_lastname\";s:3:\"Khu\";s:10:\"ship_email\";s:22:\"engineerball@gmail.com\";s:10:\"ship_phone\";s:12:\"+66835129931\";s:13:\"ship_address1\";s:26:\"Udelight2@bangsue stattion\";s:13:\"ship_address2\";s:26:\"Udelight2@bangsue stattion\";s:9:\"ship_city\";s:6:\"Bankok\";s:8:\"ship_zip\";s:5:\"10800\";}s:11:\"billaddress\";a:8:{s:14:\"bill_firstname\";s:8:\"Teerapat\";s:13:\"bill_lastname\";s:3:\"Khu\";s:10:\"bill_email\";s:22:\"engineerball@gmail.com\";s:10:\"bill_phone\";s:12:\"+66835129931\";s:13:\"bill_address1\";s:26:\"Udelight2@bangsue stattion\";s:13:\"bill_address2\";s:26:\"Udelight2@bangsue stattion\";s:9:\"bill_city\";s:6:\"Bankok\";s:8:\"bill_zip\";s:5:\"10800\";}s:11:\"shipaddress\";a:8:{s:14:\"ship_firstname\";s:8:\"Teerapat\";s:13:\"ship_lastname\";s:3:\"Khu\";s:10:\"ship_email\";s:22:\"engineerball@gmail.com\";s:10:\"ship_phone\";s:12:\"+66835129931\";s:13:\"ship_address1\";s:26:\"Udelight2@bangsue stattion\";s:13:\"ship_address2\";s:26:\"Udelight2@bangsue stattion\";s:9:\"ship_city\";s:6:\"Bankok\";s:8:\"ship_zip\";s:5:\"10800\";}s:13:\"cart_contents\";a:4:{s:32:\"c81e728d9d4c2f636f067f89cc14862c\";a:6:{s:5:\"rowid\";s:32:\"c81e728d9d4c2f636f067f89cc14862c\";s:2:\"id\";s:1:\"2\";s:4:\"name\";s:10:\"Hybrid A01\";s:3:\"qty\";s:1:\"3\";s:5:\"price\";s:8:\"25000.00\";s:8:\"subtotal\";d:75000;}s:32:\"c4ca4238a0b923820dcc509a6f75849b\";a:6:{s:5:\"rowid\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:2:\"id\";s:1:\"1\";s:4:\"name\";s:10:\"Touring101\";s:3:\"qty\";s:1:\"4\";s:5:\"price\";s:8:\"15000.00\";s:8:\"subtotal\";d:60000;}s:11:\"total_items\";i:7;s:10:\"cart_total\";d:135000;}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_address_bank`
--

DROP TABLE IF EXISTS `customer_address_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address_bank` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(9) unsigned NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_address_bank_customers1_idx` (`customer_id`),
  CONSTRAINT `fk_customer_address_bank_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address_bank`
--

LOCK TABLES `customer_address_bank` WRITE;
/*!40000 ALTER TABLE `customer_address_bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_address_bank` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Teerapat','Khu','engineerball@gmail.com','+66835129931',0,0,'true','5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(9) unsigned NOT NULL,
  `product_id` int(9) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `contents` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_order_items_products1_idx` (`product_id`),
  KEY `fk_order_items_orders1_idx` (`order_id`),
  CONSTRAINT `fk_order_items_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

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
  `subtotal` float(10,2) NOT NULL,
  `shipping` float(10,2) NOT NULL,
  `shipping_method` tinytext NOT NULL,
  `shipping_notes` text NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

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
  `images` text CHARACTER SET utf8,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`category_id`),
  KEY `fk_products_categories1_idx` (`category_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Touring101','<p>\n จักรยานเด้อ</p>\n',15000.00,20,'60b29-10478541_1515669092037368_4993403701313043601_n.jpg',1),(2,2,'Hybrid A01','<p>\n Hybrid A01</p>\n',25000.00,15,'9ff56-tumblr_nenf7ehbdz1qhf535o1_1280.jpg',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-06 12:57:04
