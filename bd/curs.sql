-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2022 a las 18:38:01
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curs`
--
CREATE DATABASE IF NOT EXISTS `curs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `curs`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `admin_login` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `admin_login`, `admin_pwd`, `email_admin`) VALUES
(1, 'admin', 'admin', 'q1161510618@gmail.com'),
(2, 'admin2', 'LJQ2171lei', 'q1161510618@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumne`
--

CREATE TABLE `tbl_alumne` (
  `id_alumne` int(10) NOT NULL,
  `dni_alu` varchar(9) DEFAULT NULL,
  `nom_alu` varchar(20) NOT NULL,
  `cognom1_alu` varchar(20) DEFAULT NULL,
  `cognom2_alu` varchar(20) DEFAULT NULL,
  `telf_alu` varchar(9) DEFAULT NULL,
  `email_alu` varchar(50) DEFAULT NULL,
  `classe` int(5) NOT NULL,
  `pwd_alu` varchar(20) NOT NULL,
  `foto_alu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_alumne`
--

INSERT INTO `tbl_alumne` (`id_alumne`, `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`, `pwd_alu`, `foto_alu`) VALUES
(2, '44144771C', 'josepe', 'martinez', 'alarcon', '621417319', '34593@jjr.com', 3, 'QWEqwe123', '01-00-28-26-05-22-Ricardo.jpg'),
(3, '62514419M', 'francisco', 'lopez', 'leon', '607279597', '11221@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(4, '73963100E', 'juan', 'sanchez', 'gallardo', '633294699', '55764@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(5, '64579914P', 'manuel', 'gonzalez', 'molina', '622619497', '79458@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(6, '97557087B', 'pedro', 'gomez', 'soto', '607310032', '93914@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(7, '72256939R', 'jesus', 'fernandez', 'lopez', '679437261', '55236@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(8, '30915465S', 'angel', 'moreno', 'orio', '621466347', '11976@jjr.com', 4, 'QWEqwe123', 'predeterminada.png'),
(9, '97840439A', 'miguel', 'jimenez', 'garcia', '660316860', '64633@jjr.com', 8, 'QWEqwe123', 'predeterminada.png'),
(10, '06694041Y', 'javier', 'perez', 'ortega', '637306446', '78375@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(16, '07850913R', 'miguel', 'hernandez', 'valero', '611787948', '69677@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(17, '45076240N', 'francisco', 'muñoz', 'cebrian', '648694035', '83236@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(18, '08142355X', 'rafael', 'saez', 'rodenas', '662929903', '78313@jjr.com', 4, 'QWEqwe123', 'predeterminada.png'),
(19, '54817434Q', 'daniel', 'romero', 'alarcon', '657302386', '39187@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(20, '09798360S', 'juan', 'rubio', 'blazquez', '688709758', '41878@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(21, '52730523X', 'luis', 'alfaro', 'nuñez', '698360677', '57439@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(22, '27791256B', 'pablo', 'molina', 'pardo', '656956290', '31582@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(23, '46559516H', 'juan', 'lozano', 'moya', '625047529', '73261@jjr.com', 2, 'QWEqwe123', 'predeterminada.png'),
(24, '86402786C', 'joaquin', 'castillo', 'tebar', '672486950', '29149@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(25, '57018231N', 'sergio', 'picazo', 'requena', '623708766', '62619@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(26, '34305751D', 'fernando', 'ortega', 'arenas', '666529048', '53149@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(27, '18990238N', 'juan', 'morcillo', 'ballesteros', '610497218', '36752@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(28, '41818828K', 'andres', 'cano', 'collado', '628660763', '56151@jjr.com', 2, 'QWEqwe123', 'predeterminada.png'),
(29, '90779892L', 'jose', 'marin', 'alfaro', '648321765', '97857@jjr.com', 4, 'QWEqwe123', 'predeterminada.png'),
(30, '12507403A', 'jose', 'cuenca', 'molina', '674298668', '47519@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(31, '70120582E', 'ramon', 'garrido', 'lozano', '697082820', '97727@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(32, '11674759M', 'raul', 'torres', 'castillo', '604088933', '99262@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(33, '34443858R', 'alberto', 'corcoles', 'picazo', '644698140', '47224@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(34, '66615127C', 'enrique', 'gil', 'ortega', '699408053', '32312@jjr.com', 8, 'QWEqwe123', 'predeterminada.png'),
(35, '86621958W', 'alvaro', 'ortiz', 'morcillo', '646072972', '89116@jjr.com', 8, 'QWEqwe123', 'predeterminada.png'),
(36, '87514672V', 'vicente', 'calero', 'cano', '683544189', '91864@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(37, '71410483Z', 'emilio', 'valero', 'marin', '600949935', '66259@jjr.com', 7, 'QWEqwe123', 'predeterminada.png'),
(38, '55659863R', 'francisco', 'cebrian', 'lopez', '631765307', '13695@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(39, '34684851T', 'diego', 'rodenas', 'sanchez', '631394823', '19677@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(40, '42673739E', 'julian', 'alarcon', 'gonzalez', '686645022', '19886@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(41, '15033566F', 'jorge', 'blazquez', 'gomez', '629225313', '85222@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(42, '57466006T', 'alfonso', 'nuñez', 'fernandez', '692086143', '37537@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(43, '08137411B', 'adrian', 'pardo', 'moreno', '639726193', '55496@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(44, '76075150M', 'ruben', 'moya', 'jimenez', '696883270', '77353@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(45, '44017529Z', 'santiago', 'tebar', 'perez', '62925740', '39895@jjr.com', 5, 'QWEqwe123', 'predeterminada.png'),
(46, '52382335L', 'ivan', 'requena', 'rodriguez', '650013489', '27679@jjr.com', 8, 'QWEqwe123', 'predeterminada.png'),
(47, '13734123H', 'juan', 'arenas', 'navarro', '689704122', '76887@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(48, '57902012H', 'pascual', 'ballesteros', 'ruiz', '657442180', '15694@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(49, '15270087L', 'jose', 'collado', 'diaz', '625879662', '65436@jjr.com', 7, 'QWEqwe123', 'predeterminada.png'),
(50, '25877613Z', 'mario', 'ramirez', 'serrano', '675551921', '76367@jjr.com', 7, 'QWEqwe123', 'predeterminada.png'),
(51, '38597622B', 'Marisela', 'alarcon', 'hernandez', '618075194', '31891@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(52, '88076852P', 'Julieta', 'leon', 'muñoz', '616033538', '63899@jjr.com', 6, 'QWEqwe123', 'predeterminada.png'),
(53, '92300391B', 'Pacífica', 'gallardo', 'saez', '629541001', '71168@jjr.com', 3, 'QWEqwe123', 'predeterminada.png'),
(54, '04203374D', 'Constanza', 'molina', 'romero', '620800626', '83724@jjr.com', 1, 'QWEqwe123', 'predeterminada.png'),
(55, '37452894Q', 'Cleto', 'soto', 'ballesteros', '611979869', '84582@jjr.com', 8, 'QWEqwe123', 'predeterminada.png'),
(56, '69458741Y', 'Diana', 'lopez', 'collado', '673658939', '35537@jjr.com', 7, 'QWEqwe123', 'predeterminada.png'),
(57, '92572187Q', 'Olalla', 'orio', 'ramirez', '671487900', '66994@jjr.com', 4, 'QWEqwe123', 'predeterminada.png'),
(58, '56730408B', 'Felicia', 'garcia', 'alarcon', '628759336', '73522@jjr.com', 4, 'QWEqwe123', 'predeterminada.png'),
(59, '02164996Y', 'Olga', 'ortega', 'leon', '633245479', '93815@jjr.com', 7, 'QWEqwe123', 'predeterminada.png'),
(66, '13121234X', 'jin', 'lin', '', '123432123', 'jinlin@gmail.com', 1, '', 'predeterminada.png'),
(72, '49813243G', 'Ricardo', 'Durán', 'Gallego', '644151250', 'durangallego1@gmail.com', 1, '', 'predeterminada.png'),
(74, '49813243G', 'Ricardo', 'Durán', 'Gallego', '644151250', '54123@gmail.com', 1, '', 'predeterminada.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_classe`
--

CREATE TABLE `tbl_classe` (
  `id_classe` int(5) NOT NULL,
  `codi_classe` varchar(5) NOT NULL,
  `nom_classe` varchar(25) DEFAULT NULL,
  `tutor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_classe`
--

INSERT INTO `tbl_classe` (`id_classe`, `codi_classe`, `nom_classe`, `tutor`) VALUES
(1, '10032', '1rSMX', 1),
(2, '10032', '2nSMX', 5),
(3, '20032', '1rASIX', 7),
(4, '20032', '2nASIX', 2),
(5, '30032', '1rDAW', 6),
(6, '30032', '2nDAW', 4),
(7, '40032', '1rDAM', 8),
(8, '40032', '2nDAM', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `id_dept` int(5) NOT NULL,
  `codi_dept` varchar(5) NOT NULL,
  `nom_dept` varchar(50) DEFAULT NULL,
  `nomcor_dept` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_dept`
--

INSERT INTO `tbl_dept` (`id_dept`, `codi_dept`, `nom_dept`, `nomcor_dept`) VALUES
(1, '1061', 'Sistema Microinformaticos y Redes', 'SMX'),
(2, '2012', 'Administracion de Sistemas Informaticos de Redes', 'ASIX'),
(3, '3034', 'Desarrollo de Aplicaciones Web', 'DAW'),
(4, '4022', 'Desarrollo de Aplicaciones Multiplataforma', 'DAM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_professor`
--

CREATE TABLE `tbl_professor` (
  `id_professor` int(5) NOT NULL,
  `nom_prof` varchar(20) NOT NULL,
  `cognom1_prof` varchar(20) DEFAULT NULL,
  `cognom2_prof` varchar(20) DEFAULT NULL,
  `email_prof` varchar(50) DEFAULT NULL,
  `telf` varchar(5) DEFAULT NULL,
  `dept` int(5) NOT NULL,
  `pwd_profe` varchar(20) NOT NULL,
  `baja_prof` int(1) NOT NULL,
  `foto_prof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_professor`
--

INSERT INTO `tbl_professor` (`id_professor`, `nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `pwd_profe`, `baja_prof`, `foto_prof`) VALUES
(1, 'sergio', 'rodriguez', 'fernandez', 'sergiorodfer@jjr.com', '32256', 1, 'ASDasd123', 1, 'predeterminada.png'),
(2, 'maria', 'dominguez', 'rubio', 'mariadomrub@jjr.com', '32252', 2, 'ASDasd123', 1, 'predeterminada.png'),
(3, 'david', 'campos', 'leon', 'davidcamleo@jjr.com', '32246', 4, 'ASDasd123', 0, 'predeterminada.png'),
(4, 'jose', 'cortes', 'lozano', 'josecorloz@jjr.com', '22256', 3, 'ASDasd123', 0, 'predeterminada.png'),
(5, 'juan', 'carrasco', 'calvo', 'juancarcal@jjr.com', '12226', 1, 'ASDasd123', 0, 'predeterminada.png'),
(6, 'pepe', 'herrera', 'campos', 'pepehercam@jjr.com', '32551', 3, 'ASDasd123', 0, 'predeterminada.png'),
(7, 'olaf', 'soto', 'rojas', 'olafsotroj@jjr.com', '13487', 2, 'ASDasd123', 0, 'predeterminada.png'),
(8, 'duna', 'cabrera', 'gallego', 'dunacabgal@jjr.com', '22438', 4, 'ASDasd123', 0, 'predeterminada.png'),
(9, 'jin', 'lin', 'quan', 'q1161510618@gmail.com', '32154', 1, 'LJQ2171lei', 0, 'predeterminada.png'),
(11, 'Javi', 'Vazquez', 'Baños', 'javi@gmail.com', '12345', 1, '', 0, 'predeterminada.png'),
(13, 'Pepe', 'Rana', 'Marcopolo', 'PepeMarco@gmail.com', '68509', 1, '', 0, 'predeterminada.png'),
(14, 'Otilio', 'Pelaez', 'Marcopolo', 'Otilio@gmail.com', '66643', 1, '', 0, '12-56-37-26-05-22-317014736444211.webp'),
(15, 'oscar', 'perez', 'molina', 'oscar@jjr.com', '69509', 3, '', 0, '06-24-01-26-05-22-foto.JPG.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_alumne`
--
ALTER TABLE `tbl_alumne`
  ADD PRIMARY KEY (`id_alumne`),
  ADD KEY `alumne_classe_fk` (`classe`);

--
-- Indices de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `classe_prof_fk` (`tutor`);

--
-- Indices de la tabla `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indices de la tabla `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `prof_dept_fk` (`dept`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_alumne`
--
ALTER TABLE `tbl_alumne`
  MODIFY `id_alumne` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  MODIFY `id_classe` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `id_dept` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_professor`
--
ALTER TABLE `tbl_professor`
  MODIFY `id_professor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_alumne`
--
ALTER TABLE `tbl_alumne`
  ADD CONSTRAINT `alumne_classe_fk` FOREIGN KEY (`classe`) REFERENCES `tbl_classe` (`id_classe`);

--
-- Filtros para la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  ADD CONSTRAINT `classe_prof_fk` FOREIGN KEY (`tutor`) REFERENCES `tbl_professor` (`id_professor`);

--
-- Filtros para la tabla `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD CONSTRAINT `prof_dept_fk` FOREIGN KEY (`dept`) REFERENCES `tbl_dept` (`id_dept`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
