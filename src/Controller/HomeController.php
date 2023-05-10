<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Destination;
use App\Entity\Nouveaute;
use App\Entity\Hotel;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('home/index.html.twig', [
            'withoutheader' => true,
            'destinations' => $entityManager->getRepository(Destination::class)->findAll(),
            'nouveautes' => $entityManager->getRepository(Nouveaute::class)->findAll(),
            'hotels' => $entityManager->getRepository(Hotel::class)->findAll(),
        ]);
    }
}
