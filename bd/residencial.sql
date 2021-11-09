-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 10:25:27
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `residencial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonoshis`
--

CREATE TABLE `abonoshis` (
  `idAbonado` int(11) NOT NULL,
  `montoAbonado` double(10,2) NOT NULL,
  `Concepto` text NOT NULL,
  `Metododepago` varchar(30) NOT NULL DEFAULT 'Efectivo',
  `fechaEmision` datetime NOT NULL DEFAULT current_timestamp(),
  `idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonoshis`
--

INSERT INTO `abonoshis` (`idAbonado`, `montoAbonado`, `Concepto`, `Metododepago`, `fechaEmision`, `idFactura`) VALUES
(1, 99.00, 'Abono', 'Efectivo', '2021-06-29 11:06:10', 3),
(2, 99.00, 'Hola', 'Efectivo', '2021-06-29 11:09:34', 4),
(3, 50.00, 'Abonop', '', '2021-06-29 11:09:50', 3),
(4, 2000.00, 'Hola', 'Efectivo', '2021-06-29 11:17:35', 3),
(5, 99.00, 'Abono mayor', 'Efectivo', '2021-06-29 11:40:55', 3),
(6, 4000.00, 'Abono Grande', 'Efectivo', '2021-06-29 11:46:10', 4),
(7, 100.00, 'Abono de cargador', 'Efectivo', '2021-06-29 11:49:37', 5),
(8, 200.00, 'Siguiente sera en la quincena', 'Efectivo', '2021-06-29 12:52:01', 5),
(9, 1752.00, 'abONADO TODO', 'Efectivo', '2021-06-29 14:13:54', 0),
(10, 1752.00, 'Abono total', 'Efectivo', '2021-06-29 14:14:51', 3),
(11, 45901.00, 'Abonado', 'Efectivo', '2021-06-29 14:34:33', 0),
(12, 45901.00, 'Abonado', 'Efectivo', '2021-06-29 14:37:18', 0),
(13, 45901.00, 'PAgo', 'Efectivo', '2021-06-29 14:37:34', 4),
(14, 50.00, 'PAgo', 'Efectivo', '2021-06-29 14:44:22', 5),
(15, 50.00, 'Abono', 'Efectivo', '2021-06-29 14:46:17', 5),
(16, 0.00, '', 'Efectivo', '2021-06-29 15:02:00', 7),
(17, 0.00, '', 'Efectivo', '2021-06-29 15:04:33', 9),
(18, 1000.00, 'Primer Abono', 'Efectivo', '2021-06-29 15:05:33', 0),
(19, 1000.00, 'primer Abono', 'Efectivo', '2021-06-29 15:05:57', 9),
(20, 0.00, '', 'Efectivo', '2021-06-30 00:35:51', 10),
(21, 1000.00, 'Te vale verga', 'Efectivo', '2021-06-30 00:37:09', 10),
(22, 300.00, 'Simon Chele', 'Efectivo', '2021-06-30 00:38:57', 10),
(23, 2700.00, 'Validacion', 'Efectivo', '2021-06-30 00:42:51', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `IDCodigoAlmacen` int(11) NOT NULL,
  `NombreArticulo` varchar(50) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelopresentacion` varchar(50) DEFAULT NULL,
  `Codigo1` varchar(50) NOT NULL,
  `Codigo2` varchar(50) DEFAULT NULL,
  `Notas` varchar(400) DEFAULT NULL,
  `precioVenta` double NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `PrecioCompra` double NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`IDCodigoAlmacen`, `NombreArticulo`, `Marca`, `Modelopresentacion`, `Codigo1`, `Codigo2`, `Notas`, `precioVenta`, `IsVisible`, `PrecioCompra`, `Stock`, `TimeSpace`) VALUES
(1, 'Gaseosa', 'Coca Cola', 'Medio litro', '0987457', 'nulo', '', 20, 1, 10, 100, '2021-06-25 01:35:30'),
(2, 'Computadora', 'Dell', 'Core i9+', '8643325788', 'nulo', '', 12000, 1, 10000, 100, '2021-06-25 01:36:04'),
(3, 'Cargador', 'Huawei', '22.5 Wts', '78432367789', '', '', 800, 1, 500, 100, '2021-06-25 01:36:36'),
(4, 'Aceite havoline 4t rojo', 'Havoline', '4T', '5478908', 'nulo', '', 220, 1, 190, 10, '2021-06-25 11:15:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacencuatro`
--

CREATE TABLE `almacencuatro` (
  `IDAlmacencuatro` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacencuatro`
--

INSERT INTO `almacencuatro` (`IDAlmacencuatro`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, '', 1, '2021-06-25 13:35:30'),
(2, 2, 0, '', 1, '2021-06-25 13:36:05'),
(3, 3, 0, '', 1, '2021-06-25 13:36:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacendos`
--

CREATE TABLE `almacendos` (
  `IDAlmacendos` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacendos`
--

INSERT INTO `almacendos` (`IDAlmacendos`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, '', 1, '2021-06-25 13:35:30'),
(2, 2, 0, '', 1, '2021-06-25 13:36:04'),
(3, 3, 0, '', 1, '2021-06-25 13:36:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacentres`
--

CREATE TABLE `almacentres` (
  `IDAlmacentres` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacentres`
--

INSERT INTO `almacentres` (`IDAlmacentres`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, '', 1, '2021-06-25 13:35:30'),
(2, 2, 0, '', 1, '2021-06-25 13:36:04'),
(3, 3, 0, '', 1, '2021-06-25 13:36:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenuno`
--

CREATE TABLE `almacenuno` (
  `IDAlmacenuno` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenuno`
--

INSERT INTO `almacenuno` (`IDAlmacenuno`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 100, '', 1, '2021-06-25 07:39:54'),
(2, 2, 92, '', 1, '2021-06-29 21:04:33'),
(3, 3, 86, '', 1, '2021-06-30 06:35:51'),
(4, 4, 5, '', 1, '2021-06-29 20:54:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodatos`
--

CREATE TABLE `catalogodatos` (
  `IDcatalogoDatos` int(11) NOT NULL,
  `Primer_Nombre_Empresa` varchar(50) NOT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `NumeroRUC_Cedula` varchar(20) NOT NULL,
  `Direccion` varchar(1000) NOT NULL,
  `Numero_Telefonico` int(11) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `Comentario` varchar(1000) DEFAULT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogodatos`
--

INSERT INTO `catalogodatos` (`IDcatalogoDatos`, `Primer_Nombre_Empresa`, `Apellidos`, `NumeroRUC_Cedula`, `Direccion`, `Numero_Telefonico`, `Email`, `IsVisible`, `Comentario`, `TimeSpace`) VALUES
(1, 'Kessler', 'Torrez', '098765678909S', 'Por ahi', 2147483647, 'example@gmail.com', 1, 'Buen cliente', '2021-06-26 17:48:49'),
(2, 'Victor Lopez', '', '0010301990000S', 'Sabana Grande', 89823811, 'example@gmail.com', 1, 'Hola', '2021-06-30 02:18:12'),
(3, 'Josue Lara Salinas', '', '0010301990000AS', '1000', 89823811, 'castillolopez735@gma', 1, 'Hola', '2021-06-30 02:19:05'),
(4, 'Josue Lara Salinas', '', '', '1000', 89823811, 'castillolopez735@gma', 1, 'pedooo', '2021-06-30 02:19:47'),
(5, 'Josue Lara Salinas', '', '', '1000', 89823811, 'castillolopez735@gma', 1, 'No quiero', '2021-06-30 02:23:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `timeSpace` datetime NOT NULL DEFAULT current_timestamp(),
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `nombreyapellido` varchar(50) NOT NULL,
  `ruc` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `idDescuento` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `Comentario` varchar(50) NOT NULL,
  `timespace` date NOT NULL DEFAULT current_timestamp(),
  `almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descuento`
--

INSERT INTO `descuento` (`idDescuento`, `estado`, `Comentario`, `timespace`, `almacen`) VALUES
(1, 1, 'Almacen 1', '0000-00-00', 1),
(2, 0, 'Almacen 2', '2021-03-29', 2),
(3, 0, 'Almacen 3', '2021-03-29', 3),
(4, 0, 'Almacen 4', '2021-03-29', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledefactura`
--

CREATE TABLE `detalledefactura` (
  `IDFacturaDetalle` int(11) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `IDFacturaPK` int(11) NOT NULL,
  `TimeSpace` date NOT NULL DEFAULT current_timestamp(),
  `preciounit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalledefactura`
--

INSERT INTO `detalledefactura` (`IDFacturaDetalle`, `Unidades`, `producto`, `Precio`, `IDFacturaPK`, `TimeSpace`, `preciounit`) VALUES
(1, 10, 1, 200, 1, '2021-06-25', 20),
(2, 1, 2, 12000, 2, '2021-06-25', 12000),
(3, 5, 3, 4000, 3, '2021-06-25', 800),
(4, 5, 2, 50000, 4, '2021-06-28', 10000),
(5, 1, 3, 850, 5, '2021-06-29', 850),
(6, 5, 4, 1100, 6, '2021-06-29', 220),
(7, 3, 3, 2400, 8, '2021-06-29', 800),
(8, 2, 2, 24000, 9, '2021-06-29', 12000),
(9, 5, 3, 4000, 10, '2021-06-30', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesinventario`
--

CREATE TABLE `detallesinventario` (
  `IDDetalleINV` int(11) NOT NULL,
  `IDArticuloPK` int(11) NOT NULL,
  `CantIngresada` int(11) NOT NULL,
  `CostoUnitario` double NOT NULL,
  `PrecioVenta/Unitario` double NOT NULL,
  `IDIngresoINVPK` int(11) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocliente`
--

CREATE TABLE `estadocliente` (
  `IDEstadoCliente` int(11) NOT NULL,
  `Comentario` varchar(500) NOT NULL,
  `Numero_de_Estado` int(11) NOT NULL,
  `SystemName` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `Timespace` date NOT NULL DEFAULT current_timestamp(),
  `AlmacenNumero` int(11) NOT NULL,
  `SubTotal` double DEFAULT NULL,
  `Iva` tinyint(1) DEFAULT NULL,
  `Total` double(10,2) NOT NULL,
  `fechaEmision` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `montopagado` double(10,0) NOT NULL,
  `cambio` double(10,0) NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `descuento` int(11) NOT NULL,
  `codigoRUCcedula` varchar(50) DEFAULT NULL,
  `cliente` varchar(50) NOT NULL,
  `tipofac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IDFactura`, `Timespace`, `AlmacenNumero`, `SubTotal`, `Iva`, `Total`, `fechaEmision`, `montopagado`, `cambio`, `IsVisible`, `descuento`, `codigoRUCcedula`, `cliente`, `tipofac`) VALUES
(1, '2021-06-25', 1, 0, NULL, 200.00, '2021-06-25 07:38:09', 300, 100, 1, 0, '001-030199-0000S', 'Joaquin De Los Angeles', 1),
(2, '2021-06-25', 1, 0, NULL, 12000.00, '2021-06-25 16:42:05', 15000, 3000, 1, 0, '0000000000', 'Kessler Torrez', 1),
(3, '2021-06-25', 1, 0, NULL, 4000.00, '2021-06-25 17:24:51', 5000, 1000, 1, 0, '456789876', 'victor ', 2),
(4, '2021-06-28', 1, 0, NULL, 50000.00, '2021-06-29 05:31:18', 60000, 10000, 1, 0, '001-12345678-1000R', 'Wasamralayucapanda', 2),
(5, '2021-06-29', 1, 0, NULL, 850.00, '2021-06-29 17:47:19', 850, 0, 1, 0, '001-12345678-000A', 'Victor Lopez', 2),
(6, '2021-06-29', 1, 0, NULL, 1100.00, '2021-06-29 20:54:14', 1100, 0, 1, 0, '001-00000000 - 0000A', 'Mariela del Socorro', 2),
(7, '2021-06-29', 1, 0, NULL, 0.00, '2021-06-29 21:02:00', 12000, 12000, 1, 0, '', 'Foraneo', 2),
(8, '2021-06-29', 1, 0, NULL, 2400.00, '2021-06-29 21:03:29', 2400, 0, 1, 0, '0987654324567890', 'Kessler Torrez ', 1),
(9, '2021-06-29', 1, 0, NULL, 24000.00, '2021-06-29 21:04:33', 24000, 0, 1, 0, '098765467890', 'Isabel mayorga', 2),
(10, '2021-06-30', 1, 0, NULL, 4000.00, '2021-06-30 06:35:51', 4000, 0, 1, 0, '777-777777-7777D', 'Cuneta son machin ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialstock`
--

CREATE TABLE `historialstock` (
  `IDhis` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `TimeSpace` date NOT NULL,
  `Horainsertada` datetime NOT NULL,
  `Numeroalmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialstock`
--

INSERT INTO `historialstock` (`IDhis`, `producto`, `Stock`, `TimeSpace`, `Horainsertada`, `Numeroalmacen`) VALUES
(1, 1, 10, '2021-06-25', '2021-06-25 01:39:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresoinventario`
--

CREATE TABLE `ingresoinventario` (
  `IDIngresoINV` int(11) NOT NULL,
  `Timespace` datetime NOT NULL DEFAULT current_timestamp(),
  `Comentario` varchar(500) NOT NULL,
  `MontoPrecio/Costo` double NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `IDRolControlUsuariosPK` int(11) NOT NULL,
  `RolUsuario` varchar(50) NOT NULL,
  `Comentario` varchar(1000) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`IDRolControlUsuariosPK`, `RolUsuario`, `Comentario`, `Nivel`) VALUES
(1, 'Administrador', 'Control del sistema total', 1),
(2, 'Trabajador Almacen 1', 'Trabajador del almacen 1', 2),
(3, 'Trabajador Almacen 2', 'Trabajador del almacen 2', 3),
(4, 'Trabajador Almacen 3', 'Trabajador del almacen 3', 4),
(5, 'Trabajador Almacen 4', 'Trabajador del almacen 4', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalmacenes`
--

CREATE TABLE `tipoalmacenes` (
  `IDalmacentipo` int(11) NOT NULL,
  `NombreAlmacen` varchar(50) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoalmacenes`
--

INSERT INTO `tipoalmacenes` (`IDalmacentipo`, `NombreAlmacen`, `Comentario`, `Nivel`) VALUES
(1, 'Almacen 1', 'Este es el primer almacen', 1),
(2, 'Almacen 2', 'Este es el segundo almacen', 2),
(3, 'Almacen 3', 'Este es el Tercer almacen', 3),
(4, 'Almacen 4', 'Este es el Cuarto almacen', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocambio`
--

CREATE TABLE `tipocambio` (
  `IDcambio` int(11) NOT NULL,
  `TipoMoneda` varchar(20) NOT NULL,
  `Valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocambio`
--

INSERT INTO `tipocambio` (`IDcambio`, `TipoMoneda`, `Valor`) VALUES
(1, 'Dolar EstadoUnidense', 35.12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `IDcatalogoDatosPK` int(11) DEFAULT NULL,
  `IDRolControlUsuariosPK` int(11) NOT NULL COMMENT 'Campos de roles para control de Usuarios',
  `UserName` varchar(40) NOT NULL,
  `PasswordName` varchar(50) NOT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp(),
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuarios`, `IDcatalogoDatosPK`, `IDRolControlUsuariosPK`, `UserName`, `PasswordName`, `TimeSpace`, `IsVisible`, `estado`) VALUES
(1, 1, 1, 'admin@admin.com', 'demo', '2021-02-21 23:14:05', 1, 1),
(2, NULL, 2, 'demo@admin.com', 'demo', '2021-03-01 22:13:39', 1, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistadeudas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistadeudas` (
`IDFactura` int(11)
,`fechaEmision` timestamp
,`cliente` varchar(50)
,`codigoRUCcedula` varchar(50)
,`total` double(10,2)
,`SumaAbonos` double(19,2)
,`resta` double(19,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistasaldadas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistasaldadas` (
`IDFactura` int(11)
,`fechaEmision` timestamp
,`cliente` varchar(50)
,`codigoRUCcedula` varchar(50)
,`total` double(10,2)
,`SumaAbonos` double(19,2)
,`resta` double(19,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistadeudas`
--
DROP TABLE IF EXISTS `vistadeudas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistadeudas`  AS SELECT `fac`.`IDFactura` AS `IDFactura`, `fac`.`fechaEmision` AS `fechaEmision`, `fac`.`cliente` AS `cliente`, `fac`.`codigoRUCcedula` AS `codigoRUCcedula`, `fac`.`Total` AS `total`, (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) AS `SumaAbonos`, `fac`.`Total`- (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) AS `resta` FROM `factura` AS `fac` WHERE `fac`.`tipofac` = 2 AND `fac`.`Total` - (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) > 0 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistasaldadas`
--
DROP TABLE IF EXISTS `vistasaldadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistasaldadas`  AS SELECT `fac`.`IDFactura` AS `IDFactura`, `fac`.`fechaEmision` AS `fechaEmision`, `fac`.`cliente` AS `cliente`, `fac`.`codigoRUCcedula` AS `codigoRUCcedula`, `fac`.`Total` AS `total`, (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) AS `SumaAbonos`, `fac`.`Total`- (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) AS `resta` FROM `factura` AS `fac` WHERE `fac`.`tipofac` = 2 AND `fac`.`Total` - (select sum(`abonoshis`.`montoAbonado`) from `abonoshis` where `abonoshis`.`idFactura` = `fac`.`IDFactura`) = 0 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonoshis`
--
ALTER TABLE `abonoshis`
  ADD PRIMARY KEY (`idAbonado`);

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`IDCodigoAlmacen`);

--
-- Indices de la tabla `almacenuno`
--
ALTER TABLE `almacenuno`
  ADD PRIMARY KEY (`IDAlmacenuno`);

--
-- Indices de la tabla `catalogodatos`
--
ALTER TABLE `catalogodatos`
  ADD PRIMARY KEY (`IDcatalogoDatos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`idDescuento`);

--
-- Indices de la tabla `detalledefactura`
--
ALTER TABLE `detalledefactura`
  ADD PRIMARY KEY (`IDFacturaDetalle`);

--
-- Indices de la tabla `detallesinventario`
--
ALTER TABLE `detallesinventario`
  ADD PRIMARY KEY (`IDDetalleINV`);

--
-- Indices de la tabla `estadocliente`
--
ALTER TABLE `estadocliente`
  ADD PRIMARY KEY (`IDEstadoCliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`);

--
-- Indices de la tabla `historialstock`
--
ALTER TABLE `historialstock`
  ADD PRIMARY KEY (`IDhis`);

--
-- Indices de la tabla `ingresoinventario`
--
ALTER TABLE `ingresoinventario`
  ADD PRIMARY KEY (`IDIngresoINV`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`IDRolControlUsuariosPK`);

--
-- Indices de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  ADD PRIMARY KEY (`IDalmacentipo`);

--
-- Indices de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  ADD PRIMARY KEY (`IDcambio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonoshis`
--
ALTER TABLE `abonoshis`
  MODIFY `idAbonado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `IDCodigoAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `almacenuno`
--
ALTER TABLE `almacenuno`
  MODIFY `IDAlmacenuno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catalogodatos`
--
ALTER TABLE `catalogodatos`
  MODIFY `IDcatalogoDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `idDescuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalledefactura`
--
  ALTER TABLE `detalledefactura`
    MODIFY `IDFacturaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detallesinventario`
--
ALTER TABLE `detallesinventario`
  MODIFY `IDDetalleINV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadocliente`
--
ALTER TABLE `estadocliente`
  MODIFY `IDEstadoCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IDFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historialstock`
--
ALTER TABLE `historialstock`
  MODIFY `IDhis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresoinventario`
--
ALTER TABLE `ingresoinventario`
  MODIFY `IDIngresoINV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  MODIFY `IDRolControlUsuariosPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  MODIFY `IDalmacentipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  MODIFY `IDcambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
