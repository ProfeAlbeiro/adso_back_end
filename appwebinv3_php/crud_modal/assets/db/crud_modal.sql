# DROP DATABASE REGISTRO;
-- -----------------------------------------------------
-- ESTRUCTURA DBAPPWEBINV
-- -----------------------------------------------------
CREATE DATABASE REGISTRO DEFAULT CHARACTER SET utf8 ;
USE REGISTRO ;

-- -----------------------------------------------------
-- TABLA CIUDAD
-- -----------------------------------------------------
CREATE TABLE CID (
  Id_cid int NOT NULL,
  nombre varchar(200) NOT NULL
) ENGINE=InnoDB;

INSERT INTO CID VALUES
(1, 'Bogota'),
(2, 'Cali'),
(3, 'Medellin'),
(4, 'Sopo'),
(5, 'Pasto');

-- -----------------------------------------------------
-- TABLA OCUPACIÓN
-- -----------------------------------------------------
CREATE TABLE OCUPACION (
  Id_ocupacion int NOT NULL,
  nombreOcupa varchar(200) NOT NULL
) ENGINE=InnoDB;

INSERT INTO OCUPACION VALUES
(1, 'Maestro'),
(2, 'Ingeniero'),
(3, 'Doctor'),
(4, 'Abogado'),
(5, 'Loca');

-- -----------------------------------------------------
-- TABLA USUARIOS
-- -----------------------------------------------------
CREATE TABLE USUARIO (
  IdUsuario int NOT NULL,
  cedula int NOT NULL,
  nombres varchar(200) NOT NULL,
  apellido varchar(200) NOT NULL,
  fechaNacimiento date NOT NULL,
  Idciudad int NOT NULL,
  Idocupacion int NOT NULL,
  telefono varchar(200) NOT NULL 
) ENGINE = InnoDB;

INSERT INTO USUARIO VALUES
(1, 1013600005, 'Juan', 'Ramirez', '1988-04-05', 1, 1, '341414134'),
(3, 1013600008, 'Janeth ', 'Becerra', '1988-04-12', 1, 3, '1212121212'),
(5, 112233413, 'Julian ', 'Paez ', '1966-04-18', 3, 3, '43143143'),
(7, 1212121212, 'Sandra', 'Urrego', '1990-04-05', 2, 1, '2222222'),
(14, 11111, 'JUan', 'Boada', '2023-04-11', 3, 4, '34431'),
(16, 13413, 'Silvio', 'Boada', '2023-04-05', 5, 5, '3414141'),
(22, 232323, 'Guillero', 'Ramirez', '2023-04-05', 3, 4, '232323'),
(23, 8888888, 'Luis', 'Boada', '2023-04-11', 3, 2, '343434'),
(24, 11111, 'JUan', 'Cardozo', '2023-05-11', 2, 3, '343333'),
(25, 13413, 'Silvio', 'Boada', '2023-05-14', 4, 2, '555555'),
(26, 11111, 'JUan', 'Sánchez Pérez ', '1988-05-10', 5, 2, '32232'),
(27, 123456, 'Albeiro', 'Ramos', '1983-04-01', 1, 2, '3157777');

-- -----------------------------------------------------
-- TABLA RESTRICCIONES
-- -----------------------------------------------------

-- Indices de la tabla `cid`
--
ALTER TABLE `cid`
  ADD PRIMARY KEY (`Id_cid`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`Id_ocupacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `fk_usuario_ciudad` (`Idciudad`),
  ADD KEY `fk_usuario_ocupacion` (`Idocupacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cid`
--
ALTER TABLE `cid`
  MODIFY `Id_cid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `Id_ocupacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_ciudad` FOREIGN KEY (`Idciudad`) REFERENCES `cid` (`Id_cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_ocupacion` FOREIGN KEY (`Idocupacion`) REFERENCES `ocupacion` (`Id_ocupacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;