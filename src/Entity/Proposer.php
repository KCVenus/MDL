<?php

namespace App\Entity;

use App\Repository\ProposerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProposerRepository::class)]
class Proposer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'hotelProposer')]
    private ?Hotel $proposerHotel = null;

    #[ORM\OneToMany(targetEntity: categorieChambre::class, mappedBy: 'categorieChambreProposer')]
    private Collection $proposerCategorieChambre;

    public function __construct()
    {
        $this->proposerCategorieChambre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProposerHotel(): ?Hotel
    {
        return $this->proposerHotel;
    }

    public function setProposerHotel(?Hotel $proposerHotel): static
    {
        $this->proposerHotel = $proposerHotel;

        return $this;
    }

    /**
     * @return Collection<int, categorieChambre>
     */
    public function getProposerCategorieChambre(): Collection
    {
        return $this->proposerCategorieChambre;
    }

    public function addProposerCategorieChambre(categorieChambre $proposerCategorieChambre): static
    {
        if (!$this->proposerCategorieChambre->contains($proposerCategorieChambre)) {
            $this->proposerCategorieChambre->add($proposerCategorieChambre);
            $proposerCategorieChambre->setCategorieChambreProposer($this);
        }

        return $this;
    }

    public function removeProposerCategorieChambre(categorieChambre $proposerCategorieChambre): static
    {
        if ($this->proposerCategorieChambre->removeElement($proposerCategorieChambre)) {
            // set the owning side to null (unless already changed)
            if ($proposerCategorieChambre->getCategorieChambreProposer() === $this) {
                $proposerCategorieChambre->setCategorieChambreProposer(null);
            }
        }

        return $this;
    }
}
