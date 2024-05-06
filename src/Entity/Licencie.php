<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $numlicence = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[ORM\Column(length: 70)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 5)]
    private ?string $cp = null;

    #[ORM\Column(length: 70)]
    private ?string $ville = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateadhesion = null;

    #[ORM\Column]
    private ?float $idclub = null;

    #[ORM\Column]
    private ?float $idqualite = null;

    #[ORM\OneToOne(mappedBy: 'licencie', targetEntity: User::class, cascade: ['persist'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumlicence(): ?string
    {
        return $this->numlicence;
    }

    public function setNumlicence(string $numlicence): self
    {
        $this->numlicence = $numlicence;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): self
    {
        $this->adresse1 = $adresse1;
        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;
        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;
        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;
        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    public function getDateadhesion(): ?\DateTimeInterface
    {
        return $this->dateadhesion;
    }

    public function setDateadhesion(\DateTimeInterface $dateadhesion): self
    {
        $this->dateadhesion = $dateadhesion;
        return $this;
    }

    public function getIdclub(): ?float
    {
        return $this->idclub;
    }

    public function setIdclub(float $idclub): self
    {
        $this->idclub = $idclub;
        return $this;
    }

    public function getIdqualite(): ?float
    {
        return $this->idqualite;
    }

    public function setIdqualite(float $idqualite): self
    {
        $this->idqualite = $idqualite;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
