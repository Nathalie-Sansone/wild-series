<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $program1 = new Program();
        $program1->setTitle('The Leftovers');
        $program1->setSummary('Le 14 octobre 2011, deux pour cent des êtres humains ont disparu de la surface de la Terre de manière inexplicable. Les habitants de la petite ville de Mapleton sont confrontés à cette disparition lorsque nombre de leurs voisins, amis et amants s\'évanouissent dans la nature en un instant.');
        $program1->setCountry('USA');
        $program1->setYear(2014);
        $program1->setPoster('https://fr.web.img6.acsta.net/pictures/17/03/17/15/04/523818.jpg');
        $program1->setCategory($this->getReference('category_5'));
        $program1->addActor($this->getReference('actor_0'));
        $program1->addActor($this->getReference('actor_1'));
        $program1->addActor($this->getReference('actor_2'));
        $program1->addActor($this->getReference('actor_3'));
        $this->addReference('program_1', $program1);
        $slug = $this->slugify->generate($program1->getTitle());
        $program1->setSlug($slug);
        $manager->persist($program1);

        $program2 = new Program();
        $program2->setTitle('Mare of Easttown');
        $program2->setSummary( 'Dans un bourg rural de Pennsylvanie, une policière, meurtrie par des tragédies personnelles, enquête sur le meurtre d\'une adolescente et la disparition d\'une enfant.');
        $program2->setCountry('USA');
        $program2->setYear(2021);
        $program2->setPoster('https://fr.web.img2.acsta.net/r_1920_1080/pictures/21/04/14/11/04/4948483.jpg');
        $program2->setCategory($this->getReference('category_5'));
        $program2->addActor($this->getReference('actor_4'));
        $program2->addActor($this->getReference('actor_5'));
        $this->addReference('program_2', $program2);
        $slug = $this->slugify->generate($program2->getTitle());
        $program2->setSlug($slug);
        $manager->persist($program2);

        $program3 = new Program();
        $program3->setTitle('WandaVision');
        $program3->setSummary( 'WandaVision combine des éléments de sitcom traditionnelle à ceux de l’Univers Cinématographique Marvel. Wanda Maximoff alias Scarlet Witch et Vision sont des super-héros, vivant dans une banlieue idéalisée mais commençant à soupçonner que tout n’est peut-être pas ce qu\'il paraît être... ');
        $program3->setCountry('USA');
        $program3->setYear(2021);
        $program3->setPoster('https://fr.web.img6.acsta.net/r_1920_1080/pictures/21/02/26/10/19/5126469.jpg');
        $program3->setCategory($this->getReference('category_3'));
        $program3->addActor($this->getReference('actor_5'));
        $program3->addActor($this->getReference('actor_6'));
        $this->addReference('program_3', $program3);
        $slug = $this->slugify->generate($program3->getTitle());
        $program3->setSlug($slug);
        $manager->persist($program3);

        $program4 = new Program();
        $program4->setTitle('American Horror Story');
        $program4->setSummary(  'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct. De quoi vous confronter à vos plus grandes frayeurs !');
        $program4->setCountry('USA');
        $program4->setYear(2011);
        $program4->setPoster('https://fr.web.img6.acsta.net/r_1920_1080/pictures/20/03/11/13/46/2921127.jpg');
        $program4->setCategory($this->getReference('category_4'));
        $program4->addActor($this->getReference('actor_5'));
        $this->addReference('program_4', $program4);
        $slug = $this->slugify->generate($program4->getTitle());
        $program4->setSlug($slug);
        $manager->persist($program4);

        $program5 = new Program();
        $program5->setTitle('The Office');
        $program5->setSummary( 'Le quotidien d\'un groupe d\'employés de bureau dans une fabrique de papier en Pennsylvanie. Michael, le responsable régional, pense être le mec le plus drôle du bureau. Il ne se doute pas que ses employés le tolèrent uniquement parce que c\'est lui qui signe les chèques. S\'efforçant de paraître cool et apprécié de tous, Michael est en fait perçu comme étant pathétique...');
        $program5->setCountry('USA');
        $program5->setYear(2005);
        $program5->setPoster('https://fr.web.img6.acsta.net/r_1920_1080/pictures/14/02/04/13/20/128334.jpg');
        $program5->setCategory($this->getReference('category_6'));
        $program5->addActor($this->getReference('actor_7'));
        $this->addReference('program_5', $program5);
        $slug = $this->slugify->generate($program5->getTitle());
        $program5->setSlug($slug);
        $manager->persist($program5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
