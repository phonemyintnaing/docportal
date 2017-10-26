CREATE DATABASE  IF NOT EXISTS `id2130797_wms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `id2130797_wms`;
-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: wms
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `patient_info`
--

DROP TABLE IF EXISTS `patient_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_info` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `type_of_disease` varchar(255) NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `sugar_level` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `patients` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_info`
--

LOCK TABLES `patient_info` WRITE;
/*!40000 ALTER TABLE `patient_info` DISABLE KEYS */;
INSERT INTO `patient_info` VALUES (1,'','11','10','10','10',0,2),(2,'','','','','',0,3),(3,'','2','2','2','4',0,4),(4,'','5','56','56','56',0,5);
/*!40000 ALTER TABLE `patient_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `type_of_blood` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `token` varchar(32) NOT NULL,
  `gp` int(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (2,'Test','Test',1,'O','test@gmail.com','05ced6f135c4747a3242b8875da76f875bf794b2',1,3,'14f2f15026e48652e5a29f228fdf5fc2',11,'2017-10-20 21:34:10'),(3,'Ara','Ad',2,'A','ara@gmail.com','05ced6f135c4747a3242b8875da76f875bf794b2',1,3,'07441a3c8cd7817ed45479dafb5f2099',11,'2017-10-20 21:36:19'),(4,'Amy','Ad',2,'A','a@gmail.com','05ced6f135c4747a3242b8875da76f875bf794b2',1,3,'90dfa4436f541084b305c3eeeda5ac58',11,'2017-10-20 18:38:31'),(5,'Lghj','Ghj',1,'A','ghj@gmail.com','05ced6f135c4747a3242b8875da76f875bf794b2',1,3,'23f98bcb22db003917bba1febf1cb66c',11,'2017-10-20 18:40:25');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `type_of_blood` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','Administrator',1,'O','administrator@gmail.com','8cb2237d0679ca88db6464eac60da96345513964',1,1,'0d8882783dfab4b2f4d92ad88756459b','2012-12-04 23:55:07'),(11,'PHONE MYINT','NAING',1,'O','phone@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,2,'94ee3c7cc3b8c6cd23bca40d7ff78c1e','2017-10-12 06:39:21'),(12,'David`','Scott',1,'O','david@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,2,'d8c60c3d14eb9c71eef00a66698dd51b','2017-10-13 20:09:19'),(13,'ANNA','BELLE',2,'A','anna@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,2,'ec53ff181e160eb6a2a6881735f8b30d','2017-10-13 20:25:35'),(14,'Yaz','Kuza',1,'AB','yaz@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,2,'c0812d1e56d881831e7ed37adae76f41','2017-10-19 15:42:45'),(15,'Test','Test',1,'O','test1@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,2,'2eff89981363973e4579a3a98a80602f','2017-10-20 22:23:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_info`
--

DROP TABLE IF EXISTS `users_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_info` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `type_of_disease` varchar(255) NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `sugar_level` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `users` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_info`
--

LOCK TABLES `users_info` WRITE;
/*!40000 ALTER TABLE `users_info` DISABLE KEYS */;
INSERT INTO `users_info` VALUES (1,'NONE','100','100','5','78',1,11),(2,'Asthma','70','39','6','78',1,12);
/*!40000 ALTER TABLE `users_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-21  3:01:14
