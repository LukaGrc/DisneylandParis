<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Destination;
use App\Entity\Land;

class LandFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            DestinationFixtures::class,
        ];
    }

    public const PARK_MSU_REFERENCE = 'park-msu';
    public const PARK_DISCO_REFERENCE = 'park-disco';
    public const PARK_FANT_REFERENCE = 'park-fant';
    public const PARK_FRONT_REFERENCE = 'park-front';
    public const PARK_ADV_REFERENCE = 'park-adv';

    public const STUDIOS_FRONT_REFERENCE = 'studios-front';
    public const STUDIOS_TOON_REFERENCE = 'studios-toon';
    public const STUDIOS_TOY_REFERENCE = 'studios-toy';
    public const STUDIOS_PIXAR_REFERENCE = 'studios-pixar';
    public const STUDIOS_PROD_REFERENCE = 'studios-prod';
    public const STUDIOS_AVENGERS_REFERENCE = 'studios-avengers';
    
    public function load(ObjectManager $manager): void
    {
        // PARC DISNEYLAND

        $park_msu = new Land();
        $park_msu->setName('Main Street USA')
            ->setSlug('main-street-usa')
            ->setDescription("Une petite ville typique des États-Unis à l'aube du 20e siècle")
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));

        $park_disco = new Land();
        $park_disco->setName('Discoveryland')
            ->setSlug('discoveryland')
            ->setDescription("Rêves d'avenir des temps passé et présent")
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));

        $park_fant = new Land();
        $park_fant->setName('Fantasyland')
            ->setSlug('fantasyland')
            ->setDescription("Toute la magie des grands classiques Disney")
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));

        $park_front = new Land();
        $park_front->setName('Frontierland')
            ->setSlug('frontierland')
            ->setDescription("La conquète de l'Ouest")
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));

        $park_adv = new Land();
        $park_adv->setName('Adventureland')
            ->setSlug('adventureland')
            ->setDescription("Bienvenue dans le monde des explorateurs et des aventuriers")
            ->setDestination($this->getReference(DestinationFixtures::PARK_REFERENCE));


        // PARC WALT DISNEY STUDIOS

        $studios_front = new Land();
        $studios_front->setName('Front Lot')
            ->setSlug('front-lot')
            ->setDescription("L'évocation de l'entrée des grands studios de cinéma")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));

        $studios_toon = new Land();
        $studios_toon->setName('Toon Studio')
            ->setSlug('toon-studio')
            ->setDescription("Là ou les toons prennent vie")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));
        
        $studios_toy = new Land();
        $studios_toy->setName('Toy Story Playland')
            ->setSlug('toy-story-playland')
            ->setDescription("Un univers surdimmensionné où vous vous retrouvez à la taille d'un jouet !")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));

        $studios_pixar = new Land();
        $studios_pixar->setName('World of Pixar')
            ->setSlug('world-of-pixar')
            ->setDescription("Là où les différents mondes de Pixar prennent vie")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));

        $studios_prod = new Land();
        $studios_prod->setName('Production Courtyard')
            ->setSlug('production-courtyard')
            ->setDescription("Les merveilles du cinémaet de la télévision")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));

        $studios_avengers = new Land();
        $studios_avengers->setName('Avengers Campus')
            ->setSlug('avengers-campus')
            ->setDescription("Préparez vous pour le rassemblement")
            ->setDestination($this->getReference(DestinationFixtures::STUDIOS_REFERENCE));

        $manager->persist($park_msu);
        $manager->persist($park_disco);
        $manager->persist($park_fant);
        $manager->persist($park_front);
        $manager->persist($park_adv);

        $manager->persist($studios_front);
        $manager->persist($studios_toon);
        $manager->persist($studios_toy);
        $manager->persist($studios_pixar);
        $manager->persist($studios_prod);
        $manager->persist($studios_avengers);
        $manager->flush();

        $this->addReference(self::PARK_MSU_REFERENCE, $park_msu);
        $this->addReference(self::PARK_DISCO_REFERENCE, $park_disco);
        $this->addReference(self::PARK_FANT_REFERENCE, $park_fant);
        $this->addReference(self::PARK_FRONT_REFERENCE, $park_front);
        $this->addReference(self::PARK_ADV_REFERENCE, $park_adv);

        $this->addReference(self::STUDIOS_FRONT_REFERENCE, $studios_front);
        $this->addReference(self::STUDIOS_TOON_REFERENCE, $studios_toon);
        $this->addReference(self::STUDIOS_TOY_REFERENCE, $studios_toy);
        $this->addReference(self::STUDIOS_PIXAR_REFERENCE, $studios_pixar);
        $this->addReference(self::STUDIOS_PROD_REFERENCE, $studios_prod);
        $this->addReference(self::STUDIOS_AVENGERS_REFERENCE, $studios_avengers);
    }
}
