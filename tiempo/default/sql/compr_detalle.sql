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
