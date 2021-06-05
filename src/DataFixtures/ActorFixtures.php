<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    const ACTORS = [
        'Justin Theroux',
        'Carrie Coon',
        'Liv Tyler',
        'Christopher Eccleston',
        'Kate Winslet',
        'Evan Peters',
        'Elizabeth Olsen',
        'Steve Carell'
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::ACTORS as $key => $actorName) {
            $actor = new Actor();
            $actor->setName($actorName);
            $manager->persist($actor);
            $this->addReference('actor_' . $key, $actor);
        }
        $manager->flush();
    }
}
