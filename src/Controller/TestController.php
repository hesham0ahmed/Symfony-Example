<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'Symfony User',
        ]);
    }

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
