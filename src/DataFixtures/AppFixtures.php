<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 10; $i++) {
            $utilisateur = new Utilisateur();


            $utilisateur
                ->setPseudo('utilisateur-'.$i)
                ->setEmail('utilisateur' . $i . '@mail.org')
                ->setPassword($this->passwordEncoder->encodePassword($utilisateur, 'utilisateur' . $i))
                ->setNom('utilisateur'.$i)
                ->setPrenom($faker->sentence(1))
                ->setTelephone($faker->numerify('06########'))
                ->setInscription($faker->dateTimeBetween('-6 months'))
                ->setRoles(['ROLE_UTILISATEUR'])
            ;
            $manager->persist($utilisateur);
        }

        for ($i = 1; $i <= 5; $i++) {
            $moderateur = new Utilisateur();


            $moderateur
                ->setPseudo('moderateur-'.$i)
                ->setEmail('moderateur' . $i . '@mail.org')
                ->setPassword($this->passwordEncoder->encodePassword($moderateur, 'moderateur' . $i))
                ->setNom('moderateur'.$i)
                ->setPrenom($faker->sentence(1))
                ->setTelephone($faker->numerify('06########'))
                ->setInscription($faker->dateTimeBetween('-6 months'))
                ->setRoles(['ROLE_MODERATEUR'])
            ;
            $manager->persist($moderateur);
        }

        for ($i = 1; $i <= 2; $i++) {
            $admin = new Utilisateur();


            $admin
                ->setPseudo('admin-'.$i)
                ->setEmail('admin' . $i . '@mail.org')
                ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin' . $i))
                ->setNom('admin'.$i)
                ->setPrenom($faker->sentence(1))
                ->setTelephone($faker->numerify('06########'))
                ->setInscription($faker->dateTimeBetween('-6 months'))
                ->setRoles(['ROLE_ADMIN'])
            ;
            $manager->persist($admin);
        }


        $manager->flush();
    }
}
