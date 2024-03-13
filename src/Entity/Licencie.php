<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numlicence = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[ORM\Column(length: 70)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 6)]
    private ?string $cp = null;

    #[ORM\Column(length: 70)]
    private ?string $ville = null;

    #[ORM\Column(length: 14)]
    private ?string $tel = null;

    #[ORM\Column(length: 100)]
    private ?string $mail = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateadhesion = null;

    #[ORM\OneToMany(targetEntity: qualite::class, mappedBy: 'qualiteLicencie')]
    private Collection $licensieQualite;

    #[ORM\OneToMany(targetEntity: club::class, mappedBy: 'clubLicencie')]
    private Collection $licencieClub;

    public function __construct()
    {
        $this->licensieQualite = new ArrayCollection();
        $this->licencieClub = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumlicence(): ?int
    {
        return $this->numlicence;
    }

    public function setNumlicence(int $numlicence): static
    {
        $this->numlicence = $numlicence;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): static
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(string $adresse2): static
    {
        $this->adresse2 = $adresse2;

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

    public function getDateadhesion(): ?\DateTimeInterface
    {
        return $this->dateadhesion;
    }

    public function setDateadhesion(\DateTimeInterface $dateadhesion): static
    {
        $this->dateadhesion = $dateadhesion;

        return $this;
    }

    /**
     * @return Collection<int, qualite>
     */
    public function getLicensieQualite(): Collection
    {
        return $this->licensieQualite;
    }

    public function addLicensieQualite(qualite $licensieQualite): static
    {
        if (!$this->licensieQualite->contains($licensieQualite)) {
            $this->licensieQualite->add($licensieQualite);
            $licensieQualite->setQualiteLicencie($this);
        }

        return $this;
    }

    public function removeLicensieQualite(qualite $licensieQualite): static
    {
        if ($this->licensieQualite->removeElement($licensieQualite)) {
            // set the owning side to null (unless already changed)
            if ($licensieQualite->getQualiteLicencie() === $this) {
                $licensieQualite->setQualiteLicencie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, club>
     */
    public function getLicencieClub(): Collection
    {
        return $this->licencieClub;
    }

    public function addLicencieClub(club $licencieClub): static
    {
        if (!$this->licencieClub->contains($licencieClub)) {
            $this->licencieClub->add($licencieClub);
            $licencieClub->setClubLicencie($this);
        }

        return $this;
    }

    public function removeLicencieClub(club $licencieClub): static
    {
        if ($this->licencieClub->removeElement($licencieClub)) {
            // set the owning side to null (unless already changed)
            if ($licencieClub->getClubLicencie() === $this) {
                $licencieClub->setClubLicencie(null);
            }
        }

        return $this;
    }
}
