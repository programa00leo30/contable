-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-01-2019 a las 20:06:02
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systema`
--
CREATE DATABASE IF NOT EXISTS `systema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `systema`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `activo` int(1) DEFAULT '0' COMMENT '<> 0 = falso',
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombusuario` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Passwd` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipodocumento` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `docnro` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `nacionalidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT 'Rio Gallegos',
  `provincia` varchar(30) COLLATE utf8_spanish2_ci DEFAULT 'Santa Cruz',
  `cp` varchar(8) COLLATE utf8_spanish2_ci DEFAULT '9400',
  `mail` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel` varchar(90) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `ip` varchar(16) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NombreApellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `e-mail` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Telefono` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Asunto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Mensaje` mediumtext COLLATE utf8_spanish2_ci,
  `adjunto` mediumtext COLLATE utf8_spanish2_ci,
  `fechahora` datetime NOT NULL,
  `verificado` datetime DEFAULT NULL,
  `idverificador` int(11) DEFAULT NULL,
  `Observacion` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comppago`
--

CREATE TABLE `comppago` (
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` decimal(7,2) NOT NULL,
  `idCobrador` int(11) NOT NULL COMMENT 'Personal cobrador',
  `Observac` text COLLATE utf8_spanish2_ci,
  `hasregistro` text COLLATE utf8_spanish2_ci,
  `nombrecupon` text COLLATE utf8_spanish2_ci,
  `cupon` text COLLATE utf8_spanish2_ci,
  `fechacupon` text COLLATE utf8_spanish2_ci,
  `hora` text COLLATE utf8_spanish2_ci,
  `medioPago` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprecibo`
--

CREATE TABLE `comprecibo` (
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idProvehedor` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` decimal(7,2) NOT NULL,
  `idPagador` int(11) NOT NULL COMMENT 'Personal cobrador',
  `Observac` text COLLATE utf8_spanish2_ci,
  `hasregistro` text COLLATE utf8_spanish2_ci,
  `nombrecupon` text COLLATE utf8_spanish2_ci,
  `cupon` text COLLATE utf8_spanish2_ci,
  `fechacupon` text COLLATE utf8_spanish2_ci,
  `hora` text COLLATE utf8_spanish2_ci,
  `medioPago` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compr_detalle`
--

CREATE TABLE `compr_detalle` (
  `id` int(11) NOT NULL,
  `idComprob` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL COMMENT 'Factura a la que se abona',
  `ImporteAplicado` decimal(7,2) NOT NULL,
  `otros` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comp_detalle`
--

CREATE TABLE `comp_detalle` (
  `id` int(11) NOT NULL,
  `idComprob` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `ImporteAplicado` decimal(7,2) NOT NULL,
  `otros` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `nrocontrato` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `ip` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `localidad` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idEquipo` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idPlan` int(11) DEFAULT NULL COMMENT 'plan contratado',
  `idEmpleado` int(11) NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT '1',
  `fechaalta` date DEFAULT NULL,
  `fechacierre` date DEFAULT NULL,
  `Minutos` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Horas` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DiaMes` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Mes` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DiaSemana` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Comando` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `otrosdatos` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_estados`
--

CREATE TABLE `contrato_estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `idCreacion` int(11) NOT NULL,
  `nrocupon` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `nombregenerico` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechavencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dataosvariosKey`
--

CREATE TABLE `dataosvariosKey` (
  `idkey` int(11) NOT NULL,
  `nombredevariable` varchar(10) NOT NULL,
  `tipoValor` varchar(5) NOT NULL COMMENT 'tipo de valor a contener'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `Departamento` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `funciones` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombreUsuario',
  `comandos` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'contraseña',
  `seguridad` int(2) NOT NULL DEFAULT '99',
  `grupo` int(2) NOT NULL DEFAULT '99',
  `prio` int(2) NOT NULL DEFAULT '99',
  `Fecha` date NOT NULL,
  `Sueldo` decimal(5,3) NOT NULL,
  `Observaciones` mediumtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mac` varchar(35) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `localidad` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo` int(11) NOT NULL,
  `identificador` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `config` text COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) DEFAULT '1',
  `otrosdatos` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_datosalmacenaje`
--

CREATE TABLE `equipos_datosalmacenaje` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idInstalador` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_estado`
--

CREATE TABLE `equipo_estado` (
  `idActivo` int(1) NOT NULL,
  `Descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_marcas`
--

CREATE TABLE `equipo_marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_modelo`
--

CREATE TABLE `equipo_modelo` (
  `id` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `observac` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estad_clientes`
--

CREATE TABLE `estad_clientes` (
  `identrada` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `variable` varchar(10) NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `factCerrada` int(1) DEFAULT '0' COMMENT 'si la factura es posible modificarla',
  `idDeContrato` int(11) DEFAULT NULL COMMENT 'que contrato genero la factura',
  `tipFact` varchar(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'se refiere a fact A o B o C.',
  `Fecha` date DEFAULT NULL,
  `Total` decimal(12,4) NOT NULL,
  `Impuesto` decimal(12,4) DEFAULT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacompra`
--

CREATE TABLE `facturacompra` (
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idProvehedor` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `factCerrada` int(1) DEFAULT '0' COMMENT 'si la factura es posible modificarla',
  `tipFact` varchar(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'se refiere a fact A o B o C.',
  `Fecha` date DEFAULT NULL,
  `Total` decimal(12,4) NOT NULL,
  `Impuesto` decimal(12,4) NOT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facuracompra_detalle`
--

CREATE TABLE `facuracompra_detalle` (
  `id` int(11) NOT NULL,
  `idFactV` int(11) NOT NULL,
  `Cantidad` decimal(11,2) DEFAULT NULL,
  `Detalle` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `porunidad` decimal(11,2) DEFAULT NULL,
  `impuesto` decimal(11,2) DEFAULT NULL,
  `subtotal` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_detalle`
--

CREATE TABLE `fac_detalle` (
  `id` int(11) NOT NULL,
  `idFact` int(11) NOT NULL,
  `Cantidad` decimal(11,2) DEFAULT NULL,
  `idDetalle` int(11) DEFAULT NULL,
  `Detalle` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `porunidad` decimal(11,2) DEFAULT NULL,
  `impuesto` decimal(11,2) DEFAULT NULL,
  `subtotal` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `locid` int(4) UNSIGNED NOT NULL,
  `nombre` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_cliente`
--

CREATE TABLE `mensaje_cliente` (
  `idcontrola` int(11) NOT NULL,
  `idpantalla` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_control`
--

CREATE TABLE `mensaje_control` (
  `idcontrol` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idempleado` int(11) DEFAULT '0',
  `fechaenvio` datetime NOT NULL,
  `fecharecivo` datetime DEFAULT NULL,
  `respuesta` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_estadisticas`
--

CREATE TABLE `mensaje_estadisticas` (
  `idestadisticas` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `contador` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_pantalla`
--

CREATE TABLE `mensaje_pantalla` (
  `idmensaje` int(11) NOT NULL,
  `mensaje` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mkt_addreslist`
--

CREATE TABLE `mkt_addreslist` (
  `id` int(11) NOT NULL,
  `nombrereal` varchar(15) NOT NULL,
  `comentario` varchar(60) DEFAULT NULL,
  `idTipoCliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mkt_cliente_simple_queues`
--

CREATE TABLE `mkt_cliente_simple_queues` (
  `id_mkt` int(11) NOT NULL,
  `id_en_mkt` varchar(10) NOT NULL COMMENT 'el id que identifica la queue',
  `id_cliente` int(11) NOT NULL COMMENT 'id del cliente asociado',
  `comentario` varchar(60) NOT NULL COMMENT 'posible comentario'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mkt_simple_queues_perfil`
--

CREATE TABLE `mkt_simple_queues_perfil` (
  `id_queue` int(11) NOT NULL,
  `NombrePerfil` varchar(30) NOT NULL,
  `target-addresses` varchar(30) DEFAULT NULL,
  `interface` varchar(10) DEFAULT 'all',
  `parent` varchar(10) DEFAULT 'none',
  `packet-marks` varchar(10) DEFAULT NULL,
  `direction` varchar(10) DEFAULT 'both',
  `priority` varchar(2) DEFAULT '8',
  `queue` varchar(30) DEFAULT 'default-small/default-small',
  `limit-at` varchar(30) DEFAULT '0/0',
  `max-limit` varchar(40) NOT NULL DEFAULT '100k/300k',
  `burst-limit` varchar(40) NOT NULL DEFAULT '128k/720k',
  `burst-threshold` varchar(40) NOT NULL DEFAULT '64k/350k',
  `burst-time` varchar(40) NOT NULL DEFAULT '3m/3m',
  `total-queue` varchar(40) DEFAULT 'default-small',
  `dynamic` varchar(5) DEFAULT NULL,
  `disabled` varchar(5) DEFAULT NULL,
  `comment` varchar(120) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `movimientocomercial`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `movimientocomercial` (
`id` int(11)
,`idfact` int(11)
,`idrec` int(11)
,`fecha` varchar(10)
,`obsev` mediumtext
,`total` decimal(12,4)
,`tipo` bigint(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `NombrePlan` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `CRT` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes` (
`id` int(11)
,`NombrePlan` varchar(40)
,`CRT` varchar(3)
,`FechaImporte` datetime
,`importe` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes01`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes01` (
`importe` decimal(7,2)
,`FechaImporte` datetime
,`idPlan` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes_BACKUP01`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes_BACKUP01` (
`id` int(11)
,`NombrePlan` varchar(40)
,`FechaImporte` datetime
,`importe` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_importes`
--

CREATE TABLE `planes_importes` (
  `id` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `FechaImporte` datetime NOT NULL,
  `importe` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Impunible` decimal(5,2) DEFAULT NULL COMMENT 'cuanto impuesto paga'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosStock`
--

CREATE TABLE `productosStock` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` float(11,3) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_ajusteStock`
--

CREATE TABLE `productos_ajusteStock` (
  `id` int(11) NOT NULL,
  `idDetalle` int(11) DEFAULT NULL,
  `Detalle` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regproblemas`
--

CREATE TABLE `regproblemas` (
  `id` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ProblemaEncontrado` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `saldofacturas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `saldofacturas` (
`id` int(11)
,`idCliente` int(11)
,`Fecha` date
,`NumeroComprobante` varchar(23)
,`total` decimal(12,4)
,`pago` decimal(29,2)
,`adeuda` decimal(32,4)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scripControls`
--

CREATE TABLE `scripControls` (
  `id` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `nombreScrip` varchar(60) NOT NULL,
  `script` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `TipoServicio` int(11) DEFAULT NULL,
  `Acontecimiento` text COLLATE utf8_spanish2_ci,
  `Descripcion` varchar(90) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaSolicitud` date DEFAULT NULL,
  `FechaEncuentro` date DEFAULT NULL,
  `FechaRealizacion` date DEFAULT NULL,
  `TiempoInsumido` timestamp NULL DEFAULT NULL,
  `NroFormulario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `std_block`
--

CREATE TABLE `std_block` (
  `idEntrada` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `accion` varchar(20) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `std_general`
--

CREATE TABLE `std_general` (
  `id` int(8) NOT NULL,
  `usuario` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `envia` int(32) NOT NULL,
  `recive` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `std_mensaje`
--

CREATE TABLE `std_mensaje` (
  `idEntrad` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura para la vista `movimientocomercial`
--
DROP TABLE IF EXISTS `movimientocomercial`;

CREATE ALGORITHM=UNDEFINED 
SQL SECURITY DEFINER 
VIEW `movimientocomercial`  AS  (
	SELECT `cl`.`id` AS `id`
		,`fc`.`id` AS `idfact`
		,NULL AS `idrec`
		,ifnull(`fc`.`Fecha`,0) AS `fecha`
		,ifnull(concat('fac:',`fc`.`cajero`,'-',`fc`.`nrocontrol`,' :',`fc`.`Observaciones`),':fac') AS `obsev`
		,`fc`.`Total` AS `total`
		,if((ifnull(`fc`.`tipFact`,3) = 3),1,2) AS `tipo` 
	FROM (`factura` `fc` left join `clientes` `cl` on((`cl`.`id` = `fc`.`idCliente`)))
	) 
	union all (
		select `cl`.`id` AS `id`
			,NULL AS `idFact`,`rc`.`id` AS `idrec`
			,ifnull(`rc`.`Fecha`,0) AS `fecha`
			,ifnull(concat('rec:',`rc`.`cajero`,'-',`rc`.`nrocontrol`,' :',`rc`.`Observac`),':rec') AS `observ`
			,-(`rc`.`Importe`) AS `total`
			,5 AS `tipo` 
		from (`comppago` `rc` left join `clientes` `cl` on((`cl`.`id` = `rc`.`idCliente`)))
	) 
	order by `fecha` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `planes_con_importes`
--
DROP TABLE IF EXISTS `planes_con_importes`;

CREATE ALGORITHM=UNDEFINED 
SQL SECURITY DEFINER 
VIEW `planes_con_importes`  AS  
	select `planes`.`id` AS `id`
		,`planes`.`NombrePlan` AS `NombrePlan`
		,`planes`.`CRT` AS `CRT`
		,`planes_importes`.`FechaImporte` AS `FechaImporte`
		,`planes_importes`.`importe` AS `importe`
	from (`planes` join `planes_con_importes01` `planes_importes` on((`planes_importes`.`idPlan` = `planes`.`id`))) 
	order by `planes`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `planes_con_importes01`
--
DROP TABLE IF EXISTS `planes_con_importes01`;

CREATE ALGORITHM=UNDEFINED  
SQL SECURITY DEFINER 
VIEW `planes_con_importes01`  AS  
	select `pl`.`importe` AS `importe`
		,`pl`.`FechaImporte` AS `FechaImporte`
		,`pl`.`idPlan` AS `idPlan` 
	from `planes_importes` `pl` 
	where (`pl`.`id` = 
		(
			select `bs`.`id` 
			from `planes_importes` `bs` 
			where (`bs`.`idPlan` = `pl`.`idPlan`) 
			order by `bs`.`FechaImporte` desc 
			limit 1
		)
	) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `planes_con_importes_BACKUP01`
--
DROP TABLE IF EXISTS `planes_con_importes_BACKUP01`;

CREATE ALGORITHM=UNDEFINED  
SQL SECURITY DEFINER 
VIEW `planes_con_importes_BACKUP01`  AS  
	select `planes`.`id` AS `id`
		,`planes`.`NombrePlan` AS `NombrePlan`
		,`importes`.`FechaImporte` AS `FechaImporte`
		,`importes`.`importe` AS `importe` 
	from (`planes` join `planes_con_importes01` `importes` on((`importes`.`idPlan` = `planes`.`id`))) 
	order by `planes`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `saldofacturas`
--
DROP TABLE IF EXISTS `saldofacturas`;

CREATE ALGORITHM=UNDEFINED 
SQL SECURITY DEFINER 
VIEW `saldofacturas`  AS  
	select `factura`.`id` AS `id`
		,`factura`.`idCliente` AS `idCliente`
		,`factura`.`Fecha` AS `Fecha`
		,ifnull(concat(`factura`.`cajero`,'-',`factura`.`nrocontrol`),'00-00') AS `NumeroComprobante`
		,`factura`.`Total` AS `total`
		,ifnull(sum(`comp_detalle`.`ImporteAplicado`),0) AS `pago`
		,(`factura`.`Total` - ifnull(sum(`comp_detalle`.`ImporteAplicado`),0)) AS `adeuda` 
	from (`factura` left join `comp_detalle` on((`comp_detalle`.`idFactura` = `factura`.`id`))) 
	group by `factura`.`id` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tel` (`tel`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`);

--
-- Indices de la tabla `comppago`
--
ALTER TABLE `comppago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCobrador` (`idCobrador`);

--
-- Indices de la tabla `comprecibo`
--
ALTER TABLE `comprecibo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProvehedor` (`idProvehedor`),
  ADD KEY `idPagador` (`idPagador`);

--
-- Indices de la tabla `compr_detalle`
--
ALTER TABLE `compr_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComprob` (`idComprob`),
  ADD KEY `idFactura` (`idFactura`);

--
-- Indices de la tabla `comp_detalle`
--
ALTER TABLE `comp_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComprob` (`idComprob`),
  ADD KEY `idFactura` (`idFactura`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `Estado` (`Estado`),
  ADD KEY `localidad` (`localidad`),
  ADD KEY `idEquipo` (`idEquipo`),
  ADD KEY `idPlan` (`idPlan`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `contrato_estados`
--
ALTER TABLE `contrato_estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`idCreacion`),
  ADD UNIQUE KEY `nrocupon` (`nrocupon`);

--
-- Indices de la tabla `dataosvariosKey`
--
ALTER TABLE `dataosvariosKey`
  ADD PRIMARY KEY (`idkey`),
  ADD UNIQUE KEY `nombredevariable` (`nombredevariable`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mac` (`mac`),
  ADD KEY `identificador` (`identificador`(255)),
  ADD KEY `Estado` (`Estado`),
  ADD KEY `localidad` (`localidad`),
  ADD KEY `ip` (`ip`),
  ADD KEY `modelo` (`modelo`);

--
-- Indices de la tabla `equipos_datosalmacenaje`
--
ALTER TABLE `equipos_datosalmacenaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idEquipo` (`idEquipo`),
  ADD KEY `idInstalador` (`idInstalador`);

--
-- Indices de la tabla `equipo_estado`
--
ALTER TABLE `equipo_estado`
  ADD PRIMARY KEY (`idActivo`);

--
-- Indices de la tabla `equipo_marcas`
--
ALTER TABLE `equipo_marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- Indices de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modelo` (`modelo`),
  ADD KEY `idMarca` (`idMarca`);

--
-- Indices de la tabla `estad_clientes`
--
ALTER TABLE `estad_clientes`
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idDeContrato` (`idDeContrato`);

--
-- Indices de la tabla `facturacompra`
--
ALTER TABLE `facturacompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProvehedor` (`idProvehedor`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `facuracompra_detalle`
--
ALTER TABLE `facuracompra_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFactV` (`idFactV`);

--
-- Indices de la tabla `fac_detalle`
--
ALTER TABLE `fac_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFact` (`idFact`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`locid`);

--
-- Indices de la tabla `mensaje_cliente`
--
ALTER TABLE `mensaje_cliente`
  ADD PRIMARY KEY (`idcontrola`),
  ADD KEY `idpantalla` (`idpantalla`);

--
-- Indices de la tabla `mensaje_control`
--
ALTER TABLE `mensaje_control`
  ADD PRIMARY KEY (`idcontrol`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `mensaje_estadisticas`
--
ALTER TABLE `mensaje_estadisticas`
  ADD PRIMARY KEY (`idestadisticas`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `mensaje_pantalla`
--
ALTER TABLE `mensaje_pantalla`
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `mkt_addreslist`
--
ALTER TABLE `mkt_addreslist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombrereal` (`nombrereal`);

--
-- Indices de la tabla `mkt_cliente_simple_queues`
--
ALTER TABLE `mkt_cliente_simple_queues`
  ADD PRIMARY KEY (`id_mkt`);

--
-- Indices de la tabla `mkt_simple_queues_perfil`
--
ALTER TABLE `mkt_simple_queues_perfil`
  ADD PRIMARY KEY (`id_queue`),
  ADD UNIQUE KEY `NombrePerfil` (`NombrePerfil`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NombrePlan` (`NombrePlan`);

--
-- Indices de la tabla `planes_importes`
--
ALTER TABLE `planes_importes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPlan` (`idPlan`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `productosStock`
--
ALTER TABLE `productosStock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos` (`idProducto`);

--
-- Indices de la tabla `regproblemas`
--
ALTER TABLE `regproblemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `scripControls`
--
ALTER TABLE `scripControls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPlan` (`idPlan`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `TipoServicio` (`TipoServicio`);

--
-- Indices de la tabla `std_general`
--
ALTER TABLE `std_general`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comppago`
--
ALTER TABLE `comppago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `comprecibo`
--
ALTER TABLE `comprecibo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compr_detalle`
--
ALTER TABLE `compr_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comp_detalle`
--
ALTER TABLE `comp_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `contrato_estados`
--
ALTER TABLE `contrato_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `idCreacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dataosvariosKey`
--
ALTER TABLE `dataosvariosKey`
  MODIFY `idkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipos_datosalmacenaje`
--
ALTER TABLE `equipos_datosalmacenaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipo_estado`
--
ALTER TABLE `equipo_estado`
  MODIFY `idActivo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `equipo_marcas`
--
ALTER TABLE `equipo_marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `facturacompra`
--
ALTER TABLE `facturacompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facuracompra_detalle`
--
ALTER TABLE `facuracompra_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fac_detalle`
--
ALTER TABLE `fac_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `locid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `planes_importes`
--
ALTER TABLE `planes_importes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `productosStock`
--
ALTER TABLE `productosStock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `scripControls`
--
ALTER TABLE `scripControls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comppago`
--
ALTER TABLE `comppago`
  ADD CONSTRAINT `comppago_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compr_detalle`
--
ALTER TABLE `compr_detalle`
  ADD CONSTRAINT `compr_detalle_ibfk_1` FOREIGN KEY (`idComprob`) REFERENCES `comprecibo` (`id`),
  ADD CONSTRAINT `compr_detalle_ibfk_2` FOREIGN KEY (`idFactura`) REFERENCES `facturacompra` (`id`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `contrato_estados` (`id`),
  ADD CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_4` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_5` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`modelo`) REFERENCES `equipo_modelo` (`id`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`Estado`) REFERENCES `equipo_estado` (`idActivo`);

--
-- Filtros para la tabla `equipos_datosalmacenaje`
--
ALTER TABLE `equipos_datosalmacenaje`
  ADD CONSTRAINT `equipos_datosalmacenaje_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  ADD CONSTRAINT `equipo_modelo_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `equipo_marcas` (`id`);

--
-- Filtros para la tabla `estad_clientes`
--
ALTER TABLE `estad_clientes`
  ADD CONSTRAINT `estad_clientes_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idDeContrato`) REFERENCES `contrato` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturacompra`
--
ALTER TABLE `facturacompra`
  ADD CONSTRAINT `facturacompra_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facuracompra_detalle`
--
ALTER TABLE `facuracompra_detalle`
  ADD CONSTRAINT `facuracompra_detalle_ibfk_1` FOREIGN KEY (`idFactV`) REFERENCES `facturacompra` (`id`);

--
-- Filtros para la tabla `fac_detalle`
--
ALTER TABLE `fac_detalle`
  ADD CONSTRAINT `fac_detalle_ibfk_1` FOREIGN KEY (`idFact`) REFERENCES `factura` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `planes_importes`
--
ALTER TABLE `planes_importes`
  ADD CONSTRAINT `planes_importes_ibfk_1` FOREIGN KEY (`idPlan`) REFERENCES `planes` (`id`);

--
-- Filtros para la tabla `regproblemas`
--
ALTER TABLE `regproblemas`
  ADD CONSTRAINT `regproblemas_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
