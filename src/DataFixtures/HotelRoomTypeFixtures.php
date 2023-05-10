<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\HotelRoomType;

use App\DataFixtures\HotelFixtures;

class HotelRoomTypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            HotelFixtures::class,
        ];
    }

    // HOTEL NEW YORK
    public const NEWYORK_RT_SUP_REFERENCE = 'newyork-rt-sup';
    public const NEWYORK_RT_SUPT_REFERENCE = 'newyork-rt-supt';
    public const NEWYORK_RT_SUPVJ_REFERENCE = 'newyork-rt-supvj';
    public const NEWYORK_RT_EMP_REFERENCE = 'newyork-rt-emp';
    public const NEWYORK_RT_EMPVL_REFERENCE = 'newyork-rt-empvl';
    // HOTEL SANTA FE
    public const SANTAFE_RT_STD_REFERENCE = 'santafe-rt-std';
    public const SANTAFE_RT_STDC_REFERENCE = 'santafe-rt-stdc';
    public const SANTAFE_RT_STDR_REFERENCE = 'santafe-rt-stdr';
    // HOTEL CHEYENNE
    public const CHEYENNE_RT_STD_REFERENCE = 'cheyenne-rt-std';
    public const CHEYENNE_RT_STDC_REFERENCE = 'cheyenne-rt-stdc';
    public const CHEYENNE_RT_STDR_REFERENCE = 'cheyenne-rt-stdr';
    // HOTEL SEQUOIA
    public const SEQUOIA_RT_STD_REFERENCE = 'sequoia-rt-std';
    public const SEQUOIA_RT_STDC_REFERENCE = 'sequoia-rt-stdc';
    public const SEQUOIA_RT_STDCL_REFERENCE = 'sequoia-rt-stdcl';
    public const SEQUOIA_RT_GOLDFC_REFERENCE = 'sequoia-rt-goldfc';
    public const SEQUOIA_RT_GOLDFCL_REFERENCE = 'sequoia-rt-goldfcl';
    // HOTEL NEWPORT
    public const NEWPORT_RT_STD_REFERENCE = 'newport-rt-std';
    public const NEWPORT_RT_STDL_REFERENCE = 'newport-rt-stdl';
    public const NEWPORT_RT_STDT_REFERENCE = 'newport-rt-stdt';
    public const NEWPORT_RT_COMP_REFERENCE = 'newport-rt-comp';
    public const NEWPORT_RT_COMPL_REFERENCE = 'newport-rt-compl';
    // DAVY CROCKETT RANCH
    public const DAVYCROCKETT_RT_TRAPPEUR_REFERENCE = 'davycrockett-rt-trappeur';
    public const DAVYCROCKETT_RT_PIONNIER_REFERENCE = 'davycrockett-rt-pionnier';

    public function load(ObjectManager $manager): void
    {

        // HOTEL NEW YORK

        $hotel_newyork_rt_sup = new HotelRoomType();
        $hotel_newyork_rt_sup->setName('Chambre Supérieure')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE))
            ->setImage('/uploads/hotels/rooms/1.jpg')
            ->setCapacity(4)
            ->setArea(31)
            ->setPrice(200);

        $hotel_newyork_rt_supt = new HotelRoomType();
        $hotel_newyork_rt_supt->setName('Chambre Supérieure avec Terrasse')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE))
            ->setImage('/uploads/hotels/rooms/2.jpg')
            ->setCapacity(4)
            ->setArea(31)
            ->setPrice(220);

        $hotel_newyork_rt_supvj = new HotelRoomType();
        $hotel_newyork_rt_supvj->setName('Chambre Supérieure - Vue sur jardin')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE))
            ->setImage('/uploads/hotels/rooms/3.jpg')
            ->setCapacity(4)
            ->setArea(31)
            ->setPrice(220);

        $hotel_newyork_rt_emp = new HotelRoomType();
        $hotel_newyork_rt_emp->setName('Chambre Empire')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE))
            ->setCapacity(4)
            ->setArea(31)
            ->setPrice(240);

        $hotel_newyork_rt_empvl = new HotelRoomType();
        $hotel_newyork_rt_empvl->setName('Chambre Empire - Vue sur lac')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWYORK_REFERENCE))
            ->setCapacity(4)
            ->setArea(31)
            ->setPrice(260);

        $manager->persist($hotel_newyork_rt_sup);
        $manager->persist($hotel_newyork_rt_supt);
        $manager->persist($hotel_newyork_rt_supvj);
        $manager->persist($hotel_newyork_rt_emp);
        $manager->persist($hotel_newyork_rt_empvl);

        $this->addReference(self::NEWYORK_RT_SUP_REFERENCE, $hotel_newyork_rt_sup);
        $this->addReference(self::NEWYORK_RT_SUPT_REFERENCE, $hotel_newyork_rt_supt);
        $this->addReference(self::NEWYORK_RT_SUPVJ_REFERENCE, $hotel_newyork_rt_supvj);
        $this->addReference(self::NEWYORK_RT_EMP_REFERENCE, $hotel_newyork_rt_emp);
        $this->addReference(self::NEWYORK_RT_EMPVL_REFERENCE, $hotel_newyork_rt_empvl);


        // HOTEL SANTA FE

        $hotel_santafe_rt_std = new HotelRoomType();
        $hotel_santafe_rt_std->setName('Chambre Standard Cars')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SANTAFE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(100);

        $hotel_santafe_rt_stdc = new HotelRoomType();
        $hotel_santafe_rt_stdc->setName('Chambre Standard Cars - Proche commodités')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SANTAFE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(120);

        $hotel_santafe_rt_stdr = new HotelRoomType();
        $hotel_santafe_rt_stdr->setName('Chambre Standard Cars - Côté rivière')
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SANTAFE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(120);

        $manager->persist($hotel_santafe_rt_std);
        $manager->persist($hotel_santafe_rt_stdc);
        $manager->persist($hotel_santafe_rt_stdr);
        $this->addReference(self::SANTAFE_RT_STD_REFERENCE, $hotel_santafe_rt_std);
        $this->addReference(self::SANTAFE_RT_STDC_REFERENCE, $hotel_santafe_rt_stdc);
        $this->addReference(self::SANTAFE_RT_STDR_REFERENCE, $hotel_santafe_rt_stdr);


        // HOTEL CHEYENNE

        $hotel_cheyenne_rt_std = new HotelRoomType();
        $hotel_cheyenne_rt_std->setName("Chambre Standard Woody's Roundup")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_CHEYENNE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(100);

        $hotel_cheyenne_rt_stdc = new HotelRoomType();
        $hotel_cheyenne_rt_stdc->setName("Chambre Standard Woody's Roundup - Proche installations")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_CHEYENNE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(120);

        $hotel_cheyenne_rt_stdr = new HotelRoomType();
        $hotel_cheyenne_rt_stdr->setName("Chambre Double/Lit Gigogne Woody's Roundup - Côté rivière")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_CHEYENNE_REFERENCE))
            ->setCapacity(4)
            ->setArea(21)
            ->setPrice(120);

        $manager->persist($hotel_cheyenne_rt_std);
        $manager->persist($hotel_cheyenne_rt_stdc);
        $manager->persist($hotel_cheyenne_rt_stdr);
        $this->addReference(self::CHEYENNE_RT_STD_REFERENCE, $hotel_cheyenne_rt_std);
        $this->addReference(self::CHEYENNE_RT_STDC_REFERENCE, $hotel_cheyenne_rt_stdc);
        $this->addReference(self::CHEYENNE_RT_STDR_REFERENCE, $hotel_cheyenne_rt_stdr);


        // HOTEL SEQUOIA

        $hotel_sequoia_rt_std = new HotelRoomType();
        $hotel_sequoia_rt_std->setName("Chambre Standard")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(150);

        $hotel_sequoia_rt_stdc = new HotelRoomType();
        $hotel_sequoia_rt_stdc->setName("Chambre Standard - Proche installations hôtelières")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(170);

        $hotel_sequoia_rt_stdcl = new HotelRoomType();
        $hotel_sequoia_rt_stdcl->setName("Chambre Standard - Proche installations hôtelières - Côté lac")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(170);

        $hotel_sequoia_rt_goldfc = new HotelRoomType();
        $hotel_sequoia_rt_goldfc->setName("Chambre Golden Forest Club")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(200);

        $hotel_sequoia_rt_goldfcl = new HotelRoomType();
        $hotel_sequoia_rt_goldfcl->setName("Chambre Golden Forest Club - Côté lac")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_SEQUOIA_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(220);

        $manager->persist($hotel_sequoia_rt_std);
        $manager->persist($hotel_sequoia_rt_stdc);
        $manager->persist($hotel_sequoia_rt_stdcl);
        $manager->persist($hotel_sequoia_rt_goldfc);
        $manager->persist($hotel_sequoia_rt_goldfcl);

        $this->addReference(self::SEQUOIA_RT_STD_REFERENCE, $hotel_sequoia_rt_std);
        $this->addReference(self::SEQUOIA_RT_STDC_REFERENCE, $hotel_sequoia_rt_stdc);
        $this->addReference(self::SEQUOIA_RT_STDCL_REFERENCE, $hotel_sequoia_rt_stdcl);
        $this->addReference(self::SEQUOIA_RT_GOLDFC_REFERENCE, $hotel_sequoia_rt_goldfc);
        $this->addReference(self::SEQUOIA_RT_GOLDFCL_REFERENCE, $hotel_sequoia_rt_goldfcl);


        // HOTEL NEWPORT
        
        $hotel_newport_rt_std = new HotelRoomType();
        $hotel_newport_rt_std->setName("Chambre Supérieure")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(150);
        
        $hotel_newport_rt_stdl = new HotelRoomType();
        $hotel_newport_rt_stdl->setName("Chambre Supérieure - Côté lac")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(170);
        
        $hotel_newport_rt_stdt = new HotelRoomType();
        $hotel_newport_rt_stdt->setName("Chambre Supérieure avec Terrasse")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE))
            ->setCapacity(4)
            ->setArea(27)
            ->setPrice(170);

        $hotel_newport_rt_comp = new HotelRoomType();
        $hotel_newport_rt_comp->setName("Chambre Compass Club")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE))
            ->setCapacity(2)
            ->setArea(27)
            ->setPrice(200);

        $hotel_newport_rt_compl = new HotelRoomType();
        $hotel_newport_rt_compl->setName("Chambre Compass Club - Côté lac")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_NEWPORT_REFERENCE))
            ->setCapacity(2)
            ->setArea(27)
            ->setPrice(220);

        $manager->persist($hotel_newport_rt_std);
        $manager->persist($hotel_newport_rt_stdl);
        $manager->persist($hotel_newport_rt_stdt);
        $manager->persist($hotel_newport_rt_comp);
        $manager->persist($hotel_newport_rt_compl);

        $this->addReference(self::NEWPORT_RT_STD_REFERENCE, $hotel_newport_rt_std);
        $this->addReference(self::NEWPORT_RT_STDL_REFERENCE, $hotel_newport_rt_stdl);
        $this->addReference(self::NEWPORT_RT_STDT_REFERENCE, $hotel_newport_rt_stdt);
        $this->addReference(self::NEWPORT_RT_COMP_REFERENCE, $hotel_newport_rt_comp);
        $this->addReference(self::NEWPORT_RT_COMPL_REFERENCE, $hotel_newport_rt_compl);


        // DAVY CROCKETT RANCH

        $hotel_davycrockett_rt_trappeur = new HotelRoomType();
        $hotel_davycrockett_rt_trappeur->setName("Bungalow Tribu Trappeur")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_DAVYCROCKETT_REFERENCE))
            ->setCapacity(6)
            ->setArea(40)
            ->setPrice(150);

        $hotel_davycrockett_rt_pionnier = new HotelRoomType();
        $hotel_davycrockett_rt_pionnier->setName("Bungalow Tribu Pionnier")
            ->setHotel($this->getReference(HotelFixtures::HOTEL_DAVYCROCKETT_REFERENCE))
            ->setCapacity(6)
            ->setArea(40)
            ->setPrice(150);

        $manager->persist($hotel_davycrockett_rt_trappeur);
        $manager->persist($hotel_davycrockett_rt_pionnier);

        $this->addReference(self::DAVYCROCKETT_RT_TRAPPEUR_REFERENCE, $hotel_davycrockett_rt_trappeur);
        $this->addReference(self::DAVYCROCKETT_RT_PIONNIER_REFERENCE, $hotel_davycrockett_rt_pionnier);

        $manager->flush();
    }
}
