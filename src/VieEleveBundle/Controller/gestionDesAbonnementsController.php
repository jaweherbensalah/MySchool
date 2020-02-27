<?php

namespace VieEleveBundle\Controller;

use http\Params;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VieEleveBundle\Entity\abonneRestaurant;
use VieEleveBundle\Entity\abonneTransport;
use VieEleveBundle\Entity\eleveRestau;
use VieEleveBundle\Entity\quittanceRestau;
use VieEleveBundle\Entity\quittanceTransport;
use VieEleveBundle\Form\abonneRestaurantType;
use VieEleveBundle\Form\abonneTransportType;
use VieEleveBundle\Form\eleveRestauType;
use Dompdf\Dompdf;
use Dompdf\Options;
use VieEleveBundle\Form\quittanceRestauType;
use VieEleveBundle\Form\quittanceTransportType;

class gestionDesAbonnementsController extends Controller
{
    public function registerRestaurantAction(Request $request)
    {
        $usr = new eleveRestau();
        $form = $this->createForm(eleveRestauType::class, $usr);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $usr->setSolde(2000);
            $duree=$usr->getDureeAbonnement();
            $solde=$usr->getSolde();
            if ($duree='trimestre')
            {
                $usr->setSolde($solde - 250);
            }
            elseif ($duree='semestre')
            {
                $usr->setSolde($solde - 500);
            }
            else
            {
                    $usr->setSolde($solde - 1000);
            }

            $em->persist($usr);
            $em->flush();
            $id=$usr->getId();
            return $this->redirectToRoute('showAbonneRestauById', ['id' => $id]);

        }
        return $this->render('@VieEleve/gestionDesAbonnements/register_restaurant.html.twig',
            array('form' => $form->createView()));
    }
//------------------liste des aonnés ----------------------------------------------
    public function listAbonnesRestaurantAction()
    {
        $em = $this->getDoctrine();
     $personnes = $em->getRepository(eleveRestau::class)->tri();
        return $this->render('@VieEleve/gestionDesAbonnements/list_abonnes_restaurant.html.twig', array('personnes' => $personnes));

    }
//----------------------imprimer--------------------------------------------------------
    //ça c'est pour imprimer

    public function imprimeAbonnesRestaurantAction()
    {    $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $doctrine=$this->getDoctrine();
        $repository=$doctrine->getRepository('VieEleveBundle:eleveRestau');
        $personnes= $repository->findAll();


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('@VieEleve/gestionDesAbonnements/imprimeAbonneResto.html.twig',
            array(
                'personnes'=>$personnes
            ));

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }

//----------------------------GESTION DU TRANSPORT !!! -----------------------------------------
    public function registerTransportAction(Request $request)
    {  $usr = new abonneTransport();
        $form = $this->createForm(abonneTransportType::class, $usr);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $usr->setSolde(2000);
            $duree = $usr->getDureeAbonnement();
            $solde=$usr->getSolde();
            dump($duree);
            if ($duree=250) {
                $usr->setSolde($solde - 250);
            }
            if ($duree=500) {
                $usr->setSolde($solde - 500);
            }
            if ($duree=1000) {
                $usr->setSolde($solde - 1000);
            }
            $em->persist($usr);
            $em->flush();
            $id=$usr->getId();
            return $this->redirectToRoute('showAbonneTransportById', ['id' => $id]);
        }
        return $this->render('@VieEleve/gestionDesAbonnements/register_transport.html.twig',
            array('form' => $form->createView()));
    }
