-- TABLA USUARIOS
CREATE TABLE appmooc.usuarios(
     id INT NOT NULL AUTO_INCREMENT,
     nombre VARCHAR(20) NULL,
     apellido VARCHAR(20) NULL,
     email VARCHAR(20) NULL,
     password VARCHAR(20) NULL,
     documento VARCHAR(20) NULL,
     tipoUsuario VARCHAR(20) NULL,
     PRIMARY KEY (id) 
);

ALTER TABLE usuarios ADD estado bool NULL;

-- id
-- nombre
-- apellido
-- email
-- password
-- documento
-- tipoUsuario

CREATE TABLE cursos(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NULL,
    tipo VARCHAR(20) NULL,
    precio VARCHAR(20) NULL,
    fechaInicio DATE NULL,
    fechaFin DATE NULL,
    detalle VARCHAR(20) NULL,
    estado BOOL null,
    PRIMARY KEY (id) 
);
ALTER TABLE cursos ADD cupo VARCHAR(20) NULL;
CREATE TABLE modulo(
    id INT NOT NULL AUTO_INCREMENT,
    idCurso INT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    estado VARCHAR(20) NULL,
    fecha DATE NULL,
    PRIMARY KEY(id),
    UNIQUE(idCurso, nombre)
);

CREATE TABLE contenido(
    id INT NOT NULL AUTO_INCREMENT,
    contenido VARCHAR(20) NULL,
    estado BOOL NULL,
    PRIMARY KEY(id)
);

CREATE TABLE dicta(
    idprofesor INT NOT NULL,
    idcurso INT NOT NULL,
    cargo VARCHAR(20) NULL,
    estado BOOL
);

CREATE TABLE cursado(
    idalumno INT NOT NULL,
    idcurso INT NOT NULL,
    nota VARCHAR(20) NULL,
    estado BOOL NULL
);
