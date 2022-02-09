<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;

    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        //generating fake users
        for ($u=0; $u < 10; $u++){

            $user = new User();
            $passHash = $this->hasher->hashPassword($user,'password');
            $user->setEmail($faker->email);
            $user->setPassword($passHash);
            $manager->persist($user);
        }
        //generating fake articles
        for ($a=0; $a < random_int(5,15); $a++){

            $article = (new Article())->setAuthor($user)
                ->setContent($faker->text(300))
                ->setName($faker->text(50));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
