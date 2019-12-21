-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para clubnatacion
CREATE DATABASE IF NOT EXISTS `clubnatacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `clubnatacion`;

-- Volcando estructura para tabla clubnatacion.adultoresponsable
CREATE TABLE IF NOT EXISTS `adultoresponsable` (
  `idadulto` varchar(50) NOT NULL,
  `nombreadulto` varchar(50) NOT NULL,
  `parentescoadulto` varchar(50) NOT NULL,
  `celularadulto` varchar(50) NOT NULL,
  `edadadulto` int(11) NOT NULL,
  PRIMARY KEY (`idadulto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.adultoresponsable: ~4 rows (aproximadamente)
DELETE FROM `adultoresponsable`;
/*!40000 ALTER TABLE `adultoresponsable` DISABLE KEYS */;
INSERT INTO `adultoresponsable` (`idadulto`, `nombreadulto`, `parentescoadulto`, `celularadulto`, `edadadulto`) VALUES
	('507', 'guille', 'tio', '69696969', 22),
	('8-753-951', 'Osvaldo Medina', 'Padre', '69694545', 59),
	('88-99', 'Maria', 'Mama', '56', 35),
	('9-66', 'Pepito', 'Papa', '85', 55);
/*!40000 ALTER TABLE `adultoresponsable` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.asistencia
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

-- Volcando datos para la tabla clubnatacion.asistencia: ~3 rows (aproximadamente)
DELETE FROM `asistencia`;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`idasistencia`, `cedatleta`, `codcurso`, `mes`, `año`) VALUES
	(3, '6-719-1951', '55g', '12', '2019'),
	(4, '7-711-8152', '66FF', '12', '2019'),
	(5, '6-719-1951', '66FF', '12', '2019');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.atletas
CREATE TABLE IF NOT EXISTS `atletas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cedulaatleta` varchar(50) NOT NULL,
  `nombreatleta` varchar(50) NOT NULL,
  `edadatleta` varchar(50) NOT NULL,
  `nadar` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `idrespo` varchar(50) NOT NULL,
  `idcur` varchar(50) NOT NULL,
  PRIMARY KEY (`cedulaatleta`),
  UNIQUE KEY `id` (`id`),
  KEY `idres` (`idrespo`),
  KEY `idcur` (`idcur`),
  CONSTRAINT `atletas_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `atletas_ibfk_2` FOREIGN KEY (`idrespo`) REFERENCES `adultoresponsable` (`idadulto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.atletas: ~4 rows (aproximadamente)
DELETE FROM `atletas`;
/*!40000 ALTER TABLE `atletas` DISABLE KEYS */;
INSERT INTO `atletas` (`id`, `cedulaatleta`, `nombreatleta`, `edadatleta`, `nadar`, `direccion`, `idrespo`, `idcur`) VALUES
	(14, '1-123-123', 'Julian gomez', '15', 'NoSabeNadar', 'Llano Bonito', '8-753-951', '66FF'),
	(1, '6-719-1951', 'Jose', '23', 'NoSabeNadar', 'casa', '9-66', '55g'),
	(2, '7-711-8152', 'Maria', '22', 'SI', 'La tiza', '88-99', '66FF'),
	(9, '8-966-6666', 'Lorena Navarro', '22', 'SabeNadar', 'San Juan Bautista', '507', '55g');
/*!40000 ALTER TABLE `atletas` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clubnatacion.categories: ~1 rows (aproximadamente)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Repuestos');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.cursos
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

-- Volcando datos para la tabla clubnatacion.cursos: ~2 rows (aproximadamente)
DELETE FROM `cursos`;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` (`idcurso`, `horariocurso`, `nivelcurso`, `costocurso`, `codentrenador`) VALUES
	('55g', '11:30:54', '2', 25, 'AF45'),
	('66FF', '22:06:07', '2', 25, 'KLJ');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.entrenadores
CREATE TABLE IF NOT EXISTS `entrenadores` (
  `cedulaentrenador` varchar(50) NOT NULL,
  `nombreentrenador` varchar(50) NOT NULL,
  `telefonoentrenador` varchar(50) NOT NULL,
  PRIMARY KEY (`cedulaentrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.entrenadores: ~2 rows (aproximadamente)
DELETE FROM `entrenadores`;
/*!40000 ALTER TABLE `entrenadores` DISABLE KEYS */;
INSERT INTO `entrenadores` (`cedulaentrenador`, `nombreentrenador`, `telefonoentrenador`) VALUES
	('4-654-123', 'Juan Carlos Perez', '69696454'),
	('AF45', 'Edgar', '55'),
	('KLJ', 'Marisol', '99');
