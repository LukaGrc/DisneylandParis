<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Hotel;

class HotelController extends AbstractController
{
    #[Route('/hotels', name: 'app_hotels')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Hotel::class);
        $hotels = $repository->findAll();

        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotels,
            'topimg' => '/uploads/hotels/banner-all.jpg',
        ]);
    }

    #[Route('/hotels/{slug}', name: 'app_hotel')]
    public function show(string $slug, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Hotel::class);

        $hotels = $repository->findAll();
        $hotel = null;
        $other_hotels = [];
        foreach ($hotels as $hotell) {
            if ($hotell->getSlug() == $slug) {
                $hotel = $hotell;
            } else {
                array_push($other_hotels, $hotell);
            }
        }

        if ($hotel === null) throw new NotFoundHttpException('Hotel was not found'); // This should activate the 404-page

        return $this->render('hotel/hotel.html.twig', [
            'topimg' => $hotel->getBanner(),
            'hotel' => $hotel,
            'restaurants' => $hotel->getRestaurants(),
            'other_hotels' => $other_hotels,
        ]);
    }
}
