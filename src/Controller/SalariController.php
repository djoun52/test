<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SalariController extends AbstractController
{
    /**
     * @Route("/salari", name="salari")
     */
    public function index()
    {
        return $this->render('salari/index.html.twig', [
            'controller_name' => 'SalariController',
        ]);
    }
}
