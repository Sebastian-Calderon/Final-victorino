-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2024 a las 17:06:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Admin_ID` int(11) NOT NULL,
  `Inve_ID` int(11) DEFAULT NULL,
  `PRe_ID` int(11) DEFAULT NULL,
  `Empl_ID` int(11) DEFAULT NULL,
  `Satellite_ID` int(11) DEFAULT NULL,
  `Prod_Term_ID` int(11) DEFAULT NULL,
  `ID_Mate_prima` int(11) DEFAULT NULL,
  `Prod_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_bodega`
--

CREATE TABLE `aux_bodega` (
  `ID_AuxBodega` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo_material` varchar(50) DEFAULT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `stock_disponible` int(11) DEFAULT NULL,
  `precio_rollo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aux_bodega`
--

INSERT INTO `aux_bodega` (`ID_AuxBodega`, `nombre`, `tipo_material`, `unidad_medida`, `fecha`, `stock_disponible`, `precio_rollo`) VALUES
(1, '122', '12', 122, '0111-02-11', 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `edad` int(2) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cargo_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `edad`, `fecha_nacimiento`, `fecha_contrato`, `direccion`, `telefono`, `correo`, `cargo_ID`) VALUES
(1, 'Juan Pérez', 35, '1988-04-12', '2023-01-01', 'Av. Siempreviva 123', '5555555555', 'juan.perez@ejemplo.com', 'DES001'),
(2, 'alejandro guaquez', 23, '1996-01-22', '2024-12-07', 'calle 34 # 45 -sur', '3187670883', 'lgfweli@gmali.com', '123ASD'),
(6, 'Sofía Hernández', 30, '1993-03-18', '2022-12-10', 'Avenida Principal 1212', '1212121212', 'sofia.hernandez@ejemplo.com', 'DES001'),
(7, 'Raul Costa', 38, '1985-06-05', '2019-04-05', 'Calle de la Paz 1313', '2345678901', 'carlos.rivera@ejemplo.com', 'CON002'),
(8, 'Laura Ruiz', 27, '1996-09-11', '2023-02-15', 'Urbanización Costa 1414', '3456789012', 'laura.ruiz@ejemplo.com', 'MAR003'),
(9, 'David Santos', 39, '1984-12-28', '2020-06-20', 'Camino del Mar 1515', '4567890123', 'david.santos@ejemplo.com', 'GER001'),
(10, 'Andrea Moreno', 29, '1994-04-04', '2022-11-05', 'Avenida del Parque 1616', '5678901234', 'andrea.moreno@ejemplo.com', 'DES001'),
(11, 'Miguel Díaz', 37, '1986-07-21', '2019-03-10', 'Calle de los Ríos 1717', '6789012345', 'miguel.diaz@ejemplo.com', 'CON002'),
(12, 'Paula López', 26, '1997-10-13', '2023-01-25', 'Urbanización Sierra 1818', '7890123456', 'paula.lopez@ejemplo.com', 'MAR003'),
(13, 'Daniel García', 41, '1982-05-09', '2020-05-15', 'Camino del Campo 1919', '8901234567', 'daniel.garcia@ejemplo.com', 'GER001'),
(14, 'Vanessa Torres', 31, '1992-08-26', '2022-10-20', 'Avenida Central 2020', '9012345678', 'vanessa.torres@ejemplo.com', 'DES001'),
(15, 'Rodrigo Gómez', 35, '1988-01-15', '2021-03-05', 'Calle del Sol 2121', '1234567890', 'rodrigo.gomez@ejemplo.com', 'CON002'),
(16, 'Camila Ruiz', 28, '1995-12-30', '2023-02-01', 'Urbanización Bosque 2222', '2345678901', 'camila.ruiz@ejemplo.com', 'MAR003'),
(17, 'Sebastián Santos', 39, '1984-03-25', '2020-05-10', 'Camino de la Luna 2323', '3456789012', 'sebastian.santos@ejemplo.com', 'GER001'),
(18, 'Valentina Moreno', 29, '1994-07-11', '2022-11-15', 'Avenida de las Estrellas 2424', '4567890123', 'valentina.moreno@ejemplo.com', 'DES001'),
(19, 'Nicolás Díaz', 37, '1986-10-28', '2019-02-20', 'Calle de los Sueños 2525', '5678901234', 'nicolas.diaz@ejemplo.com', 'CON002'),
(20, 'Alejandra López', 26, '1997-02-05', '2023-01-10', 'Urbanización Jardín 2626', '6789012345', 'alejandra.lopez@ejemplo.com', 'MAR003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `Hist_ID` int(11) NOT NULL,
  `PRe_ID` int(11) DEFAULT NULL,
  `Fecha_Entrada` datetime DEFAULT NULL,
  `Fecha_Salida` datetime DEFAULT NULL,
  `Cantidad_Retirada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`Hist_ID`, `PRe_ID`, `Fecha_Entrada`, `Fecha_Salida`, `Cantidad_Retirada`) VALUES
(1, 9, '2024-12-09 09:17:04', '2024-12-09 09:52:26', NULL),
(2, 8, '2024-12-09 09:15:37', '2024-12-09 09:54:20', NULL),
(3, 8, '2024-12-09 09:15:37', '2024-12-09 09:57:28', NULL),
(4, 4, '2024-12-09 09:14:23', '2024-12-09 10:01:06', 1),
(5, 4, '2024-12-09 10:03:58', NULL, 10),
(6, 4, '2024-12-09 09:14:23', '2024-12-09 10:05:22', -5),
(7, 4, '2024-12-09 10:05:59', NULL, 7),
(8, 4, '2024-12-09 09:14:23', '2024-12-09 10:06:17', -8),
(9, 4, '2024-12-09 10:34:20', NULL, 10),
(10, 11, '2024-12-09 10:34:32', NULL, 5),
(11, 4, '2024-12-09 10:46:44', NULL, 10),
(12, 4, '2024-12-09 09:14:23', '2024-12-09 10:46:53', -10),
(13, 4, '2024-12-09 09:14:23', '2024-12-09 10:47:46', -4),
(14, 4, '2024-12-09 09:14:23', '2024-12-09 10:50:45', -4),
(15, 4, '2024-12-09 10:51:01', NULL, 10),
(16, 4, '2024-12-09 10:51:13', NULL, 1),
(17, 4, '2024-12-09 09:14:23', '2024-12-09 10:51:18', -7),
(18, 4, '2024-12-09 09:14:23', '2024-12-09 10:52:57', -7),
(19, 4, '2024-12-09 10:53:16', NULL, 2),
(20, 4, '2024-12-09 09:14:23', '2024-12-09 10:53:31', -5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(15) NOT NULL,
  `cantidad_disponible` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `cantidad_disponible`, `descripcion`, `fecha_entrada`, `fecha_salida`) VALUES
(1, '4', 'Lapices HB', '2023-01-01', '2023-04-05'),
(2, '69', 'perra herazo', '2023-01-01', '2023-04-12'),
(4, '50', 'chaquetas de cuero', '2023-01-01', '2024-12-07'),
(12, '4', 'Lapices HB', '2023-01-01', NULL),
(14, '4', 'Lapices HB', '2023-01-01', NULL),
(15, '4', 'Lapices HB', '2023-01-01', NULL),
(16, '34', 'chaquetas de sol', '2024-09-11', '0000-00-00'),
(17, '4', 'Lapices HB', '2023-01-01', NULL),
(18, '4', 'Lapices HB', '2023-01-01', NULL),
(19, '4', 'Lapices HB', '2023-01-01', NULL),
(23, '34', 'blaizer', '2024-10-17', '2025-02-14'),
(222, '333', 'feo', '2024-12-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Prod_ID` int(11) NOT NULL,
  `Prod_Nombre` varchar(100) DEFAULT NULL,
  `Prod_Prec_Compra` int(11) DEFAULT NULL,
  `Prod_Prec_Venta` int(11) DEFAULT NULL,
  `Prod_Cantidad` int(11) DEFAULT NULL,
  `Prod_Ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Prod_ID`, `Prod_Nombre`, `Prod_Prec_Compra`, `Prod_Prec_Venta`, `Prod_Cantidad`, `Prod_Ubicacion`) VALUES
