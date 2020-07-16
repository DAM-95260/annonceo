<?php

namespace App\DataFixtures;

use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NoteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i <= 10; $i++){
            $note = new Note();
            $note
             ->setNote($faker->numberBetween(0, 10))
             ->setAvis($faker->realText())
             ->setCreation(dateBetween('-1 months'))
             ->setAuteur('utilisateur_'.$i)
             ;

             $utilisateurReference = 'utilisateur_' .  $faker->numberBetween(1, 10);
            /** @var Utilisateur $utilisateur */
            $utilisateur = $this->getReference($utilisateurReference);
            $note->setNom($utilisateur);

            $manager->persist($note);



        }

        $manager->flush();
    }
}
