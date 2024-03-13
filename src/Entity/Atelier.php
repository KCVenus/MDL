<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $vacation_id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $nb_places = null;

    #[ORM\OneToMany(targetEntity: Theme::class, mappedBy: 'themeAtelier')]
    private Collection $themes;

    #[ORM\OneToMany(targetEntity: inscription::class, mappedBy: 'atelierInscription')]
    private Collection $inscriptions;

    #[ORM\ManyToOne(inversedBy: 'vacationAtelier')]
    private ?vacation $atelierVacation = null;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->atelierVacation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVacationId(): ?int
    {
        return $this->vacation_id;
    }

    public function setVacationId(int $vacation_id): static
    {
        $this->vacation_id = $vacation_id;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nb_places;
    }

    public function setNbPlaces(int $nb_places): static
    {
        $this->nb_places = $nb_places;

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Theme $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
            $relation->setThemeAtelier($this);
        }

        return $this;
    }

    public function removeRelation(Theme $relation): static
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getThemeAtelier() === $this) {
                $relation->setThemeAtelier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, inscription>
     */
    public function getAtelierVacation(): Collection
    {
        return $this->atelierVacation;
    }

    public function addAtelierVacation(inscription $atelierVacation): static
    {
        if (!$this->atelierVacation->contains($atelierVacation)) {
            $this->atelierVacation->add($atelierVacation);
            $atelierVacation->setAtelierInscription($this);
        }

        return $this;
    }

    public function removeAtelierVacation(inscription $atelierVacation): static
    {
        if ($this->atelierVacation->removeElement($atelierVacation)) {
            // set the owning side to null (unless already changed)
            if ($atelierVacation->getAtelierInscription() === $this) {
                $atelierVacation->setAtelierInscription(null);
            }
        }

        return $this;
    }

    public function setAtelierVacation(?vacation $atelierVacation): static
    {
        $this->atelierVacation = $atelierVacation;

        return $this;
    }
}
