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
  `bike_type` varchar(255) NOT NULL,
  `Shops_shop_id` int(11) NOT NULL,
  PRIMARY KEY (`bike_id`),
  KEY `fk_Bikes_Shops1_idx` (`Shops_shop_id`),
  CONSTRAINT `fk_Bikes_Shops1` FOREIGN KEY (`Shops_shop_id`) REFERENCES `Shops` (`shop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bikes`
--

LOCK TABLES `Bikes` WRITE;
/*!40000 ALTER TABLE `Bikes` DISABLE KEYS */;
INSERT INTO `Bikes` VALUES (2,'Pinky','available',10,100,'Fixed Gear',1),(3,'Brow','available',10,100,'City',1),(4,'ฺBMX1001','available',10,100,'BMX',2);
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
  CONSTRAINT `fk_rental_renter_name1` FOREIGN KEY (`renter_renter_id`) REFERENCES `Renters` (`renter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_Bike1` FOREIGN KEY (`Bike_bike_id`) REFERENCES `Bikes` (`bike_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rental_Payment1` FOREIGN KEY (`Payment_payment_id`) REFERENCES `Payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-07 15:55:22
