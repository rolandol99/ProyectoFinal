-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 02:15:10
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
-- Base de datos: `dbalumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `pnombre` varchar(45) NOT NULL,
  `snombre` varchar(45) DEFAULT NULL,
  `papellido` varchar(45) NOT NULL,
  `sapellido` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `pnombre`, `snombre`, `papellido`, `sapellido`, `fecha_nacimiento`) VALUES
(1, 'Carlos', 'Gabriel', 'González', 'González', '2005-03-15'),
(2, 'Laura', '', 'Martínez', '', '2006-07-22'),
(3, 'Pedro', 'José', 'Sánchez', '', '2007-01-10'),
(4, 'Sofía', 'Marina', 'López', 'Ruiz', '2008-05-05'),
(5, 'Daniel', '', 'Ramírez', 'González', '2009-11-30'),
(6, 'Josué', 'Alonso', 'Camacho', 'Montijo', '2022-02-20'),
(7, 'Prueba', 'de ingreso', 'Editar', 'Elimiar', '2021-12-09'),
(8, 'Prueba', 'de Borrado', 'Editar', 'Elimiar', '2021-12-09'),
(9, 'Alumno PB', 'PB', 'Alumno PB', 'PB', '2023-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `fecha_asigna` date NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`idasignacion`, `idalumno`, `idcurso`, `fecha_asigna`, `usuario`) VALUES
(1, 1, 1, '2023-12-10', '8'),
(3, 1, 2, '2023-12-14', '8'),
(4, 1, 5, '2023-12-14', '8'),
(5, 5, 11, '2023-12-14', '8'),
(6, 6, 15, '2023-12-14', '8'),
(7, 7, 8, '2023-12-14', '8'),
(8, 6, 3, '2023-12-14', '8'),
(9, 5, 9, '2023-12-14', '8'),
(10, 7, 8, '2023-12-14', '8'),
(11, 7, 1, '2023-12-14', '8'),
(12, 8, 1, '2023-12-14', '8'),
(13, 5, 13, '2023-12-14', '8'),
(14, 8, 1, '2023-12-14', '8'),
(15, 1, 9, '2023-12-14', '8'),
(18, 4, 3, '2023-12-14', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nombrec` varchar(45) NOT NULL,
  `fkgrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombrec`, `fkgrado`) VALUES
(1, 'Matemáticas Avanzadas', 1),
(2, 'Ciencias Naturales', 2),
(3, 'Historia Universal', 3),
(4, 'Lengua Española', 4),
(5, 'Educación Física', 5),
(7, 'Curso prueba de ingreso', 2),
(8, 'Curso prueba de ingreso', 2),
(9, 'Curso prueba de ingreso 3', 3),
(10, 'Prueba Ingreso 4', 4),
(11, 'Prueba ingreso curso', 3),
(12, 'Prueba Ingreso 4', 4),
(13, 'Prueba Ingreso 5', 4),
(14, 'Prueba Ingreso 6', 5),
(15, 'Prueba Ingreso 7', 4),
(16, 'Prueba Ingreso 8', 3),
(18, 'Prueba de ingreso-10', 6),
(22, 'Contabilidad', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL,
  `nombreg` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `nombreg`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(9, 'Octavo'),
(10, 'Noveno'),
(11, 'Decimo'),
(12, 'Undécimo'),
(13, 'Duodécimo'),
(14, 'Decimotercero'),
(15, 'Decimocuarto'),
(17, 'Prueba de ingreso  datos grados borrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `password`, `usuario`, `rol`) VALUES
(7, 'Ana', 'Ruiz', '$argon2id$v=19$m=65536,t=4,p=1$MGtFNlRMekJNRXJ3MmtPWA$Jkos5h5I487mB976Em15Z4f+Pr8eh2vbc+184nTnbHw', 'Ana', 'e'),
(8, 'Juan', 'Pérez', '$argon2id$v=19$m=65536,t=4,p=1$OGVGUzJFSnN2Z2tnY2ZnMQ$Tc6c+OXW7EfKP7CzYVIrxSzIrUzc6Q7sTnReTgont1I', 'Juan', 'a'),
(9, 'Luis', 'Gálvez', '$argon2id$v=19$m=65536,t=4,p=1$SmhNeGtNS3lSdE1kM1NkSw$YF7UxQ1YBKv8jcxiayUAFfE3XjsyfBVmJlNI+bjtjvU', 'Luis', 'e'),
(10, 'Luis', 'Galvez', '$argon2id$v=19$m=65536,t=4,p=1$Ynd1WDBkYnNRRFVEdlliOQ$cXtlhScMu1rpd6X9UDVr4GODsZYe5fAcHj/0L0XlvXk', 'Luis', 'e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`idasignacion`),
  ADD KEY `fk_asignacion_alumno_idx` (`idalumno`),
  ADD KEY `fk_asignacion_curso_idx` (`idcurso`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `fk_curso_grado1_idx` (`fkgrado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `idasignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_grado1` FOREIGN KEY (`fkgrado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
