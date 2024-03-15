<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315130732 extends AbstractMigration
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
        $this->addSql('CREATE TABLE categorie_chambre (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, adresse1 VARCHAR(60) NOT NULL, adresse2 VARCHAR(60) DEFAULT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(60) NOT NULL, tel VARCHAR(14) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, pnom VARCHAR(60) NOT NULL, adresse1 VARCHAR(70) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(70) NOT NULL, tel VARCHAR(14) NOT NULL, mail VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, dateinscription DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, numlicence BIGINT NOT NULL, nom VARCHAR(70) NOT NULL, prenom VARCHAR(70) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, cp CHAR(5) NOT NULL, ville VARCHAR(70) NOT NULL, tel CHAR(14) DEFAULT NULL, mail VARCHAR(100) DEFAULT NULL, dateadhesion DATE NOT NULL, idclub DOUBLE PRECISION NOT NULL, idqualite DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nuite (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, date_nuite DATE NOT NULL, INDEX IDX_8D4CB7153243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, tarif_nuite DOUBLE PRECISION NOT NULL, INDEX IDX_21866C153243BB18 (hotel_id), INDEX IDX_21866C15BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, inscription_id INT DEFAULT NULL, date_restauration DATE NOT NULL, type_repas VARCHAR(100) NOT NULL, INDEX IDX_898B1EF15DAC5993 (inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, numlicencie VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, isverified TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacation (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, dateheure_debut DATETIME NOT NULL, dateheure_fin DATETIME NOT NULL, INDEX IDX_E3DADF7582E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_inscription ADD CONSTRAINT FK_20EC8DC882E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_inscription ADD CONSTRAINT FK_20EC8DC85DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF15DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE vacation ADD CONSTRAINT FK_E3DADF7582E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier_inscription DROP FOREIGN KEY FK_20EC8DC882E2CF35');
        $this->addSql('ALTER TABLE atelier_inscription DROP FOREIGN KEY FK_20EC8DC85DAC5993');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7153243BB18');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C153243BB18');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15BCF5E72D');
        $this->addSql('ALTER TABLE restauration DROP FOREIGN KEY FK_898B1EF15DAC5993');
        $this->addSql('ALTER TABLE vacation DROP FOREIGN KEY FK_E3DADF7582E2CF35');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE atelier_inscription');
        $this->addSql('DROP TABLE categorie_chambre');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE nuite');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vacation');
    }
}
