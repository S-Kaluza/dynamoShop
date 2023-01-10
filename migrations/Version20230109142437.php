<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109142437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adres_uzytkownika_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE kategoria_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE klienci_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE platnosc_uzytkownika_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE produkty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE promocja_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE przedmiot_wkoszyku_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sesja_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE szczegoly_platnosci_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE szczegoly_zamowienia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE wyposazenie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE zamowienia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adres_uzytkownika (id INT NOT NULL, id_uzytkownika INT NOT NULL, adres VARCHAR(255) NOT NULL, miasto VARCHAR(255) NOT NULL, kod_pocztowy VARCHAR(255) NOT NULL, telefon VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE kategoria (id INT NOT NULL, nazwa VARCHAR(255) NOT NULL, opis VARCHAR(5120) NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, usuniete TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE klienci (id INT NOT NULL, nazwa_uzytkownika VARCHAR(255) NOT NULL, haslo VARCHAR(255) NOT NULL, imie VARCHAR(255) NOT NULL, nazwisko VARCHAR(255) NOT NULL, telefon VARCHAR(255) NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE platnosc_uzytkownika (id INT NOT NULL, id_uzytkownika INT NOT NULL, typ_platnosci VARCHAR(255) NOT NULL, operator VARCHAR(255) NOT NULL, numer_konta INT NOT NULL, wygasa DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE produkty (id INT NOT NULL, id_kategorii_id INT NOT NULL, name VARCHAR(255) NOT NULL, opis VARCHAR(5120) NOT NULL, sku VARCHAR(255) NOT NULL, id_wyposazenia INT NOT NULL, cena DOUBLE PRECISION NOT NULL, id_promocji INT NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, usuniete TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5D7CE2FCD3EE5B19 ON produkty (id_kategorii_id)');
        $this->addSql('CREATE TABLE promocja (id INT NOT NULL, name VARCHAR(255) NOT NULL, opis VARCHAR(5120) NOT NULL, procent_promocji DOUBLE PRECISION NOT NULL, aktywna BOOLEAN NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, usuniete TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE przedmiot_wkoszyku (id INT NOT NULL, id_sesji INT NOT NULL, liczba INT NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE przedmiot_wkoszyku_produkty (przedmiot_wkoszyku_id INT NOT NULL, produkty_id INT NOT NULL, PRIMARY KEY(przedmiot_wkoszyku_id, produkty_id))');
        $this->addSql('CREATE INDEX IDX_D76AA0BB90433D61 ON przedmiot_wkoszyku_produkty (przedmiot_wkoszyku_id)');
        $this->addSql('CREATE INDEX IDX_D76AA0BBEF64E3A0 ON przedmiot_wkoszyku_produkty (produkty_id)');
        $this->addSql('CREATE TABLE sesja (id INT NOT NULL, id_uzytkownika INT NOT NULL, lacznie DOUBLE PRECISION NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE szczegoly_platnosci (id INT NOT NULL, id_zamowienia INT NOT NULL, ilosc INT NOT NULL, operator VARCHAR(255) NOT NULL, status VARCHAR(50) NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE szczegoly_zamowienia (id INT NOT NULL, id_uzytkownika INT NOT NULL, id_platnosci INT NOT NULL, lacznie DOUBLE PRECISION NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE wyposazenie (id INT NOT NULL, liczba INT NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, usuniete TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE zamowienia (id INT NOT NULL, id_zamowienia INT NOT NULL, id_produktu INT NOT NULL, liczba INT NOT NULL, utworzone TIMESTAMP(0) WITH TIME ZONE NOT NULL, zmodyfikowane TIMESTAMP(0) WITH TIME ZONE NOT NULL, usuniete TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE produkty ADD CONSTRAINT FK_5D7CE2FCD3EE5B19 FOREIGN KEY (id_kategorii_id) REFERENCES kategoria (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE przedmiot_wkoszyku_produkty ADD CONSTRAINT FK_D76AA0BB90433D61 FOREIGN KEY (przedmiot_wkoszyku_id) REFERENCES przedmiot_wkoszyku (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE przedmiot_wkoszyku_produkty ADD CONSTRAINT FK_D76AA0BBEF64E3A0 FOREIGN KEY (produkty_id) REFERENCES produkty (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adres_uzytkownika_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE kategoria_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE klienci_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE platnosc_uzytkownika_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produkty_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE promocja_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE przedmiot_wkoszyku_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sesja_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE szczegoly_platnosci_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE szczegoly_zamowienia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE wyposazenie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE zamowienia_id_seq CASCADE');
        $this->addSql('ALTER TABLE produkty DROP CONSTRAINT FK_5D7CE2FCD3EE5B19');
        $this->addSql('ALTER TABLE przedmiot_wkoszyku_produkty DROP CONSTRAINT FK_D76AA0BB90433D61');
        $this->addSql('ALTER TABLE przedmiot_wkoszyku_produkty DROP CONSTRAINT FK_D76AA0BBEF64E3A0');
        $this->addSql('DROP TABLE adres_uzytkownika');
        $this->addSql('DROP TABLE kategoria');
        $this->addSql('DROP TABLE klienci');
        $this->addSql('DROP TABLE platnosc_uzytkownika');
        $this->addSql('DROP TABLE produkty');
        $this->addSql('DROP TABLE promocja');
        $this->addSql('DROP TABLE przedmiot_wkoszyku');
        $this->addSql('DROP TABLE przedmiot_wkoszyku_produkty');
        $this->addSql('DROP TABLE sesja');
        $this->addSql('DROP TABLE szczegoly_platnosci');
        $this->addSql('DROP TABLE szczegoly_zamowienia');
        $this->addSql('DROP TABLE wyposazenie');
        $this->addSql('DROP TABLE zamowienia');
    }
}
