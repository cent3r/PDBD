/*
Navicat MySQL Data Transfer

Source Server         : Conection
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : capacitacion

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-30 11:21:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `IdDependencia` int(100) DEFAULT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Dependencia` (`IdDependencia`) USING BTREE,
  CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`IdDependencia`) REFERENCES `dependencias` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', '2', 'Comunicaciones', 'Activo');
INSERT INTO `areas` VALUES ('2', '1', 'Ambiental', 'Activo');
INSERT INTO `areas` VALUES ('3', '3', 'Comunicaciones', 'Activo');
INSERT INTO `areas` VALUES ('8', '3', 'Servicios', 'Activo');

-- ----------------------------
-- Table structure for capacitadores
-- ----------------------------
DROP TABLE IF EXISTS `capacitadores`;
CREATE TABLE `capacitadores` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `IDPersona` int(100) DEFAULT NULL,
  `Curriculum` text,
  `Empresa` varchar(25) DEFAULT NULL,
  `Estatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Pers` (`IDPersona`) USING BTREE,
  CONSTRAINT `capacitadores_ibfk_1` FOREIGN KEY (`IDPersona`) REFERENCES `personas` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of capacitadores
-- ----------------------------
INSERT INTO `capacitadores` VALUES ('1', '4', 'Shalala', 'CFE', 'Inactivo');
INSERT INTO `capacitadores` VALUES ('3', '4', '', '', 'Inactivo');
INSERT INTO `capacitadores` VALUES ('4', '4', 'HOLIS', 'JCB', 'Activo');

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `IdNombreCurso` int(100) DEFAULT NULL,
  `Fecha de inicio` date DEFAULT NULL,
  `Fecha Fin` date DEFAULT NULL,
  `Horario` varchar(30) DEFAULT NULL,
  `IdCapacitador` int(100) DEFAULT NULL,
  `Locacion` varchar(25) DEFAULT NULL,
  `Nivel` varchar(15) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  `Duracion` date DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index NombreCurso` (`IdNombreCurso`) USING BTREE,
  KEY `index Capacitador` (`IdCapacitador`) USING BTREE,
  KEY `index duracion` (`Duracion`) USING BTREE,
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`IdCapacitador`) REFERENCES `capacitadores` (`Id`),
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`IdNombreCurso`) REFERENCES `nombrecurso` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cursos
-- ----------------------------

-- ----------------------------
-- Table structure for dependencias
-- ----------------------------
DROP TABLE IF EXISTS `dependencias`;
CREATE TABLE `dependencias` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dependencias
-- ----------------------------
INSERT INTO `dependencias` VALUES ('1', 'SAGARPA', 'Activo');
INSERT INTO `dependencias` VALUES ('2', 'Intel', 'Inactivo');
INSERT INTO `dependencias` VALUES ('3', 'CFE', 'Activo');

-- ----------------------------
-- Table structure for direcciones
-- ----------------------------
DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE `direcciones` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Calle` varchar(20) DEFAULT NULL,
  `Num Ext` int(5) DEFAULT NULL,
  `Colonia` varchar(25) DEFAULT NULL,
  `Codigo postal` int(5) DEFAULT NULL,
  `IdMunicipio` int(100) DEFAULT NULL,
  `ID_TipoPersona` int(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Municipio` (`IdMunicipio`) USING BTREE,
  KEY `index Personas` (`ID_TipoPersona`) USING BTREE,
  CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`ID_TipoPersona`) REFERENCES `perss` (`Id`),
  CONSTRAINT `direcciones_ibfk_2` FOREIGN KEY (`IdMunicipio`) REFERENCES `municipios` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of direcciones
-- ----------------------------

-- ----------------------------
-- Table structure for municipios
-- ----------------------------
DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Nombre Municipio` varchar(20) DEFAULT NULL,
  `Estatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of municipios
-- ----------------------------

-- ----------------------------
-- Table structure for nombrecurso
-- ----------------------------
DROP TABLE IF EXISTS `nombrecurso`;
CREATE TABLE `nombrecurso` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of nombrecurso
-- ----------------------------
INSERT INTO `nombrecurso` VALUES ('1', 'SECW3', 'Activo');
INSERT INTO `nombrecurso` VALUES ('2', 'SECW', 'Inactivo');

-- ----------------------------
-- Table structure for participantes
-- ----------------------------
DROP TABLE IF EXISTS `participantes`;
CREATE TABLE `participantes` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `IdTrabajador` int(100) DEFAULT NULL,
  `IdCurso` int(100) DEFAULT NULL,
  `Estatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Trabajador` (`IdTrabajador`) USING BTREE,
  KEY `index Curso` (`IdCurso`) USING BTREE,
  CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`Id`),
  CONSTRAINT `participantes_ibfk_2` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajadores` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of participantes
-- ----------------------------

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  `Tipo` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', 'Clara Miguel Villarreal', 'VIMC950811MDGLRL05', '1995-08-11', 'VIMC1195', 'Femenino', 'Activo', 'Trabajador');
INSERT INTO `personas` VALUES ('2', 'Brandon Barrera', 'BASB960316HDGLRL02', '1996-03-16', 'BASB1696', 'Masculino', 'Activo', 'Trabajador');
INSERT INTO `personas` VALUES ('3', 'Martha Salazar', 'MASA931114MDGLRL08', '0000-00-00', 'MASA9311', 'Femenino', 'Activo', 'Trabajador');
INSERT INTO `personas` VALUES ('4', 'Joel Juarez Vega', 'JVJL940311HDGLRL02', '1994-03-11', 'JVJL9411', 'Masculino', 'Activo', 'Capacitador');
INSERT INTO `personas` VALUES ('5', 'Roberto Perez', 'PERR950811HDGL08', '0000-00-00', 'PERR2545', 'Masculino', 'Activo', 'Capacitador');

-- ----------------------------
-- Table structure for perss
-- ----------------------------
DROP TABLE IF EXISTS `perss`;
CREATE TABLE `perss` (
  `Id` int(100) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `RFC` int(13) DEFAULT NULL,
  `Sexo` varchar(6) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of perss
-- ----------------------------

-- ----------------------------
-- Table structure for puestos
-- ----------------------------
DROP TABLE IF EXISTS `puestos`;
CREATE TABLE `puestos` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Puesto` varchar(20) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of puestos
-- ----------------------------
INSERT INTO `puestos` VALUES ('1', 'Gerente', 'Activo');
INSERT INTO `puestos` VALUES ('2', 'Sub Gerente', 'Activo');

-- ----------------------------
-- Table structure for telefonos
-- ----------------------------
DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE `telefonos` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `id_TipoPersona` int(100) DEFAULT NULL,
  `Tipo de persona` varchar(20) DEFAULT NULL,
  `Tipo de telefono` varchar(10) DEFAULT NULL,
  `Numero` int(10) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Personas` (`id_TipoPersona`) USING BTREE,
  CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`id_TipoPersona`) REFERENCES `perss` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of telefonos
-- ----------------------------

-- ----------------------------
-- Table structure for trabajadores
-- ----------------------------
DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE `trabajadores` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `IdPersona` int(100) DEFAULT NULL,
  `IdAreas` int(100) DEFAULT NULL,
  `NumEmpleado` varchar(7) DEFAULT NULL,
  `IdPuesto` int(100) DEFAULT NULL,
  `FechaIng` date DEFAULT NULL,
  `Horario` varchar(50) DEFAULT NULL,
  `Nivel` varchar(15) DEFAULT NULL,
  `Estatus` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `index Persona` (`IdPersona`) USING BTREE,
  KEY `index Puesto` (`IdPuesto`) USING BTREE,
  KEY `index Areas` (`IdAreas`) USING BTREE,
  KEY `index ID` (`Id`) USING BTREE,
  CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`IdAreas`) REFERENCES `areas` (`Id`),
  CONSTRAINT `trabajadores_ibfk_2` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`Id`),
  CONSTRAINT `trabajadores_ibfk_3` FOREIGN KEY (`IdPuesto`) REFERENCES `puestos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of trabajadores
-- ----------------------------
INSERT INTO `trabajadores` VALUES ('2', '2', '8', 'Emp1', '2', null, 'de 9 a 9', '2', 'Inactivo');
INSERT INTO `trabajadores` VALUES ('3', '1', '1', 'Emp2', '1', null, 'de 9 a 9', '1', 'Activo');
INSERT INTO `trabajadores` VALUES ('4', '2', '8', 'Emp1', '2', '2016-10-13', 'de 8 a 8', '2', 'Activo');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Estatus` varchar(10) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `NivelUS` varchar(10) DEFAULT NULL,
  `Id__Persna` int(100) DEFAULT NULL,
  `TipoUS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pers` (`Id__Persna`) USING BTREE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id__Persna`) REFERENCES `personas` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('4', 'Activo', 'villarreal_leo11@hotmail.com', 'holi1234', '3', '1', 'Trabajador');
INSERT INTO `usuarios` VALUES ('5', 'Inactivo', 'basb@hotmail.com', 'hjMnn123', '2', '2', 'Trabajador');
