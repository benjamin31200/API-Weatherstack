<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203110850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE list_city (id INT AUTO_INCREMENT NOT NULL, cities VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD list_city_id INT DEFAULT NULL, DROP cities');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64957E3BFA2 FOREIGN KEY (list_city_id) REFERENCES list_city (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64957E3BFA2 ON user (list_city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64957E3BFA2');
        $this->addSql('DROP TABLE list_city');
        $this->addSql('DROP INDEX IDX_8D93D64957E3BFA2 ON user');
        $this->addSql('ALTER TABLE user ADD cities VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP list_city_id');
    }
}
