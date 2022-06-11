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
  `registerDate` date NOT NULL,
  PRIMARY KEY (`Id_Gamer`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gamer`
--

LOCK TABLES `Gamer` WRITE;
/*!40000 ALTER TABLE `Gamer` DISABLE KEYS */;
INSERT INTO `Gamer` VALUES
(1,'Vegeta_88','$2y$10$2RUXZ5W8zQBx.9AC19fkSOnTxl90kqtzwd9.O9lJ8.BtWkWDqZmqu','juleray@msn.com','[ADMIN]','../../assets/pictures/vegeta_1771.jpg','2022-04-11'),
(13,'Dragon','$2y$10$zS4vtQtMQhszpw1gx4/dxudslLHGPoLFXfVtBzqB0vCC.2RKpFqsy','Dragon@dragon.dragon','[GAMER]','628376bab6482.png','2022-04-19'),
(14,'Vegeta_44','$2y$10$AaLa6hY4lLSUf0dW41CX1eSi0lwc4fmuS4mVTefzBGKZbddk01Vym','zfapapeeg@fzapfofzapf.com','[GAMER]','62838d93bcf52.png','2022-04-26'),
(15,'LaFigue','$2y$10$0IjlaRhQZS0a88QdIh.WruZankYQ3msPd0sf9ldzSL3mwYgN3TdZW','LaFigue@lafigue.fr','[GAMER]','../../assets/pictures/dragon.png','2022-04-27'),
(16,'LaBanane','$2y$10$pv3YZazS7kzKe7H.4yvpp.yBhGNsz4..dWZ0mR.mqUFSfn8tWIXMW','LaBanane@banane.fr','[GAMER]','../../assets/pictures/dragon.png','2022-05-09'),
(17,'MathieuAjax','$2y$10$6xVURws3UnKAfmrQgU/gpOuz2EfOxu5EZrmw3PBBShUVQ.7ZEZuEO','Vegepate@terrine.jp','[GAMER]','62839eec13cc4.jpeg','2022-05-10'),
(24,'LaRaclette','$2y$10$K40wDFpPB7EmGK72M6xY4OVQtbPwROdOWLw.zZsm/yZQ94oO5g7X6','RacletteParty@truffade.savoie','[GAMER]','6294b0279eabe.png','2022-05-10'),
(29,'Vegeta_Majin_De_La_Mort','$2y$10$tmWd5Ut1giXQGHeW0jAE2eF/Qboly3U/KGgTQ9r1FL8ffrPm2YyLO','zfapapeeg@fzapfofzapf.com','[GAMER]','6296100867ade.jpeg','2022-05-24'),
(30,'Totoro','$2y$10$jZCWboiukkl0eo7f9NM8NuiE0yqimqXGCaTgZ4BjTDnRnRu6PVwxS','Totoro@totoro.jp','[GAMER]','../../assets/pictures/dragon.png','2006-02-22'),
(31,'MalikaLeternelle','$2y$10$Q2oFge3uNOZ5sR/Kede5uuess3vGrxmbbN8W3vB2sbLUR8TWDFJKy','PiccoloLeNamek@Porunga.jp','[GAMER]','../../assets/pictures/dragon.png','2006-07-22'),
(32,'GodrickLeGreffe','$2y$10$3p9eSvjaKQqofbZOTt4z/.Swi9Pg.ociAfDyalYwrm5T5o93M9pnW','EldenRing@GOTY22.fr','[GAMER]','../../assets/pictures/dragon.png','2006-07-22');
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
  `released` date DEFAULT NULL,
  `editor` varchar(255) NOT NULL,
  `studio` varchar(255) NOT NULL,
  `addDate` date NOT NULL,
  PRIMARY KEY (`Id_Games`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Games`
--

LOCK TABLES `Games` WRITE;
/*!40000 ALTER TABLE `Games` DISABLE KEYS */;
INSERT INTO `Games` VALUES
(1,'Elden Ring','Elden Ring se déroule dans le royaume de l\'Entre-terre, quelque temps après la destruction du Cercle d’Elden et la dispersion de ses fragments, les runes majeures. Autrefois honoré par la présence du Cercle et de l\'Arbre-Monde, le royaume est maintenant gouverné par les descendants demi-dieux de la reine Marika l\'Éternelle, chacun possédant un éclat du Cercle d\'Elden qui les corrompt et les empoisonne par leur pouvoir.','2022-02-28','Bandai Namco','From Software','2022-05-24'),
(2,'Pillars of Eternity','L\'histoire se déroule dans le monde d\'Eora, dans une région située dans l\'hémisphère sud, appelée les Contrées Orientales, une région qui a approximativement la taille de l\'Espagne. Les Contrées orientales comportent plusieurs nations, dont le Palatinat Libre du Dyrwood – une ancienne colonie du puissant Empire d\'Aedyr qui a gagné son indépendance au travers d\'une révolution6 – les Républiques de Vailia.','2015-03-26','Paradox Interactive','Obsidian Entertainment','2022-05-25'),
(3,'Zelda: Breath of the Wild','L\'intrigue se déroule dans un univers médiéval-fantastique, le royaume d\'Hyrule. Ce dernier est dévasté à la suite d\'une catastrophe ayant eu lieu un siècle avant l\'aventure, et présente ainsi de nombreux temples et bâtiments en ruines. La nature, par sa faune et sa flore, est en revanche omniprésente. ','2017-03-03','Nintendo','Nintendo','2022-05-25'),
(4,'Dragon Ball Xenoverse 2','Il s\'agit d\'un jeu de combat en map fermée (mais possédant de grandes limites). L\'attrait principal du jeu est que le joueur peut créer son avatar parmi cinq races qui sont les Majins (comme Boo), les Saiyans (comme Son Goku et Vegeta), les terriens (comme Krilin), les Nameks (comme Piccolo) ou enfin la race de Freezer. ','2016-10-24','Bandai Namco','Dimps','2022-06-01'),
(11,'Divinity 2 Original Sin','À la suite de la mort du Divin, les ensourceleurs attirent le Vide. L\'Ordre Divin dirigé par l\'Evêque Alexandar décide de proscrire l\'utilisation de la Source. Le joueur incarne un(e) ensourceleur(se) renégat victime de la répression de l\'Evêque.','2017-09-14','Larian Studios','Larian Studios','2022-06-01'),
(36,'Pokémon Version Violet','Pokémon Écarlate et Pokémon Violet se déroulent dans un monde ouvert dans lequel les différentes villes s\'intègrent naturellement au paysage environnant, sans aucune transition2,3. La région semble être inspirée de la Péninsule Ibérique, d’après les images diffusées lors de l’annonce des jeux, où l\'on voit ce qui peut s\'apparenter à une hacienda, d\'autres bâtiments semblent reprendre l\'architecture de la ville de Lisbonne ou encore un bâtiment ressemblant à la Sagrada Familia de Barcelone',NULL,'Game Freak','Nintendo','2006-02-22'),
(37,'Pokémon Version Ecarlate','geazgzggggezvezvezv. ezvezvezvezvbezbezbezbezbezbebebebeebebevevev. eveavgzvbezvzevezvzevezvezvezvzevvzevezvezvezvezv','2022-11-18','Game Freak','Nintendo','2006-03-22');
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
  `addDate` date NOT NULL,
  PRIMARY KEY (`Id_Gametimes`),
  KEY `Id_Games` (`Id_Games`),
  KEY `Id_Gamer` (`Id_Gamer`),
  CONSTRAINT `Gametimes_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `Gametimes_ibfk_2` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gametimes`
--

LOCK TABLES `Gametimes` WRITE;
/*!40000 ALTER TABLE `Gametimes` DISABLE KEYS */;
INSERT INTO `Gametimes` VALUES
(1,'Histoire',98,57,23,1,13,'2022-04-12'),
(2,'Complétioniste',257,32,45,2,13,'2022-05-17'),
(5,'Histoire',55,23,12,1,17,'2022-05-29'),
(6,'Complétioniste',132,32,45,1,15,'2022-06-01'),
(16,'Histoire+Extras',98,32,45,2,15,'2022-06-07'),
(17,'Histoire+Extras',57,43,12,11,30,'2022-06-05'),
(18,'Complétioniste',257,43,52,4,29,'2022-06-03'),
(19,'Histoire',43,25,13,3,31,'2022-06-02');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
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
(11,'Hack n\'Slash'),
(12,'MMORPG');
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
  `console` varchar(50) NOT NULL,
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
  `addDate` date NOT NULL,
  PRIMARY KEY (`Id_Reviews`),
  KEY `Id_Games` (`Id_Games`),
  KEY `Id_Gamer` (`Id_Gamer`),
  CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
INSERT INTO `Reviews` VALUES
(1,5,'C\'est trop bien ce jeu !','2021-12-15 11:06:44',1,4,13,'2022-06-01'),
(3,4,'J\'ai adoré mais moins que Dragon Ball.','2022-05-17 23:32:11',1,3,13,'2022-06-02'),
(4,3,'Après quelques heures à adorer les combats, je me suis vite lassé. Trop de farm, trop de blabla, scénario presque inintéressant, heureusement que la fin du jeu s\'est vite montré sinon j\'aurais mourru d\'ennui !','2022-05-30 08:51:06',1,4,24,'2022-05-31');
/*!40000 ALTER TABLE `Reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_genre`
--

DROP TABLE IF EXISTS `game_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_genre` (
  `Id_Games` int(11) NOT NULL,
  `Id_Genre` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Genre`),
  KEY `Id_Genre` (`Id_Genre`),
  CONSTRAINT `game_genre_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `game_genre_ibfk_2` FOREIGN KEY (`Id_Genre`) REFERENCES `Genre` (`Id_Genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_genre`
--

LOCK TABLES `game_genre` WRITE;
/*!40000 ALTER TABLE `game_genre` DISABLE KEYS */;
INSERT INTO `game_genre` VALUES
(1,2),
(1,3),
(1,4),
(2,3),
(3,4),
(4,5),
(11,3),
(36,3),
(37,3);
/*!40000 ALTER TABLE `game_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_platform`
--

DROP TABLE IF EXISTS `game_platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_platform` (
  `Id_Games` int(11) NOT NULL,
  `Id_Platforms` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Platforms`),
  KEY `Id_Platforms` (`Id_Platforms`),
  CONSTRAINT `game_platform_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `game_platform_ibfk_2` FOREIGN KEY (`Id_Platforms`) REFERENCES `Platforms` (`Id_Platforms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_platform`
--

LOCK TABLES `game_platform` WRITE;
/*!40000 ALTER TABLE `game_platform` DISABLE KEYS */;
INSERT INTO `game_platform` VALUES
(1,1),
(1,2),
(1,3),
(1,14),
(2,1),
(3,7),
(4,1),
(4,7),
(36,7),
(37,7);
/*!40000 ALTER TABLE `game_platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gamer_games`
--

DROP TABLE IF EXISTS `gamer_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gamer_games` (
  `Id_Gamer` int(11) NOT NULL,
  `Id_Games` int(11) NOT NULL,
  PRIMARY KEY (`Id_Gamer`,`Id_Games`),
  KEY `Id_Games` (`Id_Games`),
  CONSTRAINT `gamer_games_ibfk_1` FOREIGN KEY (`Id_Gamer`) REFERENCES `Gamer` (`Id_Gamer`),
  CONSTRAINT `gamer_games_ibfk_2` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gamer_games`
--

LOCK TABLES `gamer_games` WRITE;
/*!40000 ALTER TABLE `gamer_games` DISABLE KEYS */;
/*!40000 ALTER TABLE `gamer_games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games_gamelists`
--

DROP TABLE IF EXISTS `games_gamelists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games_gamelists` (
  `Id_Games` int(11) NOT NULL,
  `Id_Gamelists` int(11) NOT NULL,
  PRIMARY KEY (`Id_Games`,`Id_Gamelists`),
  KEY `Id_Gamelists` (`Id_Gamelists`),
  CONSTRAINT `games_gamelists_ibfk_1` FOREIGN KEY (`Id_Games`) REFERENCES `Games` (`Id_Games`),
  CONSTRAINT `games_gamelists_ibfk_2` FOREIGN KEY (`Id_Gamelists`) REFERENCES `Gamelists` (`Id_Gamelists`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games_gamelists`
--

LOCK TABLES `games_gamelists` WRITE;
/*!40000 ALTER TABLE `games_gamelists` DISABLE KEYS */;
/*!40000 ALTER TABLE `games_gamelists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-11 13:21:56
