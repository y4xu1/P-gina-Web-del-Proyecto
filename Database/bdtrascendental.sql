--
-- Base de datos: `bdtrascendental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante`
--

CREATE TABLE `aspirante` (
  `docAspirante` double NOT NULL,
  `idTipoDocumento` varchar(50) NOT NULL,
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

INSERT INTO `aspirante` (`docAspirante`, `idTipoDocumento`, `PnombreAspirante`, `SnombreAspirante`, `PapellidoAspirante`, `SapellidoAspirante`, `fotoAspirante`, `fechaExpDoc`, `paisExpDoc`, `fechaNacimiento`, `paisNacimiento`, `direccionResidencia`, `ciudad`, `telefonoContacto`, `correoElectronico`, `tipoCargo`, `estadoCivil`, `estrato`, `rh`, `genero`, `libretaMilitar`, `eps`, `arl`, `estadoAspirante`) VALUES
(78691480, 'CC', 'Juan', 'Felipe', 'Lozano', ' Ramirez', 0x41646a756e746f, '1987-01-19', 'Colombia', '1845-02-01', ' Argentina', 'Diagonal 2a #78-03', 'Cota', 3226954152, 'angel12@gmail.com', 'Operario de Maquinas', 'Viudo', 2, 'AB-', 'Masculino', 260595, 'Cruz Blanca', 'Sura', 1),
(83922334, 'CC', 'Juan', 'Sebastian', 'Acosta', 'Sanchez', 0x41646a756e746f, '1995-04-23', 'Colombia', '1977-09-10', 'Colombia', 'Av Calle 47 #12-53', 'Madrid', 3145622013, 'sebas.236@gmail.com', 'Obrero', 'Union Libre', 3, 'O-', 'Masculino', 289745, 'Cafam', 'Positiva', 0),
(84575841, 'CC', 'Mario', 'Andres', 'Duarte', 'Cardenas', 0x41646a756e746f, '1996-05-23', 'Colombia', '1978-02-19', 'Colombia', 'Calle 14a #10a-79', 'Bogotá D.C', 3225974512, 'marioandy@gmail.com', 'Obrero', 'Casado', 3, 'O+', 'Masculino', 201547, 'Famisanar', 'Axa Colpatria', 0),
(96092021, 'CC', 'Cristopher', 'David', 'Vazquez', 'Pulido', 0x41646a756e746f, '2001-10-02', 'Colombia', '1983-06-15', 'Colombia', 'Calle 18a #11-89', 'Chia', 3015897415, 'cristo01@gmail.com', 'Obrero', 'Soltero', 3, 'B+', 'Masculino', 302689, 'Cruz Blanca ', 'Colmena', 1),
(1000620101, 'CC', 'John', 'Alexander', 'Carvajal ', ' Vargas ', '', '1999-05-13', 'Colombia', '1820-08-08', ' Colombia', 'Calle 48b sur No. 21-13', 'Medellín ', 3125785265, 'alexander_vargas23@gmail.com', 'Obrero', 'Separado', 2, 'A+', 'Masculino', 258497, 'Salud Total', 'Bolívar', 1),
(1002568971, 'CC', 'Carlos', 'Daniel', 'Mendoza', 'Pinzon', 0x41646a756e746f, '2004-08-19', 'Colombia', '1986-05-05', 'Colombia', 'Carrera 21b # 09-25', 'Cota', 3136947812, 'carmendoza@gmail.com', 'Operario de Maquinas', 'Soltero', 4, 'A+', 'Masculino', 268941, 'Compensar', 'Sura', 1);

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
(1, 96092021, 'Richard Tovar Cárdenas', '2021-06-01', '10:00:00', '2021-07-15', '08:00:00', 'cristo01@gmail.com', 1),
(2, 78691480, 'José Antonio Rodríguez', '2021-06-11', '16:25:00', '2021-08-13', '09:00:00', 'angel12@gmail.com', 0),
(3, 83922334, 'Aarón Arturo Robles Ramírez', '2021-08-31', '10:00:00', '2021-09-11', '06:00:00', 'sebas.236@gmail.com', 1),
(4, 84575841, ' Lucía Galán Bertrand', '2021-10-17', '08:15:00', '2021-11-04', '07:00:00', 'marioandy@gmail.com', 0);

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
(1002, 'Termino indefinido', 1002568971, 57414524, 'Obrero', 1000000, 200000, '2021-09-22', 'Amarilo', 'Cota', 0x4d49204649524d412e706e67, 1),
(2001, 'Termino Fijo', 83922334, 1013127616, 'Obrero', 1100000, 180000, '2021-07-01', 'Pontevedra', 'Madrid', 0x41646a756e746f, 0),
(3001, 'Obra a Labor', 78691480, 98176120, 'Obrero', 1300000, 300000, '2021-06-01', 'Colsubsidio', 'Bogotá D.C', 0x41646a756e746f, 1),
(4002, 'Termino indefinido', 96092021, 1013127616, 'Operario de Maquinas', 2000000, 300000, '2021-09-15', 'Colpatria', 'Medellín', '', 1),
(5001, 'Termino indefinido', 1000620101, 52729563, 'Operario de Maquinas', 1500000, 2000000, '2021-09-27', 'Colpatria', ' Bogotá', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
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

INSERT INTO `documentos` (`docAspirante`, `curriculum`, `certificadoAlturas`, `certificadoJudicial`, `certificadoPenal`, `certificadoDisciplinario`, `resultadosMedicos`, `carnetVacCovid`, `referenciasPersonales`, `referenciasLaborales`, `firma`, `estadoDocumentos`) VALUES
(78691480, 0x41646a756e746f2e646f6378, '', 0x41646a756e746f2e646f6378, '', 0x41646a756e746f2e646f6378, '', 0x41646a756e746f2e646f6378, '', '', '', 1),
(83922334, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, '', 1),
(84575841, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, 0x41646a756e746f, '', 0),
(96092021, '', 0x41646a756e746f2e646f6378, '', '', '', '', '', '', '', '', 1),
(1000620101, '', '', '', 0x4d49204649524d412e706e67, '', 0x4d49204649524d412e706e67, '', '', '', '', 1),
(1002568971, 0x41646a756e746f2e646f6378, '', 0x41646a756e746f2e646f6378, '', '', '', '', '', '', '', 1);

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
(1000, 'Formulario Dotación', 0x41646a756e746f, '2021-05-28', 52523739, 84575841, 1),
(1001, 'Formulario Dotación', 0x41646a756e746f, '2021-05-28', 57414524, 1002568971, 1),
(1002, 'Formulario Dotación', 0x41646a756e746f, '2021-06-27', 1013127616, 83922334, 0),
(1003, 'Formulario Dotación', 0x41646a756e746f, '2021-05-28', 98176120, 78691480, 1),
(1004, 'Formulario Dotación', 0x41646a756e746f, '2021-07-27', 1001142060, 96092021, 0),
(2000, 'Formulario Inducción', 0x41646a756e746f, '2021-05-28', 52523739, 84575841, 1),
(2001, 'Formulario Inducción', 0x41646a756e746f, '2021-05-28', 57414524, 1002568971, 1),
(2002, 'Formulario Inducción', 0x41646a756e746f, '2021-06-27', 1013127616, 83922334, 1),
(2003, 'Formulario Inducción', 0x41646a756e746f, '2021-05-28', 98176120, 78691480, 1),
(2004, 'Formulario Inducción', 0x41646a756e746f, '2021-07-27', 1001142060, 96092021, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursoshumanos`
--

CREATE TABLE `recursoshumanos` (
  `docRecHum` double NOT NULL,
  `idTipoDocumento` varchar(50) NOT NULL,
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

INSERT INTO `recursoshumanos` (`docRecHum`, `idTipoDocumento`, `pNombreRh`, `sNombreRh`, `pApellidoRh`, `sApellidoRh`, `fotoRh`, `fechaExpDoc`, `paisExpDoc`, `fechaNacimiento`, `paisNacimiento`, `direccionResidencia`, `telefonoContacto`, `correoElectronico`, `tipoCargo`, `estadoCivil`, `estrato`, `rh`, `genero`, `eps`, `arl`, `estadoRecHum`) VALUES
(52523739, 'CC', 'Mónica', 'Andrea', 'Sánchez', 'Ramírez', 0x41646a756e746f, '1996-12-05', 'Colombia', '1987-09-16', 'Argentina', 'Tr 98 #48a-26', 3168974512, 'moniseb@gmail.com', 'Bienestar', 'Soltero', 6, 'AB+', 'Femenino', 'Cruz Blanca', 'Sura', 1),
(52729563, 'CC', 'Adriana ', 'Carolina ', 'Hernández ', 'Monterrosa ', '', '1996-05-04', 'Colombia', '1883-10-03', 'Colombia', 'Cr.8a # 15-63', 3115789640, 'achm56@gmail.com', 'Bienestar', 'Unión Libre', 2, 'AB-', 'Femenino', 'Cafesalud ', 'Positiva', 1),
(57414524, 'CC', 'Camila', 'Sofia', 'Lopez', 'Diaz', 0x41646a756e746f, '2000-10-15', 'Colombia', '1982-05-21', 'Colombia', 'Diagonal 45b # 78-95', 3236987415, 'camilopez@gmail.com', 'Asistente Recursos Humanos', 'Casada', 4, 'A+', 'Femenino', 'Compensar', 'Colmena', 0),
(98176120, 'CC', 'Catalina', '', 'Garcia', 'Castillo', 0x41646a756e746f, '2002-06-23', 'Colombia', '1984-08-11', 'Colombia', 'Carrera 68a #01-89', 3175698203, 'anitam23@gmail.com', 'Coordinador de Recursos Humanos', 'Casada', 4, 'O-', 'Femenino', 'Famisanar', 'Sura', 0),
(1001142060, 'CC', 'David', 'Esteban', 'Rodriguez', 'Hurtado', 0x41646a756e746f, '0000-00-00', 'Colombia', '0000-00-00', 'Colombia', 'Calle 95 # 02-15', 3198312456, 'daveste-02@gmail.com', 'Asistente de Recursos Humanos', 'Soltero', 4, 'B-', 'Masculino', 'Famisanar', 'Bolívar', 1),
(1013127616, 'CC', 'Emma', 'Alejandra', 'Valencia', 'Calderon', 0x41646a756e746f, '2008-06-20', 'Colombia', '1990-03-29', 'Colombia', 'Av Calle 78a #10f-84', 3027482001, 'aleja12@gmail.com', 'Bienestar', 'Soltera', 3, 'A-', 'Femenino', 'Cruz Blanca', 'Bolívar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Aspirante'),
(2, 'RecursosHumanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` varchar(60) NOT NULL,
  `descripTdoc` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `descripTdoc`) VALUES
('CC', 'Cedula de Ciudadania'),
('CE', 'Cedula de Extrangeria'),
('PA', 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numIdentificacion` double NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `TipoRol` int(2) NOT NULL,
  `codigoAceptacion` tinyint(1) NOT NULL,
  `estadoUsuarios` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numIdentificacion`, `password`, `TipoRol`, `codigoAceptacion`, `estadoUsuarios`) VALUES
(52523739, 'eduar269', 2, 0, 1),
(52729563, '11111', 2, 0, 1),
(57414524, 'tuyyo451', 2, 0, 1),
(78691480, 'arti1023', 1, 0, 1),
(83922334, 'lupi852', 1, 0, 1),
(84575841, 'nana2598', 1, 0, 1),
(96092021, 'emma784', 1, 0, 1),
(98176120, 'asist7845', 2, 0, 1),
(123456789, '11111111', 2, 0, 1),
(1000620101, '123456', 1, 0, 1),
(1001142060, 'dios7410', 2, 0, 1),
(1002568971, 'ares5621', 1, 0, 1),
(1013127616, 'cami78love', 2, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD PRIMARY KEY (`docAspirante`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`);

--
-- Indices de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  ADD PRIMARY KEY (`numOrden`),
  ADD UNIQUE KEY `numOrden` (`numOrden`),
  ADD KEY `docAspirante` (`docAspirante`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD UNIQUE KEY `idContrato` (`idContrato`),
  ADD KEY `docAspirante` (`docAspirante`),
  ADD KEY `docRecHum` (`docRecHum`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`docAspirante`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`idFormulario`),
  ADD UNIQUE KEY `idFormulario` (`idFormulario`),
  ADD KEY `docAspirante` (`docAspirante`),
  ADD KEY `docRecHum` (`docRecHum`);

--
-- Indices de la tabla `recursoshumanos`
--
ALTER TABLE `recursoshumanos`
  ADD PRIMARY KEY (`docRecHum`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numIdentificacion`),
  ADD KEY `TipoRol` (`TipoRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  MODIFY `numOrden` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156170;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `idFormulario` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD CONSTRAINT `aspirante_ibfk_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `aspirante_ibfk_2` FOREIGN KEY (`docAspirante`) REFERENCES `usuarios` (`numIdentificacion`);

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
  ADD CONSTRAINT `recursoshumanos_ibfk_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `recursoshumanos_ibfk_2` FOREIGN KEY (`docRecHum`) REFERENCES `usuarios` (`numIdentificacion`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`TipoRol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
