<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Hotel;
use App\Entity\HotelRoomType;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'app_booking')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Get parameters from URL
        $request = Request::createFromGlobals();
        $people = $request->query->get('people');
        $arrival = $request->query->get('arrival');
        $departure = $request->query->get('departure');

        $repository = $entityManager->getRepository(Hotel::class);
        $hotels = $repository->findAll();

        return $this->render('booking/index.html.twig', [
            'topimg' => '/uploads/pages/banner-booking.jpg',
            'hotels' => $hotels,
            'people' => $people,
            'arrival' => $arrival,
            'departure' => $departure,
        ]);
    }

    #[Route('/booking/choose-hotel', name: 'app_booking_hotel')]
    public function chooseHotel(EntityManagerInterface $entityManager): Response
    {
        // Get parameters from URL
        $request = Request::createFromGlobals();
        $people = $request->query->get('people');
        $arrival = $request->query->get('arrival');
        $departure = $request->query->get('departure');

        if (!$people || !$arrival || !$departure) {
            throw new NotFoundHttpException('Missing parameters');
        } else {
            $arrivalDate = date_create_from_format('Y-m-d', $arrival);
            $departureDate = date_create_from_format('Y-m-d', $departure);
        }

        if ($people < 1 || $people > 8) {
            throw new NotFoundHttpException('Invalid number of people');
        }

        if (strtotime($arrival) < time()) {
            throw new NotFoundHttpException('Invalid arrival date');
        }

        if (strtotime($departure) <= strtotime($arrival)) {
            throw new NotFoundHttpException('Invalid departure date');
        }

        if (strtotime($departure) > strtotime($arrival) + 5 * 24 * 60 * 60) {
            throw new NotFoundHttpException('Maximum stay is 5 days');
        }

        // Get number of nights

        $interval = $arrivalDate->diff($departureDate);
        $nights = $interval->format('%a');

        // Get all hotels
        $repository = $entityManager->getRepository(Hotel::class);
        $allHotels = $repository->findAll();

        $availableHotels = [];
        $lowerPrices = [];

        // Foreach hotel get all room types
        foreach ($allHotels as $hotel) {
            $availableRoomTypes = $hotel->getRoomTypesAvailableForPeriod($arrivalDate, $departureDate,  $people);
            
            if (count($availableRoomTypes) > 0) {
                $availableHotels[$hotel->getId()] = $hotel;
                $lowerPrices[$hotel->getId()] = min(array_map(function($roomType) {
                    return $roomType->getPrice();
                }, $availableRoomTypes))*$nights;
            }
        }



        return $this->render('booking/chooseHotel.html.twig', [
            'topimg' => '/uploads/pages/banner-booking.jpg',
            'people' => $people,
            'arrival' => $arrival,
            'departure' => $departure,

            'availableHotels' => $availableHotels,
            'lowerPrices' => $lowerPrices,
            'nights' => $nights,
        ]);
    }

    #[Route('/booking/choose-room', name: 'app_booking_room')]
        public function chooseRoom(EntityManagerInterface $entityManager): Response
    {
        // Get parameters from URL
        $request = Request::createFromGlobals();
        $hotelId = $request->query->get('hotel');
        $people = $request->query->get('people');
        $arrival = $request->query->get('arrival');
        $departure = $request->query->get('departure');

        if (!$hotelId || !$people || !$arrival || !$departure) {
            throw new NotFoundHttpException('Missing parameters');
        } else {
            $arrivalDate = date_create_from_format('Y-m-d', $arrival);
            $departureDate = date_create_from_format('Y-m-d', $departure);
        }

        if ($people < 1 || $people > 8) {
            throw new NotFoundHttpException('Invalid number of people');
        }

        if (strtotime($arrival) < time()) {
            throw new NotFoundHttpException('Invalid arrival date');
        }

        if (strtotime($departure) <= strtotime($arrival)) {
            throw new NotFoundHttpException('Invalid departure date');
        }

        if (strtotime($departure) > strtotime($arrival) + 5 * 24 * 60 * 60) {
            throw new NotFoundHttpException('Maximum stay is 5 days');
        }

        // Get number of nights

        $interval = $arrivalDate->diff($departureDate);
        $nights = $interval->format('%a');

        // Get hotel
        $repository = $entityManager->getRepository(Hotel::class);
        $hotel = $repository->findOneBy(['id' => $hotelId]);

        if (!$hotel) {
            throw new NotFoundHttpException('Hotel not found');
        }

        // For the hotel get all room types
        $availableRoomTypes = $hotel->getRoomTypesAvailableForPeriod($arrivalDate, $departureDate,  $people);

    



        return $this->render('booking/chooseRoom.html.twig', [
            'topimg' => '/uploads/pages/banner-booking.jpg',
            'hotel' => $hotel,
            'people' => $people,
            'arrival' => $arrival,
            'departure' => $departure,

            'availableRoomTypes' => $availableRoomTypes,
            'nights' => $nights,
        ]);
    }

    #[Route('/booking/choose-formula', name: 'app_booking_formula')]
        public function chooseFormula(EntityManagerInterface $entityManager): Response
    {
        // Get parameters from URL
        $request = Request::createFromGlobals();
        $hotelId = $request->query->get('hotel');
        $roomTypeId = $request->query->get('room');
        $people = $request->query->get('people');
        $arrival = $request->query->get('arrival');
        $departure = $request->query->get('departure');

        if (!$hotelId || !$roomTypeId || !$people || !$arrival || !$departure) {
            throw new NotFoundHttpException('Missing parameters');
        } else {
            $arrivalDate = date_create_from_format('Y-m-d', $arrival);
            $departureDate = date_create_from_format('Y-m-d', $departure);
        }

        if ($people < 1 || $people > 8) {
            throw new NotFoundHttpException('Invalid number of people');
        }

        if (strtotime($arrival) < time()) {
            throw new NotFoundHttpException('Invalid arrival date');
        }

        if (strtotime($departure) <= strtotime($arrival)) {
            throw new NotFoundHttpException('Invalid departure date');
        }

        if (strtotime($departure) > strtotime($arrival) + 5 * 24 * 60 * 60) {
            throw new NotFoundHttpException('Maximum stay is 5 days');
        }

        // Get number of nights

        $interval = $arrivalDate->diff($departureDate);
        $nights = $interval->format('%a');

        // Get hotel
        $repository_hotel = $entityManager->getRepository(Hotel::class);
        $hotel = $repository_hotel->findOneBy(['id' => $hotelId]);

        if (!$hotel) {
            throw new NotFoundHttpException('Hotel not found');
        }

        // Get room type
        $repository_roomType = $entityManager->getRepository(HotelRoomType::class);
        $roomType = $repository_roomType->findOneBy(['id' => $roomTypeId]);

        if (!$roomType) {
            throw new NotFoundHttpException('Room type not found');
        }

    



        return $this->render('booking/chooseFormula.html.twig', [
            'topimg' => '/uploads/pages/banner-booking.jpg',
            'hotel' => $hotel,
            'roomType' => $roomType,
            'people' => $people,
            'arrival' => $arrival,
            'departure' => $departure,
            'nights' => $nights,
        ]);
    }

}
