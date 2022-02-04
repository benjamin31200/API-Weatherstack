<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202122500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_city ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE list_city ADD CONSTRAINT FK_6895DDDDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6895DDDDA76ED395 ON list_city (user_id)');
        $this->addSql('ALTER TABLE user DROP city');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_city DROP FOREIGN KEY FK_6895DDDDA76ED395');
        $this->addSql('DROP INDEX IDX_6895DDDDA76ED395 ON list_city');
        $this->addSql('ALTER TABLE list_city DROP user_id');
        $this->addSql('ALTER TABLE user ADD city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