//____________________________________________________________
    public function listAbonnesTransportAction()
    {
        $em = $this->getDoctrine();
        $personnes = $em->getRepository(eleveRestau::class)->tri();
        return $this->render('@VieEleve/gestionDesAbonnements/list_abonnes_transport.html.twig', array('personnes' => $personnes));

    }
    public function imprimeAbonneTransportAction()
    {    $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $doctrine=$this->getDoctrine();
        $repository=$doctrine->getRepository('VieEleveBundle:abonneTransport');
        $personnes= $repository->findAll();


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('@VieEleve/gestionDesAbonnements/imprimeAbonneTransport.html.twig',
            array(
                'personnes'=>$personnes
            ));

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }
//----------------Trier la liste des eleve abonnés Restau-------------------
    public function triAction()
    {
        $em = $this->getDoctrine()->getManager();
        $matiere=$em->getRepository(eleveRestau::class)->tri();
        return $this->render('@VieEleve/gestionDesAbonnements/list_abonnes_restaurant.html.twig', array('matieres' => $matiere));
    }

    public  function  AffecterTransportAction($ide ,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $q=$em->getRepository(quittanceTransport::class)->find($id);
        $eleve=$em->getRepository(abonneTransport::class)->find($ide);

        $q->setEleveTransport($eleve);
        $em->persist($q);
        $em->flush();
        return $this->render('@VieEleve/gestionDesAbonnements/remplirFactureTransport.html.twig',array(
        'eleve'=>$eleve,
        'q' =>$q));
    }


    public  function  AffecterRestauAction($ide ,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $q=$em->getRepository(quittanceRestau::class)->find($id);
        $eleve=$em->getRepository(eleveRestau::class)->find($ide);
        $q->setEleveRestau($eleve);
        $em->persist($q);
        $em->flush();
        return $this->render('@VieEleve/gestionDesAbonnements/remplirFactureTransport.html.twig',array(
            'eleve'=>$eleve,
            'q' =>$q));
    }



    public  function  remplirFactureAction($ide ,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $q=$em->getRepository(quittanceTransport::class)->find($id);
        $eleve=$em->getRepository(abonneTransport::class)->find($ide);
        $q->setEleveTransport($eleve);
        //$em->persist($q);
        //$em->flush();
        return $this->render('base.html.twig',array(
            'eleve'=>$eleve,
            'q' =>$q));
    }
    public function showAbonneTransportByIdAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('VieEleveBundle:abonneTransport')->find($id);
        return $this->render('@VieEleve/ShowAbonneById/showAbonneTransportByI.html.twig',array(
            'id'=>$p->getId(),
            'email'=> $p->getEmail(),
            'username'=>$p->getUsername(),
            'solde'=>$p->getSolde(),
            'password'=> $p->getPassword(),
            'dureeAbonnement'=>$p->getDureeAbonnement(),
            'p'=>$p,

        ));
    }
    //-----------------------------------------------------------------------------
    public function ajoutQTAction(Request $request)
    { $formation = new quittanceTransport();
        $form = $this->createForm(quittanceTransportType::class, $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            $id = $formation->getEleveTransport()->getId();
            return $this->redirectToRoute('showAbonneTransportById', ['id' => $id]);
        }
        return $this->render('@VieEleve/gestionPaiement/factureTransport.html.twig',
            array('form' => $form->createView()));
    }
    //------------------------------------------------------------------
    public function showAbonneRestauByIdAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('VieEleveBundle:eleveRestau')->find($id);
        return $this->render('@VieEleve/ShowAbonneById/showAbonneRestauById.html.twig',
            array(
            'id'=>$p->getId(),
            'email'=> $p->getEmail(),
            'username'=>$p->getUsername(),
            'solde'=>$p->getSolde(),
            'password'=> $p->getPassword(),
            'dureeAbonnement'=>$p->getDureeAbonnement(),
            'p'=>$p,

        ));
    }
    //---------------------------------------------------------------------------
    public function ajoutQRAction(Request $request)
    { $formation = new quittanceRestau();
        $form = $this->createForm(quittanceRestauType::class, $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            $id = $formation->getEleveRestau()->getId();
            return $this->redirectToRoute('showAbonneRestauById', ['id' => $id]);
        }
        return $this->render('@VieEleve/gestionPaiement/factureRestau.html.twig',
            array('form' => $form->createView()));
    }

}


