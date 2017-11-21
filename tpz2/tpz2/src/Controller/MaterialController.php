<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 13:16
 */

namespace App\Controller;

use App\Entity\Material;
use App\Form\MaterialType;

use Doctrine\DBAL\Types\DecimalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


//wood 1.5, brick 2.5, metal 4
class MaterialController extends Controller
{

    /**
     *  @Route("/material/new", name="entity_material_new")
     */
    public function newMaterial(Request $request){
        $material = new Material();
        $form = $this->createForm(MaterialType::class, $material);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($material);
            $em->flush();
            return $this->redirect($this->generateUrl('entity_material_index'));
        }
        return $this->render('entity/material/index.html.twig', array('form' => $form->createView()));
    }

    /**
     *  @Route("/material/index", name="entity_material_index")
     */
    public function index(){
        $em = $this->getDoctrine()->getManager();
        $materials = $em->getRepository(Material::class)->findAll();
        //find($id)
        //findBy()
        //findOneBy()
        return $this->render('entity/material/material.html.twig', array("material" => $materials));
    }

    /**
     *  @Route("/material/newget", name="entity_material_newget")
     */
    public function newGetPostAction(Request $request){
        $material = new Material();
        $em = $this->getDoctrine()->getManager();
        $form = $this-> createForm(MaterialType::class,$material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($material);
            $em->flush();
            return $this->redirect($this->generateUrl('entity_material_index'));
        }
        return $this->render('entity/material/index.html.twig', array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/material/show/{id}", name="entity_material_show")
     */
    public function show($id){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Material::class);
        $material = $repo->find($id);
        return $this->render('entity/material/show.html.twig', array('material' => $material));
    }
}