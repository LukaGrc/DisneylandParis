<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\HotelRoom;

use App\DataFixtures\HotelFixtures;
use App\DataFixtures\HotelRoomTypeFixtures;

class HotelRoomFixturesNEWPORT extends Fixture implements DependentFixtureInterface
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

        $hotel = $this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE);

        foreach (range(1001, 1030) as $roomNumber) {
            $room = new HotelRoom();
            if (1001 >= $roomNumber && $roomNumber <= 1010) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWPORT_RT_STD_REFERENCE));
            } else if ($roomNumber <= 1015) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWPORT_RT_STDL_REFERENCE));
            } else if ($roomNumber <= 1020) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWPORT_RT_STDT_REFERENCE));
            } 

            else if ($roomNumber <= 1025) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWPORT_RT_COMP_REFERENCE));
            } else if ($roomNumber <= 1030) {
                $room->setNumber($roomNumber)->setHotel($hotel)->setType($this->getReference(HotelRoomTypeFixtures::NEWPORT_RT_COMPL_REFERENCE));
            }
            $manager->persist($room);
        }

        $manager->flush();
    }
}
