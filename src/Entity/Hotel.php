<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\OneToMany(targetEntity: proposer::class, mappedBy: 'proposerHotel')]
    private Collection $hotelProposer;

    public function __construct()
    {
        $this->hotelProposer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection<int, proposer>
     */
    public function getHotelProposer(): Collection
    {
        return $this->hotelProposer;
    }

    public function addHotelProposer(proposer $hotelProposer): static
    {
        if (!$this->hotelProposer->contains($hotelProposer)) {
            $this->hotelProposer->add($hotelProposer);
            $hotelProposer->setProposerHotel($this);
        }

        return $this;
    }

    public function removeHotelProposer(proposer $hotelProposer): static
    {
        if ($this->hotelProposer->removeElement($hotelProposer)) {
            // set the owning side to null (unless already changed)
            if ($hotelProposer->getProposerHotel() === $this) {
                $hotelProposer->setProposerHotel(null);
            }
        }

        return $this;
    }
}
