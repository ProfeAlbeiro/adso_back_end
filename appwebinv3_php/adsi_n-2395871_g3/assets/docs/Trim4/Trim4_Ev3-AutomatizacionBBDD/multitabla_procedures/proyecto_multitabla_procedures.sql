-- -----------------------------------------------------
-- Schema proyecto_multitabla_procedures
-- -----------------------------------------------------
CREATE SCHEMA proyecto_multitabla_procedures DEFAULT CHARACTER SET utf8 ;
USE proyecto_multitabla_procedures;

-- -----------------------------------------------------
-- Tabla ROLES
-- -----------------------------------------------------
CREATE TABLE ROLES (
  codigo_rol INT NOT NULL AUTO_INCREMENT,
  nombre_rol VARCHAR(50) NOT NULL,
  PRIMARY KEY (codigo_rol)
) ENGINE = InnoDB;

INSERT INTO ROLES VALUES 
(null, 'admin'),
(null, 'empleado'),
(null, 'cliente');

-- -----------------------------------------------------
-- Tabla USUARIOS
-- -----------------------------------------------------
CREATE TABLE USUARIOS (
  codigo_rol INT NOT NULL,
  codigo_user VARCHAR(10) NOT NULL,
  nombres_user VARCHAR(50) NOT NULL,
  apellidos_user VARCHAR(50) NOT NULL,
  correo_user VARCHAR(100) NOT NULL,
  pass_user VARCHAR(100) NOT NULL,
  estado_user TINYINT NOT NULL,
  PRIMARY KEY (codigo_user),
  INDEX ind_usuario_rol (codigo_rol ASC),
  UNIQUE INDEX uq_correo_user (correo_user ASC),
  CONSTRAINT fk_usuario_rol
    FOREIGN KEY (codigo_rol)
    REFERENCES ROLES (codigo_rol)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO USUARIOS VALUES
(1, 'admin-1', 'Albeiro', 'Ramos', 'profealbeiro2020@gmail.com', sha1('12345'), 1),
(2, 'empleado-5', 'Pepito', 'Perez', 'pepitoperez@gmail.com', sha1('12345'), 1),
(3, 'cliente-8', 'Marinita', 'garcia', 'marinitagarcia@gmail.com', sha1('12345'), 1);

-- -----------------------------------------------------
-- Tabla CLIENTES
-- -----------------------------------------------------
CREATE TABLE CLIENTES (
  codigo_customer VARCHAR(10) NOT NULL,
  fecha_nac_customer DATE NOT NULL,
  PRIMARY KEY (codigo_customer),
  INDEX ind_cliente_credencial (codigo_customer ASC),
  CONSTRAINT fk_cliente_usuario
    FOREIGN KEY (codigo_customer)
    REFERENCES USUARIOS (codigo_user)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO CLIENTES VALUES
('cliente-8', '1990-06-15');

-- -----------------------------------------------------
-- Tabla PEDIDOS
-- -----------------------------------------------------
CREATE TABLE PEDIDOS (
  codigo_customer VARCHAR(10) NOT NULL,
  codigo_pedido VARCHAR(10) NOT NULL,
  fecha_pedido DATE NOT NULL,
  ciudad_pedido VARCHAR(50) NOT NULL,
  direccion_pedido VARCHAR(100) NOT NULL,
  total_pl_pedido DECIMAL(10,2) NOT NULL,
  iva_pedido DECIMAL(10,2) NOT NULL,
  total_pr_pedido DECIMAL(10,2) NOT NULL,
  estado_pedido VARCHAR(30) NOT NULL,
  PRIMARY KEY (codigo_pedido),
  INDEX ind_pedido_cliente (codigo_customer ASC),
  CONSTRAINT fk_pedido_cliente
    FOREIGN KEY (codigo_customer)
    REFERENCES CLIENTES (codigo_customer)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO PEDIDOS VALUES
('cliente-8', 'pedido-1', '2022-09-29', 'Bogotá', 'Calle 15 con 6', 350000, 66500, 416500, 'entregado');


