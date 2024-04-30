-- MariaDB dump 10.19-11.1.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: winkensteindatabase
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB

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
-- Table structure for table `kundeinfo`
--

DROP TABLE IF EXISTS `kundeinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kundeinfo` (
  `idKundeinfo` int(11) NOT NULL AUTO_INCREMENT,
  `brukernavn` varchar(245) DEFAULT NULL,
  `passord` varchar(245) DEFAULT NULL,
  `usertype` varchar(245) DEFAULT 'user',
  PRIMARY KEY (`idKundeinfo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kundeinfo`
--

LOCK TABLES `kundeinfo` WRITE;
/*!40000 ALTER TABLE `kundeinfo` DISABLE KEYS */;
INSERT INTO `kundeinfo` VALUES
(1,'erenadmin','b1c4e21e06cf9b5597e38e9dcd224c6b','admin'),
(2,'eren','a209541310cac0ba0f9d419d51061198','user');
/*!40000 ALTER TABLE `kundeinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pameldingsinfo`
--

DROP TABLE IF EXISTS `pameldingsinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pameldingsinfo` (
  `idpameldingsinfo` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(245) DEFAULT NULL,
  `etternavn` varchar(245) DEFAULT NULL,
  `alder` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `hvorfor` varchar(545) DEFAULT NULL,
  PRIMARY KEY (`idpameldingsinfo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pameldingsinfo`
--

LOCK TABLES `pameldingsinfo` WRITE;
/*!40000 ALTER TABLE `pameldingsinfo` DISABLE KEYS */;
INSERT INTO `pameldingsinfo` VALUES
(1,'tester','tests','29','testertests@gmail.com','jeg melder meg pÃ¥ fordi jeg syns lan er kult.'),
(2,'tester','tests','29','testertests@gmail.com','jeg melder meg pÃ¥ fordi jeg syns lan er kult.');
/*!40000 ALTER TABLE `pameldingsinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-30 10:57:59
