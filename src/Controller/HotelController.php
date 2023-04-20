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
        ]);
    }

    #[Route('/hotels/{slug}', name: 'app_hotel')]
    public function show(string $slug, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Hotel::class);
        $hotel = $repository->findOneBy(['slug' => $slug]);
        if ($hotel === null) throw new NotFoundHttpException('Hotel was not found'); // This should activate the 404-page

        return $this->render('hotel/hotel.html.twig', [
            'hotel' => $hotel,
        ]);
    }
}
