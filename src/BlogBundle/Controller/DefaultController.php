<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/list/{page}", name="blog list", requirements={"page": "\d+"})
     * @Method({"GET"})
     */
    public function indexAction($page=1)
    {
        return $this->render('BlogBundle:Default:index.html.twig', 
        		array(
        			'page' => $page
        		));
    }
}
