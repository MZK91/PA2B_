<?php

namespace Ingetis\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ingetis\NewsBundle\Form\ActualitesType;
use Ingetis\NewsBundle\Entity\Actualites;

class DefaultController extends Controller
{
	public function indexAction()
    {
    	$em = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisNewsBundle:Actualites');
		$news = $em->findBy(
		array(), //Critère
		array('idActualite' => 'DESC'), // Ordre
		10, // Limite
		0 // Offset
		);
        return $this->render('IngetisNewsBundle:Default:index.html.twig',array('news' => $news));
    }
    public function NewsAction(Actualites $news)
    {
        return $this->render('IngetisNewsBundle:Default:news.html.twig',array('news' => $news));
    }
    public function ListIndexAction()
    {
    	$news = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisNewsBundle:Actualites');
		$news = $news->findBy(
		array(),
		array('idActualite' => 'DESC'),
		3,
		0
		);
        return $this->render('IngetisNewsBundle:Default:news_panel.html.twig',array('news' => $news));
    }
    public function AdminNewsAction($page)
    {
    	$news = $this->getDoctrine()
		->getManager()
		->getRepository('IngetisNewsBundle:Actualites');
		$news = $news->findBy(
		array(),
		array('idActualite' => 'DESC'),
		20,
		(20 * ($page-1))
		);
        return $this->render('IngetisNewsBundle:Default:admin_news.html.twig',array('news' => $news, 'page' => $page));
    }
    public function AddNewsAction()
    {	
    	$form = $this->createForm(new ActualitesType()); //création du formulaire à partir d'un objet type généré
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
							'ingetis_news',
							array(
								'id'	=>	$data->getIdActualite(),
								'slug'	=>	'test',
							)
						)
				); // Redirection vers une nouvelle page
			}
    	}
        return $this->render('IngetisNewsBundle:Default:add_edit_news.html.twig',array(
        	'form' 		=>	$form->createView(),
        	'id' 		=>	0,
        	'action' 	=>	"Add",
        	)
        );
    }
    public function EditNewsAction(Actualites $news)
    {	
		$em = $this->getDoctrine()->getManager();

    	$form = $this->createForm(new ActualitesType(), $news); // Création du formulaire

    	$request = $this->getRequest();
    	
    	if($request->isMethod('POST')){

			$form->bind($request);
			if($form->isValid()){
				$data = $form->getData();
				$em->persist($data);
				$em->flush();

				return $this->redirect($this->generateUrl('ingetis_admin_news',array('page'	=> 1)));
			}
    	}
        return $this->render('IngetisNewsBundle:Default:add_edit_news.html.twig',
        	array(
        		'form' => $form->createView(),
        		'id' => $news->getIdActualite(),
        		'action' 	=>	"Edit",
        	)
        );
    }
    public function DelNewsAction(Actualites $news, $page )
    {	
		$em = $this->getDoctrine()->getManager();
    	$em->remove($news);
    	$em->flush();
    	echo $page;
        //return $this->redirect($this->generateUrl('ingetis_admin_news',array('page'	=> $page))); // Redirection vers une nouvelle page
    }

}
