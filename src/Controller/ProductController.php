<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function listProducts(): Response
    {
        return $this->render('product/listProducts.html.twig', []);
    }

    #[Route('/product/{id}', name: 'view_products')]
    public function productView(int $id): Response
    {
        return $this->render('product/viewProducts.html.twig', [
            'id' => $id
        ]);
    }
}
