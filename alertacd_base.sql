CREATE DATABASE alertacd_base;
USE alertacd_base;
-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2016 a las 05:09:53
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alertacd_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcadores`
--

CREATE TABLE IF NOT EXISTS `marcadores` (
  `mrk_incidencias` int(7) NOT NULL,
  `mrk_coordenada_latitud` varchar(30) NOT NULL,
  `mrk_coordenada_longitud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcadores`
--

INSERT INTO `marcadores` (`mrk_incidencias`, `mrk_coordenada_latitud`, `mrk_coordenada_longitud`) VALUES
(1, '174.85', '255.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `user_id` varchar(30) NOT NULL,
  `pbl_texto` varchar(50) NOT NULL,
  `pbl_fecha` date NOT NULL,
  `pbl_ubicacionDescripcion` varchar(40) NOT NULL,
  `pbl_coordenada_latitud` varchar(30) NOT NULL,
  `pbl_coordenada_longitud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`user_id`, `pbl_texto`, `pbl_fecha`, `pbl_ubicacionDescripcion`, `pbl_coordenada_latitud`, `pbl_coordenada_longitud`) VALUES
('andy<3', 'Andrew se la come', '2016-09-08', 'GrandLine', '255.1', '255.2'),
('krokiMeLaChupa', 'HoLA SOY BIEN PUTITO', '1999-09-09', 'sU CASA', '255.1', '255.2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `user_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_displayName` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_image` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_email`, `user_displayName`, `user_image`) VALUES
('104680268944855158307', 'andrewalangm@gmail.com', 'Andrew G', 'https://lh6.googleusercontent.com/-ueKKxUYCk6Y/AAAAAAAAAAI/AAAAAAAAAI4/073a8QQPVpA/photo.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
