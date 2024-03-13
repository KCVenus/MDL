<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313083820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_chambre (id INT AUTO_INCREMENT NOT NULL, categorie_chambre_proposer_id INT DEFAULT NULL, INDEX IDX_9A8A4A5DD72D5F2B (categorie_chambre_proposer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, club_licencie_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, adresse1 VARCHAR(60) NOT NULL, adresse2 VARCHAR(60) NOT NULL, cp VARCHAR(5) NOT NULL, INDEX IDX_B8EE38726B9F95FF (club_licencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, compte_inscription_id INT DEFAULT NULL, compte_licensie_id INT DEFAULT NULL, INDEX IDX_CFF652609DC58FE0 (compte_inscription_id), UNIQUE INDEX UNIQ_CFF652609AAA45BB (compte_licensie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, numlicence INT NOT NULL, nom VARCHAR(70) NOT NULL, prenom VARCHAR(70) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) NOT NULL, cp VARCHAR(6) NOT NULL, ville VARCHAR(70) NOT NULL, tel VARCHAR(14) NOT NULL, mail VARCHAR(100) NOT NULL, dateadhesion DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nuite (id INT AUTO_INCREMENT NOT NULL, nuite_inscription_id INT DEFAULT NULL, nuite_hotel_id INT DEFAULT NULL, INDEX IDX_8D4CB71562076210 (nuite_inscription_id), UNIQUE INDEX UNIQ_8D4CB7157623EF3 (nuite_hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, proposer_hotel_id INT DEFAULT NULL, INDEX IDX_21866C155AA645E9 (proposer_hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer_categorie_chambre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualite (id INT AUTO_INCREMENT NOT NULL, qualite_licencie_id INT DEFAULT NULL, libellequalite VARCHAR(50) NOT NULL, INDEX IDX_68B3575F76C061D6 (qualite_licencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_chambre ADD CONSTRAINT FK_9A8A4A5DD72D5F2B FOREIGN KEY (categorie_chambre_proposer_id) REFERENCES proposer (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38726B9F95FF FOREIGN KEY (club_licencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652609DC58FE0 FOREIGN KEY (compte_inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652609AAA45BB FOREIGN KEY (compte_licensie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB71562076210 FOREIGN KEY (nuite_inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7157623EF3 FOREIGN KEY (nuite_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C155AA645E9 FOREIGN KEY (proposer_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE qualite ADD CONSTRAINT FK_68B3575F76C061D6 FOREIGN KEY (qualite_licencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE atelier ADD atelier_vacation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB18232AA1F66C FOREIGN KEY (atelier_vacation_id) REFERENCES vacation (id)');
        $this->addSql('CREATE INDEX IDX_E1BB18232AA1F66C ON atelier (atelier_vacation_id)');
        $this->addSql('ALTER TABLE inscription ADD atelier_inscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DE6C4ABD FOREIGN KEY (atelier_inscription_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6DE6C4ABD ON inscription (atelier_inscription_id)');
        $this->addSql('ALTER TABLE inscription_restauration MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON inscription_restauration');
        $this->addSql('ALTER TABLE inscription_restauration ADD inscription_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB85DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB87C6CB929 FOREIGN KEY (restauration_id) REFERENCES restauration (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_FAFBDB85DAC5993 ON inscription_restauration (inscription_id)');
        $this->addSql('CREATE INDEX IDX_FAFBDB87C6CB929 ON inscription_restauration (restauration_id)');
        $this->addSql('ALTER TABLE inscription_restauration ADD PRIMARY KEY (inscription_id, restauration_id)');
        $this->addSql('ALTER TABLE theme ADD theme_atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E7081125F372 FOREIGN KEY (theme_atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_9775E7081125F372 ON theme (theme_atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB18232AA1F66C');
        $this->addSql('ALTER TABLE categorie_chambre DROP FOREIGN KEY FK_9A8A4A5DD72D5F2B');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38726B9F95FF');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652609DC58FE0');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652609AAA45BB');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB71562076210');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7157623EF3');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C155AA645E9');
        $this->addSql('ALTER TABLE qualite DROP FOREIGN KEY FK_68B3575F76C061D6');
        $this->addSql('DROP TABLE categorie_chambre');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE nuite');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE proposer_categorie_chambre');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE vacation');
        $this->addSql('DROP INDEX IDX_E1BB18232AA1F66C ON atelier');
        $this->addSql('ALTER TABLE atelier DROP atelier_vacation_id');
        $this->addSql('ALTER TABLE inscription_restauration DROP FOREIGN KEY FK_FAFBDB85DAC5993');
        $this->addSql('ALTER TABLE inscription_restauration DROP FOREIGN KEY FK_FAFBDB87C6CB929');
        $this->addSql('DROP INDEX IDX_FAFBDB85DAC5993 ON inscription_restauration');
        $this->addSql('DROP INDEX IDX_FAFBDB87C6CB929 ON inscription_restauration');
        $this->addSql('ALTER TABLE inscription_restauration ADD id INT AUTO_INCREMENT NOT NULL, DROP inscription_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DE6C4ABD');
        $this->addSql('DROP INDEX IDX_5E90F6D6DE6C4ABD ON inscription');
        $this->addSql('ALTER TABLE inscription DROP atelier_inscription_id');
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E7081125F372');
        $this->addSql('DROP INDEX IDX_9775E7081125F372 ON theme');
        $this->addSql('ALTER TABLE theme DROP theme_atelier_id');
    }
}
