<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181230034439 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB944F5D008');
        $this->addSql('ALTER TABLE course_seeker DROP FOREIGN KEY FK_2D654BBE44F5D008');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB912469DE2');
        $this->addSql('ALTER TABLE course_image DROP FOREIGN KEY FK_2C9603B7591CC992');
        $this->addSql('ALTER TABLE course_seeker_location DROP FOREIGN KEY FK_E6B37CB587D4151E');
        $this->addSql('ALTER TABLE course_image DROP FOREIGN KEY FK_2C9603B73DA5256D');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_image');
        $this->addSql('DROP TABLE course_seeker');
        $this->addSql('DROP TABLE course_seeker_location');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL, CHANGE error error MEDIUMTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, domain VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, subdomain VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, email_new_client VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, email_from VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, brand_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, seo_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, contact_phone VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, contact_phone1 VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, contact_email VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, category_limit INT DEFAULT 0, active_days INT DEFAULT 28, time_zone VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, user_id INT NOT NULL, brand_id INT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, date_of_course DATETIME NOT NULL, duration VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, price VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, method_of_study VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, course_level VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, take_place VARCHAR(30) DEFAULT NULL COLLATE utf8mb4_unicode_ci, locations VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, videos VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, cover SMALLINT DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_169E6FB944F5D008 (brand_id), INDEX IDX_169E6FB912469DE2 (category_id), INDEX IDX_169E6FB9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course_image (course_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_2C9603B7591CC992 (course_id), UNIQUE INDEX UNIQ_2C9603B73DA5256D (image_id), PRIMARY KEY(course_id, image_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course_seeker (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, user_id INT DEFAULT NULL, full_name VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, profile_image VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, is_suspended SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_2D654BBEA76ED395 (user_id), INDEX IDX_2D654BBE44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course_seeker_location (id INT AUTO_INCREMENT NOT NULL, course_seeker_id INT DEFAULT NULL, location_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, location_lat VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, locationlong VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, country VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, locality VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, region VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, postal_code VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, street_address VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_E6B37CB587D4151E (course_seeker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, updated_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, image_original_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, image_mime_type VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, image_size INT DEFAULT NULL, image_dimensions LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE course_image ADD CONSTRAINT FK_2C9603B73DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE course_image ADD CONSTRAINT FK_2C9603B7591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course_seeker ADD CONSTRAINT FK_2D654BBE44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE course_seeker ADD CONSTRAINT FK_2D654BBEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE course_seeker_location ADD CONSTRAINT FK_E6B37CB587D4151E FOREIGN KEY (course_seeker_id) REFERENCES course_seeker (id)');
        $this->addSql('ALTER TABLE netsuite_to_revel_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE revel_to_netsuite_history CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE scheduler CHANGE description description MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE sync_history CHANGE source source MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE error error MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
