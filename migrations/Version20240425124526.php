<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425124526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ability_type (ability_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_BB4857758016D8B2 (ability_id), INDEX IDX_BB485775C54C8C93 (type_id), PRIMARY KEY(ability_id, type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species_ability (species_id INT NOT NULL, ability_id INT NOT NULL, INDEX IDX_97519F73B2A1D860 (species_id), INDEX IDX_97519F738016D8B2 (ability_id), PRIMARY KEY(species_id, ability_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ability_type ADD CONSTRAINT FK_BB4857758016D8B2 FOREIGN KEY (ability_id) REFERENCES ability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ability_type ADD CONSTRAINT FK_BB485775C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE species_ability ADD CONSTRAINT FK_97519F73B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE species_ability ADD CONSTRAINT FK_97519F738016D8B2 FOREIGN KEY (ability_id) REFERENCES ability (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ability_type DROP FOREIGN KEY FK_BB4857758016D8B2');
        $this->addSql('ALTER TABLE ability_type DROP FOREIGN KEY FK_BB485775C54C8C93');
        $this->addSql('ALTER TABLE species_ability DROP FOREIGN KEY FK_97519F73B2A1D860');
        $this->addSql('ALTER TABLE species_ability DROP FOREIGN KEY FK_97519F738016D8B2');
        $this->addSql('DROP TABLE ability_type');
        $this->addSql('DROP TABLE species_ability');
    }
}
