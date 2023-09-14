drop database if exists pokedex;
create database if not exists pokedex;
use pokedex;

create table Pokemon(
                        nombre varchar(25) not null unique,
                        codigo int auto_increment not null primary key
);

create table Tipo(
                     nombre varchar(20) not null unique,
                     codigo int auto_increment not null primary key
);

create table Tipo_Pokemon(
                             codigoPokemon int not null,
                             codigoTipo int not null,
                             constraint Tipo_Pokemon_PK primary key (codigoPokemon, codigoTipo),
                             foreign key (codigoPokemon) references Pokemon(codigo),
                             foreign key (codigoTipo) references Tipo(codigo)
);

create table Usuario(
                        usuario varchar(25) not null unique,
                        password varchar(32) not null,
                        idUsuario int auto_increment not null primary key
);



-- Inserts de datos

insert into Pokemon (nombre)
values ("Bulbasaur"), ("Ivysaur"), ("Venusaur"), ("Charmander"), ("Charmeleon"), ("Charizard");

insert into Tipo (nombre)
values ("Fuego"), ("Planta"), ("Veneno"), ("Volador");

insert into Tipo_Pokemon
values (1, 2), (1, 3), (2, 2), (2, 3), (3, 2), (3, 3), (4, 1), (5, 1), (6, 1), (6, 4);

insert into Usuario (usuario,password)
values ("admin","21232f297a57a5a743894a0e4a801fc3");
-- usuario:admin,password:admin