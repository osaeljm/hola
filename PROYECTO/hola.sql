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

--
-- Base de datos: `hola`

CREATE DATABASE IF NOT EXISTS hola;

USE hola;
--

-- ----------------------------------------------------------------------------------------------------------------

--
-- TABLA `EncabezadoFactura`
--

CREATE TABLE IF NOT EXISTS `EncabezadoFactura` (
  `NumeroFactura` INT NOT NULL AUTO_INCREMENT,
  `FechaFactura` datetime NOT NULL,
  `TotalFactura` int(11),
  `Usuario_IdUsuario` INT NOT NULL,   
  PRIMARY KEY (`NumeroFactura`,`Usuario_IdUsuario`),
  KEY `fk_EncabezadoFactura1_Usuario_idx` (`Usuario_IdUsuario`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ----------------------------------------------------------------------------------------------------------------
--
-- TABLA `FacturaDetalle`
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

-- ----------------------------------------------------------------------------------------------------------------
--
-- TABLA `Usuario` Y `Perfil`
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

-- ----------------------------------------------------------------------------------------------------------------
--
-- INSERTS TABLA `Usuario` Y `Perfil`
--
--
INSERT INTO `Usuario` (`IdUsuario`, `LoginUsuario`, `ContrasenaUsuario`, `IdPerfil`, `CorreoUsuario`, `NombreUsuario`) VALUES
(1, 'cesar', '123', 1, 'ejemplo@mail.com', 'C&eacute;sar Retana J'),
(2, 'osael', '123', 2, 'ejemplo@mail.com', 'Osael Jim&eacute;nez M');


INSERT INTO `Perfil` (`IdPerfil`, `NombrePerfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');


-- ----------------------------------------------------------------------------------------------------------------
--
-- TABLA `Producto`
--

CREATE TABLE IF NOT EXISTS `Producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT, 
  `CodigoProducto` varchar(45) NOT NULL,
  `NombreProducto` varchar(45) NOT NULL,
  `CantidadProducto` int(11) NOT NULL, 
  `DescripcionProducto` tinytext NOT NULL, 
  `ImagenProducto` tinytext NOT NULL, 
  `PrecioProducto` int(11) NOT NULL,
  `CategoriaProducto` varchar(45) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8; 

-- ----------------------------------------------------------------------------------------------------------------
--
-- INSERTS TABLA `Producto`
--
--

INSERT INTO `Producto` (`IdProducto`, `CodigoProducto`, `NombreProducto`, `CantidadProducto`, `DescripcionProducto`, `ImagenProducto`, `PrecioProducto`, `CategoriaProducto`) VALUES
(1, 'abc001', 'Queque de cubos', 30, 'Hermoso queque para te de canastilla, para hombre con su nombre deletreado en cubos con decoraci&oacute;n de patos.', 'canastillacubos.jpg', 16000, 'tes'),
(2, 'abc002', 'Bol de dulces', 30, 'Deliciosa variedad de dulces en diferentes formas de bol, cada tipo de dulce se puede elegir a combinaci&oacute;n y preferencia.', 'canastilla3.jpg', 2400, 'tes'),
(3, 'abc003', '50 a&ntilde;os', 30, 'Hermoso queque para cumplea&ntilde;os de 50 a&ntilde;os, para hombre con su actividad favorita.', 'cumple2.jpg', 20000, 'cumple'),
(4, 'abc004', 'Cumplea&ntilde;os infantil', 30, 'Hermoso queque para cumplea&ntilde;os infantil, para hombre o mujer.', 'cumple3.jpg', 24000, 'cumple'),
(5, 'abc005', 'Fiesta Hawaiana', 30, 'Falta...', 'fiesta2.jpg', 15000, 'fiesta'),
(6, 'abc006', 'Fiesta para mujer', 30, 'Hermoso queque con el tema preferido para esa mujer especial.', 'fiesta.jpg', 20000, 'fiesta'),
(7, 'abc007', 'Mesa de dulces para cumpleaÃ±os de niÃ±a', 30, 'Hermosa mesa de dulces para cumplea&ntilde;os de ni&ntilde;a, color y tema del queque a gusto.', 'mesadulce2.jpg', 25000, 'mesa'),
(8, 'abc008', 'Mesa de dulces para eventos', 30, 'Hermosa mesa de dulces para diferentes eventos.', 'mesadulce3.jpg', 30000, 'mesa'),
(9, 'abc009', 'Queque de mar', 30, 'Hermoso queque con tema de mar.', 'queque.jpg', 10000, 'queque'),
(10, 'abc010', 'Queque Simpson', 30, 'Delicioso queque con tema de los Simpson adornado con cupcakes.', 'queque3.jpg', 10000, 'queque'),
(11, 'abc011', 'Cupcake sencillo', 30, 'Deliciosos cupcakes de diferentes sabores.', 'cupcake2.jpg', 5000, 'cupcake'),
(12, 'abc012', 'Cupcake decorado', 30, 'Delicioso y hermoso cupcakes con decoraci&oacute;n personalizada.', 'cupcake3.jpg', 10000, 'cupcake'),
(13, 'abc013', 'Cupcakes navide&ntilde;os', 30, 'Hermosos y deliciosos cupcakes con el tema navide&ntilde;o.', 'cupcakenavideno.jpg', 20000, 'cupcake');
-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTOS ALMACENADOS PARA COMPRAR PRODUCTOS
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

-- 
----
--


DELIMITER //
CREATE PROCEDURE `hola`.`Insertar_FacturaDetalle`
(IN proc_EncabezadoFactura_NumeroEncabezadoFactura int(11), IN proc_Cantidad int(11),IN proc_SubTotal int(11), IN proc_Producto_IdProducto int(11))                                     
BEGIN
  INSERT INTO `FacturaDetalle` (`EncabezadoFactura_NumeroEncabezadoFactura`,`Cantidad`,`SubTotal`,`Producto_IdProducto`)
  VALUES (proc_EncabezadoFactura_NumeroEncabezadoFactura,proc_Cantidad, proc_SubTotal,proc_Producto_IdProducto);
END //
DELIMITER ;

-- 
----
--

DELIMITER //
CREATE PROCEDURE `hola`.`Consultar_CantidadProducto`
(IN proc_IdProducto int(11))                                     
BEGIN
  
  SELECT `CantidadProducto` FROM  `Producto` 
  WHERE `IdProducto` = proc_IdProducto;
  
  
END //
DELIMITER ;

-- 
----
--


DELIMITER //
CREATE PROCEDURE `hola`.`Modificar_CantidadProducto`
(IN proc_IdProducto int(11), IN proc_Cantidad int(11))                                     
BEGIN

    UPDATE `Producto` SET CantidadProducto = proc_Cantidad
    WHERE `IdProducto` = proc_IdProducto;

END //
DELIMITER ;

-- 
----
--


DELIMITER //
CREATE PROCEDURE `hola`.`Consultar_TotalFacturaDetalle`
(IN proc_EncabezadoFactura_NumeroEncabezadoFactura int(11))                                     
BEGIN

    SELECT SUM(`SubTotal`) SubTotal FROM `FacturaDetalle`
    WHERE `EncabezadoFactura_NumeroEncabezadoFactura` = proc_EncabezadoFactura_NumeroEncabezadoFactura;

END //
DELIMITER ;

-- 
----
--


DELIMITER //
CREATE PROCEDURE `hola`.`Modificar_TotalEncabezadoFactura`
(IN proc_NumeroFactura int(11),IN proc_TotalFactura int(11))                                     
BEGIN

    UPDATE `EncabezadoFactura` SET TotalFactura = proc_TotalFactura
    WHERE `NumeroFactura` = proc_NumeroFactura;

END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO CREAR USUARIO
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Insertar_Usuario`
(IN proc_LoginUsuario VARCHAR(15),IN proc_ContrasenaUsuario VARCHAR(10),IN proc_IdPerfil int, IN proc_CorreoUsuario VARCHAR(50), IN proc_NombreUsuario VARCHAR(100))                                     
BEGIN
  INSERT INTO `Usuario` (`LoginUsuario`,`ContrasenaUsuario`,`IdPerfil`,`CorreoUsuario`,`NombreUsuario`)
  VALUES (proc_LoginUsuario,proc_ContrasenaUsuario, proc_IdPerfil,proc_CorreoUsuario,proc_NombreUsuario);
END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO MODIFICAR USUARIO
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Modificar_Usuario`
(IN proc_IdUsuario INT,IN proc_LoginUsuario VARCHAR(15),IN proc_CorreoUsuario VARCHAR(50),IN proc_NombreUsuario VARCHAR(100))                                     
BEGIN
  UPDATE `Usuario` SET LoginUsuario = proc_LoginUsuario, CorreoUsuario = proc_CorreoUsuario, NombreUsuario = proc_NombreUsuario
  WHERE IdUsuario = proc_IdUsuario;

END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO MODIFICAR PRODUCTO
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Modificar_Producto`
(IN proc_IdProducto INT(11),IN proc_CodigoProducto VARCHAR(45),IN proc_NombreProducto VARCHAR(45),IN proc_CantidadProducto INT(11), IN proc_PrecioProducto INT(11), IN proc_DescripcionProducto tinytext,IN proc_ImagenProducto tinytext,IN proc_CategoriaProducto VARCHAR(45))                                     
BEGIN
  UPDATE `Producto` SET CodigoProducto = proc_CodigoProducto, NombreProducto = proc_NombreProducto,CantidadProducto = proc_CantidadProducto,PrecioProducto = proc_PrecioProducto, DescripcionProducto = proc_DescripcionProducto ,ImagenProducto = proc_ImagenProducto, CategoriaProducto = proc_CategoriaProducto
  WHERE IdProducto = proc_IdProducto;

END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO INSERTAR PRODUCTO
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Insertar_Producto`
(IN proc_CodigoProducto VARCHAR(45),IN proc_NombreProducto VARCHAR(45),IN proc_CantidadProducto INT(11),IN proc_PrecioProducto INT(11), IN proc_DescripcionProducto tinytext, IN proc_ImagenProducto tinytext,IN proc_CategoriaProducto VARCHAR(45))                                     
BEGIN
  INSERT INTO `Producto` (`CodigoProducto`,`NombreProducto`,`CantidadProducto`,`PrecioProducto`,`DescripcionProducto`,`ImagenProducto`,`CategoriaProducto`)
  VALUES (proc_CodigoProducto,proc_NombreProducto, proc_CantidadProducto,proc_PrecioProducto,proc_DescripcionProducto,proc_ImagenProducto,proc_CategoriaProducto);

END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO ELIMINAR PRODUCTO
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Eliminar_Producto`
(IN proc_IdProducto INT(11))                                     
BEGIN
  DELETE FROM `Producto`
  WHERE IdProducto=proc_IdProducto;

END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO MODIFICAR CONTRASEÑA
--
--

DELIMITER //
CREATE PROCEDURE `hola`.`Modificar_ContrasenaUsuario`
(IN proc_IdUsuario INT,IN proc_LoginUsuario VARCHAR(15))                                     
BEGIN
  UPDATE `Usuario` SET ContrasenaUsuario = proc_ContrasenaUsuario
  WHERE IdUsuario = proc_IdUsuario;


END //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------
--
-- PROCEDIMIENTO 
--
--


-- SELECT NumeroDetalle,Cantidad,SubTotal,Producto_IdProducto,NombreProducto
-- FROM FacturaDetalle,Producto
-- WHERE drinks.id = drinks_id 
-- GROUP BY drinks_id


-- select t1.NumeroDetalle,t1.Cantidad,t1.SubTotal,t1.Producto_IdProducto,t2.NombreProducto
-- from FacturaDetalle as t1 INNER JOIN Producto as t2
-- on t1.Producto_IdProducto = t2.IdProducto and t1.EncabezadoFactura_NumeroEncabezadoFactura = $v;


-- SELECT * FROM FacturaDetalle WHERE EncabezadoFactura_NumeroEncabezadoFactura = $v

-- <?php $c = isset($_GET['c']) ? $_GET['c'] : null ;
--                     if($c==1){ ?>