<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Nationality;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // tableau de 10 nationalités
        $nationalities = ['Français', 'Anglais', 'Espagnol', 'Italien', 'Japonais', 'Norvégien', 'Américain', 'Mexicain', 'Algérien', 'Marocain'];
        foreach (range(1, 40) as $i) {
            $nationality = new Nationality();
            $nationality->setName($nationalities[$i - 1]);
            $manager->persist($nationality);
            $this->addReference('movie_' . $i, $nationality);
        }

        $manager->flush();
    }
}
