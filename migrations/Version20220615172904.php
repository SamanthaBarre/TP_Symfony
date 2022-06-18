<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615172904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, prenom VARCHAR(200) NOT NULL, nom VARCHAR(200) NOT NULL, telephone VARCHAR(200) NOT NULL, email VARCHAR(200) NOT NULL, adresse VARCHAR(200) NOT NULL, poste VARCHAR(200) NOT NULL, salaire INTEGER NOT NULL, dt_naissance DATE NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employes');
    }
}
