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
-- Table structure for table `resumen_ejecutivo`
--

DROP TABLE IF EXISTS `resumen_ejecutivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resumen_ejecutivo` (
  `grupo` int(11) NOT NULL,
  `resumen_actividades` text NOT NULL,
  `evaluacion` text NOT NULL,
  `conclusion` text NOT NULL,
  `recomendaciones` text NOT NULL,
  PRIMARY KEY (`grupo`),
  UNIQUE KEY `grupo_UNIQUE` (`grupo`),
  CONSTRAINT `fk_resumen_ejecutivo_grupos` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumen_ejecutivo`
--

LOCK TABLES `resumen_ejecutivo` WRITE;
/*!40000 ALTER TABLE `resumen_ejecutivo` DISABLE KEYS */;
INSERT INTO `resumen_ejecutivo` VALUES (55,'Resumen de las actividades realizadas durante el tcu','   Un libro (del latín liber, libri) es una obra impresa, manuscrita o pintada en una serie de hojas de papel, pergamino, vitela u otro material, unidas por un lado (es decir, encuadernadas) y protegidas con tapas, también llamadas cubiertas. Un libro puede tratar sobre cualquier tema.\n\nSegún la definición de la Unesco,1​ un libro debe poseer 25 hojas mínimo, pues de 24 hojas sería un folleto y de una hasta cuatro páginas se consideran hojas sueltas (en una o dos hojas).\n\nTambién se llama \"libro\" a una obra de gran extensión publicada en varias unidades independientes, llamados \"tomos\" o \"volúmenes\". Otras veces se llama también \"libro\" a cada una de las partes de una obra, aunque físicamente se publiquen todas en un mismo volumen (ejemplo: Libros de la Biblia).   Descripción del problema.\n   Un libro (del latín liber, libri) es una obra impresa, manuscrita o pintada en una serie de hojas de papel, pergamino, vitela u otro material, unidas por un lado (es decir, encuadernadas) y protegidas con tapas, también llamadas cubiertas. Un libro puede tratar sobre cualquier tema.   \n\nEvaluación del tcu.                                                                                                                         ','   Un libro (del latín liber, libri) es una obra impresa, manuscrita o pintada en una serie de hojas de papel, pergamino, vitela u otro material, unidas por un lado (es decir, encuadernadas) y protegidas con tapas, también llamadas cubiertas. Un libro puede tratar sobre cualquier tema.\n\nSegún la definición de la Unesco,1​ un libro debe poseer 25 hojas mínimo, pues de 24 hojas sería un folleto y de una hasta cuatro páginas se consideran hojas sueltas (en una o dos hojas).\n\nTambién se llama \"libro\" a una obra de gran extensión publicada en varias unidades independientes, llamados \"tomos\" o \"volúmenes\". Otras veces se llama también \"libro\" a cada una de las partes de una obra, aunque físicamente se publiquen todas en un mismo volumen (ejemplo: Libros de la Biblia).   Descripción del problema.\n   Un libro (del latín liber, libri) es una obra impresa, manuscrita o pintada en una serie de hojas de papel, pergamino, vitela u otro material, unidas por un lado (es decir, encuadernadas) y protegidas con tapas, también llamadas cubiertas. Un libro puede tratar sobre cualquier tema.\n\nSegún la definición de la Unesco,1​ un libro debe poseer 25 hojas mínimo, pues de 24 hojas sería un folleto y de una hasta cuatro páginas se consideran hojas sueltas (en una o dos hojas).      \n\nConclusión TCU                                                                                                                                ','Recomendaciones TCU.');
/*!40000 ALTER TABLE `resumen_ejecutivo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27 20:25:19
