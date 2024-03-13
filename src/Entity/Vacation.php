<?php

namespace App\Entity;

use App\Repository\VacationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VacationRepository::class)]
class Vacation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Atelier::class, mappedBy: 'atelierVacation')]
    private Collection $vacationAtelier;

    public function __construct()
    {
        $this->vacationAtelier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Atelier>
     */
    public function getVacationAtelier(): Collection
    {
        return $this->vacationAtelier;
    }

    public function addVacationAtelier(Atelier $vacationAtelier): static
    {
        if (!$this->vacationAtelier->contains($vacationAtelier)) {
            $this->vacationAtelier->add($vacationAtelier);
            $vacationAtelier->setAtelierVacation($this);
        }

        return $this;
    }

    public function removeVacationAtelier(Atelier $vacationAtelier): static
    {
        if ($this->vacationAtelier->removeElement($vacationAtelier)) {
            // set the owning side to null (unless already changed)
            if ($vacationAtelier->getAtelierVacation() === $this) {
                $vacationAtelier->setAtelierVacation(null);
            }
        }

        return $this;
    }
}
