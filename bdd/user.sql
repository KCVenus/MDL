

use mdl;

ALTER TABLE vacation
ADD CONSTRAINT check_dates CHECK (dateheure_fin > dateheure_debut);

select * from user;
ALTER TABLE user CHANGE numlicence numlicence VARCHAR(255) NOT NULL;
DROP INDEX UNIQ_8D93D649E7927C74 ON user;

INSERT INTO user (id, email, roles, password, isVerified, numlicence) VALUES
(1, 'lobortis.quam.a@fermentum.net', '[\"ROLE_USER\"]', '$2y$13$2XVSlQs7gLCNT0exWHGnV.dDKENswu6KudOGVVIAsdBUlQ8Gpup7m', 1, '16020234861');








ALTER TABLE user ADD inscription_id INT DEFAULT NULL, ADD isverified TINYINT(1) NOT NULL, ADD numlicence INT NOT NULL;
ALTER TABLE user ADD CONSTRAINT FK_8D93D6495DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id);
CREATE UNIQUE INDEX UNIQ_8D93D6495DAC5993 ON user (inscription_id);