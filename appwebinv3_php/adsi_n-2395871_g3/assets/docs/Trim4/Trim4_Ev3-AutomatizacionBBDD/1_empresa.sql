create database EMPRESA;#CREACIÓN DE LA BASE DE DATOS
use EMPRESA;#SE INDICA QUE SE USA ESA BASE DE DATOS PARA LOS COMANDOS SIGUIENTES

create table oficina(#CREACIÓN TABLA OFICINA
oficina varchar(2) not null primary key,#REPRESENTA EL CODIGO DE LA OFICINA, ES LA CLAVE PRIMARIA NO PUEDE SER NULA
ciudad varchar(20) not null,#REPRESENTA LA CIUDAD DONDE SE ENCUENTRA LA OFICINA, TIPO VARCHAR NO PUEDE ESTAR VACIA
region varchar(10) not null,#REPRESENTA LA REGIÓN DONDE SE ENCUENTRA UBICADA LA OFICINA
dir varchar(3) null,#REPRESENTA EL CODIGO DE EMPLEADO QUE DIRIGE LA OFICINA, SI PUEDE ESTAR VACIO
objetivo decimal null, #REPRESENTA LAS VENTAS ESPERADAS EN UN PERIODO DE TIEMPO
ventas decimal null#VALOR REAL DE LAS VENTAS REALIZADAS EN UN PERIODO DE TIEMPO
);
DESCRIBE OFICINA;

create table empleado(#CREACIÓN TABLA EMPLEADO
numemp varchar(3) not null primary key, #CLAVE PRINICIPAL DEL EMPLEADO, CÓDIGO, NO PUEDE ESTAR VACÍO
nombre varchar(30) not null,#DEFINE EL NOMBRE DEL EMPLEADO. PRIMER NOMBRE Y PRIMER APELLIDO
edad integer not null,#DEFINE LA EDAD DEL EMPLEADO VALOR ENTERO
oficina varchar(2) null,#DEFINE A QUÉ OFICINA ESTÁ VINCULADO EL EMPLEADO. 
titulo  varchar(30) not null, #CARGO QUE DESEMPEÑA EL EMPLEADO
contrato date not null,#FECHA DE INICIACIÓN DEL CONTRATO
jefe varchar(3) null,#QUE EMPLEADO ES EL JEFE DEL EMPLEADO QUE SE REGISTRA
cuota decimal null,#EL VALOR QUE EL EMPLEADO DEBE VENDER EN UN PERIODO
ventas decimal not null#VENTAS REALES QUE SE HACE EL EMPLEADO EN UN PERIDO DE TIEMPO
);
DESCRIBE EMPLEADO;

create table cliente(#CREACIÓN TABLA CLIENTE
numclie varchar(4) not null primary key,#CLAVE PRINICIPAL DEL CLIENTE, CÓDIGO, NO PUEDE ESTAR VACÍO
nombre varchar(50) not null,#DEFINE EL NOMBRE DEL CLIENTE. PRIMER NOMBRE Y PRIMER APELLIDO
repclie varchar(3) not null,#DEFINE EL CÓDIGO DEL EMPLEADO QUE ATIENDE AL CLIENTE
limitecredito decimal not null #DEFINE EL VALOR DEL CRÉDITO QUE TIENE EN LA TIENDA
);
DESCRIBE CLIENTE;

create table pedido(#CREACIÓN TABLA PEDIDO
codigo integer auto_increment not null primary key,#CLAVE PRINICIPAL DEL PEDIDO, CÓDIGO, NO PUEDE ESTAR VACÍO
numpedido varchar(6) not null,#NÚMERO PARA IDENTIFICAR EL PEDIDO, NO PUEDE ESTAR VACÍO
fechapedido date not null,#FECHA DEL PEDIDO, NO PUEDE ESTAR VACÍO
clie varchar(4) not null,#NÚMERO PARA IDENTIFICAR EL CLIENTE, NO PUEDE ESTAR VACÍO
rep varchar(3) not null,#NÚMERO PARA IDENTIFICAR EL EMPLEADO, NO PUEDE ESTAR VACÍO
fab varchar(4) not null,#NÚMERO PARA IDENTIFICAR LA FÁBRICA, NO PUEDE ESTAR VACÍO
producto varchar(5) not null,#NÚMERO PARA IDENTIFICAR EL PRODUCTO, NO PUEDE ESTAR VACÍO
cant integer not null,#CANTIDAD DE PRODUCTO SOLICITADAD EN EL PEDIDO, NO PUEDE ESTAR VACÍO
importe  decimal not null#VALOR DE LO SOLICITADO EN EL PEDIDO, NO PUEDE ESTAR VACÍO
);
DESCRIBE PEDIDO;

