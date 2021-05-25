<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525171123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE endroit (id INT AUTO_INCREMENT NOT NULL, age_min INT NOT NULL, age_max INT NOT NULL, description VARCHAR(500) NOT NULL, eco_friendly TINYINT(1) NOT NULL, nom VARCHAR(50) NOT NULL, photo VARCHAR(255) NOT NULL, price_min DOUBLE PRECISION NOT NULL, price_max DOUBLE PRECISION NOT NULL, target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', location VARCHAR(100) NOT NULL, open TIME NOT NULL, close TIME NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, age_min VARCHAR(255) NOT NULL, age_max INT NOT NULL, description VARCHAR(500) NOT NULL, eco_friendly TINYINT(1) NOT NULL, name VARCHAR(50) NOT NULL, photo VARCHAR(100) NOT NULL, price_min DOUBLE PRECISION NOT NULL, price_max DOUBLE PRECISION NOT NULL, target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', date DATE NOT NULL, duration INT NOT NULL, link VARCHAR(500) NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE indoor (id INT AUTO_INCREMENT NOT NULL, age_min INT NOT NULL, age_max INT NOT NULL, description VARCHAR(500) NOT NULL, eco_friendly TINYINT(1) NOT NULL, name VARCHAR(50) NOT NULL, photo VARCHAR(100) NOT NULL, price_min INT NOT NULL, price_max INT NOT NULL, target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE endroit');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE indoor');
    }
}
