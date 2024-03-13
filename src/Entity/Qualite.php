<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libellequalite = null;

    #[ORM\ManyToOne(inversedBy: 'licensieQualite')]
    private ?Licencie $qualiteLicencie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellequalite(): ?string
    {
        return $this->libellequalite;
    }

    public function setLibellequalite(string $libellequalite): static
    {
        $this->libellequalite = $libellequalite;

        return $this;
    }

    public function getQualiteLicencie(): ?Licencie
    {
        return $this->qualiteLicencie;
    }

    public function setQualiteLicencie(?Licencie $qualiteLicencie): static
    {
        $this->qualiteLicencie = $qualiteLicencie;

        return $this;
    }
}
