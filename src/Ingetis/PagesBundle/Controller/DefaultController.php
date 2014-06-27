<?php

namespace Ingetis\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ingetis\PagesBundle\Form\PagesType;
use Ingetis\PagesBundle\Entity\Pages;
use Ingetis\PagesBundle\Entity\Categories;

class DefaultController extends Controller
{
	public function PageAction(Pages $page)
    {
        return $this->render('IngetisPagesBundle:Default:page.html.twig',array('page' => $page));
    }
    public function MenuPageAction(){
    	$em = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisPagesBundle:Categories');
		
		$query = $em->createQueryBuilder('c')
		->select('c','p')
		->join('c.pages', 'p')       
		->getQuery();
		
		$categories= $query->getResult();

    	return $this->render('IngetisPagesBundle:Default:menu_pages.html.twig', array('categories' => $categories));
    }
    public function AdminPagesAction($page)
    {
    	$em = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisPagesBundle:Pages');
		$pages = $em->findBy(
		array(),
		array('idPage' => 'DESC'),
		20,
		(20 * ($page-1))
		);
        return $this->render('IngetisPagesBundle:Default:admin_pages.html.twig',array('pages' => $pages, 'page' => $page));
    }
    public function AddPageAction()
    {
        $form = $this->createForm(new PagesType()); //création du formulaire à partir de l'objet générer 
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
							'ingetis_pages',
							array(
								'id'	=>	$data->getIdPage(),
								'slug'	=>	'test',
							)
						)
				); // Redirection vers une nouvelle page
			}
    	}
        return $this->render('IngetisPagesBundle:Default:add_edit_page.html.twig',array(
        	'form' 		=>	$form->createView(),
        	'id' 		=>	0,
        	'action' 	=>	"Add",
        	)
        );
    }
    public function EditPageAction()
    {
        $form = $this->createForm(new PagesType()); //création du formulaire à partir de l'objet générer 
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
							'ingetis_pages',
							array(
								'id'	=>	$data->getIdPage(),
								'slug'	=>	'test',
							)
						)
				); // Redirection vers une nouvelle page
			}
    	}
        return $this->render('IngetisPagesBundle:Default:add_edit_page.html.twig',array(
        	'form' 		=>	$form->createView(),
        	'id' 		=>	0,
        	'action' 	=>	"Add",
        	)
        );
    }
}
