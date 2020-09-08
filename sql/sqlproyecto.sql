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

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

/*Table structure for table `compra` */

DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `nro_compra` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `compra` */

/*Table structure for table `detallecompra` */

DROP TABLE IF EXISTS `detallecompra`;

CREATE TABLE `detallecompra` (
  `id_detalle_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_detalle_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detallecompra` */

/*Table structure for table `domicilio` */

DROP TABLE IF EXISTS `domicilio`;

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_domicilio`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `domicilio` */

insert  into `domicilio`(`id_domicilio`,`id_persona`,`id_localidad`,`descripcion`) values (19,1,2,'Mitre 423'),(20,1,2,'Mitre 423'),(21,1,2,'Mitre 423');

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_fisica` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `empleado` */

/*Table structure for table `envase` */

DROP TABLE IF EXISTS `envase`;

CREATE TABLE `envase` (
  `id_envase` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_envase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `envase` */

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `localidad` */

insert  into `localidad`(`id_localidad`,`nombre`,`id_provincia`) values (1,'Formosa',2),(2,'Formosa',2),(3,'Formosa',2),(4,'Formosa',2),(5,'Formosa',2);

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `marca` */

insert  into `marca`(`id_marca`,`nombre`) values (1,'2');

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `modulo` */

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pais` */

insert  into `pais`(`id_pais`,`nombre`) values (1,'Argentina');

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil` */

/*Table structure for table `perfil_modulo` */

DROP TABLE IF EXISTS `perfil_modulo`;

CREATE TABLE `perfil_modulo` (
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil`,`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfil_modulo` */

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`) values (8),(9),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36),(37),(38),(39),(40),(41),(42),(43),(44),(45),(46),(47),(48),(49),(50),(51),(52),(53),(54),(55),(56),(57),(58),(59),(60),(61),(62),(63),(64),(65),(66),(67),(68),(69),(70),(71);

/*Table structure for table `persona_contacto` */

DROP TABLE IF EXISTS `persona_contacto`;

CREATE TABLE `persona_contacto` (
  `id_persona` int(11) NOT NULL,
  `id_tipo_persona` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_persona`,`id_tipo_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona_contacto` */

/*Table structure for table `personafisica` */

DROP TABLE IF EXISTS `personafisica`;

CREATE TABLE `personafisica` (
  `id_persona_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `estado_persona` int(1) NOT NULL,
  PRIMARY KEY (`id_persona_fisica`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personafisica` */

insert  into `personafisica`(`id_persona_fisica`,`id_persona`,`nombre`,`apellido`,`fecha_nacimiento`,`sexo`,`dni`,`estado_persona`) values (1,13,'Nicolas','','0000-00-00',NULL,NULL,0),(2,15,'Nicolas','Colo','0000-00-00',NULL,NULL,0),(3,17,'Nicolass','Colos','0000-00-00',NULL,NULL,0),(4,18,'Nicolasss','Coloss','0000-00-00',NULL,NULL,0),(5,23,'Nicolassssasds','Colossss','0000-00-00',0,NULL,1),(6,24,'','','0000-00-00',0,NULL,0),(7,25,'','','0000-00-00',0,NULL,0),(8,26,'','','0000-00-00',0,NULL,0),(9,27,'','','0000-00-00',0,NULL,0),(10,28,'','','0000-00-00',0,NULL,0),(11,29,'','','0000-00-00',0,NULL,0),(12,30,'','','0000-00-00',0,NULL,0),(13,31,'','','0000-00-00',0,NULL,0),(14,32,'','','0000-00-00',0,NULL,0),(15,33,'','','0000-00-00',0,NULL,0),(16,34,'','','0000-00-00',0,NULL,0),(17,35,'','','0000-00-00',0,NULL,0),(18,36,'','','0000-00-00',0,NULL,0),(19,37,'','','0000-00-00',0,NULL,0),(20,38,'','','0000-00-00',0,NULL,0),(21,39,'','','0000-00-00',0,NULL,0),(22,40,'','','0000-00-00',0,NULL,0),(23,41,'','','0000-00-00',0,NULL,0),(24,42,'','','0000-00-00',0,NULL,0),(25,43,'','','0000-00-00',0,NULL,0),(26,44,'','','0000-00-00',0,NULL,0),(27,45,'','','0000-00-00',0,NULL,0),(28,46,'','','0000-00-00',0,NULL,0),(29,47,'','','0000-00-00',0,NULL,0),(30,48,'','','0000-00-00',0,NULL,0),(31,49,'','','0000-00-00',0,NULL,0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

/*Table structure for table `producto_trago` */

DROP TABLE IF EXISTS `producto_trago`;

CREATE TABLE `producto_trago` (
  `id_producto` int(11) NOT NULL,
  `id_trago` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`,`id_trago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto_trago` */

/*Table structure for table `productofinal` */

DROP TABLE IF EXISTS `productofinal`;

CREATE TABLE `productofinal` (
  `id_producto_final` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto_final`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `productofinal` */

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `cuit` varchar(20) DEFAULT NULL,
  `razon_social` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proveedor` */

insert  into `proveedor`(`id_proveedor`,`cuit`,`razon_social`,`id_persona`) values (1,'','Barrica',60),(2,'','Barrica',61),(3,'','Barrica',62),(4,'','Barrica',63),(5,'','Barrica',64),(6,'','Barrica',65),(7,'','Barrica',66),(8,'','Barrica',67),(9,'','Barrica',68),(10,'','Barrica',69),(11,'','Barrica',70),(12,'','Barrica',71);

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `provincia` */

insert  into `provincia`(`id_provincia`,`nombre`,`id_pais`) values (1,'Formosa',1),(2,'Formosa',1),(3,'Formosa',1),(4,'Formosa',1),(5,'Formosa',1),(6,'Formosa',1),(7,'Formosa',1),(8,'Formosa',1),(9,'Formosa',1),(10,'Formosa',1),(11,'Formosa',1);

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `unidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `lugar` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock` */

/*Table structure for table `subcategoria` */

DROP TABLE IF EXISTS `subcategoria`;

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `subcategoria` */

/*Table structure for table `tipocontacto` */

DROP TABLE IF EXISTS `tipocontacto`;

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipocontacto` */

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
  `id_trago` int(11) NOT NULL,
  `id_producto_final` int(11) NOT NULL,
  PRIMARY KEY (`id_trago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trago` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_persona_fisica` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
