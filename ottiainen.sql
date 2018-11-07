drop database if exists verkkokauppa;

create database verkkokauppa;

use verkkokauppa;

CREATE TABLE YRITYS(
yritys_id int primary key auto_increment,
yritysnimi varchar(40),
katuosoite varchar(30),
postinro int,
postitmp varchar(20)
);

CREATE TABLE HENKILO(
id INT PRIMARY KEY auto_increment,
snimi varchar(50),
enimi varchar(50),
yritys int,
puh varchar(20),
email varchar(50),
osoite varchar(40),
postinro int,
postitmp varchar(30),
kirtunnus varchar(10),
kirsalasana varchar(10),
tyyppi enum("tyontekija","ostaja","kasvattaja","muu"),
FOREIGN KEY (yritys)
REFERENCES YRITYS(yritys_id)
);

CREATE TABLE TUOTERYHMA(
tuoteryhma_id INT PRIMARY KEY auto_increment,
nimi varchar(30)
);

CREATE TABLE TUOTE(
id INT PRIMARY KEY auto_increment,
nimi varchar(30),
hinta int,
kustannus int,
trnro int,
kuva varchar(100),
FOREIGN KEY (trnro)
REFERENCES TUOTERYHMA(tuoteryhma_id)
);

CREATE TABLE TILAUS(
tilaus_id INT PRIMARY KEY auto_increment,
astunnus INT,
yritys_astunnus INT,
tilauspvm DATE,
tila ENUM("odottaa","toimitettu"),
FOREIGN KEY (astunnus)
REFERENCES HENKILO(id),
FOREIGN KEY(yritys_astunnus)
REFERENCES YRITYS(yritys_id)
);

CREATE TABLE TILAUSRIVI(
tilaus_id int,
tilausrivi int primary key auto_increment,
tuote int,
kilomaara decimal(5,1),
FOREIGN KEY (tuote)
REFERENCES TUOTE(id),
FOREIGN KEY(tilaus_id)
REFERENCES TILAUS(tilaus_id)
);

CREATE TABLE VARASTO(
tila_id INT PRIMARY KEY auto_increment,
tilanimi varchar(20),
maara_kilo decimal(5,1),
yritys int,
FOREIGN KEY(yritys)
REFERENCES YRITYS(yritys_id)
);

CREATE TABLE TUOTANTOERA(
tuotantoera_id int primary key auto_increment,
era_aloitus_pvm DATE,
era_pakkaus_pvm DATE,
era_tavoite_kilomaara decimal(5,1),
era_valmistunut_kilomaara decimal(5,1),
valmistaja_yritys int,
varasto int,
ilmoittaja_id int,
era_tila enum("tuotannossa","pakattu"),
FOREIGN KEY (valmistaja_yritys)
REFERENCES YRITYS(yritys_id),
FOREIGN KEY (ilmoittaja_id)
REFERENCES HENKILO(id),
FOREIGN KEY (varasto)
REFERENCES VARASTO(tila_id)
)

INSERT INTO YRITYS(yritysnimi,katuosoite,postinro,postitmp) values
("Öttiäinen","Koulutie 4","95605","Oulu"),
("Pekan farmi","Peltotie 1","90099","Oulu"),
("Hipun vihreää ruokaa","keskustakatu 1","90101","Oulu")

INSERT INTO HENKILO (snimi,enimi,yritys,puh,email,osoite,postinro,postitmp,tyyppi,kirtunnus,kirsalasana) values 
("Pelkonen","Tero",1,"050 666 666","tero@maili.fi","Koulutie 4","95605","Oulu","tyontekija","tyontekija1","1234"),
("Kärpäsmies","Pekka",2,"050 111 111","pekkakyntaa@maili.fi","Peltotie 1","90099","Oulu","kasvattaja","kasvattaja1","1234"),
("Hippu","Cristian",3,"050 412 535","goGriin@maili.fi","keskustakatu 1","90101","Oulu","ostaja","ostaja1","1234");

INSERT INTO TUOTERYHMA (nimi) values
("Sirkat"),("Madot");

INSERT INTO TUOTE (nimi, hinta,kustannus,trnro,kuva) values
("Suomi-Sirkka",5,2,1,"sirkka.jpg"),
("Suomi-Mato",3,1,2,"mato.jpg");

INSERT INTO VARASTO (tilanimi,maara_kilo,yritys) values
("Pakastin01",1.5,1)

INSERT INTO TILAUS (astunnus,tilauspvm,tila) values
("3",curdate(),"odottaa")

INSERT INTO TILAUSRIVI (tilaus_id,tuote,kilomaara) values
(1,1,2.5)

INSERT INTO TUOTANTOERA(era_aloitus_pvm,
era_tavoite_kilomaara,
valmistaja_yritys,
ilmoittaja_id,
era_tila) values
("2018-03-20",
4,
2,
2,
"tuotannossa")