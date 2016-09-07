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
--modifico aca
-- id
-- nombre
-- apellido
-- email
-- password
-- documento
-- tipoUsuario