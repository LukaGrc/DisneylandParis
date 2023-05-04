<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Hotel;
use App\Entity\HotelTravelTime;

class HotelFixtures extends Fixture
{
    public const HOTEL_DISNEYLAND_REFERENCE = 'hotel-disneyland';
    public const HOTEL_NEWYORK_REFERENCE = 'hotel-newyork';
    public const HOTEL_NEWPORT_REFERENCE = 'hotel-newport';
    public const HOTEL_SEQUOIA_REFERENCE = 'hotel-sequoia';
    public const HOTEL_CHEYENNE_REFERENCE = 'hotel-cheyenne';
    public const HOTEL_SANTAFE_REFERENCE = 'hotel-santafe';
    public const HOTEL_DAVYCROCKETT_REFERENCE = 'hotel-davycrockett';

    public function load(ObjectManager $manager): void
    {
        $hotel_disneyland = new Hotel();
        $hotel_disneyland->setName('Disneyland Hotel')
            ->setSlug('disneyland-hotel')
            ->setStars(5);
        $hotel_disneyland_tt = new HotelTravelTime();
        $hotel_disneyland_tt->setWalk(1)->setHotel($hotel_disneyland);

        $hotel_newyork = new Hotel();
        $hotel_newyork->setName('Disney New York Hotel')
            ->setSlug('disney-hotel-new-york')
            ->setStars(4);
        $hotel_newyork_tt = new HotelTravelTime();
        $hotel_newyork_tt->setWalk(10)->setBus(8)->setHotel($hotel_newyork);

        $hotel_newport = new Hotel();
        $hotel_newport->setName('Disney Newport Bay Club')
            ->setSlug('disney-newport-bay-club')
            ->setStars(4);
        $hotel_newport_tt = new HotelTravelTime();
        $hotel_newport_tt->setWalk(15)->setBus(8)->setHotel($hotel_newport);

        $hotel_sequoia = new Hotel();
        $hotel_sequoia->setName('Disney Sequoia Lodge')
            ->setSlug('disney-sequoia-lodge')
            ->setStars(3);
        $hotel_sequoia_tt = new HotelTravelTime();
        $hotel_sequoia_tt->setWalk(15)->setBus(8)->setHotel($hotel_sequoia);

        $hotel_cheyenne = new Hotel();
        $hotel_cheyenne->setName('Disney Hotel Cheyenne')
            ->setSlug('disney-hotel-cheyenne')
            ->setStars(3);
        $hotel_cheyenne_tt = new HotelTravelTime();
        $hotel_cheyenne_tt->setWalk(20)->setBus(8)->setHotel($hotel_cheyenne);

        $hotel_santafe = new Hotel();
        $hotel_santafe->setName('Disney Hotel Santa Fe')
            ->setSlug('disney-hotel-santa-fe')
            ->setStars(2);
        $hotel_santafe_tt = new HotelTravelTime();
        $hotel_santafe_tt->setWalk(20)->setBus(8)->setHotel($hotel_santafe);

        $hotel_davycrockett = new Hotel();
        $hotel_davycrockett->setName('Disney Davy Crockett Ranch')
            ->setSlug('disney-davy-crockett-ranch')
            ->setStars(0);
        $hotel_davycrockett_tt = new HotelTravelTime();
        $hotel_davycrockett_tt->setCar(15)->setHotel($hotel_davycrockett);

        $manager->persist($hotel_disneyland);
        $manager->persist($hotel_disneyland_tt);
        $manager->persist($hotel_newyork);
        $manager->persist($hotel_newyork_tt);
        $manager->persist($hotel_newport);
        $manager->persist($hotel_newport_tt);
        $manager->persist($hotel_sequoia);
        $manager->persist($hotel_sequoia_tt);
        $manager->persist($hotel_cheyenne);
        $manager->persist($hotel_cheyenne_tt);
        $manager->persist($hotel_santafe);
        $manager->persist($hotel_santafe_tt);   
        $manager->persist($hotel_davycrockett);
        $manager->persist($hotel_davycrockett_tt);
        $manager->flush();

        $this->addReference(self::HOTEL_DISNEYLAND_REFERENCE, $hotel_disneyland);
        $this->addReference(self::HOTEL_NEWYORK_REFERENCE, $hotel_newyork);
        $this->addReference(self::HOTEL_NEWPORT_REFERENCE, $hotel_newport);
        $this->addReference(self::HOTEL_SEQUOIA_REFERENCE, $hotel_sequoia);
        $this->addReference(self::HOTEL_CHEYENNE_REFERENCE, $hotel_cheyenne);
        $this->addReference(self::HOTEL_SANTAFE_REFERENCE, $hotel_santafe);
        $this->addReference(self::HOTEL_DAVYCROCKETT_REFERENCE, $hotel_davycrockett);
    }
}
