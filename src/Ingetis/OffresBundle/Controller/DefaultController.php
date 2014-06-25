<?php

namespace Ingetis\OffresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ingetis\OffresBundle\Form\OffresEmploisType;
use Ingetis\OffresBundle\Entity\OffresEmplois;


class DefaultController extends Controller
{
    public function indexAction()
    {
    	$offres = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisOffresBundle:OffresEmplois');
		$offres = $offres->findBy(
		array(),
		array('idOffre' => 'DESC'),
		10,
		0
		);
        return $this->render('IngetisOffresBundle:Default:index.html.twig',array('offres' => $offres));
    }
    public function listindexAction()
    {
    	$offres = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisOffresBundle:OffresEmplois');
		$offres = $offres->findBy(
		array(),
		array('idOffre' => 'DESC'),
		3,
		0
		);
        return $this->render('IngetisOffresBundle:Default:offres_panel.html.twig',array('offres' => $offres));
    }
    public function OffreAction(OffresEmplois $news)
    {
        return $this->render('IngetisOffresBundle:Default:offre.html.twig',array('offre' => $offre));
    }
    public function AdminOffresAction($page)
    {
    	$em = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisOffresBundle:OffresEmplois');
		$offres = $em->findBy(
		array(),
		array('idOffre' => 'DESC'),
		20,
		(20 * ($page-1))
		);
        return $this->render('IngetisOffresBundle:Default:admin_offres.html.twig',array('offres' => $offres, 'page' => $page));
    }
    public function AddOffreAction()
    {	

    	$form = $this->createForm(new OffresEmploisType()); //création du formulaire à partir de l'objet générer 
    	$request = $this->getRequest(); // On récupére les donn type de methode POST ou GET
        if($request->isMethod('POST')){
			$em = $this->getDoctrine()->getManager(); // On récupère l'entity manager
			$form->bind($request); // On attribut toutes les données à l'objet form

			if($form->isValid()){
				$data = $form->getData();
				$em->persist($data);
				$em->flush();
				return $this->redirect($this
						->generateUrl(
							'ingetis_offres',
							array(
								'id'	=>	$data->getIdOffre(),
								'slug'	=>	'test',
							)
						)
				); // Redirection vers une nouvelle page
			}
    	}
        return $this->render('IngetisOffresBundle:Default:add_edit_offres.html.twig',array(
        	'form' 		=>	$form->createView(),
        	'id' 		=>	0,
        	'action' 	=>	"Add",
        	)
        );
    }
    public function EditOffreAction(OffresEmplois $offres)
    {	
		$em = $this->getDoctrine()->getManager();

    	$form = $this->createForm(new OffresEmplois(), $offres); // Création du formulaire

    	$request = $this->getRequest();
    	
    	if($request->isMethod('POST')){

			$form->bind($request);
			if($form->isValid()){
				$data = $form->getData();
				$em->persist($data);
				$em->flush();

				return $this->redirect($this->generateUrl('ingetis_admin_offres',array('page'	=> 1)));
			}
    	}
        return $this->render('IngetisOffresBundle:Default:add_edit_offres.html.twig',
        	array(
        		'form' => $form->createView(),
        		'id' => $offres->getIdOffre(),
        		'action' 	=>	"Edit",
        	)
        );
    }
    public function DelOffresAction(OffresEmplois $offres, $page )
    {	
		$em = $this->getDoctrine()->getManager();
    	$em->remove($offres);
    	$em->flush();
    	echo $page;
        //return $this->redirect($this->generateUrl('ingetis_admin_news',array('page'	=> $page))); // Redirection vers une nouvelle page
    }
}
