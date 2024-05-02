<?php

namespace App\Outils;

use App\Entity\Atelier;
use App\Entity\Vacation;
use App\Entity\Theme;
use App\Repository\AtelierRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Classe d'outils pour gérer les opérations liées aux entités Atelier, Theme, et Vacation.
 */
class VATOutils {
    private $entityManager;
    private $atelierRepository;

    /**
     * Constructeur pour injecter les dépendances nécessaires.
     *
     * @param EntityManagerInterface $entityManager Gère les opérations sur la base de données.
     * @param AtelierRepository $atelierRepository Accède aux entités Atelier stockées.
     */
    public function __construct(EntityManagerInterface $entityManager, AtelierRepository $atelierRepository) {
        $this->entityManager = $entityManager;
        $this->atelierRepository = $atelierRepository;
    }

    /**
     * Crée un nouvel atelier et l'enregistre en base de données.
     *
     * @param string $libelle Nom de l'atelier.
     * @param int $nbPlacesMaxi Nombre maximum de places disponibles.
     */
    public function createAtelier(string $libelle, int $nbPlacesMaxi) {
        $atelier = new Atelier();
        $atelier->setLibelle($libelle);
        $atelier->setNbPlacesMaxi($nbPlacesMaxi);

        $this->entityManager->persist($atelier);
        $this->entityManager->flush();
    }

    /**
     * Crée un nouveau thème associé à un atelier existant.
     *
     * @param string $libelle Nom du thème.
     * @param int $atelierId Identifiant de l'atelier auquel le thème est associé.
     */
    public function createTheme(string $libelle, int $atelierId) {
        $atelier = $this->atelierRepository->find($atelierId);

        $theme = new Theme();
        $theme->setLibelle($libelle);
        $atelier->addTheme($theme);

        $this->entityManager->persist($theme);
        $this->entityManager->persist($atelier);
        $this->entityManager->flush();
    }

    /**
     * Crée une nouvelle vacation et l'associe à un atelier.
     *
     * @param string $dateDebut Date de début de la vacation.
     * @param string $dateFin Date de fin de la vacation.
     * @param int $atelierId Identifiant de l'atelier auquel la vacation est associée.
     */
    public function createVacation(string $dateDebut, string $dateFin, int $atelierId) {
        $atelier = $this->atelierRepository->find($atelierId);

        $vacation = new Vacation();
        $vacation->setDateHeureDebut($dateDebut);
        $vacation->setDateHeureFin($dateFin);
        $atelier->addVacation($vacation);

        $this->entityManager->persist(vacation);
        $this->entityManager->persist(atelier);
        $this->entityManager->flush();
    }
}
