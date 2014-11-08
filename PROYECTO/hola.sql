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
  `NumeroFactura` int(11) NOT NULL,
  `FechaFactura` datetime NOT NULL,
  `NumeroDetalle` int(11) NOT NULL,
  `TotalFactura` int(11) NOT NULL,
  PRIMARY KEY (`NumeroFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

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


INSERT INTO `producto` (`IdProducto`, `CodigoProducto`, `NombreProducto`, `CantidadProducto`, `DescripcionProducto`, `ImagenProducto`, `PrecioProducto`) VALUES
(1, 'abc123', 'ASUS D450CA', 11, 'Una Notebook de precio amigable y extra-confiable diseñada para PYMES\r\n\r\nWindows 8\r\nCon Intel Inside® y Procesador Intel® Core™ i3.\r\nCon la tecnología exclusiva ASUS Super Hybrid Engine II con suspensión de hasta dos semanas y respaldo automático ', 'computadora.png', 340000),
(2, 'xyz123', 'Galaxy S5 G900F', 10, 'Galaxy S5 es un smartphone pensado para ofrecer la más completa experiencia de uso que puedas imaginar, con soluciones como su pulsómetro que te ayudan a mantenerte en forma, y un atractivo diseño resistente al agua y al polvo.\r\n\r\nNo te preocupes si te', 'celular.png', 410000);


-- CREATE TABLE IF NOT EXISTS `Producto` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `product_code` varchar(60) NOT NULL,
--   `product_name` varchar(60) NOT NULL,
--   `product_qty` int(100) NOT NULL,
--   `product_desc` tinytext NOT NULL,
--   `product_img_name` varchar(60) NOT NULL,
--   `price` decimal(10,2) NOT NULL,
--   PRIMARY KEY (id),
--   UNIQUE KEY product_code (product_code)
-- ) AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `FacturaDetalle`
--

CREATE TABLE IF NOT EXISTS `FacturaDetalle` (
  `NumeroDetalle` int(11) NOT NULL,
  `EncabezadoFactura_NumeroEncabezadoFactura` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL, 
  `Cantidad` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Producto_IdProducto` int(11) NOT NULL, 
  PRIMARY KEY (`NumeroDetalle`,`Producto_IdProducto`), 
  KEY `fk_FacturaDetalle_EncabezadoFactura1_idx` (`EncabezadoFactura_NumeroEncabezadoFactura`),
  KEY `fk_FacturaDetalle_Producto1_idx` (`Producto_IdProducto`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `NombreUsuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Tarjeta` varchar(45) NOT NULL,
  `EncabezadoFactura_NumeroFactura` int(11) NOT NULL,
  PRIMARY KEY (`Correo`,`EncabezadoFactura_NumeroFactura`),
  KEY `fk_Usuario_EncabezadoFactura1_idx` (`EncabezadoFactura_NumeroFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `FacturaDetalle`
--
ALTER TABLE `FacturaDetalle`
  ADD CONSTRAINT `fk_FacturaDetalle_Producto1`
      FOREIGN KEY (`Producto_IdProducto`) 
      REFERENCES `Producto` (`IdProducto`) 
      ON DELETE NO ACTION ON UPDATE NO ACTION,

  ADD CONSTRAINT `fk_FacturaDetalle_EncabezadoFactura1` 
      FOREIGN KEY (`EncabezadoFactura_NumeroEncabezadoFactura`) 
      REFERENCES `EncabezadoFactura` (`NumeroFactura`) 
      ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_EncabezadoFactura1` 
      FOREIGN KEY (`EncabezadoFactura_NumeroFactura`) 
      REFERENCES `EncabezadoFactura` (`NumeroFactura`) 
      ON DELETE NO ACTION ON UPDATE NO ACTION;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




