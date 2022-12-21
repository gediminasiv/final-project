<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'main')]
    function main()
    {
        return $this->render('index.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    function contact()
    {
        return $this->render('contact.html.twig');
    }
}
