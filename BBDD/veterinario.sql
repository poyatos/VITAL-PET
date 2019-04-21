-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2019 a las 20:15:06
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
  `fecha_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cita` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `num_consulta` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL,
  `fecini_contrato` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecfin_contrato` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
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
(1, '10/02/2017', '10/09/2019', 1100, 30, 'Vespertino', 'Activo', 29),
(2, '02/05/2015', '10/02/2021', 1200, 31, 'Vespertino', 'Activo', 30),
(3, '11/11/2017', '24/07/2019', 900, 29, 'Vespertino', 'Activo', 31),
(4, '01/05/2015', '15/07/2017', 1050, 29, 'Vespertino', 'Finalizado', 32),
(5, '21/03/2013', '09/09/2022', 1200, 31, 'Vespertino', 'Activo', 33),
(6, '21/07/2014', '21/07/2020', 1100, 31, 'Vespertino', 'Activo', 33),
(7, '12/09/2016', '01/02/2021', 1100, 31, 'Vespertino', 'Activo', 34),
(8, '24/03/2019', '24/10/2019', 950, 29, 'Vespertino', 'Activo', 35),
(9, '12/02/2014', '17/06/2026', 1000, 31, 'Vespertino', 'Activo', 36),
(10, '20/09/2018', '20/06/2020', 1001, 29, 'Vespertino', 'Activo', 37),
(11, '11/01/2011', '14/08/2027', 1300, 31, 'Vespertino', 'Activo', 38),
(12, '10/08/2016', '12/09/2021', 1120, 30, 'Matutino', 'Activo', 39),
(13, '02/03/2017', '18/08/2021', 1150, 30, 'Matutino', 'Activo', 40),
(14, '15/01/2010', '25/11/2025', 1320, 31, 'Matutino', 'Activo', 41),
(15, '10/01/2018', '17/12/2019', 950, 28, 'Matutino', 'Finalizado', 42),
(16, '16/04/2010', '03/07/2021', 1150, 31, 'Matutino', 'Activo', 43),
(17, '05/05/2016', '06/09/2025', 1150, 31, 'Matutino', 'Activo', 44),
(18, '17/11/2011', '21/12/2027', 1300, 31, 'Matutino', 'Activo', 45),
(19, '15/01/2017', '05/01/2019', 1050, 30, 'Matutino', 'Finalizado', 46),
(20, '12/11/2010', '07/07/2028', 1050, 31, 'Vespertino', 'Activo', 47),
(21, '20/11/2012', '12/12/2029', 1050, 31, 'Matutino', 'Activo', 48);

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
  `fecna_mascota` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `peso_mascota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `id_cliente`, `nombre_mascota`, `tipo_mascota`, `raza_mascota`, `sexo_mascota`, `fecna_mascota`, `peso_mascota`) VALUES
