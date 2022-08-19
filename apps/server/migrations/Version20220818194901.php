<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220818194901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "group_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE message_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE meta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_message_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, company_id_id INT NOT NULL, created_by_id INT NOT NULL, group_name VARCHAR(255) NOT NULL, group_status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6DC044C538B53C32 ON "group" (company_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6DC044C5B03A8386 ON "group" (created_by_id)');
        $this->addSql('COMMENT ON COLUMN "group".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE message (id INT NOT NULL, group_id_id INT NOT NULL, author_id INT NOT NULL, updated_by_id INT NOT NULL, message_status VARCHAR(255) NOT NULL, message TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6BD307F2F68B530 ON message (group_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307FF675F31B ON message (author_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307F896DBBDE ON message (updated_by_id)');
        $this->addSql('COMMENT ON COLUMN message.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN message.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE meta (id INT NOT NULL, user_id_id INT NOT NULL, company_id_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D7F214359D86650F ON meta (user_id_id)');
        $this->addSql('CREATE INDEX IDX_D7F2143538B53C32 ON meta (company_id_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, role INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_group (id INT NOT NULL, user_id_id INT NOT NULL, group_id_id INT NOT NULL, added_by_id INT NOT NULL, updated_by_id INT NOT NULL, user_status VARCHAR(255) NOT NULL, notifications BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8F02BF9D9D86650F ON user_group (user_id_id)');
        $this->addSql('CREATE INDEX IDX_8F02BF9D2F68B530 ON user_group (group_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F02BF9D55B127A4 ON user_group (added_by_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F02BF9D896DBBDE ON user_group (updated_by_id)');
        $this->addSql('COMMENT ON COLUMN user_group.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN user_group.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE user_message (id INT NOT NULL, user_id_id INT NOT NULL, message_id_id INT NOT NULL, read_status BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EEB02E759D86650F ON user_message (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EEB02E7580E261BC ON user_message (message_id_id)');
        $this->addSql('COMMENT ON COLUMN user_message.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN user_message.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C538B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5B03A8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F2F68B530 FOREIGN KEY (group_id_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE meta ADD CONSTRAINT FK_D7F214359D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE meta ADD CONSTRAINT FK_D7F2143538B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9D9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9D2F68B530 FOREIGN KEY (group_id_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9D55B127A4 FOREIGN KEY (added_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_message ADD CONSTRAINT FK_EEB02E759D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_message ADD CONSTRAINT FK_EEB02E7580E261BC FOREIGN KEY (message_id_id) REFERENCES message (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C538B53C32');
        $this->addSql('ALTER TABLE meta DROP CONSTRAINT FK_D7F2143538B53C32');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307F2F68B530');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9D2F68B530');
        $this->addSql('ALTER TABLE user_message DROP CONSTRAINT FK_EEB02E7580E261BC');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5B03A8386');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FF675F31B');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307F896DBBDE');
        $this->addSql('ALTER TABLE meta DROP CONSTRAINT FK_D7F214359D86650F');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9D9D86650F');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9D55B127A4');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9D896DBBDE');
        $this->addSql('ALTER TABLE user_message DROP CONSTRAINT FK_EEB02E759D86650F');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "group_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE message_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE meta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE user_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_message_id_seq CASCADE');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE meta');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_group');
        $this->addSql('DROP TABLE user_message');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
