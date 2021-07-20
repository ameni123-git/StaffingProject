<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720204514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultants (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, seniority VARCHAR(20) NOT NULL, projects INT NOT NULL, UNIQUE INDEX UNIQ_BA9B4EF79D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE managers (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, seniority VARCHAR(50) NOT NULL, projects INT DEFAULT NULL, email VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_A949E0069D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(50) NOT NULL, position VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultants ADD CONSTRAINT FK_BA9B4EF79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE managers ADD CONSTRAINT FK_A949E0069D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultants DROP FOREIGN KEY FK_BA9B4EF79D86650F');
        $this->addSql('ALTER TABLE managers DROP FOREIGN KEY FK_A949E0069D86650F');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE consultants');
        $this->addSql('DROP TABLE managers');
        $this->addSql('DROP TABLE user');
    }
}
