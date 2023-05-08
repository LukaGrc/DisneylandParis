<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

use DateTime;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@disneylandparis.com')
            ->setPassword('$2y$13$bgRwMQ2OTIju7Z7zKlxIkOHLThSrom5TBC0g7uyN42lHUOrdhgzHi')
            ->setFirstName('Admin')
            ->setLastName('ADMIN')
            ->setRoles(['ROLE_ADMIN'])
            ->setBirthDate(DateTime::createFromFormat('Y-m-d', '1990-01-01'))
            ->setAcceptOffers(false);
        
        $manager->persist($admin);

        $manager->flush();
    }
}
