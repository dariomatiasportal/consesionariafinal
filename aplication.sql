-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 06:18:06
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autosol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `foranea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gantt_links`
--

CREATE TABLE `gantt_links` (
  `id` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gantt_tasks`
--

CREATE TABLE `gantt_tasks` (
  `id` int(11) NOT NULL,
  `mecanico` varchar(200) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `patente` varchar(7) NOT NULL,
  `vehiculo` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `progress` float NOT NULL,
  `sortorder` double NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `planned_start` datetime DEFAULT NULL,
  `planned_end` datetime DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `estado` enum('Terminado','Ejecutando','Detenido') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gantt_tasks`
--

INSERT INTO `gantt_tasks` (`id`, `mecanico`, `cliente`, `patente`, `vehiculo`, `text`, `start_date`, `duration`, `progress`, `sortorder`, `parent`, `deadline`, `planned_start`, `planned_end`, `end_date`, `estado`) VALUES
(129, 'Menoti', 'Rufino Rojas', 'yg69pp', 'Senda', 'Cambio Bujias', '2019-06-13 08:00:00', 2, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Ejecutando'),
(130, 'Messi', 'Hugo Oris', 'OO63RE', 'Amarok', 'Cambio Tensor', '2019-06-13 09:00:00', 1, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Ejecutando'),
(131, 'Basile', 'Pedro Mamani', 'AS54YU', 'Vento', 'Cardan', '2019-06-13 10:00:00', 2, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Detenido'),
(132, 'Messi', 'Juan camachos', 'QU87OO', 'Voyage', 'Correa', '2019-06-13 11:00:00', 3, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado'),
(133, '', 'Apolo Cuellar', 'OI89UII', 'Senda', 'Alineado', '0000-00-00 00:00:00', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado'),
(134, '', 'Benja Hernande', 'QQ88UH', 'Ciroco', 'Balanceo', '0000-00-00 00:00:00', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado'),
(135, '', 'Rodolfo Cuellar', 'RT67UN', 'Amarok', 'Service 100km', '0000-00-00 00:00:00', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado'),
(136, '', 'Balcazar Rodolfo', 'tv42ws', 'Senda', 'Cambio de Bomba', '0000-00-00 00:00:00', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado'),
(137, '', 'Romero Julio', 'YY10YB', 'Virtus', 'Pastillas', '0000-00-00 00:00:00', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gantt_tasks_has_members`
--

CREATE TABLE `gantt_tasks_has_members` (
  `gantt_tasks_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` varchar(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `id_fktarea` int(11) NOT NULL,
  `cargo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `fname`, `age`, `contact`, `id_fktarea`, `cargo`) VALUES
('Basile', 'jose', '23', '999', 0, 'Mecanico'),
('Menoti', 'Juan', '32', 'ada', 0, 'Electricista'),
('Messi', 'Lionel', '25', 'asd', 0, 'Mecanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks_links`
--

CREATE TABLE `tasks_links` (
  `gantt_tasks_id` int(11) NOT NULL,
  `gantt_links_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gantt_links`
--
ALTER TABLE `gantt_links`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gantt_tasks`
--
ALTER TABLE `gantt_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gantt_tasks_has_members`
--
ALTER TABLE `gantt_tasks_has_members`
  ADD PRIMARY KEY (`gantt_tasks_id`,`members_id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fktarea` (`id_fktarea`),
  ADD KEY `id_fktarea_2` (`id_fktarea`);

--
-- Indices de la tabla `tasks_links`
--
ALTER TABLE `tasks_links`
  ADD PRIMARY KEY (`gantt_tasks_id`,`gantt_links_id`),
  ADD KEY `fk_gantt_tasks_has_gantt_links_gantt_links1_idx` (`gantt_links_id`),
  ADD KEY `fk_gantt_tasks_has_gantt_links_gantt_tasks_idx` (`gantt_tasks_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gantt_links`
--
ALTER TABLE `gantt_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `gantt_tasks`
--
ALTER TABLE `gantt_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks_links`
--
ALTER TABLE `tasks_links`
  ADD CONSTRAINT `fk_gantt_tasks_has_gantt_links_gantt_links1` FOREIGN KEY (`gantt_links_id`) REFERENCES `gantt_links` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gantt_tasks_has_gantt_links_gantt_tasks` FOREIGN KEY (`gantt_tasks_id`) REFERENCES `gantt_tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
