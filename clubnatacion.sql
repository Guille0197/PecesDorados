-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for clubnatacion
CREATE DATABASE IF NOT EXISTS `clubnatacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clubnatacion`;

-- Dumping structure for table clubnatacion.adultoresponsable
CREATE TABLE IF NOT EXISTS `adultoresponsable` (
  `idadulto` varchar(50) NOT NULL,
  `nombreadulto` varchar(50) NOT NULL,
  `parentescoadulto` varchar(50) NOT NULL,
  `celularadulto` varchar(50) NOT NULL,
  `edadadulto` int(11) NOT NULL,
  PRIMARY KEY (`idadulto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.adultoresponsable: ~2 rows (approximately)
DELETE FROM `adultoresponsable`;
/*!40000 ALTER TABLE `adultoresponsable` DISABLE KEYS */;
INSERT INTO `adultoresponsable` (`idadulto`, `nombreadulto`, `parentescoadulto`, `celularadulto`, `edadadulto`) VALUES
	('88-99', 'Maria', 'Mama', '56', 35),
	('9-66', 'Pepito', 'Papa', '85', 55);
/*!40000 ALTER TABLE `adultoresponsable` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `idasistencia` int(11) NOT NULL AUTO_INCREMENT,
  `cedatleta` varchar(50) NOT NULL,
  `codcurso` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `año` year(4) NOT NULL,
  PRIMARY KEY (`idasistencia`),
  KEY `cedatleta` (`cedatleta`),
  KEY `codcurso` (`codcurso`),
  CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`cedatleta`) REFERENCES `atletas` (`cedulaatleta`),
  CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`codcurso`) REFERENCES `cursos` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.asistencia: ~3 rows (approximately)
DELETE FROM `asistencia`;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`idasistencia`, `cedatleta`, `codcurso`, `mes`, `año`) VALUES
	(3, '6-719-1951', '55g', '12', '2019'),
	(4, '7-711-8152', '66FF', '12', '2019'),
	(5, '6-719-1951', '66FF', '12', '2019');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.atletas
CREATE TABLE IF NOT EXISTS `atletas` (
  `cedulaatleta` varchar(50) NOT NULL,
  `nombreatleta` varchar(50) NOT NULL,
  `edadatleta` varchar(50) NOT NULL,
  `nadar` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `idrespo` varchar(50) NOT NULL,
  `idcur` varchar(50) NOT NULL,
  PRIMARY KEY (`cedulaatleta`),
  KEY `idres` (`idrespo`),
  KEY `idcur` (`idcur`),
  CONSTRAINT `atletas_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `atletas_ibfk_2` FOREIGN KEY (`idrespo`) REFERENCES `adultoresponsable` (`idadulto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.atletas: ~2 rows (approximately)
DELETE FROM `atletas`;
/*!40000 ALTER TABLE `atletas` DISABLE KEYS */;
INSERT INTO `atletas` (`cedulaatleta`, `nombreatleta`, `edadatleta`, `nadar`, `direccion`, `idrespo`, `idcur`) VALUES
	('6-719-1951', 'Jose', '23', 'Si', 'casa', '9-66', '55g'),
	('7-711-8152', 'Maria', '22', 'SI', 'La tiza', '88-99', '66FF');
/*!40000 ALTER TABLE `atletas` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `idcurso` varchar(50) NOT NULL,
  `horariocurso` time NOT NULL,
  `nivelcurso` varchar(50) NOT NULL,
  `costocurso` float NOT NULL,
  `codentrenador` varchar(50) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `codentrenador` (`codentrenador`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`codentrenador`) REFERENCES `entrenadores` (`cedulaentrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.cursos: ~2 rows (approximately)
DELETE FROM `cursos`;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` (`idcurso`, `horariocurso`, `nivelcurso`, `costocurso`, `codentrenador`) VALUES
	('55g', '11:30:54', '2', 25, 'AF45'),
	('66FF', '22:06:07', '2', 25, 'KLJ');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.entrenadores
CREATE TABLE IF NOT EXISTS `entrenadores` (
  `cedulaentrenador` varchar(50) NOT NULL,
  `nombreentrenador` varchar(50) NOT NULL,
  `telefonoentrenador` varchar(50) NOT NULL,
  PRIMARY KEY (`cedulaentrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.entrenadores: ~2 rows (approximately)
DELETE FROM `entrenadores`;
/*!40000 ALTER TABLE `entrenadores` DISABLE KEYS */;
INSERT INTO `entrenadores` (`cedulaentrenador`, `nombreentrenador`, `telefonoentrenador`) VALUES
	('AF45', 'Edgar', '55'),
	('KLJ', 'Marisol', '99');
/*!40000 ALTER TABLE `entrenadores` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `numerorecibo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `idcur` varchar(50) NOT NULL,
  `idrespon` varchar(50) NOT NULL,
  PRIMARY KEY (`numerorecibo`),
  KEY `idcur` (`idcur`),
  KEY `idrespon` (`idrespon`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idrespon`) REFERENCES `adultoresponsable` (`idadulto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.pagos: ~3 rows (approximately)
DELETE FROM `pagos`;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` (`numerorecibo`, `fecha`, `monto`, `idcur`, `idrespon`) VALUES
	(55, '2019-12-15', 25.00, '55g', '9-66'),
	(66, '2019-12-15', 25.00, '66FF', '88-99'),
	(67, '2019-12-15', 0.00, '66FF', '9-66');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.registroatletacurso
CREATE TABLE IF NOT EXISTS `registroatletacurso` (
  `ceduatleta` varchar(50) NOT NULL,
  `codicurso` varchar(50) NOT NULL,
  KEY `ceduatleta` (`ceduatleta`),
  KEY `codicurso` (`codicurso`),
  CONSTRAINT `registroatletacurso_ibfk_1` FOREIGN KEY (`ceduatleta`) REFERENCES `atletas` (`cedulaatleta`),
  CONSTRAINT `registroatletacurso_ibfk_2` FOREIGN KEY (`codicurso`) REFERENCES `cursos` (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.registroatletacurso: ~2 rows (approximately)
DELETE FROM `registroatletacurso`;
/*!40000 ALTER TABLE `registroatletacurso` DISABLE KEYS */;
INSERT INTO `registroatletacurso` (`ceduatleta`, `codicurso`) VALUES
	('6-719-1951', '55g'),
	('6-719-1951', '66FF');
/*!40000 ALTER TABLE `registroatletacurso` ENABLE KEYS */;

-- Dumping structure for table clubnatacion.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombreusuario` varchar(50) NOT NULL,
  `contraseñausuario` varchar(50) NOT NULL,
  PRIMARY KEY (`contraseñausuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table clubnatacion.usuarios: ~0 rows (approximately)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
