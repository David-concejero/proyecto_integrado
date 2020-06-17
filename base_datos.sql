drop database cine;
DROP USER 'usuario_cine'@'localhost';

create database cine;
use cine;

CREATE USER 'usuario_cine'@'localhost' IDENTIFIED BY 'Aabc123.';
GRANT ALL PRIVILEGES ON cine.* TO 'usuario_cine'@'localhost' IDENTIFIED BY 'Aabc123.';

CREATE TABLE USUARIOS (
    ID_USUARIO INT AUTO_INCREMENT,
    USUARIO varchar(255) NOT NULL,
    ROL varchar(255) NOT NULL,
    NOMBRE varchar(255) NOT NULL,
    APELLIDOS varchar(255) NOT NULL,
    DNI varchar(255) NOT NULL,
    EDAD INT NOT NULL,
    CORREO_ELECTRONICO varchar(255) NOT NULL,
    CONTRASEÑA varchar(255) NOT NULL,
    SEXO varchar(255) NOT NULL,
    PRIMARY KEY (ID_USUARIO)
);

/* PARA INSERTAR UN TRAILER LA URL DEBE TERMINAR EN EMBLED (youtube, compartir video, insertar (copiar esa url), EJ
https://www.youtube.com/embed/ECtK_IR4j5I
*/
CREATE TABLE PELICULAS (
    ID_PELICULA INT AUTO_INCREMENT,
    TITULO varchar(255) NOT NULL,
    AÑO INT NOT NULL,
    PAIS varchar(255) NOT NULL,
    GENERO varchar(255) NOT NULL,
    DURACION INT NOT NULL,
    CALIFICACION varchar(255) NOT NULL,
    FECHA_ESTRENO DATE NOT NULL,
    FOTO_PELICULA varchar(255) NOT NULL,
    SINOPSIS LONGTEXT NOT NULL,
    TRAILER varchar(255) NOT NULL, 
    PRIMARY KEY (ID_PELICULA)
);

CREATE TABLE SALAS (
    ID_SALA INT NOT NULL,
    NOMBRE_SALA varchar(255) NOT NULL,
    AFORO_MAXIMO INT NOT NULL,
    PRIMARY KEY (ID_SALA)
);

CREATE TABLE OPINIONES_PELICULAS (
    ID_PELICULA INT NOT NULL,
    ID_USUARIO INT NOT NULL,
    TITULO_RESEÑA varchar(255) NOT NULL,
    OPINION_MENSAJE varchar(255) NOT NULL,
    VALORACION INT NOT NULL,
    PRIMARY KEY (ID_PELICULA,ID_USUARIO),
    FOREIGN KEY (ID_PELICULA) REFERENCES PELICULAS(ID_PELICULA),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE TARIFAS (
    ID_TARIFA INT AUTO_INCREMENT,
    TIPO_TARIFA varchar(255) NOT NULL,
    PRECIO INT NOT NULL,
    DESCRIPCION varchar(255) NOT NULL,
    PRIMARY KEY (ID_TARIFA)
);

CREATE TABLE VENTA_ENTRADAS (
    ID_VENTA INT AUTO_INCREMENT,
    ID_PELICULA INT NOT NULL,
    ID_USUARIO INT NOT NULL,
    DIA DATE NOT NULL,
    HORA TIME NOT NULL,
    ID_SALA INT NOT NULL,
    ID_TARIFA INT NOT NULL,
    NUMERO_ENTRADAS INT NOT NULL,
    PRIMARY KEY (ID_VENTA),
    FOREIGN KEY (ID_PELICULA) REFERENCES PELICULAS(ID_PELICULA),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO),
    FOREIGN KEY (ID_TARIFA) REFERENCES TARIFAS(ID_TARIFA),
    FOREIGN KEY (ID_SALA) REFERENCES SALAS(ID_SALA)
);

