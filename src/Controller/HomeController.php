<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    #[Route("formulaire", name:"form_employes")] //Nom de l'uri 
    public function form_employes(Request $request, ManagerRegistry $doctrine) :Response{

        $employes = new Employes();

        $form = $this->createForm(EmployesType::class, $employes);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($employes);
            $em->flush();
            return $this->redirectToRoute("employes");
        }

        return $this->render("employes/form_employes.html.twig", ["form" => $form->createView()]);

        
    }

    #[Route("/", name:"employes")]
    public function index(EmployesRepository $employe) :Response{
        $employes = $employe->findAll();
        return $this->render("employes/index.html.twig", ["employes" => $employes]);
    }

    #[Route("/employes/update/{id}", name: "modif_employe")]
    public function article_update($id, ManagerRegistry $doctrine, Request $request){

        $employes = $em = $doctrine->getManager()->getRepository(Employes::class)->find($id);
       
        if($employes === null){ 
            return $this->redirectToRoute("employes");
        }
        
        $form = $this->createForm(EmployesType::class, $employes);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($employes);
            $em->flush();
            return $this->redirectToRoute("employes");
        }

        return $this->render("employes/form_employes.html.twig", ["form" => $form->createView(), "update" => true]);
        
    }

    #[Route("/employe/delete/{id}", name:"suppr_employe")]
    public function delete_employe($id, ManagerRegistry $doctrine) :Response{
        
        $employe = $doctrine->getManager()->getRepository(Employes::class)->find($id);

        if($employe === null){

            return $this->redirectToRoute("employes");
        }
        $em = $doctrine->getManager();
        $em->remove($employe);
        $em->flush();
        return $this->redirectToRoute("employes");
    }
}