-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2019 a las 00:54:38
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wm2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen_1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `autor_id` int(10) UNSIGNED NOT NULL,
  `subtitulo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `contenido`, `imagen_1`, `autor_id`, `subtitulo`, `fecha`, `genero_id`, `activo`) VALUES
(1, 'daniel was here', 'nothing', '', 1, 'again', '2019-12-04 20:14:36', 1, b'1'),
(2, 'danel', 'dasfka', '190923131738-kitkat-chocolatory-2-large-tease.jpg', 1, 'danel', '2019-12-04 20:15:03', 1, b'1'),
(3, 'anon-daniel', 'anonimc', '', 2, 'anon', '2019-12-04 20:15:36', 1, b'1'),
(4, 'articulo anonimo 10mod', 'anonimo dejo estomod', 'NULL', 3, 'articulo anonimomod', '2019-12-05 14:34:05', 3, b'1'),
(5, 'fsgsd', 'dhshdgddg', 'espacio-disponible.jpg', 1, 'sdgsdg', '2019-12-06 20:36:17', 1, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`, `usuario_id`, `foto`) VALUES
(1, 'Daniel (DanswarCode) Padrino ', 1, 'camisa_verde_reote.jpg'),
(2, 'anon', 2, NULL),
(3, 'anonimo 10', 3, 'perfil_default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `noticia_id`, `nombre`, `comentario`) VALUES
(1, 1, ' Daniel Padrino ', ' Primer comentario del sitio '),
(2, 1, ' Leonel ', ' Segundo comentario del sitio '),
(3, 1, ' Gabriel ', ' Tercer comentario del sitio '),
(4, 1, ' danel ', ' hola\n '),
(5, 1, ' elTroll ', ' tu sabes aqui troleando '),
(6, 1, ' daniel ', ' danirl '),
(7, 1, ' Dhdjdh ', ' Zhdjdvfbd ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`, `activo`) VALUES
(1, 'Espectaculos', 1),
(2, 'Politica', 1),
(3, 'Sociales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pwd` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `pwd`, `activo`) VALUES
(1, 'danswar', '$2y$10$rjMQHtGN70R0eopgrxqNZutglrdcIMZX1ndGe5hDhXgLNNAlVSrKS', b'1'),
(2, 'anon', '$2y$10$2af0O5fF95f2HPkI9yfoAOdCyZ0XsXyMlU4wa6C5jo1ndzGA8fDkS', b'1'),
(3, 'anon10', '$2y$10$yMSlr0d4Lswr7wqOawaww.hnj45o/NSVmYG8Jsb/F8/CEaZuB3M8G', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticia_id` (`noticia_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`);

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
