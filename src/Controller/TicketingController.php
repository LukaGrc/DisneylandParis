<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\TicketType;

class TicketingController extends AbstractController
{
    #[Route('/ticketing', name: 'app_ticketing')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(TicketType::class);

        $ticketTypes = $repository->findAll();

        $tickets_one = [];
        $tickets_two = [];

        // Sort tickets 1 park / 2 parks
        foreach ($ticketTypes as $ticketType) {
            if ($ticketType->getNbParks() === 1) {
                $tickets_one[] = $ticketType;
            } else {
                $tickets_two[] = $ticketType;
            }
        }

        return $this->render('ticketing/index.html.twig', [
            'tickets_one' => $tickets_one,
            'tickets_two' => $tickets_two,
            'topimg' => '/uploads/pages/banner-ticketing.jpg',
        ]);
    }


    #[Route('/ticketing/order-tickets', name: 'app_ticketing_order')]
    public function order(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(TicketType::class);

        $ticketTypes = $repository->findAll();

        $tickets_one = [];
        $tickets_two = [];

        // Sort tickets 1 park / 2 parks
        foreach ($ticketTypes as $ticketType) {
            if ($ticketType->getNbParks() === 1) {
                $tickets_one[] = $ticketType;
            } else {
                $tickets_two[] = $ticketType;
            }
        }

        return $this->render('ticketing/order.html.twig', [
            'tickets_one' => $tickets_one,
            'tickets_two' => $tickets_two,
            'topimg' => '/uploads/pages/banner-ticketing.jpg',
        ]);
    }
}
