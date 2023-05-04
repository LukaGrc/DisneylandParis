<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\DataFixtures\LandFixtures;
use App\DataFixtures\AttractionCategoryFixtures;

use App\Entity\Attraction;

class AttractionParkFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LandFixtures::class,
            AttractionCategoryFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {

        // FRONTIER LAND

        $btm = new Attraction();
        $btm->setName('Big Thunder Mountain')
            ->setSlug('big-thunder-mountain')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_NON_REFERENCE))
            ->setPremieraccessPrice(16.0)
            ->setMinHeight(102)
            ->setIdApi(0);

        $manager->persist($btm);


        // DICOVERY LAND

        $buzz = new Attraction();
        $buzz->setName('Buzz Lightyear Laser Blast')
            ->setSlug('buzz-lightyear-laser-blast')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setPremieraccessPrice(12.0)
            ->setIdApi(0);

        $orbi = new Attraction();
        $orbi->setName('Orbitron')
            ->setSlug('orbitron')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setPremieraccessPrice(5.0)
            ->setIdApi(0);

        $space_mtn = new Attraction();
        $space_mtn->setName('Star Wars Hyper Space Mountain')
            ->setSlug('hyper-space-mountain')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FRIS_REFERENCE))
            ->setMinHeight(120)
            ->setPremieraccessPrice(18.0)
            ->setIdApi(0)
            ->setIdApiSingleRider(0);

        $autopia = new Attraction();
        $autopia->setName('Autopia')
            ->setSlug('autopia')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setMinHeight(90)
            ->setPremieraccessPrice(9.0)
            ->setIdApi(0);

        $manager->persist($buzz);
        $manager->persist($orbi);
        $manager->persist($space_mtn);
        $manager->persist($autopia);

        $manager->flush();
    }
}
