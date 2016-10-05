-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2016 a las 23:50:20
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mooc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL,
  `dniAdmin` varchar(255) NOT NULL,
  `nombreAdmin` varchar(255) NOT NULL,
  `apellidoAdmin` varchar(255) NOT NULL,
  `mailAdmin` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(255) NOT NULL,
  `estadoCategoria` tinyint(1) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `nombreCurso` varchar(255) NOT NULL,
  `modulos` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `descripcion` text NOT NULL,
  `masivo` tinyint(1) NOT NULL,
  `cupo` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `inicioCurso` date DEFAULT NULL,
  `finCurso` date DEFAULT NULL,
  `maxEval` int(11) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE IF NOT EXISTS `denuncia` (
  `idDenuncia` int(11) NOT NULL,
  `idTipoDenuncia` int(11) NOT NULL,
  `descripcionDenuncia` text NOT NULL,
  `fechaDenuncia` date NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dicta`
--

CREATE TABLE IF NOT EXISTS `dicta` (
  `idCurso` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `fechaAsignacion` date NOT NULL,
  `titular` tinyint(1) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `idEstudiante` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `altura` int(11) NOT NULL,
  `piso` int(11) DEFAULT NULL,
  `depto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `fechaNacEstudiante` date NOT NULL,
  `dniEstudiante` varchar(255) NOT NULL,
  `nombreEstudiante` varchar(255) NOT NULL,
  `apellidoEstudiante` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `idExamen` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `nota` float NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `idExamen` int(11) NOT NULL,
  `nroModulo` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `urlExamen` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenpreguntas`
--

CREATE TABLE IF NOT EXISTS `examenpreguntas` (
  `idExamen` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `opcion1` varchar(255) NOT NULL,
  `opcion2` varchar(255) NOT NULL,
  `opcion3` varchar(255) NOT NULL,
  `opcion4` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='la opcion ''1'' es siempre la correcta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `idEstudiante` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comento` tinyint(1) NOT NULL,
  `porcentAprobado` float NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `comentario` text,
  `bajaLogica` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `idLocalidad` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `nombreLocalidad` varchar(255) NOT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `bajaLogica` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `idProvincia`, `nombreLocalidad`, `cp`, `bajaLogica`) VALUES
(1, 1, 'Alto Pelado', '5721', 0),
(2, 1, 'Alto Pencoso', '5724', 0),
(3, 1, 'Arizona', '6389', 0),
(4, 1, 'Balde', '5724', 0),
(5, 1, 'Beazley', '5721', 0),
(6, 1, 'Concaran', '5770', 0),
(7, 1, 'Cortaderas', '5883', 0),
(8, 1, 'Desaguadero', '5598', 0),
(9, 1, 'El Durazno', '5701', 0),
(10, 1, 'El Portezuelo', '5750', 0),
(11, 1, 'El Toro Muerto', '6216', 0),
(12, 1, 'Florida', '5715', 0),
(13, 1, 'General Pedernera ', '5738', 0),
(14, 1, 'Huertas', '5771', 0),
(15, 1, 'Intihuasi ', '5701', 0),
(34, 1, 'Renca', '5775', 0),
(37, 1, 'San Luis', '5700', 0),
(40, 1, 'Quines ', '5711', 0),
(42, 1, 'Salinas', '5713', 0),
(45, 1, 'Justo Daract', '5738', 0),
(46, 1, 'Potrero de los Funes', '5701', 0),
(50, 1, 'Zanjitas', '5721', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `nroModulo` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `fechaExamen` date DEFAULT NULL,
  `urlVideo` varchar(255) DEFAULT NULL,
  `urlDiapos` varchar(255) DEFAULT NULL,
  `texto` text,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `idProfesor` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `dniProfesor` int(11) NOT NULL,
  `nombreProfesor` varchar(255) NOT NULL,
  `apellidoProfesor` varchar(255) NOT NULL,
  `mailProfesor` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idProvincia` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nombre`, `bajaLogica`) VALUES
(1, 'San Luis', 0),
(2, 'San Juan', 0),
(3, 'Mendoza', 0),
(4, 'La Pampa', 0),
(5, 'Neuquen', 0),
(6, 'Rio Negro', 0),
(7, 'Chubut', 0),
(8, 'Santa Cruz', 0),
(9, 'Tierra del FUego', 0),
(10, 'Buenos Aires', 0),
(11, 'Santa Fe', 0),
(12, 'Entre Rios', 0),
(13, 'Corrientes', 0),
(14, 'Misiones', 0),
(15, 'Chaco', 0),
(16, 'Santiago del Estero', 0),
(17, 'Formosa', 0),
(18, 'Salta', 0),
(19, 'Tucuman', 0),
(20, 'Jujuy', 0),
(21, 'Catamarca', 0),
(22, 'La Rioja', 0),
(23, 'Capital Federal', 0),
(24, 'Cordoba', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodenuncia`
--

CREATE TABLE IF NOT EXISTS `tipodenuncia` (
  `idTipoDenuncia` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `bajaLogica` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `AI_idAdmin` (`idAdmin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `AI_idCategoria` (`idCategoria`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD UNIQUE KEY `idCurso` (`idCurso`),
  ADD KEY `AI_idCurso` (`idCurso`),
  ADD KEY `indexNombreCurso` (`nombreCurso`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`idDenuncia`,`idTipoDenuncia`),
  ADD KEY `AI_idDenuncia` (`idDenuncia`),
  ADD KEY `idTipoDenuncia` (`idTipoDenuncia`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idEstudiante` (`idEstudiante`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- Indices de la tabla `dicta`
--
ALTER TABLE `dicta`
  ADD PRIMARY KEY (`idCurso`,`idProfesor`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idEstudiante`,`idProvincia`,`idLocalidad`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD UNIQUE KEY `idEstudiante` (`idEstudiante`),
  ADD KEY `AI_idEstudiante` (`idEstudiante`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idExamen`,`idEstudiante`),
  ADD KEY `idEstudiante` (`idEstudiante`,`idCurso`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`),
  ADD UNIQUE KEY `idExamen` (`idExamen`),
  ADD KEY `AI_idExamen` (`idExamen`),
  ADD KEY `nroModulo` (`nroModulo`,`idCurso`);

--
-- Indices de la tabla `examenpreguntas`
--
ALTER TABLE `examenpreguntas`
  ADD PRIMARY KEY (`idExamen`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idEstudiante`,`idCurso`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`),
  ADD KEY `AI_idLocalidad` (`idLocalidad`),
  ADD KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`nroModulo`,`idCurso`),
  ADD KEY `AI_nroModulo` (`nroModulo`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`),
  ADD UNIQUE KEY `idProfesor` (`idProfesor`),
  ADD UNIQUE KEY `dniProfesor` (`dniProfesor`),
  ADD KEY `AI_idProfesor` (`idProfesor`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `AI_idProvincia` (`idProvincia`);

--
-- Indices de la tabla `tipodenuncia`
--
ALTER TABLE `tipodenuncia`
  ADD PRIMARY KEY (`idTipoDenuncia`),
  ADD KEY `AI_idTipoDenuncia` (`idTipoDenuncia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `nroModulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProvincia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tipodenuncia`
--
ALTER TABLE `tipodenuncia`
  MODIFY `idTipoDenuncia` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
