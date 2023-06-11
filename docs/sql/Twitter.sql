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
-- Table structure for table `casas`
--

DROP TABLE IF EXISTS `casas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casas` (
  `id_casa` int NOT NULL AUTO_INCREMENT,
  `casa` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `puntos_totales` int DEFAULT NULL,
  PRIMARY KEY (`id_casa`),
  UNIQUE KEY `casa` (`casa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Table structure for table `contraseñas`
--

DROP TABLE IF EXISTS `contraseñas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contraseñas` (
  `id_contraseña` int NOT NULL AUTO_INCREMENT,
  `id_usuarios` int DEFAULT NULL,
  PRIMARY KEY (`id_contraseña`),
  KEY `id_usuarios` (`id_usuarios`),
  CONSTRAINT `contraseñas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contraseñas`
--

LOCK TABLES `contraseñas` WRITE;
/*!40000 ALTER TABLE `contraseñas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contraseñas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuarios` int NOT NULL AUTO_INCREMENT,
  `usuario` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `puntos_usuario` int DEFAULT NULL,
  `id_casa` int DEFAULT NULL,
  `contra_hash` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `sal` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_casa` (`id_casa`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_casa`) REFERENCES `casas` (`id_casa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
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

-- Dump completed on 2023-06-10 21:06:17
