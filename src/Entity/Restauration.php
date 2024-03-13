<?php

namespace App\Entity;

use App\Repository\RestaurationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurationRepository::class)]
class Restauration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_restauration = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToMany(targetEntity: Inscription::class, mappedBy: 'inscriptionRestauration')]
    private Collection $restaurationInscription;

    public function __construct()
    {
        $this->restaurationInscription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRestauration(): ?\DateTimeInterface
    {
        return $this->date_restauration;
    }

    public function setDateRestauration(\DateTimeInterface $date_restauration): static
    {
        $this->date_restauration = $date_restauration;

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

    /**
     * @return Collection<int, Inscription>
     */
    public function getRestaurationInscription(): Collection
    {
        return $this->restaurationInscription;
    }

    public function addRestaurationInscription(Inscription $restaurationInscription): static
    {
        if (!$this->restaurationInscription->contains($restaurationInscription)) {
            $this->restaurationInscription->add($restaurationInscription);
            $restaurationInscription->addInscriptionRestauration($this);
        }

        return $this;
    }

    public function removeRestaurationInscription(Inscription $restaurationInscription): static
    {
        if ($this->restaurationInscription->removeElement($restaurationInscription)) {
            $restaurationInscription->removeInscriptionRestauration($this);
        }

        return $this;
    }
}
