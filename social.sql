CREATE TABLE users (
id INT auto_increment,
email varchar(255) not null,
nome varchar(200) not null,
senha varchar(200) not null,
foto_perfil varchar(500),
primary key (id)
);

create table posts (
id int auto_increment,
user_id int not null,
titulo varchar(255) not null,
conteudo varchar(255) not null,
foto_post varchar(255) ,
data_post TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
primary key(id)
);

create table comentarios (
id int auto_increment,
user_id int not null,
post_id int not null,
comentario varchar(255) ,

primary key(id)
);