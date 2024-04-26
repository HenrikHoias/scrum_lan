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
  PRIMARY KEY (`idKundeinfo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kundeinfo`
--

LOCK TABLES `kundeinfo` WRITE;
/*!40000 ALTER TABLE `kundeinfo` DISABLE KEYS */;
INSERT INTO `kundeinfo` VALUES
(1,'Oliver','c722afe23409c2d50a32c93fc709e861'),
(2,'henrik','202cb962ac59075b964b07152d234b70'),
(3,'eren','a209541310cac0ba0f9d419d51061198'),
(4,'marius','202cb962ac59075b964b07152d234b70');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pameldingsinfo`
--

LOCK TABLES `pameldingsinfo` WRITE;
/*!40000 ALTER TABLE `pameldingsinfo` DISABLE KEYS */;
INSERT INTO `pameldingsinfo` VALUES
(1,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(2,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(3,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(4,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(5,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(6,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(7,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(8,'Oliver','Ono','18','oliverono@gmail.com','jeg vil melde meg pÃ¥ fordi fordi bla bla bla'),
(9,'qdwwqd','qwddqwdwq','wqddwqdwqwdq','qwdqwwqd@gmail.com','qdwwqddwqqdwqwddqw'),
(10,'','','','',''),
(11,'','','','',''),
(12,'','','','',''),
(13,'','','','',''),
(14,'','','','',''),
(15,'','','','',''),
(16,'','','','',''),
(17,'','','','',''),
(18,'','','','',''),
(19,'','','','',''),
(20,'marisu','raya','18','marius@gmail.com','qwdddwqdqddd'),
(21,'marisu','raya','18','marius@gmail.com','qwdddwqdqddd'),
(22,'marisu','raya','18','marius@gmail.com','qwdddwqdqddd'),
(23,'marisu','raya','18','marius@gmail.com','qwdddwqdqddd');
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

-- Dump completed on 2024-04-26 10:40:53
