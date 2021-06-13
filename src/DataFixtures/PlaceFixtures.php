<?php

namespace App\DataFixtures;

use App\Entity\Endroit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $time = new \DateTime();
        for ($i =0; $i<10;  $i++) {
            $place = new Endroit();
            $place->setName("place$i");
            $place->setDescription("Place n $i");
            $place->setAgeMax(30);
            $place->setAgeMin(20);
            $place->setEcoFriendly("true");
            $place->setPhoto("");
            $place->setPriceMax($i);
            $place->setPriceMin($i);
            $place->setUser("user$i");
            $manager->persist($place);
        }

        $manager->flush();
        $manager->flush();
    }
}
