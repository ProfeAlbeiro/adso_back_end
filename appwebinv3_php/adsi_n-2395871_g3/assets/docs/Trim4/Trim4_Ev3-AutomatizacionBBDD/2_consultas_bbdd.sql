/* ************************************************************************************* */
/* ------------------------------ AUTOMATIZACIÓN DE BBDD ------------------------------- */
/* ---------------------- MULTITABLA, VIEWS, TRIGGERS, PROCEDURES ---------------------- */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* 1. MULTITABLA                                                                         */
/* 1.1. Unión Externa : ......... SELECT _ FROM _ WHERE _ UNION SELECT _ FROM _ WHERE _  */
/* 1.2. Producto Cartesiano : ... SELECT _ FROM _ , _ WHERE _._ = _._                    */
/* 1.3. INNER JOIN : ............ SELECT _ FROM _ INNER JOIN _ ON _._ = _._              */
/* 1.4. LEFT JOIN : ............. SELECT _ FROM _ LEFT JOIN _ ON _._ = _._               */
/* 1.5. RIGHT JOIN : ............ SELECT _ FROM _ RIGHT JOIN _ ON _._ = _._              */
/* 2. VIEWS                                                                              */
/* 2.1. Crear Vista : ........... CREATE VIEW _ AS SELECT _ FROM _ WHERE _               */
/* 2.2. Usar Vista : ............ SELECT _ FROM _                                        */
/* 2.3. Modificar Vista : ....... ALTER VIEW _ AS SELECT _ FROM _ WHERE _                */
/* 2.4. Eliminar Vista : ........ DROP VIEW _                                            */
/* 3. TRIGGERS                    DELIMITER, CREATE TRIGGER _ BEFORE/AFTER, BEGIN/END    */
/* 3.1. Trigger Insertar : ...... INSERT                                                 */
/* 3.2. Trigger Actualizar : .... UPDATE                                                 */
/* 3.3. Trigger Eliminar : ...... DELETE                                                 */
/* 3.4. Eliminar un Trigger : ... DROP TRIGGER _                                         */
/* 4. PROCEDURES                                                                         */
/* 4.1. Crear Procedure : ....... CREATE PROCEDURE _                                     */
/* 4.2. Usar Procedure  : ....... CALL _                                                 */
/* 4.3. Eliminar Procedure : .... DROP PROCEDURE _                                       */
/* ------------------------------------------------------------------------------------- */
/* BIBLIOGRAFÍA                                                                          */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */
/* EN CONSOLA: XAMPP / SHELL / cd mysql/bin / mysql -h localhost -u root -p / ENTER      */
/* ************************************************************************************* */


/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* ----------------------------------- 1. MULTITABLA ----------------------------------- */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 1.1. Unión Externa. ----------------------------------------------------------------- --
--      SELECT _ FROM _ WHERE _ UNION SELECT _ FROM _ WHERE _ : ------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT idfab, idproducto FROM PRODUCTO 
WHERE existencias = 0 UNION
SELECT fab, producto FROM PEDIDO 
WHERE YEAR(fechapedido) = 1990 
ORDER BY idproducto;

-- ------------------------------------------------------------------------------------- --
-- 1.2. Producto Cartesiano. ----------------------------------------------------------- --
--      SELECT _ FROM _ , _ WHERE _._ = _._ : ------------------------------------------ --
-- ------------------------------------------------------------------------------------- --

SELECT * FROM PEDIDO, CLIENTE 
WHERE pedido.clie = cliente.numclie;

-- ------------------------------------------------------------------------------------- --
-- 1.3. INNER JOIN. -------------------------------------------------------------------- --
--      SELECT _ FROM _ INNER JOIN _ ON _._ = _._ : ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT * FROM PEDIDO INNER JOIN PRODUCTO 
ON (pedido.fab = producto.idfab) AND
(pedido.producto = producto.idproducto);

