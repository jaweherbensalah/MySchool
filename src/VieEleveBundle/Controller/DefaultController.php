<?php

namespace VieEleveBundle\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{  public function indexAction()
{
    return $this->render('@VieEleve/Default/index.html.twig');
}
}

