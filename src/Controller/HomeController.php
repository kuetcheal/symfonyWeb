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

    #[Route('/navbar/{name}/{location}', name: 'navbar.index', methods: ['GET'])]
    public function inscription($name, $location): Response
    {
        return $this->render('navbar.html.twig', [
        'nom' => $name,
        'lieu' => $location              ]);
    }
}