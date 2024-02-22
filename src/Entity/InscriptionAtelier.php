<?php

namespace App\Entity;

use App\Repository\InscriptionAtelierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionAtelierRepository::class)]
class InscriptionAtelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atelier_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtelierId(): ?int
    {
        return $this->atelier_id;
    }

    public function setAtelierId(int $atelier_id): static
    {
        $this->atelier_id = $atelier_id;

        return $this;
    }
}
