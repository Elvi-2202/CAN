<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260226221954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(20) NOT NULL, total_amount INT NOT NULL, currency VARCHAR(5) NOT NULL, created_at DATETIME NOT NULL, update_at DATETIME NOT NULL, nation_id INT NOT NULL, INDEX IDX_96C22258AE3899 (nation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258AE3899 FOREIGN KEY (nation_id) REFERENCES nation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258AE3899');
        $this->addSql('DROP TABLE teams');
    }
}
