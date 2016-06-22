DROP DATABASE if exists tabla;

--
-- Base de datos: `gasa`
--
CREATE DATABASE `tabla` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tabla`;

CREATE TABLE IF NOT EXISTS `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `apn` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `claboral` varchar(50) NOT NULL,
  `ingresos` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `apn`, `dni`, `telefono`, `direccion`, `email`, `claboral`, `ingresos`) VALUES
(1, ' Patrick Valderrama Carbajal', ' 4567892', ' 214897', ' Fortunato Herrera Nro 345. Urb La rinconada', ' patrickvcarb@hotmail.com', ' antamina', ' 10000'),
(2, ' Carlos Mendoza Cruz', ' 1787778', ' 234567', ' Av. EspaÃ±a Nro 678', ' carlomend@hotmail.com', 'Movistar', ' 4500'),
(3, ' Paul Cortijo Mendoza', ' 2349874', ' 345215', ' Enrique Lopez Albujar Nro 244. Urb Los Portales', ' cortijom@hotmail.com', ' Damper', ' 3000'),
(4, ' Rosita Carranza de la Cruz', ' 2349023', ' 214567', 'Pasaje Miguel Grau Nro 365. Urb Daniel Hoyle', 'carranzarc@hotmail.com', ' UNT', ' 3200'),
(5, ' Alex Vargas Sanchez', ' 7349873', '984567737', ' Av. Larco Nro 748', 'alexvarsan@gmail.com', ' sunarp', ' 2500'),
(6, ' Jorge Castro Rodriguez', ' 7634521', ' 567893', ' Independencia Nro 209', ' jorgecas@hotmail.com', ' UNT', ' 3300'),
(7, 'Cesar Ulloa Perez', ' 5532789', ' 947653459', ' Orbegoso Nro 108', 'ulloacesar20@hotmail.com', ' Claro', ' 5000'),
(8, 'Kevin Cueva Jara', ' 2345678', ' 947865342', ' Godofredo Garcia Nro 559. Urb Los Granados', ' kevin2015@hotmail.com', 'rustica', ' 2500');