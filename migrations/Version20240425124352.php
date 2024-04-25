<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425124352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ability (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, damage INT NOT NULL, pp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species_type (species_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_846C25FB2A1D860 (species_id), INDEX IDX_846C25FC54C8C93 (type_id), PRIMARY KEY(species_id, type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE species_type ADD CONSTRAINT FK_846C25FB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE species_type ADD CONSTRAINT FK_846C25FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE species_type DROP FOREIGN KEY FK_846C25FB2A1D860');
        $this->addSql('ALTER TABLE species_type DROP FOREIGN KEY FK_846C25FC54C8C93');
        $this->addSql('DROP TABLE ability');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE species_type');
    }
}
