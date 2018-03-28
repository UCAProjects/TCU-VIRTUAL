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
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_grupos_carrera_idx` (`carrera`),
  CONSTRAINT `fk_grupos_carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'2018-01-24','saf',NULL),(2,'2018-01-24','Grupo TCU',NULL),(3,'2018-01-24','Grupo TCU',NULL),(4,'2018-01-24','Grupo TCU',NULL),(5,'2018-01-24','Grupo TCU',NULL),(6,'2018-01-24','Grupo TCU',NULL),(7,'2018-01-24','Grupo TCU',NULL),(8,'2018-01-24','Grupo TCU',NULL),(9,'2018-01-24','Grupo TCU',NULL),(13,'2018-01-24','Grupo TCU',NULL),(31,'2018-01-25','Grupo TCU',NULL),(32,'2018-01-25','Grupo TCU',NULL),(34,'2018-01-25','Grupo TCU',NULL),(36,'2018-01-25','Grupo TCU',NULL),(37,'2018-01-25','Grupo TCU',NULL),(38,'2018-01-25','Grupo TCU',NULL),(39,'2018-01-25','Grupo TCU',NULL),(41,'2018-01-25','Grupo TCU',NULL),(42,'2018-01-25','Grupo TCU',NULL),(44,'2018-01-25','Grupo TCU',NULL),(45,'2018-01-26','Grupo TCU',NULL),(46,'2018-01-29','Grupo TCU',NULL),(47,'2018-01-29','Grupo TCU',NULL),(48,'2018-02-08','Grupo TCU',NULL),(49,'2018-02-08','Grupo TCU',NULL),(51,'2018-02-08','Grupo TCU',NULL),(52,'2018-02-12','Grupo TCU',NULL),(53,'2018-02-12','Grupo TCU',NULL),(54,'2018-02-19','Grupo TCU',NULL),(55,'2018-02-19','Grupo TCU',2),(56,'2018-03-14','Recolección de basura',2),(57,'2018-03-14','Enseñanza de españo',2);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27 20:25:18
