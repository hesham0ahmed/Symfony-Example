<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    // TEST
    #[Route('/', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('product/main.html.twig', [
            'controller_name' => 'Symfony User',
        ]);
    }
    // ABOUT US
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('test/about.html.twig', [
            'controller_name' => 'Symfony User',
        ]);
    }
    // NEWS
    #[Route('/news', name: 'app_news')]
    public function news(): Response
    {
        return $this->render('test/news.html.twig', [
            'controller_name' => 'Symfony User',
        ]);
    }
    // CONTACT
    #[Route('/checkout', name: 'app_checkout')]
    public function checkout(): Response
    {
        return $this->render('test/checkout.html.twig', [
            'controller_name' => 'Symfony User',
        ]);
    }

    // RANDOM
    #[Route('/random/{num}', name: 'app_random')]
    public function random($num): Response
    {
        $randomNum = random_int(1, $num);

        return $this->render('test/random.html.twig', [
            'randomNum' => $randomNum,
            'actual' => $num
        ]);
    }
}
