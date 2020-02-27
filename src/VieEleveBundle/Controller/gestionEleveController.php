<?php

namespace VieEleveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VieEleveBundle\Entity\menu;
use VieEleveBundle\Entity\transport;
use VieEleveBundle\Form\menuType;
use VieEleveBundle\Form\transportType;

class gestionEleveController extends Controller
{
    public function addmenuAction(Request $request)
    {
        $menu = new menu();
        $form = $this->createForm(menuType::class, $menu);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();
            return $this->redirectToRoute('readmenu');
        }
        return $this->render('@VieEleve/gestionEleve/addmenu.html.twig', array('form' => $form->createView()));

    }

    public function readmenuAction()
       {
           $em = $this->getDoctrine()->getManager();
           $menu = $em->getRepository('VieEleveBundle:menu')
               ->findAll();

           return $this->render('@VieEleve/gestionEleve/readmenu.html.twig', array('menu' => $menu));
       }

    public function updatemenuAction(Request $request, menu $menu)
   {
       $form = $this->createForm(menuType::class, $menu);
       $form->handleRequest($request);
       if ($form->isSubmitted()) {
           $em = $this->getDoctrine()->getManager();
           // $em->persist($club); cela est inutile puisque l'objet
           //provient déjà de la BBd donc pas la peine de persist
           $em->flush();
           //on peut soit nraj3ou msg maktoub fih club modifié soit na3mlou
           // //redirection lel read nekhtarou wa7da menhom wena khtart redirection
           //return new Response('club modifié !');
           return $this->redirectToRoute('readmenu');
       }
       //on génère le HTML du formulaire créé
       //$formView =$form->createView();

       //on rend la vue
       return $this->render('@VieEleve/gestionEleve/addmenu.html.twig', array('form' => $form->createView()));
   }


    public function deletemenuAction(menu $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return $this->redirectToRoute('readmenu');
    }

    public function addtransportAction(Request $request)
    {
        $transport = new transport();
        $form = $this->createForm(transportType::class, $transport);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transport);
            $em->flush();
            return $this->redirectToRoute('readtransport');
        }
        return $this->render('@VieEleve/gestionEleve/addtransport.html.twig', array('form' => $form->createView()));

    }

    public function readtransportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $transport = $em->getRepository('VieEleveBundle:transport')
            ->findAll();

        return $this->render('@VieEleve/gestionEleve/readtransport.html.twig', array('transport' => $transport));
    }

    public function updatetransportAction(Request $request,transport $transport)
    {
        $form = $this->createForm(transportType::class, $transport);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            // $em->persist($club); cela est inutile puisque l'objet
            //provient déjà de la BBd donc pas la peine de persist
            $em->flush();
            //on peut soit nraj3ou msg maktoub fih club modifié soit na3mlou
            // //redirection lel read nekhtarou wa7da menhom wena khtart redirection
            //return new Response('club modifié !');
            return $this->redirectToRoute('readtransport');
        }
        //on génère le HTML du formulaire créé
        //$formView =$form->createView();

        //on rend la vue
        return $this->render('@VieEleve/gestionEleve/addtransport.html.twig', array('form' => $form->createView()));
    }

    public function deletetransportAction(transport $id)
    { $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return $this->redirectToRoute('readtransport');

    }
    public function VieEleveAction()
       {
       return $this->render('@VieEleve/gestionEleve/vieEleve.html.twig');
           }
    public function gestioEleveAction()
    {
        return $this->render('@VieEleve/gestionEleve/gestionEleve.html.twig');
    }
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $posts =  $em->getRepository('VieEleveBundle:menu')
            ->findEntitiesByString($requestString);
        if(!$posts) {
            $result['posts']['error'] = "menu Not found :( ";
        } else {
            $result['posts'] = $this->getRealEntities($posts);
        }
        return new Response(json_encode($result));
    }
    public function getRealEntities($posts){
        foreach ($posts as $posts){
            $realEntities[$posts->getId()] = [$posts->getItems(),$posts->getPhoto()];

        }
        return $realEntities;
    }

    public function showdetailedAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('VieEleveBundle:menu')->find($id);
        return $this->render('@VieEleve/gestionEleve/detailedmenu.html.twig',array(
            'items'=>$p->getItems(),
           'prix'=> $p->getPrix(),
           'photo'=>$p->getPhoto(),
        'posts'=>$p,
        'id'=>$p->getId()
        ));
    }


}
