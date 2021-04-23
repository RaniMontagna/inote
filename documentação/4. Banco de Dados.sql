create sequence sq_usuarios;
create sequence sq_anotacoes;

create table Usuarios (
	id integer NOT NULL,
	nome varchar(30) NOT NULL,
	senha varchar(30) NOT NULL,
	constraint pk_usuario primary key (id)
);

create table Anotacoes (
	id integer PRIMARY KEY NOT NULL,
	anotacao varchar(200) NOT NULL,
	id_usuario integer,
	constraint fk_usuario foreign key (id_usuario) references Usuarios(id)
);