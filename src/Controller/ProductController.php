<?php

namespace App\Controller ;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ProductController extends AbstractController {
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    // private $products = array(
    //     "product one"=> ["nom"=> "product one", "photo"=> "https://via.placeholder.com/100", "prix"=> "1"],
    //     "product two"=> ["nom"=> "product two", "photo"=> "https://via.placeholder.com/200", "prix"=> "2"],
    //     "product three"=> ["nom"=> "product three", "photo"=> "https://via.placeholder.com/300", "prix"=> "3"],
    // ) ; 

    #[Route('/products/page/{PAGE}', name: 'products')]
    public function index(int $PAGE): Response {
        
        return $this->render('index.html.twig',[
            'products' => $this->productRepository->getAllData($PAGE)->getResult(),
            'nbProducts' => $this->productRepository->getCountProduct()->getSingleScalarResult(),
        ]);
    }

    #[Route('/product/{SLUG}', name: 'product')]
    public function detail(string $SLUG): Response {

        return $this->render('product/detail.html.twig',[
            'product' => $this->productRepository->findOneBy(['slug' => $SLUG])
        ]);
    }

}