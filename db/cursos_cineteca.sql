-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2019 a las 06:33:42
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos_cineteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `imagen` text NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `tipo_curso` varchar(20) NOT NULL,
  `precio_promocion` decimal(10,2) DEFAULT NULL,
  `vigencia_promocion` date DEFAULT NULL,
  `promocion_disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`curso_id`, `nombre`, `imagen`, `descripcion`, `precio`, `disponible`, `tipo_curso`, `precio_promocion`, `vigencia_promocion`, `promocion_disponible`) VALUES
(1, 'Maestria', '1547083960.jpg', '', '1000.00', 0, 'Maestría', NULL, NULL, 0),
(2, 'Akira Kurosawa', '1547091906.jpg', 'La revelación del cine japonés es sin duda el acontecimiento cinematográfico más importante desde el neorrealismo italiano”, escribió en 1955 el crítico francés André Bazin en referencia a la presencia y éxito en los festivales de Cannes y Venecia de las películas de Akira Kurosawa y Teinosuke Kinugasa. En ese momento Occidente descubría un estilo, una fuerza creadora y una expresión dramática únicas, que no habían sido conocidas antes a pesar del gran desarrollo del que gozó la cinematografía en Japón desde sus inicios. Entre 1950 y 1965 Kurosawa fue una garantía de altos ingresos en las taquillas de su país, a la vez que una poderosa influencia en el cine internacional. Ese período, así como su trabajo posterior, son el testimonio constante de un cineasta con un fuerte compromiso artístico, un perfeccionismo insistente, y en una búsqueda sin tregua de la belleza y la emoción más profundas.', '2000.00', 1, 'Online', NULL, NULL, 0),
(3, 'William Shakespeare', '', NULL, '2300.00', 1, 'Online', NULL, NULL, NULL),
(4, 'Cine Estadounidense 1', '', NULL, '2300.00', 1, 'Online', NULL, NULL, NULL),
(5, 'Cine Estadounidense 2', '', '', '3.00', 1, 'Online', '42342.00', '2018-12-06', 0),
(6, 'Cine Estadounidense 3', '', '', '423.00', 1, 'Online', NULL, NULL, NULL),
(7, 'Cine Político', '', '', '32.00', 0, 'Presencial', NULL, NULL, 0),
(8, 'Peter Greenaway', '', '', '23.00', 0, 'Presencial', NULL, NULL, 0),
(9, 'Las Rutas del Miedo', '', '', '334.00', 0, 'Presencial', NULL, NULL, 0),
(10, 'Ciencia Ficción', '', '', '343.00', 0, 'Presencial', NULL, NULL, NULL),
(11, 'Cine Mexicano Contemporáneo', '', '', '3232.00', 0, 'Presencial', NULL, NULL, NULL),
(12, 'Películas que ameritan explicación', '', '', '232.00', 0, 'Presencial', NULL, NULL, NULL),
(13, 'Alfred Hitchcock', '', '', '2212.00', 0, 'Presencial', NULL, NULL, 0),
(14, 'Federico Fellini', '', '', '121.00', 0, 'Presencial', NULL, NULL, 0),
(15, 'Expresionismo alemán', '', '', '131.00', 0, 'Presencial', NULL, NULL, 0),
(16, 'Woody Allen', '', '', '232.00', 0, 'Presencial', NULL, NULL, 0),
(17, 'Gaumont', '', '', '232.00', 0, 'Presencial', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_usuarios`
--

CREATE TABLE `cursos_usuarios` (
  `cursos_usuarios_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_limite_pago` date NOT NULL,
  `vigencia_curso` date DEFAULT NULL,
  `referencia` varchar(19) NOT NULL,
  `link_curso` text,
  `contrasena` text,
  `comprobante_pago` text,
  `experiencia` varchar(40) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `pago` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `descuento_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`descuento_id`, `nombre`, `porcentaje`, `disponible`) VALUES
(1, 'SIN DESCUENTO', '0.00', 1),
(2, 'OFERTA POR TIEMPO LIMITADO', '0.00', 1),
(3, 'PRIMER INGRESO', '0.00', 1),
(4, 'ESTUDIANTE', '10.00', 1),
(5, 'PROFESOR', '10.00', 1),
(6, 'INAPAM', '10.00', 1),
(7, 'EXALUMNO', '10.00', 1),
(8, 'ESTUDIANTE + EXALUMNO', '20.00', 1),
(9, 'PROFESOR + EXALUMNO', '20.00', 1),
(10, 'INAPAM + EXALUMNO', '20.00', 1),
(11, 'BECADO', '100.00', 1),
(12, 'CINETECA', '100.00', 1),
(13, 'PROMOCION', '50.00', 1),
(14, 'PRUEBA', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `boleta` varchar(9) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `estudios` varchar(50) NOT NULL,
  `correo_electronico` varchar(60) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `password` text NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `tipo_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `boleta`, `nombres`, `apellido_paterno`, `apellido_materno`, `ocupacion`, `estudios`, `correo_electronico`, `telefono`, `codigo_postal`, `curp`, `sexo`, `fecha_nacimiento`, `password`, `privilegios`, `tipo_usuario`) VALUES
(1, 'principal', 'YAROSLAVA', 'GUERRERO', 'PLACENCIA', '', '', 'yarygp74@gmail.com', '', '14020', 'GUPY740311MDFRLR0', 'MUJER', '1974-03-11', 'adivina', 0, 'Administrador principal');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `before_insert_generar_boleta` BEFORE INSERT ON `usuarios` FOR EACH ROW BEGIN
IF (NEW.boleta='' AND NEW.tipo_usuario='Online') THEN
  SET @year = YEAR(NOW())-2000;
  SET @consecutivo = (SELECT COUNT(boleta) FROM usuarios WHERE LEFT(boleta,2) = @year AND RIGHT(boleta,1) = 2);
  SET NEW.boleta  = CONCAT(@YEAR,LPAD(@consecutivo+1,3,'0'),2);
 ELSEIF (NEW.boleta='' AND NEW.tipo_usuario='Presencial') THEN
  SET @year = YEAR(NOW())-2000;
  SET @consecutivo = (SELECT COUNT(boleta) FROM usuarios WHERE LEFT(boleta,2) = @year AND RIGHT(boleta,1) = 1);
  SET NEW.boleta  = CONCAT(@YEAR,LPAD(@consecutivo+1,3,'0'),1);
  END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_id`);

--
-- Indices de la tabla `cursos_usuarios`
--
ALTER TABLE `cursos_usuarios`
  ADD PRIMARY KEY (`cursos_usuarios_id`),
  ADD KEY `cursos_id` (`curso_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`descuento_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cursos_usuarios`
--
ALTER TABLE `cursos_usuarios`
  MODIFY `cursos_usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `descuento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos_usuarios`
--
ALTER TABLE `cursos_usuarios`
  ADD CONSTRAINT `cursos_usuarios_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`curso_id`),
  ADD CONSTRAINT `cursos_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `update_disponibilidad_promocion` ON SCHEDULE EVERY 1 DAY STARTS '2018-12-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cursos SET promocion_disponible='0' WHERE vigencia_promocion <CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
