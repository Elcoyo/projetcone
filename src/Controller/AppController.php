<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployeType;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            
        ]);
    }

    #[Route('/employes/modifier/{id}', name:'app_modifier')]
    #[Route('/employes/ajout', name: 'ajouter')]
    public function form(Request $request, EntityManagerInterface $manager, Employes $employe = null):response
    {
       if($employe == null){
        $employe = new Employes;
       }
        
        $form =$this->createForm(EmployeType::class, $employe);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $manager->persist($employe);

            $manager->flush();

            return $this->redirectToRoute('list');
        }

        
        return $this->render('app/form.html.twig', [
            'form' => $form,
        ]);
        
    }

    #[Route('/employes/gestion', name:'list')]
    public function list(EmployesRepository $repo){
        $all = $repo->findAll();
        // dd($all);
        return $this->render('app/list.html.twig', [
            'toto'=> $all
        ]);
        
    }

  
 

    #[Route('/employes/supprimer/{id}', name:'app_supprimer')]
    public function supprimer(Employes $employes, EntityManagerInterface $manager){
        $manager->remove($employes);
        $manager->flush();
        return$this->redirectToRoute('list');
    }

}


