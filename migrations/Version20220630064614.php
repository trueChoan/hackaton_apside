<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630064614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD tech_stack_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE31C0AE9B FOREIGN KEY (tech_stack_id) REFERENCES tech_stack (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE31C0AE9B ON project (tech_stack_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE31C0AE9B');
        $this->addSql('DROP INDEX IDX_2FB3D0EE31C0AE9B ON project');
        $this->addSql('ALTER TABLE project DROP tech_stack_id');
    }
}
