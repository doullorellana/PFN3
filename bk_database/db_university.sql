-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 11:23:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_university`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`) VALUES
(1, 'Español'),
(2, 'Algebra'),
(3, 'Contabilidad 1'),
(4, 'Ecuaciones Diferenciales'),
(5, 'PHP'),
(6, 'Laravel'),
(7, 'Programación de Bases de Datos'),
(8, 'React'),
(9, 'JavaScript'),
(10, 'HTML CSS'),
(11, 'Bootstrap Tailwindcss'),
(12, 'MVC POO'),
(13, 'Git Github'),
(14, 'Valores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `alumno_id`, `clase_id`) VALUES
(1, 1, 5),
(2, 2, 2),
(3, 1, 13),
(4, 1, 6),
(5, 2, 8),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `correo`, `password`, `direccion`, `fecha_nac`, `clase_id`, `rol_id`, `estatus`) VALUES
(1, '0301198100068', 'Doull Orellana', 'alumno@alumno', 'alumno', 'Comayagua, Comayagua, Honduras', '1981-01-05', NULL, 3, 1),
(2, '0303199006421', 'Carlos Romero', 'alumno2@alumno', 'alumno', 'San Pedro Sula, Cortes, Honduras', '1990-05-13', NULL, 3, 1),
(3, '1234567890', 'Diego Huarsaya', 'maestro@maestro', 'maestro', 'Lima, Perú', '2001-06-25', 12, 2, 0),
(4, '0987654321', 'Harold Carazas', 'admin@admin', 'admin', 'Londres, Inglaterra', '2003-08-17', NULL, 1, 1),
(5, '0504199512345', 'German Fernandez', 'alumno3@alumno', 'alumno3', 'Choluteca, Honduras', '1995-12-24', NULL, 3, 1),
(6, '0415200054321', 'Francisco Perez', 'alumno4@alumno', 'alumno4', 'Tegucigalpa MDC Honduras', '2005-05-26', NULL, 3, 1),
(7, '6789012345', 'Niver Copa', 'maestro2@maestro', 'maestro', 'Tokio, Japon', '1984-03-14', 6, 2, 0),
(8, '4561237890', 'Carlos Navarro', 'maestro3@maestro', 'maestro', 'Antofagasta, Chile', '2000-05-24', NULL, 2, 1),
(9, '9871236540', 'Francisco Morazan', 'maestro4@maestro', 'maestro', 'Francisco Morazan, Honduras', '1792-10-03', NULL, 2, 1),
(91, '1301349939772', 'Kessie Blake', 'integer.urna@icloud.com', 'alumno', 'Ap #873-9329 Sed Street,Italy', '2001-01-17', 4, 3, 1),
(92, '1301916168171', 'Sheila George', 'varius.ultrices.mauris@google.edu', 'alumno', '3172 Mauris, Avenue, United States', '1999-06-10', 5, 3, 1),
(93, '1301283370401', 'James Booth', 'id@aol.couk', 'alumno', 'Ap #788-9553 Lobortis. Street, Singapore', '1990-05-27', 7, 3, 1),
(94, '1301841442683', 'Channing Young', 'eu.ultrices.sit@icloud.edu', 'alumno', 'P.O. Box 366, 5586 Dictum Ave, Peru', '2001-03-01', 8, 3, 1),
(95, '1301724564517', 'George Walton', 'est@aol.net', 'alumno', 'Ap #120-368 At Rd., Colombia', '1989-11-01', 9, 2, 0),
(96, '1301529160510', 'Cara Yates', 'purus2.ac.tellus@yahoo.org', 'alumno', 'Ap #120-2780 Ligula. Rd., Indonesia', '1984-06-28', 10, 3, 1),
(97, '1301734004294', 'Walter Soto', 'diam2.lorem.auctor@protonmail.ca', 'alumno', '969-9231 Quis St., Brazil', '1995-09-19', 11, 3, 1),
(98, '1301792346629', 'Melvin Holland', 'erat2@icloud.org', 'alumno', 'P.O. Box 202, 3756 Gravida Rd., Singapore', '2001-01-01', 4, 3, 1),
(99, '1301974015074', 'Ebony Harmon', 'mi2.fringilla@hotmail.edu', 'alumno', 'Ap #612-7173 Mi. Avenue, Sweden', '1986-06-08', 5, 3, 1),
(100, '1301774176853', 'Azalia Williams', 'quisque2.varius@protonmail.org', 'alumno', '513-6908 Enim, Rd., Spain', '1988-05-23', 6, 3, 1),
(101, '1301529160510', 'Cara Yates', 'purus.ac.tellus@yahoo.org', 'alumno', 'Ap #120-2780 Ligula. Rd., Indonesia', '1984-06-28', 7, 3, 1),
(102, '1301734004294', 'Walter Soto', 'diam.lorem.auctor@protonmail.ca', 'alumno', '969-9231 Quis St., Brazil', '1995-09-19', 3, 3, 1),
(103, '1301792346629', 'Melvin Holland', 'erat@icloud.org', 'alumno', 'P.O. Box 202, 3756 Gravida Rd., Singapore', '2001-01-01', 6, 3, 1),
(104, '1301974015074', 'Ebony Harmon', 'mi.fringilla@hotmail.edu', 'alumno', 'Ap #612-7173 Mi. Avenue, Sweden', '1986-06-08', 8, 3, 1),
(105, '1301774176853', 'Azalia Williams', 'quisque.varius@protonmail.org', 'alumno', '513-6908 Enim, Rd., Spain', '1988-05-23', 2, 3, 1),
(106, '1301728767057', 'Melanie Wilcox', 'nulla.integer@google.ca', 'alumno', 'Ap #631-6115 Primis Street, Germany', '1983-01-04', 5, 3, 1),
(107, '1301337321662', 'Zachery Castillo', 'etiam.ligula.tortor@aol.com', 'alumno', 'P.O. Box 210, 4476 Libero. Avenue, Philippines', '2002-05-06', 5, 3, 1),
(108, '1301647327942', 'Caryn Gordon', 'non@icloud.com', 'alumno', '176-706 Aliquet, Road, Ukraine', '1995-04-10', 10, 3, 1),
(109, '1301936387633', 'Palmer Davenport', 'suspendisse@yahoo.net', 'alumno', '183-6991 Mi. Av., Colombia', '1998-12-02', 8, 3, 1),
(110, '1301302455794', 'Martin Mcneil', 'dis.parturient.montes@hotmail.edu', 'alumno', '8344 Vel Av., Nigeria', '1993-02-12', 5, 3, 1),
(111, '1301470882055', 'Yasir Wolf', 'aliquet.phasellus.fermentum@icloud.couk', 'alumno', 'Ap #464-8492 Aptent Avenue, Poland', '1996-08-04', 10, 3, 1),
(112, '1301509567986', 'Amal Berg', 'in.dolor@hotmail.edu', 'alumno', 'Ap #816-3781 Fermentum Rd., Spain', '1987-10-14', 3, 2, 0),
(113, '1301254874991', 'Warren Yang', 'phasellus.libero@outlook.org', 'alumno', '4435 Eu Avenue, South Korea', '1999-03-30', 6, 3, 1),
(114, '1301518965969', 'Abbot Hale', 'egestas@outlook.ca', 'alumno', 'Ap #832-190 Ut St., Poland', '2002-07-20', 4, 3, 1),
(115, '1301557882132', 'Myra Hampton', 'lacinia.orci@hotmail.ca', 'alumno', 'Ap #969-7305 Vestibulum Rd., Brazil', '1990-04-12', 8, 3, 1),
(176, '1301470882055', 'Yasir Wolf', 'aliquet2.phasellus.fermentum@icloud.couk', 'alumno', 'Ap #464-8492 Aptent Avenue, Poland', '1996-08-04', 10, 3, 1),
(177, '1301509567986', 'Amal Berg', 'in2.dolor@hotmail.edu', 'alumno', 'Ap #816-3781 Fermentum Rd., Spain', '1987-10-14', 3, 3, 1),
(178, '1301254874991', 'Warren Yang', 'phasellus2.libero@outlook.org', 'alumno', '4435 Eu Avenue, South Korea', '1999-03-30', 6, 3, 1),
(179, '1301518965969', 'Abbot Hale', 'egestas2@outlook.ca', 'alumno', 'Ap #832-190 Ut St., Poland', '2002-07-20', 4, 2, 1),
(180, '1301557882132', 'Myra Hampton', 'lacinia2.orci@hotmail.ca', 'alumno', 'Ap #969-7305 Vestibulum Rd., Brazil', '1990-04-12', 8, 3, 1),
(181, '1301773675941', 'Carolyn Riddle', 'eget2.nisi.dictum@outlook.ca', 'alumno', 'Ap #701-4622 Aenean St., Italy', '1985-09-29', 3, 3, 1),
(182, '1301983508289', 'Dominique Gray', 'aliquam2@google.ca', 'alumno', '793-8277 Quam Av., Germany', '1986-02-25', 1, 3, 1),
(183, '1301530506713', 'Madeson Bishop', 'accumsan2.laoreet.ipsum@hotmail.org', 'alumno', 'Ap #375-5653 Odio. Rd., Russian Federation', '1988-05-23', 9, 3, 1),
(184, '1301492467217', 'Malik Avery', 'mauris2@icloud.edu', 'alumno', '1483 Parturient Rd., Turkey', '2000-03-24', 8, 3, 1),
(185, '1301306398572', 'Elvis Collier', 'ipsum2.nunc@icloud.org', 'alumno', '643-1367 Varius Road, Singapore', '2000-10-16', 4, 3, 1),
(186, '1301746909688', 'Brady Whitehead', 'vulputate2@hotmail.couk', 'alumno', 'P.O. Box 682, 6974 Turpis. Avenue, Mexico', '1989-11-21', 4, 3, 1),
(187, '1301521644685', 'Teegan Duffy', 'elit2@google.net', 'alumno', '681-6801 Sagittis Rd., Ireland', '1996-10-01', 4, 3, 1),
(188, '1301801071913', 'Isadora Mason', 'tristique2.neque@protonmail.couk', 'alumno', 'Ap #269-7304 Cras Rd., Belgium', '1986-07-27', 10, 3, 1),
(189, '1301650562566', 'Demetrius Willis', 'magna2.praesent.interdum@outlook.net', 'alumno', 'P.O. Box 890, 5166 Ante Rd., Chile', '1995-11-11', 4, 3, 1),
(190, '1301964591878', 'Kaye Pope', 'sagittis2.nullam.vitae@hotmail.ca', 'alumno', '549-8232 Ac, Street, Russian Federation', '1991-07-17', 6, 3, 1),
(191, '1301460947417', 'Donna Harrington', 'at2@outlook.couk', 'alumno', '246-2937 Vel, Av., Russian Federation', '1998-12-10', 4, 3, 1),
(192, '1301511620938', 'Paul Hudson', 'a2@hotmail.edu', 'alumno', 'Ap #941-4211 Nullam Rd., Peru', '2000-01-12', 2, 3, 1),
(193, '1301916424757', 'Harrison Barton', 'lacus2@yahoo.net', 'alumno', 'P.O. Box 997, 194 Aliquam Avenue, Singapore', '1984-05-27', 6, 3, 1),
(194, '1301757655075', 'Whitney Rowe', 'nec2.eleifend@icloud.com', 'alumno', 'P.O. Box 321, 4184 Sapien, Avenue, United Kingdom', '1991-11-02', 7, 2, 1),
(195, '1301228849433', 'Rudyard Briggs', 'orci2.consectetuer@protonmail.net', 'alumno', '308-2309 Vitae Av., Pakistan', '1994-01-18', 4, 3, 1),
(198, '222200000222', 'Eliminar Maestro 2', 'alumno7@alumno', 'maestro', 'Primaria sin llamamientos por cubrir', '2023-12-01', 13, 2, 1),
(199, '0301999944444', 'Carlos Flores', 'maestro10@maestro', 'maestro', 'Comayagua, Honduras', '2009-03-04', 11, 2, 1),
(200, '0701888835678', 'Gustavo Calderon Gutierrez', 'maestro11@maestro', 'maestro', 'La Paz, Honduras', '2007-07-17', 7, 2, 1),
(201, '010101010101', 'Eliminar Maestro', 'maestro5@maestro', 'maestro', 'Eliminar Maestro', '2023-12-02', NULL, 2, 1),
(202, '0987612345', 'Federico Caal Poujol', 'alumno10@alumno', 'alumno', 'San Pedro Sula, Honduras', '2010-04-15', NULL, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `clase_id` (`clase_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `clase_id` (`clase_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
