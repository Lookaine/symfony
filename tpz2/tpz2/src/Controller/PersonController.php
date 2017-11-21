<?php

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 13/11/17
 * Time: 14:17
 */
namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

// bob 50, luc 78, dark 112

class PersonController extends Controller
{
    /**
     *  @Route("/person/new", name="entity_person_new")
     */
    public function newPerson(Request $request){
        $person = new Person();
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            $this->container->get('session')->getFlashBag()->add("success", "ajout d'une personne");

            return $this->redirect($this->generateUrl('entity_person_index'));
        }
        return $this->render('entity/person/index.html.twig', array('form' => $form->createView()));
    }

    /**
     *  @Route("/person/index", name="entity_person_index")
     */
    public function index(){
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository(Person::class)->findAll();
        //find($id)
        //findBy()
        //findOneBy()
        return $this->render('entity/person/person.html.twig', array("person" => $persons));
    }

    /**
     *  @Route("/person/newget", name="entity_person_newget")
     */
    public function newGetPostAction(Request $request){
        $person = new Person();
        $em = $this->getDoctrine()->getManager();
        $form = $this-> createForm(EntityType::class,$person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($person);
            $em->flush();
            return $this->redirect($this->generateUrl('entity_person_index'));
        }
        return $this->render('entity/person/index.html.twig', array('form' => $form->createView()));
    }
    /**
     * @return Response
     * @Route("/person/show/{id}", name="entity_person_show")
     */
    public function show($id){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $person = $repo->find($id);
        return $this->render('entity/person/show.html.twig', array('person' => $person));
    }

}