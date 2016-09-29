    drop table usuario_rol;
    drop table rol;
    drop table usuario;

    CREATE TABLE usuario(
        id int auto_increment,
        nombre varchar(20),
        email varchar(20),
        password varchar(20),
        urlFoto varchar(20),
        primary key(id),
        unique (nombre),
        unique (email)
    );

    create table rol(
        id int auto_increment,
        nombre varchar(20),
        descripcion varchar(20),
        primary key (id),
        unique (nombre)
    );

    create table usuario_rol(
        id_usuario int,
        id_rol int,
        fecha varchar(20),
        primary key (id_usuario, id_rol),
        foreign key (id_usuario) references usuario(id),
        foreign key (id_rol) references rol (id)
    )