CREATE DATABASE  IF NOT EXISTS `concursos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `concursos`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: concursos
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `carrera_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_id_carrera_foreign_idx` (`carrera_id`),
  CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (9,'Física y Matemáticas / Bioquímica',2,'2018-06-01 02:01:18','2018-06-01 02:01:18',NULL),(10,'Química / Bioquímica',2,'2018-06-01 02:01:39','2018-06-01 02:01:39',NULL),(11,'Sistemas de producción Agropecuaria',22,'2018-06-01 02:02:12','2018-06-01 02:02:12',NULL),(12,'Sistemas Integrados de manufactura',20,'2018-06-01 02:02:54','2018-06-01 02:02:54',NULL),(13,'Algoritmos y Lenguajes',19,'2018-06-01 02:03:08','2018-06-01 02:03:08',NULL),(14,'Derecho',15,'2018-06-01 02:03:31','2018-06-01 02:03:31',NULL);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `area_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_asignatura_area_idx` (`area_id`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (5,'Biosfísicoquimica',10,'2018-06-01 02:04:11','2018-06-01 02:04:11',NULL),(6,'Química I',10,'2018-06-01 02:04:21','2018-06-01 02:04:21',NULL),(7,'Análisis Matemático II',9,'2018-06-01 02:04:35','2018-06-01 02:04:35',NULL),(8,'Introducción al Desarrollo Sustentable',12,'2018-06-01 02:04:53','2018-06-01 02:04:53',NULL),(9,'Algoritmos y Programación',13,'2018-06-01 02:05:07','2018-06-01 02:05:07',NULL);
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargosconcursados`
--

DROP TABLE IF EXISTS `cargosconcursados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargosconcursados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `universidad_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL DEFAULT '1',
  `dedicacion` enum('Simple','Exclusiva','Semiexclusiva') NOT NULL COMMENT '1 = SIMPLE\n2 = EXCLUSIVA\n3 = SEMIEXCLUSIVA',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargosconcursados_id_universidad_foreign_idx` (`universidad_id`),
  KEY `cargosconcursados_id_categoria_foreign_idx` (`categoria_id`),
  KEY `cargosconcursados_id_personas_foreign_idx` (`persona_id`),
  CONSTRAINT `cargosconcursados_id_categoria_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargosconcursados_id_personas_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargosconcursados_id_universidad_foreign` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargosconcursados`
--

