<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $time = new \DateTime();
        for ($i =0; $i<10;  $i++) {
            $event = new Evenement();
            $event->setName("event$i");
            $event->setDescription("Evenement n $i");
            $event->setAgeMax(30);
            $event->setAgeMin(20);
            $event->setEcoFriendly("true");
            $event->setPhoto("");
            $event->setPrice($i);
            $event->setDate($time);
            $event->setDuration(4);
            $event->setLink("");
            $event->setNumber(3);
            $manager->persist($event);
        }

        $manager->flush();

        $manager->flush();
    }
}
