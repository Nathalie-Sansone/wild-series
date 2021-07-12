<?php


namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
     public const MAX_LAST_INSERT = 3;

    /**
     * @Route("/", name="app_index")
     */

    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findBy(
            [],
            ['id' => 'DESC'],
            self::MAX_LAST_INSERT
        );
        return $this->render('index.html.twig', [
            'programs' => $programs
        ]);
    }

    public function navbarTop(CategoryRepository $categoryRepository): Response
    {
        return $this->render('_navbartop.html.twig', [
            'categories' => $categoryRepository->findBy([], ['id' => 'DESC'])
        ]);
    }
}
