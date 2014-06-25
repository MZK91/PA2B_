<?php

namespace Ingetis\AnnonceIndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $annonce = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisAnnonceIndexBundle:Annonce');
		$annonce = $annonce->findOneBy(
						array('idAnnonce' => '1')
					);
        return $this->render('IngetisAnnonceIndexBundle:Default:index.html.twig',array('annonce' => $annonce));
    }
}
