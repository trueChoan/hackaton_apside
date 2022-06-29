<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629164525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain ADD project_id INT NOT NULL');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_A7A91E0B166D1F9C ON domain (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0B166D1F9C');
        $this->addSql('DROP INDEX IDX_A7A91E0B166D1F9C ON domain');
        $this->addSql('ALTER TABLE domain DROP project_id');
    }
}