SELECT * FROM (PEDIDO INNER JOIN CLIENTE 
ON pedido.clie = cliente.numclie) 
INNER JOIN EMPLEADO
ON pedido.rep = empleado.numemp;

SELECT * FROM CLIENTE INNER JOIN 
(PEDIDO INNER JOIN EMPLEADO 
ON pedido.rep = empleado.numemp) 
ON pedido.clie = cliente.numclie;

-- ------------------------------------------------------------------------------------- --
-- 1.4. LEFT JOIN. --------------------------------------------------------------------- --
--      SELECT _ FROM _ LEFT JOIN _ ON _._ = _._ : ------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SELECT * FROM EMPLEADO 
LEFT JOIN OFICINA 
ON empleado.oficina = oficina.oficina;

-- ------------------------------------------------------------------------------------- --
-- 1.4. RIGHT JOIN. -------------------------------------------------------------------- --
--      SELECT _ FROM _ RIGHT JOIN _ ON _._ = _._ : ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT * FROM EMPLEADO 
RIGHT JOIN OFICINA 
ON empleado.oficina = oficina.oficina;


/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* ------------------------------------- 2. VIEWS -------------------------------------- */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 2.1. Crear Vista. ------------------------------------------------------------------- --
--      CREATE VIEW _ AS SELECT _ FROM _ WHERE _ : ------------------------------------- --
-- ------------------------------------------------------------------------------------- --
CREATE VIEW CONTRATOS_EMP
(código, nombre, fecha_contrato) AS
SELECT numemp, nombre, contrato 
FROM EMPLEADO;

CREATE VIEW VISTA_EMPLEADOS AS
SELECT e.nombre, e.edad, 
o.oficina AS codigo_oficina, 
o.ciudad AS ciudad
FROM EMPLEADO AS e
INNER JOIN OFICINA AS o
ON e.numemp = o.dir;

-- ------------------------------------------------------------------------------------- --
-- 2.2. Usar Vista. -------------------------------------------------------------------- --
--      SELECT _ FROM _ : -------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SELECT * FROM VISTA_EMPLEADOS;
SELECT * FROM CONTRATOS_EMP;

-- ------------------------------------------------------------------------------------- --
-- 2.3. Modificar Vista. --------------------------------------------------------------- --
--      ALTER VIEW _ AS SELECT _ FROM _ WHERE _ : -------------------------------------- --
-- ------------------------------------------------------------------------------------- --
ALTER VIEW VISTA_EMPLEADOS AS
SELECT e.nombre, e.edad,
o.oficina AS codigo_oficina,
o.ciudad AS ciudad,
o.region
FROM EMPLEADO AS e
INNER JOIN OFICINA as o
ON e.numemp = o.dir;

-- ------------------------------------------------------------------------------------- --
-- 2.4. Eliminar Vista. ---------------------------------------------------------------- --
--      DROP VIEW _ : ------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------- --
DROP VIEW VISTA_EMPLEADOS;
DROP VIEW CONTRATOS_EMP;


/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* ------------------------------------ 3. TRIGGERS ------------------------------------ */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 3.1.1. Insertar. -------------------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
CREATE TABLE LIBROS (
	codigo INT AUTO_INCREMENT,
	titulo VARCHAR(50),
	autor VARCHAR(50),
	editorial VARCHAR(30),
	precio FLOAT,
	stock INT,
	PRIMARY KEY (codigo)
);

CREATE TABLE VENTAS (
	numero INT AUTO_INCREMENT,
	codigolibro INT,
	precio FLOAT,
	cantidad INT,
	PRIMARY KEY (numero)
);

DELIMITER $$
CREATE TRIGGER before_ventas_insert
	BEFORE INSERT ON VENTAS
	FOR EACH ROW
BEGIN
	UPDATE LIBROS SET
	stock = libros.stock - NEW.cantidad
	WHERE NEW.codigolibro = libros.codigo;
