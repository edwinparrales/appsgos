/*
SQLyog Enterprise v12.09 (32 bit)
MySQL - 5.7.16-log : Database - sgos
**********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sgos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `sgos`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `cons` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ot` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_act` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` enum('ALTA','MEDIA','NORMAL') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cons`),
  KEY `fk-ageot` (`id_ot`),
  KEY `fk-agePro` (`id_pro`),
  CONSTRAINT `fk-agePro` FOREIGN KEY (`id_pro`) REFERENCES `profesionales` (`id_pro`),
  CONSTRAINT `fk-ageot` FOREIGN KEY (`id_ot`) REFERENCES `ordentrabajo` (`cons_ot`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `agenda` */

insert  into `agenda`(`cons`,`fecha_reg`,`id_ot`,`id_pro`,`observaciones`,`estado_act`,`prioridad`) values (9,'2017-01-10 01:59:40',3,314,'dd','SOLUCIONADO','ALTA'),(14,'2017-01-13 20:19:56',1,3,'b','SOLUCIONADO','NORMAL'),(17,'2017-01-14 00:52:49',21,3,'Se asigna para revision el cliente dice que el monitor no enciede','SOLUCIONADO','NORMAL'),(18,'2017-02-01 21:41:17',8,5,'ghg','ABIERTO','NORMAL'),(19,'2017-02-10 23:51:35',16,114,'esto es una prueba','SOLUCIONADO','NORMAL');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `cod_client` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_dni` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_celular` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `barrio` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` mediumtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`cod_client`),
  UNIQUE KEY `unique-dni-tipodoc` (`tipo_dni`,`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`cod_client`,`tipo_dni`,`dni`,`nombre`,`email`,`num_celular`,`ciudad`,`direccion`,`barrio`,`observaciones`) values (2,'CEDULA','16942367','EDWIN PARRALES','EPRO82@GMAIL.COM','3225302208','CALI','CALL 32','VILLANUEVA','CLIENTE CORPORATIVOggg'),(6,'CEDULA','34555','Ramon','ramon@gmail.com','2342343456','CALI','calelle SIMON BOLIVAR','','CLIENTE ZONA SUR'),(7,'TI','232324','Marcela','','34543535','','',NULL,''),(8,'RUT','223333','DROGUERIA FFF','drr@goo.com','','Cali','Calle 5 con 39','San fernando','Cliente de zona sur'),(13,'RUT','333333','Empresa de prueba','prueba@prueba.net','334','','','',''),(15,'CEDULA','38994004','GUSTAVO','epro82@hotmail.com','7799999944','Cali','calle 3nte ','VIPASA','CLIENTE DE LA UNIAJC'),(16,'CEDULA','2','ddd','eere@gmail.com','3434333333','','','',''),(17,'CEDULA','3204','CLIENTE DE PRUEBA','CILENTE@PRUEBA.COM','3225402290','CALI','calle 34','VILLA DEL SOL','F');

/*Table structure for table `detalle_ot_servicios` */

DROP TABLE IF EXISTS `detalle_ot_servicios`;

CREATE TABLE `detalle_ot_servicios` (
  `cons` int(11) NOT NULL AUTO_INCREMENT,
  `id_ot` int(11) DEFAULT NULL,
  `id_ser` int(11) DEFAULT NULL,
  `observaciones` mediumtext COLLATE utf8_spanish_ci,
  `id_dispo` int(11) DEFAULT NULL,
  `modelo` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'null',
  `id_marca` int(11) DEFAULT NULL,
  `seriales` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'null',
  `capacidad` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'null',
  `valor_dispositivo` double DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `num_factura` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'null',
  `equipo_cliente` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'null',
  PRIMARY KEY (`cons`),
  KEY `dt_ot` (`id_ser`),
  KEY `fk-ot2` (`id_ot`),
  KEY `fk-proveedor` (`id_proveedor`),
  KEY `fk-marca-dteot` (`id_marca`),
  KEY `fk-dispo` (`id_dispo`),
  CONSTRAINT `fk-dispo` FOREIGN KEY (`id_dispo`) REFERENCES `dispositivos` (`cons_dispo`),
  CONSTRAINT `fk-marca-dteot` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`cod_marc`),
  CONSTRAINT `fk-ot2` FOREIGN KEY (`id_ot`) REFERENCES `ordentrabajo` (`cons_ot`),
  CONSTRAINT `fk-proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`codigo_prove`),
  CONSTRAINT `fk-serv` FOREIGN KEY (`id_ser`) REFERENCES `servicios` (`id_act`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `detalle_ot_servicios` */

insert  into `detalle_ot_servicios`(`cons`,`id_ot`,`id_ser`,`observaciones`,`id_dispo`,`modelo`,`id_marca`,`seriales`,`capacidad`,`valor_dispositivo`,`id_proveedor`,`num_factura`,`equipo_cliente`) values (2,3,2,'kkjk',1,'jj',1,'jjhjh','78eew',45000,3,'jhjh','2 PC DE ESCRITORIO CLON3 DELL6 34555 Ramon S/N:DELL123'),(4,1,3,'hjjh',NULL,'',NULL,'','',0,NULL,'','2 PC DE ESCRITORIO CLON3 DELL6 34555 Ramon S/N:DELL123'),(6,3,2,'aa',NULL,'',NULL,'','',0,NULL,'','2 PC DE ESCRITORIO CLON3 DELL6 34555 Ramon S/N:DELL123'),(7,3,2,'xxx',NULL,'',NULL,'','',0,NULL,'','2 PC DE ESCRITORIO CLON3 DELL6 34555 Ramon S/N:DELL123'),(8,3,2,'xxx',NULL,'',NULL,'','',0,NULL,'','2 PC DE ESCRITORIO CLON3 DELL6 34555 Ramon S/N:DELL123'),(11,21,2,'vvcv',NULL,'',NULL,'','',0,NULL,'','3 MONITOR LCD 24 P LCD5 AOC17 3204 CLIENTE DE PRUEBA S/N:xml334355'),(12,16,2,'Esto es una prueba',NULL,'',NULL,'','',0,NULL,'','');

/*Table structure for table `dispositivos` */

DROP TABLE IF EXISTS `dispositivos`;

CREATE TABLE `dispositivos` (
  `cons_dispo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_tec` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cons_dispo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `dispositivos` */

insert  into `dispositivos`(`cons_dispo`,`nombre`,`tipo_tec`) values (1,'PC PORTATIL','NETBOOK'),(2,'PC DE ESCRITORIO','CLON'),(3,'MONITOR LCD 24 P','LCD'),(4,'MONITOR','CRT'),(5,'COMPUTADOR TODO EN UNO','PC INTEGRADO'),(6,'IMPRESORA','MATRIZ DE PUNTOS'),(7,'MEMORIA RAM PC','PC DDR3'),(8,'FUENTE DE PODER GENERICA 400W','ATX'),(9,'TARJETA MADRE','GENERICA');

/*Table structure for table `equiposclientes` */

DROP TABLE IF EXISTS `equiposclientes`;

CREATE TABLE `equiposclientes` (
  `cons` int(11) NOT NULL AUTO_INCREMENT,
  `id_dispo` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `modelo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `serial` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `placa` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detallesFisicos` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cons`),
  KEY `fk-mar-eq` (`id_marca`),
  KEY `fk-cliente` (`id_cliente`),
  KEY `fk-dispos` (`id_dispo`),
  CONSTRAINT `fk-cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`cod_client`),
  CONSTRAINT `fk-dispos` FOREIGN KEY (`id_dispo`) REFERENCES `dispositivos` (`cons_dispo`),
  CONSTRAINT `fk-mar-eq` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`cod_marc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `equiposclientes` */