CREATE TABLE CARTELERA (
    ID_PELICULA INT NOT NULL,
    ID_SALA INT NOT NULL,
    ID_TARIFA INT NOT NULL,
    DIA DATE NOT NULL,
    HORA TIME NOT NULL,
    PRIMARY KEY (ID_PELICULA,DIA,HORA,ID_SALA),
    FOREIGN KEY (ID_PELICULA) REFERENCES PELICULAS(ID_PELICULA),
    FOREIGN KEY (ID_SALA) REFERENCES SALAS(ID_SALA),
    FOREIGN KEY (ID_TARIFA) REFERENCES TARIFAS(ID_TARIFA)
);

    
/* INSERT PELICULAS */
    INSERT INTO PELICULAS VALUES (NULL,'Batman Begins',2005,'Estados Unidos','Thriller,Drama,Crimen',121,'+13','2020-03-16','batman_begins.png','Nueva adaptación del famoso cómic. Narra los orígenes de la leyenda de Batman y los motivos que lo convirtieron en el representante del Bien en la ciudad de Gotham. Bruce Wayne vive obsesionado con el recuerdo de sus padres, muertos a tiros en su presencia. Atormentado por el dolor, se va de Gotham y recorre el mundo hasta que encuentra a un extraño personaje que lo adiestra en todas las disciplinas físicas y mentales que le servirán para combatir el Mal.','https://www.youtube.com/embed/neY2xVmOfUM');
    INSERT INTO PELICULAS VALUES (NULL,'Joker',2019,'Estados Unidos','Acción,Crimen,Thriller',140,'+18','2020-03-16','joker.png','Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.','https://www.youtube.com/embed/ECtK_IR4j5I');
    INSERT INTO PELICULAS VALUES (NULL,'Parasitos',2019,'Corea del Sur','Intriga,Comedia,Thriller',132,'+16','2020-03-16','parasitos.png','Tanto Gi Taek (Song Kang-ho) como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo (Choi Woo-sik), empieza a dar clases particulares en casa de Park (Lee Seon-gyun), las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, comienzan una interrelación de resultados imprevisibles. ¿Podrás descubrir quién es el parásito en esta historia ambientada en la época actual?','https://www.youtube.com/embed/Z7SiFLgoFQM');

    INSERT INTO PELICULAS VALUES (NULL,'1917',2019,'Reino Unido','Bélico,Drama',119,'+12','2020-03-16','1917.png','En lo más crudo de la Primera Guerra Mundial, dos jóvenes soldados británicos, Schofield (George MacKay) y Blake (Dean-Charles Chapman) reciben una misión aparentemente imposible. En una carrera contrarreloj, deberán atravesar el territorio enemigo para entregar un mensaje que evitará un mortífero ataque contra cientos de soldados, entre ellos el propio hermano de Blake.','https://www.youtube.com/embed/SBc69RKIqwg');
    INSERT INTO PELICULAS VALUES (NULL,'Dolor y gloria',2019,'España','Drama,Drogas',108,'+16','2020-03-16','dolorygloria.png','Narra una serie de reencuentros en la vida de Salvador Mallo, un director de cine en su ocaso. Algunos de ellos físicos, y otros recordados, como su infancia en los años 60, cuando emigró con sus padres a Paterna, un pueblo de Valencia, en busca de prosperidad, así como el primer deseo, su primer amor adulto ya en el Madrid de los 80, el dolor de la ruptura de este amor cuando todavía estaba vivo y palpitante, la escritura como única terapia para olvidar lo inolvidable.','https://www.youtube.com/embed/4GMO3BgUIOk');
    INSERT INTO PELICULAS VALUES (NULL,'Érase una vez en... Hollywood',2019,'Estados Unidos','Thriller,Drama,Comedia',165,'+16','2020-03-16','eraseunavezenhollywood.png','Hollywood, años 60. La estrella de un western televisivo, Rick Dalton (DiCaprio), intenta amoldarse a los cambios del medio al mismo tiempo que su doble (Pitt). La vida de Dalton está ligada completamente a Hollywood, y es vecino de la joven y prometedora actriz y modelo Sharon Tate (Robbie) que acaba de casarse con el prestigioso director Roman Polanski. Descubre esta apasionante película de Quentin tarantino','https://www.youtube.com/embed/J0rFGJV3cYw');

    INSERT INTO PELICULAS VALUES (NULL,'Vengadores: Endgame',2019,'Estados Unidos','Fantástico,Acción,Superhéroes',181,'+7','2020-03-16','avenger_endgame.png','Después de los eventos devastadores de Avengers: Infinity War, el universo está en ruinas debido a las acciones de Thanos, el Titán Loco. Con la ayuda de los aliados que quedaron, los Vengadores deberán reunirse una vez más para intentar deshacer sus acciones y restaurar el orden en el universo de una vez por todas, sin importar cuáles son las consecuencias... Cuarta y última entrega de la saga "Vengadores".','https://www.youtube.com/embed/UQ3bqYKnyhM');
    INSERT INTO PELICULAS VALUES (NULL,'It. Capítulo 2',2019,'Estados Unidos','Terror,Remake,Monstruos',169,'+7','2020-03-16','it_capitulo2.png','Han pasado casi 30 años desde que el "Club de los Perdedores", formado por Bill, Berverly, Richie, Ben, Eddie, Mike y Stanley, se enfrentaran al macabro y despiadado Pennywise (Bill Skarsgård). En cuanto tuvieron oportunidad, abandonaron el pueblo de Derry, en el estado de Maine, que tantos problemas les había ocasionado. Sin embargo, ahora, siendo adultos, parece que no pueden escapar de su pasado.','https://www.youtube.com/embed/-i4v4zkMt5s');
    INSERT INTO PELICULAS VALUES (NULL,'La trinchera infinita',2019,'España','Drama,Guerra',147,'+16','2020-03-16','trinchera_infinita.png','Higinio y Rosa llevan pocos meses casados cuando estalla la Guerra Civil, y la vida de él pasa a estar seriamente amenazada. Con ayuda de su mujer, decidirá utilizar un agujero cavado en su propia casa como escondite provisional. El miedo a las posibles represalias, así como el amor que sienten el uno por el otro, les condenará a un encierro que se prolongará durante más de 30 años.','https://www.youtube.com/embed/xEm5tpdt210');

    INSERT INTO PELICULAS VALUES (NULL,'Texas Chainsaw 3D',2019,'Estados Unidos','Terror',147,'+18','2020-03-16','texas_chainsaw_3d.jpeg','Secuela del film de Tobe Hooper (1974). El pueblo de Newt (Texas) se vengó de la familia Sawyer por haber ocultado los asesinatos cometidos por Jeb Sawyer, el maníaco de la motosierra, también conocido como “Cara de cuero”. Cuando la gente del pueblo, dirigida por Burt Hartman, quemó su granja, se dio por supuesto que toda la familia había muerto, pero el bebé de los Sawyer sobrevivió. Gavin y Arlene, dos de los vigilantes pueblerinos, se la llevaron en secreto y la criaron como si fuera su hija con el nombre de Heather.','https://www.youtube.com/embed/cUoTGnADapU');

