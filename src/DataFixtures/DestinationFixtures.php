<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use DateTime;

use App\Entity\Destination;

class DestinationFixtures extends Fixture
{

    public const PARK_REFERENCE = 'park';
    public const STUDIOS_REFERENCE = 'studios';
    public const VILLAGE_REFERENCE = 'village';

    public function load(ObjectManager $manager): void
    {
        
        $park = new Destination();
        $park->setName('Parc Disneyland')
            ->setSlug('parc-disneyland')
            ->setImage('/uploads/destinations/1.jpg')
            ->setBanner('/uploads/banners/destinations/1.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '23:00'));

        $studios = new Destination();
        $studios->setName('Parc Walt Disney Studios')
            ->setSlug('parc-walt-disney-studios')
            ->setImage('/uploads/destinations/2.jpg')
            ->setBanner('/uploads/banners/destinations/2.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '22:00'));

        $village = new Destination();
        $village->setName('Disney Village')
            ->setSlug('disney-village')
            ->setImage('/uploads/destinations/3.jpg')
            ->setBanner('/uploads/banners/destinations/3.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '08:00'));

        $manager->persist($park);
        $manager->persist($studios);
        $manager->persist($village);
        $manager->flush();

        $this->addReference(self::PARK_REFERENCE, $park);
        $this->addReference(self::STUDIOS_REFERENCE, $studios);
        $this->addReference(self::VILLAGE_REFERENCE, $village);
    }
}