insert  into `equiposclientes`(`cons`,`id_dispo`,`id_marca`,`id_cliente`,`modelo`,`serial`,`placa`,`detallesFisicos`) values (1,1,1,2,'E5-471','E547133L3','','Equipo en buen estado'),(2,2,3,6,'GX260','DELL123','P78','PC DE ESCRITORIO'),(3,3,5,17,'x445','xml334355','','El monitor se encuentra en buen estado'),(4,2,4,17,'na','3204a','','La torre esta rayada '),(5,6,9,2,'LX300','LX4545','','BLANCA, CON PERILLAS EN BUEN ESTADO');

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `cod_marc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_marc`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `marcas` */

insert  into `marcas`(`cod_marc`,`nombre`) values (1,'ACER'),(2,'LENOVO'),(3,'DELL'),(4,'QBEXX'),(5,'AOC'),(6,'hop'),(7,'Kingston Technology'),(8,'GENERICA'),(9,'EPSON');

/*Table structure for table `ordentrabajo` */

DROP TABLE IF EXISTS `ordentrabajo`;

CREATE TABLE `ordentrabajo` (
  `cons_ot` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Consecutivo de la ot',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` int(11) DEFAULT NULL,
  `solicitud` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_proce` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cons_ot`),
  KEY `fk-ot-clint` (`id_cliente`),
  KEY `fk-ot-usuario` (`usuario`),
  CONSTRAINT `fk-ot-clint` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`cod_client`),
  CONSTRAINT `fk-ot-usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`login`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `ordentrabajo` */

insert  into `ordentrabajo`(`cons_ot`,`fecha`,`id_cliente`,`solicitud`,`estado_proce`,`fecha_entrega`,`usuario`) values (1,'2017-01-03 04:17:08',2,'El cliente requiere revisión de su equipo porque se reinicia constantemente','PROCESO','0000-00-00 00:00:00','eparrales'),(2,'2017-01-03 04:22:57',8,'El cliente solicita la revision de la impresora ','PROCESO','2017-01-12 00:00:00','eparrales'),(3,'2017-01-03 04:24:22',6,'El cliente solicita la instalacion de un software antivirus el adquirio licencia xxx','FINALIZADO','2017-02-26 00:00:00','eparrales'),(4,'2017-01-03 23:24:28',8,'La compañia requiere revision la instalacion de un punto de red','REGISTRADO','0000-00-00 00:00:00','cmartinez'),(5,'2017-01-04 00:13:37',13,'El cliente solicita la revision de dos computdores portatiles','REGISTRADO','0000-00-00 00:00:00','eparrales'),(8,'2017-01-04 01:38:49',6,'el cliente requiere revisión de dos computadores  los cuales deja para su posterior revision','PROCESO','0000-00-00 00:00:00','eparrales'),(10,'2017-01-07 01:35:26',7,'rre','REGISTRADO','0000-00-00 00:00:00','cmartinez'),(11,'2017-01-07 01:36:27',15,'ghghgh','REGISTRADO',NULL,'cmartinez'),(12,'2017-01-07 15:00:10',2,'Revision de pc portatil, el cliente dice que no inicia el so','REGISTRADO',NULL,'eparrales'),(13,'2017-01-07 17:54:58',6,'El cliente requiere la reinstalacion y bakup de los archivos de pc','REGISTRADO',NULL,'eparrales'),(14,'2017-01-13 01:52:49',2,'reffuyfjhih','REGISTRADO',NULL,'eparrales'),(15,'2017-01-13 19:59:27',6,'der','REGISTRADO',NULL,'eparrales'),(16,'2017-01-13 19:59:57',2,'fvfvfvf','PROCESO',NULL,'eparrales'),(17,'2017-01-13 20:00:39',2,'fgg','REGISTRADO',NULL,'eparrales'),(18,'2017-01-13 20:01:44',2,'bb','REGISTRADO',NULL,'eparrales'),(19,'2017-01-13 20:36:54',6,'nueva solicitud','REGISTRADO',NULL,'eparrales'),(20,'2017-01-13 20:37:41',6,'solicitu de prueba ','FINALIZADO','2017-01-27 00:00:00','eparrales'),(21,'2017-01-14 00:44:47',17,'El cliente solicita la revision del monitor porque no enciende fff, e ingresa pc para revision','PROCESO','0000-00-00 00:00:00','eparrales'),(22,'2017-01-20 14:46:16',2,'Orden de prueba bb','REGISTRADO','0000-00-00 00:00:00','eparrales'),(23,'2017-02-25 21:20:37',6,'humok','REGISTRADO',NULL,'eparrales');

/*Table structure for table `ot_equipocliente` */

DROP TABLE IF EXISTS `ot_equipocliente`;

CREATE TABLE `ot_equipocliente` (
  `cons` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) DEFAULT NULL,
  `id_ot` int(11) DEFAULT NULL,
  `Observaciones` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`cons`),
  UNIQUE KEY `unik` (`id_equipo`,`id_ot`),
  KEY `fk-ot` (`id_ot`),
  CONSTRAINT `fk-eqcliente` FOREIGN KEY (`id_equipo`) REFERENCES `equiposclientes` (`cons`),
  CONSTRAINT `fk-ot` FOREIGN KEY (`id_ot`) REFERENCES `ordentrabajo` (`cons_ot`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `ot_equipocliente` */

insert  into `ot_equipocliente`(`cons`,`id_equipo`,`id_ot`,`Observaciones`) values (3,2,13,'El pc ingresa sin cables ni monitor , tiene un golpe en la tapa frontal'),(5,2,3,'Asignacion de prueba'),(7,3,21,'se ingresa monitor para revision'),(9,4,21,'dd'),(10,1,1,'primera asignacion de prueba\r\n');

/*Table structure for table `profesionales` */

DROP TABLE IF EXISTS `profesionales`;

CREATE TABLE `profesionales` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_tel` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_movil` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_tarjeProfe` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_bd` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_pro`),
  UNIQUE KEY `unico_cedula` (`num_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `profesionales` */

insert  into `profesionales`(`id_pro`,`nombres`,`apellidos`,`num_cedula`,`direccion`,`num_tel`,`num_movil`,`num_tarjeProfe`,`cargo`,`email`,`estado_bd`) values (3,'EDWIN STIVE','PARRALES VARGAS jj','16942367','CALLE 4','23300','290003','Copnia 12999039555','OPERARIO','hjpp@gmail.com','ACTIVO'),(5,'JHON MAURICIO','GONZALEZ','88488','CALLE 88','9488884848','48848848','','TÉCNICO SISTEMAS','payan@hotmail.com','ACTIVO'),(114,'Clara','Martinez','4564','calle 45','454545','32444','3434','OPERARIO','epro82@hotmail.com','ACTIVO'),(115,'fwefwf','sdfsdf','34343','calle 45','33434','3434','3434','TÉCNICO ELECTRONICA','eere@gmail.com','ACTIVO'),(117,'Edwin Stive','Parrales Vargas','43434','calle 34','545','343434','3434','TÉCNICO SISTEMAS','eere@gmail.com','ACTIVO'),(119,'falcao','Gomez','90034040','calelle','994040','004040','43500','TÉCNICO SISTEMAS','eere@gmail.com','ACTIVO'),(218,'xdd','adf','5657656','calle 45','4545','4tt','4','TÉCNICO SISTEMAS','epro82@hotmail.com','ACTIVO'),(314,'Mauricio','Gomez','34894994','calle 52','3443434','434343','4343434','TÉCNICO ELECTRONICA','epro82@hotmail.com','ACTIVO'),(349,'Sss','ssss','44444','calle 45','6767','76767','','TÉCNICO SISTEMAS','FMEKMF@DKK.com','ACTIVO'),(353,'Eriberto Perez','Gonzales Perez','333244','calle 34','4434','34343','4444444','TÉCNICO SISTEMAS','epro82@hotmail.com','ACTIVO'),(354,'hkhk','hkh','114','calle 34','5445','4562358796','4545','TÉCNICO ELECTRONICA','edwinparrales82@gmail.co','ACTIVO');

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `codigo_prove` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_tel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `num_movil` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo_prove`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `proveedores` */

insert  into `proveedores`(`codigo_prove`,`nombre`,`nit`,`num_tel`,`num_movil`,`email`,`direccion`,`ciudad`) values (1,'CIBER COM s','34334','5454545','3434343455','CIBER@K.COM','CALLE 6 NORTE PASARELA LOCAL 200','CALI'),(3,'EXEL SA','343434','45454545','3455557788','ertt@hhh.com','calle 56 a barrio chapineros','Cali'),(4,'MOUSER ELECTRONICS','399093','343434DD','3455554444','or@ui.com','calle 45','cali');

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `id_act` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci,
  `tipo_servicio` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subcategoria` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id_act`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `servicios` */

insert  into `servicios`(`id_act`,`nombre`,`descripcion`,`tipo_servicio`,`subcategoria`,`valor`) values (2,'MANTENIMIENTO PREVENTIVO DE SOFTWARE','Se realiza revisión del funcionamiento del sistema, se realiza limpieza de archivos temporales, limpieza de registro , actializaciones,','MANTENIMIENTO PREVENTIVO','SOFTWARE',45000),(3,'REVISIÓN','Se realiza una revisión y diagnostico del problema.','MANTENIMIENTO CORRECTIVO','HARDWARE',20000),(4,'INSTALACIÓN DE PAQUETES DE OFIMÁTICA Y UTILIDADES','Se instala software requerido por el cliente gratuito o en caso de requerir licencias estas serán suministradas por el\r\ncliente.','MANTENIMIENTO CORRECTIVO','SOFTWARE',40000),(5,'MANTENIMIENTO CORRECTIVO DE HARDWARE','Se realiza cambio de algún componente electrónico interno o externo del equipo, se realizan pruebas del correcto funcionamiento del equipo.','MANTENIMIENTO CORRECTIVO','HARDWARE',25000),(6,'RESPALDO DE ARCHIVOS','Se realiza una copia de los archivos especificados por el cliente en alguna unidad de almacenamiento suministrada','MANTENIMIENTO PREVENTIVO','SOFTWARE',30000);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `consec` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dni_prof` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`consec`),
  UNIQUE KEY `unico login` (`login`),
  KEY `fk-us-pro` (`dni_prof`),
  CONSTRAINT `fk-profe` FOREIGN KEY (`dni_prof`) REFERENCES `profesionales` (`num_cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`consec`,`login`,`password`,`perfil`,`dni_prof`,`estado`) values (9,'cmartinez','202cb962ac59075b964b07152d234b70','TECNICO','4564','ACTIVO'),(16,'prueba5','202cb962ac59075b964b07152d234b70','TECNICO','34343','ACTIVO'),(17,'prueba9','202cb962ac59075b964b07152d234b70','ADMINISTRADOR','333244','ACTIVO'),(18,'prueba ppomrm','202cb962ac59075b964b07152d234b70','ADMINISTRADOR','114','ACTIVO'),(22,'usuariopo','202cb962ac59075b964b07152d234b70','OPERADOR','16942367','ACTIVO'),(49,'susses','202cb962ac59075b964b07152d234b70','ADMINISTRADOR','16942367','ACTIVO'),(52,'doctorh','202cb962ac59075b964b07152d234b70','OPERADOR','16942367','ACTIVO'),(57,'eparrales','202cb962ac59075b964b07152d234b70','ADMINISTRADOR','16942367','ACTIVO'),(58,'root','202cb962ac59075b964b07152d234b70','ADMINISTRADOR','16942367','ACTIVO'),(59,'tecnicoprueba','202cb962ac59075b964b07152d234b70','TECNICO','90034040','ACTIVO');

