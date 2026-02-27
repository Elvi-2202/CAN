<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260227094509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_terms_acceptance (id INT AUTO_INCREMENT NOT NULL, accepted TINYINT NOT NULL, accepted_at DATETIME NOT NULL, terms_version VARCHAR(50) DEFAULT NULL, ip_adress VARCHAR(55) DEFAULT NULL, user_agent LONGTEXT DEFAULT NULL, team_id INT NOT NULL, UNIQUE INDEX UNIQ_B20D7CA8296CD8AE (team_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE team_terms_acceptance ADD CONSTRAINT FK_B20D7CA8296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_terms_acceptance DROP FOREIGN KEY FK_B20D7CA8296CD8AE');
        $this->addSql('DROP TABLE team_terms_acceptance');
    }
}
