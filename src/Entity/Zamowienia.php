<?php

namespace App\Entity;

use App\Repository\ZamowieniaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZamowieniaRepository::class)]
class Zamowienia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_zamowienia = null;

    #[ORM\Column]
    private ?int $id_produktu = null;

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

    public function getIdZamowienia(): ?int
    {
        return $this->id_zamowienia;
    }

    public function setIdZamowienia(int $id_zamowienia): self
    {
        $this->id_zamowienia = $id_zamowienia;

        return $this;
    }

    public function getIdProduktu(): ?int
    {
        return $this->id_produktu;
    }

    public function setIdProduktu(int $id_produktu): self
    {
        $this->id_produktu = $id_produktu;

        return $this;
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
