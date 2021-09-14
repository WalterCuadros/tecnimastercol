-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2020 a las 16:40:27
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnimaster_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(15) NOT NULL,
  `raiz` varchar(50) NOT NULL,
  `descuento` int(2) NOT NULL,
  `nombre_promocion` varchar(120) NOT NULL,
  `cabecera` longtext NOT NULL,
  `footer` longtext NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `vigencia` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `raiz`, `descuento`, `nombre_promocion`, `cabecera`, `footer`, `imagen`, `vigencia`, `fecha_inicio`, `fecha_fin`, `fecha_registro`, `estado`) VALUES
(12, '', 0, 'Promocion de prueba', 'sdsdsd', 'sdsdsdsd', 'ui-divya_1589048345.jpg', '', '2020-05-09', '2020-05-17', '0000-00-00', 0),
(13, '', 0, 'Promocion de prueba', 'sdsdsd', 'sdsdsdsd', 'ui-divya_1589048989.jpg', '', '2020-05-09', '2020-05-17', '2020-05-09', 0),
(14, 'COVID', 0, 'COVID-19', 'Promoción COVID', 'Promoción COVID', 'ny_1589049495.jpg', '', '2020-05-09', '2020-08-21', '2020-05-09', 0),
(15, 'COVID-19 JUNIO', 0, 'Promocion de prueba', 'DFDFDF', 'DFDFDF', 'blog_lavadora1_1589056869.jpeg', '', '2020-05-15', '2020-08-22', '2020-05-09', 0),
(16, 'dec', 0, 'Fin año', 'Promocion para fin de año', 'Promocion para fin de año', 'images_1589072373.jpg', '', '2020-10-25', '2020-05-22', '2020-05-09', 0),
(17, 'Nov', 12, 'Noviembre', 'Promoción de novienbre', 'Contamos con el permiso de Cámara de Comercio de Bucaramanga para atender servicio técnicos a domicilio en Bucaramanga y su Área metropolitana con el debido protocolo de bioseguridad.', 'solo-img.jpg', '1 de Junio al 31 de Agosto de 2020', '2020-11-01', '2020-12-01', '2020-05-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_promociones`
--

CREATE TABLE `solicitud_promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `id_aparato` int(15) NOT NULL,
  `marca_aparato` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `state` int(1) NOT NULL,
  `codigo` varchar(70) NOT NULL,
  `id_promocion` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_promociones`
--

INSERT INTO `solicitud_promociones` (`id`, `nombre`, `apellidos`, `celular`, `email`, `id_aparato`, `marca_aparato`, `direccion`, `fecha_registro`, `state`, `codigo`, `id_promocion`) VALUES
(1, 'Promocion de prueba', 'prueba prueba ', '21524', 'a@gmail.com', 0, 'lg', 'sdd', '0000-00-00', 1, '', 12),
(2, 'Promocion de prueba', 'prueba prueba ', '21524', 'a@gmail.com', 0, 'lg', 'sdd', '0000-00-00', 1, '', 12),
(3, 'Promocion de prueba', 'prueba prueba ', '21524', 'a@gmail.com', 0, 'lg', 'sdd', '0000-00-00', 1, '', 17),
(4, 'Promocion de prueba', 'prueba prueba ', '21524', 'a@gmail.com', 0, 'lg', 'sdd', '0000-00-00', 1, '', 17),
(5, 'Promocion de prueba', 'prueba prueba ', '21524', 'a@gmail.com', 0, 'lg', 'sdd', '0000-00-00', 1, 'COVID-15892339865', 17),
(6, 'Walter', 'Cuadros Rincón', '3125454', 'w@gmail.com', 1, 'LG', 'dfdffdf', '0000-00-00', 1, '', 13),
(7, 'Walter', 'Cuadros Rincón', '3125454', 'w@gmail.com', 1, 'LG', 'dfdffdf', '2020-05-11', 1, 'COVID-15892349637', 15),
(8, 'Walter', 'Cuadros Rincón', '3125454', 'w@gmail.com', 1, 'LG', 'dfdffdf', '2020-05-11', 1, 'COVID-15892350868', 15),
(9, 'sfgfg', 'fgfg', '4454456', 'df@sd.com', 2, 'samsung', '121dsdsd', '2020-05-11', 1, 'COVID-15892353409', 14),
(10, 'dff', 'ghgh', '32365', 'p@gmail.com', 3, 'Samsung', 'fdfdf', '2020-05-11', 1, 'COVID-158923566210', 15),
(11, 'Omaira ', 'Rincón', '6581555', 'om@gmail.com', 2, 'Whirpool', 'casa', '2020-05-13', 0, 'Nov-158940965511', 0),
(12, 'Juan Camilo', 'Rincón', '3183053471', 'J@gmail.com', 4, 'Daewoo', 'casa3', '2020-05-13', 0, 'Nov-158941021712', 17),
(13, 'Promocion de prueba', 'prueba prueba ', '3183053471', 'a@h.com', 2, 'sdsd', 'hhh', '2020-05-14', 0, 'Nov-158949457713', 17),
(14, 'Promocion de prueba', 'prueba prueba ', '3183053471', 'a@h.com', 2, 'sdsd', 'hhh', '2020-05-14', 0, 'Nov-158949469114', 17),
(15, 'prueba', 'prueba prueba ', '3183053471', 'v@g.com', 2, 'fdfdf', 'dfdf', '2020-05-14', 0, 'Nov-158949475015', 17),
(16, 'prueba', 'prueba prueba ', '3183053471', 'v@g.com', 2, 'fdfdf', 'dfdf', '2020-05-14', 0, 'Nov-158949479616', 17),
(17, 'Noviembre', 'prueba prueba ', '3183053471', 'dfd@gg.com', 2, 'sdds', 'hhh', '2020-05-14', 0, 'Nov-158949532317', 17),
(18, 'Promocion de prueba', 'prueba prueba ', '54', 'f@g.com', 2, 'dfdf', 'hhh', '2020-05-14', 0, 'Nov-158949721518', 17),
(19, 'COVID-19', 'prueba prueba ', '1212', 'df@df.com', 2, 'fgfgfg', 'hhh', '2020-05-14', 0, 'Nov-158949726019', 17),
(20, 'prueba', 'sdsd', '1212', 'sd@g.com', 1, 'dffdf', 'hhh', '2020-05-14', 0, 'Nov-158949736920', 17),
(21, 'Promocion de prueba', 'prueba prueba ', '10122', 'fgfg@gm.com', 1, 'fgfgfg', 'hhh', '2020-05-14', 0, 'Nov-158949760321', 17),
(22, 'Promocion de prueba', 'prueba prueba ', '10122', 'fgfg@gm.com', 1, 'fgfgfg', 'hhh', '2020-05-14', 1, 'Nov-158949793922', 17),
(23, 'Promocion de prueba', 'fgfg', 'dfdf', 'f@gmail.com', 1, 'dfdfdf', 'dfdf', '2020-05-14', 0, 'Nov-158949801823', 17),
(24, 'dfdf', 'dfdf', '2121', 'df@gm.com', 1, 'dffdf', 'dfdf', '2020-05-14', 0, 'Nov-158949807024', 17),
(25, 'dffd', 'dfdf', '335', 'dfdf@g.com', 1, 'sdsd', 'sdsd', '2020-05-14', 0, 'Nov-158950614025', 17),
(26, 'dffd', 'dfdf', '335', 'dfdf@g.com', 1, 'sdsd', 'sdsd', '2020-05-14', 0, 'Nov-158950617826', 17),
(27, 'Walter Giovanny', 'Cuadros Rincón', '3183053471', 'wagio100@gmail.com', 1, 'Samsung', 'Calle27#1e50', '2020-05-14', 0, 'Nov-158950674227', 17),
(28, 'Walter Giovanny', 'Cuadros Rincón', '3183053471', 'wagio100@gmail.com', 1, 'Samsung', 'Calle27#1e50', '2020-05-14', 0, 'Nov-158950676228', 17),
(29, 'Walter Giovanny', 'Cuadros Rincón', '3183053471', 'wagio100@gmail.com', 1, 'Samsung', 'Calle27#1e50', '2020-05-14', 0, 'Nov-158950680429', 17),
(30, 'juan', 'rincon', '6581555', 'zeusynegra1234@gmail.com', 3, 'hp', 'calle27#1e50', '2020-05-14', 0, 'Nov-158950695230', 17),
(31, 'dfdfdf', 'dfdfdf', '21425565', 'dffdfd@g.com', 1, 'fsddf', '2322323', '2020-05-14', 0, 'Nov-158950700431', 17),
(32, 'afqdfdqa', 'qfdqafqda', '262635', 'sws@dd.com', 2, 'sxnbsxnb', 'nsbxnsbx', '2020-05-14', 0, 'Nov-158950706232', 17),
(33, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958276933', 17),
(34, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958279934', 17),
(35, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958283635', 17),
(36, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958284836', 17),
(37, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958297437', 17),
(38, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958327138', 17),
(39, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958328039', 17),
(40, 'prueba', 'dfdfd', '21231', 'dfdf@gma.com', 1, 'dfdfdf', 'dfdfdf', '2020-05-15', 0, 'Nov-158958328540', 17),
(41, 'sds', 'sdsd', '2121', 's@d.com', 1, 'sdsdsd', 'sdsdsd', '2020-05-15', 0, 'Nov-158958330841', 17),
(42, 'sds', 'sdsd', '2121', 's@d.com', 1, 'sdsdsd', 'sdsdsd', '2020-05-15', 0, 'Nov-158958339142', 17),
(43, 'sds', 'sdsd', '2121', 's@d.com', 1, 'sdsdsd', 'sdsdsd', '2020-05-15', 0, 'Nov-158958345943', 17),
(44, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958349444', 17),
(45, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958368445', 17),
(46, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958384446', 17),
(47, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958387647', 17),
(48, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958402948', 17),
(49, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958407749', 17),
(50, 'dfdf', 'dfdf', '1021', 'dfdf@gma.com', 1, 'sdsdsd', 'sdsd', '2020-05-15', 0, 'Nov-158958459250', 17),
(51, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958461251', 17),
(52, 'sas', 'ss', '122', 'aaaa@fd.com', 1, 'df', '22', '2020-05-15', 0, 'Nov-158958475552', 17),
(53, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958841053', 17),
(54, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958852854', 17),
(55, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958862755', 17),
(56, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958864156', 17),
(57, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958865357', 17),
(58, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958866758', 17),
(59, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958962459', 17),
(60, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958965460', 17),
(61, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958966961', 17),
(62, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958969162', 17),
(63, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958971063', 17),
(64, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958972664', 17),
(65, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958975865', 17),
(66, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958977066', 17),
(67, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958979067', 17),
(68, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958980468', 17),
(69, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158958982269', 17),
(70, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959027770', 17),
(71, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959030471', 17),
(72, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959051472', 17),
(73, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959113673', 17),
(74, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959115974', 17),
(75, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959129075', 17),
(76, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959132176', 17),
(77, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959139877', 17),
(78, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959146378', 17),
(79, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959152479', 17),
(80, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959155280', 17),
(81, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959158281', 17),
(82, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959159982', 17),
(83, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959161883', 17),
(84, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959164784', 17),
(85, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959166085', 17),
(86, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959167286', 17),
(87, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959173187', 17),
(88, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959175588', 17),
(89, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959177789', 17),
(90, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959185590', 17),
(91, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959188591', 17),
(92, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959189792', 17),
(93, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959199293', 17),
(94, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959200194', 17),
(95, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959203995', 17),
(96, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959214296', 17),
(97, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959216597', 17),
(98, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959220098', 17),
(99, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-158959223499', 17),
(100, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592264100', 17),
(101, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592282101', 17),
(102, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592295102', 17),
(103, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592332103', 17),
(104, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592385104', 17),
(105, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592410105', 17),
(106, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592428106', 17),
(107, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592445107', 17),
(108, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592466108', 17),
(109, 'aaa', 'aaaa', '21323', 'aa@g.com', 1, 'aaaa', 'aaa', '2020-05-15', 0, 'Nov-1589592486109', 17),
(110, 'Pedro', 'Cuadros', '3125727998', 'pedro@gmail.com', 4, 'LG', 'Calle27#1e50', '2020-05-15', 0, 'Nov-1589592721110', 17),
(111, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638371111', 17),
(112, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638413112', 17),
(113, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638503113', 17),
(114, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638522114', 17),
(115, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638540115', 17),
(116, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638552116', 17),
(117, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638580117', 17),
(118, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638598118', 17),
(119, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638629119', 17),
(120, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638685120', 17),
(121, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638710121', 17),
(122, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638754122', 17),
(123, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638807123', 17),
(124, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638817124', 17),
(125, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638825125', 17),
(126, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638839126', 17),
(127, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638984127', 17),
(128, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589638999128', 17),
(129, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589639034129', 17),
(130, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589639118130', 17),
(131, 'Yorley', 'Candela', '3184800268', 'yor@g.com', 1, 'Lg', 'Reposo', '2020-05-16', 0, 'Nov-1589639131131', 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_promociones`
--
ALTER TABLE `solicitud_promociones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `solicitud_promociones`
--
ALTER TABLE `solicitud_promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