END;$$
DELIMITER ;

INSERT INTO LIBROS VALUES
(null, 'El Coronel', 'García', 'Planeta', 15399.99, 40);

INSERT INTO VENTAS VALUES
(null, 1, 20000, 5);


-- ------------------------------------------------------------------------------------- --
-- 3.1.2. Actualizar. ------------------------------------------------------------------ --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
CREATE TABLE USUARIOS (
	nombre VARCHAR(30),
	clave VARCHAR(30),
	PRIMARY KEY (nombre)
);

CREATE TABLE CLAVES_ANTERIORES (
	numero INT AUTO_INCREMENT, 	
	nombre VARCHAR(30),
	clave VARCHAR(30),
	PRIMARY KEY (numero)
);

DELIMITER $$
CREATE TRIGGER before_usuarios_update
	BEFORE UPDATE ON USUARIOS
	FOR EACH ROW
BEGIN
	INSERT INTO CLAVES_ANTERIORES (nombre, clave) VALUES 
	(OLD.nombre, OLD.clave);
END;$$
DELIMITER ;

INSERT INTO USUARIOS VALUES
('Albeiro', '12345');

UPDATE USUARIOS SET
clave = '45678'
WHERE nombre = 'Albeiro';

-- ------------------------------------------------------------------------------------- --
-- 3.1.3. Eliminar. -------------------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
DELIMITER $$
CREATE TRIGGER before_ventas_delete
	BEFORE DELETE ON VENTAS
	FOR EACH ROW
BEGIN
	UPDATE LIBROS SET 
	stock = libros.stock + OLD.cantidad
	WHERE OLD.codigolibro = libros.codigo;   
END;$$
DELIMITER ;

DELETE FROM VENTAS 
WHERE numero = 1;


-- ------------------------------------------------------------------------------------- --
-- 3.2. Eliminar un Trigger. ----------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
DROP TRIGGER before_usuarios_update;
DROP TRIGGER before_ventas_insert;


/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* ----------------------------------- 4. PROCEDURES ----------------------------------- */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 4.1. Crear un Procedure. -------------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
DELIMITER $$
CREATE PROCEDURE pa_libros_limite_stock()
BEGIN
	SELECT * FROM LIBROS	
	WHERE stock >= 10;
END;$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE pa_libros_autor_editorial(
	IN p_autor VARCHAR(30),
	IN p_editorial VARCHAR(20)
)
BEGIN
	SELECT titulo, precio FROM LIBROS 
	WHERE autor = p_autor AND editorial = p_editorial;	
END;$$
DELIMITER ;

-- ------------------------------------------------------------------------------------- --
-- 4.2. Usar un Procedure. ------------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
CALL pa_libros_limite_stock();
CALL pa_libros_autor_editorial('Richard Bach', 'Planeta');

-- ------------------------------------------------------------------------------------- --
-- 4.3. Eliminar un Procedure. --------------------------------------------------------- --
--       : ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
DROP PROCEDURE pa_libros_limite_stock;
DROP PROCEDURE pa_libros_autor_editorial;

/* ************************************************************************************* */
/* ------------------------------------------------------------------------------------- */
/* ----------------------------------- BIBLIOGRAFÍA ------------------------------------ */
/* ------------------------------------------------------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- Tutoriales de Programación ya. (s.f.). MySQL ya. Recuperado el 15 de Mayo de 2022,    --
--      de https://www.tutorialesprogramacionya.com/mysqlya/                             --
-- ------------------------------------------------------------------------------------- --
-- Pildoras Informáticas. (16 de Julio de 2015). Curso SQL.                              --
--      Recuperado el 16 de Abril de 2022, de [Archivo de Vídeo]                         --
--      https://www.youtube.com/playlist?list=PLU8oAlHdN5Bmx-LChV4K3MbHrpZKefNwn         --
--      página web                                                                       --
-- ------------------------------------------------------------------------------------- --