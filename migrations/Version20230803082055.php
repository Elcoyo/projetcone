<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803082055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employes ADD prenom VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, DROP name, DROP firstname, DROP phone, DROP mail, DROP adress, CHANGE datedenaissance datedenaissance DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employes ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, DROP prenom, DROP nom, DROP telephone, DROP email, DROP adresse, CHANGE datedenaissance datedenaissance VARCHAR(255) NOT NULL');
    }
}
