<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionCompte')]
    private ?Inscription $compteInscription = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?licencie $compteLicensie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteInscription(): ?Inscription
    {
        return $this->compteInscription;
    }

    public function setCompteInscription(?Inscription $compteInscription): static
    {
        $this->compteInscription = $compteInscription;

        return $this;
    }

    public function getCompteLicensie(): ?licencie
    {
        return $this->compteLicensie;
    }

    public function setCompteLicensie(?licencie $compteLicensie): static
    {
        $this->compteLicensie = $compteLicensie;

        return $this;
    }
}
