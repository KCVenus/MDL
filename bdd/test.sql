drop database if exists db_agenda;
create database db_agenda;
use db_agenda;


create user 'taskAgendaUser'@'localhost' identified by 'taskuser';
grant all privileges on db_agenda.* TO 'taskAgendaUser'@'localhost';

create user 'mdl'@'localhost' identified by 'mdl';
grant all privileges on mdl.* TO 'mdl'@'localhost';




DROP TABLE IF exists TACHES;
create table TACHES (
	id int not null auto_increment,
    nom varchar(100) not null,
    description_tache varchar(200) not null,
    date_echeance date not null,
    constraint pk_id primary key (id)
) ; 
    
    
select * from hotel;
insert into hotel values ("1","Ibis Styles Lille Centre Gare Beffroi","172 Rue Pierre Mauroy","59000","Lille","0320300054","H1384@accor.com");

insert into hotel values ("2","Ibis budget Lille Centre ","10, Rue De Courtrai","59000","Lille","0892683078","H5208@accor.com");

 use mdl;
 
CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB; 
 
insert into atelier(libelle, nb_places_maxi) values ("LE CLUB ET SON PROJET", 12);
insert into atelier(libelle, nb_places_maxi) values ("LE FONCTIONNEMENT DU CLUB", 10);
insert into atelier(libelle, nb_places_maxi) values ("LES OUTILS À DISPOSITION ET REMIS AUX CLUBS", 13);
insert into atelier(libelle, nb_places_maxi) values ("OBSERVATOIRE DES MÉTIERS DE L'ESCRIME", 15);
insert into atelier(libelle, nb_places_maxi) values ("I.F.F.E", 16);
insert into atelier(libelle, nb_places_maxi) values ("DÉVELOPPEMENT DURABLE", 17);

use mdl;
select * from atelier_theme;
select * from proposer;
select * from vacation;