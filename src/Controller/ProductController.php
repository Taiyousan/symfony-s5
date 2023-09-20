<?php

namespace App\Controller;

use App\Services\Slugify;
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

    #[Route('/product/slug', name: 'app_slug_products')]
    public function slugProducts(Slugify $slugify): Response
    {
        $texte = $slugify->generateSlug('Ceci est une phrase en français');


        return $this->render('product/slugProducts.html.twig', [
            'texte' => $texte
        ]);
    }

    #[Route('/product/{id</d+>}', name: 'view_products')]
    public function productView(int $id): Response
    {
        return $this->render('product/viewProducts.html.twig', [
            'id' => $id
        ]);
    }
}
