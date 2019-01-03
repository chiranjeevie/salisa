<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181230065340 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL, CHANGE error error MEDIUMTEXT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user DROP gplus_token, DROP linkedin_token, DROP fb_token');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD gplus_token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD linkedin_token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD fb_token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