/* Procedure structure for procedure `pro_select` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_select` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_select`(IN id INT)
BEGIN
 select * from ot_equipocliente where cons=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ptotalizador` */

/*!50003 DROP PROCEDURE IF EXISTS  `ptotalizador` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ptotalizador`(in idot int)
BEGIN
        SELECT  detalle_ot_servicios.*,
CONCAT(`servicios`.`nombre`," Descripcion:",`servicios`.`descripcion` )AS InfoServicios,servicios.`valor` AS ValorServicio,
CONCAT(dispositivos.`cons_dispo`,dispositivos.`nombre`,dispositivos.`tipo_tec`)AS InfoDispositivo,
CONCAT(marcas.`nombre`) AS nombreMarca ,
CONCAT("Cod:",clientes.cod_client,"Dni:",clientes.dni,"Nom:",clientes.nombre,"Num Cel:",clientes.num_celular)AS InformacionCliente,
vtotalizadora.`Valor_Total_Dispositivos`,vtotalizadora.`Valor_Total_Servicios`,vtotalizadora.`Valor_Total`
FROM  detalle_ot_servicios
INNER JOIN ordentrabajo ON ordentrabajo.`cons_ot`=`detalle_ot_servicios`.`id_ot`
INNER JOIN `clientes` ON `clientes`.`cod_client`=ordentrabajo.`id_cliente`
LEFT JOIN dispositivos ON dispositivos.`cons_dispo`=detalle_ot_servicios.`id_dispo`
LEFT JOIN servicios ON servicios.`id_act`=detalle_ot_servicios.`id_ser`
LEFT JOIN marcas ON marcas.`cod_marc`= detalle_ot_servicios.`id_marca`
LEFT JOIN vtotalizadora ON vtotalizadora.`id_ot`=`detalle_ot_servicios`.`id_ot`
WHERE detalle_ot_servicios.`id_ot`=idot;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_otequipos` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_otequipos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_otequipos`(in id_ot int)
BEGIN
    
    SELECT * FROM ot_equipocliente INNER JOIN `equiposclientes` ON ot_equipocliente.`id_equipo`=equiposclientes.`cons`
INNER JOIN marcas ON marcas.`cod_marc`= equiposclientes.`id_marca`
inner join dispositivos on dispositivos.`cons_dispo`=equiposclientes.`id_dispo`
  where ot_equipocliente.`id_ot`=id_ot;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_reporteot` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_reporteot` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_reporteot`(in id_ot int)
BEGIN
     select * from vtablaot  where vtablaot.`cons_ot`=id_ot;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_volanteingreso` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_volanteingreso` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_volanteingreso`(in id_ot int)
BEGIN
    
    SELECT ordentrabajo.*,clientes.*,ot_equipocliente.*,dispositivos.`cons_dispo`,dispositivos.`nombre` as nom_dispositivo,dispositivos.`tipo_tec` ,equiposclientes.* ,marcas.`nombre` as nom_marca FROM ordentrabajo INNER JOIN clientes ON clientes.`cod_client`=ordentrabajo.`id_cliente`
LEFT JOIN ot_equipocliente ON ot_equipocliente.`id_ot`=ordentrabajo.`cons_ot`
LEFT JOIN equiposclientes ON equiposclientes.`cons`=`ot_equipocliente`.`id_equipo`
LEFT JOIN dispositivos ON dispositivos.`cons_dispo`=equiposclientes.`id_dispo`
left join marcas on equiposclientes.`id_marca`=marcas.`cod_marc`
WHERE ordentrabajo.`cons_ot`=id_ot;
    END */$$
