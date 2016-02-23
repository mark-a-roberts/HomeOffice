<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		$response = $this->render('form.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
		
		// API for countries does not support JSONP 
		$response->headers->set('Access-Control-Allow-Origin', '*');
		$response->headers->set('Access-Control-Allow-Headers', '*');
        return $response; 
    }
	
	/**
     * @Route("/update", name="update")
     */
	public function updateAction(Request $request) {
		$name = $request->request->get('fullname', 'Unknown');

		// save the data from the request here....
		return $this->render('update.html.twig', [
			'fullname' => $name,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
	}
}
