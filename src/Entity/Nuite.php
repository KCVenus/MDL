<?php

namespace App\Entity;

use App\Repository\NuiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuiteRepository::class)]
class Nuite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionNuite')]
    private ?Inscription $nuiteInscription = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?hotel $nuiteHotel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuiteInscription(): ?Inscription
    {
        return $this->nuiteInscription;
    }

    public function setNuiteInscription(?Inscription $nuiteInscription): static
    {
        $this->nuiteInscription = $nuiteInscription;

        return $this;
    }

    public function getNuiteHotel(): ?hotel
    {
        return $this->nuiteHotel;
    }

    public function setNuiteHotel(?hotel $nuiteHotel): static
    {
        $this->nuiteHotel = $nuiteHotel;

        return $this;
    }
}
