-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2015 a las 02:32:30
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `faregas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `borraClie`(
cod char(5)
)
delete from cliente where cli_cod=cod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borraRev`(
cod char(5)
)
delete from revision where rev_id=cod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editaClie`(
 cod varchar(5),
 dni int,
 ext varchar(5),/**/
 nom varchar(25),/**/
 pat varchar(25),
 mat varchar(25),
 tel int,
 mail varchar(50),
 dire varchar(100),
 tip varchar(100),
 marca varchar(30),
 model varchar(30),
 placa varchar(10)
)
BEGIN
	IF isnull(ext) THEN
		update cliente set  cli_dni=dni,cli_nombre=nom,cli_pater=pat,cli_mater=mat,cli_telf=tel,cli_email=mail,cli_direccion=dire,
		cli_tipvehiculo=tip,cli_marca=marca,cli_model=model,placa=cli_placa where cli_cod=cod;
	ELSE
		set @foto:= concat(cod,'_', TRUNCATE(rand() *100 ,0 ),'.',ext);
		update cliente set cli_dni=dni,cli_foto=@foto, cli_nombre=nom,cli_pater=pat,cli_mater=mat,cli_telf=tel,cli_email=mail,cli_direccion=dire,
		cli_tipvehiculo=tip,cli_marca=marca,cli_model=model,cli_placa=placa where cli_cod=cod;
		select @foto img;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editaMis`(
cuer mediumtext
)
update mision set  mis_cuerpo=cuer$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editaNos`(
	cuer mediumtext
)
update nosotros set  nos_cuerpo=cuer$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editaServ`(
 cod varchar(5),
 motor varchar(25),
 tubo varchar(25),
 bujias varchar(25),
 bobinas varchar(25),
 radiador varchar(25),
 mangeras varchar(25),
 filtros varchar(25),
 chek varchar(2)
 )
update revision set rev_motor=motor, rev_tubo=tubo, rev_bujias=bujias, 
 rev_bobinas=bobinas, rev_radidador=radiador, rev_mangeras=mangeras, rev_filtros=filtros, rev_check=chek
 where rev_id=cod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertClie`(	
 dni int,
 ext varchar(5),/**/
 nom varchar(25),/**/
 pat varchar(25),
 mat varchar(25),
 tel int,
 mail varchar(50),
 dire varchar(100),
 tip varchar(100),
 marca varchar(30),
 model varchar(30),
 placa varchar(10)
 )
BEGIN
     DECLARE co CHAR(5);
     DECLARE img varchar(15);
       SET co = (select concat('cl',right(concat('000',right(IFNULL(max(cli_cod),0),3)+1),3)) AS COD from cliente);
       SET img = (select concat(co ,'.',ext));
       insert into cliente(cli_cod,cli_dni,cli_foto,cli_nombre,cli_pater,
		 cli_mater,cli_telf,cli_email,cli_direccion,cli_tipvehiculo,cli_marca,cli_model,cli_placa) values(co,dni,img,nom,pat,mat,tel,mail,dire,tip,marca,model,placa);
       select img;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRev`(
codclie varchar(5),	
motor varchar(25),
tubo varchar(25),
bujias varchar(25),
bobinas varchar(25),
radiador varchar(25),
mangeras varchar(25),
filtros varchar(25),
chek varchar(2)
 )
