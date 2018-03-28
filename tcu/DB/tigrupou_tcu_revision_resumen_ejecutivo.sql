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
-- Table structure for table `revision_resumen_ejecutivo`
--

DROP TABLE IF EXISTS `revision_resumen_ejecutivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_resumen_ejecutivo` (
  `version` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `estado` int(11) NOT NULL,
  `resumen_ejecutivo` int(11) NOT NULL,
  `fecha_revision` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`version`),
  KEY `fk_revision_resumen_ejecutivo_resumen_ejecutivo_idx` (`resumen_ejecutivo`),
  KEY `fk_resumen_ejecutivo_estado_idx` (`estado`),
  CONSTRAINT `fk_resumen_ejecutivo_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo`),
  CONSTRAINT `fk_revision_resumen_ejecutivo_resumen_ejecutivo` FOREIGN KEY (`resumen_ejecutivo`) REFERENCES `resumen_ejecutivo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_resumen_ejecutivo`
--

LOCK TABLES `revision_resumen_ejecutivo` WRITE;
/*!40000 ALTER TABLE `revision_resumen_ejecutivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_resumen_ejecutivo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27 20:25:17
