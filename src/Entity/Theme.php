<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atelier_id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    private ?Atelier $themeAtelier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtelierId(): ?int
    {
        return $this->atelier_id;
    }

    public function setAtelierId(int $atelier_id): static
    {
        $this->atelier_id = $atelier_id;

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

    public function getThemeAtelier(): ?Atelier
    {
        return $this->themeAtelier;
    }

    public function setThemeAtelier(?Atelier $themeAtelier): static
    {
        $this->themeAtelier = $themeAtelier;

        return $this;
    }
}
