<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use DateTime;

use App\Entity\Destination;
use App\Entity\Land;
use App\Entity\Attraction;
use App\Entity\AttractionCategory;
use App\Entity\Restaurant;
use App\Entity\Hotel;
use App\Entity\HotelTravelTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // PARC DISNEYLAND

        $park = new Destination();
        $park->setName('Parc Disneyland')
            ->setSlug('parc-disneyland')
            ->setImage('/uploads/destinations/1.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '23:00'));

        $park_msu = new Land();
        $park_msu->setName('Main Street USA')
            ->setSlug('main-street-usa')
            ->setDescription("Une petite ville typique des États-Unis à l'aube du 20e siècle")
            ->setDestination($park);

        $park_disco = new Land();
        $park_disco->setName('Discoveryland')
            ->setSlug('discoveryland')
            ->setDescription("Rêves d'avenir des temps passé et présent")
            ->setDestination($park);

        $park_fant = new Land();
        $park_fant->setName('Fantasyland')
            ->setSlug('fantasyland')
            ->setDescription("Toute la magie des grands classiques Disney")
            ->setDestination($park);

        $park_front = new Land();
        $park_front->setName('Frontierland')
            ->setSlug('frontierland')
            ->setDescription("La conquète de l'Ouest")
            ->setDestination($park);

        $park_adv = new Land();
        $park_adv->setName('Adventureland')
            ->setSlug('adventureland')
            ->setDescription("Bienvenue dans le monde des explorateurs et des aventuriers")
            ->setDestination($park);


        // PARC WALT DISNEY STUDIOS

        $studios = new Destination();
        $studios->setName('Parc Walt Disney Studios')
            ->setSlug('parc-walt-disney-studios')
            ->setImage('/uploads/destinations/2.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '09:30'))
            ->setHoursClosing(DateTime::createFromFormat('H:i', '22:00'));

        $studios_front = new Land();
        $studios_front->setName('Front Lot')
            ->setSlug('front-lot')
            ->setDescription("L'évocation de l'entrée des grands studios de cinéma")
            ->setDestination($studios);

        $studios_toon = new Land();
        $studios_toon->setName('Toon Studio')
            ->setSlug('toon-studio')
            ->setDescription("Là ou les toons prennent vie")
            ->setDestination($studios);
        
        $studios_toy = new Land();
        $studios_toy->setName('Toy Story Playland')
            ->setSlug('toy-story-playland')
            ->setDescription("Un univers surdimmensionné où vous vous retrouvez à la taille d'un jouet !")
            ->setDestination($studios);

        $studios_pixar = new Land();
        $studios_pixar->setName('World of Pixar')
            ->setSlug('world-of-pixar')
            ->setDescription("Là où les différents mondes de Pixar prennent vie")
            ->setDestination($studios);

        $studios_prod = new Land();
        $studios_prod->setName('Production Courtyard')
            ->setSlug('production-courtyard')
            ->setDescription("Les merveilles du cinémaet de la télévision")
            ->setDestination($studios);

        $studios_avengers = new Land();
        $studios_avengers->setName('Avengers Campus')
            ->setSlug('avengers-campus')
            ->setDescription("Préparez vous pour le rassemblement")
            ->setDestination($studios);

        
        // DISNEY VILLAGE

        $village = new Destination();
        $village->setName('Disney Village')
            ->setSlug('disney-village')
            ->setImage('/uploads/destinations/3.jpg')
            ->setHoursOpening(DateTime::createFromFormat('H:i', '08:00'));


        // DISNEY HOTELS

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

        // ATTRACTIONS CATEGORIES

        $cat_frissons = new AttractionCategory();
        $cat_frissons->setName('Grands Frissons')
            ->setSlug('grands-frissons');

        $cat_famille = new AttractionCategory();
        $cat_famille->setName('Aventures en famille')
            ->setSlug('aventures-en-famille');

        $cat_petits = new AttractionCategory();
        $cat_petits->setName('Avec les plus petits')
            ->setSlug('avec-les-plus-petits');


        // ATTRACTIONS (Not exhaustive)

        $buzz = new Attraction();
        $buzz->setName('Buzz Lightyear Laser Blast')
            ->setSlug('buzz-lightyear-laser-blast')
            ->setLand($park_disco)
            ->setCategory($cat_famille)
            ->setPremieraccessPrice(12.0)
            ->setIdApi(0);

        $orbi = new Attraction();
        $orbi->setName('Orbitron')
            ->setSlug('orbitron')
            ->setLand($park_disco)
            ->setCategory($cat_petits)
            ->setPremieraccessPrice(5.0)
            ->setIdApi(0);

        $space_mtn = new Attraction();
        $space_mtn->setName('Star Wars Hyper Space Mountain')
            ->setSlug('hyper-space-mountain')
            ->setLand($park_disco)
            ->setCategory($cat_frissons)
            ->setMinHeight(120)
            ->setPremieraccessPrice(18.0)
            ->setIdApi(0)
            ->setIdApiSingleRider(0);

        $autopia = new Attraction();
        $autopia->setName('Autopia')
            ->setSlug('autopia')
            ->setLand($park_disco)
            ->setCategory($cat_famille)
            ->setMinHeight(90)
            ->setPremieraccessPrice(9.0)
            ->setIdApi(0);
        

        // RESTAURANTS (Not exhaustive)

        $bella_notte = new Restaurant();
        $bella_notte->setName('Bella Notte')
            ->setSlug('bella-notte')
            ->setLand($park_fant)
            ->setDestination($park);
            

        // PERSISTS

        $manager->persist($park);
        $manager->persist($park_msu);
        $manager->persist($park_disco);
        $manager->persist($park_fant);
        $manager->persist($park_front);
        $manager->persist($park_adv);

        $manager->persist($studios);
        $manager->persist($studios_front);
        $manager->persist($studios_toon);
        $manager->persist($studios_toy);
        $manager->persist($studios_pixar);
        $manager->persist($studios_prod);
        $manager->persist($studios_avengers);

        $manager->persist($village);

        $manager->persist($hotel_disneyland);
        $manager->persist($hotel_disneyland_tt);
        $manager->persist($hotel_newyork);
        $manager->persist($hotel_newyork_tt);
        $manager->persist($hotel_sequoia);
        $manager->persist($hotel_sequoia_tt);
        $manager->persist($hotel_cheyenne);
        $manager->persist($hotel_cheyenne_tt);
        $manager->persist($hotel_santafe);
        $manager->persist($hotel_santafe_tt);
        $manager->persist($hotel_davycrockett);
        $manager->persist($hotel_davycrockett_tt);

        $manager->persist($cat_frissons);
        $manager->persist($cat_famille);
        $manager->persist($cat_petits);

        $manager->persist($buzz);
        $manager->persist($orbi);
        $manager->persist($space_mtn);
        $manager->persist($autopia);


        $manager->persist($bella_notte);

        $manager->flush();
    }
}
