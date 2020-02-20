create table Utilisateur(
	id serial constraint pk_Utilisateur primary key,
	nom varchar(30) not null,
	mdp varchar(20) not null
);

create table Ammortissement(
	id serial constraint pk_Ammortissement primary key,
	idAdmin serial references Utilisateur(id),
	capitalInitial double precision not null,
	taux double precision not null,
	duree int not null,
	dateDebut varchar(12) not null
);
insert into Ammortissement values ('7','1','100000','5','48','2020-02-04');
insert into Ammortissement values ('7','1','100000','5','48','2020-02-04');