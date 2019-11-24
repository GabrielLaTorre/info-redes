-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2019 a las 20:40:45
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

CREATE TABLE `articulo` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen_1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `autor_id` int(10) UNSIGNED NOT NULL,
  `subtitulo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `contenido`, `imagen_1`, `autor_id`, `subtitulo`, `fecha`, `genero_id`, `activo`) VALUES
(1, 'Corte de Luz', 'asdas das dasd as as dasd asdas das dasd as as dasd asdas das dasd as as dasd asdas das dasd as as dasd asdas das dasd as as dasd asdas das dasd as as dasd ', 'profesor.jpg', 2, 'Es un tema', '2019-10-17 00:00:00', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`) VALUES
(2, 'Maria de los angeles'),
(5, 'eduardo daniel padrino'),
(8, 'Daniel Padrino'),
(10, 'Otilio Padrino'),
(11, 'Nuvia Martinez'),
(12, 'Natali Padrino'),
(13, 'Reynali!!!!'),
(14, 'Zoraida Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

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

CREATE TABLE `genero` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Espectaculos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

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
(1, 'daniel', '1234', b'1'),
(2, 'zoraida', '1234', b'0'),
(3, 'amigos', '$2y$10$2jMIwuWvJ3FXp9.55O5NKe01CCmSabRpTpC1XLpneKPFt.xB9jYD.', b'1'),
(4, 'amigos', '$2y$10$rPoUvIfC5/DzKCyV1Us1ReMNWhk4hOtZnkuc9OnbWcBz6ks/VTYne', b'1'),
(5, '', '$2y$10$VYnVpZawAM0DJxrpS5uiHOhWm19E4GW/JQXk3mtRhK76OQWSlqYe.', b'1'),
(6, '', '$2y$10$oWw9nV67ij26eHLlix1dIeSsZaRRnYDKakeLmsKQOwaM.Ab2S4o52', b'1'),
(7, 'daniel1', '$2y$10$C5PJi3N8zfIkhLjSzrTdz.gVlb4aNvm3s9b6TpJ6LeMXu5wNB0EWe', b'1'),
(8, 'daniel1', '$2y$10$Htcpq5JqSe/WXWrMjtZp4.wLE13V7EJZE48UoEm1Jb.43eCga6zFq', b'1'),
(9, 'daniel1', '$2y$10$FjK3Q0FNx9n6pNScMMNrTen6ShWmEIRQbZ4DA.WIRPG6SfaIAhDa6', b'1'),
(10, 'daniel1', '$2y$10$dbBVCN/zb5Om8Zen3H8Diun6gV0eZuWcQ7UcbIiRXzNb3rSHQ0zVO', b'1'),
(11, 'asd', '$2y$10$3RmbXzHQCb.ELTub.5uJ3evmMnhCOAJt22UtHQVwAVEZYiQuLOeQO', b'1'),
(12, 'asfasf', '$2y$10$hJUXgnpJ96ODFr9c7VX3MefOnUAOUT6M31YP4AAqkC9wsFKIotb4K', b'1'),
(13, 'daniel13', '$2y$10$gDojsDJr1bO6QFLihPD4b.CkT6kxgVS6EUOyA1FN9Pf.kZHRtoAl.', b'1'),
(14, 'daniel13', '$2y$10$le6D3/Qz5oSSZQWrTe9LDOayO2Hz1UmpTCn39CNWFcnHoRiZJd6UK', b'1'),
(15, 'daniel12314', '$2y$10$N/06npyMcGrxyDxyk8r5JOgiaVh0bTL8Vligj6nbFm9kW7XS3w4Xy', b'1'),
(16, 'dasniell1232454', '$2y$10$USo/6wwEFlwq2UI/Q4bQduPoTB6g7pckcrl0EX7UoM1pd2DusN2O2', b'1'),
(17, 'eqwrqw', '$2y$10$YSOuBdBxoIq5skr.Nuimg.K2mbPKEo9gLMPCWM4uoNI6OnsXdHLNi', b'1');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
