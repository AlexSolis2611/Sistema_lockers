-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2019 a las 11:44:49
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_empleados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `area_locker` varchar(50) NOT NULL,
  `no_locker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `fecha_asignacion`, `puesto`, `sexo`, `area_locker`, `no_locker`) VALUES
(133, 'Marco aguilar', '2019-03-09 11:29:43', '', 'Masculino', 'Baja', 1),
(134, 'Cristina gonzales', '2019-03-09 11:39:36', 'Programadora', 'Femenino', 'Baja', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lockers`
--

CREATE TABLE `lockers` (
  `no_locker` int(11) NOT NULL,
  `num_locker` varchar(50) NOT NULL DEFAULT '0',
  `estado_locker` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lockers`
--

INSERT INTO `lockers` (`no_locker`, `num_locker`, `estado_locker`) VALUES
(1, '1', 1),
(2, '2', 0),
(3, '3', 0),
(4, '4', 0),
(5, '5', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_empleados_lockers` (`no_locker`);

--
-- Indices de la tabla `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`no_locker`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT de la tabla `lockers`
--
ALTER TABLE `lockers`
  MODIFY `no_locker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `FK_empleados_lockers` FOREIGN KEY (`no_locker`) REFERENCES `lockers` (`no_locker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
