<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Kategoria;
use DateTime;

class CreateCategoryController extends AbstractController
{
    #[Route('/create/category', name: 'app_create_category')]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        for ($i = 0; $i < 10; $i++) {
            $category = $this->createRandomCategory();
            $entityManager->persist($category);
            $entityManager->flush();
        }
        $categories = $doctrine->getRepository(Kategoria::class)->findAll();
        $arrayCollection = array();
        foreach ($categories as $item) {
            $arrayCollection[] = array(
                'id' => $item->getId(),
                'name' => $item->getNazwa(),
                'description' => $item->getOpis(),
                'created' => $item->getUtworzone(),
                'modified' => $item->getZmodyfikowane(),
            );
        }

        return new JsonResponse($arrayCollection);
    }

    private function createRandomCategory(): Kategoria
    {
        $category = new Kategoria();
        $category->setNazwa('Category ' . rand(1, 1000));
        $category->setOpis('Category ' . $category->getNazwa() . ' description');
        $category->setUtworzone(new DateTime());
        $category->setZmodyfikowane(new DateTime());
        return $category;
    }
}
