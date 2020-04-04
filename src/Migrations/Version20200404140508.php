<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404140508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE car_specifications (id INT AUTO_INCREMENT NOT NULL, max_speed VARCHAR(5) NOT NULL, fuel VARCHAR(5) NOT NULL, torque VARCHAR(5) NOT NULL, horsepower VARCHAR(5) NOT NULL, fuel_consumption VARCHAR(5) NOT NULL, gear VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_mark_model (id INT AUTO_INCREMENT NOT NULL, car_mark_id INT NOT NULL, car_model_id INT NOT NULL, INDEX IDX_35FF4D54113B0AF7 (car_mark_id), INDEX IDX_35FF4D54F64382E3 (car_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_mark_model ADD CONSTRAINT FK_35FF4D54113B0AF7 FOREIGN KEY (car_mark_id) REFERENCES car_mark (id)');
        $this->addSql('ALTER TABLE car_mark_model ADD CONSTRAINT FK_35FF4D54F64382E3 FOREIGN KEY (car_model_id) REFERENCES car_model (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE car_specifications');
        $this->addSql('DROP TABLE car_mark_model');
    }
}
