-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `entity_admin`
--

DROP TABLE IF EXISTS `entity_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `fist_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `id_sex` int(1) DEFAULT NULL,
  `salary` float(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_admin`
--

LOCK TABLES `entity_admin` WRITE;
/*!40000 ALTER TABLE `entity_admin` DISABLE KEYS */;
INSERT INTO `entity_admin` VALUES (1,'Mark','Lehr','mark.lehr@rcc.edu','mememe','2017-11-01',1,250000),(2,'Tom','Finton','tom.finton@rcc.edu','youyouyou','2017-11-02',1,150000),(3,'Jill','Cambridge','jill.cam@rcc.edu','ususus','2017-11-03',2,500000);
/*!40000 ALTER TABLE `entity_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_survey`
--

DROP TABLE IF EXISTS `entity_survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_survey` (
  `id_survey` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` tinytext,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id_survey`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_survey`
--

LOCK TABLES `entity_survey` WRITE;
/*!40000 ALTER TABLE `entity_survey` DISABLE KEYS */;
INSERT INTO `entity_survey` VALUES (1,'Color','What is your favorite color','2017-11-01','2017-11-30'),(2,'Car','What is your favorite car','2017-12-01','2017-12-30'),(3,'Game','What is your favorite game','2018-01-01','2018-01-30'),(4,'Movie','What is your favorite movie','2018-02-02','2018-02-15');
/*!40000 ALTER TABLE `entity_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_question`
--

DROP TABLE IF EXISTS `enum_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_question` (
  `id_question` int(10) NOT NULL AUTO_INCREMENT,
  `question` tinytext,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_question`
--

LOCK TABLES `enum_question` WRITE;
/*!40000 ALTER TABLE `enum_question` DISABLE KEYS */;
INSERT INTO `enum_question` VALUES (1,'Favorite Board Game?'),(2,'Favorite Card Game'),(3,'Favorite Primary Color?'),(4,'Favorite Truck?'),(5,'Favorite Sports Car?'),(6,'Favorite Semi?'),(7,'Favorite Horror Film?'),(8,'Favorite Sci Fi?');
/*!40000 ALTER TABLE `enum_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_sex`
--

DROP TABLE IF EXISTS `enum_sex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_sex` (
  `id_sex` int(10) NOT NULL AUTO_INCREMENT,
  `sex` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_sex`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_sex`
--

LOCK TABLES `enum_sex` WRITE;
/*!40000 ALTER TABLE `enum_sex` DISABLE KEYS */;
INSERT INTO `enum_sex` VALUES (1,'M'),(2,'F');
/*!40000 ALTER TABLE `enum_sex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_surv_admin`
--

DROP TABLE IF EXISTS `xref_surv_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_surv_admin` (
  `id_xref` int(10) NOT NULL AUTO_INCREMENT,
  `id_admin` int(10) DEFAULT NULL,
  `id_survey` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_xref`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_surv_admin`
--

LOCK TABLES `xref_surv_admin` WRITE;
/*!40000 ALTER TABLE `xref_surv_admin` DISABLE KEYS */;
INSERT INTO `xref_surv_admin` VALUES (1,1,4),(2,1,3),(3,2,1),(4,3,2),(5,2,4);
/*!40000 ALTER TABLE `xref_surv_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_surv_question`
--

DROP TABLE IF EXISTS `xref_surv_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_surv_question` (
  `id_xref` int(10) NOT NULL AUTO_INCREMENT,
  `id_survey` int(10) DEFAULT NULL,
  `id_question` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_xref`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_surv_question`
--

LOCK TABLES `xref_surv_question` WRITE;
/*!40000 ALTER TABLE `xref_surv_question` DISABLE KEYS */;
INSERT INTO `xref_surv_question` VALUES (1,1,3),(2,2,4),(3,2,5),(4,2,6),(5,3,1),(6,3,2),(7,4,7),(8,4,8);
/*!40000 ALTER TABLE `xref_surv_question` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-01 19:26:15
