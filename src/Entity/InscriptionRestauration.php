<?php

namespace App\Entity;

use App\Repository\InscriptionRestaurationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRestaurationRepository::class)]
class InscriptionRestauration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $restauration_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurationId(): ?int
    {
        return $this->restauration_id;
    }

    public function setRestaurationId(int $restauration_id): static
    {
        $this->restauration_id = $restauration_id;

        return $this;
    }
}
