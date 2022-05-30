<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517192401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP INDEX category ON clientes');
        $this->addSql('CREATE INDEX IDX_50FE07D712469DE2 ON clientes (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientes DROP FOREIGN KEY FK_50FE07D712469DE2');
        $this->addSql('ALTER TABLE clientes DROP FOREIGN KEY FK_50FE07D712469DE2');
        $this->addSql('DROP INDEX idx_50fe07d712469de2 ON clientes');
        $this->addSql('CREATE INDEX category ON clientes (category_id)');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }
}
