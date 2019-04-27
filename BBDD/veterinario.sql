-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 27-04-2019 a las 19:28:24
=======
-- Tiempo de generación: 27-04-2019 a las 19:00:28
>>>>>>> f068fe85ba29e10b9789d1b304ce88f4fdd7633d
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinario`
--
CREATE DATABASE IF NOT EXISTS `veterinario` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `veterinario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cita` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `num_consulta` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha_cita`, `hora_cita`, `estado_cita`, `num_consulta`, `id_mascota`, `id_cliente`, `id_veterinario`) VALUES
(1, '2019-04-30', '11.00', 'Pendiente', 1, 1, 1, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL,
  `fecini_contrato` date NOT NULL,
  `fecfin_contrato` date NOT NULL,
  `sueldo_contrato` int(11) NOT NULL,
  `diasvac_contrato` int(11) NOT NULL,
  `horario_contrato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_contrato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_contratado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `fecini_contrato`, `fecfin_contrato`, `sueldo_contrato`, `diasvac_contrato`, `horario_contrato`, `estado_contrato`, `id_contratado`) VALUES
(1, '2017-02-06', '2020-02-03', 1100, 30, 'Vespertino', 'Activo', 29),
(2, '2010-10-10', '2020-07-08', 1200, 31, 'Vespertino', 'Activo', 30),
(3, '2018-02-01', '2019-07-04', 900, 29, 'Vespertino', 'Activo', 31),
(4, '2016-12-01', '2019-02-28', 1050, 29, 'Vespertino', 'Finalizado', 32),
(5, '2012-11-02', '2020-01-10', 1200, 31, 'Vespertino', 'Activo', 33),
(6, '2013-05-11', '2020-02-11', 1100, 31, 'Vespertino', 'Activo', 33),
(7, '2013-06-12', '2020-02-13', 1100, 31, 'Vespertino', 'Activo', 34),
(8, '2018-02-13', '2019-06-30', 950, 29, 'Vespertino', 'Activo', 35),
(9, '2016-02-02', '2019-09-18', 1000, 31, 'Vespertino', 'Activo', 36),
(10, '2015-01-25', '2020-01-05', 1001, 29, 'Vespertino', 'Activo', 37),
(11, '2009-03-09', '2099-12-30', 1500, 31, 'Vespertino', 'Activo', 38),
(12, '2016-11-05', '2019-11-15', 1120, 30, 'Matutino', 'Activo', 39),
(13, '2014-05-09', '2019-07-19', 1150, 30, 'Matutino', 'Activo', 40),
(14, '2010-01-20', '2023-08-24', 1320, 31, 'Matutino', 'Activo', 41),
(15, '2018-08-14', '2019-07-12', 950, 28, 'Matutino', 'Finalizado', 42),
(16, '2015-10-20', '2019-10-16', 1150, 31, 'Matutino', 'Activo', 43),
(17, '2015-02-12', '2019-08-09', 1150, 31, 'Matutino', 'Activo', 44),
(18, '2010-10-12', '2021-06-11', 1300, 31, 'Matutino', 'Activo', 45),
(19, '2014-08-05', '2019-07-26', 1050, 30, 'Matutino', 'Finalizado', 46),
(20, '2014-09-02', '2019-09-18', 1050, 31, 'Vespertino', 'Activo', 47),
(21, '2014-10-09', '2019-10-25', 1050, 31, 'Matutino', 'Activo', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_mascota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_mascota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `raza_mascota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo_mascota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecna_mascota` date DEFAULT NULL,
  `peso_mascota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `id_cliente`, `nombre_mascota`, `tipo_mascota`, `raza_mascota`, `sexo_mascota`, `fecna_mascota`, `peso_mascota`) VALUES
