-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tigrupou_tcu
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `revision_ante_proyecto`
--

DROP TABLE IF EXISTS `revision_ante_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_ante_proyecto` (
  `version` int(11) NOT NULL,
  `Observaciones` text,
  `estado` int(11) NOT NULL,
  `ante_proyecto` int(11) NOT NULL,
  `fecha_revision` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`version`,`ante_proyecto`),
  KEY `fk_revision_ante_proyecto_estado_idx` (`estado`),
  KEY `fk_revision_ante_proyecto_ante_proyecto_idx` (`ante_proyecto`),
  CONSTRAINT `fk_revision_ante_proyecto_ante_proyecto` FOREIGN KEY (`ante_proyecto`) REFERENCES `ante_proyecto` (`grupo`),
  CONSTRAINT `fk_revision_ante_proyecto_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_ante_proyecto`
--

LOCK TABLES `revision_ante_proyecto` WRITE;
/*!40000 ALTER TABLE `revision_ante_proyecto` DISABLE KEYS */;
INSERT INTO `revision_ante_proyecto` VALUES (1,'asdfadf',2,55,'2018-03-27 19:35:19'),(2,'',2,55,'2018-03-27 19:53:18');
/*!40000 ALTER TABLE `revision_ante_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27 20:25:16
