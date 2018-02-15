-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2018 a las 19:19:01
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarContacto` (IN `pidcontacto` INT(8))  NO SQL
BEGIN
	DELETE FROM contactos WHERE id_contacto=pidcontacto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarContacto` (IN `pnombre` VARCHAR(32), IN `papellido` VARCHAR(32), IN `ptelefono` INT, IN `pemail1` VARCHAR(32), IN `pemail2` VARCHAR(32), IN `pgrupo1` INT, IN `pgrupo2` INT, IN `pgrupo3` INT)  NO SQL
BEGIN

 DECLARE maxIdContacto int(3);    
    
 INSERT INTO contactos(nombre,apellido,telefono) VALUES (pnombre,papellido,ptelefono);  	
   
 SET maxIdContacto= (SELECT MAX(id_contacto) FROM contactos);
    
 INSERT INTO email(correo,id_contacto) VALUES (pemail1,maxIdContacto);
 
 IF pemail2 != " "
 THEN
 INSERT INTO email(correo,id_contacto) VALUES (pemail2,maxIdContacto);
 END IF;
 
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (maxIdContacto,pgrupo1); 

 IF pgrupo2 != " "
 THEN
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (maxIdContacto,pgrupo2);
 END IF;
 
 IF pgrupo3 != " "
 THEN
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (maxIdContacto,pgrupo3);
 END IF;
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarContactoTransac` (IN `pNombre` VARCHAR(40), IN `pApellido` VARCHAR(40), IN `pTelefono` INT(9))  NO SQL
BEGIN
	INSERT INTO contactos(nombre,apellido,telefono) VALUES (pNombre,pApellido,pTelefono);
    SELECT LAST_INSERT_ID() ultimoId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarEmailTransac` (IN `pEmail` VARCHAR(40), IN `pId` INT)  NO SQL
BEGIN
	INSERT INTO email (correo,id_contacto) VALUES (pEmail,pId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarContacto` (IN `pidcontacto` VARCHAR(8), IN `pnombre` VARCHAR(32), IN `papellido` VARCHAR(32), IN `ptelefono` INT(9), IN `pemail1` VARCHAR(32), IN `pemail2` VARCHAR(32), IN `pgrupo1` INT(8), IN `pgrupo2` INT(8), IN `pgrupo3` INT(8))  NO SQL
BEGIN
DECLARE borraridcontacto int(8);

SET borraridcontacto=pidcontacto;
  
DELETE FROM contactos WHERE id_contacto=pidcontacto;
    
INSERT INTO contactos(id_contacto,nombre,apellido,telefono) VALUES (borraridcontacto,pnombre,papellido,ptelefono); 	
 
     
 INSERT INTO email(correo,id_contacto) VALUES (pemail1,borraridcontacto);
 
 IF pemail2 != " "
 THEN
 INSERT INTO email(correo,id_contacto) VALUES (pemail2,borraridcontacto);
 END IF;
 
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (borraridcontacto,pgrupo1); 

 IF pgrupo2 != " "
 THEN
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (borraridcontacto,pgrupo2);
 END IF;
 
 IF pgrupo3 != " "
 THEN
 INSERT INTO contactosgrupos(id_contacto,id_grupo) VALUES (borraridcontacto,pgrupo3);
 END IF;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarComboContacto` ()  NO SQL
BEGIN
	SELECT id_contacto,nombre FROM contactos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarComboGrupo` ()  NO SQL
BEGIN
	SELECT id_grupo, nom_grupo FROM grupo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarListado` ()  NO SQL
BEGIN

SELECT contactos.id_contacto,contactos.nombre,contactos.apellido,contactos.telefono,temail.emails,tgrupo.colgrupos

FROM contactos 

LEFT JOIN (SELECT id_contacto, GROUP_CONCAT(correo) AS emails FROM email GROUP BY id_contacto) AS temail ON temail.id_contacto = contactos.id_contacto

LEFT JOIN (SELECT contactosgrupos.id_contacto, GROUP_CONCAT(grupo.nom_grupo) AS colgrupos FROM grupo
INNER JOIN contactosgrupos ON contactosgrupos.id_grupo = grupo.id_grupo GROUP BY contactosgrupos.id_contacto) AS tgrupo ON tgrupo.id_contacto = contactos.id_contacto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrar` (IN `pNombre` VARCHAR(40), IN `pPass` VARCHAR(500))  NO SQL
BEGIN
	INSERT INTO usuarios (nom_usuario,contrasena,rol) VALUES (pNombre,pPass,'cliente');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellido`, `telefono`) VALUES
(54, 'Iker', 'Larrea', 671136181),
(66, 'Ander', 'Larrea', 698564547),
(67, 'pepe', 'dasd', 69584567),
(68, 'pepe', 'dasd', 69584567),
(69, 'czcxz', 'czxcxzc', 6958654);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactosgrupos`
--

CREATE TABLE `contactosgrupos` (
  `id_contacto` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactosgrupos`
--

INSERT INTO `contactosgrupos` (`id_contacto`, `id_grupo`) VALUES
(54, 4),
(54, 5),
(54, 6),
(66, 4),
(66, 6),
(67, 4),
(68, 4),
(69, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `correo` varchar(32) NOT NULL,
  `id_contacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `correo`, `id_contacto`) VALUES
(69, 'bbb@gmail.com', 54),
(70, 'ddd@gmail.com', 54),
(80, 'and2@gmail.com', 66),
(81, 'p@gmail.com', 67),
(82, 'p@gmail.com', 68),
(83, 'cac@gmail.com', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nom_grupo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nom_grupo`) VALUES
(4, 'Amigos'),
(5, 'Trabajo'),
(6, 'Familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(32) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `rol` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nom_usuario`, `contrasena`, `rol`) VALUES
(2, 'admin', '$2y$12$z1YQ3OEsgZZcS/4EdHfmoeN/ZiymegZc32Qm81x2ZL.bz4ABQWWde', 'administrador'),
(3, 'iker', '$2y$12$qo6yOfHlFgrVKKhIBqRTVe6uTsEr0kuMVAZT68CjKTHtPxbWdUJ0K', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `contactosgrupos`
--
ALTER TABLE `contactosgrupos`
  ADD PRIMARY KEY (`id_contacto`,`id_grupo`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactosgrupos`
--
ALTER TABLE `contactosgrupos`
  ADD CONSTRAINT `contactosgrupos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contactosgrupos_ibfk_2` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contacto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contacto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
