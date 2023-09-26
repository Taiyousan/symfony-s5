<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // for each movie, we create a new instance of the Movie class
        // and we set its properties
        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle('Movie' . $i);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration(rand(60, 180));
            $movie->setDescription('Synopsis' . $i);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            // we add four actors to each movie
            for ($j = 1; $j <= 4; $j++) {
                $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            }
            $manager->persist($movie);
            $this->addReference('movie_' . $i, $movie);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
        ];
    }
}
