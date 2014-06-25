<?php

namespace Ingetis\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IngetisMenuBundle:Default:index.html.twig', array('name' => $name));
    }
}
