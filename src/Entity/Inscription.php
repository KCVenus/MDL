<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $licence_id = null;

    #[ORM\Column]
    private ?int $loger_id = null;

    #[ORM\Column]
    private ?int $etat_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_inscription = null;

    #[ORM\ManyToOne(inversedBy: 'atelierVacation')]
    private ?Atelier $atelierInscription = null;

    #[ORM\OneToMany(targetEntity: Nuite::class, mappedBy: 'nuiteInscription')]
    private Collection $inscriptionNuite;

    #[ORM\OneToMany(targetEntity: Compte::class, mappedBy: 'compteInscription')]
    private Collection $inscriptionCompte;

    #[ORM\ManyToMany(targetEntity: Restauration::class, inversedBy: 'restaurationInscription')]
    private Collection $inscriptionRestauration;

    public function __construct()
    {
        $this->inscriptionNuite = new ArrayCollection();
        $this->inscriptionCompte = new ArrayCollection();
        $this->inscriptionRestauration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicenceId(): ?int
    {
        return $this->licence_id;
    }

    public function setLicenceId(int $licence_id): static
    {
        $this->licence_id = $licence_id;

        return $this;
    }

    public function getLogerId(): ?int
    {
        return $this->loger_id;
    }

    public function setLogerId(int $loger_id): static
    {
        $this->loger_id = $loger_id;

        return $this;
    }

    public function getEtatId(): ?int
    {
        return $this->etat_id;
    }

    public function setEtatId(int $etat_id): static
    {
        $this->etat_id = $etat_id;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): static
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getAtelierInscription(): ?Atelier
    {
        return $this->atelierInscription;
    }

    public function setAtelierInscription(?Atelier $atelierInscription): static
    {
        $this->atelierInscription = $atelierInscription;

        return $this;
    }

    /**
     * @return Collection<int, Nuite>
     */
    public function getInscriptionNuite(): Collection
    {
        return $this->inscriptionNuite;
    }

    public function addInscriptionNuite(Nuite $inscriptionNuite): static
    {
        if (!$this->inscriptionNuite->contains($inscriptionNuite)) {
            $this->inscriptionNuite->add($inscriptionNuite);
            $inscriptionNuite->setNuiteInscription($this);
        }

        return $this;
    }

    public function removeInscriptionNuite(Nuite $inscriptionNuite): static
    {
        if ($this->inscriptionNuite->removeElement($inscriptionNuite)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionNuite->getNuiteInscription() === $this) {
                $inscriptionNuite->setNuiteInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Compte>
     */
    public function getInscriptionCompte(): Collection
    {
        return $this->inscriptionCompte;
    }

    public function addInscriptionCompte(Compte $inscriptionCompte): static
    {
        if (!$this->inscriptionCompte->contains($inscriptionCompte)) {
            $this->inscriptionCompte->add($inscriptionCompte);
            $inscriptionCompte->setCompteInscription($this);
        }

        return $this;
    }

    public function removeInscriptionCompte(Compte $inscriptionCompte): static
    {
        if ($this->inscriptionCompte->removeElement($inscriptionCompte)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionCompte->getCompteInscription() === $this) {
                $inscriptionCompte->setCompteInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restauration>
     */
    public function getInscriptionRestauration(): Collection
    {
        return $this->inscriptionRestauration;
    }

    public function addInscriptionRestauration(Restauration $inscriptionRestauration): static
    {
        if (!$this->inscriptionRestauration->contains($inscriptionRestauration)) {
            $this->inscriptionRestauration->add($inscriptionRestauration);
        }

        return $this;
    }

    public function removeInscriptionRestauration(Restauration $inscriptionRestauration): static
    {
        $this->inscriptionRestauration->removeElement($inscriptionRestauration);

        return $this;
    }
}
