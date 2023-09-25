<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;;

class ActorFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $firstNames = ['John', 'Jane', 'Jack', 'Henri', 'Hubert', 'Luke', 'Jules', 'Tom', 'Jim', 'Joe'];

        $lastNames = ['Doe', 'Martin', 'Sparrow', 'Charpentier', 'Dalton', 'Hugues', 'Verne', 'Robert', 'François', 'Dupont'];
        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($firstNames[$i - 1]);
            $actor->setLastName($lastNames[$i - 1]);
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }
}
