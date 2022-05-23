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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gamelists`
--

LOCK TABLES `Gamelists` WRITE;
/*!40000 ALTER TABLE `Gamelists` DISABLE KEYS */;
INSERT INTO `Gamelists` VALUES
(1,'Ma Draco-liste',13);
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
  `picture` varchar(512) NOT NULL DEFAULT '../../assets/pictures/vegeta_1771.jpg',
  PRIMARY KEY (`Id_Gamer`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gamer`
--

LOCK TABLES `Gamer` WRITE;
/*!40000 ALTER TABLE `Gamer` DISABLE KEYS */;
INSERT INTO `Gamer` VALUES
(1,'Vegeta_88','$2y$10$BIxI080YCPIiZhv9Ea5EPOtXw6jkLsUlEe/0STixb.mzh5LpPLS4m','SarabadaTrunks@Bulma.jp','[ADMIN]','../../assets/pictures/vegeta_1771.jpg'),
(13,'Dragon','$2y$10$zS4vtQtMQhszpw1gx4/dxudslLHGPoLFXfVtBzqB0vCC.2RKpFqsy','Dragon@dragon.dragon','[GAMER]','628376bab6482.png'),
(14,'Vegeta_44','$2y$10$AaLa6hY4lLSUf0dW41CX1eSi0lwc4fmuS4mVTefzBGKZbddk01Vym','zfapapeeg@fzapfofzapf.com','[GAMER]','62838d93bcf52.png'),
(15,'LaFigue','$2y$10$0IjlaRhQZS0a88QdIh.WruZankYQ3msPd0sf9ldzSL3mwYgN3TdZW','LaFigue@lafigue.fr','[GAMER]','../../assets/pictures/dragon.png'),
(16,'LaBanane','$2y$10$pv3YZazS7kzKe7H.4yvpp.yBhGNsz4..dWZ0mR.mqUFSfn8tWIXMW','LaBanane@banane.fr','[GAMER]','../../assets/pictures/dragon.png'),
(17,'Végépâté','$2y$10$dt8hwlWRHxHUzzjslnbGtOCs.Yh82Esq0Sl6aaihBYagl9V/JZ2Hy','Vegepate@terrine.jp','[GAMER]','62839eec13cc4.jpeg'),
(24,'KrilinDu49','$2y$10$RM/IhCdI3WK2s97w5CjAyumFkiDBjDeui.TTZLFd3j4QoXsW0VLDa','Kienzan@mutenroshi.jp','[GAMER]','../../assets/pictures/dragon.png'),
(25,'LaPampouze','$2y$10$SD7PHO27UcUC43A7VVZayuaGRssWfGljrapMGPt1WSf4SQxsVjqLy','LaPampouze@pampouze.fr','[GAMER]','../../assets/pictures/dragon.png'),
(26,'Lama63','$2y$10$rRFeHnptMc/Fd72yz9aMNeHtkqutxmrtbyBbQV.R7PGujiUnPeQee','Lama@lama.fr','[GAMER]','../../assets/pictures/dragon.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Games`
--

LOCK TABLES `Games` WRITE;
/*!40000 ALTER TABLE `Games` DISABLE KEYS */;
INSERT INTO `Games` VALUES
(1,'Elden Ring','Elden Ring se déroule dans le royaume de l\'Entre-terre, quelque temps après la destruction du Cercle d’Elden et la dispersion de ses fragments, les runes majeures. Autrefois honoré par la présence du Cercle et de l\'Arbre-Monde, le royaume est maintenant gouverné par les descendants demi-dieux de la reine Marika l\'Éternelle, chacun possédant un éclat du Cercle d\'Elden qui les corrompt et les empoisonne par leur pouvoir.'),
(2,'Pillars of Eternity','L\'histoire se déroule dans le monde d\'Eora, dans une région située dans l\'hémisphère sud, appelée les Contrées Orientales, une région qui a approximativement la taille de l\'Espagne. Les Contrées orientales comportent plusieurs nations, dont le Palatinat Libre du Dyrwood – une ancienne colonie du puissant Empire d\'Aedyr qui a gagné son indépendance au travers d\'une révolution6 – les Républiques de Vailia.'),
(3,'Zelda: Breath of the Wild','L\'intrigue se déroule dans un univers médiéval-fantastique, le royaume d\'Hyrule. Ce dernier est dévasté à la suite d\'une catastrophe ayant eu lieu un siècle avant l\'aventure, et présente ainsi de nombreux temples et bâtiments en ruines. La nature, par sa faune et sa flore, est en revanche omniprésente. '),
(4,'Dragon Ball Xenoverse 2','Il s\'agit d\'un jeu de combat en map fermée (mais possédant de grandes limites). L\'attrait principal du jeu est que le joueur peut créer son avatar parmi cinq races qui sont les Majins (comme Boo), les Saiyans (comme Son Goku et Vegeta), les terriens (comme Krilin), les Nameks (comme Piccolo) ou enfin la race de Freezer. ');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gametimes`
--

LOCK TABLES `Gametimes` WRITE;
/*!40000 ALTER TABLE `Gametimes` DISABLE KEYS */;
INSERT INTO `Gametimes` VALUES
(1,'Histoire',98,57,23,1,13),
(2,'Complétioniste',257,32,45,2,13),
(3,'Histoire+Extras',57,57,57,4,13),
(4,'Histoire',132,43,52,3,13),
(5,'Histoire',55,23,12,1,17),
(6,'Complétioniste',132,32,45,1,15);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genre`
--

LOCK TABLES `Genre` WRITE;
/*!40000 ALTER TABLE `Genre` DISABLE KEYS */;
INSERT INTO `Genre` VALUES
(1,'Action'),
(2,'Aventure'),
(3,'RPG'),
(4,'Monde Ouvert'),
(5,'Combat'),
(6,'Gestion'),
(7,'Romance'),
(8,'JRPG'),
(9,'Stratégie'),
(10,'FPS'),
(11,'Hack n\'Slash');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Platforms`
--

LOCK TABLES `Platforms` WRITE;
/*!40000 ALTER TABLE `Platforms` DISABLE KEYS */;
INSERT INTO `Platforms` VALUES
(1,'PC'),
(2,'PS4'),
(3,'PS5'),
(4,'PS3'),
(5,'PS2'),
(6,'PS1'),
(7,'Nintendo Switch'),
(8,'Nintendo 64'),
(9,'Nintendo 3DS'),
(10,'Nintendo DS'),
(11,'Nintendo NES'),
(12,'Xbox'),
(13,'Xbox One'),
(14,'Xbox Series'),
(15,'Xbox 360');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
INSERT INTO `Reviews` VALUES
(1,5,'C\'est trop bien ce jeu !','2021-12-15 11:06:44',1,4,13),
(2,2,'J\'ai pas aimé...','2022-02-23 21:29:45',1,1,13),
(3,4,'J\'ai adoré mais moins que Dragon Ball.','2022-05-17 23:32:11',1,3,13);
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

-- Dump completed on 2022-05-23 14:03:06
