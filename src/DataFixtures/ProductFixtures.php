<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product
                ->setName("product $i")
                ->setSlug("product_$i")
                ->setDescription("Ceci correspond au produit $i")
                ->setPrice($i)
                ->setImage("https://via.placeholder.com/300")
            ;

            $manager->persist($product);
        }
        
        $manager->flush();
    }
}