DELIMITER ;

/*Table structure for table `vagenda` */

DROP TABLE IF EXISTS `vagenda`;

/*!50001 DROP VIEW IF EXISTS `vagenda` */;
/*!50001 DROP TABLE IF EXISTS `vagenda` */;

/*!50001 CREATE TABLE  `vagenda`(
 `cons` int(11) ,
 `fecha_reg` timestamp ,
 `id_ot` int(11) ,
 `id_pro` int(11) ,
 `observaciones` varchar(200) ,
 `estado_act` varchar(50) ,
 `prioridad` enum('ALTA','MEDIA','NORMAL') ,
 `OT` mediumtext ,
 `PROFESIONAL` varchar(200) ,
 `CLIENTE` varchar(427) 
)*/;

/*Table structure for table `vagendaprofesional` */

DROP TABLE IF EXISTS `vagendaprofesional`;

/*!50001 DROP VIEW IF EXISTS `vagendaprofesional` */;
/*!50001 DROP TABLE IF EXISTS `vagendaprofesional` */;

/*!50001 CREATE TABLE  `vagendaprofesional`(
 `cons` int(11) ,
 `fecha_reg` timestamp ,
 `id_ot` int(11) ,
 `id_pro` int(11) ,
 `observaciones` varchar(200) ,
 `estado_act` varchar(50) ,
 `prioridad` enum('ALTA','MEDIA','NORMAL') ,
 `OT` mediumtext ,
 `EQUIPO` mediumtext ,
 `ESPECIALISTA` varchar(224) 
)*/;

/*Table structure for table `vcomprodetalleot` */

DROP TABLE IF EXISTS `vcomprodetalleot`;

/*!50001 DROP VIEW IF EXISTS `vcomprodetalleot` */;
/*!50001 DROP TABLE IF EXISTS `vcomprodetalleot` */;

/*!50001 CREATE TABLE  `vcomprodetalleot`(
 `cons` int(11) ,
 `id_ot` int(11) ,
 `id_ser` int(11) ,
 `observaciones` mediumtext ,
 `id_dispo` int(11) ,
 `modelo` varchar(200) ,
 `id_marca` int(11) ,
 `seriales` varchar(200) ,
 `capacidad` varchar(200) ,
 `valor_dispositivo` double ,
 `id_proveedor` int(11) ,
 `num_factura` varchar(200) ,
 `equipo_cliente` varchar(200) ,
 `id_act` int(11) ,
 `nombre` varchar(200) ,
 `descripcion` mediumtext ,
 `tipo_servicio` varchar(200) ,
 `subcategoria` varchar(200) ,
 `valor` double ,
 `disnombre` varchar(100) ,
 `tipo_tec` varchar(100) ,
 `total_dispisu` double ,
 `total_servicios` double ,
 `total` double 
)*/;

/*Table structure for table `vdetalleot` */

DROP TABLE IF EXISTS `vdetalleot`;

