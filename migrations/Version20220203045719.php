<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203045719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE like_city ADD cities_id INT DEFAULT NULL, DROP cities');
        $this->addSql('ALTER TABLE like_city ADD CONSTRAINT FK_F42EDE4ACAC75398 FOREIGN KEY (cities_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F42EDE4ACAC75398 ON like_city (cities_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CAC75398');
        $this->addSql('DROP INDEX IDX_8D93D649CAC75398 ON user');
        $this->addSql('ALTER TABLE user DROP cities_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE like_city DROP FOREIGN KEY FK_F42EDE4ACAC75398');
        $this->addSql('DROP INDEX IDX_F42EDE4ACAC75398 ON like_city');
        $this->addSql('ALTER TABLE like_city ADD cities VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP cities_id');
        $this->addSql('ALTER TABLE user ADD cities_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CAC75398 FOREIGN KEY (cities_id) REFERENCES like_city (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D649CAC75398 ON user (cities_id)');
    }
}