create table producto(#CREACIÓN TABLA PRODUCTO
idfab varchar(4) not null,#CLAVE PRINICIPAL DEL PRODUCTO, CÓDIGO, NO PUEDE ESTAR VACÍO
idproducto varchar(5) not null,#CLAVE PRINICIPAL DEL PRODUCTO, CÓDIGO, NO PUEDE ESTAR VACÍO
descripcion varchar(20) not null,#DESCRIPCIÓN DEL PRODUCTO. NO PUEDE ESTAR VACÍO
precio decimal not null,#PRECIO DEL PRODUCTO. NO PUEDE ESTAR VACÍO
existencias integer not null,#CANTIDAD DE UNIDADES DEL PRODUCTO. NO PUEDE ESTAR VACÍO
primary key(idfab, idproducto)#CLAVE PRINCIPAL COMPUESTA
);
DESCRIBE PRODUCTO;

#RELACIONES ENTRE LAS TABLAS

alter table oficina
add constraint ofcem
foreign key (dir)
references empleado (numemp) on delete cascade on update cascade;

alter table cliente
add constraint clem
foreign key (repclie)
references empleado (numemp) on delete cascade on update cascade;

alter table pedido
add constraint pdemp
foreign key (rep)
references empleado (numemp) on delete cascade on update cascade;

alter table pedido
add constraint pdcl
foreign key (clie)
references cliente (numclie) on delete cascade on update cascade;

alter table pedido
add constraint pdpr
foreign key (fab,producto)
references producto (idfab,idproducto) on delete cascade on update cascade;

#INSERCIONES
insert into empleado values('101', 'Antonio Viguer', '45', '12', 'representante', '86/10/20', '104', 300000, 305000),
('102', 'Alvaro Jaumes', '48', '21', 'representante', '86/12/10', '108', 350000, 474000),
('103', 'Juan Rovira', '29', '12', 'representante', '87/03/01', '104', 275000, 286000),
('104', 'Jose Gonzalez', '33', '12', 'dir ventas', '87/05/19', '106', 200000, 143000),
('105', 'Vicente Pantalla', '37', '13', 'representante', '88/02/12', '104', 350000, 368000),
('106', 'Luis Antonio', '52', '11', 'dir general', '88/06/14', null, 275000, 299000),
('107', 'Jorge Gutierrez', '49', '22', 'representante', '88/11/14', '108', 300000, 186000),
('108', 'Ana Bustamante', '62', '21', 'dir ventas', '89/10/12', '106', 350000, 361000),
('109', 'Maria Sunta', '31', '11', 'representante', '99/10/12', '106', 300000, 392000),
('110', 'Juan Victor', '41', null, 'representante', '90/01/13', '104', null, 76000);
SELECT * FROM empleado;

insert into oficina values ('11', 'Valencia', 'este', '106', 575000, 693000),
('12', 'Alicante', 'este', '104', 800000, 735000),
('13', 'Castellon', 'este', '105', 350000, 368000),
('21', 'Babajoz', 'oeste', '108', 725000, 836000),
('22', 'A Coruña', 'oeste', '108', 300000, 186000),
('23', 'Madrid', 'centro', '108', null, null),
('24', 'Madrid', 'centro', '108', 250000, 150000),
('26', 'Pamplona', 'norte', null, null, null),
('28', 'Valencia', 'este', null, 900000, 0);

insert into cliente values ('2101', 'Luis Garcia Anton', '106', 65000),
('2102', 'Alvaro Rodriguez', '101', 65000),
('2103', 'Jaime Llorens', '105', 50000),
('2105', 'Antonio Canales', '101', 45000),
('2106', 'Juan Suarez', '102', 65000),
('2107', 'Julian Lopez', '110', 35000),
('2108', 'Julia Antequera', '109', 55000),
('2109', 'Alberto Juanes', '103', 25000),
('2111', 'Cristobal Garcia', '103', 50000),
('2112', 'Maria Silva', '108', 50000),
('2113', 'Luisa Maron', '104', 20000),
('2114', 'Cristina Bulini', '102', 20000),
('2115', 'Vicente Martinez', '101', 20000),
('2117', 'Carlos Tena', '106', 35000),
('2118', 'Junipero Alvarez', '108', 60000),
('2119', 'Salomon Bueno', '109', 25000),
('2120', 'Juan Malo', '102', 50000),
('2121', 'Vicente Rios', '103', 45000),
('2122', 'Jose Marchante', '105', 30000),
('2123', 'Jose Libros', '102', 40000),
('2124', 'Juan Bolto', '107', 40000);
SELECT * FROM CLIENTE;

