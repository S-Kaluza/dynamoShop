<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Kategoria;
use App\Entity\Produkty;
use DateTime;

class CreateProductController extends AbstractController
{
    #[Route('/create/product', name: 'app_create_product')]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $category = $doctrine->getRepository(Kategoria::class)->find(10);
        for ($i = 0; $i < 100; $i++) {
            $product = $this->createRandomProduct($category);
            $entityManager->persist($product);
            $entityManager->flush();
        }
        $produkty = $doctrine->getRepository(Produkty::class)->findAll();
        $arrayCollection = array();
        foreach ($produkty as $item) {
            $arrayCollection[] = array(
                'id' => $item->getId(),
                'name' => $item->getName(),
                'description' => $item->getOpis(),
                'created' => $item->getUtworzone(),
                'modified' => $item->getZmodyfikowane(),
            );
        }

        return new JsonResponse($arrayCollection);
    }

    private function createRandomProduct(Kategoria $category): Produkty
    {
        $product = new Produkty();
        $product->setName('Product ' . rand(1, 1000));
        $product->setOpis('Product ' . $product->getName() . ' description');
        $product->setCena(rand(1, 1000));
        $product->setIdPromocji(-1);
        $product->setIdWyposazenia(-1);
        $product->setSku('SKU-' . rand(1, 1000));
        $product->setIdKategorii($category);
        $product->setUtworzone(new DateTime());
        $product->setZmodyfikowane(new DateTime());
        return $product;
    }
}
