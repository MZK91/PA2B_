<?php

namespace Ingetis\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function PageAction()
    {
        $categories = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisPagesBundle:Categories');
		$categories = $categories->findBy(
		array(),
		array('position' => 'ASC'),
		10,
		0
		);
        return $this->render('IngetisPagesBundle:Default:index.html.twig', array('categories' => $categories));
    }
    public function MenuPageAction(){
    	$categories = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisPagesBundle:Categories');
		$categories = $categories->findBy(
		array(),
		array('position' => 'ASC'),
		10,
		0
		);
    	return $this->render('IngetisPagesBundle:Default:menu_pages.html.twig', array('categories' => $categories));
    }
}
