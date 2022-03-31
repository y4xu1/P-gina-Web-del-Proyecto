-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2022 a las 23:48:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trascendental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante`
--

CREATE TABLE `aspirante` (
  `docAspirante` double NOT NULL,
  `numIdentificacion` double NOT NULL,
  `PnombreAspirante` varchar(60) NOT NULL,
  `SnombreAspirante` varchar(60) NOT NULL,
  `PapellidoAspirante` varchar(60) NOT NULL,
  `SapellidoAspirante` varchar(60) NOT NULL,
  `fotoAspirante` blob NOT NULL,
  `fechaExpDoc` date NOT NULL,
  `paisExpDoc` varchar(60) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `paisNacimiento` varchar(60) NOT NULL,
  `direccionResidencia` varchar(60) NOT NULL,
  `ciudad` varchar(60) NOT NULL,
  `telefonoContacto` double NOT NULL,
  `correoElectronico` varchar(60) NOT NULL,
  `tipoCargo` varchar(60) NOT NULL,
  `estadoCivil` varchar(60) NOT NULL,
  `estrato` int(10) NOT NULL,
  `rh` varchar(10) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `libretaMilitar` double NOT NULL,
  `eps` varchar(60) NOT NULL,
  `arl` varchar(60) NOT NULL,
  `estadoAspirante` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aspirante`
--

