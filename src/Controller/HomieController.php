<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomieController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request): Response
    {
        // Ton code ici
        
        return $this->render('landing_page/index_new.html.twig');
    }
    
    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        $token = $this->getParameter('apitoken');
        return $this->render('landing_page/confirmation.html.twig');
    }
}