/*!50001 DROP VIEW IF EXISTS `vdetalleot` */;
/*!50001 DROP TABLE IF EXISTS `vdetalleot` */;

/*!50001 CREATE TABLE  `vdetalleot`(
 `cons` int(11) ,
 `id_ot` int(11) ,
 `id_ser` int(11) ,
 `observaciones` mediumtext ,
 `id_dispo` int(11) ,
 `modelo` varchar(200) ,
 `id_marca` int(11) ,
 `seriales` varchar(200) ,
 `capacidad` varchar(200) ,
 `valor_dispositivo` double ,
 `id_proveedor` int(11) ,
 `num_factura` varchar(200) ,
 `equipo_cliente` varchar(200) ,
 `proveedor` varchar(208) ,
 `dispositivo` varchar(209) ,
 `marca` varchar(205) ,
 `servicios` varchar(232) ,
 `OT` mediumtext ,
 `SUM` varchar(32) 
)*/;

/*Table structure for table `veqot` */

DROP TABLE IF EXISTS `veqot`;

/*!50001 DROP VIEW IF EXISTS `veqot` */;
/*!50001 DROP TABLE IF EXISTS `veqot` */;

/*!50001 CREATE TABLE  `veqot`(
 `cons` int(11) ,
 `id_dispo` int(11) ,
 `id_marca` int(11) ,
 `id_cliente` int(11) ,
 `modelo` varchar(200) ,
 `serial` varchar(200) ,
 `placa` varchar(200) ,
 `detallesFisicos` varchar(200) ,
 `cliente` varchar(11) ,
 `ot` varchar(11) 
)*/;

/*Table structure for table `vequiposclientes` */

DROP TABLE IF EXISTS `vequiposclientes`;

/*!50001 DROP VIEW IF EXISTS `vequiposclientes` */;
/*!50001 DROP TABLE IF EXISTS `vequiposclientes` */;

/*!50001 CREATE TABLE  `vequiposclientes`(
 `cons` int(11) ,
 `id_dispo` int(11) ,
 `id_marca` int(11) ,
 `id_cliente` int(11) ,
 `modelo` varchar(200) ,
 `serial` varchar(200) ,
 `placa` varchar(200) ,
 `detallesFisicos` varchar(200) ,
 `CLINETE` varchar(413) ,
 `MARCA` varchar(212) ,
 `DISPOSITIVO` varchar(213) 
)*/;

/*Table structure for table `vlogin` */

DROP TABLE IF EXISTS `vlogin`;

/*!50001 DROP VIEW IF EXISTS `vlogin` */;
/*!50001 DROP TABLE IF EXISTS `vlogin` */;

/*!50001 CREATE TABLE  `vlogin`(
 `consec` int(11) ,
 `login` varchar(200) ,
 `password` varchar(250) ,
 `perfil` varchar(30) ,
 `dni_prof` varchar(100) ,
 `estado` varchar(30) ,
 `id_pro` int(11) ,
 `nombres` varchar(100) ,
 `apellidos` varchar(100) ,
 `num_cedula` varchar(100) ,
 `direccion` varchar(100) ,
 `num_tel` varchar(100) ,
 `num_movil` varchar(100) ,
 `num_tarjeProfe` varchar(100) ,
 `cargo` varchar(100) ,
 `email` varchar(100) ,
 `estado_bd` varchar(50) 
)*/;

/*Table structure for table `votequipocliente` */

DROP TABLE IF EXISTS `votequipocliente`;

/*!50001 DROP VIEW IF EXISTS `votequipocliente` */;
/*!50001 DROP TABLE IF EXISTS `votequipocliente` */;

/*!50001 CREATE TABLE  `votequipocliente`(
 `cons` int(11) ,
 `id_equipo` int(11) ,
 `id_ot` int(11) ,
 `Observaciones` text ,
 `EQUIPOS` text ,
 `OT` mediumtext 
)*/;

/*Table structure for table `vreportecosto` */

DROP TABLE IF EXISTS `vreportecosto`;

/*!50001 DROP VIEW IF EXISTS `vreportecosto` */;
/*!50001 DROP TABLE IF EXISTS `vreportecosto` */;

/*!50001 CREATE TABLE  `vreportecosto`(
 `cons` int(11) ,
 `id_ot` int(11) ,
 `id_ser` int(11) ,
 `observaciones` mediumtext ,
 `id_dispo` int(11) ,
 `modelo` varchar(200) ,
 `id_marca` int(11) ,
 `seriales` varchar(200) ,
 `capacidad` varchar(200) ,
 `valor_dispositivo` double ,
 `id_proveedor` int(11) ,
 `num_factura` varchar(200) ,
 `equipo_cliente` varchar(200) ,
 `id_act` int(11) ,
 `nombre_servicio` varchar(200) ,
 `cons_dispo` int(11) ,
 `nombre` varchar(100) ,
 `tipo_tec` varchar(100) ,
 `Valor_Total_Dispositivos` double ,
 `Valor_Total_Servicios` double ,
 `Valor_Total` double 
)*/;

/*Table structure for table `vtablaot` */

DROP TABLE IF EXISTS `vtablaot`;

/*!50001 DROP VIEW IF EXISTS `vtablaot` */;
/*!50001 DROP TABLE IF EXISTS `vtablaot` */;

/*!50001 CREATE TABLE  `vtablaot`(
 `cons_ot` varchar(11) ,
 `fecha` timestamp ,
 `id_cliente` int(11) ,
 `solicitud` text ,
 `estado_proce` varchar(50) ,
 `fecha_entrega` datetime ,
 `usuario` varchar(200) ,
 `cliente` text 
)*/;

/*Table structure for table `vtablaot2` */

DROP TABLE IF EXISTS `vtablaot2`;

/*!50001 DROP VIEW IF EXISTS `vtablaot2` */;
/*!50001 DROP TABLE IF EXISTS `vtablaot2` */;

/*!50001 CREATE TABLE  `vtablaot2`(
 `cons_ot` varchar(15) ,
 `estado_proce` varchar(50) ,
 `fecha` timestamp ,
 `fecha_entrega` datetime ,
 `solicitud` text ,
 `usuario` varchar(200) ,
 `cliente` varchar(433) 
)*/;

/*Table structure for table `vtotalizadora` */

DROP TABLE IF EXISTS `vtotalizadora`;

/*!50001 DROP VIEW IF EXISTS `vtotalizadora` */;
/*!50001 DROP TABLE IF EXISTS `vtotalizadora` */;

