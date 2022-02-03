<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202133032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_city DROP FOREIGN KEY FK_6895DDDD38D34460');
        $this->addSql('DROP INDEX UNIQ_6895DDDD38D34460 ON list_city');
        $this->addSql('ALTER TABLE list_city CHANGE city_like_id like_city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE list_city ADD CONSTRAINT FK_6895DDDDD821288C FOREIGN KEY (like_city_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6895DDDDD821288C ON list_city (like_city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_city DROP FOREIGN KEY FK_6895DDDDD821288C');
        $this->addSql('DROP INDEX UNIQ_6895DDDDD821288C ON list_city');
        $this->addSql('ALTER TABLE list_city CHANGE like_city_id city_like_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE list_city ADD CONSTRAINT FK_6895DDDD38D34460 FOREIGN KEY (city_like_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6895DDDD38D34460 ON list_city (city_like_id)');
    }
}