insert into producto values ('aci', '41001', 'arandela', 58, 277),
('aci', '41002', 'bisagra', 80, 167),
('aci', '41003', 'art t3', 112, 207),
('aci', '41004', 'art t4', 123, 139),
('aci', '4100x', 'junta', 26, 37),
('aci', '4100y', 'extractor', 2888, 25),
('aci', '4100z', 'mont', 2625, 28),
('bic', '41003', 'manivela', 652, 3),
('bic', '41089', 'rodamiento', 225, 78),
('bic', '41672', 'plato', 180, 0),
('fea', '112', 'cubo', 148, 115),
('fea', '114', 'cubo', 243, 15),
('imm', '773c', 'reostato', 975, 28),
('imm', '775c', 'reostato 2', 1425, 5),
('imm', '779c', 'reostato 3', 1875, 0),
('imm', '887h', 'caja clavos', 54, 223),
('imm', '887p', 'perno', 25, 24),
('imm', '887x', 'manivela', 475, 32),
('qsa', 'xk47', 'red', 355, 38),
('qsa', 'xk48', 'red', 134, 203),
('qsa', 'xk48a', 'red', 117, 37),
('rei', '2a44g', 'pas', 350, 14),
('rei', '2a441', 'bomba l', 4500, 12),
('rei', '2a44r', 'bomba r', 4500, 12),
('rei', '2a45c', 'junta', 79, 210);
select * from producto;


insert into pedido values (null, '110036', '97/01/02', '2107', '110', 'aci', '4100z', 9, 22500);
insert into pedido values (null, '110036', '97/01/02', '2117', '106', 'rei', '2a441', 7, 31500);
insert into pedido values (null, '112963', '97/05/10', '2103', '105', 'aci', '41004', 28, 3276);
insert into pedido values (null, '112968', '90/01/11', '2102', '101', 'aci', '41004', 34, 3978);
insert into pedido values (null, '112975', '97/02/11', '2111', '103', 'rei', '2a44g', 6, 2100);
insert into pedido values (null, '112979', '89/10/12', '2114', '108', 'aci', '4100z', 6, 15000);
insert into pedido values (null, '112983', '97/05/10', '2103', '105', 'aci', '41004', 6, 702);
insert into pedido values (null, '112987', '97/01/01', '2103', '105', 'aci', '4100y', 11, 27500);
insert into pedido values (null, '112989', '97/12/10', '2101', '106', 'fea', '114', 6, 1458);
insert into pedido values (null, '112992', '90/04/15', '2118', '108', 'aci', '41002', 10, 760);
insert into pedido values (null, '112993', '97/03/10', '2106', '102', 'rei', '2a45c', 24, 1896);
insert into pedido values (null, '112997', '97/04/04', '2124', '107', 'bic', '41003', 1, 652);
insert into pedido values (null, '113003', '97/02/05', '2108', '109', 'imm', '779c', 3, 5625);
insert into pedido values (null, '113007', '97/01/01', '2112', '108', 'imm', '773c', 3, 2925);
insert into pedido values (null, '113012', '97/05/05', '2111', '105', 'aci', '41003', 35, 3745);
insert into pedido values (null, '113013', '97/08/06', '2118', '108', 'bic', '41003', 1, 652);
insert into pedido values (null, '113024', '97/07/04', '2114', '108', 'qsa', 'xk47', 20, 7100);
insert into pedido values (null, '113027', '97/02/05', '2103', '105', 'aci', '41002', 54, 4104);
insert into pedido values (null, '113034', '97/11/05', '2107', '110', 'rei', '2a45c', 8, 632);
insert into pedido values (null, '113042', '97/01/01', '2113', '101', 'rei', '2a44r', 5, 22500);
insert into pedido values (null, '113045', '97/07/02', '2112', '108', 'rei', '2a44r', 10, 45000);
insert into pedido values (null, '113048', '97/02/02', '2120', '102', 'imm', '779c', 2, 3750);
insert into pedido values (null, '113049', '97/04/04', '2118', '108', 'qsa', 'xk47', 2, 776);
insert into pedido values (null, '113051', '97/07/06', '2118', '108', 'qsa', 'xk47', 4, 1420);
insert into pedido values (null, '113055', '09/04/01', '2108', '101', 'aci', '4100x', 6, 150);
insert into pedido values (null, '113057', '97/11/01', '2111', '103', 'aci', '4100x', 24, 600);
insert into pedido values (null, '113058', '89/07/04', '2108', '109', 'fea', '112', 10, 1480);
insert into pedido values (null, '113062', '97/07/04', '2124', '107', 'bic', '41003', 10, 2430);
insert into pedido values (null, '113065', '97/06/03', '2106', '102', 'qsa', 'xk47', 6, 2130);
insert into pedido values (null, '113069', '97/08/01', '2109', '107', 'imm', '773c', 22, 31350);


