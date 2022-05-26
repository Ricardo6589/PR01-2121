
create database IF NOT EXISTS curs;
use curs;

/* Creació de les taules*/ 


CREATE TABLE IF NOT EXISTS tbl_professor(
	id_professor int(5) NOT NULL AUTO_INCREMENT,
	nom_prof varchar (20) NOT NULL,
	cognom1_prof varchar (20) NULL,
	cognom2_prof varchar (20) NULL,
	email_prof varchar(50) NULL,
	telf varchar (5) NULL, /* Son les extensions, per exemple: 32256*/
	dept int(5) NOT NULL,
	foto_prof varchar(50)
	constraint pk_professor PRIMARY KEY (id_professor)
);

-- CREATE TABLE IF NOT EXISTS tbl_nivel_educatiu(
-- 	id_nivel_educatiu int(5) NOT NULL AUTO_INCREMENT,
-- 	codi_nivel_educatiu varchar(5) NOT NULL,
-- 	nom_nivel_educatiu varchar(25) NULL,
-- )

CREATE TABLE IF NOT EXISTS tbl_classe (
	id_classe int(5) NOT NULL AUTO_INCREMENT,
	codi_classe varchar(5) NOT NULL,
	nom_classe varchar(25) NULL,
	tutor int(5) NOT NULL,
	-- nivel_educatiu int(5) NUll,
	constraint pk_consta PRIMARY KEY (id_classe)
);

CREATE TABLE IF NOT EXISTS tbl_alumne(
	id_alumne int(10) NOT NULL AUTO_INCREMENT,
	dni_alu varchar(9) NULL,
	nom_alu varchar(20) NOT NULL,
	cognom1_alu varchar(20) NULL,
	cognom2_alu varchar(20) NULL,
	telf_alu varchar(9) NULL,
	email_alu varchar(50) NULL,
	-- nivel_educatiu int(5) NUll,
	classe int(5) NOT NULL,
	password_alu varchar(30) NULL,
	foto_alu varchar(50)
	constraint pk_alumne PRIMARY KEY (id_alumne)
);

CREATE TABLE IF NOT EXISTS tbl_dept(
	id_dept int(5) NOT NULL AUTO_INCREMENT,
	codi_dept varchar(5) NOT NULL,
	nom_dept varchar(25) NULL,
	nomcor_dept varchar(8) NULL,
	constraint pk_imparteix PRIMARY KEY (id_dept)
);

/* Modificacions de les taules per cració de les FK*/

ALTER TABLE tbl_alumne
    ADD CONSTRAINT alumne_classe_fk FOREIGN KEY (classe)
    REFERENCES tbl_classe(id_classe);

-- ALTER TABLE tbl_alumne
--     ADD CONSTRAINT alumne_nivel_educatiu_fk FOREIGN KEY (nivel_educatiu)
--     REFERENCES tbl_nivel_educatiu(id_nivel_educatiu);
	
ALTER TABLE tbl_classe
    ADD CONSTRAINT classe_prof_fk FOREIGN KEY (tutor)
    REFERENCES tbl_professor(id_professor);

-- ALTER TABLE tbl_classe
--     ADD CONSTRAINT classe_nivel_educatiu_fk FOREIGN KEY (nivel_educatiu)
--     REFERENCES tbl_nivel_educatiu(id_nivel_educatiu);

ALTER TABLE tbl_professor
    ADD CONSTRAINT prof_dept_fk FOREIGN KEY (dept)
    REFERENCES tbl_dept(id_dept);

INSERT INTO tbl_dept (codi_dept,nom_dept,nomcor_dept)
VALUES
(01061,"Sistema Microinformatica y Redes","SMX"),
(02012,"Administracion de Sistemas Informaticos de Redes","ASIX"),
(03034,"Desarrollo de Aplicaciones Web","DAW"),
(04022,"Desarrollo de Aplicaciones Movil","DAM");

INSERT INTO tbl_professor (nom_prof,cognom1_prof,cognom2_prof,email_prof,telf,dept,pwd_profe)
VALUES
("sergio","rodriguez","fernandez","sergiorodfer@jjr.com",32256,(SELECT id_dept FROM tbl_dept where nomcor_dept="SMX"),"ASDasd123"),
("maria","dominguez","rubio","mariadomrub@jjr.com",32252,(SELECT id_dept FROM tbl_dept where nomcor_dept="ASIX"),"ASDasd123"),
("david","campos","leon","davidcamleo@jjr.com",32246,(SELECT id_dept FROM tbl_dept where nomcor_dept="DAM"),"ASDasd123"),
("jose","cortes","lozano","josecorloz@jjr.com",22256,(SELECT id_dept FROM tbl_dept where nomcor_dept="DAW"),"ASDasd123"),
("juan","carrasco","calvo","juancarcal@jjr.com",12226,(SELECT id_dept FROM tbl_dept where nomcor_dept="SMX"),"ASDasd123"),
("pepe","herrera","campos","pepehercam@jjr.com",32551,(SELECT id_dept FROM tbl_dept where nomcor_dept="DAW"),"ASDasd123"),
("olaf","soto","rojas","olafsotroj@jjr.com",13487,(SELECT id_dept FROM tbl_dept where nomcor_dept="ASIX"),"ASDasd123"),
("duna","cabrera","gallego","dunacabgal@jjr.com",22438,(SELECT id_dept FROM tbl_dept where nomcor_dept="DAM"),"ASDasd123");

