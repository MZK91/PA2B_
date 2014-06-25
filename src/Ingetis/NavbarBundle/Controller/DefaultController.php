<?php

namespace Ingetis\NavbarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IngetisNavbarBundle:Default:index.html.twig');
    }
}
