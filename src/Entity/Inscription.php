<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
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
}
