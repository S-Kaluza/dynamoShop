<?php

namespace App\Entity;

use App\Repository\PrzedmiotWKoszykuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrzedmiotWKoszykuRepository::class)]
class PrzedmiotWKoszyku
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_sesji = null;

    #[ORM\Column]
    private ?int $liczba = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $utworzone = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $zmodyfikowane = null;

    #[ORM\ManyToMany(targetEntity: produkty::class)]
    private Collection $id_produktu;

    public function __construct()
    {
        $this->id_produktu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSesji(): ?int
    {
        return $this->id_sesji;
    }

    public function setIdSesji(int $id_sesji): self
    {
        $this->id_sesji = $id_sesji;

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

    /**
     * @return Collection<int, produkty>
     */
    public function getIdProduktu(): Collection
    {
        return $this->id_produktu;
    }

    public function addIdProduktu(produkty $idProduktu): self
    {
        if (!$this->id_produktu->contains($idProduktu)) {
            $this->id_produktu->add($idProduktu);
        }

        return $this;
    }

    public function removeIdProduktu(produkty $idProduktu): self
    {
        $this->id_produktu->removeElement($idProduktu);

        return $this;
    }
}
