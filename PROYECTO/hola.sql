-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-11-2014 a las 18:51:16
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hola`
CREATE DATABASE IF NOT EXISTS hola;

USE hola;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EncabezadoFactura`
--

CREATE TABLE IF NOT EXISTS `EncabezadoFactura` (
  `NumeroFactura` INT NOT NULL AUTO_INCREMENT,
  `FechaFactura` datetime NOT NULL,
  `TotalFactura` int(11),
  `Usuario_IdUsuario` INT NOT NULL,   
  PRIMARY KEY (`NumeroFactura`,`Usuario_IdUsuario`),
  KEY `fk_EncabezadoFactura1_Usuario_idx` (`Usuario_IdUsuario`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;







-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `FacturaDetalle`
--

CREATE TABLE IF NOT EXISTS `FacturaDetalle` (
  `NumeroDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `EncabezadoFactura_NumeroEncabezadoFactura` int(11) NOT NULL,  
  `Cantidad` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Producto_IdProducto` int(11) NOT NULL, 
  PRIMARY KEY (`NumeroDetalle`,`Producto_IdProducto`), 
  KEY `fk_FacturaDetalle_EncabezadoFactura1_idx` (`EncabezadoFactura_NumeroEncabezadoFactura`),
  KEY `fk_FacturaDetalle_Producto1_idx` (`Producto_IdProducto`) 
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Usuario`
--

-- CREATE TABLE IF NOT EXISTS `Usuario` (
--   `Usuario` varchar(45) NOT NULL,
--   `Nombre` varchar(45) NOT NULL,
--   `Contraseña` varchar(45) NOT NULL,
--   `Correo` varchar(45) NOT NULL,
--   `Tarjeta` varchar(45) NOT NULL,
--   PRIMARY KEY (`Usuario`) 
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `Usuario` (
  `IdUsuario` INT NOT NULL AUTO_INCREMENT,
  `LoginUsuario` VARCHAR(15) NOT NULL,
  `ContrasenaUsuario` VARCHAR(10) NOT NULL,
  `IdPerfil`INT NOT NULL,
  `CorreoUsuario` VARCHAR(50) NOT NULL,
  `NombreUsuario` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IdUsuario`) 
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `Perfil`(
  `IdPerfil` INT unsigned NOT NULL AUTO_INCREMENT,
  `NombrePerfil` varchar(20) NOT NULL,
  PRIMARY KEY (`IdPerfil`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Usuario` (`IdUsuario`, `LoginUsuario`, `ContrasenaUsuario`, `IdPerfil`, `CorreoUsuario`, `NombreUsuario`) VALUES
(1, 'cesar', '123', 1, 'ejemplo@mail.com', 'C&eacute;sar Retana J'),
(2, 'osael', '123', 1, 'ejemplo@mail.com', 'Osael Jim&eacute;nez M');


INSERT INTO `Perfil` (`IdPerfil`, `NombrePerfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--
USE hola;


CREATE TABLE IF NOT EXISTS `Producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT, 
  `CodigoProducto` varchar(45) NOT NULL,
  `NombreProducto` varchar(45) NOT NULL,
  `CantidadProducto` int(11) NOT NULL, 
  `DescripcionProducto` tinytext NOT NULL, 
  `ImagenProducto` tinytext NOT NULL, 
  `PrecioProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8; 


INSERT INTO `Producto` (`IdProducto`, `CodigoProducto`, `NombreProducto`, `CantidadProducto`, `DescripcionProducto`, `ImagenProducto`, `PrecioProducto`) VALUES
(1, 'abc123', 'ASUS D450CA', 11, 'Una Notebook de precio amigable y extra-confiable diseñada para PYMES\r\n\r\nWindows 8\r\nCon Intel Inside® y Procesador Intel® Core™ i3.\r\nCon la tecnología exclusiva ASUS Super Hybrid Engine II con suspensión de hasta dos semanas y respaldo automático ', 'computadora.png', 340000),
(2, 'xyz123', 'Galaxy S5 G900F', 10, 'Galaxy S5 es un smartphone pensado para ofrecer la más completa experiencia de uso que puedas imaginar, con soluciones como su pulsómetro que te ayudan a mantenerte en forma, y un atractivo diseño resistente al agua y al polvo.\r\n\r\nNo te preocupes si te', 'celular.png', 410000);


--
--
-- PROCEDIMIENTOS ALMACENADOS
--
--


DELIMITER //
CREATE PROCEDURE `hola`.`Insertar_EncabezadoFactura`
(IN proc_TotalFactura int(11), IN proc_Usuario_IdUsuario int)
BEGIN
  INSERT INTO `EncabezadoFactura` (`FechaFactura`,`TotalFactura`,`Usuario_IdUsuario`)
  VALUES (NOW(),proc_TotalFactura, proc_Usuario_IdUsuario);
  SELECT LAST_INSERT_ID() outid;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `hola`.`Insertar_FacturaDetalle`
(IN proc_EncabezadoFactura_NumeroEncabezadoFactura int(11), IN proc_Cantidad int(11),
  IN proc_SubTotal int(11), IN proc_Producto_IdProducto int(11))                                     
BEGIN
  INSERT INTO `FacturaDetalle` (`EncabezadoFactura_NumeroEncabezadoFactura`,`Cantidad`,
                                `SubTotal`,`Producto_IdProducto`)
  VALUES (proc_EncabezadoFactura_NumeroEncabezadoFactura,proc_Cantidad, proc_SubTotal,proc_Producto_IdProducto);
END //
DELIMITER ;