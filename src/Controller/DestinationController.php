<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Destination;

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
    public function destination(string $slug, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Destination::class);
        $destination = $repository->findOneBy(['slug' => $slug]);
        if ($destination === null) throw new NotFoundHttpException('Destination was not found'); // This should activate the 404-page

        return $this->render('destination/destination.html.twig', [
            'destination' => $destination,
            'lands' => $destination->getLands(),
            'attractions' => $destination->getAttractions(),
            'restaurants' => $destination->getRestaurants(),
        ]);
    }
}
