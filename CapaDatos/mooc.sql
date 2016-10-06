CREATE TABLE  rol (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
);

CREATE TABLE  usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  dni varchar(255) NOT NULL,
  nombre varchar(255) NOT NULL,
  apellido varchar(255) NOT NULL,
  mail varchar(255) NOT NULL,
  bajaLogica BOOL NOT NULL,
  idCreador int(11) NULL,
  idLocalidad int(11) NOT NULL,
  fechaNac date NOT NULL,
  password varchar(255) NOT NULL,
  idRol varchar(255) NOT NULL,
  CONSTRAINT PK_USUARIO PRIMARY KEY (id),
  CONSTRAINT UQ_USUARIO_MAIL UNIQUE(mail),
  CONSTRAINT FK_USUARIO_USUARIO FOREIGN KEY(idCreador) REFERENCES usuario(id),
  CONSTRAINT FK_USUARIO_ROL FOREIGN KEY(idRol) REFERENCES rol(id),
  CONSTRAINT FK_USUARIO_LOCALIDAD FOREIGN KEY(idLocalidad) REFERENCES localidad(id)
);


--listo hasta aca

CREATE TABLE  curso (
  id int(11),
  idCategoria int(11),
  idAdmin int(11),
  nombre varchar(255),
  modulos int(11),
  estado BOOL,
  descripcion text,
  esMasivo BOOL,
  cupo int(11),
  precio varchar(255) ,
  inicioCurso date,
  finCurso date,
  maxEval int(11),
  bajaLogica BOOL
);

CREATE TABLE  categoria (
  id int(11),
  nombre varchar(255),
  estado BOOL,
  bajaLogica BOOL
);



CREATE TABLE  denuncia (
  idDenuncia int(11),
  idTipoDenuncia int(11),
  descripcionDenuncia text,
  fechaDenuncia date,
  idAdmin int(11),
  idEstudiante int(11),
  idProfesor int(11),
  bajaLogica BOOL
);

CREATE TABLE  dicta (
  idCurso int(11),
  idProfesor int(11),
  fechaAsignacion date,
  titular BOOL,
  bajaLogica BOOL
);

CREATE TABLE  direccion (
  idEstudiante int(11),
  idProvincia int(11),
  idLocalidad int(11),
  calle varchar(255),
  altura int(11),
  piso int(11) ,
  depto int(11) 
);

CREATE TABLE  evaluacion (
  idExamen int(11),
  idEstudiante int(11),
  idCurso int(11),
  nota float,
  bajaLogica BOOL
);

CREATE TABLE  examen (
  idExamen int(11),
  nroModulo int(11),
  idCurso int(11),
  urlExamen varchar(255),
  bajaLogica BOOL
);

CREATE TABLE  examenpreguntas (
  idExamen int(11),
  pregunta varchar(255),
  opcion1 varchar(255),
  opcion2 varchar(255),
  opcion3 varchar(255),
  opcion4 varchar(255),
  bajaLogica BOOL
);

CREATE TABLE  inscripcion (
  idEstudiante int(11),
  idCurso int(11),
  rating int(11),
  comento BOOL,
  porcentAprobado float,
  calificacion int(11)  ,
  comentario text,
  bajaLogica BOOL,
  fecha date
);



CREATE TABLE  modulo (
  nroModulo int(11),
  idCurso int(11),
  titulo varchar(255),
  inicio date  ,
  fin date  ,
  fechaExamen date  ,
  urlVideo varchar(255)  ,
  urlDiapos varchar(255)  ,
  texto text,
  bajaLogica BOOL
);



CREATE TABLE  tipodenuncia (
  idTipoDenuncia int(11),
  descripcion varchar(255),
  bajaLogica BOOL
);

-- INSERT INTO localidad (idLocalidad, idProvincia, nombreLocalidad, cp, bajaLogica) VALUES
-- (1, 1, 'Alto Pelado', '5721', 0),
-- (2, 1, 'Alto Pencoso', '5724', 0),
-- (3, 1, 'Arizona', '6389', 0),
-- (4, 1, 'Balde', '5724', 0),
-- (5, 1, 'Beazley', '5721', 0),
-- (6, 1, 'Concaran', '5770', 0),
-- (7, 1, 'Cortaderas', '5883', 0),
-- (8, 1, 'Desaguadero', '5598', 0),
-- (9, 1, 'El Durazno', '5701', 0),
-- (10, 1, 'El Portezuelo', '5750', 0),
-- (11, 1, 'El Toro Muerto', '6216', 0),
-- (12, 1, 'Florida', '5715', 0),
-- (13, 1, 'General Pedernera ', '5738', 0),
-- (14, 1, 'Huertas', '5771', 0),
-- (15, 1, 'Intihuasi ', '5701', 0),
-- (34, 1, 'Renca', '5775', 0),
-- (37, 1, 'San Luis', '5700', 0),
-- (40, 1, 'Quines ', '5711', 0),
-- (42, 1, 'Salinas', '5713', 0),
-- (45, 1, 'Justo Daract', '5738', 0),
-- (46, 1, 'Potrero de los Funes', '5701', 0),
-- (50, 1, 'Zanjitas', '5721', 0);



