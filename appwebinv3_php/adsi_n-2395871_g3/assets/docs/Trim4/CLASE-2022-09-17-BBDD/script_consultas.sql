/* --------------------------------------------------------------------------------------- */
/* ------------------------------------ CONSULTAS--- ------------------------------------- */
/* --------------------------------------------------------------------------------------- */


-- --------------------------------------------------------------------------------------- --
-- INSERTAR
-- --------------------------------------------------------------------------------------- --
INSERT INTO CATEGORIAS VALUES
(null, 'comida'),
(null, 'juguetes'),
(null, 'medicina');

INSERT INTO PRODUCTOS VALUES
(1, null, 'concentrado', 10000, 20),
(1, null, 'pastillas', 30000, 30),
(1, null, 'galletas', 15000, 25),
(2, null, 'hueso', 20000, 35),
(2, null, 'frisbie', 5000, 45),
(2, null, 'tunel', 60000, 2),
(3, null, 'antiparasitario', 50000, 10),
(3, null, 'antipulgas', 30000, 30),
(3, null, 'jabón baño', 8000, 25);

INSERT INTO COMPRA VALUES
('ABC-115', '2022-09-17', 307000, 'img-factura-ABC-115');

INSERT INTO LISTA_PROD_COM VALUES
('ABC-115', 1, 9000, 5),
('ABC-115', 3, 12000, 10),
('ABC-115', 6, 50000, 2),
('ABC-115', 9, 6000, 7);

INSERT INTO CLIENTES VALUES
(null, 'Pepito'),
(null, 'Marinita');

INSERT INTO PEDIDOS VALUES
(2, null, '2022-09-18', 210000);

INSERT INTO LISTA_PROD_PED VALUES
(1, 2, 5),
(1, 7, 4);


-- --------------------------------------------------------------------------------------- --
-- CONSULTAR
-- --------------------------------------------------------------------------------------- --
SELECT
PRODUCTOS.cod_producto,
nombre_producto,
stock,
precio_producto_v,
precio_producto_v * stock AS activos,
precio_producto_c
FROM PRODUCTOS 
LEFT JOIN LISTA_PROD_COM
ON PRODUCTOS.cod_producto = LISTA_PROD_COM.cod_producto
LEFT JOIN LISTA_PROD_PED
ON PRODUCTOS.cod_producto = LISTA_PROD_PED.cod_producto
GROUP BY PRODUCTOS.cod_producto
ORDER BY PRODUCTOS.cod_producto;



-- --------------------------------------------------------------------------------------- --
-- ------------------------------------ DISPARADORES ------------------------------------- --
-- --------------------------------------------------------------------------------------- --


-- --------------------------------------------------------------------------------------- --
-- COMPRA: STOCK
-- --------------------------------------------------------------------------------------- --
DELIMITER $$
CREATE TRIGGER before_compra_insert
	BEFORE INSERT ON LISTA_PROD_COM
	FOR EACH ROW
BEGIN
	UPDATE PRODUCTOS SET
	stock = PRODUCTOS.stock + NEW.cant_productos_c
	WHERE NEW.cod_producto = PRODUCTOS.cod_producto;
END;$$
DELIMITER ;

-- --------------------------------------------------------------------------------------- --
-- VENTA: STOCK
-- --------------------------------------------------------------------------------------- --
DELIMITER $$
CREATE TRIGGER before_pedido_insert
	BEFORE INSERT ON LISTA_PROD_PED
	FOR EACH ROW
BEGIN
	UPDATE PRODUCTOS SET
	stock = PRODUCTOS.stock - NEW.cant_productos_v
	WHERE NEW.cod_producto = PRODUCTOS.cod_producto;
END;$$
DELIMITER ;