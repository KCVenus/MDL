

use mdl;

select * from proposer;


ALTER TABLE vacation
ADD CONSTRAINT check_dates CHECK (dateheure_fin > dateheure_debut);

select * from atelier;
ALTER TABLE user CHANGE numlicence numlicence VARCHAR(255) NOT NULL;
DROP INDEX UNIQ_8D93D649E7927C74 ON user;

INSERT INTO user (id, email, roles, password, isVerified, numlicence) VALUES
(1, 'lobortis.quam.a@fermentum.net', '[\"ROLE_USER\"]', '$2y$13$2XVSlQs7gLCNT0exWHGnV.dDKENswu6KudOGVVIAsdBUlQ8Gpup7m', 1, '16020234861');

use mdl;

CREATE TABLE inscription_nuite (inscription_id INT NOT NULL, nuite_id INT NOT NULL, INDEX IDX_DF05E3585DAC5993 (inscription_id), INDEX IDX_DF05E358A84291E2 (nuite_id), PRIMARY KEY(inscription_id, nuite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
ALTER TABLE inscription_nuite ADD CONSTRAINT FK_DF05E3585DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE;
ALTER TABLE inscription_nuite ADD CONSTRAINT FK_DF05E358A84291E2 FOREIGN KEY (nuite_id) REFERENCES nuite (id) ON DELETE CASCADE;
ALTER TABLE nuite ADD categorie_id INT DEFAULT NULL;
ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id);
CREATE INDEX IDX_8D4CB715BCF5E72D ON nuite (categorie_id);

select * from nuite;
select * from restauration;

insert into nuite(hotel_id,date_nuite, categorie_id) values(1, str_to_date('2024-09-06', '%Y-%m-%d'),2 ); 
insert into nuite(hotel_id,date_nuite, categorie_id) values(2, str_to_date('2024-09-06', '%Y-%m-%d'),2 ); 
insert into nuite(hotel_id,date_nuite, categorie_id) values(1, str_to_date('2024-09-07', '%Y-%m-%d'),1 ); 
insert into nuite(hotel_id,date_nuite, categorie_id) values(2, str_to_date('2024-09-07', '%Y-%m-%d'),1 );


ALTER TABLE licencie CHANGE cp cp VARCHAR(5) NOT NULL, CHANGE tel tel VARCHAR(14) DEFAULT NULL;
ALTER TABLE user ADD licencie_id INT DEFAULT NULL;
ALTER TABLE user ADD CONSTRAINT FK_8D93D649B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id);
CREATE UNIQUE INDEX UNIQ_8D93D649B56DCD74 ON user (licencie_id);


ALTER TABLE user ADD inscription_id INT DEFAULT NULL, ADD isverified TINYINT(1) NOT NULL, ADD numlicence INT NOT NULL;
ALTER TABLE user ADD CONSTRAINT FK_8D93D6495DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id);
CREATE UNIQUE INDEX UNIQ_8D93D6495DAC5993 ON user (inscription_id);