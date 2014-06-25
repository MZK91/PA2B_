<?php

namespace Ingetis\DemandeDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IngetisDemandeDocBundle:Default:index.html.twig', array('name' => $name));
    }
}
