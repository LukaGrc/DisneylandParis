<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\AttractionCategory;

class AttractionCategoryFixtures extends Fixture
{
    public const CAT_FRIS_REFERENCE = 'cat-fris';
    public const CAT_FAM_REFERENCE = 'cat-fam';
    public const CAT_PET_REFERENCE = 'cat-pet';
    public const CAT_NON_REFERENCE = 'cat-non';

    public function load(ObjectManager $manager): void
    {
        $cat_frissons = new AttractionCategory();
        $cat_frissons->setName('Grands Frissons')
            ->setSlug('grands-frissons');

        $cat_famille = new AttractionCategory();
        $cat_famille->setName('Aventures en famille')
            ->setSlug('aventures-en-famille');

        $cat_petits = new AttractionCategory();
        $cat_petits->setName('Avec les plus petits')
            ->setSlug('avec-les-plus-petits');

        $cat_non = new AttractionCategory();
        $cat_non->setName('Non classé')
            ->setSlug('non-classe');


        $manager->persist($cat_frissons);
        $manager->persist($cat_famille);
        $manager->persist($cat_petits);
        $manager->persist($cat_non);
        $manager->flush();

        $this->addReference(self::CAT_FRIS_REFERENCE, $cat_frissons);
        $this->addReference(self::CAT_FAM_REFERENCE, $cat_famille);
        $this->addReference(self::CAT_PET_REFERENCE, $cat_petits);
        $this->addReference(self::CAT_NON_REFERENCE, $cat_non);
    }
}
