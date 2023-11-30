<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130211412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grades (id INT AUTO_INCREMENT NOT NULL, grade_eu VARCHAR(2) NOT NULL, grade_usa VARCHAR(2) NOT NULL, value NUMERIC(3, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, name VARCHAR(55) NOT NULL, surname VARCHAR(55) NOT NULL, date_of_birth DATE NOT NULL, pesel VARCHAR(11) NOT NULL, gender TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A4698DB2F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_addresses (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(150) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(15) NOT NULL, street VARCHAR(255) NOT NULL, building_number VARCHAR(15) NOT NULL, apartment_number VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2F5B7AF75 FOREIGN KEY (address_id) REFERENCES students_addresses (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB2F5B7AF75');
        $this->addSql('DROP TABLE grades');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE students_addresses');
    }
}
