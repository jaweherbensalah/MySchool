<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Club;
use EventBundle\Form\ClubType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ClubController extends Controller
{
    public function ajoutClubAction(Request $request)
    {
            $Club = new Club();
            $test = "ajout";
            $form = $this->createForm(ClubType::class,$Club);
            $form = $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Club);
                $em->flush();
                return $this->redirectToRoute('event_afficheClub');
            }
            return $this->render('@Event/Club/ajoutClub.html.twig', array('form' => $form->createView(), 'test' => $test));
        }
    public function afficheClubAction()
    {
            $em = $this->getDoctrine();
            $tab = $em->getRepository(Club::class)->findAll();
            return $this->render('@Event/Club/afficheClub.html.twig', array('clubs' => $tab));
        }
    public function modifieClubAction( Request $request,$id)
    {
        $club= new Club();
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Club::class)->find($id);
        $form=$this->createForm(ClubType::class,$club);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('event_afficheClub');
        }

        return $this->render('@Event/Club/modifieClub.html.twig', array('form' => $form->createView()));
    }


    public function SupprimerClubAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(Club::class)->find($id);
        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute('event_afficheClub');

    }








}

