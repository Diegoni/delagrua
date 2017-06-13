-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 15:01:19
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delagrua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_banner`
--

CREATE TABLE `dlg_banner` (
  `idbanner` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `publicar` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_calificacion`
--

CREATE TABLE `dlg_calificacion` (
  `idcalificacion` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `calificacion` text NOT NULL,
  `idtaller` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `atencion` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  `publicar` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_calificacion`
--

INSERT INTO `dlg_calificacion` (`idcalificacion`, `fechahora`, `calificacion`, `idtaller`, `idusuario`, `atencion`, `precio`, `servicio`, `publicar`) VALUES
(6, '2014-11-10 08:00:00', 'Jorge A Polo es un excelente taller en donde brindan uno de los mejores servicios de postventa de Mendoza para la marca Mitsubishi. Ampliamente recomendable.\r\n', 15, 1, 5, 4, 4, 1),
(7, '2014-11-10 08:03:00', 'Garage Europa es un excelente taller en donde brindan uno de los mejores servicios de postventa de Mendoza para la marca FIAT. Ampliamente recomendable.	', 13, 1, 4, 4, 5, 1),
(8, '2014-11-11 11:04:00', 'Carsur es un excelente concesionario en donde brindan el mejor servicio de postventa de la marca Honda en Mendoza. Ampliamente recomendable.\r\n', 12, 1, 4, 3, 5, 1),
(9, '2014-11-11 06:25:00', 'Excelente servicio, muy profesional. La atenciÃƒÂ³n es muy buena y son muy profesionales. Muy cerca del centro.  ', 27, 1, 5, 3, 4, 1),
(10, '2014-11-12 09:50:00', 'Auto Audio es uno de los referentes en audio para el automÃƒÂ³vil. La atenciÃƒÂ³n es muy buena y son muy profesionales.', 29, 1, 4, 4, 4, 1),
(11, '2014-11-12 09:59:00', 'JR Miliotti es una de los mejores talleres de la provincia, de probada trayectoria. Ampliamente recomendado como un gran taller mecanico.', 7, 1, 5, 3, 5, 1),
(12, '2014-11-13 05:18:00', 'ACI IGLESIAS es una referencia de las baterÃƒÂ­as en la provincia de Mendoza. El servicio y la atenciÃƒÂ³n son muy buenos. ', 21, 1, 4, 4, 5, 1),
(13, '2014-11-17 01:56:00', 'Esi Gas es uno de los pioneros en la instalaciÃƒÂ³n de GNC en la provincia de Mendoza. Altamente recomendable.', 40, 1, 5, 5, 5, 1),
(14, '2014-11-17 02:00:00', 'Esi Gas es uno de los pioneros en la instalaciÃƒÂ³n de GNC en la provincia de Mendoza. Altamente recomendable.', 41, 1, 5, 5, 5, 1),
(15, '2014-12-02 01:12:00', 'Autoshop es uno de los negocios mas completos para cambiar las cubiertas, instalar la alarma o colocar el polarizado. Auto Shop es muy recomendable.', 88, 1, 4, 4, 4, 1),
(16, '2015-01-08 09:23:00', 'Fui a Costanera Suspension a comprar amortiguadores para mi ford ka. ComprÃƒÂ© unos Corven a buen precio y de muy buena calidad. ', 218, 56, 5, 5, 5, 1),
(31, '2015-10-07 10:27:00', 'exelente atenciÃƒÂ³n! exelentes precios , ni un problema con mi auto, le colocaron un equipo de 60 l', 39, 63, 5, 5, 5, 0),
(32, '2015-10-07 10:28:00', '100% RECOMENDABLE PARA EL MERCADO DEL AUTOMOTOR, MUY BUENA CALIDAD DE REPUESTOS', 39, 63, 5, 5, 5, 0),
(33, '2016-01-30 06:45:00', 'ZLgnLe http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', 142, NULL, NULL, NULL, NULL, 0),
(34, '2016-02-22 02:18:00', 'Estafadores profesionales. Ponen a gente que no tiene idea. LlevÃƒÂ© auto sano me lo entregaron roto y con respuestos de cuarta. Me tuvieron un mes a las vueltas. no vayan por favor.', 7, 64, 2, 1, 1, 0),
(35, '2016-10-14 10:13:00', '. el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio ', 199, 1, 4, 4, 4, 1),
(36, '2016-10-14 10:13:00', '. el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio el servicio es excelente. buen precio ', 199, 1, 4, 4, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_faq`
--

CREATE TABLE `dlg_faq` (
  `idfaq` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_faq`
--

INSERT INTO `dlg_faq` (`idfaq`, `pregunta`, `respuesta`, `orden`) VALUES
(7, 'Ã‚Â¿QuÃƒÂ© es De La GrÃƒÂºa?', 'De La GrÃƒÂºa es una guÃƒÂ­a gratuita y colectiva de talleres de automÃƒÂ³viles y motos, casas de repuestos, servicios de grÃƒÂºa, asistencia mecÃƒÂ¡nica, entre otras cosas.', 1),
(8, 'Ã‚Â¿CÃƒÂ³mo funciona?', 'En De La GrÃƒÂºa encontrarÃƒÂ¡s toda la informaciÃƒÂ³n relacionada con el mundo motor que te ayudarÃƒÂ¡ a seleccionar e informarte a travÃƒÂ©s de calificaciones de los usuarios acerca del mejor proveedor para tu auto o moto, ya sea por precio, ubicaciÃƒÂ³n geogrÃƒÂ¡fica o calidad del servicio. ', 2),
(9, 'Ã‚Â¿Por quÃƒÂ© no se publicÃƒÂ³ mi comentario?', 'Los comentarios son revisados manualmente. Hacemos esto para evitar la publicaciÃƒÂ³n de comentarios fuera de lugar. Este proceso toma un tiempo porque hay muchos comentarios, por lo que hay que tener un poco de paciencia. Si tu comentario no aparece despuÃƒÂ©s de varios dÃƒÂ­as es porque no se ajusta a nuestros tÃƒÂ©rminos y condiciones', 3),
(10, 'Tengo un taller que no esta en De La GrÃƒÂºa, Ã‚Â¿CÃƒÂ³mo lo doy de alta?\r\n', 'Para que demos de alta tu taller tienes que enviar un correo a delagrua1@gmail.com\r\n', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_localidad`
--

CREATE TABLE `dlg_localidad` (
  `idlocalidad` int(11) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `idprovincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_localidad`
--

INSERT INTO `dlg_localidad` (`idlocalidad`, `localidad`, `idprovincia`) VALUES
(1, 'Ciudad', 1),
(2, 'Godoy Cruz', 1),
(4, 'Las Heras', 1),
(5, 'Junin', 1),
(6, 'General Alvear', 1),
(7, 'Guaymallen', 1),
(8, 'Lujan de Cuyo', 1),
(9, 'Malargue', 1),
(10, 'San Carlos', 1),
(11, 'San Rafael', 1),
(12, 'Tunuyan', 1),
(13, 'Lavalle', 1),
(14, 'Maipu', 1),
(15, 'Rivadavia', 1),
(16, 'San MartÃƒÂ­n', 1),
(17, 'Santa Rosa', 1),
(18, 'Tupungato', 1),
(21, 'Uspallata', 1),
(22, 'La Paz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_locations`
--

CREATE TABLE `dlg_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `idtaller` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point_of_interest` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `formatted_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bounds` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sublocality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_short` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrative_area_level_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dlg_locations`
--

INSERT INTO `dlg_locations` (`id`, `idtaller`, `name`, `point_of_interest`, `lat`, `lng`, `location`, `location_type`, `formatted_address`, `bounds`, `viewport`, `route`, `street_number`, `postal_code`, `locality`, `sublocality`, `country`, `country_short`, `administrative_area_level_1`, `place_id`, `reference`, `url`, `website`) VALUES
(70, 21, 'BeltrÃƒÂ¡n 77', '', '-32.9228606', '-68.84991430000002', '-32.922861,-68.849914', 'PLACES', 'BeltrÃƒÂ¡n 77, Godoy Cruz, Mendoza, Argentina', NULL, NULL, 'BeltrÃƒÂ¡n', '77', NULL, 'Godoy Cruz', NULL, 'Argentina', 'AR', 'Mendoza', 'EitCZWx0csOhbiA3NywgR29kb3kgQ3J1eiwgTWVuZG96YSwgQXJnZW50aW5h', 'CpQBiQAAAHCI6cRdgEbi9XGYZ3ktCFrDWc1Kzbg4FCCOp0FCePAVBiAF6lHXeAFbxSMoCju0h3yu3YkoC8L4WGdTDf5CCOI4bkS00yUmf2gWTK5FIhfYYR7r4ruL_k1-oSDVGUggiKErIi-a8jm6xsCXAeJm5w22F_hfVuMB99AwC00uUTFjWNEbm1vNOON6GJuv3pFuphIQoUSBgVCD411t_vsXgOh_UhoUAeguHQQTcgf--mcc3A3ul7-DHrQ', 'https://maps.google.com/maps/place?q=Beltr%C3%A1n+77,+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e097c597dac7d:0x54c2cbac0a7eabf7', NULL),
(71, 131, 'Sarmiento 813', NULL, '-32.939405', '-68.8367996', '-32.939405,-68.8368', 'PLACES', 'Sarmiento 813, M5504ATA Godoy Cruz, Mendoza, Argentina', NULL, NULL, 'Sarmiento', '813', 'M5504', 'Godoy Cruz', NULL, 'Argentina', 'AR', 'Mendoza', 'EjZTYXJtaWVudG8gODEzLCBNNTUwNEFUQSBHb2RveSBDcnV6LCBNZW5kb3phLCBBcmdlbnRpbmE', 'CqQBlAAAAPvyhX9M_5I_Ze_ZLtppUm_fvXTgNGSohBVKYPoYkWeii7iL_nR8RImmadnVug2bN0GA_mF3uth1i3HEl9vHgFN9pHm0rNKSuF_IvqEj0soZi396Ssu0efaXlJtLOH95rjJMR6L-aDOi4S77mufCfbWzSqeWTlNPAZQv9uMEZbAdKhPvb1uj8Da6MP7gVqJzn7mwfBCXsIVryXusxzh9uQoSEPm8XQ1peejKzPWz2_7hjskaFBy9qTk', 'https://maps.google.com/maps/place?q=Sarmiento+813,+M5504ATA+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e0bc22489b883:0x846d05eaf9812f3f', NULL),
(72, 181, 'MaipÃƒÂº 23', NULL, '-32.876337', '-68.83546910000001', '-32.876337,-68.835469', 'PLACES', 'MaipÃƒÂº 23, Mendoza, Mendoza, Argentina', NULL, NULL, 'MaipÃƒÂº', '23', NULL, 'Mendoza', NULL, 'Argentina', 'AR', 'Mendoza', 'EiZNYWlww7ogMjMsIE1lbmRvemEsIE1lbmRvemEsIEFyZ2VudGluYQ', 'CpQBhAAAALP_9m9oC1IJGsT3v0p1NruFrhK1EJk71XkZ1WUnMykdCYt0hsE9ppiDXSLGH1Q7xXLbvs8nOweSfd9LLQLYJ040AueL9mF31TLB513THv0tuzxeau_cLNAYseafB63M1T7MU4eqpJ34pOacC0dpxaaSmHV0JF4-RbKp_qKrXpoFXyCuErMCRcXERa_pWiMMUBIQ4fO1efgAGiAOVN814jUzeBoU1FYelh6jEzc26M6-ejEmBqFNTSg', 'https://maps.google.com/maps/place?q=Maip%C3%BA+23,+Mendoza,+Mendoza,+Argentina&ftid=0x967e08e0bd2ed09b:0x16cafb491cac6d6d', NULL),
(73, 183, 'Figueroa Alcorta 884', NULL, '-32.9359623', '-68.84289510000002', '-32.935962,-68.842895', 'PLACES', 'Figueroa Alcorta 884, Godoy Cruz, Mendoza, Argentina', NULL, NULL, 'Figueroa Alcorta', '884', NULL, 'Godoy Cruz', NULL, 'Argentina', 'AR', 'Mendoza', 'EjRGaWd1ZXJvYSBBbGNvcnRhIDg4NCwgR29kb3kgQ3J1eiwgTWVuZG96YSwgQXJnZW50aW5h', 'CqQBkgAAACVvi7HaOTsYT23as3YQ78qu3GYORH4nlZ6iDlMS5ZhbZrfa_ljE2CPi1S58AaGIhZbY9Hm5Sl69KPuMI_SiC77oBqIhATFd8mXToJn9KIEMoxvEfSfuc2yqchWBQr67Irzo8Y6bwHMz5rG8KblJKx4juaYxplAjqyeraDUYzqMx18y-Quty93cP_yQ_c8P6NcyA5xGHASZ4_rjTCzYaN7ISEC4iy3WYF3UBP7anIzZM508aFC65fLy', 'https://maps.google.com/maps/place?q=Figueroa+Alcorta+884,+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e0bc4cdaa6fb9:0x3fbf6ea632896d73', NULL),
(74, 22, 'BeltrÃƒÂ¡n 1382', NULL, '-32.9093442', '-68.85125110000001', '-32.909344,-68.851251', 'PLACES', 'BeltrÃƒÂ¡n 1382, Godoy Cruz, Mendoza, Argentina', NULL, NULL, 'BeltrÃƒÂ¡n', '1382', NULL, 'Godoy Cruz', NULL, 'Argentina', 'AR', 'Mendoza', 'ChIJOdJM6HMJfpYRehJQlz4DGgg', 'CpQBiwAAAEnQqaA_mHNqWT1stX6P3-9MX3_FJ-sbxlY2YZZN1bshnFFC0wnTjLUTFSmYjQ43icfXndGcCGSoLwq-EeaKDPyUo2G6MEydK8gr6fX4BBUx9xruRHgehShmV7EWA9M7MDRUL7ecW45p2iWRER-CQY1EOzGOfSwIzoimGEPn2XwLerzAS9_2MbnBUneDM2r2TBIQ96OS7SR-sIMbkedCfS9NTBoUHaC-j9xeP3LW6GHqjh-FulBfpw8', 'https://maps.google.com/maps/place?q=Beltr%C3%A1n+1382,+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e0973e84cd239:0x81a033e9750127a', NULL),
(75, 27, 'Av. San MartÃƒÂ­n 422', NULL, '-32.9194636', '-68.84712079999997', '-32.919464,-68.847121', 'PLACES', 'Av San MartÃƒÂ­n 422, Godoy Cruz, Mendoza, Argentina', NULL, NULL, 'Av San MartÃƒÂ­n', '422', NULL, 'Godoy Cruz', NULL, 'Argentina', 'AR', 'Mendoza', 'ChIJWeA_TnsJfpYRgOnzUaIHhvk', 'CpQBkAAAAMyfUnxseNJV6lOGx1hlYGbelexxsqZk_vn_IFCoGwj6xGA8oLhABlV4c8BR-lX8-KY0Y_CQuPFGu8gtMcgwvJW9-KUVYbn5SNZWOu4O2P0oIHYU5E2kZCXwygMaNDbs6wDCaMFjfUV2MZOcmlRsb1OFjVgNkOG_N0GKbXHSFFItwIf-trBWO3QgEjRs0a8JbBIQkr3Dad3Pb8wUVim9k9aN7hoUPmeA-M5KNkDi1pOV_WBUsueN0UA', 'https://maps.google.com/maps/place?q=Av+San+Mart%C3%ADn+422,+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e097b4e3fe059:0xf98607a251f3e980', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_marca`
--

CREATE TABLE `dlg_marca` (
  `idmarca` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_marca`
--

INSERT INTO `dlg_marca` (`idmarca`, `marca`) VALUES
(48, 'Multimarca'),
(49, 'Honda '),
(50, 'Fiat '),
(51, 'Mitsubishi '),
(52, 'Peugeot - CitroÃƒÂ«n '),
(53, 'Peugeot '),
(54, 'Volkswagen '),
(55, 'Ford'),
(56, 'Chevrolet'),
(57, 'Iveco'),
(58, 'Husqvarna '),
(59, 'Renault');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_provincia`
--

CREATE TABLE `dlg_provincia` (
  `idprovincia` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_provincia`
--

INSERT INTO `dlg_provincia` (`idprovincia`, `provincia`) VALUES
(1, 'Mendoza'),
(9, 'Ciudad de Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_servicio`
--

CREATE TABLE `dlg_servicio` (
  `idservicio` int(11) NOT NULL,
  `servicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_servicio`
--

INSERT INTO `dlg_servicio` (`idservicio`, `servicio`) VALUES
(4, 'Auxilios - Remolques - Gruas'),
(5, 'Cerrajeria'),
(6, 'Grabado de cristales - Verificacion tecnica'),
(7, 'Tapiceria'),
(8, 'Lubricentros '),
(9, 'Alineacion y Balanceo - Tren Delantero'),
(10, 'Electricidad en General'),
(11, 'Frenos'),
(12, 'Mecanica en General'),
(13, 'Inyeccion Electronica'),
(14, 'Taller Integral'),
(15, 'Transmision y Diferenciales (cajas de cambio manual - automaticas)'),
(16, 'Direccion Hidraulica'),
(17, 'Instrumentales  - Tableros'),
(18, 'Aire acondicionado y Calefaccion'),
(19, 'Chaperia y Pintura'),
(20, 'Suspension - Elasticos'),
(21, 'GNC'),
(22, 'Radiadores'),
(23, 'Rectificadoras (camisas  - encuadre de pistones - cigÃƒÂ¼eÃƒÂ±ales - tapas de cilindro)'),
(24, 'Tuning '),
(25, 'Parabrisas - Cristales '),
(26, 'Escapes y Silenciadores'),
(27, 'Turbo - Chip de potenciacion - Banco de pruebas'),
(28, 'Alarmas - Levanta vidrios - Cierres centralizados'),
(29, 'Sacabollos'),
(30, 'Mecanica pesada (Camiones)'),
(31, 'Gomerias (llantas - cubiertas)'),
(32, 'Car Detail - Lavado de tapizados - Teflonados'),
(33, 'Service oficial y post venta'),
(34, 'Taller CESVI'),
(35, 'Gruas - Asistencia mecanica'),
(36, 'Venta de repuestos'),
(37, 'Inyeccion Diesel'),
(38, 'Baterias'),
(39, 'Venta de cubiertas - llantas'),
(40, 'Cerraduras'),
(41, 'Audio'),
(42, 'Polarizados'),
(43, 'Ploteos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_taller`
--

CREATE TABLE `dlg_taller` (
  `idtaller` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipovehiculo` varchar(10) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `idprovincia` varchar(255) DEFAULT NULL,
  `idlocalidad` varchar(255) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefonocodarea` varchar(10) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `googlemap` text,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `atencion` bigint(20) NOT NULL DEFAULT '0',
  `precio` bigint(20) NOT NULL DEFAULT '0',
  `servicio` bigint(20) NOT NULL DEFAULT '0',
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `direction` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrative_area_level_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_short` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sublocality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewport` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bounds` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `formatted_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `point_of_interest` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_taller`
--

INSERT INTO `dlg_taller` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`, `website`, `url`, `reference`, `place_id`, `direction`, `administrative_area_level_1`, `country_short`, `country`, `sublocality`, `locality`, `postal_code`, `street_number`, `route`, `viewport`, `bounds`, `formatted_address`, `location_type`, `location`, `lng`, `lat`, `point_of_interest`) VALUES
(7, 'JR Miliotti ', 'auto', 48, '1', 'Las Heras', '25 de mayo 2275                                                        ', '0261', '4487588', 'info@jrmiliottisa.com.ar', 'www.jrmiliottisa.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13408.017021843885!2d-68.8309406!3d-32.845139!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08a310851fb7%3A0x7a77e45bda89ccac!2s25+de+Mayo+2275%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1411837477216" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                        ', NULL, NULL, NULL, 1, 5, 3, 5, NULL, NULL, NULL, NULL, '25 de mayo 2275                                                        ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Talleres Ciaramitaro', 'auto', 48, '1', 'Ciudad', 'Ayacucho 362 ', '0261', '4374263', 'antoniociaramitaro@hotmail.com', 'www.talleresciaramitaro.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13403.456147034936!2d-68.831383!3d-32.87531659999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08de890f2947%3A0x58da70b536129341!2sAyacucho+362%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415635192628" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ayacucho 362 ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Gabriel Serradilla ', 'auto', 48, '1', 'Ciudad', 'Dr Moreno 3233                                                                ', '0261', '4375374', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.199077353838!2d-68.8397964!3d-32.8664518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e93be7ec2b%3A0xa0bcfeddb7c0a1c6!2sDr+Moreno+3233%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415644225054" width="320" height="240" frameborder="0" style="border:0"></iframe>                    ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Dr Moreno 3233                                                                ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Taller Alberto L Ponce', 'auto', 48, '1', 'Las Heras', 'BahÃƒÂ­a Blanca 253                                ', '0261', '4371407', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.3174881593354!2d-68.82465425952454!3d-32.863318274578695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c5c119a189%3A0xe6ecddaf5a6cf9e9!2sBah%C3%ADa+Blanca+257%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415647094953" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'BahÃƒÂ­a Blanca 253                                ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'CARSUR', 'auto', 49, '1', 'Godoy Cruz', 'Av. San MartÃƒÂ­n 598        ', '0261', '4243721', NULL, 'www.carsur.honda.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13397.107562002131!2d-68.84664725396729!3d-32.917281916393925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097b34799c23%3A0xc252d7cc3d7f3918!2sAv+San+Mart%C3%ADn+598%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415647388160" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 4, 3, 5, NULL, 'https://maps.google.com/maps/place?q=Av+San+Mart%C3%ADn+598,+M5500ELG+Mendoza,+Mendoza,+Argentina&ftid=0x967e091135aa577b:0x6b01f858ebdad870', 'CqQBlgAAACpAg3bUyWsuRBaqtF9utjgUBvuIYKqfTBMHimzgggonTkkg5VmYEjrKeRhWNl7muIFJvgBNH6BGh2KHeKXv_qiH1VWlZJRifazBIAp-nirmRHzbhEHT3fDwVu7jLMYyc-eBPdutHYk2IHS1FfF3CLaVuGLWgVC2cgbbHNLEHpmlnbp5HrghbZ24KrFY9vMllVgyE-h3fGzA1isSJRTKvJMSEOa14MlM1bbief8IDmDmnIMaFAYTtQI', 'EjhBdiBTYW4gTWFydMOtbiA1OTgsIE01NTAwRUxHIE1lbmRvemEsIE1lbmRvemEsIEFyZ2VudGluYQ', 'Av. San MartÃƒÂ­n 598', 'Mendoza', 'AR', 'Argentina', NULL, 'Godoy Cruz', 'M5500', '598', 'Av San MartÃƒÂ­n', NULL, NULL, 'Av San MartÃƒÂ­n 598, M5500ELG Mendoza, Mendoza, Argentina', 'PLACES', '-32.895755,-68.840749', '-68.8407492', '-32.8957553', NULL),
(13, 'Garage Europa', 'auto', 50, '1', 'Guaymallen', 'Adolfo Calle 340', '0261', '4326597 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9516945097193!2d-68.83140313624573!3d-32.89944540744163!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093f6d52a6b1%3A0xeca19f59c20f7c8e!2sAdolfo+Calle+340%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415648095031" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 4, 4, 5, NULL, 'https://maps.google.com/maps/place?q=Adolfo+Calle+340,+M5521BCA,+Mendoza,+Argentina&ftid=0x967e093fa3fe08c9:0x1bca2af6239be732', 'CpQBjAAAAFvdML0hmrv5biSEAXs4hyPYcUrhUt7PuTi2iOUNnY1OJsYMpj-ICPVP33nWKt33w3tb8J817iLqqqXoPixCP8Knf0dsQMGHY-2gRBgcv4yB6yxVrqaKOCrp80gnL6GWhOxatqebjQqYip-hU-rcJZhWy7bgLLbcB7f7hjTLvN57astMbGDM3fuyWxB38bKvExIQLeHXvHFtiQg4QOEkdZU6hBoUmjUtfqTDlndC8CPkekooK902n7M', 'ChIJyQj-oz8JfpYRMuebI_Yqyhs', 'Adolfo Calle 340', 'Mendoza', 'AR', 'Argentina', NULL, 'Guaymallen', 'M5521', '340', 'Adolfo Calle', NULL, NULL, 'Adolfo Calle 340, M5521BCA, Mendoza, Argentina', 'PLACES', '-32.899766,-68.832126', '-68.83212630000003', '-32.8997656', NULL),
(14, 'Mecanica Carrasco', 'auto', 48, '1', 'Maipu', 'Angel Godoy 87', '0261', '4972899', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1673.4771309994096!2d-68.79063004232789!3d-32.97860849081019!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c959aa929c7%3A0x8cd4358d9861a2d6!2sGodoy+A.+87%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415648536139" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Angel Godoy 87', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Jorge A Polo', 'auto', 51, '1', 'Guaymallen', 'Cnel Brandsen 1507 (Coronel Dorrego)        ', '0261', '4311463', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.620681738022!2d-68.83752093809814!3d-32.908195853023514!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969a3790e51%3A0xd02d8b7ad1a98492!2sBrandsen+1507%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415656410248" width="320" height="240" frameborder="0" style="border:0"></iframe>      ', NULL, NULL, NULL, 1, 5, 4, 4, NULL, NULL, NULL, NULL, 'Cnel Brandsen 1507 (Coronel Dorrego)        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Diesel Campillay', 'auto', 48, '1', 'Guaymallen', 'J G Molina 277 (Dorrego)                                ', '0261', '4320610', NULL, 'www.dieselcampillay.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d837.4332359042767!2d-68.83638329999995!3d-32.90522839999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a66bf2c09%3A0xcd044bc91c4f53fb!2sMolina+J.+51%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1415655981979" width="320" height="240" frameborder="0" style="border:0"></iframe>                       ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, 'https://maps.google.com/maps/place?q=Molina+J.+277,+Mendoza,+Argentina&ftid=0x967e096a783f9cf9:0x1c5009cb5ee8c18b', 'CoQBfgAAAPqBuWd4jAnPCcYDxx85ENRq5p3oFwvwBvqs3bB76zBxT5QFvjo8IoDq_UCDDrIoEUzOW43mgDnS7ZrZF5UVRZPG5DWtEd7c41Nz60dpxV5tBo9H4jinNZ_fMyJfzL8zOkkvTR8ZovNWSpim40Xjha-Mr-G7XWG59dPIbz1ccHggEhBnjjnQ5tmDWWMARtCG1B6hGhSuSyXM1JEFyIHY8gyXFNFnlXnXqg', 'ChIJ-Zw_eGoJfpYRi8HoXssJUBw', 'Molina J. 277', 'Mendoza', 'AR', 'Argentina', NULL, 'GuaymallÃƒÂ©n', NULL, '277', 'Molina J.', NULL, NULL, 'Molina J. 277, Mendoza, Argentina', 'PLACES', '-32.905188,-68.834835', '-68.83483519999999', '-32.9051876', NULL),
(17, 'Service Toulouse', 'auto', 52, '1', 'Ciudad', 'P De La Reta 649', '0261', '4291514', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0628464981683!2d-68.83985610000002!3d-32.896506599999974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0916c6de1eb1%3A0x342c5f9b8e51691f!2sDe+la+Reta+P.+601%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1415657737049" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'P De La Reta 649', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Guareschi - Cocchetto Servicio Mecanico', 'auto', 48, '1', 'Guaymallen', 'ItuzaingÃƒÂ³ 92', '0261', '4317816', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.2655990705434!2d-68.83725990000002!3d-32.9175803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09673a635039%3A0xb595b6ac7c952c16!2sItuzaing%C3%B3+202%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415659119411" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'ItuzaingÃƒÂ³ 92', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Panelo Roberto Miguel ', 'auto', 48, '1', 'Malargue', 'Amigorena 1148', '02627', '470398', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Amigorena 1148', 'Mendoza', NULL, NULL, NULL, 'Malargue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Daniel Abaca', 'auto', 48, '1', 'Godoy Cruz', ' Renato Della Santa 776                 ', '0261', '155275223 - 155743729 ', 'danielabaca@live.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.6434001233674!2d-68.86135975349413!3d-32.91702004273028!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099d262ec371%3A0xcbe7a42218b785aa!2sDella+Sta+Renato+776%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415669653121" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, ' Renato Della Santa 776                 ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Aci de Alberto Iglesias', 'auto', 48, '1', 'Godoy Cruz', 'BeltrÃƒÂ¡n Sur 77        ', '0261', '4220908 - 422-0832', ' info@bateriasaci.com.ar - acisa@speedy.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.026107613227!2d-68.84967968766414!3d-32.92390845702148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097c597dac7d%3A0x54c2cbac0a7eabf7!2sBeltr%C3%A1n+77%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415670130518" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 4, 4, 5, NULL, NULL, NULL, NULL, 'BeltrÃƒÂ¡n Sur 77        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Aldo Giurdanella', 'auto', 48, '1', 'Godoy Cruz', 'Beltran 1382', '0261 ', '4244053  -  153690081', 'aldogiurdanella2012@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.5797256068263!2d-68.8512199!3d-32.909278400000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0973df9ac5f5%3A0x656b3bb42f84f209!2sBeltr%C3%A1n+1382%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415670471881" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Beltran 1382', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Autolub', 'auto', 48, '1', 'Ciudad', 'Av San MartÃƒÂ­n 2859                ', '0261', '4300755', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.532841421476!2d-68.83358374840999!3d-32.869981524100346!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dd4dec9cef%3A0x47736ff1125bf75d!2sAv+San+Mart%C3%ADn+2859%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415704528590" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av San MartÃƒÂ­n 2859                ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Carrillo Alineacion', 'auto', 48, '1', 'Ciudad', 'J F Moreno 2824', '0261', '4307099', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.5263876124773!2d-68.83227292089303!3d-32.8703230520094!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dd213c0497%3A0x7eaae83e047b5476!2sMoreno+2824%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415704938323" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J F Moreno 2824', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'FRESARGLASS', 'auto', 48, '1', 'Guaymallen', 'Necochea 400 (San Jose)                                ', '0261', '4321684', 'fresarglass@live.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1440488445714!2d-68.82097920000002!3d-32.8943595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0930cc763fcd%3A0x21860c0f20723747!2sNecochea+401%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415714355650" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Necochea 400 (San Jose)                                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Lubricentro Tirasso', 'auto', 48, '1', 'Guaymallen', 'Berutti 54                        ', '0261', '4324776', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13399.051072441134!2d-68.8362745!3d-32.90444!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a8bfff77b%3A0xce5176a6a59f7bb7!2sBerutti+54%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415728911959" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Berutti 54                        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Alessi', 'auto', 48, '1', 'Godoy Cruz', 'San MartÃƒÂ­n 422                                ', '0261', '4240021', 'info@alessi.com.ar ', 'www.alessi.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.237559940961!2d-68.84855895801321!3d-32.9183212424128!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097b4e67c199%3A0x3103a8213787649b!2sAv+San+Mart%C3%ADn+422%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415729545458" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 5, 3, 4, NULL, NULL, NULL, NULL, 'San MartÃƒÂ­n 422                                ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Jc Auto Stereo', 'auto', 48, '1', 'Godoy Cruz', 'Brasil 341 Loc 7', '0261', '4247043', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.884635320087!2d-68.84072517015122!3d-32.904268105680366!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b6961900b%3A0xb2f2b65a34d0e0d7!2sBrasil+341%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415730169412" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Brasil 341 Loc 7', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Auto Audio', 'auto', 48, '1', 'Ciudad', 'Colon 451                        ', '0261', '4236013', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d837.5405844319217!2d-68.84642579999999!3d-32.8938759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09101ccdc461%3A0x829c39d6e979bd8c!2sAv+Col%C3%B3n+451%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415828967985" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 4, 4, 4, NULL, NULL, NULL, NULL, 'Colon 451                        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Oscar Vicario', 'auto', 48, '1', 'Godoy Cruz', 'Democracia 22        ', '0261', '4242358', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.248388189417!2d-68.84589993491889!3d-32.91803510445242!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0964d8597a29%3A0x3f5ed171a95ecf31!2sDemocracia+22%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415901738969" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Democracia 22        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Mecanica Integral De Miguel Y Andres Garro', 'auto', 48, '1', 'Ciudad', 'Cnel Rodriguez 2353', '0261', '4257423', 'garroandres@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.4502768497234!2d-68.8504800756756!3d-32.87435050557712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08fafc403339%3A0x87fe3bb4b550fb01!2sRodr%C3%ADguez+Cnel.+2353%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415902007791" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cnel Rodriguez 2353', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Navarrete Mecanica Sport', 'auto', 48, '1', 'Ciudad', 'Montecaseros 2158 PB', '0261', '4293599', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6700.797637912546!2d-68.83385386297952!3d-32.88762222565758!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0923b168f4e3%3A0xb4552423362cd7a4!2sMontecaseros+2158%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415902301699" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Montecaseros 2158 PB', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Mecanica Franceschini - Tren Delantero', 'auto', 48, '1', 'San Rafael', 'Cnel Olascoaga 1468', '0260', '4422172', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cnel Olascoaga 1468', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Pro Neumaticos', 'auto', 48, '1', 'Godoy Cruz', 'Av San Martin 1135        ', '0261', '4246774', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.47449303149!2d-68.84583699947602!3d-32.91205974842508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096fc9cfb6b9%3A0xa68b5265e677dc25!2sAv+San+Mart%C3%ADn+1135%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415903264698" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av San Martin 1135        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Suriani ', 'auto', 48, '1', 'Guaymallen', 'J LÃƒÂ³pez De Gomara 261', '0261', '4212447', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.814384482052!2d-68.79395350055539!3d-32.903075499725105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ebcdc2bd823%3A0xe69b56644d8eacb!2sDe+Gomara+L.+261%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415903821047" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J LÃƒÂ³pez De Gomara 261', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Cp Motos', 'moto', 48, '1', 'Ciudad', 'Av San MartÃƒÂ­n 3366', '0261', '4377807', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13404.880130852427!2d-68.8461908953368!3d-32.86589727405667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c292c14d6d%3A0xd5ddfbabda397c70!2sAv+San+Mart%C3%ADn+3366%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415992805371" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av San MartÃƒÂ­n 3366', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Mecanica De Motos Peralta', 'moto', 48, '1', 'Guaymallen', 'J De Garay 1027 (San Jose)', '0261', '4456900', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.46435022705!2d-68.82514523920898!3d-32.88848786052503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092e1b737393%3A0x98919d5a514b2e5!2sGaray+1027%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415993158885" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J De Garay 1027 (San Jose)', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Mecanica Olguin', 'auto', 48, '1', 'Guaymallen', 'R Obligado 1991 (San Jose)                ', '0261', '4453015', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.3478292307484!2d-68.81145490681533!3d-32.879770900561965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092b32fff357%3A0xf53c7e871cdd5a84!2sObligado+1991%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416231717880" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'R Obligado 1991 (San Jose)                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'GNC Anton', 'auto', 48, '1', 'Guaymallen', 'Mathus Hoyos 871', '0261', '4459263', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.018946906452!2d-68.81058064551796!3d-32.871468768169905!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDUyJzE4LjAiUyA2OMKwNDgnMzUuNiJX!5e0!3m2!1ses-419!2sar!4v1416232294564" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Mathus Hoyos 871', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Esi Gas', 'auto', 48, '1', 'Ciudad', 'ItuzaingÃƒÂ³ 2536', '0261', '4308414 - 4311204', NULL, 'www.esigas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.012136716374!2d-68.83258852382916!3d-32.87155886164997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dc045bab7b%3A0xf4122671f7581248!2sItuzaing%C3%B3+2536%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416232502269" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5, NULL, NULL, NULL, NULL, 'ItuzaingÃƒÂ³ 2536', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Esi Gas (sucursal San Rafael)', 'auto', 48, '1', 'San Rafael', 'Av. Moreno 1315', '0260', '4430405', NULL, 'www.esigas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1642.0690041660573!2d-68.32995594113922!3d-34.60067155730119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907de2024683f%3A0xd11f2329fc0d1a75!2sAv+Mariano+Moreno+1315%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses-419!2sar!4v1416232810293" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5, NULL, NULL, NULL, NULL, 'Av. Moreno 1315', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Escapes Mendoza', 'auto', 48, '1', 'Guaymallen', 'Sarmiento 852', '0261', '4457190', 'escapes_mza2006@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.194634611591!2d-68.80315344896916!3d-32.8902710633426!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec896ba0c23%3A0x59c667eb03b8a0c2!2sSarmiento+852%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416233180161" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Sarmiento 852', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Replat Escapes ', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 1409 (San Jose)                ', '0261', '4323598', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3078257902457!2d-68.81611048545814!3d-32.890028637256385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093250b518e5%3A0x41301f540530dfaf!2sGodoy+Cruz+1409%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416233486450" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 1409 (San Jose)                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Imola', 'auto', 48, '1', 'Ciudad', 'Av B Mitre 1348', '0261', '4250423', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4222477819585!2d-68.84387459999999!3d-32.8870026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091c86d84199%3A0x5f8a2c3bda111fd3!2sAv+Bartolom%C3%A9+Mitre+1348%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416237669624" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av B Mitre 1348', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Taller Cona', 'auto', 48, '1', 'Guaymallen', '25 De Mayo 154', '0261', '4319047', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1675.0111292909423!2d-68.83232593240353!3d-32.89757975284456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093e42a566c5%3A0xfc4d4d37bb4adb21!2s25+de+Mayo+154%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416238884953" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '25 De Mayo 154', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Tapiceria Automotor Y Nautica - Pablo Salinas', 'auto', 48, '1', 'Godoy Cruz', 'D Matheu 1525', '0261', '4639519', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.4264410385967!2d-68.8287643!3d-32.9397489!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bec6c236d67%3A0x216a6a2271715447!2sMatheu+1525%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239287030" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'D Matheu 1525', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Perez Cruz Hipolito', 'auto', 48, '1', 'Guaymallen', 'Pringles 2646', '0261', '4452007', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1675.0672309173458!2d-68.80456889999999!3d-32.894613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec99186891f%3A0xdd9d72e3337bc559!2sPringles+2301%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239561824" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pringles 2646', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Escayol', 'auto', 48, '1', 'Godoy Cruz', 'Amengual 1453', '0261', '4274697', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6871972607014!2d-68.86028323967282!3d-32.906437656281504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f9df0b657%3A0xdaa3ee9b333d45a3!2sAmengual+1453%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239909652" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Amengual 1453', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Tapiceria Petino ', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 743                                 ', '0261', '4454431 - 155981383', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3358629892246!2d-68.8228346902143!3d-32.88928718020133!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093001a46fdb%3A0xbf8e9d037efdac7d!2sGodoy+Cruz+743%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240271116" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 743                                 ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Pedro Leuci', 'auto', 48, '1', 'Guaymallen', 'Mitre 776', '0261', '4311280', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.125216748915!2d-68.8163376!3d-32.89073!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0933d3e1b35b%3A0x5323f3f19bbac791!2sAv+Mitre+776%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240499829" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Mitre 776', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Centro Chinak', 'auto', 48, '1', 'Ciudad', 'Av B Mitre 1702        ', '0261', '4250900', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.2680767944423!2d-68.84357957990112!3d-32.88398996840254!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091d923e43ad%3A0xcad625ada136c996!2sAv+Bartolom%C3%A9+Mitre+1702%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240977316" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av B Mitre 1702        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Rodax', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 1387', '0261', '4310464', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3291125549817!2d-68.8152175!3d-32.889465699999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093238cd8b2f%3A0x7587ec33abc0db29!2sGodoy+Cruz+1387%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416313045189" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 1387', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'El Cruce ', 'auto', 48, '1', 'Godoy Cruz', 'RodrÃƒÂ­guez PeÃƒÂ±a 850', '0261', '4325888', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.477442078932!2d-68.77137574973754!3d-32.93840194923463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c46292d1ad7%3A0x937bc2d7c4d30eb7!2sCarril+Rodr%C3%ADguez+Pena%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416313736107" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'RodrÃƒÂ­guez PeÃƒÂ±a 850', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Mantello Neumaticos', 'auto', 48, '1', 'Maipu', 'Francisco Gabrielli (ex Urquiza) 3885                ', '0261', '4932891/4932884', 'mantello@infovia.com.ar', 'www.neumaticosmantello.com.ar', '                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Francisco Gabrielli (ex Urquiza) 3885                ', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Rodaservis', 'auto', 48, '1', 'Godoy Cruz', 'Cerro Nevado 1194        ', '0261', '4520723', NULL, NULL, '        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cerro Nevado 1194        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Neumaticos Romeo', 'auto', 48, '1', 'Guaymallen', 'Bandera De Los Andes 3726        ', '0261', '4216121', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.958446294696!2d-68.7946089!3d-32.89926689999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0eb9429be03b%3A0xcfd891a12b9b032!2sAv+Bandera+de+Los+Andes+3726%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416315197972" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Bandera De Los Andes 3726        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Denver', 'auto', 50, '1', 'Godoy Cruz', 'Av. San MartÃƒÂ­n Sur 593        ', '0261', '4225499', NULL, 'www.denverauto.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.7708393993717!2d-68.8500086!3d-32.9306523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd6e3e37437%3A0xba3353cdfdc149ac!2sAv+San+Mart%C3%ADn+Sur+593%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416321880088" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. San MartÃƒÂ­n Sur 593        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Automotores General San Martin', 'auto', 53, '1', 'Guaymallen', 'Av. 25 de Mayo 5555', '0261', ' 4133700', NULL, 'www.autogsm.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.44134212067!2d-68.7746854!3d-32.9129359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c280188d971%3A0xf368c27271380c6c!2sAcceso+A+25+de+Mayo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416322833835" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. 25 de Mayo 5555', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Jose Radiadores', 'auto', 48, '1', 'San Rafael', 'Mitre 1370', '0260 ', '154418049', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2677017282213!2d-68.3108374!3d-34.6226747!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f452ba677%3A0x235af5e8a6b0d5ed!2sAv+Mitre+1370%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490200612" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Mitre 1370', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Polin MecÃƒÂ¡nica', 'auto', 48, '1', 'San Rafael', 'Corrientes 526', '0260', '154676896', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.512121547091!2d-68.33663!3d-34.6164965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080721c000ed%3A0xcc5b9c28106b3bcc!2sCorrientes+526%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490304476" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Corrientes 526', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Salvo Tascone Hnos', 'auto', 48, '1', 'San Rafael', 'Mitre 1207', '0260', '4438263', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.287871705218!2d-68.3123518!3d-34.6221649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f19e52253%3A0xc803d039609d3c80!2sAv+Mitre+1207%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490404759" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Mitre 1207', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Jpm MecÃƒÂ¡nica', 'auto', 48, '1', 'San Rafael', 'Moreno 1087', '0260', '154557205', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.0352356490966!2d-68.3308728!3d-34.6032705!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907e0ff6dee55%3A0x7fab4210fbcabeb1!2sAv+Mariano+Moreno+1087%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490491221" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Moreno 1087', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Mundogas', 'auto', 48, '1', 'San Rafael', 'Lavalle 479', '0260', NULL, NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.857417844093!2d-68.3387968!3d-34.6077668!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080959296415%3A0x2798dd7815ff0fa8!2sLavalle+479%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490650690" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Lavalle 479', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Raul Taller Mecanico', 'auto', 48, '1', 'San Rafael', 'Deoclecio Garcia 337', '0260', '154513091', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Deoclecio Garcia 337', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Mauricio Martinez MecÃƒÂ¡nica', 'auto', 48, '1', 'San Rafael', 'Puerredon 515', '0260', '154601897', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.8830973401814!2d-68.3370943!3d-34.6071175!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080bd5008077%3A0x98f4478d91099dff!2sPueyrred%C3%B3n+515%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490966143" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Puerredon 515', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Baja Un Cambio', 'auto', 48, '1', 'San Rafael', 'Zapata y Italia', '0260', '4425756 ', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Zapata y Italia', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Baterias Mateo', 'auto', 48, '1', 'San Rafael', 'Carlos W. Lencinas 61', '0260', '4428459', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.658908585822!2d-68.3421846!3d-34.612785699999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080f7011ca4f%3A0x10dbbdfeffa59a4a!2sLencinas+61%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491196658" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Carlos W. Lencinas 61', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Motos Cornachione', 'moto', 48, '1', 'San Rafael', 'Cnel L Barcala 1234', '0260', '4447484', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2502337958613!2d-68.3127883!3d-34.623116200000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f263fb39f%3A0x40e430a7bc09a403!2sBarcala+1234%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491378090" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cnel L Barcala 1234', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'RPM motos', 'moto', 48, '1', 'San Rafael', 'Italia 543', '02627', '15 314942', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.622509785727!2d-68.3177109!3d-34.6137059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907f137aa3c91%3A0x719e5498d7ab9304!2sItalia+543%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491728231" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Italia 543', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Mg Motos', 'moto', 48, '1', 'Maipu', 'Cruz Videla 73', '0261', '4990007', 'juanmarcelogonzalez@yahoo.com.ar', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cruz Videla 73', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Perez Enrique', 'moto', 48, '1', 'Guaymallen', 'Gral Artigas 776        ', '0261', '4450416', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d837.5492563388414!2d-68.80401998428755!3d-32.89295866226035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec969c38ccf%3A0xffb7a5b15449e83e!2sArtigas+J.+776%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416492711915" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gral Artigas 776        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Vaselli Motos ', 'moto', 48, '1', 'Guaymallen', 'Gdor R Videla 1575', '0261', '4452113', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4426617607646!2d-68.8286577!3d-32.886462699999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092476444c25%3A0x902e8c3fdbf19cac!2sAv+Gdor.+Ricardo+Videla+1575%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416492882139" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gdor R Videla 1575', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'MD Motos', 'moto', 48, '1', 'Lujan de Cuyo', 'Godoy Cruz 46', '0261', '4986123', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.843357312296!2d-68.8791281!3d-33.034257100000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e753ed977b54d%3A0xc2bd44644964547b!2sGodoy+Cruz+46%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493078236" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 46', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Atuel Motos', 'moto', 48, '1', 'San Rafael', 'Av H Yrigoyen 616', '0260', '4436039', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.6161136039327!2d-68.33681589999999!3d-34.6138676!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96790807b5427675%3A0x4a224efb12c8479c!2sAv+Hip%C3%B3lito+Yrigoyen+616%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493212336" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av H Yrigoyen 616', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Cicutto Moto Mecanica', 'moto', 48, '1', 'Maipu', 'Tropero Sosa 23', '0261', '4972095', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.39187262471!2d-68.8463613!3d-32.91424329999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096ffc688c4f%3A0x25f23b63eeed6f22!2sTropero+Sosa+23%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493435544" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Tropero Sosa 23', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Basco Miguel Angel', 'moto', 48, '1', 'Guaymallen', 'Gral Artigas 691', '0261', '4452545', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6700.573682232016!2d-68.79942775266788!3d-32.890583577233755!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec979ee6353%3A0x1227797c68651f46!2sArtigas+J.+691%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493596914" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gral Artigas 691', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Angela De Sartori', 'moto', 48, '1', 'Ciudad', 'Rioja 430', '0261', '4291595', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0299735806366!2d-68.83729302943034!3d-32.89737576908453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0915adce98f7%3A0x5f307b07ac28cc9e!2sLa+Rioja+430%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493744850" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Rioja 430', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'YaÃƒÂ±ez Electro Instrumental', 'auto', 48, '1', 'Guaymallen', 'Espejo 654', '0261', '4320235', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.824760473836!2d-68.832802!3d-32.902801200000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0940699368d3%3A0xe67c35e51a3dc6a3!2sEspejo+654%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416502702970" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Espejo 654', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Evolucion Movil', 'auto', 48, '1', 'Godoy Cruz', 'Independencia 301                                                                ', '0261', '4832191 - 155502759', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.8014490067835!2d-68.822809!3d-32.9298437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bfac61553fd%3A0xc5ff86fceaa7bc0c!2sIndependencia%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1416503527927" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Independencia 301                                                                ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Servicentro San Jose', 'auto', 48, '1', 'Guaymallen', 'Carril Godoy Cruz 2345                                ', '0261', '156168742', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13400.994660594451!2d-68.80792021368067!3d-32.89159311986448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec93c2d17f7%3A0x8a8b0d3efe84800e!2sGodoy+Cruz+2345%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416503746866" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Carril Godoy Cruz 2345                                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Auto Spa Lavadero', 'auto', 48, '1', 'Guaymallen', '25 de Mayo 2182                        ', '0261', '153696184', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6699.898346255594!2d-68.81536016632434!3d-32.899512068916984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e094ad22586d3%3A0xef387ae82e41a69d!2s25+de+Mayo+2182%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504006210" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '25 de Mayo 2182                        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Global film', 'auto', 48, '1', 'Las Heras', 'Urquiza 66                        ', '0261', '152029282', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.697732872531!2d-68.83385767139148!3d-32.86125459550089!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c1aa31060d%3A0x874fe03ebb45393b!2sUrquiza%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504492510" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Urquiza 66                        ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dlg_taller` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`, `website`, `url`, `reference`, `place_id`, `direction`, `administrative_area_level_1`, `country_short`, `country`, `sublocality`, `locality`, `postal_code`, `street_number`, `route`, `viewport`, `bounds`, `formatted_address`, `location_type`, `location`, `lng`, `lat`, `point_of_interest`) VALUES
(83, 'Graficar Vinilos', 'auto', 48, '1', 'Godoy Cruz', 'San Martin Sur 303                        ', '0261', '4222326', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.86022848502!2d-68.8496555!3d-32.92829089999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd65333f803%3A0xe0f3c377e974d9fe!2sAv+San+Mart%C3%ADn+Sur+303%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504664044" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Martin Sur 303                        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Boga Polarizados', 'auto', 48, '1', 'Tupungato', 'BÃ‚Âº San Jose Manzana B Casa 17                                                ', '0261', '153690327 - 153690325', NULL, NULL, '                                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'BÃ‚Âº San Jose Manzana B Casa 17                                                ', 'Mendoza', NULL, NULL, NULL, 'Tupungato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Malisani y Ruggeri', 'auto', 48, '1', 'Godoy Cruz', 'Sierra Pintada 874', '0261', '4317013 - 155509219', 'fabianmalisani@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Sierra Pintada 874', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Servi Mec', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Ruta Provincial 50 km. 1037', '02623', '428656 - 15520880', 'servi_mec@hotmail.com', 'www.servimec.8m.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26751.16354946684!2d-68.5176297421563!3d-33.059219393069036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e42713585e765%3A0x761d8f576c296f1f!2sRP+50%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416505751744" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ruta Provincial 50 km. 1037', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Guille Motos', 'moto', 48, '1', 'Ciudad', 'luzuriaga 690        ', '0261', '4283911', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.9159661254607!2d-68.8606148!3d-32.900389999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a73a7eff77%3A0x67f977e569ebe67f!2sLuzuriaga+602%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417481768971" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'luzuriaga 690        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Auto Shop', 'auto', 48, '1', 'Godoy Cruz', 'Diamante 375                                        ', '0261', '4053000', 'autoshop@guerrinisa.com.ar', 'www.autoshopmendoza.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.9676703169393!2d-68.82226179999998!3d-32.9254524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bfcb67d0b33%3A0xee0a904062d1840c!2sDiamante%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417483679318" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 4, 4, 4, NULL, NULL, NULL, NULL, 'Diamante 375                                        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Autoradio Ayacucho', 'auto', 48, '1', 'Ciudad', 'Corrientes 101                        ', '0261', '4299287', 'autoradioayacucho@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.6412660140036!2d-68.83377960845952!3d-32.881209690707955!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092028706491%3A0x29385ab3bf149aaa!2sCorrientes+101%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485404241" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Corrientes 101                        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Repuestos Alba', 'auto', 48, '1', 'Maipu', 'General Lavalle 187', '0261', '4972753', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.3651231877725!2d-68.78827439999999!3d-32.967767499999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c8d1242f06d%3A0xae0cbe3d5c31b9d8!2sGral+Lavalle%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485667485" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'General Lavalle 187', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'Base Electronica y Electromecanica', 'auto', 48, '1', 'Ciudad', 'Pueyrredon 597', '0261', '4270825', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9569112827803!2d-68.8590806865082!3d-32.89930748357318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a767181f0f%3A0x6c40d35e7aedd675!2sPueyrred%C3%B3n+597%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485911435" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, 'https://maps.google.com/maps/place?q=Pueyrred%C3%B3n+597,+Mendoza,+Mendoza,+Argentina&ftid=0x967e09a767181f0f:0x6c40d35e7aedd675', 'CpQBigAAAAKN1ms9nI3q_tYRNnKmQdKEioDHti8CrKmkuKsHqSvrkSko26EvPV804vEX-UbgeSGk3HAFdqC9le_FQg9GekwctxVXbpwqHOgGRZJKDGQ8vN7AVr8tIq0l5kXFHWFW5IjwPOFjEJ82texqPnPyewJh0X_9LvZbR8LH_J0ljcIMgVulZ2THcca0Tauotqf0DBIQ3wGs9fvANbLnoB4E1MjW9BoU2ZyyWAx2g-8Md3zwlvoQpGNc1T4', 'EixQdWV5cnJlZMOzbiA1OTcsIE1lbmRvemEsIE1lbmRvemEsIEFyZ2VudGluYQ', 'PueyrredÃƒÂ³n 597', 'Mendoza', 'AR', 'Argentina', NULL, 'Mendoza', NULL, '597', 'PueyrredÃƒÂ³n', NULL, NULL, 'PueyrredÃƒÂ³n 597, Mendoza, Mendoza, Argentina', 'PLACES', '-32.899354,-68.859626', '-68.85962649999999', '-32.8993538', NULL),
(92, 'Velasco', 'auto', 48, '1', 'Godoy Cruz', 'Amengual 1435', '0261', '4286659', 'palenkevelasco@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6471459130075!2d-68.86158581301635!3d-32.90749633868339!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f9df0b657%3A0x6dc37c1222f79990!2sAmengual+1435%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486070965" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Amengual 1435', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'The Doctor', 'moto', 48, '1', 'Godoy Cruz', 'Paso de los andes 1799', '0261', '156099539', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1674.827470703462!2d-68.86041471961042!3d-32.90729028176385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x1286036348e5999a!2sPaso+de+Los+Andes+1799%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486322470" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Paso de los andes 1799', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'Frenos Morales', 'auto', 48, '1', 'Godoy Cruz', 'Laprida 1322', '0261', '4285245', 'frenosmorales@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.7817975923065!2d-68.85990953374517!3d-32.909704748485424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099e37c89c57%3A0xe2c90d172214f6dd!2sLaprida+1322%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486490314" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Laprida 1322', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'Tapiceria Caruana', 'auto', 48, '1', 'Ciudad', 'Av San MartÃƒÂ­n 2403', '0261', '4307898', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.8992498776665!2d-68.83516180000001!3d-32.874385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e750a78035%3A0x559fc6b3e2f3fea!2sAv+San+Mart%C3%ADn+2403%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559166024" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av San MartÃƒÂ­n 2403', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Repuestos de Todo', 'auto', 48, '1', 'Godoy Cruz', 'Pellegrini 1512', '0261', '4274779', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.603606018405!2d-68.8627149!3d-32.9086472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f16d0eebf%3A0x6fc18ff1c98b28e3!2sPellegrini+1512%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559303714" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pellegrini 1512', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Mega Baires Autopartes', 'auto', 48, '1', 'Godoy Cruz', 'Pellegrini 1498', '0261', '4283488', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6065910412694!2d-68.8614833!3d-32.90856829999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099fa7e93f7b%3A0x97a3b7d780011092!2sPellegrini+1498%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559477838" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pellegrini 1498', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Guillermo Ficiara', 'auto', 48, '1', 'Godoy Cruz', 'Alvarez Thomas 150', '0261', '4229166 - 156623944', 'seoficiara@hotmail.com - gdficiaramecanica@hotmail.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.7986908638845!2d-68.84117011614683!3d-32.92991656132184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc1aad763f%3A0x46232b79353d373d!2sAlvarez+Thomas+150%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559886046" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Alvarez Thomas 150', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Repuestos de Motos Lopez Cabezas', 'moto', 48, '1', 'Godoy Cruz', 'Paso de los Andes 1751', '0261', '4271090', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6699.342425745774!2d-68.86035034662103!3d-32.90686017727615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x585a8d8013a8030a!2sPaso+de+Los+Andes+1751%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417560071030" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Paso de los Andes 1751', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Salinas Eduardo e Hijo', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Palencia 271', '0263', '4425622', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Palencia 271', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Dario Sosa', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Saavedra 218', '0263', '4420859', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3342.9906991202433!2d-68.46266039999999!3d-33.0830293!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43102efe5603%3A0xea8a8af97b15fe03!2sSaavedra+218%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417560619418" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Saavedra 218', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Sca - Este SA Mecanica Diesel', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Ruta 7 S/N', '0263', '4420507', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ruta 7 S/N', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'Italdiesel - De Vecchi Juan Mario', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Av L N Alem 800', '0263', '4430921', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7064352716473!2d-68.4609862734783!3d-33.08736881699757!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43112880d3c7%3A0xbbbfb6564729049!2sAlem+800%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568289160" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av L N Alem 800', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Mecanica Ledesma', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Berutti 606 (esquina tropero sosa)        ', '0263', '4431327', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1671.582043258495!2d-68.45978298387148!3d-33.0784674895832!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e430eeb370595%3A0x53a50c6d3df664b3!2sBerutti+606%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568501844" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Berutti 606 (esquina tropero sosa)        ', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Mecanica Valero', 'auto', 48, '1', 'San MartÃƒÂ­n', 'A Alvarez 219', '0263', '4433295', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6685.338137261838!2d-68.4707261!3d-33.09148989999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43192ddabb4b%3A0x5fbf871ff82d2a4e!2sAlvarez+A.+219%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568753926" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'A Alvarez 219', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Escapes Daniel ', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Italia 517', '0263', '4432128', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3344.167807276707!2d-68.5601771!3d-33.05204869999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e698f4e37a291%3A0x92f35ee63f1d3150!2sItalia%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417569051877" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Italia 517', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Taller Mecanico De Hugo Gonzalez', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Las Heras 230 (Palmira)', '0263', '4463565', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.124586252907!2d-68.55551009999999!3d-33.0531867!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e698e9a604f59%3A0xf9752028b4e27f2!2sLas+Heras%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417569235016" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Las Heras 230 (Palmira)', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Baterias Herbo', 'auto', 48, '1', 'Ciudad', 'P B Palacios 60', '0261', '4243981', NULL, 'www.herbo.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.7891004467137!2d-68.83778889999999!3d-32.9037439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b1f95c8a3%3A0x3a05daa7af5daef6!2sPalacios+60%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418156910653" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'P B Palacios 60', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Magnex GNC', 'auto', 48, '1', 'Ciudad', 'Peru 2165', '0261', '4238595', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.7881603456112!2d-68.84526720000001!3d-32.87732391045002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e35d0eaeaf%3A0x17e099c7e6527c46!2sAv+Per%C3%BA+2165%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157113783" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Peru 2165', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Rodriguez Y Cia', 'auto', 48, '1', 'Ciudad', 'Peru 2153', '0261', '4234629', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.783511202121!2d-68.8453026!3d-32.877446899999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e35d0eaeaf%3A0xdba25e3cd204a22!2sAv+Per%C3%BA+2153%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157450366" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Peru 2153', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Goldstein', 'auto', 54, '1', 'Ciudad', 'Montecaseros 1445', '0261', '4253400', NULL, 'www.vwgoldstein.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4134648392414!2d-68.83273817752384!3d-32.88723488501414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0923b168f4e3%3A0xca0d9e3b60a63a3f!2sMontecaseros+1445%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157951941" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Montecaseros 1445', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Meschini', 'auto', 55, '1', 'Godoy Cruz', 'Rodriguez PeÃƒÂ±a 2643', '0261', ' 4133600 - 413620', NULL, 'www.redmeschini.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.815485442679!2d-68.8093838!3d-32.92947289999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c07e0793b65%3A0x17359e37439535a6!2sCarril+Rodr%C3%ADguez+Pena%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418158451013" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Rodriguez PeÃƒÂ±a 2643', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Cervantes Gas', 'auto', 48, '1', 'Godoy Cruz', 'Cervantes 1317', '0261', '4050000 - 4050002 ', NULL, 'www.cervantesgas.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4957810607084!2d-68.84088350000002!3d-32.93791759999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bc36026f883%3A0x1e6066291acfb138!2sCervantes+1317%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159170387" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cervantes 1317', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Herrera GNC', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 2506', '0261', '4502248', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.1119516730384!2d-68.80148497071093!3d-32.89224791751795!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec8edcd928f%3A0xc67b50f4f6deacfa!2sGodoy+Cruz+2506%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159289974" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 2506', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Innova GNC', 'auto', 48, '1', 'Godoy Cruz', 'Paso de Los Andes 830', '0261', '4284668', 'novagnc@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.345348750258!2d-68.85993610555727!3d-32.9154728098611!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099d6a038941%3A0x740e4fc61e5c5fd7!2sPaso+de+Los+Andes+830%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159507056" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Paso de Los Andes 830', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Ripal GNC', 'auto', 48, '1', 'Lujan de Cuyo', 'Av San Martin 6264     ', '0261', '4962037', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3346.9183354152324!2d-68.8588604!3d-32.97955629999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0afd6306629f%3A0x1c08ae7565743a54!2sSan+Mart%C3%ADn%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418160903862" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av San Martin 6264     ', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Delta GNC', 'auto', 48, '1', 'San Rafael', 'Cnel L Barcala 864', '0260', '4429189', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.325821259379!2d-68.31845290000001!3d-34.6212057!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81da1807ee7%3A0x22e7ba6282436981!2sBarcala+864%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418161104207" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cnel L Barcala 864', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Chapla GNC', 'auto', 48, '1', 'Rivadavia', 'San Isidro Norte 3610', '0263', '4444337', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3339.11653382429!2d-68.45929489339294!3d-33.18481337042449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e5c3c42bce50d%3A0x21ec34f8c0aaeb68!2sSan+Isidro%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418161562905" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Isidro Norte 3610', 'Mendoza', NULL, NULL, NULL, 'Rivadavia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'JM Group', 'auto', 48, '1', 'Maipu', 'Bordin 577', '0261', '4933330', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3347.9366546042756!2d-68.79096759999999!3d-32.952681799999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c66c5820837%3A0x8b8cb3cb30b938a4!2zQm9yZMOtbiwgTWFpcMO6LCBNZW5kb3ph!5e0!3m2!1ses!2sar!4v1418161712841" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Bordin 577', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'GUAY GAS', 'auto', 48, '1', 'Guaymallen', 'N. Avellaneda 2680', '0261', '4262208', 'guay_gas@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6701.250971508959!2d-68.7823939!3d-32.8816271!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ee62b80f9e3%3A0xd0953a6ab1258ee7!2sAvellaneda+2680%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418162256325" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'N. Avellaneda 2680', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Stylo', 'auto', 48, '1', 'Godoy Cruz', ' Democracia 74        ', '0261', '4247216', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.2702309413344!2d-68.8453649!3d-32.917457899999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0964d8597a29%3A0xe0f1b1d1ec589edf!2sDemocracia+74%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418162594958" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, ' Democracia 74        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Escapes Nahuel', 'auto', 48, '1', 'Las Heras', 'Coronel Diaz 530        ', '0261', '4302925', 'escapesnahuel@hotmail.com', 'www.escapesnahuel.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.2000069866785!2d-68.82694710000001!3d-32.866427200000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c4ef233183%3A0x1e1eb489e0851cc3!2sCnel.+D%C3%ADaz+530%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418163407189" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Coronel Diaz 530        ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Manduca - Chiconi', 'auto', 48, '1', 'Godoy Cruz', 'Alvarez Thomas 141', '0261', '4226751 - 4226123', 'carbugas@infovia.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6697.7261175728045!2d-68.84558035665283!3d-32.92821612920409!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc1aad763f%3A0x5587b934d0619062!2sAlvarez+Thomas+141%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418177551222" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Alvarez Thomas 141', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Yacopini Motors', 'auto', 56, '1', 'Godoy Cruz', 'Avenida San Martin Sur 600', '0261', '4222848 - 08106661033 ', NULL, 'www.yacopinigm.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.7687005631396!2d-68.8500124!3d-32.9307088!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd6e3e37437%3A0x3c836a85fd5c8d89!2sAv+San+Mart%C3%ADn+Sur+600%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418177979672" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Avenida San Martin Sur 600', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Ficamen', 'auto', 57, '1', 'Maipu', 'Rodriguez PeÃƒÂ±a 1982        ', '0261', '4933880 - 4978232', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4733509052853!2d-68.7710968!3d-32.938509999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c46292d1ad7%3A0x937bc2d7c4d30eb7!2sCarril+Rodr%C3%ADguez+Pena%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418178588300" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Rodriguez PeÃƒÂ±a 1982        ', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Taller Mariotti', 'auto', 48, '1', 'Godoy Cruz', 'Juan Gualberto Godoy 170        ', '0261', '4225439', 'info@taller-mariotti.com.ar', 'www.taller-mariotti.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.6107697417265!2d-68.8439969!3d-32.93488049999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdad969bcf7%3A0x917961f1d6d24709!2sGodoy+170%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418179255864" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Juan Gualberto Godoy 170        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Casa Manino', 'moto', 48, '1', 'Godoy Cruz', 'Cervantes 760', '0261', '4525170', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.6458880466575!2d-68.8400186!3d-32.933952899999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc97ee3833%3A0xad09cd16753a325e!2sCervantes+760%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418330194183" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cervantes 760', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Daniel Girala', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Lavalle 951', '0263', '4420454 - 4420147', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3343.4577149079328!2d-68.47198824550786!3d-33.070740874908324!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43abc41ec099%3A0x474695819b79310e!2sLavalle+951%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418330837662" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Lavalle 951', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Acumuladores Cortese', 'auto', 48, '1', 'Maipu', 'Sarmiento 813', '0261', '4978993', 'acumuladorescortese@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.3010993132507!2d-68.8190905!3d-32.943059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0b8ce862ea2f%3A0x68cd7d3a5d36cfbe!2sSarmiento%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331094322" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Sarmiento 813', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Baterias Garcia', 'auto', 48, '1', 'Guaymallen', 'Coronel Moldes 1432 ', '0261', '4312730', 'bateriasgarcia@speedy.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.387324400858!2d-68.8240136!3d-32.9143635!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e095a43178345%3A0x8203d5dfbd63108b!2sMoldes+1432%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331298568" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, 'https://maps.google.com/maps/place?q=Moldes+1432,+Mendoza,+Argentina&ftid=0x967e095a43178345:0x8203d5dfbd63108b', 'CoQBfAAAAKamcH9mGwWx6DnDCDNnuYDNis31Iw0t1McTIIYdkJ-dZVYJ6Oigo-lEd4yCa0x2iTaLwrbA4CkBCKBr4bHuv8T4zhOOwkBEXFBnP3nIsde0n_Ph9eQvsYf5fgdarnImAcx0bdsXsfx0SwPqto215hlbs_E2H2NlZfqWkQB0ixKcEhCSD45QP7gs27fv5kiBVR3GGhQFQc7XXuLGO6hcnG2Ozki3HQkHRQ', 'Eh9Nb2xkZXMgMTQzMiwgTWVuZG96YSwgQXJnZW50aW5h', 'Moldes 1432', 'Mendoza', 'AR', 'Argentina', NULL, 'GuaymallÃƒÂ©n', NULL, '1432', 'Moldes', NULL, NULL, 'Moldes 1432, Mendoza, Argentina', 'PLACES', '-32.914333,-68.823917', '-68.8239173', '-32.914333', NULL),
(133, 'Paulucci Motos', 'moto', 48, '1', 'Guaymallen', 'Godoy cruz 223', '0261', '155276254', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.356461865168!2d-68.82785044788513!3d-32.888742423679524!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924b8ecccd9%3A0x2d9ea402473c6910!2sGodoy+Cruz+223%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331645920" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy cruz 223', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'El Emporio del Volkswagen', 'auto', 54, '1', 'Guaymallen', 'Godoy Cruz 336', '0261', '4455224', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3475086804224!2d-68.8263289!3d-32.8889792!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0x58a1ea1fbf396327!2sGodoy+Cruz+336%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331794186" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 336', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Panasitti', 'auto', 48, '1', 'Godoy Cruz', 'Carril Sarmiento 1280        ', '0261', '4524040', 'tallerespanasitti2000@yahoo.com.ar ', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.4426621527086!2d-68.8327561812296!3d-32.939320501449515!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bebb58e7565%3A0x1cffd25e57c76d6c!2sSarmiento+1280%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418342032879" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Carril Sarmiento 1280        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Carrocerias Marri Colonnese', 'auto', 48, '1', 'Godoy Cruz', 'Independencia 739', '0261', '5462588 - 4521079', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4909913968736!2d-68.82813069999999!3d-32.938044099999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0beea9e8fad1%3A0xdb89d3ce246e055a!2sIndependencia+739%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418342546492" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Independencia 739', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Taller Fraile', 'auto', 48, '1', 'Lavalle', 'Boulevard belgrano 537                                                                                ', '0261', '4261771', NULL, NULL, '                                                                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Boulevard belgrano 537                                                                                ', 'Mendoza', NULL, NULL, NULL, 'Lavalle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Lavajet', 'auto', 48, '1', 'Ciudad', 'Avda. Juan B. Justo 66                        ', '0261', '4294488', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.546775944223!2d-68.85080661058969!3d-32.88370901111999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09028a91f113%3A0x5bc47d849c1bcab!2sAv+Juan+B.+Justo+66%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418682780593" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Avda. Juan B. Justo 66                        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Pueyrredon Motos', 'moto', 48, '1', 'Godoy Cruz', 'Carola lorenzini 50', '0261', '4222107 - 4222108', 'info@pueyrredonmotos.com', 'www.pueyrredonmotos.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.100033711028!2d-68.8483261!3d-32.921955199999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097cebaae3d5%3A0x61bd6be971581b7e!2sLorenzini+C.+50%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418683405753" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Carola lorenzini 50', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'NR Motos', 'moto', 48, '1', 'Lujan de Cuyo', 'Patricios 338', '0261', '4986161', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.7124248451514!2d-68.88282535078734!3d-33.03770606201612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e756aa3e7a9ad%3A0x85f4e8adf0ce6c8e!2sPatricios+338%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418683671929" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Patricios 338', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'SURPRO', 'auto', 48, '1', 'Malargue', 'Av. San Martin  571                                                ', '0260', '4472340', 'carpro.grupomsm@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12997.19859887117!2d-69.58087160000001!3d-35.47212925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sav.+san+martin%2C+malargue!5e0!3m2!1ses!2sar!4v1418684266313" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. San Martin  571                                                ', 'Mendoza', NULL, NULL, NULL, 'Malargue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Navarrete Lubricentro y Accesorios', 'auto', 48, '1', 'Malargue', 'Av. 4Ã‚Â° DivisiÃƒÂ³n y Adolfo Puebla', '0260', '4471692 - 4472254', 'navarrete1989@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. 4Ã‚Â° DivisiÃƒÂ³n y Adolfo Puebla', 'Mendoza', NULL, NULL, NULL, 'Malargue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Ninja Motos', 'moto', 48, '1', 'Rivadavia', 'Pbro Olguin 85', '0263', '4446033', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pbro Olguin 85', 'Mendoza', NULL, NULL, NULL, 'Rivadavia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Modica Motos', 'moto', 48, '1', 'Guaymallen', 'Banderas de los Andes 747        ', '0261', '4319246', 'info@modicamotos.com', 'www.modicamotos.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.1468360615695!2d-68.8229482!3d-32.8942858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093a030ae921%3A0xc18328eab326156a!2sAv+Bandera+de+Los+Andes+747%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418685408141" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Banderas de los Andes 747        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Lavalle Motos', 'moto', 48, '1', 'Guaymallen', 'Adolfo Calle 795', '0261', '4317933', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.931356872372!2d-68.8257766!3d-32.8999831!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09387e060135%3A0x82d7321821000321!2sAdolfo+Calle+795%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418685884756" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Adolfo Calle 795', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'Rodanova Llantas', 'auto', 48, '1', 'Guaymallen', 'Higueritas y Bandera de los Andes ', '0261', '4211482', 'roda_nova@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Higueritas y Bandera de los Andes ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Panamericana Sur', 'auto', 48, '1', 'Godoy Cruz', 'Avenida San Martin Sur 1823                ', '0261', '4401111 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.257641170094!2d-68.85161370000002!3d-32.9442066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bc96fc19bcb%3A0x3c34b63bc9747a6e!2sAv+San+Mart%C3%ADn+Sur+1823%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418687507419" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Avenida San Martin Sur 1823                ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Paul Llaver Neumaticos', 'auto', 48, '1', 'Lujan de Cuyo', 'Balcarce 102        ', '0261', '4988783', 'info@paulllaver.com.ar', 'www.paulllaver.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1672.3458503256174!2d-68.87945917368012!3d-33.03825193980845!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e7515892eb59b%3A0x9347c4c118b09e31!2sBalcarce+102%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418687846089" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Balcarce 102        ', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Verdini Sport', 'auto', 48, '1', 'Godoy Cruz', 'San martin 333        ', '0261', '4242414 - 4242464', NULL, 'www.verdinisport.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.1510575959537!2d-68.8473729!3d-32.9206044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097ca889d409%3A0xbc32a33b9bce67f0!2sAv+San+Mart%C3%ADn+333%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688221289" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San martin 333        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'Motos Parra', 'moto', 48, '1', 'Ciudad', 'Av. J. V. Zapata 344', '0261', '4290340', 'motosparramendoza@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.090860074109!2d-68.83924518521118!3d-32.89576589717179!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091611b48643%3A0xcf14d1071d923275!2sAv+Zapata+344%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688592105" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. J. V. Zapata 344', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Motos Quezada', 'moto', 48, '1', 'San MartÃƒÂ­n', 'Las Heras 230        ', '0263', '4429543', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13371.785060199609!2d-68.46636991185608!3d-33.084198267574436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e431cf698e74b%3A0xd56b828e7222d82a!2sLas+Heras+230%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688853891" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Las Heras 230        ', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'MB', 'moto', 48, '1', 'Guaymallen', 'A. Calle 380', '0261', '4311137', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9350371611145!2d-68.830612!3d-32.8998858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093f6d52a6b1%3A0xad4a3023650d6c9d!2sAdolfo+Calle+380%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418689117716" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'A. Calle 380', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Off Road Argentina', 'moto', 58, '1', 'Godoy Cruz', 'Peltier 40                ', '0261', '4400777', NULL, 'www.husabergargentina.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.14935729615!2d-68.8478855!3d-32.94706589999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bb7fd9676c1%3A0xaf9e3d5dfb1cfe36!2sPeltier%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418689678509" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Peltier 40                ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'Irigoyen Centro de Servicio', 'auto', 48, '1', 'Ciudad', 'Hipolito irigoyen 410', '0261', '4240050 - 152030812', 'irigoyencentrodeservicios@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.80262478591!2d-68.84759704285275!3d-32.903386376605766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e090d391c4ca3%3A0x205e4a1cd522e6b9!2sHip%C3%B3lito+Yrigoyen+410%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418758933770" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Hipolito irigoyen 410', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'Foreste GNC', 'auto', 48, '1', 'Godoy Cruz', 'San Martin Sur 1009', '0261', '4221278', 'gncforeste@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.6147071546584!2d-68.850438!3d-32.93477649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd1a56c0047%3A0xa36e63aea829f0c6!2sAv+San+Mart%C3%ADn+Sur+1009%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418759274962" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Martin Sur 1009', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'Mediterraneo', 'auto', 59, '1', 'Godoy Cruz', 'Av. San Martin Sur 901        ', '0261', ' 5245290 ', NULL, 'www.mediterraneo.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.6453693803633!2d-68.8502361!3d-32.933966600000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd1a86e7431%3A0xa95b398beb0d1858!2sAv+San+Mart%C3%ADn+Sur+901%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418759764186" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. San Martin Sur 901        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'Taller Appiolaza', 'auto', 59, '1', 'Guaymallen', 'San juan de Dios 353', '0261', '4320616', NULL, 'www.tallerappiolaza.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9172899859773!2d-68.8339858!3d-32.90035499999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093fc2caae1f%3A0xc987ec8970fcd620!2sSan+Juan+de+Dios+353%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418760370125" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San juan de Dios 353', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'Auto Select', 'auto', 59, '1', 'Rivadavia', ' VicuÃƒÂ±a prado 136', '02623', '4442906', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6677.382942639761!2d-68.46597799999999!3d-33.195964000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sVicu%C3%B1a+prado+136%2C+Rivadavia%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418761202184" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, ' VicuÃƒÂ±a prado 136', 'Mendoza', NULL, NULL, NULL, 'Rivadavia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'Rubio y Fuentes', 'auto', 59, '1', 'San Rafael', 'Av. Mitre 1540', '0260', '4430244', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2240374666717!2d-68.3073055!3d-34.6237783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a82233d9bba7%3A0xf40ac80115cc91e2!2sAv+Mitre+1540%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418761983861" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. Mitre 1540', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'High Tech Moto', 'moto', 48, '1', 'San Rafael', 'Barcala 1420', '0261 ', '153829650', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.214830466607!2d-68.31013109999999!3d-34.624011!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a8220e96e301%3A0xeca59921bea5d829!2sBarcala+1420%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762173502" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Barcala 1420', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dlg_taller` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`, `website`, `url`, `reference`, `place_id`, `direction`, `administrative_area_level_1`, `country_short`, `country`, `sublocality`, `locality`, `postal_code`, `street_number`, `route`, `viewport`, `bounds`, `formatted_address`, `location_type`, `location`, `lng`, `lat`, `point_of_interest`) VALUES
(162, 'Taller de Juan Redondo', 'auto', 48, '1', 'Ciudad', 'Granaderos 1742', '0261', '4297886 - 4639573', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.6776638720803!2d-68.8553116!3d-32.8802469!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08fee1265869%3A0xc740580ea7c54a93!2sGranaderos+1742%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762404177" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Granaderos 1742', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Sexta Frenos', 'auto', 48, '1', 'Ciudad', 'Rodriguez 2980', '0261', '4233481', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.234745408377!2d-68.8477234595305!3d-32.86861380948893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08f1c3a4e195%3A0xe3bd4d4df0f9f568!2sRodr%C3%ADguez+2980%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762560315" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Rodriguez 2980', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'Frenos Revillard', 'auto', 48, '1', 'Ciudad', 'Olascoaga 445', '0261', '4234055', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1073077387546!2d-68.8554996!3d-32.895331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e090887dd5eb7%3A0xf7146ec88fe02f43!2sOlascoaga+445%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762780876" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Olascoaga 445', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'Orofino Radiadores', 'auto', 48, '1', 'Guaymallen', 'O Brien 360', '0261', '4456735', 'radiadoresorofino@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3890040073484!2d-68.82623439999999!3d-32.887881799999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924e437ba79%3A0x15e1d004ca853123!2sO+Brien+360%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763022859" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'O Brien 360', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'Puliafito Autopartes', 'auto', 48, '1', 'Guaymallen', '25 de mayo        ', '0261', '4310100', 'info@puliafitoautopartes.com.ar', 'www.puliafitoautopartes.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0185653920553!2d-68.83051569999999!3d-32.8976774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093eee4f9639%3A0xf0f9060d0fbf2b43!2s25+de+Mayo+380%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763279351" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '25 de mayo        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Felipetta Radiadores ', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 1421', '0261', '4312344', 'felipettasrl@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3266660222594!2d-68.8147524!3d-32.8895304!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093250b518e5%3A0xb91beaf96cfb635a!2sGodoy+Cruz+1421%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763465570" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 1421', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Cerrajeria Maranatha', 'auto', 48, '1', 'Las Heras', 'Manuel A Saez 1470        ', '0261', '155634580', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3351.636684706081!2d-68.82278839999995!3d-32.854870000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08b78e66e003%3A0xcc48648564b00ce6!2sManuel+S%C3%A1ez+1470%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763726744" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Manuel A Saez 1470        ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Taller de Pedro y Sebastian Lucentini', 'auto', 48, '1', 'Guaymallen', 'Allayme 108', '0261', '4321580 - 156433955', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0627859851406!2d-68.8150026!3d-32.8965082!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0935b20eddff%3A0xebcf84a8daa16c4a!2sAllayme+108%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418774764494" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Allayme 108', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Nico Shopping ', 'auto', 48, '1', 'Guaymallen', 'Pascual Toso 54', '0261', '4459000', 'info@nicoshopping.com ', 'www.nicoshopping.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.300101771388!2d-68.82979130000004!3d-32.890232899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093cace1d2b9%3A0x939a94a07f05695c!2sTosso+13%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418776805532" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pascual Toso 54', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'SR Repuestos', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 310', '0261', '4455951 - 4456760', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3472061767166!2d-68.8261143!3d-32.888987199999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0x8b9d51675891987!2sGodoy+Cruz+310%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418847435749" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 310', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Derwagen Repuestos Volkswagen ', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 267                ', '0261', '4457800', 'derwagen@ymail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.349002291516!2d-68.8272002!3d-32.88893970000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924b8ecccd9%3A0x4dae6a54a024af55!2sGodoy+Cruz+267%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418848131957" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 267                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'La Casa de la Cerradura', 'auto', 48, '1', 'Ciudad', 'Lavalle 565        ', '0261', '4254777', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.353256238444!2d-68.83078080000001!3d-32.8888272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092317216673%3A0x415065f68153fb89!2sLavalle+555%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418848864916" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Lavalle 565        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'LM Parabrisas', 'auto', 48, '1', 'Guaymallen', 'Saavedra 370                                                                ', '0261', '4324679 - 4241895', 'info@lmparabrisas.com.ar', 'www.lmparabrisas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.244687690207!2d-68.8264531!3d-32.89169830000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093b025f531f%3A0x35c67860e446d083!2sSaavedra+370%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418849889929" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Saavedra 370                                                                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'Rivadavia Accesorios', 'auto', 48, '1', 'Lavalle', 'San Isidro 1299        ', '0263', '4443195', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3338.658423567399!2d-68.46597609999999!3d-33.1968308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e5c28bce3565b%3A0x86fb2989b0c436f7!2sSan+Isidro%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850046247" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Isidro 1299        ', 'Mendoza', NULL, NULL, NULL, 'Lavalle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Cerrajeria Key Li', 'auto', 48, '1', 'Godoy Cruz', 'Paso de los andes 1750 \r\n        ', '0261', '4287319', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.8346837018391!2d-68.86107167857791!3d-32.906908958908495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x1dce95f55253d276!2sPaso+de+Los+Andes+1750%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850262768" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Paso de los andes 1750 \r\n        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'Cerrajeria Taboada', 'auto', 48, '1', 'Lujan de Cuyo', 'Taboada 349        ', '0261', '4981072', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1672.2988140135537!2d-68.8826874853285!3d-33.04072972365851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e756acab59eb3%3A0xf4197559a4366a5!2sTaboada+349%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850452791" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Taboada 349        ', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Cerrajeria Luis Jopia', 'auto', 48, '1', 'Ciudad', 'Sobremonte 410', '0261', '4257943', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0896751198306!2d-68.85780013254086!3d-32.89579722867289!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09080236f2d5%3A0x78f1524a151a8702!2sSobremonte+410%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850900286" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Sobremonte 410', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Cerrajeria Y Pesca San Pedro', 'auto', 48, '1', 'Maipu', 'J D Peron 120\r\n', '0261', '4973982', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3346.8016920280875!2d-68.7883949!3d-32.982633400000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0cbf70db0f4f%3A0x47ef58d2601e2d7e!2sPres.+Juan+Domingo+Per%C3%B3n+120%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418851223730" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J D Peron 120\r\n', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'Cerrajeria Total', 'auto', 48, '1', 'Ciudad', 'Videla Correa 521 ', '0261', '4306212', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.028764409364!2d-68.84098552327706!3d-32.870958355554016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08ef584fa961%3A0xcb3b4c776f0b9201!2sVidela+Correas+521%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418852428627" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Videla Correa 521 ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'Alameda ', 'auto', 48, '1', 'Ciudad', 'Maipu 23', '0261', '4202373', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.8274770745165!2d-68.835475!3d-32.876283799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e0a2f7f825%3A0x9c4b0a0ba5aa6e72!2sMaip%C3%BA+23%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418852792500" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Maipu 23', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Gustavo Alonso Mecanica Integral', 'auto', 48, '1', 'Godoy Cruz', 'Jose Ingenieros 169 ', '0261', '4392568', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.447107471927!2d-68.84996769999998!3d-32.93920310000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bce54c6e9c3%3A0xbab9bb50cf779bf3!2sIngenieros+169%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853101490" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Jose Ingenieros 169 ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'Alta Gamma', 'auto', 48, '1', 'Godoy Cruz', '', '0261', '4220589 - 4220578', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.639137555787!2d-68.84224396745911!3d-32.93413120640036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdb0cfb62ad%3A0x961e289e41a05f52!2sFigueroa+Alcorta+884%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853288218" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'Guillermo J. Alvarez', 'auto', 48, '1', 'Godoy Cruz', 'Renato della Santa 2145        ', '0261', '154168551', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.8132231716995!2d-68.86252790000005!3d-32.903106199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a116d03c81%3A0x93b27a4ffe3bcebd!2sDella+Sta+Renato+2145%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853511151" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Renato della Santa 2145        ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'AMF Moto Service', 'moto', 48, '1', 'Godoy Cruz', 'Beltran Sur esquina lavalle ', '0261', '4221694 ', 'amfmotoservice@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.983419686515!2d-68.84968269999999!3d-32.925036299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097d97099a95%3A0x87da6e1715570de5!2sLavalle+902%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853821925" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Beltran Sur esquina lavalle ', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'Ariel Musri Mecanica', 'auto', 59, '1', 'Guaymallen', 'Guillermo Molina 78                ', '0261', '153840185 - 156828147 ', 'arielmusri1987@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.7345173251388!2d-68.8358945!3d-32.9051868!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a66bf2c09%3A0xda0dd94ca112ef18!2sMolina+J.+78%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418854193721" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Guillermo Molina 78                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'Deliberto', 'auto', 48, '1', 'Guaymallen', 'Pueyrredon 416        ', '0261', '4314753', ' flaviodeliberto@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.6228893810803!2d-68.83494350000001!3d-32.908137499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969e116847b%3A0xd09b0fc1eccaaa28!2sSan+Juan+de+Dios+1402%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418854933109" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Pueyrredon 416        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'Gruas Gama', 'auto', 48, '1', 'Ciudad', 'Av. EspaÃƒÂ±a 3353        ', '0261', '4307018 - 155165304', 'gruas.gama@hotmail.com', 'www.transportes-gama.km6.net', '        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. EspaÃƒÂ±a 3353        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'Remol Car', 'auto', 48, '1', 'Maipu', 'Matienzo 81        ', '0261', '4975526 - 154548819', 'patriciorinordelli@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.012254168164!2d-68.78739949999999!3d-32.977078500000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c94d8758065%3A0x9fc8c466a134f603!2sMatienzo+81%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418856371014" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Matienzo 81        ', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'Auxilio Mecanico Sema', 'auto', 48, '1', 'San Rafael', 'Reconquista 165', '0260', '4422635', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.1849063532127!2d-68.31087409999999!3d-34.624767299999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a818a330a9c1%3A0xafbdb4576fdcefe0!2sReconquista+165%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418950870029" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Reconquista 165', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'Auxilio Mecanico San Rafael', 'auto', 48, '1', 'San Rafael', 'Lugones 290', '0260', '4421986 - 154612041', 'remolquesanrafael@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6566.92952092198!2d-68.34154861429442!3d-34.61769372160115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96790804297ca985%3A0x387b7fc7b187edcb!2sLugones+290%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951066081" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Lugones 290', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'Gruas Olguin Humberto', 'auto', 48, '1', 'San MartÃƒÂ­n', 'Gutierrez 930 \r\n', '0263', '4431035', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3342.761913946349!2d-68.46215911349184!3d-33.08904776907987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43170733380f%3A0x9834a716554bdde6!2sGuti%C3%A9rrez+930%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951664690" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gutierrez 930 \r\n', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'Auxilio San Javier', 'auto', 48, '1', 'San MartÃƒÂ­n', 'D French 342', '0263', '154410567', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1671.5767378465594!2d-68.46532522089198!3d-33.078746675643025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e430f58db9831%3A0x4c6bc0edbfaf2558!2sFrench+342%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951818959" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'D French 342', 'Mendoza', NULL, NULL, NULL, 'San MartÃƒÂ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'Asistencias Mendoza', 'auto', 48, '1', 'Guaymallen', 'Catamarca 1731', '0261', '154549509', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6701.429045004409!2d-68.79614892595225!3d-32.87927189551345!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0edb9a1488e3%3A0x3afb958960abc471!2sCatamarca+1731%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951989331" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Catamarca 1731', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'Servicios Del Valle De Daniel Zani', 'auto', 48, '1', 'Tunuyan', 'J B Alberdi 116', '02622', '424706', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13297.260492911473!2d-69.01321409999998!3d-33.57116649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967c25d079a97753%3A0x3e4c6493ea8f5bc3!2sTunuy%C3%A1n%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418952097576" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J B Alberdi 116', 'Mendoza', NULL, NULL, NULL, 'Tunuyan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'Auxilio El Faro ', 'auto', 48, '1', 'Ciudad', 'Ituzaingo 3147', '0261', '4306774', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.171643428992!2d-68.82774290899468!3d-32.867177750805894!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c35bd6397d%3A0x779c74b6a0d87692!2sItuzaing%C3%B3+3147%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418953598441" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ituzaingo 3147', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Talleres Coco', 'auto', 48, '1', 'Ciudad', 'Paraguay 3185', '0261', '4306853', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1921126458733!2d-68.82551579999999!3d-32.8666361!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c521a3f859%3A0xd7bf357a5b4abfb1!2sParaguay+3185%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418953991963" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Paraguay 3185', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Taller de Frenos y Embragues Marini', 'auto', 48, '1', 'Ciudad', 'Videla Castillo 3131', '0261', '4304225', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1666687374372!2d-68.82751877486878!3d-32.86730938853303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c4bf979805%3A0x859fbd5cc835b7d8!2sVidela+Castillo+3131%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418954324174" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Videla Castillo 3131', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'Marini Camiones', 'auto', 48, '1', 'Godoy Cruz', 'Republica del Libano 965', '0261', '154547143', 'marinicamiones@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 4, 4, 4, NULL, NULL, NULL, NULL, 'Republica del Libano 965', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'Antonio Allegreti', 'auto', 48, '1', 'Maipu', 'Emilio Civit 478        ', '0261', '4814366 - 4810078 ', 'allegretti_bosch@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.176780730853!2d-68.8152522!3d-32.9727375!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0b7cbd73365f%3A0xd0779f5e039b2207!2sEmilio+Civit%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019139781" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Emilio Civit 478        ', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Dario Dalmaso Inyeccion	', 'auto', 48, '1', 'Lujan de Cuyo', '25 de Mayo 33', '0261', '4982893 - 155253030', 'dario.dalmaso@yahoo.com.ar', 'www.dalmasoinjection.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13379.933810270139!2d-68.87114320778183!3d-33.030566422481115!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e7539510480ef%3A0x727d952c091da249!2s25+de+Mayo+33%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019713235" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '25 de Mayo 33', 'Mendoza', NULL, NULL, NULL, 'Lujan de Cuyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'F.G.Servicios', 'auto', 48, '1', 'San Rafael', 'Ortiz de Rosas 733', '0260 ', '4424444', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.165759831954!2d-68.32280172883569!3d-34.625251200287025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a80351254c61%3A0x6c7f1aca124e821b!2sOrtiz+de+Rosas+733%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019991637" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ortiz de Rosas 733', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'Megamecanica ', 'auto', 48, '1', 'Guaymallen', 'Remedios De Escalada 1160        ', '0261', '4313996 - 4319114', 'info@megamecanica.com.ar', 'www.megamecanica.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.8446704816229!2d-68.83132165949031!3d-32.90638099066534!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09417de26d25%3A0xc8e607b8e5f59b3b!2sRemedios+de+Escalada+1160%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419020594507" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Remedios De Escalada 1160        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'Osamec', 'auto', 48, '1', 'Ciudad', 'Cnel. Ramirez 2664        ', '0261', '4307933', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.9663700694528!2d-68.82340659999998!3d-32.87260919999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08da04fdda47%3A0x200f94fee92fb92c!2sRam%C3%ADrez+2664%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419021252897" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Cnel. Ramirez 2664        ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'Ricardo Cabrera', 'auto', 48, '1', 'Maipu', 'Ozamis 74', '0261', ' 4973279', 'ricardofelixcabrera@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13386.919348640908!2d-68.78994087406616!3d-32.98452883389947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0cbecc89478f%3A0xebc4e26eab668176!2sOzamis+JA+74%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419021403681" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Ozamis 74', 'Mendoza', NULL, NULL, NULL, 'Maipu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'Salvador Sanchez Neumaticos	', 'auto', 48, '1', 'Ciudad', 'Coronel Plaza 72', '0261', '4259148 - 4204938', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.708560639638!2d-68.84388899999999!3d-32.879427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa0cdf83842d2012b!2sSindicato+Unido+De+Trabajadores+De+La+Educacion!5e0!3m2!1ses!2sar!4v1419021678244" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Coronel Plaza 72', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'Roly Motors', 'auto', 48, '1', 'General Alvear', 'Avenida Libertador Sur 485', '02625', '424230 - 434830 ', 'warnesservicios@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13077.222889054368!2d-67.68569179999999!3d-34.9740062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96781a11c548fc9d%3A0xfa291ac4eb8ae6ae!2sGral+Alvear%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419022194828" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Avenida Libertador Sur 485', 'Mendoza', NULL, NULL, NULL, 'General Alvear', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'El Vasquito', 'auto', 48, '1', 'Guaymallen', 'Bandera de Los Andes 2398', '0261', '4319702 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.081437763443!2d-68.80923148230899!3d-32.89601503275016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0eb61ad37de1%3A0x840d27443ad386b3!2sAv+Bandera+de+Los+Andes+2398%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419293850182" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Bandera de Los Andes 2398', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'Olcoz Motociclismo', 'moto', 48, '1', 'Ciudad', 'Av. ColÃƒÂ³n 480', '0261', '4236960', 'olcozmotos@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.1646257121897!2d-68.8467596!3d-32.8938154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09101ccdc461%3A0xe7f35f9cf2befb89!2sAv+Col%C3%B3n+480%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419540581450" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. ColÃƒÂ³n 480', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'ProLube ', 'auto', 48, '1', 'Las Heras', 'Burgos 595                                ', '0261', '4489168  - 4482367', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.943473764865!2d-68.84121139999999!3d-32.8467483!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0899873e11a7%3A0x6e75d8926946255d!2sBurgos+595%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419541063323" width="320" height="240" frameborder="0" style="border:0"></iframe>                                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Burgos 595                                ', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'GM Neumaticos', 'auto', 48, '1', 'Godoy Cruz', 'San Martin Sur 26', '0261', '4226778', 'ventas@gmneumaticos.com.ar', 'www.gmneumaticos.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.003511973358!2d-68.84944852774635!3d-32.92450545289485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097d6b138c29%3A0x9ac79d79141bca88!2sAv+San+Mart%C3%ADn+Sur+26%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419541424476" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Martin Sur 26', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'Neumaticos Medrano', 'auto', 48, '1', 'San Rafael', 'Av. Balloffet 730        ', '0260', '4430888', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.3725015427026!2d-68.35101656562652!3d-34.62002579316234!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679081b6010c0c9%3A0xa5b0e88ef7e19136!2sBalloffet+730%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419542123513" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. Balloffet 730        ', 'Mendoza', NULL, NULL, NULL, 'San Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'Moretto', 'auto', 48, '9', 'Palermo', 'Fitz Roy 2040', '011', '47734338', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.9005208287945!2d-58.433129!3d-34.581383599999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb591c1d7fb83%3A0x8d567ed9cd7edc2e!2sFitz+Roy+2040%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673439518" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Fitz Roy 2040', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'Talleres Gorriti', 'auto', 48, '9', 'Palermo', 'Gorriti 5917', '011', ' 47718931', NULL, 'www.talleres-gorriti.blogspot.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6569.834844661938!2d-58.44265209604797!3d-34.58095596529435!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5ed280d209f%3A0x33179d60e302598d!2sGorriti+5917%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673632298" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gorriti 5917', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'Rep Car Sh', 'auto', 48, '9', 'Palermo', 'C Arenal 2440 \r\n', '011', '47713667', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13140.947600385929!2d-58.436099634151326!3d-34.57287180202606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59573eaca03%3A0x3bc0e61df7a40fd4!2sConcepci%C3%B3n+Arenal+2440%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673761197" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'C Arenal 2440 \r\n', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'Servicio Para El Automotor Juanjo', 'auto', 48, '9', 'Palermo', 'Honduras 3992', '011', '48664200 - 48637269', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.3973142994387!2d-58.419450399999995!3d-34.59411339999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7dc234281d%3A0x392068e28529dd23!2sHonduras+3992%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420674012190" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Honduras 3992', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'Taller La Biela', 'auto', 48, '9', 'Palermo', 'J Alvarez 1825                ', '011', '48661037', 'consultas@tallerlabiela.com.ar', 'www.tallerlabiela.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.5338465124532!2d-58.4210611!3d-34.590659900000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7f19e6d059%3A0x1a540d1272b43a8d!2sJuli%C3%A1n+Alvarez+1825%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420674265835" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'J Alvarez 1825                ', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'Costanera Suspension ', 'auto', 48, '1', 'Ciudad', 'Moron 499', '0261', '4240126', 'info@costanerasuspension.com.ar ', 'www.costanerasuspension.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9460628398606!2d-68.83750169999999!3d-32.8995943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0915084ed517%3A0x7e2826a1769a2ef5!2sMor%C3%B3n+499%2C+Mendoza!5e0!3m2!1ses!2sar!4v1420750548239" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5, NULL, NULL, NULL, NULL, 'Moron 499', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'Renault Minuto', 'auto', 59, '1', 'Ciudad', 'Av. Vicente Zapata 246', '0261', '4232722', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0967825486714!2d-68.837241!3d-32.8956093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09166779669b%3A0x95fb129351e4caef!2sAv+Zapata+246%2C+Mendoza!5e0!3m2!1ses!2sar!4v1420751328361" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. Vicente Zapata 246', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'Taller El Salvador', 'auto', 48, '9', 'Palermo', 'El Salvador 5475', '011', '47715191', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.787772199048!2d-58.434336699999996!3d-34.5842362!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58e76d8a4e9%3A0xa937c267cfb39dbf!2sEl+Salvador+5475%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420763659869" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'El Salvador 5475', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'Talleres Estrella', 'auto', 48, '9', 'Palermo', 'Soler 4249', '011', '48629333', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.565140299691!2d-58.420821700000005!3d-34.58986829999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7f7268b035%3A0x72370c123696299f!2sSoler+4249%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420763938933" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Soler 4249', 'Ciudad de Buenos Aires', NULL, NULL, NULL, 'Palermo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'Taller Ghiotti', 'auto', 48, '1', 'Las Heras', 'Lisandro Moyano 99', '0261', '4300704  - 154150164', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.247063935239!2d-68.82082621877139!3d-32.86518195484625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08cf8b82995b%3A0x3b19c6e5350cf8cd!2sMoyano+99%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421192823546" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Lisandro Moyano 99', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'Taller Martinez', 'auto', 48, '1', 'Ciudad', 'Chenaut 3210', '0261', '4306826', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1750465084287!2d-68.8201006!3d-32.8670877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08d02c3957e5%3A0xf9e957ffb2e1dfe0!2sChenaut+3210%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421193764403" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Chenaut 3210', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'Taller de Radiadores Molsson E Hijos', 'auto', 48, '1', 'Las Heras', 'Guido Spano 47', '0261', '4302704', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3351.208713761832!2d-68.82159209999998!3d-32.86619679999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08cfebbcfd73%3A0x9914d16529b64946!2sGuido+Spano+47%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421194121739" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Guido Spano 47', 'Mendoza', NULL, NULL, NULL, 'Las Heras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'Box Autoexpress', 'auto', 48, '1', 'Godoy Cruz', 'Av. San Martin 1360', '0261', '4242188 - 4242797', 'info@boxautoexpress.com.ar', 'www.boxautoexpress.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.5304501648334!2d-68.84469469999999!3d-32.910580800000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096e48a3632f%3A0x679f048df64ba49e!2sAv+San+Mart%C3%ADn+1360%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421194534481" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Av. San Martin 1360', 'Mendoza', NULL, NULL, NULL, 'Godoy Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 'MH Parabrisas', 'auto', 48, '1', 'Ciudad', 'San Juan 510', '0261', '4290312', NULL, 'www.parabrisasmh.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.023708896139!2d-68.83879785211485!3d-32.897541406773065!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091416745b2f%3A0x8c5d8ba2acafb977!2sSan+Juan+510%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421715967301" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'San Juan 510', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'Mendoza Suspensiones', 'auto', 48, '1', 'Ciudad', 'Gobernador Gonzalez 621 ', '0261', '4373364', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.109300631476!2d-68.8270608!3d-32.8688274!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08db3740557f%3A0xf05590e1f783469d!2sGdor.+Gonz%C3%A1lez+621%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421716401435" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Gobernador Gonzalez 621 ', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'Escapes Polo', 'auto', 48, '1', 'Guaymallen', 'O V ANDRADE 259', '0261', '4321108', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.5512933129244!2d-68.8357319!3d-32.9100299!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969cc8512cd%3A0x38f819da79bbbe1!2sAndrade+259%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421800759689" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'O V ANDRADE 259', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 'Rponce Inyeccion', 'auto', 48, '1', 'Ciudad', ' Jujuy 569', '0261', '4301333', 'fedeponce_74@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.988938028892!2d-68.82810429999999!3d-32.8720121!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08db88d484bb%3A0xb11019be48a281e9!2sJujuy+569%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421801269395" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, ' Jujuy 569', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 'Guevara Alarmas', 'auto', 48, '1', 'Guaymallen', 'M. De Azcuenaga 608                        ', '0261', '4265454', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.656816439659!2d-68.79763875106507!3d-32.9072407191825!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ea508399e5d%3A0x7e8ef108f64ea4f9!2sMiguel+de+Azcu%C3%A9naga+608%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422316766188" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'M. De Azcuenaga 608                        ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 'Cerrajeria Marcopolo', 'auto', 48, '1', 'Ciudad', 'Buenos Aires 157', '0261', '155066805', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4070289318975!2d-68.83628797672118!3d-32.88740509638359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09189526367d%3A0xa700cef20677671!2sBuenos+Aires+157%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317010567" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Buenos Aires 157', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'TapiSport', 'auto', 48, '1', 'Guaymallen', 'Godoy Cruz 395', '0261', '4450183', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.348208219994!2d-68.82682409999997!3d-32.8889607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0xab308438c5f001c5!2sGodoy+Cruz+395%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317429898" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Godoy Cruz 395', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 'Escapes Necochea', 'auto', 48, '1', 'Guaymallen', 'O''Brien 41                                ', '0261', '4451714 - 155519689', 'escapesnecochea@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.3822659213906!2d-68.82180000000001!3d-32.88805999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092ff111452f%3A0x91a00dffc304c3fa!2sO+Brien%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317667612" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'O''Brien 41                                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'Autopartes San Jose', 'auto', 48, '1', 'Guaymallen', 'Alberdi 1064                                ', '0261', '4458482 - 154530544', 'luisc_santero@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4261649900673!2d-68.8274391!3d-32.886898999999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092461d9e7fb%3A0x9ecd83cbc7e8ed47!2sAlberdi+1064%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317826405" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Alberdi 1064                                ', 'Mendoza', NULL, NULL, NULL, 'Guaymallen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'Audio Shop', 'auto', 48, '1', 'Ciudad', 'Brasil 407', '0261', '4247166', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.7637327427387!2d-68.83872219999999!3d-32.9044145!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b10f8ac0b%3A0x2cd9a985352c4ce3!2sBrasil+407%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422322382688" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Brasil 407', 'Mendoza', NULL, NULL, NULL, 'Ciudad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, '2m sa', 'auto', 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, 'https://maps.google.com/?q=Paso+de+los+Andes+1000,+Godoy+Cruz,+Mendoza,+Argentina&ftid=0x967e099d73b50c87:0x458611be594f238f', 'CqQBlAAAAEmUtlcAcxkB5HMqP0O6HOmMZ0oBXFeMOxc4ScTVYClLZxeUqB79ub31GQl2-uabkz_zE5ogpMhxKqdoxzAI5UKMSGUfo2-fWNRIwFMluwEllxvHq05JQBKLNRu5IW5SCO3qOxaGZNKMwLafTQ84Hdq4ykl8dv4givsWi9jxhvbMVS6tWDQgPTbMezNAVgsV1K91LN1fJPNvFDZOfFdp548SEKjJyuxi9g-_rT55BXAfcHMaFOGACIR', 'EjZQYXNvIGRlIGxvcyBBbmRlcyAxMDAwLCBHb2RveSBDcnV6LCBNZW5kb3phLCBBcmdlbnRpbmE', 'Paso de los Andes 1000', 'Mendoza', 'AR', 'Argentina', NULL, 'Godoy Cruz', NULL, '1000', 'Paso de los Andes', '-32.915179,-68.859582,-32.915176,-68.859545', NULL, 'Paso de los Andes 1000, Godoy Cruz, Mendoza, Argentina', 'PLACES', '-32.915178,-68.859573', '-68.8595727', '-32.915178', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_tallerservicio`
--

CREATE TABLE `dlg_tallerservicio` (
  `idtallerservicio` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_tallerservicio`
--

INSERT INTO `dlg_tallerservicio` (`idtallerservicio`, `idtaller`, `idservicio`) VALUES
(208, 9, 19),
(209, 9, 10),
(210, 9, 8),
(211, 9, 14),
(219, 10, 19),
(222, 12, 33),
(223, 12, 36),
(224, 13, 33),
(225, 13, 36),
(226, 14, 11),
(227, 14, 14),
(239, 15, 33),
(240, 15, 36),
(241, 17, 16),
(242, 17, 10),
(243, 17, 11),
(244, 17, 12),
(245, 17, 14),
(246, 18, 14),
(247, 19, 14),
(250, 22, 10),
(251, 22, 13),
(252, 22, 12),
(253, 20, 9),
(254, 20, 10),
(255, 20, 11),
(256, 20, 12),
(259, 24, 9),
(260, 24, 11),
(272, 28, 28),
(282, 30, 12),
(283, 31, 10),
(284, 31, 13),
(285, 31, 12),
(286, 32, 13),
(287, 32, 12),
(288, 33, 9),
(292, 35, 9),
(293, 35, 16),
(294, 35, 11),
(295, 35, 31),
(296, 35, 12),
(297, 36, 12),
(298, 37, 12),
(301, 39, 21),
(302, 40, 21),
(303, 41, 21),
(304, 42, 26),
(305, 42, 36),
(308, 43, 26),
(309, 43, 36),
(310, 44, 19),
(311, 44, 8),
(312, 44, 29),
(313, 45, 19),
(314, 45, 29),
(315, 46, 7),
(316, 47, 7),
(317, 48, 37),
(318, 48, 13),
(319, 48, 12),
(321, 50, 9),
(324, 52, 9),
(325, 52, 31),
(326, 53, 9),
(327, 53, 31),
(339, 57, 33),
(340, 57, 36),
(341, 58, 33),
(342, 58, 36),
(343, 59, 22),
(344, 60, 13),
(345, 60, 12),
(346, 61, 9),
(347, 62, 12),
(348, 62, 14),
(349, 63, 21),
(350, 64, 12),
(351, 65, 37),
(352, 65, 12),
(353, 66, 8),
(354, 67, 38),
(355, 67, 36),
(356, 68, 36),
(357, 69, 12),
(358, 69, 36),
(359, 70, 12),
(360, 70, 36),
(362, 71, 12),
(363, 72, 12),
(364, 73, 36),
(365, 74, 12),
(366, 75, 12),
(367, 76, 12),
(368, 77, 12),
(369, 78, 17),
(394, 85, 9),
(395, 85, 30),
(396, 86, 19),
(397, 86, 12),
(398, 86, 30),
(420, 90, 36),
(421, 91, 18),
(422, 92, 18),
(423, 93, 12),
(424, 94, 11),
(425, 94, 12),
(426, 94, 36),
(427, 95, 7),
(428, 96, 36),
(429, 97, 36),
(430, 98, 11),
(431, 98, 37),
(432, 98, 13),
(433, 98, 8),
(434, 98, 12),
(435, 98, 36),
(436, 99, 36),
(437, 100, 12),
(438, 100, 14),
(439, 101, 12),
(440, 102, 37),
(441, 102, 13),
(442, 102, 12),
(443, 103, 12),
(445, 104, 12),
(446, 104, 36),
(447, 105, 12),
(448, 106, 26),
(449, 107, 12),
(454, 110, 38),
(455, 111, 21),
(456, 112, 19),
(457, 113, 33),
(458, 113, 36),
(459, 114, 33),
(460, 114, 36),
(461, 115, 21),
(462, 116, 21),
(463, 117, 21),
(465, 118, 21),
(466, 119, 21),
(467, 120, 21),
(468, 121, 21),
(469, 122, 21),
(474, 123, 9),
(475, 123, 11),
(476, 123, 21),
(477, 123, 12),
(479, 124, 26),
(480, 124, 12),
(481, 125, 21),
(482, 125, 12),
(483, 126, 33),
(484, 126, 36),
(490, 128, 19),
(491, 128, 29),
(492, 129, 36),
(493, 130, 28),
(494, 130, 9),
(495, 131, 28),
(496, 131, 38),
(497, 132, 38),
(498, 133, 12),
(499, 133, 36),
(500, 134, 36),
(502, 135, 19),
(503, 135, 29),
(504, 136, 9),
(505, 136, 36),
(520, 139, 8),
(521, 139, 12),
(522, 139, 36),
(523, 140, 12),
(524, 140, 36),
(537, 142, 9),
(538, 142, 38),
(539, 142, 8),
(540, 142, 36),
(541, 143, 10),
(542, 143, 11),
(543, 143, 12),
(544, 143, 36),
(546, 144, 8),
(547, 144, 33),
(548, 144, 36),
(549, 145, 33),
(550, 145, 36),
(551, 146, 9),
(552, 146, 11),
(553, 146, 31),
(554, 146, 8),
(567, 150, 36),
(569, 151, 36),
(570, 152, 36),
(581, 153, 12),
(582, 153, 36),
(583, 155, 32),
(584, 155, 37),
(585, 155, 13),
(586, 155, 8),
(587, 155, 12),
(588, 156, 21),
(591, 157, 33),
(592, 157, 36),
(593, 158, 19),
(594, 158, 29),
(595, 158, 36),
(596, 159, 9),
(597, 159, 19),
(598, 159, 10),
(599, 159, 12),
(600, 159, 36),
(601, 160, 12),
(602, 160, 33),
(603, 160, 36),
(604, 161, 12),
(605, 161, 36),
(606, 162, 18),
(607, 162, 17),
(608, 162, 12),
(609, 162, 22),
(610, 163, 11),
(611, 164, 11),
(612, 165, 22),
(613, 165, 36),
(615, 166, 22),
(616, 166, 36),
(617, 167, 22),
(618, 167, 36),
(620, 169, 9),
(621, 169, 10),
(622, 169, 26),
(623, 169, 11),
(624, 169, 31),
(625, 169, 8),
(626, 169, 12),
(641, 23, 9),
(642, 23, 31),
(643, 23, 8),
(644, 23, 39),
(645, 51, 9),
(646, 51, 31),
(647, 51, 39),
(648, 54, 9),
(649, 54, 10),
(650, 54, 11),
(651, 54, 31),
(652, 54, 8),
(653, 54, 39),
(654, 56, 9),
(655, 56, 31),
(656, 56, 39),
(657, 147, 9),
(658, 147, 31),
(659, 147, 39),
(660, 148, 9),
(661, 148, 31),
(662, 148, 39),
(663, 148, 36),
(664, 34, 9),
(665, 34, 31),
(666, 34, 13),
(667, 34, 39),
(668, 55, 9),
(669, 55, 31),
(670, 55, 39),
(678, 149, 9),
(679, 149, 38),
(680, 149, 11),
(681, 149, 31),
(682, 149, 39),
(683, 149, 36),
(684, 170, 10),
(685, 170, 11),
(686, 170, 21),
(687, 170, 31),
(688, 170, 8),
(689, 170, 12),
(690, 170, 39),
(691, 170, 36),
(692, 171, 36),
(695, 172, 36),
(707, 176, 28),
(708, 176, 40),
(709, 176, 5),
(710, 168, 40),
(711, 168, 5),
(712, 177, 40),
(713, 177, 5),
(714, 173, 40),
(715, 173, 5),
(720, 175, 28),
(721, 175, 40),
(722, 175, 5),
(723, 178, 28),
(724, 178, 40),
(725, 178, 5),
(726, 179, 18),
(727, 179, 40),
(728, 179, 5),
(729, 180, 40),
(730, 180, 5),
(731, 181, 40),
(732, 181, 5),
(733, 182, 9),
(734, 182, 10),
(735, 182, 11),
(736, 182, 31),
(737, 182, 37),
(738, 182, 12),
(739, 183, 18),
(740, 183, 19),
(741, 183, 10),
(742, 183, 12),
(743, 183, 14),
(747, 184, 18),
(748, 184, 38),
(749, 184, 10),
(750, 185, 10),
(751, 185, 12),
(759, 186, 9),
(760, 186, 38),
(761, 186, 10),
(762, 186, 13),
(763, 186, 8),
(764, 186, 12),
(765, 186, 22),
(771, 7, 4),
(772, 7, 19),
(773, 7, 35),
(774, 7, 12),
(775, 7, 29),
(776, 7, 34),
(777, 7, 14),
(778, 187, 4),
(779, 187, 19),
(780, 187, 35),
(781, 187, 12),
(782, 38, 4),
(783, 38, 35),
(784, 38, 12),
(785, 38, 14),
(786, 189, 4),
(787, 189, 35),
(788, 190, 4),
(789, 190, 35),
(790, 191, 4),
(791, 191, 35),
(792, 188, 4),
(793, 188, 35),
(794, 192, 4),
(795, 192, 35),
(796, 193, 4),
(797, 193, 35),
(798, 194, 4),
(799, 194, 35),
(800, 195, 4),
(801, 195, 35),
(802, 196, 4),
(803, 196, 35),
(804, 197, 9),
(805, 197, 12),
(806, 198, 11),
(807, 199, 19),
(808, 199, 30),
(810, 200, 12),
(811, 201, 37),
(812, 201, 13),
(813, 201, 27),
(814, 202, 10),
(815, 202, 12),
(818, 203, 18),
(819, 203, 10),
(820, 203, 12),
(821, 203, 36),
(823, 205, 12),
(824, 206, 31),
(825, 206, 39),
(826, 207, 10),
(827, 207, 12),
(828, 127, 30),
(829, 127, 33),
(830, 127, 36),
(840, 88, 9),
(841, 88, 8),
(842, 88, 39),
(843, 208, 38),
(844, 208, 10),
(845, 204, 12),
(846, 87, 12),
(847, 209, 38),
(848, 209, 39),
(849, 209, 36),
(861, 211, 9),
(862, 211, 38),
(863, 211, 39),
(865, 212, 9),
(866, 212, 31),
(867, 212, 39),
(868, 213, 10),
(869, 213, 12),
(870, 214, 18),
(871, 214, 10),
(872, 214, 17),
(873, 214, 12),
(874, 215, 10),
(875, 215, 12),
(876, 216, 10),
(877, 216, 8),
(878, 216, 12),
(883, 217, 9),
(884, 217, 19),
(885, 217, 13),
(886, 217, 12),
(891, 218, 36),
(892, 219, 9),
(893, 219, 11),
(894, 219, 8),
(895, 220, 19),
(896, 220, 21),
(897, 220, 12),
(898, 221, 12),
(899, 222, 9),
(900, 222, 12),
(901, 223, 19),
(902, 224, 22),
(903, 225, 39),
(904, 226, 40),
(905, 226, 5),
(906, 226, 25),
(907, 227, 30),
(908, 227, 20),
(909, 227, 39),
(910, 228, 26),
(911, 11, 19),
(912, 229, 11),
(913, 229, 13),
(914, 229, 12),
(917, 231, 40),
(918, 231, 5),
(920, 232, 7),
(921, 49, 7),
(926, 233, 26),
(927, 234, 36),
(930, 27, 28),
(931, 27, 41),
(932, 27, 24),
(933, 29, 28),
(934, 29, 41),
(935, 29, 24),
(936, 81, 8),
(937, 81, 42),
(938, 89, 28),
(939, 89, 41),
(940, 89, 24),
(943, 84, 42),
(944, 84, 24),
(945, 79, 28),
(946, 79, 41),
(947, 79, 42),
(948, 79, 24),
(949, 25, 6),
(950, 25, 25),
(951, 25, 42),
(952, 25, 29),
(953, 25, 24),
(954, 82, 32),
(955, 82, 43),
(956, 82, 42),
(957, 82, 24),
(958, 83, 43),
(959, 83, 42),
(960, 83, 24),
(961, 230, 28),
(962, 230, 41),
(963, 230, 24),
(964, 138, 32),
(965, 138, 8),
(966, 26, 8),
(967, 26, 25),
(968, 26, 42),
(969, 26, 24),
(970, 210, 41),
(971, 210, 8),
(972, 210, 42),
(973, 210, 24),
(975, 80, 24),
(981, 141, 28),
(982, 141, 38),
(983, 141, 24),
(984, 141, 39),
(985, 141, 36),
(996, 137, 10),
(997, 137, 31),
(998, 137, 43),
(999, 137, 14),
(1000, 235, 28),
(1001, 235, 41),
(1002, 235, 24),
(1003, 235, 39),
(1008, 174, 28),
(1009, 174, 40),
(1010, 174, 5),
(1011, 174, 25),
(1012, 16, 37),
(1013, 16, 13),
(1029, 21, 38),
(1030, 236, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_taller_back`
--

CREATE TABLE `dlg_taller_back` (
  `idtaller` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipovehiculo` varchar(10) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `idprovincia` int(11) DEFAULT NULL,
  `idlocalidad` int(11) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefonocodarea` varchar(10) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `googlemap` text,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `atencion` bigint(20) NOT NULL DEFAULT '0',
  `precio` bigint(20) NOT NULL DEFAULT '0',
  `servicio` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_taller_back`
--

INSERT INTO `dlg_taller_back` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`) VALUES
(7, 'JR Miliotti ', 'auto', 48, 1, 4, '25 de mayo 2275                                                        ', '0261', '4487588', 'info@jrmiliottisa.com.ar', 'www.jrmiliottisa.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13408.017021843885!2d-68.8309406!3d-32.845139!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08a310851fb7%3A0x7a77e45bda89ccac!2s25+de+Mayo+2275%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1411837477216" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                        ', NULL, NULL, NULL, 1, 5, 3, 5),
(9, 'Talleres Ciaramitaro', 'auto', 48, 1, 1, 'Ayacucho 362 ', '0261', '4374263', 'antoniociaramitaro@hotmail.com', 'www.talleresciaramitaro.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13403.456147034936!2d-68.831383!3d-32.87531659999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08de890f2947%3A0x58da70b536129341!2sAyacucho+362%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415635192628" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(10, 'Gabriel Serradilla ', 'auto', 48, 1, 1, 'Dr Moreno 3233                                                                ', '0261', '4375374', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.199077353838!2d-68.8397964!3d-32.8664518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e93be7ec2b%3A0xa0bcfeddb7c0a1c6!2sDr+Moreno+3233%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415644225054" width="320" height="240" frameborder="0" style="border:0"></iframe>                    ', NULL, NULL, NULL, 1, 0, 0, 0),
(11, 'Taller Alberto L Ponce', 'auto', 48, 1, 4, 'BahÃƒÂ­a Blanca 253                                ', '0261', '4371407', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.3174881593354!2d-68.82465425952454!3d-32.863318274578695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c5c119a189%3A0xe6ecddaf5a6cf9e9!2sBah%C3%ADa+Blanca+257%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415647094953" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(12, 'CARSUR', 'auto', 49, 1, 2, 'Av. San MartÃƒÂ­n 598        ', '0261', '4243721', NULL, 'www.carsur.honda.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13397.107562002131!2d-68.84664725396729!3d-32.917281916393925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097b34799c23%3A0xc252d7cc3d7f3918!2sAv+San+Mart%C3%ADn+598%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415647388160" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 4, 3, 5),
(13, 'Garage Europa', 'auto', 50, 1, 7, 'Adolfo Calle 340', '0261', '4326597 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9516945097193!2d-68.83140313624573!3d-32.89944540744163!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093f6d52a6b1%3A0xeca19f59c20f7c8e!2sAdolfo+Calle+340%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415648095031" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 4, 4, 5),
(14, 'Mecanica Carrasco', 'auto', 48, 1, 14, 'Angel Godoy 87', '0261', '4972899', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1673.4771309994096!2d-68.79063004232789!3d-32.97860849081019!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c959aa929c7%3A0x8cd4358d9861a2d6!2sGodoy+A.+87%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415648536139" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(15, 'Jorge A Polo', 'auto', 51, 1, 7, 'Cnel Brandsen 1507 (Coronel Dorrego)        ', '0261', '4311463', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.620681738022!2d-68.83752093809814!3d-32.908195853023514!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969a3790e51%3A0xd02d8b7ad1a98492!2sBrandsen+1507%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415656410248" width="320" height="240" frameborder="0" style="border:0"></iframe>      ', NULL, NULL, NULL, 1, 5, 4, 4),
(16, 'Diesel Campillay', 'auto', 48, 1, 7, 'J G Molina 277 (Dorrego)                                ', '0261', '4320610', NULL, 'www.dieselcampillay.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d837.4332359042767!2d-68.83638329999995!3d-32.90522839999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a66bf2c09%3A0xcd044bc91c4f53fb!2sMolina+J.+51%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1415655981979" width="320" height="240" frameborder="0" style="border:0"></iframe>                       ', NULL, NULL, NULL, 1, 0, 0, 0),
(17, 'Service Toulouse', 'auto', 52, 1, 1, 'P De La Reta 649', '0261', '4291514', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0628464981683!2d-68.83985610000002!3d-32.896506599999974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0916c6de1eb1%3A0x342c5f9b8e51691f!2sDe+la+Reta+P.+601%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1415657737049" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(18, 'Guareschi - Cocchetto Servicio Mecanico', 'auto', 48, 1, 7, 'ItuzaingÃƒÂ³ 92', '0261', '4317816', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.2655990705434!2d-68.83725990000002!3d-32.9175803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09673a635039%3A0xb595b6ac7c952c16!2sItuzaing%C3%B3+202%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415659119411" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(19, 'Panelo Roberto Miguel ', 'auto', 48, 1, 9, 'Amigorena 1148', '02627', '470398', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(20, 'Daniel Abaca', 'auto', 48, 1, 2, ' Renato Della Santa 776                 ', '0261', '155275223 - 155743729 ', 'danielabaca@live.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.6434001233674!2d-68.86135975349413!3d-32.91702004273028!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099d262ec371%3A0xcbe7a42218b785aa!2sDella+Sta+Renato+776%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415669653121" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(21, 'Aci de Alberto Iglesias', 'auto', 48, 1, 2, 'BeltrÃƒÂ¡n Sur 77        ', '0261', '4220908 - 422-0832', ' info@bateriasaci.com.ar - acisa@speedy.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.026107613227!2d-68.84967968766414!3d-32.92390845702148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097c597dac7d%3A0x54c2cbac0a7eabf7!2sBeltr%C3%A1n+77%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415670130518" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 4, 4, 5),
(22, 'Aldo Giurdanella', 'auto', 48, 1, 2, 'Beltran 1382', '0261 ', '4244053  -  153690081', 'aldogiurdanella2012@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.5797256068263!2d-68.8512199!3d-32.909278400000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0973df9ac5f5%3A0x656b3bb42f84f209!2sBeltr%C3%A1n+1382%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415670471881" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(23, 'Autolub', 'auto', 48, 1, 1, 'Av San MartÃƒÂ­n 2859                ', '0261', '4300755', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.532841421476!2d-68.83358374840999!3d-32.869981524100346!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dd4dec9cef%3A0x47736ff1125bf75d!2sAv+San+Mart%C3%ADn+2859%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415704528590" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(24, 'Carrillo Alineacion', 'auto', 48, 1, 1, 'J F Moreno 2824', '0261', '4307099', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.5263876124773!2d-68.83227292089303!3d-32.8703230520094!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dd213c0497%3A0x7eaae83e047b5476!2sMoreno+2824%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415704938323" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(25, 'FRESARGLASS', 'auto', 48, 1, 7, 'Necochea 400 (San Jose)                                ', '0261', '4321684', 'fresarglass@live.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1440488445714!2d-68.82097920000002!3d-32.8943595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0930cc763fcd%3A0x21860c0f20723747!2sNecochea+401%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415714355650" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(26, 'Lubricentro Tirasso', 'auto', 48, 1, 7, 'Berutti 54                        ', '0261', '4324776', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13399.051072441134!2d-68.8362745!3d-32.90444!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a8bfff77b%3A0xce5176a6a59f7bb7!2sBerutti+54%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415728911959" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(27, 'Alessi', 'auto', 48, 1, 2, 'San MartÃƒÂ­n 422                                ', '0261', '4240021', 'info@alessi.com.ar ', 'www.alessi.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.237559940961!2d-68.84855895801321!3d-32.9183212424128!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097b4e67c199%3A0x3103a8213787649b!2sAv+San+Mart%C3%ADn+422%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415729545458" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 5, 3, 4),
(28, 'Jc Auto Stereo', 'auto', 48, 1, 2, 'Brasil 341 Loc 7', '0261', '4247043', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.884635320087!2d-68.84072517015122!3d-32.904268105680366!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b6961900b%3A0xb2f2b65a34d0e0d7!2sBrasil+341%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415730169412" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(29, 'Auto Audio', 'auto', 48, 1, 1, 'Colon 451                        ', '0261', '4236013', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d837.5405844319217!2d-68.84642579999999!3d-32.8938759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09101ccdc461%3A0x829c39d6e979bd8c!2sAv+Col%C3%B3n+451%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415828967985" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 4, 4, 4),
(30, 'Oscar Vicario', 'auto', 48, 1, 2, 'Democracia 22        ', '0261', '4242358', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.248388189417!2d-68.84589993491889!3d-32.91803510445242!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0964d8597a29%3A0x3f5ed171a95ecf31!2sDemocracia+22%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415901738969" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(31, 'Mecanica Integral De Miguel Y Andres Garro', 'auto', 48, 1, 1, 'Cnel Rodriguez 2353', '0261', '4257423', 'garroandres@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.4502768497234!2d-68.8504800756756!3d-32.87435050557712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08fafc403339%3A0x87fe3bb4b550fb01!2sRodr%C3%ADguez+Cnel.+2353%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415902007791" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(32, 'Navarrete Mecanica Sport', 'auto', 48, 1, 1, 'Montecaseros 2158 PB', '0261', '4293599', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6700.797637912546!2d-68.83385386297952!3d-32.88762222565758!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0923b168f4e3%3A0xb4552423362cd7a4!2sMontecaseros+2158%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415902301699" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(33, 'Mecanica Franceschini - Tren Delantero', 'auto', 48, 1, 11, 'Cnel Olascoaga 1468', '0260', '4422172', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(34, 'Pro Neumaticos', 'auto', 48, 1, 2, 'Av San Martin 1135        ', '0261', '4246774', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.47449303149!2d-68.84583699947602!3d-32.91205974842508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096fc9cfb6b9%3A0xa68b5265e677dc25!2sAv+San+Mart%C3%ADn+1135%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415903264698" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(35, 'Suriani ', 'auto', 48, 1, 7, 'J LÃƒÂ³pez De Gomara 261', '0261', '4212447', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.814384482052!2d-68.79395350055539!3d-32.903075499725105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ebcdc2bd823%3A0xe69b56644d8eacb!2sDe+Gomara+L.+261%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415903821047" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(36, 'Cp Motos', 'moto', 48, 1, 1, 'Av San MartÃƒÂ­n 3366', '0261', '4377807', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13404.880130852427!2d-68.8461908953368!3d-32.86589727405667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c292c14d6d%3A0xd5ddfbabda397c70!2sAv+San+Mart%C3%ADn+3366%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415992805371" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(37, 'Mecanica De Motos Peralta', 'moto', 48, 1, 7, 'J De Garay 1027 (San Jose)', '0261', '4456900', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.46435022705!2d-68.82514523920898!3d-32.88848786052503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092e1b737393%3A0x98919d5a514b2e5!2sGaray+1027%2C+Mendoza!5e0!3m2!1ses!2sar!4v1415993158885" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(38, 'Mecanica Olguin', 'auto', 48, 1, 7, 'R Obligado 1991 (San Jose)                ', '0261', '4453015', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.3478292307484!2d-68.81145490681533!3d-32.879770900561965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092b32fff357%3A0xf53c7e871cdd5a84!2sObligado+1991%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416231717880" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(39, 'GNC Anton', 'auto', 48, 1, 7, 'Mathus Hoyos 871', '0261', '4459263', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.018946906452!2d-68.81058064551796!3d-32.871468768169905!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDUyJzE4LjAiUyA2OMKwNDgnMzUuNiJX!5e0!3m2!1ses-419!2sar!4v1416232294564" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(40, 'Esi Gas', 'auto', 48, 1, 1, 'ItuzaingÃƒÂ³ 2536', '0261', '4308414 - 4311204', NULL, 'www.esigas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.012136716374!2d-68.83258852382916!3d-32.87155886164997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08dc045bab7b%3A0xf4122671f7581248!2sItuzaing%C3%B3+2536%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416232502269" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5),
(41, 'Esi Gas (sucursal San Rafael)', 'auto', 48, 1, 11, 'Av. Moreno 1315', '0260', '4430405', NULL, 'www.esigas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1642.0690041660573!2d-68.32995594113922!3d-34.60067155730119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907de2024683f%3A0xd11f2329fc0d1a75!2sAv+Mariano+Moreno+1315%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses-419!2sar!4v1416232810293" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5),
(42, 'Escapes Mendoza', 'auto', 48, 1, 7, 'Sarmiento 852', '0261', '4457190', 'escapes_mza2006@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.194634611591!2d-68.80315344896916!3d-32.8902710633426!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec896ba0c23%3A0x59c667eb03b8a0c2!2sSarmiento+852%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416233180161" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(43, 'Replat Escapes ', 'auto', 48, 1, 7, 'Godoy Cruz 1409 (San Jose)                ', '0261', '4323598', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3078257902457!2d-68.81611048545814!3d-32.890028637256385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093250b518e5%3A0x41301f540530dfaf!2sGodoy+Cruz+1409%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416233486450" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(44, 'Imola', 'auto', 48, 1, 1, 'Av B Mitre 1348', '0261', '4250423', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4222477819585!2d-68.84387459999999!3d-32.8870026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091c86d84199%3A0x5f8a2c3bda111fd3!2sAv+Bartolom%C3%A9+Mitre+1348%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416237669624" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(45, 'Taller Cona', 'auto', 48, 1, 7, '25 De Mayo 154', '0261', '4319047', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1675.0111292909423!2d-68.83232593240353!3d-32.89757975284456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093e42a566c5%3A0xfc4d4d37bb4adb21!2s25+de+Mayo+154%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416238884953" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(46, 'Tapiceria Automotor Y Nautica - Pablo Salinas', 'auto', 48, 1, 2, 'D Matheu 1525', '0261', '4639519', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.4264410385967!2d-68.8287643!3d-32.9397489!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bec6c236d67%3A0x216a6a2271715447!2sMatheu+1525%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239287030" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(47, 'Perez Cruz Hipolito', 'auto', 48, 1, 7, 'Pringles 2646', '0261', '4452007', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1675.0672309173458!2d-68.80456889999999!3d-32.894613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec99186891f%3A0xdd9d72e3337bc559!2sPringles+2301%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239561824" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(48, 'Escayol', 'auto', 48, 1, 2, 'Amengual 1453', '0261', '4274697', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6871972607014!2d-68.86028323967282!3d-32.906437656281504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f9df0b657%3A0xdaa3ee9b333d45a3!2sAmengual+1453%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416239909652" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(49, 'Tapiceria Petino ', 'auto', 48, 1, 7, 'Godoy Cruz 743                                 ', '0261', '4454431 - 155981383', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3358629892246!2d-68.8228346902143!3d-32.88928718020133!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093001a46fdb%3A0xbf8e9d037efdac7d!2sGodoy+Cruz+743%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240271116" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(50, 'Pedro Leuci', 'auto', 48, 1, 7, 'Mitre 776', '0261', '4311280', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13401.125216748915!2d-68.8163376!3d-32.89073!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0933d3e1b35b%3A0x5323f3f19bbac791!2sAv+Mitre+776%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240499829" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(51, 'Centro Chinak', 'auto', 48, 1, 1, 'Av B Mitre 1702        ', '0261', '4250900', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.2680767944423!2d-68.84357957990112!3d-32.88398996840254!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091d923e43ad%3A0xcad625ada136c996!2sAv+Bartolom%C3%A9+Mitre+1702%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416240977316" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(52, 'Rodax', 'auto', 48, 1, 7, 'Godoy Cruz 1387', '0261', '4310464', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3291125549817!2d-68.8152175!3d-32.889465699999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093238cd8b2f%3A0x7587ec33abc0db29!2sGodoy+Cruz+1387%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416313045189" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(53, 'El Cruce ', 'auto', 48, 1, 2, 'RodrÃƒÂ­guez PeÃƒÂ±a 850', '0261', '4325888', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.477442078932!2d-68.77137574973754!3d-32.93840194923463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c46292d1ad7%3A0x937bc2d7c4d30eb7!2sCarril+Rodr%C3%ADguez+Pena%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416313736107" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(54, 'Mantello Neumaticos', 'auto', 48, 1, 14, 'Francisco Gabrielli (ex Urquiza) 3885                ', '0261', '4932891/4932884', 'mantello@infovia.com.ar', 'www.neumaticosmantello.com.ar', '                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(55, 'Rodaservis', 'auto', 48, 1, 2, 'Cerro Nevado 1194        ', '0261', '4520723', NULL, NULL, '        ', NULL, NULL, NULL, 1, 0, 0, 0),
(56, 'Neumaticos Romeo', 'auto', 48, 1, 7, 'Bandera De Los Andes 3726        ', '0261', '4216121', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.958446294696!2d-68.7946089!3d-32.89926689999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0eb9429be03b%3A0xcfd891a12b9b032!2sAv+Bandera+de+Los+Andes+3726%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416315197972" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(57, 'Denver', 'auto', 50, 1, 2, 'Av. San MartÃƒÂ­n Sur 593        ', '0261', '4225499', NULL, 'www.denverauto.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.7708393993717!2d-68.8500086!3d-32.9306523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd6e3e37437%3A0xba3353cdfdc149ac!2sAv+San+Mart%C3%ADn+Sur+593%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416321880088" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(58, 'Automotores General San Martin', 'auto', 53, 1, 7, 'Av. 25 de Mayo 5555', '0261', ' 4133700', NULL, 'www.autogsm.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.44134212067!2d-68.7746854!3d-32.9129359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c280188d971%3A0xf368c27271380c6c!2sAcceso+A+25+de+Mayo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416322833835" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(59, 'Jose Radiadores', 'auto', 48, 1, 11, 'Mitre 1370', '0260 ', '154418049', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2677017282213!2d-68.3108374!3d-34.6226747!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f452ba677%3A0x235af5e8a6b0d5ed!2sAv+Mitre+1370%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490200612" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(60, 'Polin MecÃƒÂ¡nica', 'auto', 48, 1, 11, 'Corrientes 526', '0260', '154676896', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.512121547091!2d-68.33663!3d-34.6164965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080721c000ed%3A0xcc5b9c28106b3bcc!2sCorrientes+526%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490304476" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(61, 'Salvo Tascone Hnos', 'auto', 48, 1, 11, 'Mitre 1207', '0260', '4438263', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.287871705218!2d-68.3123518!3d-34.6221649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f19e52253%3A0xc803d039609d3c80!2sAv+Mitre+1207%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490404759" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(62, 'Jpm MecÃƒÂ¡nica', 'auto', 48, 1, 11, 'Moreno 1087', '0260', '154557205', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.0352356490966!2d-68.3308728!3d-34.6032705!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907e0ff6dee55%3A0x7fab4210fbcabeb1!2sAv+Mariano+Moreno+1087%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490491221" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(63, 'Mundogas', 'auto', 48, 1, 11, 'Lavalle 479', '0260', NULL, NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.857417844093!2d-68.3387968!3d-34.6077668!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080959296415%3A0x2798dd7815ff0fa8!2sLavalle+479%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490650690" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(64, 'Raul Taller Mecanico', 'auto', 48, 1, 11, 'Deoclecio Garcia 337', '0260', '154513091', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(65, 'Mauricio Martinez MecÃƒÂ¡nica', 'auto', 48, 1, 11, 'Puerredon 515', '0260', '154601897', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.8830973401814!2d-68.3370943!3d-34.6071175!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080bd5008077%3A0x98f4478d91099dff!2sPueyrred%C3%B3n+515%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416490966143" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(66, 'Baja Un Cambio', 'auto', 48, 1, 11, 'Zapata y Italia', '0260', '4425756 ', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(67, 'Baterias Mateo', 'auto', 48, 1, 11, 'Carlos W. Lencinas 61', '0260', '4428459', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.658908585822!2d-68.3421846!3d-34.612785699999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679080f7011ca4f%3A0x10dbbdfeffa59a4a!2sLencinas+61%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491196658" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(68, 'Motos Cornachione', 'moto', 48, 1, 11, 'Cnel L Barcala 1234', '0260', '4447484', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2502337958613!2d-68.3127883!3d-34.623116200000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81f263fb39f%3A0x40e430a7bc09a403!2sBarcala+1234%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491378090" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(69, 'RPM motos', 'moto', 48, 1, 11, 'Italia 543', '02627', '15 314942', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.622509785727!2d-68.3177109!3d-34.6137059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967907f137aa3c91%3A0x719e5498d7ab9304!2sItalia+543%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416491728231" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(70, 'Mg Motos', 'moto', 48, 1, 14, 'Cruz Videla 73', '0261', '4990007', 'juanmarcelogonzalez@yahoo.com.ar', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(71, 'Perez Enrique', 'moto', 48, 1, 7, 'Gral Artigas 776        ', '0261', '4450416', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d837.5492563388414!2d-68.80401998428755!3d-32.89295866226035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec969c38ccf%3A0xffb7a5b15449e83e!2sArtigas+J.+776%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416492711915" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(72, 'Vaselli Motos ', 'moto', 48, 1, 7, 'Gdor R Videla 1575', '0261', '4452113', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4426617607646!2d-68.8286577!3d-32.886462699999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092476444c25%3A0x902e8c3fdbf19cac!2sAv+Gdor.+Ricardo+Videla+1575%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416492882139" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(73, 'MD Motos', 'moto', 48, 1, 8, 'Godoy Cruz 46', '0261', '4986123', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.843357312296!2d-68.8791281!3d-33.034257100000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e753ed977b54d%3A0xc2bd44644964547b!2sGodoy+Cruz+46%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493078236" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(74, 'Atuel Motos', 'moto', 48, 1, 11, 'Av H Yrigoyen 616', '0260', '4436039', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.6161136039327!2d-68.33681589999999!3d-34.6138676!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96790807b5427675%3A0x4a224efb12c8479c!2sAv+Hip%C3%B3lito+Yrigoyen+616%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493212336" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(75, 'Cicutto Moto Mecanica', 'moto', 48, 1, 14, 'Tropero Sosa 23', '0261', '4972095', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.39187262471!2d-68.8463613!3d-32.91424329999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096ffc688c4f%3A0x25f23b63eeed6f22!2sTropero+Sosa+23%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493435544" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(76, 'Basco Miguel Angel', 'moto', 48, 1, 7, 'Gral Artigas 691', '0261', '4452545', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6700.573682232016!2d-68.79942775266788!3d-32.890583577233755!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec979ee6353%3A0x1227797c68651f46!2sArtigas+J.+691%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493596914" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(77, 'Angela De Sartori', 'moto', 48, 1, 1, 'Rioja 430', '0261', '4291595', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0299735806366!2d-68.83729302943034!3d-32.89737576908453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0915adce98f7%3A0x5f307b07ac28cc9e!2sLa+Rioja+430%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416493744850" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(78, 'YaÃƒÂ±ez Electro Instrumental', 'auto', 48, 1, 7, 'Espejo 654', '0261', '4320235', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.824760473836!2d-68.832802!3d-32.902801200000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0940699368d3%3A0xe67c35e51a3dc6a3!2sEspejo+654%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416502702970" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(79, 'Evolucion Movil', 'auto', 48, 1, 2, 'Independencia 301                                                                ', '0261', '4832191 - 155502759', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.8014490067835!2d-68.822809!3d-32.9298437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bfac61553fd%3A0xc5ff86fceaa7bc0c!2sIndependencia%2C+Mendoza%2C+Argentina!5e0!3m2!1ses!2sar!4v1416503527927" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(80, 'Servicentro San Jose', 'auto', 48, 1, 7, 'Carril Godoy Cruz 2345                                ', '0261', '156168742', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13400.994660594451!2d-68.80792021368067!3d-32.89159311986448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec93c2d17f7%3A0x8a8b0d3efe84800e!2sGodoy+Cruz+2345%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416503746866" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(81, 'Auto Spa Lavadero', 'auto', 48, 1, 7, '25 de Mayo 2182                        ', '0261', '153696184', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6699.898346255594!2d-68.81536016632434!3d-32.899512068916984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e094ad22586d3%3A0xef387ae82e41a69d!2s25+de+Mayo+2182%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504006210" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(82, 'Global film', 'auto', 48, 1, 4, 'Urquiza 66                        ', '0261', '152029282', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.697732872531!2d-68.83385767139148!3d-32.86125459550089!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c1aa31060d%3A0x874fe03ebb45393b!2sUrquiza%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504492510" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(83, 'Graficar Vinilos', 'auto', 48, 1, 2, 'San Martin Sur 303                        ', '0261', '4222326', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.86022848502!2d-68.8496555!3d-32.92829089999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd65333f803%3A0xe0f3c377e974d9fe!2sAv+San+Mart%C3%ADn+Sur+303%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416504664044" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(84, 'Boga Polarizados', 'auto', 48, 1, 18, 'BÃ‚Âº San Jose Manzana B Casa 17                                                ', '0261', '153690327 - 153690325', NULL, NULL, '                                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(85, 'Malisani y Ruggeri', 'auto', 48, 1, 2, 'Sierra Pintada 874', '0261', '4317013 - 155509219', 'fabianmalisani@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(86, 'Servi Mec', 'auto', 48, 1, 16, 'Ruta Provincial 50 km. 1037', '02623', '428656 - 15520880', 'servi_mec@hotmail.com', 'www.servimec.8m.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26751.16354946684!2d-68.5176297421563!3d-33.059219393069036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e42713585e765%3A0x761d8f576c296f1f!2sRP+50%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1416505751744" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(87, 'Guille Motos', 'moto', 48, 1, 1, 'luzuriaga 690        ', '0261', '4283911', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.9159661254607!2d-68.8606148!3d-32.900389999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a73a7eff77%3A0x67f977e569ebe67f!2sLuzuriaga+602%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417481768971" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(88, 'Auto Shop', 'auto', 48, 1, 2, 'Diamante 375                                        ', '0261', '4053000', 'autoshop@guerrinisa.com.ar', 'www.autoshopmendoza.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.9676703169393!2d-68.82226179999998!3d-32.9254524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bfcb67d0b33%3A0xee0a904062d1840c!2sDiamante%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417483679318" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 4, 4, 4),
(89, 'Autoradio Ayacucho', 'auto', 48, 1, 1, 'Corrientes 101                        ', '0261', '4299287', 'autoradioayacucho@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.6412660140036!2d-68.83377960845952!3d-32.881209690707955!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092028706491%3A0x29385ab3bf149aaa!2sCorrientes+101%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485404241" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(90, 'Repuestos Alba', 'auto', 48, 1, 14, 'General Lavalle 187', '0261', '4972753', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.3651231877725!2d-68.78827439999999!3d-32.967767499999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c8d1242f06d%3A0xae0cbe3d5c31b9d8!2sGral+Lavalle%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485667485" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(91, 'Base Electronica y Electromecanica', 'auto', 48, 1, 1, 'Pueyrredon 597', '0261', '4270825', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9569112827803!2d-68.8590806865082!3d-32.89930748357318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a767181f0f%3A0x6c40d35e7aedd675!2sPueyrred%C3%B3n+597%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417485911435" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(92, 'Velasco', 'auto', 48, 1, 2, 'Amengual 1435', '0261', '4286659', 'palenkevelasco@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6471459130075!2d-68.86158581301635!3d-32.90749633868339!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f9df0b657%3A0x6dc37c1222f79990!2sAmengual+1435%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486070965" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(93, 'The Doctor', 'moto', 48, 1, 2, 'Paso de los andes 1799', '0261', '156099539', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1674.827470703462!2d-68.86041471961042!3d-32.90729028176385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x1286036348e5999a!2sPaso+de+Los+Andes+1799%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486322470" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(94, 'Frenos Morales', 'auto', 48, 1, 2, 'Laprida 1322', '0261', '4285245', 'frenosmorales@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.7817975923065!2d-68.85990953374517!3d-32.909704748485424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099e37c89c57%3A0xe2c90d172214f6dd!2sLaprida+1322%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417486490314" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(95, 'Tapiceria Caruana', 'auto', 48, 1, 1, 'Av San MartÃƒÂ­n 2403', '0261', '4307898', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.8992498776665!2d-68.83516180000001!3d-32.874385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e750a78035%3A0x559fc6b3e2f3fea!2sAv+San+Mart%C3%ADn+2403%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559166024" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(96, 'Repuestos de Todo', 'auto', 48, 1, 2, 'Pellegrini 1512', '0261', '4274779', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.603606018405!2d-68.8627149!3d-32.9086472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f16d0eebf%3A0x6fc18ff1c98b28e3!2sPellegrini+1512%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559303714" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(97, 'Mega Baires Autopartes', 'auto', 48, 1, 2, 'Pellegrini 1498', '0261', '4283488', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.6065910412694!2d-68.8614833!3d-32.90856829999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099fa7e93f7b%3A0x97a3b7d780011092!2sPellegrini+1498%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559477838" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(98, 'Guillermo Ficiara', 'auto', 48, 1, 2, 'Alvarez Thomas 150', '0261', '4229166 - 156623944', 'seoficiara@hotmail.com - gdficiaramecanica@hotmail.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.7986908638845!2d-68.84117011614683!3d-32.92991656132184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc1aad763f%3A0x46232b79353d373d!2sAlvarez+Thomas+150%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417559886046" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(99, 'Repuestos de Motos Lopez Cabezas', 'moto', 48, 1, 2, 'Paso de los Andes 1751', '0261', '4271090', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6699.342425745774!2d-68.86035034662103!3d-32.90686017727615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x585a8d8013a8030a!2sPaso+de+Los+Andes+1751%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417560071030" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(100, 'Salinas Eduardo e Hijo', 'auto', 48, 1, 16, 'Palencia 271', '0263', '4425622', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(101, 'Dario Sosa', 'auto', 48, 1, 16, 'Saavedra 218', '0263', '4420859', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3342.9906991202433!2d-68.46266039999999!3d-33.0830293!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43102efe5603%3A0xea8a8af97b15fe03!2sSaavedra+218%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417560619418" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(102, 'Sca - Este SA Mecanica Diesel', 'auto', 48, 1, 16, 'Ruta 7 S/N', '0263', '4420507', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(103, 'Italdiesel - De Vecchi Juan Mario', 'auto', 48, 1, 16, 'Av L N Alem 800', '0263', '4430921', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7064352716473!2d-68.4609862734783!3d-33.08736881699757!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43112880d3c7%3A0xbbbfb6564729049!2sAlem+800%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568289160" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(104, 'Mecanica Ledesma', 'auto', 48, 1, 16, 'Berutti 606 (esquina tropero sosa)        ', '0263', '4431327', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1671.582043258495!2d-68.45978298387148!3d-33.0784674895832!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e430eeb370595%3A0x53a50c6d3df664b3!2sBerutti+606%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568501844" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(105, 'Mecanica Valero', 'auto', 48, 1, 16, 'A Alvarez 219', '0263', '4433295', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6685.338137261838!2d-68.4707261!3d-33.09148989999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43192ddabb4b%3A0x5fbf871ff82d2a4e!2sAlvarez+A.+219%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417568753926" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(106, 'Escapes Daniel ', 'auto', 48, 1, 16, 'Italia 517', '0263', '4432128', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3344.167807276707!2d-68.5601771!3d-33.05204869999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e698f4e37a291%3A0x92f35ee63f1d3150!2sItalia%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417569051877" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(107, 'Taller Mecanico De Hugo Gonzalez', 'auto', 48, 1, 16, 'Las Heras 230 (Palmira)', '0263', '4463565', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.124586252907!2d-68.55551009999999!3d-33.0531867!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e698e9a604f59%3A0xf9752028b4e27f2!2sLas+Heras%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1417569235016" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(110, 'Baterias Herbo', 'auto', 48, 1, 1, 'P B Palacios 60', '0261', '4243981', NULL, 'www.herbo.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.7891004467137!2d-68.83778889999999!3d-32.9037439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b1f95c8a3%3A0x3a05daa7af5daef6!2sPalacios+60%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418156910653" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(111, 'Magnex GNC', 'auto', 48, 1, 1, 'Peru 2165', '0261', '4238595', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.7881603456112!2d-68.84526720000001!3d-32.87732391045002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e35d0eaeaf%3A0x17e099c7e6527c46!2sAv+Per%C3%BA+2165%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157113783" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(112, 'Rodriguez Y Cia', 'auto', 48, 1, 1, 'Peru 2153', '0261', '4234629', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.783511202121!2d-68.8453026!3d-32.877446899999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e35d0eaeaf%3A0xdba25e3cd204a22!2sAv+Per%C3%BA+2153%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157450366" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(113, 'Goldstein', 'auto', 54, 1, 1, 'Montecaseros 1445', '0261', '4253400', NULL, 'www.vwgoldstein.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.4134648392414!2d-68.83273817752384!3d-32.88723488501414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0923b168f4e3%3A0xca0d9e3b60a63a3f!2sMontecaseros+1445%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418157951941" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(114, 'Meschini', 'auto', 55, 1, 2, 'Rodriguez PeÃƒÂ±a 2643', '0261', ' 4133600 - 413620', NULL, 'www.redmeschini.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.815485442679!2d-68.8093838!3d-32.92947289999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c07e0793b65%3A0x17359e37439535a6!2sCarril+Rodr%C3%ADguez+Pena%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418158451013" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(115, 'Cervantes Gas', 'auto', 48, 1, 2, 'Cervantes 1317', '0261', '4050000 - 4050002 ', NULL, 'www.cervantesgas.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4957810607084!2d-68.84088350000002!3d-32.93791759999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bc36026f883%3A0x1e6066291acfb138!2sCervantes+1317%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159170387" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(116, 'Herrera GNC', 'auto', 48, 1, 7, 'Godoy Cruz 2506', '0261', '4502248', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1675.1119516730384!2d-68.80148497071093!3d-32.89224791751795!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ec8edcd928f%3A0xc67b50f4f6deacfa!2sGodoy+Cruz+2506%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159289974" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(117, 'Innova GNC', 'auto', 48, 1, 2, 'Paso de Los Andes 830', '0261', '4284668', 'novagnc@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.345348750258!2d-68.85993610555727!3d-32.9154728098611!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099d6a038941%3A0x740e4fc61e5c5fd7!2sPaso+de+Los+Andes+830%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418159507056" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0);
INSERT INTO `dlg_taller_back` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`) VALUES
(118, 'Ripal GNC', 'auto', 48, 1, 8, 'Av San Martin 6264     ', '0261', '4962037', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3346.9183354152324!2d-68.8588604!3d-32.97955629999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0afd6306629f%3A0x1c08ae7565743a54!2sSan+Mart%C3%ADn%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418160903862" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(119, 'Delta GNC', 'auto', 48, 1, 11, 'Cnel L Barcala 864', '0260', '4429189', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.325821259379!2d-68.31845290000001!3d-34.6212057!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a81da1807ee7%3A0x22e7ba6282436981!2sBarcala+864%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418161104207" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(120, 'Chapla GNC', 'auto', 48, 1, 15, 'San Isidro Norte 3610', '0263', '4444337', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3339.11653382429!2d-68.45929489339294!3d-33.18481337042449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e5c3c42bce50d%3A0x21ec34f8c0aaeb68!2sSan+Isidro%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418161562905" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(121, 'JM Group', 'auto', 48, 1, 14, 'Bordin 577', '0261', '4933330', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3347.9366546042756!2d-68.79096759999999!3d-32.952681799999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c66c5820837%3A0x8b8cb3cb30b938a4!2zQm9yZMOtbiwgTWFpcMO6LCBNZW5kb3ph!5e0!3m2!1ses!2sar!4v1418161712841" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(122, 'GUAY GAS', 'auto', 48, 1, 7, 'N. Avellaneda 2680', '0261', '4262208', 'guay_gas@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6701.250971508959!2d-68.7823939!3d-32.8816271!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ee62b80f9e3%3A0xd0953a6ab1258ee7!2sAvellaneda+2680%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418162256325" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(123, 'Stylo', 'auto', 48, 1, 2, ' Democracia 74        ', '0261', '4247216', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.2702309413344!2d-68.8453649!3d-32.917457899999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0964d8597a29%3A0xe0f1b1d1ec589edf!2sDemocracia+74%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418162594958" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(124, 'Escapes Nahuel', 'auto', 48, 1, 4, 'Coronel Diaz 530        ', '0261', '4302925', 'escapesnahuel@hotmail.com', 'www.escapesnahuel.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.2000069866785!2d-68.82694710000001!3d-32.866427200000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c4ef233183%3A0x1e1eb489e0851cc3!2sCnel.+D%C3%ADaz+530%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418163407189" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(125, 'Manduca - Chiconi', 'auto', 48, 1, 2, 'Alvarez Thomas 141', '0261', '4226751 - 4226123', 'carbugas@infovia.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6697.7261175728045!2d-68.84558035665283!3d-32.92821612920409!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc1aad763f%3A0x5587b934d0619062!2sAlvarez+Thomas+141%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418177551222" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(126, 'Yacopini Motors', 'auto', 56, 1, 2, 'Avenida San Martin Sur 600', '0261', '4222848 - 08106661033 ', NULL, 'www.yacopinigm.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.7687005631396!2d-68.8500124!3d-32.9307088!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd6e3e37437%3A0x3c836a85fd5c8d89!2sAv+San+Mart%C3%ADn+Sur+600%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418177979672" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(127, 'Ficamen', 'auto', 57, 1, 14, 'Rodriguez PeÃƒÂ±a 1982        ', '0261', '4933880 - 4978232', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4733509052853!2d-68.7710968!3d-32.938509999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c46292d1ad7%3A0x937bc2d7c4d30eb7!2sCarril+Rodr%C3%ADguez+Pena%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418178588300" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(128, 'Taller Mariotti', 'auto', 48, 1, 2, 'Juan Gualberto Godoy 170        ', '0261', '4225439', 'info@taller-mariotti.com.ar', 'www.taller-mariotti.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.6107697417265!2d-68.8439969!3d-32.93488049999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdad969bcf7%3A0x917961f1d6d24709!2sGodoy+170%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418179255864" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(129, 'Casa Manino', 'moto', 48, 1, 2, 'Cervantes 760', '0261', '4525170', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.6458880466575!2d-68.8400186!3d-32.933952899999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdc97ee3833%3A0xad09cd16753a325e!2sCervantes+760%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418330194183" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(130, 'Daniel Girala', 'auto', 48, 1, 16, 'Lavalle 951', '0263', '4420454 - 4420147', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3343.4577149079328!2d-68.47198824550786!3d-33.070740874908324!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43abc41ec099%3A0x474695819b79310e!2sLavalle+951%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418330837662" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(131, 'Acumuladores Cortese', 'auto', 48, 1, 14, 'Sarmiento 813', '0261', '4978993', 'acumuladorescortese@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.3010993132507!2d-68.8190905!3d-32.943059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0b8ce862ea2f%3A0x68cd7d3a5d36cfbe!2sSarmiento%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331094322" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(132, 'Baterias Garcia', 'auto', 48, 1, 7, 'Coronel Moldes 1432 ', '0261', '4312730', 'bateriasgarcia@speedy.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.387324400858!2d-68.8240136!3d-32.9143635!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e095a43178345%3A0x8203d5dfbd63108b!2sMoldes+1432%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331298568" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(133, 'Paulucci Motos', 'moto', 48, 1, 7, 'Godoy cruz 223', '0261', '155276254', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.356461865168!2d-68.82785044788513!3d-32.888742423679524!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924b8ecccd9%3A0x2d9ea402473c6910!2sGodoy+Cruz+223%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331645920" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(134, 'El Emporio del Volkswagen', 'auto', 54, 1, 7, 'Godoy Cruz 336', '0261', '4455224', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3475086804224!2d-68.8263289!3d-32.8889792!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0x58a1ea1fbf396327!2sGodoy+Cruz+336%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418331794186" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(135, 'Panasitti', 'auto', 48, 1, 2, 'Carril Sarmiento 1280        ', '0261', '4524040', 'tallerespanasitti2000@yahoo.com.ar ', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.4426621527086!2d-68.8327561812296!3d-32.939320501449515!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bebb58e7565%3A0x1cffd25e57c76d6c!2sSarmiento+1280%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418342032879" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(136, 'Carrocerias Marri Colonnese', 'auto', 48, 1, 2, 'Independencia 739', '0261', '5462588 - 4521079', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4909913968736!2d-68.82813069999999!3d-32.938044099999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0beea9e8fad1%3A0xdb89d3ce246e055a!2sIndependencia+739%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418342546492" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(137, 'Taller Fraile', 'auto', 48, 1, 13, 'Boulevard belgrano 537                                                                                ', '0261', '4261771', NULL, NULL, '                                                                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(138, 'Lavajet', 'auto', 48, 1, 1, 'Avda. Juan B. Justo 66                        ', '0261', '4294488', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.546775944223!2d-68.85080661058969!3d-32.88370901111999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09028a91f113%3A0x5bc47d849c1bcab!2sAv+Juan+B.+Justo+66%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418682780593" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(139, 'Pueyrredon Motos', 'moto', 48, 1, 2, 'Carola lorenzini 50', '0261', '4222107 - 4222108', 'info@pueyrredonmotos.com', 'www.pueyrredonmotos.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.100033711028!2d-68.8483261!3d-32.921955199999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097cebaae3d5%3A0x61bd6be971581b7e!2sLorenzini+C.+50%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418683405753" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(140, 'NR Motos', 'moto', 48, 1, 8, 'Patricios 338', '0261', '4986161', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3344.7124248451514!2d-68.88282535078734!3d-33.03770606201612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e756aa3e7a9ad%3A0x85f4e8adf0ce6c8e!2sPatricios+338%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418683671929" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(141, 'SURPRO', 'auto', 48, 1, 9, 'Av. San Martin  571                                                ', '0260', '4472340', 'carpro.grupomsm@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12997.19859887117!2d-69.58087160000001!3d-35.47212925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sav.+san+martin%2C+malargue!5e0!3m2!1ses!2sar!4v1418684266313" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(142, 'Navarrete Lubricentro y Accesorios', 'auto', 48, 1, 9, 'Av. 4Ã‚Â° DivisiÃƒÂ³n y Adolfo Puebla', '0260', '4471692 - 4472254', 'navarrete1989@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(143, 'Ninja Motos', 'moto', 48, 1, 15, 'Pbro Olguin 85', '0263', '4446033', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(144, 'Modica Motos', 'moto', 48, 1, 7, 'Banderas de los Andes 747        ', '0261', '4319246', 'info@modicamotos.com', 'www.modicamotos.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.1468360615695!2d-68.8229482!3d-32.8942858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093a030ae921%3A0xc18328eab326156a!2sAv+Bandera+de+Los+Andes+747%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418685408141" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(145, 'Lavalle Motos', 'moto', 48, 1, 7, 'Adolfo Calle 795', '0261', '4317933', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.931356872372!2d-68.8257766!3d-32.8999831!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09387e060135%3A0x82d7321821000321!2sAdolfo+Calle+795%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418685884756" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(146, 'Rodanova Llantas', 'auto', 48, 1, 7, 'Higueritas y Bandera de los Andes ', '0261', '4211482', 'roda_nova@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(147, 'Panamericana Sur', 'auto', 48, 1, 2, 'Avenida San Martin Sur 1823                ', '0261', '4401111 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.257641170094!2d-68.85161370000002!3d-32.9442066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bc96fc19bcb%3A0x3c34b63bc9747a6e!2sAv+San+Mart%C3%ADn+Sur+1823%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418687507419" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(148, 'Paul Llaver Neumaticos', 'auto', 48, 1, 8, 'Balcarce 102        ', '0261', '4988783', 'info@paulllaver.com.ar', 'www.paulllaver.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1672.3458503256174!2d-68.87945917368012!3d-33.03825193980845!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e7515892eb59b%3A0x9347c4c118b09e31!2sBalcarce+102%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418687846089" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(149, 'Verdini Sport', 'auto', 48, 1, 2, 'San martin 333        ', '0261', '4242414 - 4242464', NULL, 'www.verdinisport.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.1510575959537!2d-68.8473729!3d-32.9206044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097ca889d409%3A0xbc32a33b9bce67f0!2sAv+San+Mart%C3%ADn+333%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688221289" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(150, 'Motos Parra', 'moto', 48, 1, 1, 'Av. J. V. Zapata 344', '0261', '4290340', 'motosparramendoza@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.090860074109!2d-68.83924518521118!3d-32.89576589717179!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091611b48643%3A0xcf14d1071d923275!2sAv+Zapata+344%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688592105" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(151, 'Motos Quezada', 'moto', 48, 1, 16, 'Las Heras 230        ', '0263', '4429543', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13371.785060199609!2d-68.46636991185608!3d-33.084198267574436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e431cf698e74b%3A0xd56b828e7222d82a!2sLas+Heras+230%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418688853891" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(152, 'MB', 'moto', 48, 1, 7, 'A. Calle 380', '0261', '4311137', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9350371611145!2d-68.830612!3d-32.8998858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093f6d52a6b1%3A0xad4a3023650d6c9d!2sAdolfo+Calle+380%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418689117716" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(153, 'Off Road Argentina', 'moto', 58, 1, 2, 'Peltier 40                ', '0261', '4400777', NULL, 'www.husabergargentina.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.14935729615!2d-68.8478855!3d-32.94706589999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bb7fd9676c1%3A0xaf9e3d5dfb1cfe36!2sPeltier%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418689678509" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(154, '2M SA', 'auto', 48, 1, 1, 'Chacabuco 567                                ', '0261', '4252134', 'info@2msa.com.ar', 'www.2msa.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.776212231378!2d-68.82904206878912!3d-32.877639987887655!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08df3547de4d%3A0xfcb68c85a587c51b!2sChacabuco+567%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418758321658" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(155, 'Irigoyen Centro de Servicio', 'auto', 48, 1, 1, 'Hipolito irigoyen 410', '0261', '4240050 - 152030812', 'irigoyencentrodeservicios@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.80262478591!2d-68.84759704285275!3d-32.903386376605766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e090d391c4ca3%3A0x205e4a1cd522e6b9!2sHip%C3%B3lito+Yrigoyen+410%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418758933770" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(156, 'Foreste GNC', 'auto', 48, 1, 2, 'San Martin Sur 1009', '0261', '4221278', 'gncforeste@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.6147071546584!2d-68.850438!3d-32.93477649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd1a56c0047%3A0xa36e63aea829f0c6!2sAv+San+Mart%C3%ADn+Sur+1009%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418759274962" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(157, 'Mediterraneo', 'auto', 59, 1, 2, 'Av. San Martin Sur 901        ', '0261', ' 5245290 ', NULL, 'www.mediterraneo.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.6453693803633!2d-68.8502361!3d-32.933966600000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bd1a86e7431%3A0xa95b398beb0d1858!2sAv+San+Mart%C3%ADn+Sur+901%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418759764186" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(158, 'Taller Appiolaza', 'auto', 59, 1, 7, 'San juan de Dios 353', '0261', '4320616', NULL, 'www.tallerappiolaza.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9172899859773!2d-68.8339858!3d-32.90035499999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093fc2caae1f%3A0xc987ec8970fcd620!2sSan+Juan+de+Dios+353%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418760370125" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(159, 'Auto Select', 'auto', 59, 1, 15, ' VicuÃƒÂ±a prado 136', '02623', '4442906', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6677.382942639761!2d-68.46597799999999!3d-33.195964000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sVicu%C3%B1a+prado+136%2C+Rivadavia%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418761202184" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(160, 'Rubio y Fuentes', 'auto', 59, 1, 11, 'Av. Mitre 1540', '0260', '4430244', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.2240374666717!2d-68.3073055!3d-34.6237783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a82233d9bba7%3A0xf40ac80115cc91e2!2sAv+Mitre+1540%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418761983861" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(161, 'High Tech Moto', 'moto', 48, 1, 11, 'Barcala 1420', '0261 ', '153829650', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.214830466607!2d-68.31013109999999!3d-34.624011!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a8220e96e301%3A0xeca59921bea5d829!2sBarcala+1420%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762173502" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(162, 'Taller de Juan Redondo', 'auto', 48, 1, 1, 'Granaderos 1742', '0261', '4297886 - 4639573', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.6776638720803!2d-68.8553116!3d-32.8802469!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08fee1265869%3A0xc740580ea7c54a93!2sGranaderos+1742%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762404177" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(163, 'Sexta Frenos', 'auto', 48, 1, 1, 'Rodriguez 2980', '0261', '4233481', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6702.234745408377!2d-68.8477234595305!3d-32.86861380948893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08f1c3a4e195%3A0xe3bd4d4df0f9f568!2sRodr%C3%ADguez+2980%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762560315" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(164, 'Frenos Revillard', 'auto', 48, 1, 1, 'Olascoaga 445', '0261', '4234055', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1073077387546!2d-68.8554996!3d-32.895331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e090887dd5eb7%3A0xf7146ec88fe02f43!2sOlascoaga+445%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418762780876" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(165, 'Orofino Radiadores', 'auto', 48, 1, 7, 'O Brien 360', '0261', '4456735', 'radiadoresorofino@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3890040073484!2d-68.82623439999999!3d-32.887881799999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924e437ba79%3A0x15e1d004ca853123!2sO+Brien+360%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763022859" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(166, 'Puliafito Autopartes', 'auto', 48, 1, 7, '25 de mayo        ', '0261', '4310100', 'info@puliafitoautopartes.com.ar', 'www.puliafitoautopartes.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0185653920553!2d-68.83051569999999!3d-32.8976774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093eee4f9639%3A0xf0f9060d0fbf2b43!2s25+de+Mayo+380%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763279351" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(167, 'Felipetta Radiadores ', 'auto', 48, 1, 7, 'Godoy Cruz 1421', '0261', '4312344', 'felipettasrl@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3266660222594!2d-68.8147524!3d-32.8895304!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093250b518e5%3A0xb91beaf96cfb635a!2sGodoy+Cruz+1421%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763465570" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(168, 'Cerrajeria Maranatha', 'auto', 48, 1, 4, 'Manuel A Saez 1470        ', '0261', '155634580', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3351.636684706081!2d-68.82278839999995!3d-32.854870000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08b78e66e003%3A0xcc48648564b00ce6!2sManuel+S%C3%A1ez+1470%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418763726744" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(169, 'Taller de Pedro y Sebastian Lucentini', 'auto', 48, 1, 7, 'Allayme 108', '0261', '4321580 - 156433955', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0627859851406!2d-68.8150026!3d-32.8965082!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0935b20eddff%3A0xebcf84a8daa16c4a!2sAllayme+108%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418774764494" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(170, 'Nico Shopping ', 'auto', 48, 1, 7, 'Pascual Toso 54', '0261', '4459000', 'info@nicoshopping.com ', 'www.nicoshopping.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.300101771388!2d-68.82979130000004!3d-32.890232899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093cace1d2b9%3A0x939a94a07f05695c!2sTosso+13%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418776805532" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(171, 'SR Repuestos', 'auto', 48, 1, 7, 'Godoy Cruz 310', '0261', '4455951 - 4456760', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.3472061767166!2d-68.8261143!3d-32.888987199999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0x8b9d51675891987!2sGodoy+Cruz+310%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418847435749" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(172, 'Derwagen Repuestos Volkswagen ', 'auto', 48, 1, 7, 'Godoy Cruz 267                ', '0261', '4457800', 'derwagen@ymail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.349002291516!2d-68.8272002!3d-32.88893970000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924b8ecccd9%3A0x4dae6a54a024af55!2sGodoy+Cruz+267%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418848131957" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(173, 'La Casa de la Cerradura', 'auto', 48, 1, 1, 'Lavalle 565        ', '0261', '4254777', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.353256238444!2d-68.83078080000001!3d-32.8888272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092317216673%3A0x415065f68153fb89!2sLavalle+555%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418848864916" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(174, 'LM Parabrisas', 'auto', 48, 1, 7, 'Saavedra 370                                                                ', '0261', '4324679 - 4241895', 'info@lmparabrisas.com.ar', 'www.lmparabrisas.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.244687690207!2d-68.8264531!3d-32.89169830000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e093b025f531f%3A0x35c67860e446d083!2sSaavedra+370%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418849889929" width="320" height="240" frameborder="0" style="border:0"></iframe>                                                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(175, 'Rivadavia Accesorios', 'auto', 48, 1, 13, 'San Isidro 1299        ', '0263', '4443195', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3338.658423567399!2d-68.46597609999999!3d-33.1968308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e5c28bce3565b%3A0x86fb2989b0c436f7!2sSan+Isidro%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850046247" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(176, 'Cerrajeria Key Li', 'auto', 48, 1, 2, 'Paso de los andes 1750 \r\n        ', '0261', '4287319', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.8346837018391!2d-68.86107167857791!3d-32.906908958908495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e099f8f8386d5%3A0x1dce95f55253d276!2sPaso+de+Los+Andes+1750%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850262768" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(177, 'Cerrajeria Taboada', 'auto', 48, 1, 8, 'Taboada 349        ', '0261', '4981072', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1672.2988140135537!2d-68.8826874853285!3d-33.04072972365851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e756acab59eb3%3A0xf4197559a4366a5!2sTaboada+349%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850452791" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(178, 'Cerrajeria Luis Jopia', 'auto', 48, 1, 1, 'Sobremonte 410', '0261', '4257943', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.0896751198306!2d-68.85780013254086!3d-32.89579722867289!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09080236f2d5%3A0x78f1524a151a8702!2sSobremonte+410%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418850900286" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(179, 'Cerrajeria Y Pesca San Pedro', 'auto', 48, 1, 14, 'J D Peron 120\r\n', '0261', '4973982', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3346.8016920280875!2d-68.7883949!3d-32.982633400000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0cbf70db0f4f%3A0x47ef58d2601e2d7e!2sPres.+Juan+Domingo+Per%C3%B3n+120%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418851223730" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(180, 'Cerrajeria Total', 'auto', 48, 1, 1, 'Videla Correa 521 ', '0261', '4306212', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.028764409364!2d-68.84098552327706!3d-32.870958355554016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08ef584fa961%3A0xcb3b4c776f0b9201!2sVidela+Correas+521%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418852428627" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(181, 'Alameda ', 'auto', 48, 1, 1, 'Maipu 23', '0261', '4202373', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.8274770745165!2d-68.835475!3d-32.876283799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08e0a2f7f825%3A0x9c4b0a0ba5aa6e72!2sMaip%C3%BA+23%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418852792500" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(182, 'Gustavo Alonso Mecanica Integral', 'auto', 48, 1, 2, 'Jose Ingenieros 169 ', '0261', '4392568', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.447107471927!2d-68.84996769999998!3d-32.93920310000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bce54c6e9c3%3A0xbab9bb50cf779bf3!2sIngenieros+169%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853101490" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(183, 'Alta Gamma', 'auto', 48, 1, 2, '', '0261', '4220589 - 4220578', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.639137555787!2d-68.84224396745911!3d-32.93413120640036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0bdb0cfb62ad%3A0x961e289e41a05f52!2sFigueroa+Alcorta+884%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853288218" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(184, 'Guillermo J. Alvarez', 'auto', 48, 1, 2, 'Renato della Santa 2145        ', '0261', '154168551', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.8132231716995!2d-68.86252790000005!3d-32.903106199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09a116d03c81%3A0x93b27a4ffe3bcebd!2sDella+Sta+Renato+2145%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853511151" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(185, 'AMF Moto Service', 'moto', 48, 1, 2, 'Beltran Sur esquina lavalle ', '0261', '4221694 ', 'amfmotoservice@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.983419686515!2d-68.84968269999999!3d-32.925036299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097d97099a95%3A0x87da6e1715570de5!2sLavalle+902%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418853821925" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(186, 'Ariel Musri Mecanica', 'auto', 59, 1, 7, 'Guillermo Molina 78                ', '0261', '153840185 - 156828147 ', 'arielmusri1987@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.7345173251388!2d-68.8358945!3d-32.9051868!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096a66bf2c09%3A0xda0dd94ca112ef18!2sMolina+J.+78%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418854193721" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(187, 'Deliberto', 'auto', 48, 1, 7, 'Pueyrredon 416        ', '0261', '4314753', ' flaviodeliberto@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.6228893810803!2d-68.83494350000001!3d-32.908137499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969e116847b%3A0xd09b0fc1eccaaa28!2sSan+Juan+de+Dios+1402%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418854933109" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(188, 'Gruas Gama', 'auto', 48, 1, 1, 'Av. EspaÃƒÂ±a 3353        ', '0261', '4307018 - 155165304', 'gruas.gama@hotmail.com', 'www.transportes-gama.km6.net', '        ', NULL, NULL, NULL, 1, 0, 0, 0),
(189, 'Remol Car', 'auto', 48, 1, 14, 'Matienzo 81        ', '0261', '4975526 - 154548819', 'patriciorinordelli@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.012254168164!2d-68.78739949999999!3d-32.977078500000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0c94d8758065%3A0x9fc8c466a134f603!2sMatienzo+81%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418856371014" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(190, 'Auxilio Mecanico Sema', 'auto', 48, 1, 11, 'Reconquista 165', '0260', '4422635', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.1849063532127!2d-68.31087409999999!3d-34.624767299999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a818a330a9c1%3A0xafbdb4576fdcefe0!2sReconquista+165%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418950870029" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(191, 'Auxilio Mecanico San Rafael', 'auto', 48, 1, 11, 'Lugones 290', '0260', '4421986 - 154612041', 'remolquesanrafael@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6566.92952092198!2d-68.34154861429442!3d-34.61769372160115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96790804297ca985%3A0x387b7fc7b187edcb!2sLugones+290%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951066081" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(192, 'Gruas Olguin Humberto', 'auto', 48, 1, 16, 'Gutierrez 930 \r\n', '0263', '4431035', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3342.761913946349!2d-68.46215911349184!3d-33.08904776907987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43170733380f%3A0x9834a716554bdde6!2sGuti%C3%A9rrez+930%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951664690" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(193, 'Auxilio San Javier', 'auto', 48, 1, 16, 'D French 342', '0263', '154410567', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1671.5767378465594!2d-68.46532522089198!3d-33.078746675643025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e430f58db9831%3A0x4c6bc0edbfaf2558!2sFrench+342%2C+San+Mart%C3%ADn%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951818959" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(194, 'Asistencias Mendoza', 'auto', 48, 1, 7, 'Catamarca 1731', '0261', '154549509', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6701.429045004409!2d-68.79614892595225!3d-32.87927189551345!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0edb9a1488e3%3A0x3afb958960abc471!2sCatamarca+1731%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418951989331" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(195, 'Servicios Del Valle De Daniel Zani', 'auto', 48, 1, 12, 'J B Alberdi 116', '02622', '424706', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13297.260492911473!2d-69.01321409999998!3d-33.57116649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967c25d079a97753%3A0x3e4c6493ea8f5bc3!2sTunuy%C3%A1n%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418952097576" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(196, 'Auxilio El Faro ', 'auto', 48, 1, 1, 'Ituzaingo 3147', '0261', '4306774', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.171643428992!2d-68.82774290899468!3d-32.867177750805894!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c35bd6397d%3A0x779c74b6a0d87692!2sItuzaing%C3%B3+3147%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418953598441" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(197, 'Talleres Coco', 'auto', 48, 1, 1, 'Paraguay 3185', '0261', '4306853', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1921126458733!2d-68.82551579999999!3d-32.8666361!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c521a3f859%3A0xd7bf357a5b4abfb1!2sParaguay+3185%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418953991963" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(198, 'Taller de Frenos y Embragues Marini', 'auto', 48, 1, 1, 'Videla Castillo 3131', '0261', '4304225', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1666687374372!2d-68.82751877486878!3d-32.86730938853303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08c4bf979805%3A0x859fbd5cc835b7d8!2sVidela+Castillo+3131%2C+Mendoza!5e0!3m2!1ses!2sar!4v1418954324174" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(199, 'Marini Camiones', 'auto', 48, 1, 2, 'Republica del Libano 965', '0261', '154547143', 'marinicamiones@hotmail.com', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
(200, 'Antonio Allegreti', 'auto', 48, 1, 14, 'Emilio Civit 478        ', '0261', '4814366 - 4810078 ', 'allegretti_bosch@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3347.176780730853!2d-68.8152522!3d-32.9727375!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0b7cbd73365f%3A0xd0779f5e039b2207!2sEmilio+Civit%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019139781" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(201, 'Dario Dalmaso Inyeccion	', 'auto', 48, 1, 8, '25 de Mayo 33', '0261', '4982893 - 155253030', 'dario.dalmaso@yahoo.com.ar', 'www.dalmasoinjection.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13379.933810270139!2d-68.87114320778183!3d-33.030566422481115!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e7539510480ef%3A0x727d952c091da249!2s25+de+Mayo+33%2C+Luj%C3%A1n+de+Cuyo%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019713235" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(202, 'F.G.Servicios', 'auto', 48, 1, 11, 'Ortiz de Rosas 733', '0260 ', '4424444', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.165759831954!2d-68.32280172883569!3d-34.625251200287025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679a80351254c61%3A0x6c7f1aca124e821b!2sOrtiz+de+Rosas+733%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419019991637" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(203, 'Megamecanica ', 'auto', 48, 1, 7, 'Remedios De Escalada 1160        ', '0261', '4313996 - 4319114', 'info@megamecanica.com.ar', 'www.megamecanica.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1674.8446704816229!2d-68.83132165949031!3d-32.90638099066534!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09417de26d25%3A0xc8e607b8e5f59b3b!2sRemedios+de+Escalada+1160%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419020594507" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(204, 'Osamec', 'auto', 48, 1, 1, 'Cnel. Ramirez 2664        ', '0261', '4307933', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.9663700694528!2d-68.82340659999998!3d-32.87260919999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08da04fdda47%3A0x200f94fee92fb92c!2sRam%C3%ADrez+2664%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419021252897" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(205, 'Ricardo Cabrera', 'auto', 48, 1, 14, 'Ozamis 74', '0261', ' 4973279', 'ricardofelixcabrera@yahoo.com.ar', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13386.919348640908!2d-68.78994087406616!3d-32.98452883389947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0cbecc89478f%3A0xebc4e26eab668176!2sOzamis+JA+74%2C+Maip%C3%BA%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419021403681" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(206, 'Salvador Sanchez Neumaticos	', 'auto', 48, 1, 1, 'Coronel Plaza 72', '0261', '4259148 - 4204938', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.708560639638!2d-68.84388899999999!3d-32.879427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa0cdf83842d2012b!2sSindicato+Unido+De+Trabajadores+De+La+Educacion!5e0!3m2!1ses!2sar!4v1419021678244" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(207, 'Roly Motors', 'auto', 48, 1, 6, 'Avenida Libertador Sur 485', '02625', '424230 - 434830 ', 'warnesservicios@gmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13077.222889054368!2d-67.68569179999999!3d-34.9740062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96781a11c548fc9d%3A0xfa291ac4eb8ae6ae!2sGral+Alvear%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419022194828" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(208, 'El Vasquito', 'auto', 48, 1, 7, 'Bandera de Los Andes 2398', '0261', '4319702 ', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.081437763443!2d-68.80923148230899!3d-32.89601503275016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0eb61ad37de1%3A0x840d27443ad386b3!2sAv+Bandera+de+Los+Andes+2398%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419293850182" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(209, 'Olcoz Motociclismo', 'moto', 48, 1, 1, 'Av. ColÃƒÂ³n 480', '0261', '4236960', 'olcozmotos@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.1646257121897!2d-68.8467596!3d-32.8938154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09101ccdc461%3A0xe7f35f9cf2befb89!2sAv+Col%C3%B3n+480%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419540581450" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(210, 'ProLube ', 'auto', 48, 1, 4, 'Burgos 595                                ', '0261', '4489168  - 4482367', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.943473764865!2d-68.84121139999999!3d-32.8467483!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0899873e11a7%3A0x6e75d8926946255d!2sBurgos+595%2C+Las+Heras%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419541063323" width="320" height="240" frameborder="0" style="border:0"></iframe>                                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(211, 'GM Neumaticos', 'auto', 48, 1, 2, 'San Martin Sur 26', '0261', '4226778', 'ventas@gmneumaticos.com.ar', 'www.gmneumaticos.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.003511973358!2d-68.84944852774635!3d-32.92450545289485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e097d6b138c29%3A0x9ac79d79141bca88!2sAv+San+Mart%C3%ADn+Sur+26%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419541424476" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(212, 'Neumaticos Medrano', 'auto', 48, 1, 11, 'Av. Balloffet 730        ', '0260', '4430888', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3283.3725015427026!2d-68.35101656562652!3d-34.62002579316234!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9679081b6010c0c9%3A0xa5b0e88ef7e19136!2sBalloffet+730%2C+San+Rafael%2C+Mendoza!5e0!3m2!1ses!2sar!4v1419542123513" width="320" height="240" frameborder="0" style="border:0"></iframe>        ', NULL, NULL, NULL, 1, 0, 0, 0),
(213, 'Moretto', 'auto', 48, 9, 23, 'Fitz Roy 2040', '011', '47734338', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.9005208287945!2d-58.433129!3d-34.581383599999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb591c1d7fb83%3A0x8d567ed9cd7edc2e!2sFitz+Roy+2040%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673439518" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(214, 'Talleres Gorriti', 'auto', 48, 9, 23, 'Gorriti 5917', '011', ' 47718931', NULL, 'www.talleres-gorriti.blogspot.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6569.834844661938!2d-58.44265209604797!3d-34.58095596529435!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5ed280d209f%3A0x33179d60e302598d!2sGorriti+5917%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673632298" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(215, 'Rep Car Sh', 'auto', 48, 9, 23, 'C Arenal 2440 \r\n', '011', '47713667', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13140.947600385929!2d-58.436099634151326!3d-34.57287180202606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59573eaca03%3A0x3bc0e61df7a40fd4!2sConcepci%C3%B3n+Arenal+2440%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420673761197" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(216, 'Servicio Para El Automotor Juanjo', 'auto', 48, 9, 23, 'Honduras 3992', '011', '48664200 - 48637269', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.3973142994387!2d-58.419450399999995!3d-34.59411339999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7dc234281d%3A0x392068e28529dd23!2sHonduras+3992%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420674012190" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(217, 'Taller La Biela', 'auto', 48, 9, 23, 'J Alvarez 1825                ', '011', '48661037', 'consultas@tallerlabiela.com.ar', 'www.tallerlabiela.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.5338465124532!2d-58.4210611!3d-34.590659900000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7f19e6d059%3A0x1a540d1272b43a8d!2sJuli%C3%A1n+Alvarez+1825%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420674265835" width="320" height="240" frameborder="0" style="border:0"></iframe>                ', NULL, NULL, NULL, 1, 0, 0, 0),
(218, 'Costanera Suspension ', 'auto', 48, 1, 1, 'Moron 499', '0261', '4240126', 'info@costanerasuspension.com.ar ', 'www.costanerasuspension.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.9460628398606!2d-68.83750169999999!3d-32.8995943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0915084ed517%3A0x7e2826a1769a2ef5!2sMor%C3%B3n+499%2C+Mendoza!5e0!3m2!1ses!2sar!4v1420750548239" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 5, 5, 5),
(219, 'Renault Minuto', 'auto', 59, 1, 1, 'Av. Vicente Zapata 246', '0261', '4232722', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.0967825486714!2d-68.837241!3d-32.8956093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09166779669b%3A0x95fb129351e4caef!2sAv+Zapata+246%2C+Mendoza!5e0!3m2!1ses!2sar!4v1420751328361" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(220, 'Taller El Salvador', 'auto', 48, 9, 23, 'El Salvador 5475', '011', '47715191', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.787772199048!2d-58.434336699999996!3d-34.5842362!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58e76d8a4e9%3A0xa937c267cfb39dbf!2sEl+Salvador+5475%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420763659869" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0);
INSERT INTO `dlg_taller_back` (`idtaller`, `nombre`, `tipovehiculo`, `idmarca`, `idprovincia`, `idlocalidad`, `domicilio`, `telefonocodarea`, `telefono`, `email`, `web`, `googlemap`, `foto1`, `foto2`, `foto3`, `activo`, `atencion`, `precio`, `servicio`) VALUES
(221, 'Talleres Estrella', 'auto', 48, 9, 23, 'Soler 4249', '011', '48629333', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.565140299691!2d-58.420821700000005!3d-34.58986829999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca7f7268b035%3A0x72370c123696299f!2sSoler+4249%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses!2sar!4v1420763938933" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(222, 'Taller Ghiotti', 'auto', 48, 1, 4, 'Lisandro Moyano 99', '0261', '4300704  - 154150164', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.247063935239!2d-68.82082621877139!3d-32.86518195484625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08cf8b82995b%3A0x3b19c6e5350cf8cd!2sMoyano+99%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421192823546" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(223, 'Taller Martinez', 'auto', 48, 1, 1, 'Chenaut 3210', '0261', '4306826', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.1750465084287!2d-68.8201006!3d-32.8670877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08d02c3957e5%3A0xf9e957ffb2e1dfe0!2sChenaut+3210%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421193764403" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(224, 'Taller de Radiadores Molsson E Hijos', 'auto', 48, 1, 4, 'Guido Spano 47', '0261', '4302704', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3351.208713761832!2d-68.82159209999998!3d-32.86619679999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08cfebbcfd73%3A0x9914d16529b64946!2sGuido+Spano+47%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421194121739" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(225, 'Box Autoexpress', 'auto', 48, 1, 2, 'Av. San Martin 1360', '0261', '4242188 - 4242797', 'info@boxautoexpress.com.ar', 'www.boxautoexpress.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3349.5304501648334!2d-68.84469469999999!3d-32.910580800000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096e48a3632f%3A0x679f048df64ba49e!2sAv+San+Mart%C3%ADn+1360%2C+Godoy+Cruz%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421194534481" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(226, 'MH Parabrisas', 'auto', 48, 1, 1, 'San Juan 510', '0261', '4290312', NULL, 'www.parabrisasmh.com.ar', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.023708896139!2d-68.83879785211485!3d-32.897541406773065!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e091416745b2f%3A0x8c5d8ba2acafb977!2sSan+Juan+510%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421715967301" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(227, 'Mendoza Suspensiones', 'auto', 48, 1, 1, 'Gobernador Gonzalez 621 ', '0261', '4373364', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3351.109300631476!2d-68.8270608!3d-32.8688274!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08db3740557f%3A0xf05590e1f783469d!2sGdor.+Gonz%C3%A1lez+621%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421716401435" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(228, 'Escapes Polo', 'auto', 48, 1, 7, 'O V ANDRADE 259', '0261', '4321108', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.5512933129244!2d-68.8357319!3d-32.9100299!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0969cc8512cd%3A0x38f819da79bbbe1!2sAndrade+259%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421800759689" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(229, 'Rponce Inyeccion', 'auto', 48, 1, 1, ' Jujuy 569', '0261', '4301333', 'fedeponce_74@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3350.988938028892!2d-68.82810429999999!3d-32.8720121!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e08db88d484bb%3A0xb11019be48a281e9!2sJujuy+569%2C+Mendoza!5e0!3m2!1ses!2sar!4v1421801269395" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(230, 'Guevara Alarmas', 'auto', 48, 1, 7, 'M. De Azcuenaga 608                        ', '0261', '4265454', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.656816439659!2d-68.79763875106507!3d-32.9072407191825!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0ea508399e5d%3A0x7e8ef108f64ea4f9!2sMiguel+de+Azcu%C3%A9naga+608%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422316766188" width="320" height="240" frameborder="0" style="border:0"></iframe>                        ', NULL, NULL, NULL, 1, 0, 0, 0),
(231, 'Cerrajeria Marcopolo', 'auto', 48, 1, 1, 'Buenos Aires 157', '0261', '155066805', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4070289318975!2d-68.83628797672118!3d-32.88740509638359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e09189526367d%3A0xa700cef20677671!2sBuenos+Aires+157%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317010567" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(232, 'TapiSport', 'auto', 48, 1, 7, 'Godoy Cruz 395', '0261', '4450183', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.348208219994!2d-68.82682409999997!3d-32.8889607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0924daa17587%3A0xab308438c5f001c5!2sGodoy+Cruz+395%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317429898" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0),
(233, 'Escapes Necochea', 'auto', 48, 1, 7, 'O''Brien 41                                ', '0261', '4451714 - 155519689', 'escapesnecochea@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.3822659213906!2d-68.82180000000001!3d-32.88805999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092ff111452f%3A0x91a00dffc304c3fa!2sO+Brien%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317667612" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(234, 'Autopartes San Jose', 'auto', 48, 1, 7, 'Alberdi 1064                                ', '0261', '4458482 - 154530544', 'luisc_santero@hotmail.com', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4261649900673!2d-68.8274391!3d-32.886898999999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e092461d9e7fb%3A0x9ecd83cbc7e8ed47!2sAlberdi+1064%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422317826405" width="320" height="240" frameborder="0" style="border:0"></iframe>                                ', NULL, NULL, NULL, 1, 0, 0, 0),
(235, 'Audio Shop', 'auto', 48, 1, 1, 'Brasil 407', '0261', '4247166', NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3349.7637327427387!2d-68.83872219999999!3d-32.9044145!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e096b10f8ac0b%3A0x2cd9a985352c4ce3!2sBrasil+407%2C+Mendoza!5e0!3m2!1ses!2sar!4v1422322382688" width="320" height="240" frameborder="0" style="border:0"></iframe>', NULL, NULL, NULL, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlg_usuario`
--

CREATE TABLE `dlg_usuario` (
  `idusuario` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `nombreyapellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `telefonocodarea` varchar(10) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `provincia` varchar(20) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `nick` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL,
  `fblogin` int(11) NOT NULL DEFAULT '0',
  `fbid` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dlg_usuario`
--

INSERT INTO `dlg_usuario` (`idusuario`, `idgrupo`, `nombreyapellido`, `email`, `clave`, `fechanacimiento`, `telefonocodarea`, `telefono`, `pais`, `provincia`, `localidad`, `nick`, `activo`, `fblogin`, `fbid`) VALUES
(1, 1, 'Juan Barranco', 'delagrua1@gmail.com', 'faeb1602396780d539dc4e265810c670', '2014-08-29', NULL, NULL, NULL, NULL, NULL, 'Juan', 1, 0, 0),
(26, 2, 'Nora Alejandra Costa', 'noraalejandracosta@gmail.com', '5f0df5f1540fe4cea7511d5a447a949a', '1976-11-28', '0261', '4273152', 'Argentina', 'Mendoza', 'Capital', 'ncosta', 1, 0, 0),
(28, 2, 'JosÃƒÂ© Barranco', 'josetomasbarranco@gmail.com', 'cff1150bbc02f1abc0ff8d8650957d6c', '1993-03-30', '261', '154188049', 'Argentina', 'Mendoza', 'Mendoza', 'osti', 1, 0, 0),
(37, 2, 'JosÃƒÂ© Barranco', 'josetomasbarranco2@gmail.com', '', NULL, NULL, NULL, 'argentina', 'mendoza', 'mendoza', 'pepito', 1, 1, 368986173265237),
(38, 2, 'juancito', 'jdukwdodir@gaÃƒÂ±d.com', 'cd361be9b19227768a91554931cfa791', '1993-09-02', '25415', '145521', 'argentina', 'mendoza', 'mendoza', 'bostero', 1, 0, 0),
(45, 2, 'Adriano Torinetti', 'atorinetti@gmail.com', '296472c9542ad4d4788d543508116cbc', '1991-09-19', '0261', '4273152', 'Argentian', 'Mendoza', 'Ciudad', 'adri', 1, 0, 0),
(46, 2, 'ffdg', 'ncosta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1987-09-16', '43543', '3453453', 'fdfs', 'sdfsdf', 'sdfsd', 'nori', 1, 0, 0),
(47, 2, 'Juan Sanz', 'jebsgt@gmail.com', '', NULL, NULL, NULL, 'argentina', 'entrew rios', 'mendoza', 'copo', 1, 1, 10204765642924143),
(48, 2, 'pepito', 'clflf@fdf.com', 'd2104a400c7f629a197f33bb33fe80c0', '1981-09-18', '521222', '21212', 'arg', 'dsd', 'dsds', 'popi', 1, 0, 0),
(49, 2, 'Nora Costa', 'ncosta@authenware.com', '', NULL, NULL, NULL, 'ajkl', 'jkljlk', 'jkljklj', 'norus', 1, 1, 751754388217223),
(50, 2, 'Jose Antonini', 'joc_antonini@hotmail.com', '', NULL, NULL, NULL, 'Argentina', 'Mendoza', 'Mendoza', 'jose', 1, 1, 10152295005567312),
(51, 2, 'Tonnelier Francisco', 'franciscotonnelier@hotmail.com', '8c1d540e8b618bd1bcdfa90242b43c6d', '1985-12-12', '0261', '152052115', 'Argentina', 'Mendoza', 'Mendoza', 'Captain Frankie', 1, 0, 0),
(52, 2, 'Juan JosÃƒÂ© Borgnia', 'juanjobg@gmail.com', '3bc3aec878cf87d6cc4b05c4a944271b', '1986-08-09', NULL, NULL, 'Argentina', 'Mendoza', 'Carrodilla', 'Juanjo', 1, 0, 0),
(53, 2, 'Pablo Puliti', 'pulo86@hotmail.com', '', NULL, NULL, NULL, 'Argentina', 'Guaymallen', 'Guaymallen', 'Pulo', 1, 1, 10153464928044199),
(54, 2, 'Marcos Villarreal', 'marcossvillarreal@hotmail.com', '', NULL, NULL, NULL, 'argentia', 'mendoza', 'chacras de coria', 'malcom', 1, 1, 10152888123269174),
(55, 2, 'luis innizzotto', 'iannizzottoluis@gmail.com', 'e39702be24142e3cc193410af778a37f', '1985-08-02', '261', '156595645', 'argentina', 'mendoza', 'ciudad', 'lucho', 1, 0, 0),
(56, 2, 'Fran Civit', 'elfrancivit@hotmail.com', '', NULL, NULL, NULL, 'ARGENTINA', 'mendoza', 'CAPITAL', 'FRAN', 1, 1, 10153056362878578),
(57, 2, 'JoaquÃƒÂ­n Labanca', 'jolabanca@gmail.com', '5668f7f2e500748a5f5511d9cbf477ed', '1987-03-13', '261', '2616619588', 'Argentina', 'Mendoza', 'Mendoza', 'Joaco', 1, 0, 0),
(58, 2, 'Edu SalomÃƒÂ³n', 'edu_salo18@hotmail.com', '', NULL, NULL, NULL, 'Argentina', 'Mendoza ', 'Guaymallen ', 'educado', 1, 1, 10206000832244088),
(59, 2, 'Diego Diconto', 'diegodiconto89@gmail.com', '', NULL, NULL, NULL, 'Argentina', 'Mendoza', 'Guaymallen', 'Diego ', 1, 1, 1564757970441723),
(60, 2, 'Juan Barranco', 'jbarranco@sancorseguros.com', '33ce902c9a7e96c5bc2ca64a431eb8e1', '1924-06-30', '00000', '0000', 'argentina', 'mendoza', 'mendoza', 'juanito', 1, 0, 0),
(61, 1, 'Juan Pablo del Peral', 'juandelperal@gmail.com', '5f9a9b97c1d235bbfae2af3cafc266bd', '1984-06-10', '9261', '3010718', 'Argentina', 'Mendoza', 'Godoy Cruz', 'juanpdp', 1, 0, 0),
(62, 2, 'Jocha Huracan De Bernardi', 'jochadb@hotmail.com', '', NULL, NULL, NULL, 'Argentina', 'Mendoza', 'Lujan de Cuyo', 'Jocha', 1, 1, 10153260817903731),
(63, 2, 'Melbel Joyas', 'antonmelisa@hotmail.com', '', NULL, NULL, NULL, 'argentina', 'mendoza', 'godoy cruz', 'mebean', 1, 1, 145300952489445),
(64, 2, 'Laura Antun', 'lantun@losandes.com.ar', '6c57f402efa95853ed3340b70428f01b', '1973-02-10', '0261', '4491279', 'Argentina', 'Mendoza', 'Mendoza', 'Lora', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dlg_banner`
--
ALTER TABLE `dlg_banner`
  ADD PRIMARY KEY (`idbanner`),
  ADD KEY `idbanner` (`idbanner`);

--
-- Indices de la tabla `dlg_calificacion`
--
ALTER TABLE `dlg_calificacion`
  ADD PRIMARY KEY (`idcalificacion`),
  ADD KEY `idcalificacion` (`idcalificacion`);

--
-- Indices de la tabla `dlg_faq`
--
ALTER TABLE `dlg_faq`
  ADD PRIMARY KEY (`idfaq`),
  ADD KEY `idfaq` (`idfaq`);

--
-- Indices de la tabla `dlg_localidad`
--
ALTER TABLE `dlg_localidad`
  ADD PRIMARY KEY (`idlocalidad`),
  ADD KEY `idlocalidad` (`idlocalidad`);

--
-- Indices de la tabla `dlg_locations`
--
ALTER TABLE `dlg_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtaller` (`idtaller`);

--
-- Indices de la tabla `dlg_marca`
--
ALTER TABLE `dlg_marca`
  ADD PRIMARY KEY (`idmarca`),
  ADD KEY `idmarca` (`idmarca`);

--
-- Indices de la tabla `dlg_provincia`
--
ALTER TABLE `dlg_provincia`
  ADD PRIMARY KEY (`idprovincia`),
  ADD KEY `idprovincia` (`idprovincia`);

--
-- Indices de la tabla `dlg_servicio`
--
ALTER TABLE `dlg_servicio`
  ADD PRIMARY KEY (`idservicio`),
  ADD KEY `idservicio` (`idservicio`);

--
-- Indices de la tabla `dlg_taller`
--
ALTER TABLE `dlg_taller`
  ADD PRIMARY KEY (`idtaller`),
  ADD KEY `idtaller` (`idtaller`);

--
-- Indices de la tabla `dlg_tallerservicio`
--
ALTER TABLE `dlg_tallerservicio`
  ADD PRIMARY KEY (`idtallerservicio`),
  ADD KEY `idtallerservicio` (`idtallerservicio`);

--
-- Indices de la tabla `dlg_taller_back`
--
ALTER TABLE `dlg_taller_back`
  ADD PRIMARY KEY (`idtaller`),
  ADD KEY `idtaller` (`idtaller`);

--
-- Indices de la tabla `dlg_usuario`
--
ALTER TABLE `dlg_usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idusuario` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dlg_banner`
--
ALTER TABLE `dlg_banner`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dlg_calificacion`
--
ALTER TABLE `dlg_calificacion`
  MODIFY `idcalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `dlg_faq`
--
ALTER TABLE `dlg_faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `dlg_localidad`
--
ALTER TABLE `dlg_localidad`
  MODIFY `idlocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `dlg_locations`
--
ALTER TABLE `dlg_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT de la tabla `dlg_marca`
--
ALTER TABLE `dlg_marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `dlg_provincia`
--
ALTER TABLE `dlg_provincia`
  MODIFY `idprovincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `dlg_servicio`
--
ALTER TABLE `dlg_servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `dlg_taller`
--
ALTER TABLE `dlg_taller`
  MODIFY `idtaller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
--
-- AUTO_INCREMENT de la tabla `dlg_tallerservicio`
--
ALTER TABLE `dlg_tallerservicio`
  MODIFY `idtallerservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;
--
-- AUTO_INCREMENT de la tabla `dlg_taller_back`
--
ALTER TABLE `dlg_taller_back`
  MODIFY `idtaller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT de la tabla `dlg_usuario`
--
ALTER TABLE `dlg_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dlg_locations`
--
ALTER TABLE `dlg_locations`
  ADD CONSTRAINT `dlg_locations_ibfk_1` FOREIGN KEY (`idtaller`) REFERENCES `dlg_taller_back` (`idtaller`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
