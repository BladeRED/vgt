-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: mariadb    Database: database
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB-1:10.7.3+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `database`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `database` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `database`;

--
-- Table structure for table `Gamelists`
--

DROP TABLE IF EXISTS `Gamelists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gamelists` (
  `Id_Gamelists` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Id_Gamer` int(11) NOT NULL,
  PRIMARY KEY (`Id_Gamelists`),
  KEY `Id_Gamer` (`Id_Gamer`),
  CONSTRAINT `Gamelists_ibfk_1` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gamelists`
--

LOCK TABLES `Gamelists` WRITE;
/*!40000 ALTER TABLE `Gamelists` DISABLE KEYS */;
/*!40000 ALTER TABLE `Gamelists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gamer`
--

DROP TABLE IF EXISTS `Gamer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gamer` (
  `Id_Gamer` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL,
  `picture` varchar(512) NOT NULL,
  PRIMARY KEY (`Id_Gamer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gamer`
--

LOCK TABLES `Gamer` WRITE;
/*!40000 ALTER TABLE `Gamer` DISABLE KEYS */;
INSERT INTO `Gamer` VALUES
(1,'Vegeta_88','$2y$10$9.wwS.E2UHnwGt4NwDukdeXcXcfV/E5c8K32t92MNoE9fI1An1F.2','SarabadaTrunks@Bulma.jp','[ADMIN]',''),
(2,'KrilinDu49','$2y$10$3KXXsk1tyrMK0bjyUIUUv.bQ.0AzxObkJrg78PKy5.qRCpRw6mtcq','Kienzan@mutenroshi.jp','[GAMER]',''),
(3,'RaditzDu03','$2y$10$plG16.o3W.BR0kdr6qcAKeG5QAiWMaAy34hwChg0fF1ECwoEmsWHi','RaditzLeNaze@youhou.jp','[GAMER]',''),
(4,'MakkankosapoDu14','$2y$10$EeYpaSnTDYD8q3cSE1YaeOWrptscrfgc7SdaySeutoDqkl.q0g1Ky','PiccoloLeNamek@Porunga.jp','[GAMER]','');
/*!40000 ALTER TABLE `Gamer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Games`
--

DROP TABLE IF EXISTS `Games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Games` (
  `Id_Games` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `resume` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`Id_Games`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Games`
--

LOCK TABLES `Games` WRITE;
/*!40000 ALTER TABLE `Games` DISABLE KEYS */;
/*!40000 ALTER TABLE `Games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gametimes`
--

DROP TABLE IF EXISTS `Gametimes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gametimes` (
  `Id_Gametimes` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `hours` int(11) NOT NULL,
  `minuts` int(11) NOT NULL,
  `seconds` int(11) NOT NULL,
  `Id_Games` int(11) NOT NULL,
  `Id_Gamer` int(11) NOT NULL,
  PRIMARY KEY (`Id_Gametimes`),
  KEY `Id_Games` (`Id_Games`),
  KEY `Id_Gamer` (`Id_Gamer`),
  CONSTRAINT `Gametimes_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `Gametimes_ibfk_2` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gametimes`
--

LOCK TABLES `Gametimes` WRITE;
/*!40000 ALTER TABLE `Gametimes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Gametimes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Genre`
--

DROP TABLE IF EXISTS `Genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Genre` (
  `Id_Genre` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genre`
--

LOCK TABLES `Genre` WRITE;
/*!40000 ALTER TABLE `Genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `Genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Platforms`
--

DROP TABLE IF EXISTS `Platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Platforms` (
  `Id_Platforms` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Platforms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Platforms`
--

LOCK TABLES `Platforms` WRITE;
/*!40000 ALTER TABLE `Platforms` DISABLE KEYS */;
/*!40000 ALTER TABLE `Platforms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviews` (
  `Id_Reviews` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `comment_date` datetime NOT NULL,
  `isSignaled` tinyint(1) NOT NULL,
  `Id_Games` int(11) NOT NULL,
  `Id_Gamer` int(11) NOT NULL,
  PRIMARY KEY (`Id_Reviews`),
  KEY `Id_Games` (`Id_Games`),
  KEY `Id_Gamer` (`Id_Gamer`),
  CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `belongs`
--

DROP TABLE IF EXISTS `belongs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `belongs` (
  `Id_Games` int(11) NOT NULL,
  `Id_Genre` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Genre`),
  KEY `Id_Genre` (`Id_Genre`),
  CONSTRAINT `belongs_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `belongs_ibfk_2` FOREIGN KEY (`Id_Genre`) REFERENCES `Genre` (`Id_Genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `belongs`
--

LOCK TABLES `belongs` WRITE;
/*!40000 ALTER TABLE `belongs` DISABLE KEYS */;
/*!40000 ALTER TABLE `belongs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contains`
--

DROP TABLE IF EXISTS `contains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contains` (
  `Id_Games` int(11) NOT NULL,
  `Id_Gamelists` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Gamelists`),
  KEY `Id_Gamelists` (`Id_Gamelists`),
  CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`Id_Gamelists`) REFERENCES `Gamelists` (`Id_Gamelists`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contains`
--

LOCK TABLES `contains` WRITE;
/*!40000 ALTER TABLE `contains` DISABLE KEYS */;
/*!40000 ALTER TABLE `contains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribute`
--

DROP TABLE IF EXISTS `distribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribute` (
  `Id_Games` int(11) NOT NULL,
  `Id_Platforms` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Platforms`),
  KEY `Id_Platforms` (`Id_Platforms`),
  CONSTRAINT `distribute_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `distribute_ibfk_2` FOREIGN KEY (`Id_Platforms`) REFERENCES `Platforms` (`Id_Platforms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribute`
--

LOCK TABLES `distribute` WRITE;
/*!40000 ALTER TABLE `distribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `distribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `possess`
--

DROP TABLE IF EXISTS `possess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `possess` (
  `Id_Gamer` int(11) NOT NULL,
  `Id_Games` int(11) NOT NULL,
  PRIMARY KEY (`Id_Gamer`,`Id_Games`),
  KEY `Id_Games` (`Id_Games`),
  CONSTRAINT `possess_ibfk_1` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`),
  CONSTRAINT `possess_ibfk_2` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `possess`
--

LOCK TABLES `possess` WRITE;
/*!40000 ALTER TABLE `possess` DISABLE KEYS */;
/*!40000 ALTER TABLE `possess` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-16  8:31:59
