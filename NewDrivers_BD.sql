DROP DATABASE IF EXISTS new_drivers;

CREATE DATABASE new_drivers;

USE new_drivers;

CREATE TABLE usuario(
    id_user INT AUTO_INCREMENT,
    nombre VARCHAR(300),
    telefono INT, /* 9 digitos */
    fecha_nacimiento DATE,
    correo VARCHAR(50) UNIQUE,
    ubicacion VARCHAR(70),
    password_user VARCHAR(260),
    permisos INT, /* 1 Alumno, 2 Profesor, 3 Super Admin */
    estado BIT,
    imagen VARCHAR(400) DEFAULT 'fotoPerfil.jpg',

    PRIMARY KEY (id_user)
);

-- Inserts para 51 usuarios con la columna 'ubicacion'
INSERT INTO usuario (nombre, telefono, fecha_nacimiento, correo, ubicacion, password_user, permisos, estado, imagen)
VALUES 
('Juan Pérez', 912345678, '1990-05-12', 'juan.perez@example.com', 'Santiago', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('María García', 923456789, '1985-08-25', 'maria.garcia@example.com', 'Valparaíso', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Pedro Sánchez', 934567890, '1992-11-10', 'pedro.sanchez@example.com', 'Concepción', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Luis Ramírez', 945678901, '1994-03-22', 'luis.ramirez@example.com', 'La Serena', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Ana Torres', 956789012, '1989-06-18', 'ana.torres@example.com', 'Antofagasta', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Jorge Díaz', 967890123, '1993-01-30', 'jorge.diaz@example.com', 'Temuco', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Carla Ruiz', 978901234, '1991-07-14', 'carla.ruiz@example.com', 'Rancagua', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Alberto Rodríguez', 989012345, '1995-04-09', 'alberto.rodriguez@example.com', 'Iquique', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Laura Mendoza', 910123456, '1988-09-27', 'laura.mendoza@example.com', 'Talca', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Ricardo Gómez', 911234567, '1990-12-05', 'ricardo.gomez@example.com', 'Arica', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Claudia Morales', 912345678, '1994-08-12', 'claudia.morales@example.com', 'Punta Arenas', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Diego Vega', 923456789, '1987-05-30', 'diego.vega@example.com', 'Puerto Montt', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Patricia Silva', 934567890, '1992-03-18', 'patricia.silva@example.com', 'Copiapó', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Sofía Peña', 945678901, '1993-07-24', 'sofia.pena@example.com', 'Osorno', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Andrés Figueroa', 956789012, '1989-10-11', 'andres.figueroa@example.com', 'Curicó', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Gabriela Muñoz', 967890123, '1991-09-21', 'gabriela.munoz@example.com', 'Los Ángeles', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Rodrigo Romero', 978901234, '1990-06-14', 'rodrigo.romero@example.com', 'Quillota', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Valeria Ortega', 989012345, '1992-11-02', 'valeria.ortega@example.com', 'Vallenar', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Esteban Aguilar', 910123456, '1988-04-08', 'esteban.aguilar@example.com', 'Chillán', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Daniela Herrera', 911234567, '1994-12-19', 'daniela.herrera@example.com', 'Coyhaique', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Felipe Cáceres', 912345678, '1986-11-27', 'felipe.caceres@example.com', 'San Fernando', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Mónica Paredes', 923456789, '1993-03-07', 'monica.paredes@example.com', 'Calama', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Héctor Villalobos', 934567890, '1990-09-15', 'hector.villalobos@example.com', 'Linares', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Isabel Ríos', 945678901, '1989-02-20', 'isabel.rios@example.com', 'Angol', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Julio Castro', 956789012, '1991-01-31', 'julio.castro@example.com', 'San Antonio', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Victoria Vargas', 967890123, '1988-12-17', 'victoria.vargas@example.com', 'Melipilla', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Adrián Torres', 978901234, '1995-10-23', 'adrian.torres@example.com', 'Quillón', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Elena Navarro', 989012345, '1987-06-04', 'elena.navarro@example.com', 'Lebu', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Emilio Campos', 910123456, '1994-08-11', 'emilio.campos@example.com', 'Arauco', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Sara Fuentes', 911234567, '1992-09-28', 'sara.fuentes@example.com', 'Cauquenes', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Francisco Carrasco', 912345678, '1986-11-19', 'francisco.carrasco@example.com', 'Pucón', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Martín Espinoza', 923456789, '1993-05-13', 'martin.espinoza@example.com', 'San Carlos', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Alejandra Tapia', 934567890, '1990-07-05', 'alejandra.tapia@example.com', 'Ovalle', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Miguel Suárez', 945678901, '1995-01-18', 'miguel.suarez@example.com', 'Panguipulli', 'hashedpassword', 1, 1, 'fotoPerfil.jpg'),
('Carlos Martínez', 956789012, '1992-11-14', 'carlos.martinez@example.com', 'Puerto Varas', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Lucía Fernández', 967890123, '1988-02-26', 'lucia.fernandez@example.com', 'Rengo', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('José López', 978901234, '1989-09-12', 'jose.lopez@example.com', 'Cañete', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Marta Ramírez', 989012345, '1991-04-03', 'marta.ramirez@example.com', 'Quilpué', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Raúl Sánchez', 910123456, '1990-03-29', 'raul.sanchez@example.com', 'Lota', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Andrea Méndez', 911234567, '1986-10-16', 'andrea.mendez@example.com', 'San Javier', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Pablo Torres', 912345678, '1985-12-21', 'pablo.torres@example.com', 'Illapel', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Gloria Pacheco', 923456789, '1987-07-18', 'gloria.pacheco@example.com', 'La Ligua', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Tomás Castro', 934567890, '1989-06-20', 'tomas.castro@example.com', 'Hualpén', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Paula Rojas', 945678901, '1992-05-09', 'paula.rojas@example.com', 'Los Andes', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Enrique Herrera', 956789012, '1993-03-15', 'enrique.herrera@example.com', 'Parral', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Teresa Vega', 967890123, '1988-11-24', 'teresa.vega@example.com', 'Villarrica', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Sebastián Fuentes', 978901234, '1994-10-01', 'sebastian.fuentes@example.com', 'Cerrillos', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Verónica Morales', 989012345, '1990-02-13', 'veronica.morales@example.com', 'Peñaflor', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Manuel Soto', 910123456, '1987-08-07', 'manuel.soto@example.com', 'Padre Las Casas', 'hashedpassword', 2, 1, 'fotoPerfil.jpg'),
('Elena Araya', 911234567, '1995-01-22', 'elena.araya@example.com', 'Llay Llay', 'hashedpassword', 3, 1, 'fotoPerfil.jpg');



CREATE TABLE super_admin(
    id_admin INT AUTO_INCREMENT,
    fk_usuario_id int,

    PRIMARY KEY (id_admin),
    FOREIGN KEY (fk_usuario_id) REFERENCES usuario(id_user)
);

-- Insert para super admin
INSERT INTO super_admin (fk_usuario_id)
VALUES ((SELECT id_user FROM usuario WHERE correo = 'admin@example.com'));

CREATE TABLE alumno(
    id_alum INT AUTO_INCREMENT,
/*     nivel_conduccion VARCHAR(100),*/ 
    descripcion_alum TEXT, /* Breve descripcion del alumno */
    fk_usuario_id INT,

    PRIMARY KEY (id_alum),
    FOREIGN KEY (fk_usuario_id) REFERENCES USUARIO(id_user)

);

-- Inserts para 35 alumnos
INSERT INTO alumno (descripcion_alum, fk_usuario_id)
VALUES 
('Juan es un estudiante principiante con interés en la conducción segura.', (SELECT id_user FROM usuario WHERE correo = 'juan.perez@example.com')),
('María está interesada en mejorar sus habilidades de conducción.', (SELECT id_user FROM usuario WHERE correo = 'maria.garcia@example.com')),
('Pedro ha tenido algunas lecciones y quiere perfeccionar su técnica.', (SELECT id_user FROM usuario WHERE correo = 'pedro.sanchez@example.com')),
('Luis busca aprender a conducir para ir a la universidad.', (SELECT id_user FROM usuario WHERE correo = 'luis.ramirez@example.com')),
('Ana quiere aprender a conducir para su trabajo.', (SELECT id_user FROM usuario WHERE correo = 'ana.torres@example.com')),
('Jorge está mejorando sus habilidades de conducción para obtener su licencia.', (SELECT id_user FROM usuario WHERE correo = 'jorge.diaz@example.com')),
('Carla es principiante y quiere aprender a conducir con confianza.', (SELECT id_user FROM usuario WHERE correo = 'carla.ruiz@example.com')),
('Alberto ha tomado algunas clases y quiere aprender a estacionar mejor.', (SELECT id_user FROM usuario WHERE correo = 'alberto.rodriguez@example.com')),
('Laura quiere aprender a conducir para viajar más.', (SELECT id_user FROM usuario WHERE correo = 'laura.mendoza@example.com')),
('Ricardo está interesado en la conducción segura y económica.', (SELECT id_user FROM usuario WHERE correo = 'ricardo.gomez@example.com')),
('Claudia busca perfeccionar sus habilidades de conducción en carretera.', (SELECT id_user FROM usuario WHERE correo = 'claudia.morales@example.com')),
('Diego está aprendiendo a conducir para su nuevo trabajo.', (SELECT id_user FROM usuario WHERE correo = 'diego.vega@example.com')),
('Patricia está interesada en aprender a conducir en ciudades.', (SELECT id_user FROM usuario WHERE correo = 'patricia.silva@example.com')),
('Sofía quiere aprender a conducir antes de mudarse a otra ciudad.', (SELECT id_user FROM usuario WHERE correo = 'sofia.pena@example.com')),
('Andrés está interesado en aprender a conducir para viajes largos.', (SELECT id_user FROM usuario WHERE correo = 'andres.figueroa@example.com')),
('Gabriela busca mejorar sus habilidades de conducción en autopistas.', (SELECT id_user FROM usuario WHERE correo = 'gabriela.munoz@example.com')),
('Rodrigo quiere aprender a conducir para su trabajo.', (SELECT id_user FROM usuario WHERE correo = 'rodrigo.romero@example.com')),
('Valeria quiere mejorar sus habilidades de estacionamiento.', (SELECT id_user FROM usuario WHERE correo = 'valeria.ortega@example.com')),
('Esteban está interesado en aprender a conducir de forma segura.', (SELECT id_user FROM usuario WHERE correo = 'esteban.aguilar@example.com')),
('Daniela busca aprender a conducir para viajes largos.', (SELECT id_user FROM usuario WHERE correo = 'daniela.herrera@example.com')),
('Felipe quiere aprender a conducir para su nuevo empleo.', (SELECT id_user FROM usuario WHERE correo = 'felipe.caceres@example.com')),
('Mónica está interesada en aprender a conducir en áreas urbanas.', (SELECT id_user FROM usuario WHERE correo = 'monica.paredes@example.com')),
('Héctor busca mejorar sus habilidades de conducción nocturna.', (SELECT id_user FROM usuario WHERE correo = 'hector.villalobos@example.com')),
('Isabel quiere aprender a conducir para viajes familiares.', (SELECT id_user FROM usuario WHERE correo = 'isabel.rios@example.com')),
('Julio está interesado en la conducción segura y defensiva.', (SELECT id_user FROM usuario WHERE correo = 'julio.castro@example.com')),
('Victoria quiere mejorar sus habilidades de conducción en lluvia.', (SELECT id_user FROM usuario WHERE correo = 'victoria.vargas@example.com')),
('Adrián busca aprender a conducir para ir al trabajo.', (SELECT id_user FROM usuario WHERE correo = 'adrian.torres@example.com')),
('Elena está interesada en la conducción segura en autopistas.', (SELECT id_user FROM usuario WHERE correo = 'elena.navarro@example.com')),
('Emilio quiere aprender a conducir para mudarse de ciudad.', (SELECT id_user FROM usuario WHERE correo = 'emilio.campos@example.com')),
('Sara está interesada en mejorar sus habilidades de conducción.', (SELECT id_user FROM usuario WHERE correo = 'sara.fuentes@example.com')),
('Francisco quiere aprender a conducir de manera segura y eficiente.', (SELECT id_user FROM usuario WHERE correo = 'francisco.carrasco@example.com')),
('Martín está aprendiendo a conducir para obtener su licencia.', (SELECT id_user FROM usuario WHERE correo = 'martin.espinoza@example.com')),
('Alejandra está interesada en aprender a conducir para viajes.', (SELECT id_user FROM usuario WHERE correo = 'alejandra.tapia@example.com')),
('Miguel busca mejorar sus habilidades de conducción nocturna.', (SELECT id_user FROM usuario WHERE correo = 'miguel.suarez@example.com'));

CREATE TABLE profesor(
    id_prof INT AUTO_INCREMENT,
    experiencia int(11) DEFAULT 0,
    clases_ejercidas INT,
    licencia VARCHAR(255), /* documentos */
    cedula VARCHAR(255), /* documentos */ 
    hojaDeVida VARCHAR(255), /* documentos */
    capacitacion VARCHAR(255), /* documentos */
    semep VARCHAR(255), /* documentos */
    descripcion_prof TEXT, /* Descripcion del profesor (titulos, experiencia, pasado, etc) */
    descripcion_clase TEXT, /* Metodos de enseñanza, Tiempos, Control sobre las situaciones, etc */
    aprobado INT,
    fk_usuario_id INT,

    PRIMARY KEY (id_prof),
    FOREIGN KEY (fk_usuario_id) REFERENCES USUARIO(id_user)
);


-- Inserts para 15 profesores con la columna 'experiencia' añadida
INSERT INTO profesor (experiencia, clases_ejercidas, licencia, cedula, hojaDeVida, capacitacion, semep, descripcion_prof, descripcion_clase, aprobado, fk_usuario_id)
VALUES 
(10, 120, 'licencia_carlos.pdf', 'cedula_carlos.pdf', 'hojadevida_carlos.pdf', 'capacitacion_carlos.pdf', 'semep_carlos.pdf', 'Carlos tiene 10 años de experiencia en la enseñanza de conducción.', 'Método de enseñanza interactivo y práctico.', 2, (SELECT id_user FROM usuario WHERE correo = 'carlos.martinez@example.com')),
(15, 98, 'licencia_lucia.pdf', 'cedula_lucia.pdf', 'hojadevida_lucia.pdf', 'capacitacion_lucia.pdf', 'semep_lucia.pdf', 'Lucía es experta en técnicas avanzadas de conducción.', 'Enseñanza centrada en el estudiante y en situaciones reales de tráfico.', 2, (SELECT id_user FROM usuario WHERE correo = 'lucia.fernandez@example.com')),
(20, 75, 'licencia_jose.pdf', 'cedula_jose.pdf', 'hojadevida_jose.pdf', 'capacitacion_jose.pdf', 'semep_jose.pdf', 'José ha trabajado como instructor de conducción durante 15 años.', 'Técnicas avanzadas de conducción defensiva y seguridad vial.', 2, (SELECT id_user FROM usuario WHERE correo = 'jose.lopez@example.com')),
(8, 85, 'licencia_marta.pdf', 'cedula_marta.pdf', 'hojadevida_marta.pdf', 'capacitacion_marta.pdf', 'semep_marta.pdf', 'Marta tiene una sólida formación en psicología del tráfico.', 'Adaptación de métodos de enseñanza según el perfil del alumno.', 2, (SELECT id_user FROM usuario WHERE correo = 'marta.ramirez@example.com')),
(12, 110, 'licencia_raul.pdf', 'cedula_raul.pdf', 'hojadevida_raul.pdf', 'capacitacion_raul.pdf', 'semep_raul.pdf', 'Raúl es un experto en conducción segura en condiciones adversas.', 'Enseñanza práctica con simulaciones de situaciones extremas.', 2, (SELECT id_user FROM usuario WHERE correo = 'raul.sanchez@example.com')),
(5, 92, 'licencia_andrea.pdf', 'cedula_andrea.pdf', 'hojadevida_andrea.pdf', 'capacitacion_andrea.pdf', 'semep_andrea.pdf', 'Andrea tiene una especialización en la enseñanza de conductores principiantes.', 'Metodología estructurada para aprendizaje progresivo.', 2, (SELECT id_user FROM usuario WHERE correo = 'andrea.mendez@example.com')),
(18, 130, 'licencia_pablo.pdf', 'cedula_pablo.pdf', 'hojadevida_pablo.pdf', 'capacitacion_pablo.pdf', 'semep_pablo.pdf', 'Pablo ha trabajado en la formación de conductores comerciales.', 'Enseñanza enfocada en la conducción profesional y manejo de vehículos pesados.', 2, (SELECT id_user FROM usuario WHERE correo = 'pablo.torres@example.com')),
(25, 115, 'licencia_gloria.pdf', 'cedula_gloria.pdf', 'hojadevida_gloria.pdf', 'capacitacion_gloria.pdf', 'semep_gloria.pdf', 'Gloria es una instructora con experiencia en conducción ecológica.', 'Técnicas de conducción eficiente y sostenible.', 2, (SELECT id_user FROM usuario WHERE correo = 'gloria.pacheco@example.com')),
(22, 105, 'licencia_mario.pdf', 'cedula_mario.pdf', 'hojadevida_mario.pdf', 'capacitacion_mario.pdf', 'semep_mario.pdf', 'Mario es especialista en formación de conductores de alto rendimiento.', 'Técnicas avanzadas de conducción deportiva y de precisión.', 2, (SELECT id_user FROM usuario WHERE correo = 'mario.diaz@example.com')),
(14, 100, 'licencia_carmen.pdf', 'cedula_carmen.pdf', 'hojadevida_carmen.pdf', 'capacitacion_carmen.pdf', 'semep_carmen.pdf', 'Carmen tiene una amplia experiencia en enseñanza de conducción en ciudades.', 'Metodología centrada en la conducción en tráfico denso y urbano.', 2, (SELECT id_user FROM usuario WHERE correo = 'carmen.castro@example.com')),
(11, 120, 'licencia_alfonso.pdf', 'cedula_alfonso.pdf', 'hojadevida_alfonso.pdf', 'capacitacion_alfonso.pdf', 'semep_alfonso.pdf', 'Alfonso ha trabajado en la formación de conductores militares.', 'Enseñanza enfocada en técnicas de conducción en situaciones de riesgo.', 2, (SELECT id_user FROM usuario WHERE correo = 'alfonso.vega@example.com')),
(7, 90, 'licencia_elena.pdf', 'cedula_elena.pdf', 'hojadevida_elena.pdf', 'capacitacion_elena.pdf', 'semep_elena.pdf', 'Elena tiene amplia experiencia en conducción para personas con discapacidades.', 'Métodos de enseñanza adaptados a las necesidades individuales.', 2, (SELECT id_user FROM usuario WHERE correo = 'elena.gomez@example.com')),
(9, 88, 'licencia_ramon.pdf', 'cedula_ramon.pdf', 'hojadevida_ramon.pdf', 'capacitacion_ramon.pdf', 'semep_ramon.pdf', 'Ramón se especializa en técnicas de conducción para jóvenes.', 'Enseñanza dinámica y centrada en la práctica.', 2, (SELECT id_user FROM usuario WHERE correo = 'ramon.castillo@example.com')),
(16, 97, 'licencia_silvia.pdf', 'cedula_silvia.pdf', 'hojadevida_silvia.pdf', 'capacitacion_silvia.pdf', 'semep_silvia.pdf', 'Silvia tiene una gran experiencia en conducción defensiva y segura.', 'Métodos de enseñanza orientados a la prevención de accidentes.', 2, (SELECT id_user FROM usuario WHERE correo = 'silvia.ortega@example.com')),
(6, 85, 'licencia_gonzalo.pdf', 'cedula_gonzalo.pdf', 'hojadevida_gonzalo.pdf', 'capacitacion_gonzalo.pdf', 'semep_gonzalo.pdf', 'Gonzalo ha trabajado en la enseñanza de conducción en áreas rurales.', 'Enseñanza orientada a la conducción en terrenos difíciles y accidentados.', 2, (SELECT id_user FROM usuario WHERE correo = 'gonzalo.romero@example.com'));



CREATE TABLE vehiculo(
    id_auto INT AUTO_INCREMENT,
    patente VARCHAR(10) UNIQUE, /* Ejemplo HB-2F-69 */
    transmision VARCHAR(20), /* Mecanico, Automático o Mecanico/Automatico */
    combustible VARCHAR(20), /* Gasolina, Petroleo o Electrico */
    personas INT, /* Cantidad de personas que puede transportar el vehiculo */
    modelo VARCHAR(30), /* Modelo de auto */
    ano INT, /* Año del vehiculo */
    doble_comando BIT,
    imagen_auto VARCHAR(255) DEFAULT 'autoDibujo.png',
    fk_profesor_id INT,
    estado_auto BIT,


    PRIMARY KEY (id_auto),
    FOREIGN KEY (fk_profesor_id) REFERENCES profesor(id_prof)
);

-- Inserts para vehículos asociados a cada profesor
INSERT INTO vehiculo (patente, trasmision, combustible, personas, modelo, ano, doble_comando, fk_profesor_id, estado_auto)
VALUES 
('HB-2F-69', 'Mecánico', 'Gasolina', 5, 'Toyota Corolla', 2018, 1, 1, 1),
('JK-3G-71', 'Automático', 'Gasolina', 4, 'Honda Civic', 2019, 1, 2, 1),
('LM-4H-85', 'Mecánico', 'Petroleo', 5, 'Ford Focus', 2017, 1, 3, 1),
('NO-5J-96', 'Automático', 'Gasolina', 4, 'Mazda 3', 2020, 1, 4, 1),
('PQ-6K-22', 'Mecánico', 'Gasolina', 5, 'Chevrolet Cruze', 2016, 1, 5, 1),
('RS-7L-33', 'Automático', 'Electrico', 4, 'Nissan Leaf', 2021, 1, 6, 1),
('TU-8M-44', 'Mecánico', 'Gasolina', 5, 'Volkswagen Golf', 2015, 1, 7, 1),
('VW-9N-55', 'Mecánico/Automático', 'Gasolina', 4, 'Kia Rio', 2018, 1, 8, 1),
('XY-1P-66', 'Mecánico', 'Petroleo', 5, 'Renault Clio', 2014, 1, 9, 1),
('ZA-2Q-77', 'Automático', 'Gasolina', 4, 'Hyundai Elantra', 2022, 1, 10, 1),
('BC-3R-88', 'Mecánico', 'Petroleo', 5, 'Subaru Impreza', 2017, 1, 11, 1),
('DE-4S-99', 'Mecánico/Automático', 'Electrico', 4, 'Tesla Model 3', 2020, 1, 12, 1),
('FG-5T-11', 'Mecánico', 'Gasolina', 5, 'Peugeot 308', 2016, 1, 13, 1),
('HI-6U-22', 'Automático', 'Gasolina', 4, 'Audi A3', 2019, 1,14, 1),
('JK-7V-33', 'Mecánico', 'Petroleo', 5, 'Mitsubishi Lancer', 2015, 1, 15, 1);

CREATE TABLE solicitud_alumno(
    id_solicitud INT AUTO_INCREMENT,
    fk_alumno_id INT,
    fk_profesor_id INT,
    estado_solicitud VARCHAR(20), /* Aceptado o Rechazado */
    respuesta VARCHAR(500),
    estado_clase VARCHAR(20) DEFAULT 'Teórico', /* Teórico, Práctica, Finalizado y Calificado */
    tipo_clase VARCHAR(20),/* Clase Normal o  Clase Extra */

    PRIMARY KEY (id_solicitud),
    FOREIGN KEY (fk_alumno_id) REFERENCES alumno(id_alum),
    FOREIGN KEY (fk_profesor_id) REFERENCES profesor(id_prof)
);

-- Inserts para la tabla solicitud_alumno y la tabla pagos
INSERT INTO solicitud_alumno (fk_alumno_id, fk_profesor_id, estado_solicitud, respuesta, estado_clase, tipo_clase)
VALUES 
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Práctico', 'Clase Normal'),
((SELECT id_alum FROM alumno ORDER BY RAND() LIMIT 1), (SELECT id_prof FROM profesor ORDER BY RAND() LIMIT 1), 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Teórico', 'Clase Normal');


INSERT INTO solicitud_alumno (fk_alumno_id, fk_profesor_id, estado_solicitud, respuesta, estado_clase, tipo_clase)
VALUES 
(3, 2, 'Aceptado', 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases.', 'Teórico', 'Clase Normal');

INSERT INTO pagos (solicitud_alumno_fk_id, monto, fecha_pago, estado_pago)
VALUES 
(26, 180000, NOW(), 'Pagado');

INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 1.1', 'Finalizada', '2024-09-01 10:00:00', '2024-09-01 11:00:00', 'Introducción a la conducción.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.2', 'Finalizada', '2024-09-02 10:00:00', '2024-09-02 11:00:00', 'Reglas de tránsito.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.3', 'Finalizada', '2024-09-03 10:00:00', '2024-09-03 11:00:00', 'Manejo defensivo.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.4', 'Finalizada', '2024-09-04 10:00:00', '2024-09-04 11:00:00', 'Señales de tránsito.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.5', 'Finalizada', '2024-09-05 10:00:00', '2024-09-05 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.6', 'Finalizada', '2024-09-06 10:00:00', '2024-09-06 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.7', 'Finalizada', '2024-09-07 10:00:00', '2024-09-07 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.8', 'Finalizada', '2024-09-08 10:00:00', '2024-09-08 11:00:00', 'Conducción en noche.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.9', 'Finalizada', '2024-09-09 10:00:00', '2024-09-09 11:00:00', 'Conducción en autopistas.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.10', 'Finalizada', '2024-09-10 10:00:00', '2024-09-10 11:00:00', 'Cierre de la formación.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.11', 'Finalizada', '2024-09-11 10:00:00', '2024-09-11 11:00:00', 'Evaluación final.', '#00ff88', 2, 3, 26),
('Clase Teórica 1.12', 'Ocupado', '2024-09-12 10:00:00', '2024-09-12 11:00:00', 'Entregas de certificados.', '#00ff88', 2, 3, 26); 

CREATE TABLE pagos(
    id_pago INT AUTO_INCREMENT,
    solicitud_alumno_fk_id INT,
    monto INT, /* 180.000 para el curso completo, 24.000 para una solicitud de clase extra */
    fecha_pago DATETIME,
    estado_pago VARCHAR(20) DEFAULT 'Pendiente',/* Pendiente y Pagado */
    
    PRIMARY KEY (id_pago),
    FOREIGN KEY (solicitud_alumno_fk_id) REFERENCES solicitud_alumno(id_solicitud)
);

INSERT INTO pagos (solicitud_alumno_fk_id, monto, fecha_pago, estado_pago)
VALUES 
(1, 180000, NOW(), 'Pagado'),
(2, 180000, NOW(), 'Pagado'),
(3, 180000, NOW(), 'Pagado'),
(4, 180000, NOW(), 'Pagado'),
(5, 180000, NOW(), 'Pagado'),
(6, 180000, NOW(), 'Pagado'),
(7, 180000, NOW(), 'Pagado'),
(8, 180000, NOW(), 'Pagado'),
(9, 180000, NOW(), 'Pagado'),
(10, 180000, NOW(), 'Pagado');




CREATE TABLE clase_teorica(
    id_clase_teorica INT AUTO_INCREMENT,
    titulo_teorica VARCHAR(100),
    estado VARCHAR(30) DEFAULT "Disponible", /* Disponible, Ocupado, Finalizada, Cancelada */
    comienzo DATETIME, /* Una hora de diferencia con la hora termino */
    termino DATETIME, /* Una hora de diferencia con la hora comienzo */
    descripcion_clase VARCHAR(700), /* Descripcion de lo que se va a realizar durante la clase */
    color VARCHAR(300),/* Para una clase con estado disponible el color es: #53beec, Para una clase con estado  Finalizada: #00ff88, Para una clase con estado Ocupado #d9a50b Para una clase con estado Cancelada el color es: #e61919*/
    observacion_profe TEXT,/* Comentarios del profesor hacia el alumno */
    observacion_alumno TEXT,/* Observaciones del alumno para la siguiente clase*/
    fk_profesor_id INT,
    fk_alumno_id INT,
    fk_solicitud_id INT,

    PRIMARY KEY(id_clase_teorica),
    FOREIGN KEY (fk_profesor_id) REFERENCES profesor(id_prof),
    FOREIGN KEY (fk_alumno_id) REFERENCES alumno(id_alum),
    FOREIGN KEY (fk_solicitud_id) REFERENCES solicitud_alumno(id_solicitud)
);



-- Clases para la primera solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 1.1', 'Finalizada', '2024-05-01 10:00:00', '2024-05-01 11:00:00', 'Introducción a la conducción.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.2', 'Finalizada', '2024-05-02 10:00:00', '2024-05-02 11:00:00', 'Reglas de tránsito.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.3', 'Finalizada', '2024-05-03 10:00:00', '2024-05-03 11:00:00', 'Manejo defensivo.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.4', 'Finalizada', '2024-05-04 10:00:00', '2024-05-04 11:00:00', 'Señales de tránsito.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.5', 'Finalizada', '2024-05-05 10:00:00', '2024-05-05 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.6', 'Finalizada', '2024-05-06 10:00:00', '2024-05-06 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.7', 'Finalizada', '2024-05-07 10:00:00', '2024-05-07 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.8', 'Finalizada', '2024-05-08 10:00:00', '2024-05-08 11:00:00', 'Conducción en noche.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.9', 'Finalizada', '2024-05-09 10:00:00', '2024-05-09 11:00:00', 'Conducción en autopistas.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.10', 'Finalizada', '2024-05-10 10:00:00', '2024-05-10 11:00:00', 'Cierre de la formación.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.11', 'Finalizada', '2024-05-11 10:00:00', '2024-05-11 11:00:00', 'Evaluación final.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.12', 'Finalizada', '2024-05-12 10:00:00', '2024-05-12 11:00:00', 'Entregas de certificados.', '#00ff88', 3, 2, 26);



/* ('Clase Teórica 1.1', 'Finalizada', '2024-05-01 10:00:00', '2024-05-01 11:00:00', 'Introducción a la conducción.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.2', 'Finalizada', '2024-05-02 10:00:00', '2024-05-02 11:00:00', 'Reglas de tránsito.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.3', 'Finalizada', '2024-05-03 10:00:00', '2024-05-03 11:00:00', 'Manejo defensivo.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.4', 'Finalizada', '2024-05-04 10:00:00', '2024-05-04 11:00:00', 'Señales de tránsito.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.5', 'Finalizada', '2024-05-05 10:00:00', '2024-05-05 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.6', 'Finalizada', '2024-05-06 10:00:00', '2024-05-06 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.7', 'Finalizada', '2024-05-07 10:00:00', '2024-05-07 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.8', 'Finalizada', '2024-05-08 10:00:00', '2024-05-08 11:00:00', 'Conducción en noche.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.9', 'Finalizada', '2024-05-09 10:00:00', '2024-05-09 11:00:00', 'Conducción en autopistas.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.10', 'Finalizada', '2024-05-10 10:00:00', '2024-05-10 11:00:00', 'Cierre de la formación.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.11', 'Finalizada', '2024-05-11 10:00:00', '2024-05-11 11:00:00', 'Evaluación final.', '#00ff88', 3, 2, 26),
('Clase Teórica 1.12', 'Finalizada', '2024-05-12 10:00:00', '2024-05-12 11:00:00', 'Entregas de certificados.', '#00ff88', 3, 2, 26); */

-- Clases para la segunda solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 2.1', 'Finalizada', '2024-05-13 10:00:00', '2024-05-13 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.2', 'Finalizada', '2024-05-14 10:00:00', '2024-05-14 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.3', 'Finalizada', '2024-05-15 10:00:00', '2024-05-15 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.4', 'Finalizada', '2024-05-16 10:00:00', '2024-05-16 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.5', 'Finalizada', '2024-05-17 10:00:00', '2024-05-17 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.6', 'Finalizada', '2024-05-18 10:00:00', '2024-05-18 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.7', 'Finalizada', '2024-05-19 10:00:00', '2024-05-19 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.8', 'Finalizada', '2024-05-20 10:00:00', '2024-05-20 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.9', 'Finalizada', '2024-05-21 10:00:00', '2024-05-21 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.10', 'Finalizada', '2024-05-22 10:00:00', '2024-05-22 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.11', 'Finalizada', '2024-05-23 10:00:00', '2024-05-23 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Teórica 2.12', 'Finalizada', '2024-05-24 10:00:00', '2024-05-24 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2);

-- Clases para la tercera solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 3.1', 'Finalizada', '2024-05-25 10:00:00', '2024-05-25 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.2', 'Finalizada', '2024-05-26 10:00:00', '2024-05-26 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.3', 'Finalizada', '2024-05-27 10:00:00', '2024-05-27 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.4', 'Finalizada', '2024-05-28 10:00:00', '2024-05-28 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.5', 'Finalizada', '2024-05-29 10:00:00', '2024-05-29 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.6', 'Finalizada', '2024-05-30 10:00:00', '2024-05-30 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.7', 'Finalizada', '2024-05-31 10:00:00', '2024-05-31 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.8', 'Finalizada', '2024-06-01 10:00:00', '2024-06-01 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.9', 'Finalizada', '2024-06-02 10:00:00', '2024-06-02 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.10', 'Finalizada', '2024-06-03 10:00:00', '2024-06-03 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.11', 'Finalizada', '2024-06-04 10:00:00', '2024-06-04 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Teórica 3.12', 'Finalizada', '2024-06-05 10:00:00', '2024-06-05 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3);

-- Clases para la cuarta solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 4.1', 'Finalizada', '2024-06-06 10:00:00', '2024-06-06 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.2', 'Finalizada', '2024-06-07 10:00:00', '2024-06-07 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.3', 'Finalizada', '2024-06-08 10:00:00', '2024-06-08 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.4', 'Finalizada', '2024-06-09 10:00:00', '2024-06-09 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.5', 'Finalizada', '2024-06-10 10:00:00', '2024-06-10 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.6', 'Finalizada', '2024-06-11 10:00:00', '2024-06-11 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.7', 'Finalizada', '2024-06-12 10:00:00', '2024-06-12 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.8', 'Finalizada', '2024-06-13 10:00:00', '2024-06-13 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.9', 'Finalizada', '2024-06-14 10:00:00', '2024-06-14 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.10', 'Finalizada', '2024-06-15 10:00:00', '2024-06-15 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.11', 'Finalizada', '2024-06-16 10:00:00', '2024-06-16 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Teórica 4.12', 'Finalizada', '2024-06-17 10:00:00', '2024-06-17 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4);

-- Clases para la quinta solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 5.1', 'Finalizada', '2024-06-18 10:00:00', '2024-06-18 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.2', 'Finalizada', '2024-06-19 10:00:00', '2024-06-19 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.3', 'Finalizada', '2024-06-20 10:00:00', '2024-06-20 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.4', 'Finalizada', '2024-06-21 10:00:00', '2024-06-21 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.5', 'Finalizada', '2024-06-22 10:00:00', '2024-06-22 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.6', 'Finalizada', '2024-06-23 10:00:00', '2024-06-23 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.7', 'Finalizada', '2024-06-24 10:00:00', '2024-06-24 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.8', 'Finalizada', '2024-06-25 10:00:00', '2024-06-25 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.9', 'Finalizada', '2024-06-26 10:00:00', '2024-06-26 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.10', 'Finalizada', '2024-06-27 10:00:00', '2024-06-27 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.11', 'Finalizada', '2024-06-28 10:00:00', '2024-06-28 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Teórica 5.12', 'Finalizada', '2024-06-29 10:00:00', '2024-06-29 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5);

