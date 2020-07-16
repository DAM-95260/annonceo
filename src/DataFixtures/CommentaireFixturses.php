<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommentaireFixturses extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i <= 10; $i++){
            $note = new Note();
            $note
             ->setAuteur('moderateur_'.$i)
             ->setCommentaire($faker->realText())
             ->setCreation(dateTimeBetween('-1 months'))
             ;

             $utilisateurReference = 'utilisateur_' .  $faker->numberBetween(1, 10);
             /** @var Utilisateur $utilisateur */
             $utilisateur = $this->getReference($utilisateurReference);
             $commentaire->setNom($utilisateur);

             $annonceReference = 'annonce_' .  $faker->numberBetween(1, 50);
            /** @var Annonce $annonce */
            $annonce = $this->getReference($annonceReference);
            $commentaire->setNom($annonce);

            $manager->persist($commentaire);
        }

        $manager->flush();
    }
}
