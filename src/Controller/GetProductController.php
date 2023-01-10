<?php

namespace App\Controller;

use App\Entity\Produkty;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetProductController extends AbstractController
{
    #[Route('/api/products?{$id}', name: 'app_get_product')]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine->getRepository(Produkty::class)->findAll();
        if (!$product) {
            return $this->json([
                'message' => 'product not found',
                'path' => 'src/Controller/GetProductController.php',
            ]);
        };
        $arrayCollection = array();
        foreach ($product as $item) {
            $arrayCollection[] = array(
                'name' => $item->getName(),
            );
        }
        return new JsonResponse($arrayCollection);
    }
}