-- Clases para la sexta solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 6.1', 'Finalizada', '2024-06-30 10:00:00', '2024-06-30 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.2', 'Finalizada', '2024-07-01 10:00:00', '2024-07-01 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.3', 'Finalizada', '2024-07-02 10:00:00', '2024-07-02 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.4', 'Finalizada', '2024-07-03 10:00:00', '2024-07-03 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.5', 'Finalizada', '2024-07-04 10:00:00', '2024-07-04 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.6', 'Finalizada', '2024-07-05 10:00:00', '2024-07-05 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.7', 'Finalizada', '2024-07-06 10:00:00', '2024-07-06 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.8', 'Finalizada', '2024-07-07 10:00:00', '2024-07-07 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.9', 'Finalizada', '2024-07-08 10:00:00', '2024-07-08 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.10', 'Finalizada', '2024-07-09 10:00:00', '2024-07-09 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.11', 'Finalizada', '2024-07-10 10:00:00', '2024-07-10 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Teórica 6.12', 'Finalizada', '2024-07-11 10:00:00', '2024-07-11 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6);

-- Clases para la séptima solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 7.1', 'Finalizada', '2024-07-12 10:00:00', '2024-07-12 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.2', 'Finalizada', '2024-07-13 10:00:00', '2024-07-13 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.3', 'Finalizada', '2024-07-14 10:00:00', '2024-07-14 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.4', 'Finalizada', '2024-07-15 10:00:00', '2024-07-15 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.5', 'Finalizada', '2024-07-16 10:00:00', '2024-07-16 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.6', 'Finalizada', '2024-07-17 10:00:00', '2024-07-17 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.7', 'Finalizada', '2024-07-18 10:00:00', '2024-07-18 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.8', 'Finalizada', '2024-07-19 10:00:00', '2024-07-19 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.9', 'Finalizada', '2024-07-20 10:00:00', '2024-20-07 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.10', 'Finalizada', '2024-07-21 10:00:00', '2024-07-21 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.11', 'Finalizada', '2024-07-22 10:00:00', '2024-07-22 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Teórica 7.12', 'Finalizada', '2024-07-23 10:00:00', '2024-07-23 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7);

