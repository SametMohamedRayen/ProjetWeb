<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612140838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endroit ADD user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE event ADD price_max DOUBLE PRECISION NOT NULL, ADD user VARCHAR(255) NOT NULL, CHANGE price price_min DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE indoor ADD user VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endroit DROP user');
        $this->addSql('ALTER TABLE event ADD price DOUBLE PRECISION NOT NULL, DROP price_min, DROP price_max, DROP user');
        $this->addSql('ALTER TABLE indoor DROP user');
    }
}