INSERT INTO `aspirante` (`docAspirante`, `numIdentificacion`, `PnombreAspirante`, `SnombreAspirante`, `PapellidoAspirante`, `SapellidoAspirante`, `fotoAspirante`, `fechaExpDoc`, `paisExpDoc`, `fechaNacimiento`, `paisNacimiento`, `direccionResidencia`, `ciudad`, `telefonoContacto`, `correoElectronico`, `tipoCargo`, `estadoCivil`, `estrato`, `rh`, `genero`, `libretaMilitar`, `eps`, `arl`, `estadoAspirante`) VALUES
(34532270, 34532270, 'Diana', 'Catalina', 'Díaz', 'Beltrán', '', '2022-05-08', 'Colombia', '1990-09-03', 'Colombia', 'Carrera 13L # 68 - 11', 'Medellín', 3159874563, 'catalinabeltran@gmail.com', 'Obrero', 'Soltero', 3, 'A-', 'Femenino', 0, 'Compensar', 'Colpatria', 1),
(34564978, 34564978, 'Laura', 'Camila', 'Sánchez', 'Prada', '', '2022-03-09', 'Colombia', '1995-09-21', 'Argentina', 'Trasversal 14c # 12 - 74', 'Armenia', 3160014596, 'lauracamila@gmail.com', 'Operario de maquina pesada', 'Casado', 5, 'A+', 'Femenino', 0, 'Saludcoop', 'Sura', 1),
(41733718, 41733718, 'Jenny', 'Viviana', 'Rey', 'Botero', '', '2021-11-24', 'Colombia', '1994-08-11', 'Argentina', 'Calle 15 # 10 - 56', 'Barranquilla', 3145264006, 'viviana548521@gmail.com', 'Operario de maquinas', 'Separado', 4, 'B-', 'Femenino', 0, 'Colseguros', 'Aurora', 1),
(52729563, 52729563, 'Carlos', 'Daniel', 'Mendoza', 'Pinzón', '', '2004-08-19', 'Colombia', '1986-05-05', 'Colombia', 'Carrera 21b # 09 - 25', 'Medellín', 3136947812, 'carmendoza@gmail.com', 'Operario de maquinas', 'Soltero', 4, 'A+', 'Masculino', 368941, 'Compensar', 'Bolívar', 1),
(67609436, 67609436, 'Claudia', 'Liliana', 'Nieto', 'Bustos', '', '2022-06-08', 'Colombia', '1994-10-12', 'Bolivia', 'Diagonal 3 # 12 - 14', 'Cartagena', 3196784231, 'claudiab@gmail.com', 'Operario de maquina pesada', 'Soltero', 2, 'O-', 'Femenino', 0, 'Sanitas', 'Colmena', 1),
(1000620101, 1000620101, 'Juan', 'Felipe', 'Lozano', 'Ramírez', '', '1987-01-19', 'Colombia', '1845-02-01', 'Colombia', 'Diagonal 84 # 78 - 03', 'Cota', 3226954152, 'juan12@gmail.com', 'Operario de maquinas', 'Viudo', 2, 'AB-', 'Masculino', 260595, 'Cruz Blanca', 'Sura', 1),
(1053963400, 1053963400, 'Ángela', 'Patricia', 'Cruz', 'García', '', '2021-09-07', 'Colombia', '1992-12-16', 'Brasil', 'Avenida 12 # 4 - 10', 'Cali', 3179687100, 'angelapc237@gmail.com', 'Obrero', 'Casado', 2, 'O+', 'Femenino', 0, 'Cafesalud', 'Sura', 1),
(1054780841, 1054780841, 'Carlos', 'Felipe', 'Mogollón', 'Pachón', '', '2021-06-29', 'Colombia', '1991-05-01', 'Chile', 'Calle 20 # 5 - 22', 'Armenia', 3106987453, 'carlos54654@gmail.com', 'Operario de maquina pesada', 'Separado', 3, 'A+', 'Masculino', 358945, 'Salud Total', 'Positiva', 1),
(1869300472, 1869300472, 'Camilo', 'Alberto', 'Cortes', 'Montejo', '', '2022-03-15', 'Colombia', '1999-06-24', 'Argentina', 'Carrera 19 # 7 - 34', 'Barranquilla', 3145967820, 'camilocortes523@gmail.com', 'Obrero', 'Casado', 2, 'AB+', 'Masculino', 895412, 'Salud Colmena', 'Colpatria', 1),
(1986300145, 1986300145, 'Mario', 'Andrés', 'Duarte', 'Cárdenas', '', '1996-05-23', 'Colombia', '1978-02-19', 'Colombia', 'Calle 14a # 10a - 79', 'Bogotá D.C', 3225974512, 'marioandy@gmail.com', 'Obrero', 'Casado', 3, 'O+', 'Masculino', 401547, 'Famisanar', 'Axa Colpatria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citasmedicas`
--

CREATE TABLE `citasmedicas` (
  `numOrden` double NOT NULL,
  `docAspirante` double DEFAULT NULL,
  `nombresCompletosDoctor` varchar(60) NOT NULL,
  `diaHoy` date DEFAULT NULL,
  `horaHoy` time DEFAULT NULL,
  `diaCita` date NOT NULL,
  `horaCita` time NOT NULL,
  `correoElectronicoAspirante` varchar(60) NOT NULL,
  `estadoCitas` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citasmedicas`
--

INSERT INTO `citasmedicas` (`numOrden`, `docAspirante`, `nombresCompletosDoctor`, `diaHoy`, `horaHoy`, `diaCita`, `horaCita`, `correoElectronicoAspirante`, `estadoCitas`) VALUES
(1, 34532270, 'Richard Tovar Cárdenas', '2021-06-09', '20:35:00', '2021-08-12', '10:30:00', 'catalinabeltran@gmail.com', 1),
(2, 34564978, 'Andrea Proaño Calderon', '2021-02-24', '08:40:00', '2021-12-01', '08:30:00', 'lauracamila@gmail.com', 1),
(3, 41733718, 'Aarón Arturo Robles Ramírez', '2021-05-07', '09:30:00', '2021-07-21', '06:00:00', 'viviana548521@gmail.com', 1),
(4, 52729563, ' Lucía Galán Bertrand', '2021-10-14', '18:43:00', '2021-12-09', '07:30:00', 'carmendoza@gmail.com', 1),
(5, 67609436, 'Richard Tovar Cárdenas', '2021-09-16', '07:21:00', '2021-10-12', '08:00:00', 'claudiab@gmail.com', 1),
(6, 1000620101, 'José Antonio Rodríguez', '2022-01-05', '06:50:00', '2022-03-11', '09:30:00', 'juan12@gmail.com', 1),
(7, 1053963400, 'Richard Tovar Cárdenas', '2022-02-27', '10:00:00', '2022-04-07', '10:00:00', 'angelapc237@gmail.com', 1),
(8, 1054780841, ' Lucía Galán Bertrand', '2022-03-18', '16:50:00', '2022-05-08', '06:00:00', 'carlos54654@gmail.com', 1),
(9, 1869300472, 'Andrea Proaño Calderon', '2022-06-22', '12:00:00', '2022-08-18', '09:00:00', 'camilocortes523@gmail.com', 1),
(10, 1986300145, 'Aarón Arturo Robles Ramírez', '2022-10-13', '05:55:00', '2022-11-14', '07:00:00', 'marioandy@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `tipoContrato` varchar(60) NOT NULL,
  `docAspirante` double NOT NULL,
  `docRecHum` double NOT NULL,
  `tipoCargoDesp` varchar(60) NOT NULL,
  `salario` double NOT NULL,
  `valorPrestaciones` double NOT NULL,
  `fechaInicio` date NOT NULL,
  `nombreObra` varchar(60) NOT NULL,
  `ciudadObra` varchar(60) NOT NULL,
  `firma` blob NOT NULL,
  `estadoContrato` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`idContrato`, `tipoContrato`, `docAspirante`, `docRecHum`, `tipoCargoDesp`, `salario`, `valorPrestaciones`, `fechaInicio`, `nombreObra`, `ciudadObra`, `firma`, `estadoContrato`) VALUES
(1001, 'TERMINO INDEFINIDO', 34532270, 15133916, 'Obrero', 1500000, 1000000, '2021-01-06', 'Amarilo', 'Bogotá', '', 1),
(1002, 'TERMINO FIJO', 34564978, 76308613, 'Operario de maquina pesada', 1200000, 300000, '2021-05-07', 'Colpatria', 'Medellín', '', 1),
(1003, 'OBRA O LABOR ', 41733718, 76415948, 'Operario de maquinas', 3000000, 1000000, '2021-11-23', 'Grupo éxito', 'Barranquilla', '', 1),
(1004, 'TERMINO INDEFINIDO', 52729563, 97414524, 'Operario de maquinas', 2000000, 1300000, '2021-03-04', 'Konecta cloud', 'Bogotá', '', 1),
(1005, 'TERMINO FIJO', 67609436, 98176120, 'Operario de maquina pesada', 2000000, 1100000, '2021-06-09', 'Colsubsidio', 'Barranquilla', '', 1),
(1006, 'OBRA O LABOR ', 1000620101, 1000098763, 'Operario de maquinas', 1500000, 1000000, '2022-03-10', 'Avianca', 'Cota', '', 1),
(1007, 'TERMINO INDEFINIDO', 1053963400, 1017896301, 'Obrero', 4000000, 2000000, '2022-05-03', 'Amarilo', 'Cota', '', 1),
(1008, 'TERMINO FIJO', 1054780841, 1942371104, 'Operario de maquina pesada', 4000000, 1000000, '2022-07-14', 'Colpatria', 'Medellín', '', 1),
(1009, 'OBRA O LABOR ', 1869300472, 2745086420, 'Obrero', 1550000, 2000000, '2022-10-12', 'Grupo éxito', 'Barranquilla', '', 1),
(1010, 'TERMINO INDEFINIDO', 1986300145, 3452918100, 'Obrero', 5000000, 3000000, '2022-11-08', 'Konecta cloud', 'Bogotá', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDocumentos` double NOT NULL,
  `docAspirante` double NOT NULL,
  `curriculum` blob NOT NULL,
  `certificadoAlturas` blob NOT NULL,
  `certificadoJudicial` blob NOT NULL,
  `certificadoPenal` blob NOT NULL,
  `certificadoDisciplinario` blob NOT NULL,
  `resultadosMedicos` blob NOT NULL,
  `carnetVacCovid` blob NOT NULL,
  `referenciasPersonales` blob NOT NULL,
  `referenciasLaborales` blob NOT NULL,
  `firma` blob NOT NULL,
  `estadoDocumentos` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDocumentos`, `docAspirante`, `curriculum`, `certificadoAlturas`, `certificadoJudicial`, `certificadoPenal`, `certificadoDisciplinario`, `resultadosMedicos`, `carnetVacCovid`, `referenciasPersonales`, `referenciasLaborales`, `firma`, `estadoDocumentos`) VALUES
(1, 34532270, '', '', '', '', '', '', '', '', '', '', 1),
(2, 34564978, '', '', '', '', '', '', '', '', '', '', 1),
(3, 41733718, '', '', '', '', '', '', '', '', '', '', 1),
(4, 52729563, '', '', '', '', '', '', '', '', '', '', 1),
(5, 67609436, '', '', '', '', '', '', '', '', '', '', 1),
(6, 1000620101, '', '', '', '', '', '', '', '', '', '', 1),
(7, 1053963400, '', '', '', '', '', '', '', '', '', '', 1),
(8, 1054780841, '', '', '', '', '', '', '', '', '', '', 1),
(9, 1869300472, '', '', '', '', '', '', '', '', '', '', 1),
(10, 1986300145, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_dotacion`
--

CREATE TABLE `formulario_dotacion` (
  `idFormularioD` double NOT NULL,
  `nombresCompletos` varchar(60) NOT NULL,
  `docAspirante` double NOT NULL,
  `docRecHum` double NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `pct` varchar(60) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `casco` int(10) NOT NULL,
  `overol` int(10) NOT NULL,
  `botasMaterial` int(10) NOT NULL,
  `botasCaucho` int(10) NOT NULL,
  `guantesCarnaza` int(10) NOT NULL,
  `guantesCaucho` int(10) NOT NULL,
  `guantesVaqueta` int(10) NOT NULL,
  `guantesNitrilo` int(10) NOT NULL,
  `protAuditivo` int(10) NOT NULL,
  `protAuditivoCopa` int(10) NOT NULL,
  `tapabocas` int(10) NOT NULL,
  `gafas` int(10) NOT NULL,
  `barbuquejo` int(10) NOT NULL,
  `firmaRRHH` blob NOT NULL,
  `firmaTrabajador` blob NOT NULL,
  `fechaFormulario` date NOT NULL,
  `estadoDotacion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulario_dotacion`
--

INSERT INTO `formulario_dotacion` (`idFormularioD`, `nombresCompletos`, `docAspirante`, `docRecHum`, `cargo`, `pct`, `fechaEntrega`, `casco`, `overol`, `botasMaterial`, `botasCaucho`, `guantesCarnaza`, `guantesCaucho`, `guantesVaqueta`, `guantesNitrilo`, `protAuditivo`, `protAuditivoCopa`, `tapabocas`, `gafas`, `barbuquejo`, `firmaRRHH`, `firmaTrabajador`, `fechaFormulario`, `estadoDotacion`) VALUES
(1, 'Diana Catalina Díaz Beltrán', 34532270, 15133916, 'Obrero', 'Disser Ingenieria S.A.S', '2021-01-12', 1, 1, 1, 1, 2, 2, 1, 2, 1, 2, 1, 1, 2, '', '', '2021-01-11', 1),
(2, 'Laura Camila Sánchez Prada', 34564978, 76308613, 'Operario de maquina pesada', 'Disser Ingenieria S.A.S', '2021-02-18', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '', '', '2021-02-17', 1),
(3, 'Jenny Viviana Rey Botero', 41733718, 76415948, 'Operario de maquinas', 'Disser Ingenieria S.A.S', '2021-03-23', 5, 5, 5, 5, 5, 5, 5, 1, 1, 1, 1, 1, 1, '', '', '2021-03-22', 1),
(4, 'Carlos Daniel Mendoza Pinzón', 52729563, 97414524, 'Operario de maquinas', 'Disser Ingenieria S.A.S', '2021-04-06', 3, 2, 3, 2, 3, 3, 3, 2, 2, 2, 2, 2, 2, '', '', '2021-04-05', 1),
(5, 'Claudia Liliana Nieto Bustos', 67609436, 98176120, 'Operario de maquina pesada', 'Disser Ingenieria S.A.S', '2021-11-10', 2, 2, 2, 2, 3, 3, 3, 3, 3, 2, 2, 1, 1, '', '', '2021-11-09', 1),
(6, 'Juan Felipe Lozano Ramírez', 1000620101, 1000098763, 'Operario de maquinas', 'Disser Ingenieria S.A.S', '2022-01-03', 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 3, 3, 3, '', '', '2022-01-02', 1),
(7, 'Ángela Patricia Cruz García', 1053963400, 1017896301, 'Obrero', 'Disser Ingenieria S.A.S', '2022-02-15', 1, 1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, '', '', '2022-02-14', 1),
(8, 'Carlos Felipe Mogollón Pachón', 1054780841, 1942371104, 'Operario de maquina pesada', 'Disser Ingenieria S.A.S', '2022-03-02', 4, 4, 4, 4, 4, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2022-03-01', 1),
(9, 'Camilo Alberto Cortes Montejo', 1869300472, 2745086420, 'Obrero', 'Disser Ingenieria S.A.S', '2022-05-17', 1, 2, 2, 2, 5, 5, 5, 4, 1, 4, 1, 4, 2, '', '', '2022-05-16', 1),
(10, 'Mario Andrés Duarte Cárdenas', 1986300145, 3452918100, 'Obrero', 'Disser Ingenieria S.A.S', '2022-07-28', 4, 5, 1, 2, 2, 2, 1, 1, 5, 1, 8, 1, 1, '', '', '2022-07-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_induccion`
--

CREATE TABLE `formulario_induccion` (
  `idFormularioInduc` double NOT NULL,
  `objetivo` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(60) NOT NULL,
  `oficinaPrincipal` varchar(60) NOT NULL,
  `responsables` varchar(60) NOT NULL,
  `cargoResponsable` varchar(60) NOT NULL,
  `tema` varchar(500) NOT NULL,
  `numLista` double NOT NULL,
  `nombresCompletos` varchar(60) NOT NULL,
  `cargoAspirante` varchar(60) NOT NULL,
  `docAspirante` double NOT NULL,
  `docRecHum` double NOT NULL,
  `firmaAspirante` blob NOT NULL,
  `firmaResponsable` blob NOT NULL,
  `estadoInduccion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulario_induccion`
--

INSERT INTO `formulario_induccion` (`idFormularioInduc`, `objetivo`, `fecha`, `hora`, `lugar`, `oficinaPrincipal`, `responsables`, `cargoResponsable`, `tema`, `numLista`, `nombresCompletos`, `cargoAspirante`, `docAspirante`, `docRecHum`, `firmaAspirante`, `firmaResponsable`, `estadoInduccion`) VALUES
(1, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-01-01', '07:30:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Lina María Novoa Gómez', 'Coordinador de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 1, 'Diana Catalina Díaz Beltrán', 'Obrero', 34532270, 76415948, '', '', 1),
(2, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-01-01', '07:30:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Lina María Novoa Gómez', 'Coordinador de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 2, 'Laura Camila Sánchez Prada', 'Operario de maquina pesada', 34564978, 76415948, '', '', 1),
(3, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-01-01', '07:30:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Lina María Novoa Gómez', 'Coordinador de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 3, 'Jenny Viviana Rey Botero', 'Operario de maquinas', 41733718, 76415948, '', '', 1),
(4, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-01-01', '07:30:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Lina María Novoa Gómez', 'Coordinador de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 4, 'Carlos Daniel Mendoza Pinzón', 'Operario de maquinas', 52729563, 76415948, '', '', 1),
(5, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-01-01', '07:30:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Lina María Novoa Gómez', 'Coordinador de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 5, 'Claudia Liliana Nieto Bustos', 'Operario de maquina pesada', 67609436, 76415948, '', '', 1),
(6, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-03-15', '10:00:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Paola Andrea Casas Páez', 'Asistente de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 1, 'Juan Felipe Lozano Ramírez', 'Operario de maquinas', 1000620101, 1942371104, '', '', 1),
(7, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-03-15', '10:00:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Paola Andrea Casas Páez', 'Asistente de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 2, 'Ángela Patricia Cruz García', 'Obrero', 1053963400, 1942371104, '', '', 1),
(8, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-03-15', '10:00:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Paola Andrea Casas Páez', 'Asistente de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 3, 'Carlos Felipe Mogollón Pachón', 'Operario de maquina pesada', 1054780841, 1942371104, '', '', 1),
(9, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-03-15', '10:00:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Paola Andrea Casas Páez', 'Asistente de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 4, 'Camilo Alberto Cortes Montejo', 'Obrero', 1869300472, 1942371104, '', '', 1),
(10, 'Capacitar al trabajador acerca de su perfil de cargo como ayudante de la obra.', '2022-03-15', '10:00:00', 'Bogotá D.C', 'Disser Ingenieria S.A.S', 'Paola Andrea Casas Páez', 'Asistente de recursos humanos', 'Obligaciones y responsabilidades del trabajador.', 5, 'Mario Andrés Duarte Cárdenas', 'Obrero', 1986300145, 1942371104, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursoshumanos`
--

CREATE TABLE `recursoshumanos` (
  `docRecHum` double NOT NULL,
  `numIdentificacion` double NOT NULL,
  `pNombreRh` varchar(60) NOT NULL,
  `sNombreRh` varchar(60) NOT NULL,
  `pApellidoRh` varchar(60) NOT NULL,
  `sApellidoRh` varchar(60) NOT NULL,
  `fotoRh` blob NOT NULL,
  `fechaExpDoc` date NOT NULL,
  `paisExpDoc` varchar(60) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `paisNacimiento` varchar(60) NOT NULL,
  `direccionResidencia` varchar(60) NOT NULL,
  `telefonoContacto` double NOT NULL,
  `correoElectronico` varchar(60) NOT NULL,
  `tipoCargo` varchar(60) NOT NULL,
  `estadoCivil` varchar(60) NOT NULL,
  `estrato` int(10) NOT NULL,
  `rh` varchar(10) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `eps` varchar(60) NOT NULL,
  `arl` varchar(60) NOT NULL,
  `estadoRecHum` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursoshumanos`
--

INSERT INTO `recursoshumanos` (`docRecHum`, `numIdentificacion`, `pNombreRh`, `sNombreRh`, `pApellidoRh`, `sApellidoRh`, `fotoRh`, `fechaExpDoc`, `paisExpDoc`, `fechaNacimiento`, `paisNacimiento`, `direccionResidencia`, `telefonoContacto`, `correoElectronico`, `tipoCargo`, `estadoCivil`, `estrato`, `rh`, `genero`, `eps`, `arl`, `estadoRecHum`) VALUES
(15133916, 15133916, 'María', 'Alejandra', 'Beltrán', 'Castillo', '', '2022-01-11', 'Colombia', '1997-10-28', 'Canadá', 'Carrera 15a # 13 - 02', 3110321456, 'mariacastillo45@gmail.com', 'Auxiliar de recursos humanos', 'Soltero', 2, 'AB-', 'Femenino', 'Cruz Blanca', 'Positiva', 1),
(76308613, 76308613, 'Karen', 'Eliana', 'Hernández', 'Pulido', '', '2022-03-02', 'Colombia', '1993-02-07', 'Argentina', 'Diagonal 03 # 23 - 11', 3189745620, 'karenh423@gmail.com', 'Asistente de recursos humanos', 'Casado', 2, 'AB+', 'Femenino', 'Cafesalud ', 'Colmena', 1),
(76415948, 76415948, 'Lina', 'María', 'Novoa', 'Gómez', '', '2021-05-04', 'Colombia', '1989-11-05', 'Colombia', 'Carrera 38 # 04 - 32', 3144062713, 'lmng930@gmail.com', 'Coordinador de recursos humanos', 'Separado', 2, 'A+', 'Femenino', 'Salud Colmena', 'Positiva', 1),
(97414524, 97414524, 'Emma ', 'Alejandra ', 'Valencia ', 'Calderón ', '', '2008-06-20', 'Colombia', '1990-03-29', 'Colombia', 'Av. Calle 78a # 10f - 84', 3027482001, 'aleja12@gmail.com', 'Asistente de recursos humanos', 'Soltera', 3, 'A-', 'Femenino', 'Cruz Blanca ', 'Bolívar ', 1),
(98176120, 98176120, 'Adriana ', 'Carolina ', 'Hernández ', 'Monterrosa ', '', '1996-05-04', 'Colombia', '1883-10-03', 'Colombia', 'Calle 8a # 15 - 63', 3115789640, 'achm56@gmail.com', 'Bienestar', 'Unión Libre', 2, 'AB-', 'Femenino', 'Cafesalud ', 'Positiva ', 1),
(1000098763, 1000098763, 'Laura', 'Sofía ', 'López ', 'Díaz ', '', '2000-10-15', 'Colombia', '1982-05-21', 'Colombia', 'Diagonal 45b # 11 - 30', 3236987415, 'lauralopez@gmail.com', 'Coordinador de recursos humanos', 'Casada', 2, 'A+', 'Femenino', 'Famisanar ', 'Colmena', 1),
(1017896301, 1017896301, 'Ana', 'Milena', 'Escobar', 'Solís', '', '2021-05-13', 'Colombia', '1997-12-23', 'Argentina', 'Carrera 26 # 8 - 45', 3179200631, 'anamilenaescobar@gmail.com', 'Bienestar', 'Casado', 3, 'A+', 'Femenino', 'Salud Total', 'Aurora', 1),
(1942371104, 1942371104, 'Paola', 'Andrea', 'Casas', 'Páez', '', '2021-06-09', 'Colombia', '1986-07-31', 'Colombia', 'Calle 16n sur # 14 - 03', 3172031469, 'paolal111@gmail.com', 'Asistente de recursos humanos', 'Separado', 3, 'B+', 'Femenino', 'SuSalud', 'Axa colpatria', 1),
(2745086420, 2745086420, 'Gloria', 'Marcela', 'Mora', 'Muños', '', '2021-04-07', 'Colombia', '1990-05-15', 'Colombia', 'Avenida 98 # 8 - 47', 3153001496, 'gloriamora@gmail.com', 'Bienestar', 'Casado', 3, 'B-', 'Femenino', 'Cruz Blanca', 'Positiva', 1),
(3452918100, 3452918100, 'Luz', 'Alba', 'Fierro', 'Galvis', '', '2022-06-15', 'Colombia', '1993-02-28', 'Colombia', 'Diagonal 47 # 10 - 04', 3119876520, 'luzalba@gmail.com', 'Bienestar', 'Soltero', 3, 'A+', 'Femenino', 'Humana Vivir', 'Colpatria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numIdentificacion` double NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `codigoVerificacion` double NOT NULL,
  `TipoRol` varchar(20) NOT NULL,
  `codigoAceptacion` tinyint(1) NOT NULL,
  `estadoUsuarios` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numIdentificacion`, `password`, `codigoVerificacion`, `TipoRol`, `codigoAceptacion`, `estadoUsuarios`) VALUES
(15133916, '123', 0, '2', 1, 1),
(34532270, '123', 0, '1', 1, 1),
(34564978, '123', 0, '1', 1, 1),
(41733718, '123', 0, '1', 1, 1),
(52729563, '123', 0, '1', 1, 1),
(67609436, '123', 0, '1', 1, 1),
(76308613, '123', 0, '2', 1, 1),
(76415948, '123', 0, '2', 1, 1),
(97414524, '123', 0, '2', 1, 1),
(98176120, '123', 0, '2', 1, 1),
(1000098763, '123', 0, '2', 1, 1),
(1000620101, '123', 0, '1', 1, 1),
(1017896301, '123', 0, '2', 1, 1),
(1053963400, '123', 0, '1', 1, 1),
(1054780841, '123', 0, '1', 1, 1),
(1869300472, '123', 0, '1', 1, 1),
(1942371104, '123', 0, '2', 1, 1),
(1986300145, '123', 0, '1', 1, 1),
(2745086420, '123', 0, '2', 1, 1),
(3452918100, '123', 0, '2', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD PRIMARY KEY (`docAspirante`),
  ADD KEY `numIdentificacion` (`numIdentificacion`);

--
-- Indices de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  ADD PRIMARY KEY (`numOrden`),
  ADD KEY `docAspirante` (`docAspirante`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `docAspirante` (`docAspirante`),
  ADD KEY `docRecHum` (`docRecHum`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumentos`),
  ADD KEY `docAspirante` (`docAspirante`);

--
-- Indices de la tabla `formulario_dotacion`
--
ALTER TABLE `formulario_dotacion`
  ADD PRIMARY KEY (`idFormularioD`),
  ADD KEY `docAspirante` (`docAspirante`),
  ADD KEY `docRecHum` (`docRecHum`);

--
-- Indices de la tabla `formulario_induccion`
--
ALTER TABLE `formulario_induccion`
  ADD PRIMARY KEY (`idFormularioInduc`),
  ADD KEY `docAspirante` (`docAspirante`),
  ADD KEY `docRecHum` (`docRecHum`);

--
-- Indices de la tabla `recursoshumanos`
--
ALTER TABLE `recursoshumanos`
  ADD PRIMARY KEY (`docRecHum`),
  ADD KEY `numIdentificacion` (`numIdentificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numIdentificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  MODIFY `numOrden` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumentos` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `formulario_dotacion`
--
ALTER TABLE `formulario_dotacion`
  MODIFY `idFormularioD` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `formulario_induccion`
--
ALTER TABLE `formulario_induccion`
  MODIFY `idFormularioInduc` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD CONSTRAINT `aspirante_ibfk_1` FOREIGN KEY (`numIdentificacion`) REFERENCES `usuarios` (`numIdentificacion`);

--
-- Filtros para la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  ADD CONSTRAINT `citasmedicas_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`),
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`docRecHum`) REFERENCES `recursoshumanos` (`docRecHum`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`);

--
-- Filtros para la tabla `formulario_dotacion`
--
ALTER TABLE `formulario_dotacion`
  ADD CONSTRAINT `formulario_dotacion_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`),
  ADD CONSTRAINT `formulario_dotacion_ibfk_2` FOREIGN KEY (`docRecHum`) REFERENCES `recursoshumanos` (`docRecHum`);

--
-- Filtros para la tabla `formulario_induccion`
--
ALTER TABLE `formulario_induccion`
  ADD CONSTRAINT `formulario_induccion_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`),
  ADD CONSTRAINT `formulario_induccion_ibfk_2` FOREIGN KEY (`docRecHum`) REFERENCES `recursoshumanos` (`docRecHum`);

--
-- Filtros para la tabla `recursoshumanos`
--
ALTER TABLE `recursoshumanos`
  ADD CONSTRAINT `recursoshumanos_ibfk_1` FOREIGN KEY (`numIdentificacion`) REFERENCES `usuarios` (`numIdentificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
