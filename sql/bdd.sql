drop database solidarite;
create database solidarite;
use solidarite;

create table responsable
(
idResp int auto_increment,
pseudo varchar(20) unique,
mdp varchar(20),
nom varchar(20),
prenom varchar(20),
adresse varchar(40),
cp char(5),
tel char(10),
primary key(idResp)
);


create table region
(
idR int not null,
libelle varchar(40),
x int,
y int,
primary key(idR)
);

create table produit
(
idProd int not null,
libelle varchar(40),
primary key(idProd)
);
create table stock
(
idS int auto_increment,
libelle varchar(40),
adresse varchar(40),
cp char(5),
tel char(10),
idR int,
idResp int,
primary key(idS),
foreign key(idR) references region(idR),
foreign key(idResp) references responsable(idResp)
);
create table personne
(
idP int auto_increment,
nom varchar(20),
prenom varchar(20),
pseudo varchar(20) unique,
mdp varchar(20),
adresse varchar(40),
cp char(5),
tel char(10),
idR int,
primary key(idP),
foreign key(idR) references region(idR)
);
create table commande
(
idC int auto_increment,
idP int,
primary key(idC),
foreign key(idP) references personne(idP)
);
create table donation
(
idDon int auto_increment,
idP int,
primary key(idDon),
foreign key(idP) references personne(idP)
);
create table stockage
(
idS int not null,
idProd int not null,
nbDispo int,
primary key(idS,idProd),
foreign key(idS) references stock(idS),
foreign key(idProd) references produit(idProd)
);

create table reponse
(
idS int not null,
idC int not null,
texte text,
primary key(idS,idC),
foreign key(idS) references stock(idS),
foreign key(idC) references commande(idC)
);

create table demande
(
idProd int not null,
idC int not null,
nbDemande int,
primary key(idProd,idC),
foreign key(idProd) references produit(idProd),
foreign key(idC) references commande(idc)
);
create table don
(
idProd int not null,
idDon int not null,
nbDonne int,
primary key(idProd,idDon),
foreign key(idProd) references produit(idProd),
foreign key(idDon) references donation(idDon)
);

/* MLDR

responsable(idResp,nom,prenom,adresse,cp,tel)
region(idR,libelle,coordonnees)
produit(idProd,libelle)
Stock(idS,libelle,adresse,cp,tel,#idR)
personne(idP,nom,prenom,pseudo,mdp,adresse,cp,tel,#idR)
commande(idC,#idP)
donation(idDon,#idP)
Stockage(#idS,#idProd,nbDispo)
reponse(#idS,#idC,texte)
demande(#idprod,#idC,nbDemande)
don(#idProd,#idDon,nbDonne)


*/


/*
insert into produit values (1, "masque"),(1, "gant");
insert into demande values (1,1,5),(1,2,6);
insert into region values (1, "paris", 42);
insert into commande values (1, 1), (2,1), (3,2), (4,2);
insert into personne values 
(null, "unNom", "unPrenom", "unPseudo","123","une adresse","93000","0102030405",1),
(null, "unNom2", "unPrenom2", "unPseudo2","123","une adresse2","93000","0102030405",1);

*/


insert into commande values (1, 1),(2,1), (3,1), (4,1), (5,2),(6,2);
insert into produit values (1,"Masque de protection"), (2, "Gants de protection"), (3, "Gel hydro-alcoolique"), (4, "Combinaison de securite");
insert into demande values (1,1,3),(2,2,5),(3,3,7), (4,4,8), (1,5,9), (2, 6, 10), (3,5, 11), (4,6,12);
insert into region values (1, "Aquitaine", 34, 32 ), (2, "Ile-de-france", 23, 67), (3, "Limousin", 87,90);

insert into personne values 
<<<<<<< HEAD
(null, "unNom", "unPrenom", "unPseudo",123,"une adresse","93000","0102030405",1),
(null, "Audran", "Puech", "Maman",123,"4 rue des tapirs","93001","0102030409",1);
=======
(null, "unNom", "unPrenom", "unPseudo","123","une adresse","93000","0102030405",1),
(null, "Audran", "Puech", "Maman","123","4 rue des tapirs","93001","0102030409",1);


insert into reponse values (1, 1, "un texte");

>>>>>>> 6b01c1ddb1f05fc04b2c3b2dcf9ab188554ce7de


insert into responsable values
	(null,"unResponsable","123","unNomResp","unPrenomResp","une adresse", "81000", "0102030405"),
	(null,"un","123","Papa","Kiki","4 rue pagol","45000","0123565478"),
    (null,"deux","123,","Lionel","juki","10 avenue de la gaulle","12000","0965847852"),
    (null,"trois","123","Vorge","Huj","7 boulevard de la clemence","36500","0679621910");
	
insert into stockage values 
	(1,1,25), 
    (2,2,500),
    (3,3,1000),
    (4,4,180);


insert into stock values 
(null, "magnifique stock", "perpete",92600, "0102030405", 1,2),
(null, "slendide stock", "la flemme",93600, "0102030405", 1,3),
(null, " stock infame", "7 rue du genou",93600, "0102030405", 1,1),
(null, "saucisses origan", "6 rue du hugo",93600, "0102030405", 1,1);





