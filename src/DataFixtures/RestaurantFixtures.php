<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Restaurant;

use App\DataFixtures\DestinationFixtures;
use App\DataFixtures\LandFixtures;
use App\DataFixtures\HotelFixtures;

class RestaurantFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            DestinationFixtures::class,
            LandFixtures::class,
            HotelFixtures::class,
        ];
    }

    public const BELLA_NOTTE_REFERENCE = 'bella-notte';

    public function load(ObjectManager $manager): void
    {
        $bella_notte = new Restaurant();
        $bella_notte->setName('Bella Notte')
            ->setSlug('bella-notte')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));

        $manager->persist($bella_notte);
        $manager->flush();

        $this->addReference(self::BELLA_NOTTE_REFERENCE, $bella_notte);
    }
}
