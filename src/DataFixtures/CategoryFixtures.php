<?php


namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use Cassandra\Exception\DivideByZeroException;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture

{
    const CATEGORIES = [
        'Action',
        'Aventure',
        'Animation',
        'Fantastique',
        'Horreur',
    ];

    public function load(ObjectManager $manager)
    {
        $cat1 = new Category();
        $cat1->setName('Action');
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName('Animation');
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName('Aventure');
        $manager->persist($cat3);

        $cat4 = new Category();
        $cat4->setName('Fantastique');
        $manager->persist($cat4);

        $cat5 = new Category();
        $cat5->setName('Horreur');
        $manager->persist($cat5);

        $e1s1 = new Episode();
        $e1s1->setNumber(1);
        $e1s1->setTitle('À toi qui vis 2000 ans plus tard');
        $e1s1->setSynopsis('Après cent ans de paix, l\'humanité se rappela soudain ce qu\'est d\'être à la merci des Titans.');
        $manager->persist($e1s1);

        $e2s1 = new Episode();
        $e2s1->setNumber(2);
        $e2s1->setTitle('Ce jour-là');
        $e2s1->setSynopsis('Une fois que les titans ont percé le mur, les citoyens de Shiganshina doivent s\'enfuir pour sauver leur vie. Toutefois, une vie dure attend tous ceux qui ont réussi à se mettre à l\'abri.');
        $manager->persist($e2s1);

        $e3s1 = new Episode();
        $e3s1->setNumber(3);
        $e3s1->setTitle('Une faible étincelle dans le désespoir');
        $e3s1->setSynopsis('Eren commence sa formation, mais des questions sur son passé douloureux l\'accable. Quand il échoue dans un exercice de manœuvres, Berholt et Reiner lui offrent des conseils.');
        $manager->persist($e3s1);

        $e1s2 = new Episode();
        $e1s2->setNumber(1);
        $e1s2->setTitle('Le Titan Bestial');
        $e1s2->setSynopsis('La découverte choquante de l\'intérieur des murs provoque un émoi. Ailleurs, alors que les nouvelles recrues sont retenues en observation, une menace surprenante apparaît.');
        $manager->persist($e1s2);

        $e2s2 = new Episode();
        $e2s2->setNumber(2);
        $e2s2->setTitle('De retour au village');
        $e2s2->setSynopsis('Avec l\'apparition de Titans dans le mur Rose, Sasha et Connie se portent volontaire pour aller avertir leurs villages de la menace imminente.');
        $manager->persist($e2s2);

        $e3s2 = new Episode();
        $e3s2->setNumber(3);
        $e3s2->setTitle('Direction le sud-ouest');
        $e3s2->setSynopsis('Les Scouts recherchent un trou dans le mur tandis qu\'Eren et les autres apprennent que quelqu\'un de proche connait toutes les réponses.');
        $manager->persist($e3s2);

        $e1s3 = new Episode();
        $e1s3->setNumber(1);
        $e1s3->setTitle('Colonne de fumée');
        $e1s3->setSynopsis('Après avoir consenti à faire d\'énorme sacrifice pour récupérer Eren, une nouvelle menace venant de l\'ombre met la vie de chacun en danger.');
        $manager->persist($e1s3);

        $e2s3 = new Episode();
        $e2s3->setNumber(2);
        $e2s3->setTitle('Douleur');
        $e2s3->setSynopsis('Le bataillon d\'exploration prend position contre un nouvel ennemi, mais les Titans ne sont plus les seuls ennemis qu\'ils devront combattre.');
        $manager->persist($e2s3);

        $e3s3 = new Episode();
        $e3s3->setNumber(3);
        $e3s3->setTitle('Souvenirs');
        $e3s3->setSynopsis('Alors qu’Historia et Erwin se remémorent un événement déterminant de leur passé, le bataillon d’exploration concocte un plan pour sauver Eren et récupérer le Mur Maria.');
        $manager->persist($e3s3);

        $season1 = new Season();
        $season1->setNumber(1);
        $season1->setYear(2013);
        $season1->setDescription('Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n\'a qu\'un rêve : entrer dans le corps d\'élite chargé de découvrir l\'origine des titans et de les annihiler jusqu\'au dernier.');
        $season1->addEpisode($e1s1);
        $season1->addEpisode($e2s1);
        $season1->addEpisode($e3s1);

        $manager->persist($season1);

        $season2 = new Season();
        $season2->setNumber(2);
        $season2->setYear(2017);
        $season2->setDescription('L\'arrivée du Titan Colossal a complètement bouleversé la vie d’Eren Jäger. Après s\'être enrôlé dans l\'armée pour le combattre ainsi que ses congénères, Eren découvre qu\'il peut se transformer lui-même en ce qu\'il exècre le plus.');
        $season2->addEpisode($e1s2);
        $season2->addEpisode($e2s2);
        $season2->addEpisode($e3s2);

        $manager->persist($season2);

        $season3 = new Season();
        $season3->setNumber(3);
        $season3->setYear(2018);
        $season3->setDescription('Kidnappé par Bertholdt et Reiner, Eren a pu s\'échapper grâce à l\'aide du bataillon d’exploration. Mais les pertes sont lourdes, et ce d\'autant plus qu\'Ymir a décidé de rejoindre l\'ennemi. Alors que le roi donne l\'ordre de capturer Christa et Eren, un esprit de rébellion gagne peu à peu les rangs du bataillon.');
        $season3->addEpisode($e1s3);
        $season3->addEpisode($e2s3);
        $season3->addEpisode($e3s3);

        $manager->persist($season3);

        $program1 = new Program();
        $program1->setTitle('L\'Attaque des Titans');
        $program1->setSummary('Dans un monde ravagé par des titans mangeurs d\'homme, les rares survivants n\'ont d\'autre choix pour vivre que de se cloîtrer dans une cité-forteresse.');
        $program1->setPoster('https://media.senscritique.com/media/000006484765/source_big/L_Attaque_des_Titans.jpg');
        $program1->setCategory($cat2);
        $program1->setYear(2013);
        $program1->setCountry('Japon');
        $program1->addSeason($season1);
        $program1->addSeason($season2);
        $program1->addSeason($season3);

        $manager->persist($program1);

        $manager->flush();
    }
}