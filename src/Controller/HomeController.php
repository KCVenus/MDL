<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ApiService;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
       return $this->render("home/home.html.twig");
       
    }

    
    #[Route('/club/{id}', name: 'app_club_id')]
    public function getClub($id, ApiService $des): Response
    {
        $club = $des->getClub($id);
        return new Response($club->getNom());
               
    }
}
