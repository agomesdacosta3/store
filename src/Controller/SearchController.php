<?php

namespace App\Controller ;

use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController {
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

    #[Route('/search', name: 'search')]
    public function index(RequestStack $requestStack): Response {

        $search = new SearchType();

        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($requestStack->getCurrentRequest());

        $res = "";
        
        if($form->isSubmitted() && $form->isValid()){

            //dd($form->getData());
            $res = $this->productRepository->getSearch($form->getData())->getResult();
        }
        
        return $this->render('/search/index.html.twig',[
            'form' => $form->createView(),
            'products' => $res,
        ]);
    }

}