/*!40000 ALTER TABLE `entrenadores` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.media: ~1 rows (aproximadamente)
DELETE FROM `media`;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
	(1, 'filter.jpg', 'image/jpeg');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `numerorecibo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `idcur` varchar(50) NOT NULL,
  `idrespon` varchar(50) NOT NULL,
  PRIMARY KEY (`numerorecibo`),
  KEY `idcur` (`idcur`),
  KEY `idrespon` (`idrespon`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idrespon`) REFERENCES `adultoresponsable` (`idadulto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.pagos: ~3 rows (aproximadamente)
DELETE FROM `pagos`;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` (`numerorecibo`, `fecha`, `monto`, `idcur`, `idrespon`) VALUES
	(55, '2019-12-15', 25.00, '55g', '9-66'),
	(66, '2019-12-15', 25.00, '66FF', '88-99'),
	(67, '2019-12-15', 25.00, '66FF', '9-66');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) unsigned NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `categorie_id` (`categorie_id`),
  KEY `media_id` (`media_id`),
  CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clubnatacion.products: ~1 rows (aproximadamente)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
	(1, 'Filtro de gasolina', '100', 5.00, 10.00, 1, 1, '2017-06-16 07:03:16');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.registroatletacurso
CREATE TABLE IF NOT EXISTS `registroatletacurso` (
  `ceduatleta` varchar(50) NOT NULL,
  `codicurso` varchar(50) NOT NULL,
  KEY `ceduatleta` (`ceduatleta`),
  KEY `codicurso` (`codicurso`),
  CONSTRAINT `registroatletacurso_ibfk_1` FOREIGN KEY (`ceduatleta`) REFERENCES `atletas` (`cedulaatleta`),
  CONSTRAINT `registroatletacurso_ibfk_2` FOREIGN KEY (`codicurso`) REFERENCES `cursos` (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.registroatletacurso: ~10 rows (aproximadamente)
DELETE FROM `registroatletacurso`;
/*!40000 ALTER TABLE `registroatletacurso` DISABLE KEYS */;
INSERT INTO `registroatletacurso` (`ceduatleta`, `codicurso`) VALUES
	('6-719-1951', '55g'),
	('6-719-1951', '66FF'),
	('6-719-1951', '55g'),
	('6-719-1951', '66FF'),
	('6-719-1951', '66FF'),
	('6-719-1951', '66FF'),
	('6-719-1951', '66FF'),
	('6-719-1951', '66FF'),
	('8-966-6666', '55g'),
	('8-966-6666', '66FF');
/*!40000 ALTER TABLE `registroatletacurso` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.rolesusuario
CREATE TABLE IF NOT EXISTS `rolesusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla clubnatacion.rolesusuario: ~4 rows (aproximadamente)
DELETE FROM `rolesusuario`;
/*!40000 ALTER TABLE `rolesusuario` DISABLE KEYS */;
INSERT INTO `rolesusuario` (`id`, `rol`) VALUES
	(1, 'Adminstrador'),
	(2, 'Cajero'),
	(3, 'Asistente'),
	(4, 'Atleta');
/*!40000 ALTER TABLE `rolesusuario` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clubnatacion.sales: ~0 rows (aproximadamente)
DELETE FROM `sales`;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_level` (`user_level`),
  CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.users: ~3 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
	(1, 'Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2017-06-16 07:11:11'),
	(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2017-06-16 07:11:26'),
	(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2017-06-16 07:11:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.user_groups
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_level` (`group_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.user_groups: ~3 rows (aproximadamente)
DELETE FROM `user_groups`;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
	(1, 'Admin', 1, 1),
	(2, 'Special', 2, 0),
	(3, 'User', 3, 1);
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;

-- Volcando estructura para tabla clubnatacion.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cedula` varchar(25) NOT NULL,
  `edad` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `fk_rol` FOREIGN KEY (`rol_id`) REFERENCES `rolesusuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla clubnatacion.usuarios: ~8 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `password`, `cedula`, `edad`, `rol_id`) VALUES
	(1, 'Guille0197', '0123', '8-962-683', 22, 1),
	(2, 'Cajero', '0123', '507', 21, 2),
	(3, 'Asistente', '0123', '508', 21, 3),
	(4, 'Guillermo Antonio', '123', '123123', 18, 4),
	(5, 'Samuel Solis', '123', '6-752-555', 21, 4),
	(6, 'Jose', '123', '6-719-1951', 22, 4),
	(7, 'Lorena Navarro', '123', '8-966-6666', 21, 4),
	(8, 'Jorge', '12', '7-507', 21, 4),
	(9, 'Jose Salvador Lopez ', '123', '6-721-507', 23, 1),
	(17, 'Samuel solis', '123', '4-520-936', 21, 2),
	(18, 'GEEX1365', '123', '66666', 21, 3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
