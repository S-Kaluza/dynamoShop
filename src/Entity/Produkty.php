<?php

namespace App\Entity;

use App\Repository\ProduktyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduktyRepository::class)]
class Produkty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 5120)]
    private ?string $opis = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column]
    private ?int $id_wyposazenia = null;

    #[ORM\Column]
    private ?float $cena = null;

    #[ORM\Column]
    private ?int $id_promocji = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $utworzone = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $zmodyfikowane = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $usuniete = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Kategoria $id_kategorii = null;

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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getIdWyposazenia(): ?int
    {
        return $this->id_wyposazenia;
    }

    public function setIdWyposazenia(int $id_wyposazenia): self
    {
        $this->id_wyposazenia = $id_wyposazenia;

        return $this;
    }

    public function getCena(): ?float
    {
        return $this->cena;
    }

    public function setCena(float $cena): self
    {
        $this->cena = $cena;

        return $this;
    }

    public function getIdPromocji(): ?int
    {
        return $this->id_promocji;
    }

    public function setIdPromocji(int $id_promocji): self
    {
        $this->id_promocji = $id_promocji;

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

    public function getIdKategorii(): ?kategoria
    {
        return $this->id_kategorii;
    }

    public function setIdKategorii(?kategoria $id_kategorii): self
    {
        $this->id_kategorii = $id_kategorii;

        return $this;
    }
}
