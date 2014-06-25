<?php

namespace Ingetis\DivIndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IngetisDivIndexBundle:Default:index.html.twig', array('name' => $name));
    }
    public function listDivAction()
    {
    	$divsindex = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisDivIndexBundle:DivAccueil');
		$divsindex = $divsindex->findBy(
		array(),
		array('idDivAccueil' => 'ASC'),
		4,
		0
		);
        return $this->render('IngetisDivIndexBundle:Default:index.html.twig', array('divsindex' => $divsindex));
    }

}
