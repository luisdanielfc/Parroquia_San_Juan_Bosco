-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2020 a las 23:14:01
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `psjb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE `Grupo` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Contenido` longtext NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Grupos asociados a la parroquia';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticia`
--

CREATE TABLE `Noticia` (
  `Id` int(11) NOT NULL COMMENT 'Identificador unico de la identidad',
  `Titulo` longtext NOT NULL COMMENT 'Titulo de la noticia',
  `Contenido` longtext NOT NULL COMMENT 'Contenido d ela noticia',
  `Fecha` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha en la que se creo la noticia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla asociada a la entidad noticia';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `Id` int(11) NOT NULL COMMENT 'Identificador unico de la entidad',
  `Nombre` varchar(25) NOT NULL COMMENT 'Nombdre de la persona que administra',
  `Usuario` varchar(25) NOT NULL COMMENT 'Nombre de usuario para ingresar al sistema',
  `Contrasena` varchar(25) NOT NULL COMMENT 'Clave secreta para entrar al sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla que almacena los administradores que puedan modificar';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `Noticia`
--
ALTER TABLE `Noticia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico de la identidad', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico de la entidad', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
