<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Nationality;
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
            // we add four actors to each movie
            for ($j = 1; $j <= 10; $j++) {
                $actor->setNationality($this->getReference('nationality_' . rand(1, 10)));
            }
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            NationalityFixtures::class,
        ];
    }
}
