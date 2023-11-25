<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125151107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, roles_id INT NOT NULL, name VARCHAR(55) NOT NULL, INDEX IDX_880E0D7638C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctor (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, specializations_id INT NOT NULL, name VARCHAR(55) NOT NULL, UNIQUE INDEX UNIQ_1FC0F36AD60322AC (role_id), INDEX IDX_1FC0F36A6458BC80 (specializations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specializations (id INT AUTO_INCREMENT NOT NULL, specialization_name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D7638C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36AD60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A6458BC80 FOREIGN KEY (specializations_id) REFERENCES specializations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D7638C751C4');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36AD60322AC');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36A6458BC80');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE specializations');
    }
}