-- INSERT INTO provincia (idProvincia, nombre, bajaLogica) VALUES
-- (1, 'San Luis', 0),
-- (2, 'San Juan', 0),
-- (3, 'Mendoza', 0),
-- (4, 'La Pampa', 0),
-- (5, 'Neuquen', 0),
-- (6, 'Rio Negro', 0),
-- (7, 'Chubut', 0),
-- (8, 'Santa Cruz', 0),
-- (9, 'Tierra del FUego', 0),
-- (10, 'Buenos Aires', 0),
-- (11, 'Santa Fe', 0),
-- (12, 'Entre Rios', 0),
-- (13, 'Corrientes', 0),
-- (14, 'Misiones', 0),
-- (15, 'Chaco', 0),
-- (16, 'Santiago del Estero', 0),
-- (17, 'Formosa', 0),
-- (18, 'Salta', 0),
-- (19, 'Tucuman', 0),
-- (20, 'Jujuy', 0),
-- (21, 'Catamarca', 0),
-- (22, 'La Rioja', 0),
-- (23, 'Capital Federal', 0),
-- (24, 'Cordoba', 0);



-- ALTER TABLE usuario
--   ADD PRIMARY KEY (id);

-- ALTER TABLE categoria
--   ADD PRIMARY KEY (idCategoria),
--   ADD KEY AI_idCategoria (idCategoria);

-- ALTER TABLE curso
--   ADD PRIMARY KEY (idCurso),
--   ADD UNIQUE KEY idCurso (idCurso),
--   ADD KEY AI_idCurso (idCurso),
--   ADD KEY indexNombreCurso (nombreCurso),
--   ADD KEY idAdmin (idAdmin),
--   ADD KEY idCategoria (idCategoria);

-- ALTER TABLE denuncia
--   ADD PRIMARY KEY (idDenuncia,idTipoDenuncia),
--   ADD KEY AI_idDenuncia (idDenuncia),
--   ADD KEY idTipoDenuncia (idTipoDenuncia),
--   ADD KEY idAdmin (idAdmin),
--   ADD KEY idEstudiante (idEstudiante),
--   ADD KEY idProfesor (idProfesor);

-- ALTER TABLE dicta
--   ADD PRIMARY KEY (idCurso,idProfesor),
--   ADD KEY idProfesor (idProfesor);

-- ALTER TABLE direccion
--   ADD PRIMARY KEY (idEstudiante,idProvincia,idLocalidad);

-- ALTER TABLE estudiante
--   ADD PRIMARY KEY (idEstudiante),
--   ADD UNIQUE KEY idEstudiante (idEstudiante),
--   ADD KEY AI_idEstudiante (idEstudiante),
--   ADD KEY idLocalidad (idLocalidad);

-- ALTER TABLE evaluacion
--   ADD PRIMARY KEY (idExamen,idEstudiante),
--   ADD KEY idEstudiante (idEstudiante,idCurso);

-- ALTER TABLE examen
--   ADD PRIMARY KEY (idExamen),
--   ADD UNIQUE KEY idExamen (idExamen),
--   ADD KEY AI_idExamen (idExamen),
--   ADD KEY nroModulo (nroModulo,idCurso);

-- ALTER TABLE examenpreguntas
--   ADD PRIMARY KEY (idExamen);

-- ALTER TABLE inscripcion
--   ADD PRIMARY KEY (idEstudiante,idCurso),
--   ADD KEY idCurso (idCurso);

-- ALTER TABLE localidad
--   ADD PRIMARY KEY (idLocalidad),
--   ADD KEY AI_idLocalidad (idLocalidad),
--   ADD KEY idProvincia (idProvincia);

-- ALTER TABLE modulo
--   ADD PRIMARY KEY (nroModulo,idCurso),
--   ADD KEY AI_nroModulo (nroModulo),
--   ADD KEY idCurso (idCurso);

-- ALTER TABLE profesor
--   ADD PRIMARY KEY (idProfesor),
--   ADD UNIQUE KEY idProfesor (idProfesor),
--   ADD UNIQUE KEY dniProfesor (dniProfesor),
--   ADD KEY AI_idProfesor (idProfesor),
--   ADD KEY idAdmin (idAdmin);

-- ALTER TABLE provincia
--   ADD PRIMARY KEY (idProvincia),
--   ADD UNIQUE KEY nombre (nombre),
--   ADD KEY AI_idProvincia (idProvincia);

-- ALTER TABLE tipodenuncia
--   ADD PRIMARY KEY (idTipoDenuncia),
--   ADD KEY AI_idTipoDenuncia (idTipoDenuncia);

-- ALTER TABLE admin
--   MODIFY idAdmin int(11) AUTO_INCREMENT;

-- ALTER TABLE categoria
--   MODIFY idCategoria int(11) AUTO_INCREMENT;

-- ALTER TABLE curso
--   MODIFY idCurso int(11) AUTO_INCREMENT;

-- ALTER TABLE denuncia
--   MODIFY idDenuncia int(11) AUTO_INCREMENT;

-- ALTER TABLE estudiante
--   MODIFY idEstudiante int(11) AUTO_INCREMENT;

-- ALTER TABLE examen
--   MODIFY idExamen int(11) AUTO_INCREMENT;

-- ALTER TABLE localidad
--   MODIFY idLocalidad int(11) AUTO_INCREMENT,AUTO_INCREMENT=52;

-- ALTER TABLE modulo
--   MODIFY nroModulo int(11) AUTO_INCREMENT;

-- ALTER TABLE profesor
--   MODIFY idProfesor int(11) AUTO_INCREMENT;

-- ALTER TABLE provincia
--   MODIFY idProvincia int(11) AUTO_INCREMENT,AUTO_INCREMENT=25;

-- ALTER TABLE tipodenuncia
--   MODIFY idTipoDenuncia int(11) AUTO_INCREMENT;
