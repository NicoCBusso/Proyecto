/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - proyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `proyecto`;

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `fecha_hora_ingreso` datetime NOT NULL,
  `fecha_hora_salida` datetime DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_asistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `asistencia` */

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cargo` */

insert  into `cargo`(`id_cargo`,`nombre`) values (1,'Gerente'),(2,'Barman'),(3,'Cajero'),(4,'Seguridad'),(5,'Personal Baño'),(6,'ValidacionOK');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`id_categoria`,`nombre`) values (1,'Alcoholica'),(2,'Sin Alcohol'),(3,'ValidacionOK');

/*Table structure for table `compra` */

DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_comprobante` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `compra` */

insert  into `compra`(`id_compra`,`fecha`,`id_proveedor`,`id_usuario`,`id_tipo_comprobante`,`estado`) values (1,'2020-10-26',1,1,3,1),(2,'2020-11-04',1,1,1,1),(3,'2020-10-06',13,1,1,1),(4,'2020-10-06',13,1,1,1),(5,'2020-10-06',13,1,1,1),(6,'2020-10-22',13,1,1,1),(7,'2020-10-22',13,1,1,1),(8,'2020-10-22',13,1,1,1),(9,'2020-10-22',13,1,1,1),(10,'2020-10-22',13,1,1,1),(11,'2020-10-22',13,1,1,1),(12,'2020-10-22',13,1,1,1),(13,'2020-10-22',13,1,1,1),(14,'2020-10-22',13,1,1,1),(15,'2020-10-22',13,1,1,1),(16,'2020-10-20',13,1,1,1),(17,'2020-10-06',13,1,4,1),(18,'2020-10-11',13,1,1,1),(19,'2020-10-11',13,1,1,1),(20,'2020-10-11',13,1,1,1),(21,'2020-10-11',13,1,1,1),(22,'2020-10-11',13,1,1,1),(23,'2020-10-11',13,1,1,1),(24,'2020-10-11',13,1,1,1),(25,'2020-10-11',13,1,1,1),(26,'2020-10-11',13,1,1,1),(27,'2020-10-11',13,1,1,1),(28,'2020-10-11',13,1,1,1),(29,'2020-10-11',13,1,1,1),(30,'2020-10-11',13,1,1,1),(31,'2020-10-11',13,1,1,1),(32,'2020-10-11',13,1,1,1),(33,'2020-10-11',13,1,1,1),(34,'2020-10-11',13,1,1,1),(35,'2020-10-11',13,1,1,1),(36,'2020-10-11',13,1,1,1),(37,'2020-10-11',13,1,1,1),(38,'2020-10-11',13,1,1,1),(39,'2020-10-11',13,1,1,1),(40,'2020-10-11',13,1,1,1),(41,'2020-10-11',13,1,1,1),(42,'2020-10-11',13,1,1,1),(43,'2020-10-11',13,1,1,1),(44,'2020-10-11',13,1,1,1),(45,'2020-10-11',13,1,1,1),(46,'2020-10-11',13,1,1,1),(47,'2020-10-13',13,1,4,1),(48,'2020-10-13',13,1,4,1);

/*Table structure for table `detallecompra` */

DROP TABLE IF EXISTS `detallecompra`;

