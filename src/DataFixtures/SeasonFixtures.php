<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $season1 = new Season();
        $season1->setYear(2014);
        $season1->setNumber(1);
        $season1->setDescription('Trois ans plus tard, la vie a repris son cours dans la bourgade de Mapleton, une petite ville près de New York, mais rien n\'est plus comme avant. Personne n\'a oublié ce qui s’est passé, ni ceux qui ont disparu.');
        $season1->setProgram($this->getReference('program_1'));
        $this->addReference('season_1', $season1);
        $manager->persist($season1);

        $season2 = new Season();
        $season2->setYear(2015);
        $season2->setNumber(2);
        $season2->setDescription('La ville de Jarden, au Texas, a été rebaptisée Miracle parce que personne n\'y a été pris. La petite ville est désormais une destination pour les touristes et pour ceux qui croient qu\'elle a le pouvoir de les protéger.');
        $season2->setProgram($this->getReference('program_1'));
        $this->addReference('season_2', $season2);
        $manager->persist($season2);

        $season3 = new Season();
        $season3->setYear(2017);
        $season3->setNumber(3);
        $season3->setDescription('Trois ans se sont écoulés depuis que la ville de Miracle a été envahie par le groupe de "Guilty Remnants". Alors que le septième anniversaire du Ravissement approche à grand pas, de plus en plus de monde se rassemble dans la petite bourgade texane et de nombreux citoyens sont convaincus que la fin du monde approche.');
        $season3->setProgram($this->getReference('program_1'));
        $this->addReference('season_3', $season3);
        $manager->persist($season3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
