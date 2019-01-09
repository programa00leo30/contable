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
