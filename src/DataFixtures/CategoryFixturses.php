<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixturses extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 4; $i++) {
            $category = new Categorie();
            $category->setNom('categorie_' . $i);

            $manager->persist($category);
            $reference = $category;
            $this->addReference($reference, $category);
        }

        $manager->flush();
    }
}