(1, 1, 'Kira', 'Perro', 'Schnauzer Miniatura', 'Hembra', '06-12-2014', 6.9),
(2, 1, 'Koch', 'Perro', 'Akita Japones', 'Macho', '12-12-2012', 8.1),
(3, 2, 'Misaki', 'Gato', 'Selkirk Rex', 'Hembra', '02-04-2010', 8),
(4, 3, 'Oblonga', 'Reptil', 'Iguana del desierto', 'Macho', 'Desconocida', 3.8),
(5, 3, 'Cutiepie', 'Gato', 'Bengali', 'Hembra', '19-05-2014', 6),
(6, 4, 'Pepper', 'Gato', 'Bombay', 'Macho', '29-03-2010', 4),
(7, 5, 'Ion', 'Roedor', 'Hamster Chino', 'Macho', '01-11-2018', 0.8),
(8, 6, 'Ulanoca', 'Perro', 'Basset Hound', 'Hembra', '14-12-2013', 10.2),
(9, 7, 'Schnitzel', 'Perro', 'Doberman', 'Macho', '02-02-2012', 20),
(10, 8, 'Furia', 'Perro', 'Bichon Maltes', 'Macho', '01-01-2011', 6),
(11, 9, 'Oliva', 'Loro', 'Loro gris', 'Hembra', '15-07-2015', 2.7),
(12, 10, 'Druida', 'Perro', 'Yorkshire Terrier', 'Hembra', '22-08-2012', 7),
(13, 11, 'Sahne', 'Huron', 'Huron whippet', 'Hembra', '24-01-2017', 1.8),
(14, 11, 'Zahn', 'Pajaro', 'Periquito', 'Macho', '01-10-2017', 0.7),
(15, 12, 'Amy', 'Pajaro', 'Periquito', 'Hembra', '11-11-2016', 0.6),
(16, 13, 'Dafne', 'Perro', 'Shar Pei', 'Hembra', '02-05-2012', 25),
(17, 14, 'Malka', 'Reptil', 'Dragon barbudo', 'Hembra', '05-02-2011', 2),
(18, 14, 'Lana', 'Perro', 'Shiba Inu', 'Hembra', '11-06-2010', 8.1),
(19, 15, 'Louise', 'Gato', 'Khao Manee', 'Macho', '08-07-2015', 5),
(20, 16, 'Bernadette', 'Gato', 'Siames', 'Macho', '05-08-2015', 4.7),
(21, 16, 'Nova', 'Gato', 'Persa de pelo largo', 'Hembra', 'Desconocida', 5.5),
(22, 17, 'Uschi', 'Perro', 'Shih Tzu', 'Macho', '01-08-2013', 8),
(23, 17, 'Luna', 'Perro', 'Rottweiler', 'Hembra', '27-12-2017', 30.7),
(24, 17, 'Lolo', 'Roedor', 'Hamster Ruso', 'Macho', '24-11-2015', 1.3),
(25, 18, 'Golfo', 'Gato', 'Mau egipcio', 'Macho', '23-02-2014', 5),
(26, 19, 'Char', 'Perro', 'Mastin Tibetano', 'Macho', '11-09-2014', 34.7),
(27, 20, 'Bolita', 'Pajaro', 'Loro Arcoiris', 'Hembra', '05-08-2010', 2.2),
(28, 21, 'Ian', 'Reptil', 'Iguana verde', 'Macho', '04-04-2014', 4),
(29, 22, 'Pepe', 'Perro', 'Malinois', 'Macho', '01-04-2016', 26),
(30, 23, 'Iris', 'Gato', 'Spgnynx', 'Hembra', '21-12-2014', 4),
(31, 23, 'Goku', 'Huron', 'Huron bull', 'Macho', '07-08-2011', 2.1),
(32, 24, 'Benji', 'Perro', 'Sin raza', 'Macho', '05-12-2012', 6.6),
(33, 24, 'Eros', 'Perro', 'Pug', 'Macho', '11-05-2015', 5),
(34, 24, 'Tommy', 'Gato', 'Sin raza', 'Macho', '10-02-2010', 5),
(35, 25, 'Miko', 'Erizo', 'Erizo Somali', 'Macho', '12-12-2012', 1.2),
(36, 26, 'Wally', 'Gato', 'Sin raza', 'Macho', '10-01-2011', 4),
(37, 26, 'Ikky', 'Gato', 'Azal ruso', 'Hembra', '12-12-2011', 3.2),
(38, 27, 'Ania', 'Pajaro', 'Pajaro dodo', 'Hembra', '15-10-2013', 0.5),
(39, 28, 'Shiva', 'Gato', 'Gato Persa', 'Hembra', '25-03-2015', 4.2),
(40, 28, 'Cali', 'Roedor', 'Hamster Ruso', 'Hembra', '22-11-2013', 0.7),
(41, 10, 'Pantera', 'Perro', 'Chihuahua', 'Hembra', '23-12-2014', 4),
(42, 9, 'Merlin', 'Perro', 'Sin raza', 'Macho', 'Desconocida', 22.8),
(43, 7, 'Simon', 'Iguana', 'Iguana Comun', 'Macho', '14-07-2015', 3),
(44, 6, 'Ruffo', 'Loro', 'Loro Azul', 'Macho', 'Desconocida', 2),
(45, 5, 'Arames', 'Roedor', 'Hamster Roborowski', 'Macho', '12-11-2016', 0.5),
(46, 6, 'Trufita', 'Gato', 'Maine Coon', 'Hembra', '01-05-2016', 3.7),
(47, 12, 'Nona', 'Perro', 'Sin raza', 'Hembra', '04-07-2017', 12),
(48, 11, 'Osito', 'Reptil', 'Tortuga', 'Macho', '12-11-2018', 2.5),
(49, 12, 'Nicolas', 'Gato', 'Sin raza', 'Macho', 'Desconocida', 3);

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
(49, 'Esterelizacion perra 0-5 kg', 175),
(50, 'Esterelizacion perra 5-10 kg', 225),
(51, 'Esterelizacion perra 10-20 Kg', 285),
(52, 'Esterelizacion perra 20-30 kg', 390);

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
  `fecna_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `rol_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usuario` varchar(2000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellidos_usuario`, `dni_usuario`, `telefono_usuario`, `correo_usuario`, `fecna_usuario`, `direccion_usuario`, `rol_usuario`, `pass_usuario`) VALUES
