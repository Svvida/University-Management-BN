<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127180533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients ADD last_name VARCHAR(55) NOT NULL, ADD country VARCHAR(55) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD gender VARCHAR(255) NOT NULL, ADD pesel VARCHAR(255) NOT NULL, CHANGE name first_name VARCHAR(55) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients ADD name VARCHAR(55) NOT NULL, DROP first_name, DROP last_name, DROP country, DROP phone, DROP email, DROP gender, DROP pesel');
    }
}
