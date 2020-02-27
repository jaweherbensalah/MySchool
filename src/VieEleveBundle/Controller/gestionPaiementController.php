<?php

namespace VieEleveBundle\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VieEleveBundle\Entity\abonneTransport;
use VieEleveBundle\Entity\eleveRestau;
use VieEleveBundle\Entity\quittanceRestau;
use VieEleveBundle\Entity\quittanceTransport;

class gestionPaiementController extends Controller
{
    public function imprimerQuittanceRestauAction($id)
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $doctrine=$this->getDoctrine();

        $eleve=$doctrine->getRepository(eleveRestau::class)->find($id);
        $quittance= $doctrine->getRepository('VieEleveBundle:quittanceRestau')->findBySimulation($eleve->getId());


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('@VieEleve/gestionDesAbonnements/imprimeQuittanceRestau.html.twig',
            array(
                'quittance'=>$quittance,
                'eleve'=>$eleve
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


    public function simulaionQuittanceAction($id)
    {$em =$this->getDoctrine()->getManager();
        $eleve=$em->getRepository(eleveRestau::class)->find($id);
        $quittance=$em->getRepository(quittanceRestau::class)
            ->findBySimulation($eleve->getId());
        return $this->render('@VieEleve/gestionDesAbonnements/simulationQuittance.html.twig', array(
            'eleve'=>$eleve,
            'quittance' =>$quittance
        ));

    }

        public function imprimerQuittanceTransportAction($id)
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $doctrine=$this->getDoctrine();

        $eleve=$doctrine->getRepository(abonneTransport::class)->find($id);
        $quittance= $doctrine->getRepository('VieEleveBundle:quittanceTransport')->findBySimulation($eleve->getId());


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('@VieEleve/gestionDesAbonnements/imprimeQuittanceTransport.html.twig',
            array(
                'quittance'=>$quittance,
                'eleve'=>$eleve
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



    public function simulaionQuittanceTransportAction($id)
    {$em =$this->getDoctrine()->getManager();
        $eleve=$em->getRepository(abonneTransport::class)->find($id);
        $quittance=$em->getRepository(quittanceTransport::class)
            ->findBySimulation($eleve->getId());
        return $this->render('@VieEleve/gestionDesAbonnements/simulationQuittanceTransport.html.twig', array(
            'eleve'=>$eleve,
            'quittance' =>$quittance
        ));

    }



}
