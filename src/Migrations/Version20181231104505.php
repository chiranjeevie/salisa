<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181231104505 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE sync_history ADD module_name VARCHAR(255) NOT NULL, ADD module_entity VARCHAR(255) NOT NULL, ADD entity_id INT DEFAULT NULL, CHANGE source source MEDIUMTEXT NOT NULL, CHANGE error error MEDIUMTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE sync_history DROP module_name, DROP module_entity, DROP entity_id, CHANGE source source MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
