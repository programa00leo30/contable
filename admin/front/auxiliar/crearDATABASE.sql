-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-09-2018 a las 11:51:37
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systema`
--

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
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `Nombre`, `Apellido`, `Direccion`, `Departamento`, `funciones`, `comandos`, `seguridad`, `grupo`, `prio`, `Fecha`, `Sueldo`, `Observaciones`) VALUES
(1, 'leandro', 'morala', '', 'root', 'leandro', '$sem = array(  \"a1\" , \"a2\" , \"a3\" , \"a4\" , \"a5\", \"a6\",\"a7\" , \"a8\" , \"a9\");\n\nswitch( $loginfuncion->azar ){\n	case 1 or 3 or 5 :\n   $loginfuncion->cadenas($sem,\"atiende\" );break;\n\ndefault :\n  $loginfuncion->numeros($sem,\"verifica\" );break;\n\n};\n', 0, 0, 0, '2014-01-01', '0.000', 'administrador del sistema'),
(2, 'admin', 'admin', '', 'administracion', 'admin', '$sem = array(  \"ad\" , \"ad\" , \"ad\" , \"ad\" , \"ad\", \"ad\",\"ad\" , \"ad\" , \"ad\");\n\nswitch( $loginfuncion->azar ){\n	case 1 or 3 or 5 :\n   $loginfuncion->cadenas($sem,\"min\" );break;\n\ndefault :\n  $loginfuncion->cadenas($sem,\"min\" );break;\n\n};\n', 0, 0, 0, '2014-01-01', '0.000', 'administrador del sistema');

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
  `idCliente` int(11) DEFAULT NULL,
  `idPlan` int(11) DEFAULT NULL COMMENT 'plan contratado',
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

--
-- Volcado de datos para la tabla `equipo_estado`
--

INSERT INTO `equipo_estado` (`idActivo`, `Descripcion`) VALUES
(1, 'Almacenado'),
(2, 'Instalado'),
(3, 'En Reparacion'),
(4, 'Quemado'),
(5, 'Destruido'),
(6, 'Robado'),
(7, 'USO AP'),
(8, 'Servidor hot'),
(9, 'Servidor off');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_marcas`
--

CREATE TABLE `equipo_marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_marcas`
--

INSERT INTO `equipo_marcas` (`id`, `marca`, `url`) VALUES
(1, 'LEAL-comunicaciones', 'http://lealcomunicaciones.com/'),
(2, 'UBNT', 'http://www.ubnt.com/'),
(3, 'Tp-link', NULL),
(4, 'ROUTERBOARD', NULL),
(5, 'x86 xi686', 'sistema informatico estandar');

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

--
-- Volcado de datos para la tabla `equipo_modelo`
--

