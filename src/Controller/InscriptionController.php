<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Mime\Email;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\AtelierRepository;
use App\Repository\HotelRepository;
use App\Repository\NuiteRepository;
use App\Repository\ProposerRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CategorieChambreRepository;
use App\Repository\RestaurationRepository;
use App\Entity\Restauration;
use Symfony\Component\Security\Core\Security;




class InscriptionController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
    
  #[Route('/inscription', name: 'app_inscription')]
    public function inscriptionCongres(Request $request, AtelierRepository $atelierRepository, HotelRepository $hotelRepository, ProposerRepository $proposerRepository, CategorieChambreRepository $categorieChambreRepository, RestaurationRepository $restaurationRepository) : Response
    {
      
       $user = $this->security->getUser();
        $ateliers = $atelierRepository->findAll();
        $hotels = $hotelRepository->findAll();
        $restaurations = $restaurationRepository->findAll();
        $categorieChambres = $categorieChambreRepository->findAll();

        // Liste les ateliers présents en bdd
        $atelierChoices = [];
        foreach ($ateliers as $atelier) {
            $atelierChoices[$atelier->getLibelle()] = $atelier->getId();
        }

        // Liste les hotels présents en bdd
        $hotelChoices = [];
        foreach ($hotels as $hotel) {
            $hotelChoices[$hotel->getPnom()] = $hotel->getId();
        }

        // Récupère les catégories liées aux chambres
        $categorieChoices = [];
        foreach ($categorieChambres as $categorie) {
            $categorieChoices[$categorie->getLibelleCategorie()] = $categorie->getId();
        }

        // Récupère les restaurations
        $restauraionsChoices = [];
        foreach ($restaurations as $restauration) {
            $restauraionsChoices[$restauration->getTypeRepas()] = $restauration->getId();
        }

        // Création du formulaire
        $form = $this->createFormBuilder()

            ->add('email', EmailType::class, ['label' => 'Modifier votre adresse email', 'required' => false])
            ->add('ateliers', ChoiceType::class, [
                'choices' => $atelierChoices,
                'expanded' => true,
                'multiple' => true,
                'label' => 'Choisir les ateliers'
            ])
            ->add('dateNuiteeD', DateType::class, ['widget' => 'single_text', 'label' => 'Choisir la date de début de nuitée'])
            ->add('dateNuiteeF', DateType::class, ['widget' => 'single_text', 'label' => 'Choisir la date de fin de nuitée'])
            ->add('hotel', ChoiceType::class, ['choices' => $hotelChoices, 'label' => 'Choisir votre hôtel'])
            ->add('categorie', ChoiceType::class, ['choices' => $categorieChoices, 'label' => 'Choisir la catégorie de chambre'])
            ->add('restauration', ChoiceType::class, ['choices' => $restauraionsChoices, 'label' => 'Choisir la restauration'])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer l\'inscription'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer les données ici
            $data = $form->getData();
            $email = $data['email'];
            $ateliers = $data['ateliers'];
            $datenuiteed = $data['dateNuiteeD'];
            $datenuiteef = $data['dateNuiteeF'];
            $categorieId = $data['categorie'];
            $restaurationId = $data['restauration'];
            $hotelId = $data['hotel'];

            // Récupère l'hotel
            $hotel = $hotelRepository->find($hotelId);

            // Récupère la restauration
            $restauration = $restaurationRepository->find($restaurationId);

            // Récuper la catégorie
            $categorie = $categorieChambreRepository->find($categorieId);

            // R2cupère la liste des ateliers
            $ateliersChoisis = [];
            foreach ($ateliers as $atelierId) {
                $atelier = $atelierRepository->find($atelierId);
                if ($atelier) {
                    $ateliersChoisis[] = $atelier->getLibelle();
                }
            }

            // Calcul du nombre de nuits
            $interval = $datenuiteed->diff($datenuiteef);
            $nights = $interval->days;

        // Si la diff des nuits est incorrecte
            if ($nights < 1) {

                // Affichage d'un modal
                $this->addFlash('errornights', "Veuillez vérifier les dates. La date de fin doit être après la date de début.");
                return $this->redirectToRoute('app_inscription_congres');
            }

            // Récupérer le tarif pour l'hôtel choisi
            $tarif = $proposerRepository->findOneBy(['hotels' => $hotelId, 'categorieChambre' => $categorieId]);

        // Si tarif n'existe pas
            if (!$tarif) {

                // Affiche un modal si aucune offre n'existe pour cet hotel
                $this->addFlash('errorTarif', "Le tarif pour l'hôtel sélectionné n'est pas disponible.");
                return $this->redirectToRoute('app_inscription_congres');
            }

            // Renvoie le coût total des nuitées
            $totalAmount = $nights * $tarif->getTarifNuite();

            // Construction de la liste des ateliers
            $listeAteliers = implode(", ", $ateliersChoisis);

            // génère un token aléatoire
            $token = bin2hex(random_bytes(16));

            // Récupère le numéro du licencié
            $numerolicencie = $user->getNumlicence();

            // Génère un lien renvoyant le token et le numéro du licencié
            $link = $this->generateUrl('confirmation', ['token' => $token, 'numLicencie' => $numerolicencie], UrlGeneratorInterface::ABSOLUTE_URL);

            // Construction du message de l'email
            $messageEmail = "Merci pour votre inscription. Voici le résumé de votre inscription au congrès :\n";
            $messageEmail .= "Email : " . $user->getEmail() . "\n";
            $messageEmail .= "Hotel : " . $hotel->getPnom() . "\n";
            $messageEmail .= "Restauration : " . $restauration->getTypeRepas() . "\n";
            $messageEmail .= "Catégorie de chambre : " . $categorie->getLibelleCategorie() . "\n";
            $messageEmail .= "Nombre de nuits : " . $nights . "\n";
            $messageEmail .= "Ateliers choisis : " . $listeAteliers . "\n";
            $messageEmail .= "Montant dû : $totalAmount €.";
            $messageEmail .= "Lien de confirmation: $link ";

            // Envoi de l'email de confirmation
            $this->mailerService->sendEmail(
                'no-reply@votrecongres.com',
                $user->getEmail(),
                'Confirmation d\'inscription au congrès',
                $messageEmail
            );

            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $user->setEmail($email);

                // Enregistre le nouvel e-mail dans la base de données
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            }

            // renvoie vers l'accueil avec affichage d'un modal
            $this->addFlash('InscriCongres', 'Attente Validation Mail');
            return $this->redirectToRoute('app_inscription');
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * renvoie vers la page d'accueil après vérification du lien
     */
    #[Route('/confirmation/{token}/{numLicencie}', name: 'confirmation')]
    public function confirmation(Request $request, string $token, string $numLicencie): Response
    {
        $this->addFlash('successInscriCongres', 'Votre inscription a été confirmée avec succès.');
        return $this->redirectToRoute('accueil');
    }
}