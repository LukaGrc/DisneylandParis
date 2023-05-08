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
            ->setDescription("Le Disneyland Hotel est actuellement en rénovation pour vous offrir une expérience encore plus immersive, sublimée d'un service 5 étoiles et d'une hospitalité exceptionnelle.")
            ->setStars(5)
            ->setVideo("2Qnyepxy35c")
            ->setImage("/uploads/hotels/image-1.jpg")
            ->setBanner("/uploads/hotels/banner-1.jpg");
        $hotel_disneyland_tt = new HotelTravelTime();
        $hotel_disneyland_tt->setWalk(1)->setHotel($hotel_disneyland);

        $hotel_newyork = new Hotel();
        $hotel_newyork->setName('Disney New York Hotel')
            ->setSlug('disney-hotel-new-york')
            ->setDescription("Relaxez-vous dans cet hôtel 4 étoiles entièrement réinventé. Service premium, atmosphère inspirée de Manhattan et chef-d'œuvres MARVEL à couper le souffle assurent une immersion totale.")
            ->setStars(4)
            ->setVideo("Fdop1e8Ej_g")
            ->setImage("/uploads/hotels/image-2.jpg")
            ->setBanner("/uploads/hotels/banner-2.jpg");
        $hotel_newyork_tt = new HotelTravelTime();
        $hotel_newyork_tt->setWalk(10)->setBus(8)->setHotel($hotel_newyork);

        $hotel_newport = new Hotel();
        $hotel_newport->setName('Disney Newport Bay Club')
            ->setSlug('disney-newport-bay-club')
            ->setDescription("Appel à tous les amoureux de la mer ! Laissez le phare emblématique du Disney Newport Bay Club guider votre équipage au cœur d'une expérience 4 étoiles, où règne une élégance décontractée.")
            ->setStars(4)
            ->setVideo("BNT0MJPV88g")
            ->setImage("/uploads/hotels/image-3.jpg")
            ->setBanner("/uploads/hotels/banner-3.jpg");
        $hotel_newport_tt = new HotelTravelTime();
        $hotel_newport_tt->setWalk(15)->setBus(8)->setHotel($hotel_newport);

        $hotel_sequoia = new Hotel();
        $hotel_sequoia->setName('Disney Sequoia Lodge')
            ->setSlug('disney-sequoia-lodge')
            ->setDescription("Entouré de pins et de séquoias, cet élégant hôtel inspiré par un refuge typique d’un Parc National américain est érigé sur les bords du Lac Disney et se situe à quelques minutes à pied des Parcs Disney.")
            ->setStars(3)
            ->setVideo("qvLiHbNw2Kc")
            ->setImage("/uploads/hotels/image-4.jpg")
            ->setBanner("/uploads/hotels/banner-4.jpg");
        $hotel_sequoia_tt = new HotelTravelTime();
        $hotel_sequoia_tt->setWalk(15)->setBus(8)->setHotel($hotel_sequoia);

        $hotel_cheyenne = new Hotel();
        $hotel_cheyenne->setName('Disney Hotel Cheyenne')
            ->setSlug('disney-hotel-cheyenne')
            ->setDescription("Éperons aux pieds, chapeau de cowboy sur la tête, vous voilà prêts à découvrir le Disney Hotel Cheyenne !")
            ->setStars(3)
            ->setVideo("bo3slJIhKcM")
            ->setImage("/uploads/hotels/image-5.jpg")
            ->setBanner("/uploads/hotels/banner-5.jpg");
        $hotel_cheyenne_tt = new HotelTravelTime();
        $hotel_cheyenne_tt->setWalk(20)->setBus(8)->setHotel($hotel_cheyenne);

        $hotel_santafe = new Hotel();
        $hotel_santafe->setName('Disney Hotel Santa Fe')
            ->setSlug('disney-hotel-santa-fe')
            ->setDescription("Si vous aimez l'univers de Cars, vous raffolerez de l'ambiance chaleureuse et colorée de cet Hôtel Disney, comme tout droit sorti des vastes déserts du Sud-Ouest Américain ! Le plus ? Même les budgets serrés s'y retrouveront. Vroooum, foncez.")
            ->setStars(2)
            ->setVideo("8knfahTgHWE")
            ->setImage("/uploads/hotels/image-6.jpg")
            ->setBanner("/uploads/hotels/banner-6.jpg");
        $hotel_santafe_tt = new HotelTravelTime();
        $hotel_santafe_tt->setWalk(20)->setBus(8)->setHotel($hotel_santafe);

        $hotel_davycrockett = new Hotel();
        $hotel_davycrockett->setName('Disney Davy Crockett Ranch')
            ->setSlug('disney-davy-crockett-ranch')
            ->setDescription("À seulement 15 minutes en voiture des Parcs Disney, le convivial village du Disney Davy Crockett Ranch et ses bungalows vous attendent pour quelques jours de détente avec votre tribu !")
            ->setStars(0)
            ->setVideo("zkoOtKiPvsA")
            ->setImage("/uploads/hotels/image-7.jpg")
            ->setBanner("/uploads/hotels/banner-7.jpg");
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
