<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\TicketType;

class TicketTypeFixtures extends Fixture
{
    public const TICKETTYPE_ONE_ONE = 'one_one';
    public const TICKETTYPE_TWO_ONE = 'two_one';
    public const TICKETTYPE_TWO_TWO = 'two_two';
    public const TICKETTYPE_TWO_THREE = 'two_three';
    public const TICKETTYPE_TWO_FOUR = 'two_four';

    public function load(ObjectManager $manager): void
    {
        // 1 park / 1 day
        $one_one = new TicketType();
        $one_one->setNbParks(1)
            ->setNbDays(1)
            ->setPrice(56.00);

        // 2 parks / 1 day
        $two_one = new TicketType();
        $two_one->setNbParks(2)
            ->setNbDays(1)
            ->setPrice(81.00);

        // 2 parks / 2 days
        $two_two = new TicketType();
        $two_two->setNbParks(2)
            ->setNbDays(2)
            ->setPrice(71.00);

        // 2 parks / 3 days
        $two_three = new TicketType();
        $two_three->setNbParks(2)
            ->setNbDays(3)
            ->setPrice(67.00);

        // 2 parks / 4 days
        $two_four = new TicketType();
        $two_four->setNbParks(2)
            ->setNbDays(4)
            ->setPrice(59.00);


        $manager->persist($one_one);
        $manager->persist($two_one);
        $manager->persist($two_two);
        $manager->persist($two_three);
        $manager->persist($two_four);

        $this->addReference(self::TICKETTYPE_ONE_ONE, $one_one);
        $this->addReference(self::TICKETTYPE_TWO_ONE, $two_one);
        $this->addReference(self::TICKETTYPE_TWO_TWO, $two_two);
        $this->addReference(self::TICKETTYPE_TWO_THREE, $two_three);
        $this->addReference(self::TICKETTYPE_TWO_FOUR, $two_four);

        $manager->flush();
    }
}
