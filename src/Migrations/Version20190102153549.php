<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190102153549 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE items (id INT AUTO_INCREMENT NOT NULL, sku VARCHAR(255) NOT NULL, displayname VARCHAR(255) NOT NULL, displayname_ar VARCHAR(255) NOT NULL, description_ar VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, onlineprice NUMERIC(10, 2) NOT NULL, availableqty VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, cust_id VARCHAR(255) NOT NULL, isactive TINYINT(1) NOT NULL, firstname VARCHAR(255) NOT NULL, lastsname VARCHAR(255) NOT NULL, firstname_ar VARCHAR(255) NOT NULL, lastsname_ar VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, passwordhash VARCHAR(255) NOT NULL, lastorderdate INT NOT NULL, loyaltypoints VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, customerid VARCHAR(255) NOT NULL, deliveryoption VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, netamount VARCHAR(255) NOT NULL, phonenumber VARCHAR(255) NOT NULL, contactemail VARCHAR(255) NOT NULL, discountammount VARCHAR(255) NOT NULL, orderdate VARCHAR(255) NOT NULL, loyaltypointsearned VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL, CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE items');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE orders');
        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