/*!50001 CREATE TABLE  `vtotalizadora`(
 `id_ot` int(11) ,
 `Valor_Total_Dispositivos` double ,
 `Valor_Total_Servicios` double ,
 `Valor_Total` double 
)*/;

/*Table structure for table `vusuarios` */

DROP TABLE IF EXISTS `vusuarios`;

/*!50001 DROP VIEW IF EXISTS `vusuarios` */;
/*!50001 DROP TABLE IF EXISTS `vusuarios` */;

/*!50001 CREATE TABLE  `vusuarios`(
 `consec` int(11) ,
 `login` varchar(200) ,
 `password` varchar(250) ,
 `perfil` varchar(30) ,
 `dni_prof` varchar(100) ,
 `estado` varchar(30) ,
 `id_pro` int(11) ,
 `nombres` varchar(100) ,
 `apellidos` varchar(100) ,
 `num_cedula` varchar(100) ,
 `direccion` varchar(100) ,
 `num_tel` varchar(100) ,
 `num_movil` varchar(100) ,
 `num_tarjeProfe` varchar(100) ,
 `cargo` varchar(100) ,
 `email` varchar(100) ,
 `estado_bd` varchar(50) 
)*/;

/*View structure for view vagenda */

/*!50001 DROP TABLE IF EXISTS `vagenda` */;
/*!50001 DROP VIEW IF EXISTS `vagenda` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vagenda` AS (select `agenda`.`cons` AS `cons`,`agenda`.`fecha_reg` AS `fecha_reg`,`agenda`.`id_ot` AS `id_ot`,`agenda`.`id_pro` AS `id_pro`,`agenda`.`observaciones` AS `observaciones`,`agenda`.`estado_act` AS `estado_act`,`agenda`.`prioridad` AS `prioridad`,concat(`ordentrabajo`.`cons_ot`,`ordentrabajo`.`solicitud`) AS `OT`,concat(`profesionales`.`nombres`,`profesionales`.`num_cedula`) AS `PROFESIONAL`,concat(`clientes`.`cod_client`,' Dni ',`clientes`.`dni`,`clientes`.`cod_client`,`clientes`.`nombre`) AS `CLIENTE` from (((`agenda` join `ordentrabajo` on((`ordentrabajo`.`cons_ot` = `agenda`.`id_ot`))) join `profesionales` on((`profesionales`.`id_pro` = `agenda`.`id_pro`))) join `clientes` on((`ordentrabajo`.`id_cliente` = `clientes`.`cod_client`)))) */;

/*View structure for view vagendaprofesional */

/*!50001 DROP TABLE IF EXISTS `vagendaprofesional` */;
/*!50001 DROP VIEW IF EXISTS `vagendaprofesional` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vagendaprofesional` AS (select `agenda`.`cons` AS `cons`,`agenda`.`fecha_reg` AS `fecha_reg`,`agenda`.`id_ot` AS `id_ot`,`agenda`.`id_pro` AS `id_pro`,`agenda`.`observaciones` AS `observaciones`,`agenda`.`estado_act` AS `estado_act`,`agenda`.`prioridad` AS `prioridad`,concat('solicitud:',`vtablaot`.`solicitud`,`vtablaot`.`cliente`) AS `OT`,concat(`votequipocliente`.`EQUIPOS`) AS `EQUIPO`,concat('COD:',`profesionales`.`id_pro`,' / ',`profesionales`.`apellidos`,' /DNI:',`profesionales`.`num_cedula`) AS `ESPECIALISTA` from (((`agenda` join `profesionales` on((`agenda`.`id_pro` = `profesionales`.`id_pro`))) join `vtablaot` on((`agenda`.`id_ot` = `vtablaot`.`cons_ot`))) left join `votequipocliente` on((`agenda`.`id_ot` = `votequipocliente`.`id_ot`)))) */;

/*View structure for view vcomprodetalleot */

/*!50001 DROP TABLE IF EXISTS `vcomprodetalleot` */;
/*!50001 DROP VIEW IF EXISTS `vcomprodetalleot` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcomprodetalleot` AS (select `detalle_ot_servicios`.`cons` AS `cons`,`detalle_ot_servicios`.`id_ot` AS `id_ot`,`detalle_ot_servicios`.`id_ser` AS `id_ser`,`detalle_ot_servicios`.`observaciones` AS `observaciones`,`detalle_ot_servicios`.`id_dispo` AS `id_dispo`,`detalle_ot_servicios`.`modelo` AS `modelo`,`detalle_ot_servicios`.`id_marca` AS `id_marca`,`detalle_ot_servicios`.`seriales` AS `seriales`,`detalle_ot_servicios`.`capacidad` AS `capacidad`,`detalle_ot_servicios`.`valor_dispositivo` AS `valor_dispositivo`,`detalle_ot_servicios`.`id_proveedor` AS `id_proveedor`,`detalle_ot_servicios`.`num_factura` AS `num_factura`,`detalle_ot_servicios`.`equipo_cliente` AS `equipo_cliente`,`servicios`.`id_act` AS `id_act`,`servicios`.`nombre` AS `nombre`,`servicios`.`descripcion` AS `descripcion`,`servicios`.`tipo_servicio` AS `tipo_servicio`,`servicios`.`subcategoria` AS `subcategoria`,`servicios`.`valor` AS `valor`,`dispositivos`.`nombre` AS `disnombre`,`dispositivos`.`tipo_tec` AS `tipo_tec`,sum(`detalle_ot_servicios`.`valor_dispositivo`) AS `total_dispisu`,sum(`servicios`.`valor`) AS `total_servicios`,sum((`detalle_ot_servicios`.`valor_dispositivo` + `servicios`.`valor`)) AS `total` from (((`detalle_ot_servicios` left join `dispositivos` on((`detalle_ot_servicios`.`id_dispo` = `dispositivos`.`cons_dispo`))) left join `ordentrabajo` on((`ordentrabajo`.`cons_ot` = `detalle_ot_servicios`.`id_ot`))) left join `servicios` on((`detalle_ot_servicios`.`id_ser` = `servicios`.`id_act`))) group by `detalle_ot_servicios`.`id_ot`) */;

/*View structure for view vdetalleot */

