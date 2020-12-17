/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - proyectotesteo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyectotesteo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `proyectotesteo`;

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

/*Table structure for table `aumento` */

DROP TABLE IF EXISTS `aumento`;

CREATE TABLE `aumento` (
  `id_aumento` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_final` int(11) DEFAULT NULL,
  `porcentaje` float DEFAULT NULL,
  PRIMARY KEY (`id_aumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `aumento` */

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cargo` */

insert  into `cargo`(`id_cargo`,`nombre`) values (7,'Gerente'),(8,'Barman'),(9,'Personal Deposito'),(10,'Cajero');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`id_categoria`,`nombre`) values (4,'Alcoholica'),(5,'No alcoholica');

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

/*Data for the table `compra` */

insert  into `compra`(`id_compra`,`fecha`,`id_proveedor`,`id_usuario`,`id_tipo_comprobante`,`estado`) values (61,'2020-11-25',19,17,5,1),(62,'2020-11-26',19,17,5,1),(63,'2020-11-26',19,17,5,1),(64,'2020-11-25',19,17,6,1),(65,'2020-11-26',19,17,6,1),(66,'2020-11-26',19,17,8,1);

/*Table structure for table `detallecompra` */

DROP TABLE IF EXISTS `detallecompra`;

CREATE TABLE `detallecompra` (
  `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_detalle_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detallecompra` */

insert  into `detallecompra`(`id_detalle_compra`,`id_compra`,`id_producto`,`cantidad`,`precio`) values (100,61,24,50,70),(101,61,25,50,70),(102,61,26,50,50),(103,61,27,50,90),(104,61,28,50,60),(105,61,29,50,50),(106,61,30,50,450),(107,61,31,50,60),(108,61,32,50,50),(109,62,24,20,70),(110,62,26,20,50),(111,62,28,20,60),(112,62,30,20,450),(113,63,24,20,70),(114,63,26,20,50),(115,63,28,20,60),(116,63,30,20,450),(117,64,24,10,70),(118,65,25,20,70),(119,65,30,20,450),(120,65,29,20,50),(121,66,19,10,100),(122,66,26,10,50),(123,66,29,10,50);

/*Table structure for table `detallesolicitud` */

DROP TABLE IF EXISTS `detallesolicitud`;

CREATE TABLE `detallesolicitud` (
  `id_detalle_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detallesolicitud` */

insert  into `detallesolicitud`(`id_detalle_solicitud`,`cantidad`,`id_producto`,`id_solicitud`) values (18,20,24,8),(19,20,25,8),(20,20,26,8),(21,20,32,9),(22,20,31,9),(23,5,19,10);

/*Table structure for table `detalleventa` */

DROP TABLE IF EXISTS `detalleventa`;

CREATE TABLE `detalleventa` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto_final` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=2614 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalleventa` */

insert  into `detalleventa`(`id_detalle_venta`,`id_venta`,`id_producto_final`,`precio`,`estado`) values (2585,50,24,140,2),(2586,50,24,140,3),(2587,50,24,140,3),(2588,50,24,140,3),(2589,50,24,140,1),(2590,50,24,140,1),(2591,50,24,140,1),(2592,50,26,100,1),(2593,51,27,200,2),(2594,51,27,200,1),(2595,51,27,200,1),(2596,51,27,200,1),(2597,51,27,200,1),(2598,52,34,242,2),(2599,52,34,242,1),(2600,52,34,242,1),(2601,52,34,242,1),(2602,52,34,242,1),(2603,53,24,140,1),(2604,53,24,140,1),(2605,53,24,140,1),(2606,53,24,140,1),(2607,53,24,140,1),(2608,54,25,150,2),(2609,54,25,150,3),(2610,54,25,150,1),(2611,54,25,150,1),(2612,54,25,150,1),(2613,54,32,120,1);

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `id_persona` (`id_persona`),
  KEY `id_localidad` (`id_localidad`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `direccion` */

insert  into `direccion`(`id_direccion`,`id_persona`,`id_localidad`,`calle`,`numero`) values (31,126,10,'Mitre',523);

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_fisica` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empleado` */

insert  into `empleado`(`id_empleado`,`id_persona_fisica`,`id_cargo`) values (24,67,8),(26,69,10);

/*Table structure for table `envase` */

DROP TABLE IF EXISTS `envase`;

CREATE TABLE `envase` (
  `id_envase` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_envase`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `envase` */

insert  into `envase`(`id_envase`,`nombre`) values (19,'Lata'),(20,'Botella'),(21,'Vaso');

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estado` */

insert  into `estado`(`id_estado`,`descripcion`) values (1,'En espera'),(2,'En proceso'),(3,'Entregado');

/*Table structure for table `excepcion` */

DROP TABLE IF EXISTS `excepcion`;

CREATE TABLE `excepcion` (
  `id_excepcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_excepcion` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `consumicion_a_cambiar` int(11) DEFAULT NULL,
  `consumicion_cambiada` int(11) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_excepcion`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

/*Data for the table `excepcion` */

insert  into `excepcion`(`id_excepcion`,`id_tipo_excepcion`,`fecha_hora`,`consumicion_a_cambiar`,`consumicion_cambiada`,`id_puesto`,`id_usuario`) values (46,1,'2020-11-26 18:05:17',24,31,10,17),(47,1,'2020-11-26 18:14:20',24,25,10,17),(48,1,'2020-11-26 18:16:57',24,26,10,17),(49,2,'2020-11-26 18:22:25',25,25,4,17),(50,2,'2020-11-26 18:23:22',24,24,8,17),(51,3,'2020-11-26 18:25:06',24,24,4,17),(52,1,'2020-11-27 00:42:14',25,32,10,17),(53,2,'2020-11-27 00:43:17',24,24,4,17),(54,2,'2020-11-27 00:43:51',24,24,4,17),(55,3,'2020-11-27 00:44:23',30,25,8,17);

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `localidad` */

insert  into `localidad`(`id_localidad`,`nombre`,`id_provincia`) values (9,'Formosa',14),(10,'Pirane',14);

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `marca` */

insert  into `marca`(`id_marca`,`nombre`) values (21,'Corona'),(22,'Brahma'),(23,'Quilmes'),(24,'Miller'),(25,'Heineken'),(26,'Frizze'),(27,'Speed'),(28,'Absolut'),(29,'King Night'),(30,'Smirnoff'),(31,'Coca Cola'),(32,'Sprite'),(33,'Fanta');

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `directorio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `modulo` */

insert  into `modulo`(`id_modulo`,`nombre`,`directorio`) values (1,'Empleado','empleado'),(2,'Usuario','usuario'),(3,'Proveedor','proveedor'),(4,'Pais','pais'),(5,'Provincia','provincia'),(6,'Localidad','localidad'),(7,'Perfil','perfil'),(8,'Modulo','modulo'),(9,'Categoria','categoria'),(10,'Marca','marca'),(12,'Producto','producto'),(13,'Envase','envase'),(14,'Trago','trago'),(15,'Cargo','cargo'),(16,'Venta','venta'),(17,'TipoContacto','tipocontacto'),(18,'Contacto','contacto'),(19,'Compra','compra'),(20,'TipoComprobante','tipocomprobante'),(21,'Puesto','puesto'),(22,'Solicitud','solicitud'),(23,'Salida','salida'),(24,'Informe','informe'),(25,'Excepcion','excepcion'),(26,'Aumento','aumento');

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pais` */

insert  into `pais`(`id_pais`,`nombre`) values (5,'Argentina'),(7,'Paraguay'),(8,'Chile');

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`nombre`) values (1,'Administrador'),(9,'Cajero'),(10,'Barman'),(11,'Personal Deposito');

