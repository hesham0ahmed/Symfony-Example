<?php

namespace App\Controller;

use App\Repository\TitleRepository;
use App\Entity\Title;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $product = new Title();
        $product->setDestination('Malaysia');
        $product->setPrice(2499);
        $product->setAirline('MalayAir');
        $product->setCategory('Sightseeing Tour');
        $product->setPicture('');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());





        // ...
    }

    #[Route('/product/{id}', name: 'product_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Title::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        // return new Response('Check out this great product: ' . $product->getDestination());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('product/index.html.twig', ['product' => $product]);
    }

    #[Route('/products', name: 'list_products')]
    public function listProducts(TitleRepository $titleRepository): Response
    {
        $products = $titleRepository->findAll();

        return $this->render('product/list.html.twig', ['products' => $products]);
    }


    #[Route('/product', name: 'main_page')]
    public function mainPage(): Response
    {
        return $this->render('product/main.html.twig');
    }

    // ...
}