/*!50001 DROP TABLE IF EXISTS `vdetalleot` */;
/*!50001 DROP VIEW IF EXISTS `vdetalleot` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetalleot` AS (select `detalle_ot_servicios`.`cons` AS `cons`,`detalle_ot_servicios`.`id_ot` AS `id_ot`,`detalle_ot_servicios`.`id_ser` AS `id_ser`,`detalle_ot_servicios`.`observaciones` AS `observaciones`,`detalle_ot_servicios`.`id_dispo` AS `id_dispo`,`detalle_ot_servicios`.`modelo` AS `modelo`,`detalle_ot_servicios`.`id_marca` AS `id_marca`,`detalle_ot_servicios`.`seriales` AS `seriales`,`detalle_ot_servicios`.`capacidad` AS `capacidad`,`detalle_ot_servicios`.`valor_dispositivo` AS `valor_dispositivo`,`detalle_ot_servicios`.`id_proveedor` AS `id_proveedor`,`detalle_ot_servicios`.`num_factura` AS `num_factura`,`detalle_ot_servicios`.`equipo_cliente` AS `equipo_cliente`,concat('NIT:',`proveedores`.`nit`,'NOM:',`proveedores`.`nombre`) AS `proveedor`,concat('DIS:',`dispositivos`.`nombre`,'TIPO:',`dispositivos`.`tipo_tec`) AS `dispositivo`,concat('MARC:',`marcas`.`nombre`) AS `marca`,concat('SERV:',`servicios`.`nombre`,'VAL$:',`servicios`.`valor`) AS `servicios`,concat('SOLICITUD: ',`vtablaot`.`solicitud`,'CLIEN:',`vtablaot`.`cliente`) AS `OT`,concat('VAL_SUM$:',(`detalle_ot_servicios`.`valor_dispositivo` + `servicios`.`valor`)) AS `SUM` from (((((`detalle_ot_servicios` left join `proveedores` on((`detalle_ot_servicios`.`id_proveedor` = `proveedores`.`codigo_prove`))) left join `dispositivos` on((`detalle_ot_servicios`.`id_dispo` = `dispositivos`.`cons_dispo`))) left join `marcas` on((`detalle_ot_servicios`.`id_marca` = `marcas`.`cod_marc`))) left join `servicios` on((`detalle_ot_servicios`.`id_ser` = `servicios`.`id_act`))) join `vtablaot` on((`detalle_ot_servicios`.`id_ot` = `vtablaot`.`cons_ot`)))) */;

/*View structure for view veqot */

/*!50001 DROP TABLE IF EXISTS `veqot` */;
/*!50001 DROP VIEW IF EXISTS `veqot` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `veqot` AS (select `equiposclientes`.`cons` AS `cons`,`equiposclientes`.`id_dispo` AS `id_dispo`,`equiposclientes`.`id_marca` AS `id_marca`,`equiposclientes`.`id_cliente` AS `id_cliente`,`equiposclientes`.`modelo` AS `modelo`,`equiposclientes`.`serial` AS `serial`,`equiposclientes`.`placa` AS `placa`,`equiposclientes`.`detallesFisicos` AS `detallesFisicos`,concat(`clientes`.`cod_client`) AS `cliente`,concat(`ordentrabajo`.`cons_ot`) AS `ot` from (((`equiposclientes` join `clientes` on((`clientes`.`cod_client` = `equiposclientes`.`id_cliente`))) join `ordentrabajo` on((`ordentrabajo`.`id_cliente` = `equiposclientes`.`id_cliente`))) join `ot_equipocliente` on((`equiposclientes`.`cons` = `ot_equipocliente`.`id_equipo`)))) */;

/*View structure for view vequiposclientes */

/*!50001 DROP TABLE IF EXISTS `vequiposclientes` */;
/*!50001 DROP VIEW IF EXISTS `vequiposclientes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vequiposclientes` AS (select `equiposclientes`.`cons` AS `cons`,`equiposclientes`.`id_dispo` AS `id_dispo`,`equiposclientes`.`id_marca` AS `id_marca`,`equiposclientes`.`id_cliente` AS `id_cliente`,`equiposclientes`.`modelo` AS `modelo`,`equiposclientes`.`serial` AS `serial`,`equiposclientes`.`placa` AS `placa`,`equiposclientes`.`detallesFisicos` AS `detallesFisicos`,concat(`clientes`.`cod_client`,' ',`clientes`.`dni`,' ',`clientes`.`nombre`) AS `CLINETE`,concat(`marcas`.`cod_marc`,' ',`marcas`.`nombre`) AS `MARCA`,concat(`dispositivos`.`cons_dispo`,' ',`dispositivos`.`nombre`,' ',`dispositivos`.`tipo_tec`) AS `DISPOSITIVO` from (((`equiposclientes` join `clientes` on((`equiposclientes`.`id_cliente` = `clientes`.`cod_client`))) join `marcas` on((`marcas`.`cod_marc` = `equiposclientes`.`id_marca`))) join `dispositivos` on((`dispositivos`.`cons_dispo` = `equiposclientes`.`id_dispo`)))) */;

/*View structure for view vlogin */

/*!50001 DROP TABLE IF EXISTS `vlogin` */;
/*!50001 DROP VIEW IF EXISTS `vlogin` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlogin` AS (select `usuarios`.`consec` AS `consec`,`usuarios`.`login` AS `login`,`usuarios`.`password` AS `password`,`usuarios`.`perfil` AS `perfil`,`usuarios`.`dni_prof` AS `dni_prof`,`usuarios`.`estado` AS `estado`,`profesionales`.`id_pro` AS `id_pro`,`profesionales`.`nombres` AS `nombres`,`profesionales`.`apellidos` AS `apellidos`,`profesionales`.`num_cedula` AS `num_cedula`,`profesionales`.`direccion` AS `direccion`,`profesionales`.`num_tel` AS `num_tel`,`profesionales`.`num_movil` AS `num_movil`,`profesionales`.`num_tarjeProfe` AS `num_tarjeProfe`,`profesionales`.`cargo` AS `cargo`,`profesionales`.`email` AS `email`,`profesionales`.`estado_bd` AS `estado_bd` from (`usuarios` join `profesionales` on((`usuarios`.`dni_prof` = `profesionales`.`num_cedula`)))) */;

/*View structure for view votequipocliente */

