<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128150311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, poste_id INT NOT NULL, duree INT NOT NULL, salaire DOUBLE PRECISION NOT NULL, date_signature DATETIME NOT NULL, periode_preavis INT NOT NULL, duree_travail_hebdo INT NOT NULL, clause_supp VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) NOT NULL, date_resiliation DATETIME DEFAULT NULL, date_modification DATETIME DEFAULT NULL, INDEX IDX_603499931B65292 (employe_id), INDEX IDX_60349993A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, numero_cni INT NOT NULL, date_naissance DATETIME NOT NULL, UNIQUE INDEX UNIQ_F804D3B9FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, emmetteur_id INT NOT NULL, recepteur_id INT NOT NULL, type SMALLINT NOT NULL, piece_jointe VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu VARCHAR(255) DEFAULT NULL, non_lu TINYINT(1) NOT NULL, date_envoi DATETIME NOT NULL, date_lu DATETIME DEFAULT NULL, visible_emetteur TINYINT(1) NOT NULL, visible_recepteur TINYINT(1) NOT NULL, INDEX IDX_B6BD307F6389A352 (emmetteur_id), INDEX IDX_B6BD307F3B49782D (recepteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, designation_poste VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, ancien_poste_id INT NOT NULL, nouveau_poste_id INT NOT NULL, date_promo DATETIME NOT NULL, INDEX IDX_C11D7DD11B65292 (employe_id), INDEX IDX_C11D7DD1EB66A8BD (ancien_poste_id), INDEX IDX_C11D7DD1CE81D502 (nouveau_poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sanction (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, date_sanction DATETIME NOT NULL, duree_sanction INT DEFAULT NULL, date_annulation DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sanction_employe (sanction_id INT NOT NULL, employe_id INT NOT NULL, INDEX IDX_445944DC96E0C11A (sanction_id), INDEX IDX_445944DC1B65292 (employe_id), PRIMARY KEY(sanction_id, employe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64912B2DC9C (matricule), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499931B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F6389A352 FOREIGN KEY (emmetteur_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3B49782D FOREIGN KEY (recepteur_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD11B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1EB66A8BD FOREIGN KEY (ancien_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1CE81D502 FOREIGN KEY (nouveau_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE sanction_employe ADD CONSTRAINT FK_445944DC96E0C11A FOREIGN KEY (sanction_id) REFERENCES sanction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sanction_employe ADD CONSTRAINT FK_445944DC1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499931B65292');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993A0905086');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9FB88E14F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F6389A352');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3B49782D');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD11B65292');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1EB66A8BD');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1CE81D502');
        $this->addSql('ALTER TABLE sanction_employe DROP FOREIGN KEY FK_445944DC96E0C11A');
        $this->addSql('ALTER TABLE sanction_employe DROP FOREIGN KEY FK_445944DC1B65292');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE sanction');
        $this->addSql('DROP TABLE sanction_employe');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