BEGIN
     DECLARE co VARCHAR(5);
       SET co = (select concat('re',right(concat('000',right(IFNULL(max(rev_id),0),3)+1),3)) AS COD from revision);      
       insert into revision(rev_id,cli_cod,rev_motor,rev_tubo,rev_bujias,rev_bobinas,rev_radidador,rev_mangeras,rev_filtros,rev_check) 
		 values(co,codclie,motor,tubo,bujias,bobinas,radiador,mangeras,filtros,chek);
		 select co;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostCertificado`()
select cli_nombre, cli_pater, cli_tipvehiculo, cli_marca, rev_motor, rev_tubo, rev_bujias, rev_filtros 
from cliente cl inner join revision rv on cl.cli_cod = rv.cli_cod where rev_check='si'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostClie`()
select * from cliente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostMis`()
select mis_cuerpo cue from mision$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostNos`()
select nos_cuerpo cue from nosotros$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostRev`()
select * from revision$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login`(
us VARCHAR(50),
ps VARCHAR(20)
)
BEGIN
		declare resul varchar(100);
		declare rola char(3);
		set resul = (select nomusu from usuario where email=us and pass=ps);
		set rola = (select rol from usuario where email=us and pass=ps);
		IF (resul <> '') THEN
       		 select 'success' res,resul,rola;	       
     ELSE     
        select 'fail' res;
     END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_cod` varchar(5) NOT NULL,
  `cli_dni` int(11) NOT NULL,
  `cli_foto` varchar(50) NOT NULL,
  `cli_nombre` varchar(25) NOT NULL,
  `cli_pater` varchar(25) NOT NULL,
  `cli_mater` varchar(25) NOT NULL,
  `cli_telf` int(11) NOT NULL,
  `cli_email` varchar(50) NOT NULL,
  `cli_direccion` varchar(100) NOT NULL,
  `cli_tipvehiculo` varchar(100) NOT NULL,
  `cli_marca` varchar(30) NOT NULL,
  `cli_model` varchar(30) NOT NULL,
  `cli_placa` varchar(10) NOT NULL,
  `cli_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cli_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_cod`, `cli_dni`, `cli_foto`, `cli_nombre`, `cli_pater`, `cli_mater`, `cli_telf`, `cli_email`, `cli_direccion`, `cli_tipvehiculo`, `cli_marca`, `cli_model`, `cli_placa`, `cli_fecha`) VALUES
('cl001', 12345678, 'cl001_91.jpg', 'Julio', 'Mitac', 'Quispe', 987645, 'julio@gmail.com', 'av.aviacion', 'automovil', 'toyota', 'deportivo', 'uk-4521', '2015-12-09 06:03:51'),
('cl002', 98765432, 'cl002_59.jpg', 'Zulema', 'Mitac', 'Sallo', 8795461, 'mabel@gmail.com', 'San Juan de Lurigancho', 'Automovil', 'Toyota', 'Normal', 'uk-787', '2015-12-11 21:56:39'),
('cl003', 54621387, 'cl003.jpg', 'Jorge', 'Perez', 'Mesa', 5462121, 'jorge@gmail.com', 'Los Olivos', 'automovil', 'nissan', 'normal', 'kj-454', '2015-12-11 23:05:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

CREATE TABLE IF NOT EXISTS `mision` (
  `mis_cuerpo` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`mis_cuerpo`) VALUES
('<p style="text-align:justify">Como empresa que brinda la seguridad de conformidad seg&uacute;n ley deseamos convertirnos en la &nbsp;entidad certificadora m&aacute;s grande del Pa&iacute;s<br />\r\nen cuando a Conversiones de GLP y contar con diversas sedes en todas las regiones del pa&iacute;s para poder tener una gran diversidad de clientes<br />\r\ny la completa satisfacci&oacute;n de los mismos.</p>\r\n\r\n<p style="text-align:justify">asdasdasdas</p>\r\n<!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue --><!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue -->');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE IF NOT EXISTS `nosotros` (
  `nos_cuerpo` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`nos_cuerpo`) VALUES
('<p>Otorgar un servicio de calidad y con obtener un alto grado de satisfacci&oacute;n por parte del cliente, por lo que realizamos las conversiones a Gas Licuado de Petr&oacute;leo y entregamos los certificados para garantizar la calidad y el compromiso que tenemos con nuestros clientes.&nbsp;<!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue --></p>\r\n\r\n<p>asdasdas</p>\r\n<!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue --><!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue -->');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE IF NOT EXISTS `revision` (
  `rev_id` varchar(5) NOT NULL,
  `cli_cod` varchar(5) NOT NULL,
  `rev_motor` varchar(25) NOT NULL,
  `rev_tubo` varchar(25) NOT NULL,
  `rev_bujias` varchar(25) NOT NULL,
  `rev_bobinas` varchar(25) NOT NULL,
  `rev_radidador` varchar(25) NOT NULL,
  `rev_mangeras` varchar(25) NOT NULL,
  `rev_filtros` varchar(25) NOT NULL,
  `rev_check` varchar(2) NOT NULL,
  `rev_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rev_id`),
  KEY `cli_cod` (`cli_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`rev_id`, `cli_cod`, `rev_motor`, `rev_tubo`, `rev_bujias`, `rev_bobinas`, `rev_radidador`, `rev_mangeras`, `rev_filtros`, `rev_check`, `rev_fecha`) VALUES
('re001', 'cl001', 'motor cambiado', 'tubo cambiado', 'bujia', 'bobina', 'radiador', 'manguera', 'filtro', 'si', '2015-12-11 18:20:04'),
('re002', 'cl002', 'motor2', 'tubo2', 'bujias2', 'bobinas2', 'radiador2', 'mangueras2', 'filtros2', 'no', '2015-12-11 23:02:42'),
('re003', 'cl003', 'motor3', 'tubo3', 'bujias3', 'bobinas3 cambio', 'radiador3', 'mangueras3', 'filtros3', 'si', '2015-12-11 23:07:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codusu` char(9) NOT NULL,
  `nomusu` varchar(40) NOT NULL,
  `rol` char(3) NOT NULL DEFAULT 'U',
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`codusu`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nomusu`, `rol`, `email`, `pass`) VALUES
('us0001', 'Administrador', 'A', 'admin@faregas.com', 'faregas123'),
('us0002', 'Asistente', 'S', 'asistente@faregas.com', 'asistente123'),
('us0003', 'Mecanico', 'M', 'mecanico@faregas.com', 'mecanico123');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`cli_cod`) REFERENCES `cliente` (`cli_cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