INSERT INTO tbl_classe (codi_classe,nom_classe,tutor)
VALUES
(10032,"1rSMX",(select id_professor from tbl_professor where email_prof ="sergiorodfer@jjr.com")),
(10032,"2nSMX",(select id_professor from tbl_professor where email_prof="juancarcal@jjr.com" )),
(20032,"1rASIX",(select id_professor from tbl_professor where email_prof="olafsotroj@jjr.com" )),
(20032,"2nASIX",(select id_professor from tbl_professor where email_prof="mariadomrub@jjr.com" )),
(30032,"1rDAW",(select id_professor from tbl_professor where email_prof="pepehercam@jjr.com" )),
(30032,"2nDAW",(select id_professor from tbl_professor where email_prof="josecorloz@jjr.com" )),
(40032,"1rDAM",(select id_professor from tbl_professor where email_prof="dunacabgal@jjr.com" )),
(40032,"2nDAM",(select id_professor from tbl_professor where email_prof="davidcamleo@jjr.com" ));


INSERT INTO tbl_alumne (dni_alu,nom_alu,cognom1_alu,cognom2_alu,telf_alu,email_alu,classe)
VALUES
("52370286E","antonio","garcia","ramirez",602058529,"69354@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("44144771C","jose","martinez","alarcon",621417319,"34593@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=5)),
("62514419M","francisco","lopez","leon",607279597,"11221@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("73963100E","juan","sanchez","gallardo",633294699,"55764@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("64579914P","manuel","gonzalez","molina",622619497,"79458@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("97557087B","pedro","gomez","soto",607310032,"93914@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("72256939R","jesus","fernandez","lopez",679437261,"55236@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("30915465S","angel","moreno","orio",621466347,"11976@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=2)),
("97840439A","miguel","jimenez","garcia",660316860,"64633@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("06694041Y","javier","perez","ortega",637306446,"78375@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("43072614P","jose","rodriguez","ramirez",620575073,"64969@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("24055683Y","david","navarro","corcoles",651261000,"88579@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("86538282T","carlos","ruiz","gil",640267639,"26611@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("78144416F","jose luis","diaz","ortiz",606731374,"59214@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=5)),
("12140762M","alejandro","serrano","calero",628478050,"56677@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("07850913R","miguel","hernandez","valero",611787948,"69677@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("45076240N","francisco","muñoz","cebrian",648694035,"83236@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("08142355X","rafael","saez","rodenas",662929903,"78313@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=2)),
("54817434Q","daniel","romero","alarcon",657302386,"39187@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("09798360S","juan","rubio","blazquez",688709758,"41878@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("52730523X","luis","alfaro","nuñez",698360677,"57439@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("27791256B","pablo","molina","pardo",656956290,"31582@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("46559516H","juan","lozano","moya",625047529,"73261@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=5)),
("86402786C","joaquin","castillo","tebar",672486950,"29149@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("57018231N","sergio","picazo","requena",623708766,"62619@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("34305751D","fernando","ortega","arenas",666529048,"53149@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("18990238N","juan","morcillo","ballesteros",610497218,"36752@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("41818828K","andres","cano","collado",628660763,"56151@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=5)),
("90779892L","jose","marin","alfaro",648321765,"97857@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=2)),
("12507403A","jose","cuenca","molina",674298668,"47519@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("70120582E","ramon","garrido","lozano",697082820,"97727@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("11674759M","raul","torres","castillo",604088933,"99262@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("34443858R","alberto","corcoles","picazo",644698140,"47224@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("66615127C","enrique","gil","ortega",699408053,"32312@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("86621958W","alvaro","ortiz","morcillo",646072972,"89116@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("87514672V","vicente","calero","cano",683544189,"91864@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("71410483Z","emilio","valero","marin",600949935,"66259@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=8)),
("55659863R","francisco","cebrian","lopez",631765307,"13695@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("34684851T","diego","rodenas","sanchez",631394823,"19677@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("42673739E","julian","alarcon","gonzalez",686645022,"19886@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("15033566F","jorge","blazquez","gomez",629225313,"85222@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("57466006T","alfonso","nuñez","fernandez",692086143,"37537@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("08137411B","adrian","pardo","moreno",639726193,"55496@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("76075150M","ruben","moya","jimenez",696883270,"77353@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("44017529Z","santiago","tebar","perez",629257409,"39895@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=6)),
("52382335L","ivan","requena","rodriguez",650013489,"27679@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("13734123H","juan","arenas","navarro",689704122,"76887@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("57902012H","pascual","ballesteros","ruiz",657442180,"15694@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("15270087L","jose","collado","diaz",625879662,"65436@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=8)),
("25877613Z","mario","ramirez","serrano",675551921,"76367@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=8)),
("38597622B","Marisela","alarcon","hernandez",618075194,"31891@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("88076852P","Julieta","leon","muñoz",616033538,"63899@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=4)),
("92300391B","Pacífica","gallardo","saez",629541001,"71168@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=7)),
("04203374D","Constanza","molina","romero",620800626,"83724@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1)),
("37452894Q","Cleto","soto","ballesteros",611979869,"84582@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=3)),
("69458741Y","Diana","lopez","collado",673658939,"35537@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=8)),
("92572187Q","Olalla","orio","ramirez",671487900,"66994@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=2)),
("56730408B","Felicia","garcia","alarcon",628759336,"73522@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=2)),
("02164996Y","Olga","ortega","leon",633245479,"93815@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=8)),
("49081273D","Adelardo","ramirez","gallardo",601159112,"51669@jjr.com",(SELECT id_classe FROM tbl_classe where tutor=1));
