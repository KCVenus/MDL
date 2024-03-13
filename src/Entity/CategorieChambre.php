<?php

namespace App\Entity;

use App\Repository\CategorieChambreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieChambreRepository::class)]
class CategorieChambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'proposerCategorieChambre')]
    private ?Proposer $categorieChambreProposer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieChambreProposer(): ?Proposer
    {
        return $this->categorieChambreProposer;
    }

    public function setCategorieChambreProposer(?Proposer $categorieChambreProposer): static
    {
        $this->categorieChambreProposer = $categorieChambreProposer;

        return $this;
    }
}
