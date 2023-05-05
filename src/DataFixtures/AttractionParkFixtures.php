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

        // --------------------------------------------------------{ MAIN STREET USA }

        $railroad_msu = new Attraction();
        $railroad_msu->setName('Disneyland Railroad')
            ->setSlug('disneyland-railroad')
            ->setLand($this->getReference(LandFixtures::PARK_MSU_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $horsedrawn = new Attraction();
        $horsedrawn->setName('Horse-Drawn Streetcars')
            ->setSlug('horse-drawn-streetcars')
            ->setLand($this->getReference(LandFixtures::PARK_MSU_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $ms_vehicles = new Attraction();
        $ms_vehicles->setName('Main Street Vehicles')
            ->setSlug('main-street-vehicles')
            ->setLand($this->getReference(LandFixtures::PARK_MSU_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $statueliberty = new Attraction();
        $statueliberty->setName('Statue of Liberty Tableau')
            ->setSlug('statue-of-liberty-tableau')
            ->setLand($this->getReference(LandFixtures::PARK_MSU_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $manager->persist($railroad_msu);
        $manager->persist($horsedrawn);
        $manager->persist($ms_vehicles);


        // --------------------------------------------------------{ FRONTIER LAND }

        $phantom = new Attraction();
        $phantom->setName('Phantom Manor')
            ->setSlug('phantom-manor')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setPremieraccessPrice(7.0)
            ->setIdApi(0);

        $riverboat = new Attraction();
        $riverboat->setName('Thunder Mesa Riverboat Landing')
            ->setSlug('thunder-mesa-riverboat-landing')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $shootin = new Attraction();
        $shootin->setName('Rustler Roundup Shootin\' Gallery')
            ->setSlug('rustler-roundup-shootin-gallery')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $btm = new Attraction();
        $btm->setName('Big Thunder Mountain')
            ->setSlug('big-thunder-mountain')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FRIS_REFERENCE))
            ->setPremieraccessPrice(16.0)
            ->setMinHeight(102)
            ->setIdApi(0);

        $playground = new Attraction();
        $playground->setName('Frontierland Playground')
            ->setSlug('frontierland-playground')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $theater_front = new Attraction();
        $theater_front->setName('Frontierland Theater - The Lion King: Rythms of the Pride Lands')
            ->setSlug('frontierland-theater')
            ->setLand($this->getReference(LandFixtures::PARK_FRONT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);
        
        $manager->persist($phantom);
        $manager->persist($riverboat);
        $manager->persist($shootin);
        $manager->persist($btm);
        $manager->persist($playground);
        $manager->persist($theater_front);


        // --------------------------------------------------------{ DICOVERY LAND }

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

        $videopolis = new Attraction();
        $videopolis->setName('Videopolis Theatre')
            ->setSlug('videopolis-theatre')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $star_tours = new Attraction();
        $star_tours->setName('Star Tours: L\'aventure continue')
            ->setSlug('star-tours-the-adventures-continue')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FRIS_REFERENCE))
            ->setPremieraccessPrice(5.0)
            ->setMinHeight(102)
            ->setIdApi(0);

        $starport = new Attraction();
        $starport->setName('Starport')
            ->setSlug('starport')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_REN_REFERENCE))
            ->setIdApi(0);

        $theater_disco = new Attraction();
        $theater_disco->setName('Discoveryland Theater - Mickey\'s PhilharMagic')
            ->setSlug('discoveryland-theater')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $nautilus = new Attraction();
        $nautilus->setName('Les Mystères du Nautilus')
            ->setSlug('les-mysteres-du-nautilus')
            ->setLand($this->getReference(LandFixtures::PARK_DISCO_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
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
        $manager->persist($videopolis);
        $manager->persist($star_tours);
        $manager->persist($starport);
        $manager->persist($theater_disco);
        $manager->persist($nautilus);
        $manager->persist($space_mtn);
        $manager->persist($autopia);

        // --------------------------------------------------------{ ADVENTURE LAND }

        $robinson = new Attraction();
        $robinson->setName('La Cabane des Robinson')
            ->setSlug('la-cabane-des-robinson')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);
        
        $plage = new Attraction();
        $plage->setName('La plage des Pirates')
            ->setSlug('la-plage-des-pirates')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setMinHeight(140)
            ->setIdApi(0);

        $aladdin = new Attraction();
        $aladdin->setName('Le passage enchanté d\'Aladdin')
            ->setSlug('le-passage-enchante-d-aladdin')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $indiana = new Attraction();
        $indiana->setName('Indiana Jones et le Temple du Péril')
            ->setSlug('indiana-jones-et-le-temple-du-peril')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FRIS_REFERENCE))
            ->setMinHeight(140)
            ->setPremieraccessPrice(7.0)
            ->setIdApi(0)
            ->setIdApiSingleRider(0);

        $isle = new Attraction();
        $isle->setName('Adventure Isle')
            ->setSlug('adventure-isle')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);
    
        $pirates = new Attraction();
        $pirates->setName('Pirates of the Caribbean')
            ->setSlug('pirates-of-the-caribbean')
            ->setLand($this->getReference(LandFixtures::PARK_ADV_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $manager->persist($robinson);
        $manager->persist($plage);
        $manager->persist($aladdin);
        $manager->persist($indiana);
        $manager->persist($isle);
        $manager->persist($pirates);

        // --------------------------------------------------------{ FANTASY LAND }

        $castle = new Attraction();
        $castle->setName('Le Château de la Belle au Bois Dormant')
            ->setSlug('le-chateau-de-la-belle-au-bois-dormant')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $dragon = new Attraction();
        $dragon->setName('La Tanière du Dragon')
            ->setSlug('la-taniere-du-dragon')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $blanche_neige = new Attraction();
        $blanche_neige->setName('Blanche-Neige et les Sept Nains')
            ->setSlug('blanche-neige-et-les-sept-nains')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $pinocchio = new Attraction();
        $pinocchio->setName('Les Voyages de Pinocchio')
            ->setSlug('les-voyages-de-pinocchio')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $carousel = new Attraction();
        $carousel->setName('Le Carrousel de Lancelot')
            ->setSlug('le-carrousel-de-lancelot')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $peter_pan = new Attraction();
        $peter_pan->setName('Peter Pan\'s Flight')
            ->setSlug('peter-pan-s-flight')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setPremieraccessPrice(16.0)
            ->setIdApi(0);

        $mickey = new Attraction();
        $mickey->setName('Meet Mickey Mouse')
            ->setSlug('meet-mickey-mouse')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_REN_REFERENCE))
            ->setIdApi(0);

        $dumbo = new Attraction();
        $dumbo->setName('Dumbo the Flying Elephant')
            ->setSlug('dumbo-the-flying-elephant')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $alice = new Attraction();
        $alice->setName('Alice\'s Curious Labyrinth')
            ->setSlug('alice-s-curious-labyrinth')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $mad_hatter = new Attraction();
        $mad_hatter->setName('Mad Hatter\'s Tea Cups')
            ->setSlug('mad-hatter-s-tea-cups')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $casey = new Attraction();
        $casey->setName('Casey Jr. - le Petit Train du Cirque')
            ->setSlug('casey-jr-le-petit-train-du-cirque')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $fees = new Attraction();
        $fees->setName('Le Pays des Contes de Fées')
            ->setSlug('le-pays-des-contes-de-fees')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $world = new Attraction();
        $world->setName('"it\'s a small world"')
            ->setSlug('it-s-a-small-world')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_PET_REFERENCE))
            ->setIdApi(0);

        $princess = new Attraction();
        $princess->setName('Princess Pavilion')
            ->setSlug('princess-pavilion')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_REN_REFERENCE))
            ->setIdApi(0);

        $theater_fantasy = new Attraction();
        $theater_fantasy->setName('Le Théâtre du Château')
            ->setSlug('le-theatre-du-chateau')
            ->setLand($this->getReference(LandFixtures::PARK_FANT_REFERENCE))
            ->setCategory($this->getReference(AttractionCategoryFixtures::CAT_FAM_REFERENCE))
            ->setIdApi(0);

        $manager->persist($castle);
        $manager->persist($dragon);
        $manager->persist($blanche_neige);
        $manager->persist($pinocchio);
        $manager->persist($carousel);
        $manager->persist($peter_pan);
        $manager->persist($mickey);
        $manager->persist($dumbo);
        $manager->persist($alice);
        $manager->persist($mad_hatter);
        $manager->persist($casey);
        $manager->persist($fees);
        $manager->persist($world);
        $manager->persist($princess);
        $manager->persist($theater_fantasy);

        $manager->flush();
    }
}
