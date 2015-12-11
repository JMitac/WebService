/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*-----------------------------CREACION DB--------------------------------*/
/*------------------------------------------------------------------------*/
create database faregas
use faregas
/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*-----------------------------TABLA USUARIO------------------------------*/
/*------------------------------------------------------------------------*/
create table usuario(
	codusu char(9) not null primary key,
	nomusu varchar(40) not null,
	rol char(3)  default 'U' not null,
	email varchar(50) unique not null,
	pass varchar(20) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*------------------------------------------------------------------------*/
/*-----------------INSERTANDO DATOS A LA TABLA USUARIO--------------------*/
/*------------------------------------------------------------------------*/
/*INSERTANDO DATOS A LA TABLA USUARIO*/
insert into usuario values('us0001','Administrador','A','admin@faregas.com','faregas123');
insert into usuario values('us0002','Asistente','S','asistente@faregas.com','asistente123');
insert into usuario values('us0003','Mecanico','M','mecanico@faregas.com','mecanico123');
/*------------------------------------------------------------------------*/
/*------------------------SELECCIONANDO TABLA USUARIO---------------------*/
/*------------------------------------------------------------------------*/
SELECT * FROM USUARIO;
/*------------------------------------------------------------------------*/
/*---------------------------PROCEDIMIENTO LOGIN--------------------------*/
/*------------------------------------------------------------------------*/
/*SI QUIERES CORRER EL SCRIPT: SELECCIONA DESDE DELIMITER $$ HASTA END, MENOS EL $$ AL FINAL*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login;
create procedure sp_login(
us VARCHAR(50),
ps VARCHAR(20)
)
BEGIN
		declare resul varchar(100);
		declare rola char(3);
		set resul = (select nomusu from usuario where email=us and pass=ps);
		set rola = (select rol from usuario where email=us and pass=ps);
		IF (resul <> '') THEN
       		 select 'success' res,resul,rola;	       
     ELSE     
        select 'fail' res;
     END IF;
END $$
DELIMITER;
/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*--------------------------TABLA MISION----------------------------------*/
/*------------------------------------------------------------------------*/
create table mision(
	mis_cuerpo mediumtext not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*------------------------------------------------------------------------*/
/*----------------PROCEDIMIENTO PARA MODIFICAR----------------------------*/
/*------------------------------------------------------------------------*/
create procedure editaMis(
cuer mediumtext
)update mision set  mis_cuerpo=cuer;

call editaMis('lalalalala')
select * from mision
/*------------------------------------------------------------------------*/
/*-------------------PROCEDIMIENTO PARA LISTAR----------------------------*/
/*------------------------------------------------------------------------*/
create procedure mostMis()
select mis_cuerpo cue from mision;
call mostMis()
/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*--------------------------TABLA NOSOTROS--------------------------------*/
/*------------------------------------------------------------------------*/
create table nosotros(
	nos_cuerpo mediumtext not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*------------------------------------------------------------------------*/
/*----------------PROCEDIMIENTO PARA MODIFICAR----------------------------*/
/*------------------------------------------------------------------------*/
create procedure editaNos(
	cuer mediumtext
)update nosotros set  nos_cuerpo=cuer;
/*------------------------------------------------------------------------*/
/*-------------------PROCEDIMIENTO PARA LISTAR----------------------------*/
/*------------------------------------------------------------------------*/
create procedure mostNos()
select nos_cuerpo cue from nosotros;

call mostNos()
/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*------------------------TABLA TIP-VEHICULO------------------------------*/
/*------------------------------------------------------------------------*/

/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*--------------------------TABLA VEHICULO--------------------------------*/
/*------------------------------------------------------------------------*/
drop table vehiculo(
	ve_id int AUTO_INCREMENT primary key,/*codin*/
	ve_tipo int not null,/*automovil, camioneta, camion, colectivo, 4x4 ,couster,*/
	ve_marca varchar(25) not null,
	ve_model varchar(25) not null,/*titulo*/
	ve_color varchar(25) not null,
	ve_fecha  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP/*fecha*/
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


	
	me_estadovehiculo varchar(25) not null,
	me_tipomotor varchar(25) not null,/*motor de combustion o motor electrico*/
	me_potencia varchar (25) not null,
	me_frenos varchar (25) not null,/*el estado*/
	cli_telf varchar(15) not null,/*cuerpo*/
	cli_email varchar(50) not null,
	cli_marcaVehiculo varchar(50) not null,
	cli_modelVehiculo varchar(50) not null,
	cli_placaVehiculo varchar(50) not null,
	cli_colorVehiculo varchar(50) not null,
	cli_fecha  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP/*fecha*/
/*------------------------------------------------------------------------*/
/*------------------------------INSERTAR----------------------------------*/
/*------------------------------------------------------------------------*/
insert into vehiculo values('Automovil','Toyota','','','')
/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA LISTAR-----------------------------*/
/*------------------------------------------------------------------------*/

/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA ELIMINAR---------------------------*/
/*------------------------------------------------------------------------*/

/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*--------------------------TABLA CLIENTE---------------------------------*/
/*------------------------------------------------------------------------*/
create table cliente(
	cli_cod varchar(5) primary key not null, 
	cli_dni int not null,/*codin*/
	cli_foto varchar(50) not null,/*foto*/
	cli_nombre varchar(25) not null,/*titulo*/
	cli_pater varchar(25) not null,
	cli_mater varchar(25) not null,
	cli_telf int not null,/*cuerpo*/
	cli_email varchar(50) not null,
	cli_direccion varchar(100) not null,
	cli_tipvehiculo varchar(100) not null,
	cli_marca varchar(30) not null,
	cli_model varchar(30) not null,
	cli_placa varchar(10) not null,
	cli_fecha  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP/*fecha*/
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA INSERTAR---------------------------*/
/*------------------------------------------------------------------------*/
DELIMITER $$
CREATE PROCEDURE insertClie(	
 dni int,
 ext varchar(5),/**/
 nom varchar(25),/**/
 pat varchar(25),
 mat varchar(25),
 tel int,
 mail varchar(50),
 dire varchar(100),
 tip varchar(100),
 marca varchar(30),
 model varchar(30),
 placa varchar(10)
 )
BEGIN
     DECLARE co CHAR(5);
     DECLARE img varchar(15);
       SET co = (select concat('cl',right(concat('000',right(IFNULL(max(cli_cod),0),3)+1),3)) AS COD from cliente);
       SET img = (select concat(co ,'.',ext));
       insert into cliente(cli_cod,cli_dni,cli_foto,cli_nombre,cli_pater,
		 cli_mater,cli_telf,cli_email,cli_direccion,cli_tipvehiculo,cli_marca,cli_model,cli_placa) values(co,dni,img,nom,pat,mat,tel,mail,dire,tip,marca,model,placa);
       select img;
END

/*------------------------------------------------------------------------*/
/*------------------LLAMO AL PROCEDIMIENTO INSERTAR-----------------------*/
/*------------------------------------------------------------------------*/  
call insertClie('1234567','.jpg','julio','mitac','quispe','2258412','julio@gmail.com','av.aviacion','automovil','toyota','to-412','ksa-44');

select * from cliente
/*------------------------------------------------------------------------*/
/*-------------------PROCEDIMIENTO PARA LISTAR----------------------------*/
/*------------------------------------------------------------------------*/
create procedure mostClie()
select * from cliente
/*select gal_titulo tit, gal_foto img from galeria;*/

call mostClie()
/*------------------------------------------------------------------------*/
TRUNCATE TABLE cliente
/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA ELIMINAR---------------------------*/
/*------------------------------------------------------------------------*/
create procedure borraClie(
cod char(5)
)delete from cliente where cli_cod=cod;
/*------------------------------------------------------------------------*/
/*----------------PROCEDIMIENTO PARA MODIFICAR----------------------------*/
/*------------------------------------------------------------------------*/
delimiter $$
create procedure editaClie(
 cod varchar(5),
 dni int,
 ext varchar(5),/**/
 nom varchar(25),/**/
 pat varchar(25),
 mat varchar(25),
 tel int,
 mail varchar(50),
 dire varchar(100),
 tip varchar(100),
 marca varchar(30),
 model varchar(30),
 placa varchar(10)
)
BEGIN
	IF isnull(ext) THEN
		update cliente set  cli_dni=dni,cli_nombre=nom,cli_pater=pat,cli_mater=mat,cli_telf=tel,cli_email=mail,cli_direccion=dire,
		cli_tipvehiculo=tip,cli_marca=marca,cli_model=model,placa=cli_placa where cli_cod=cod;
	ELSE
		set @foto:= concat(cod,'_', TRUNCATE(rand() *100 ,0 ),'.',ext);
		update cliente set cli_dni=dni,cli_foto=@foto, cli_nombre=nom,cli_pater=pat,cli_mater=mat,cli_telf=tel,cli_email=mail,cli_direccion=dire,
		cli_tipvehiculo=tip,cli_marca=marca,cli_model=model,cli_placa=placa where cli_cod=cod;
		select @foto img;
	END IF;
END;

call editaClie('cl001','1234567','.jpg','cesar','mitac','quispe','2258412','julio@gmail.com','av.aviacion','automovil','toyota','to-412','ksa-44');

/*########################################################################*/
/*########################################################################*/
/*########################################################################*/
/*------------------------------------------------------------------------*/
/*--------------------------TABLA REVISION--------------------------------*/
/*------------------------------------------------------------------------*/
delimiter $$
create table revision(

cli_cod varchar(5) not null,
rev_id int primary key not null,
rev_

)
create table cadaprogra(
codcada char(5) primary key not null,
nombre varchar(200) not null,
contenido mediumtext not null,
contenido2 mediumtext not null,
contenido3 mediumtext not null,
codpro char(5) not null,
coddepa char(5)  not null,
estado char(2) default 'A' not null,
img varchar(20) not null,
img2 varchar(20) not null,
fechain  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
foreign key(codpro) references programa(codpro),
foreign key(coddepa) references departamentos(coddepa)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

/*------------------------------------------------------------------------*/
/*-------------------------TABLA PRODUCTO---------------------------------*/
/*------------------------------------------------------------------------*/
create table producto(
pro_cod char(5) primary key not null,/*codin*/
pro_titulo varchar(100) not null,/*titulo*/
pro_cuerpo mediumtext not null,/*cuerpo*/
pro_fecha  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,/*fecha*/
pro_foto varchar(50) not null,/*foto*/
cat int not null,
pro_video varchar(200) not null,
pro_pdf varchar(50) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA INSERTAR---------------------------*/
/*------------------------------------------------------------------------*/
DELIMITER $$
CREATE PROCEDURE insertProd(	
 nom varchar(200),
 des mediumtext,
 ca int,
 vid varchar(200)
 )
BEGIN
     DECLARE co CHAR(5);/*genera*/
     DECLARE img varchar(15);/*genera*/
     DECLARE  pdf varchar(50);/*genera*/
       SET co = (select concat('pr',right(concat('00',right(IFNULL(max(pro_cod),'00'),2)+1),3)) AS COD from producto);
       SET img =(select concat('pr',right(concat('00',right(IFNULL(max(pro_cod),'00'),2)+1),3),'.jpg') AS COD from producto);
       SET pdf =(select concat('pr',right(concat('00',right(IFNULL(max(pro_cod),'00'),2)+1),3),'.pdf') AS COD from producto);
       insert into producto (pro_cod,pro_titulo,pro_cuerpo,pro_foto,cat,pro_video,pro_pdf) values(co,nom,des,img,ca,vid,pdf);
       select co;
   END $$


call insertProd('x','lalal','1','youtube.com');  
 
   

/*------------------------------------------------------------------------*/
/*-------------------PROCEDIMIENTO PARA LISTAR----------------------------*/
/*------------------------------------------------------------------------*/
call mostProd()
create procedure mostProd()
select * from producto;

create procedure mostCat1()
select * from producto where cat = 1;

create procedure mostCat2()
select * from producto where cat = 2;

create procedure mostCat3()
select * from producto where cat = 3;

create procedure mostCat4()
select * from producto where cat = 4;

create procedure mostDetPro(
cod char(5))
select * from producto where pro_cod = cod;



call mostDetPro('pr001');
/*------------------------------------------------------------------------*/
TRUNCATE TABLE producto
/*------------------------------------------------------------------------*/
/*------------------PROCEDIMIENTO PARA ELIMINAR---------------------------*/
/*------------------------------------------------------------------------*/
create procedure borraProd(
cod char(5)
)delete from producto where pro_cod=cod;