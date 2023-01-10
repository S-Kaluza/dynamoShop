<?php

namespace App\Entity;

use App\Repository\SzczegolyPlatnosciRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SzczegolyPlatnosciRepository::class)]
class SzczegolyPlatnosci
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_zamowienia = null;

    #[ORM\Column]
    private ?int $ilosc = null;

    #[ORM\Column(length: 255)]
    private ?string $operator = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $utworzone = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $zmodyfikowane = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdZamowienia(): ?int
    {
        return $this->id_zamowienia;
    }

    public function setIdZamowienia(int $id_zamowienia): self
    {
        $this->id_zamowienia = $id_zamowienia;

        return $this;
    }

    public function getIlosc(): ?int
    {
        return $this->ilosc;
    }

    public function setIlosc(int $ilosc): self
    {
        $this->ilosc = $ilosc;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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
