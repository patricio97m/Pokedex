drop database if exists pokedex;
create database if not exists pokedex;
use pokedex;

create table Pokemon(
                        nombre varchar(25) not null unique,
                        codigo int auto_increment not null primary key,
                        numeroPokedex int not null unique,
                        descripcion varchar (500) not null
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

insert into Pokemon (nombre, numeroPokedex, descripcion)
values ("Bulbasaur", 1, "Bulbasaur es un Pokémon cuadrúpedo de color verde y manchas más oscuras de formas geométricas. Su cabeza representa cerca de un tercio de su cuerpo. En su frente se ubican tres manchas que pueden cambiar dependiendo del ejemplar."),
       ("Ivysaur", 2, "Ivysaur posee un color azulado más vivo que su preevolución Bulbasaur. Además, sus ojos adquieren un leve tono violeta y sus pupilas se vuelven negras. El bulbo que había en la espalda de Bulbasaur se convirte en una flor, la cual aún permanece cerrada. Esta flor es usada por Ivysaur de la misma forma que Bulbasaur empleaba su bulbo para la mayoría de sus ataques."),
       ("Venusaur", 3, "El capullo de su lomo se abre completamente, dejando ver una enorme flor rosada y unas hojas semejantes a las de palmera o las de la Rafflesia arnoldii, que se nutre de la luz solar por fotosíntesis, aunque también absorbe energía del propio Pokémon."),
       ("Charmander", 4, "Charmander es un pequeño lagarto bípedo. Sus características de fuego son resaltadas por su color de piel anaranjado y su cola con la punta envuelta en llamas. Charmander, como sus evoluciones Charmeleon y Charizard, tiene una pequeña llama en la punta de su cola."),
       ("Charmeleon", 5, "Charmeleon es un gran lagarto bípedo que posee como característica general una llama en la punta de su cola al igual que Charmander y Charizard. Esta refleja el estado físico y emocional del Pokémon y si la llama se extingue, también lo hace la vida del mismo."),
       ("Charizard", 6, "La mayoría de los Charizard viven en el Valle Charirrífico. Es conocido que les gusta vivir en lugares altos y calientes, por lo que se encuentran en muchas ocasiones cerca de volcanes. Es muy presuntuoso, violento, agresivo y muy orgulloso. "),
       ("Squirtle", 7, "Cuando retrae su largo cuello en el caparazón, dispara agua a una presión increíble."),
       ("Pikachu", 25, "Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas."),
       ("Gengar", 94, "Para quitarle la vida a su presa, se desliza en su sombra y espera su oportunidad en silencio."),
       ("Dragonite", 149, "Dragonite es un gran Pokémon dragón, con varias características marcadas. Puede volar, escupir tanto fuego como agua o hielo, utilizar la electricidad, que genera mediante sus antenas pero el cómo lo hacen, es desconocido, pero podría ser porque el material del que están hechas permite reunir una enorme carga estática, además de eso posee una inteligencia cercana a la humana."),
       ("Mewtwo", 150, "Mewtwo es el resultado de las ambiciones de los seres humanos en la creación de una reproducción genéticamente realzada (o más bien mejorada) de Mew. Es uno de los primeros Pokémon creados por la ciencia.");

insert into Tipo (nombre)
values ("Fuego"), ("Planta"), ("Veneno"), ("Volador"), ("Agua"), ("Eléctrico"), ("Fantasma"), ("Dragón"), ("Psiquico");

insert into Tipo_Pokemon
values (1, 2), (1, 3), (2, 2), (2, 3), (3, 2), (3, 3), (4, 1), (5, 1), (6, 1), (6, 4), (7, 5), (8, 6), (9, 7), (9, 3), (10, 8), (10, 4), (11, 9);

insert into Usuario (usuario,password)
values ("admin","21232f297a57a5a743894a0e4a801fc3");
-- usuario:admin,password:admin