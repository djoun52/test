<?php

namespace App\Controller;


use App\Entity\Entreprise;
use App\Entity\Salarie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/entreprise")
 */
class EntrepriseController extends AbstractController
{
    /**
    * @Route("/", name="entreprise_index")
     */

    public function index()
    {
        $entreprise = $this->getDoctrine()
        ->getRepository(Entreprise::class)
        ->getAll();
        return $this->render('entreprise/index.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }

    /**
     * @Route("/(id)", name="entreprise_show", methods="GET")
     */
    public function schow(Entreprise $entreprise): Response {
        return $this->render('entreprise/show.html.twig',['entreprise'=>$entreprise]);
    }
}

