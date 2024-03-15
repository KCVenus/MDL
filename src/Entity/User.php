<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numlicencie = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?bool $isverified = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumlicencie(): ?string
    {
        return $this->numlicencie;
    }

    public function setNumlicencie(string $numlicencie): static
    {
        $this->numlicencie = $numlicencie;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function isIsverified(): ?bool
    {
        return $this->isverified;
    }

    public function setIsverified(bool $isverified): static
    {
        $this->isverified = $isverified;

        return $this;
    }
}
