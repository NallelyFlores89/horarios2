-- MySQL dump 10.13  Distrib 5.1.67, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: horariosT2
-- ------------------------------------------------------
-- Server version	5.1.67-0ubuntu0.11.10.1

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
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias` (
  `iddias` int(11) NOT NULL AUTO_INCREMENT,
  `nombredia` varchar(45) NOT NULL,
  PRIMARY KEY (`iddias`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
INSERT INTO `dias` VALUES (1,'lunes'),(2,'martes'),(3,'miercoles'),(4,'jueves'),(5,'viernes');
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisiones`
--

DROP TABLE IF EXISTS `divisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisiones` (
  `iddivisiones` int(11) NOT NULL AUTO_INCREMENT,
  `nombredivision` varchar(10) NOT NULL,
  PRIMARY KEY (`iddivisiones`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisiones`
--

LOCK TABLES `divisiones` WRITE;
/*!40000 ALTER TABLE `divisiones` DISABLE KEYS */;
INSERT INTO `divisiones` VALUES (1,'CBI'),(2,'CBS'),(3,'CSH');
/*!40000 ALTER TABLE `divisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `uea_iduea` int(11) NOT NULL,
  `profesores_idprofesores` int(11) NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `fk_grupo_uea1` (`uea_iduea`),
  KEY `fk_grupo_profesores1` (`profesores_idprofesores`),
  CONSTRAINT `fk_grupo_uea1` FOREIGN KEY (`uea_iduea`) REFERENCES `uea` (`iduea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_profesores1` FOREIGN KEY (`profesores_idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,'fg21','PA01',1,1),(2,'hyfd','PA02',1,1),(3,'gsas','PA03',1,2),(4,'gddd','M201',2,2),(5,'haas','M202',2,3),(6,'baxx','M301',3,4);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `idhorarios` int(11) NOT NULL,
  `hora` varchar(12) NOT NULL,
  PRIMARY KEY (`idhorarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'08:00'),(2,'08:30'),(3,'09:00'),(4,'09:30'),(5,'10:00'),(6,'10:30'),(7,'11:00'),(8,'11:30'),(9,'12:00'),(10,'12:30'),(11,'13:00'),(12,'13:30'),(13,'14:00'),(14,'14:30'),(15,'15:00'),(16,'15:30'),(17,'16:00'),(18,'16:30'),(19,'17:00'),(20,'17:30'),(21,'18:00'),(22,'18:30'),(23,'19:00'),(24,'19:30'),(25,'20:00'),(26,'20:30'),(27,'21:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorios`
--

DROP TABLE IF EXISTS `laboratorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorios` (
  `idlaboratorios` int(11) NOT NULL,
  `nombrelaboratorios` varchar(20) NOT NULL,
  PRIMARY KEY (`idlaboratorios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorios`
--

LOCK TABLES `laboratorios` WRITE;
/*!40000 ALTER TABLE `laboratorios` DISABLE KEYS */;
INSERT INTO `laboratorios` VALUES (105,'AT-105'),(106,'AT-106'),(219,'AT-219'),(220,'AT-220'),(221,'AT-220B');
/*!40000 ALTER TABLE `laboratorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorios_grupo`
--

DROP TABLE IF EXISTS `laboratorios_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorios_grupo` (
  `idlaboratorios` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `semanas_idsemanas` int(11) NOT NULL,
  `dias_iddias` int(11) NOT NULL,
  `horarios_idhorarios` int(11) NOT NULL,
  `trimestre_idtrim` int(11) NOT NULL,
  PRIMARY KEY (`idlaboratorios`,`horarios_idhorarios`,`dias_iddias`,`semanas_idsemanas`,`trimestre_idtrim`),
  KEY `fk_laboratorios_has_grupo_grupo1` (`idgrupo`),
  KEY `fk_laboratorios_has_grupo_laboratorios1` (`idlaboratorios`),
  KEY `fk_laboratorios_grupo_dias1` (`dias_iddias`),
  KEY `fk_laboratorios_grupo_horarios1` (`horarios_idhorarios`),
  KEY `fk_laboratorios_grupo_semanas1` (`semanas_idsemanas`),
  KEY `fk_laboratorios_grupo_trimestre1` (`trimestre_idtrim`),
  CONSTRAINT `fk_laboratorios_has_grupo_laboratorios1` FOREIGN KEY (`idlaboratorios`) REFERENCES `laboratorios` (`idlaboratorios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_has_grupo_grupo1` FOREIGN KEY (`idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_grupo_dias1` FOREIGN KEY (`dias_iddias`) REFERENCES `dias` (`iddias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_grupo_horarios1` FOREIGN KEY (`horarios_idhorarios`) REFERENCES `horarios` (`idhorarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_grupo_semanas1` FOREIGN KEY (`semanas_idsemanas`) REFERENCES `semanas` (`idsemanas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_grupo_trimestre1` FOREIGN KEY (`trimestre_idtrim`) REFERENCES `trimestre` (`idtrim`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorios_grupo`
--

LOCK TABLES `laboratorios_grupo` WRITE;
/*!40000 ALTER TABLE `laboratorios_grupo` DISABLE KEYS */;
INSERT INTO `laboratorios_grupo` VALUES (105,1,1,1,1,1),(105,1,1,1,2,1),(105,2,3,5,3,1),(106,2,2,2,22,1),(220,2,2,1,21,1),(105,3,1,3,2,1),(221,3,2,4,2,1),(105,4,1,1,5,1),(219,5,3,3,3,1),(219,5,1,1,27,1),(220,5,1,4,23,1);
/*!40000 ALTER TABLE `laboratorios_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorios_has_recursos`
--

DROP TABLE IF EXISTS `laboratorios_has_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorios_has_recursos` (
  `laboratorios_idlaboratorios` int(11) NOT NULL,
  `recursos_idrecursos` int(11) NOT NULL,
  PRIMARY KEY (`laboratorios_idlaboratorios`,`recursos_idrecursos`),
  KEY `fk_laboratorios_has_recursos_recursos1` (`recursos_idrecursos`),
  KEY `fk_laboratorios_has_recursos_laboratorios1` (`laboratorios_idlaboratorios`),
  CONSTRAINT `fk_laboratorios_has_recursos_laboratorios1` FOREIGN KEY (`laboratorios_idlaboratorios`) REFERENCES `laboratorios` (`idlaboratorios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_has_recursos_recursos1` FOREIGN KEY (`recursos_idrecursos`) REFERENCES `recursos` (`idrecursos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorios_has_recursos`
--

LOCK TABLES `laboratorios_has_recursos` WRITE;
/*!40000 ALTER TABLE `laboratorios_has_recursos` DISABLE KEYS */;
INSERT INTO `laboratorios_has_recursos` VALUES (105,1),(106,1),(219,1),(105,2),(106,2),(220,2),(105,3),(106,3),(219,3);
/*!40000 ALTER TABLE `laboratorios_has_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesores` (
  `idprofesores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `numempleado` varchar(20) NOT NULL,
  `correo` varchar(40) NOT NULL,
  PRIMARY KEY (`idprofesores`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` VALUES (1,'juanito perez lopez','2929','juanito@xanum.com'),(2,'lorenzo cardenas ','2012','lorenzo@xanum.com'),(3,'jose cardenas','2011','jose@xanum.com'),(4,'marco díaz','1002','marco@xanum.com');
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `idrecursos` int(11) NOT NULL AUTO_INCREMENT,
  `recurso` varchar(45) NOT NULL,
  PRIMARY KEY (`idrecursos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recursos`
--

LOCK TABLES `recursos` WRITE;
/*!40000 ALTER TABLE `recursos` DISABLE KEYS */;
INSERT INTO `recursos` VALUES (1,'Ubuntu 12.04'),(2,'Windows 7'),(3,'Geogebra'),(4,'Eclipse'),(5,'Netbeans');
/*!40000 ALTER TABLE `recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semanas`
--

DROP TABLE IF EXISTS `semanas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semanas` (
  `idsemanas` int(11) NOT NULL,
  `semana` varchar(15) NOT NULL,
  PRIMARY KEY (`idsemanas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semanas`
--

LOCK TABLES `semanas` WRITE;
/*!40000 ALTER TABLE `semanas` DISABLE KEYS */;
INSERT INTO `semanas` VALUES (1,'uno'),(2,'dos'),(3,'tres'),(4,'cuatro'),(5,'cinco'),(6,'seis'),(7,'siete'),(8,'ocho'),(9,'nueve'),(10,'diez'),(11,'once'),(12,'doce'),(13,'doce-bis');
/*!40000 ALTER TABLE `semanas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trimestre` (
  `idtrim` int(11) NOT NULL,
  `trim` varchar(15) NOT NULL,
  PRIMARY KEY (`idtrim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trimestre`
--

LOCK TABLES `trimestre` WRITE;
/*!40000 ALTER TABLE `trimestre` DISABLE KEYS */;
INSERT INTO `trimestre` VALUES (1,'13-I');
/*!40000 ALTER TABLE `trimestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uea`
--

DROP TABLE IF EXISTS `uea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uea` (
  `iduea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreuea` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `divisiones_iddivisiones` int(11) NOT NULL,
  PRIMARY KEY (`iduea`),
  KEY `fk_uea_divisiones1` (`divisiones_iddivisiones`),
  CONSTRAINT `fk_uea_divisiones1` FOREIGN KEY (`divisiones_iddivisiones`) REFERENCES `divisiones` (`iddivisiones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uea`
--

LOCK TABLES `uea` WRITE;
/*!40000 ALTER TABLE `uea` DISABLE KEYS */;
INSERT INTO `uea` VALUES (1,'programación avanzada','1234',1),(2,'programación aplicada a la química','1342',2),(3,'introducción a la programación','1467',1),(4,'sistemas operativos','1111',1),(5,'programación en administración','4642',3),(6,'programación avanzada','1300',1);
/*!40000 ALTER TABLE `uea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioadmin`
--

DROP TABLE IF EXISTS `usuarioadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarioadmin` (
  `idusuarioadmin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuarioadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioadmin`
--

LOCK TABLES `usuarioadmin` WRITE;
/*!40000 ALTER TABLE `usuarioadmin` DISABLE KEYS */;
INSERT INTO `usuarioadmin` VALUES (1,'admin','admin','admin@correo.com');
/*!40000 ALTER TABLE `usuarioadmin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-22 22:20:05