-- Clases para la octava solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 8.1', 'Finalizada', '2024-07-24 10:00:00', '2024-07-24 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.2', 'Finalizada', '2024-07-25 10:00:00', '2024-07-25 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.3', 'Finalizada', '2024-07-26 10:00:00', '2024-07-26 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.4', 'Finalizada', '2024-07-27 10:00:00', '2024-07-27 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.5', 'Finalizada', '2024-07-28 10:00:00', '2024-07-28 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.6', 'Finalizada', '2024-07-29 10:00:00', '2024-07-29 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.7', 'Finalizada', '2024-07-30 10:00:00', '2024-07-30 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.8', 'Finalizada', '2024-07-31 10:00:00', '2024-07-31 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.9', 'Finalizada', '2024-08-01 10:00:00', '2024-08-01 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.10', 'Finalizada', '2024-08-02 10:00:00', '2024-08-02 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.11', 'Finalizada', '2024-08-03 10:00:00', '2024-08-03 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Teórica 8.12', 'Finalizada', '2024-08-04 10:00:00', '2024-08-04 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8);

-- Clases para la novena solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 9.1', 'Finalizada', '2024-08-05 10:00:00', '2024-08-05 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.2', 'Finalizada', '2024-08-06 10:00:00', '2024-08-06 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.3', 'Finalizada', '2024-08-07 10:00:00', '2024-08-07 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.4', 'Finalizada', '2024-08-08 10:00:00', '2024-08-08 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.5', 'Finalizada', '2024-08-09 10:00:00', '2024-08-09 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.6', 'Finalizada', '2024-08-10 10:00:00', '2024-08-10 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.7', 'Finalizada', '2024-08-11 10:00:00', '2024-08-11 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.8', 'Finalizada', '2024-08-12 10:00:00', '2024-08-12 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.9', 'Finalizada', '2024-08-13 10:00:00', '2024-08-13 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.10', 'Finalizada', '2024-08-14 10:00:00', '2024-08-14 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.11', 'Finalizada', '2024-08-15 10:00:00', '2024-08-15 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Teórica 9.12', 'Finalizada', '2024-08-16 10:00:00', '2024-08-16 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9);