/*Table structure for table `perfil_modulo` */

DROP TABLE IF EXISTS `perfil_modulo`;

CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=397 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil_modulo` */

insert  into `perfil_modulo`(`id_perfil_modulo`,`id_perfil`,`id_modulo`) values (341,10,22),(342,10,23),(343,10,25),(344,11,22),(345,11,25),(371,1,1),(372,1,2),(373,1,3),(374,1,4),(375,1,5),(376,1,6),(377,1,7),(378,1,8),(379,1,9),(380,1,10),(381,1,12),(382,1,13),(383,1,14),(384,1,15),(385,1,16),(386,1,17),(387,1,19),(388,1,20),(389,1,21),(390,1,22),(391,1,23),(392,1,24),(393,1,25),(394,1,26),(395,9,16),(396,9,25);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`) values (1),(126),(128),(136),(137),(138),(139),(140),(141);

/*Table structure for table `persona_contacto` */

DROP TABLE IF EXISTS `persona_contacto`;

CREATE TABLE `persona_contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `id_tipo_contacto` int(11) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona_contacto` */

insert  into `persona_contacto`(`id_contacto`,`id_persona`,`id_tipo_contacto`,`valor`) values (95,1,3,'nicocolo_22@hotmail.com'),(96,1,4,'3704-123456');

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personafisica` */

insert  into `personafisica`(`id_persona_fisica`,`id_persona`,`nombre`,`apellido`,`fecha_nacimiento`,`sexo`,`dni`,`estado_persona`) values (1,1,'Nicolas','Colo Busso','1997-05-22',1,40486444,1),(67,126,'Franco Nicolas','Colo Busso','1997-05-22',1,40486441,1),(69,128,'Gloria Beatriz','Busso','1991-05-22',2,40486443,1),(77,136,'Gloria Beatriz','Busso','1994-05-22',2,40486442,1),(78,137,'Hector Mario','Colo','1994-05-22',1,40486422,1);

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
  `id_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_subcategoria` (`id_subcategoria`),
  KEY `id_marca` (`id_marca`),
  KEY `id_envase` (`id_envase`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id_subcategoria`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_envase`) REFERENCES `envase` (`id_envase`),
  CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

insert  into `producto`(`id_producto`,`id_subcategoria`,`codigo_barra`,`contenido`,`precio_compra`,`id_producto_final`,`id_marca`,`id_envase`,`id_proveedor`) values (19,30,'1111111130',1000,100,38,29,20,19),(24,21,'1111111111',473,70,24,22,19,19),(25,21,'1111111112',473,70,25,24,19,19),(26,27,'1111111113',350,50,26,27,19,19),(27,17,'1111111114',1000,90,27,29,20,19),(28,24,'1111111115',750,60,28,26,20,19),(29,26,'1111111116',500,50,29,31,20,19),(30,18,'1111111117',750,450,30,28,20,20),(31,26,'1111111119',500,60,31,33,20,20),(32,21,'1111111120',473,50,32,23,19,20);

/*Table structure for table `producto_trago` */

DROP TABLE IF EXISTS `producto_trago`;

CREATE TABLE `producto_trago` (
  `id_producto_trago` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_trago` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_trago`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto_trago` */

