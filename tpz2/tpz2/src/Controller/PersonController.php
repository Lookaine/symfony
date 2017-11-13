<?php

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 13/11/17
 * Time: 14:17
 */
namespace App\Controller;

use App\Entity\Person;
use App\Form\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonController extends Controller
{
    /**
     *  @Route("/person/new", name="entity_person_new")
     */
    public function newPerson(Request $request){
        $person = new Person();
          $form = $this->createFormBuilder($person)
            ->add("name",TextType::class)
            ->add("age",IntegerType::class)
            ->add("visible",ChoiceType::class, array(
                'choices' => array(
                    'Yes' => true,
                    'No' => false,
                )
            ))
            ->add("created_at",DateType::class)
            ->add("color",TextType::class)
            ->add("save",SubmitType::class, array('label' => 'créer'))
            ->getForm();


        $em = $this->getDoctrine()->getManager();
        /*
        $person->setName("nicolas");
        $person->setAge(23);
        $person->setColor("blue");
        $person->setCreatedAt(new \DateTime("now"));
        $person->setVisible(true);
        $em->persist($person);
        $em->flush();

        return $this->render('entity/new.html.twig');
        */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($person);
            $em->flush();
            return $this->redirect($this->generateUrl('entity_person_index'));
        }
        return $this->render('entity/new.html.twig', array('form' => $form->createView()));
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
        return $this->render('entity/person.html.twig', array("person" => $persons));
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
        return $this->render('entity/new.html.twig', array('form' => $form->createView()));
    }


}