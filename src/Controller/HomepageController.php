<?php

namespace App\Controller ;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController {
    protected $productRepository ;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response {
        

        return $this->render('homepage/index.html.twig',[
            'products' => $this->productRepository->getData()->getResult()
        ]);
        
    }
}