<?php

namespace App\Controller;

use App\Entity\Produkty;
use App\Entity\Kategoria;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/api/products', name: 'app_products')]
    public function index(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $id = $request->query->get('id');
        $howMuch = $request->query->get('hm');
        $page = $request->query->get('pg');
        $type = $doctrine->getRepository(Kategoria::class)->find($request->query->get('type'));
        if ($id) {
            return new JsonResponse(getResponseArrayById($doctrine, $id));
        }
        if ($howMuch && $page && $type) {
            return new JsonResponse(getResponseArrayByPageAndType($doctrine, $howMuch, $page, $type));
        }
        if ($type) {
            return new JsonResponse(getResponseArrayByType($doctrine, $type));
        }
        if ($howMuch && $page) {
            return new JsonResponse(getResponseArrayByPage($doctrine, $howMuch, $page));
        }
        if ($howMuch) {
            return new JsonResponse(getResponseArrayByHowMuch($doctrine, $howMuch));
        }
        return new JsonResponse(getResponseArrayWithAllProducts($doctrine));
    }
}


function getResponseArrayById(ManagerRegistry $doctrine, int $id): array
{
    $product = $doctrine->getRepository(Produkty::class)->find($id);
    if (!$product) {
        return array();
    };
    $resp = array(
        'name' => $product->getName(),
        'description' => $product->getOpis(),
        'price' => $product->getCena(),
        'category' => $product->getIdKategorii()->getNazwa(),
        'created' => $product->getUtworzone()->format('Y-m-d H:i:s'),
        'modified' => $product->getZmodyfikowane()->format('Y-m-d H:i:s'),
    );
    return $resp;
}

function getResponseArrayByPage(ManagerRegistry $doctrine, int $howMuch, int $page): array
{
    $arrayCollection = array();
    for ($i = $howMuch * $page; $i < $howMuch * ($page + 1); $i++) {
        $product = $doctrine->getRepository(Produkty::class)->find($i);
        if (!$product) {
            return $arrayCollection;
        };
        $arrayCollection[] = array(
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getOpis(),
            'price' => $product->getCena(),
            'category' => $product->getIdKategorii()->getNazwa(),
            'created' => $product->getUtworzone()->format('Y-m-d H:i:s'),
            'modified' => $product->getZmodyfikowane()->format('Y-m-d H:i:s'),
        );
    }
    return $arrayCollection;
}

function getResponseArrayByHowMuch(ManagerRegistry $doctrine, int $howMuch): array
{
    $arrayCollection = array();
    for ($i = 1; $i <= $howMuch; $i++) {
        $product = $doctrine->getRepository(Produkty::class)->find($i);
        if (!$product) {
            return $arrayCollection;
        };
        $arrayCollection[] = array(
            'name' => $product->getName(),
            'description' => $product->getOpis(),
            'price' => $product->getCena(),
            'category' => $product->getIdKategorii()->getNazwa(),
            'created' => $product->getUtworzone()->format('Y-m-d H:i:s'),
            'modified' => $product->getZmodyfikowane()->format('Y-m-d H:i:s'),
        );
    }
    return $arrayCollection;
}

function getResponseArrayWithAllProducts(ManagerRegistry $doctrine): array
{
    $product = $doctrine->getRepository(Produkty::class)->findAll();
    if (!$product) {
        return array();
    };
    $arrayCollection = array();
    foreach ($product as $item) {
        $arrayCollection[] = array(
            'name' => $item->getName(),
            'description' => $item->getOpis(),
            'price' => $item->getCena(),
            'category' => $item->getIdKategorii()->getId(),
            'created' => $item->getUtworzone()->format('Y-m-d H:i:s'),
            'modified' => $item->getZmodyfikowane()->format('Y-m-d H:i:s'),
        );
    }
    return $arrayCollection;
}

function getResponseArrayByType(ManagerRegistry $doctrine, Kategoria $type): array
{
    $category = $doctrine->getRepository(Kategoria::class)->find($type->getId());
    if (!$category) {
        return array();
    };
    $product = $doctrine->getRepository(Produkty::class)->findBy(array('id_kategorii' => $category));
    if (!$product) {
        return array();
    };
    $arrayCollection = array();
    foreach ($product as $item) {
        $arrayCollection[] = array(
            'name' => $item->getName(),
            'description' => $item->getOpis(),
            'price' => $item->getCena(),
            'category' => $item->getIdKategorii()->getId(),
            'created' => $item->getUtworzone()->format('Y-m-d H:i:s'),
            'modified' => $item->getZmodyfikowane()->format('Y-m-d H:i:s'),
        );
    }
    return $arrayCollection;
}

function getResponseArrayByPageAndType(ManagerRegistry $doctrine, int $howMuch, int $page, Kategoria $type): array
{
    $category = $doctrine->getRepository(Kategoria::class)->find($type->getId());
    if (!$category) {
        return array();
    };
    $product = $doctrine->getRepository(Produkty::class)->findBy(array('id_kategorii' => $category));
    if (!$product) {
        return array();
    };
    $arrayCollection = array();
    for ($i = $howMuch * $page; $i < $howMuch * ($page + 1); $i++) {
        $item = $product[$i];
        if (!$item) {
            return $arrayCollection;
        };
        $arrayCollection[] = array(
            'name' => $item->getName(),
            'description' => $item->getOpis(),
            'price' => $item->getCena(),
            'category' => $item->getIdKategorii()->getId(),
            'created' => $item->getUtworzone()->format('Y-m-d H:i:s'),
            'modified' => $item->getZmodyfikowane()->format('Y-m-d H:i:s'),
        );
    }
    return $arrayCollection;
}
