<?php

namespace App\Controller;

use App\Entity\Salarie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/salarie")
 */
class SalarieController extends AbstractController
{
    /**
     * @Route("/", name="salarie_index")
     */
    public function index()
    {
        $salarie = $this->getDoctrine()
                ->getRepository(Salarie::class)
                ->getAll();
        return $this->render('salarie/index.html.twig', [
            'salarie' => $salarie,
        ]);
    }

/**
 * @Route("/(id)", name="salarie_show", methods="GET")
 */
    public function schow(Salarie $salarie): Response {
        return $this->render('salari/show.html.twig',['salarie'=>$salarie]);
    }
}
