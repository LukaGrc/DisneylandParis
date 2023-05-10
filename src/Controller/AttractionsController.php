<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Attraction;
use App\Entity\AttractionCategory;
use App\Entity\Destination;

class AttractionsController extends AbstractController
{
    #[Route('/attractions', name: 'app_attractions')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $repository_cat = $entityManager->getRepository(AttractionCategory::class);
        $categories = $repository_cat->findAll();

        $repository_attrac = $entityManager->getRepository(Attraction::class);
        $attractions = $repository_attrac->findAll();

        return $this->render('attractions/index.html.twig', [
            'attractions' => $attractions,
            'categories' => $categories,
        ]);
    }

    #[Route('/attractions/{slug_catordest}', name: 'app_attraction_cat')]
    public function attractions_cat(string $slug_catordest, EntityManagerInterface $entityManager): Response
    {
        $repository_cat = $entityManager->getRepository(AttractionCategory::class);
        $category = $repository_cat->findOneBy(['slug' => $slug_catordest]);
        if ($category === null) {
            $repository_dest = $entityManager->getRepository(Destination::class);
            $destination = $repository_dest->findOneBy(['slug' => $slug_catordest]);
            if ($destination === null) {
                throw new NotFoundHttpException('Category/Destination was not found'); // This should activate the 404-page
            }

            return $this->render('attractions/by_destination.html.twig', [
                'controller_name' => $destination->getName(),
            ]);
        }    

        return $this->render('attractions/by_category.html.twig', [
            'controller_name' => $category->getName(),
        ]);
    }

    #[Route('/attractions/{slug_dest}/{slug_attraction}', name: 'app_attraction')]
    public function attraction(string $slug_dest, string $slug_attraction, EntityManagerInterface $entityManager): Response
    {
        $repository_dest = $entityManager->getRepository(Destination::class);
        $destination = $repository_dest->findOneBy(['slug' => $slug_dest]);
        if ($destination === null) throw new NotFoundHttpException('Destination was not found'); // This should activate the 404-page

        $repository_attraction = $entityManager->getRepository(Attraction::class);
        $attraction = $repository_attraction->findOneBy(['slug' => $slug_attraction]);
        if ($attraction === null || $attraction->getLand()->getDestination()->getId() != $destination->getId()) throw new NotFoundHttpException('Land was not found'); // This should activate the 404-page

        return $this->render('attractions/attraction.html.twig', [
            'destination' => $destination,
            'land' => $attraction->getLand(),
            'attraction' => $attraction,
        ]);
    }

    
}
