-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2016 a las 00:31:06
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
DROP DATABASE `encuestapps`;
CREATE DATABASE IF NOT EXISTS `encuestapps` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `encuestapps`;

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
(1, 'Nombre', 'Apellidos', '', 'Nombre Empresa', '', '', '2016-03-02 23:18:39', 2);

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
(1, 'Juan', 'Martinez', '', '', '', 1, 1);

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
  `datos_clientes_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`encuestas_k`, `nombre_encuesta`, `fecha_hora_creacion`, `datos_clientes_k`) VALUES
(1, 'Elecciones 2016', '2016-03-03 21:26:39', 1),
(2, 'Encuesta de prueba', '2016-03-03 22:11:05', 1);

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
(1, '¿Si hoy fueran las elecciones por quien votaría?', 1),
(2, '¿Cuando voto lo hago pensando mas en el partido que en el candidato?', 1),
(3, 'Creo que el sistema electoral es transparente y honesto', 1),
(4, 'Creo que todos lo partidos son lo mismo', 1),
(5, 'En general, el país esta mejor hoy que hace 5 años', 1),
(6, 'En general mi municipio está mejor hoy que hace 3 años', 1),
(7, 'En general, pienso que en 5 años estaremos mejor de lo que estamos hoy', 1),
(8, 'En general, como evaluaría el trabajo del actual mandatario estatal', 1),
(9, 'Creo que mi voto puede realmente hacer una diferencia', 1),
(10, 'Tengo una idea de por quien votar, pero cambiaría mi voto si me dieran los argumentos y encontrara razones validas para hacerlo', 1),
(11, 'Pregunta uno', 2),
(12, 'Pregunta dos', 2),
(13, 'pregunta', 3),
(14, 'pregunta', 4);

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
(1, 'PRI', 1),
(2, 'PAN', 1),
(3, 'PRD', 1),
(4, 'Independiente', 1),
(5, 'Siempre', 2),
(6, 'Algunas Veces', 2),
(7, 'Pocas veces', 2),
(8, 'Nunca', 2),
(9, 'De acuerdo', 3),
(10, 'Parcialmente de acuerdo', 3),
(11, 'Un poco en desacuerdo', 3),
(12, 'Totalmente en  desacuerdo', 3),
(13, 'De acuerdo', 4),
(14, 'Parcialmente de acuerdo', 4),
(15, 'Un poco en desacuerdo', 4),
(16, 'Totalmente en  desacuerdo', 4),
(17, 'Totalmente de acuerdo', 5),
(18, 'Parcialmente de acuerdo', 5),
(19, 'Un poco en desacuerdo', 5),
(20, 'Totalmente en  desacuerdo', 5),
(21, 'Totalmente de acuerdo', 6),
(22, 'Parcialmente de acuerdo', 6),
(23, 'Un poco en desacuerdo', 6),
(24, 'Totalmente en  desacuerdo', 6),
(25, 'Por supuesto que sí', 7),
(26, 'Tal vez', 7),
(27, 'Probablemente no', 7),
(28, 'Estaremos peor', 7),
(29, 'Muy bueno', 8),
(30, 'Bueno', 8),
(31, 'Regular', 8),
(32, 'Malo', 8),
(33, 'Por supuesto que sí', 9),
(34, 'Quizá', 9),
(35, 'Probablemente no', 9),
(36, 'Claro que no', 9),
(37, 'No encontraré argumentos ni razones para cambiar', 10),
(38, 'Sí, pero será difícil validarlos', 10),
(39, 'Seguramente lo haría', 10),
(40, 'Claro, siempre estoy analizando la mejor opción', 10),
(41, 'respuesta a', 11),
(42, 'respuesta b', 11),
(43, 'respuesta c', 11),
(44, 'respuesta d', 11),
(45, 'respuesta dos a', 12),
(46, 'respuesta dos b', 12),
(47, 'respuesta dos c', 12),
(48, 'respuesta dos d', 12),
(49, 'a', 13),
(50, 'b', 13),
(51, 'c', 13),
(52, 'd', 13),
(53, 'a', 14),
(54, 'b', 14),
(55, 'c', 14),
(56, 'd', 14);

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
(1, 1, 0, '2016-03-07 18:11:37'),
(2, 5, 0, '2016-03-07 18:11:37'),
(3, 9, 0, '2016-03-07 18:11:37'),
(4, 13, 0, '2016-03-07 18:11:37'),
(5, 17, 0, '2016-03-07 18:11:37'),
(6, 21, 0, '2016-03-07 18:11:38'),
(7, 25, 0, '2016-03-07 18:11:38'),
(8, 29, 0, '2016-03-07 18:11:38'),
(9, 33, 0, '2016-03-07 18:11:38'),
(10, 37, 0, '2016-03-07 18:11:38'),
(11, 4, 0, '2016-03-07 18:18:37'),
(12, 8, 0, '2016-03-07 18:18:37'),
(13, 12, 0, '2016-03-07 18:18:37'),
(14, 16, 0, '2016-03-07 18:18:38'),
(15, 20, 0, '2016-03-07 18:18:38'),
(16, 24, 0, '2016-03-07 18:18:38'),
(17, 28, 0, '2016-03-07 18:18:38'),
(18, 32, 0, '2016-03-07 18:18:38'),
(19, 36, 0, '2016-03-07 18:18:38'),
(20, 40, 0, '2016-03-07 18:18:38'),
(21, 4, 0, '2016-03-07 18:18:43'),
(22, 8, 0, '2016-03-07 18:18:44'),
(23, 12, 0, '2016-03-07 18:18:44'),
(24, 16, 0, '2016-03-07 18:18:44'),
(25, 20, 0, '2016-03-07 18:18:44'),
(26, 24, 0, '2016-03-07 18:18:44'),
(27, 28, 0, '2016-03-07 18:18:44'),
(28, 32, 0, '2016-03-07 18:18:44'),
(29, 36, 0, '2016-03-07 18:18:44'),
(30, 40, 0, '2016-03-07 18:18:44'),
(31, 2, 0, '2016-03-07 22:01:54'),
(32, 7, 0, '2016-03-07 22:01:54'),
(33, 10, 0, '2016-03-07 22:01:54'),
(34, 15, 0, '2016-03-07 22:01:54'),
(35, 18, 0, '2016-03-07 22:01:54'),
(36, 23, 0, '2016-03-07 22:01:54'),
(37, 26, 0, '2016-03-07 22:01:54'),
(38, 31, 0, '2016-03-07 22:01:54'),
(39, 34, 0, '2016-03-07 22:01:54'),
(40, 39, 0, '2016-03-07 22:01:54'),
(41, 2, 0, '2016-03-07 22:49:02'),
(42, 7, 0, '2016-03-07 22:49:02'),
(43, 10, 0, '2016-03-07 22:49:02'),
(44, 15, 0, '2016-03-07 22:49:02'),
(45, 18, 0, '2016-03-07 22:49:02'),
(46, 23, 0, '2016-03-07 22:49:02'),
(47, 26, 0, '2016-03-07 22:49:02'),
(48, 31, 0, '2016-03-07 22:49:02'),
(49, 34, 0, '2016-03-07 22:49:02'),
(50, 39, 0, '2016-03-07 22:49:02'),
(51, 4, 0, '2016-03-07 22:49:37'),
(52, 8, 0, '2016-03-07 22:49:37'),
(53, 1, 0, '2016-03-07 22:49:57'),
(54, 7, 0, '2016-03-07 22:49:57'),
(55, 2, 0, '2016-03-07 22:50:27'),
(56, 8, 0, '2016-03-07 22:50:27'),
(57, 9, 0, '2016-03-07 22:50:28'),
(58, 14, 0, '2016-03-07 22:50:28'),
(59, 17, 0, '2016-03-07 22:50:28'),
(60, 23, 0, '2016-03-07 22:50:28'),
(61, 27, 0, '2016-03-07 22:50:28'),
(62, 32, 0, '2016-03-07 22:50:28'),
(63, 36, 0, '2016-03-07 22:50:28'),
(64, 38, 0, '2016-03-07 22:50:28');

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
  ADD KEY `datos_clientes_k` (`datos_clientes_k`);

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
  MODIFY `encuestas_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  MODIFY `encuestas_preguntas_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas_opciones`
--
ALTER TABLE `encuestas_preguntas_opciones`
  MODIFY `encuestas_preguntas_opciones_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `encuestas_resultados`
--
ALTER TABLE `encuestas_resultados`
  MODIFY `encuestas_resultados_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