LOCK TABLES `cargosconcursados` WRITE;
/*!40000 ALTER TABLE `cargosconcursados` DISABLE KEYS */;
INSERT INTO `cargosconcursados` VALUES (1,1,1,1,'Simple','2018-06-04 06:03:34','2018-06-04 06:03:34',NULL),(2,2,3,236,'Simple','2018-07-01 22:14:57','2018-07-01 22:15:15','2018-07-01 22:15:15');
/*!40000 ALTER TABLE `cargosconcursados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `instituto_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carreras_id_instituto_foreign_idx` (`instituto_id`),
  CONSTRAINT `carreras_id_instituto_foreign` FOREIGN KEY (`instituto_id`) REFERENCES `institutos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,'Medicina',1,'2018-05-31 03:53:35','2018-05-31 03:53:35',NULL),(2,'Bioquímica',1,'2018-05-31 04:11:56','2018-05-31 04:11:56',NULL),(3,'Licenciatura en Enfermería',1,'2018-05-31 04:12:17','2018-05-31 04:12:17',NULL),(4,'Licenciatura en Organización y Asistencia de Quirófanos',1,'2018-05-31 04:12:43','2018-05-31 04:12:43',NULL),(5,'Licenciatura en Kinesiología y Fisiatría',1,'2018-05-31 04:12:57','2018-05-31 04:12:57',NULL),(6,'Tecnicatura en Emergencias Sanitarias y Desastres',1,'2018-05-31 04:13:15','2018-05-31 04:13:15',NULL),(7,'Tecnicatura Universitaria en Farmacia Hospitalaria',1,'2018-05-31 04:13:36','2018-05-31 04:13:36',NULL),(8,'Tecnicatura Universitaria en Información Clínica y Gestión de Pacientes',1,'2018-05-31 04:13:55','2018-05-31 04:13:55',NULL),(9,'Especialización en Cardiología',1,'2018-05-31 04:14:10','2018-05-31 04:14:10',NULL),(10,'Maestría en Investigación Traslacional para la Salud',1,'2018-05-31 04:14:22','2018-05-31 04:14:22',NULL),(11,'Licenciatura en Economía',2,'2018-05-31 04:14:37','2018-05-31 04:14:37',NULL),(12,'Licenciatura en Trabajo Social',2,'2018-05-31 04:14:53','2018-05-31 04:14:53',NULL),(13,'Licenciatura en Administración',2,'2018-05-31 04:15:12','2018-05-31 04:15:12',NULL),(14,'Licenciatura en Gestión Ambiental',2,'2018-05-31 04:15:30','2018-05-31 04:15:30',NULL),(15,'Licenciatura en Relaciones del Trabajo',2,'2018-05-31 04:15:43','2018-05-31 04:15:43',NULL),(16,'Especialización en Evaluación de Políticas Públicas',2,'2018-05-31 04:16:00','2018-05-31 04:16:00',NULL),(17,'Ingeniería en Petróleo',3,'2018-05-31 04:16:17','2018-05-31 04:16:17',NULL),(18,'Bioingeniería',3,'2018-05-31 04:16:32','2018-05-31 04:16:32',NULL),(19,'Ingeniería en Informática',3,'2018-05-31 04:16:47','2018-05-31 04:16:47',NULL),(20,'Ingeniería Industrial',3,'2018-05-31 04:17:08','2018-05-31 04:17:08',NULL),(21,'Tecnicatura Universitaria en Producción Vegetal Intensiva',3,'2018-05-31 04:17:22','2018-05-31 04:17:22',NULL),(22,'Tecnicatura Universitaria en Emprendimientos Agropecuarios',3,'2018-05-31 04:17:35','2018-05-31 04:17:35',NULL),(23,'Licenciatura en Administración Agraria',3,'2018-05-31 04:17:46','2018-05-31 04:17:46',NULL),(24,'Licenciatura en Ciencias Agrarias',3,'2018-05-31 04:17:57','2018-05-31 04:17:57',NULL),(25,'Ingeniería en Transporte',3,'2018-05-31 04:18:10','2018-05-31 04:18:10',NULL);
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Titular',1,'2018-06-01 02:23:33','2018-06-01 02:24:07',NULL),(2,'Asociado',2,'2018-06-01 02:23:58','2018-06-01 02:23:58',NULL),(3,'Adjunto',3,'2018-06-01 02:26:06','2018-06-01 02:26:06',NULL),(4,'JTP',4,'2018-06-01 02:26:18','2018-06-01 02:26:18',NULL),(5,'Ayudante',5,'2018-06-01 04:13:02','2018-06-01 04:13:02',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concursos`
--

DROP TABLE IF EXISTS `concursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `referenciaGeneral` varchar(10) DEFAULT NULL,
  `referenciaInstituto` varchar(10) DEFAULT NULL,
  `cargos` tinyint(1) NOT NULL,
  `lineaDesarrollo` varchar(200) DEFAULT NULL COMMENT 'Linea de investigación/Desarrollo profesional',
  `requisitos` varchar(200) DEFAULT NULL COMMENT 'Requisitos académicos y profesionales',
  `expediente` varchar(10) DEFAULT NULL,
  `fechaSustanciacion` datetime DEFAULT NULL,
  `usuarioSustanciacion` int(11) DEFAULT NULL,
  `usuarioCierre` int(11) DEFAULT NULL COMMENT 'Usuario que genero el cierre.',
  `observaciones` varchar(200) DEFAULT NULL,
  `fechaInicio` datetime NOT NULL COMMENT 'Fecha de inicio de inscripciones al concurso\n',
  `fechaFin` datetime NOT NULL COMMENT 'Fecha final de inscipciones al concurso',
  `estado` enum('Abierto','Cerrado','Impugnado','Vacante') NOT NULL COMMENT '1: ABIERTO\n2: CERRADO\n3: IMPUGNADO\n4: VACANTE',
  `dedicacion` enum('Simple','Exclusiva','Semiexclusiva') NOT NULL COMMENT '1 = SIMPLE\n2 = EXCLUSIVA\n3 = SEMIEXCLUSIVA',
  `dictamen` mediumblob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_concurso_asignatura_idx` (`asignatura_id`),
  KEY `fk_concursos_perfiles_idx` (`perfil_id`),
  KEY `fk_concursos_usuariosCierre_idx` (`usuarioCierre`),
  KEY `fk_concursos_usuariosSustancion_idx` (`usuarioSustanciacion`),
  KEY `concursos_id_categoria_foreign_idx` (`categoria_id`),
  CONSTRAINT `concursos_id_asignatura_foreign` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `concursos_id_categoria_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `concursos_id_perfil_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `concursos_id_usuarioCierre_foreign` FOREIGN KEY (`usuarioCierre`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `concursos_id_usuarioSustanciacion_foreign` FOREIGN KEY (`usuarioSustanciacion`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concursos`
--

LOCK TABLES `concursos` WRITE;
/*!40000 ALTER TABLE `concursos` DISABLE KEYS */;
INSERT INTO `concursos` VALUES (1,9,1,1,'VI-004','VI.01',2,'Comunicación y educación','LOS QUE CORRESPONDAN A LA CATEGORÍA Y PERFIL SEGÚN RESOLUCIÓN (R) Nº 113/15','60/18','2019-05-16 00:00:00',5,4,'Sin Observaciones','2018-07-03 00:00:00','2019-07-03 00:00:00','Abierto','Simple',NULL,'2018-06-03 23:07:39','2018-06-03 23:07:39',NULL);
/*!40000 ALTER TABLE `concursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concursosjurados`
--

DROP TABLE IF EXISTS `concursosjurados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concursosjurados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) NOT NULL,
  `jurado_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nivel` enum('Interno','Externo') NOT NULL COMMENT '1 = INTERNO\n2 = EXTERNO',
  `tipo` enum('Titular','Suplente') NOT NULL COMMENT '1 = TITULAR\n2 = SUPLENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `concurso_id` (`concurso_id`),
  KEY `jurado_id` (`jurado_id`),
  KEY `concursosjurados_ibfk_3_idx` (`categoria_id`),
  CONSTRAINT `concursosjurados_ibfk_1` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `concursosjurados_ibfk_2` FOREIGN KEY (`jurado_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `concursosjurados_ibfk_3` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concursosjurados`
--

LOCK TABLES `concursosjurados` WRITE;
/*!40000 ALTER TABLE `concursosjurados` DISABLE KEYS */;
INSERT INTO `concursosjurados` VALUES (1,1,109,5,'Interno','Suplente','2018-06-04 01:22:21','2018-07-01 21:37:55',NULL),(2,1,1,2,'Interno','Titular','2018-07-01 21:30:59','2018-07-01 21:30:59',NULL),(3,1,108,2,'Externo','Suplente','2018-07-01 21:37:34','2018-07-01 21:38:02','2018-07-01 21:38:02'),(4,1,111,1,'Externo','Titular','2018-07-01 23:53:07','2018-07-01 23:53:07',NULL);
/*!40000 ALTER TABLE `concursosjurados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concursospostulantes`
--

DROP TABLE IF EXISTS `concursospostulantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concursospostulantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) NOT NULL,
  `postulante_id` int(11) NOT NULL,
  `fechaPresentacion` datetime DEFAULT NULL,
  `tipo` enum('Postulante','Aspirante') NOT NULL COMMENT '1=POSTULANTE\n2=ASPIRANTE',
  `ordenMerito` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_concurso_id` (`concurso_id`) USING BTREE,
  KEY `fk_postulante_id` (`postulante_id`) USING BTREE,
  CONSTRAINT `concursospostulantes_ibfk_1` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `concursospostulantes_ibfk_2` FOREIGN KEY (`postulante_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concursospostulantes`
--

LOCK TABLES `concursospostulantes` WRITE;
/*!40000 ALTER TABLE `concursospostulantes` DISABLE KEYS */;
INSERT INTO `concursospostulantes` VALUES (2,1,3,'2018-06-07 00:00:00','Postulante',NULL,'2018-06-04 02:29:54','2018-06-04 02:29:54',NULL),(3,1,236,'2018-07-01 00:00:00','Aspirante',NULL,'2018-07-01 21:54:44','2018-07-01 21:56:40','2018-07-01 21:56:40'),(4,1,3,'2018-07-19 00:00:00','Postulante',NULL,'2018-07-01 23:52:47','2018-07-01 23:52:47',NULL);
/*!40000 ALTER TABLE `concursospostulantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutos`
--

DROP TABLE IF EXISTS `institutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutos`
--

LOCK TABLES `institutos` WRITE;
/*!40000 ALTER TABLE `institutos` DISABLE KEYS */;
INSERT INTO `institutos` VALUES (1,'Instituto de Ciencias de la Salud','2018-05-31 03:38:37','2018-05-31 03:38:37',NULL),(2,'Instituto de Ciencias Sociales y Administración','2018-05-31 03:41:59','2018-05-31 03:41:59',NULL),(3,'Instituto de Ingeniería y Agronomía','2018-05-31 03:42:12','2018-05-31 03:42:12',NULL),(4,'Instituto de Estudios Iniciales','2018-05-31 03:42:22','2018-05-31 03:42:22',NULL);
/*!40000 ALTER TABLE `institutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `llamados`
--

DROP TABLE IF EXISTS `llamados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `llamados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) NOT NULL,
  `año` year(4) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `llamados`
--

LOCK TABLES `llamados` WRITE;
/*!40000 ALTER TABLE `llamados` DISABLE KEYS */;
INSERT INTO `llamados` VALUES (1,'68F47',2018,'2017-09-29 12:37:54','2017-12-26 19:31:08',NULL,NULL,NULL),(2,'23C7D',2018,'2018-07-10 14:32:42','2019-03-30 15:11:58',NULL,NULL,NULL),(3,'A0AB9',2017,'2018-01-10 13:39:03','2019-04-30 23:58:15',NULL,NULL,NULL),(4,'29C21',2019,'2019-02-15 23:28:06','2018-03-01 14:34:18',NULL,NULL,NULL),(5,'9ED1E',2018,'2017-11-17 15:08:05','2018-08-23 09:49:37',NULL,NULL,NULL),(6,'28C23',2017,'2018-03-06 07:12:47','2018-06-07 14:00:23',NULL,NULL,NULL),(7,'59A75',2018,'2018-09-24 12:08:05','2017-12-11 07:09:32',NULL,NULL,NULL),(8,'2A4BB',2017,'2018-05-09 00:58:55','2018-05-28 03:41:59',NULL,NULL,NULL),(9,'FD24A',2018,'2017-10-08 15:31:34','2017-11-04 08:12:38',NULL,NULL,NULL),(10,'906BE',2018,'2019-01-03 20:14:50','2019-03-03 17:55:47',NULL,NULL,NULL),(11,'B75FF',2019,'2018-10-21 06:20:01','2018-05-12 05:09:15',NULL,NULL,NULL),(12,'46075',2018,'2018-12-03 22:45:24','2018-10-20 20:34:49',NULL,NULL,NULL),(13,'BD337',2019,'2017-12-23 19:12:53','2018-07-16 00:46:04',NULL,NULL,NULL),(14,'CDA85',2018,'2017-09-20 03:37:53','2017-06-05 09:32:32',NULL,NULL,NULL),(15,'E0BA6',2018,'2018-03-29 22:20:19','2018-04-17 08:00:08',NULL,NULL,NULL),(16,'7F286',2018,'2018-10-30 07:51:55','2017-08-18 14:26:44',NULL,NULL,NULL),(17,'E8F22',2018,'2018-03-29 13:12:03','2018-03-08 10:31:18',NULL,NULL,NULL),(18,'27C6C',2017,'2019-01-13 09:16:49','2018-01-22 15:23:18',NULL,NULL,NULL),(19,'47E76',2018,'2017-09-27 23:45:18','2018-12-16 02:43:48',NULL,NULL,NULL),(20,'F3BF9',2018,'2018-07-19 20:36:08','2018-03-29 07:59:46',NULL,NULL,NULL),(21,'672B7',2018,'2017-06-13 18:45:36','2017-07-02 12:13:42',NULL,NULL,NULL),(22,'B36EF',2019,'2019-05-24 06:48:23','2018-05-19 20:33:39',NULL,NULL,NULL),(23,'A9569',2018,'2019-05-25 03:20:47','2018-02-24 23:34:34',NULL,NULL,NULL),(24,'68AB6',2017,'2017-09-05 10:12:08','2017-09-17 12:33:55',NULL,NULL,NULL),(25,'A9A33',2019,'2019-01-01 13:27:31','2017-12-24 00:10:16',NULL,NULL,NULL),(26,'70C74',2017,'2018-09-14 12:40:36','2018-11-06 20:43:58',NULL,NULL,NULL),(27,'E3044',2018,'2017-10-03 05:02:25','2017-07-18 02:01:28',NULL,NULL,NULL),(28,'8BDEF',2018,'2017-07-05 06:15:03','2018-04-28 19:38:09',NULL,NULL,NULL),(29,'16FB6',2018,'2018-05-20 01:16:40','2017-06-03 03:59:35',NULL,NULL,NULL),(30,'2B101',2017,'2017-06-02 20:39:41','2019-04-18 21:02:40',NULL,NULL,NULL),(31,'73320',2017,'2017-09-20 03:39:13','2018-07-26 04:45:43',NULL,NULL,NULL),(32,'D7C0D',2018,'2017-11-03 00:34:24','2019-04-23 13:38:06',NULL,NULL,NULL),(33,'AF71C',2017,'2018-05-20 15:05:09','2019-05-25 14:23:14',NULL,NULL,NULL),(34,'ACED2',2018,'2018-11-08 17:24:50','2018-06-22 01:44:44',NULL,NULL,NULL),(35,'FEAFD',2018,'2018-12-04 06:09:49','2017-07-29 01:58:25',NULL,NULL,NULL),(36,'40808',2017,'2018-02-09 00:52:42','2018-07-23 08:15:19',NULL,NULL,NULL),(37,'A3741',2019,'2018-04-26 12:11:45','2018-03-17 10:07:31',NULL,NULL,NULL),(38,'26CAA',2019,'2017-09-17 14:20:24','2019-03-24 12:31:57',NULL,NULL,NULL),(39,'6C0FD',2017,'2017-12-05 11:36:07','2018-03-28 05:50:05',NULL,NULL,NULL),(40,'DC2CB',2018,'2018-11-10 00:10:30','2019-02-12 23:24:14',NULL,NULL,NULL),(41,'0A756',2019,'2018-11-28 11:29:37','2018-04-03 04:02:58',NULL,NULL,NULL),(42,'AD7CC',2018,'2017-07-25 14:14:56','2018-10-13 07:11:53',NULL,NULL,NULL),(43,'2B82F',2018,'2018-04-01 00:44:48','2017-07-18 14:41:24',NULL,NULL,NULL),(44,'B84A9',2017,'2018-05-07 08:01:02','2017-09-04 14:19:21',NULL,NULL,NULL),(45,'9991F',2019,'2018-12-15 16:01:29','2018-02-01 16:41:29',NULL,NULL,NULL),(46,'22DEF',2017,'2019-03-23 18:50:20','2018-02-01 06:35:03',NULL,NULL,NULL),(47,'283C0',2017,'2017-10-10 08:31:23','2017-08-19 20:20:15',NULL,NULL,NULL),(48,'9D60F',2018,'2018-10-30 02:43:24','2019-03-30 21:52:10',NULL,NULL,NULL),(49,'D8A00',2018,'2018-11-28 18:49:07','2017-07-25 15:15:44',NULL,NULL,NULL),(50,'F6CA0',2017,'2017-10-15 21:41:48','2018-04-21 07:01:55',NULL,NULL,NULL),(51,'BA366',2019,'2017-06-05 19:13:31','2019-04-02 04:10:45',NULL,NULL,NULL),(52,'E3EEA',2018,'2017-12-17 21:38:50','2018-04-20 00:57:26',NULL,NULL,NULL),(53,'BBAB5',2018,'2018-03-26 11:15:39','2018-01-16 00:42:34',NULL,NULL,NULL),(54,'C6485',2017,'2017-08-30 06:19:29','2018-10-16 22:17:45',NULL,NULL,NULL),(55,'333EE',2018,'2017-08-10 19:44:51','2018-05-03 12:42:56',NULL,NULL,NULL),(56,'A1278',2018,'2018-04-02 13:03:07','2017-09-13 09:54:27',NULL,NULL,NULL),(57,'64BD2',2019,'2017-06-27 05:31:14','2017-09-24 17:47:51',NULL,NULL,NULL),(58,'8CAD3',2018,'2019-04-22 23:15:06','2018-05-01 22:58:29',NULL,NULL,NULL),(59,'C2CA6',2017,'2017-09-11 16:10:47','2019-02-12 08:17:52',NULL,NULL,NULL),(60,'89DC0',2017,'2019-02-10 08:11:15','2018-08-25 11:13:01',NULL,NULL,NULL),(61,'366F1',2017,'2017-12-28 00:03:22','2018-11-04 19:30:27',NULL,NULL,NULL),(62,'BB29E',2018,'2018-01-31 20:15:50','2018-12-31 01:04:54',NULL,NULL,NULL),(63,'90B9E',2017,'2018-08-04 19:08:30','2019-05-26 01:07:48',NULL,NULL,NULL),(64,'EB19F',2017,'2018-10-31 10:38:03','2018-08-25 10:12:02',NULL,NULL,NULL),(65,'2DB8D',2017,'2018-11-02 15:57:21','2017-09-30 16:20:36',NULL,NULL,NULL),(66,'B04E0',2018,'2017-07-30 07:26:47','2019-03-12 06:48:37',NULL,NULL,NULL),(67,'DAE3F',2018,'2017-12-08 15:09:10','2018-01-22 01:12:16',NULL,NULL,NULL),(68,'B9D6F',2017,'2018-04-29 11:08:10','2018-12-28 16:51:50',NULL,NULL,NULL),(69,'3C718',2018,'2019-02-27 11:19:13','2019-04-14 12:46:26',NULL,NULL,NULL),(70,'CADEC',2018,'2018-11-30 07:29:11','2018-11-10 09:22:22',NULL,NULL,NULL),(71,'59C4C',2019,'2019-01-24 14:18:39','2018-03-03 18:56:32',NULL,NULL,NULL),(72,'2029E',2017,'2019-02-02 06:26:13','2018-06-12 08:21:24',NULL,NULL,NULL),(73,'2F548',2017,'2018-08-23 08:30:42','2018-09-22 10:39:27',NULL,NULL,NULL),(74,'61349',2018,'2018-09-17 13:06:04','2018-03-06 16:47:53',NULL,NULL,NULL),(75,'7226A',2018,'2018-01-22 21:52:47','2018-08-31 09:08:50',NULL,NULL,NULL),(76,'4DA52',2019,'2017-06-20 07:39:06','2018-11-01 04:00:40',NULL,NULL,NULL),(77,'283BC',2019,'2017-07-30 13:16:28','2018-10-13 23:27:30',NULL,NULL,NULL),(78,'270AA',2018,'2017-09-28 17:02:16','2017-07-10 17:23:09',NULL,NULL,NULL),(79,'7E85D',2018,'2019-04-07 10:55:36','2017-08-28 13:05:46',NULL,NULL,NULL),(80,'C4EBE',2018,'2018-12-27 00:28:52','2019-03-22 22:44:54',NULL,NULL,NULL),(81,'284C7',2019,'2018-02-04 13:06:46','2018-09-23 02:43:55',NULL,NULL,NULL),(82,'0216C',2018,'2018-01-25 21:01:58','2018-06-12 15:03:20',NULL,NULL,NULL),(83,'CD3E1',2018,'2018-10-03 11:57:32','2018-03-15 19:12:09',NULL,NULL,NULL),(84,'C6830',2018,'2018-10-13 21:36:45','2018-08-16 11:10:17',NULL,NULL,NULL),(85,'644A8',2017,'2019-05-17 21:21:00','2018-06-26 14:43:29',NULL,NULL,NULL),(86,'C6877',2019,'2018-06-24 03:21:25','2017-10-05 15:31:16',NULL,NULL,NULL),(87,'F69A5',2018,'2018-09-21 18:16:06','2018-09-18 15:51:34',NULL,NULL,NULL),(88,'E4968',2017,'2018-03-30 22:05:07','2018-04-19 19:29:40',NULL,NULL,NULL),(89,'6D3CF',2018,'2018-12-07 11:15:22','2018-05-07 03:30:22',NULL,NULL,NULL),(90,'D8363',2019,'2019-05-22 18:20:41','2017-08-24 11:27:30',NULL,NULL,NULL),(91,'D7B7F',2018,'2019-01-03 13:00:36','2017-12-01 21:10:41',NULL,NULL,NULL),(92,'B8C2B',2017,'2019-03-13 07:20:59','2018-07-16 06:46:15',NULL,NULL,NULL),(93,'28586',2018,'2018-08-31 23:11:49','2019-04-06 04:01:16',NULL,NULL,NULL),(94,'25B2C',2018,'2017-12-29 09:53:10','2018-04-30 01:52:23',NULL,NULL,NULL),(95,'D1E14',2018,'2018-12-01 19:57:43','2018-05-11 09:11:13',NULL,NULL,NULL),(96,'07CC7',2018,'2019-03-25 22:19:08','2018-02-27 11:12:50',NULL,NULL,NULL),(97,'589F8',2018,'2017-09-07 13:56:10','2018-10-01 19:13:13',NULL,NULL,NULL),(98,'5C108',2019,'2018-08-14 08:33:46','2018-08-30 14:46:21',NULL,NULL,NULL),(99,'E954F',2019,'2018-12-30 02:18:47','2019-04-17 14:15:15',NULL,NULL,NULL),(100,'78828',2019,'2018-01-09 12:11:02','2018-12-31 21:25:21',NULL,NULL,NULL);
/*!40000 ALTER TABLE `llamados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `llamadosconcursos`
--

DROP TABLE IF EXISTS `llamadosconcursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `llamadosconcursos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `llamado_id` int(11) NOT NULL,
  `concurso_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `llamado_id` (`llamado_id`),
  KEY `concurso_id` (`concurso_id`),
  CONSTRAINT `llamadosconcursos_ibfk_1` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`),
  CONSTRAINT `llamadosconcursos_ibfk_2` FOREIGN KEY (`llamado_id`) REFERENCES `llamados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `llamadosconcursos`
--

LOCK TABLES `llamadosconcursos` WRITE;
/*!40000 ALTER TABLE `llamadosconcursos` DISABLE KEYS */;
INSERT INTO `llamadosconcursos` VALUES (1,2,1,'2018-06-04 05:44:58','2018-06-04 05:44:58',NULL);
/*!40000 ALTER TABLE `llamadosconcursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` enum('Creacion','Modificacion','Eliminacion') NOT NULL,
  `fecha` datetime NOT NULL,
  `tabla` enum('Concursos','ConcursosPostulantes','ConcursosJurados') NOT NULL COMMENT 'Entidad creada,modificada o eliminada.\n\n1 = CONCURSOS\n2 = CONCURSOSPOSTULANTES\n3 = CONCURSOSJURADOS',
  `item_id` int(11) DEFAULT NULL COMMENT 'Id del item creado, modificado o eliminado.\nEste ID depende de la columna ''Tabla'', ej: Si la tabla es "Concursos" entonces id_item = id del concurso.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_05_31_001202_crud',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `token_UNIQUE` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('silvalilian662@gmail.com','$2y$10$L4XlX0EyBJQa1lfLDj.cReVacrn3Ajydn87Zmjwr2dPeJhhFfzXAe','2018-06-04 08:13:36');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Docencia','2018-06-01 04:14:19','2018-06-01 04:14:19',NULL),(2,'Docencia e invenstigación','2018-06-01 04:14:51','2018-06-01 04:14:51',NULL),(3,'Docencia , vinculación y desempeño profesional','2018-06-01 04:15:25','2018-06-01 04:15:25',NULL);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tipo` enum('Postulante','Jurado') NOT NULL DEFAULT 'Postulante',
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Yasir','Vásquez',NULL,'(439) 207-4792','(730) 237-3763','a.arcu.Sed@lorem.com','772-9090 Malesuada Rd.',NULL,NULL,NULL,'Postulante'),(2,'Cody','Orellana',NULL,'(384) 495-3689','(775) 596-8673','Duis.sit@imperdiet.org','482-1348 Ipsum Street',NULL,NULL,NULL,'Postulante'),(3,'William','Rodríguez',NULL,'(640) 740-9064','(817) 118-1508','urna.nec@molestiesodales.net','P.O. Box 540, 7681 Enim St.',NULL,NULL,NULL,'Postulante'),(4,'Henry','Bustos',NULL,'(944) 758-7281','(674) 382-2636','metus.sit@dui.org','P.O. Box 938, 8469 Velit. St.',NULL,NULL,NULL,'Postulante'),(5,'Tiger','Yáñez',NULL,'(900) 979-4919','(153) 516-7713','velit.justo.nec@Vivamusnon.edu','9420 Nunc Rd.',NULL,NULL,NULL,'Postulante'),(6,'Byron','Valenzuela',NULL,'(353) 513-0086','(477) 832-4841','volutpat.ornare@duisemperet.co.uk','Ap #382-5527 Quisque Avenue',NULL,NULL,NULL,'Postulante'),(7,'Todd','Zúñiga',NULL,'(275) 526-5038','(882) 861-5609','Cras.sed@aliquet.com','835-5001 Non Avenue',NULL,NULL,NULL,'Postulante'),(8,'Burke','San Martín',NULL,'(532) 189-2226','(706) 289-1449','Donec@turpisegestas.co.uk','5714 Risus, Av.',NULL,NULL,NULL,'Postulante'),(9,'Thane','Vargas',NULL,'(145) 335-9359','(273) 548-8410','mauris.sapien@iaculis.net','Ap #258-4797 Vehicula Rd.',NULL,NULL,NULL,'Postulante'),(10,'Ulysses','Venegas',NULL,'(170) 658-2228','(987) 162-3362','enim@lobortis.net','9211 Cursus Avenue',NULL,NULL,NULL,'Postulante'),(11,'Kermit','Farías',NULL,'(508) 921-5577','(832) 213-0681','tristique.senectus@Crasvulputate.ca','P.O. Box 268, 8673 Nisi Avenue',NULL,NULL,NULL,'Postulante'),(12,'Jermaine','Godoy',NULL,'(932) 277-2646','(282) 954-8526','eleifend.egestas.Sed@nonummy.ca','4774 Dapibus Rd.',NULL,NULL,NULL,'Postulante'),(13,'Michael','Donoso',NULL,'(941) 823-2955','(355) 109-3945','sed.hendrerit.a@orciPhasellus.net','916-740 Eleifend. Street',NULL,NULL,NULL,'Postulante'),(14,'Channing','Sepúlveda',NULL,'(361) 770-9132','(360) 991-8310','Nunc.laoreet.lectus@elit.edu','642-7961 Donec St.',NULL,NULL,NULL,'Postulante'),(15,'Howard','Parra',NULL,'(595) 981-6469','(663) 304-4995','dictum@inceptos.org','P.O. Box 136, 9215 Non Rd.',NULL,NULL,NULL,'Postulante'),(16,'Robert','Sánchez',NULL,'(565) 153-7174','(860) 453-4461','vestibulum.lorem@elitpharetraut.edu','P.O. Box 481, 9694 Bibendum Rd.',NULL,NULL,NULL,'Postulante'),(17,'Cadman','Flores',NULL,'(195) 993-9213','(546) 575-9536','arcu.imperdiet.ullamcorper@velit.edu','651-8646 Consequat, Ave',NULL,NULL,NULL,'Postulante'),(18,'Samuel','Molina',NULL,'(508) 620-6486','(712) 260-5332','lorem.vitae.odio@ipsumdolorsit.com','Ap #228-467 Interdum. Road',NULL,NULL,NULL,'Postulante'),(19,'Grant','Paredes',NULL,'(470) 611-5594','(999) 108-5894','hymenaeos.Mauris@nunc.org','627-3995 Libero St.',NULL,NULL,NULL,'Postulante'),(20,'Phelan','Salazar',NULL,'(806) 831-9614','(490) 376-3452','aliquam@consectetueradipiscing.net','Ap #768-9883 Sed St.',NULL,NULL,NULL,'Postulante'),(21,'Berk','Vega',NULL,'(829) 875-6274','(755) 780-8709','sit.amet@mollisIntegertincidunt.co.uk','860-9319 Praesent Avenue',NULL,NULL,NULL,'Postulante'),(22,'Porter','Riquelme',NULL,'(636) 607-2044','(772) 792-0873','diam@nonbibendumsed.ca','780-413 Velit Street',NULL,NULL,NULL,'Postulante'),(23,'Nash','Ortega',NULL,'(385) 354-6793','(450) 348-1364','est.vitae.sodales@quislectus.com','7791 Egestas Rd.',NULL,NULL,NULL,'Postulante'),(24,'Jakeem','Morales',NULL,'(808) 813-5330','(698) 857-1587','non.enim.Mauris@elitdictumeu.co.uk','856-2743 Eleifend. Street',NULL,NULL,NULL,'Postulante'),(25,'Forrest','Jiménez',NULL,'(220) 823-2294','(827) 115-2163','justo.faucibus.lectus@ultriciesadipiscingenim.co.uk','P.O. Box 685, 6268 Magna Rd.',NULL,NULL,NULL,'Postulante'),(26,'Ronan','Sáez',NULL,'(907) 868-5205','(756) 147-8828','non.dui.nec@acturpis.co.uk','3409 Nisl St.',NULL,NULL,NULL,'Postulante'),(27,'Thane','Gómez',NULL,'(673) 658-4063','(141) 775-1187','eleifend.Cras.sed@urna.ca','P.O. Box 820, 2301 Luctus Street',NULL,NULL,NULL,'Postulante'),(28,'Lionel','Escobar',NULL,'(349) 726-0770','(403) 170-5126','Vivamus.nisi.Mauris@orci.ca','Ap #374-4288 Aliquam Avenue',NULL,NULL,NULL,'Postulante'),(29,'Damian','Sepúlveda',NULL,'(357) 216-2589','(757) 198-0653','Donec.est.mauris@metusurna.com','Ap #573-193 Nec Ave',NULL,NULL,NULL,'Postulante'),(30,'Griffin','Riquelme',NULL,'(877) 780-5629','(835) 462-2738','Nunc@vulputateullamcorpermagna.co.uk','762-7471 Mauris Road',NULL,NULL,NULL,'Postulante'),(31,'Hunter','Alarcón',NULL,'(315) 619-5537','(649) 320-2546','nisl.Maecenas.malesuada@lectuspedeultrices.org','686-4204 Nunc Avenue',NULL,NULL,NULL,'Postulante'),(32,'Reece','Yáñez',NULL,'(549) 574-4386','(325) 457-0648','quam@veliteusem.net','P.O. Box 854, 5096 Sem, Street',NULL,NULL,NULL,'Postulante'),(33,'Arden','Ramírez',NULL,'(823) 907-5668','(479) 844-1438','ultrices@arcuimperdiet.co.uk','407-4806 Proin St.',NULL,NULL,NULL,'Postulante'),(34,'Price','Godoy',NULL,'(888) 485-1907','(158) 715-1909','Nunc.sed@Donec.edu','Ap #298-6174 Adipiscing. Ave',NULL,NULL,NULL,'Postulante'),(35,'Hoyt','Riquelme',NULL,'(722) 536-4602','(103) 654-0720','Etiam.ligula.tortor@Donec.co.uk','592-3094 At, Ave',NULL,NULL,NULL,'Postulante'),(36,'Myles','Hernández',NULL,'(207) 401-9601','(964) 209-2501','sed.est.Nunc@sitamet.org','7577 Cursus, Avenue',NULL,NULL,NULL,'Postulante'),(37,'Blaze','Rojas',NULL,'(392) 382-4031','(789) 972-0110','non.sapien.molestie@ultriciessemmagna.co.uk','Ap #441-4296 Cursus. Ave',NULL,NULL,NULL,'Postulante'),(38,'Adam','Vargas','36645','(841) 370-3252','(520) 151-8496','hendrerit.Donec.porttitor@cursusin.edu','465-667 Posuere St.',NULL,'2018-07-01 19:49:33',NULL,'Postulante'),(39,'Ira','Alvarado',NULL,'(496) 499-7634','(783) 615-3131','Praesent.eu.nulla@Nunc.com','145-6173 Diam. Rd.',NULL,NULL,NULL,'Postulante'),(40,'Joseph','Bustos',NULL,'(294) 283-9189','(100) 643-4168','Nullam@Integervulputate.net','7577 Penatibus Rd.',NULL,NULL,NULL,'Postulante'),(41,'Howard','Cortés',NULL,'(181) 913-7812','(639) 216-4790','lacinia.vitae.sodales@dui.net','2527 Eu Ave',NULL,NULL,NULL,'Postulante'),(42,'Elliott','Valdés',NULL,'(645) 183-1480','(183) 241-7183','ornare.sagittis.felis@portaelit.net','Ap #150-2080 At Avenue',NULL,NULL,NULL,'Postulante'),(43,'Malachi','Díaz',NULL,'(697) 611-0693','(250) 862-5291','ligula.Aenean.euismod@et.org','5129 Duis St.',NULL,NULL,NULL,'Postulante'),(44,'Lee','Castillo',NULL,'(888) 748-5042','(156) 217-2217','Fusce@nisl.edu','6537 Diam Av.',NULL,NULL,NULL,'Postulante'),(45,'Nolan','Aguilera',NULL,'(668) 563-0020','(936) 658-2162','metus.Aenean.sed@massalobortis.com','3488 Risus St.',NULL,NULL,NULL,'Postulante'),(46,'Hyatt','Flores',NULL,'(350) 826-4425','(990) 917-7206','Etiam.laoreet@mollisDuis.ca','986-5752 Pede. Road',NULL,NULL,NULL,'Postulante'),(47,'Carl','Romero',NULL,'(312) 837-1185','(963) 967-1963','ut.odio@Duismi.com','P.O. Box 128, 893 Dolor. Av.',NULL,NULL,NULL,'Postulante'),(48,'Melvin','Saavedra',NULL,'(137) 959-7557','(831) 973-5706','quam.Curabitur@laciniavitaesodales.ca','P.O. Box 517, 907 Lorem Street',NULL,NULL,NULL,'Postulante'),(49,'Flynn','Araya',NULL,'(394) 268-7863','(267) 149-9878','lacus.Mauris.non@Praesent.co.uk','Ap #996-6028 Integer St.',NULL,NULL,NULL,'Postulante'),(50,'Rahim','Valdés',NULL,'(572) 234-8308','(121) 393-3052','diam@sagittisNullamvitae.net','P.O. Box 824, 127 Sagittis Avenue',NULL,NULL,NULL,'Postulante'),(51,'Driscoll','Castro',NULL,'(284) 178-0483','(674) 182-3437','pellentesque.eget.dictum@ultricies.ca','784-1887 Malesuada Road',NULL,NULL,NULL,'Postulante'),(52,'Christian','Pizarro',NULL,'(637) 834-5423','(672) 973-7401','arcu.vel@ametloremsemper.ca','P.O. Box 640, 1569 Nec, Street',NULL,NULL,NULL,'Postulante'),(53,'Eric','Pérez',NULL,'(420) 594-5424','(608) 896-5544','fermentum.metus@Mauris.co.uk','Ap #219-9729 In Ave',NULL,NULL,NULL,'Postulante'),(54,'Mannix','Hernández',NULL,'(302) 992-4200','(228) 216-4242','Donec.sollicitudin@commodohendreritDonec.ca','P.O. Box 403, 8529 Netus Ave',NULL,NULL,NULL,'Postulante'),(55,'Branden','Jiménez',NULL,'(874) 515-7612','(888) 988-9703','vel@nonluctussit.org','422-7469 Ut Av.',NULL,NULL,NULL,'Postulante'),(56,'Merritt','Vidal',NULL,'(100) 866-6368','(722) 270-8655','porttitor.eros@odioNaminterdum.edu','424-4079 Tellus Rd.',NULL,NULL,NULL,'Postulante'),(57,'Hop','Navarrete',NULL,'(533) 393-0989','(174) 581-7969','tristique.ac.eleifend@eros.com','7823 Cras St.',NULL,NULL,NULL,'Postulante'),(58,'Garth','Moreno',NULL,'(282) 169-2310','(932) 338-1024','felis.orci.adipiscing@sollicitudinorci.edu','Ap #382-9433 Gravida Road',NULL,NULL,NULL,'Postulante'),(59,'Gary','Paredes',NULL,'(546) 204-9191','(685) 422-4598','sollicitudin.adipiscing.ligula@nostraperinceptos.org','Ap #460-3775 Nec Road',NULL,NULL,NULL,'Postulante'),(60,'Elton','Rivera',NULL,'(555) 867-7015','(332) 767-8239','nunc.nulla.vulputate@eu.co.uk','Ap #414-4936 Donec Rd.',NULL,NULL,NULL,'Postulante'),(61,'Rigel','Fuentes',NULL,'(264) 645-6512','(639) 453-3984','Integer@ut.org','3688 Tempor Rd.',NULL,NULL,NULL,'Postulante'),(62,'Jameson','Ortiz',NULL,'(780) 340-9646','(363) 508-6354','diam.at@Namacnulla.net','6135 Sed Street',NULL,NULL,NULL,'Postulante'),(63,'Ulysses','Ortiz',NULL,'(118) 798-9013','(826) 606-5910','mi.lacinia.mattis@tinciduntvehicula.edu','356-3497 Egestas. Rd.',NULL,NULL,NULL,'Postulante'),(64,'Dieter','Bustos',NULL,'(695) 478-8617','(483) 255-7511','elit@acarcu.co.uk','Ap #280-1889 Sodales Rd.',NULL,NULL,NULL,'Postulante'),(65,'Brendan','Salinas',NULL,'(813) 568-7446','(884) 492-3230','at@purusactellus.net','7392 Purus St.',NULL,NULL,NULL,'Postulante'),(66,'Emmanuel','Ortega',NULL,'(111) 755-1057','(989) 513-3769','ac.mattis.semper@egetvolutpatornare.org','Ap #651-5476 Mollis. Rd.',NULL,NULL,NULL,'Postulante'),(67,'Stewart','Díaz',NULL,'(583) 518-1145','(429) 311-5719','eget@odioapurus.net','P.O. Box 247, 2131 Penatibus St.',NULL,NULL,NULL,'Postulante'),(68,'Jonas','Salazar',NULL,'(177) 676-3442','(642) 122-7094','tellus.eu@Sedetlibero.edu','138-540 Ipsum Road',NULL,NULL,NULL,'Postulante'),(69,'Jermaine','Jiménez',NULL,'(499) 434-6750','(882) 105-1225','rhoncus@ligulaAenean.com','4711 Dolor Rd.',NULL,NULL,NULL,'Postulante'),(70,'Evan','Medina',NULL,'(503) 350-6813','(932) 536-0104','lorem.eget@lobortis.com','Ap #180-242 Euismod St.',NULL,NULL,NULL,'Postulante'),(71,'Otto','Yáñez',NULL,'(813) 324-2440','(972) 370-6660','accumsan.sed@Nunc.net','876-9194 Turpis St.',NULL,NULL,NULL,'Postulante'),(72,'Merritt','Romero',NULL,'(503) 912-3800','(443) 539-4458','tempor.diam.dictum@elita.edu','P.O. Box 903, 3013 Sed St.',NULL,NULL,NULL,'Postulante'),(73,'Nash','Rivera',NULL,'(994) 754-8293','(193) 675-1535','aliquet@idblandit.ca','Ap #852-8451 Venenatis St.',NULL,NULL,NULL,'Postulante'),(74,'Addison','Miranda',NULL,'(961) 947-2988','(112) 772-7434','Nunc.sed.orci@Nuncmauriselit.org','7067 Turpis Rd.',NULL,NULL,NULL,'Postulante'),(75,'Jerry','Cárdenas',NULL,'(627) 507-3330','(395) 733-6580','Phasellus.nulla.Integer@lectus.co.uk','703 Vitae Street',NULL,NULL,NULL,'Postulante'),(76,'Sawyer','Moreno',NULL,'(966) 608-1780','(372) 516-7934','lorem@consequatlectussit.edu','P.O. Box 328, 510 Tincidunt St.',NULL,NULL,NULL,'Postulante'),(77,'Amal','Valenzuela',NULL,'(466) 589-2566','(304) 543-1830','ipsum.Suspendisse@velfaucibus.com','255-1400 Risus. Rd.',NULL,NULL,NULL,'Postulante'),(78,'Zeus','Castillo',NULL,'(123) 734-2027','(987) 977-2126','amet.dapibus.id@magnaSuspendissetristique.net','P.O. Box 923, 7006 Laoreet Rd.',NULL,NULL,NULL,'Postulante'),(79,'Edan','Parra',NULL,'(645) 455-5739','(411) 194-8913','arcu@In.ca','416-5077 Tortor Rd.',NULL,NULL,NULL,'Postulante'),(80,'Craig','Sepúlveda',NULL,'(992) 867-1384','(149) 286-8194','taciti.sociosqu@antedictumcursus.ca','Ap #558-7116 Facilisis, Rd.',NULL,NULL,NULL,'Postulante'),(81,'Maxwell','Guerrero',NULL,'(188) 286-8283','(284) 158-2793','mauris@liberoat.org','5625 Sed Rd.',NULL,NULL,NULL,'Postulante'),(82,'Darius','Flores',NULL,'(270) 843-6513','(640) 592-3695','lacinia@Quisque.net','P.O. Box 114, 9200 Cum Rd.',NULL,NULL,NULL,'Postulante'),(83,'Roth','Valdés',NULL,'(755) 248-3694','(392) 277-1823','et.magna.Praesent@semmolestie.ca','P.O. Box 115, 9693 Proin Road',NULL,NULL,NULL,'Postulante'),(84,'Carlos','Ortiz',NULL,'(952) 415-9428','(352) 851-6823','mauris.aliquam.eu@erat.edu','4443 Sed Av.',NULL,NULL,NULL,'Postulante'),(85,'Jacob','Torres',NULL,'(750) 347-8511','(464) 488-9812','nisi.magna.sed@massa.co.uk','Ap #719-8233 At Ave',NULL,NULL,NULL,'Postulante'),(86,'Ahmed','Rojas',NULL,'(751) 104-7451','(351) 614-8713','non.bibendum.sed@scelerisquelorem.org','835-9505 Consequat Street',NULL,NULL,NULL,'Postulante'),(87,'Jonas','Contreras',NULL,'(789) 809-1904','(158) 970-3018','Vivamus.nibh@ligula.co.uk','Ap #698-9240 Interdum Ave',NULL,NULL,NULL,'Postulante'),(88,'Jared','Álvarez',NULL,'(182) 292-1896','(642) 210-3676','Cras@purusactellus.ca','160 Class St.',NULL,NULL,NULL,'Postulante'),(89,'Jason','San Martín',NULL,'(592) 667-6437','(801) 258-2792','tempus@eleifendegestas.com','170-6582 Maecenas Road',NULL,NULL,NULL,'Postulante'),(90,'Jared','Bustamante',NULL,'(983) 905-5252','(307) 773-0098','lorem.eget@lorem.net','P.O. Box 140, 8319 Ridiculus Rd.',NULL,NULL,NULL,'Postulante'),(91,'Harlan','Fuentes',NULL,'(237) 608-8404','(693) 367-9165','velit.justo.nec@turpis.com','Ap #127-9555 Vivamus Ave',NULL,NULL,NULL,'Postulante'),(92,'Plato','Saavedra',NULL,'(725) 480-5075','(527) 389-2876','Etiam@Integervitaenibh.org','Ap #482-3374 Enim St.',NULL,NULL,NULL,'Postulante'),(93,'Kareem','Guerrero',NULL,'(915) 176-8418','(863) 280-4949','sem.mollis.dui@ametrisus.co.uk','342-7931 Penatibus Av.',NULL,NULL,NULL,'Postulante'),(94,'John','Carvajal',NULL,'(647) 606-6214','(663) 491-0671','et.magnis@hymenaeosMauris.net','2473 A Road',NULL,NULL,NULL,'Postulante'),(95,'Cruz','Carrasco',NULL,'(693) 545-4256','(763) 707-9420','vestibulum.lorem.sit@velit.edu','3349 Aliquet, Ave',NULL,NULL,NULL,'Postulante'),(96,'Barrett','Vidal',NULL,'(685) 502-2308','(683) 937-4357','Nunc.commodo@egestas.com','P.O. Box 846, 5989 Nec Street',NULL,NULL,NULL,'Postulante'),(97,'Mufutau','Morales',NULL,'(363) 943-9344','(921) 312-5415','dapibus.ligula.Aliquam@turpis.ca','4591 Ipsum Rd.',NULL,NULL,NULL,'Postulante'),(98,'Drake','Rivera',NULL,'(367) 766-0439','(800) 355-6255','ipsum.dolor@netuset.edu','Ap #675-4224 Nunc Road',NULL,NULL,NULL,'Postulante'),(99,'Yoshio','Escobar',NULL,'(230) 353-3105','(613) 473-3844','gravida.Praesent.eu@atpretium.edu','123-2366 Iaculis Rd.',NULL,NULL,NULL,'Postulante'),(108,'sapos','pepe','54235','4325','543','meme@gig.com','432','2018-07-01 20:10:43','2018-07-01 20:11:43',NULL,'Jurado'),(109,'Stephanie','Patel','12633060','(253) 702-6862','1648041337099','Nunc.lectus@venenatislacus.ca','Ap #904-6388 Morbi Road',NULL,NULL,NULL,'Jurado'),(110,'Alisa','Pickett','48366054','(578) 541-5134','1623040919599','Nullam.enim@sociisnatoquepenatibus.org','950-4171 Semper Rd.',NULL,NULL,NULL,'Jurado'),(111,'Lois','Woodward','47876730','(661) 702-8887','1643120783099','bibendum.fermentum@Aliquamauctor.ca','P.O. Box 812, 9821 Nunc Ave',NULL,NULL,NULL,'Jurado'),(112,'Dakota','Lambert','10274461','(649) 616-9683','1681032630999','ante@consectetueradipiscingelit.co.uk','3053 Massa Road',NULL,NULL,NULL,'Jurado'),(113,'Kendall','Britt','17790111','(510) 822-8916','1694080999899','Vestibulum@mollisdui.org','7276 Praesent Rd.',NULL,NULL,NULL,'Jurado'),(114,'Paula','Warren','16125512','(530) 863-1195','1678051537999','nec.ante@consequat.ca','P.O. Box 589, 1742 Sed, Rd.',NULL,NULL,NULL,'Jurado'),(115,'Genevieve','Richmond','30069623','(321) 304-5561','1671072170499','mauris.Suspendisse.aliquet@non.ca','P.O. Box 462, 7980 Eleifend St.',NULL,NULL,NULL,'Jurado'),(116,'Fredericka','Sykes','47625435','(525) 407-8557','1650051937899','condimentum.eget.volutpat@rhoncus.edu','P.O. Box 132, 3752 Nullam Street',NULL,NULL,NULL,'Jurado'),(117,'Urielle','Rice','41715399','(459) 494-6028','1627101060399','Duis@Mauris.edu','200-6705 Lorem St.',NULL,NULL,NULL,'Jurado'),(118,'Ignacia','Padilla','38167192','(321) 228-9496','1643022227599','montes@dictum.edu','983-341 Sed Road',NULL,NULL,NULL,'Jurado'),(119,'Aurora','Sims','50442485','(423) 987-6382','1659060134099','lorem@risus.org','P.O. Box 819, 3962 Ut St.',NULL,NULL,NULL,'Jurado'),(120,'Cassady','Baxter','28766220','(370) 162-9956','1668110283799','sagittis@Suspendisseac.com','870-5013 Est Rd.',NULL,NULL,NULL,'Jurado'),(121,'Hollee','Cantrell','26878115','(122) 535-1876','1631010258199','vestibulum.lorem@dui.com','Ap #972-3654 Elit. Road',NULL,NULL,NULL,'Jurado'),(122,'Marcia','Baird','13761636','(696) 887-2269','1626112099299','molestie@enimcommodohendrerit.ca','3175 Hendrerit Avenue',NULL,NULL,NULL,'Jurado'),(123,'Tara','Eaton','46375355','(601) 669-5466','1672052386599','tristique@parturientmontesnascetur.org','Ap #869-164 Ipsum Rd.',NULL,NULL,NULL,'Jurado'),(124,'Nita','Osborne','39144035','(949) 252-7990','1618021974799','parturient@laoreetipsumCurabitur.edu','P.O. Box 519, 8145 Sed Rd.',NULL,NULL,NULL,'Jurado'),(125,'Kyra','Avila','26196915','(599) 403-1525','1694100428799','placerat@nisi.edu','P.O. Box 885, 8551 Mauris Ave',NULL,NULL,NULL,'Jurado'),(126,'Candice','Floyd','35264515','(384) 955-0513','1659051068399','sagittis.lobortis@turpisnecmauris.co.uk','P.O. Box 864, 9177 Curae; Av.',NULL,NULL,NULL,'Jurado'),(127,'Rana','Dalton','41670479','(249) 337-2803','1682062016399','nulla.Integer@sit.co.uk','5662 Molestie Av.',NULL,NULL,NULL,'Jurado'),(128,'Teegan','Underwood','6091987','(205) 886-3648','1653022666399','tempus.eu.ligula@Crasdictum.co.uk','187-6528 Lorem St.',NULL,NULL,NULL,'Jurado'),(129,'Amena','Mcclure','22042188','(651) 725-8755','1668092741699','Sed.congue@Morbi.ca','P.O. Box 335, 563 Magna. Ave',NULL,NULL,NULL,'Jurado'),(130,'Zelenia','Doyle','36315310','(271) 280-1137','1651032795099','erat.volutpat@acturpisegestas.edu','P.O. Box 166, 2937 At, Av.',NULL,NULL,NULL,'Jurado'),(131,'Athena','Pate','9085714','(692) 703-8586','1624020734599','Morbi.neque.tellus@placerategetvenenatis.net','893-7548 Sociosqu Road',NULL,NULL,NULL,'Jurado'),(132,'Cassady','Melton','33800993','(717) 559-3656','1684042607999','nunc@ipsumleoelementum.ca','Ap #830-7082 Nam Road',NULL,NULL,NULL,'Jurado'),(133,'Nyssa','Benson','31580501','(269) 756-7421','1627062965399','vestibulum.Mauris.magna@metusInnec.net','388-7729 Nonummy Avenue',NULL,NULL,NULL,'Jurado'),(134,'Jorden','Tate','34142257','(432) 868-7277','1625052676299','a@risus.net','300-6259 Lacus. St.',NULL,NULL,NULL,'Jurado'),(135,'Mikayla','Mclean','34113705','(907) 675-4806','1687121526299','dignissim.lacus.Aliquam@feugiatplaceratvelit.ca','Ap #202-5291 Euismod Ave',NULL,NULL,NULL,'Jurado'),(136,'Galena','Goodwin','28734651','(100) 546-7520','1663060395999','lorem.Donec@turpisvitae.ca','914-1873 Mus. St.',NULL,NULL,NULL,'Jurado'),(137,'Zephr','Navarro','19068379','(365) 820-5541','1659022989899','lacinia.mattis.Integer@sedorci.co.uk','Ap #657-4891 Mus. Street',NULL,NULL,NULL,'Jurado'),(138,'Olga','Payne','6813443','(308) 125-0982','1678011712799','at@egetvolutpatornare.net','6898 Nunc Street',NULL,NULL,NULL,'Jurado'),(139,'Bianca','Mercer','45741179','(653) 165-9471','1633110184699','in@Cras.org','Ap #218-5509 Augue Road',NULL,NULL,NULL,'Jurado'),(140,'Sylvia','Potts','24903957','(390) 463-9126','1659040286099','blandit.Nam@Aliquamerat.com','257-1645 Sed Street',NULL,NULL,NULL,'Jurado'),(141,'Desiree','Norman','13493989','(564) 805-6623','1641012300699','arcu.Vestibulum@liberoDonec.co.uk','5366 Phasellus Av.',NULL,NULL,NULL,'Jurado'),(142,'Jordan','Moses','45218895','(776) 687-9979','1677070321599','Lorem.ipsum.dolor@vulputate.edu','536-9848 Euismod Avenue',NULL,NULL,NULL,'Jurado'),(143,'Frances','Gaines','35970832','(489) 709-2203','1641110777999','malesuada@diamnuncullamcorper.org','P.O. Box 978, 6469 Quam, Avenue',NULL,NULL,NULL,'Jurado'),(144,'Britanni','Griffith','43197266','(529) 961-3680','1602050515999','auctor.ullamcorper.nisl@lobortis.net','8562 Sem, St.',NULL,NULL,NULL,'Jurado'),(145,'Lani','Greer','12400319','(422) 857-3493','1612042714099','imperdiet.ullamcorper@semvitae.com','801-6547 Ut Avenue',NULL,NULL,NULL,'Jurado'),(146,'Mallory','Pitts','5239198','(786) 583-7801','1614061242699','ante@dolortempusnon.co.uk','Ap #964-1470 A, St.',NULL,NULL,NULL,'Jurado'),(147,'Lillith','Nieves','41430373','(769) 618-1605','1616052682099','tincidunt.Donec@dignissimlacus.net','267-4556 At, Av.',NULL,NULL,NULL,'Jurado'),(148,'Sylvia','Adams','45277068','(776) 614-3478','1677032570699','accumsan.convallis@a.edu','6241 Vitae Rd.',NULL,NULL,NULL,'Jurado'),(149,'Karina','Rowland','10912702','(532) 291-5970','1625021443999','nec.urna.suscipit@facilisisloremtristique.org','909-9781 Eu Ave',NULL,NULL,NULL,'Jurado'),(150,'Kaden','Shields','35517718','(818) 941-8462','1627060881499','Nunc.laoreet@Curabiturvel.org','5794 Aliquam Ave',NULL,NULL,NULL,'Jurado'),(151,'Leslie','Woodard','47959820','(422) 169-9271','1696120163599','tempus.non.lacinia@dictumeleifend.org','2981 Magna. St.',NULL,NULL,NULL,'Jurado'),(152,'Lareina','Hess','26693081','(212) 899-0710','1650081635299','blandit.congue@dolorsit.org','277-377 Justo. Ave',NULL,NULL,NULL,'Jurado'),(153,'Mollie','Rosa','29669986','(850) 624-7849','1622060412899','egestas@sociisnatoque.org','561-5740 Tempor Ave',NULL,NULL,NULL,'Jurado'),(154,'Heidi','Herman','27419131','(629) 462-0649','1632012094799','cursus@ipsumCurabitur.net','1073 Est, Rd.',NULL,NULL,NULL,'Jurado'),(155,'Jael','Noble','6528412','(198) 912-6671','1687122424599','nec.eleifend.non@magna.com','342-8783 Congue, St.',NULL,NULL,NULL,'Jurado'),(156,'Frances','Hobbs','32463464','(295) 859-6456','1674102881999','pede.nec.ante@massa.com','524-498 Consectetuer Av.',NULL,NULL,NULL,'Jurado'),(157,'Laura','Nixon','14628551','(785) 838-1888','1635051896599','risus.Donec@turpisnonenim.org','153-5566 Dolor, St.',NULL,NULL,NULL,'Jurado'),(158,'Ori','Murphy','39892981','(917) 194-2643','1653062812899','egestas.lacinia.Sed@imperdiet.com','Ap #529-9545 Nec, Ave',NULL,NULL,NULL,'Jurado'),(159,'Jael','York','10226830','(497) 498-0618','1614092269599','nulla@elita.org','6270 Sit Rd.',NULL,NULL,NULL,'Jurado'),(160,'Ivana','Maxwell','26685506','(801) 637-5974','1698021103899','odio@volutpatNulladignissim.ca','Ap #823-6827 Ac Street',NULL,NULL,NULL,'Jurado'),(161,'Catherine','Sheppard','38212093','(178) 766-0955','1641110962399','eu.arcu.Morbi@portaelita.com','P.O. Box 478, 3509 Pellentesque Av.',NULL,NULL,NULL,'Jurado'),(162,'Rhoda','Wilkins','10866711','(292) 706-5973','1657060894599','Donec.non@nonummyFusce.edu','9944 Orci. St.',NULL,NULL,NULL,'Jurado'),(163,'Echo','Adams','43772900','(867) 114-5544','1682071358099','eu.nibh@pedeultricesa.edu','P.O. Box 822, 122 Est. St.',NULL,NULL,NULL,'Jurado'),(164,'Stephanie','Shepherd','49327926','(515) 222-5034','1639052244899','aptent.taciti.sociosqu@lobortisquis.net','7088 Aliquam Rd.',NULL,NULL,NULL,'Jurado'),(165,'Idola','Cleveland','20702828','(130) 628-0825','1697012411499','magna.nec.quam@lacus.ca','162-8945 Eget Rd.',NULL,NULL,NULL,'Jurado'),(166,'Nicole','Jackson','16305396','(923) 854-9703','1639053020399','a@a.co.uk','423-7938 Tellus St.',NULL,NULL,NULL,'Jurado'),(167,'Victoria','Conrad','12025650','(231) 965-4778','1697072662899','Donec.egestas.Aliquam@pellentesquemassa.org','4810 Nec St.',NULL,NULL,NULL,'Jurado'),(168,'Nell','Goodman','21704665','(835) 906-7112','1618070295299','rutrum@vel.co.uk','244-7954 Sed Rd.',NULL,NULL,NULL,'Jurado'),(169,'Kyra','Weeks','6596598','(378) 607-1666','1687112981899','litora@lorem.org','9982 Vulputate Rd.',NULL,NULL,NULL,'Jurado'),(170,'Alexa','Vaughan','31927570','(948) 365-8241','1639022675799','Nullam.vitae.diam@estNunclaoreet.net','4058 Purus St.',NULL,NULL,NULL,'Jurado'),(171,'Frances','Lawrence','17880446','(888) 796-9469','1671020157099','Vestibulum@maurisid.org','355-3054 Luctus Ave',NULL,NULL,NULL,'Jurado'),(172,'Adria','Morris','47495947','(971) 386-6438','1627101884299','Aliquam@vitaesodalesnisi.org','Ap #566-8151 Consequat, Rd.',NULL,NULL,NULL,'Jurado'),(173,'Chava','Holman','37455302','(363) 965-2144','1606122916899','sed@Praesent.edu','Ap #179-2447 Dolor Avenue',NULL,NULL,NULL,'Jurado'),(174,'Ainsley','Orr','50715587','(517) 718-6063','1695071794699','Integer@aarcu.org','P.O. Box 709, 1079 In Road',NULL,NULL,NULL,'Jurado'),(175,'Kirestin','Byrd','31599552','(267) 731-6349','1640051958899','Phasellus.libero.mauris@Maecenas.org','4751 Tellus Av.',NULL,NULL,NULL,'Jurado'),(176,'Hadassah','Matthews','24523142','(866) 863-4809','1634012561599','pellentesque.tellus.sem@lacus.net','676-5597 Suspendisse Road',NULL,NULL,NULL,'Jurado'),(177,'Celeste','Parks','24269333','(664) 839-9948','1617071592699','egestas.Sed.pharetra@rhoncus.com','3940 Est Road',NULL,NULL,NULL,'Jurado'),(178,'Yoko','Sloan','5205348','(237) 831-8140','1635102439499','consequat@nascetur.ca','463-1616 Lorem Street',NULL,NULL,NULL,'Jurado'),(179,'Jordan','Hinton','38207095','(529) 923-9523','1640093075199','Quisque.purus.sapien@est.org','5025 Egestas Avenue',NULL,NULL,NULL,'Jurado'),(180,'Pamela','Barnett','42672586','(845) 148-4083','1620042867999','neque.Nullam@quislectus.co.uk','P.O. Box 313, 4766 Congue Rd.',NULL,NULL,NULL,'Jurado'),(181,'Jillian','Palmer','47515700','(574) 310-4825','1610062208199','Quisque@semelit.com','Ap #223-265 Eleifend Rd.',NULL,NULL,NULL,'Jurado'),(182,'Sybill','Porter','37159180','(246) 674-0589','1636070914799','Morbi@Donec.com','859-6872 Lacus. Rd.',NULL,NULL,NULL,'Jurado'),(183,'McKenzie','Campbell','40567171','(564) 101-3731','1610122461399','vitae.mauris.sit@fermentumfermentum.co.uk','546-7456 At, Av.',NULL,NULL,NULL,'Jurado'),(184,'Amanda','Cochran','33297450','(588) 506-2137','1616030668199','Duis.elementum.dui@magnaSedeu.org','Ap #250-865 Proin Road',NULL,NULL,NULL,'Jurado'),(185,'Holly','Schultz','43959018','(422) 410-5989','1602032488299','lacus.Nulla@quamafelis.org','692-4760 Morbi St.',NULL,NULL,NULL,'Jurado'),(186,'Britanney','Parsons','33707655','(551) 513-9110','1688012341799','Vestibulum.ante@nuncsed.org','Ap #809-7386 Nulla. Rd.',NULL,NULL,NULL,'Jurado'),(187,'Cassady','Frost','36296849','(463) 222-7447','1679120460999','a.tortor.Nunc@nunc.com','5448 Fames Street',NULL,NULL,NULL,'Jurado'),(188,'Whitney','Nelson','46070977','(463) 965-2015','1679022506499','dignissim@sapien.co.uk','7072 Auctor Rd.',NULL,NULL,NULL,'Jurado'),(189,'Justine','Nielsen','6648340','(190) 985-8140','1621081734799','laoreet@musProin.ca','4249 Urna. Av.',NULL,NULL,NULL,'Jurado'),(190,'Maryam','Bush','13890525','(544) 309-6663','1646072344499','nisi@eget.ca','Ap #157-1717 Aliquam Av.',NULL,NULL,NULL,'Jurado'),(191,'Reagan','Baird','19160300','(109) 583-6509','1627072376799','commodo.tincidunt.nibh@Maecenasornareegestas.com','Ap #297-8631 Mauris St.',NULL,NULL,NULL,'Jurado'),(192,'Karleigh','Cervantes','18930053','(195) 159-7252','1643052296799','mauris.sapien@nonbibendumsed.com','Ap #124-1814 Nulla Rd.',NULL,NULL,NULL,'Jurado'),(193,'Brianna','Hudson','12800499','(211) 106-5015','1667071409199','eget@elitpedemalesuada.com','Ap #501-6665 Enim. Street',NULL,NULL,NULL,'Jurado'),(194,'Aurelia','Paul','49297980','(515) 258-1037','1608010531999','tempus.lorem.fringilla@Morbi.com','P.O. Box 885, 7230 Massa. Street',NULL,NULL,NULL,'Jurado'),(195,'Ava','Morin','26602181','(315) 754-5753','1686030342199','venenatis.vel@nulla.edu','P.O. Box 407, 6226 Nec St.',NULL,NULL,NULL,'Jurado'),(196,'Daryl','York','12474699','(740) 827-3969','1638012827299','a.malesuada@vitaediam.co.uk','3211 Fusce Rd.',NULL,NULL,NULL,'Jurado'),(197,'Rinah','Solis','16141618','(149) 637-0409','1620100362899','neque@egestasnunc.co.uk','P.O. Box 797, 6967 Pede Ave',NULL,NULL,NULL,'Jurado'),(198,'Charlotte','Ramsey','10207848','(540) 743-0895','1641082812199','molestie.Sed.id@tellusSuspendisse.org','P.O. Box 699, 1778 Augue Avenue',NULL,NULL,NULL,'Jurado'),(199,'Charlotte','Fletcher','18077055','(125) 949-3494','1677101694399','ligula@adipiscing.net','Ap #820-4532 Auctor St.',NULL,NULL,NULL,'Jurado'),(200,'Nita','Landry','21697710','(216) 235-4295','1688020726899','Integer.in.magna@Aeneaneget.net','Ap #830-9654 Aliquam, Ave',NULL,NULL,NULL,'Jurado'),(201,'Ivy','Stone','15703243','(437) 983-8454','1657071123299','tempor.lorem.eget@malesuada.edu','P.O. Box 865, 9899 Cum Street',NULL,NULL,NULL,'Jurado'),(202,'Indigo','Larson','43345765','(588) 739-4904','1638072048999','ligula.Nullam.enim@famesac.co.uk','Ap #383-6586 Pretium Rd.',NULL,NULL,NULL,'Jurado'),(203,'Gisela','Chaney','22426550','(717) 222-6507','1684041203699','in@semperegestas.net','356-7490 Lacinia Rd.',NULL,NULL,NULL,'Jurado'),(204,'Caryn','Montoya','39757069','(989) 757-7355','1604092887799','velit@rhoncusProinnisl.co.uk','5164 Sed Rd.',NULL,NULL,NULL,'Jurado'),(205,'Jenette','Olson','14551368','(438) 422-1769','1602031202099','justo@ornaretortorat.co.uk','P.O. Box 547, 9051 Facilisis, Avenue',NULL,NULL,NULL,'Jurado'),(206,'Brynn','French','26824271','(789) 708-3815','1684062223699','Curabitur.ut.odio@varius.com','6396 Mauris Rd.',NULL,NULL,NULL,'Jurado'),(207,'Kimberly','Saunders','40732606','(995) 149-5781','1661120275299','dignissim@iaculis.com','P.O. Box 278, 4927 Nibh. Avenue',NULL,NULL,NULL,'Jurado'),(208,'Hilary','Fisher','23750735','(919) 385-5367','1691032249199','eu.enim@lorem.co.uk','865-9985 Sed, St.',NULL,NULL,NULL,'Jurado'),(236,'543543','65465','365465','345','345','mendezal4535dro.e@gmail.com','1316, 1240432','2018-07-01 20:38:56','2018-07-01 23:53:27','2018-07-01 23:53:27','Postulante'),(237,'5433','3453','4654','365','654765','mendezaleja54o.e@gmail.com','1316, 1240254','2018-07-01 20:41:27','2018-07-01 20:42:27','2018-07-01 20:42:27','Jurado');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos`
--

DROP TABLE IF EXISTS `requisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `dedicacion` enum('Simple','Exclusiva','Semiexclusiva') NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisitos_id_categoria_foreign_idx` (`categoria_id`),
  KEY `requisitos_id_perfil_foreign_idx` (`perfil_id`),
  CONSTRAINT `requisitos_id_categoria_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `requisitos_id_perfil_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos`
--

LOCK TABLES `requisitos` WRITE;
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
INSERT INTO `requisitos` VALUES (1,1,1,'Simple','PRUEBA',NULL,NULL,NULL);
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitositems`
--

DROP TABLE IF EXISTS `requisitositems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitositems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisito_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisitositems_id_requisito_foreign_idx` (`requisito_id`),
  CONSTRAINT `requisitositems_id_requisito_foreign` FOREIGN KEY (`requisito_id`) REFERENCES `requisitos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitositems`
--

LOCK TABLES `requisitositems` WRITE;
/*!40000 ALTER TABLE `requisitositems` DISABLE KEYS */;
INSERT INTO `requisitositems` VALUES (1,1,'Curriculum',NULL,NULL,NULL),(2,1,'Titulo',NULL,NULL,NULL),(3,1,'DNI',NULL,NULL,NULL);
/*!40000 ALTER TABLE `requisitositems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitospostulantes`
--

DROP TABLE IF EXISTS `requisitospostulantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitospostulantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisitoitem_id` int(11) NOT NULL,
  `postulante_id` int(11) NOT NULL,
  `concurso_id` int(11) NOT NULL,
  `entregoRequisito` enum('Si','No') NOT NULL DEFAULT 'Si' COMMENT '1 = EL POSTULANTE ENTREGA LA DOCUMENTACION REQUISITO\n2 = EL POSTULANTE NO ENTREGA DOCUMENTACION REQUISITO',
  `cumpleRequisito` enum('Sin validar','Si','No') NOT NULL DEFAULT 'Sin validar' COMMENT '1: DOCUMENTO REQUISITO SIN VALIDAR\n2: DOCUMENTO REQUISITO VALIDADO\n3: DOCUMENTO REQUISITO INVALIDADO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisitospostulantes_id_concurso_foreign_idx` (`concurso_id`),
  KEY `requisitospostulantes_id_postulante_foreign_idx` (`postulante_id`),
  KEY `requisitospostulantes_id_requisitoitem_foreign_idx` (`requisitoitem_id`),
  CONSTRAINT `requisitospostulantes_id_concurso_foreign` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `requisitospostulantes_id_persona_foreign` FOREIGN KEY (`postulante_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `requisitospostulantes_id_requisitoitem_foreign` FOREIGN KEY (`requisitoitem_id`) REFERENCES `requisitositems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitospostulantes`
--

LOCK TABLES `requisitospostulantes` WRITE;
/*!40000 ALTER TABLE `requisitospostulantes` DISABLE KEYS */;
INSERT INTO `requisitospostulantes` VALUES (1,3,1,1,'No','Sin validar','2018-07-01 23:48:44','2018-07-01 23:48:44',NULL);
/*!40000 ALTER TABLE `requisitospostulantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidades`
--

DROP TABLE IF EXISTS `universidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidades`
--

LOCK TABLES `universidades` WRITE;
/*!40000 ALTER TABLE `universidades` DISABLE KEYS */;
INSERT INTO `universidades` VALUES (1,'Universidad Nacional de Arturo Jaureche','2018-06-01 04:16:28','2018-06-01 04:16:28',NULL),(2,'Universidad Nacional de Avellaneda de la Provincia de Buenos Aires','2018-06-01 04:17:10','2018-06-01 04:17:10',NULL),(3,'Universidad Nacional de Catamarca','2018-06-01 04:17:33','2018-06-01 04:17:33',NULL),(4,'Universidad Nacional de Chilecito','2018-06-01 04:17:45','2018-06-01 04:17:45',NULL),(5,'Universidad Nacional de Córdoba','2018-06-01 04:18:00','2018-06-01 04:18:00',NULL),(6,'Universidad Nacional de Cuyo','2018-06-01 04:18:14','2018-06-01 04:18:14',NULL),(7,'Universidad Nacional de Entre Ríos','2018-06-01 04:18:24','2018-06-01 04:18:24',NULL),(8,'Universidad Nacional de Formosa','2018-06-01 04:18:34','2018-06-01 04:18:34',NULL),(9,'Universidad Nacional de General San Martín','2018-06-01 04:18:46','2018-06-01 04:18:46',NULL),(10,'Universidad Nacional de General Sarmiento','2018-06-01 04:18:55','2018-06-01 04:18:55',NULL),(11,'Universidad Nacional de José Clemente Paz','2018-06-01 04:19:05','2018-06-01 04:19:05',NULL),(12,'Universidad Nacional de Jujuy','2018-06-01 04:19:16','2018-06-01 04:19:16',NULL),(13,'Universidad Nacional de la Matanza','2018-06-01 04:19:25','2018-06-01 04:19:25',NULL),(14,'Universidad Nacional de la Pampa','2018-06-01 04:19:35','2018-06-01 04:19:35',NULL),(15,'Universidad Nacional de la Patagonia Austral','2018-06-01 04:19:46','2018-06-01 04:19:46',NULL),(16,'Universidad Nacional de la Patagonia San Juan Bosco','2018-06-01 04:19:56','2018-06-01 04:19:56',NULL),(17,'Universidad Nacional de la Plata','2018-06-01 04:20:07','2018-06-01 04:20:07',NULL),(18,'Universidad Nacional de la Rioja','2018-06-01 04:20:27','2018-06-01 04:20:27',NULL),(19,'Universidad Nacional de Lanús','2018-06-01 04:20:36','2018-06-01 04:20:36',NULL),(20,'Universidad Nacional de Lomas de Zamora','2018-06-01 04:20:48','2018-06-01 04:20:48',NULL),(21,'Universidad Nacional de Luján','2018-06-01 04:20:57','2018-06-01 04:20:57',NULL),(22,'Universidad Nacional de Mar del Plata','2018-06-01 04:21:07','2018-06-01 04:21:07',NULL),(23,'Universidad Nacional de Misiones','2018-06-01 04:21:17','2018-06-01 04:21:17',NULL),(24,'Universidad Nacional de Moreno','2018-06-01 04:21:30','2018-06-01 04:21:30',NULL),(25,'Universidad Nacional de Quilmes','2018-06-01 04:21:40','2018-06-01 04:21:40',NULL),(26,'Universidad Nacional de Río Cuarto','2018-06-01 04:26:35','2018-06-01 04:26:35',NULL),(27,'Universidad Nacional de Río Negro','2018-06-01 04:26:43','2018-06-01 04:26:43',NULL),(28,'Universidad Nacional de Rosario','2018-06-01 04:27:06','2018-06-01 04:27:06',NULL),(29,'Universidad Nacional de Salta','2018-06-01 04:27:18','2018-06-01 04:27:18',NULL),(30,'Universidad Nacional de San Juan','2018-06-01 04:27:28','2018-06-01 04:27:28',NULL),(31,'Universidad Nacional de San Luis','2018-06-01 04:27:37','2018-06-01 04:27:37',NULL),(32,'Universidad Nacional de Santiago del Estero','2018-06-01 04:27:48','2018-06-01 04:27:48',NULL),(33,'Universidad Nacional de Tierra del Fuego, Antartida e Islas del Atlantico Sur','2018-06-01 04:28:01','2018-06-01 04:28:01',NULL),(34,'Universidad Nacional de Tres de Febrero','2018-06-01 04:28:10','2018-06-01 04:28:10',NULL),(35,'Universidad Nacional de Tucumán','2018-06-01 04:28:21','2018-06-01 04:28:21',NULL),(36,'Universidad Nacional de Villa María','2018-06-01 04:28:35','2018-06-01 04:28:35',NULL),(37,'Universidad Nacional de Villa Mercedes de la Provincia de San Luis','2018-06-01 04:28:45','2018-06-01 04:28:45',NULL),(38,'Universidad Nacional del Centro de la Provincia de Buenos Aires','2018-06-01 04:28:54','2018-06-01 04:28:54',NULL),(39,'Universidad Nacional del Chaco Austral','2018-06-01 04:29:09','2018-06-01 04:29:09',NULL),(40,'Universidad Nacional del Comahue','2018-06-01 04:29:18','2018-06-01 04:29:18',NULL),(41,'Universidad Nacional del Litoral','2018-06-01 04:29:30','2018-06-01 04:29:30',NULL),(42,'Universidad Nacional del Nordeste','2018-06-01 04:29:40','2018-06-01 04:29:40',NULL),(43,'Universidad Nacional del Noroeste de la Provincia de Buenos Aires','2018-06-01 04:29:51','2018-06-01 04:29:51',NULL),(44,'Universidad Nacional del Oeste de la Provincia de Buenos Aires','2018-06-01 04:30:04','2018-06-01 04:30:04',NULL),(45,'Universidad Nacional del Sur','2018-06-01 04:30:14','2018-06-01 04:30:14',NULL),(46,'Universidad Tecnológica Nacional','2018-06-01 04:30:23','2018-06-01 04:30:23',NULL);
/*!40000 ALTER TABLE `universidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'Password para ingresar al sistema.',
  `remember_token` varchar(100) DEFAULT NULL,
  `rol` enum('Administrador') DEFAULT NULL COMMENT '1: ADMINISTRADOR',
  `image` text COMMENT 'Imagen del usuario guardada en formato BASE64',
  `estado` enum('Habilitado','Deshabilitado') DEFAULT NULL COMMENT '1: HABILITADO\n2: DESHABILITADO',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pass_UNIQUE` (`password`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Jorge Oscar Gamez','jorgeoscargamez@gmail.com','$2y$10$bXPfODui5EH5VWslbBUFQOWXBxyZMsxOmzsnMhah5xSK32RVRCpGe','lxXzcPewnPLo1xsY4DgHPAMWmZtGeKn0e1ktzlfHFVOALtzyeQquOWaGT6Or','Administrador','https://media.licdn.com/dms/image/C4E03AQGBER1CVHudIw/profile-displayphoto-shrink_200_200/0?e=1533168000&v=beta&t=byOLg_6r5-setDyZWuQTvxtcf65zMW08-MSbEvae1W4','Habilitado','2018-06-04 06:15:36','2018-06-02 01:34:17',NULL),(5,'Antonella Resgiszewski','antoresg@gmail.com','$2y$10$/xFdKVsUzbWzpr0VYVq4..5XNw2YAv5lb0qYEHJEDpH9KyfJQP6L2','XJ0xsRqLZ8XE4tPACAjpTQrtlirxpkr0G9KvGB9eS06CNNRso5S14Lrpdnxv','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/10714508_773777939349562_924903737270818261_o.jpg?_nc_cat=0&oh=ff21dc3b44c0c3f11c7ab747237e0a16&oe=5B84466B','Habilitado','2018-06-02 18:31:55','2018-06-02 02:18:52',NULL),(6,'Gonzalo Leguizamon','gonzalouriel32@gmail.com','$2y$10$V3EEKeTNZJy9PvJDCeCpV.akap.YWCVoKFePS642Itwjb7KuvNJES','VWEXOPAe2wfdzUXGVl3nLm6q76LNWBlH2P83mhaKHwnCX90cwdZMWBpdWt18','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/20729155_10210222207007248_9194040084612685150_o.jpg?_nc_cat=0&oh=52cfa640283932cce30e731bfe092d7f&oe=5BB9BAF8','Habilitado','2018-06-04 06:21:33','2018-06-02 02:22:43',NULL),(7,'Ezequiel Mendez Alejandro','mendezalejandro.e@gmail.com','$2y$10$PMiXxVtr3hvOC1YbetJXv.7sjsvlkAuXj11zag.iwIOEYo4Ui5Khe','zFNgtWoGf9rJt7jZzAex2eUOuufdieFj4rvfDRzjPfwZsucIPQniseCYFPhl','Administrador','https://media.licdn.com/dms/image/C4D03AQF5PLp7hEPW3w/profile-displayphoto-shrink_800_800/0?e=1533168000&v=beta&t=KON3Z-WYwa6zBWa6d3KjrUqjo8On8bB8VMOwsbPMLWo','Habilitado','2018-06-02 18:34:32','2018-06-02 02:52:40',NULL),(8,'Lilian Silva','silvalilian662@gmail.com','$2y$10$.xnmF7C6AYz3r3xNVEOq.O9PdiXTILXNHkGclULPflMxW8C8SXivi','l9vcljtbkuHViuqyLNunjRMjJwjrrsXlCCfbsgDRuM6wxApWhF9r34wBIh1I','Administrador','https://media.licdn.com/dms/image/C4D03AQGCAmspiKR7PQ/profile-displayphoto-shrink_800_800/0?e=1533168000&v=beta&t=hfvV1rT0A6Ujn78g93nKr8eIyTPNsHBMVqLvV9tcIk0','Habilitado','2018-06-02 19:02:46','2018-06-02 18:27:28',NULL),(9,'Gabriel Navarro','gabriel.navarro@hotmail.es','$2y$10$Kq27qEYv9d7YrQMwdh2E3eEtHZLnFSoIVra/oVWu/HCud35rbZT6O','sSkBfjZfzElyt7TgPVOBJOeeG3KuyUtctzZxdlxqw9Gq6FOQsvyvdDx45KNE','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/17425138_1279102522155982_2619310394529241686_n.jpg?_nc_cat=0&oh=6dd6997dfc9cd2146a87289b47db287c&oe=5BC25750','Habilitado','2018-06-04 06:44:27','2018-06-02 19:18:33',NULL),(10,'Julian Cabral','julian_cabral1994@hotmail.com','$2y$10$l6J1DzJ3NIbNVWt0Pya3L.47xYQ4Isoonyg.fQR4b.sC0xqaoMguK','IABW6sPUsqnFViGTgatOHDHg2m0TunkxAq671wuXhe7W2HIdFpQy2A9XTI39','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/15390735_777487619075740_6322307867770270066_n.jpg?_nc_cat=0&oh=34c841df400ad420f826927a6fb76cd8&oe=5BBDDE56','Habilitado','2018-06-04 06:52:26','2018-06-02 20:45:56',NULL),(11,'Aldo Ariel Rodriguez','aldoarielro@gmail.com','$2y$10$IK4nEcd0LkEOh0Q8ND/KLOp6u4IPZfPYMMB5SjYSJ17nlcp1sgN7O','shBJ4ddsUO1yO6BFMQtGGEERSD9wWn3OwWDD7wPyK60uv62zXE6BKetYNfwh','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/29873166_552978335095518_7419653301981592115_o.jpg?_nc_cat=0&oh=a07e9df6a375f3fbebe9f18c7679e5cd&oe=5BB7F2B6','Deshabilitado','2018-06-06 01:51:46','2018-06-04 06:19:00',NULL),(12,'Marcelo Mansilla','marce_quilmes_27@hotmail.com','$2y$10$JuxYKs2746N2oO8Tesu7kujrivcfDwZCQyW7kUSqA.owvDMfs74rW','lR4Q0glduiLLtabhmn3QMj4eHRqDYNm7amhTrACJZXlKvAk7MXNet7ECenf0','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/17361943_1332959543416331_3319468999959301148_n.jpg?_nc_cat=0&oh=cbf25e1f12b6a2b257829db92c2c713c&oe=5BB94EEC','Habilitado','2018-06-04 06:44:43','2018-06-04 06:25:22',NULL),(13,'Leonardo Moreyra','leonardo.moreyara@gmail.com','$2y$10$bLdI2.8aP3nDmZtoN3gtm.YfYLmp.2hXKjSCrn.qrqpTtgENnPp/C','fASwQA8R7zaM982agSGbS53fjSNniBE5vgZlmLiimJTTKGlNS67QR94YTa8i','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-1/22791725_1611277168937213_8375350438908705103_o.jpg?_nc_cat=0&oh=30d5d57c784daf5d1e1022bbbd7bec23&oe=5B7BC265','Habilitado','2018-06-04 06:44:35','2018-06-04 06:43:51',NULL),(14,'Leonardo Garcia','garcialeonardogabriel@gmail.com','$2y$10$AvYzFX.zW5g2rTNb7qjBcOqEod.1lPAyYf8RUYfs53z8L2eR31oYG','g2YDl4PpW9rwLbwXUUX9FCpmYxv5fyzdz7cHoNCKHnQhZUo4uB6HaxEmfCIy','Administrador','https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/18620204_10209718185057632_5754075484567062905_n.jpg?_nc_cat=0&oh=c9de41a04136c6af2b325eb38c28685d&oe=5BBE7FE5','Habilitado','2018-06-04 06:48:05','2018-06-04 06:47:37',NULL),(15,'Leonel Cabado','leonelcabado7@gmail.com','$2y$10$eROtuCRnVgQ/1aBcAIz6xOjKRJZdhTnUDBscxfte7Oawwp/De9jY.','tirf5C6rp4tljsaRos13x3tttYPCKv1ijUmBrg352krBUbatRScxadsMAqxQ',NULL,NULL,'Habilitado','2018-06-05 22:18:50','2018-06-04 07:59:25',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-01 20:58:50
