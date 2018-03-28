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
-- Table structure for table `ante_proyecto`
--

DROP TABLE IF EXISTS `ante_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ante_proyecto` (
  `identificacion_problema` text NOT NULL,
  `descripcion_problema` text NOT NULL,
  `descripcion_beneficiario` text NOT NULL,
  `justificacion_proyecto` text NOT NULL,
  `objetivo_general` text NOT NULL,
  `objetivos_especificos` text NOT NULL,
  `estrategias_soluciones` text NOT NULL,
  `grupo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`grupo`),
  KEY `fk_antreProyecto_grupo_idx` (`grupo`),
  KEY `fk_ante_proyecto_estado_idx` (`estado`),
  CONSTRAINT `fk_ante_proyecto_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo`),
  CONSTRAINT `fk_antreProyecto_grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ante_proyecto`
--

LOCK TABLES `ante_proyecto` WRITE;
/*!40000 ALTER TABLE `ante_proyecto` DISABLE KEYS */;
INSERT INTO `ante_proyecto` VALUES ('sasdf','asdfa','adsfad','dfasd','asfad','adfasd','adsfasd',55,1);
/*!40000 ALTER TABLE `ante_proyecto` ENABLE KEYS */;
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