-- Clases para la décima solicitud
INSERT INTO clase_teorica (titulo_teorica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Teórica 10.1', 'Finalizada', '2024-08-17 10:00:00', '2024-08-17 11:00:00', 'Introducción a la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.2', 'Finalizada', '2024-08-18 10:00:00', '2024-08-18 11:00:00', 'Reglas de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.3', 'Finalizada', '2024-08-19 10:00:00', '2024-08-19 11:00:00', 'Manejo defensivo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.4', 'Finalizada', '2024-08-20 10:00:00', '2024-08-20 11:00:00', 'Señales de tránsito.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.5', 'Finalizada', '2024-08-21 10:00:00', '2024-08-21 11:00:00', 'Mantenimiento del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.6', 'Finalizada', '2024-08-22 10:00:00', '2024-08-22 11:00:00', 'Conducción en diferentes condiciones climáticas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.7', 'Finalizada', '2024-08-23 10:00:00', '2024-08-23 11:00:00', 'Gestión del estrés en la conducción.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.8', 'Finalizada', '2024-08-24 10:00:00', '2024-08-24 11:00:00', 'Conducción en noche.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.9', 'Finalizada', '2024-08-25 10:00:00', '2024-08-25 11:00:00', 'Conducción en autopistas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.10', 'Finalizada', '2024-08-26 10:00:00', '2024-08-26 11:00:00', 'Cierre de la formación.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.11', 'Finalizada', '2024-08-27 10:00:00', '2024-08-27 11:00:00', 'Evaluación final.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Teórica 10.12', 'Finalizada', '2024-08-28 10:00:00', '2024-08-28 11:00:00', 'Entregas de certificados.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10);




