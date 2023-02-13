<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230209205027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD nombreplace_id INT DEFAULT NULL, ADD price INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF8DF70224 FOREIGN KEY (nombreplace_id) REFERENCES inscrire (id)');
        $this->addSql('CREATE INDEX IDX_404021BF8DF70224 ON formation (nombreplace_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF8DF70224');
        $this->addSql('DROP INDEX IDX_404021BF8DF70224 ON formation');
        $this->addSql('ALTER TABLE formation DROP nombreplace_id, DROP price');
    }
}
