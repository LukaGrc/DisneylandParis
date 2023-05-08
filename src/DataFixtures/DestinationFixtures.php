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
            ->setDescription("Dans le Parc Disneyland, les classiques Disney de votre enfance et les légendes de Star Wars prennent vie ! Évadez-vous au pays des rêves qui deviennent réalité.")
            ->setImage('/uploads/destinations/image-1.jpg')
            ->setBanner('/uploads/destinations/banner-1.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '23:00'));

        $studios = new Destination();
        $studios->setName('Parc Walt Disney Studios')
            ->setSlug('parc-walt-disney-studios')
            ->setDescription("Des mondes colorés de Disney-Pixar aux missions héroïques d'Avengers Campus, les fans de tous âges sont appelés à embarquer immédiatement au cœur de l’action !")
            ->setImage('/uploads/destinations/image-2.jpg')
            ->setBanner('/uploads/destinations/banner-2.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '22:00'));

        $village = new Destination();
        $village->setName('Disney Village')
            ->setSlug('disney-village')
            ->setImage('/uploads/destinations/image-3.jpg')
            ->setBanner('/uploads/destinations/banner-3.jpg')
            ->setIcon('/uploads/destinations/icon-3.png')
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