CREATE TABLE clase_practica(
    id_clase_practica INT AUTO_INCREMENT,
    titulo_practica VARCHAR(100),
    estado VARCHAR(30) DEFAULT "Disponible", /* Disponible, Ocupado, Finalizada, Cancelada */
    comienzo DATETIME, /* Una hora de diferencia con la hora termino */
    termino DATETIME, /* Una hora de diferencia con la hora comienzo */
    descripcion_clase VARCHAR(700), /* Descripcion de lo que se va a realizar durante la clase */
    color VARCHAR(300), /* Para una clase con estado disponible el color es: #53beec, Para una clase con estado  Finalizada: #00ff88, Para una clase con estado Ocupado #d9a50b Para una clase con estado Cancelada el color es: #e61919*/
    observacion_profe TEXT, /* Comentarios del profesor hacia el alumno */
    observacion_alumno TEXT, /* Observaciones del alumno para la siguiente clase*/
    fk_profesor_id INT,
    fk_vehiculo_id INT,
    fk_alumno_id INT,
    fk_solicitud_id INT,

    PRIMARY KEY(id_clase_practica),
    FOREIGN KEY (fk_profesor_id) REFERENCES profesor(id_prof),
    FOREIGN KEY (fk_vehiculo_id) REFERENCES vehiculo(id_auto),
    FOREIGN KEY (fk_alumno_id) REFERENCES alumno(id_alum),
    FOREIGN KEY (fk_solicitud_id) REFERENCES solicitud_alumno(id_solicitud)

);

