<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200402135536 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_name ADD category_id_id INT NOT NULL, ADD unit_id_id INT NOT NULL, ADD name LONGTEXT NOT NULL, ADD price NUMERIC(10, 2) NOT NULL, ADD quantity INT NOT NULL, ADD active_status TINYINT(1) NOT NULL, ADD note LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE product_name ADD CONSTRAINT FK_D3CB5CA79777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_name ADD CONSTRAINT FK_D3CB5CA7F476E05C FOREIGN KEY (unit_id_id) REFERENCES unit (id)');
        $this->addSql('CREATE INDEX IDX_D3CB5CA79777D11E ON product_name (category_id_id)');
        $this->addSql('CREATE INDEX IDX_D3CB5CA7F476E05C ON product_name (unit_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_name DROP FOREIGN KEY FK_D3CB5CA79777D11E');
        $this->addSql('ALTER TABLE product_name DROP FOREIGN KEY FK_D3CB5CA7F476E05C');
        $this->addSql('DROP INDEX IDX_D3CB5CA79777D11E ON product_name');
        $this->addSql('DROP INDEX IDX_D3CB5CA7F476E05C ON product_name');
        $this->addSql('ALTER TABLE product_name DROP category_id_id, DROP unit_id_id, DROP name, DROP price, DROP quantity, DROP active_status, DROP note');
    }
}
