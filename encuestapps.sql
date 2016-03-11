-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2016 a las 17:05:08
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestapps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE `campaigns` (
  `campaigns_k` int(11) NOT NULL,
  `campaign` text NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datos_clientes_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campaigns`
--

INSERT INTO `campaigns` (`campaigns_k`, `campaign`, `fecha_hora_creacion`, `datos_clientes_k`) VALUES
(10, 'Campaña Elecciones 2016', '2016-03-10 00:08:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_administradores`
--

DROP TABLE IF EXISTS `datos_administradores`;
CREATE TABLE `datos_administradores` (
  `datos_administradores_k` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `usuarios_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_clientes`
--

DROP TABLE IF EXISTS `datos_clientes`;
CREATE TABLE `datos_clientes` (
  `datos_clientes_k` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `celular` varchar(255) NOT NULL,
  `fecha_hora_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_clientes`
--

INSERT INTO `datos_clientes` (`datos_clientes_k`, `nombre`, `apellidos`, `telefono`, `empresa`, `direccion`, `celular`, `fecha_hora_registro`, `usuarios_k`) VALUES
(1, 'Nombre cliente', 'Apellidos cliente', '999999999999999999999', 'Nombre de la empresa', 'direccion del\r\ncliente ...', '55555555555555555553', '2016-03-02 23:18:39', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_encuestadores`
--

DROP TABLE IF EXISTS `datos_encuestadores`;
CREATE TABLE `datos_encuestadores` (
  `datos_encuestadores_k` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `datos_clientes_k` int(11) NOT NULL,
  `usuarios_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_encuestadores`
--

INSERT INTO `datos_encuestadores` (`datos_encuestadores_k`, `nombre`, `apellidos`, `celular`, `direccion`, `telefono`, `datos_clientes_k`, `usuarios_k`) VALUES
(1, 'Juan', 'Martinez', '156', 'nombre de la calle #00\r\ncolonia\r\nciudad\r\nestado\r\npais', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_encuestados`
--

DROP TABLE IF EXISTS `datos_encuestados`;
CREATE TABLE `datos_encuestados` (
  `datos_encuestados_k` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `edad` int(3) NOT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE `encuestas` (
  `encuestas_k` int(11) NOT NULL,
  `nombre_encuesta` varchar(255) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `campaigns_k` int(11) DEFAULT NULL,
  `datos_clientes_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`encuestas_k`, `nombre_encuesta`, `fecha_hora_creacion`, `campaigns_k`, `datos_clientes_k`) VALUES
(17, 'elecciones 2016', '2016-03-10 00:08:41', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_preguntas`
--

DROP TABLE IF EXISTS `encuestas_preguntas`;
CREATE TABLE `encuestas_preguntas` (
  `encuestas_preguntas_k` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `encuestas_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas_preguntas`
--

INSERT INTO `encuestas_preguntas` (`encuestas_preguntas_k`, `pregunta`, `encuestas_k`) VALUES
(31, 'pregunta', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_preguntas_opciones`
--

DROP TABLE IF EXISTS `encuestas_preguntas_opciones`;
CREATE TABLE `encuestas_preguntas_opciones` (
  `encuestas_preguntas_opciones_k` int(11) NOT NULL,
  `opcion` text NOT NULL,
  `encuestas_preguntas_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas_preguntas_opciones`
--

INSERT INTO `encuestas_preguntas_opciones` (`encuestas_preguntas_opciones_k`, `opcion`, `encuestas_preguntas_k`) VALUES
(33, 'respuesta 1', 31),
(34, 'respuesta 2', 31),
(35, 'respuesta 3', 31),
(36, 'respuesta 4', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_resultados`
--

DROP TABLE IF EXISTS `encuestas_resultados`;
CREATE TABLE `encuestas_resultados` (
  `encuestas_resultados_k` int(11) NOT NULL,
  `encuestas_preguntas_opciones_k` int(11) NOT NULL,
  `datos_encuestados_k` int(11) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas_resultados`
--

INSERT INTO `encuestas_resultados` (`encuestas_resultados_k`, `encuestas_preguntas_opciones_k`, `datos_encuestados_k`, `fecha_hora_creacion`) VALUES
(5, 34, 0, '2016-03-10 00:08:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usuarios_k` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usuarios_niveles_k` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_k`, `email`, `password`, `usuarios_niveles_k`, `estatus`) VALUES
(1, 'encuestador@email.com', '5525a3dfdb4b80a8b4e456d2cc083399002edbf8', 20, 1),
(2, 'cliente@email.com', '5525a3dfdb4b80a8b4e456d2cc083399002edbf8', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_niveles`
--

DROP TABLE IF EXISTS `usuarios_niveles`;
CREATE TABLE `usuarios_niveles` (
  `usuarios_niveles_k` int(11) NOT NULL,
  `nombre_nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_niveles`
--

INSERT INTO `usuarios_niveles` (`usuarios_niveles_k`, `nombre_nivel`) VALUES
(20, 'ENCUESTADOR'),
(50, 'CLIENTE'),
(99, 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaigns_k`),
  ADD KEY `datos_clientes_k` (`datos_clientes_k`);

--
-- Indices de la tabla `datos_administradores`
--
ALTER TABLE `datos_administradores`
  ADD PRIMARY KEY (`datos_administradores_k`),
  ADD KEY `usuarios_k` (`usuarios_k`);

--
-- Indices de la tabla `datos_clientes`
--
ALTER TABLE `datos_clientes`
  ADD PRIMARY KEY (`datos_clientes_k`),
  ADD KEY `usuarios_k` (`usuarios_k`);

--
-- Indices de la tabla `datos_encuestadores`
--
ALTER TABLE `datos_encuestadores`
  ADD PRIMARY KEY (`datos_encuestadores_k`),
  ADD KEY `datos_clientes_k` (`datos_clientes_k`),
  ADD KEY `usuarios_k` (`usuarios_k`);

--
-- Indices de la tabla `datos_encuestados`
--
ALTER TABLE `datos_encuestados`
  ADD PRIMARY KEY (`datos_encuestados_k`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`encuestas_k`),
  ADD KEY `datos_clientes_k` (`campaigns_k`);

--
-- Indices de la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  ADD PRIMARY KEY (`encuestas_preguntas_k`),
  ADD KEY `encuestas_k` (`encuestas_k`);

--
-- Indices de la tabla `encuestas_preguntas_opciones`
--
ALTER TABLE `encuestas_preguntas_opciones`
  ADD PRIMARY KEY (`encuestas_preguntas_opciones_k`),
  ADD KEY `encuestas_preguntas_k` (`encuestas_preguntas_k`);

--
-- Indices de la tabla `encuestas_resultados`
--
ALTER TABLE `encuestas_resultados`
  ADD PRIMARY KEY (`encuestas_resultados_k`),
  ADD KEY `encuestas_preguntas_opciones_k` (`encuestas_preguntas_opciones_k`),
  ADD KEY `datos_encuestados_k` (`datos_encuestados_k`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_k`),
  ADD KEY `usuarios_niveles_k` (`usuarios_niveles_k`);

--
-- Indices de la tabla `usuarios_niveles`
--
ALTER TABLE `usuarios_niveles`
  ADD PRIMARY KEY (`usuarios_niveles_k`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaigns_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `datos_administradores`
--
ALTER TABLE `datos_administradores`
  MODIFY `datos_administradores_k` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datos_clientes`
--
ALTER TABLE `datos_clientes`
  MODIFY `datos_clientes_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `datos_encuestadores`
--
ALTER TABLE `datos_encuestadores`
  MODIFY `datos_encuestadores_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `datos_encuestados`
--
ALTER TABLE `datos_encuestados`
  MODIFY `datos_encuestados_k` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `encuestas_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  MODIFY `encuestas_preguntas_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas_opciones`
--
ALTER TABLE `encuestas_preguntas_opciones`
  MODIFY `encuestas_preguntas_opciones_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `encuestas_resultados`
--
ALTER TABLE `encuestas_resultados`
  MODIFY `encuestas_resultados_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios_niveles`
--
ALTER TABLE `usuarios_niveles`
  MODIFY `usuarios_niveles_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  ADD CONSTRAINT `restriccion` FOREIGN KEY (`encuestas_k`) REFERENCES `encuestas` (`encuestas_k`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