insert  into `producto_trago`(`id_producto_trago`,`id_producto`,`id_trago`,`cantidad`) values (11,30,9,150),(12,26,9,350),(13,27,10,150),(14,26,10,350),(15,26,11,350);

/*Table structure for table `productofinal` */

DROP TABLE IF EXISTS `productofinal`;

CREATE TABLE `productofinal` (
  `id_producto_final` int(11) NOT NULL AUTO_INCREMENT,
  `precio_venta` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto_final`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `productofinal` */

insert  into `productofinal`(`id_producto_final`,`precio_venta`,`descripcion`) values (24,272.82,'Brahma Lata'),(25,292.308,'Miller lata'),(26,146.41,'Speed Energizante'),(27,292.82,'Licor de Melon KingNight'),(28,354.312,'Frizze'),(29,146.41,'Coca Cola chica'),(30,1200,'Vodka Absolut'),(31,100,'Fanta Gaseosa'),(32,120,'Quilmes lata'),(33,708.624,'Vodka Absolut con Speed'),(34,354.312,'Licor de Melon con Speed'),(35,200,'Granadina King Night'),(36,200,'Granadina King Night'),(37,200,'Granadina King Night'),(38,292.82,'Granadina King Night'),(39,732.05,'Smirnoff con speed');

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `cuit` bigint(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proveedor` */

insert  into `proveedor`(`id_proveedor`,`cuit`,`razon_social`,`id_persona`) values (19,12345687911,'Barrica',138),(20,23345678911,'DIG',139),(21,12343487911,'GoBAR',140),(22,12345687999,'Caceres',141);

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `provincia` */

insert  into `provincia`(`id_provincia`,`nombre`,`id_pais`) values (14,'Formosa',5),(15,'Chaco',5),(16,'Corrientes',5),(17,'Misiones',5),(18,'Salta',5),(19,'Asuncion',7),(20,'Concepcion',7),(21,'Santiago de Chile',8);

/*Table structure for table `puesto` */

DROP TABLE IF EXISTS `puesto`;

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `puesto` */

insert  into `puesto`(`id_puesto`,`lugar`) values (4,'Deposito'),(8,'Barra Margarita'),(9,'Barra Infierno'),(10,'Caja');

/*Table structure for table `salida` */

DROP TABLE IF EXISTS `salida`;

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT,
  `id_detalle_venta` int(11) DEFAULT NULL,
  `codigo_barra` int(11) DEFAULT NULL,
  `fecha_hora_entrega` datetime DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_salida`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

/*Data for the table `salida` */

insert  into `salida`(`id_salida`,`id_detalle_venta`,`codigo_barra`,`fecha_hora_entrega`,`id_puesto`) values (66,2585,1,'2020-11-26 17:52:44',8),(67,NULL,1111111120,'2020-11-26 17:55:36',9),(68,2593,1,'2020-11-26 18:42:13',4),(69,2598,1,'2020-11-26 18:43:22',8),(70,2608,1,'2020-11-27 00:37:34',8);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `solicitud` */

insert  into `solicitud`(`id_solicitud`,`id_usuario`,`fecha_hora_pedido`,`fecha_hora_entrega`,`id_estado`,`id_puesto`) values (8,17,'2020-11-26 17:33:34','2020-11-26 17:50:42',3,8),(9,17,'2020-11-26 17:50:11','2020-11-26 17:50:36',3,9),(10,17,'2020-11-27 00:40:29','2020-11-27 00:40:48',3,8);

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock` */

insert  into `stock`(`id_stock`,`id_producto`,`stock_actual`,`id_puesto`,`stock_minimo`) values (46,24,77,4,NULL),(47,25,49,4,NULL),(48,26,80,4,NULL),(49,27,49,4,NULL),(50,28,90,4,NULL),(51,29,80,4,NULL),(52,30,110,4,NULL),(53,31,30,4,NULL),(54,32,30,4,NULL),(55,32,19,9,NULL),(56,31,20,9,NULL),(57,24,18,8,NULL),(58,25,18,8,NULL),(59,26,19,8,NULL),(60,19,5,4,NULL),(61,19,5,8,NULL);

/*Table structure for table `subcategoria` */

DROP TABLE IF EXISTS `subcategoria`;

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `subcategoria` */

insert  into `subcategoria`(`id_subcategoria`,`nombre`,`id_categoria`) values (17,'Licor',4),(18,'Vodka',4),(19,'Ron',4),(20,'Gin',4),(21,'Cerveza',4),(22,'Champagne',4),(23,'Vino',4),(24,'Coctel de fabrica',4),(25,'Agua',5),(26,'Gaseosa',5),(27,'Energizante',5),(28,'Soda',5),(29,'Agua Tonica',5),(30,'Granadina',5);

/*Table structure for table `tipocomprobante` */

DROP TABLE IF EXISTS `tipocomprobante`;

CREATE TABLE `tipocomprobante` (
  `id_tipo_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_comprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipocomprobante` */

insert  into `tipocomprobante`(`id_tipo_comprobante`,`descripcion`) values (5,'Factura A'),(6,'Factura B'),(7,'Factura C'),(8,'Consumidor Final');

/*Table structure for table `tipocontacto` */

DROP TABLE IF EXISTS `tipocontacto`;

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipocontacto` */

insert  into `tipocontacto`(`id_tipo_contacto`,`descripcion`) values (3,'Email'),(4,'Celular');

/*Table structure for table `tipodocumento` */

DROP TABLE IF EXISTS `tipodocumento`;

CREATE TABLE `tipodocumento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` int(30) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipodocumento` */

/*Table structure for table `tipoexcepcion` */

DROP TABLE IF EXISTS `tipoexcepcion`;

CREATE TABLE `tipoexcepcion` (
  `id_tipo_excepcion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_excepcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipoexcepcion` */

insert  into `tipoexcepcion`(`id_tipo_excepcion`,`descripcion`) values (1,'Cambio Caja'),(2,'Rotura'),(3,'Cambio por Rotura');

/*Table structure for table `trago` */

DROP TABLE IF EXISTS `trago`;

CREATE TABLE `trago` (
  `id_trago` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_final` int(11) NOT NULL,
  PRIMARY KEY (`id_trago`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trago` */

insert  into `trago`(`id_trago`,`id_producto_final`) values (9,33),(10,34),(11,39);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`username`,`password`,`id_perfil`,`id_persona_fisica`,`avatar`) values (17,'nicocbusso','123123',1,1,'user.png'),(25,'gloriabbusso','123123',9,77,'user.png'),(26,'colomhector','123123',11,78,'user.png');

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_hora_emision` datetime DEFAULT NULL,
  `fecha_hora_expiracion` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

/*Data for the table `venta` */

insert  into `venta`(`id_venta`,`id_usuario`,`fecha_hora_emision`,`fecha_hora_expiracion`,`estado`) values (50,17,'2020-11-26 17:51:24',NULL,1),(51,17,'2020-11-26 18:39:32',NULL,1),(52,17,'2020-11-26 18:42:57',NULL,1),(53,17,'2020-11-26 21:11:12',NULL,1),(54,17,'2020-11-27 00:36:36',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
