-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 20-11-2024 a las 15:46:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preacoso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso`
--

CREATE TABLE `caso` (
  `id_Caso` int(11) NOT NULL,
  `fechaHecho` date NOT NULL,
  `cargoAgresor` varchar(100) DEFAULT NULL,
  `tipoViolencia` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_norma` int(11) DEFAULT NULL,
  `id_tipoMedida` int(11) DEFAULT NULL,
  `id_institucion` int(11) DEFAULT NULL,
  `id_evaluacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`id_Caso`, `fechaHecho`, `cargoAgresor`, `tipoViolencia`, `id_user`, `id_norma`, `id_tipoMedida`, `id_institucion`, `id_evaluacion`) VALUES
(6, '2016-08-28', 'Profesor contratado', 'Hostigamiento y acoso Sexual', 9, 10, 13, 1, 1),
(7, '2017-02-13', 'Profesor nombrado', 'Violación Sexual', 10, 11, 14, 1, 4),
(21, '2017-02-13', 'Profesor Nombrado', 'Violación sexual', 10, 11, 14, 1, 4),
(22, '2018-05-21', 'Profesor contratado', 'Acoso sexual', 10, 14, 15, 2, 3),
(23, '2019-08-14', 'Auxiliar de educación', 'Hostigamiento sexual', 10, 11, 13, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Ancash'),
(3, 'Apurimac'),
(4, 'Arequipa'),
(5, 'Ayacucho'),
(6, 'Cajamarca'),
(7, 'Callao'),
(8, 'Cusco'),
(9, 'Huancavelica'),
(10, 'Huanuco'),
(11, 'Ica'),
(12, 'Junin'),
(13, 'La libertad'),
(14, 'Lambayeque'),
(15, 'Lima'),
(16, 'Loreto'),
(17, 'Madre de dios'),
(18, 'Moquegua'),
(19, 'Pasco'),
(20, 'Piura'),
(21, 'Puno'),
(22, 'San martin'),
(23, 'Tacna'),
(24, 'Tumbes'),
(25, 'Ucayali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_Distrito` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_Provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_Distrito`, `nombre`, `id_Provincia`) VALUES
(1, 'Lambrama', 1),
(2, 'Huacllan', 2),
(3, 'La Merced', 2),
(4, 'Andahuaylas', 3),
(5, 'Andarapa', 3),
(6, 'Huancarama', 3),
(7, 'Pacucha', 3),
(8, 'Santa Maria de Chicmo', 3),
(9, 'Talavera', 3),
(10, 'Turpo', 3),
(11, 'Antabamba', 4),
(12, 'Juan Espinoza Medrano', 4),
(13, 'Alto Selva Alegre', 5),
(14, 'Arequipa', 5),
(15, 'Cayma', 5),
(16, 'Cerro Colorado', 5),
(17, 'Jacobo Hunter', 5),
(18, 'Jose Luis Bustamante y Rivero', 5),
(19, 'La Joya', 5),
(20, 'Mariano Melgar', 5),
(21, 'Miraflores', 5),
(22, 'Paucarpata', 5),
(23, 'Santa Rita de Siguas', 5),
(24, 'Socabaya', 5),
(25, 'Tiabaya', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dre`
--

