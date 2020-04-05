<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404142948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, mark_model_id INT NOT NULL, color_id INT NOT NULL, engine_id INT NOT NULL, chassis_id INT DEFAULT NULL, specifications_id INT NOT NULL, vin VARCHAR(50) NOT NULL, date_create DATETIME NOT NULL, INDEX IDX_773DE69DCBA92E59 (mark_model_id), INDEX IDX_773DE69D7ADA1FB5 (color_id), INDEX IDX_773DE69DE78C9C0A (engine_id), INDEX IDX_773DE69D63EE729 (chassis_id), INDEX IDX_773DE69DBDE4EC11 (specifications_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DCBA92E59 FOREIGN KEY (mark_model_id) REFERENCES car_mark_model (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES car_color (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DE78C9C0A FOREIGN KEY (engine_id) REFERENCES car_engine (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D63EE729 FOREIGN KEY (chassis_id) REFERENCES car_chassis (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DBDE4EC11 FOREIGN KEY (specifications_id) REFERENCES car_specifications (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE car');
    }
}
