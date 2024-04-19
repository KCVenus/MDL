<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ApiService;

use App\Repository\AtelierRepository;
use App\Repository\ThemeRepository;
use App\Repository\VacationRepository;
use App\Repository\HotelRepository;


class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_acceuil')]
    public function index(AtelierRepository $atelierRepo, ThemeRepository $themeRepo, VacationRepository $vacationRepo, HotelRepository $hotelRepo): Response {
        $ateliers = $atelierRepo->findAll();
        $themes = $themeRepo->findAll();
        $vacation = $vacationRepo->findAll();
        $hotels = $hotelRepo->findAll();


        
        return $this->render('home/home.html.twig', [
            'ateliers' => $ateliers,
            'themes'   => $themes,
            'vacations' => $vacation,
            'hotels'   => $hotels 
        ]);           
    }
   
    #[Route('/club/{id}', name: 'app_club_id')]
    public function getClub($id, ApiService $des): Response
    {
        $club = $des->getClub($id);
        return new Response($club->getNom());     
    }
}
