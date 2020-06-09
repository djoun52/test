<?php

namespace App\Controller;

use App\Entity\Salari;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/salari")
 */
class SalariController extends AbstractController
{
    /**
     * @Route("/", name="salari_index")
     */
    public function index()
    {
        $salarie = $this->getDoctrine()
                ->getRepository(Salari::class)->getAll();
        return $this->render('Salari/index.html.twig', [
            'salari' => $salarie,
        ]);
    }
    
/**
 * @Route("/(id)", name="salari_show", methods="GET")
 */
    public function schow(Salari $salarie): Response {
        return $this->render('salari/show.html.twig',['salarie'=>$salarie]);
    }
}