/*!50001 DROP TABLE IF EXISTS `votequipocliente` */;
/*!50001 DROP VIEW IF EXISTS `votequipocliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `votequipocliente` AS (select `ot_equipocliente`.`cons` AS `cons`,`ot_equipocliente`.`id_equipo` AS `id_equipo`,`ot_equipocliente`.`id_ot` AS `id_ot`,`ot_equipocliente`.`Observaciones` AS `Observaciones`,concat(`vequiposclientes`.`DISPOSITIVO`,`vequiposclientes`.`MARCA`,`vequiposclientes`.`CLINETE`,' S/N:',`vequiposclientes`.`serial`) AS `EQUIPOS`,concat(`vtablaot`.`cliente`,`vtablaot`.`solicitud`) AS `OT` from ((`ot_equipocliente` join `vequiposclientes` on((`ot_equipocliente`.`id_equipo` = `vequiposclientes`.`cons`))) join `vtablaot` on((`ot_equipocliente`.`id_ot` = `vtablaot`.`cons_ot`)))) */;

/*View structure for view vreportecosto */

/*!50001 DROP TABLE IF EXISTS `vreportecosto` */;
/*!50001 DROP VIEW IF EXISTS `vreportecosto` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vreportecosto` AS (select `detalle_ot_servicios`.`cons` AS `cons`,`detalle_ot_servicios`.`id_ot` AS `id_ot`,`detalle_ot_servicios`.`id_ser` AS `id_ser`,`detalle_ot_servicios`.`observaciones` AS `observaciones`,`detalle_ot_servicios`.`id_dispo` AS `id_dispo`,`detalle_ot_servicios`.`modelo` AS `modelo`,`detalle_ot_servicios`.`id_marca` AS `id_marca`,`detalle_ot_servicios`.`seriales` AS `seriales`,`detalle_ot_servicios`.`capacidad` AS `capacidad`,`detalle_ot_servicios`.`valor_dispositivo` AS `valor_dispositivo`,`detalle_ot_servicios`.`id_proveedor` AS `id_proveedor`,`detalle_ot_servicios`.`num_factura` AS `num_factura`,`detalle_ot_servicios`.`equipo_cliente` AS `equipo_cliente`,`servicios`.`id_act` AS `id_act`,`servicios`.`nombre` AS `nombre_servicio`,`dispositivos`.`cons_dispo` AS `cons_dispo`,`dispositivos`.`nombre` AS `nombre`,`dispositivos`.`tipo_tec` AS `tipo_tec`,sum(`detalle_ot_servicios`.`valor_dispositivo`) AS `Valor_Total_Dispositivos`,sum(`servicios`.`valor`) AS `Valor_Total_Servicios`,sum((`detalle_ot_servicios`.`valor_dispositivo` + `servicios`.`valor`)) AS `Valor_Total` from (((`detalle_ot_servicios` left join `dispositivos` on((`detalle_ot_servicios`.`id_dispo` = `dispositivos`.`cons_dispo`))) left join `ordentrabajo` on((`ordentrabajo`.`cons_ot` = `detalle_ot_servicios`.`id_ot`))) left join `servicios` on((`detalle_ot_servicios`.`id_ser` = `servicios`.`id_act`))) group by `detalle_ot_servicios`.`id_ot`) */;

/*View structure for view vtablaot */

/*!50001 DROP TABLE IF EXISTS `vtablaot` */;
/*!50001 DROP VIEW IF EXISTS `vtablaot` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtablaot` AS (select concat(`ordentrabajo`.`cons_ot`) AS `cons_ot`,`ordentrabajo`.`fecha` AS `fecha`,`ordentrabajo`.`id_cliente` AS `id_cliente`,`ordentrabajo`.`solicitud` AS `solicitud`,`ordentrabajo`.`estado_proce` AS `estado_proce`,`ordentrabajo`.`fecha_entrega` AS `fecha_entrega`,`ordentrabajo`.`usuario` AS `usuario`,concat(' Codigo:',`clientes`.`cod_client`,' Dni: ',`clientes`.`dni`,' Nombre:',`clientes`.`nombre`,' /Tel:',`clientes`.`num_celular`) AS `cliente` from (`ordentrabajo` join `clientes` on((`ordentrabajo`.`id_cliente` = `clientes`.`cod_client`)))) */;

/*View structure for view vtablaot2 */

/*!50001 DROP TABLE IF EXISTS `vtablaot2` */;
/*!50001 DROP VIEW IF EXISTS `vtablaot2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtablaot2` AS (select concat('OTS-',`ordentrabajo`.`cons_ot`) AS `cons_ot`,`ordentrabajo`.`estado_proce` AS `estado_proce`,`ordentrabajo`.`fecha` AS `fecha`,`ordentrabajo`.`fecha_entrega` AS `fecha_entrega`,`ordentrabajo`.`solicitud` AS `solicitud`,`ordentrabajo`.`usuario` AS `usuario`,concat(' Codigo:',`clientes`.`cod_client`,' Dni: ',`clientes`.`dni`,' Nombre:',`clientes`.`nombre`) AS `cliente` from (`ordentrabajo` join `clientes` on((`ordentrabajo`.`id_cliente` = `clientes`.`cod_client`)))) */;

/*View structure for view vtotalizadora */

/*!50001 DROP TABLE IF EXISTS `vtotalizadora` */;
/*!50001 DROP VIEW IF EXISTS `vtotalizadora` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtotalizadora` AS (select `vreportecosto`.`id_ot` AS `id_ot`,`vreportecosto`.`Valor_Total_Dispositivos` AS `Valor_Total_Dispositivos`,`vreportecosto`.`Valor_Total_Servicios` AS `Valor_Total_Servicios`,`vreportecosto`.`Valor_Total` AS `Valor_Total` from `vreportecosto`) */;

/*View structure for view vusuarios */

/*!50001 DROP TABLE IF EXISTS `vusuarios` */;
/*!50001 DROP VIEW IF EXISTS `vusuarios` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vusuarios` AS (select `usuarios`.`consec` AS `consec`,`usuarios`.`login` AS `login`,`usuarios`.`password` AS `password`,`usuarios`.`perfil` AS `perfil`,`usuarios`.`dni_prof` AS `dni_prof`,`usuarios`.`estado` AS `estado`,`profesionales`.`id_pro` AS `id_pro`,`profesionales`.`nombres` AS `nombres`,`profesionales`.`apellidos` AS `apellidos`,`profesionales`.`num_cedula` AS `num_cedula`,`profesionales`.`direccion` AS `direccion`,`profesionales`.`num_tel` AS `num_tel`,`profesionales`.`num_movil` AS `num_movil`,`profesionales`.`num_tarjeProfe` AS `num_tarjeProfe`,`profesionales`.`cargo` AS `cargo`,`profesionales`.`email` AS `email`,`profesionales`.`estado_bd` AS `estado_bd` from (`usuarios` join `profesionales`) where (`usuarios`.`dni_prof` = `profesionales`.`num_cedula`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
