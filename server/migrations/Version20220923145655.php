<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923145655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, company_id INT NOT NULL, updated_by_id INT NOT NULL, group_name VARCHAR(255) NOT NULL, group_status VARCHAR(255) NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6DC044C5979B1AD6 ON "group" (company_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5896DBBDE ON "group" (updated_by_id)');
        $this->addSql('COMMENT ON COLUMN "group".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE message (id INT NOT NULL, group_id INT NOT NULL, user_id INT NOT NULL, updated_by_id INT NOT NULL, message_status VARCHAR(255) NOT NULL, message TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6BD307FFE54D947 ON message (group_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76ED395 ON message (user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F896DBBDE ON message (updated_by_id)');
        $this->addSql('COMMENT ON COLUMN message.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN message.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE meta (id INT NOT NULL, user_id INT NOT NULL, company_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D7F21435A76ED395 ON meta (user_id)');
        $this->addSql('CREATE INDEX IDX_D7F21435979B1AD6 ON meta (company_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, role INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_group (id INT NOT NULL, user_id INT NOT NULL, group_id INT NOT NULL, notifications INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8F02BF9DA76ED395 ON user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_8F02BF9DFE54D947 ON user_group (group_id)');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5896DBBDE FOREIGN KEY (updated_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE meta ADD CONSTRAINT FK_D7F21435A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE meta ADD CONSTRAINT FK_D7F21435979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9DFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5979B1AD6');
        $this->addSql('ALTER TABLE meta DROP CONSTRAINT FK_D7F21435979B1AD6');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FFE54D947');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9DFE54D947');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5896DBBDE');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307F896DBBDE');
        $this->addSql('ALTER TABLE meta DROP CONSTRAINT FK_D7F21435A76ED395');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9DA76ED395');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE meta');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_group');
    }
}