/* INSERT SALAS */
    INSERT INTO SALAS VALUES (1,'Sala 1, MegaHD',10); /* SALA PEQUEÑA, COMPROBAR SI YA ESTA TODO RESERVADO */
    INSERT INTO SALAS VALUES (2,'Sala 2, Sonido Hq',60);
    INSERT INTO SALAS VALUES (3,'Sala 3, hibrida 2D y 3D',30);

/* INSERT USUARIOS */
    /* Administrador pagina => admin / md5(admin) */
    INSERT INTO USUARIOS VALUES(NULL,'admin','ADMIN','David','concejero hernández','11111111A',22,'david.concejero.hernandez@gmail.com','21232f297a57a5a743894a0e4a801fc3','HOMBRE');
    /* Usuario registrado por defecto => pedro / md5(pedro) */
    INSERT INTO USUARIOS VALUES(NULL,'pedro','USER','pedro','faz alter','22222222B',25,'pedro@gmail.com','c6cc8094c2dc07b700ffcc36d64e2138','HOMBRE');
    INSERT INTO USUARIOS VALUES(NULL,'anabel','USER','anabel','martinezz alto','33333333C',22,'anabel@gmail.com','6d0d3cd7b60bce2368f99610908c2a00','MUJER');

/* OPINIONES PELICULAS */
    INSERT INTO OPINIONES_PELICULAS VALUES(3,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(4,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(5,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(6,2,'ERASE UN DESASTRE','Una pelicula bastante mala de tarantino',5); 
    INSERT INTO OPINIONES_PELICULAS VALUES(7,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(8,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(9,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',7);
    INSERT INTO OPINIONES_PELICULAS VALUES(10,2,'IMPACTANTE','Es una pelicula genial, la he visto 3 veces y aun alucino con ella',8);

/* TARIFAS */
    INSERT INTO TARIFAS VALUES(NULL,'Tarifa normal',5,"Todos los dias, excepto Miércoles y Jueves");
    INSERT INTO TARIFAS VALUES(NULL,'Dia espectador',3,"Los miércoles son el día del espectador");
    INSERT INTO TARIFAS VALUES(NULL,'Pareja 2x1',5,'Vente con tu pareja el jueves para recibir un 2x1 en entradas');
    INSERT INTO TARIFAS VALUES(NULL,'Tarifa Matinal',4,"Sesión matinal de Sábados a Domingo hasta las 12:00 de la mañana");
    INSERT INTO TARIFAS VALUES(NULL,'Peliculas 3D',15, "Aplicable en películas de visionado en 3D");

/* CARTELERA 1 SEMANA COMPLETA */
    /* LUNES DIA 2020-03-16  */
    INSERT INTO CARTELERA VALUES(1,1,1,"2020-03-16","16:00");
    INSERT INTO CARTELERA VALUES(1,1,2,"2020-03-16","19:15");
    INSERT INTO CARTELERA VALUES(1,1,3,"2020-03-16","21:30");
    INSERT INTO CARTELERA VALUES(10,1,5,"2020-03-16","23:30");

    INSERT INTO CARTELERA VALUES(1,2,1,"2020-03-16","16:00");
    INSERT INTO CARTELERA VALUES(2,2,1,"2020-03-16","16:00");
    INSERT INTO CARTELERA VALUES(2,1,2,"2020-03-16","21:30");

    INSERT INTO CARTELERA VALUES(1,3,1,"2020-03-16","16:00");
    INSERT INTO CARTELERA VALUES(2,2,1,"2020-03-16","19:15");
    INSERT INTO CARTELERA VALUES(4,3,1,"2020-03-16","21:30");        

    /* MARTES DIA 2020-03-17 */
    INSERT INTO CARTELERA VALUES(6,1,1,"2020-03-17","16:00");
    INSERT INTO CARTELERA VALUES(3,1,1,"2020-03-17","19:15");
    INSERT INTO CARTELERA VALUES(8,1,1,"2020-03-17","21:30");
    INSERT INTO CARTELERA VALUES(3,2,1,"2020-03-17","16:00");
    INSERT INTO CARTELERA VALUES(2,2,1,"2020-03-17","19:15");
    INSERT INTO CARTELERA VALUES(6,2,1,"2020-03-17","21:30");
    INSERT INTO CARTELERA VALUES(6,3,1,"2020-03-17","16:00");
    INSERT INTO CARTELERA VALUES(2,3,1,"2020-03-17","19:15");
    INSERT INTO CARTELERA VALUES(3,3,1,"2020-03-17","21:30");

    /* MIERCOLES DIA 2020-03-18 */
    INSERT INTO CARTELERA VALUES(6,1,2,"2020-03-18","16:00");
    INSERT INTO CARTELERA VALUES(4,1,2,"2020-03-18","19:15");
    INSERT INTO CARTELERA VALUES(1,1,2,"2020-03-18","21:30");
    INSERT INTO CARTELERA VALUES(7,2,2,"2020-03-18","16:00");
    INSERT INTO CARTELERA VALUES(6,2,2,"2020-03-18","19:15");
    INSERT INTO CARTELERA VALUES(4,2,2,"2020-03-18","21:30");
    INSERT INTO CARTELERA VALUES(8,3,2,"2020-03-18","16:00");
    INSERT INTO CARTELERA VALUES(7,3,2,"2020-03-18","19:15");
    INSERT INTO CARTELERA VALUES(4,3,2,"2020-03-18","21:30");

    /* JUEVES DIA 2020-03-19 */
    INSERT INTO CARTELERA VALUES(9,1,3,"2020-03-19","16:00");
    INSERT INTO CARTELERA VALUES(1,1,3,"2020-03-19","19:15");
    INSERT INTO CARTELERA VALUES(1,1,3,"2020-03-19","21:30");
    INSERT INTO CARTELERA VALUES(1,2,3,"2020-03-19","16:00");
    INSERT INTO CARTELERA VALUES(8,2,3,"2020-03-19","19:15");
    INSERT INTO CARTELERA VALUES(7,2,3,"2020-03-19","21:30");
    INSERT INTO CARTELERA VALUES(6,3,3,"2020-03-19","16:00");
    INSERT INTO CARTELERA VALUES(5,3,3,"2020-03-19","19:15");
    INSERT INTO CARTELERA VALUES(4,3,3,"2020-03-19","21:30");

    /* VIERNES DIA 2020-03-20 */
    INSERT INTO CARTELERA VALUES(7,1,1,"2020-03-20","16:00");
    INSERT INTO CARTELERA VALUES(6,1,1,"2020-03-20","19:15");
    INSERT INTO CARTELERA VALUES(5,1,1,"2020-03-20","21:30");
    INSERT INTO CARTELERA VALUES(4,2,1,"2020-03-20","16:00");
    INSERT INTO CARTELERA VALUES(3,2,1,"2020-03-20","19:15");
    INSERT INTO CARTELERA VALUES(2,2,1,"2020-03-20","21:30");
    INSERT INTO CARTELERA VALUES(9,3,1,"2020-03-20","16:00");
    INSERT INTO CARTELERA VALUES(8,3,1,"2020-03-20","19:15");
    INSERT INTO CARTELERA VALUES(1,3,1,"2020-03-20","21:30");
    INSERT INTO CARTELERA VALUES(10,1,5,"2020-03-20","23:30");

    /* SABADO DIA 2020-03-21 */
    INSERT INTO CARTELERA VALUES(1,1,4,"2020-03-21","12:00");
    INSERT INTO CARTELERA VALUES(2,1,1,"2020-03-21","19:15");
    INSERT INTO CARTELERA VALUES(3,1,1,"2020-03-21","21:30");
    INSERT INTO CARTELERA VALUES(4,2,1,"2020-03-21","12:00");
    INSERT INTO CARTELERA VALUES(5,2,1,"2020-03-21","19:15");
    INSERT INTO CARTELERA VALUES(6,2,1,"2020-03-21","21:30");
    INSERT INTO CARTELERA VALUES(7,3,4,"2020-03-21","12:00");
    INSERT INTO CARTELERA VALUES(8,3,1,"2020-03-21","19:15");
    INSERT INTO CARTELERA VALUES(9,3,1,"2020-03-21","21:30");
    INSERT INTO CARTELERA VALUES(10,1,5,"2020-03-21","23:30");

    /* DOMINGO DIA 2020-03-22 */
    INSERT INTO CARTELERA VALUES(9,1,4,"2020-03-22","12:00");
    INSERT INTO CARTELERA VALUES(8,1,1,"2020-03-22","19:15");
    INSERT INTO CARTELERA VALUES(7,1,1,"2020-03-22","21:30");
    INSERT INTO CARTELERA VALUES(6,2,1,"2020-03-22","16:00");
    INSERT INTO CARTELERA VALUES(5,2,1,"2020-03-22","19:15");
    INSERT INTO CARTELERA VALUES(4,2,1,"2020-03-22","21:30");
    INSERT INTO CARTELERA VALUES(3,3,4,"2020-03-22","12:00");
    INSERT INTO CARTELERA VALUES(2,3,1,"2020-03-22","19:15");
    INSERT INTO CARTELERA VALUES(1,3,1,"2020-03-22","21:30");
    INSERT INTO CARTELERA VALUES(10,1,5,"2020-03-22","23:30");

/* VENTA_ENTRADAS */

INSERT INTO VENTA_ENTRADAS VALUES(NULL,1,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,2,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,3,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,4,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,5,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,6,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,7,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,8,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,9,2,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,1,1,"2020-03-22","16:00",1,1,1);
INSERT INTO VENTA_ENTRADAS VALUES(NULL,1,1,"2020-03-16","16:00",1,1,1);

SHOW TABLES;
