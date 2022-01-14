create database gestion_productos;
use gestion_productos;


SET SQL_SAFE_UPDATES = 0;

-- permite eliminar elementos con clave foranea directamente desde la db
SET FOREIGN_KEY_CHECKS=0; -- deshabilitar restriccion
SET FOREIGN_KEY_CHECKS=1; -- habilitar restriccion

create table productos(
	id varchar(10) primary key,
    nombre varchar(40) not null,
    referencia varchar(60) not null,
    precio int not null,
    peso int not null,
    categoria varchar(30) not null,
    stock int not null,
    fechaCreacion date not null
);

create table ventas(
	id varchar(10) primary key,
    id_producto varchar (10),
    cantidadVendido int not null
);

alter table ventas add foreign key(id_producto) references productos(id) on update cascade;


select * from productos;
delete from productos where id = '219';
select * from ventas;
delete from ventas;

-- Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
select id, nombre, stock from productos order by stock desc limit 1;

-- Realizar una consulta que permita conocer cuál es el producto más vendido.
select ventas.id_producto, productos.nombre, sum(ventas.cantidadVendido) as cantidadVendido from productos 
join ventas on productos.id = ventas.id_producto
group by ventas.id_producto
order by cantidadVendido desc
limit 1;