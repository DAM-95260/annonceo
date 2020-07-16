<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

       // Générer 50 annonces
       for ($i = 1; $i <= 50; $i++){
           $annonce = new Annonce();
           $annonce
            ->setTitre('annonce_' . $i)
            ->setDescription($faker->realText())
            ->setPrix($faker->numberBetween(1000, 90000))
            ->setVille($faker->sentence(1))
            ->setCodePostale($faker->numerify('######'))
            ->setAdresse($faker->sentence(4))
            ->setCreation($faker->dateTime())
            ;
         

            $manager->persist($annonce);


       }

        $manager->flush();

    }

       public function getDependencies()
       {
            return [
               CategoryFixturses::class,
               AppFixturses::class
           ];
       }

    
}
