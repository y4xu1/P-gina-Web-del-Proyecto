-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2022 a las 03:44:55
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
(52729563, 52729563, 'Carlos ', 'Daniel ', 'Mendoza', 'Pinzón', '', '2004-08-19', 'Colombia', '1986-05-05', 'Colombia', 'Carrera 21b # 09-25', 'Medellín ', 3136947812, 'carmendoza@gmail.com', 'Operario de Maquinas', 'Soltero', 4, 'A+', 'Masculino', 368941, 'Compensar', 'Bolívar ', 1),
(1000620101, 1000620101, 'Juan ', 'Felipe', 'Lozano', 'Ramirez', '', '1987-01-19', 'Colombia', '1845-02-01', 'Colombia', 'Diagonal 2a #78-03', 'Cota', 3226954152, 'juan12@gmail.com', 'Operario de Maquinas', 'Viudo', 2, 'AB-', 'Masculino', 260595, 'Cruz Blanca', 'Sura', 1),
(1986300145, 1986300145, 'Mario', 'Andrés ', 'Duarte', 'Cárdenas ', '', '1996-05-23', 'Colombia', '1978-02-19', 'Colombia', 'Calle 14a #10a-79', 'Bogotá D.C', 3225974512, 'marioandy@gmail.com', 'Obrero', 'Casado', 3, 'O+', 'Masculino', 401547, 'Famisanar', 'Axa Colpatria', 1);

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
(1, 52729563, 'Richard Tovar Cárdenas', '2021-06-01', '10:00:00', '2021-07-15', '08:00:00', 'carmendoza@gmail.com', 1),
(2, 1000620101, 'José Antonio Rodríguez', '2021-06-11', '16:25:00', '2021-08-13', '09:00:00', 'juan12@gmail.com', 1),
(3, 1986300145, 'Lucía Galán Bertrand', '2021-10-17', '08:15:00', '2021-11-04', '07:00:00', 'marioandy@gmail.com', 1);

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
(2001, 'Termino indefinido', 52729563, 97414524, 'Obrero ', 1000000, 200000, '2021-09-22', 'Amarilo', 'Madrid', '', 1),
(2002, 'Termino Fijo', 1000620101, 98176120, 'Operario de Maquinas ', 2000000, 3000000, '2021-09-15', 'Colpatria', 'Medellín ', '', 1),
(2003, 'Obra a Labor', 1986300145, 1000098763, 'Obrero ', 1300000, 180000, '2021-06-01', 'Colsubsidio', 'Bogotá D.C', '', 1);

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
(1001, 52729563, '', '', '', '', '', '', '', '', '', '', 1),
(1002, 1000620101, '', '', '', '', '', '', '', '', '', '', 1),
(1003, 1986300145, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `idFormulario` double NOT NULL,
  `tipoFormulario` varchar(60) NOT NULL,
  `archivoFormulario` blob NOT NULL,
  `fechaFormulario` date NOT NULL,
  `docRecHum` double NOT NULL,
  `docAspirante` double NOT NULL,
  `estadoFormularios` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`idFormulario`, `tipoFormulario`, `archivoFormulario`, `fechaFormulario`, `docRecHum`, `docAspirante`, `estadoFormularios`) VALUES
(3001, 'Formulario Dotación', '', '2021-05-28', 97414524, 52729563, 1),
(3002, 'Formulario Inducción', '', '2021-05-28', 98176120, 1000620101, 1),
(3003, 'Formulario Dotación', '', '2021-07-27', 1000098763, 1986300145, 1);

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
(97414524, 97414524, 'Emma ', 'Alejandra ', 'Valencia ', 'Calderón ', '', '2008-06-20', 'Colombia', '1990-03-29', 'Colombia', 'Av. Calle 78a #10f-84', 3027482001, 'aleja12@gmail.com', 'Asistente de Recursos Humanos', 'Soltera', 3, 'A-', 'Femenino', 'Cruz Blanca ', 'Bolívar ', 1),
(98176120, 98176120, 'Adriana ', 'Carolina ', 'Hernández ', 'Monterrosa ', '', '1996-05-04', 'Colombia', '1883-10-03', 'Colombia', 'Cr.8a # 15-63', 3115789640, 'achm56@gmail.com', 'Bienestar', 'Unión Libre', 2, 'AB-', 'Femenino', 'Cafesalud ', 'Positiva ', 1),
(1000098763, 1000098763, 'Laura', 'Sofía ', 'López ', 'Díaz ', '', '2000-10-15', 'Colombia', '1982-05-21', 'Colombia', 'Diagonal 45b # 78-95', 3236987415, 'lauralopez@gmail.com', 'Coordinador de Recursos Humanos', 'Casada', 2, 'A+', 'Femenino', 'Famisanar ', 'Colmena', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numIdentificacion` double NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `TipoRol` varchar(20) NOT NULL,
  `codigoAceptacion` tinyint(1) NOT NULL,
  `estadoUsuarios` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numIdentificacion`, `password`, `TipoRol`, `codigoAceptacion`, `estadoUsuarios`) VALUES
(22, '123', '2', 1, 1),
(30, '01', '1', 1, 1),
(40, '03', '2', 1, 1),
(369, '123', '2', 1, 1),
(587, '123', '2', 1, 1),
(789, '123', '1', 1, 1),
(2021, '123', '1', 1, 1),
(52729563, 'tuyyo451', '1', 0, 1),
(97414524, 'ares5621', '2', 0, 1),
(98176120, 'asist7845', '2', 0, 1),
(1000098763, '12634', '2', 0, 1),
(1000620101, 'l2301', '1', 0, 1),
(1986300145, 'mario431', '1', 0, 1);

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
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`idFormulario`),
  ADD KEY `docRecHum` (`docRecHum`),
  ADD KEY `docAspirante` (`docAspirante`);

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
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`docAspirante`) REFERENCES `aspirante` (`docAspirante`),
  ADD CONSTRAINT `formulario_ibfk_2` FOREIGN KEY (`docRecHum`) REFERENCES `recursoshumanos` (`docRecHum`);

--
-- Filtros para la tabla `recursoshumanos`
--
ALTER TABLE `recursoshumanos`
  ADD CONSTRAINT `recursoshumanos_ibfk_1` FOREIGN KEY (`numIdentificacion`) REFERENCES `usuarios` (`numIdentificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
