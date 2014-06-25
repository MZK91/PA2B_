<?php

namespace Ingetis\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IngetisUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
