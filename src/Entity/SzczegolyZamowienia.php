<?php

namespace App\Entity;

use App\Repository\SzczegolyZamowieniaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SzczegolyZamowieniaRepository::class)]
class SzczegolyZamowienia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_uzytkownika = null;

    #[ORM\Column]
    private ?int $id_platnosci = null;

    #[ORM\Column]
    private ?float $lacznie = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $utworzone = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $zmodyfikowane = null;

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

    public function getIdPlatnosci(): ?int
    {
        return $this->id_platnosci;
    }

    public function setIdPlatnosci(int $id_platnosci): self
    {
        $this->id_platnosci = $id_platnosci;

        return $this;
    }

    public function getLacznie(): ?float
    {
        return $this->lacznie;
    }

    public function setLacznie(float $lacznie): self
    {
        $this->lacznie = $lacznie;

        return $this;
    }

    public function getUtworzone(): ?\DateTimeInterface
    {
        return $this->utworzone;
    }

    public function setUtworzone(\DateTimeInterface $utworzone): self
    {
        $this->utworzone = $utworzone;

        return $this;
    }

    public function getZmodyfikowane(): ?\DateTimeInterface
    {
        return $this->zmodyfikowane;
    }

    public function setZmodyfikowane(\DateTimeInterface $zmodyfikowane): self
    {
        $this->zmodyfikowane = $zmodyfikowane;

        return $this;
    }
}
