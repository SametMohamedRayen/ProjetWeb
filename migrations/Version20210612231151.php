<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612231151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endroit ADD target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE event ADD price DOUBLE PRECISION NOT NULL, ADD target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP price_min, DROP price_max');
        $this->addSql('ALTER TABLE indoor ADD target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endroit DROP target');
        $this->addSql('ALTER TABLE event ADD price_max DOUBLE PRECISION NOT NULL, DROP target, CHANGE price price_min DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE indoor DROP target');
    }
}
