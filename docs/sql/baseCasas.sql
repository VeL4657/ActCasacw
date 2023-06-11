-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (x86_64)
--
-- Host: localhost    Database: baseCasas
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Casas`
--

DROP TABLE IF EXISTS `Casas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Casas` (
  `CasaID` int NOT NULL AUTO_INCREMENT,
  `NombreCasa` varchar(50) NOT NULL,
  `PuntosTotales` int DEFAULT '0',
  PRIMARY KEY (`CasaID`),
  UNIQUE KEY `NombreCasa` (`NombreCasa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Casas`
--

LOCK TABLES `Casas` WRITE;
/*!40000 ALTER TABLE `Casas` DISABLE KEYS */;
INSERT INTO `Casas` VALUES (1,'Ajolotes',0),(2,'Halcones',0),(3,'Teporingos',0);
/*!40000 ALTER TABLE `Casas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ContraPass`
--

DROP TABLE IF EXISTS `ContraPass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ContraPass` (
  `ContraID` int NOT NULL AUTO_INCREMENT,
  `ContraHashh` varchar(100) NOT NULL,
  `Sal` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ContraID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContraPass`
--

LOCK TABLES `ContraPass` WRITE;
/*!40000 ALTER TABLE `ContraPass` DISABLE KEYS */;
INSERT INTO `ContraPass` VALUES (1,'hash1','salt1'),(2,'hash2','salt2'),(3,'hash3','salt3'),(4,'hash4','salt4'),(5,'hash5','salt5'),(6,'hash6','salt6'),(7,'hash7','salt7'),(8,'hash8','salt8'),(9,'hash9','salt9'),(10,'hash10','salt10');
/*!40000 ALTER TABLE `ContraPass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuarios` (
  `UsuarioID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `ContraID` int DEFAULT NULL,
  `CasaID` int DEFAULT NULL,
  `Puntos` int DEFAULT '0',
  PRIMARY KEY (`UsuarioID`),
  UNIQUE KEY `Usuario` (`Usuario`),
  KEY `ContraID` (`ContraID`),
  KEY `CasaID` (`CasaID`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ContraID`) REFERENCES `ContraPass` (`ContraID`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`CasaID`) REFERENCES `Casas` (`CasaID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'Juan Pérez','juanperez',1,1,0),(2,'María López','marialopez',2,1,0),(3,'Carlos Rodríguez','carlosrodriguez',3,2,0),(4,'Laura García','lauragarcia',4,2,0),(5,'Pedro Martínez','pedromartinez',5,3,0),(6,'Ana Sánchez','anasanchez',6,3,0),(7,'Luis González','luisgonzalez',7,1,0),(8,'Isabel Torres','isabeltorres',8,2,0),(9,'Sergio Ramírez','sergioramirez',9,3,0),(10,'Marta Vargas','martavargas',10,1,0);
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-11  1:19:55
