-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 18:49:21
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubnatacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adultoresponsable`
--

CREATE TABLE `adultoresponsable` (
  `idadulto` varchar(50) NOT NULL,
  `nombreadulto` varchar(50) NOT NULL,
  `parentescoadulto` varchar(50) NOT NULL,
  `celularadulto` varchar(50) NOT NULL,
  `edadadulto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idasistencia` int(11) NOT NULL,
  `cedatleta` varchar(50) NOT NULL,
  `codcurso` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atletas`
--

CREATE TABLE `atletas` (
  `cedulaatleta` varchar(50) NOT NULL,
  `nombreatleta` varchar(50) NOT NULL,
  `edadatleta` varchar(50) NOT NULL,
  `nadar` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `idrespo` varchar(50) NOT NULL,
  `idcur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` varchar(50) NOT NULL,
  `horariocurso` datetime NOT NULL,
  `nivelcurso` varchar(50) NOT NULL,
  `costocurso` float NOT NULL,
  `codentrenador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `cedulaentrenador` varchar(50) NOT NULL,
  `nombreentrenador` varchar(50) NOT NULL,
  `telefonoentrenador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `numerorecibo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `idcur` varchar(50) NOT NULL,
  `idrespon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroatletacurso`
--

CREATE TABLE `registroatletacurso` (
  `ceduatleta` varchar(50) NOT NULL,
  `codicurso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombreusuario` varchar(50) NOT NULL,
  `contraseñausuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adultoresponsable`
--
ALTER TABLE `adultoresponsable`
  ADD PRIMARY KEY (`idadulto`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idasistencia`),
  ADD KEY `cedatleta` (`cedatleta`),
  ADD KEY `codcurso` (`codcurso`);

--
-- Indices de la tabla `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`cedulaatleta`),
  ADD KEY `idres` (`idrespo`),
  ADD KEY `idcur` (`idcur`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `codentrenador` (`codentrenador`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`cedulaentrenador`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`numerorecibo`),
  ADD KEY `idcur` (`idcur`),
  ADD KEY `idrespon` (`idrespon`);

--
-- Indices de la tabla `registroatletacurso`
--
ALTER TABLE `registroatletacurso`
  ADD KEY `ceduatleta` (`ceduatleta`),
  ADD KEY `codicurso` (`codicurso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`contraseñausuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`cedatleta`) REFERENCES `atletas` (`cedulaatleta`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`codcurso`) REFERENCES `cursos` (`idcurso`);

--
-- Filtros para la tabla `atletas`
--
ALTER TABLE `atletas`
  ADD CONSTRAINT `atletas_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  ADD CONSTRAINT `atletas_ibfk_2` FOREIGN KEY (`idrespo`) REFERENCES `adultoresponsable` (`idadulto`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`codentrenador`) REFERENCES `entrenadores` (`cedulaentrenador`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idcur`) REFERENCES `cursos` (`idcurso`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idrespon`) REFERENCES `adultoresponsable` (`idadulto`);

--
-- Filtros para la tabla `registroatletacurso`
--
ALTER TABLE `registroatletacurso`
  ADD CONSTRAINT `registroatletacurso_ibfk_1` FOREIGN KEY (`ceduatleta`) REFERENCES `atletas` (`cedulaatleta`),
  ADD CONSTRAINT `registroatletacurso_ibfk_2` FOREIGN KEY (`codicurso`) REFERENCES `cursos` (`idcurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
