-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 18:18:18
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`id`, `nombre`) VALUES
(1, 'Privados'),
(2, 'IMQ'),
(3, 'ASISA'),
(4, 'SALUS'),
(5, 'DKV'),
(6, 'SANITAS'),
(7, 'MAPFRE'),
(8, 'FREMAP'),
(9, 'IBERMUTUA'),
(10, 'CMESPECIALES');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
