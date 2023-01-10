<?php

namespace App\Entity;

use App\Repository\PromocjaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromocjaRepository::class)]
class Promocja
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 5120)]
    private ?string $opis = null;

    #[ORM\Column]
    private ?float $procent_promocji = null;

    #[ORM\Column]
    private ?bool $aktywna = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $utworzone = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $zmodyfikowane = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $usuniete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }

    public function getProcentPromocji(): ?float
    {
        return $this->procent_promocji;
    }

    public function setProcentPromocji(float $procent_promocji): self
    {
        $this->procent_promocji = $procent_promocji;

        return $this;
    }

    public function isAktywna(): ?bool
    {
        return $this->aktywna;
    }

    public function setAktywna(bool $aktywna): self
    {
        $this->aktywna = $aktywna;

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

    public function getUsuniete(): ?\DateTimeInterface
    {
        return $this->usuniete;
    }

    public function setUsuniete(?\DateTimeInterface $usuniete): self
    {
        $this->usuniete = $usuniete;

        return $this;
    }
}
