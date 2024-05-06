<?php

namespace App\Entity;

use App\Repository\RestaurationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: RestaurationRepository::class)]
class Restauration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateRestauration = null;

    #[ORM\Column(length: 100)]
    private ?string $typeRepas = null;

    #[ORM\ManyToOne(inversedBy: 'restaurations')]
    private ?Inscription $inscription = null;
    
    public function __construct()
{
    $this->restaurations = new ArrayCollection();
}


    public function getId(): ?int
    {
        return $this->id;
    }
    
    
    public function getDateRestauration(): ?\DateTimeInterface
    {
        return $this->dateRestauration;
    }

    public function setDateRestauration(\DateTimeInterface $dateRestauration): static
    {
        $this->dateRestauration = $dateRestauration;

        return $this;
    }

    public function getTypeRepas(): ?string
    {
        return $this->typeRepas;
    }

    public function setTypeRepas(string $typeRepas): static
    {
        $this->typeRepas = $typeRepas;

        return $this;
    }

    public function getInscription(): ?Inscription
    {
        return $this->inscription;
    }

    public function setInscription(?Inscription $inscription): static
    {
        $this->inscription = $inscription;

        return $this;
    }
    public function addRestauration(Restauration $restauration): self
{
    if (!$this->restaurations->contains($restauration)) {
        $this->restaurations[] = $restauration;
        $restauration->setInscription($this);
    }

    return $this;
}

public function removeRestauration(Restauration $restauration): self
{
    if ($this->restaurations->removeElement($restauration)) {
        // set the owning side to null (unless already changed)
        if ($restauration->getInscription() === $this) {
            $restauration->setInscription(null);
        }
    }

    return $this;
}

public function getRestaurations(): Collection
{
    return $this->restaurations;
}
}
