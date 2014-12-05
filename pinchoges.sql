-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2014 at 03:06 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pinchoges`
--

DROP DATABASE IF EXISTS PINCHOGES;
CREATE DATABASE PINCHOGES;
USE PINCHOGES;

--
-- USER userpg
--

GRANT USAGE ON *.* TO 'userpg'@'localhost';
   DROP USER 'userpg'@'localhost';

CREATE USER 'userpg'@'localhost' IDENTIFIED BY  'userpg';

GRANT USAGE ON * . * TO  'userpg'@'localhost' IDENTIFIED BY  'userpg' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  PINCHOGES . * TO  'userpg'@'localhost' WITH GRANT OPTION ;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
`ID_administrador` int(10) NOT NULL,
  `nombre_admin` char(30) NOT NULL,
  `contrasenha_admin` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`ID_administrador`, `nombre_admin`, `contrasenha_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `asigna_pincho`
--

CREATE TABLE `asigna_pincho` (
  `ID_administrador` int(10) NOT NULL,
  `ID_jurPro` int(10) NOT NULL,
  `ID_pincho` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asigna_pincho`
--

INSERT INTO `asigna_pincho` (`ID_administrador`, `ID_jurPro`, `ID_pincho`) VALUES
(1, 1, 121),
(1, 1, 122),
(1, 2, 123),
(1, 2, 124);

-- --------------------------------------------------------

--
-- Table structure for table `codigo_pincho`
--

CREATE TABLE `codigo_pincho` (
`ID_codigoPincho` int(10) NOT NULL,
  `ID_estab` int(10) NOT NULL,
  `ID_pincho` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comenta`
--

CREATE TABLE `comenta` (
  `ID_jurPop` int(10) NOT NULL,
  `ID_pincho` int(10) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `establecimiento`
--

CREATE TABLE `establecimiento` (
`ID_estab` int(10) NOT NULL,
  `ID_administrador` int(10) NOT NULL,
  `nombre_estab` char(20) NOT NULL,
  `contrasenha_estab` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `coordenadas` varchar(100) NOT NULL,
  `comunicacion` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `establecimiento`
--

INSERT INTO `establecimiento` (`ID_estab`, `ID_administrador`, `nombre_estab`, `contrasenha_estab`, `direccion`, `coordenadas`, `comunicacion`) VALUES
(8, 1, 'plaza', 'plaza', 'avenida de santiago nº 2', '41 24.2028, 2 10.4418', 'Pincho pendiente de validación.'),
(9, 1, 'estacion', 'estacion', 'calle de la estacion nº 22', '41 24.4256, 2 10.1598', 'Pincho pendiente de validación.'),
(10, 1, 'roda', 'roda', 'rua nova nº 5', '41 25.7548, 2 32.3758', 'Pincho pendiente de validación.'),
(12, 1, 'mou', 'mou', 'venito vicetto nº 6', '14 25.7582, 2 10.4521', 'Pincho pendiente de validación.');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `nombre_ingrediente` char(20) NOT NULL,
  `ID_pincho` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jurado_popular`
--

CREATE TABLE `jurado_popular` (
`ID_juradoPopular` int(10) NOT NULL,
  `nombre_jurPop` char(30) NOT NULL,
  `contrasenha_jurPop` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurado_popular`
--

INSERT INTO `jurado_popular` (`ID_juradoPopular`, `nombre_jurPop`, `contrasenha_jurPop`) VALUES
(1, 'popular', 'popular');

-- --------------------------------------------------------

--
-- Table structure for table `jurado_profesional`
--

CREATE TABLE `jurado_profesional` (
`ID_juradoProfesional` int(10) NOT NULL,
  `ID_administrador` int(10) NOT NULL,
  `nombre_jurPro` char(30) NOT NULL,
  `contrasenha_jurPro` varchar(15) NOT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `cache` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurado_profesional`
--

INSERT INTO `jurado_profesional` (`ID_juradoProfesional`, `ID_administrador`, `nombre_jurPro`, `contrasenha_jurPro`, `profesion`, `cache`) VALUES
(1, 1, 'profesional', 'profesional', NULL, NULL),
(2, 1, 'profesional2', 'profesional2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `ID_estab` int(10) NOT NULL,
  `cod_mensaje` int(10) NOT NULL,
  `contenido` varchar(10000) DEFAULT NULL,
  `remitente` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patrocinadores`
--

CREATE TABLE `patrocinadores` (
  `nombre_patrocinador` char(20) NOT NULL,
  `nombre_concurso` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pincho`
--

CREATE TABLE `pincho` (
`ID_pincho` int(10) NOT NULL,
  `ID_administrador` int(10) NOT NULL,
  `ID_estab` int(10) NOT NULL,
  `nombre_pincho` char(20) NOT NULL,
  `tipo` enum('frio','caliente') NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` float NOT NULL,
  `foto` varchar(100) NOT NULL,
  `horario` enum('mañana','tarde','todo el dia') NOT NULL,
  `pincho_validado` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pincho`
--

INSERT INTO `pincho` (`ID_pincho`, `ID_administrador`, `ID_estab`, `nombre_pincho`, `tipo`, `descripcion`, `precio`, `foto`, `horario`, `pincho_validado`) VALUES
(121, 1, 8, 'pizza', 'frio', 'pizza cuatro estaciones especial', 3, '/src/imagenes/pizza.jpg', 'mañana', 0),
(122, 1, 9, 'tosta de jamon', 'frio', 'tosta de jamon con aceite de oliva', 2, '/src/imagenes/tosta.jpg', 'tarde', 0),
(123, 1, 10, 'bacalao', 'caliente', 'bacalao al pinpin', 3, '/src/imagenes/bacalao.jpg', 'todo el dia', 0),
(124, 1, 12, 'tempura de verduras', 'caliente', 'tempura de verduras de temporada', 1, '/src/imagenes/tempura.jpg', 'mañana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinchoges`
--

CREATE TABLE `pinchoges` (
  `nombre_consurso` char(20) NOT NULL,
  `ID_administrador` int(10) NOT NULL,
  `bases` varchar(100) DEFAULT NULL,
  `logotipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pinchoges`
--

INSERT INTO `pinchoges` (`nombre_consurso`, `ID_administrador`, `bases`, `logotipo`) VALUES
('Outono Ourense', 1, '/src/docs/bases.pdf', '/src/imagenes/logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plazos`
--

CREATE TABLE `plazos` (
  `nombre_plazo` char(20) NOT NULL,
  `nombre_concurso` char(20) NOT NULL,
  `inicio_plazo` date DEFAULT NULL,
  `fin_plazo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `valoracion`
--

CREATE TABLE `valoracion` (
  `ID_pincho` int(10) NOT NULL,
`ID_valoracion` int(10) NOT NULL,
  `ID_juradoPro` int(10) DEFAULT NULL,
  `ID_juradoPop` int(10) DEFAULT NULL,
  `ID_administrador` int(10) NOT NULL,
  `nota` float DEFAULT NULL,
  `comentario_val` varchar(1000) DEFAULT NULL,
  `voto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`ID_administrador`), ADD UNIQUE KEY `nombre_admin` (`nombre_admin`);

--
-- Indexes for table `asigna_pincho`
--
ALTER TABLE `asigna_pincho`
 ADD PRIMARY KEY (`ID_administrador`,`ID_jurPro`,`ID_pincho`), ADD KEY `ID_jurPro` (`ID_jurPro`), ADD KEY `ID_pincho` (`ID_pincho`);

--
-- Indexes for table `codigo_pincho`
--
ALTER TABLE `codigo_pincho`
 ADD PRIMARY KEY (`ID_codigoPincho`,`ID_estab`,`ID_pincho`), ADD KEY `ID_estab` (`ID_estab`), ADD KEY `ID_pincho` (`ID_pincho`);

--
-- Indexes for table `comenta`
--
ALTER TABLE `comenta`
 ADD PRIMARY KEY (`ID_jurPop`,`ID_pincho`), ADD KEY `ID_pincho` (`ID_pincho`);

--
-- Indexes for table `establecimiento`
--
ALTER TABLE `establecimiento`
 ADD PRIMARY KEY (`ID_estab`), ADD UNIQUE KEY `nombre_estab` (`nombre_estab`), ADD KEY `ID_administrador` (`ID_administrador`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
 ADD PRIMARY KEY (`nombre_ingrediente`,`ID_pincho`), ADD KEY `ID_pincho` (`ID_pincho`);

--
-- Indexes for table `jurado_popular`
--
ALTER TABLE `jurado_popular`
 ADD PRIMARY KEY (`ID_juradoPopular`), ADD UNIQUE KEY `nombre_jurPop` (`nombre_jurPop`);

--
-- Indexes for table `jurado_profesional`
--
ALTER TABLE `jurado_profesional`
 ADD PRIMARY KEY (`ID_juradoProfesional`), ADD UNIQUE KEY `nombre_jurPro` (`nombre_jurPro`), ADD KEY `ID_administrador` (`ID_administrador`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
 ADD PRIMARY KEY (`ID_estab`,`cod_mensaje`);

--
-- Indexes for table `patrocinadores`
--
ALTER TABLE `patrocinadores`
 ADD PRIMARY KEY (`nombre_patrocinador`,`nombre_concurso`), ADD KEY `nombre_concurso` (`nombre_concurso`);

--
-- Indexes for table `pincho`
--
ALTER TABLE `pincho`
 ADD PRIMARY KEY (`ID_pincho`), ADD UNIQUE KEY `nombre_pincho` (`nombre_pincho`), ADD KEY `ID_administrador` (`ID_administrador`), ADD KEY `ID_estab` (`ID_estab`);

--
-- Indexes for table `pinchoges`
--
ALTER TABLE `pinchoges`
 ADD PRIMARY KEY (`nombre_consurso`), ADD KEY `ID_administrador` (`ID_administrador`);

--
-- Indexes for table `plazos`
--
ALTER TABLE `plazos`
 ADD PRIMARY KEY (`nombre_plazo`,`nombre_concurso`), ADD KEY `nombre_concurso` (`nombre_concurso`);

--
-- Indexes for table `valoracion`
--
ALTER TABLE `valoracion`
 ADD PRIMARY KEY (`ID_pincho`,`ID_valoracion`), ADD KEY `ID_juradoPro` (`ID_juradoPro`), ADD KEY `ID_juradoPop` (`ID_juradoPop`), ADD KEY `ID_administrador` (`ID_administrador`), ADD KEY `ID_valoracion` (`ID_valoracion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
MODIFY `ID_administrador` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `codigo_pincho`
--
ALTER TABLE `codigo_pincho`
MODIFY `ID_codigoPincho` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `establecimiento`
--
ALTER TABLE `establecimiento`
MODIFY `ID_estab` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jurado_popular`
--
ALTER TABLE `jurado_popular`
MODIFY `ID_juradoPopular` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jurado_profesional`
--
ALTER TABLE `jurado_profesional`
MODIFY `ID_juradoProfesional` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pincho`
--
ALTER TABLE `pincho`
MODIFY `ID_pincho` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `valoracion`
--
ALTER TABLE `valoracion`
MODIFY `ID_valoracion` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asigna_pincho`
--
ALTER TABLE `asigna_pincho`
ADD CONSTRAINT `asigna_pincho_ibfk_1` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `asigna_pincho_ibfk_2` FOREIGN KEY (`ID_jurPro`) REFERENCES `jurado_profesional` (`ID_juradoProfesional`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `asigna_pincho_ibfk_3` FOREIGN KEY (`ID_pincho`) REFERENCES `pincho` (`ID_pincho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `codigo_pincho`
--
ALTER TABLE `codigo_pincho`
ADD CONSTRAINT `codigo_pincho_ibfk_1` FOREIGN KEY (`ID_estab`) REFERENCES `establecimiento` (`ID_estab`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `codigo_pincho_ibfk_2` FOREIGN KEY (`ID_pincho`) REFERENCES `pincho` (`ID_pincho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comenta`
--
ALTER TABLE `comenta`
ADD CONSTRAINT `comenta_ibfk_1` FOREIGN KEY (`ID_jurPop`) REFERENCES `jurado_popular` (`ID_juradoPopular`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comenta_ibfk_2` FOREIGN KEY (`ID_pincho`) REFERENCES `pincho` (`ID_pincho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `establecimiento`
--
ALTER TABLE `establecimiento`
ADD CONSTRAINT `establecimiento_ibfk_1` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredientes`
--
ALTER TABLE `ingredientes`
ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`ID_pincho`) REFERENCES `pincho` (`ID_pincho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurado_profesional`
--
ALTER TABLE `jurado_profesional`
ADD CONSTRAINT `jurado_profesional_ibfk_1` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`ID_estab`) REFERENCES `establecimiento` (`ID_estab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patrocinadores`
--
ALTER TABLE `patrocinadores`
ADD CONSTRAINT `patrocinadores_ibfk_1` FOREIGN KEY (`nombre_concurso`) REFERENCES `pinchoges` (`nombre_consurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pincho`
--
ALTER TABLE `pincho`
ADD CONSTRAINT `pincho_ibfk_1` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pincho_ibfk_2` FOREIGN KEY (`ID_estab`) REFERENCES `establecimiento` (`ID_estab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinchoges`
--
ALTER TABLE `pinchoges`
ADD CONSTRAINT `pinchoges_ibfk_1` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plazos`
--
ALTER TABLE `plazos`
ADD CONSTRAINT `plazos_ibfk_1` FOREIGN KEY (`nombre_concurso`) REFERENCES `pinchoges` (`nombre_consurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `valoracion`
--
ALTER TABLE `valoracion`
ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`ID_pincho`) REFERENCES `pincho` (`ID_pincho`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`ID_juradoPro`) REFERENCES `jurado_profesional` (`ID_juradoProfesional`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `valoracion_ibfk_3` FOREIGN KEY (`ID_juradoPop`) REFERENCES `jurado_popular` (`ID_juradoPopular`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `valoracion_ibfk_4` FOREIGN KEY (`ID_administrador`) REFERENCES `administrador` (`ID_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
