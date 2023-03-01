-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2023 a las 02:20:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pet_hero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_mensaje` int(5) NOT NULL,
  `id_reserva` int(5) NOT NULL,
  `mensaje` varchar(30) NOT NULL,
  `emisor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_mensaje`, `id_reserva`, `mensaje`, `emisor`) VALUES
(264, 131, 'Hola\r\n', 'dueno'),
(265, 131, 'como andas todo bien?', 'dueno'),
(266, 131, 'todo bien, vos?\r\n', 'guardian');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `puntaje` int(11) NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_reserva`, `fecha`, `puntaje`, `mensaje`) VALUES
(14, 130, '2023-02-13', 9, 'Muy bueno, lo recomiendo'),
(15, 132, '2023-02-13', 5, 'muy amable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `id_cupon` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`id_cupon`, `id_reserva`, `monto`, `estado`) VALUES
(134, 130, 1200, 'Pagado'),
(135, 131, 9000, 'Pagado'),
(136, 132, 800, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno`
--

CREATE TABLE `dueno` (
  `id_dueno` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `foto_perfil` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dueno`
--

INSERT INTO `dueno` (`id_dueno`, `nombre`, `apellido`, `edad`, `foto_perfil`, `email`, `password`) VALUES
(134, 'Lucia', 'Sandez', 40, 'Upload/imgfotoperfilmujer.jpg', 'viwove7701@aosod.com', '123'),
(135, 'Luis', 'Lopez', 19, 'Upload/imgfotoperfil.jpg', 'picagi8159@jobsfeel.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardian`
--

CREATE TABLE `guardian` (
  `id_guardian` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `foto_perfil` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tamano` varchar(30) DEFAULT NULL,
  `tarifa` int(11) DEFAULT NULL,
  `disponibilidad` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guardian`
--

INSERT INTO `guardian` (`id_guardian`, `nombre`, `apellido`, `edad`, `foto_perfil`, `email`, `password`, `tamano`, `tarifa`, `disponibilidad`) VALUES
(59, 'Diego', 'Haczek', 26, 'Upload/imgfotoperfil.jpg', '1@hotmail.com', '123', 'Grande,Mediano', 800, '2023-02-15,2023-02-16,2023-02-17,2023-02-18,2023-02-25,2023-02-24,2023-02-23,2023-02-22,2023-03-01,2023-03-02,2023-03-03,2023-03-04'),
(60, 'Jose', 'Hernandez', 40, 'Upload/imggatocansado.png', '2@hotmail.com', '123', 'Grande', 1000, 'Plena'),
(61, 'Pipo', 'Gorosito', 59, 'Upload/imgfotoperfil.jpg', '3@hotmail.com', '123', 'Grande,Mediano,Chico', 1200, 'Plena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `id_dueno` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `foto_perfil` varchar(30) NOT NULL,
  `ficha_medica` varchar(30) NOT NULL,
  `video` varchar(30) DEFAULT NULL,
  `tamano` varchar(30) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `indicaciones` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `id_dueno`, `nombre`, `edad`, `foto_perfil`, `ficha_medica`, `video`, `tamano`, `raza`, `especie`, `indicaciones`) VALUES
(192, 134, 'Pipo', 10, 'Upload/imgmigatito.jpg', 'Upload/imgficha_medica.jpg', NULL, 'Mediano', 'bombay', 'gato', 'maulla mucho'),
(193, 134, 'Jony', 10, 'Upload/imgperrochems.jpg', 'Upload/imgficha_medica.jpg', NULL, 'Chico', 'pomerano', 'perro', 'es buenito'),
(194, 135, 'Lolo', 6, 'Upload/imggatoarabe.jpg', 'Upload/imgficha_medica.jpg', NULL, 'Mediano', 'persa', 'gato', 'es bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_dueno` int(11) NOT NULL,
  `id_guardian` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_dueno`, `id_guardian`, `id_mascota`, `estado`, `fecha_inicio`, `fecha_final`) VALUES
(130, 134, 59, 192, 'Finalizada', '2023-02-15', '2023-02-17'),
(131, 134, 61, 193, 'Confirmada', '2023-02-25', '2023-03-11'),
(132, 135, 59, 194, 'Finalizada', '2023-03-03', '2023-03-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_reserva` (`id_reserva`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD UNIQUE KEY `id_comentario` (`id_comentario`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id_cupon`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `dueno`
--
ALTER TABLE `dueno`
  ADD PRIMARY KEY (`id_dueno`),
  ADD UNIQUE KEY `id_dueno` (`id_dueno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id_guardian`),
  ADD UNIQUE KEY `id_guardian` (`id_guardian`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD UNIQUE KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_dueno` (`id_dueno`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_dueno` (`id_dueno`),
  ADD KEY `id_guardian` (`id_guardian`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_mensaje` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id_cupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `dueno`
--
ALTER TABLE `dueno`
  MODIFY `id_dueno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id_guardian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `cupon_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_dueno`) REFERENCES `dueno` (`id_dueno`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_dueno`) REFERENCES `dueno` (`id_dueno`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_guardian`) REFERENCES `guardian` (`id_guardian`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