UPDATE `clase_practica` SET `fk_vehiculo_id` = '7' WHERE `fk_profesor_id` = 7;


-- Clases para la primera solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 1.1', 'Finalizada', '2024-05-01 10:00:00', '2024-05-01 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.2', 'Finalizada', '2024-05-02 10:00:00', '2024-05-02 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.3', 'Finalizada', '2024-05-03 10:00:00', '2024-05-03 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.4', 'Finalizada', '2024-05-04 10:00:00', '2024-05-04 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.5', 'Finalizada', '2024-05-05 10:00:00', '2024-05-05 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.6', 'Finalizada', '2024-05-06 10:00:00', '2024-05-06 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.7', 'Finalizada', '2024-05-07 10:00:00', '2024-05-07 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.8', 'Finalizada', '2024-05-08 10:00:00', '2024-05-08 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.9', 'Finalizada', '2024-05-09 10:00:00', '2024-05-09 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.10', 'Finalizada', '2024-05-10 10:00:00', '2024-05-10 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.11', 'Finalizada', '2024-05-11 10:00:00', '2024-05-11 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1),
('Clase Práctica 1.12', 'Finalizada', '2024-05-12 10:00:00', '2024-05-12 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 1), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 1), 1);

-- Clases para la segunda solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 2.1', 'Finalizada', '2024-05-13 10:00:00', '2024-05-13 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.2', 'Finalizada', '2024-05-14 10:00:00', '2024-05-14 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.3', 'Finalizada', '2024-05-15 10:00:00', '2024-05-15 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.4', 'Finalizada', '2024-05-16 10:00:00', '2024-05-16 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.5', 'Finalizada', '2024-05-17 10:00:00', '2024-05-17 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.6', 'Finalizada', '2024-05-18 10:00:00', '2024-05-18 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.7', 'Finalizada', '2024-05-19 10:00:00', '2024-05-19 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.8', 'Finalizada', '2024-05-20 10:00:00', '2024-05-20 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.9', 'Finalizada', '2024-05-21 10:00:00', '2024-05-21 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.10', 'Finalizada', '2024-05-22 10:00:00', '2024-05-22 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.11', 'Finalizada', '2024-05-23 10:00:00', '2024-05-23 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2),
('Clase Práctica 2.12', 'Finalizada', '2024-05-24 10:00:00', '2024-05-24 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 2), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 2), 2);

-- Clases para la tercera solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 3.1', 'Finalizada', '2024-05-25 10:00:00', '2024-05-25 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.2', 'Finalizada', '2024-05-26 10:00:00', '2024-05-26 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.3', 'Finalizada', '2024-05-27 10:00:00', '2024-05-27 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.4', 'Finalizada', '2024-05-28 10:00:00', '2024-05-28 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.5', 'Finalizada', '2024-05-29 10:00:00', '2024-05-29 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.6', 'Finalizada', '2024-05-30 10:00:00', '2024-05-30 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.7', 'Finalizada', '2024-05-31 10:00:00', '2024-05-31 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.8', 'Finalizada', '2024-06-01 10:00:00', '2024-06-01 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.9', 'Finalizada', '2024-06-02 10:00:00', '2024-06-02 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.10', 'Finalizada', '2024-06-03 10:00:00', '2024-06-03 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.11', 'Finalizada', '2024-06-04 10:00:00', '2024-06-04 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3),
('Clase Práctica 3.12', 'Finalizada', '2024-06-05 10:00:00', '2024-06-05 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 3), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 3), 3);

-- Clases para la cuarta solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 4.1', 'Finalizada', '2024-06-06 10:00:00', '2024-06-06 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.2', 'Finalizada', '2024-06-07 10:00:00', '2024-06-07 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.3', 'Finalizada', '2024-06-08 10:00:00', '2024-06-08 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.4', 'Finalizada', '2024-06-09 10:00:00', '2024-06-09 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.5', 'Finalizada', '2024-06-10 10:00:00', '2024-06-10 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.6', 'Finalizada', '2024-06-11 10:00:00', '2024-06-11 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.7', 'Finalizada', '2024-06-12 10:00:00', '2024-06-12 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.8', 'Finalizada', '2024-06-13 10:00:00', '2024-06-13 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.9', 'Finalizada', '2024-06-14 10:00:00', '2024-06-14 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.10', 'Finalizada', '2024-06-15 10:00:00', '2024-06-15 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.11', 'Finalizada', '2024-06-16 10:00:00', '2024-06-16 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4),
('Clase Práctica 4.12', 'Finalizada', '2024-06-17 10:00:00', '2024-06-17 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 4), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 4), 4);

-- Clases para la quinta solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 5.1', 'Finalizada', '2024-06-18 10:00:00', '2024-06-18 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.2', 'Finalizada', '2024-06-19 10:00:00', '2024-06-19 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.3', 'Finalizada', '2024-06-20 10:00:00', '2024-06-20 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.4', 'Finalizada', '2024-06-21 10:00:00', '2024-06-21 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.5', 'Finalizada', '2024-06-22 10:00:00', '2024-06-22 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.6', 'Finalizada', '2024-06-23 10:00:00', '2024-06-23 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.7', 'Finalizada', '2024-06-24 10:00:00', '2024-06-24 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.8', 'Finalizada', '2024-06-25 10:00:00', '2024-06-25 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.9', 'Finalizada', '2024-06-26 10:00:00', '2024-06-26 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.10', 'Finalizada', '2024-06-27 10:00:00', '2024-06-27 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.11', 'Finalizada', '2024-06-28 10:00:00', '2024-06-28 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5),
('Clase Práctica 5.12', 'Finalizada', '2024-06-29 10:00:00', '2024-06-29 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 5), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 5), 5);

-- Clases para la sexta solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 6.1', 'Finalizada', '2024-06-30 10:00:00', '2024-06-30 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.2', 'Finalizada', '2024-07-01 10:00:00', '2024-07-01 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.3', 'Finalizada', '2024-07-02 10:00:00', '2024-07-02 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.4', 'Finalizada', '2024-07-03 10:00:00', '2024-07-03 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.5', 'Finalizada', '2024-07-04 10:00:00', '2024-07-04 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.6', 'Finalizada', '2024-07-05 10:00:00', '2024-07-05 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.7', 'Finalizada', '2024-07-06 10:00:00', '2024-07-06 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.8', 'Finalizada', '2024-07-07 10:00:00', '2024-07-07 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.9', 'Finalizada', '2024-07-08 10:00:00', '2024-07-08 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.10', 'Finalizada', '2024-07-09 10:00:00', '2024-07-09 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.11', 'Finalizada', '2024-07-10 10:00:00', '2024-07-10 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6),
('Clase Práctica 6.12', 'Finalizada', '2024-07-11 10:00:00', '2024-07-11 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 6), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 6), 6);

-- Clases para la séptima solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 7.1', 'Finalizada', '2024-07-12 10:00:00', '2024-07-12 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.2', 'Finalizada', '2024-07-13 10:00:00', '2024-07-13 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.3', 'Finalizada', '2024-07-14 10:00:00', '2024-07-14 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.4', 'Finalizada', '2024-07-15 10:00:00', '2024-07-15 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.5', 'Finalizada', '2024-07-16 10:00:00', '2024-07-16 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.6', 'Finalizada', '2024-07-17 10:00:00', '2024-07-17 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.7', 'Finalizada', '2024-07-18 10:00:00', '2024-07-18 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.8', 'Finalizada', '2024-07-19 10:00:00', '2024-07-19 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.9', 'Finalizada', '2024-07-20 10:00:00', '2024-07-20 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.10', 'Finalizada', '2024-07-21 10:00:00', '2024-07-21 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.11', 'Finalizada', '2024-07-22 10:00:00', '2024-07-22 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7),
('Clase Práctica 7.12', 'Finalizada', '2024-07-23 10:00:00', '2024-07-23 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 7), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 7), 7);

-- Clases para la octava solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 8.1', 'Finalizada', '2024-07-24 10:00:00', '2024-07-24 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.2', 'Finalizada', '2024-07-25 10:00:00', '2024-07-25 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.3', 'Finalizada', '2024-07-26 10:00:00', '2024-07-26 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.4', 'Finalizada', '2024-07-27 10:00:00', '2024-07-27 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.5', 'Finalizada', '2024-07-28 10:00:00', '2024-07-28 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.6', 'Finalizada', '2024-07-29 10:00:00', '2024-07-29 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.7', 'Finalizada', '2024-07-30 10:00:00', '2024-07-30 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.8', 'Finalizada', '2024-07-31 10:00:00', '2024-07-31 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.9', 'Finalizada', '2024-08-01 10:00:00', '2024-08-01 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.10', 'Finalizada', '2024-08-02 10:00:00', '2024-08-02 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.11', 'Finalizada', '2024-08-03 10:00:00', '2024-08-03 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8),
('Clase Práctica 8.12', 'Finalizada', '2024-08-04 10:00:00', '2024-08-04 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 8), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 8), 8);

-- Clases para la novena solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 9.1', 'Finalizada', '2024-08-05 10:00:00', '2024-08-05 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.2', 'Finalizada', '2024-08-06 10:00:00', '2024-08-06 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.3', 'Finalizada', '2024-08-07 10:00:00', '2024-08-07 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.4', 'Finalizada', '2024-08-08 10:00:00', '2024-08-08 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.5', 'Finalizada', '2024-08-09 10:00:00', '2024-08-09 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.6', 'Finalizada', '2024-08-10 10:00:00', '2024-08-10 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.7', 'Finalizada', '2024-08-11 10:00:00', '2024-08-11 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.8', 'Finalizada', '2024-08-12 10:00:00', '2024-08-12 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.9', 'Finalizada', '2024-08-13 10:00:00', '2024-08-13 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.10', 'Finalizada', '2024-08-14 10:00:00', '2024-08-14 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.11', 'Finalizada', '2024-08-15 10:00:00', '2024-08-15 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9),
('Clase Práctica 9.12', 'Finalizada', '2024-08-16 10:00:00', '2024-08-16 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 9), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 9), 9);

-- Clases para la décima solicitud
INSERT INTO clase_practica (titulo_practica, estado, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id, fk_alumno_id, fk_solicitud_id)
VALUES 
('Clase Práctica 10.1', 'Finalizada', '2024-08-17 10:00:00', '2024-08-17 11:00:00', 'Manejo básico del vehículo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.2', 'Finalizada', '2024-08-18 10:00:00', '2024-08-18 11:00:00', 'Control de los espejos y asientos.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.3', 'Finalizada', '2024-08-19 10:00:00', '2024-08-19 11:00:00', 'Conducción en línea recta.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.4', 'Finalizada', '2024-08-20 10:00:00', '2024-08-20 11:00:00', 'Frenado y aceleración.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.5', 'Finalizada', '2024-08-21 10:00:00', '2024-08-21 11:00:00', 'Cambio de marcha.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.6', 'Finalizada', '2024-08-22 10:00:00', '2024-08-22 11:00:00', 'Conducción en curvas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.7', 'Finalizada', '2024-08-23 10:00:00', '2024-08-23 11:00:00', 'Estacionamiento paralelo.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.8', 'Finalizada', '2024-08-24 10:00:00', '2024-08-24 11:00:00', 'Manejo en tráfico.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.9', 'Finalizada', '2024-08-25 10:00:00', '2024-08-25 11:00:00', 'Conducción nocturna.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.10', 'Finalizada', '2024-08-26 10:00:00', '2024-08-26 11:00:00', 'Manejo en condiciones climáticas adversas.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.11', 'Finalizada', '2024-08-27 10:00:00', '2024-08-27 11:00:00', 'Conducción defensiva.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10),
('Clase Práctica 10.12', 'Finalizada', '2024-08-28 10:00:00', '2024-08-28 11:00:00', 'Evaluación final práctica.', '#00ff88', (SELECT fk_profesor_id FROM solicitud_alumno WHERE id_solicitud = 10), NULL, (SELECT fk_alumno_id FROM solicitud_alumno WHERE id_solicitud = 10), 10);

CREATE TABLE calificaciones_profesores(
    id_com INT AUTO_INCREMENT,
    valoracion FLOAT, /* Valoraciones de 1,2,3,4 y 5 */
    descripcion TEXT,/* Retroalimentacion de los alumnos segun su experiencia con el profesor */
    fk_alumno_id INT,
    fk_profesor_id INT,

    PRIMARY KEY(id_com),
    FOREIGN KEY (fk_alumno_id) REFERENCES alumno(id_alum),
    FOREIGN KEY (fk_profesor_id) REFERENCES profesor(id_prof)
);

INSERT INTO calificaciones_profesores (valoracion, descripcion, fk_alumno_id, fk_profesor_id)
VALUES 
(5.0, 'El profesor fue muy paciente y sus consejos me ayudaron a mejorar mis habilidades rápidamente. Recomendaría sus clases a cualquiera.', 21, 7),
(2.0, 'Gracias al enfoque del profesor, pude superar mi miedo a conducir. Explica todo de manera clara y sencilla.', 28, 12),
(3.0, 'Me impresionó la habilidad del profesor para enseñar técnicas avanzadas de conducción. Me siento mucho más confiado ahora.', 16, 4),
(1.0, 'El curso fue excelente. El profesor siempre estuvo disponible para responder preguntas y brindar apoyo adicional.', 4, 9),
(5.0, 'Tuve una experiencia muy positiva. El profesor adaptó las clases a mi ritmo de aprendizaje, lo cual fue genial.', 31, 3),
(4.0, 'El profesor tiene un enfoque muy profesional. Me ayudó a entender y aplicar conceptos clave para una conducción segura.', 12, 14),
(5.0, 'El profesor tiene un enfoque muy profesional. Me ayudó a entender y aplicar conceptos clave para una conducción segura.', 21, 11);




INSERT INTO super_admin VALUES(null,1);


INSERT INTO profesor VALUES(null,10,null,null,null,null,null,'Hola mundo',2,2);


INSERT INTO vehiculo VALUES(null, 'HH-HH-HH', 'Automatico', 'Electrico', 4, 'Honda Civic', 2022, 1, '../../Img/Imagenes-landing/car-3.jpg', 1)



/* INSERT INTO usuario VALUES(null,'Juan',987654321,NOW(),'juan@example.com','456',3,1);
INSERT INTO usuario VALUES(null,'Ana',555555555,NOW(),'ana@example.com','789',3,1);
INSERT INTO usuario VALUES(null,'Carlos',333333333,NOW(),'carlos@example.com','abc',3,2);
INSERT INTO usuario VALUES(null,'Marta',444444444,NOW(),'marta@example.com','xyz',3,2);
INSERT INTO usuario VALUES(null,'Sofía',666666666,NOW(),'sofia@example.com','789',3,1);
INSERT INTO usuario VALUES(null,'Pedro',777777777,NOW(),'pedro@example.com','456',3,2);
INSERT INTO usuario VALUES(null,'Laura',999999999,NOW(),'laura@example.com','123',3,1);
INSERT INTO usuario VALUES(null,'Isabel',222222222,NOW(),'isabel@example.com','abc',3,1);
INSERT INTO usuario VALUES(null,'Antonio',111111111,NOW(),'antonio@example.com','xyz',3,1);
INSERT INTO usuario VALUES(null,'María',888888888,NOW(),'maria@example.com','123',3,2); */

/*
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
INSERT INTO alumno VALUES(null,'Medio',3);
*/

INSERT INTO vehiculo VALUES(null, 'HH-HH-HH', 'Automatico', 'Electrico', 4, 'Honda Civic', 2022, 1, '../../Img/Imagenes-landing/car-3.jpg', 1)



INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 1' , '2024-09-17 13:00:00', '2024-09-17 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 11' , '2024-09-18 13:00:00', '2024-09-18 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 12' , '2024-09-19 13:00:00', '2024-09-19 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 13' , '2024-09-20 13:00:00', '2024-09-20 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 2' , '2024-09-21 13:00:00', '2024-09-21 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 3' , '2024-09-22 13:00:00', '2024-09-22 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 4' , '2024-09-23 13:00:00', '2024-09-23 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 5' , '2024-09-24 13:00:00', '2024-09-24 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 6' , '2024-09-25 13:00:00', '2024-09-25 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 7' , '2024-09-26 13:00:00', '2024-09-26 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 8' , '2024-09-27 13:00:00', '2024-09-27 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 9' , '2024-09-28 13:00:00', '2024-09-28 13:00:00', 'Descripcion clase teórica', '#53beec', 1);
INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('Clase Teórica 10' , '2024-09-29 13:00:00', '2024-09-29 13:00:00', 'Descripcion clase teórica', '#53beec', 1);




INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 2' , '2024-10-07 13:00:00', '2024-10-07 13:32:14', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 1' , '2024-09-06 13:00:00', '2024-09-06 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 3' , '2024-09-08 13:00:00', '2024-09-08 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 4' , '2024-09-09 13:00:00', '2024-09-09 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 5' , '2024-09-10 13:00:00', '2024-09-10 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 6' , '2024-09-11 13:00:00', '2024-09-11 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 7' , '2024-09-12 13:00:00', '2024-09-12 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 8' , '2024-09-13 13:00:00', '2024-09-13 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 9' , '2024-09-14 13:00:00', '2024-09-14 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 10' , '2024-09-15 13:00:00', '2024-09-15 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 11' , '2024-09-16 13:00:00', '2024-09-16 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 12' , '2024-09-17 13:00:00', '2024-09-17 13:00:00', 'Descripcion clase practica', '#53beec', 65, 31);


INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 2' , '2024-10-07 13:00:00', '2024-10-07 13:32:14', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 1' , '2024-09-06 13:00:00', '2024-09-06 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 3' , '2024-09-08 13:00:00', '2024-09-08 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 4' , '2024-09-09 13:00:00', '2024-09-09 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 5' , '2024-09-10 13:00:00', '2024-09-10 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 6' , '2024-09-11 13:00:00', '2024-09-11 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 7' , '2024-09-12 13:00:00', '2024-09-12 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 8' , '2024-09-13 13:00:00', '2024-09-13 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 9' , '2024-09-14 13:00:00', '2024-09-14 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 10' , '2024-09-15 13:00:00', '2024-09-15 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 11' , '2024-09-16 13:00:00', '2024-09-16 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 12' , '2024-09-17 13:00:00', '2024-09-17 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);
INSERT INTO clase_practica (titulo_practica, comienzo, termino, descripcion_clase, color, fk_profesor_id, fk_vehiculo_id) VALUES ('Clase Practica 12' , '2024-09-27 13:00:00', '2024-09-27 13:00:00', 'Descripcion clase practica', '#53beec', 1, 31);




UPDATE clase_teorica SET estado = 'Finalizada' WHERE fk_solicitud_id = 12








---CREAR Alumno---

Alex Romero

958513102

Rancagua, Calle Serrano 92

rmaikol737@gmail.com

Pablo.123


---CREAR Profesor---

Jose Soto

938757332

Rancagua, Lourdes

5
smaikol763@gmail.com

Instructor de manejo con un enfoque práctico y realista para la enseñanza de la conducción. Con 5 años de experiencia, mi objetivo es preparar a los estudiantes no solo para aprobar el examen de conducción, sino para enfrentar cualquier desafío en la carretera con confianza. Soy conocido por mi paciencia y por la capacidad de explicar conceptos complejos de manera sencilla, lo que facilita el aprendizaje de mis alumnos.

Pablo.123


---Usuario  que ingresa el admin---

Mario Villar

938757372

Talcahuano

mario@gmail.com

Pablo.123


---Vehiculo---

Suzuki Celerio
2014
4
bencina
No cuenta con doble comando
Mecanico
GW-VB-70


---Acerca de Instructor---

Me enfoco en crear un ambiente de aprendizaje relajado y libre de estrés, donde los estudiantes pueden aprender a su propio ritmo. Utilizo herramientas digitales, como aplicaciones de seguimiento de progreso y videos explicativos, para complementar la enseñanza práctica. Mi prioridad es que cada alumno se sienta cómodo y confiado.


---CREAR CLASE TEORICA---

Principios de la conducción.
En esta primera clase se informará sobre lo básico de la conducción.


---CREAR CLASE PRACTICA---

Como preparar el vehículo antes de conducir.
Que se necesita tener seguro antes de comenzar con el recorrido del conductor.


---OBSERVACIÓN ALUMNO---

Quiero mejorar mi estacionamiento


---CONTACTANOS---

Problema con mi ultima clase
He tenido un problema con mi ultima clase ya que el profesor no se presentó 


--DATOS LISTOS--

--ADMIN--
superadmin@gmail.com
Admin.123

Profesor Con 2 Alumno (Teórico y Práctico - En Teorico mostra validacion de no poder pasarlo a practico sin tener 12 clases listas)
--MAIL
victoria@gmail.com
--PASS
hashedpassword


Alumno Practico a Finalizado (Luego el que calificara)
--MAIL
codenest.soporte@gmail.com
--PASS
hashedpassword


Alumon Teorico (Agentar 12 clases teniendo 11 Finalizadas - Tratar de agendar otra clase para mostrar validacion max. 12)
--MAIL
pedro@gmail.com
--PASS
hashedpassword