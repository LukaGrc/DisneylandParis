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

    public function load(ObjectManager $manager): void
    {

        //* Destinations
        $DisneyLand = $this->getReference(DestinationFixtures::PARK_REFERENCE);
        $DisneyStudios = $this->getReference(DestinationFixtures::STUDIOS_REFERENCE);
        $DisneyVillage = $this->getReference(DestinationFixtures::VILLAGE_REFERENCE);

        //* DisneyLand Park Lands
        $MainStreet = $this->getReference(LandFixtures::PARK_MSU_REFERENCE);
        $Frontierland = $this->getReference(LandFixtures::PARK_FRONT_REFERENCE);
        $Adventureland = $this->getReference(LandFixtures::PARK_ADV_REFERENCE);
        $Fantasyland = $this->getReference(LandFixtures::PARK_FANT_REFERENCE);
        $Discoveryland = $this->getReference(LandFixtures::PARK_DISCO_REFERENCE);

        //* DisneyLand Studios Lands
        $FrontLot = $this->getReference(LandFixtures::STUDIOS_FRONT_REFERENCE);
        $WorldOfPixar = $this->getReference(LandFixtures::STUDIOS_PIXAR_REFERENCE);
        $AvengersCampus = $this->getReference(LandFixtures::STUDIOS_AVENGERS_REFERENCE);

        //* Disney Hotels
        $DisneyHotel = $this->getReference(HotelFixtures::HOTEL_DISNEYLAND_REFERENCE);
        $NewYorkHotel = $this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE);
        $NewPortHotel = $this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE);
        $SequoiaHotel = $this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE);
        $CheyenneHotel = $this->getReference(HotelFixtures::HOTEL_CHEYENNE_REFERENCE);
        $SantaFeHotel = $this->getReference(HotelFixtures::HOTEL_SANTAFE_REFERENCE);
        $DavyCrockettHotel = $this->getReference(HotelFixtures::HOTEL_DAVYCROCKETT_REFERENCE);


        //* Fixtures


        //* DisneyLand Park Restaurants

        //* -> Main Street USA Restaurants

        $Walts = new Restaurant();
        $Walts->setName("Walt's - an American Restaurant")
            ->setSlug("walts-an-american-restaurant")
            ->setLand($MainStreet)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/1.jpg');

        $MarketHouseDeli = new Restaurant();
        $MarketHouseDeli->setName("Market House Deli")
            ->setSlug("market-house-deli")
            ->setLand($MainStreet)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/2.jpg');
        
        $CaseyCorner = new Restaurant();
        $CaseyCorner->setName("Casey's Corner")
            ->setSlug("caseys-corner")
            ->setLand($MainStreet)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/3.jpg');

        $VictoriaHome = new Restaurant();
        $VictoriaHome->setName("Victoria's Home-Style Restaurant")
            ->setSlug("victorias-home-style-restaurant")
            ->setLand($MainStreet)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/4.jpg');

        $PlazaGardens = new Restaurant();
        $PlazaGardens->setName("Plaza Gardens Restaurant")
            ->setSlug("plaza-gardens-restaurant")
            ->setLand($MainStreet)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/5.jpg');
        
        //* -> Frontierland Restaurants

        $SilverSpur = new Restaurant();
        $SilverSpur->setName("Silver Spur Steakhouse")
            ->setSlug("silver-spur-steakhouse")
            ->setLand($Frontierland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/6.jpg');
        
        $LastChance = new Restaurant();
        $LastChance->setName("Last Chance Cafe")
            ->setSlug("last-chance-cafe")
            ->setLand($Frontierland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/7.jpg');

        $LuckNugget = new Restaurant();
        $LuckNugget->setName("The Lucky Nugget Saloon")
            ->setSlug("the-lucky-nugget-saloon")
            ->setLand($Frontierland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/8.jpg');
    
        $FuenteDelOro = new Restaurant();
        $FuenteDelOro->setName("Fuente del Oro Restaurante")
            ->setSlug("fuente-del-oro-restaurante")
            ->setLand($Frontierland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/9.jpg');
        
        $CowboyCookout = new Restaurant();
        $CowboyCookout->setName("Cowboy Cookout Barbecue")
            ->setSlug("cowboy-cookout-barbecue")
            ->setLand($Frontierland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/10.jpg');

        //* -> Adventureland Restaurants

        $ColonelHathi = new Restaurant();
        $ColonelHathi->setName("Colonel Hathi's Pizza Outpost")
            ->setSlug("colonel-hathis-pizza-outpost")
            ->setLand($Adventureland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/11.jpg');
        
        $HakunaMatata = new Restaurant();
        $HakunaMatata->setName("Restaurant Hakuna Matata")
            ->setSlug("restaurant-hakuna-matata")
            ->setLand($Adventureland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/12.jpg');

        $AgrabahCafe = new Restaurant();
        $AgrabahCafe->setName("Restaurant Agrabah Café")
            ->setSlug("restaurant-agrabah-cafe")
            ->setLand($Adventureland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/13.jpg');
        
        $CaptainJack = new Restaurant();
        $CaptainJack->setName("Captain Jack's - Restaurant des Pirates")
            ->setSlug("captain-jacks-restaurant-des-pirates")
            ->setLand($Adventureland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/14.jpg');

        //* -> Fantasyland Restaurants

        $ChaletDeMarionnettes = new Restaurant();
        $ChaletDeMarionnettes->setName("Au Chalet de la Marionnette")
            ->setSlug("au-chalet-de-la-marionnette")
            ->setLand($Fantasyland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/15.jpg');

        $ToadHall = new Restaurant();
        $ToadHall->setName("Toad Hall Restaurant")
            ->setSlug("toad-hall-restaurant")
            ->setLand($Fantasyland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/16.jpg');

        $AubergeCendrillon = new Restaurant();
        $AubergeCendrillon->setName("Auberge de Cendrillon")
            ->setSlug("auberge-de-cendrillon")
            ->setLand($Fantasyland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/17.jpg');

        $BellaNote = new Restaurant();
        $BellaNote->setName("Pizzeria Bella Notte")
            ->setSlug("pizzeria-bella-notte")
            ->setLand($Fantasyland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/18.jpg');

        //* -> Discoveryland Restaurants

        $CafeHyperion = new Restaurant();
        $CafeHyperion->setName("Café Hyperion")
            ->setSlug("cafe-hyperion")
            ->setLand($Discoveryland)
            ->setDestination($DisneyLand)
            ->setImage('/uploads/restaurants/19.jpg');


        //* DisneyLand Studios Restaurants

        //* -> Front Lot Restaurants

        $EnCoulisse = new Restaurant();
        $EnCoulisse->setName("Restaurant En Coulisse")
            ->setSlug("restaurant-en-coulisse")
            ->setLand($FrontLot)
            ->setDestination($DisneyStudios)
            ->setImage('/uploads/restaurants/20.jpg');

        //* -> World of Pixar Restaurants

        $ChezRemy = new Restaurant();
        $ChezRemy->setName("Bistrot Chez Rémy")
            ->setSlug("bistrot-chez-remy")
            ->setLand($WorldOfPixar)
            ->setDestination($DisneyStudios)
            ->setImage('/uploads/restaurants/21.jpg');

        //* -> Marvel Avengers Campus Restaurants

        $PymKitchen = new Restaurant();
        $PymKitchen->setName("PYM Kitchen")
            ->setSlug("pym-kitchen")
            ->setLand($AvengersCampus)
            ->setDestination($DisneyStudios)
            ->setImage('/uploads/restaurants/22.jpg');

        $StarkFactory = new Restaurant();
        $StarkFactory->setName("Stark Factory")
            ->setSlug("stark-factory")
            ->setLand($AvengersCampus)
            ->setDestination($DisneyStudios)
            ->setImage('/uploads/restaurants/23.jpg');

        $SuperDinner = new Restaurant();
        $SuperDinner->setName("Super Diner")
            ->setSlug("super-diner")
            ->setLand($AvengersCampus)
            ->setDestination($DisneyStudios)
            ->setImage('/uploads/restaurants/24.jpg');

        //* Dinsey Village Restaurants

        $FiveGuys = new Restaurant();
        $FiveGuys->setName("Five Guys")
            ->setSlug("five-guys")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/25.jpg');
        
        $Vapiano = new Restaurant();
        $Vapiano->setName("Vapiano")
            ->setSlug("vapiano")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/26.jpg');

        $Annette = new Restaurant();
        $Annette->setName("Annette's Diner")
            ->setSlug("annettes-diner")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/27.jpg');

        $RoyalPub = new Restaurant();
        $RoyalPub->setName("The Royal Pub")
            ->setSlug("the-royal-pub")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/28.jpg');

        $BillyBob = new Restaurant();
        $BillyBob->setName("Billy Bob's Country Western Saloon")
            ->setSlug("billy-bobs-country-western-saloon")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/29.jpg');

        $LaGrangeaBilly = new Restaurant();
        $LaGrangeaBilly->setName("La Grange à Billy Bob's Country Western Saloon")
            ->setSlug("la-grange-a-billy-bobs-country-western-saloon")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/30.jpg');

        $SportsBar = new Restaurant();
        $SportsBar->setName("Sports Bar")
            ->setSlug("sports-bar")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/31.jpg');

        $NyStyles = new Restaurant();
        $NyStyles->setName("New York Style Sandwiches")
            ->setSlug("new-york-style-sandwiches")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/32.jpg');

        $Starbucks = new Restaurant();
        $Starbucks->setName("Starbucks Coffee")
            ->setSlug("starbucks-coffee")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/33.jpg');

        $Steakhouse = new Restaurant();
        $Steakhouse->setName("The Steakhouse")
            ->setSlug("the-steakhouse")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/34.jpg');

        $McDonalds = new Restaurant();
        $McDonalds->setName("McDonald's")
            ->setSlug("mcdonalds")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/35.jpg');

        $RainForest = new Restaurant();
        $RainForest->setName("Rainforest Café")
            ->setSlug("rainforest-cafe")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/36.jpg');

        $EarlSandwich = new Restaurant();
        $EarlSandwich->setName("Earl of Sandwich")
            ->setSlug("earl-of-sandwich")
            ->setDestination($DisneyVillage)
            ->setImage('/uploads/restaurants/37.jpg');


        //* DisneyLand Hotel Restaurants

        //* -> NewPort Bay Club Restaurants

        $CapeCod = new Restaurant();
        $CapeCod->setName("Cape Cod")
            ->setSlug("cape-cod")
            ->setHotel($NewPortHotel)
            ->setImage('/uploads/restaurants/38.jpg');

        $YachtClub = new Restaurant();
        $YachtClub->setName("Yacht Club")
            ->setSlug("yacht-club")
            ->setHotel($NewPortHotel)
            ->setImage('/uploads/restaurants/39.jpg');

        //* -> Sequoia Lodge Restaurants

        $BeaverCreek = new Restaurant();
        $BeaverCreek->setName("Beaver Creek Tavern")
            ->setSlug("beaver-creek-tavern")
            ->setHotel($SequoiaHotel)
            ->setImage('/uploads/restaurants/40.jpg');

        $HunterGrill = new Restaurant();
        $HunterGrill->setName("Hunter's Grill")
            ->setSlug("hunters-grill")
            ->setHotel($SequoiaHotel)
            ->setImage('/uploads/restaurants/41.jpg');

        //* -> The Art of Marvel Restaurants

        $Manhattan = new Restaurant();
        $Manhattan->setName("Manhattan Restaurant")
            ->setSlug("manhattan-restaurant")
            ->setHotel($NewYorkHotel)
            ->setImage('/uploads/restaurants/42.jpg');

        $Downtown = new Restaurant();
        $Downtown->setName("Downtown Restaurant")
            ->setSlug("downtown-restaurant")
            ->setHotel($NewYorkHotel)
            ->setImage('/uploads/restaurants/43.jpg');

        //* -> Cheyenne Restaurants

        $ChuckWagon = new Restaurant();
        $ChuckWagon->setName("Chuck Wagon Café")
            ->setSlug("chuck-wagon-cafe")
            ->setHotel($CheyenneHotel)
            ->setImage('/uploads/restaurants/44.jpg');

        //* -> Santa Fe Restaurants

        $LaCantina = new Restaurant();
        $LaCantina->setName("La Cantina")
            ->setSlug("la-cantina")
            ->setHotel($SantaFeHotel)
            ->setImage('/uploads/restaurants/45.jpg');
        


        $manager->persist($Walts);
        $manager->persist($MarketHouseDeli);
        $manager->persist($CaseyCorner);
        $manager->persist($VictoriaHome);
        $manager->persist($PlazaGardens);
        $manager->persist($SilverSpur);
        $manager->persist($LastChance);
        $manager->persist($LuckNugget);
        $manager->persist($FuenteDelOro);
        $manager->persist($CowboyCookout);
        $manager->persist($ColonelHathi);
        $manager->persist($HakunaMatata);
        $manager->persist($AgrabahCafe);
        $manager->persist($CaptainJack);
        $manager->persist($ChaletDeMarionnettes);
        $manager->persist($ToadHall);
        $manager->persist($AubergeCendrillon);
        $manager->persist($BellaNote);
        $manager->persist($CafeHyperion);
        $manager->persist($EnCoulisse);
        $manager->persist($ChezRemy);
        $manager->persist($PymKitchen);
        $manager->persist($StarkFactory);
        $manager->persist($SuperDinner);
        $manager->persist($FiveGuys);
        $manager->persist($Vapiano);
        $manager->persist($Annette);
        $manager->persist($RoyalPub);
        $manager->persist($BillyBob);
        $manager->persist($LaGrangeaBilly);
        $manager->persist($SportsBar);
        $manager->persist($NyStyles);
        $manager->persist($Starbucks);
        $manager->persist($Steakhouse);
        $manager->persist($McDonalds);
        $manager->persist($RainForest);
        $manager->persist($EarlSandwich);
        $manager->persist($Downtown);
        $manager->persist($Manhattan);
        $manager->persist($HunterGrill);
        $manager->persist($BeaverCreek);
        $manager->persist($CapeCod);
        $manager->persist($YachtClub);
        $manager->persist($ChuckWagon);
        $manager->persist($LaCantina);
        $manager->flush();


    }
}
