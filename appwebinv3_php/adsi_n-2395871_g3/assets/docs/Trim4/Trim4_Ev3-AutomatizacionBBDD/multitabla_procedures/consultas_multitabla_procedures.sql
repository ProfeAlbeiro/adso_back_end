-- -----------------------------------------------------
-- Procedimiento Almacenado: INSERTAR USUARIO
-- -----------------------------------------------------
DROP PROCEDURE pa_insertar_usuario;

DELIMITER $$
CREATE PROCEDURE pa_insertar_usuario(
  IN p_codigo_rol INT(11),  
  IN p_codigo_user VARCHAR(10),
  IN p_nombres_user VARCHAR(50),
  IN p_apellidos_user VARCHAR(50),
  IN p_correo_user VARCHAR(100),
  IN p_pass_user VARCHAR(100),
  IN p_estado_user TINYINT
)
BEGIN
  INSERT INTO USUARIOS VALUES
  (p_codigo_rol,p_codigo_user,p_nombres_user,p_apellidos_user,p_correo_user,p_pass_user,p_estado_user);
END;$$
DELIMITER ;

CALL pa_insertar_usuario(3, 'cliente-1', 'Luz', 'Montoya', 'luzmontoya@gmail.com', sha1('12345'), 1);

-- -----------------------------------------------------
-- Procedimiento Almacenado: ACTUALIZAR USUARIO
-- -----------------------------------------------------
DROP PROCEDURE pa_actualizar_usuario;

DELIMITER $$
CREATE PROCEDURE pa_actualizar_usuario(
  IN p_codigo_rol INT(11),  
  IN p_codigo_user VARCHAR(10),
  IN p_nombres_user VARCHAR(50),
  IN p_apellidos_user VARCHAR(50),
  IN p_correo_user VARCHAR(100),
  IN p_pass_user VARCHAR(100),
  IN p_estado_user TINYINT
)
BEGIN
  UPDATE USUARIOS SET
    codigo_rol = p_codigo_rol,
    codigo_user = p_codigo_user,
    nombres_user = p_nombres_user,
    apellidos_user = p_apellidos_user,
    correo_user = p_correo_user,
    pass_user = p_pass_user,
    estado_user = p_estado_user
  WHERE codigo_user = p_codigo_user;
END;$$
DELIMITER ;

CALL pa_actualizar_usuario(3, 'cliente-1', 'Rogelio', 'Alvarado', 'rogelioalvarado@gmail.com', sha1('12345'), 1);

-- -----------------------------------------------------
-- Procedimiento Almacenado: SELECCIONAR USUARIO
-- -----------------------------------------------------

DROP PROCEDURE pa_seleccionar_usuario;

DELIMITER $$
CREATE PROCEDURE pa_seleccionar_usuario(  
  IN p_codigo_user VARCHAR(10)
)
BEGIN
  SELECT * FROM USUARIOS    
  WHERE codigo_user = p_codigo_user;
END;$$
DELIMITER ;

CALL pa_seleccionar_usuario('cliente-1');

-- -----------------------------------------------------
-- Procedimiento Almacenado: ELIMINAR USUARIO
-- -----------------------------------------------------
DROP PROCEDURE pa_eliminar_usuario;

DELIMITER $$
CREATE PROCEDURE pa_eliminar_usuario(
  IN p_codigo_user VARCHAR(10)  
)
BEGIN
  DELETE FROM USUARIOS
  WHERE codigo_user = p_codigo_user;
END;$$
DELIMITER ;

CALL pa_eliminar_usuario('cliente-1');


-- -----------------------------------------------------
-- Consultar Multitabla (JOIN) : GENERAL
-- -----------------------------------------------------

SELECT * FROM ROLES AS r
INNER JOIN USUARIOS AS u
ON r.codigo_rol = u.codigo_rol
INNER JOIN CLIENTES AS c
ON u.codigo_user = c.codigo_customer
INNER JOIN PEDIDOS AS p
ON c.codigo_customer = p.codigo_customer;

-- -----------------------------------------------------
-- Consultar Multitabla (JOIN) : ESPECÍFICAS
-- -----------------------------------------------------
SELECT 
  r.nombre_rol,
  u.nombres_user,
  u.apellidos_user,
  c.fecha_nac_customer,
  p.total_pr_pedido,
  p.estado_pedido
FROM ROLES AS r
INNER JOIN USUARIOS AS u
ON r.codigo_rol = u.codigo_rol
INNER JOIN CLIENTES AS c
ON u.codigo_user = c.codigo_customer
INNER JOIN PEDIDOS AS p
ON c.codigo_customer = p.codigo_customer
WHERE p.estado_pedido = 'entregado';

