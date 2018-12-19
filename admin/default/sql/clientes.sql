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