INSERT INTO `equipo_modelo` (`id`, `idMarca`, `modelo`, `observac`) VALUES
(1, 2, 'LM5', '$r[\"nombre\"]=\"NanoStation Loco M2\";\r\n$r[\"url\"]=\"http://www.ubnt.com/airmax#nanostationm\";\r\n'),
(2, 2, 'N5N', '$r[\"nombre\"]=\"NanoStation M\";\r\n$r[\"url\"]=\"http://www.ubnt.com/airmax#nanostationm\";'),
(3, 2, 'NB5', '$r[\"nombre\"]=\"NBE-M5-16, NBE-M5-19, NBE-M5-300,\r\nNBE-M2-400, NBE-M5-400\";\r\n$r[\"url\"]=\"http://www.ubnt.com/airmax#nanobeam\";\r\n'),
(4, 2, 'N9N', '$r[\"nombre\"]=\"PowerBridge M\";\r\n$r[\"url\"]=\"http://www.ubnt.com/airmax#powerbridge\";\r\n'),
(5, 2, 'AG5-HP', '$r[\"nombre\"]=\"NBE-M5-16, NBE-M5-19, NBE-M5-300,\r\nNBE-M2-400, NBE-M5-400\";\r\n$r[\"url\"]=\"http://www.ubnt.com/airmax#nanobeam\";\r\n'),
(6, 3, 'equipo en 2', '$r[\"nombre\"]=\"sin informacion todavia\";\r\n$r[\"url\"]=\"desconocido\";\r\n'),
(7, 2, 'RN5', '$r[\"nombre\"]=\"Roket M5\";'),
(8, 4, 'RB750', '$r[\"nombre\"]=\"ROUTERBOARD DB750G\";\r\n$r[\"url\"]=\"\";'),
(9, 5, 'X86 PENTIUM 80GBHD 1GRam', '$r[\"nombre\"]=\"80GB-HDD 1GB-ram 5 PCI ethernet 10/100\";\r\n$r[\"url\"]=\"\";'),
(10, 4, 'RB751G-2HnD', '$r[\"nombre\"]=\"clock 400k con banda 2.4GHz\";\r\n$r[\"url\"]=\"\";'),
(11, 4, 'RB750GL', '$r[\"nombre\"]=\"colck 400k 5 ethernet\";\r\n$r[\"url\"]=\"\";'),
(12, 3, 'TL-WR740N / TL-WR740ND', '$r[\"nombre\"]=\"router basico\";\r\n$r[\"url\"]=\"\";'),
(13, 3, 'TL-WA5210G', '$r[\"nombre\"]=\"CPE TP-link FIRM TP-LINK\";\r\n$r[\"url\"]=\"\";'),
(14, 3, 'NS2(TL-WA5210G-tpstation-CPE)', '$r[\"nombre\"]=\"CPE TP-link FIRM UBIQUITI\";\r\n$r[\"url\"]=\"\";'),
(15, 3, 'NS2(TL-WA5210G-tpstation-AP)', '$r[\"nombre\"]=\"AP TP-link FIRM UBIQUITI\";\r\n$r[\"url\"]=\"\";\r\n$r[\"url\"]=\"\";'),
(16, 1, 'cliente', '$r[\"nombre\"]=\"\";\r\n$r[\"url\"]=\"\";'),
(17, 4, 'RB1100AHx2', '$r[\"nombre\"]=\"mikrotick rb\";\r\n$r[\"url\"]=\"\";'),
(18, 3, 'PFARHOS', '$r[\"nombre\"]=\"PHAROS\";\r\n$r[\"url\"]=\"\";');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estad_clientes`
--

CREATE TABLE `estad_clientes` (
  `identrada` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `variable` varchar(10) NOT NULL,
  `valor` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `Impuesto` decimal(12,4) NOT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
-- Estructura de tabla para la tabla `facturaCompra`
--

CREATE TABLE `facturacompra` (
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idProvehedor` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `factCerrada` int(1) DEFAULT '0' COMMENT 'si la factura es posible modificarla',
  `idDeContrato` int(11) DEFAULT NULL COMMENT 'que contrato genero la factura',
  `tipFact` varchar(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'se refiere a fact A o B o C.',
  `Fecha` date DEFAULT NULL,
  `Total` decimal(12,4) NOT NULL,
  `Impuesto` decimal(12,4) NOT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_detalle`
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
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `locid` int(4) UNSIGNED NOT NULL,
  `nombre` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`locid`, `nombre`) VALUES
(1, 'Rio Gallegos');

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
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `NombrePlan` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `CRT` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes` (
`id` int(11)
,`NombrePlan` varchar(20)
,`CRT` varchar(3)
,`FechaImporte` date
,`importe` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes01`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes01` (
`importe` decimal(7,2)
,`FechaImporte` date
,`idPlan` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planes_con_importes_BACKUP01`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planes_con_importes_BACKUP01` (
`id` int(11)
,`NombrePlan` varchar(20)
,`FechaImporte` date
,`importe` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_importes`
--

CREATE TABLE `planes_importes` (
  `id` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `FechaImporte` date NOT NULL,
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
-- Estructura de tabla para la tabla `productos_ajusteStock`
--
-- tabla para ajustar stock de algun producto.
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
-- Estructura para la vista `planes_con_importes`
--
DROP TABLE IF EXISTS `planes_con_importes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `planes_con_importes`  AS  
select `planes`.`id` AS `id`,`planes`.`NombrePlan` AS `NombrePlan`,`planes`.`CRT` AS `CRT`,
`planes_importes`.`FechaImporte` AS `FechaImporte`,`planes_importes`.`importe` AS `importe` 
from (`planes` join `planes_con_importes01` `planes_importes` on((`planes_importes`.`idPlan` = `planes`.`id`))) 
order by `planes`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `planes_con_importes01`
--
DROP TABLE IF EXISTS `planes_con_importes01`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `planes_con_importes01`  AS  
select `pl`.`importe` AS `importe`,`pl`.`FechaImporte` AS `FechaImporte`,`pl`.`idPlan` AS `idPlan` 
from `planes_importes` `pl` 
where (`pl`.`id` = (
	select `bs`.`id` 
	from `planes_importes` `bs` 
	where (`bs`.`idPlan` = `pl`.`idPlan`) 
	order by `bs`.`FechaImporte` desc limit 1)
) ;

-- --------------------------------------------------------
--
-- Estructura para la vista `planes_con_importes_BACKUP01`
--
DROP TABLE IF EXISTS `planes_con_importes_BACKUP01`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `planes_con_importes_BACKUP01`  AS  
select `planes`.`id` AS `id`,`planes`.`NombrePlan` AS `NombrePlan`,`importes`.`FechaImporte` AS `FechaImporte`,
`importes`.`importe` AS `importe` 
from (`planes` join `planes_con_importes01` `importes` on((`importes`.`idPlan` = `planes`.`id`))) 
order by `planes`.`id` ;

-- --------------------------------------------------------
--
-- Estructura para la vista `saldofacturas`
--
DROP TABLE IF EXISTS `saldofacturas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldofacturas`  AS  
select `factura`.`id` AS `id`,`factura`.`idCliente` AS `idCliente`,
`factura`.`Fecha` AS `Fecha`,
IFNULL (CONCAT (`factura`.cajero,"-",`factura`.nrocontrol ) ,"00-00" ) AS `NumeroComprobante`,
`factura`.`Total` AS `total`,
ifnull(sum(`comp_detalle`.`ImporteAplicado`),0) AS `pago`,
(`factura`.`Total` - ifnull(sum(`comp_detalle`.`ImporteAplicado`),0)) AS `adeuda` 
from (`factura` left join `comp_detalle` on((`comp_detalle`.`idFactura` = `factura`.`id`))) 
group by `factura`.`id` ;

-- --------------------------------------------------------
--
-- Estructura para la vista `movimientocomercial`
--
DROP TABLE IF EXISTS `movimientocomercial`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `movimientocomercial`  AS  
(select 
	 cl.id , 
	 fc.id as idfact ,
	 null as idrec ,
	 IFNULL ( fc.Fecha , 0) as fecha ,
	 IFNULL (CONCAT ("fac:" ,fc.cajero,"-",fc.nrocontrol ," :" ,fc.observaciones ) ,":fac") as obsev ,
	 fc.Total as total , 
	 IF ( IFNULL(fc.tipFact,3) = 3 , 1 , 2 )  as tipo
	 from factura as fc left join clientes as cl on cl.id = fc.idCliente
	 )
	UNION ALL
	(select 
	  cl.id ,
	  null as idFact, 
	  rc.id  as idrec,
	  IFNULL ( rc.Fecha , 0) as fecha ,
	  IFNULL ( CONCAT ( "rec:" ,rc.cajero,"-",rc.nrocontrol ," :" , rc.Observac ) ,":rec") as observ ,
	  -rc.Importe as total, 
	  5 as tipo
	  from `comppago` as rc left join clientes as cl on cl.id = rc.idCliente
	   )
       order by fecha DESC ;

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
  ADD PRIMARY KEY (`idContrato`),
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
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `Estado` (`Estado`),
  ADD KEY `localidad` (`localidad`),
  ADD KEY `ip` (`ip`);

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
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idDeContrato` (`idDeContrato`);

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
-- Indices de la tabla `regproblemas`
--
ALTER TABLE `regproblemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipo` (`idEquipo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comppago`
--
ALTER TABLE `comppago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `comp_detalle`
--
ALTER TABLE `comp_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `contrato_estados`
--
ALTER TABLE `contrato_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `idCreacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `dataosvariosKey`
--
ALTER TABLE `dataosvariosKey`
  MODIFY `idkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `fac_detalle`
--
ALTER TABLE `fac_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `locid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensaje_cliente`
--
ALTER TABLE `mensaje_cliente`
  MODIFY `idcontrola` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensaje_control`
--
ALTER TABLE `mensaje_control`
  MODIFY `idcontrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensaje_estadisticas`
--
ALTER TABLE `mensaje_estadisticas`
  MODIFY `idestadisticas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensaje_pantalla`
--
ALTER TABLE `mensaje_pantalla`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mkt_addreslist`
--
ALTER TABLE `mkt_addreslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `mkt_cliente_simple_queues`
--
ALTER TABLE `mkt_cliente_simple_queues`
  MODIFY `id_mkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `mkt_simple_queues_perfil`
--
ALTER TABLE `mkt_simple_queues_perfil`
  MODIFY `id_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `planes_importes`
--
ALTER TABLE `planes_importes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `std_general`
--
ALTER TABLE `std_general`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comppago`
--
ALTER TABLE `comppago`
  ADD CONSTRAINT `comppago_ibfk_2` FOREIGN KEY (`idCobrador`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `comppago_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `comp_detalle`
--
ALTER TABLE `comp_detalle`
  ADD CONSTRAINT `comp_detalle_ibfk_1` FOREIGN KEY (`idComprob`) REFERENCES `comppago` (`id`),
  ADD CONSTRAINT `comp_detalle_ibfk_2` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`id`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`idPlan`) REFERENCES `planes` (`id`),
  ADD CONSTRAINT `contrato_ibfk_4` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `contrato_ibfk_5` FOREIGN KEY (`Estado`) REFERENCES `contrato_estados` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`Estado`) REFERENCES `equipo_estado` (`idActivo`);

--
-- Filtros para la tabla `equipos_datosalmacenaje`
--
ALTER TABLE `equipos_datosalmacenaje`
  ADD CONSTRAINT `equipos_datosalmacenaje_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `equipos_datosalmacenaje_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `equipos_datosalmacenaje_ibfk_3` FOREIGN KEY (`idInstalador`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  ADD CONSTRAINT `equipo_modelo_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `equipo_marcas` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idDeContrato`) REFERENCES `contrato` (`idContrato`);

--
-- Filtros para la tabla `fac_detalle`
--
ALTER TABLE `fac_detalle`
  ADD CONSTRAINT `fac_detalle_ibfk_1` FOREIGN KEY (`idFact`) REFERENCES `factura` (`id`);

--
-- Filtros para la tabla `planes_importes`
--
ALTER TABLE `planes_importes`
  ADD CONSTRAINT `planes_importes_ibfk_1` FOREIGN KEY (`idPlan`) REFERENCES `planes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
