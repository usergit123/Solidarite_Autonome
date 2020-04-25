drop database solidarite;
create database solidarite;
use solidarite;

create table responsable
(
idResp int not null,
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
coordonnees int,
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
idS int not null,
libelle varchar(40),
adresse varchar(40),
cp char(5),
tel char(10),
idR int,
primary key(idS),
foreign key(idR) references region(idR)
);
create table personne
(
idP int auto_increment,
nom varchar(20),
prenom varchar(20),
pseudo varchar(20),
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
idC int not null,
idP int,
primary key(idC),
foreign key(idP) references personne(idP)
);
create table donation
(
idDon int not null,
idP int,
primary key(idDon),
foreign key(idP) references personne(idP)
);
create table stockage
(
idS int not null,
idProd int not null,
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



insert into personne values (null, "unNom", "unPrenom", "unPseudo","123","une adresse","93000","0102030405",1);