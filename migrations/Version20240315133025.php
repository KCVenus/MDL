<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315133025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, nb_places_maxi INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_theme (atelier_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_AEB6D34382E2CF35 (atelier_id), INDEX IDX_AEB6D34359027487 (theme_id), PRIMARY KEY(atelier_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_inscription (atelier_id INT NOT NULL, inscription_id INT NOT NULL, INDEX IDX_20EC8DC882E2CF35 (atelier_id), INDEX IDX_20EC8DC85DAC5993 (inscription_id), PRIMARY KEY(atelier_id, inscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, pnom VARCHAR(60) NOT NULL, adresse1 VARCHAR(70) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(70) NOT NULL, tel VARCHAR(14) NOT NULL, mail VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, dateinscription DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, inscription_id INT DEFAULT NULL, date_restauration DATE NOT NULL, type_repas VARCHAR(100) NOT NULL, INDEX IDX_898B1EF15DAC5993 (inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, numlicencie VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, isverified TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_inscription ADD CONSTRAINT FK_20EC8DC882E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_inscription ADD CONSTRAINT FK_20EC8DC85DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF15DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE proposer_categorie_chambre');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('ALTER TABLE categorie_chambre DROP FOREIGN KEY FK_9A8A4A5DD72D5F2B');
        $this->addSql('DROP INDEX IDX_9A8A4A5DD72D5F2B ON categorie_chambre');
        $this->addSql('ALTER TABLE categorie_chambre ADD libelle_categorie VARCHAR(100) NOT NULL, DROP categorie_chambre_proposer_id');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38726B9F95FF');
        $this->addSql('DROP INDEX IDX_B8EE38726B9F95FF ON club');
        $this->addSql('ALTER TABLE club ADD ville VARCHAR(60) NOT NULL, ADD tel VARCHAR(14) NOT NULL, DROP club_licencie_id, CHANGE adresse2 adresse2 VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE licencie ADD idclub DOUBLE PRECISION NOT NULL, ADD idqualite DOUBLE PRECISION NOT NULL, CHANGE numlicence numlicence BIGINT NOT NULL, CHANGE adresse2 adresse2 VARCHAR(255) DEFAULT NULL, CHANGE cp cp CHAR(5) NOT NULL, CHANGE tel tel CHAR(14) DEFAULT NULL, CHANGE mail mail VARCHAR(100) DEFAULT NULL, CHANGE dateadhesion dateadhesion DATE NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D4CB7157623EF3 ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB71562076210 ON nuite');
        $this->addSql('ALTER TABLE nuite ADD hotel_id INT DEFAULT NULL, ADD date_nuite DATE NOT NULL, DROP nuite_inscription_id, DROP nuite_hotel_id');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_8D4CB7153243BB18 ON nuite (hotel_id)');
        $this->addSql('DROP INDEX IDX_21866C155AA645E9 ON proposer');
        $this->addSql('ALTER TABLE proposer ADD categorie_id INT DEFAULT NULL, ADD tarif_nuite DOUBLE PRECISION NOT NULL, CHANGE proposer_hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('CREATE INDEX IDX_21866C153243BB18 ON proposer (hotel_id)');
        $this->addSql('CREATE INDEX IDX_21866C15BCF5E72D ON proposer (categorie_id)');
        $this->addSql('ALTER TABLE vacation ADD atelier_id INT NOT NULL, ADD dateheure_debut DATETIME NOT NULL, ADD dateheure_fin DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vacation ADD CONSTRAINT FK_E3DADF7582E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_E3DADF7582E2CF35 ON vacation (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacation DROP FOREIGN KEY FK_E3DADF7582E2CF35');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7153243BB18');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C153243BB18');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, compte_inscription_id INT DEFAULT NULL, compte_licensie_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CFF652609AAA45BB (compte_licensie_id), INDEX IDX_CFF652609DC58FE0 (compte_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE proposer_categorie_chambre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE qualite (id INT AUTO_INCREMENT NOT NULL, qualite_licencie_id INT DEFAULT NULL, libellequalite VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_68B3575F76C061D6 (qualite_licencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier_inscription DROP FOREIGN KEY FK_20EC8DC882E2CF35');
        $this->addSql('ALTER TABLE atelier_inscription DROP FOREIGN KEY FK_20EC8DC85DAC5993');
        $this->addSql('ALTER TABLE restauration DROP FOREIGN KEY FK_898B1EF15DAC5993');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE atelier_inscription');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_E3DADF7582E2CF35 ON vacation');
        $this->addSql('ALTER TABLE vacation DROP atelier_id, DROP dateheure_debut, DROP dateheure_fin');
        $this->addSql('ALTER TABLE categorie_chambre ADD categorie_chambre_proposer_id INT DEFAULT NULL, DROP libelle_categorie');
        $this->addSql('ALTER TABLE categorie_chambre ADD CONSTRAINT FK_9A8A4A5DD72D5F2B FOREIGN KEY (categorie_chambre_proposer_id) REFERENCES proposer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9A8A4A5DD72D5F2B ON categorie_chambre (categorie_chambre_proposer_id)');
        $this->addSql('ALTER TABLE licencie DROP idclub, DROP idqualite, CHANGE numlicence numlicence INT NOT NULL, CHANGE adresse2 adresse2 VARCHAR(255) NOT NULL, CHANGE cp cp VARCHAR(6) NOT NULL, CHANGE tel tel VARCHAR(14) NOT NULL, CHANGE mail mail VARCHAR(100) NOT NULL, CHANGE dateadhesion dateadhesion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE club ADD club_licencie_id INT DEFAULT NULL, DROP ville, DROP tel, CHANGE adresse2 adresse2 VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38726B9F95FF FOREIGN KEY (club_licencie_id) REFERENCES licencie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B8EE38726B9F95FF ON club (club_licencie_id)');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15BCF5E72D');
        $this->addSql('DROP INDEX IDX_21866C153243BB18 ON proposer');
        $this->addSql('DROP INDEX IDX_21866C15BCF5E72D ON proposer');
        $this->addSql('ALTER TABLE proposer ADD proposer_hotel_id INT DEFAULT NULL, DROP hotel_id, DROP categorie_id, DROP tarif_nuite');
        $this->addSql('CREATE INDEX IDX_21866C155AA645E9 ON proposer (proposer_hotel_id)');
        $this->addSql('DROP INDEX IDX_8D4CB7153243BB18 ON nuite');
        $this->addSql('ALTER TABLE nuite ADD nuite_hotel_id INT DEFAULT NULL, DROP date_nuite, CHANGE hotel_id nuite_inscription_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D4CB7157623EF3 ON nuite (nuite_hotel_id)');
        $this->addSql('CREATE INDEX IDX_8D4CB71562076210 ON nuite (nuite_inscription_id)');
    }
}
