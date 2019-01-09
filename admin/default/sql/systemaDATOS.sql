-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-01-2019 a las 20:43:54
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

--
-- Volcado de datos para la tabla `contrato_estados`
--

INSERT INTO `contrato_estados` (`id`, `estado`) VALUES
(1, 'ACTIVO'),
(4, 'BAJA'),
(3, 'MOROSO'),
(7, 'PARA CAMBIAR'),
(6, 'PARA ELIMINAR'),
(5, 'RECLAMADO'),
(2, 'SUSPENDIDO');

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `Nombre`, `Apellido`, `Direccion`, `Departamento`, `funciones`, `comandos`, `seguridad`, `grupo`, `prio`, `Fecha`, `Sueldo`, `Observaciones`) VALUES
(1, '', '', '', 'root', 'leandro', '$sem = array(  \"a1\" , \"a2\" , \"a3\" , \"a4\" , \"a5\", \"a6\",\"a7\" , \"a8\" , \"a9\");\r\n$cadena=array(\"atiende\",\"verifica\",\"confirma\");\r\n/*\r\nswitch( $loginfuncion->azar ){\r\n	case 1 or 3 or 5 :\r\n   $loginfuncion->cadenas($sem,\"atiende\" );break;\r\n\r\ndefault :\r\n  $loginfuncion->numeros($sem,\"verifica\" );break;\r\n};\r\n$loginfuncion->elije($sem,\"cadena\",\"atiende\",\"numeros\",\"verifica\",array(1,3,5));\r\n*/\r\n\r\n$loginfuncion->run($sem,$cadena,\r\n  \"numeros\", \"cadena\", \"numeros\",\r\n  \"fecha\", \"numeros\", \"cadena\",\r\n  \"hora\", \"cadena\", \"numeros\" ,\r\n  \"fecha\" );', 0, 0, 0, '0000-00-00', '0.000', 'administrador del sistema'),
(2, 'admin', 'admin', '', 'administracion', 'admin', '$sem = array(  \"ad\" , \"ad\" , \"ad\" , \"ad\" , \"ad\", \"ad\",\"ad\" , \"ad\" , \"ad\");\n\nswitch( $loginfuncion->azar ){\n	case 1 or 3 or 5 :\n   $loginfuncion->cadenas($sem,\"min\" );break;\n\ndefault :\n  $loginfuncion->cadenas($sem,\"min\" );break;\n\n};\n', 0, 0, 0, '2000-00-00', '0.000', 'administrador del sistema');

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

--
-- Volcado de datos para la tabla `equipo_marcas`
--

INSERT INTO `equipo_marcas` (`id`, `marca`, `url`) VALUES
(1, 'LEAL-comunicaciones', 'http://lealcomunicaciones.com/'),
(2, 'UBNT', 'http://www.ubnt.com/'),
(3, 'Tp-link', NULL),
(4, 'ROUTERBOARD', NULL),
(5, 'x86 xi686', 'sistema informatico estandar');

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

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`locid`, `nombre`) VALUES
(1, 'Rio Gallegos');

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `NombrePlan`, `CRT`) VALUES
(1, 'BASICO', 'BSC'),
(2, 'INICIAL', 'INI'),
(3, 'ESPECIAL', 'ESP'),
(4, 'Plan basico 1.5Mb', '1Mb'),
(5, 'Plan intermedio 2.5Mb', '2Mb'),
(6, 'Plan Full basic 5Mb', '5Mb'),
(7, 'Plan Full TOR 8Mb', '8Mb'),
(8, 'Plan Full ODIN 12Mb', '12M');

--
-- Volcado de datos para la tabla `planes_importes`
--

INSERT INTO `planes_importes` (`id`, `idPlan`, `FechaImporte`, `importe`) VALUES
(1, 1, '2009-12-01 00:00:00', '120.00'),
(2, 1, '2012-12-01 00:00:00', '220.00'),
(3, 1, '2013-12-01 00:00:00', '320.00'),
(4, 1, '2014-12-01 00:00:00', '420.00'),
(5, 1, '2015-12-01 00:00:00', '520.00'),
(6, 2, '2018-12-19 00:00:00', '120.00'),
(7, 2, '2018-12-19 00:30:00', '230.00'),
(8, 2, '2018-12-19 07:49:38', '350.00'),
(9, 4, '2018-12-19 07:51:33', '480.00'),
(10, 5, '2018-12-19 07:53:06', '580.00'),
(11, 5, '2018-12-19 07:54:33', '550.00'),
(12, 6, '2018-12-19 07:55:18', '670.00'),
(13, 7, '2018-12-19 07:55:50', '1100.00'),
(14, 8, '2018-12-19 07:56:18', '1600.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
