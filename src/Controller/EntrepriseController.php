<?php

namespace App\Controller;




use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/add", name="entreprise_add")
     * @Route("/{id}/edit", name="entreprise_edit")
     */
    public function add_edit(Entreprise $entreprise = null, Request $request) {
        // si le entreprise n'existe pas, on instancie un nouveau Entreprise (on est dans le cas d'un ajout)
        if(!$entreprise){
           $entreprise = new Entreprise();
       }

       // il faut créer un EntrepriseType au préalable (php bin/console make:form
       $form = $this->createForm(EntrepriseType::class, $entreprise);

       $form->handleRequest($request);
       // si on soumet le formulaire et que le form est valide
       if ($form->isSubmitted() && $form->isValid()) {
            // on récupère les données du formulaire
           $entreprise = $form->getData();
           // on ajoute le nouveau entreprise
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($entreprise);
           $entityManager->flush();
           // on redirige vers la liste des entreprise (entreprise_list étant le nom de la route qui liste tous les salariés dans SalarieController)
           return $this->redirectToRoute('entreprise_index');
       }
       
       /* on renvoie à la vue correspondante : 
           - le formulaire
           - le booléen editMode (si vrai, on est dans le cas d'une édition sinon on est dans le cas d'un ajout)
       */
       return $this->render('entreprise/add_edit.html.twig', [
           'formEntreprise' => $form->createView(),
           'editMode' => $entreprise->getId() !== null
       ]);
   }

       /**
    * @Route("/{id}/remove", name="entreprise_remove", methods="GET")
    */
    public function remove(Entreprise $entreprise){
        $id = $entreprise->getId();
        $entreprise = $this->getDoctrine()
                ->getRepository(Entreprise::class)
                ->deleteOneById($id);
        return $this->redirectToRoute('entreprise_index');
    }   




    /**
     * @Route("/{id}", name="entreprise_show", methods="GET")
     */
    public function schow(Entreprise $entreprise): Response {
        return $this->render('entreprise/show.html.twig',[
            'entreprise'=>$entreprise
            ]);
    }
}

