-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-06-2025 a las 22:00:12
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_lucha_libre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combates`
--

DROP TABLE IF EXISTS `combates`;
CREATE TABLE IF NOT EXISTS `combates` (
  `id_combate` int NOT NULL AUTO_INCREMENT,
  `id_evento` int DEFAULT NULL,
  `id_luchador1` int DEFAULT NULL,
  `id_luchador2` int DEFAULT NULL,
  `ganador` int DEFAULT NULL,
  `resultado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_combate`),
  KEY `id_evento` (`id_evento`),
  KEY `id_luchador1` (`id_luchador1`),
  KEY `id_luchador2` (`id_luchador2`),
  KEY `ganador` (`ganador`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `combates`
--

INSERT INTO `combates` (`id_combate`, `id_evento`, `id_luchador1`, `id_luchador2`, `ganador`, `resultado`) VALUES
(1, 0, NULL, NULL, NULL, 'ganador'),
(2, 0, NULL, NULL, NULL, 'ganador'),
(7, 2, 5, 4, 5, 'Interferencia externa'),
(6, 2, 6, 4, 4, 'KO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `fecha`, `lugar`) VALUES
(1, 'luchamania', '2025-06-15', 'ciudad de mexico'),
(2, 'rey de reyes', '2025-06-12', 'tlapa de comonfort');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `luchadores`
--

DROP TABLE IF EXISTS `luchadores`;
CREATE TABLE IF NOT EXISTS `luchadores` (
  `id_luchador` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apodo` varchar(100) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_luchador`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `luchadores`
--

INSERT INTO `luchadores` (`id_luchador`, `nombre`, `apodo`, `nacionalidad`) VALUES
(5, 'Jesus', 'DARON', 'MEXICANA'),
(4, 'tomas carbajal', 'el diarrreas', 'MEXICANA'),
(6, 'jesus gonzalez', 'el panzas', 'peruana');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
