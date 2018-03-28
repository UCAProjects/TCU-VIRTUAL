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
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) NOT NULL,
  `nombre_completo` varchar(200) NOT NULL,
  `cedula` char(25) NOT NULL,
  `telefono_trabajo` varchar(45) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `sede` int(11) NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `aino` year(4) NOT NULL,
  `lugar_trabajo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_estudiantes_grupo_idx` (`grupo`),
  KEY `fk_estudiantes_cuatrimestre_idx` (`cuatrimestre`),
  KEY `fk_estudiantes_carrera_idx` (`carrera`),
  KEY `fk_estudiantes_grado_idx` (`grado`),
  KEY `fk_estudiantes_sede_idx` (`sede`),
  CONSTRAINT `fk_estudiantes_carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`codigo`),
  CONSTRAINT `fk_estudiantes_cuatrimestre` FOREIGN KEY (`cuatrimestre`) REFERENCES `periodos` (`codigo`),
  CONSTRAINT `fk_estudiantes_grado` FOREIGN KEY (`grado`) REFERENCES `grados` (`codigo`),
  CONSTRAINT `fk_estudiantes_grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`codigo`),
  CONSTRAINT `fk_estudiantes_sede` FOREIGN KEY (`sede`) REFERENCES `sedes` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (15,'Mora','Valverde','Adrian','123','123','123456789','albin.moravalverde@gmail.com',1,1,1,1,55,2018,'TEC'),(16,'Madriz','Cubero','María','234','7890','456789','mariacm@gmail.com',1,1,1,1,56,2018,'UCA'),(17,'Jimenez','Valverde','Carlos','111111111','','88655613','albin.moravalverde@gmail.com',1,2,1,1,56,2018,'Cargato'),(18,'Ramirez','Porras','Ignacio','12345','12345643','87659834','ig@gmail.com',1,1,1,1,55,2018,'UNA'),(19,'Castro','Madriz','Carlos','1234532','6898809','68768','amo@gmail.com',1,2,1,1,56,2018,'UCA'),(20,'Jimenez','Valverde','Carlos','111111111','','88655613','albin.moravalverde@gmail.com',1,2,1,1,57,2018,'Cargato'),(21,'Jimenez','Valverde','Carlos','111111111','','88655613','albin.moravalverde@gmail.com',1,1,1,1,NULL,2018,'Cargato');
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
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