CREATE TABLE `dre` (
  `id_DRE` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dre`
--

INSERT INTO `dre` (`id_DRE`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Ancash'),
(3, 'Apurimac'),
(4, 'Arequipa'),
(5, 'Ayacucho'),
(6, 'Cajamarca'),
(19, 'Callao'),
(20, 'Cusco'),
(21, 'Huancavelica'),
(22, 'Huánuco'),
(23, 'Ica'),
(24, 'Junin'),
(25, 'La libertad'),
(26, 'Lambayeque'),
(27, 'Lima Metropolitana'),
(28, 'Lima provincias'),
(29, 'Loreto'),
(30, 'Madre de Dios'),
(31, 'Moquegua'),
(32, 'Pasco'),
(33, 'Piura'),
(34, 'Puno'),
(35, 'San Martín'),
(36, 'Tacna'),
(37, 'Tumbes'),
(38, 'Ucayali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoeva`
--

CREATE TABLE `estadoeva` (
  `id_EstadoEva` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoeva`
--

INSERT INTO `estadoeva` (`id_EstadoEva`, `nombre`) VALUES
(1, 'pendiente de atención'),
(2, 'atención en proceso'),
(3, 'atención finalizada'),
(4, 'caso cerrado por validar'),
(5, 'caso cerrado finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL,
  `resultadoInformal` varchar(255) DEFAULT NULL,
  `fechaEvaluacion` date NOT NULL,
  `fechaFinal` date DEFAULT NULL,
  `id_EstadoEva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `resultadoInformal`, `fechaEvaluacion`, `fechaFinal`, `id_EstadoEva`) VALUES
(1, 'NO, el caso aún no ha sido atendido por falta de documentos', '2018-01-01', NULL, 1),
(2, 'Sin Sancion, se inició el proceso de análisis del caso', '2024-01-01', NULL, 2),
(3, 'NO, atención finalizada sin inconvenientes', '2016-09-12', '2017-04-06', 3),
(4, 'SI, caso en espera de validación final por el supervisor', '2022-12-22', '2023-05-17', 4),
(5, 'SI, caso validado y cerrado sin observaciones', '2022-12-01', '2023-03-15', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inseducativa`
--

CREATE TABLE `inseducativa` (
  `id_institucion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_Distrito` int(11) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `id_UGEL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inseducativa`
--

INSERT INTO `inseducativa` (`id_institucion`, `nombre`, `id_Distrito`, `id_ubicacion`, `id_UGEL`) VALUES
(1, '16589 - Secundaria - 1305424', 2, 1, 1),
(2, '18523 - Secundaria - 1109873', 2, 2, 1),
(3, '19234 - Secundaria - 1405643', 2, 1, 3),
(4, '19876 - Secundaria - 1304521', 3, 1, 1),
(5, '20567 - Secundaria - 1503987', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas`
--

CREATE TABLE `normas` (
  `id_norma` int(11) NOT NULL,
  `norma` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `normas`
--

INSERT INTO `normas` (`id_norma`, `norma`, `descripcion`) VALUES
(10, 'Ley de Bases de la Carrera Administrativa y de Remuneraciones del Sector Público, Decreto Legislativo N° 276', ''),
(11, 'Ley de Reforma Magisterial, Ley N° 29944', 'Inciso a) del artículo 48'),
(12, 'Ley del Código de Ética de la Función Pública, Ley N° 27815 modificada por la Ley N° 28496', ''),
(13, 'Ley del Servicio Civil, Ley N° 30057', ''),
(14, 'Sin norma aplicada', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_Provincia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_Provincia`, `nombre`, `id_departamento`) VALUES
(1, 'Abancay', 3),
(2, 'Ajia', 2),
(3, 'Andahuaylas', 3),
(4, 'Antabamba', 3),
(5, 'Arequipa', 4),
(6, 'Asuncion', 2),
(7, 'Acobamba', 9),
(8, 'Acomayo', 8),
(9, 'Alto amazonas', 16),
(10, 'Ambo', 10),
(11, 'Angaraes', 9),
(12, 'Anta', 8),
(13, 'Ascope', 13),
(14, 'Atalaya', 25),
(15, 'Ayabaca', 20),
(16, 'Aymaraes', 3),
(17, 'Bagua', 1),
(18, 'Barranca', 15),
(19, 'Bellavista', 22),
(20, 'Bolognesi', 2),
(21, 'Bongara', 1),
(22, 'Cajabamba', 6),
(23, 'Cajamarca', 6),
(24, 'Cajatambo', 15),
(25, 'Calca', 8),
(26, 'Callao', 7),
(27, 'Camana', 4),
(28, 'Canas', 8),
(29, 'Canchis', 8),
(30, 'Candarave', 23),
(31, 'Cangallo', 5),
(32, 'Canta', 15),
(33, 'Cañete', 15),
(34, 'Carabaya', 21),
(35, 'Caraveli', 4),
(36, 'Carhuaz', 2),
(37, 'Carlos fermin fitzcarrald', 2),
(38, 'Casma', 2),
(39, 'Castilla', 4),
(40, 'Castrovirreyna', 9),
(41, 'Caylloma', 4),
(42, 'Celendin', 6),
(43, 'Chachapoyas', 1),
(44, 'Chanchamayo', 12),
(45, 'Chepen', 13),
(46, 'Chiclayo', 14),
(47, 'Chincha', 11),
(48, 'Chincheros', 3),
(49, 'Chota', 6),
(50, 'Chucuito', 21),
(51, 'Chumbivilcas', 8),
(52, 'Chupaca', 12),
(53, 'Churcampa', 9),
(54, 'Concepcion', 12),
(55, 'Condesuyos', 4),
(56, 'Condorcanqui', 1),
(57, 'Contralmirante villar', 24),
(58, 'Contumaza', 6),
(59, 'Coronel portillo', 25),
(60, 'Corongo', 2),
(61, 'Cotobambas', 3),
(62, 'Cusco', 8),
(63, 'Cutervo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'Estudiante'),
(2, 'Familiar'),
(3, 'Administrativo'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodoc`
--

CREATE TABLE `tipodoc` (
  `id_tipoDoc` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodoc`
--

INSERT INTO `tipodoc` (`id_tipoDoc`, `descripcion`) VALUES
(1, 'DNI - Documento Nacional de Identidad'),
(2, 'CE - Carnet de Extranjería'),
(3, 'PTP - Permiso temporal de permanencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomedida`
--

CREATE TABLE `tipomedida` (
  `id_tipoMedida` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipomedida`
--

INSERT INTO `tipomedida` (`id_tipoMedida`, `descripcion`, `fecha`, `tipo`) VALUES
(13, 'Cese de contrato', '2019-11-18', 'Sí'),
(14, 'Medida cautelar', NULL, 'No'),
(15, 'Retiro', NULL, 'No'),
(16, 'Separación', NULL, 'Sí'),
(17, 'Sin tipo de medida', NULL, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `latitud` decimal(10,7) NOT NULL,
  `longitud` decimal(10,7) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `latitud`, `longitud`, `descripcion`) VALUES
(1, -5.3563300, -78.5284030, 'Cerca a una posta, correo institucional: sanjuandedios1972@gmail.com'),
(2, -12.0463740, -77.0427930, 'Cerca al parque central, correo institucional: colegioabc@gmail.com'),
(3, -6.7688300, -79.6692300, 'Frente a la plaza de armas, correo institucional: colegiomiraflores@hotmail.com'),
(4, -16.4090470, -71.5374510, 'Cerca de la comisaría, correo institucional: colegioandino@educacion.com'),
(5, -9.1902360, -75.0152970, 'Cerca de la municipalidad, correo institucional: colegiopacifico@gmail.com'),
(6, -5.0630160, -80.3224900, 'Junto al estadio, correo institucional: colegioelroble@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ugel`
--

CREATE TABLE `ugel` (
  `id_UGEL` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_DRE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ugel`
--

INSERT INTO `ugel` (`id_UGEL`, `nombre`, `id_DRE`) VALUES
(1, 'Bagua', 1),
(2, 'Bongora', 1),
(3, 'Chachapoyas', 1),
(4, 'Condorcanqui', 1),
(5, 'Ibir-Imaza', 1),
(6, 'Luya', 1),
(7, 'Rodriguez de Mendoza', 1),
(8, 'Utcubamba', 1),
(33, 'Ajia', 2),
(34, 'Asuncion', 2),
(35, 'Bolognesi', 2),
(36, 'Carhuaz', 2),
(37, 'Carlos F. Fitzcarrald', 2),
(38, 'Casma', 2),
(39, 'Corongo', 2),
(40, 'Huaraz', 2),
(41, 'Huari', 2),
(42, 'Huarmey', 2),
(43, 'Huaylas', 2),
(44, 'Ocros', 2),
(45, 'Pallasca', 2),
(46, 'Pomabamba', 2),
(47, 'Recuay', 2),
(48, 'Santa', 2),
(49, 'Sihuas', 2),
(50, 'Yungay', 2),
(51, 'Abancay', 3),
(52, 'Andahuaylas', 3),
(53, 'Antabamba', 3),
(54, 'Aymaraes', 3),
(55, 'Chincheros', 3),
(56, 'Cotabambas', 3),
(57, 'Grau', 3),
(58, 'Huancarama', 3),
(127, 'Arequipa Norte', 4),
(128, 'Arequipa Sur', 4),
(129, 'Camaná', 4),
(130, 'Caraveli', 4),
(131, 'Castilla', 4),
(132, 'Caylloma', 4),
(133, 'Condesuyos', 4),
(134, 'Islay', 4),
(135, 'La Joya', 4),
(136, 'La Unión', 4),
(137, 'Cangallo', 5),
(138, 'Huamanga', 5),
(139, 'Huancasancos', 5),
(140, 'Huanta', 5),
(141, 'La Mar', 5),
(142, 'Lucanas', 5),
(143, 'Parinacochas', 5),
(144, 'Paucar de Sarasara', 5),
(145, 'Sucre', 5),
(146, 'Víctor Fajardo', 5),
(147, 'Vicashuamán', 5),
(148, 'Cajabamba', 6),
(149, 'Cajamarca', 6),
(150, 'Celedín', 6),
(151, 'Chota', 6),
(152, 'Contumazá', 6),
(153, 'Cutervo', 6),
(154, 'Hualgayoc', 6),
(155, 'Jaen', 6),
(156, 'San Ignacio', 6),
(157, 'San Marcos', 6),
(158, 'San Miguel', 6),
(159, 'Santa Cruz', 6),
(160, 'Ventanilla', 19),
(161, 'Acomayo', 20),
(162, 'Anta', 20),
(163, 'Calca', 20),
(164, 'Canas', 20),
(165, 'Canchis', 20),
(166, 'Chumbivilcas', 20),
(167, 'Cusco', 20),
(168, 'Espinar', 20),
(169, 'La Convención', 20),
(170, 'Paruro', 20),
(171, 'Paucartambo', 20),
(172, 'Pichari-Kimbiri-Villa Virgen', 20),
(173, 'Quispicanchi', 20),
(174, 'Urubamba', 20),
(175, 'Ambo', 22),
(176, 'Huamalíes', 22),
(177, 'Huánuco', 22),
(178, 'Huaycabamba', 22),
(179, 'Lauricocha', 22),
(180, 'Leoncio Prado', 22),
(181, 'Marañon', 22),
(182, 'Pachitea', 22),
(183, 'Puerto Inca', 22),
(191, 'Surcubamba', 21),
(192, 'Tayacaja', 21),
(193, 'Ambo', 23),
(194, 'Huamalíes', 23),
(195, 'Huánuco', 23),
(196, 'Chanchamayo', 21),
(197, 'Chupaca', 21),
(198, 'Concepción', 21),
(199, 'Huancayo', 21),
(200, 'Jauja', 21),
(201, 'Junin', 21),
(202, 'Pangoa', 21),
(203, 'Pichanaqui', 21),
(204, 'Río Ene - Mantaro', 21),
(205, 'Río Tambo', 21),
(206, 'Sapito', 21),
(207, 'Tarma', 21),
(208, 'Yauli', 21),
(209, 'El Porvenir', 25),
(210, 'La Esperanza', 25),
(211, 'Trujillo Nor Oeste', 25),
(212, 'Trujillo Sur Este', 25),
(213, 'Ascope', 25),
(214, 'Chepén', 25),
(215, 'Gran Chimú', 25),
(216, 'Julcán', 25),
(217, 'Otuzco', 25),
(218, 'Pacasmayo', 25),
(219, 'Pataz', 25),
(220, 'Sánchez Carrión', 25),
(221, 'Santiago de Chusco', 25),
(222, 'Virú', 25),
(223, 'El Porvenir', 25),
(224, 'La Esperanza', 25),
(225, 'Trujillo Nor Oeste', 25),
(226, 'Trujillo Sur Este', 25),
(227, 'Ascope', 25),
(228, 'Chepén', 25),
(229, 'Gran Chimú', 25),
(230, 'Julcán', 25),
(231, 'Otuzco', 25),
(232, 'Pacasmayo', 25),
(233, 'Pataz', 25),
(234, 'Sánchez Carrión', 25),
(235, 'Santiago de Chusco', 25),
(236, 'Virú', 25),
(237, 'San Juan de Miraflores', 27),
(238, 'Rímac', 27),
(239, 'Cercado', 27),
(240, 'Comas', 27),
(241, 'San Juan de Lurigancho', 27),
(242, 'Ate', 27),
(243, 'San Borja', 27),
(244, 'Cañete', 28),
(245, 'Huaura', 28),
(246, 'Huaral', 28),
(247, 'Cajatambo', 28),
(248, 'Canta', 28),
(249, 'Yauyos', 28),
(250, 'Oyón', 28),
(251, 'Huarochirí', 28),
(252, 'Barranca', 28),
(253, 'Cañete', 28),
(254, 'Huaura', 28),
(255, 'Huaral', 28),
(256, 'Cajatambo', 28),
(257, 'Canta', 28),
(258, 'Yauyos', 28),
(259, 'Oyón', 28),
(260, 'Huarochirí', 28),
(261, 'Barranca', 28),
(262, 'Alto Amazonas - San Lorenzo', 29),
(263, 'Alto Amazonas - Yurimaguas', 29),
(264, 'Loreto - Nauta', 29),
(265, 'Maynas', 29),
(266, 'Putumayo', 29),
(267, 'Ramón Castilla - Caballococha', 29),
(268, 'Requena', 29),
(269, 'Ucayali - Contamana', 29),
(270, 'Tahuamanu', 30),
(271, 'Manu', 30),
(272, 'Tambopata', 30),
(273, 'Llo', 31),
(274, 'Mariscal Nieto', 31),
(275, 'Pasco', 32),
(276, 'Oxapampa', 32),
(277, 'Puerto Bermúdez', 32),
(278, 'Ayabaca', 33),
(279, 'Chulucanas', 33),
(280, 'Huancabamba', 33),
(281, 'Huarmaca', 33),
(282, 'La Unión', 33),
(283, 'Morropón', 33),
(284, 'Paita', 33),
(285, 'Sechura', 33),
(286, 'Sullana', 33),
(287, 'Talara', 33),
(288, 'Tambogrande', 33),
(289, 'Carabaja', 34),
(290, 'Chucuito', 34),
(291, 'Lampa', 34),
(292, 'Melgar', 34),
(293, 'Puno', 34),
(294, 'San Román', 34),
(295, 'Sandia', 34),
(296, 'Yunguyo', 34),
(297, 'Bellavista', 35),
(298, 'El Dorado', 35),
(299, 'Huallaga', 35),
(300, 'Lamas', 35),
(301, 'Mariscal Cáceres', 35),
(302, 'Moyobamba', 35),
(303, 'Picota', 35),
(304, 'Rioja', 35),
(305, 'San Martín', 35),
(306, 'Tocache', 35),
(307, 'Bellavista', 36),
(308, 'El Dorado', 36),
(309, 'Contralmirante Villar', 37),
(310, 'Tumbes', 37),
(311, 'Zarumilla', 37),
(312, 'Atalaya', 37),
(313, 'Coronel Portillo', 37),
(314, 'Padre Abad', 37),
(315, 'Pomabamba', 2),
(316, 'Recuay', 2),
(317, 'Santa', 2),
(318, 'Sihuas', 2),
(319, 'Yungay', 2),
(320, 'Abancay', 3),
(321, 'Andahuaylas', 3),
(322, 'Antabamba', 3),
(323, 'Aymaraes', 3),
(324, 'Chincheros', 3),
(325, 'Cotabambas', 3),
(326, 'Grau', 3),
(327, 'Huancarama', 3),
(328, 'Arequipa Norte', 4),
(329, 'Arequipa Sur', 4),
(330, 'Camaná', 4),
(331, 'Caraveli', 4),
(332, 'Castilla', 4),
(333, 'Caylloma', 4),
(334, 'Condesuyos', 4),
(335, 'Islay', 4),
(336, 'La Joya', 4),
(337, 'La Unión', 4),
(338, 'Cangallo', 5),
(339, 'Huamanga', 5),
(340, 'Huancasancos', 5),
(341, 'Huanta', 5),
(342, 'La Mar', 5),
(343, 'Lucanas', 5),
(344, 'Parinacochas', 5),
(345, 'Paucar de Sarasara', 5),
(346, 'Sucre', 5),
(347, 'Cajabamba', 6),
(348, 'Cajamarca', 6),
(349, 'Celedín', 6),
(350, 'Chota', 6),
(351, 'Contumazá', 6),
(352, 'Cutervo', 6),
(353, 'Hualgayoc', 6),
(354, 'Jaen', 6),
(355, 'San Ignacio', 6),
(356, 'San Marcos', 6),
(357, 'San Miguel', 6),
(358, 'Santa Cruz', 6),
(359, 'Acomayo', 20),
(360, 'Anta', 20),
(361, 'Calca', 20),
(362, 'Canas', 20),
(363, 'Canchis', 20),
(364, 'Chumbivilcas', 20),
(365, 'Cusco', 20),
(366, 'Espinar', 20),
(367, 'La Convención', 20),
(368, 'Paruro', 20),
(369, 'Paucartambo', 20),
(370, 'Pichari-Kimbiri--Villa Virgen', 20),
(371, 'Quispicanchi', 20),
(372, 'Urubamba', 20),
(373, 'Ambo', 22),
(374, 'Huamalíes', 22),
(375, 'Huánuco', 22),
(376, 'Huaycabamba', 22),
(377, 'Lauricocha', 22),
(378, 'Leoncio Prado', 22),
(379, 'Marañon', 22),
(380, 'Pachitea', 22),
(381, 'Puerto Inca', 22),
(382, 'Yarowilca', 22),
(383, 'Acobamba', 21),
(384, 'Angaraes', 21),
(385, 'Castrovirreyna', 21),
(386, 'Churcampa', 21),
(387, 'Huancavelica', 21),
(388, 'Huaytará', 21),
(389, 'Surcubamba', 21),
(390, 'Tayacaja', 21),
(391, 'Ambo', 23),
(392, 'Huamalíes', 23),
(393, 'Huánuco', 23),
(394, 'Chanchamayo', 21),
(395, 'Chupaca', 21),
(396, 'Concepción', 21),
(397, 'Huancayo', 21),
(398, 'Jauja', 21),
(399, 'Junin', 21),
(400, 'Pangoa', 21),
(401, 'Pichanaqui', 21),
(402, 'Río Ene - Mantaro', 21),
(403, 'Río Tambo', 21),
(404, 'Sapito', 21),
(405, 'Tarma', 21),
(406, 'Yauli', 21),
(407, 'El Porvenir', 25),
(408, 'La Esperanza', 25),
(409, 'Trujillo Nor Oeste', 25),
(410, 'Trujillo Sur Este', 25),
(411, 'Ascope', 25),
(412, 'Chepén', 25),
(413, 'Gran Chimú', 25),
(414, 'Julcán', 25),
(415, 'Otuzco', 25),
(416, 'Pacasmayo', 25),
(417, 'Pataz', 25),
(418, 'Sánchez Carrión', 25),
(419, 'Santiago de Chusco', 25),
(420, 'El Porvenir', 25),
(421, 'La Esperanza', 25),
(422, 'Trujillo Nor Oeste', 25),
(423, 'Trujillo Sur Este', 25),
(424, 'Ascope', 25),
(425, 'Chepén', 25),
(426, 'Gran Chimú', 25),
(427, 'Julcán', 25),
(428, 'Otuzco', 25),
(429, 'Pacasmayo', 25),
(430, 'Pataz', 25),
(431, 'Sánchez Carrión', 25),
(432, 'Santiago de Chusco', 25),
(433, 'San Juan de Miraflores', 27),
(434, 'Rímac', 27),
(435, 'Cercado', 27),
(436, 'Comas', 27),
(437, 'San Juan de Lurigancho', 27),
(438, 'Ate', 27),
(439, 'San Borja', 27),
(440, 'Cañete', 28),
(441, 'Huaura', 28),
(442, 'Huaral', 28),
(443, 'Cajatambo', 28),
(444, 'Canta', 28),
(445, 'Yauyos', 28),
(446, 'Oyón', 28),
(447, 'Huarochirí', 28),
(448, 'Barranca', 28),
(449, 'Cañete', 28),
(450, 'Huaura', 28),
(451, 'Huaral', 28),
(452, 'Cajatambo', 28),
(453, 'Canta', 28),
(454, 'Yauyos', 28),
(455, 'Oyón', 28),
(456, 'Huarochirí', 28),
(457, 'Barranca', 28),
(458, 'Alto Amazonas - San Lorenzo', 29),
(459, 'Alto Amazonas - Yurimaguas', 29),
(460, 'Loreto - Nauta', 29),
(461, 'Maynas', 29),
(462, 'Putumayo', 29),
(463, 'Ramón Castilla - Caballococha', 29),
(464, 'Requena', 29),
(465, 'Ucayali - Contamana', 29),
(466, 'Tahuamanu', 30),
(467, 'Manu', 30),
(468, 'Tambopata', 30),
(469, 'Llo', 31),
(470, 'Mariscal Nieto', 31),
(471, 'Pasco', 32),
(472, 'Oxapampa', 32),
(473, 'Puerto Bermúdez', 32),
(474, 'Ayabaca', 33),
(475, 'Chulucanas', 33),
(476, 'Huancabamba', 33),
(477, 'Huarmaca', 33),
(478, 'La Unión', 33),
(479, 'Morropón', 33),
(480, 'Paita', 33),
(481, 'Sechura', 33),
(482, 'Sullana', 33),
(483, 'Talara', 33),
(484, 'Tambogrande', 33),
(485, 'Carabaja', 34),
(486, 'Chucuito', 34),
(487, 'Lampa', 34),
(488, 'Melgar', 34),
(489, 'Puno', 34),
(490, 'San Román', 34),
(491, 'Sandia', 34),
(492, 'Yunguyo', 34),
(493, 'Bellavista', 35),
(494, 'El Dorado', 35),
(495, 'Huallaga', 35),
(496, 'Lamas', 35),
(497, 'Mariscal Cáceres', 35),
(498, 'Moyobamba', 35),
(499, 'Picota', 35),
(500, 'Rioja', 35),
(501, 'San Martín', 35),
(502, 'Tocache', 35),
(503, 'Bellavista', 36),
(504, 'El Dorado', 36),
(505, 'Contralmirante	Villar', 37),
(506, 'Tumbes', 37),
(507, 'Zarumilla', 37),
(508, 'Atalaya', 37),
(509, 'Coronel Portillo', 37),
(510, 'Padre Abad', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `numDocumento` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `contacto` varchar(9) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_tipoDoc` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `numDocumento`, `nombre`, `apellido`, `contacto`, `email`, `pass`, `id_tipoDoc`, `id_rol`) VALUES
(9, '75792714', 'Julia', 'Janampa', '983472982', 'julia@gmail.com', 'pass123', 1, 1),
(10, '78531867', 'Ivan', 'Cardenas', '983472982', 'ivan@gmail.com', 'pass123', 1, 2),
(11, 'CE654321', 'Diomar', 'Tomaya', '983472982', 'diomar@gmail.com', 'pass123', 2, 3),
(12, 'CE123456', 'Sally', 'Jayo', '983472982', 'sally@gmail.com', 'pass123', 2, 3),
(13, 'A12345678', 'Patrick', 'Champe', '983472982', 'patrick@gmail.com', 'pass123', 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`id_Caso`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_Distrito`);

--
-- Indices de la tabla `dre`
--
ALTER TABLE `dre`
  ADD PRIMARY KEY (`id_DRE`);

--
-- Indices de la tabla `estadoeva`
--
ALTER TABLE `estadoeva`
  ADD PRIMARY KEY (`id_EstadoEva`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id_evaluacion`);

--
-- Indices de la tabla `inseducativa`
--
ALTER TABLE `inseducativa`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `normas`
--
ALTER TABLE `normas`
  ADD PRIMARY KEY (`id_norma`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_Provincia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipodoc`
--
ALTER TABLE `tipodoc`
  ADD PRIMARY KEY (`id_tipoDoc`);

--
-- Indices de la tabla `tipomedida`
--
ALTER TABLE `tipomedida`
  ADD PRIMARY KEY (`id_tipoMedida`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `ugel`
--
ALTER TABLE `ugel`
  ADD PRIMARY KEY (`id_UGEL`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caso`
--
ALTER TABLE `caso`
  MODIFY `id_Caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_Distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `dre`
--
ALTER TABLE `dre`
  MODIFY `id_DRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `estadoeva`
--
ALTER TABLE `estadoeva`
  MODIFY `id_EstadoEva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inseducativa`
--
ALTER TABLE `inseducativa`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `normas`
--
ALTER TABLE `normas`
  MODIFY `id_norma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_Provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipodoc`
--
ALTER TABLE `tipodoc`
  MODIFY `id_tipoDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipomedida`
--
ALTER TABLE `tipomedida`
  MODIFY `id_tipoMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ugel`
--
ALTER TABLE `ugel`
  MODIFY `id_UGEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
