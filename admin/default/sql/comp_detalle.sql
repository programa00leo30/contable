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
