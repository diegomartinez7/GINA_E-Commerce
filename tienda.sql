-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2020 a las 10:58:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `Codigo` varchar(10) NOT NULL,
  `ID_Usuario` int(10) UNSIGNED NOT NULL,
  `Disponible` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Categoria` varchar(25) NOT NULL,
  `Descripcion` varchar(70) NOT NULL,
  `Precio` int(6) NOT NULL,
  `Existencia` int(5) NOT NULL,
  `Imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `Nombre`, `Categoria`, `Descripcion`, `Precio`, `Existencia`, `Imagen`) VALUES
(1, 'Casco Philadelphia', 'Equipo_Accesorio', 'Casco oficial de la NFL - Philadelphia Eagles', 3400, 21, 'img/casco_eagles.jpg'),
(2, 'Wilson Falcon 12', 'Equipo_Accesorio', 'Bate de béisbol juvenil, aleación de murciélago', 750, 45, 'img/wilson_falcon.jpg'),
(3, 'Pelotas de tenis Penn', 'Equipo_Accesorio', 'Paquete Championship de 15 latas de 3 pelotas cada uno', 1575, 30, 'img/pelotas_penn.jpg'),
(4, 'Balón Mikasa v200w', 'Equipo_Accesorio', 'Balón oficial de la Liga de Campeones CEV', 2200, 15, 'img/mikasa_v200w.jpg'),
(5, 'Red Spalding', 'Equipo_Accesorio', 'Red en blanco para aro de basketball - Spalding', 165, 55, 'img/red_spalding.jpg'),
(6, 'Camiseta Naffta F186', 'Ropa', 'Camiseta de padel y tenis para mujer - Naffta', 569, 150, 'img/camiseta_naffta.jpg'),
(7, 'Uniforme Voleibol UDI Sport Rosa', 'Ropa', 'Uniforme Rosa-Negro-Blanco de Voleibol para mujer, cuello tipo V - UDI', 380, 120, 'img/voleibol_mujer.jpg'),
(8, 'Pantalón de béisbol gris', 'Ropa', 'Pantalón gris de uniforme de béisbol para hombre - El Siglo', 378, 100, 'img/pantalon_beisbol.jpg'),
(9, 'Jersey Venom portero', 'Ropa', 'Jersey de fútbol de marvel Venom para portero - Buffon', 527, 50, 'img/portero_venom.png'),
(10, 'Jersey deportiva verde', 'Ropa', 'Jersey para hombre estilo deportivo - Goodluck Uniform', 275, 223, 'img/green_jersey.jpg'),
(11, 'Balon Spalding', 'Equipo_Accesorio', 'Balón de basketbol', 250, 15, 'img/balonBasket.jpg'),
(12, 'Tobillera Nike', 'Equipo_Accesorio', 'Tobillera de material elástico', 299, 6, 'img/tobilleraNike.jpg'),
(13, 'Portería', 'Equipo_Accesorio', 'Portería para niños', 300, 4, 'img/porteria.jpg'),
(14, 'Guantes PSG', 'Equipo_Accesorio', 'Guantes para frío', 299, 5, 'img/guantesPSG.jpg'),
(15, 'Banda capitán', 'Equipo_Accesorio', 'Banda de capitan adidas', 200, 12, 'img/bandaAdidas.jpg'),
(16, 'Licra Nike', 'Ropa', 'Licra para frío', 399, 25, 'img/licra.jpg'),
(17, 'Jersey Cruz Azul', 'Ropa', 'Jersey temporada 2020-2021', 1099, 18, 'img/cruzAZul.jpg'),
(18, 'Chaqueta Adidas', 'Ropa', 'Chaqueta para entrenar', 999, 20, 'img/chaquetaAdidas.jpg'),
(19, 'Gorro Puma', 'Ropa', 'Gorro para invierno', 350, 13, 'img/gorroPuma.jpg'),
(20, 'Pants Puma N', 'Ropa', 'Pants de entrenamiento', 400, 21, 'img/pantsPuma.jpg'),
(26, 'Bandas Para Mujer', 'Equipo_Accesorio', 'Bandas Para el cabello para Futbol', 235, 21, 'img/bandas-mujer.jpg'),
(27, 'Bendas para Box', 'Equipo_Accesorio', 'Bendas Everlast para Boxeo 5cm', 135, 66, 'img/bendas-box.jpg'),
(28, 'Guantes de Box', 'Equipo_Accesorio', 'Guantes Rojos para Box Cleto Reyes', 2000, 16, 'img/cleto-reyes.jpg'),
(29, 'Cubrebocas', 'Equipo_Accesorio', 'Cubrebocas Deprtivo Negro Under Armour', 250, 121, 'img/cubrebocas-under-armour.png'),
(30, 'Manilla Rawlings', 'Equipo_Accesorio', 'Manilla para Baseball Rawlings Negra', 900, 23, 'img/manilla-rawlings.jpg'),
(31, 'Bandas Para Mujer', 'Equipo_Accesorio', 'Bandas Para el cabello para Futbol', 235, 21, 'img/bandas-mujer.jpg'),
(32, 'Bendas para Box', 'Equipo_Accesorio', 'Bendas Everlast para Boxeo 5cm', 135, 66, 'img/bendas-box.jpg'),
(33, 'Guantes de Box', 'Equipo_Accesorio', 'Guantes Rojos para Box Cleto Reyes', 2000, 16, 'img/cleto-reyes.jpg'),
(34, 'Cubrebocas', 'Equipo_Accesorio', 'Cubrebocas Deprtivo Negro Under Armour', 250, 121, 'img/cubrebocas-under-armour.png'),
(35, 'Manilla Rawlings', 'Equipo_Accesorio', 'Manilla para Baseball Rawlings Negra', 900, 23, 'img/manilla-rawlings.jpg'),
(36, 'Playera Nike', 'Ropa', 'Playera Nike Entrenamiento Azul', 499, 23, 'img/nike._tr.jpg'),
(37, 'Jersey Nike NBA', 'Ropa', 'Jersey Edicion Especial Kobe Bryant', 1659, 8, 'img/jersey_kobe.jpg'),
(38, 'Short Bayern', 'Ropa', 'Short de Entrenamioento Adidas edición Bayern', 299, 12, 'img/short_bayern.jpg'),
(39, 'Pants Puma', 'Ropa', 'Pants Puma Negro Entrenamiento', 500, 55, 'img/pants_puma.png'),
(40, 'Playera Under Armour', 'Ropa', 'Playera Under Armour Gris de Entrenamiento', 359, 46, 'img/ua_compresion.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cuenta` varchar(50) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Habilitado` int(1) NOT NULL,
  `Pais` varchar(15) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `CP` varchar(10) NOT NULL,
  `Respaldo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Cuenta`, `Clave`, `Correo`, `Habilitado`, `Pais`, `Ciudad`, `Direccion`, `CP`, `Respaldo`) VALUES
(1, 'Christopher Diego Martínez Bernal', 'Diego Daymon', 'kalilinux', 'diego_daymon@gmail.com', 0, 'Australia', 'Canberra', 'Calle Kanguro #111', '2601', 'DoubleLayer'),
(2, 'Juan Aristizábal Vázquez', 'Juanes', 'malagente', 'misangre@gmail.com', 0, 'México', 'Aguascalientes', 'Calle Inauguración #200', '1723', 'Temblor'),
(3, 'Luis Felipe Velázquez López', 'Philip', 'jojos', 'lus_vela@hotmail.com', 0, 'México', 'Real de Haciendas', 'Aguascalientes', '20196', 'Fácil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Folio_Vta` int(10) UNSIGNED NOT NULL,
  `ID_Usuario` int(10) UNSIGNED NOT NULL,
  `ID_Producto` int(10) UNSIGNED NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Folio_Vta`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Folio_Vta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD CONSTRAINT `cupones_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
