<?php

namespace VieEleveBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
class mapsController extends Controller
{
    public function mapsAction()
    {
        return $this->render('@VieEleve/maps/maps.html.twig', array(
            // ...
        ));
    }

    public function streetMapAction()
    {
        return $this->render('@VieEleve/maps/streetMap.html.twig', array(
            // ...
        ));
    }
    public function mapstutoAction()
    {
        return $this->render('@VieEleve/maps/tuto.html.twig', array(
            // ...
        ));
    }

}
