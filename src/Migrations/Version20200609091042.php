<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609091042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_89A4AB15A4AEAFEA');
        $this->addSql('DROP INDEX idx_89a4ab15a4aeafea ON salarie');
        $this->addSql('CREATE INDEX IDX_828E3A1AA4AEAFEA ON salarie (entreprise_id)');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_89A4AB15A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_828E3A1AA4AEAFEA');
        $this->addSql('DROP INDEX idx_828e3a1aa4aeafea ON salarie');
        $this->addSql('CREATE INDEX IDX_89A4AB15A4AEAFEA ON salarie (entreprise_id)');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_828E3A1AA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }
}
