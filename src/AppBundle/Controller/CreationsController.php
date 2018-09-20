<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Creations;
use AppBundle\Form\CreationsType;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreationsController extends Controller
{
	/**
        *@Route("/dashboard/creations", name="creations.index")
        *@Method({"GET"})
    */
    public function index(){
    	$creations = $this->getDoctrine()->getRepository(Creations::class)->findAll();
        return $this->render('@App/Creations/index.html.twig', 
                array(
                    'creations' => $creations
                ));
    }

    /**
        *@Route("/dashboard/creations/create", name="creactions.create");
        *@Method({"GET"})
    */
    public function create(){
        $creation = new Creations();
        $form = $this->createForm(CreationsType::class, $creation); 
        
        return $this->render('@App/Creations/create.html.twig', array(
                'form' => $form->createView()
                ));
    }

    /**
        *@Route("/dashboard/creations", name="creations.store");
        *@Method({"POST"})
    */
    public function store(Request $request){
        $creation = new Creations();
        $form = $this->createForm(CreationsType::class, $creation);
        $form->handleRequest($request);
        if($form->isValid()){
            // $data = $request->request->get('appbundle_creations');
            $em = $this->getDoctrine()->getManager();
            $creation->setRegDate(new \DateTime("now"));
          
            $em->persist($creation);
            $flush = $em->flush();
        }

        // return $this->redirect($this->generateUrl('creations.index', array('id' => $creation->getId())));
        // return new Response('Saved new creation with id '.$creation->getId());
       return $this->redirectToRoute('creations.index');
    }

    /**
        *@Route("/dashboard/creations/{id}", name="creations.show");
        *@Method({"GET"})
    */
    public function show($id){
        $creation = $this->getDoctrine()->getRepository(Creations::class)->find($id);
        
        $form = $this->createForm(CreationsType::class, $creation);
        
        return $this->render('@App/Creations/show.html.twig', 
                array(
                    'form' => $form->createView(),
                    'id' => $id
                )
        );
    }

    /**
        *@Route("/dashboard/creations/{id}/edit", name="creations.edit");
        *@Method({"GET"})
    */
    public function edit($id){
        $creation = $this->getDoctrine()->getRepository(Creations::class)->find($id);
        $form = $this->createForm(CreationsType::class, $creation);

        return $this->render('@App/Creations/edit.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $id
            )
        );
    }

    /**
        *@Route("/dashboard/creations/{id}", name="creations.update");
        *@Method({"PUT"})
    */
    public function update(Request $request, $id){
        $creation = $this->getDoctrine()->getRepository(Creations::class)->find($id);
        $form = $this->createForm(CreationsType::class, $creation, array('method' => 'PUT'));
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $creation->setRegDate(new \DateTime("now"));
            $em->persist($creation);
            $flush = $em->flush();
        }
        return $this->redirect('/dashboard/creations/'.$id);
    }

	 /**
	    *@Route("/dashboard/creations/{id}", name="creations.delete");
	    *@Method({"DELETE"})
	*/
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $creation = $em->getRepository(Creations::class)->find($id);
        $em->remove($creation);
        $flush = $em->flush();
        return new JsonResponse("{ok:true}", 200);
        //return $this->redirect('/dashboard/creations');
    }
}
