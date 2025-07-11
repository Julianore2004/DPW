-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2025 a las 05:58:04
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
-- Base de datos: `dpw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textoimagen`
--

CREATE TABLE TextoImagen (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    textos TEXT NOT NULL,
    img TEXT NOT NULL
);


--
-- Volcado de datos para la tabla `textoimagen`
--

INSERT INTO `textoimagen` (`id`, `titulo`, `textos`, `img`) VALUES
(1, 'baner', '', 'img/baner.jpeg'),
(2, 'slide1', '', 'img/IMG_8246.JPG'),
(3, 'slide2', '', 'img/IMG_6328.JPG'),
(4, 'slide3', '', 'img/slide3.1.jpg'),
(5, 'Nuevas Oportunidades de Becas 2025', 'Nuevas Oportunidades de Becas 2025: Conoce las diferentes modalidades de becas disponibles para estudiantes destacados.', 'img/1752205935_becas_2023_ch.jpg'),
(6, 'Convenio con Empresas', 'Convenio con Empresas: Firmamos importantes acuerdos con empresas para fortalecer la inserción laboral de nuestros egresados.', 'img/1752205787_banner_CrearEmpresaenMexico.png'),
(7, 'WEBINAR', '\"Conectando Ideas, Creando Futuros\"\r\n\r\nParticipa en nuestros webinars y forma parte de espacios virtuales donde el conocimiento, la innovación y la colaboración se unen. A través de estas sesiones en línea, expertos comparten experiencias, tendencias y herramientas clave para impulsar tu crecimiento personal y profesional.', 'img/IMG_8332.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

--
-- Volcado de datos para la tabla `usuarios`
--
CREATE TABLE Usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario TEXT NOT NULL UNIQUE,
    contraseña TEXT NOT NULL
);

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`) VALUES
(1, 'usuario1', 'contraseña1'),
(2, 'usuario2', 'contraseña2'),
(3, 'usuario3', 'contraseña3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `textoimagen`
--
ALTER TABLE `textoimagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `textoimagen`
--
ALTER TABLE `textoimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
