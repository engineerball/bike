-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bike_rental
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
-- Table structure for table `Bikes`
--

DROP TABLE IF EXISTS `Bikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bikes` (
  `bike_id` int(11) NOT NULL AUTO_INCREMENT,
  `bike_name` varchar(255) NOT NULL,
  `bike_status` varchar(45) NOT NULL,
  `bike_hourly_rate` int(11) NOT NULL,
  `bike_daily_rate` int(11) NOT NULL,
  `bike_type` enum('BMX','City','Child','Fixed Gear','Hybrid','Road','Touring') NOT NULL COMMENT 'ประเภทรถจักรยาน',
  `Shops_shop_id` int(11) NOT NULL,
  `bike_photo` varchar(255) DEFAULT 'default.jpg' COMMENT 'รูปภาพจักรยาน',
  `bike_desc` text,
  PRIMARY KEY (`bike_id`),
  KEY `fk_Bikes_Shops1_idx` (`Shops_shop_id`),
  CONSTRAINT `fk_Bikes_Shops1` FOREIGN KEY (`Shops_shop_id`) REFERENCES `Shops` (`shop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bikes`
--

LOCK TABLES `Bikes` WRITE;
/*!40000 ALTER TABLE `Bikes` DISABLE KEYS */;
INSERT INTO `Bikes` VALUES (2,'Pinky','available',10,100,'Fixed Gear',1,'5d997-24115348.png','<p>\n  <span >A nbsp;</span><b >fixed-gear bicycle</b><span >&nbsp (or&nbsp;</span><b >fixed-wheel bicycle</b><span >, commonly known in some places as a&nbsp;</span><b >fixie</b><span >) is a&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Bicycle\"  title \"Bicycle\">bicycle</a><span >&nbsp that has a&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Bicycle_drivetrain_systems\"  title \"Bicycle drivetrain systems\">drivetrain</a><span >&nbsp with no&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Freewheel\"  title \"Freewheel\">freewheel</a><span >&nbsp;mechanism. The freewheel was developed early in the history of bicycle design but the fixed-gear bicycle remained the standard track racing design. More recently the &quot;fixie&quot; has become a popular alternative among mainly urban cyclists, offering the advantages of simplicity compared with the standard multi-geared bicycle.</span></p>\n'),(3,'Brown','available',10,100,'City',1,'8aee0-tumblr_nb9vwcgep31qhf535o1_500.jpg',NULL),(4,'BMX1001','available',10,100,'BMX',2,'3c482-hero-kids-bicycle-india-buddy-14t.jpg','<p>\n Child bike</p>\n'),(6,'AE','available',4,80,'City',1,'3dc5e-2012566107068sommerferst.jpg','<p>\n City Bicycle</p>\n'),(7,'Yellow','available',10,100,'Touring',1,'9dd85-tumblr_ndyjiguwd11qhf535o1_1280.jpg',NULL);
/*!40000 ALTER TABLE `Bikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `Payment_Method_method_code` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_Payment_Payment_Method1_idx` (`Payment_Method_method_code`),
  CONSTRAINT `fk_Payment_Payment_Method1` FOREIGN KEY (`Payment_Method_method_code`) REFERENCES `Payment_Method` (`method_code`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;
/*!40000 ALTER TABLE `Payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment_Method`
--

DROP TABLE IF EXISTS `Payment_Method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment_Method` (
  `method_code` int(11) NOT NULL,
  `method_desc` text COMMENT 'ชนิดของการจ่ายเงิน เช่น\nเครดิต\nเดบิต\ncounter service\nจ่ายหน้าร้าน',
  PRIMARY KEY (`method_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment_Method`
--

LOCK TABLES `Payment_Method` WRITE;
/*!40000 ALTER TABLE `Payment_Method` DISABLE KEYS */;
/*!40000 ALTER TABLE `Payment_Method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rental`
--

DROP TABLE IF EXISTS `Rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rental` (
  `rent_id` int(11) NOT NULL AUTO_INCREMENT,
  `Rental_rate_rental_rate_id` int(11) NOT NULL,
  `renter_renter_id` int(11) NOT NULL,
  `Bike_bike_id` int(11) NOT NULL,
  `booked_start_datetime` timestamp NULL DEFAULT NULL,
  `booked_end_datetime` timestamp NULL DEFAULT NULL,
  `actual_start_datetime` timestamp NULL DEFAULT NULL,
  `actual_end_datetime` timestamp NULL DEFAULT NULL,
  `all_day_rental` varchar(45) NOT NULL,
  `Payment_payment_id` int(11) NOT NULL,
  PRIMARY KEY (`rent_id`),
  KEY `fk_rental_renter_name1_idx` (`renter_renter_id`),
  KEY `fk_rental_Bike1_idx` (`Bike_bike_id`),
  KEY `fk_rental_Payment1_idx` (`Payment_payment_id`),
  CONSTRAINT `fk_rental_Bike1` FOREIGN KEY (`Bike_bike_id`) REFERENCES `Bikes` (`bike_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_Payment1` FOREIGN KEY (`Payment_payment_id`) REFERENCES `Payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_renter_name1` FOREIGN KEY (`renter_renter_id`) REFERENCES `Renters` (`renter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rental`
--

LOCK TABLES `Rental` WRITE;
/*!40000 ALTER TABLE `Rental` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Renters`
--

DROP TABLE IF EXISTS `Renters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Renters` (
  `renter_id` int(11) NOT NULL AUTO_INCREMENT,
  `renter_name` varchar(255) NOT NULL,
  `renter_id_card` int(13) NOT NULL,
  `renter_phone` varchar(10) NOT NULL,
  `renter_registration_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `renter_last_rental_date_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`renter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Renters`
--

LOCK TABLES `Renters` WRITE;
/*!40000 ALTER TABLE `Renters` DISABLE KEYS */;
/*!40000 ALTER TABLE `Renters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shops`
--

DROP TABLE IF EXISTS `Shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shops` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสร้านค้า',
  `shop_name` varchar(45) NOT NULL,
  `shop_location` varchar(45) NOT NULL,
  `shop_phone` varchar(45) NOT NULL,
  `shop_contact_person` varchar(45) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shops`
--

LOCK TABLES `Shops` WRITE;
/*!40000 ALTER TABLE `Shops` DISABLE KEYS */;
INSERT INTO `Shops` VALUES (1,'A Bike','Bangsue','021233211','Mr. A'),(2,'B Shop','สวนรถไฟ','1233451123','ใหม่ รักหมู่');
/*!40000 ALTER TABLE `Shops` ENABLE KEYS */;
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
INSERT INTO `ci_sessions` VALUES ('a87de11617b133893ce709555670edae','192.168.56.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36',1415551981,'a:1:{s:13:\"cart_contents\";a:4:{s:32:\"eccbc87e4b5ce2fe28308fd9f2a7baf3\";a:6:{s:5:\"rowid\";s:32:\"eccbc87e4b5ce2fe28308fd9f2a7baf3\";s:2:\"id\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:4:\"name\";s:5:\"Brown\";s:8:\"subtotal\";i:10;}s:32:\"a87ff679a2f3e71d9181a67b7542122c\";a:6:{s:5:\"rowid\";s:32:\"a87ff679a2f3e71d9181a67b7542122c\";s:2:\"id\";s:1:\"4\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:4:\"name\";s:7:\"BMX1001\";s:8:\"subtotal\";i:10;}s:11:\"total_items\";i:2;s:10:\"cart_total\";i:20;}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-10  8:48:37