(1, 'Valentina', 'Perez Ferrer', '77517664M', 691819414, 'valen@gmail.com', '25-08-1972', 'Calle Pablo Luis, 5 28529 - Arganda del Rey', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(2, 'Víctor', 'Serra Bravo', '80328807L', 658660474, 'victor@hotmail.com', '08-01-1985', 'Avenida Dos de Mayo, 69 28409 - Collado Villalba', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(3, 'Carlos', 'Amador Sanchez', '47490404K', 677854785, 'car@gmail.com', '01-06-1953', 'Calle Simon Hernandez, 20 28109 - Alcobendas', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(4, 'Lucas', 'Caballero Peña', '99684155Q', 6355586, 'luke@gmail.com', '15-04-1960', 'Calle Estimul, 50 28709 - San Sebastián de los Reyes', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(5, 'Miguel', 'Hormigos Guio', '04152658K', 688705430, 'mikel@gmail.com', '15-06-1984', 'Avenida del Llano, 52 28780 - Colmenar Viejo', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(6, 'Oriol', 'Sala Nuñez', '35641701G', 614853363, 'ori@hotmail.com', '07-06-1955', 'Calle San Romualdo, 13 28224 - Pozuelo de Alarcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(7, 'Pablo', 'Mohedano Diaz', '41909009L', 608664000, 'pablete@gmail.com', '20-10-1979', 'Avenida Navarra, 5 28290 - Las Rozas de Madrid', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(8, 'Ariadna', 'Muñoz Gutierrez', '57776644T', 684034961, 'ariadna2918@gmail.com', '13-07-1987', 'Calle Illa de Buda, 55 28300 - Aranjuez', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(9, 'Marcos', 'Fuentes Vega', '65331468Z', 676963852, 'marcos@gmail.com', '23-10-1964', 'Barrio de Galindo s/n 28320 - Pinto, Madrid', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(10, 'Lorena', 'Pujol Ramos', 'Y1530936R', 648735758, 'lorenax@gmail.com', '05-04-1989', 'Camiño do Caramuxo, 70 28340 - Valdemoro', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(11, 'Ismael', 'Rodriguez Vazquez', '79014632H', 625408365, 'ismayuso@hotmail.com', '14-08-1986', 'Avenida Manuel Rodriguez Ayuso, 170 28400, 28409 - Collado Villalba', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(12, 'Vega', 'Duran Hidalgo', 'Z9632384N', 649806317, 'vega@gmail.com', '18-01-2004', 'Calle Plata, 14 28608 - Navalcarnero', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(13, 'Yaiza', 'Riera Velasco', '67012985R', 695010995, 'yaiempresa@yahoo.com', '07-10-1987', 'Calle Macarena, 19 28669 - Boadilla del Monte', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(14, 'Laia', 'Leon Blanco', '80858584Z', 674364906, 'laia@gmail.com', '01-06-1954', 'Calle Walia, 21 28934 - Mostoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(15, 'Marti', 'Mendez Ramirez', '46997747F', 614605547, 'marti@gmail.com', '22-04-1956', 'Calle España, 62 28679 - Villaviciosa de Odón ', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(16, 'Aleix', 'Diaz Fuentes', '91695318E', 677756674, 'aleix@gmail.com', '17-08-1956', 'Calle Prolongación Salud, 25 28692 - Villanueva de la Cañada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(17, 'Saray', 'Muñoz Gallardo', '29734113N', 695302843, 'sarayga@gmail.com', '31-12-1971', 'Calle Alfonso Pesquera, 6  28692 - Villanueva de la Cañada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(18, 'José Antonio', 'Hernandez Esteban', '15910193N', 692898174, 'josan@gmail.com', '10-11-2005', 'Calle Alfonso Pesquera, 6 28790 - Tres Cantos', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(19, 'Aitana', 'Campos Carmona', 'Y8523941V', 681741296, 'aita@gmail.com', '16-12-1996', ' Calle Montalban, 1 28809 - Alcalá de Henares', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(20, 'Alejandro', 'Bosch Santiago', '57297818B', 695302843, 'alex@gmail.com', '27-05-1983', 'Calle Rios de Sangre, 69 28820 - Coslada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(21, 'Valentina', 'Gil Gallardo', '53121661X', 651157186, 'valenatope@gmail.com', '03-10-1976', 'Paseo Julio Romero, 53 28850 - Torrejón de Ardoz', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(22, 'Guillermo', 'Caballero Delgado', '73510864N', 661608940, 'guilleconu@hotmail.com', '27-08-1993', 'Calle Mostoles, 10 - Mostoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(23, 'Luna', 'Tomas Velasco', '30093802G', 664159747, 'lunaluneramor@gmail.com', '29-09-1990', 'Calle Hacienda de Pavones, 146 28909 - Getafe', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(24, 'Ana María', 'Ramos Vicente', '16152523Z', 674960396, 'yomisma@gmail.com', '02-08-1972', 'Avenida del examen, 10 28919 - Leganés', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(25, 'Pablo', 'Rovira Suarez', '54862977L', 657410224, 'paibol@gmail.com', '12-06-1969', 'Calle Berenisa, 29 28929 - Alcorcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(26, 'Francisco Javier', 'Marin Blanco', '82353546E', 617463323, 'francis@outlook.com', '24-11-1987', 'Calle Poeta Poyatos, 1 28929 - Alcorcón', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(27, 'Ángela', 'Martinez Guerrero', '80729531Z', 689845983, 'angel1979@gmail.com', '14-11-1972', 'Paseo de la nara, 12 28939 - Móstoles', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(28, 'Aitor', 'Rubio Herrera', '77511664M', 600819414, 'aitordw@gmail.com', '02-02-1995', 'Avenida de Pablo Gargallo, 36 28949 - Fuenlabrada', 'Cliente', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(29, 'Rayan', 'Torres Delgado', 'X0888493A', 691832144, 'rayegypt@gmail.com', '19-08-1980', 'Camino de Monzalbarba, 3 28980 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(30, 'Rafael', 'Garcia Marin', '59922043M', 601239414, 'rafi@gmail.com', '23-10-2000', 'Paseo de la Independencia, 2 28981 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(31, 'Óscar', 'Font Santos', '15536803G', 601819000, 'srfont@gmail.com', '14-10-1998', 'Paseo de la Constitución, 15 28984 - Parla', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(32, 'Manuela', 'Casas Hernandez', '98464987D', 692594140, 'casasmanuela@gmail.com', '09-10-1973', 'Paseo de Echegaray y Caballero, 5 28970 - Humanes de Madrid', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(33, 'Sofía', 'Nuñez Leon', '96269013Y', 691817824, 'sofigh@gmail.com', '18-12-1988', 'Calle Calle del Coso, 22 28970 - Humanes de Madrid', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(34, 'Beatriz', 'Molina Fuentes', '74774857V', 611119414, 'beimoli@gmail.com', '07-12-1994', 'Calle de Alfonso I, 11 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(35, 'Alicia', 'Navarro Diaz', '08325333T', 691888814, 'aliciafan@outlook.com', '30-09-1967', 'Avenida de Anaga, 33 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(36, 'Érik', 'Calvo Hidalgo', '73297357Z', 691819999, 'calvohida@gmail.com', '07-12-1994', 'Avenida de Bilbao, 20 28939 - Móstoles', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(37, 'Gerard', 'Peña Ramos', '59333156X', 629919494, 'gerrkkpe@gmail.com', '31-10-1998', 'Calle de Téllez, 21 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(38, 'Alex', 'Grau Mora', '32707885E', 601814584, 'alexgr@gmail.com', '02-05-1969', 'Calle de Alfonso XII, 31 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(39, 'Juan José ', 'Font Pastor', '42355945L', 691811511, 'juanriemas@gmail.com', '18-03-1965', 'Calle de López de Hoyos, 2 28939 - Móstoles', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(40, 'Martín', 'Riera Moreno', '59905764X', 608819417, 'marti@hotmail.com', '06-02-1991', 'Carrera de San Jerónimo, 13 28949 - Fuenlabrada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(41, 'Pau', 'Gallego Guerrero', '10046572B', 694509414, 'paubcn@gmail.com', '06-02-1991', 'Calle del Correo, 52 28929 - Alcorcón', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(42, 'Isabel', 'Santos Herrero', '77224569E', 691811514, 'isantos@gmail.com', '29-01-1990', 'Calle de la Sal, 11 28909 - Getafe', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(43, 'Carlota', 'Nuñez Martin', '94456870X', 685919414, 'krlota@gmail.com', '25-07-1989', 'Calle de la Ternera, 21 28850 - San Fernando de Henares', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(44, 'Malak', 'Molina Rojas', 'Z1396130N', 147483647, 'malakmorok@yahoo.com', '05-06-1981', 'Calle de las Navas de Tolosa, 52 28820 - Coslada', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(45, 'Nerea', 'Delgado Benitez', '46952785X', 611819112, 'delgaben@gmail.com', '21-12-1998', 'Calle de Carretas, 2 28790 - Tres Cantos', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(46, 'Ángel', 'Gimenez Delgado', '61280315N', 691819570, 'angelyo@gmail.com', '19-03-1989', 'Calle de Arlabán, 7 28669 - Boadilla del Monte', 'Veterinario', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(47, 'José Manuel', 'Vila Soler', '86057428F', 677181414, 'jmanuele@gmail.com', '27-08-1989', 'Avenida del Planetario, 6 28340 - Valdemoro', 'Recepcionista', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(48, 'Celia', 'Carrasco Velasco', '98686179X', 691819140, 'celiamore@gmail.com', '22-10-1981', 'Calle de Alcalá, 5 28529 - Rivas-Vaciamadrid', 'Recepcionista', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745'),
(49, 'Ignacio', 'Casas Lopez', '68316493F', 691459414, 'megaigna@gmail.com', '27-07-1967', 'Avenida de la Ciudad de Barcelona, 8 28109 - Alcobendas', 'Director', 'f3b8909a8ac61cc92c52111dd08de30a5a079ba5d9136f1be0f0c6906c520290ed8df683607f9915213b0c6ba541db77261966798ca341a36f38cf88241f0745');

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
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id_tipo_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
