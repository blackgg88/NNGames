-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 01:32:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paredes_saul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'Consolas'),
(2, 'PC'),
(3, 'Equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `nombre` varchar(100) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `id` int(11) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `leido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`nombre`, `asunto`, `email`, `id`, `mensaje`, `leido`) VALUES
('Saul Paredes', 'dasd', 'saul_paredes@hotmail.es', 1, 'asda', 1),
('Saul Paredes', 'dasd', 'saul_paredes@hotmail.es', 2, 'sadas', 0),
('Saul Paredes', 'dasd', 'saul_paredes@hotmail.es', 3, 'ada', 1),
('Saul Paredes', 'testeo', 'email@ht.com', 4, 'vista de consulta ante un mensaje largo, como se ve el recuadro el cual contiene el mensaje', 1),
('saul', 'lala', 'saulezeq@hotmai.com', 5, 'lalalala', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL DEFAULT 1,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `disable` int(1) NOT NULL DEFAULT 0,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double(11,2) NOT NULL,
  `tipo_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `imagen`, `disable`, `categoria_id`, `nombre`, `precio`, `tipo_id`) VALUES
(1, 'descripcion', 'uploads/13.jpg', 0, 1, 'Persona 5', 2700.00, 2),
(2, 'descripcion', 'uploads/7.jpg', 0, 1, 'Bloodborn', 1700.00, 2),
(3, 'descripcion', 'uploads/9.jpg', 0, 2, 'Anthem', 2500.00, 1),
(4, 'descripcion', 'uploads/8.jpg', 0, 2, 'Destiny 2', 4999.00, 2),
(5, 'descripcion', 'uploads/6.jpg', 0, 2, 'GTA V', 1800.00, 2),
(6, 'descripcion', 'uploads/11.jpg', 0, 2, 'Doom', 2500.00, 1),
(7, 'descripcion', 'uploads/59.png', 0, 2, 'God of War', 1800.00, 2),
(8, 'descripcion', 'uploads/60.png', 0, 1, 'Sekiro Shadows Die Twice', 5799.00, 2),
(9, 'descripcion', 'uploads/61.png', 0, 2, 'Nier:Automata', 2789.00, 2),
(10, 'descripcion', 'uploads/62.png', 0, 2, 'Ori and the Will of the WIPS', 1600.00, 1),
(11, 'descripcion', 'uploads/63.png', 0, 2, 'Call Of Dutty Modern Warfare', 2679.00, 1),
(12, 'descripcion', 'uploads/64.png', 0, 2, 'Shadow of the Colossus', 1200.00, 1),
(13, 'descripcion', 'uploads/65.png', 0, 1, 'Horizon Zero Dawn', 1890.00, 1),
(14, 'descripcion', 'uploads/66.png', 0, 1, 'Devil May Cry 5', 2899.00, 2),
(15, 'descripcion', 'uploads/67.png', 0, 2, 'Resident Evil 2', 1600.00, 1),
(16, 'descripcion', 'uploads/68.png', 0, 1, 'Resident Evil 3', 4799.00, 1),
(17, 'descripcion', 'uploads/69.png', 0, 1, 'Uncharted 4', 3599.00, 1),
(18, 'descripcion', 'uploads/70.png', 0, 2, 'Death Stranding', 3489.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_producto`
--

CREATE TABLE `tipos_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_producto`
--

INSERT INTO `tipos_producto` (`id`, `descripcion`) VALUES
(1, 'regular'),
(2, 'destacado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `disable` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `username`, `password`, `email`, `perfil_id`, `disable`) VALUES
(1, 'Saul', 'Paredes', 'admin', 'YWRtaW4=', 'saul_paredes@hotmail.es', 1, 0),
(2, 'Pepe', 'Millonario', 'pepe', 'cGVwZQ==', 'email@ht.com', 2, 0),
(3, 'Usuario', 'Comun', 'user1', 'dXNlcjE=', 'comunuser@ht.com', 2, 1),
(4, 'ezequiel', 'paredes', 'eze', 'ZXpl', 'sausak@gmail.com', 2, 0),
(5, 'saul', 'paredes', 'sauleze', 'MTIzNDU2', 'saul_paredes@gmail.com', 2, 0),
(6, 'laura', 'gomez', 'laugo', 'MTIzNDU2Nw==', 'laugo@gmail.com', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_cabecera`
--

CREATE TABLE `venta_cabecera` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` double(11,2) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `codigo_postal` varchar(30) NOT NULL,
  `provincia` varchar(150) NOT NULL,
  `ciudad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_cabecera`
--

INSERT INTO `venta_cabecera` (`id`, `usuario_id`, `fecha`, `total`, `direccion`, `codigo_postal`, `provincia`, `ciudad`) VALUES
(8, 1, '2020-06-02 13:30:39', 5200.00, 'calle falsa', '2141', 'corrientes', 'corrientes'),
(9, 1, '2020-06-18 00:35:05', 1700.00, 'lalka', '3400', 'corrientes', 'corrientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `subtotal` double(11,2) NOT NULL,
  `venta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_detalle`
--

INSERT INTO `venta_detalle` (`id`, `cantidad`, `producto_id`, `subtotal`, `venta_id`) VALUES
(12, 1, 1, 2700.00, 8),
(13, 1, 6, 2500.00, 8),
(14, 1, 2, 1700.00, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_categoria_id` (`categoria_id`),
  ADD KEY `FK_producto_tipo` (`tipo_id`);

--
-- Indices de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `FK_perfil` (`perfil_id`);

--
-- Indices de la tabla `venta_cabecera`
--
ALTER TABLE `venta_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuario_id` (`usuario_id`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_producto_detalle` (`producto_id`),
  ADD KEY `FK_venta_detalle` (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta_cabecera`
--
ALTER TABLE `venta_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `FK_producto_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_producto` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`);

--
-- Filtros para la tabla `venta_cabecera`
--
ALTER TABLE `venta_cabecera`
  ADD CONSTRAINT `FK_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD CONSTRAINT `FK_producto_detalle` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `FK_venta_detalle` FOREIGN KEY (`venta_id`) REFERENCES `venta_cabecera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
