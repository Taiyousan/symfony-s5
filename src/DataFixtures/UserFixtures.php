<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $firstNames = ['John', 'Jane', 'Jack', 'Henri', 'Hubert', 'Luke', 'Jules', 'Tom', 'Jim', 'Joe'];
        $lastNames = ['Doe', 'Martin', 'Sparrow', 'Charpentier', 'Dalton', 'Hugues', 'Verne', 'Robert', 'François', 'Dupont'];
        foreach (range(1, 10) as $i) {
            $user = new User();
            $user->setEmail($firstNames[$i - 1] . $lastNames[$i - 1] . '@gmail.com');
            $user->setPassword('$2y$13$mbzn7.IBMUl80ZGi1k563.f7FoS/pl1qBcVOn/8YVX4FowcyaOgF2');
            $user->setUsername($firstNames[$i - 1] . $lastNames[$i - 1]);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
