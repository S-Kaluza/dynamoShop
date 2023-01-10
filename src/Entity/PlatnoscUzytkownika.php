<?php

namespace App\Entity;

use App\Repository\PlatnoscUzytkownikaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatnoscUzytkownikaRepository::class)]
class PlatnoscUzytkownika
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_uzytkownika = null;

    #[ORM\Column(length: 255)]
    private ?string $typ_platnosci = null;

    #[ORM\Column(length: 255)]
    private ?string $operator = null;

    #[ORM\Column]
    private ?int $numer_konta = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $wygasa = null;

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

    public function getTypPlatnosci(): ?string
    {
        return $this->typ_platnosci;
    }

    public function setTypPlatnosci(string $typ_platnosci): self
    {
        $this->typ_platnosci = $typ_platnosci;

        return $this;
    }

    public function getOperator(): ?string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): self
    {
        $this->operator = $operator;

        return $this;
    }

    public function getNumerKonta(): ?int
    {
        return $this->numer_konta;
    }

    public function setNumerKonta(int $numer_konta): self
    {
        $this->numer_konta = $numer_konta;

        return $this;
    }

    public function getWygasa(): ?\DateTimeInterface
    {
        return $this->wygasa;
    }

    public function setWygasa(\DateTimeInterface $wygasa): self
    {
        $this->wygasa = $wygasa;

        return $this;
    }
}
