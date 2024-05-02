<?php
namespace App\Controller;

use App\Form\AtelierFormType;
use App\Form\VacationFormType;
use App\Form\ThemeFormType;
use App\Repository\AtelierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Outils\VATOutils;

class CreateVAT extends AbstractController{
    
    private $vatOutils;

    // Injection de dépendance pour utiliser VATOutils dans le contrôleur
    public function __construct(VATOutils $vatOutils) {
        $this->vatOutils = $vatOutils;
    }
    
    #[Route('/admin/add_VAT', name: 'app_vat')] // Assurez-vous que c'est bien formaté
    public function addVAT(Request $request, AtelierRepository $atelierRepository): Response{
        // Récupère tous les ateliers et les organise pour la sélection dans le formulaire
        $ateliers = $atelierRepository->findAll();
        $atelierChoisi = [];
        foreach ($ateliers as $atelier){
            $atelierChoisi[$atelier->getLibelle()] = $atelier->getId();
        }
        
        // Création du formulaire avec des types de formulaires spécifiques
        $form = $this->createFormBuilder()
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Atelier' => 'atelier',
                    'Thème' => 'theme',
                    'Vacation' => 'vacation',
                ],
                'expanded' => true,
            ])
            ->add('atelier', AtelierFormType::class, [
                'required' => false,
                'label' => false
            ])
            ->add('theme', ThemeFormType::class, [
                'required' => false,
                'ateliers' => $atelierChoisi
            ])
            ->add('vacation', VacationFormType::class, [
                'required' => false,
                'ateliers' => $atelierChoisi
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            // Gestion des différentes entrées selon le type choisi
            switch ($formData['type']) {
                case 'atelier':
                    $this->vatOutils->createAtelier($formData['atelier']['libelle'], $formData['atelier']['nbPlacesMaxi']);
                    break;
                case 'theme':
                    $this->vatOutils->createTheme($formData['theme']['libelle'], $formData['theme']['atelier']);
                    break;
                case 'vacation':
                    $dates = $formData['vacation'];
                    if ($dates['dateDebut'] > $dates['dateFin']) {
                        $this->addFlash('errordate', 'Les dates ne correspondent pas');
                        return $this->redirectToRoute('app_vat');
                    }
                    $this->vatOutils->createVacation($dates['dateDebut']->format('Y-m-d H:i:s'), $dates['dateFin']->format('Y-m-d H:i:s'), $formData['vacation']['atelier']);
                    break;
            }

            $this->addFlash('success', 'Données enregistrées avec succès.');
            return $this->redirectToRoute('app_vat');
        }

        return $this->render('admin/addvat.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
