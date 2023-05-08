<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Restaurant;
use App\Entity\Destination;
use App\Entity\Hotel;

class RestaurantController extends AbstractController
{
    #[Route('/restaurants', name: 'app_restaurants')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        //$repository = $entityManager->getRepository(Restaurant::class);
        //$restaurants = $repository->findAll();

        $repository_dest = $entityManager->getRepository(Destination::class);
        $destinations = $repository_dest->findAll();

        $repository_hotel = $entityManager->getRepository(Hotel::class);
        $hotels = $repository_hotel->findAll();

        return $this->render('restaurant/index.html.twig', [
            'destinations' => $destinations,
            'hotels' => $hotels,
            'topimg' => '/upload/restaurants/banner-all.jpg',
        ]);
    }

    #[Route('/restaurants/{slug}', name: 'app_restaurant')]
    public function show(string $slug, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Restaurant::class);
        $restaurant = $repository->findOneBy(['slug' => $slug]);

        if ($restaurant === null) throw new NotFoundHttpException('Restaurant was not found'); // This should activate the 404-page

        return $this->render('restaurant/restaurant.html.twig', [
            'topimg' => $restaurant->getBanner(),
            'restaurant' => $restaurant,
        ]);
    }
}
