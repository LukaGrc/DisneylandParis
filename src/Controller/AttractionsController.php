<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Attraction;
use App\Entity\AttractionCategory;

class AttractionsController extends AbstractController
{
    #[Route('/attractions', name: 'app_attractions')]
    public function index(): Response
    {
        return $this->render('attractions/index.html.twig', [
            'controller_name' => 'AttractionsController',
        ]);
    }

    #[Route('/attractions/{slug_cat}', name: 'app_attraction_cat')]
    public function attractions_cat(string $slug_cat, EntityManagerInterface $entityManager): Response
    {
        $repository_cat = $entityManager->getRepository(AttractionCategory::class);
        $category = $repository_cat->findOneBy(['slug' => $slug_cat]);
        if ($category === null) throw new NotFoundHttpException('Category was not found'); // This should activate the 404-page

        return $this->render('attractions/index.html.twig', [
            'controller_name' => $category->getName(),
        ]);
    }

    #[Route('/attractions/{slug_dest}/{slug_attraction}', name: 'app_attraction')]
    public function attraction(string $slug, EntityManagerInterface $entityManager): Response
    {
        

        return $this->render('attractions/index.html.twig', [
            'controller_name' => 'AttractionsController',
        ]);
    }
}
