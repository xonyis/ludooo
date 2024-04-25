<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425124701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE species_species (species_source INT NOT NULL, species_target INT NOT NULL, INDEX IDX_791865DA68A4250 (species_source), INDEX IDX_791865DBF6F12DF (species_target), PRIMARY KEY(species_source, species_target)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE species_species ADD CONSTRAINT FK_791865DA68A4250 FOREIGN KEY (species_source) REFERENCES species (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE species_species ADD CONSTRAINT FK_791865DBF6F12DF FOREIGN KEY (species_target) REFERENCES species (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE species_species DROP FOREIGN KEY FK_791865DA68A4250');
        $this->addSql('ALTER TABLE species_species DROP FOREIGN KEY FK_791865DBF6F12DF');
        $this->addSql('DROP TABLE species_species');
    }
}
