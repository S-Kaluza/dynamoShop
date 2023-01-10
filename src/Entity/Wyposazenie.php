<?php

namespace App\Entity;

use App\Repository\WyposazenieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WyposazenieRepository::class)]
class Wyposazenie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $liczba = null;

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

    public function getLiczba(): ?int
    {
        return $this->liczba;
    }

    public function setLiczba(int $liczba): self
    {
        $this->liczba = $liczba;

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
