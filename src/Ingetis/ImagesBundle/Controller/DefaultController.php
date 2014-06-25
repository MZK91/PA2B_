<?php

namespace Ingetis\ImagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IngetisImagesBundle:Default:index.html.twig', array('name' => $name));
    }
}
