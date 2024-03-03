<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = ['Aventure', 'Action', 'Fantastique', 'Science-fiction', 'Drame', 'Horreur'];
        // $product = new Product();
        // $manager->persist($product);
        foreach (range(1, count($names)) as $i) {
            $category = new Category();
            $category->setName($names[$i - 1]);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
        }


        $manager->flush();
    }
}