(3, 'Chinseao', 8000, 15000, 50, 'Suba'),
(4, 'fff', 88, 99, 9, 'Suba'),
(5, 'ss', 10, 10, 20, 'Suba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_realizado`
--

CREATE TABLE `producto_realizado` (
  `PRe_ID` int(11) NOT NULL,
  `PRe_Cantidad` int(11) DEFAULT NULL,
  `PRe_Nombre` varchar(100) DEFAULT NULL,
  `PRe_Referencia` varchar(100) DEFAULT NULL,
  `PRe_Prec_Realizacion` int(11) DEFAULT NULL,
  `Des_producto` varchar(100) DEFAULT NULL,
  `Detalle_producto` varchar(100) DEFAULT NULL,
  `Fecha_Entrada` datetime DEFAULT current_timestamp(),
  `Fecha_Salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_realizado`
--

INSERT INTO `producto_realizado` (`PRe_ID`, `PRe_Cantidad`, `PRe_Nombre`, `PRe_Referencia`, `PRe_Prec_Realizacion`, `Des_producto`, `Detalle_producto`, `Fecha_Entrada`, `Fecha_Salida`) VALUES
(4, 0, 'Cremalleras', '1234', 1000, NULL, 'Bueno', '2024-12-09 09:14:23', '2024-12-09 10:53:31'),
(5, 1, 'Se', '10', 120, NULL, 'Bueno', '2024-12-09 09:14:23', '2024-12-09 09:31:07'),
(6, 0, 'Se', '10', 120, NULL, 'Bueno', '2024-12-09 09:15:01', '2024-12-09 09:24:21'),
(7, 10, 'Se', '10', 120, NULL, 'Bueno', '2024-12-09 09:15:11', NULL),
(8, 0, 'Sebas', '123', 12, NULL, 'Bueno', '2024-12-09 09:15:37', '2024-12-09 09:57:28'),
(9, 0, 'Sebas', '123', 12, NULL, 'Bueno', '2024-12-09 09:17:04', '2024-12-09 09:52:26'),
(10, 0, 'ropa', '1234', 1000, NULL, 'Bueno', '2024-12-09 09:17:37', '2024-12-09 09:46:10'),
(11, 5, 'sebas', '123', 122, NULL, 'Bueno', '2024-12-09 09:23:31', '2024-12-09 09:34:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_terminado`
--

CREATE TABLE `producto_terminado` (
  `Pro_Term_ID` int(11) NOT NULL,
  `Fecha_entrada` date DEFAULT NULL,
  `Fecha_Entrega` date DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Tipo_Chaqueta` varchar(50) DEFAULT NULL,
  `Material_Sobrante` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_terminado`
--

INSERT INTO `producto_terminado` (`Pro_Term_ID`, `Fecha_entrada`, `Fecha_Entrega`, `Cantidad`, `Tipo_Chaqueta`, `Material_Sobrante`) VALUES
(1, '5555-05-05', '0055-12-05', 12, 'kj', 'jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satelite`
--

CREATE TABLE `satelite` (
  `Satelite_ID` int(11) NOT NULL,
  `Material_Descripcion` varchar(50) DEFAULT NULL,
  `Material_Cantidad` int(11) DEFAULT NULL,
  `Tipo_Material` varchar(50) DEFAULT NULL,
  `Fecha_Entrada` date DEFAULT NULL,
  `Fecha_Salida` date DEFAULT NULL,
  `Pro_Term_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_empleado` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_empleado`, `nombre_usuario`, `contrasena`, `cargo`, `fecha_ingreso`) VALUES
(0, 'melisaroja', 'Pesd43', 'el kakas', '2012-02-15'),
(1, 'juanperez', 'contraseña123', 'Desarrollador', '2023-01-01'),
(2, 'marialopez', 'clave456', 'Contador', '2022-05-15'),
(3, 'pedrogomez', 'pass789', 'Diseñador', '2021-10-01'),
(4, 'anagarcia', 'secret0', 'Asistente', '2023-03-20'),
(5, 'luismartinez', 'admin123', 'Gerente', '2020-08-01'),
(6, 'sofiahernandez', 'password987', 'Analista', '2022-12-10'),
(7, 'carlosrivera', 'clave123', 'Vendedor', '2019-04-05'),
(8, 'lauraruiz', 'pass456', 'Marketing', '2023-02-15'),
(9, 'davidsantos', 'secret789', 'Soporte', '2020-06-20'),
(10, 'andreamoreno', 'admin987', 'RRHH', '2022-11-05'),
(11, 'migueldiaz', 'clave123', 'Desarrollador', '2019-03-10'),
(12, 'paulalopez', 'pass456', 'Contador', '2023-01-25'),
(13, 'danielgarcia', 'secret789', 'Diseñador', '2020-05-15'),
(14, 'vanessatorres', 'admin123', 'Asistente', '2022-10-20'),
(15, 'rodrigogomez', 'clave987', 'Gerente', '2021-03-05'),
(16, 'camila_ruiz', 'pass123', 'Vendedor', '2023-02-01'),
(17, 'sebastiansantos', 'secret456', 'Marketing', '2020-05-10'),
(18, 'valentinamoreno', 'admin789', 'Soporte', '2022-11-15'),
(19, 'nicolasdiaz', 'clave987', 'RRHH', '2019-02-20'),
(20, 'alejandralopez', 'pass123', 'Desarrollador', '2023-01-10'),
(1203, 'melisaroja', 'Pesd43', 'maquetador', '2012-02-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin'),
(2, 'camilo', '4464882dc89b7fa42117e929233f75359622031304413825e28aa992b1c5d08a', 'employee'),
(3, 'jose', '1cd763f4482ed8c2f58fe7608542b975c0b158c81aae7aaade5d58b0164b4a37', 'employee'),
(4, 'sebas', '70bd8714a2d856538c68cb92919d6573f4c690959e148dc133f6f043c0e41199', 'admin'),
(5, 'jess', 'c5c8477bdda35a938ea29635f6b3f02acffb1767ada24e16534a899e570dc398', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `PRe_ID` (`PRe_ID`),
  ADD KEY `Prod_ID` (`Prod_ID`);

--
-- Indices de la tabla `aux_bodega`
--
ALTER TABLE `aux_bodega`
  ADD PRIMARY KEY (`ID_AuxBodega`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`Hist_ID`),
  ADD KEY `PRe_ID` (`PRe_ID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Prod_ID`);

--
-- Indices de la tabla `producto_realizado`
--
ALTER TABLE `producto_realizado`
  ADD PRIMARY KEY (`PRe_ID`);

--
-- Indices de la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  ADD PRIMARY KEY (`Pro_Term_ID`);

--
-- Indices de la tabla `satelite`
--
ALTER TABLE `satelite`
  ADD PRIMARY KEY (`Satelite_ID`),
  ADD KEY `Pro_Term_ID` (`Pro_Term_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aux_bodega`
--
ALTER TABLE `aux_bodega`
  MODIFY `ID_AuxBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `Hist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto_realizado`
--
ALTER TABLE `producto_realizado`
  MODIFY `PRe_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  MODIFY `Pro_Term_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `satelite`
--
ALTER TABLE `satelite`
  MODIFY `Satelite_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`PRe_ID`) REFERENCES `producto_realizado` (`PRe_ID`),
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`Prod_ID`) REFERENCES `productos` (`Prod_ID`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`PRe_ID`) REFERENCES `producto_realizado` (`PRe_ID`);

--
-- Filtros para la tabla `satelite`
--
ALTER TABLE `satelite`
  ADD CONSTRAINT `satelite_ibfk_1` FOREIGN KEY (`Pro_Term_ID`) REFERENCES `producto_terminado` (`Pro_Term_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
