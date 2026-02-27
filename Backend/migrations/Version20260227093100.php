<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260227093100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, provider VARCHAR(30) NOT NULL, provider_ref VARCHAR(255) NOT NULL, amount INT NOT NULL, currency VARCHAR(5) NOT NULL, status VARCHAR(20) NOT NULL, paid_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, team_id INT NOT NULL, INDEX IDX_65D29B32296CD8AE (team_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payments DROP FOREIGN KEY FK_65D29B32296CD8AE');
        $this->addSql('DROP TABLE payments');
    }
}
