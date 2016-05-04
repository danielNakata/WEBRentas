/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.6.26 : Database - dwrentas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

USE `dwrentas`;

/*Table structure for table `tcatacc` */

DROP TABLE IF EXISTS `tcatacc`;

CREATE TABLE `tcatacc` (
  `idacc` int(9) NOT NULL,
  `descacc` varchar(50) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idacc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatacc` */

insert  into `tcatacc`(`idacc`,`descacc`,`idstatus`) values (101,'INICIO DE SESION',1),(102,'USUARIO NUEVO',1),(103,'USUARIO EDICION',1),(104,'USUARIO BAJA',1);

/*Table structure for table `tcatperfiles` */

DROP TABLE IF EXISTS `tcatperfiles`;

CREATE TABLE `tcatperfiles` (
  `idperfil` int(9) NOT NULL,
  `perfil` varchar(50) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatperfiles` */

insert  into `tcatperfiles`(`idperfil`,`perfil`,`idstatus`) values (1,'SISTEMAS',1);

/*Table structure for table `tcatsexo` */

DROP TABLE IF EXISTS `tcatsexo`;

CREATE TABLE `tcatsexo` (
  `idsexo` int(3) NOT NULL DEFAULT '0',
  `sexo` varchar(25) NOT NULL DEFAULT '-',
  PRIMARY KEY (`idsexo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatsexo` */

insert  into `tcatsexo`(`idsexo`,`sexo`) values (1,'FEMENINO'),(2,'MASCULINO'),(3,'LGTT'),(9,'INDETERMINADO');

/*Table structure for table `tcatstatus` */

DROP TABLE IF EXISTS `tcatstatus`;

CREATE TABLE `tcatstatus` (
  `idstatus` int(3) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '-',
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatstatus` */

insert  into `tcatstatus`(`idstatus`,`status`) values (1,'ACTIVO'),(9,'BAJA');

/*Table structure for table `tcatstatusinmueble` */

DROP TABLE IF EXISTS `tcatstatusinmueble`;

CREATE TABLE `tcatstatusinmueble` (
  `idstatus` int(3) NOT NULL,
  `statusinmueble` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatstatusinmueble` */

insert  into `tcatstatusinmueble`(`idstatus`,`statusinmueble`) values (1,'DISPONIBLE RENTA'),(2,'RENTADO'),(3,'REPARACIONES'),(4,'MANTENIMIENTO'),(9,'BAJA');

/*Table structure for table `tcattipocontacto` */

DROP TABLE IF EXISTS `tcattipocontacto`;

CREATE TABLE `tcattipocontacto` (
  `idtipocontacto` int(9) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtipocontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcattipocontacto` */

insert  into `tcattipocontacto`(`idtipocontacto`,`descripcion`,`idstatus`) values (1,'TEL CASA',1),(2,'TEL CELULAR',1),(3,'TEL CELULAR 2',1),(4,'EMAIL',1),(5,'EMAIL 2',1);

/*Table structure for table `tcattipopagos` */

DROP TABLE IF EXISTS `tcattipopagos`;

CREATE TABLE `tcattipopagos` (
  `idtipopago` int(3) NOT NULL,
  `tipopago` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcattipopagos` */

insert  into `tcattipopagos`(`idtipopago`,`tipopago`) values (1,'NORMAL'),(2,'DEPOSITO'),(3,'RECARGO'),(4,'EXTRA');

/*Table structure for table `tcattiporenta` */

DROP TABLE IF EXISTS `tcattiporenta`;

CREATE TABLE `tcattiporenta` (
  `idtporenta` int(5) NOT NULL,
  `desctiporenta` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY (`idtporenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcattiporenta` */

insert  into `tcattiporenta`(`idtporenta`,`desctiporenta`) values (1,'MENSUAL'),(2,'SEMANAL'),(3,'QUINCENAL'),(4,'BIMESTRAL'),(5,'SEMESTRAL'),(6,'ANUAL');

/*Table structure for table `tclientes` */

DROP TABLE IF EXISTS `tclientes`;

CREATE TABLE `tclientes` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT '-',
  `apellidos` varchar(70) NOT NULL DEFAULT '-',
  `fechanac` date NOT NULL DEFAULT '1990-01-01',
  `idsexo` int(3) NOT NULL DEFAULT '0',
  `idstatus` int(3) NOT NULL DEFAULT '0',
  `fechaalta` date NOT NULL DEFAULT '1990-01-01',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT '0',
  `idusrmod` int(11) DEFAULT '0',
  `idpropietario` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientes` */

/*Table structure for table `tclientesaval` */

DROP TABLE IF EXISTS `tclientesaval`;

CREATE TABLE `tclientesaval` (
  `idcliente` int(11) NOT NULL,
  `idaval` int(9) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT '-',
  `apellidos` varchar(70) NOT NULL DEFAULT '-',
  `fechanac` date NOT NULL DEFAULT '1990-01-01',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idaval`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesaval` */

/*Table structure for table `tclientesavalcontacto` */

DROP TABLE IF EXISTS `tclientesavalcontacto`;

CREATE TABLE `tclientesavalcontacto` (
  `idcliente` int(11) NOT NULL,
  `idaval` int(9) NOT NULL,
  `idtipocontacto` int(9) NOT NULL,
  `clave` varchar(255) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idaval`,`idtipocontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesavalcontacto` */

/*Table structure for table `tclientesavaldomicilio` */

DROP TABLE IF EXISTS `tclientesavaldomicilio`;

CREATE TABLE `tclientesavaldomicilio` (
  `idcliente` int(11) NOT NULL,
  `idaval` int(9) NOT NULL,
  `iddomicilio` int(9) NOT NULL,
  `calle` varchar(150) NOT NULL DEFAULT '-',
  `numeroext` varchar(10) NOT NULL DEFAULT '-',
  `numeroint` varchar(10) DEFAULT '-',
  `codpost` varchar(5) NOT NULL DEFAULT '00000',
  `colonia` varchar(100) DEFAULT '-',
  `delmun` varchar(100) DEFAULT '-',
  `estado` varchar(40) DEFAULT NULL,
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `esverificado` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idsrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idaval`,`iddomicilio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesavaldomicilio` */

/*Table structure for table `tclientescontacto` */

DROP TABLE IF EXISTS `tclientescontacto`;

CREATE TABLE `tclientescontacto` (
  `idcliente` int(11) NOT NULL,
  `idtipocontacto` int(9) NOT NULL,
  `clave` varchar(255) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idtipocontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientescontacto` */

/*Table structure for table `tclientesdomicilio` */

DROP TABLE IF EXISTS `tclientesdomicilio`;

CREATE TABLE `tclientesdomicilio` (
  `idcliente` int(11) NOT NULL,
  `iddomicilio` int(9) NOT NULL,
  `calle` varchar(150) NOT NULL DEFAULT '-',
  `numeroext` varchar(10) NOT NULL DEFAULT '-',
  `numeroint` varchar(10) DEFAULT '-',
  `codpost` varchar(5) NOT NULL DEFAULT '00000',
  `colonia` varchar(100) DEFAULT '-',
  `delmun` varchar(100) DEFAULT '-',
  `estado` varchar(40) DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `esverificado` int(3) NOT NULL DEFAULT '0',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`iddomicilio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesdomicilio` */

/*Table structure for table `tclientesreferencias` */

DROP TABLE IF EXISTS `tclientesreferencias`;

CREATE TABLE `tclientesreferencias` (
  `idcliente` int(11) NOT NULL,
  `idreferencia` int(9) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT '-',
  `apellidos` varchar(70) NOT NULL DEFAULT '-',
  `idtiporeferencia` int(5) NOT NULL DEFAULT '0',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT '0',
  `idusrmod` int(11) DEFAULT '0',
  PRIMARY KEY (`idcliente`,`idreferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesreferencias` */

/*Table structure for table `tclientesreferenciascontacto` */

DROP TABLE IF EXISTS `tclientesreferenciascontacto`;

CREATE TABLE `tclientesreferenciascontacto` (
  `idcliente` int(11) NOT NULL,
  `idreferencia` int(11) NOT NULL,
  `idtipocontacto` int(5) NOT NULL,
  `clave` varchar(255) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idreferencia`,`idtipocontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesreferenciascontacto` */

/*Table structure for table `tclientesreferenciasdomicilio` */

DROP TABLE IF EXISTS `tclientesreferenciasdomicilio`;

CREATE TABLE `tclientesreferenciasdomicilio` (
  `idcliente` int(11) NOT NULL,
  `idreferencia` int(9) NOT NULL,
  `iddomicilio` int(9) NOT NULL,
  `calle` varchar(150) NOT NULL DEFAULT '-',
  `numext` varchar(10) NOT NULL DEFAULT '-',
  `numint` varchar(10) NOT NULL DEFAULT '-',
  `codpost` varchar(5) NOT NULL DEFAULT '00000',
  `colonia` varchar(150) DEFAULT '-',
  `delmun` varchar(150) DEFAULT '-',
  `estado` varchar(40) DEFAULT '-',
  PRIMARY KEY (`idcliente`,`idreferencia`,`iddomicilio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tclientesreferenciasdomicilio` */

/*Table structure for table `thistcambiorentas` */

DROP TABLE IF EXISTS `thistcambiorentas`;

CREATE TABLE `thistcambiorentas` (
  `idinmueble` int(9) NOT NULL,
  `fechacambio` date NOT NULL,
  `rentaanterior` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `rentanueva` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `fechaaplica` date DEFAULT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idusrreg` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinmueble`,`fechacambio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `thistcambiorentas` */

/*Table structure for table `tinmuebles` */

DROP TABLE IF EXISTS `tinmuebles`;

CREATE TABLE `tinmuebles` (
  `idinmueble` int(9) NOT NULL,
  `descripcion` varchar(255) NOT NULL DEFAULT '-',
  `calle` varchar(150) NOT NULL DEFAULT '-',
  `numext` varchar(10) NOT NULL DEFAULT '-',
  `numint` varchar(10) NOT NULL DEFAULT '-',
  `codpost` varchar(5) NOT NULL DEFAULT '00000',
  `colonia` varchar(150) NOT NULL DEFAULT '-',
  `delmun` varchar(150) NOT NULL DEFAULT '-',
  `estado` varchar(40) NOT NULL DEFAULT '-',
  `idstatus` int(3) NOT NULL DEFAULT '1',
  `fechaultimarenta` date DEFAULT '1990-01-01',
  `fechaultimopago` date DEFAULT '1990-01-01',
  `idcliente` int(11) NOT NULL,
  `montorenta` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `fechaultimocambio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numadeudos` int(11) DEFAULT '0',
  `idtiporenta` int(5) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  `idpropietario` int(11) NOT NULL,
  `deposito` decimal(16,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`idinmueble`),
  KEY `FK_tinmuebles_01` (`idstatus`),
  KEY `FK_tinmuebles_02` (`idtiporenta`),
  CONSTRAINT `FK_tinmuebles_01` FOREIGN KEY (`idstatus`) REFERENCES `tcatstatusinmueble` (`idstatus`),
  CONSTRAINT `FK_tinmuebles_02` FOREIGN KEY (`idtiporenta`) REFERENCES `tcattiporenta` (`idtporenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tinmuebles` */

insert  into `tinmuebles`(`idinmueble`,`descripcion`,`calle`,`numext`,`numint`,`codpost`,`colonia`,`delmun`,`estado`,`idstatus`,`fechaultimarenta`,`fechaultimopago`,`idcliente`,`montorenta`,`fechaultimocambio`,`numadeudos`,`idtiporenta`,`fechareg`,`fechamod`,`idusrreg`,`idusrmod`,`idpropietario`,`deposito`) values (1,'casa habitacion villas arco sur','badminton','29B','-','91162','villas arco sur','xalapa','veracruz',1,'1990-01-01','1990-01-01',0,'5000.0000','2016-04-29 17:43:36',0,1,'2016-04-24 18:33:43','2016-04-29 17:43:36',0,0,1,'5000.0000'),(2,'casa dos pisos estudiantes','saturno','93','-','14370','miradores del sumidero','xalapa','veracruz',1,'1990-01-01','1990-01-01',0,'2500.0000','2016-04-27 00:09:01',0,1,'2016-04-27 00:09:01','0000-00-00 00:00:00',1,NULL,1,'2500.0000'),(3,'casa miradores del sumidero','saturno 98','98','B','14370','Miradores del Sumidero','Xalapa','Veracruz',1,'1990-01-01','1990-01-01',0,'1000.0000','2016-04-27 00:11:07',0,3,'2016-04-27 00:11:07','0000-00-00 00:00:00',1,NULL,1,'1000.0000'),(4,'casa un piso','privada c','17','-','91160','juan de la luz enriquez','xalapa de enriquez','veracruz',9,'1990-01-01','1990-01-01',0,'2500.0000','2016-04-29 17:43:27',0,1,'2016-04-27 00:19:16','2016-04-29 17:43:27',1,0,1,'2500.0000');

/*Table structure for table `tlogacciones` */

DROP TABLE IF EXISTS `tlogacciones`;

CREATE TABLE `tlogacciones` (
  `idlog` bigint(20) NOT NULL AUTO_INCREMENT,
  `idusr` int(11) NOT NULL,
  `fechaacc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lugaracc` varchar(50) DEFAULT '-',
  `idacc` int(9) NOT NULL DEFAULT '0',
  `estatusacc` int(3) NOT NULL DEFAULT '0',
  `vlrsact` text,
  `vlrsnvos` text,
  `idpropietario` int(11) NOT NULL,
  PRIMARY KEY (`idlog`),
  KEY `ix_tlogacciones_01` (`idusr`,`fechaacc`),
  KEY `ix_tlogacciones_02` (`fechaacc`),
  KEY `FK_tlogacciones_01` (`idacc`),
  CONSTRAINT `FK_tlogacciones_01` FOREIGN KEY (`idacc`) REFERENCES `tcatacc` (`idacc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tlogacciones` */

/*Table structure for table `tpagos` */

DROP TABLE IF EXISTS `tpagos`;

CREATE TABLE `tpagos` (
  `idpago` int(11) NOT NULL,
  `idinmueble` int(9) NOT NULL,
  `fechapago` date NOT NULL,
  `montorenta` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `montopago` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `montorestante` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `idtipopago` int(3) NOT NULL DEFAULT '1',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT NULL,
  `idusrmod` int(11) DEFAULT NULL,
  `idpropietario` int(11) NOT NULL,
  PRIMARY KEY (`idpago`,`idinmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tpagos` */

/*Table structure for table `tpropietarios` */

DROP TABLE IF EXISTS `tpropietarios`;

CREATE TABLE `tpropietarios` (
  `idpropietario` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id` varchar(50) NOT NULL,
  `fechaalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechafin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idestatus` int(1) NOT NULL,
  PRIMARY KEY (`idpropietario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tpropietarios` */

insert  into `tpropietarios`(`idpropietario`,`clave`,`id`,`fechaalta`,`fechafin`,`idestatus`) values (1,'f1cd7eef999857c8f0ebe58e50f77642','f1cd7eef999857c8f0ebe58e50f77642','2016-04-23 19:48:08','0000-00-00 00:00:00',1);

/*Table structure for table `tusuarios` */

DROP TABLE IF EXISTS `tusuarios`;

CREATE TABLE `tusuarios` (
  `idusr` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL DEFAULT '123456',
  `nombre` varchar(70) NOT NULL DEFAULT '-',
  `apellidos` varchar(70) DEFAULT '-',
  `idperfil` int(3) NOT NULL DEFAULT '1',
  `idestatus` int(3) NOT NULL DEFAULT '1',
  `cambiapass` int(3) NOT NULL DEFAULT '0',
  `ultimoacc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idusrreg` int(11) DEFAULT '0',
  `idusrmod` int(11) DEFAULT NULL,
  `idpropietario` int(11) NOT NULL,
  PRIMARY KEY (`idusr`),
  UNIQUE KEY `ix_tusuarios_01` (`usuario`),
  KEY `ix_tusuarios_02` (`usuario`,`contrasena`),
  KEY `FK_tusuarios_01` (`idperfil`),
  KEY `FK_tusuarios_02` (`idestatus`),
  CONSTRAINT `FK_tusuarios_01` FOREIGN KEY (`idperfil`) REFERENCES `tcatperfiles` (`idperfil`),
  CONSTRAINT `FK_tusuarios_02` FOREIGN KEY (`idestatus`) REFERENCES `tcatstatus` (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tusuarios` */

insert  into `tusuarios`(`idusr`,`usuario`,`contrasena`,`nombre`,`apellidos`,`idperfil`,`idestatus`,`cambiapass`,`ultimoacc`,`fechareg`,`fechamod`,`idusrreg`,`idusrmod`,`idpropietario`) values (1,'danielnakata','*5722441E0C79383D0DB2DC70142610E089D9828E','daniel','ortega',1,1,0,'2016-04-23 19:50:05','2016-04-23 19:50:05','0000-00-00 00:00:00',1,NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
