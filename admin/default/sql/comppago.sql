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
