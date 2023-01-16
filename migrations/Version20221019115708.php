<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019115708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscrire ADD user_id INT NOT NULL, ADD formation_id INT NOT NULL, DROP employe, DROP formation');
        $this->addSql('ALTER TABLE inscrire ADD CONSTRAINT FK_84CA37A8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscrire ADD CONSTRAINT FK_84CA37A85200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_84CA37A8A76ED395 ON inscrire (user_id)');
        $this->addSql('CREATE INDEX IDX_84CA37A85200282E ON inscrire (formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscrire DROP FOREIGN KEY FK_84CA37A8A76ED395');
        $this->addSql('ALTER TABLE inscrire DROP FOREIGN KEY FK_84CA37A85200282E');
        $this->addSql('DROP INDEX IDX_84CA37A8A76ED395 ON inscrire');
        $this->addSql('DROP INDEX IDX_84CA37A85200282E ON inscrire');
        $this->addSql('ALTER TABLE inscrire ADD employe VARCHAR(255) NOT NULL, ADD formation VARCHAR(255) NOT NULL, DROP user_id, DROP formation_id');
    }
}
