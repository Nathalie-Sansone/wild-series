<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        for($i=0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setNumber($i +1);
            $episode->setTitle('Episode' . ($i +1));
            $episode->setSynopsis('Résumé de l\'épisode' . ($i +1));
            $episode->setSeason($this->getReference('season_1'));
            $slug = $this->slugify->generate($episode->getTitle());
            $episode->setSlug($slug);
            $manager->persist($episode);

        }

        for($i=0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setNumber($i +1);
            $episode->setTitle('Episode' . ($i +1));
            $episode->setSynopsis('Résumé de l\'épisode' . ($i +1));
            $episode->setSeason($this->getReference('season_2'));
            $slug = $this->slugify->generate($episode->getTitle());
            $episode->setSlug($slug);
            $manager->persist($episode);

        }

        for($i=0; $i < 8; $i++) {
            $episode = new Episode();
            $episode->setNumber($i +1);
            $episode->setTitle('Episode' . ($i +1));
            $episode->setSynopsis('Résumé de l\'épisode' . ($i +1));
            $episode->setSeason($this->getReference('season_3'));
            $slug = $this->slugify->generate($episode->getTitle());
            $episode->setSlug($slug);
            $manager->persist($episode);

        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class
        ];
    }
}
