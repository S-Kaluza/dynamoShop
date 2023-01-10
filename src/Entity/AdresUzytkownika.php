<?php

namespace App\Entity;

use App\Repository\AdresUzytkownikaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresUzytkownikaRepository::class)]
class AdresUzytkownika
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_uzytkownika = null;

    #[ORM\Column(length: 255)]
    private ?string $adres = null;

    #[ORM\Column(length: 255)]
    private ?string $miasto = null;

    #[ORM\Column(length: 255)]
    private ?string $kod_pocztowy = null;

    #[ORM\Column(length: 12)]
    private ?string $telefon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUzytkownika(): ?int
    {
        return $this->id_uzytkownika;
    }

    public function setIdUzytkownika(int $id_uzytkownika): self
    {
        $this->id_uzytkownika = $id_uzytkownika;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getMiasto(): ?string
    {
        return $this->miasto;
    }

    public function setMiasto(string $miasto): self
    {
        $this->miasto = $miasto;

        return $this;
    }

    public function getKodPocztowy(): ?string
    {
        return $this->kod_pocztowy;
    }

    public function setKodPocztowy(string $kod_pocztowy): self
    {
        $this->kod_pocztowy = $kod_pocztowy;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }
}
