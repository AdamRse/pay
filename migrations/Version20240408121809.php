<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408121809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address_line1 VARCHAR(255) NOT NULL, address_line2 VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, zipcode VARCHAR(15) NOT NULL, country VARCHAR(127) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, ts DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, biling_id INT DEFAULT NULL, shipping_id INT DEFAULT NULL, product VARCHAR(255) NOT NULL, payment_method VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, ts DATETIME NOT NULL, INDEX IDX_F5299398212664AB (biling_id), INDEX IDX_F52993984887F3F8 (shipping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398212664AB FOREIGN KEY (biling_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984887F3F8 FOREIGN KEY (shipping_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398212664AB');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984887F3F8');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
