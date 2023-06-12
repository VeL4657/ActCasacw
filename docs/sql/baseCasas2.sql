-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: baseCasas
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `casas`
--

DROP TABLE IF EXISTS `casas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casas` (
  `CasaID` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCasa` varchar(50) NOT NULL,
  `PuntosTotales` int(11) DEFAULT 0,
  PRIMARY KEY (`CasaID`),
  UNIQUE KEY `NombreCasa` (`NombreCasa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casas`
--

LOCK TABLES `casas` WRITE;
/*!40000 ALTER TABLE `casas` DISABLE KEYS */;
INSERT INTO `casas` VALUES (1,'Ajolotes',0),(2,'Halcones',0),(3,'Teporingos',0);
/*!40000 ALTER TABLE `casas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrapass`
--

DROP TABLE IF EXISTS `contrapass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrapass` (
  `ContraID` int(11) NOT NULL AUTO_INCREMENT,
  `ContraHashh` varchar(100) NOT NULL,
  `Sal` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ContraID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrapass`
--

LOCK TABLES `contrapass` WRITE;
/*!40000 ALTER TABLE `contrapass` DISABLE KEYS */;
INSERT INTO `contrapass` VALUES (1,'hash_contra_1','sal_1'),(2,'hash_contra_2','sal_2'),(3,'hash_contra_3','sal_3'),(4,'hash_contra_4','sal_4'),(5,'hash_contra_5','sal_5'),(6,'hash_contra_6','sal_6'),(7,'hash_contra_7','sal_7'),(8,'hash_contra_8','sal_8'),(9,'hash_contra_9','sal_9'),(10,'hash_contra_10','sal_10');
/*!40000 ALTER TABLE `contrapass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `ContraID` int(11) DEFAULT NULL,
  `CasaID` int(11) DEFAULT NULL,
  `Puntos` int(11) DEFAULT 0,
  PRIMARY KEY (`UsuarioID`),
  UNIQUE KEY `Usuario` (`Usuario`),
  KEY `ContraID` (`ContraID`),
  KEY `CasaID` (`CasaID`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ContraID`) REFERENCES `contrapass` (`ContraID`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`CasaID`) REFERENCES `casas` (`CasaID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan','juan_user',1,1,100),(2,'Susana','susan_user',2,2,120),(3,'Carlos','carlos_user',3,3,150),(4,'Sofia','sofia_user',4,1,130),(5,'Marta','marta_user',5,2,160),(6,'Luis','luis_user',6,3,140),(7,'Ana','ana_user',7,1,100),(8,'Sergio','sergio_user',8,2,110),(9,'Daniela','dani_user',9,3,130),(10,'Ricardo','ricardo_user',10,1,160);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-12 11:03:30
