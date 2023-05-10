<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\HotelRoom;

use App\DataFixtures\HotelFixtures;
use App\DataFixtures\HotelRoomTypeFixtures;

class HotelRoomFixturesNEWYORK extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            HotelFixtures::class,
            HotelRoomTypeFixtures::class,
        ];
    }

    

    public function load(ObjectManager $manager): void
    {

        $hotel = $this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE);

        foreach (range(1001, 1030) as $roomNumber) {
            $room = new HotelRoom();
            if (1001 >= $roomNumber && $roomNumber <= 1010) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWYORK_RT_SUP_REFERENCE));
            } else if ($roomNumber <= 1015) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWYORK_RT_SUPT_REFERENCE));
            } else if ($roomNumber <= 1020) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWYORK_RT_SUPVJ_REFERENCE));
            } 

            else if ($roomNumber <= 1025) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWYORK_RT_EMP_REFERENCE));
            } else if ($roomNumber <= 1030) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWYORK_RT_EMPVL_REFERENCE));
            }
            $manager->persist($room);
        }

        $manager->flush();
    }
}
