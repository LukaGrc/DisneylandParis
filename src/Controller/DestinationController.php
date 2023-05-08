<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Destination;
use App\Entity\Land;

class DestinationController extends AbstractController
{
    #[Route('/destinations', name: 'app_destinations')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Destination::class);
        $destinations = $repository->findAll();

        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
            'topimg' => '/uploads/destinations/banner-all.jpg',
            'destinations' => $destinations,
        ]);
    }

    #[Route('/destinations/{slug}', name: 'app_destination')]
    public function destination(string $slug, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Destination::class);
        //$destination = $repository->findOneBy(['slug' => $slug]);

        $destinations = $repository->findAll();
        $destination = null;
        $other_destinations = [];
        foreach ($destinations as $dest) {
            if ($dest->getSlug() == $slug) {
                $destination = $dest;
            } else {
                array_push($other_destinations, $dest);
            }
        }
        

        if ($destination === null) throw new NotFoundHttpException('Destination was not found'); // This should activate the 404-page

        return $this->render('destination/destination.html.twig', [
            'controller_name' => 'DestinationController',
            'topimg' => $destination->getBanner(),
            'destination' => $destination,
            'lands' => $destination->getLands(),
            'attractions' => $destination->getAttractions(),
            'restaurants' => $destination->getRestaurants(),
            'other_destinations' => $other_destinations,
        ]);
    }

    #[Route('/destinations/{slug_dest}/{slug_land}', name: 'app_destination_land')]
    public function destinationLand(string $slug_dest, string $slug_land, EntityManagerInterface $entityManager): Response
    {
        $repository_dest = $entityManager->getRepository(Destination::class);
        $destination = $repository_dest->findOneBy(['slug' => $slug_dest]);
        if ($destination === null) throw new NotFoundHttpException('Destination was not found'); // This should activate the 404-page

        $repository_land = $entityManager->getRepository(Land::class);
        $land = $repository_land->findOneBy(['slug' => $slug_land]);
        if ($land === null || $land->getDestination()->getId() != $destination->getId()) throw new NotFoundHttpException('Land was not found'); // This should activate the 404-page

        return $this->render('destination/land.html.twig', [
            'destination' => $destination,
            'land' => $land,
            'attractions' => $land->getAttractions(),
            'restaurants' => $land->getRestaurants(),
        ]);
    }
}
