<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    #[Route('/destinations', name: 'app_destinations')]
    public function index(): Response
    {
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
        ]);
    }

    #[Route('/destinations/{slug}', name: 'app_destination')]
    public function destination($slug): Response
    {
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController' . $slug,
        ]);
    }
}
