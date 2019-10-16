-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: exac-tic.com    Database: freeler
-- ------------------------------------------------------
-- Server version	5.6.43-cll-lve

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
-- Temporary table structure for view `PediblesDisponibles`
--

DROP TABLE IF EXISTS `PediblesDisponibles`;
/*!50001 DROP VIEW IF EXISTS `PediblesDisponibles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `PediblesDisponibles` (
  `tipo_pedible` tinyint NOT NULL,
  `pedible_id` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `descripcion` tinyint NOT NULL,
  `fecha_creacion` tinyint NOT NULL,
  `tercerizable` tinyint NOT NULL,
  `activo` tinyint NOT NULL,
  `preview` tinyint NOT NULL,
  `freeler` tinyint NOT NULL,
  `precio_min` tinyint NOT NULL,
  `precio_max` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `activo` int(11) DEFAULT '1' COMMENT '1:activo, 0: no activo',
  PRIMARY KEY (`administrador_id`),
  KEY `fk_administradores_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_administradores_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,58,1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afiche`
--

DROP TABLE IF EXISTS `afiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiche` (
  `afiche_id` int(11) NOT NULL AUTO_INCREMENT,
  `afiche_nombre` varchar(250) DEFAULT NULL,
  `afiche_fecha_creacion` varchar(250) DEFAULT NULL,
  `afiche_descripcion` varchar(250) DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `preview_img` varchar(250) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `tercerizable` int(11) DEFAULT '0',
  PRIMARY KEY (`afiche_id`),
  KEY `fk_afiche_empresa1_idx` (`empresa_id`),
  CONSTRAINT `fk_afiche_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiche`
--

LOCK TABLES `afiche` WRITE;
/*!40000 ALTER TABLE `afiche` DISABLE KEYS */;
INSERT INTO `afiche` VALUES (1,'nuevo producto','2018-11-28 15:32:16','el nuevo producto detalle',10,NULL,0,0),(2,'nuevo afiche','2018-11-29 01:03:46','el nuevo afiche detalle',10,NULL,0,0),(3,'billeteras','2018-12-06 02:01:27','estos son nuestros afiches',10,NULL,0,0),(4,'billeteras 2','2018-12-06 02:07:13','la lista de billeteras',10,NULL,0,0),(5,'afiche digital','2018-12-06 03:17:15','Nuestros ultimos gadgets',10,NULL,0,0),(6,'ttgg','2018-12-07 19:36:15','frtt',10,NULL,0,0),(7,'ffggg','2018-12-07 19:37:44','yuuhcd',10,NULL,0,0),(8,'afchichtg','2018-12-07 23:25:13','gyu',22,NULL,0,0),(9,'fgjj','2018-12-11 20:17:19','hhh',22,NULL,0,0),(10,'menu kairos 12/1218','2018-12-12 16:31:13','arma tu nenu, entreda, plato fondo, postre, y bebida',24,NULL,0,0),(11,'postres','2018-12-12 17:00:23','ttuu',24,NULL,1,0),(12,'segundos','2018-12-12 17:01:27',NULL,24,NULL,0,0),(13,'afiche','2018-12-19 02:27:31','afiche',10,NULL,0,1),(14,'fghjk','2018-12-26 18:42:33','ggyjj',24,NULL,0,0),(15,'afff','2018-12-28 23:12:08','nuevo',10,NULL,0,0),(16,'ggg','2018-12-28 23:36:13','bjjhj',10,NULL,0,0),(17,'afiche 2','2018-12-29 01:38:28','gggjnll',23,NULL,1,0),(18,'huj','2018-12-29 05:07:46','yvgj',10,NULL,1,0),(19,'hhjk','2018-12-29 18:15:08','gghu',22,NULL,1,0),(20,'ghju','2018-12-29 22:17:31','vvhj',22,NULL,1,1),(21,'Menu 07-01-19','2019-01-07 17:26:33','Haz tu pedido, escoge una entrada, un plato de fondo, bebida y postre. 1 sol mas por taper-delivery',24,NULL,1,0),(22,'Cursos de Verano','2019-01-27 21:32:55','Lista de nuestros cursos de Verano',27,NULL,0,0),(23,'Cursos de Verano','2019-01-27 21:36:39','Este verano ofrecemos los mejores cursos para aprovechar las vacaciones.',27,NULL,1,0),(24,'Cursos de verano','2019-01-27 21:38:41','Este verano ofrecenos los mejores cursos para que aproveches las vacaciones.!!!',27,NULL,0,0),(25,'cursis de vdy','2019-01-27 22:05:01','tchxb',27,NULL,0,0),(26,'gvgvgv','2019-01-27 22:05:52','gybyby',27,NULL,0,0),(27,'yg yg yg','2019-01-27 22:08:41','vg uc yv',27,NULL,0,0),(28,'CARTA LUIGI\'S BURGUER','2019-02-07 02:34:27','Haz tu pedido desde aquí',25,NULL,0,1),(29,'CARTA LUIGI\'S BURGUER','2019-02-07 17:25:11','Haz tu pedido aquí.',25,NULL,0,1),(30,'nuevo afiche','2019-02-28 05:04:13','yhj',10,NULL,1,1),(31,'Carta LUIGI\'S','2019-03-06 16:08:04','Haz tu pedido aquí',25,NULL,0,1),(32,'La mesa de Juanito','2019-03-23 17:50:20','Nuestra carta, haz tu pedido aquí.',26,NULL,0,1),(33,'La mesa de Juanito','2019-03-23 17:58:15','Nuestra carta, haz tu pedido aquí.',26,NULL,0,1),(34,'afiche new','2019-04-13 19:28:58','new',10,NULL,1,0),(35,'afiche combos','2019-04-13 20:45:28','nuevo grupo',14,NULL,1,0),(36,'La Mesa de Juanito','2019-04-19 11:44:24','Nuestra Carta. Haz tu pedido aquí...',26,NULL,0,1),(37,'afiche','2019-04-19 12:40:05','fghj',26,NULL,0,1),(38,'aa11','2019-04-19 15:40:17','afiche',10,NULL,0,0),(39,'aff1','2019-04-19 16:28:39','ah',10,NULL,0,0),(40,'La mesa de Juanito','2019-04-21 16:53:28','Nuestra carta. Haz tu pedido aquí...',26,NULL,1,1),(41,'LUIGI\'S BURGUER','2019-04-29 21:56:08','Nuestra carta, haz tu pedido aquí',25,NULL,0,1),(42,'LUIGI\'S','2019-06-13 12:31:31','Haz tu pedido acá...',25,NULL,1,1);
/*!40000 ALTER TABLE `afiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afiche_detalle`
--

DROP TABLE IF EXISTS `afiche_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiche_detalle` (
  `afiche_detalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `afiche_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `grupo_afiche_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`afiche_detalle_id`),
  KEY `fk_afiche_detalle_afiche1_idx` (`afiche_id`),
  KEY `fk_afiche_detalle_producto1_idx` (`producto_id`),
  KEY `fk_afiche_detalle_grupo_afiche1_idx` (`grupo_afiche_id`),
  CONSTRAINT `fk_afiche_detalle_afiche1` FOREIGN KEY (`afiche_id`) REFERENCES `afiche` (`afiche_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_afiche_detalle_grupo_afiche1` FOREIGN KEY (`grupo_afiche_id`) REFERENCES `grupo_afiche` (`grupo_afiche_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_afiche_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiche_detalle`
--

LOCK TABLES `afiche_detalle` WRITE;
/*!40000 ALTER TABLE `afiche_detalle` DISABLE KEYS */;
INSERT INTO `afiche_detalle` VALUES (1,1,24,NULL),(2,1,25,NULL),(3,1,26,NULL),(4,2,24,NULL),(5,2,25,NULL),(6,2,26,NULL),(7,3,26,NULL),(8,3,28,NULL),(9,4,26,NULL),(10,4,40,NULL),(11,5,28,NULL),(12,5,41,NULL),(13,5,42,NULL),(14,6,26,NULL),(15,6,28,NULL),(16,7,28,NULL),(17,7,41,NULL),(18,8,32,NULL),(19,8,34,NULL),(20,8,43,NULL),(21,9,32,NULL),(22,9,33,NULL),(23,9,34,NULL),(24,10,48,NULL),(25,10,49,NULL),(26,10,50,NULL),(27,10,51,NULL),(28,10,52,NULL),(29,10,53,NULL),(30,10,54,NULL),(31,10,55,NULL),(32,11,50,NULL),(33,11,51,NULL),(34,11,52,NULL),(35,12,49,NULL),(36,12,53,NULL),(37,13,42,2),(39,14,48,NULL),(40,14,49,NULL),(41,14,50,NULL),(42,14,51,NULL),(43,14,52,NULL),(44,14,53,NULL),(45,15,56,NULL),(46,15,57,NULL),(47,16,56,NULL),(48,16,57,NULL),(49,17,58,3),(50,18,41,4),(51,18,42,4),(52,18,46,5),(53,18,58,5),(54,19,32,7),(55,19,33,7),(56,19,34,8),(57,20,32,NULL),(58,20,33,NULL),(59,20,34,NULL),(60,21,59,9),(61,21,60,10),(62,21,61,9),(63,21,62,9),(64,21,63,10),(65,21,64,10),(66,21,65,10),(67,21,66,NULL),(68,22,71,NULL),(69,22,73,NULL),(70,22,74,NULL),(72,23,73,NULL),(73,23,74,NULL),(75,24,73,NULL),(76,24,74,NULL),(77,25,71,NULL),(78,25,73,NULL),(79,25,74,NULL),(80,26,71,NULL),(81,26,73,NULL),(82,26,74,NULL),(83,27,71,NULL),(84,27,73,NULL),(85,27,74,NULL),(86,28,67,NULL),(87,28,76,NULL),(88,28,77,NULL),(89,28,78,NULL),(90,28,79,NULL),(91,28,80,NULL),(92,28,81,NULL),(93,28,82,NULL),(94,28,83,NULL),(95,29,67,NULL),(96,29,76,NULL),(97,29,77,NULL),(98,29,78,NULL),(99,29,79,NULL),(100,29,80,NULL),(101,29,84,NULL),(102,29,85,NULL),(103,29,86,NULL),(104,30,42,12),(105,30,89,11),(106,31,67,NULL),(107,31,76,NULL),(108,31,77,NULL),(109,31,78,NULL),(110,31,79,NULL),(111,31,80,NULL),(112,31,84,NULL),(113,31,88,NULL),(114,31,91,NULL),(115,32,103,NULL),(116,32,106,NULL),(117,32,107,NULL),(118,32,108,NULL),(119,32,109,NULL),(120,32,110,NULL),(121,32,111,NULL),(122,32,112,NULL),(123,32,113,NULL),(124,32,114,NULL),(125,32,116,NULL),(126,32,118,NULL),(127,32,119,NULL),(128,32,120,NULL),(129,32,121,NULL),(130,32,122,NULL),(131,32,123,NULL),(132,32,124,NULL),(133,32,125,NULL),(134,32,127,NULL),(135,32,128,NULL),(136,32,129,NULL),(137,32,130,NULL),(138,32,131,NULL),(139,32,132,NULL),(140,32,133,NULL),(141,33,103,14),(142,33,106,NULL),(143,33,107,15),(144,33,108,15),(145,33,109,15),(146,33,110,15),(147,33,111,15),(148,33,112,NULL),(149,33,113,NULL),(150,33,114,16),(151,33,116,NULL),(152,33,118,14),(153,33,119,17),(154,33,120,15),(155,33,121,15),(156,33,122,NULL),(157,33,123,15),(158,33,124,NULL),(159,33,125,18),(160,33,127,NULL),(161,33,128,NULL),(162,33,129,NULL),(163,33,130,NULL),(164,33,131,16),(165,33,132,NULL),(166,33,133,15),(167,34,42,20),(168,34,96,21),(169,35,96,NULL),(170,35,97,NULL),(171,36,68,NULL),(172,36,70,NULL),(173,36,103,NULL),(174,36,106,NULL),(175,36,107,23),(176,36,108,23),(177,36,109,23),(178,36,110,23),(179,36,111,23),(180,36,112,NULL),(181,36,113,NULL),(182,36,114,24),(183,36,116,NULL),(184,36,118,22),(185,36,119,25),(186,36,120,23),(187,36,121,23),(188,36,122,23),(189,36,123,23),(190,36,124,NULL),(191,36,125,26),(192,36,127,NULL),(193,36,128,NULL),(194,36,129,NULL),(195,36,130,NULL),(196,36,131,NULL),(197,36,132,NULL),(198,36,133,23),(199,37,68,NULL),(200,37,70,NULL),(201,37,103,NULL),(202,37,106,NULL),(203,37,107,28),(204,37,108,28),(205,37,109,28),(206,37,110,28),(207,37,111,28),(208,37,112,NULL),(209,37,113,NULL),(210,37,114,NULL),(211,37,116,NULL),(212,37,118,27),(213,37,119,NULL),(214,37,120,NULL),(215,37,121,NULL),(216,37,122,NULL),(217,37,123,NULL),(218,37,124,NULL),(219,37,125,NULL),(220,37,127,NULL),(221,37,128,NULL),(222,37,129,NULL),(223,37,130,NULL),(224,37,131,NULL),(225,37,132,NULL),(226,37,133,NULL),(227,38,26,29),(228,38,42,30),(229,38,89,29),(230,38,90,NULL),(231,38,99,NULL),(232,39,42,32),(233,39,89,33),(234,40,68,NULL),(235,40,70,NULL),(236,40,103,34),(237,40,106,35),(238,40,107,35),(239,40,108,35),(240,40,109,35),(241,40,110,35),(242,40,111,35),(243,40,112,NULL),(244,40,113,36),(245,40,114,36),(246,40,116,37),(247,40,118,34),(248,40,119,37),(249,40,120,35),(250,40,121,35),(251,40,122,35),(252,40,123,35),(253,40,124,38),(254,40,125,38),(255,40,127,NULL),(256,40,128,NULL),(257,40,129,NULL),(258,40,130,NULL),(259,40,131,36),(260,40,132,NULL),(261,40,133,35),(262,41,84,40),(263,41,137,39),(264,41,138,39),(265,41,140,NULL),(266,41,141,39),(267,41,142,39),(268,41,143,39),(269,41,144,39),(270,41,145,39),(271,41,147,40),(272,41,148,NULL),(273,41,149,40),(274,41,150,39),(275,41,151,41),(276,41,152,40),(277,41,153,40),(278,41,154,40),(279,41,155,41),(280,41,157,41),(281,41,158,41),(282,41,159,41),(283,41,160,41),(284,41,161,41),(285,41,162,41),(286,41,163,41),(287,42,84,42),(288,42,137,43),(289,42,138,43),(290,42,140,NULL),(291,42,141,43),(292,42,142,43),(293,42,143,43),(294,42,144,43),(295,42,145,43),(296,42,147,42),(297,42,148,NULL),(298,42,149,42),(299,42,150,43),(300,42,151,44),(301,42,152,42),(302,42,153,42),(303,42,154,42),(304,42,155,44),(305,42,157,44),(306,42,158,44),(307,42,159,44),(308,42,160,44),(309,42,161,44),(310,42,162,44),(311,42,163,44),(312,42,165,42);
/*!40000 ALTER TABLE `afiche_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `almacen_id` int(11) NOT NULL AUTO_INCREMENT,
  `almacen_nombre` varchar(250) NOT NULL,
  `almacen_detalle` varchar(250) NOT NULL,
  `is_almacen_app` int(11) NOT NULL DEFAULT '0',
  `empresa_id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`almacen_id`),
  KEY `almacen_empresa_id` (`empresa_id`),
  CONSTRAINT `almacen_empresa_fk` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacen`
--

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` VALUES (1,'Almacen - Empresa 2','Almacen automatico para APP',1,3,1),(2,'Almacen - empresa 6','Almacen de APP para empresa 6',1,14,1),(3,'Almacen - empresa 8','Almacen de APP para empresa 8',1,15,1),(4,'Almacen - mi primera empresa','Almacen de APP para mi primera empresa',1,16,1),(5,'Almacen - empresa 1','Almacen de APP para empresa 1',1,17,1),(6,'Almacen - empresa 2','Almacen de APP para empresa 2',1,18,1),(7,'Almacen - empresa 1','Almacen de APP para empresa 1',1,19,1),(8,'Almacen - mi empresa','Almacen de APP para mi empresa',1,20,1),(9,'Almacen - mi empresa','Almacen de APP para mi empresa',1,21,1),(10,'Almacen - Kairos','Almacen de APP para Kairos',1,22,1),(11,'Almacen - empre alma','Almacen de APP para empre alma',1,23,1),(12,'Almacen - kairos Restaurant','Almacen de APP para kairos Restaurant',1,24,1),(13,'Almacen - LUIGI\'S BURGUER','Almacen de APP para LUIGI\'S BURGUER',1,25,1),(14,'Almacen - La mesa de Juanito','Almacen de APP para La casa de Juanito',1,26,1),(15,'Almacen - La profesorita','Almacen de APP para La profesorita',1,27,1),(16,'Almacen - casa','Almacen de APP para casa',1,28,1),(17,'Almacen - aworks','Almacen de APP para aworks',1,29,1),(18,'Almacen - empresa educativa','Almacen de APP para empresa educativa',1,30,1),(19,'Almacen - beauty','Almacen de APP para beauty',1,31,1);
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cola_sms`
--

DROP TABLE IF EXISTS `cola_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cola_sms` (
  `cola_sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(250) DEFAULT NULL,
  `contenido` varchar(250) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cola_sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cola_sms`
--

LOCK TABLES `cola_sms` WRITE;
/*!40000 ALTER TABLE `cola_sms` DISABLE KEYS */;
INSERT INTO `cola_sms` VALUES (1,'986715412','Nuevo test auto',1),(2,'986715412','Nuevo test auto 2',1),(3,'986715412','Nuevo test auto 3',1),(4,'986715412','Nuevo test auto 4',1),(5,'986715412','Nuevo test auto 5',1),(6,'986715412','Nuevo test auto 6',1),(7,'986715412','Nuevo test auto 7',1),(8,'986715412','Nuevo test auto 8',1),(9,'991653073','Bienvenido a Freeler. Codigo SMS: 531402',1),(10,'986715412','Test de prueba',1),(11,'965602803','Bienvenido a Freeler. Codigo SMS: 729735',1),(12,'991653073','Bienvenido a Freeler. Codigo SMS: 768769',1),(13,'991653073','Bienvenido a Freeler. Codigo SMS: 971724',1),(14,'926724653','Bienvenido a Freeler. Codigo SMS: 630307',1),(15,'965602803','Bienvenido a Freeler. Codigo SMS: 902923',1),(16,'965602803','Bienvenido a Freeler. Codigo SMS: 987917',1),(17,'965602803','Bienvenido a Freeler. Codigo SMS: 308881',1),(18,'926724653','Bienvenido a Freeler. Codigo SMS: 745680',1),(19,'926724653','Bienvenido a Freeler. Codigo SMS: 605290',1),(20,'965602803','Bienvenido a Freeler. Codigo SMS: 759962',1),(21,'965602803','Bienvenido a Freeler. Codigo SMS: 990481',1),(22,'965602803','Bienvenido a Freeler. Codigo SMS: 156050',1),(23,'926724653','Bienvenido a Freeler. Codigo SMS: 889056',1),(24,'926724653','Bienvenido a Freeler. Codigo SMS: 434658',1),(25,'999666333','Bienvenido a Freeler. Codigo SMS: 471790',1),(26,'926724653','Bienvenido a Freeler. Codigo SMS: 319710',1),(27,'926724653','Bienvenido a Freeler. Codigo SMS: 295459',1),(28,'926724653','Bienvenido a Freeler. Codigo SMS: 721899',1),(29,'926724653','Bienvenido a Freeler. Codigo SMS: 592505',1),(30,'926724653','Bienvenido a Freeler. Codigo SMS: 667125',1),(31,'926724653','Bienvenido a Freeler. Codigo SMS: 123020',1),(32,'926724653','Bienvenido a Freeler. Codigo SMS: 267900',1),(33,'926724653','Bienvenido a Freeler. Codigo SMS: 962854',1),(34,'926724653','Bienvenido a Freeler. Codigo SMS: 683697',1),(35,'926724653','Bienvenido a Freeler. Codigo SMS: 663933',1),(36,'926724653','Bienvenido a Freeler. Codigo SMS: 176104',1),(37,'926724653','Bienvenido a Freeler. Codigo SMS: 697074',1),(38,'926724653','Bienvenido a Freeler. Codigo SMS: 151920',1),(39,'926724653','Bienvenido a Freeler. Codigo SMS: 905948',1),(40,'926724653','Bienvenido a Freeler. Codigo SMS: 585591',1),(41,'926724653','Bienvenido a Freeler. Codigo SMS: 839386',1),(42,'926724653','Bienvenido a Freeler. Codigo SMS: 572606',1),(43,'926724653','Bienvenido a Freeler. Codigo SMS: 697954',1),(44,'922774795','Bienvenido a Freeler. Codigo SMS: 919224',1),(45,'949603397','Bienvenido a Freeler. Codigo SMS: 298100',1),(46,'926724653','Bienvenido a Freeler. Codigo SMS: 968021',1),(47,'988547340','Bienvenido a Freeler. Codigo SMS: 710034',1),(48,'988547340','Bienvenido a Freeler. Codigo SMS: 532512',1),(49,'977921965','Bienvenido a Freeler. Codigo SMS: 801897',1),(50,'990152535','Bienvenido a Freeler. Codigo SMS: 697177',1),(51,'990152535','Bienvenido a Freeler. Codigo SMS: 949946',1),(52,'990152535','Bienvenido a Freeler. Codigo SMS: 914105',1),(53,'990152535','Bienvenido a Freeler. Codigo SMS: 328136',1),(54,'990152535','Bienvenido a Freeler. Codigo SMS: 873477',1),(55,'991653073','Bienvenido a Freeler. Codigo SMS: 535760',1),(56,'949603397','Bienvenido a Freeler. Codigo SMS: 448054',1),(57,'926724653','Bienvenido a Freeler. Codigo SMS: 491001',1),(58,'926724653','Bienvenido a Freeler. Codigo SMS: 390366',1),(59,'926724653','Bienvenido a Freeler. Codigo SMS: 162010',1),(60,'926724653','Bienvenido a Freeler. Codigo SMS: 339747',1),(61,'926724653','Bienvenido a Freeler. Codigo SMS: 919130',1),(62,'926724653','Bienvenido a Freeler. Codigo SMS: 151818',1),(63,'926724653','Bienvenido a Freeler. Codigo SMS: 537678',1),(64,'949603397','Bienvenido a Freeler. Codigo SMS: 482700',1),(65,'949603397','Bienvenido a Freeler. Codigo SMS: 857990',1),(66,'949603397','Bienvenido a Freeler. Codigo SMS: 133308',1),(67,'949603397','Bienvenido a Freeler. Codigo SMS: 105790',1),(68,'991653073','Bienvenido a Freeler. Codigo SMS: 689906',1),(69,'949603397','Bienvenido a Freeler. Codigo SMS: 800463',1),(70,'949603397','Bienvenido a Freeler. Codigo SMS: 300080',1),(71,'949603397','Bienvenido a Freeler. Codigo SMS: 391269',1),(72,'949603397','Bienvenido a Freeler. Codigo SMS: 143184',1),(73,'949603397','Bienvenido a Freeler. Codigo SMS: 601531',1),(74,'949603397','Bienvenido a Freeler. Codigo SMS: 944986',1),(75,'991653073','Bienvenido a Freeler. Codigo SMS: 343243',1),(76,'977921965','Bienvenido a Freeler. Codigo SMS: 487748',1),(77,'988547340','Bienvenido a Freeler. Codigo SMS: 351371',1),(78,'988547340','Bienvenido a Freeler. Codigo SMS: 671768',1),(79,'987293997','Bienvenido a Freeler. Codigo SMS: 159809',1),(80,'987293997','Bienvenido a Freeler. Codigo SMS: 806983',1),(81,'987293997','Bienvenido a Freeler. Codigo SMS: 324497',1),(82,'949603397','Bienvenido a Freeler. Codigo SMS: 696101',1),(83,'991653073','Bienvenido a Freeler. Codigo SMS: 425457',1),(84,'991653073','Bienvenido a Freeler. Codigo SMS: 804873',1),(85,'991653073','Bienvenido a Freeler. Codigo SMS: 356185',1),(86,'949603397','Bienvenido a Freeler. Codigo SMS: 531865',1),(87,'977921965','Bienvenido a Freeler. Codigo SMS: 939649',1),(88,'977921965','Bienvenido a Freeler. Codigo SMS: 552528',1),(89,'949603397','Bienvenido a Freeler. Codigo SMS: 522534',1),(90,'988547340','Bienvenido a Freeler. Codigo SMS: 205362',1),(91,'991653073','Bienvenido a Freeler. Codigo SMS: 764630',1),(92,'986315624','Bienvenido a Freeler. Codigo SMS: 531642',1),(93,'965602803','Bienvenido a Freeler. Codigo SMS: 466236',1),(94,'941992287','Bienvenido a Freeler. Codigo SMS: 268515',1),(95,'949603397','Bienvenido a Freeler. Codigo SMS: 746652',1),(96,'949603397','Bienvenido a Freeler. Codigo SMS: 768323',1),(97,'949603397','Bienvenido a Freeler. Codigo SMS: 574631',1),(98,'949603397','Bienvenido a Freeler. Codigo SMS: 304885',1),(99,'949603397','Bienvenido a Freeler. Codigo SMS: 434109',1),(100,'949603397','Bienvenido a Freeler. Codigo SMS: 393641',1),(101,'986715412','Bienvenido a Freeler. Codigo SMS: 997175',1),(102,'980984414','Bienvenido a Freeler. Codigo SMS: 972816',0),(103,'980984414','Bienvenido a Freeler. Codigo SMS: 943515',0);
/*!40000 ALTER TABLE `cola_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprador`
--

DROP TABLE IF EXISTS `comprador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprador` (
  `comprador_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`comprador_id`),
  KEY `fk_comprador_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_comprador_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprador`
--

LOCK TABLES `comprador` WRITE;
/*!40000 ALTER TABLE `comprador` DISABLE KEYS */;
INSERT INTO `comprador` VALUES (1,30),(2,31),(3,32),(4,33),(5,34),(6,35),(7,36),(8,37),(9,38),(10,39),(11,40),(12,42),(13,43),(14,44),(15,45),(16,46),(17,47),(18,48),(19,49),(20,51),(21,52),(22,53),(23,56),(24,61),(25,63);
/*!40000 ALTER TABLE `comprador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedido` (
  `detalle_pedido_id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` double DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  PRIMARY KEY (`detalle_pedido_id`),
  KEY `fk_detalle_pedido_producto1_idx` (`producto_id`),
  KEY `fk_detalle_pedido_Pedido1_idx` (`pedido_id`),
  CONSTRAINT `fk_detalle_pedido_Pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_pedido_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedido`
--

LOCK TABLES `detalle_pedido` WRITE;
/*!40000 ALTER TABLE `detalle_pedido` DISABLE KEYS */;
INSERT INTO `detalle_pedido` VALUES (1,3,56,2),(2,2,55,3),(3,2,55,4),(4,1,43,5),(5,5,56,6),(6,4,57,7),(7,5,57,8),(8,7,57,9),(9,3,57,10),(10,4,53,11),(11,2,53,12),(12,2,20,13),(13,1,53,14),(14,1,53,15),(15,1,39,16),(16,1,49,17),(17,1,39,18),(18,1,42,19),(19,0,41,20),(20,0,42,20),(21,2,46,20),(22,1,58,20),(23,2,58,21),(24,1,59,22),(25,0,61,22),(26,0,62,22),(27,1,60,22),(28,0,63,22),(29,0,64,22),(30,0,65,22),(31,1,66,22),(32,0,32,23),(33,1,33,23),(34,0,34,23),(35,1,32,24),(36,0,33,24),(37,0,34,24),(38,1,31,25),(39,0,32,26),(40,0,33,26),(41,1,34,26),(42,1,59,27),(43,0,61,27),(44,0,62,27),(45,1,60,27),(46,0,63,27),(47,0,64,27),(48,0,65,27),(49,1,66,27),(50,2,67,28),(51,1,59,29),(52,0,61,29),(53,1,62,29),(54,2,60,29),(55,0,63,29),(56,0,64,29),(57,0,65,29),(58,0,66,29),(59,0,32,30),(60,2,33,30),(61,0,34,30),(62,2,49,31),(63,3,71,32),(64,1,73,33),(65,1,74,33),(66,0,59,34),(67,0,61,34),(68,0,62,34),(69,1,60,34),(70,1,63,34),(71,0,64,34),(72,0,65,34),(73,0,66,34),(74,0,59,35),(75,0,61,35),(76,0,62,35),(77,1,60,35),(78,1,63,35),(79,0,64,35),(80,0,65,35),(81,0,66,35),(82,0,32,36),(83,2,33,36),(84,1,34,36),(85,0,67,37),(86,0,76,37),(87,0,77,37),(88,0,78,37),(89,0,79,37),(90,0,80,37),(91,0,81,37),(92,1,82,37),(93,1,83,37),(94,0,41,38),(95,0,42,38),(96,1,46,38),(97,0,58,38),(98,2,35,39),(99,0,67,40),(100,0,76,40),(101,0,77,40),(102,0,78,40),(103,1,79,40),(104,0,80,40),(105,1,84,40),(106,1,88,40),(107,2,91,40),(108,1,67,41),(109,0,76,41),(110,0,77,41),(111,0,78,41),(112,0,79,41),(113,0,80,41),(114,0,84,41),(115,0,88,41),(116,1,91,41),(117,1,67,42),(118,0,67,43),(119,1,76,43),(120,0,77,43),(121,0,78,43),(122,0,79,43),(123,0,80,43),(124,1,84,43),(125,0,88,43),(126,1,91,43),(127,1,67,44),(128,0,76,44),(129,0,77,44),(130,0,78,44),(131,0,79,44),(132,0,80,44),(133,0,84,44),(134,0,88,44),(135,0,91,44),(136,0,67,45),(137,1,76,45),(138,0,77,45),(139,0,78,45),(140,0,79,45),(141,0,80,45),(142,0,84,45),(143,0,88,45),(144,0,91,45),(145,3,58,46),(146,2,58,47),(147,4,58,48),(148,3,58,49),(149,15,58,50),(150,45,58,51),(151,0,67,52),(152,0,76,52),(153,0,77,52),(154,0,78,52),(155,0,79,52),(156,0,80,52),(157,1,84,52),(158,0,88,52),(159,1,91,52),(160,2,67,53),(161,16,90,54),(162,0,67,55),(163,0,76,55),(164,0,77,55),(165,0,78,55),(166,0,79,55),(167,0,80,55),(168,2,84,55),(169,0,88,55),(170,1,91,55),(171,2,96,56),(172,36,99,57),(173,2,93,58),(174,1,93,59),(175,1,93,60),(176,2,92,61),(177,2,120,62),(178,2,32,63),(179,3,33,63),(180,1,34,63),(181,2,103,64),(182,0,118,64),(183,0,107,64),(184,1,108,64),(185,0,109,64),(186,0,110,64),(187,0,111,64),(188,0,120,64),(189,0,121,64),(190,0,123,64),(191,0,133,64),(192,0,114,64),(193,0,131,64),(194,0,119,64),(195,0,125,64),(196,0,106,64),(197,0,112,64),(198,0,113,64),(199,0,116,64),(200,0,122,64),(201,0,124,64),(202,0,127,64),(203,0,128,64),(204,0,129,64),(205,0,130,64),(206,1,132,64),(207,1,118,65),(208,0,107,65),(209,3,108,65),(210,0,109,65),(211,0,110,65),(212,0,111,65),(213,0,120,65),(214,0,121,65),(215,0,122,65),(216,0,123,65),(217,0,133,65),(218,0,114,65),(219,0,119,65),(220,0,125,65),(221,0,68,65),(222,0,70,65),(223,0,103,65),(224,0,106,65),(225,0,112,65),(226,0,113,65),(227,0,116,65),(228,0,124,65),(229,0,127,65),(230,0,128,65),(231,0,129,65),(232,0,130,65),(233,0,131,65),(234,0,132,65),(235,1,103,66),(236,1,107,66),(237,1,113,66),(238,1,119,66),(239,1,125,66),(240,1,70,66),(241,1,121,67),(242,2,113,67),(243,1,112,67),(244,2,137,68),(245,2,147,68),(246,2,163,68),(247,1,148,68),(248,1,137,69),(249,1,84,69),(250,1,155,69),(251,1,137,70),(252,1,162,70),(253,2,140,71),(254,1,141,72),(255,1,84,73),(256,1,141,74),(257,1,142,74),(258,1,144,75);
/*!40000 ALTER TABLE `detalle_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `documento_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_numero` varchar(250) NOT NULL,
  `documento_tipo` int(11) NOT NULL COMMENT '0:DNI, 1:Carné Extran, 2:RUC\n',
  `usuario_id` int(11) NOT NULL,
  `documento_defecto` int(11) NOT NULL COMMENT '0: false, 1:true',
  PRIMARY KEY (`documento_id`),
  KEY `fk_documento_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_documento_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (4,'06765262',0,15,1),(5,'16690755',0,16,1),(7,'72837766',0,21,1),(8,'78797068',0,22,1),(9,'55556666',0,23,1),(10,'78945612',0,24,1),(11,'45672345',0,25,1),(12,'79033222',0,26,1),(13,'45987812',0,27,1),(14,'18160552',0,28,1),(15,'06303072',0,29,1),(16,'09873333',1,38,1),(17,'90785643',1,39,1),(18,'47832456',1,40,1),(19,'01130127',0,50,1),(20,'01117158',0,54,1),(21,'40866531',0,55,1),(22,'17690755',0,57,1),(23,'06765261',0,59,1),(24,'18179059',0,60,1),(25,'58287390',0,62,1);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_nombre` varchar(250) NOT NULL,
  `empresa_detalle` text NOT NULL,
  `empresa_RUC` varchar(15) NOT NULL,
  `empresa_tipo` int(11) NOT NULL COMMENT '0: sin tipo, 1: personal, 2:juridica, 3: persona libre',
  `activo` int(11) DEFAULT '1',
  `freeler_id` int(11) DEFAULT NULL,
  `preview_img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`empresa_id`),
  KEY `fk_empresa_freeler1_idx` (`freeler_id`),
  CONSTRAINT `fk_empresa_freeler1` FOREIGN KEY (`freeler_id`) REFERENCES `freeler` (`freeler_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Empresa de prueba 3','la empresa de pruebas eeee333','21123545',3,0,NULL,NULL),(2,'Empresa 22','segunda empresa desde post  actualizada','123456789',3,1,NULL,NULL),(3,'Empresa 2','segunda empresa desde post','123456789',3,1,NULL,NULL),(4,'empresa 33333','empresa creada desde el cel 3333','6454644',3,1,NULL,NULL),(5,'empresa 45','tercera empresa gggg creada desde la app','46451840',3,1,NULL,NULL),(6,'empresa 5','quinta empresa','9454646',3,1,NULL,NULL),(7,'empresa 6','prueba final','64645494',3,1,NULL,NULL),(8,'empresa 1 user 2','empresa 1 para prueba con segundo usuario','46545646',3,1,NULL,NULL),(9,'empresa 1 jorge','empresa inicial','12345678900',3,1,NULL,NULL),(10,'empresa1','dykdhk','7594594',3,1,1,NULL),(11,'empresa 2','empresa prueba 2','1249494',3,1,1,NULL),(12,'empresa 3','jwjbww','69484',3,1,1,NULL),(13,'empresa 4','nsjeke','64498181',3,1,1,NULL),(14,'empresa 6','hshwisna','45648181',3,1,1,'467c1b54a1e50094b164061727aabdaa.jpg'),(15,'empresa 8','nueva empresa','461881844',3,1,1,NULL),(16,'mi primera empresa','empresa','849663154',3,1,2,NULL),(17,'empresa 1','sjbwbe','51584',3,1,3,NULL),(18,'empresa 2','la empresita','1584646',3,1,3,NULL),(19,'empresa 1','empresa test','753869042',3,1,4,NULL),(20,'mi empresa','primera app','456123',3,1,6,NULL),(21,'mi empresa','mi nueva empresa','542134567',3,1,7,NULL),(22,'Kairos','Restaurante','2020202020',3,1,8,'7266fe868e2e1aef012ba7dfd6096189.jpg'),(23,'empre alma','kwhebebw','1234849',3,1,1,'72d308f42fc136df3780ddb24506b517.jpg'),(24,'kairos Restaurant','Restaurant especializada dn venta de comida cacera','20542359090',3,1,9,'f3e518cc9a8ec02cdc275c4878704e46.jpg'),(25,'LUIGI\'S BURGUER','Las Hamburguesas y ensaladas de frutas más ricas.','10000000000',3,1,10,'18036f0253697d72167f7c0378f3008f.jpg'),(26,'La mesa de Juanito','Comida casera','1111111111',3,1,11,'a121cbc8775a626f01f518408462638b.jpg'),(27,'La profesorita','Somos una organización educativa','10562344775',3,1,12,'be920c91ef793a32040030e9aef83c30.jpg'),(28,'casa','test','2482536395',3,1,13,NULL),(29,'aworks','ti','12345678901',3,1,14,NULL),(30,'empresa educativa','un colegio diferente','94649816',3,1,15,NULL),(31,'beauty','xggd','582877456',3,1,17,NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freeler`
--

DROP TABLE IF EXISTS `freeler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freeler` (
  `freeler_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `codigo_ref` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`freeler_id`),
  KEY `fk_freeler_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_freeler_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freeler`
--

LOCK TABLES `freeler` WRITE;
/*!40000 ALTER TABLE `freeler` DISABLE KEYS */;
INSERT INTO `freeler` VALUES (1,21,'4587963'),(2,22,'54866'),(3,23,'456789123456'),(4,24,'123'),(5,25,NULL),(6,26,'54546'),(7,27,'215876'),(8,28,NULL),(9,29,NULL),(10,50,NULL),(11,54,NULL),(12,15,'00000'),(13,55,NULL),(14,57,NULL),(15,59,'996535'),(16,60,NULL),(17,62,'26489');
/*!40000 ALTER TABLE `freeler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_afiche`
--

DROP TABLE IF EXISTS `grupo_afiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_afiche` (
  `grupo_afiche_id` int(11) NOT NULL AUTO_INCREMENT,
  `afiche_id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`grupo_afiche_id`),
  KEY `fk_grupo_afiche_afiche1_idx` (`afiche_id`),
  CONSTRAINT `fk_grupo_afiche_afiche1` FOREIGN KEY (`afiche_id`) REFERENCES `afiche` (`afiche_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_afiche`
--

LOCK TABLES `grupo_afiche` WRITE;
/*!40000 ALTER TABLE `grupo_afiche` DISABLE KEYS */;
INSERT INTO `grupo_afiche` VALUES (1,13,'Electrónicos',1),(2,13,'Cuero',1),(3,17,'Cuchiilas',1),(4,18,'Electro',1),(5,18,'Hogar',1),(6,18,'Cuero',1),(7,19,'Entradas',1),(8,19,'Platos de fondo',1),(9,21,'Entradas',1),(10,21,'Platos de fondo',1),(11,30,'Hogar',1),(12,30,'Oficina',1),(13,18,'Nuevo',1),(14,33,'Combos',1),(15,33,'Bebidas',1),(16,33,'Sandwiches',1),(17,33,'Omelets',1),(18,33,'Pasteles',1),(19,13,'Grupo',1),(20,34,'Audio',1),(21,34,'Comb',1),(22,36,'Combos',1),(23,36,'Bebidas',1),(24,36,'Sandwiches',1),(25,36,'Omelets',1),(26,36,'Pasteles',1),(27,37,'Combos',1),(28,37,'Bebidas',1),(29,38,'Primero',1),(30,38,'Segundo',1),(31,39,'Pri',1),(32,39,'Seg',1),(33,39,'Tercero',1),(34,40,'Combos',1),(35,40,'Bebidas',1),(36,40,'Sandwiches',1),(37,40,'Omelets',1),(38,40,'Pasteles',1),(39,41,'Hamburguesas',1),(40,41,'Pollo',1),(41,41,'Bebidas',1),(42,42,'Pollo',1),(43,42,'Hamburguesas',1),(44,42,'Bebidas',1);
/*!40000 ALTER TABLE `grupo_afiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_almacen`
--

DROP TABLE IF EXISTS `item_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_almacen` (
  `item_almacen_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_almacen_titulo` varchar(250) NOT NULL,
  `item_almacen_descripcion` text NOT NULL,
  `item_almacen_cantidad` decimal(18,4) NOT NULL DEFAULT '0.0000',
  `almacen_id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `preview_img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`item_almacen_id`),
  KEY `almacen_item_almacen` (`almacen_id`),
  CONSTRAINT `almacen_item_almacen_fk` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`almacen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_almacen`
--

LOCK TABLES `item_almacen` WRITE;
/*!40000 ALTER TABLE `item_almacen` DISABLE KEYS */;
INSERT INTO `item_almacen` VALUES (1,'Laptop prueba','Primera laptop de prueba',0.0000,1,1,NULL),(2,'laptop escolar','dflskmglskdfmgsdf',23.0000,3,0,'87219d24e9bac403e3f254142706a74d.jpg'),(3,'laptpp 34','kanwi',6443.0000,3,0,NULL),(4,'laptpp 34','kanwi',6443.0000,3,0,NULL),(5,'laptop 678','una laptop nueva',648484.0000,3,0,NULL),(6,'compu','msksned',84846446.0000,3,0,NULL),(7,'yu','jjajjwj',345.0000,2,0,NULL),(8,'erwrr','etrr2',1145.0000,2,0,NULL),(9,'erwrr','etrr2',1145.0000,2,0,NULL),(10,'laptop','dflskmglskdfmgsdf',23.0000,3,0,'f0bbbd9474d602633229c075cbb079f4jpg'),(11,'laptop','dflskmglskdfmgsdf',23.0000,3,0,'2fb6944e61beb74ba47bbdb3a63a9853.jpg'),(12,'test 100','hhehe',8454548.0000,2,0,NULL),(13,'laptop','dflskmglskdfmgsdf',23.0000,3,1,'4c12f18a61c74b1f952688e9bec38656.jpg'),(14,'laptop 102','ksbs',54.0000,2,0,'9bd05e8d9e69480998fe9a018b598896.jpg'),(15,'laptop 102','ksbs',54.0000,2,0,'610612a83be7704a72b1daa3d9951654.jpg'),(16,'laptop 102','ksbs',54.0000,2,0,'d389eeede7e1190c0ac60b0d8383767e.jpg'),(17,'laptop 102','ksbs',54.0000,2,0,'4a8fcb07b7a565a6bb5f69fbb7a40b16.jpg'),(18,'laptop 102','ksbs',54.0000,2,0,NULL),(19,'laptop 102','ksbs',54.0000,2,0,NULL),(20,'laptop 102','ksbs',54.0000,2,0,'6d4be000e0de39f1507639430792cf1a.jpg'),(21,'laptop 102','ksbs',54.0000,2,0,'1910510f832453d71d0904e364ba78bd.jpg'),(22,'laptop 102','ksbs',54.0000,2,0,'f698562714c95f9450acb0d53b875fd0.jpg'),(23,'laptop 102','ksbs',54.0000,2,0,'1ed3f0756d2cea7369d689a0366f1406.jpg'),(24,'laptop 102','ksbs',54.0000,2,0,'00ac597c258257e0de2ee54987a301e7.jpg'),(25,'laptop 102','ksbs',54.0000,2,0,'5226d550e2d5671fb5f6af0bc4a64d64.jpg'),(26,'laptop 102','ksbs',54.0000,2,0,'d39d0debb8ff02bcaf326380172d6e89.jpg'),(27,'test 103','xbdhd',45.0000,2,0,'d074a1edef8f41f877deb7fe308fbe2e.jpg'),(28,'test 103','xbdhd',45.0000,2,0,'7db1fe13e809e0be6faeada23858df0e.jpg'),(29,'104','ksj',849.0000,2,0,NULL),(30,'104','ksj',849.0000,2,0,NULL),(31,'104','ksj',849.0000,2,0,NULL),(32,'104','ksj',849.0000,2,0,NULL),(33,'104','ksj',849.0000,2,0,NULL),(34,'ama de casa','hora de trabajo 80 soles',1.0000,3,0,'3a653e5b3f0d6d914160bc8578d9e0fb.jpg'),(35,'gato skdkdbfjdjjdkdjdkjfkdbd','el gato tirado en el suelo',23.0000,4,1,'2c42492ce00d1c7c88aec55605bdd98d.jpg'),(36,'laptop','dflskmglskdfmgsdf',23.0000,3,0,'8a8153c0b0b2bf0797b4a70628788cc6.jpg'),(37,'laptop 345','dflskmglskdfmgsdf',23.0000,3,0,'19ff0d2bad96291a5d9a4992c5d6f53d.jpg'),(38,'laptop','dflskmglskdfmgsdf',23.0000,3,0,'338dda86ba52ce074bec5d79f2c77fe4.jpg'),(39,'laptop','dflskmglskdfmgsdf',23.0000,3,0,'5c1851b6b7d116dc1a5a86f9ac0c2640.jpg'),(40,'tajador','el tajador escolar con tacho',1.0000,4,1,'282927711a3f63a43e88acb9716f9a70.jpg'),(41,'goma','la goma',1.0000,4,1,'5ec68f5c7cdab98efbb47df4c3041366.jpg'),(42,'florero 2','florero',1.0000,3,0,'31e1181e843ba3ff731ce36f85399d56.jpg'),(43,'florero','florero decorativo',1.0000,4,1,'76a76766a655eeeedacb6d483cc24356.jpg'),(44,'folder','folder verde',12.0000,4,1,'2b41c924d45c7097bb136d599e518ea6.jpg'),(45,'primer productov','el producto',12.0000,6,0,'23708375293d5945a002a90e469c98fe.jpg'),(46,'juane','este es un nuevo producto',3.0000,6,1,'d23c5172e94f7ea56112f44f4e501cf7.jpg'),(47,'cargador','nuevo cargador',1.0000,7,1,'4e17d7430570e837097ef3c7c51dcfa4.jpg'),(48,'cargador','nuevo item',1.0000,5,0,'fac925ac7a345e6c8a493942e120678e.jpg'),(49,'pollito','pollito',1.0000,8,1,'6df202e7de7b2ca32d1e1d64d7fdc5c0.jpg'),(50,'pollito 2','pollito',23.0000,8,1,'77821dbdad7a967182742d1a01715b8d.jpg'),(51,'billetera','billetera de cuero',12.0000,11,1,'64a4ff01af6e2660a68b0b44a626b1b1.jpg'),(52,'Leche Conejito','leche marca conejito',25.0000,2,1,'7df2527a13b165fef4354c690d4102da.jpg'),(53,'cargador LG','cargador LG para LG',2.0000,6,1,'4f463721ef85433a6a68d49ad4a4c42b.jpg'),(54,'audifonos','audifonos de computadora',12.0000,6,1,'a7f19e5353567f5d8a7d2cd9ca28cdc9.jpg'),(55,'mouse','mouse blanco para PC',13.0000,5,1,'9927b9c285764851ff147e6b7030cb69.jpg'),(56,'perrito','perrito de ceramica',15.0000,5,1,'24e2f2125f76af12d03ef74024562a96.jpg'),(57,'laptop HP','laptoo hp empresarial para uso domestico',1.0000,6,1,'5e07f6239936913c1f645fd0fd8e2227.jpg'),(58,'leche bonle','la famosa leche marca conejito',15.0000,5,1,'fca256bfd539c78935b62a7e366b3ea2.jpg'),(59,'ghk','yyu',2.0000,2,0,'309b4e842357efa59a6169d87e9db2d4.jpg'),(60,'llavero','el llavero',2.0000,9,1,'3f038d09250a7c799c4beab571616786.jpg'),(61,'yyyu','yyuj',2.0000,10,1,'a7270baf3c49b3e2a3f88bc874b02949.jpg'),(62,'hyui','hyu',2.0000,10,1,'1da065df609ceb68d22f452fa01e7bd6.jpg'),(63,'ghj','yui',2.0000,10,0,'52a0447bd1554ab9f032c7dc67a5d7ba.jpg'),(64,'ghj','yui',2.0000,10,0,'cf2d2c9985523665d1e7216df091be17.jpg'),(65,'carro','hhj',1.0000,10,1,'e552177ac853236462cd0090206b4497.jpg'),(66,'carro','hhj',1.0000,10,1,'8953c863323b8958b3bacacf90e99695.jpg'),(67,'causa','ttt',45.0000,10,1,'de58f71b931a9b8072f34cc7fb9441c7.jpg'),(68,'pqkg','rry7u',2.0000,10,1,'5c409808432d3f2ae829773a176f9695.jpg'),(69,'ghe','huduue',1.0000,10,1,'6ba484f6486841cffc54962ef716b114.jpg'),(70,'billetera','billetera',2.0000,11,1,'53c963ae995e7e2deafb84be447d9641.jpg'),(71,'cargador blanco','cargador standard',1.0000,11,1,'8385eff0e576c497da3a0ef7a5071e42.jpg'),(72,'audifonos','audifonos bluetooth motorola',1.0000,11,1,'3c728820f67f2e6b0b0650b08d14904d.jpg'),(73,'jdue','ueie',2.0000,10,1,'3ed54a23ca20bf20d8f1b23090507459.jpg'),(74,'iphone xs','dryuii',12.0000,10,1,'1ee65c3002818b1763c4d7af4bea9c99.jpg'),(75,'jdjd','jgjjf',2.0000,10,1,'c91518ce558ee9b0d4a265f024906524.jpg'),(76,'hdhdj','fjfj',3.0000,10,1,'e75e61bf22c57a410c036bc2cde83806.jpg'),(77,'sopa de gallina','gallina de chacra',100.0000,12,1,'1bba669913614cb63eacc50d47419da5.jpg'),(78,'pollo asado','pollo sazonado con especil a lo kairos',100.0000,12,1,'33b94e5cb558bce1625251e0a5cc834d.jpg'),(79,'postre de fruta','fruta fresca',100.0000,12,1,'0548d6ddc22011e067bb1b320af3de88.jpg'),(80,'tequeños','rellenos de pollo con jamon',100.0000,12,1,'d14c4cf4e76abc00db773b24ddc0d332.jpg'),(81,'mazamorra morada','deliciosa de maiz morada de menu',100.0000,12,1,'d873d88ceda21b7381badc212e8dc83c.jpg'),(82,'mazamorra morada','deliciosa de maiz morada',100.0000,12,0,'c632a007e24f9f237e5c05fc29441ddc.jpg'),(83,'mazamorra morada','maiz',100.0000,12,0,'ea3ef1069c65c170a3daeedcbef37f6a.jpg'),(84,'tallarin con carne','carne quisada',100.0000,12,1,'17327a339117fba63f77788ed8469ef6.jpg'),(85,'refresci de uva','uva fresca',100.0000,12,1,'10a99b1ecf49e76a761c03204df68d35.jpg'),(86,'refresco de chicha morada','chicha morada',100.0000,12,1,'6b62fc8044a0f0b009447ec7395809d9.jpg'),(87,'navaja','navaja nueva',1.0000,11,1,'380ad1e693d6e1af73cc0b1fce8f7d61.jpg'),(88,'audifonos','audifonos LG negros HD',1.0000,11,1,'9b6d036f383c7b4ef038edc0fc2bb0f6.jpg'),(89,'Pollo al horno','Acompañado de Pure de papas y arroz',100.0000,12,1,'e1ebaac89a36aafef17350ffeb2f914a.jpg'),(90,'Sopa a la minuta','Con dados de pan',100.0000,12,1,'f18f2afd01006e39b77d851e844f1837.jpg'),(91,'Tilapia frita','Con Arroz y platanos fritos',100.0000,12,1,'de8a5437c6c7e69b13ff59f2934d5ac2.jpg'),(92,'Ensalada fresca','Mix de verduras',100.0000,12,1,'dc20c7c46415f438e337cd9d00d223be.jpg'),(93,'Tortilla de choclo','Con zarza de cebolla',100.0000,12,1,'c1b3b156c7f3ced5376b63e28a6bdc64.jpg'),(94,'Macarrones con chorizo','En salsa roja',100.0000,12,1,'ddd9e1bec74ce82f9f144b92c9008d74.jpg'),(95,'Seco de carne','Con arroz y menestra',100.0000,12,1,'4123de694d7a046c937fc54d424a7b0a.jpg'),(96,'Refresco y postre','Refresco de manzana y mazmorra morada',100.0000,12,1,'8b5650741d4f6158df2827add7a76ac0.jpg'),(97,'Ensalada de frutas','Ensalada de frutas con yogur Probiotico, granola y miel abejas.O% azucar 0% colesterol.',1000.0000,13,1,'ca8d6679c10cf6d817feb18d2eaf7802.jpg'),(98,'Ensalada de frutas','Con yogur probiotico',1000.0000,13,0,'ece977d60ec8a86a7be1fd11cd75e227.jpg'),(99,'Juane de gallina','lncluye ají de menudencia, frijol y maduro',100.0000,14,1,'d671e5bffab30f315ba3689aabea713c.jpg'),(100,'Lasaña','Incluye pan de ajo artesanal',100.0000,14,1,'ec26abae4b4282685b9ecc2bb0a3ad81.jpg'),(101,'Costilla a la caja china','.',100.0000,14,1,'b3b35b054bf6d7c32db147768c84e28b.jpg'),(102,'Curso de dibujo','breve introducción al dibujo técnico',15.0000,15,1,'e064b12de1a84aaa1662501839282286.jpg'),(103,'Curso de robotica','curso de robotica enfocado en movimiento',20.0000,15,1,'379ab84d18d2ebd3e0722f1388393ffc.jpg'),(104,'Curso de cocina','Curso de cocina en general para principiantes',10.0000,15,1,'206892eca653d0b4ebd2fcef1d586b01.jpg'),(105,'Super LUIGI\'S clásica','Super LUIGI\'S clásica estilo americana con tocino queso Bonle y huevo si desea el cliente',100.0000,13,1,'d885dc10d9d5dd2f9a394022b34d0192.jpg'),(106,'Hamburguesa Royal','Con lechuga, tomates, huevo, papas al hilo y cremas.',100.0000,13,1,'42ab3c78808ca9cb24e6a56464e390dd.jpg'),(107,'Hamburguesa Cheese','Con lechuga, tomate, queso, papas al hilo y cremas.',100.0000,13,1,'dc2bcb5fb8bae704c45bfa5157f15cc8.jpg'),(108,'Hamburguesa Hawaiana','Con lechuga, tomate, piña, papas al hilo y cremas.',100.0000,13,1,'e81515fb16d0ee573f2e10ab7c9dc1d4.jpg'),(109,'Hamburguesa Completa','Con lechuga, tomate, huevo, jamon, queso, papas al hilo y cremas.',100.0000,13,1,'bc93a57185299b96ff75362f42aeb01e.jpg'),(110,'Pechuga de Pollo a la plancha','Con papas fritas, ensalada y cremas',100.0000,13,1,'b28a4a43836eb2b6d328faa2143f959c.jpg'),(111,'Jugo de maracuya','Natural',100.0000,13,1,'8906fb46630c4d5dacead91739664598.jpg'),(112,'Jugo de uva','Natural',100.0000,13,1,'5eaa570b7788cebd15b46042d11ac2bc.jpg'),(113,'Ponche','Al estilo Juanito',100.0000,14,1,'745a1127317956b915106d34ca38e255.jpg'),(114,'Ponche Fuerte','Con un toque de alcohol',100.0000,14,1,'fd99c11987986d16913d562baa0f7bdf.jpg'),(115,'Ponche + Mazato','Con Mazato',100.0000,14,1,'5f1f6f34f2d43a8346ce53e292e6afb9.jpg'),(116,'Ponche + Café','Con Café',100.0000,14,1,'6a98ef15f9c2c79346cced676a006d5d.jpg'),(117,'Shibe','De yuca',100.0000,14,1,'ed66ae77d718289e6824eb333230ac19.jpg'),(118,'Upe','.',100.0000,14,1,'ecb0ef3f5f6b5a9aa2b8b399b28c493b.jpg'),(119,'Keke de naranja','.',100.0000,14,1,'1878ff50636459ee2c114500bc667273.jpg'),(120,'item 1','wwsdjxjcmfmrm',2.0000,16,1,NULL),(121,'Cutacho','.',100.0000,14,1,'58dd0af41b820c4f3ff41d78f2d30fad.jpg'),(122,'Cutacho','.',100.0000,14,0,'871cc938f2a6cfc035f9640d36dee371.jpg'),(123,'Huevo frito','.',100.0000,14,1,'4356a57287933bc4bf13eaa89ea89dfb.jpg'),(124,'Huevo duro','.',100.0000,14,1,'896a83cbe4494d0417280d4cbb361aff.jpg'),(125,'Café de Olla','.',100.0000,14,1,'63b4216eeff593483ae77b5e34e8b645.jpg'),(126,'Sandwich de Pollo','.',100.0000,14,1,'03ceaa743b2d031a60777018498f8875.jpg'),(127,'Sandwich Mixto','Con jamon y queso',100.0000,14,1,'30c9ca51ffcbd65ced477ca538e3bc9d.jpg'),(128,'Omelet con tostadas','.',100.0000,14,1,'56e3078ffed80e60c80e3b6ebcf8c4fb.jpg'),(129,'Omelet con verduras','.',100.0000,14,1,'bde0693674bc1c2937240f7903803a88.jpg'),(130,'Jugo de naranja','.',100.0000,14,1,'4aa37ec9d043695d5ebe01f2c43670d1.jpg'),(131,'Jugo de papaya','.',100.0000,14,1,'41f222da7f4638e71a8d7690ef60f760.jpg'),(132,'Jugo surtido','.',100.0000,14,1,'10efc906cd8cdb77dc7724891fce9fbf.jpg'),(133,'Pastel de espinaca','.',100.0000,14,1,'7e3200bc6c39dc7326921d10ee0588ad.jpg'),(134,'Pastel de manzana','.',100.0000,14,1,'eda01abe169e77526dda3f3c6fcd91c1.jpg'),(135,'Pescado frito','.',100.0000,14,1,'e5f3b211ee29d55c748d9a092a0d7d55.jpg'),(136,'Tacu Tacu montado','.',100.0000,14,1,'ca49ad438be33fc3ddf27c785ddd4357.jpg'),(137,'Torrejas de fideos','.',100.0000,14,1,'45d5ec838f545c2963c394f3d6fd3dce.jpg'),(138,'Sándwich mixto + Huevo','.',100.0000,14,1,'f11ba8d16ee034f760a850f7fb61537f.jpg'),(139,'Sandwich mixto + Huevo','.',100.0000,14,1,'44888edbd5886d8e8e6dab93561c3003.jpg'),(140,'Relleno con platano frito','.',100.0000,14,1,'40d8557cba637162837f137db7e20932.jpg'),(141,'Puraruca','A base de maní y maduro',100.0000,14,1,'7375d82567a44c16a38caf2f1c39ed7c.jpg'),(142,'Hamburguesa Clasica','Con tomate, lechuga y papas al hilo',100.0000,13,1,'114513c6596b74d53dbf3b0dbc4f77c7.jpg'),(143,'Hamburguesa Artesanal al plato','Con Papas fritas y cremas',100.0000,13,1,'f2eb8c47094de689febd3cbac2637a1b.jpg'),(144,'Broster','Con Papas fritas y ensalada.',100.0000,13,1,'ea2e19586fb7971e5dd0cc8a10a48b81.jpg'),(145,'Salchibroster','Con papas fritas y ensalada',100.0000,13,1,'1e2ca9395ff35f1c4f00c1a0c5ba61b0.jpg'),(146,'Salchipapa','Con cremas',100.0000,13,1,'d11832c61526a50879d4cb7169e71c70.jpg'),(147,'Sandwich de Pollo','Con cremas',100.0000,13,1,'1a065b70ea56eee46caf607a8340e2dc.jpg'),(148,'Hamburguesa Artesanal Royal','Con papas y ensalada',100.0000,13,1,'d899484758973f47f2bcdedbdfcb83fc.jpg'),(149,'Jugo de piña','.',100.0000,13,1,'9df06b1b0cf238e4d303617a61a5ad04.jpg'),(150,'Broster con patacones','Con patacones y ensalada',100.0000,13,1,'67883061abb1daf8450aaf8acbc291de.jpg'),(151,'Pollo a la brasa con papas fritas','Con papas y ensalada',100.0000,13,1,'d1d9f7cbd0920d89cd7de8041cbff1b6.jpg'),(152,'Pollo a la brasa con patacones','Con patacones y ensalada',100.0000,13,1,'18d0e8db7e47a5037e6512dcc2c2db73.jpg'),(153,'Aguajina','.',100.0000,13,1,'c935bfe196d232b04256f5cd2e28dc5c.jpg'),(154,'Jugo de taperiba','.',100.0000,13,1,'4d8019b1c09ec44e0d1801c23a620e4a.jpg'),(155,'Chicha morada 1 litro','.',100.0000,13,1,'494847f20f6231a02ba2d42b7187c732.jpg'),(156,'Jugo de Naranja','.',100.0000,13,1,'803b26d11108fec0459329c31e509f42.jpg'),(157,'Jugo de melón','.',100.0000,13,1,'f8781cbdea5b487540c06f7f3412f749.jpg'),(158,'Jugo de mango','.',100.0000,13,1,'a1aa87c78901aaf976dfb67e945ac4c5.jpg'),(159,'erp','ful customizable',1.0000,17,1,'2babc11668164691eb1c63a36a916ca5.jpg'),(160,'Salchi Broster','Salchicha y pollo broster',100.0000,13,1,'04374f16fa4ad62bdaa7edd527a8c484.jpg');
/*!40000 ALTER TABLE `item_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `pedibles`
--

DROP TABLE IF EXISTS `pedibles`;
/*!50001 DROP VIEW IF EXISTS `pedibles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `pedibles` (
  `cantidad_pedidos` tinyint NOT NULL,
  `ult_pedido` tinyint NOT NULL,
  `pedible_id` tinyint NOT NULL,
  `tipo_pedible` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `descripcion` tinyint NOT NULL,
  `preview` tinyint NOT NULL,
  `activo` tinyint NOT NULL,
  `freeler_shared_id` tinyint NOT NULL,
  `tercerizable` tinyint NOT NULL,
  `freeler_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT NULL,
  `comprador_id` int(11) NOT NULL,
  `freeler_shared_id` int(11) NOT NULL,
  `enviado` int(11) NOT NULL DEFAULT '0',
  `pagado` int(11) NOT NULL DEFAULT '0',
  `finalizado` int(11) NOT NULL DEFAULT '0',
  `direccion_envio` text,
  `afiche_id` int(11) DEFAULT NULL,
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pedido_id`),
  KEY `fk_Pedido_comprador1_idx` (`comprador_id`),
  KEY `fk_pedido_freeler1_idx` (`freeler_shared_id`),
  KEY `fk_pedido_afiche1_idx` (`afiche_id`),
  CONSTRAINT `fk_Pedido_comprador1` FOREIGN KEY (`comprador_id`) REFERENCES `comprador` (`comprador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_afiche1` FOREIGN KEY (`afiche_id`) REFERENCES `afiche` (`afiche_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_freeler1` FOREIGN KEY (`freeler_shared_id`) REFERENCES `freeler` (`freeler_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'2018-12-20 22:54:38',9,1,0,0,0,NULL,NULL,0),(2,'2018-12-20 23:37:50',10,1,0,0,0,NULL,NULL,1),(3,'2018-12-21 00:11:30',10,1,0,0,0,NULL,NULL,1),(4,'2018-12-21 01:00:17',10,1,0,0,0,NULL,NULL,1),(5,'2018-12-21 01:52:13',11,1,0,0,0,NULL,NULL,1),(6,'2018-12-21 03:55:26',10,1,0,0,0,'Av . Rosales 345 Miraflores',NULL,1),(7,'2018-12-21 18:41:55',13,1,0,0,0,NULL,NULL,1),(8,'2018-12-21 18:42:07',13,1,0,0,0,NULL,NULL,0),(9,'2018-12-21 18:44:10',13,1,0,0,0,NULL,NULL,1),(10,'2018-12-21 18:44:43',13,1,0,0,0,'Av. revolución 456',NULL,1),(11,'2018-12-21 19:04:27',15,1,0,0,0,'Av. central 0989',NULL,1),(12,'2018-12-21 19:07:54',15,1,0,0,0,'Av. central 0989',NULL,1),(13,'2018-12-21 19:19:09',16,1,0,0,0,'Callao callao',NULL,1),(14,'2018-12-21 19:23:28',17,8,0,0,0,'033',NULL,0),(15,'2018-12-21 19:26:42',17,8,0,0,0,'033',NULL,0),(16,'2018-12-21 19:32:13',17,8,0,0,0,'033',NULL,0),(17,'2018-12-23 20:01:35',18,8,1,0,0,'Jr. José Olaya 1277, Tarapoto',NULL,0),(18,'2018-12-23 20:04:01',18,8,0,0,0,'Jr. José Olaya 1277, Tarapoto',NULL,0),(19,'2019-01-18 03:20:45',14,1,0,0,0,'Av. salidas 567',13,1),(20,'2019-01-19 18:48:02',14,1,0,0,0,'Av. salidas 567',18,1),(21,'2019-01-19 18:49:08',14,1,0,0,0,'Av. salidas 567',17,1),(22,'2019-01-21 16:41:25',19,9,0,0,0,'Jr. Andres avelino cáceres 152',21,0),(23,'2019-01-22 04:47:58',15,1,0,0,0,'Av. central 0989',20,1),(24,'2019-01-22 05:18:13',15,1,0,0,0,'Av. central 0989',20,1),(25,'2019-01-23 01:42:03',14,1,0,0,0,'Av. salidas 567',NULL,0),(26,'2019-01-23 04:03:24',14,1,0,0,0,'Av. salidas 567',20,1),(27,'2019-01-23 16:14:34',20,9,0,0,0,'Jr. Moyobamba 131 Tarapoto',21,0),(28,'2019-01-23 16:32:26',20,10,0,0,0,'Jr. Moyobamba 131 Tarapoto',NULL,1),(29,'2019-01-25 17:09:34',22,9,1,1,0,'Jr manco capac 448 tarapoto',21,0),(30,'2019-01-27 23:27:29',14,12,0,0,0,'Av. salidas 567',20,0),(31,'2019-01-27 23:53:21',14,12,0,0,0,'Av. salidas 567',NULL,0),(32,'2019-01-28 01:42:28',14,12,0,0,0,'Av. salidas 567',NULL,0),(33,'2019-01-28 17:05:31',14,12,0,0,0,'Av. salidas 567',23,0),(34,'2019-01-29 02:28:38',21,9,0,0,0,'Jose Olaya 1277',21,0),(35,'2019-01-29 02:53:46',21,9,0,0,0,'Jose Olaya 1277',21,0),(36,'2019-02-07 01:50:34',14,1,1,1,0,'Av. salidas 567',20,0),(37,'2019-02-07 02:44:04',14,10,0,0,0,'Av. salidas 567',28,1),(38,'2019-02-07 15:44:32',14,1,0,0,0,'Av. salidas 567',18,1),(39,'2019-03-04 18:35:36',14,1,0,0,0,'Av. salidas 567',NULL,0),(40,'2019-03-06 16:10:25',21,10,0,0,0,'Jose Olaya 1277',31,1),(41,'2019-03-06 16:14:00',21,10,0,0,0,'Jose Olaya 1277',31,1),(42,'2019-03-06 16:14:49',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(43,'2019-03-06 16:26:25',21,10,0,0,0,'Jose Olaya 1277',31,1),(44,'2019-03-06 16:33:06',21,10,0,0,0,'Jose Olaya 1277',31,1),(45,'2019-03-06 16:34:53',21,10,0,0,0,'Jose Olaya 1277',31,1),(46,'2019-03-07 18:42:07',14,1,0,0,0,'Av. salidas 567',17,1),(47,'2019-03-11 03:04:17',14,1,0,0,0,'Av. salidas 567',17,0),(48,'2019-03-11 03:04:26',14,1,0,0,0,'Av. salidas 567',17,0),(49,'2019-03-11 03:05:52',14,1,0,0,0,'Av. salidas 567',NULL,0),(50,'2019-03-11 03:06:16',14,1,0,0,0,'Av. salidas 567',NULL,1),(51,'2019-03-11 17:24:35',14,1,0,0,0,'Av. salidas 567',17,0),(52,'2019-03-12 19:38:06',21,10,0,0,0,'Jose Olaya 1277',31,0),(53,'2019-03-12 19:44:59',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(54,'2019-03-16 13:04:58',14,1,0,0,0,'Av. salidas 567',NULL,0),(55,'2019-03-17 21:20:20',14,1,0,0,0,'Av. salidas 567',31,0),(56,'2019-03-18 15:40:17',14,1,0,0,0,'Av. salidas 567',NULL,0),(57,'2019-03-18 15:45:21',14,1,0,0,0,'Av. salidas 567',NULL,0),(58,'2019-03-18 19:11:10',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(59,'2019-03-18 19:15:52',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(60,'2019-03-18 19:20:55',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(61,'2019-03-20 00:29:03',21,10,0,0,0,'Jose Olaya 1277',NULL,1),(62,'2019-04-14 19:45:40',14,1,1,1,0,'Av. salidas 567',NULL,0),(63,'2019-04-14 19:49:21',14,1,1,1,0,'Av. salidas 567',20,0),(64,'2019-04-15 22:08:56',21,11,0,0,0,'Jose Olaya 1277',33,0),(65,'2019-04-19 11:52:05',21,11,0,0,0,'Jose Olaya 1277',36,0),(66,'2019-04-21 17:02:09',21,11,0,0,0,'Jose Olaya 1277',40,0),(67,'2019-04-21 17:46:37',23,11,0,0,0,'Jr. Andres avelino cáceres 152',40,0),(68,'2019-04-29 22:04:27',21,10,1,1,0,'Jose Olaya 1277',41,1),(69,'2019-05-07 19:18:48',20,10,0,0,0,'Jr. Moyobamba 131 Tarapoto',41,1),(70,'2019-06-07 17:02:07',17,10,1,1,0,'033',41,1),(71,'2019-06-07 17:26:03',17,10,1,1,0,'033',NULL,1),(72,'2019-06-09 18:22:09',17,10,1,1,0,'Jr. Vista Alegre 105',41,0),(73,'2019-06-15 10:00:43',17,10,1,1,0,'033',42,0),(74,'2019-06-17 18:00:56',25,10,1,0,0,'Jr, Ulises Reategui 549 - Tarapoto',42,0),(75,'2019-06-21 20:24:54',17,10,0,0,0,'033',42,0);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_nombre` varchar(250) DEFAULT NULL,
  `producto_descripcion` varchar(250) DEFAULT NULL,
  `producto_precio` decimal(18,4) DEFAULT NULL,
  `producto_fec_creacion` datetime DEFAULT NULL,
  `producto_es_tercerizable` int(11) DEFAULT NULL COMMENT '1: true, 0:false',
  `producto_desde` datetime DEFAULT NULL,
  `producto_hasta` datetime DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  `producto_URL` varchar(250) DEFAULT NULL,
  `preview_img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`producto_id`),
  KEY `fk_producto_empresa1_idx` (`empresa_id`),
  CONSTRAINT `fk_producto_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:16:10',1,'2018-11-22 02:16:10','2018-12-04 02:16:10',1,1,NULL,NULL),(2,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:19:06',1,'2018-11-22 02:19:06','2018-12-04 02:19:06',1,1,NULL,NULL),(3,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:32:45',1,'2018-11-22 02:32:45','2018-12-04 02:32:45',1,1,NULL,NULL),(4,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:34:03',1,'2018-11-22 02:34:03','2018-12-04 02:34:03',1,1,NULL,NULL),(5,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:35:18',1,'2018-11-22 02:35:18','2018-12-04 02:35:18',1,1,NULL,NULL),(6,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 02:36:07',1,'2018-11-22 02:36:07','2018-12-04 02:36:07',1,1,NULL,NULL),(7,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 05:22:34',1,'2018-11-22 05:22:34','2018-12-04 05:22:34',1,1,NULL,NULL),(8,'nuevo producto','el nuevo producto detalle',12.3000,'2018-11-22 16:38:11',1,'2018-11-22 16:38:11','2018-12-04 16:38:11',1,1,NULL,'d1896a1dbba62431d847626c7f7a4a60.jpg'),(9,'nuevo producto','el nuevo producto detalle',0.0000,'2018-11-22 17:09:23',1,'2018-11-22 17:09:23',NULL,1,1,NULL,NULL),(10,'perrito','perrito de ceramica',0.0000,'2018-11-22 17:28:13',1,'2018-11-22 17:28:13',NULL,1,1,NULL,NULL),(11,'perrito','perrito de ceramica',0.0000,'2018-11-22 17:29:25',1,'2018-11-22 17:29:25',NULL,1,1,NULL,'ca440028f381768dfa51231a2e9a91ba.jpg'),(12,'combo PC','COMBO INFORMATICO',1200.0000,'2018-11-22 17:40:58',0,'2018-11-22 17:40:58',NULL,1,1,NULL,NULL),(13,'laptop HP','laptoo hp empresarial para uso domestico',0.0000,'2018-11-22 20:27:02',1,'2018-11-22 20:27:02',NULL,1,1,NULL,NULL),(14,'cargador LG','cargador LG para LG',37.0000,'2018-11-22 20:53:00',1,'2018-11-22 20:53:00',NULL,17,1,NULL,NULL),(15,'mouse','mouse blanco para PC',18.0000,'2018-11-23 00:42:03',1,'2018-11-23 00:42:03','2018-11-30 00:42:03',17,1,NULL,NULL),(16,'audifonos','audifonos de computadora',30.0000,'2018-11-23 00:44:16',1,'2018-11-23 00:44:16',NULL,17,1,NULL,NULL),(17,'audifonos','audifonos de computadora',32.0000,'2018-11-23 00:44:43',1,'2018-11-23 00:44:43',NULL,17,1,NULL,NULL),(18,'combo digital','el nuevo combo',50.0000,'2018-11-23 00:45:17',1,'2018-11-23 00:45:17',NULL,17,1,NULL,NULL),(19,'mouse y laptop','combo digital',1200.0000,'2018-11-23 00:48:59',1,'2018-11-23 00:48:59',NULL,17,1,NULL,'896e116fb51146d48fdcf0af2fcbd3b8.jpg'),(20,'perrito','perrito de ceramica',34.0000,'2018-11-23 01:50:21',1,'2018-11-23 01:50:21',NULL,17,1,NULL,NULL),(21,'combo total','combo',12.0000,'2018-11-23 02:47:41',0,'2018-11-23 02:47:41','2018-11-30 02:47:41',17,1,NULL,NULL),(22,'cargador LG','cargador LG para LG',85.0000,'2018-11-23 03:46:19',1,'2018-11-23 03:46:19',NULL,17,1,NULL,NULL),(23,'leche bonle','la famosa leche marca conejito',5.0000,'2018-11-23 12:18:42',0,'2018-11-23 12:18:42',NULL,17,1,NULL,NULL),(24,'Leche Conejito','leche marca conejito',0.0000,'2018-11-24 00:32:00',1,'2018-11-24 00:32:00',NULL,10,0,NULL,NULL),(25,'fdgf','fdg',0.0000,'2018-11-24 01:13:14',1,'2018-11-24 01:13:14',NULL,10,0,NULL,NULL),(26,'billetera','billetera de cuero',56.0000,'2018-11-24 18:36:00',1,'2018-11-24 18:36:00',NULL,10,1,NULL,NULL),(27,NULL,NULL,0.0000,'2018-11-24 18:36:53',1,'2018-11-24 18:36:53',NULL,10,0,NULL,NULL),(28,'pip',NULL,90.0000,'2018-11-24 18:38:19',1,'2018-11-24 18:38:19',NULL,10,0,NULL,NULL),(29,'ghk','yyu',89.0000,'2018-11-24 18:47:26',1,'2018-11-24 18:47:26',NULL,10,1,NULL,NULL),(30,'llavero','el llavero',15.0000,'2018-11-27 01:31:34',0,'2018-11-27 01:31:34',NULL,21,1,NULL,NULL),(31,'llavero','el llavero',20.0000,'2018-11-27 01:31:45',1,'2018-11-27 01:31:45',NULL,21,1,NULL,NULL),(32,'yyyu','yyuj',56.0000,'2018-11-28 03:34:24',1,'2018-11-28 03:34:24','2018-11-29 03:34:24',22,1,NULL,NULL),(33,'yyyu','yyuj',90.0000,'2018-11-28 03:37:08',1,'2018-11-28 03:37:08',NULL,22,1,NULL,NULL),(34,'hyui','hyu',97.0000,'2018-11-28 03:38:13',1,'2018-11-28 03:38:13',NULL,22,1,NULL,NULL),(35,'combo2','ttu',23.0000,'2018-11-28 03:42:13',1,'2018-11-28 03:42:13',NULL,22,1,NULL,NULL),(36,'combo3','tyui',75.0000,'2018-11-28 03:47:11',1,'2018-11-28 03:47:11',NULL,22,1,NULL,NULL),(37,'nuevo producto','el nuevo producto detalle',NULL,'2018-11-28 15:27:33',NULL,'2018-11-28 15:27:33',NULL,10,0,NULL,NULL),(38,'nuevo producto','el nuevo producto detalle',NULL,'2018-11-28 15:28:31',NULL,'2018-11-28 15:28:31',NULL,10,0,NULL,NULL),(39,'carro','hhj',5906.0000,'2018-11-29 19:25:44',0,'2018-11-29 19:25:44','2018-11-17 19:25:44',22,1,NULL,NULL),(40,'billetera','billetera',45.0000,'2018-12-06 02:06:51',1,'2018-12-06 02:06:51',NULL,10,0,NULL,NULL),(41,'cargador blanco','cargador standard',25.0000,'2018-12-06 03:11:51',1,'2018-12-06 03:11:51',NULL,10,1,NULL,NULL),(42,'audifonos','audifonos bluetooth motorola',120.0000,'2018-12-06 03:13:10',1,'2018-12-06 03:13:10',NULL,10,1,NULL,NULL),(43,'combo tec','ghuu',788.0000,'2018-12-07 23:22:43',1,'2018-12-07 23:22:43','2018-12-24 23:22:43',22,1,NULL,NULL),(44,'carro','hhj',0.0000,'2018-12-11 20:11:53',0,'2018-12-11 20:11:53',NULL,22,1,NULL,NULL),(45,'hdhdj','fjfj',258.0000,'2018-12-11 20:13:14',1,'2018-12-11 20:13:14',NULL,22,1,NULL,NULL),(46,'billetera','billetera de cuero',150.0000,'2018-12-12 01:08:40',1,'2018-12-12 01:08:40',NULL,10,0,NULL,NULL),(47,'menu 1','sopa, pollo asado,postre y refresco',12.0000,'2018-12-12 16:22:32',1,'2018-12-12 16:22:32','2018-12-12 16:22:32',24,0,NULL,NULL),(48,'sopa de gallina','gallina de chacra de menu',0.0000,'2018-12-12 16:25:50',0,'2018-12-12 16:25:50','2018-12-12 16:25:50',24,1,NULL,NULL),(49,'pollo asado','pollo sazonado con especil a lo kairos',12.0000,'2018-12-12 16:26:18',1,'2018-12-12 16:26:18','2018-12-12 16:26:18',24,1,NULL,NULL),(50,'postre de fruta','fruta fresca de menu',0.0000,'2018-12-12 16:26:40',1,'2018-12-12 16:26:40',NULL,24,1,NULL,NULL),(51,'tequeños','rellenos de pollo con jamon de menu',0.0000,'2018-12-12 16:27:18',0,'2018-12-12 16:27:18','2018-12-12 16:27:18',24,1,NULL,NULL),(52,'mazamorra morada','deliciosa de maiz morada de menu',0.0000,'2018-12-12 16:28:08',1,'2018-12-12 16:28:08','2018-12-12 16:28:08',24,1,NULL,NULL),(53,'tallarin con carne','carne quisada',12.0000,'2018-12-12 16:28:50',1,'2018-12-12 16:28:50','2018-12-12 16:28:50',24,1,NULL,NULL),(54,'refresci de uva','uva fresca',0.0000,'2018-12-12 16:29:05',1,'2018-12-12 16:29:05','2018-12-12 16:29:05',24,0,NULL,NULL),(55,'refresco de chicha morada','chicha morada',0.0000,'2018-12-12 16:29:20',1,'2018-12-12 16:29:20','2018-12-12 16:29:20',24,0,NULL,NULL),(56,'navaja','navaja nueva',3.0000,'2018-12-14 02:55:02',1,'2018-12-14 02:55:02',NULL,10,0,NULL,NULL),(57,'audifonos','audifonos LG negros HD',18.0000,'2018-12-19 02:00:57',1,'2018-12-19 02:00:57',NULL,10,0,NULL,NULL),(58,'navaja','navaja nueva',5.0000,'2018-12-29 01:36:22',1,'2018-12-29 01:36:22',NULL,23,1,NULL,NULL),(59,'Sopa a la minuta','Con dados de pan',0.0000,'2019-01-07 17:19:38',1,'2019-01-07 17:19:38',NULL,24,1,NULL,NULL),(60,'Tilapia frita','Con Arroz y platanos fritos',10.0000,'2019-01-07 17:21:00',1,'2019-01-07 17:21:00',NULL,24,1,NULL,NULL),(61,'Ensalada fresca','Mix de verduras',0.0000,'2019-01-07 17:21:10',1,'2019-01-07 17:21:10',NULL,24,1,NULL,NULL),(62,'Tortilla de choclo','Con zarza de cebolla',0.0000,'2019-01-07 17:21:18',1,'2019-01-07 17:21:18',NULL,24,1,NULL,NULL),(63,'Macarrones con chorizo','En salsa roja',10.0000,'2019-01-07 17:21:34',1,'2019-01-07 17:21:34',NULL,24,1,NULL,NULL),(64,'Seco de carne','Con arroz y menestra',10.0000,'2019-01-07 17:21:49',1,'2019-01-07 17:21:49',NULL,24,1,NULL,NULL),(65,'Pollo al horno','Acompañado de Pure de papas y arroz',10.0000,'2019-01-07 17:22:41',1,'2019-01-07 17:22:41',NULL,24,1,NULL,NULL),(66,'Refresco y postre','Refresco de manzana y mazmorra morada',0.0000,'2019-01-07 17:23:40',1,'2019-01-07 17:23:40',NULL,24,1,NULL,NULL),(67,'Ensalada de frutas','Con yogur probiotico y fruta seca',10.0000,'2019-01-23 16:30:12',1,'2019-01-23 16:30:12',NULL,25,0,NULL,NULL),(68,'Juane de gallina','lncluye ají de menudencia, frijol y maduro',20.0000,'2019-01-26 20:49:10',1,'2019-01-26 20:49:10',NULL,26,1,NULL,NULL),(69,'Lasaña','Incluye pan de ajo artesanal',18.0000,'2019-01-26 20:49:28',1,'2019-01-26 20:49:28',NULL,26,0,NULL,NULL),(70,'Costilla a la caja china','.',20.0000,'2019-01-26 20:49:43',1,'2019-01-26 20:49:43',NULL,26,1,NULL,NULL),(71,'Curso de dibujo','breve introducción al dibujo técnico',16.0000,'2019-01-27 21:19:17',0,'2019-01-27 21:19:17',NULL,27,1,NULL,NULL),(72,'Curso de cocina','Curso de cocina en general para principiantes',10.0000,'2019-01-27 21:24:13',0,'2019-01-27 21:24:13',NULL,27,0,NULL,NULL),(73,'Curso de cocina','Curso de cocina en general para principiantes',10.0000,'2019-01-27 21:24:14',0,'2019-01-27 21:24:14',NULL,27,1,NULL,NULL),(74,'Curso de robotica','curso de robotica enfocado en movimiento',25.0000,'2019-01-27 21:24:24',1,'2019-01-27 21:24:24',NULL,27,1,NULL,NULL),(75,'El diseñador robótico','Cursos de diseño en robotica y dibujo',30.0000,'2019-01-27 21:25:17',0,'2019-01-27 21:25:17',NULL,27,1,NULL,NULL),(76,'Hamburguesa Clásica','Con lechuga, tomates, papas al hilo y cremas.',11.0000,'2019-02-07 02:29:22',1,'2019-02-07 02:29:22',NULL,25,0,NULL,NULL),(77,'Hamburguesa Royal','Con lechuga, tomates, huevo, papas al hilo y cremas.',12.0000,'2019-02-07 02:29:53',1,'2019-02-07 02:29:53',NULL,25,0,NULL,NULL),(78,'Hamburguesa Cheese','Con lechuga, tomate, queso, papas al hilo y cremas.',12.0000,'2019-02-07 02:30:10',1,'2019-02-07 02:30:10',NULL,25,0,NULL,NULL),(79,'Hamburguesa Hawaiana','Con lechuga, tomate, piña, papas al hilo y cremas.',12.0000,'2019-02-07 02:30:29',1,'2019-02-07 02:30:29',NULL,25,0,NULL,NULL),(80,'Hamburguesa Completa','Con lechuga, tomate, huevo, jamon, queso, papas al hilo y cremas.',13.0000,'2019-02-07 02:30:48',1,'2019-02-07 02:30:48',NULL,25,0,NULL,NULL),(81,'Pechuga de Pollo a la plancha','Con papas fritas, ensalada y cremas',16.0000,'2019-02-07 02:31:01',1,'2019-02-07 02:31:01',NULL,25,0,NULL,NULL),(82,'Refresco de maracuya','Natural',2.5000,'2019-02-07 02:31:24',1,'2019-02-07 02:31:24',NULL,25,0,NULL,NULL),(83,'Refresco de uva','Natural',2.5000,'2019-02-07 02:31:37',1,'2019-02-07 02:31:37',NULL,25,0,NULL,NULL),(84,'Pechuga de Pollo a la plancha','Con papas fritas, ensalada y cremas',16.0000,'2019-02-07 17:23:19',1,'2019-02-07 17:23:19',NULL,25,1,NULL,NULL),(85,'Refresco de maracuya','Natural',2.5000,'2019-02-07 17:23:35',1,'2019-02-07 17:23:35',NULL,25,0,NULL,NULL),(86,'Refresco de uva','Natural',2.5000,'2019-02-07 17:23:56',1,'2019-02-07 17:23:56',NULL,25,0,NULL,NULL),(87,'Refresco de maracuya','Natural',2.5000,'2019-02-12 20:24:34',1,'2019-02-12 20:24:34',NULL,25,0,NULL,NULL),(88,'Refresco de uva','Natural',2.5000,'2019-02-12 20:24:48',1,'2019-02-12 20:24:48',NULL,25,0,NULL,NULL),(89,'audifonos yui','audifonos LG negros HD',0.0000,'2019-02-26 06:20:08',1,'2019-02-26 06:20:08',NULL,23,1,NULL,NULL),(90,'cargador blanco','cargador standard',80.0000,'2019-02-28 15:50:38',1,'2019-02-28 15:50:38',NULL,23,1,NULL,NULL),(91,'Refresco de maracuya','Natural',2.5000,'2019-03-06 16:07:06',1,'2019-03-06 16:07:06',NULL,25,0,NULL,NULL),(92,'combomania',NULL,11.0000,'2019-03-13 21:44:12',1,'2019-03-14 02:44:12',NULL,25,0,NULL,NULL),(93,'combo 2','ggddgh',15.0000,'2019-03-13 21:52:31',1,'2019-03-14 02:52:31',NULL,25,0,NULL,NULL),(94,'combo try','jsjs',128.0000,'2019-03-16 13:30:18',1,'2019-03-16 18:30:18',NULL,23,0,NULL,NULL),(95,'com','nk',251.0000,'2019-03-16 14:10:32',1,'2019-03-16 19:10:32',NULL,23,0,NULL,'ee524b75f5b51747dfaadff76390273e.jpg'),(96,'344','hjdbd',123.0000,'2019-03-16 14:23:46',1,'2019-03-16 19:23:46',NULL,14,1,NULL,NULL),(97,'combo','ghh',28.0000,'2019-03-17 22:03:29',1,'2019-03-18 03:03:29',NULL,14,1,NULL,NULL),(98,'commm','ssd',128.0000,'2019-03-18 15:32:49',0,'2019-03-18 20:32:49',NULL,14,0,NULL,'24d15326645ee18bea57b4422060dfea.jpg'),(99,'commm','ssd',128.0000,'2019-03-18 15:32:51',0,'2019-03-18 20:32:51',NULL,14,1,NULL,'86430d62f55cc7a5550c8645de537622.jpg'),(100,'commm','ssd',128.0000,'2019-03-18 15:32:51',0,'2019-03-18 20:32:51',NULL,14,0,NULL,'1c584197bf1667f991258a03eadb65cc.jpg'),(101,'tu','dyk',157.0000,'2019-03-20 11:27:48',1,'2019-03-20 16:27:48',NULL,14,0,NULL,NULL),(102,'tu','dyk',157.0000,'2019-03-20 11:27:48',1,'2019-03-20 16:27:48',NULL,14,0,NULL,NULL),(103,'Cutacho + Huevo frito + Café','.',7.5000,'2019-03-22 17:34:30',1,'2019-03-22 22:34:30',NULL,26,1,NULL,NULL),(104,'Cutacho+Huevo duro+Cafe','.',7.5000,'2019-03-22 17:37:08',1,'2019-03-22 22:37:08',NULL,26,0,NULL,NULL),(105,'Cutacho + Huevo duro + Café','.',0.0000,'2019-03-22 17:38:19',1,'2019-03-22 22:38:19',NULL,26,0,NULL,NULL),(106,'Ponche','Al estilo Juanito',6.0000,'2019-03-22 17:42:17',1,'2019-03-22 22:42:17',NULL,26,1,NULL,NULL),(107,'Ponche Fuerte','Con un toque de alcohol',7.5000,'2019-03-22 17:42:52',1,'2019-03-22 22:42:52',NULL,26,1,NULL,NULL),(108,'Ponche + Mazato','Con Mazato',7.0000,'2019-03-22 17:43:16',1,'2019-03-22 22:43:16',NULL,26,1,NULL,NULL),(109,'Ponche + Café','Con Café',7.0000,'2019-03-22 17:43:35',1,'2019-03-22 22:43:35',NULL,26,1,NULL,NULL),(110,'Upe','.',6.0000,'2019-03-22 17:44:11',1,'2019-03-22 22:44:11',NULL,26,1,NULL,NULL),(111,'Shibe','De yuca',3.0000,'2019-03-22 17:44:27',1,'2019-03-22 22:44:27',NULL,26,1,NULL,NULL),(112,'Keke de naranja','.',3.0000,'2019-03-22 17:45:18',1,'2019-03-22 22:45:18',NULL,26,1,NULL,NULL),(113,'Sandwich de Pollo','.',7.0000,'2019-03-22 17:48:30',1,'2019-03-22 22:48:30',NULL,26,1,NULL,NULL),(114,'Sandwich Mixto','Con jamon y queso',7.0000,'2019-03-22 17:48:47',1,'2019-03-22 22:48:47',NULL,26,1,NULL,NULL),(115,'Sándwich mixto + Huevo','.',7.0000,'2019-03-22 17:49:04',1,'2019-03-22 22:49:04',NULL,26,0,NULL,NULL),(116,'Omelet con tostadas','.',7.0000,'2019-03-22 17:49:40',1,'2019-03-22 22:49:40',NULL,26,1,NULL,NULL),(117,'Omelet con verduras','.',7.5000,'2019-03-22 17:49:55',1,'2019-03-22 22:49:55',NULL,26,0,NULL,NULL),(118,'Cutacho + Huevo duro + Café',NULL,7.5000,'2019-03-22 17:55:22',1,'2019-03-22 22:55:22',NULL,26,1,NULL,NULL),(119,'Omelet con verduras','.',8.0000,'2019-03-22 17:57:52',1,'2019-03-22 22:57:52',NULL,26,1,NULL,NULL),(120,'Café de Olla','.',3.0000,'2019-03-22 17:58:10',1,'2019-03-22 22:58:10',NULL,26,1,NULL,NULL),(121,'Jugo surtido','.',3.5000,'2019-03-22 17:58:45',1,'2019-03-22 22:58:45',NULL,26,1,NULL,NULL),(122,'Jugo de naranja','.',5.0000,'2019-03-22 17:58:58',1,'2019-03-22 22:58:58',NULL,26,1,NULL,NULL),(123,'Jugo de papaya','.',4.0000,'2019-03-22 17:59:09',1,'2019-03-22 22:59:09',NULL,26,1,NULL,NULL),(124,'Pastel de espinaca','.',6.0000,'2019-03-22 17:59:36',1,'2019-03-22 22:59:36',NULL,26,1,NULL,NULL),(125,'Pastel de manzana','.',6.0000,'2019-03-22 17:59:50',1,'2019-03-22 22:59:50',NULL,26,1,NULL,NULL),(126,'Pescado frito','.',15.0000,'2019-03-22 18:01:18',1,'2019-03-22 23:01:18',NULL,26,0,NULL,NULL),(127,'Lasaña','Incluye pan de ajo artesanal',20.0000,'2019-03-22 18:01:38',1,'2019-03-22 23:01:38',NULL,26,1,NULL,NULL),(128,'Tacu Tacu montado','.',12.0000,'2019-03-22 18:02:18',1,'2019-03-22 23:02:18',NULL,26,1,NULL,NULL),(129,'Torrejas de fideos','.',10.0000,'2019-03-22 18:02:39',1,'2019-03-22 23:02:39',NULL,26,1,NULL,NULL),(130,'Pescado frito','.',15.0000,'2019-03-23 17:09:11',1,'2019-03-23 22:09:11',NULL,26,1,NULL,NULL),(131,'Sandwich mixto + Huevo','.',7.0000,'2019-03-23 17:13:24',1,'2019-03-23 22:13:24',NULL,26,1,NULL,NULL),(132,'Relleno con platano frito','.',12.0000,'2019-03-23 17:17:25',1,'2019-03-23 22:17:25',NULL,26,1,NULL,NULL),(133,'Puraruca','A base de maní y maduro',3.0000,'2019-03-23 17:43:58',1,'2019-03-23 22:43:58',NULL,26,1,NULL,NULL),(134,'Hamburguesa Clásica','Con lechuga, tomates, papas al hilo y cremas.',10.0000,'2019-03-27 10:08:23',1,'2019-03-27 15:08:23',NULL,25,0,NULL,NULL),(135,'Hamburguesa Royal','Con lechuga, tomates, huevo, papas al hilo y cremas.',11.0000,'2019-03-27 10:08:41',1,'2019-03-27 15:08:41',NULL,25,0,NULL,NULL),(136,'Hamburguesa Cheese','Con lechuga, tomate, queso, papas al hilo y cremas.',11.0000,'2019-03-27 10:09:07',1,'2019-03-27 15:09:07',NULL,25,0,NULL,NULL),(137,'Hamburguesa Hawaiana','Con lechuga, tomate, piña golden, papas al hilo y cremas.',12.0000,'2019-03-27 10:09:29',1,'2019-03-27 15:09:29',NULL,25,1,NULL,NULL),(138,'Hamburguesa Completa','Con lechuga, tomate, huevo, jamon, queso, papas al hilo y cremas.',13.0000,'2019-03-27 10:09:49',1,'2019-03-27 15:09:49',NULL,25,1,NULL,NULL),(139,'Ensalada de frutas','Ensalada de frutas con yogur Probiotico, granola y miel abejas.',10.0000,'2019-04-29 18:54:18',1,'2019-04-29 23:54:18',NULL,25,0,NULL,NULL),(140,'Ensalada de frutas','Ensalada de frutas con yogur Probiotico, granola y miel abejas.O% azucar 0% colesterol.',10.0000,'2019-04-29 18:56:57',1,'2019-04-29 23:56:57',NULL,25,1,NULL,NULL),(141,'Super LUIGI\'S clásica','Super LUIGI\'S clásica estilo americana con tocino queso Bonle y huevo si desea el cliente',10.0000,'2019-04-29 19:08:10',1,'2019-04-30 00:08:10',NULL,25,1,NULL,NULL),(142,'Hamburguesa Clasica','Con tomate, lechuga y papas al hilo',10.0000,'2019-04-29 19:09:45',1,'2019-04-30 00:09:45',NULL,25,1,NULL,NULL),(143,'Hamburguesa Cheese','Con lechuga, tomate, queso, papas al hilo y cremas.',12.0000,'2019-04-29 19:13:17',1,'2019-04-30 00:13:17',NULL,25,1,NULL,NULL),(144,'Hamburguesa Royal','Con lechuga, tomates, huevo, papas al hilo y cremas.',12.0000,'2019-04-29 19:14:10',1,'2019-04-30 00:14:10',NULL,25,1,NULL,NULL),(145,'Hamburguesa Artesanal al plato','Con Papas fritas y cremas',14.0000,'2019-04-29 19:19:14',1,'2019-04-30 00:19:14',NULL,25,1,NULL,NULL),(146,'Broster','Con Papas fritas y ensalada.',10.0000,'2019-04-29 19:22:58',1,'2019-04-30 00:22:58',NULL,25,0,NULL,NULL),(147,'Broster','Con Papas fritas y ensalada.',12.0000,'2019-04-29 19:24:09',1,'2019-04-30 00:24:09',NULL,25,1,NULL,NULL),(148,'Salchipapa','Con cremas',10.0000,'2019-04-29 19:27:01',1,'2019-04-30 00:27:01',NULL,25,1,NULL,NULL),(149,'Sandwich de Pollo','Con cremas',9.0000,'2019-04-29 19:31:28',1,'2019-04-30 00:31:28',NULL,25,1,NULL,NULL),(150,'Hamburguesa Artesanal Royal','Con papas y ensalada',15.0000,'2019-04-29 19:33:12',1,'2019-04-30 00:33:12',NULL,25,1,NULL,NULL),(151,'Jugo de piña','.',7.0000,'2019-04-29 19:37:40',1,'2019-04-30 00:37:40',NULL,25,1,NULL,NULL),(152,'Broster con patacones','Con patacones y ensalada',13.0000,'2019-04-29 19:42:03',1,'2019-04-30 00:42:03',NULL,25,1,NULL,NULL),(153,'Pollo a la brasa con papas fritas','Con papas y ensalada',16.0000,'2019-04-29 19:46:26',1,'2019-04-30 00:46:26',NULL,25,1,NULL,NULL),(154,'Pollo a la brasa con patacones','Con patacones y ensalada',17.0000,'2019-04-29 19:50:05',1,'2019-04-30 00:50:05',NULL,25,1,NULL,NULL),(155,'Jugo de maracuya','Natural',6.0000,'2019-04-29 20:05:17',1,'2019-04-30 01:05:17',NULL,25,1,NULL,NULL),(156,'Jugo de uva','Natural',7.0000,'2019-04-29 20:05:46',1,'2019-04-30 01:05:46',NULL,25,0,NULL,NULL),(157,'Aguajina','.',6.0000,'2019-04-29 20:20:34',1,'2019-04-30 01:20:34',NULL,25,1,NULL,NULL),(158,'Jugo de taperiba','.',6.0000,'2019-04-29 20:20:48',1,'2019-04-30 01:20:48',NULL,25,1,NULL,NULL),(159,'Chicha morada 1 litro','.',12.0000,'2019-04-29 20:25:35',1,'2019-04-30 01:25:35',NULL,25,1,NULL,NULL),(160,'Jugo de uva','Natural',8.0000,'2019-04-29 20:33:10',1,'2019-04-30 01:33:10',NULL,25,1,NULL,NULL),(161,'Jugo de Naranja','.',6.0000,'2019-04-29 20:57:12',1,'2019-04-30 01:57:12',NULL,25,1,NULL,NULL),(162,'Jugo de melón','.',7.0000,'2019-04-29 20:57:26',1,'2019-04-30 01:57:26',NULL,25,1,NULL,NULL),(163,'Jugo de mango','.',7.0000,'2019-04-29 20:57:42',1,'2019-04-30 01:57:42',NULL,25,1,NULL,NULL),(164,'erp','ful customizable',300.0000,'2019-05-21 14:20:19',1,'2019-05-21 19:20:19','2019-05-31 19:20:19',29,1,NULL,NULL),(165,'Salchi Broster','Salchicha y pollo broster',13.0000,'2019-06-13 12:27:36',1,'2019-06-13 17:27:36',NULL,25,1,NULL,NULL);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_detalle`
--

DROP TABLE IF EXISTS `producto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_detalle` (
  `producto_detalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_almacen_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `producto_detalle_cantidad` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`producto_detalle_id`),
  KEY `fk_producto_detalle_producto1_idx` (`producto_id`),
  KEY `fk_producto_detalle_item_almacen1_idx` (`item_almacen_id`),
  CONSTRAINT `fk_producto_detalle_item_almacen1` FOREIGN KEY (`item_almacen_id`) REFERENCES `item_almacen` (`item_almacen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_detalle`
--

LOCK TABLES `producto_detalle` WRITE;
/*!40000 ALTER TABLE `producto_detalle` DISABLE KEYS */;
INSERT INTO `producto_detalle` VALUES (1,2,4,'1'),(2,3,4,'1'),(3,4,4,'1'),(4,5,4,'1'),(5,6,4,'1'),(6,7,4,'1'),(7,2,5,'1'),(8,3,5,'1'),(9,4,5,'1'),(10,5,5,'1'),(11,6,5,'1'),(12,7,5,'1'),(13,2,6,'1'),(14,3,6,'1'),(15,4,6,'1'),(16,5,6,'1'),(17,6,6,'1'),(18,7,6,'1'),(19,55,7,'1'),(20,55,8,'1'),(21,55,9,'1'),(22,56,10,'1'),(23,56,11,'1'),(24,53,12,'1'),(25,54,12,'1'),(26,55,12,'1'),(27,57,12,'1'),(28,57,13,'1'),(29,53,14,'1'),(30,55,15,'1'),(31,54,16,'1'),(32,54,17,'1'),(33,53,18,'1'),(34,54,18,'1'),(35,55,18,'1'),(36,57,18,'1'),(37,55,19,'1'),(38,57,19,'1'),(39,56,20,'1'),(40,46,21,'1'),(41,53,21,'1'),(42,54,21,'1'),(43,55,21,'1'),(44,56,21,'1'),(45,57,21,'1'),(46,53,22,'1'),(47,58,23,'1'),(48,52,24,'1'),(49,13,25,'1'),(50,51,25,'1'),(51,52,25,'1'),(52,51,26,'1'),(53,13,27,'1'),(54,52,27,'1'),(55,51,28,'1'),(56,52,28,'1'),(57,59,29,'1'),(58,60,30,'1'),(59,60,31,'1'),(60,61,32,'1'),(61,61,33,'1'),(62,62,34,'1'),(63,61,35,'1'),(64,62,35,'1'),(65,61,36,'1'),(66,62,36,'1'),(67,63,36,'1'),(68,66,39,'1'),(69,70,40,'1'),(70,71,41,'1'),(71,72,42,'1'),(72,73,43,'1'),(73,74,43,'1'),(74,65,44,'1'),(75,76,45,'1'),(76,51,46,'1'),(77,77,47,'1'),(78,78,47,'1'),(79,79,47,'1'),(80,85,47,'1'),(81,77,48,'1'),(82,78,49,'1'),(83,79,50,'1'),(84,80,51,'1'),(85,81,52,'1'),(86,84,53,'1'),(87,85,54,'1'),(88,86,55,'1'),(89,87,56,'1'),(90,88,57,'1'),(91,87,58,'1'),(92,90,59,'1'),(93,91,60,'1'),(94,92,61,'1'),(95,93,62,'1'),(96,94,63,'1'),(97,95,64,'1'),(98,89,65,'1'),(99,96,66,'1'),(100,97,67,'1'),(101,99,68,'1'),(102,100,69,'1'),(103,101,70,'1'),(104,102,71,'1'),(105,104,72,'1'),(106,104,73,'1'),(107,103,74,'1'),(108,102,75,'1'),(109,103,75,'1'),(110,105,76,'1'),(111,106,77,'1'),(112,107,78,'1'),(113,108,79,'1'),(114,109,80,'1'),(115,110,81,'1'),(116,111,82,'1'),(117,112,83,'1'),(118,110,84,'1'),(119,111,85,'1'),(120,112,86,'1'),(121,111,87,'1'),(122,112,88,'1'),(123,88,89,'1'),(124,71,90,'1'),(125,111,91,'1'),(126,106,92,'1'),(127,111,92,'1'),(128,97,93,'1'),(129,106,93,'1'),(130,71,94,'1'),(131,72,94,'1'),(132,88,94,'1'),(133,71,95,'1'),(134,72,95,'1'),(135,88,95,'1'),(136,52,96,'1'),(137,71,96,'1'),(138,72,96,'1'),(139,88,96,'1'),(140,52,97,'1'),(141,70,97,'1'),(142,72,97,'1'),(143,52,98,'1'),(144,70,98,'1'),(145,71,98,'1'),(146,52,99,'1'),(147,52,100,'1'),(148,70,99,'1'),(149,70,100,'1'),(150,71,99,'1'),(151,71,100,'1'),(152,52,101,'1'),(153,52,102,'1'),(154,70,101,'1'),(155,70,102,'1'),(156,71,101,'1'),(157,71,102,'1'),(158,72,101,'1'),(159,72,102,'1'),(160,121,103,'1'),(161,123,103,'1'),(162,125,103,'1'),(163,121,104,'1'),(164,124,104,'1'),(165,125,104,'1'),(166,121,105,'1'),(167,124,105,'1'),(168,125,105,'1'),(169,113,106,'1'),(170,114,107,'1'),(171,115,108,'1'),(172,116,109,'1'),(173,118,110,'1'),(174,117,111,'1'),(175,119,112,'1'),(176,126,113,'1'),(177,127,114,'1'),(178,138,115,'1'),(179,128,116,'1'),(180,129,117,'1'),(181,121,118,'1'),(182,124,118,'1'),(183,125,118,'1'),(184,129,119,'1'),(185,125,120,'1'),(186,132,121,'1'),(187,130,122,'1'),(188,131,123,'1'),(189,133,124,'1'),(190,134,125,'1'),(191,135,126,'1'),(192,100,127,'1'),(193,136,128,'1'),(194,137,129,'1'),(195,135,130,'1'),(196,139,131,'1'),(197,140,132,'1'),(198,141,133,'1'),(199,105,134,'1'),(200,106,135,'1'),(201,107,136,'1'),(202,108,137,'1'),(203,109,138,'1'),(204,97,139,'1'),(205,97,140,'1'),(206,105,141,'1'),(207,142,142,'1'),(208,107,143,'1'),(209,106,144,'1'),(210,143,145,'1'),(211,144,146,'1'),(212,144,147,'1'),(213,146,148,'1'),(214,147,149,'1'),(215,148,150,'1'),(216,149,151,'1'),(217,150,152,'1'),(218,151,153,'1'),(219,152,154,'1'),(220,111,155,'1'),(221,112,156,'1'),(222,153,157,'1'),(223,154,158,'1'),(224,155,159,'1'),(225,112,160,'1'),(226,156,161,'1'),(227,157,162,'1'),(228,158,163,'1'),(229,159,164,'1'),(230,160,165,'1');
/*!40000 ALTER TABLE `producto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_terceros`
--

DROP TABLE IF EXISTS `productos_terceros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_terceros` (
  `productos_terceros_id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `freeler_id` int(11) NOT NULL,
  PRIMARY KEY (`productos_terceros_id`),
  KEY `fk_productos_terceros_producto1_idx` (`producto_id`),
  KEY `fk_productos_terceros_freeler1_idx` (`freeler_id`),
  CONSTRAINT `fk_productos_terceros_freeler1` FOREIGN KEY (`freeler_id`) REFERENCES `freeler` (`freeler_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_terceros_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Da acceso especial a un Freeler para acceder a productos que otras empresas han creado y ofrecerlos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_terceros`
--

LOCK TABLES `productos_terceros` WRITE;
/*!40000 ALTER TABLE `productos_terceros` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_terceros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token_numero` varchar(250) NOT NULL,
  `token_codigo_sms` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `token_fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (79,'991653073','641166','994da8bfe0ffa7ca04d44da0969aa9db','2018-09-25 23:12:08'),(80,'991653073','672059','2db1e71ebfc864f46df65aa50cc8eda3','2018-09-25 23:51:24'),(81,'991653073','428261','985c8103421df5e47506fa7299adc6d3','2018-09-26 00:27:46'),(82,'991653073','878612','e59aed0f25050a3023a0d75b564f074d','2018-09-26 00:30:55'),(83,'991653073','663995','d5914c43a6cff51f3a86f5b7f60d5f20','2018-09-26 00:36:53'),(84,'991653073','729825','0b2d9fb9fc64f464d6f8068ac6e9ba5c','2018-09-26 00:42:26'),(85,'991653073','822271','0c70690bfa1ec63ce37aab67a92f1d6b','2018-09-26 00:43:21'),(86,'991653073','891379','8f229879c08e8ccde5835f0775160ecf','2018-09-26 00:44:24'),(87,'991653073','105436','949c2e2009d0810245b14e3d419d7610','2018-09-26 00:46:17'),(88,'991653073','171369','1849ea21a8324f62bd7df3086ce7323d','2018-09-26 00:47:08'),(89,'991653073','668621','8fe1215698e8e830c8afbd4625e447e1','2018-09-26 00:50:10'),(90,'991653073','900311','3af7a627bba66e59f933bfb2ce4d13bf','2018-09-26 03:59:45'),(91,'991653073','657631','c1b5a141c3d2e1c7b5e0ec15373626c2','2018-09-26 04:20:38'),(92,'991653073','763288','481d1d94bffbf6e9a594d47bf02347aa','2018-09-26 04:21:33'),(93,'991653073','908646','0a7d6faf00b3583e9eedc3e855defbf8','2018-09-26 04:23:37'),(94,'991653073','697975','9af4b5f7f01e4055174f65fa692daf42','2018-09-26 05:46:54'),(95,'991653073','145618','9fd1b45e4940d33b91d580e5acf1c103','2018-09-26 20:29:38'),(96,'991653073','101856','807f8b967b076d2382c685526a2f9200','2018-09-26 22:48:40'),(97,'991653073','705482','c498d9cbdb33a1b78af1b30254803d47','2018-09-26 23:03:15'),(98,'991653073','473363','13c2bb9a7a9753af7a1cacf000f899c5','2018-09-26 23:04:40'),(99,'991653073','824640','4edc1abf08bc9829586ec664f3bfb845','2018-09-26 23:22:19'),(100,'991653073','436339','48dc64f59730646ae891a905605fa4ce','2018-09-26 23:32:19'),(101,'991653073','772508','e7bf4b6ade6e173fa8eeeef30ec8cf68','2018-09-26 23:37:43'),(102,'991653073','936931','21afb5a5a0d6b9f17a2dd731ba093915','2018-09-27 00:17:25'),(103,'991653073','577669','f8216c175576a5fafbfd4a2e30f06759','2018-09-27 03:47:45'),(104,'991653073','217038','40060a2eec75b81b133ad41c0b4a5f4f','2018-09-27 05:19:26'),(105,'991653073','603278','38c9983380ae45f27a62a99dc9f78a0d','2018-09-27 05:27:43'),(106,'991653073','358926','1bd787096b64406b2ee403dffbc29130','2018-09-27 05:46:06'),(107,'991653073','915012','87dbf2e1790d4318686dcf40446a92de','2018-09-27 05:49:02'),(108,'991653073','584913','f0b0b338cdace72931c9926b9f57a64e','2018-09-27 05:55:02'),(109,'991653073','891354','960746cc70d56a8c650876d11ac93717','2018-09-27 06:06:48'),(110,'991653073','376972','27a1728db560ff90d9ced296ec50b2cd','2018-09-27 06:17:52'),(111,'991653073','538353','a36eed5f507db77b501342c1503ec4d0','2018-09-27 06:29:29'),(112,'991653073','332119','a7bd225322be2a7375d3ef56dda3cd46','2018-09-27 19:57:53'),(113,'986315624','321367','089cbaaaec4dfda7de341bd95f9ac9c6','2018-09-27 20:40:12'),(114,'991653073','888671','5bc865c18ab08d12d00a6f561ed346a6','2018-09-27 20:42:00'),(115,'986315624','675707','d47e7a438777620fbba4afdcc170c8d8','2018-09-27 20:42:50'),(116,'988547340','782529','96a93ecdf3bd3ba282bb09dd9ab5e4b1','2018-09-28 02:34:47'),(117,'991653073','263066','d75f2ff77e09a8dd37b873b871941674','2018-09-28 02:38:13'),(118,'991653073','520376','0c8841be8a2ab7a51482a498fa7b756e','2018-09-29 16:02:29'),(119,'991653073','577787','fb400328a4d37a4b2f70b9d180b9fe20','2018-10-18 19:47:40'),(120,'991653073','698186','b9e9f8afcb6efc27ef96179680d02a6d','2018-10-18 19:47:40'),(121,'991653073','614818','355e53c0d0aa1c9d26d99eb98629744a','2018-10-18 19:47:40'),(122,'991653073','384381','b32f6c37cf78488cad406017c2eb388a','2018-10-18 19:59:13'),(123,'991653073','169542','27e298be4894be94279004cadc027566','2018-10-18 20:08:28'),(124,'991653073','536989','2d578603f4c8537c711310b7d5f6e817','2018-10-18 20:22:59'),(125,'965602803','228528','10e346f963159de48820af98cb787211','2018-10-19 02:32:56'),(126,'965602803','480307','6f0696f2147a078539f176e4f203d963','2018-10-19 02:32:56'),(127,'988547340','192816','2e6ec61cc12e8d0140edcd0219ae01be','2018-10-20 22:45:02'),(128,'993834950','704124','a2d9bfb8f7c3197d9fba7ad30ba4a82e','2018-11-07 03:46:24'),(129,'965602803','964296','5b16e1ab8613ca97a003d3c8986c1c0f','2018-11-07 15:27:04'),(130,'965602803','246091','c200e7537d4e5936243feb2abc27994d','2018-11-07 15:27:04'),(131,'965602803','814351','e2af69db00e3e70409cfcd58fdbe5081','2018-11-07 15:27:04'),(132,'965602803','892366','d913bcb52bb6599146e58dfd72a56401','2018-11-07 15:27:04'),(133,'965602803','523577','4f148abe68b6bedc9c63d449308943ab','2018-11-07 15:31:12'),(134,'991653073','171327','f5d893f8119a4dd8f2604dc40f43b24c','2018-11-07 15:33:14'),(135,'991653073','151962','950ff9a68d9903a4a1b5563b554400ef','2018-11-07 15:35:04'),(136,'991653073','169207','0895b1baa9c520cfc264edd064fdb778','2018-11-07 16:44:50'),(137,'988547340','745092','05e9a5b7eb7eb157dce1555d8a734422','2018-11-08 02:35:05'),(138,'991653073','790426','5de42eb35f426859f15cb5bd610b847a','2018-11-09 19:38:21'),(139,'993834950','920155','bd81cd9e6fffbcf7d43afe730dc3092b','2018-11-09 19:39:34'),(140,'988547340','555028','1b5d7abebff41b366ec108178ec592d9','2018-11-09 20:12:58'),(141,'991653073','880193','efc58f8b6b7def30723de3131a568524','2018-11-09 20:40:16'),(142,'990152535','117600','5e43739ffd8e4395c2f0dddea16bf90b','2018-11-09 21:49:40'),(143,'990152535','324973','41d8b24ba8498348a0733ec7e9bd06fa','2018-11-09 21:50:18'),(144,'990152535','253533','aa57d0529b5d8a5a3cf59eff34a32a7f','2018-11-09 21:50:52'),(145,'990152535','546686','16dd10b93c31cfc1c1897e256d37618f','2018-11-09 23:11:22'),(146,'991653073','481408','8ad44585bb48e473ab324fad59af7a28','2018-11-10 01:48:52'),(147,'987654321','685545','d30d50b790bddf6ce2bd03b014d8aace','2018-11-10 01:51:59'),(148,'991653073','260586','c85fd50ea5898b78f6d18ba2e9a8e55a','2018-11-10 01:52:38'),(149,'965602803','144107','2b4114297c0371f379338c54b6edfacf','2018-11-11 02:21:22'),(150,'965602803','674112','25ec48768b6e530ab7e0dc09fd5960e5','2018-11-11 02:21:22'),(151,'965602803','254230','16163537c9d1b0c45b17b42ecf50b879','2018-11-11 02:21:23'),(152,'991 653 073','945574','d62c55f461e8beefc4903aa66497c480','2018-11-11 02:33:32'),(153,'991 653 073','492395','b5235b2ac9351bd1d1ff1baef37b8440','2018-11-11 02:34:53'),(154,'991 653 073','695711','7aaf264677cfd0a7cd50431787de0f55','2018-11-11 02:43:21'),(155,'991653073','631657','a5a20893f8acbd2ed916776ca3c8cea7','2018-11-11 02:44:08'),(156,'991653073','420732','e31d631776d678e782f60bbe500a58da','2018-11-11 02:46:16'),(157,'991653073','540183','5719a4f40a44aa43805ca2d75b4bfb0e','2018-11-11 02:48:19'),(158,'990152535','983035','6ef44e3f0dcdc996524a0fc38d7d4a06','2018-11-14 13:50:02'),(159,'990152535','981270','59bcb350319228dcddeb3d2820abfa00','2018-11-14 13:50:16'),(160,'11','197250','f6c315e9e11ced43646ecfbe2d36fb6e','2018-11-14 13:55:17'),(161,'4555','351992','ee749554e0940703551d237d9c369b2d','2018-11-14 13:55:43'),(162,'4555','758849','aa63e8774d1ca852b86656627a10ec3f','2018-11-14 13:56:30'),(163,'1454','260909','14c16aa9001793b7c172947074fa058e','2018-11-14 13:57:48'),(164,'4455','209574','2e18fafeb29ace162b75196b16dd35c7','2018-11-14 14:01:09'),(165,'5445','977376','530f5967bf4601d7b10b58c26fdf4255','2018-11-14 14:01:59'),(166,'5285','225265','7e9f72a5a58b685c17104f50fbff3622','2018-11-14 14:02:43'),(167,'685545','988261','6e790b4a1d9605c2b0705d8a4af49723','2018-11-14 14:02:46'),(168,'5555','973497','9600eeb3c5e55691b072cc19a406213c','2018-11-14 14:03:39'),(169,'455','303976','21deff1520315935c407d8c984b567d2','2018-11-14 14:05:46'),(170,'888','318884','29ba546bdcd00a20fdab68142f97626f','2018-11-14 14:08:04'),(171,'54','756585','349443517697ff9d3e0cfc05f0933547','2018-11-14 14:08:26'),(172,' ','824020','00dad82b64d88e55768671f48e1592d7','2018-11-14 14:12:47'),(173,'25','661616','cb6f8bc99297605351f72b105f5f2457','2018-11-14 20:08:24'),(174,'555555555','338073','c55961ba83e93eb0cf5069d0f6565bb1','2018-11-14 21:20:39'),(175,'2222','960751','c3f9323021bbbfeec1b3809f4af36deb','2018-11-14 21:21:55'),(176,'55544','425595','7f8def2975ff4f4625417dbb104e064d','2018-11-14 21:22:16'),(177,'155','697822','6e6ddd77c27fc92be7eaa6fd944a33d1','2018-11-14 21:24:39'),(178,'2144','306631','fc3f440ef8dc9710c2451954b70949a5','2018-11-14 21:24:48'),(179,'55222','151790','453cb698e5ebebe2299071b2efba5351','2018-11-14 21:31:11'),(180,'991653073','285847','68575420af9faed7820229cd6a88c17b','2018-11-14 21:43:08'),(181,'999666333','411159','7551aff8cd4359cf8820f0c224928bd3','2018-11-15 01:01:57'),(182,'999666333','499514','fa8c512095d50c41bbd1bacc5654d171','2018-11-15 01:08:21'),(183,'999666333','619229','efeb35868b56a391f2c96bb6e3ac8a17','2018-11-15 01:12:29'),(184,'999666333','322863','931df776ae6c52d45e00779c0797847d','2018-11-15 01:24:17'),(185,'999666333','343350','817c05a93d185ade728005cbee05c8ef','2018-11-15 01:26:05'),(186,'999666333','828127','1231bebdcc5f7137e4fcb3a76bad4c14','2018-11-15 01:30:09'),(187,'999666333','169525','0708fe068a60a2548e572969dc19f836','2018-11-15 01:32:08'),(188,'999666333','670112','1f070a57d75b673135ec02c50bafc691','2018-11-15 01:36:53'),(189,'999666333','868346','4e90f52fb7b198a10022a10c338a3e30','2018-11-15 01:40:17'),(190,'999666333','488186','7e8efeba8fa8dceb41655196ff2bc94e','2018-11-15 01:42:41'),(191,'999666333','170926','089b1756d7e12ef98d83d28796dc8446','2018-11-15 01:51:43'),(192,'999666333','235405','2139fbc1173676079e5e9c62ff532cbe','2018-11-15 02:00:46'),(193,'991653073','595429','f7ac5fda99bbaf4e356efca4b899a382','2018-11-16 16:30:11'),(194,'988547340','766231','808785f89024a1305ff1a0b9282d827c','2018-11-16 20:30:14'),(195,'991653073','831738','6866153b22e1ff630cb4d6d3d08066e1','2018-11-17 02:02:38'),(196,'999666333','744856','2c2134c683d9349b424f0771a90e4537','2018-11-19 21:32:50'),(197,'991653073','935017','e76af043f43d5319547bf282b2f1a5b5','2018-11-19 21:41:14'),(198,'999666333','642304','fc243e315cbdb96967586e950de4badf','2018-11-19 21:42:03'),(199,'789456123','964571','c4c3510549a21eb9526be4ae50a11baa','2018-11-20 02:17:37'),(200,'999666333','613409','15a82b234b824efd386a998dde3b918f','2018-11-20 02:31:26'),(201,'415273869','743155','c0c994abec9bfc3937070d63ec3a1d84','2018-11-20 02:35:53'),(202,'415273869','357119','94a9595a17c2bf826581f0e1adb8d614','2018-11-20 02:40:59'),(203,'72456318864','174097','a2a2c4039043f9a6c9aab09916cb00ee','2018-11-20 02:43:23'),(204,'991653073','777862','4f2eb69317326094a24efaeb33f7d504','2018-11-20 02:58:33'),(205,'999666333','262506','f25df457194a4e462b98be180b3f48b1','2018-11-22 00:44:04'),(206,'999666333','626431','6cb06f4d092634f7751f616780345cc6','2018-11-22 00:55:11'),(207,'988547340','579670','9d7f225a587cdb628788aa5d3f38c603','2018-11-22 13:04:20'),(208,'991653073','105028','462403c50e2c44a5b4e72ed942d9c68c','2018-11-24 00:30:38'),(209,'991653073','420246','111ef439934a19d2785ce0d1d43e219b','2018-11-24 01:16:16'),(210,'991653073','220328','a40b98122cee8cee4a6d87ef05721ea6','2018-11-24 01:16:18'),(211,'991653073','845003','a6e5fbb6e94437bb7b24966bf01f890a','2018-11-24 01:16:46'),(212,'991653073','586588','3c38a99e05dcf90816c6a282855062d0','2018-11-24 01:18:03'),(213,'999666333','271140','c058c1e8b06ebb0a9f43292c3f82d9c6','2018-11-24 01:18:25'),(214,'991653073','177011','f650fd8efcf528599a6016f78d482af5','2018-11-27 01:22:51'),(215,'994258679','295665','3109874e8fbc0f32da82fa118789893c','2018-11-27 01:24:29'),(216,'991653073','996883','13bb52e00a47cc7154ecc16fd46e9054','2018-11-27 01:32:32'),(217,'965602803','400422','01261fc3369d4010141ca3fcc62fedd2','2018-11-28 03:18:15'),(218,'999111222','927456','6aa8147e99a4fa280d32ef3a1905490e','2018-11-28 04:38:13'),(219,'988547340','251749','11c5e278864b6d048517b989602e35f6','2018-11-29 01:23:16'),(220,'988547340','950912','16e2e22f00b4cf9b018ffc7c1531cd2b','2018-11-29 01:28:59'),(221,'965602803','789016','1a77001ea4f16038e8d35b02006373c9','2018-11-29 19:05:26'),(222,'965602803','840865','cae335b80236f1c20b2a713370df0011','2018-11-29 19:10:09'),(223,'965602803','750635','2fe50bef9795f77990158ef2cf9efbcd','2018-12-07 22:01:07'),(224,'965602803','610206','3df7e65835fef74e678a472dddeae27d','2018-12-07 22:07:05'),(225,'965602803','843586','bcf6d864485a608ada47e9fb67003638','2018-12-07 22:07:31'),(226,'965602803','348262','be120f6f43bdbe24b00dcd782157a1b7','2018-12-11 19:49:39'),(227,'926724653','104813','71c3c7cf9c5d34359c87a572fdd72717','2018-12-12 15:32:00'),(228,'965602803','461246','2c682da89a6748808057bf5b05dc1e07','2018-12-14 14:50:59'),(229,'999666333','231729','b6ec48ae24f8c1db3da7acd7ef732f4d','2018-12-14 15:28:58'),(230,'926724653','342547','69669ca27e12d50bff74449ecc2c8ac5','2018-12-14 15:35:39'),(231,'999666333','582476','1a25b3a21e5ced91ba6be397bd49f7ae','2018-12-19 18:24:38'),(232,'965602803','852826','ed592d1ffeb6e8e8993ea91708d1c1c0','2018-12-21 18:27:10'),(233,'965602803','369340','db4520a9d7c095a0e3380fb513b15fcd','2018-12-21 19:06:23'),(234,'965602803','799245','63d25a9ede453668effa73ed1fe71d82','2018-12-21 19:07:09'),(235,'991653073','531402','a141f454bd86b3a256067d4bad1f9910','2018-12-21 22:50:48'),(236,'965602803','729735','f27057b9e29c457b208e2802e1e3081d','2018-12-21 23:37:44'),(237,'991653073','768769','289824d6ab3b5ad351957e02052af943','2018-12-25 22:59:16'),(238,'991653073','971724','66ecd66d7d2f33de27e4e019a73cc59f','2018-12-25 23:00:27'),(239,'926724653','630307','6df8b1975d910e14104a619624ec8038','2018-12-26 18:07:52'),(240,'965602803','902923','ffed566578f5643e9aa5377e453f55e2','2018-12-26 18:11:12'),(241,'965602803','987917','db3b0954f6a43c1a16813bc4f1341f75','2018-12-26 18:13:42'),(242,'965602803','308881','a137d9580e5a0982870c9f672da46046','2018-12-26 18:37:15'),(243,'926724653','745680','c79d344008226f8510ef9d336144c58d','2018-12-26 18:38:26'),(244,'926724653','605290','5616a734294a3527d0cc442e47fd35d7','2018-12-26 18:40:42'),(245,'965602803','759962','da33a96561ef8fbd2322a9f1127edbb7','2018-12-29 16:05:48'),(246,'965602803','990481','736f6eadf54ed98e9fa1cb0a5d494aa6','2018-12-29 16:07:51'),(247,'965602803','156050','9899ba640e99fb2e83705274a38fe07b','2018-12-29 18:06:57'),(248,'926724653','889056','1e4c87cca7a6c8e6dbc2eef30efa7347','2019-01-02 14:21:27'),(249,'926724653','434658','b04ac7807399dd5452294d49e7806793','2019-01-02 14:24:29'),(250,'999666333','471790','f564e05fa27d985bee6e1e531cdd3f05','2019-01-07 05:22:15'),(251,'926724653','319710','12b3aef9a8445e6b85d6029f33dcd289','2019-01-07 14:44:35'),(252,'926724653','295459','7d74a479ed921c69cc602e2961cd70b8','2019-01-07 15:21:17'),(253,'926724653','721899','46cc3a6f579b7d13a103cdb579cdc984','2019-01-21 16:23:12'),(254,'926724653','592505','7bb58ebe2a1a55dea634a746b67b7ea3','2019-01-21 16:35:05'),(255,'926724653','667125','6d49fd917a7c97da4698b441747a2c67','2019-01-21 16:36:10'),(256,'926724653','123020','37e9de0b9784dcb633ae5f69de395792','2019-01-21 16:36:45'),(257,'926724653','267900','e01038076942fdd7422053ab302ec2a3','2019-01-21 16:44:35'),(258,'926724653','962854','bf49f9dfffd959f6c6c150f840115ae0','2019-01-22 17:43:03'),(259,'926724653','683697','2aa2d8a521209a17b91e42c67c2249ce','2019-01-22 17:44:22'),(260,'926724653','663933','e4465720eddb3fbfa72e05a1ea22d511','2019-01-22 17:46:19'),(261,'926724653','176104','708c52a1524c14bd8039419ef4f867da','2019-01-22 18:06:36'),(262,'926724653','697074','b62fe79b47af0720b245510906bbaaf9','2019-01-22 18:09:01'),(263,'926724653','151920','1aeb00be6578403f7f19dcfe8add5772','2019-01-22 18:10:09'),(264,'926724653','905948','ed012058e1ce8c8428b8e801a4fcc6d1','2019-01-22 18:17:55'),(265,'926724653','585591','065e5b8ce97adc4d6ab2340aefa86e3a','2019-01-22 18:20:37'),(266,'926724653','839386','15b96776bf6974bb1ac8d60dedd3518a','2019-01-22 18:29:18'),(267,'926724653','572606','006e204e28a6ce2ee4692cac3a9ca5de','2019-01-22 18:32:19'),(268,'926724653','697954','8a0eedbbeda5e4e977621a814f5054d3','2019-01-22 18:33:47'),(269,'922774795','919224','6f13c62ede6715a23aca901ed6c20547','2019-01-22 18:35:24'),(270,'949603397','298100','0596eb6a79f2fef767cac9aee5ba43e8','2019-01-23 15:27:17'),(271,'926724653','968021','66d82295ad6638893841afea142fc81a','2019-01-23 16:00:32'),(272,'988547340','710034','821b6eb8518ebe7140eeff8ef6b2abeb','2019-01-24 15:18:58'),(273,'988547340','532512','526dde2c2a0801f145d50f3a380aa4cb','2019-01-24 15:26:09'),(274,'977921965','801897','1bcfeda2e3466c3532da92facfd9a3ad','2019-01-25 17:19:01'),(275,'990152535','697177','b2f6aef89b577badfc265529a2e2818a','2019-01-27 20:00:11'),(276,'990152535','949946','257789e9276273a316c6d37eb8561cb8','2019-01-27 20:13:33'),(277,'990152535','914105','66ba941e8d549e287d277aa23e1c86a1','2019-01-27 20:31:50'),(278,'990152535','328136','d1695c137741f7491398c838cd998bad','2019-01-27 20:41:12'),(279,'990152535','873477','db219d9ec24b90a1c8767ec0a80fb904','2019-01-27 20:44:42'),(280,'991653073','535760','439ae7dbd89f29abb01913db4379b8d5','2019-01-28 19:24:14'),(281,'949603397','448054','39028872a8c2a5fa57519e8d2aec52a3','2019-01-29 01:37:16'),(282,'926724653','491001','d9e8788236461934d1244a4475e9b718','2019-01-29 02:18:01'),(283,'926724653','390366','38752ad2718ca26ce01962b4ab6cd87b','2019-01-29 02:30:04'),(284,'926724653','162010','e62726f51b24ab4973296f8b0035926f','2019-01-29 02:30:51'),(285,'926724653','339747','6037032b4a75a7a865ec003ef31b4aab','2019-01-29 02:32:05'),(286,'926724653','919130','4546fcf6f1ce95e711e2b4ad3253e5ca','2019-01-29 02:54:10'),(287,'926724653','151818','a6a207f208a469898c89cc1d7f50f202','2019-01-29 02:54:58'),(288,'926724653','537678','6401b046e1f29a0650c368e0ed31a135','2019-02-05 17:57:01'),(289,'949603397','482700','2faa1f06a8ea71a8a2bc410bd0e14ff3','2019-02-05 17:59:18'),(290,'949603397','857990','46b79600198a696678c58358150f05a0','2019-02-05 19:24:36'),(291,'949603397','133308','ffe5a67e1e8de83dd90721a47538e176','2019-02-05 19:31:30'),(292,'949603397','105790','a2ce835cf16d190c720d611036fd75dc','2019-02-06 02:31:39'),(293,'991653073','689906','af80df6f095528d027e86bdd1a6cd905','2019-02-07 01:24:07'),(294,'949603397','800463','c067e3243689df0a7556d88797aab7db','2019-02-11 21:02:37'),(295,'949603397','300080','97b0f23958d441e887fc8e120419cdbd','2019-03-01 17:05:04'),(296,'949603397','391269','f9110c3d05c1db0795c18645f3bf00b6','2019-03-01 17:06:19'),(297,'949603397','143184','d2935a31bbe8e2e375fe0ab283df300b','2019-03-06 15:35:26'),(298,'949603397','601531','512e460e0410d5701d8e4ff1b6af7047','2019-03-06 15:36:34'),(299,'949603397','944986','9e5f2b01d475d78a0ebb480c922a3800','2019-03-12 19:32:18'),(300,'991653073','343243','9de47a18c1c63f582a0284ef511493df','2019-03-20 15:20:41'),(301,'977921965','487748','041300b88474e7a7324d3e860c8b57e3','2019-03-22 12:40:08'),(302,'988547340','351371','6aa193589a7e766b7e514763c16d54e5','2019-03-22 14:37:34'),(303,'988547340','671768','c0ec13096e40e31647865e0f8af66841','2019-03-22 14:38:18'),(304,'987293997','159809','4fc790bab9afdcb88c688d3135150ecd','2019-03-22 15:58:09'),(305,'987293997','806983','723b066df06146f929cc3ec382828d5c','2019-03-22 16:01:40'),(306,'987293997','324497','4209ad7fd0ce89165f9c2c51c810e1df','2019-03-22 16:08:13'),(307,'949603397','696101','4a993d931419b83eef20b2c84997c248','2019-03-27 09:56:00'),(308,'991653073','425457','ec070a9cc9b892df7be64e350ed8a5d1','2019-04-10 20:32:32'),(309,'991653073','804873','09a5a1e2059a758bc2466704958d9a19','2019-04-11 10:33:44'),(310,'991653073','356185','79dcef42d52ea316940da38c79a46e6f','2019-04-13 19:03:21'),(311,'949603397','531865','6b36efc2aa39943294611601d7e2a550','2019-04-15 15:29:53'),(312,'977921965','939649','c7086a2ab797dab7956d2d5e30b1a631','2019-04-15 22:15:24'),(313,'977921965','552528','c60a9f312b66bbecb525f424b7c8a8bf','2019-04-21 16:40:32'),(314,'949603397','522534','b4b8729582570c88b5d5265d3fef61ae','2019-04-29 18:49:47'),(315,'988547340','205362','82c465010bd0aad2694842f72db13ee5','2019-05-21 14:11:43'),(316,'991653073','764630','4410f40f8bc20826d44b09c2b969c185','2019-05-31 18:20:02'),(317,'986315624','531642','6aec19f0b655544d726f474549dce605','2019-06-05 21:39:53'),(318,'965602803','466236','9f547c3bbbaa42eee4a4c321c7b9390a','2019-06-05 22:04:42'),(319,'941992287','268515','873c4562fdd1c136ebaf0d47906781e4','2019-06-06 15:18:28'),(320,'949603397','746652','ee2da38366764c1079dfa5bbb94c046f','2019-06-07 16:40:41'),(321,'949603397','768323','a98943417767fcc33cca695ddd08d640','2019-06-07 16:46:24'),(322,'949603397','574631','1acff8592b72dd7aa78733f47f0f895e','2019-06-12 10:49:16'),(323,'949603397','304885','1b4f18a5468a99caded24604ec292205','2019-06-12 16:46:04'),(324,'949603397','434109','0d941d42886665a85d46d6a037f0969a','2019-06-13 12:18:50'),(325,'949603397','393641','311b59e2fdd360abe10cdae2e253e8b1','2019-06-13 12:43:33'),(326,'986715412','997175','6dd04b0887e2205d0f1985a633d41bcf','2019-06-13 12:57:18'),(327,'980984414','972816','20d38fdec1fd89ff069a227de92b1ff8','2019-07-02 14:02:06'),(328,'980984414','943515','546940226eb4c059baf54990ca0de355','2019-07-02 14:03:28');
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token_share`
--

DROP TABLE IF EXISTS `token_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_share` (
  `token_share_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(250) DEFAULT NULL,
  `token_fecha_creacion` datetime DEFAULT NULL,
  `freeler_id` int(11) NOT NULL,
  PRIMARY KEY (`token_share_id`),
  KEY `fk_token_share_freeler1_idx` (`freeler_id`),
  CONSTRAINT `fk_token_share_freeler1` FOREIGN KEY (`freeler_id`) REFERENCES `freeler` (`freeler_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_share`
--

LOCK TABLES `token_share` WRITE;
/*!40000 ALTER TABLE `token_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `token_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token_usuario`
--

DROP TABLE IF EXISTS `token_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_usuario` (
  `token_usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_usuario_id` int(11) NOT NULL,
  `token_token_id` int(11) NOT NULL,
  `token_usuario_fecha_upd` datetime DEFAULT NULL,
  `token_usuario_activo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`token_usuario_id`),
  KEY `fk_token_usuario_usuario1_idx` (`usuario_usuario_id`),
  KEY `fk_token_usuario_token1_idx` (`token_token_id`),
  CONSTRAINT `fk_token_usuario_token1` FOREIGN KEY (`token_token_id`) REFERENCES `token` (`token_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_token_usuario_usuario1` FOREIGN KEY (`usuario_usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_usuario`
--

LOCK TABLES `token_usuario` WRITE;
/*!40000 ALTER TABLE `token_usuario` DISABLE KEYS */;
INSERT INTO `token_usuario` VALUES (15,16,116,'2018-09-28 02:36:12','1'),(20,21,316,'2018-10-18 20:23:54','1'),(21,22,139,'2018-11-07 03:47:58','1'),(22,23,213,'2018-11-15 02:01:31','1'),(23,24,199,'2018-11-20 02:18:47','1'),(24,25,202,'2018-11-20 02:38:36','1'),(25,26,203,'2018-11-20 02:44:18','1'),(26,27,215,'2018-11-27 01:25:16','1'),(27,28,247,'2018-11-28 03:20:09','1'),(28,29,267,'2018-12-12 15:35:41','1'),(29,50,325,'2019-01-23 15:30:30','1'),(30,54,313,'2019-01-25 17:20:27','1'),(31,15,279,'2019-01-27 00:00:00','1'),(32,55,305,'2019-03-22 16:10:40','1'),(33,57,303,'2019-05-21 14:13:59','1'),(34,59,317,'2019-06-05 21:42:04','1'),(35,60,319,'2019-06-06 15:28:57','1'),(36,62,326,'2019-06-13 12:58:53','1');
/*!40000 ALTER TABLE `token_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `TAG` mediumtext,
  `id_ubicacion_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `fk_ubicacion_ubicacion1_idx` (`id_ubicacion_padre`),
  CONSTRAINT `fk_ubicacion_ubicacion1` FOREIGN KEY (`id_ubicacion_padre`) REFERENCES `ubicacion` (`id_ubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,'Europa',NULL,NULL),(2,'África',NULL,NULL),(3,'América',NULL,NULL),(4,'Asia',NULL,NULL),(5,'Oceanía',NULL,NULL),(6,'Unión Europea',NULL,1),(7,'Resto de Europa',NULL,1),(8,'África',NULL,2),(9,'América del Norte',NULL,3),(10,'Centro América y Caribe',NULL,3),(11,'Sudamérica',NULL,3),(12,'Austria',NULL,6),(13,'Bélgica',NULL,6),(14,'Bulgaria',NULL,6),(15,'Chipre',NULL,6),(16,'Dinamarca',NULL,6),(17,'España',NULL,6),(18,'Finlandia',NULL,6),(19,'Francia',NULL,6),(20,'Grecia',NULL,6),(21,'Hungría',NULL,6),(22,'Irlanda',NULL,6),(23,'Italia',NULL,6),(24,'Luxemburgo',NULL,6),(25,'Malta',NULL,6),(26,'Países Bajos',NULL,6),(27,'Polonia',NULL,6),(28,'Portugal',NULL,6),(29,'Reino Unido',NULL,6),(30,'Alemania',NULL,6),(31,'Rumanía',NULL,6),(32,'Suecia',NULL,6),(33,'Letonia',NULL,6),(34,'Estonia',NULL,6),(35,'Lituania',NULL,6),(36,'República Checa',NULL,6),(37,'República Eslovaca',NULL,6),(38,'Croacia',NULL,6),(39,'Eslovenia',NULL,6),(40,'Albania',NULL,7),(41,'Islandia',NULL,7),(42,'Liechtenstein',NULL,7),(43,'Mónaco',NULL,7),(44,'Noruega',NULL,7),(45,'Andorra',NULL,7),(46,'San Marino',NULL,7),(47,'Santa Sede',NULL,7),(48,'Suiza',NULL,7),(49,'Ucrania',NULL,7),(50,'Moldavia',NULL,7),(51,'Belarús',NULL,7),(52,'Georgia',NULL,7),(53,'Bosnia y Herzegovina',NULL,7),(54,'Armenia',NULL,7),(55,'Rusia',NULL,7),(56,'Macedonia',NULL,7),(57,'Serbia',NULL,7),(58,'Montenegro',NULL,7),(59,'Albania',NULL,8),(60,'Islandia',NULL,8),(61,'Liechtenstein',NULL,8),(62,'Mónaco',NULL,8),(63,'Noruega',NULL,8),(64,'Andorra',NULL,8),(65,'San Marino',NULL,8),(66,'Santa Sede',NULL,8),(67,'Suiza',NULL,8),(68,'Ucrania',NULL,8),(69,'Moldavia',NULL,8),(70,'Belarús',NULL,8),(71,'Georgia',NULL,8),(72,'Bosnia y Herzegovina',NULL,8),(73,'Armenia',NULL,8),(74,'Rusia',NULL,8),(75,'Macedonia',NULL,8),(76,'Serbia',NULL,8),(77,'Montenegro',NULL,8),(78,'Canadá',NULL,9),(79,'Estados Unidos de América',NULL,9),(80,'México',NULL,9),(81,'Antigua y Barbuda',NULL,10),(82,'Bahamas',NULL,10),(83,'Barbados',NULL,10),(84,'Belice',NULL,10),(85,'Costa Rica',NULL,10),(86,'Cuba',NULL,10),(87,'Dominica',NULL,10),(88,'El Salvador',NULL,10),(89,'Granada',NULL,10),(90,'Guatemala',NULL,10),(91,'Haití',NULL,10),(92,'Honduras',NULL,10),(93,'Jamaica',NULL,10),(94,'Nicaragua',NULL,10),(95,'Panamá',NULL,10),(96,'San Vicente y las Granadinas',NULL,10),(97,'República Dominicana',NULL,10),(98,'Trinidad y Tobago',NULL,10),(99,'Santa Lucía',NULL,10),(100,'San Cristóbal y Nieves',NULL,10),(101,'Argentina',NULL,11),(102,'Bolivia',NULL,11),(103,'Brasil',NULL,11),(104,'Colombia',NULL,11),(105,'Chile',NULL,11),(106,'Ecuador',NULL,11),(107,'Guyana',NULL,11),(108,'Paraguay',NULL,11),(109,'Perú',NULL,11),(110,'Surinam',NULL,11),(111,'Uruguay',NULL,11),(112,'Venezuela',NULL,11),(113,'Afganistán',NULL,4),(114,'Arabia Saudí',NULL,4),(115,'Bahréin',NULL,4),(116,'Bangladesh',NULL,4),(117,'Myanmar',NULL,4),(118,'China',NULL,4),(119,'Emiratos Árabes Unidos',NULL,4),(120,'Filipinas',NULL,4),(121,'India',NULL,4),(122,'Indonesia',NULL,4),(123,'Iraq',NULL,4),(124,'Irán',NULL,4),(125,'Israel',NULL,4),(126,'Japón',NULL,4),(127,'Jordania',NULL,4),(128,'Camboya',NULL,4),(129,'Kuwait',NULL,4),(130,'Laos',NULL,4),(131,'Líbano',NULL,4),(132,'Malasia',NULL,4),(133,'Maldivas',NULL,4),(134,'Mongolia',NULL,4),(135,'Nepal',NULL,4),(136,'Omán',NULL,4),(137,'Pakistán',NULL,4),(138,'Qatar',NULL,4),(139,'Corea',NULL,4),(140,'Corea del Norte',NULL,4),(141,'Singapur',NULL,4),(142,'Siria',NULL,4),(143,'Sri Lanka',NULL,4),(144,'Tailandia',NULL,4),(145,'Turquía',NULL,4),(146,'Vietnam',NULL,4),(147,'Brunei',NULL,4),(148,'Islas Marshall',NULL,4),(149,'Yemen',NULL,4),(150,'Azerbaiyán',NULL,4),(151,'Kazajstán',NULL,4),(152,'Kirguistán',NULL,4),(153,'Tayikistán',NULL,4),(154,'Turkmenistán',NULL,4),(155,'Uzbekistán',NULL,4),(156,'Bhután',NULL,4),(157,'Palestina. Estado Observador, no miembro de Naciones Unidas',NULL,4),(158,'Australia',NULL,5),(159,'Fiji',NULL,5),(160,'Nueva Zelanda',NULL,5),(161,'Papúa Nueva Guinea',NULL,5),(162,'Islas Salomón',NULL,5),(163,'Samoa',NULL,5),(164,'Tonga',NULL,5),(165,'Vanuatu',NULL,5),(166,'Micronesia',NULL,5),(167,'Tuvalu',NULL,5),(168,'Islas Cook',NULL,5),(169,'Kiribati',NULL,5),(170,'Nauru',NULL,5),(171,'Palaos',NULL,5),(172,'Timor Oriental',NULL,5),(173,'AMAZONAS',NULL,109),(174,'ÁNCASH',NULL,109),(175,'APURÍMAC',NULL,109),(176,'AREQUIPA',NULL,109),(177,'AYACUCHO',NULL,109),(178,'CAJAMARCA',NULL,109),(179,'CUSCO',NULL,109),(180,'HUANCAVELICA',NULL,109),(181,'HUÁNUCO',NULL,109),(182,'ICA',NULL,109),(183,'JUNÍN',NULL,109),(184,'LA LIBERTAD',NULL,109),(185,'LAMBAYEQUE',NULL,109),(186,'LIMA',NULL,109),(187,'BAGUA GRANDE',NULL,173),(188,'BAGUA GRANDE',NULL,187),(189,'CHACHAPOYAS',NULL,173),(190,'CHACHAPOYAS',NULL,189),(191,'CHIMBOTE',NULL,174),(192,'HUARAZ',NULL,174),(193,'CASMA',NULL,174),(194,'CHIMBOTE',NULL,191),(195,'COISHCO',NULL,191),(196,'NUEVO CHIMBOTE',NULL,191),(197,'HUARAZ',NULL,192),(198,'INDEPENDENCIA',NULL,192),(199,'CASMA',NULL,193),(200,'ABANCAY',NULL,175),(201,'ANDAHUAYLAS',NULL,175),(202,'ABANCAY',NULL,200),(203,'TAMBURCO',NULL,200),(204,'ANDAHUAYLAS',NULL,201),(205,'SAN JERÓNIMO',NULL,201),(206,'TALAVERA',NULL,201),(207,'AREQUIPA',NULL,176),(208,'CAMANÁ',NULL,176),(209,'ISLAY',NULL,176),(210,'AREQUIPA',NULL,207),(211,'ALTO SELVA ALEGRE',NULL,207),(212,'CAYMA',NULL,207),(213,'CERRO COLORADO',NULL,207),(214,'JACOBO HUNTER',NULL,207),(215,'MARIANO MELGAR',NULL,207),(216,'MIRAFLORES',NULL,207),(217,'PAUCARPATA',NULL,207),(218,'SABANDÍA',NULL,207),(219,'SACHACA',NULL,207),(220,'SOCABAYA',NULL,207),(221,'TIABAYA',NULL,207),(222,'YANAHUARA',NULL,207),(223,'JOSÉ LUIS BUSTAMANTE Y RIVERO',NULL,207),(224,'CAMANÁ',NULL,208),(225,'JOSE MARÍA QUIMPER',NULL,208),(226,'SAMUEL PASTOR',NULL,208),(227,'MOLLENDO',NULL,209),(228,'AYACUCHO',NULL,177),(229,'HUANTA',NULL,177),(230,'AYACUCHO',NULL,228),(231,'CARMEN ALTO',NULL,228),(232,'SAN JUAN BAUTISTA',NULL,228),(233,'JESUS NAZARENO',NULL,228),(234,'HUANTA',NULL,229),(235,'CAJAMARCA',NULL,178),(236,'JAÉN',NULL,178),(237,'CAJAMARCA',NULL,235),(238,'LOS BAÑOS DEL INCA',NULL,235),(239,'JAÉN',NULL,236),(240,'CUSCO',NULL,179),(241,'CANCHIS',NULL,179),(242,'LA CONVENCIÓN',NULL,179),(243,'YAURI (ESPINAR)',NULL,179),(244,'CUSCO',NULL,240),(245,'SAN JERÓNIMO',NULL,240),(246,'SAN SEBASTIÁN',NULL,240),(247,'SANTIAGO',NULL,240),(248,'WANCHAQ',NULL,240),(249,'SICUANI',NULL,241),(250,'SANTA ANA',NULL,242),(251,'ESPINAR',NULL,243),(252,'HUANCAVELICA',NULL,180),(253,'HUANCAVELICA',NULL,252),(254,'ASCENCIÓN',NULL,252),(255,'HUÁNUCO',NULL,181),(256,'LEONCIO PRADO',NULL,181),(257,'HUÁNUCO',NULL,255),(258,'AMARILIS',NULL,255),(259,'PILLCO MARCA',NULL,255),(260,'RUPA-RUPA',NULL,256),(261,'ICA',NULL,182),(262,'CHINCHA ALTA',NULL,182),(263,'PISCO',NULL,182),(264,'NAZCA',NULL,182),(265,'ICA',NULL,261),(266,'LA TINGUINA',NULL,261),(267,'PARCONA',NULL,261),(268,'SUBTANJALLA',NULL,261),(269,'CHINCHA ALTA',NULL,262),(270,'GROCIO PRADO',NULL,262),(271,'PUEBLO NUEVO',NULL,262),(272,'SUNAMPE',NULL,262),(273,'PISCO',NULL,263),(274,'SAN ANDRÉS',NULL,263),(275,'SAN CLEMENTE',NULL,263),(276,'TÚPAC AMARU INCA',NULL,263),(277,'NAZCA',NULL,264),(278,'VISTA ALEGRE',NULL,264),(279,'HUANCAYO',NULL,183),(280,'TARMA',NULL,183),(281,'LA OROYA',NULL,183),(282,'JAUJA',NULL,183),(283,'HUANCAYO',NULL,279),(284,'CHILCA',NULL,279),(285,'EL TAMBO',NULL,279),(286,'TARMA',NULL,280),(287,'LA OROYA',NULL,281),(288,'SANTA ROSA DE SACCO',NULL,281),(289,'JAUJA',NULL,282),(290,'TRUJILLO',NULL,184),(291,'CHEPÉN',NULL,184),(292,'GUADALUPE',NULL,184),(293,'CASA GRANDE',NULL,184),(294,'PACASMAYO',NULL,184),(295,'HUAMACHUCO',NULL,184),(296,'LAREDO',NULL,184),(297,'MOCHE',NULL,184),(298,'TRUJILLO',NULL,290),(299,'EL PORVENIR',NULL,290),(300,'FLORENCIA DE MORA',NULL,290),(301,'LA ESPERANZA',NULL,290),(302,'VÍCTOR LARCO HERRERA',NULL,290),(303,'CHEPÉN',NULL,291),(304,'GUADALUPE',NULL,292),(305,'CASA GRANDE',NULL,293),(306,'PACASMAYO',NULL,294),(307,'HUAMACHUCO',NULL,295),(308,'LAREDO',NULL,296),(309,'MOCHE',NULL,297),(310,'CHICLAYO',NULL,185),(311,'LAMBAYEQUE',NULL,185),(312,'FERREÑAFE',NULL,185),(313,'TUMAN',NULL,185),(314,'MONSEFU',NULL,185),(315,'CHICLAYO',NULL,310),(316,'JOSE LEONARDO ORTIZ',NULL,310),(317,'LA VICTORIA',NULL,310),(318,'PIMENTEL',NULL,310),(319,'LAMBAYEQUE',NULL,311),(320,'FERREÑAFE',NULL,312),(321,'PUEBLO NUEVO',NULL,312),(322,'TUMAN',NULL,313),(323,'MONSEFU',NULL,314),(324,'LIMA METROPOLITANA',NULL,186),(325,'HUACHO',NULL,186),(326,'HUARAL',NULL,186),(327,'SAN VICENTE DE CAÑETE',NULL,186),(328,'BARRANCA',NULL,186),(329,'HUAURA',NULL,186),(330,'PARAMONGA',NULL,186),(331,'CHANCAY',NULL,186),(332,'MALA',NULL,186),(333,'SUPE',NULL,186),(334,'LIMA',NULL,324),(335,'ANCÓN',NULL,324),(336,'ATE',NULL,324),(337,'BARRANCO',NULL,324),(338,'BRENA',NULL,324),(339,'CARABAYLLO',NULL,324),(340,'CHACLACAYO',NULL,324),(341,'CHORRILLOS',NULL,324),(342,'CIENEGUILLA',NULL,324),(343,'COMAS',NULL,324),(344,'EL AGUSTINO',NULL,324),(345,'INDEPENDENCIA',NULL,324),(346,'JESÚS MARÍA',NULL,324),(347,'LA MOLINA',NULL,324),(348,'LA VICTORIA',NULL,324),(349,'LINCE',NULL,324),(350,'LOS OLIVOS',NULL,324),(351,'LURIGANCHO',NULL,324),(352,'LURIN',NULL,324),(353,'MAGDALENA DEL MAR',NULL,324),(354,'MAGDALENA VIEJA',NULL,324),(355,'MIRAFLORES',NULL,324),(356,'PACHACAMAC',NULL,324),(357,'PUCUSANA',NULL,324),(358,'PUENTE PIEDRA',NULL,324),(359,'PUNTA HERMOSA',NULL,324),(360,'PUNTA NEGRA',NULL,324),(361,'RÍMAC',NULL,324),(362,'SAN BARTOLO',NULL,324),(363,'SAN BORJA',NULL,324),(364,'SAN ISIDRO',NULL,324),(365,'SAN JUAN DE LURIGANCHO',NULL,324),(366,'SAN JUAN DE MIRAFLORES',NULL,324),(367,'SAN LUIS',NULL,324),(368,'SAN MARTÍN DE PORRES',NULL,324),(369,'SAN MIGUEL',NULL,324),(370,'SANTA ANITA',NULL,324),(371,'SANTA MARÍA DEL MAR',NULL,324),(372,'SANTA ROSA',NULL,324),(373,'SANTIAGO DE SURCO',NULL,324),(374,'SURQUILLO',NULL,324),(375,'VILLA EL SALVADOR',NULL,324),(376,'SURQUILLO',NULL,324),(377,'VILLA EL SALVADOR',NULL,324),(378,'VILLA MARÍA DEL TRIUNFO',NULL,324),(379,'CALLAO',NULL,324),(380,'BELLAVISTA',NULL,324),(381,'CARMEN DE LA LEGUA REYNOSO',NULL,324),(382,'LA PERLA',NULL,324),(383,'LA PUNTA',NULL,324),(384,'VENTANILLA',NULL,324),(385,'HUACHO',NULL,325),(386,'CALETA DE CARQUÍN',NULL,325),(387,'HUALMAY',NULL,325),(388,'HUARAL',NULL,326),(389,'SAN VICENTE DE CAÑETE',NULL,327),(390,'IMPERIAL',NULL,327),(391,'BARRANCA',NULL,328),(392,'HUAURA',NULL,329),(393,'SANTA MARÍA',NULL,329),(394,'PARAMONGA',NULL,330),(395,'PATIVILCA',NULL,330),(396,'CHANCAY',NULL,331),(397,'MALA',NULL,332),(398,'NUEVO IMPERIAL',NULL,332),(399,'SUPE',NULL,333),(400,'SUPE PUERTO',NULL,333),(401,'LORETO',NULL,109),(402,'MADRE DE DIOS',NULL,109),(403,'MOQUEGUA',NULL,109),(404,'PASCO',NULL,109),(405,'PIURA',NULL,109),(406,'PUNO',NULL,109),(407,'SAN MARTÍN',NULL,109),(408,'TACNA',NULL,109),(409,'TUMBES',NULL,109),(410,'UCAYALI',NULL,109),(411,'IQUITOS',NULL,401),(412,'YURIMAGUAS',NULL,401),(413,'IQUITOS',NULL,411),(414,'PUNCHANA',NULL,411),(415,'BELÉN',NULL,411),(416,'SAN JUAN BAUTISTA',NULL,411),(417,'YURIMAGUAS',NULL,412),(418,'PUERTO MALDONADO',NULL,402),(419,'TAMBOPATA',NULL,418),(420,'ILO',NULL,403),(421,'MOQUEGUA',NULL,403),(422,'ILO',NULL,420),(423,'MOQUEGUA',NULL,421),(424,'SAMEGUA',NULL,421),(425,'CERRO DE PASCO',NULL,404),(426,'CHAUPIMARCA',NULL,425),(427,'SIMON BOLIVAR',NULL,425),(428,'YANACANCHA',NULL,425),(429,'PIURA',NULL,405),(430,'SULLANA',NULL,405),(431,'TALARA',NULL,405),(432,'CATACAOS',NULL,405),(433,'PAITA',NULL,405),(434,'CHULUCANAS',NULL,405),(435,'SECHURA',NULL,405),(436,'PIURA',NULL,429),(437,'CASTILLA',NULL,429),(438,'SULLANA',NULL,430),(439,'BELLAVISTA',NULL,430),(440,'PARINAS',NULL,431),(441,'CATACAOS',NULL,432),(442,'PAITA',NULL,433),(443,'CHULUCANAS',NULL,434),(444,'SECHURA',NULL,435),(445,'JULIACA',NULL,406),(446,'PUNO',NULL,406),(447,'AYAVIRI',NULL,406),(448,'ILAVE',NULL,406),(449,'JULIACA',NULL,445),(450,'PUNO',NULL,446),(451,'AYAVIRI',NULL,447),(452,'ILAVE',NULL,448),(453,'TARAPOTO',NULL,407),(454,'MOYOBAMBA',NULL,407),(455,'RIOJA',NULL,407),(456,'TARAPOTO',NULL,453),(457,'LA BANDA DE SHILCAYO',NULL,453),(458,'MORALES',NULL,453),(459,'MOYOBAMBA',NULL,454),(460,'RIOJA',NULL,455),(461,'TACNA',NULL,408),(462,'TACNA',NULL,461),(463,'ALTO DE LA ALIANZA',NULL,461),(464,'CIUDAD NUEVA',NULL,461),(465,'POCOLLAY',NULL,461),(466,'CORONEL GREGORIO ALBARRACIN LANCHIPA',NULL,461),(467,'TUMBES',NULL,409),(468,'TUMBES',NULL,467),(469,'PUCALLPA',NULL,410),(470,'CALLARIA',NULL,469),(471,'YARINACOCHA',NULL,469);
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!50001 DROP VIEW IF EXISTS `ubicaciones`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ubicaciones` (
  `id` tinyint NOT NULL,
  `ubicacion` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(250) DEFAULT NULL,
  `usuario_apellidoPa` varchar(250) DEFAULT NULL,
  `usuario_apellidoMa` varchar(250) DEFAULT NULL,
  `usuario_email` varchar(250) DEFAULT NULL,
  `usuario_codigoref` varchar(250) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `direccion` text,
  `usuario_password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  KEY `fk_usuario_ubicacion` (`id_ubicacion`),
  CONSTRAINT `fk_usuario_ubicacion` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (15,'Virginia','Vera','Figueroa','vikivera@gmail.com','464315',334,NULL,NULL),(16,'Jorge','Zárate','Aguinaga','jorge@freeler.com','00000',334,NULL,NULL),(21,'Omar','Orlandini','Vera','omarorlandini123@gmail.com','4587963',334,NULL,'1234'),(22,'Carlos','Pimentel','Cortés','cams@hjj.com','54866',334,NULL,NULL),(23,'usuario','prueba','test','usuario@test.com','456789123456',NULL,NULL,NULL),(24,'prueba','test','prueba 2','test@gggg.com','123',NULL,NULL,NULL),(25,'Prueba','Test','Usuario',NULL,NULL,NULL,NULL,NULL),(26,'Test','Usuario','Test','test@jndbs.com','54546',NULL,NULL,NULL),(27,'Juanito','Perez','Aguilar','juan@perez.com','215876',NULL,NULL,NULL),(28,'Dangelo','Sanchez','Coriat','dangelo0301@gmail.com',NULL,NULL,NULL,NULL),(29,'henry','sanchez','coriat','sunsetfallco@gmail.com',NULL,1,NULL,NULL),(30,'Juan','Perez','Noriega','juancito@gmail.com',NULL,NULL,NULL,NULL),(31,'Jose','Villasante','Gallegos','jose@me.com',NULL,NULL,NULL,NULL),(32,'Rodrigo','villegas','Santiago','rogrido@me.com',NULL,NULL,NULL,NULL),(33,'Juan','villegas','Noriega','Juancito5555@gmail.com',NULL,NULL,NULL,NULL),(34,'Jorge','Zarate','Aguinaga','Jeza4771@gmail.com',NULL,NULL,NULL,NULL),(35,'Jhosy','Arrasco','Lau','Jjjjj@gamil.com',NULL,NULL,NULL,NULL),(36,'Carlos','Salazar','Mendez','Carlitos345@gmail.com',NULL,NULL,NULL,NULL),(37,'Rodrio','Gimenez','Arrasco','rodrigo_gi123',NULL,NULL,NULL,NULL),(38,'Marcelo','Cardenas','Martinez','Marce_123@gmail.com',NULL,NULL,NULL,NULL),(39,'Mario','Castañeda','Arevalo','marioto_123@gmail.com',NULL,NULL,NULL,NULL),(40,'Marcos','Perez','Gallegos','Ma2345@hitjj.com',NULL,NULL,NULL,NULL),(41,'José','Arrasco','Vergara','jose_345@gmail.com',NULL,NULL,'Av. revolución 456','1234'),(42,'José','Arrasco','Vergara','jose_333@gmail.com',NULL,NULL,'Av. revolución 456','1234'),(43,'José','Arrasco','Vergara','jose_222@gmail.com',NULL,NULL,'Av. revolución 456','1234'),(44,'Manuel','Ortega','Salas','manuel_1234@gmail.com',NULL,NULL,'Av. salidas 567','1234'),(45,'Lorena','Arresto','Polo','lore_1234@gmail.com',NULL,NULL,'Av. central 0989','1234'),(46,'Anthony','Diaz','Chinchay','antthony.diaz@gmail.com',NULL,NULL,'Callao callao','123456qa'),(47,'DANGELO','SANCHEZ','Coriat','dsanchezcoriat@gmail.com',NULL,NULL,'033','1234'),(48,'Joshua','Sánchez','Calderón','joshua1509@hotmail.com',NULL,NULL,'Jr. José Olaya 1277, Tarapoto','1234'),(49,'Henry','Sanchez','Coriat','Sunsetfallco@gmaill.com',NULL,NULL,'Jr. Andres avelino cáceres 152','familia6'),(50,'Luis Fernando','varillas','lazo','luisvarillas.l@gmail.com',NULL,NULL,NULL,NULL),(51,'Luis','Varillas','Lazo','luisvarillaslazo@gmail.com',NULL,NULL,'Jr. Moyobamba 131 Tarapoto','1234'),(52,'Joshua','Sanchez','Calderon','joshuasanchezcalderon@gmail.com',NULL,NULL,'Jose Olaya 1277','12345'),(53,'Dally','Sangama','Luna','da_salu@hotmail.com',NULL,NULL,'Jr manco capac 448 tarapoto','busjem-botXuq-mamma7'),(54,'Dally','Sangama','Luna','da_salu@hotmail.com',NULL,NULL,NULL,NULL),(55,'daniel','grillo','paco','Daniel.grillo.paco@gmail.com',NULL,NULL,NULL,NULL),(56,'Henry','Sanchez','Coriat','Henryrosy@hotmail.com',NULL,NULL,'Jr. Andres avelino cáceres 152','familia6'),(57,'Jorge','Zarate','Aguinaga','jeza4771@gmail.com',NULL,NULL,NULL,NULL),(58,'Administrador','Administrador','Administrador','admin',NULL,NULL,NULL,'s1st3mx.39.'),(59,'Virginia','Vera','Figueroa','vikiveraf@hotmail.com','996535',NULL,NULL,NULL),(60,'Victor','Rubina','Ramos','vrubinar@hotmail.com',NULL,NULL,NULL,NULL),(61,'Jhuliana','Diaz','Rojas','Jvdr2603@gmail',NULL,NULL,'Villa militar el paraiso del cumbaza #25 morales','jhuliana2603'),(62,'Anthony','Diaz','Chinchay','antthony.diaz@gmail.com','26489',NULL,NULL,NULL),(63,'Javier','Choy','Reategui','jachore@icloud.com',NULL,NULL,'Jr, Ulises Reategui 549 - Tarapoto','Jchoy250776');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `PediblesDisponibles`
--

/*!50001 DROP TABLE IF EXISTS `PediblesDisponibles`*/;
/*!50001 DROP VIEW IF EXISTS `PediblesDisponibles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`freeleruser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `PediblesDisponibles` AS select 2 AS `tipo_pedible`,`a`.`afiche_id` AS `pedible_id`,`a`.`afiche_nombre` AS `nombre`,`a`.`afiche_descripcion` AS `descripcion`,`a`.`afiche_fecha_creacion` AS `fecha_creacion`,`a`.`tercerizable` AS `tercerizable`,`a`.`activo` AS `activo`,`a`.`preview_img` AS `preview`,`b`.`freeler_id` AS `freeler`,min(`d`.`producto_precio`) AS `precio_min`,max(`d`.`producto_precio`) AS `precio_max` from (((`afiche` `a` join `empresa` `b` on(((`a`.`empresa_id` = `b`.`empresa_id`) and (`b`.`activo` = 1) and (`a`.`activo` = 1)))) join `afiche_detalle` `c` on((`a`.`afiche_id` = `c`.`afiche_id`))) join `producto` `d` on((`c`.`producto_id` = `d`.`producto_id`))) group by `a`.`afiche_id`,`a`.`afiche_nombre`,`a`.`afiche_descripcion`,`a`.`afiche_fecha_creacion`,`a`.`tercerizable`,`a`.`activo`,`a`.`preview_img`,`b`.`freeler_id` union select 1 AS `tipo_pedible`,`a`.`producto_id` AS `pedible_id`,`a`.`producto_nombre` AS `nombre`,`a`.`producto_descripcion` AS `descripcion`,`a`.`producto_fec_creacion` AS `fecha_creacion`,`a`.`producto_es_tercerizable` AS `tercerizable`,`a`.`activo` AS `activo`,`a`.`preview_img` AS `preview`,`b`.`freeler_id` AS `freeler`,`a`.`producto_precio` AS `precio_min`,`a`.`producto_precio` AS `precio_max` from (`producto` `a` join `empresa` `b` on(((`a`.`empresa_id` = `b`.`empresa_id`) and (`b`.`activo` = 1) and (`a`.`activo` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pedibles`
--

/*!50001 DROP TABLE IF EXISTS `pedibles`*/;
/*!50001 DROP VIEW IF EXISTS `pedibles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pedibles` AS select count(`a`.`pedido_id`) AS `cantidad_pedidos`,max(`a`.`fecha_creacion`) AS `ult_pedido`,`a`.`afiche_id` AS `pedible_id`,2 AS `tipo_pedible`,`b`.`afiche_nombre` AS `nombre`,`b`.`afiche_descripcion` AS `descripcion`,`b`.`preview_img` AS `preview`,`b`.`activo` AS `activo`,`a`.`freeler_shared_id` AS `freeler_shared_id`,`b`.`tercerizable` AS `tercerizable`,`c`.`freeler_id` AS `freeler_id` from ((`pedido` `a` join `afiche` `b` on(((`a`.`afiche_id` = `b`.`afiche_id`) and (`b`.`activo` = 1) and (`a`.`eliminado` = 0)))) join `empresa` `c` on(((`c`.`empresa_id` = `b`.`empresa_id`) and (`c`.`activo` = 1)))) group by `a`.`freeler_shared_id`,`c`.`freeler_id`,`a`.`afiche_id`,`b`.`afiche_nombre`,`b`.`afiche_descripcion`,`b`.`preview_img`,`b`.`activo`,`b`.`tercerizable` union select count(`a`.`pedido_id`) AS `cantidad_pedidos`,max(`a`.`fecha_creacion`) AS `ult_pedido`,`c`.`producto_id` AS `pedible_id`,1 AS `tipo_pedible`,`c`.`producto_nombre` AS `nombre`,`c`.`producto_descripcion` AS `descripcion`,`c`.`preview_img` AS `preview`,`c`.`activo` AS `activo`,`a`.`freeler_shared_id` AS `freeler_shared_id`,`c`.`producto_es_tercerizable` AS `tercerizable`,`d`.`freeler_id` AS `freeler_id` from (((`pedido` `a` join `detalle_pedido` `b` on(((`a`.`pedido_id` = `b`.`pedido_id`) and isnull(`a`.`afiche_id`) and (`a`.`eliminado` = 0)))) join `producto` `c` on((`b`.`producto_id` = `c`.`producto_id`))) join `empresa` `d` on((`d`.`empresa_id` = `c`.`empresa_id`))) group by `a`.`freeler_shared_id`,`d`.`freeler_id`,`c`.`producto_id`,`c`.`producto_nombre`,`c`.`producto_descripcion`,`c`.`preview_img`,`c`.`activo`,`a`.`freeler_shared_id`,`c`.`producto_es_tercerizable` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ubicaciones`
--

/*!50001 DROP TABLE IF EXISTS `ubicaciones`*/;
/*!50001 DROP VIEW IF EXISTS `ubicaciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`freeleruser`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ubicaciones` AS select ifnull(`f`.`id_ubicacion`,ifnull(`e`.`id_ubicacion`,ifnull(`d`.`id_ubicacion`,ifnull(`c`.`id_ubicacion`,ifnull(`b`.`id_ubicacion`,`a`.`id_ubicacion`))))) AS `id`,(case when isnull(`c`.`nombre`) then concat(ifnull(ucase(`a`.`nombre`),''),', ',ifnull(`b`.`nombre`,'')) when isnull(`d`.`nombre`) then concat(ifnull(ucase(`a`.`nombre`),''),' - ',ifnull(ucase(`b`.`nombre`),''),', ',ifnull(`c`.`nombre`,'')) else concat(ifnull(ucase(`c`.`nombre`),''),' - ',ifnull(ucase(`d`.`nombre`),''),', ',ifnull(concat(ucase(left(`e`.`nombre`,1)),lcase(substr(`e`.`nombre`,2))),''),' - ',ifnull(concat(ucase(left(`f`.`nombre`,1)),lcase(substr(`f`.`nombre`,2))),'')) end) AS `ubicacion` from (((((`ubicacion` `a` join `ubicacion` `b` on((isnull(`a`.`id_ubicacion_padre`) and (`b`.`id_ubicacion_padre` = `a`.`id_ubicacion`)))) left join `ubicacion` `c` on((`c`.`id_ubicacion_padre` = `b`.`id_ubicacion`))) left join `ubicacion` `d` on((`d`.`id_ubicacion_padre` = `c`.`id_ubicacion`))) left join `ubicacion` `e` on((`e`.`id_ubicacion_padre` = `d`.`id_ubicacion`))) left join `ubicacion` `f` on((`f`.`id_ubicacion_padre` = `e`.`id_ubicacion`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-09  6:42:37
