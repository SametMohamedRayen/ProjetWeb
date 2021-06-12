<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612102602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE endroit ADD user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE event ADD user VARCHAR(255) NOT NULL, CHANGE age_min age_min INT NOT NULL');
        $this->addSql('ALTER TABLE indoor ADD user VARCHAR(255) NOT NULL, CHANGE price_min price_min DOUBLE PRECISION NOT NULL, CHANGE price_max price_max DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE endroit DROP user');
        $this->addSql('ALTER TABLE event DROP user, CHANGE age_min age_min VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE indoor DROP user, CHANGE price_min price_min INT NOT NULL, CHANGE price_max price_max INT NOT NULL');
    }
}
