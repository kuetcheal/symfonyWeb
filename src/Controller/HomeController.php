<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // #[Route('/', name: 'home.index', methods: ['GET'])]
    #[Route('/', name: 'connexion.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('connexion.html.twig');
    }

    // #[Route('/navbar/{name}/{location}', name: 'navbar.index', methods: ['GET'])]
    // public function inscription($name, $location): Response
    // {
    //     return $this->render('navbar.html.twig', [
    //     'nom' => $name,
    //     'lieu' => $location]);
    // }
    #[Route('navbar', name: 'navbar.index', methods: ['GET'])]
    public function inscription(): Response
    {
        return $this->render('navbar.html.twig');
    }

    
    #[Route('partiel/nav', name: 'nav.index', methods: ['GET'])]
    public function navigation(): Response
    {
        return $this->render('nav.html.twig');
    }
}