(1, 1, 'Kira', 'Perro', 'Schnauzer Miniatura', 'Hembra', '2015-12-06', 6.9),
(2, 1, 'Koch', 'Perro', 'Akita Japones', 'Macho', '2018-05-24', 8.1),
(3, 2, 'Misaki', 'Gato', 'Selkirk Rex', 'Hembra', NULL, 8),
(4, 3, 'Oblonga', 'Reptil', 'Iguana del desierto', 'Macho', '2016-06-14', 3.8),
(5, 3, 'Cutiepie', 'Gato', 'Bengali', 'Hembra', '2017-09-05', 6),
(6, 4, 'Pepper', 'Gato', 'Bombay', 'Macho', '2018-10-08', 4),
(7, 5, 'Ion', 'Roedor', 'Hamster Chino', 'Macho', '2018-11-21', 0.8),
(8, 6, 'Ulanoca', 'Perro', 'Basset Hound', 'Hembra', '2014-10-02', 10.2),
(9, 7, 'Schnitzel', 'Perro', 'Doberman', 'Macho', '2013-04-04', 20),
(10, 8, 'Furia', 'Perro', 'Bichon Maltes', 'Macho', '2016-04-19', 6),
(11, 9, 'Oliva', 'Loro', 'Loro gris', 'Hembra', NULL, 2.7),
(12, 10, 'Druida', 'Perro', 'Yorkshire Terrier', 'Hembra', '2018-10-24', 7),
(13, 11, 'Sahne', 'Huron', 'Huron whippet', 'Hembra', '2016-04-19', 1.8),
(14, 11, 'Zahn', 'Pajaro', 'Periquito', 'Macho', '2019-02-13', 0.7),
(15, 12, 'Amy', 'Pajaro', 'Periquito', 'Hembra', NULL, 0.6),
(16, 13, 'Dafne', 'Perro', 'Shar Pei', 'Hembra', '2013-10-17', 25),
(17, 14, 'Malka', 'Reptil', 'Dragon barbudo', 'Hembra', '2017-09-12', 2),
(18, 14, 'Lana', 'Perro', 'Shiba Inu', 'Hembra', '2009-10-10', 8.1),
(19, 15, 'Louise', 'Gato', 'Khao Manee', 'Macho', '2015-12-15', 5),
(20, 16, 'Bernadette', 'Gato', 'Siames', 'Macho', '2001-03-04', 4.7),
(21, 16, 'Nova', 'Gato', 'Persa de pelo largo', 'Hembra', '2017-02-22', 5.5),
(22, 17, 'Uschi', 'Perro', 'Shih Tzu', 'Macho', '2015-09-09', 8),
(23, 17, 'Luna', 'Perro', 'Rottweiler', 'Hembra', '2006-11-07', 30.7),
(24, 17, 'Lolo', 'Roedor', 'Hamster Ruso', 'Macho', '2018-06-19', 1.3),
(25, 18, 'Golfo', 'Gato', 'Mau egipcio', 'Macho', '2009-12-24', 5),
(26, 19, 'Char', 'Perro', 'Mastin Tibetano', 'Macho', '0000-00-00', 34.7),
(27, 20, 'Bolita', 'Pajaro', 'Loro Arcoiris', 'Hembra', '0000-00-00', 2.2),
(28, 21, 'Ian', 'Reptil', 'Iguana verde', 'Macho', '0000-00-00', 4),
(29, 22, 'Pepe', 'Perro', 'Malinois', 'Macho', '0000-00-00', 26),
(30, 23, 'Iris', 'Gato', 'Spgnynx', 'Hembra', '0000-00-00', 4),
(31, 23, 'Goku', 'Huron', 'Huron bull', 'Macho', '0000-00-00', 2.1),
(32, 24, 'Benji', 'Perro', 'Sin raza', 'Macho', '0000-00-00', 6.6),
(33, 24, 'Eros', 'Perro', 'Pug', 'Macho', '0000-00-00', 5),
(34, 24, 'Tommy', 'Gato', 'Sin raza', 'Macho', '0000-00-00', 5),
(35, 25, 'Miko', 'Erizo', 'Erizo Somali', 'Macho', '0000-00-00', 1.2),
(36, 26, 'Wally', 'Gato', 'Sin raza', 'Macho', '0000-00-00', 4),
(37, 26, 'Ikky', 'Gato', 'Azal ruso', 'Hembra', '0000-00-00', 3.2),
(38, 27, 'Ania', 'Pajaro', 'Pajaro dodo', 'Hembra', '0000-00-00', 0.5),
(39, 28, 'Shiva', 'Gato', 'Gato Persa', 'Hembra', '0000-00-00', 4.2),
(40, 28, 'Cali', 'Roedor', 'Hamster Ruso', 'Hembra', '0000-00-00', 0.7),
(41, 10, 'Pantera', 'Perro', 'Chihuahua', 'Hembra', '0000-00-00', 4),
(42, 9, 'Merlin', 'Perro', 'Sin raza', 'Macho', '0000-00-00', 22.8),
(43, 7, 'Simon', 'Iguana', 'Iguana Comun', 'Macho', '0000-00-00', 3),
(44, 6, 'Ruffo', 'Loro', 'Loro Azul', 'Macho', '0000-00-00', 2),
(45, 5, 'Arames', 'Roedor', 'Hamster Roborowski', 'Macho', '0000-00-00', 0.5),
(46, 6, 'Trufita', 'Gato', 'Maine Coon', 'Hembra', '0000-00-00', 3.7),
(47, 12, 'Nona', 'Perro', 'Sin raza', 'Hembra', '0000-00-00', 12),
(48, 11, 'Osito', 'Reptil', 'Tortuga', 'Macho', '0000-00-00', 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total_precio` float NOT NULL,
  `fecha_pago` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id_prueba` int(11) NOT NULL,
  `id_tipo_prueba` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `resultado_prueba` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones_prueba` varchar(2000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pruebas`
--

CREATE TABLE `tipos_pruebas` (
  `id_tipo_prueba` int(11) NOT NULL,
  `nombre_tipo_prueba` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio_tipo_prueba` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_pruebas`
--

INSERT INTO `tipos_pruebas` (`id_tipo_prueba`, `nombre_tipo_prueba`, `precio_tipo_prueba`) VALUES
(1, 'Desparasitación interna y externa cachorro (perro/gato) 0-3 Kg', 5),
(2, 'Desparasitación interna y externa cachorro (perro/gato) 3-10 Kg', 8),
(3, 'Desparasitación interna perro ADULTO 0-5 Kg', 3),
(4, 'Desparasitación interna perro ADULTO 5-10 Kg', 5),
(5, 'Desparasitación interna perro ADULTO 10-20 Kg', 10),
(6, 'Desparasitación interna perro ADULTO 20-50 Kg', 15),
(7, 'Desparasitación interna y externa gato ADULTO 0-5 Kg / 5-10 Kg / 10-20 Kg / 20-50 Kg, 10,50', 20),
(8, 'Tratamiento inyectable subcutáneo o intramuscular 1 inyección (incluyendo medicación)', 10),
(9, 'Pasaporte europeo canino/felino', 15),
(10, 'Sedación para manipulación, estudio radiográfico, etc.  < 15 Kg', 16),
(11, 'Microchip - cambio de propietario', 17),
(12, 'Tratamiento inyectable subcutáneo o intramuscular 1 inyección (incluyendo medicación)', 20),
(13, 'Consulta de seguimiento o de revisión sin inyectable', 20),
(14, 'Consulta de seguimiento o de revisión con 1 inyectable (incluida medicación)', 25),
(15, 'Consulta de urgencia referidas a ABC', 25),
(16, 'Vacunación PERRO Parvovirosis incluido Consulta (reconocimiento - exploración completa y vacuna de 1ª marca)', 25),
(17, 'Análisis de sangre básico - Hemograma completo (incluida toma de muestras e interpretación)', 25),
(18, 'Vacunación PERRO/GATO Antirrábica incluido consulta (reconocimiento - exploración completa), vacuna de 1ª marca, Sello Oficial y chapa antirrábica)', 26),
(19, 'Vacunación GATO Tetravalente felina incluido Consulta (reconocimiento - exploración completa) y vacuna de 1ª marca)', 26),
(20, 'Análisis test serológico rápido Moquillo canino', 28),
(21, 'Análisis test serológico rápido Lehismaniosis', 28),
(22, 'Análisis test serológicos rápidos Parvovirosis/Coranavirus canino', 30),
(23, 'Tratamiento inyectable intravenoso con cateterización venosa', 30),
(24, 'Vacunación PERRO Tetravalente, incluido Consulta (reconocimiento - exploración completa) y vacuna de 1º marca)', 35),
(25, 'Microchip - implantación y alta RAIA', 35),
(26, 'Sedación para manipulación, estudio radiográfico, etc.  > 15 Kg', 35),
(27, 'Tratamiento inyectable intravenoso con caterterización venosa', 35),
(28, 'Radiografías digitales simples, sin uso de contraste (1ª)', 35),
(29, 'Radiografías digitales simples, sin uso de contraste (2ª)', 28),
(30, 'Radiografías digitales simples, sin uso de contraste (3ª)', 17),
(31, 'Consulta general completa (anamnesis, reconocimiento, diagnóstico presuntivo y prescripción de tratamiento)', 37),
(32, 'Certificado Oficial Veterinario', 38),
(33, 'Vacunación PERRO Heptavalente (incluido reconocimiento - exploración completa y vacuna de 1º marca)', 40),
(34, 'Análisis test serológico Inmunodeficiencia + Leucemia felina', 42),
(35, 'Consulta general completa (anamnesis, reconocimiento, diagnóstico presuntivo y prescripción de tratamiento) con 1 inyectable (incluida medicación)', 45),
(36, 'Vacunación GATO Tetravalente felina + Leucemia felina incluido Consulta (reconocimiento - exploración completa) y vacunas de 1ª marcas)', 50),
(37, 'Análisis de sangre completo, - Hemograma completo  (anemia/infección) + 10 bioquimicas, incluido toma de muestras e interpretación y resultados inmediatos', 52),
(38, 'Castración de gato macho (anestesia + cirugía) + Antibioterapia + Analgesia.', 69),
(39, ' Consulta de Especialidad o de segunda opinión (anamnesis, reconocimiento, diagnóstico presuntivo y prescripción de tratamiento)', 70),
(40, 'Estudio ecográfico abdominal completo', 95),
(41, 'Castración de gata (anestesia + cirugía) mediante ovarictomía + Antibioterapia + Analgesia', 120),
(42, 'Estudio ecográfico cardíaco doble color completo', 120),
(43, 'Castración de gata (anestesia + cirugía) mediante ovariohisterectomía + Antibioterapia + Analgesia', 170),
(44, 'Castración perro 0-5 kg', 125),
(45, 'Castración perro 5-10 kg', 150),
(46, 'Castración perro 10-20 Kg', 195),
(47, 'Castración perro 20-30 kg', 320),
(48, 'Limpieza de boca (sarro) de perro hasta 5 kg con anestesia inhalatoria + monitorización + sueroterapia EV + Antibioterapia + Analgesia + chequeo prequirúrgico', 150),
(49, 'Esterelización perra 0-5 kg', 175),
(50, 'Esterelización perra 5-10 kg', 225),
(51, 'Esterelización perra 10-20 Kg', 285),
(52, 'Esterelización perra 20-30 kg', 390),
(53, 'Radiografia dorsal dcho.', 19.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_usuario` int(11) NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecna_usuario` date NOT NULL,
  `direccion_usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `rol_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usuario` varchar(2000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellidos_usuario`, `dni_usuario`, `telefono_usuario`, `correo_usuario`, `fecna_usuario`, `direccion_usuario`, `rol_usuario`, `pass_usuario`) VALUES
(1, 'Valentina', 'Perez Ferrer', '77517664M', 691819414, 'valen@gmail.com', '1988-10-05', 'Calle Pablo Luis, 5 28529 - Arganda del Rey', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(2, 'Víctor', 'Serra Bravo', '80328807L', 658660474, 'victor@hotmail.com', '1965-05-10', 'Avenida Dos de Mayo, 69 28409 - Collado Villalba', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(3, 'Carlos', 'Amador Sanchez', '47490404K', 677854785, 'car@gmail.com', '1972-11-06', 'Calle Simon Hernandez, 20 28109 - Alcobendas', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(4, 'Lucas', 'Caballero Peña', '99684155Q', 677830541, 'luke@gmail.com', '1990-12-03', 'Calle Estimul, 50 28709 - San Sebastián de los Reyes', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(5, 'Miguel', 'Hormigos Guio', '04152658K', 688705430, 'mikel@gmail.com', '1992-04-10', 'Avenida del Llano, 52 28780 - Colmenar Viejo', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(6, 'Oriol', 'Sala Nuñez', '35641701G', 614853363, 'ori@hotmail.com', '1955-12-01', 'Calle San Romualdo, 13 28224 - Pozuelo de Alarcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(7, 'Pablo', 'Mohedano Diaz', '41909009L', 608664000, 'pablete@gmail.com', '1968-04-10', 'Avenida Navarra, 5 28290 - Las Rozas de Madrid', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(8, 'Ariadna', 'Muñoz Gutierrez', '57776644T', 684034961, 'ariadna2918@gmail.com', '1988-01-20', 'Calle Illa de Buda, 55 28300 - Aranjuez', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(9, 'Marcos', 'Fuentes Vega', '65331468Z', 676963852, 'marcos@gmail.com', '1977-06-06', 'Barrio de Galindo s/n 28320 - Pinto, Madrid', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(10, 'Lorena', 'Pujol Ramos', 'Y1530936R', 648735758, 'lorenax@gmail.com', '1964-07-12', 'Camiño do Caramuxo, 70 28340 - Valdemoro', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(11, 'Ismael', 'Rodriguez Vazquez', '79014632H', 625408365, 'ismayuso@hotmail.com', '1989-05-05', 'Avenida Manuel Rodriguez Ayuso, 170 28400, 28409 - Collado Villalba', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(12, 'Vega', 'Durán Hidalgo', 'Z9632384N', 649806317, 'vega@gmail.com', '1992-11-06', 'Calle Plata, 14 28608 - Navalcarnero', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(13, 'Yaiza', 'Riera Velasco', '67012985R', 695010995, 'yaiempresa@yahoo.com', '1993-09-12', 'Calle Macarena, 19 28669 - Boadilla del Monte', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(14, 'Laia', 'Leon Blanco', '80858584Z', 674364906, 'laia@gmail.com', '1900-05-05', 'Calle Walia, 21 28934 - Mostoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(15, 'Marti', 'Mendez Ramirez', '46997747F', 614605547, 'marti@gmail.com', '1992-08-10', 'Calle España, 62 28679 - Villaviciosa de Odón ', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(16, 'Aleix', 'Diaz Fuentes', '91695318E', 677756674, 'aleix@gmail.com', '1961-12-24', 'Calle Prolongación Salud, 25 28692 - Villanueva de la Cañada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(17, 'Saray', 'Muñoz Gallardo', '29734113N', 695302843, 'sarayga@gmail.com', '2000-01-01', 'Calle Alfonso Pesquera, 6  28692 - Villanueva de la Cañada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(18, 'José Antonio', 'Hernandez Esteban', '15910193N', 692898174, 'josan@gmail.com', '1999-02-15', 'Calle Alfonso Pesquera, 6 28790 - Tres Cantos', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(19, 'Aitana', 'Campos Carmona', 'Y8523941V', 681741296, 'aita@gmail.com', '1998-03-02', ' Calle Montalban, 1 28809 - Alcalá de Henares', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(20, 'Alejandro', 'Bosch Santiago', '57297818B', 695302843, 'alex@gmail.com', '2000-10-26', 'Calle Rios de Sangre, 69 28820 - Coslada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(21, 'Valentina', 'Gil Gallardo', '53121661X', 651157186, 'valenatope@gmail.com', '1995-05-22', 'Paseo Julio Romero, 53 28850 - Torrejón de Ardoz', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(22, 'Guillermo', 'Caballero Delgado', '73510864N', 661608940, 'guilleconu@hotmail.com', '1993-04-09', 'Calle Mostoles, 10 - Mostoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(23, 'Luna', 'Tomas Velasco', '30093802G', 664159747, 'lunaluneramor@gmail.com', '1978-01-06', 'Calle Hacienda de Pavones, 146 28909 - Getafe', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(24, 'Ana María', 'Ramos Vicente', '16152523Z', 674960396, 'yomisma@gmail.com', '1976-05-10', 'Avenida del examen, 10 28919 - Leganés', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(25, 'Pablo', 'Rovira Suarez', '54862977L', 657410224, 'paibol@gmail.com', '1980-10-02', 'Calle Berenisa, 29 28929 - Alcorcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(26, 'Francisco Javier', 'Marín Blanco', '82353546E', 617463323, 'francis@outlook.com', '1979-10-05', 'Calle Poeta Poyatos, 1 28929 - Alcorcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(27, 'Ángela', 'Martinez Guerrero', '80729531Z', 689845983, 'angel1979@gmail.com', '1977-02-22', 'Paseo de la nara, 12 28939 - Móstoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(28, 'Aitor', 'Rubio Herrera', '77511664M', 600819414, 'aitordw@gmail.com', '1988-10-05', 'Avenida de Pablo Gargallo, 36 28949 - Fuenlabrada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(29, 'Rayan', 'Torres Delgado', 'X0888493A', 691832144, 'rayegypt@gmail.com', '2000-03-03', 'Camino de Monzalbarba, 3 28980 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(30, 'Rafael', 'García Marín', '59922043M', 601239414, 'rafi@gmail.com', '1950-07-17', 'Paseo de la Independencia, 2 28981 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(31, 'Óscar', 'Font Santos', '15536803G', 601819000, 'srfont@gmail.com', '1955-06-16', 'Paseo de la Constitución, 15 28984 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(32, 'Manuela', 'Casas Hernandez', '98464987D', 692594140, 'casasmanuela@gmail.com', '1958-10-05', 'Paseo de Echegaray y Caballero, 5 28970 - Humanes de Madrid', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(33, 'Sofía', 'Nuñez Leon', '96269013Y', 691817824, 'sofigh@gmail.com', '1989-07-08', 'Calle Calle del Coso, 22 28970 - Humanes de Madrid', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(34, 'Beatriz', 'Molina Fuentes', '74774857V', 611119414, 'beimoli@gmail.com', '1988-06-12', 'Calle de Alfonso I, 11 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(35, 'Alicia', 'Navarro Diaz', '08325333T', 691888814, 'aliciafan@outlook.com', '1976-01-18', 'Avenida de Anaga, 33 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(36, 'Érik', 'Calvo Hidalgo', '73297357Z', 691819999, 'calvohida@gmail.com', '1995-12-12', 'Avenida de Bilbao, 20 28939 - Móstoles', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(37, 'Gerard', 'Peña Ramos', '59333156X', 629919494, 'gerrkkpe@gmail.com', '1990-10-11', 'Calle de Téllez, 21 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(38, 'Alex', 'Grau Mora', '32707885E', 601814584, 'alexgr@gmail.com', '1995-05-01', 'Calle de Alfonso XII, 31 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(39, 'Juan José ', 'Font Pastor', '42355945L', 691811511, 'juanriemas@gmail.com', '1972-05-12', 'Calle de López de Hoyos, 2 28939 - Móstoles', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(40, 'Martín', 'Riera Moreno', '59905764X', 608819417, 'marti@hotmail.com', '1978-07-03', 'Carrera de San Jerónimo, 13 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(41, 'Pau', 'Gallego Guerrero', '10046572B', 694509414, 'paubcn@gmail.com', '1954-02-22', 'Calle del Correo, 52 28929 - Alcorcón', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(42, 'Isabel', 'Santos Herrero', '77224569E', 691811514, 'isantos@gmail.com', '2000-01-22', 'Calle de la Sal, 11 28909 - Getafe', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(43, 'Carlota', 'Nuñez Martin', '94456870X', 685919414, 'krlota@gmail.com', '1985-11-08', 'Calle de la Ternera, 21 28850 - San Fernando de Henares', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(44, 'Malak', 'Molina Rojas', 'Z1396130N', 147483647, 'malakmorok@yahoo.com', '1980-05-02', 'Calle de las Navas de Tolosa, 52 28820 - Coslada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(45, 'Nerea', 'Delgado Benitez', '46952785X', 611819112, 'delgaben@gmail.com', '1975-08-15', 'Calle de Carretas, 2 28790 - Tres Cantos', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(46, 'Ángel', 'Gimenez Delgado', '61280315N', 691819570, 'angelyo@gmail.com', '1966-10-10', 'Calle de Arlabán, 7 28669 - Boadilla del Monte', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(47, 'José Manuel', 'Vila Soler', '86057428F', 677181414, 'jmanuele@gmail.com', '1980-10-21', 'Avenida del Planetario, 6 28340 - Valdemoro', 'Recepcionista', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(48, 'Celia', 'Carrasco Velasco', '98686179X', 691819140, 'celiamore@gmail.com', '1992-05-13', 'Calle de Alcalá, 5 28529 - Rivas-Vaciamadrid', 'Recepcionista', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(49, 'Ignacio', 'Casas Lopez', '68316493F', 691459414, 'eljefe@gmail.com', '1975-04-09', 'Avenida de la Ciudad de Barcelona, 8 28109 - Alcobendas', 'Director', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `FK_CONTRATOS_1` (`id_contratado`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `FK_MASCOTAS_1` (`id_cliente`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id_prueba`);

--
-- Indices de la tabla `tipos_pruebas`
--
ALTER TABLE `tipos_pruebas`
  ADD PRIMARY KEY (`id_tipo_prueba`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_pruebas`
--
ALTER TABLE `tipos_pruebas`
  MODIFY `id_tipo_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `FK_CONTRATOS_1` FOREIGN KEY (`id_contratado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `FK_MASCOTAS_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
