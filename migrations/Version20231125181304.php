<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125181304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doctors (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(55) NOT NULL, INDEX IDX_B67687BED60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors_specializations (doctors_id INT NOT NULL, specializations_id INT NOT NULL, INDEX IDX_869637586425CC19 (doctors_id), INDEX IDX_869637586458BC80 (specializations_id), PRIMARY KEY(doctors_id, specializations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nurses (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(55) NOT NULL, INDEX IDX_F409A14CD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nurses_specializations (nurses_id INT NOT NULL, specializations_id INT NOT NULL, INDEX IDX_49B885E9D101846C (nurses_id), INDEX IDX_49B885E96458BC80 (specializations_id), PRIMARY KEY(nurses_id, specializations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patients (id INT AUTO_INCREMENT NOT NULL, doctor_id INT DEFAULT NULL, role_id INT NOT NULL, name VARCHAR(55) NOT NULL, birth_date DATE NOT NULL, adress VARCHAR(255) NOT NULL, INDEX IDX_2CCC2E2C87F4FB17 (doctor_id), INDEX IDX_2CCC2E2CD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receptionists (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_10247886D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specializations (id INT AUTO_INCREMENT NOT NULL, specialization_name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doctors ADD CONSTRAINT FK_B67687BED60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE doctors_specializations ADD CONSTRAINT FK_869637586425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_specializations ADD CONSTRAINT FK_869637586458BC80 FOREIGN KEY (specializations_id) REFERENCES specializations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nurses ADD CONSTRAINT FK_F409A14CD60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE nurses_specializations ADD CONSTRAINT FK_49B885E9D101846C FOREIGN KEY (nurses_id) REFERENCES nurses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nurses_specializations ADD CONSTRAINT FK_49B885E96458BC80 FOREIGN KEY (specializations_id) REFERENCES specializations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT FK_2CCC2E2C87F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctors (id)');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT FK_2CCC2E2CD60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE receptionists ADD CONSTRAINT FK_10247886D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctors DROP FOREIGN KEY FK_B67687BED60322AC');
        $this->addSql('ALTER TABLE doctors_specializations DROP FOREIGN KEY FK_869637586425CC19');
        $this->addSql('ALTER TABLE doctors_specializations DROP FOREIGN KEY FK_869637586458BC80');
        $this->addSql('ALTER TABLE nurses DROP FOREIGN KEY FK_F409A14CD60322AC');
        $this->addSql('ALTER TABLE nurses_specializations DROP FOREIGN KEY FK_49B885E9D101846C');
        $this->addSql('ALTER TABLE nurses_specializations DROP FOREIGN KEY FK_49B885E96458BC80');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2C87F4FB17');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2CD60322AC');
        $this->addSql('ALTER TABLE receptionists DROP FOREIGN KEY FK_10247886D60322AC');
        $this->addSql('DROP TABLE doctors');
        $this->addSql('DROP TABLE doctors_specializations');
        $this->addSql('DROP TABLE nurses');
        $this->addSql('DROP TABLE nurses_specializations');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE receptionists');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE specializations');
    }
}
