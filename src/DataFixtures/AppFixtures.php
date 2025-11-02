<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new User();

            $user->setName($faker->unique()->name());
            $user->setEmail($faker->unique()->email());
            // $user->setPassword($passworHasher->hashPassword($user, 'qwerty'));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
