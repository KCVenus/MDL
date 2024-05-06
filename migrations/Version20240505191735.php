<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240505191735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_nuite (inscription_id INT NOT NULL, nuite_id INT NOT NULL, INDEX IDX_DF05E3585DAC5993 (inscription_id), INDEX IDX_DF05E358A84291E2 (nuite_id), PRIMARY KEY(inscription_id, nuite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_nuite ADD CONSTRAINT FK_DF05E3585DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_nuite ADD CONSTRAINT FK_DF05E358A84291E2 FOREIGN KEY (nuite_id) REFERENCES nuite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nuite ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('CREATE INDEX IDX_8D4CB715BCF5E72D ON nuite (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_nuite DROP FOREIGN KEY FK_DF05E3585DAC5993');
        $this->addSql('ALTER TABLE inscription_nuite DROP FOREIGN KEY FK_DF05E358A84291E2');
        $this->addSql('DROP TABLE inscription_nuite');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715BCF5E72D');
        $this->addSql('DROP INDEX IDX_8D4CB715BCF5E72D ON nuite');
        $this->addSql('ALTER TABLE nuite DROP categorie_id');
    }
}
