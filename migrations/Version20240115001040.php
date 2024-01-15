<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240115001040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sessions_exercice (sessions_id INT NOT NULL, exercice_id INT NOT NULL, PRIMARY KEY(sessions_id, exercice_id))');
        $this->addSql('CREATE INDEX IDX_DC5B2479F17C4D8C ON sessions_exercice (sessions_id)');
        $this->addSql('CREATE INDEX IDX_DC5B247989D40298 ON sessions_exercice (exercice_id)');
        $this->addSql('ALTER TABLE sessions_exercice ADD CONSTRAINT FK_DC5B2479F17C4D8C FOREIGN KEY (sessions_id) REFERENCES sessions (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sessions_exercice ADD CONSTRAINT FK_DC5B247989D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE sessions_exercice DROP CONSTRAINT FK_DC5B2479F17C4D8C');
        $this->addSql('ALTER TABLE sessions_exercice DROP CONSTRAINT FK_DC5B247989D40298');
        $this->addSql('DROP TABLE sessions_exercice');
    }
}
