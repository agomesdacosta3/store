<?php

namespace App\Controller ;

use App\Form\ContactModel;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ContactController extends AbstractController {

    protected $form;
    // public function __construct(private RequestStack $requestStack) {
    //     $type = ContactType::class;
    //     $model = new ContactType();

    //     $form = $this->createForm($type, $model);

    //     $form->handleRequest($this->requestStack->getCurrentRequest());

    //     if($form->isSubmitted() && $form->isValid()) {
    //         dd($form->getData());
    //     }
    //     $this->form = $form;
    // }
    
    #[Route('/contact', name: 'contact')]
    public function index(): Response {
        
        $task = new ContactModel();
        // ...

        $form = $this->createForm(ContactModel::class, $task);

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }
}