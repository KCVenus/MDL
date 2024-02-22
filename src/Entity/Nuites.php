<?php

namespace App\Entity;

use App\Repository\NuitesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuitesRepository::class)]
class Nuites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $categorie_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_nuites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieId(): ?int
    {
        return $this->categorie_id;
    }

    public function setCategorieId(int $categorie_id): static
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    public function getDateNuites(): ?\DateTimeInterface
    {
        return $this->date_nuites;
    }

    public function setDateNuites(\DateTimeInterface $date_nuites): static
    {
        $this->date_nuites = $date_nuites;

        return $this;
    }
}
