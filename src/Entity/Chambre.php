<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambreRepository::class)]
class Chambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $apartenir_id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $tarifs_nuites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApartenirId(): ?int
    {
        return $this->apartenir_id;
    }

    public function setApartenirId(int $apartenir_id): static
    {
        $this->apartenir_id = $apartenir_id;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getTarifsNuites(): ?int
    {
        return $this->tarifs_nuites;
    }

    public function setTarifsNuites(int $tarifs_nuites): static
    {
        $this->tarifs_nuites = $tarifs_nuites;

        return $this;
    }
}
