<?php

namespace Ingetis\CarouselBundle\Controller;

use Ingetis\CarouselBundle\Entity\Panell;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$slides = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisCarouselBundle:Panell');
		$slides = $slides->findBy(
		array(),
		array('idPanell' => 'DESC'),
		3,
		0
		);
        return $this->render('IngetisCarouselBundle:Default:index.html.twig',array('slides' => $slides));
    }
}