CREATE TABLE `detallecompra` (
  `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_detalle_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detallecompra` */

insert  into `detallecompra`(`id_detalle_compra`,`id_compra`,`id_producto`,`cantidad`,`precio`) values (1,10,6,3,30),(2,10,6,3,30),(3,10,13,4,50),(4,11,6,3,30),(5,12,6,3,30),(6,12,6,3,30),(7,12,13,4,50),(8,13,6,3,30),(9,13,6,3,30),(10,13,13,4,50),(11,14,6,3,30),(12,14,6,3,30),(13,14,13,4,50),(14,15,6,10,30),(15,16,4,2,1000),(16,16,5,2,1500),(17,17,4,2,1000),(18,17,5,2,1500),(19,18,4,2,1000),(20,18,7,1,1000),(21,19,4,2,1000),(22,20,4,2,1000),(23,21,4,2,1000),(24,21,7,1,1000),(25,22,4,2,1000),(26,22,7,1,1000),(27,23,4,2,1000),(28,23,7,1,1000),(29,24,4,2,1000),(30,24,7,1,1000),(31,25,4,2,1000),(32,25,7,1,1000),(33,26,4,2,1000),(34,26,7,1,1000),(35,27,4,2,1000),(36,27,7,1,1000),(37,28,4,2,1000),(38,28,7,1,1000),(39,29,4,2,1000),(40,29,7,1,1000),(41,30,4,2,1000),(42,30,7,1,1000),(43,31,4,2,1000),(44,31,7,1,1000),(45,32,4,2,1000),(46,32,7,1,1000),(47,33,4,2,1000),(48,33,7,1,1000),(49,34,4,2,1000),(50,34,7,1,1000),(51,35,4,2,1000),(52,35,7,1,1000),(53,36,4,2,1000),(54,36,7,1,1000),(55,37,4,2,1000),(56,37,7,1,1000),(57,38,4,2,1000),(58,38,7,1,1000),(59,39,4,2,1000),(60,39,7,1,1000),(61,40,4,2,1000),(62,40,7,1,1000),(63,41,4,2,1000),(64,41,7,1,1000),(65,42,4,2,1000),(66,42,7,1,1000),(67,43,4,2,1000),(68,43,7,1,1000),(69,44,4,2,1000),(70,44,7,1,1000),(71,45,4,2,1000),(72,45,7,1,1000),(73,46,4,2,1000),(74,46,7,1,1000),(75,47,13,100,50),(76,48,13,100,50),(77,48,12,100,50),(78,48,7,100,1000),(79,48,6,100,30),(80,48,5,100,1500),(81,48,4,100,1000);

/*Table structure for table `detallesolicitud` */

DROP TABLE IF EXISTS `detallesolicitud`;

CREATE TABLE `detallesolicitud` (
  `id_detalle_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detallesolicitud` */

insert  into `detallesolicitud`(`id_detalle_solicitud`,`cantidad`,`id_producto`,`id_solicitud`) values (1,2,4,2),(2,2,6,2),(3,10,5,3),(4,10,4,3),(5,10,6,3),(6,10,7,3),(7,10,12,3),(8,10,13,3),(9,10,4,4),(10,10,5,4),(11,10,6,4),(12,10,7,4),(13,10,12,4),(14,10,13,4);

/*Table structure for table `detalleventa` */

DROP TABLE IF EXISTS `detalleventa`;

CREATE TABLE `detalleventa` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto_final` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=2559 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalleventa` */

insert  into `detalleventa`(`id_detalle_venta`,`id_venta`,`id_producto_final`,`precio`,`estado`) values (2409,26,14,80,1),(2410,26,15,80,1),(2411,26,13,80,1),(2412,26,11,350,1),(2413,26,14,350,1),(2414,27,15,100,1),(2415,27,1,100,1),(2416,27,1,100,1),(2417,27,3,70,1),(2418,27,3,70,1),(2419,27,3,70,1),(2420,27,3,70,1),(2421,28,1,100,1),(2422,28,1,100,1),(2423,28,1,100,1),(2424,28,3,70,1),(2425,28,3,70,1),(2426,28,3,70,1),(2427,28,3,70,1),(2428,29,1,100,1),(2429,29,1,100,1),(2430,29,6,80,1),(2431,30,1,120,1),(2432,30,1,120,1),(2433,30,14,120,1),(2434,30,14,120,1),(2435,30,14,120,1),(2436,30,14,120,1),(2437,31,1,120,1),(2438,31,1,120,1),(2439,31,14,120,1),(2440,31,14,120,1),(2441,31,14,120,1),(2442,31,14,120,1),(2443,32,1,120,1),(2444,32,1,120,1),(2445,32,14,120,1),(2446,32,14,120,1),(2447,32,14,120,1),(2448,32,14,120,1),(2449,33,1,120,1),(2450,33,1,120,1),(2451,33,14,120,1),(2452,33,14,120,1),(2453,33,14,120,1),(2454,33,14,120,1),(2455,34,4,1000,1),(2456,34,4,1000,1),(2457,35,2,4500,1),(2458,35,2,4500,1),(2459,36,1,120,1),(2460,36,1,120,1),(2461,37,1,120,1),(2462,37,1,120,1),(2463,38,1,120,1),(2464,38,1,120,1),(2465,39,1,120,1),(2466,39,1,120,1),(2467,40,2,4500,1),(2468,40,1,120,1),(2469,41,1,120,1),(2470,41,1,120,1),(2471,41,6,80,1),(2472,41,6,80,1),(2473,42,4,1000,1),(2474,43,1,120,1),(2475,43,15,130,1),(2476,44,3,70,1),(2477,44,3,70,1),(2478,44,3,70,1),(2479,44,3,70,1),(2480,44,3,70,1),(2481,44,3,70,1),(2482,44,3,70,1),(2483,44,3,70,1),(2484,44,3,70,1),(2485,44,3,70,1),(2486,44,3,70,1),(2487,44,3,70,1),(2488,44,3,70,1),(2489,44,3,70,1),(2490,44,3,70,1),(2491,44,3,70,1),(2492,44,3,70,1),(2493,44,3,70,1),(2494,44,3,70,1),(2495,44,3,70,1),(2496,44,3,70,1),(2497,44,3,70,1),(2498,44,3,70,1),(2499,44,14,120,1),(2500,44,14,120,1),(2501,44,14,120,1),(2502,44,14,120,1),(2503,44,14,120,1),(2504,44,14,120,1),(2505,44,14,120,1),(2506,44,14,120,1),(2507,44,14,120,1),(2508,44,14,120,1),(2509,44,14,120,1),(2510,44,14,120,1),(2511,44,14,120,1),(2512,44,14,120,1),(2513,44,14,120,1),(2514,44,14,120,1),(2515,44,14,120,1),(2516,44,14,120,1),(2517,44,14,120,1),(2518,44,14,120,1),(2519,44,14,120,1),(2520,44,14,120,1),(2521,44,14,120,1),(2522,44,14,120,1),(2523,44,14,120,1),(2524,44,14,120,1),(2525,44,14,120,1),(2526,44,14,120,1),(2527,44,14,120,1),(2528,44,14,120,1),(2529,44,14,120,1),(2530,44,14,120,1),(2531,44,14,120,1),(2532,44,14,120,1),(2533,44,14,120,1),(2534,44,14,120,1),(2535,44,14,120,1),(2536,44,14,120,1),(2537,44,14,120,1),(2538,44,14,120,1),(2539,44,14,120,1),(2540,44,14,120,1),(2541,44,14,120,1),(2542,44,14,120,1),(2543,44,14,120,1),(2544,44,14,120,1),(2545,44,14,120,1),(2546,44,14,120,1),(2547,44,14,120,1),(2548,44,14,120,1),(2549,44,14,120,1),(2550,44,14,120,1),(2551,44,14,120,1),(2552,44,14,120,1),(2553,44,14,120,1),(2554,44,14,120,1),(2555,44,14,120,1),(2556,44,14,120,1),(2557,44,14,120,1),(2558,45,4,1000,1);

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `direccion` */

insert  into `direccion`(`id_direccion`,`id_persona`,`id_localidad`,`calle`,`numero`) values (19,1,2,'Mitre ',523),(20,1,2,'Mitre ',523),(21,1,2,'Mitre ',523),(22,87,1,'Mitre',2855),(23,89,4,'Mitre',555),(24,89,4,'Mitre',555),(25,92,1,'Mitre',555),(26,88,1,'Mitre',555),(27,95,7,'Pellegrini',2859),(28,96,1,'asdasd3321',123123),(29,93,1,'Mitre',555),(30,97,2,'Mitreasd',52332213);

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_fisica` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empleado` */

insert  into `empleado`(`id_empleado`,`id_persona_fisica`,`id_cargo`) values (1,43,4),(2,0,3),(3,44,1),(4,45,1),(5,46,2),(6,47,1),(7,51,1),(8,52,2),(9,53,5),(10,0,1),(11,0,0),(12,0,0),(13,0,0),(14,0,0),(15,0,0),(16,0,0),(17,0,0),(18,0,1),(19,54,2),(20,0,2),(21,56,2),(22,57,1),(23,58,1);

/*Table structure for table `envase` */

DROP TABLE IF EXISTS `envase`;

CREATE TABLE `envase` (
  `id_envase` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_envase`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `envase` */

insert  into `envase`(`id_envase`,`nombre`) values (1,'Vaso'),(2,'Botella'),(3,'Lata'),(18,'Arreglar123');

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estado` */

insert  into `estado`(`id_estado`,`descripcion`) values (1,'En espera'),(2,'En proceso'),(3,'Entregado');

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `localidad` */

insert  into `localidad`(`id_localidad`,`nombre`,`id_provincia`) values (1,'Formosa',1),(2,'Herradura',1),(3,'Laishi',1),(4,'Azul',2),(5,'La Plata',2),(6,'Resistencia',4),(7,'Olavarria',2),(8,'Tandil',2);

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `marca` */

insert  into `marca`(`id_marca`,`nombre`) values (2,'Brahma Lima'),(3,'Quilmes'),(4,'Miller'),(5,'King Night'),(6,'Speed'),(7,'Coca Cola'),(8,'Sprite'),(9,'Fanta'),(10,'Absolut'),(11,'Smirnoff'),(12,'Sky'),(13,'Tres Plumas'),(14,'Cusenier'),(20,'ValidacionOK');

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `directorio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `modulo` */

insert  into `modulo`(`id_modulo`,`nombre`,`directorio`) values (1,'Empleado','empleado'),(2,'Usuario','usuario'),(3,'Proveedor','proveedor'),(4,'Pais','pais'),(5,'Provincia','provincia'),(6,'Localidad','localidad'),(7,'Perfil','perfil'),(8,'Modulo','modulo'),(9,'Categoria','categoria'),(10,'Marca','marca'),(12,'Producto','producto'),(13,'Envase','envase'),(14,'Trago','trago'),(15,'Cargo','cargo'),(16,'Venta','venta'),(17,'TipoContacto','tipocontacto'),(18,'Contacto','contacto'),(19,'Compra','compra'),(20,'TipoComprobante','tipocomprobante'),(21,'Puesto','puesto'),(22,'Solicitud','solicitud'),(23,'Salida','salida'),(24,'Informe','informe');

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pais` */

insert  into `pais`(`id_pais`,`nombre`) values (1,'Argentina'),(2,'Paraguay'),(3,'Brasil'),(4,'Uruguay');

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`nombre`) values (1,'Administrador'),(2,'Usuario'),(6,'Jefe Barman'),(7,'Encargado Deposito');

/*Table structure for table `perfil_modulo` */

DROP TABLE IF EXISTS `perfil_modulo`;

CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil_modulo` */

insert  into `perfil_modulo`(`id_perfil_modulo`,`id_perfil`,`id_modulo`) values (42,2,1),(43,2,2),(44,2,3),(45,2,4),(46,2,5),(47,2,6),(48,2,7),(49,2,8),(50,2,9),(228,6,22),(229,7,22),(250,1,1),(251,1,2),(252,1,3),(253,1,4),(254,1,5),(255,1,6),(256,1,7),(257,1,8),(258,1,9),(259,1,10),(260,1,12),(261,1,13),(262,1,14),(263,1,15),(264,1,16),(265,1,17),(266,1,19),(267,1,21),(268,1,22),(269,1,23),(270,1,24);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`) values (1),(87),(88),(89),(90),(91),(92),(93),(94),(95),(96),(97),(98),(99),(100),(101),(102),(103),(104),(105),(106),(107),(108),(109),(110),(111),(112),(113),(114),(115),(116),(117),(118),(119),(120),(121),(122),(123),(124);

/*Table structure for table `persona_contacto` */

DROP TABLE IF EXISTS `persona_contacto`;

CREATE TABLE `persona_contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `id_tipo_contacto` int(11) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona_contacto` */

insert  into `persona_contacto`(`id_contacto`,`id_persona`,`id_tipo_contacto`,`valor`) values (1,87,1,'nicocolo_22@hotmail.com'),(88,87,2,'3704-841152'),(92,1,1,'nicocolo_22@hotmail.com'),(93,1,2,'3704-841152'),(94,89,1,'nicocolo_22@hotmail.com');

/*Table structure for table `personafisica` */

DROP TABLE IF EXISTS `personafisica`;

CREATE TABLE `personafisica` (
  `id_persona_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `dni` int(10) DEFAULT NULL,
  `estado_persona` int(1) NOT NULL,
  PRIMARY KEY (`id_persona_fisica`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personafisica` */

insert  into `personafisica`(`id_persona_fisica`,`id_persona`,`nombre`,`apellido`,`fecha_nacimiento`,`sexo`,`dni`,`estado_persona`) values (1,1,'Nicolas','Colo Busso','1997-05-22',1,40486444,1),(46,87,'asddasd','Colo','2002-09-01',2,12345678,1),(47,88,'Hector Mario','Colo','2020-07-06',1,5486444,1),(48,91,'','','0000-00-00',0,0,0),(49,92,'dasdqweqw','Bussosdasd','2020-07-06',1,5486444,0),(50,93,'dasdqweqw','Bussosdasd','0000-00-00',1,40486444,0),(51,94,'Hector Mario','Bussosdasd','0000-00-00',1,5486444,1),(52,95,'Franco Nicolas','Colo Busso','1997-05-22',1,40486444,1),(53,97,'Sabrina','Almiron','1995-08-03',2,5485845,1),(54,107,'Hector Mario','Bussosdasd','0000-00-00',1,40486444,1),(55,109,'asdasdas','asdasdasd','0000-00-00',1,40486444,0),(56,112,'Licor Melons','Almiron','1979-01-23',2,40486444,1),(57,114,'Hector Mario','Busso','1995-05-22',1,40486444,1),(58,115,'Hector Mario','Bussosdasd','0000-00-00',1,40486444,1),(59,116,'Franco Nicolas','Colo Busso','1997-05-22',1,40486444,0),(60,117,'Franco Nicolas','Colo Busso','1997-05-22',1,40486444,0),(61,118,'Franco Nicolas','Colo Busso','1997-05-11',1,40486444,0),(62,119,'Sabrina','Almiron','1997-05-22',2,25486444,1),(63,123,'Hector Mario','Colo','0000-00-00',1,5486444,1),(64,124,'Champagne','Almiron','1997-05-22',2,5486444,1);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_subcategoria` int(11) NOT NULL,
  `codigo_barra` varchar(20) DEFAULT NULL,
  `contenido` int(11) NOT NULL,
  `precio_compra` float DEFAULT NULL,
  `id_producto_final` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_envase` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

insert  into `producto`(`id_producto`,`id_subcategoria`,`codigo_barra`,`contenido`,`precio_compra`,`id_producto_final`,`id_marca`,`id_envase`) values (3,1,'645845',1000,1000,0,2,1),(4,3,'1234567890',1000,1000,1,7,2),(5,14,'64584542',1000,1500,2,10,2),(6,13,'64584523',350,30,3,6,3),(7,8,'645845',1000,1000,4,5,2),(11,6,'213123',123123,213123,11,4,1),(12,1,'1111111111',473,50,14,2,3),(13,1,'1111111112',473,50,15,4,3),(14,14,'1234567891',750,100,16,5,2),(15,1,'1234567892',750,100,17,2,2),(16,15,'1234567893',750,120,18,14,2),(17,8,'1234567894',750,130,19,5,2),(18,3,'1234567895',500,70,20,7,2),(19,3,'1234567896',500,70,21,7,2),(20,1,'1234567897',473,50,22,3,1),(21,1,'1234567898',473,90,23,3,3);

/*Table structure for table `producto_trago` */

DROP TABLE IF EXISTS `producto_trago`;

CREATE TABLE `producto_trago` (
  `id_producto_trago` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_trago` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_trago`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto_trago` */

insert  into `producto_trago`(`id_producto_trago`,`id_producto`,`id_trago`,`cantidad`) values (2,6,1,350),(3,5,6,150),(6,6,6,350),(7,7,1,150),(8,4,7,1234);

/*Table structure for table `productofinal` */

DROP TABLE IF EXISTS `productofinal`;

CREATE TABLE `productofinal` (
  `id_producto_final` int(11) NOT NULL AUTO_INCREMENT,
  `precio_venta` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto_final`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `productofinal` */

insert  into `productofinal`(`id_producto_final`,`precio_venta`,`descripcion`) values (1,120,'Coca Cola'),(2,4500,'Vodka Absolut'),(3,70,'Speed Energizante'),(4,1000,'Licor de Melon'),(6,80,'Speed'),(7,150,'Melon Con Speed'),(11,350,'Vodka Absolut con Speed'),(13,2131,'Smirnoff'),(14,120,'Brahma Lata'),(15,130,'Miller'),(16,5000,'Vodka KingNight'),(17,300,'Corona Botella'),(18,370,'Granadina Cusenier'),(19,250,'Licor de Chocolate KingNight'),(20,150,'Sprite'),(21,150,'Fanta Gaseosa'),(22,100,'Quilmes lata'),(23,200,'Andes Lata');

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `cuit` bigint(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proveedor` */

insert  into `proveedor`(`id_proveedor`,`cuit`,`razon_social`,`id_persona`) values (1,0,'Barrica',60),(2,0,'Barrica',61),(3,0,'Barrica',62),(4,0,'Barrica',63),(5,0,'Barrica',64),(6,0,'Barrica',65),(7,0,'Barrica',66),(8,0,'Barrica',67),(9,0,'Barrica',68),(10,0,'Barrica',69),(11,0,'Barrica',70),(12,0,'Barrica',71),(13,12345678911,'Barrica',89),(14,2147483647,'Barrica',90),(15,2147483647,'asdasdsadsad',96),(16,2147483647,'Caceres',110),(17,2147483647,'asdasd',111),(18,12345678911,'Barricasss',113);

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `provincia` */

insert  into `provincia`(`id_provincia`,`nombre`,`id_pais`) values (1,'Formosa',1),(2,'Buenos Aires',1),(3,'Santa Fe',1),(4,'Corrientes',1),(5,'Chaco',1),(6,'Jujuy',1),(7,'Misiones',1),(8,'Entre Rios',1),(9,'Cordoba',1),(10,'Asuncion',2),(11,'Chubut',1),(12,'Montevideo',4),(13,'Tierra del Fuego',1);

/*Table structure for table `puesto` */

DROP TABLE IF EXISTS `puesto`;

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `puesto` */

insert  into `puesto`(`id_puesto`,`lugar`) values (1,'Barra Margarita'),(2,'Barra Infierno'),(3,'Barra Patio'),(4,'Deposito'),(5,'asdasdasd'),(6,'asdasdasdas');

/*Table structure for table `salida` */

DROP TABLE IF EXISTS `salida`;

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT,
  `id_detalle_venta` int(11) DEFAULT NULL,
  `codigo_barra` int(11) DEFAULT NULL,
  `fecha_hora_entrega` datetime DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_salida`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `salida` */

insert  into `salida`(`id_salida`,`id_detalle_venta`,`codigo_barra`,`fecha_hora_entrega`,`id_puesto`) values (1,2409,NULL,'2020-10-15 11:24:59',1),(2,2410,1,'2020-10-16 01:11:06',1),(3,2410,1,'2020-10-23 20:52:31',1),(4,2410,1,'2020-10-23 20:58:22',1),(5,2410,1,'2020-10-23 20:58:44',1),(6,2410,1,'2020-10-23 21:01:20',1),(7,NULL,1111111112,'2020-10-23 21:15:26',1),(8,NULL,1111111112,'2020-10-23 21:17:33',1),(9,NULL,645845,'2020-10-23 21:34:43',1),(10,2412,1,'2020-10-23 21:43:47',1),(11,2412,1,'2020-10-23 21:46:23',1),(12,2412,1,'2020-10-23 21:46:41',1),(13,2417,1,'2020-10-23 23:31:34',1),(14,2412,1,'2020-10-23 23:33:21',1),(15,NULL,1111111112,'2020-10-23 23:34:48',1),(16,NULL,1111111112,'2020-10-23 23:34:54',1);

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_hora_pedido` datetime DEFAULT NULL,
  `fecha_hora_entrega` datetime DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `solicitud` */

insert  into `solicitud`(`id_solicitud`,`id_usuario`,`fecha_hora_pedido`,`fecha_hora_entrega`,`id_estado`,`id_puesto`) values (1,1,'2020-10-13 04:21:05','2020-10-13 20:53:21',3,2),(2,1,'2020-10-13 04:23:24','2020-10-13 20:53:12',3,2),(3,1,'2020-10-13 21:12:51','2020-10-13 21:25:08',3,3),(4,1,'2020-10-14 00:13:24','2020-10-14 00:14:51',3,1);

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock` */

insert  into `stock`(`id_stock`,`id_producto`,`stock_actual`,`id_puesto`,`stock_minimo`) values (2,13,150,1,NULL),(3,13,171,4,NULL),(4,12,171,4,NULL),(5,6,146,4,NULL),(6,4,146,4,NULL),(7,4,60,1,NULL),(20,4,8,2,NULL),(21,6,8,2,NULL),(22,7,50,4,NULL),(23,5,30,4,NULL),(24,5,40,3,NULL),(25,4,40,3,NULL),(26,6,40,3,NULL),(27,7,40,3,NULL),(28,12,40,3,NULL),(29,5,9,1,NULL),(30,6,5,1,NULL),(31,7,9,1,NULL),(32,12,99,1,NULL);

/*Table structure for table `subcategoria` */

DROP TABLE IF EXISTS `subcategoria`;

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `subcategoria` */

insert  into `subcategoria`(`id_subcategoria`,`nombre`,`id_categoria`) values (1,'Cerveza',1),(3,'Gaseosa',2),(6,'Champagne',1),(8,'Licor',1),(9,'Vodka',1),(10,'Agua',2),(11,'Soda',2),(12,'Trago',1),(13,'Energizante',2),(14,'Vodka',1),(15,'Granadina',2),(16,'ValidacionOK',1);

/*Table structure for table `tipocomprobante` */

DROP TABLE IF EXISTS `tipocomprobante`;

CREATE TABLE `tipocomprobante` (
  `id_tipo_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_comprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipocomprobante` */

insert  into `tipocomprobante`(`id_tipo_comprobante`,`descripcion`) values (1,'Factura A'),(2,'Factura B'),(3,'Factura C'),(4,'Consumidor Final');

/*Table structure for table `tipocontacto` */

DROP TABLE IF EXISTS `tipocontacto`;

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipocontacto` */

insert  into `tipocontacto`(`id_tipo_contacto`,`descripcion`) values (1,'Email'),(2,'Celular');

/*Table structure for table `tipodocumento` */

DROP TABLE IF EXISTS `tipodocumento`;

CREATE TABLE `tipodocumento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` int(30) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipodocumento` */

/*Table structure for table `trago` */

DROP TABLE IF EXISTS `trago`;

CREATE TABLE `trago` (
  `id_trago` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_final` int(11) NOT NULL,
  PRIMARY KEY (`id_trago`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trago` */

insert  into `trago`(`id_trago`,`id_producto_final`) values (1,7),(6,11),(7,12),(8,13);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_persona_fisica` int(11) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`username`,`password`,`id_perfil`,`id_persona_fisica`,`avatar`) values (1,'nicocbusso','123123',1,1,'08092020224012_image.jpg'),(10,'sabrialm','123123',6,62,'user.png'),(14,'hectorcolo','123123',7,63,'user.png'),(15,'nicocbussoasd','123123',1,64,'08092020230723_whatsapp-logo-1.png');

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_hora_emision` datetime DEFAULT NULL,
  `fecha_hora_expiracion` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

/*Data for the table `venta` */

insert  into `venta`(`id_venta`,`id_usuario`,`fecha_hora_emision`,`fecha_hora_expiracion`,`estado`) values (1,1,'2020-09-14 21:03:56','2020-09-15 04:04:06',1),(26,1,'2020-09-28 04:15:03',NULL,1),(27,1,'2020-09-28 19:05:42',NULL,1),(28,1,'2020-09-28 19:05:47',NULL,1),(29,1,'2020-09-28 19:07:15',NULL,1),(30,1,'2020-09-29 20:48:15',NULL,1),(31,1,'2020-09-29 20:48:19',NULL,1),(32,1,'2020-09-29 20:49:05',NULL,1),(33,1,'2020-09-29 20:53:42',NULL,1),(34,1,'2020-09-29 20:53:50',NULL,1),(35,1,'2020-09-29 20:54:39',NULL,1),(36,1,'2020-09-29 20:55:26',NULL,1),(37,1,'2020-09-29 20:55:54',NULL,1),(38,1,'2020-09-29 20:56:29',NULL,1),(39,1,'2020-09-29 21:10:53',NULL,1),(40,1,'2020-09-29 23:17:16',NULL,1),(41,1,'2020-09-29 23:19:01',NULL,1),(42,1,'2020-10-01 21:01:01',NULL,1),(43,1,'2020-10-01 23:40:11',NULL,1),(44,1,'2020-10-06 23:47:28',NULL,1),(45,1,'2020-10-16 02:21:55',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
