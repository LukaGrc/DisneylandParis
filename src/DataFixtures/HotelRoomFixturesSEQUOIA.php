<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\HotelRoom;

use App\DataFixtures\HotelFixtures;
use App\DataFixtures\HotelRoomTypeFixtures;

class HotelRoomFixturesSEQUOIA extends Fixture implements DependentFixtureInterface
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

        $hotel = $this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE);

        foreach (range(1001, 1030) as $roomNumber) {
            $room = new HotelRoom();
            if (1001 >= $roomNumber && $roomNumber <= 1010) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::SEQUOIA_RT_STD_REFERENCE));
            } else if ($roomNumber <= 1015) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::SEQUOIA_RT_STDC_REFERENCE));
            } else if ($roomNumber <= 1020) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::SEQUOIA_RT_STDCL_REFERENCE));
            } 

            else if ($roomNumber <= 1025) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::SEQUOIA_RT_GOLDFC_REFERENCE));
            } else if ($roomNumber <= 1030) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::SEQUOIA_RT_GOLDFCL_REFERENCE));
            }
            $manager->persist($room);
        }

        $manager->flush();
    }
}
